import '../css/app.css';

const $ = (selector, scope = document) => scope.querySelector(selector);
const $$ = (selector, scope = document) => [...scope.querySelectorAll(selector)];

const state = {
    cart: 0,
    wishlist: 0,
    aiReady: false,
};

/* ---------- Toasts ---------- */
function toast(message, icon = 'check') {
    const root = $('#toast-root');
    if (!root) return;
    const el = document.createElement('div');
    el.className = 'pointer-events-auto flex items-center gap-2.5 rounded-xl bg-neutral-900 px-4 py-3 text-sm font-medium text-white shadow-md animate-fade-in-up';
    el.innerHTML = `
        <span class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary-600 text-white">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="size-3.5"><path d="M20 6 9 17l-5-5"/></svg>
        </span>
        <span>${message}</span>`;
    root.appendChild(el);
    setTimeout(() => {
        el.style.opacity = '0';
        el.style.transition = 'opacity .2s';
        setTimeout(() => el.remove(), 220);
    }, 2200);
}

/* ---------- Counts ---------- */
function bumpCount(key) {
    const badge = $(`[data-count="${key}"]`);
    if (!badge) return;
    const next = key === 'cart' ? ++state.cart : ++state.wishlist;
    badge.textContent = next;
    badge.hidden = false;
    badge.classList.remove('animate-pop');
    void badge.offsetWidth;
    badge.classList.add('animate-pop');
}

/* ---------- Search ---------- */
const bindSearch = () => {
    const wrapper = $('[data-search-wrap]');
    const input = $('[data-search-input]');
    const panel = $('[data-search-panel]');
    if (!wrapper || !input || !panel) return;

    const show = () => panel.classList.remove('hidden');
    const hide = () => panel.classList.add('hidden');

    input.addEventListener('focus', show);
    document.addEventListener('click', (e) => {
        if (wrapper.contains(e.target)) return;
        hide();
    });
    wrapper.addEventListener('focusin', show);
    wrapper.addEventListener('focusout', (e) => {
        if (wrapper.contains(e.relatedTarget)) return;
        setTimeout(() => { if (!wrapper.matches(':focus-within')) hide(); }, 120);
    });
};

/* ---------- Mobile search ---------- */
const bindMobileSearch = () => {
    const overlay = $('[data-mobile-search]');
    const openBtn = $$('[data-search-open]');
    const input = $('[data-search-input-mobile]');
    if (!overlay) return;
    const open = () => { overlay.classList.remove('hidden'); input?.focus(); };
    const close = () => { overlay.classList.add('hidden'); input && (input.value = ''); };
    openBtn.forEach((b) => b.addEventListener('click', open));
    $('[data-search-close]')?.addEventListener('click', close);
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') close(); });
};

/* ---------- Mobile category drawer ---------- */
const bindMenu = () => {
    const openers = [...$$('[data-menu-toggle]'), ...$$('[data-menu-toggle-mobile]')];
    const panel = $('[data-menu-panel]');
    if (!panel) return;
    const close = () => panel.classList.add('hidden');
    openers.forEach((b) => b.addEventListener('click', () => panel.classList.remove('hidden')));
    $$('[data-menu-close]').forEach((b) => b.addEventListener('click', close));
};

/* ---------- Search terms / AI prompts ---------- */
const bindPromptButtons = () => {
    $$('[data-search-term]').forEach((b) => {
        b.addEventListener('click', () => {
            const input = $('[data-search-input]') || $('[data-search-input-mobile]');
            if (input) input.value = b.dataset.searchTerm;
            $('[data-search-panel]')?.classList.add('hidden');
            $('[data-mobile-search]')?.classList.add('hidden');
        });
    });
    $$('[data-ai-prompt]').forEach((b) => {
        b.addEventListener('click', () => openAI(b.dataset.aiPrompt));
    });
};

/* ---------- Wishlist ---------- */
const bindWishlist = () => {
    $$('[data-wishlist]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const svg = btn.querySelector('svg');
            const active = btn.dataset.wishlisted === 'true';
            btn.dataset.wishlisted = String(!active);
            btn.classList.toggle('text-error-600', !active);
            btn.classList.toggle('bg-white/80', !active);
            if (svg) {
                svg.style.fill = active ? 'transparent' : 'currentColor';
                svg.style.stroke = active ? 'currentColor' : 'none';
            }
            bumpCount('wishlist');
            toast(!active ? 'Added to wishlist' : 'Removed from wishlist', 'heart');
        });
    });
};

/* ---------- Cart ---------- */
const bindCart = () => {
    $$('[data-add-to-cart]').forEach((btn) => {
        btn.addEventListener('click', () => {
            bumpCount('cart');
            toast('Added to cart');
            btn.classList.add('animate-pop');
            setTimeout(() => btn.classList.remove('animate-pop'), 200);
        });
    });
};

/* ---------- Quick view ---------- */
const bindQuickView = () => {
    const sheet = $('[data-quick-view]');
    if (!sheet) return;

    const tints = {
        primary: 'bg-primary-50 text-primary-700',
        secondary: 'bg-secondary-100 text-secondary-700',
        ai: 'bg-ai-50 text-ai-700',
        info: 'bg-info-50 text-info-700',
        neutral: 'bg-neutral-100 text-neutral-600',
    };

    const open = (trigger) => {
        const visual = $('[data-qv-visual]');
        const iconWrap = $('[data-qv-icon]', visual) || null;
        const sourceIconSvg = trigger?.closest('article')?.querySelector('svg');
        const iconSvg = sourceIconSvg?.cloneNode(true);

        if (visual && iconWrap) {
            iconWrap.replaceWith(iconSvg);
            iconSvg.classList.add('size-16', 'opacity-70');
        }
        if (visual && tints[trigger?.dataset.tint]) {
            visual.className = `flex aspect-[4/3] items-center justify-center rounded-xl sm:aspect-auto sm:h-full sm:min-h-56 ${tints[trigger.dataset.tint]}`;
        }

        if (trigger) {
            $('[data-qv-title]').textContent = trigger.dataset.name || '';
            $('[data-qv-price]').textContent = trigger.dataset.price || '';
            $('[data-qv-rating]').textContent = trigger.dataset.rating || '';
            $('[data-qv-reviews]').textContent = trigger.dataset.reviews || '';
            const original = $('[data-qv-original]');
            if (trigger.dataset.original) {
                original.textContent = trigger.dataset.original;
                original.classList.remove('hidden');
            } else {
                original.classList.add('hidden');
            }
        }

        sheet.classList.remove('hidden');
        requestAnimationFrame(() => {
            $('[data-qv-backdrop]').style.opacity = '1';
        });
    };

    const close = () => {
        $('[data-qv-backdrop]').style.opacity = '0';
        setTimeout(() => sheet.classList.add('hidden'), 200);
    };

    $$('[data-quick-view-open]').forEach((btn) => {
        btn.addEventListener('click', () => open(btn));
    });
    $('[data-qv-close]')?.addEventListener('click', close);
    $('[data-qv-backdrop]')?.addEventListener('click', close);
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') close(); });
};

/* ---------- AI sheet ---------- */
const openAI = (prompt = '') => {
    const sheet = $('[data-ai-sheet]');
    if (!sheet) return;
    sheet.classList.remove('hidden');
    requestAnimationFrame(() => {
        $('[data-ai-backdrop]').style.opacity = '1';
    });
    if (prompt) askAI(prompt);
};

const closeAI = () => {
    const sheet = $('[data-ai-sheet]');
    if (!sheet) return;
    $('[data-ai-backdrop]').style.opacity = '0';
    setTimeout(() => {
        sheet.classList.add('hidden');
        $('[data-ai-messages]').innerHTML = `
            <div class="max-w-[85%] rounded-2xl rounded-bl-md bg-neutral-100 px-3.5 py-2.5 text-sm text-neutral-700">
                Hi! I'm BitMart AI. Tell me what you're looking for — try a suggestion below.
            </div>`;
    }, 200);
};

async function askAI(prompt) {
    const messages = $('[data-ai-messages]');
    if (!messages) return;

    const userEl = document.createElement('div');
    userEl.className = 'ml-auto max-w-[85%] rounded-2xl rounded-br-md bg-ai-600 px-3.5 py-2.5 text-sm font-medium text-white';
    userEl.textContent = prompt;
    messages.appendChild(userEl);

    const loadEl = document.createElement('div');
    loadEl.className = 'flex items-center gap-2 text-xs text-ai-700 animate-fade-in';
    loadEl.innerHTML = `
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-4 animate-spin"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
        <span>BitMart AI is finding the best matches…</span>`;
    messages.appendChild(loadEl);
    messages.parentElement.scrollTop = 9999;

    const replies = {
        tshirt: {
            match: /t-?shirt|black/i,
            text: 'For a black T-shirt under ৳1,500, check our bestsellers:',
            items: [['Premium Cotton T-Shirt', '৳890'], ['Daily Cotton Tee', '৳690']],
        },
        office: {
            match: /office/i,
            text: 'For summer office wear, these breathable shirts stand out:',
            items: [["Men's Casual Shirt", '৳1,290'], ['Linen Blend Shirt', '৳1,690']],
        },
        giftbro: {
            match: /gift.*brother|gift for my/i,
            text: 'For a gift under ৳2,000, shoppers often pick these:',
            items: [['Sports Watch', '৳1,950'], ['Men\'s Casual Shirt', '৳1,290']],
        },
        sneaker: {
            match: /sneaker|shoes/i,
            text: 'Popular sneakers right now on BitMart:',
            items: [['Casual Sneakers', '৳2,350'], ['Running Shoes', '৳2,150']],
        },
        under: {
            match: /under ৳|under 1,?500|under 2,?000/i,
            text: 'Great picks under your budget:',
            items: [['Premium Cotton T-Shirt', '৳890'], ['Women\'s Kurti', '৳1,490']],
        },
        gift: {
            match: /gift/i,
            text: 'Here are thoughtful gift ideas shoppers love:',
            items: [['Sports Watch', '৳2,950'], ['Canvas Backpack', '৳1,650']],
        },
        outfit: {
            match: /outfit|casual event/i,
            text: 'A relaxed casual outfit, all under ৳3,000:',
            items: [["Men's Casual Shirt", '৳1,290'], ['Casual Sneakers', '৳2,350']],
        },
        popular: {
            match: /popular/i,
            text: 'Here’s what\'s trending with shoppers this week:',
            items: [['Premium Cotton T-Shirt', '৳890'], ['Panjabi', '৳1,850'], ['Casual Sneakers', '৳2,350']],
        },
    };
    const payload = Object.values(replies).find((r) => r.match.test(prompt));
    const fallback = {
        match: /./,
        text: 'I can help you find products by price, style or occasion. Try asking for something like a gift, an outfit, or a budget.',
        items: [],
    };

    setTimeout(() => {
        loadEl.remove();
        const reply = payload || fallback;

        const replyEl = document.createElement('div');
        replyEl.className = 'max-w-[85%] space-y-2.5 rounded-2xl rounded-bl-md bg-ai-50 px-3.5 py-3 animate-fade-in-up';
        const title = document.createElement('p');
        title.className = 'text-sm text-ai-800';
        title.textContent = reply.text;
        replyEl.appendChild(title);

        reply.items.forEach(([name, price]) => {
            const row = document.createElement('button');
            row.type = 'button';
            row.className = 'flex w-full items-center justify-between gap-2 rounded-lg bg-white px-3 py-2 text-left text-sm font-medium text-neutral-800 transition hover:bg-ai-100 hover:text-ai-800';
            row.innerHTML = `<span class="line-clamp-1">${name}</span><span class="shrink-0 font-bold">${price}</span>`;
            row.addEventListener('click', () => toast(`${name} added to cart`));
            replyEl.appendChild(row);
        });

        messages.appendChild(replyEl);
        messages.parentElement.scrollTop = 9999;
    }, 900);
};

const bindAI = () => {
    $$('[data-ai-trigger]').forEach((b) => b.addEventListener('click', () => openAI()));
    $('[data-ai-close]')?.addEventListener('click', closeAI);
    $('[data-ai-backdrop]')?.addEventListener('click', closeAI);

    const input = $('[data-ai-input]');
    const send = $('[data-ai-send]');
    const submit = () => {
        const v = input?.value.trim();
        if (!v) return;
        askAI(v);
        input.value = '';
    };
    send?.addEventListener('click', submit);
    input?.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            submit();
        }
    });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && !$('[data-ai-sheet]').classList.contains('hidden')) closeAI(); });
};

/* ---------- Skeleton reveal ---------- */
const bindSkeletons = () => {
    $$('[data-load="skeleton"]').forEach((grid) => {
        const skeleton = $('[data-skeleton]', grid);
        const content = $('[data-content]', grid);
        const MIN_SKELETON_MS = 600;
        const elapsed = () => (performance.now() - window.__t0) / 1000;
        const hide = () => {
            skeleton?.classList.add('hidden');
            content?.classList.remove('hidden');
            content?.classList.add('animate-fade-in');
        };
        setTimeout(hide, Math.max(0, MIN_SKELETON_MS - elapsed() * 1000));
    });
};

/* ---------- Init ---------- */
document.addEventListener('DOMContentLoaded', () => {
    window.__t0 = performance.now();
    bindSearch();
    bindMobileSearch();
    bindMenu();
    bindPromptButtons();
    bindWishlist();
    bindCart();
    bindQuickView();
    bindAI();
    bindSkeletons();
});