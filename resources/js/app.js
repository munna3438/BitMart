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
        if (btn.hasAttribute('data-pdp-add')) return;
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
        const imgEl = $('[data-qv-img]', visual);
        const sourceIconSvg = trigger?.closest('article')?.querySelector('svg:not([data-quick-view-open])');
        const iconSvg = sourceIconSvg?.cloneNode(true);

        if (imgEl) {
            if (trigger?.dataset.image) {
                imgEl.src = trigger.dataset.image;
                imgEl.alt = trigger.dataset.name || '';
                imgEl.classList.remove('hidden');
                if (iconWrap) iconWrap.classList.add('hidden');
            } else {
                imgEl.classList.add('hidden');
                imgEl.removeAttribute('src');
                if (iconWrap) iconWrap.classList.remove('hidden');
            }
        }

        if (visual && iconWrap && iconSvg && !trigger?.dataset.image) {
            iconWrap.replaceWith(iconSvg);
            iconSvg.classList.add('size-16', 'opacity-70');
        }
        if (visual) {
            if (trigger?.dataset.image) {
                visual.className = 'flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl sm:aspect-auto sm:h-full sm:min-h-56 bg-neutral-50';
            } else if (tints[trigger?.dataset.tint]) {
                visual.className = `flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl sm:aspect-auto sm:h-full sm:min-h-56 ${tints[trigger.dataset.tint]}`;
            }
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

/* ---------- Formatting ---------- */
const taka = (value) => `৳${Math.round(value).toLocaleString('en-US')}`;

const setSummary = (key, value) => {
    const el = $(`[data-summary="${key}"]`);
    if (el) el.textContent = taka(value);
};

const setDeliverySummary = (value) => {
    const el = $('[data-summary="delivery"]');
    if (!el) return;
    if (value > 0) {
        el.textContent = taka(value);
    } else {
        el.innerHTML = '<span class="text-success-700">Free</span>';
    }
};

/* ---------- Option groups (PDP) ---------- */
const bindOptionGroup = (optionSelector, labelSelector, datasetKey) => {
    const options = $$(optionSelector);
    if (!options.length) return;

    options.forEach((option) => {
        option.addEventListener('click', () => {
            options.forEach((o) => o.removeAttribute('data-selected'));
            option.setAttribute('data-selected', 'true');
            const label = $(labelSelector);
            if (label) label.textContent = option.dataset[datasetKey] || option.textContent.trim();
        });
    });
};

/* ---------- Quantity stepper ---------- */
const bindStepper = ({ minus, plus, input, min = 1, max = 10, onChange }) => {
    const field = $(input);
    const minusBtn = $(minus);
    const plusBtn = $(plus);
    if (!field) return;

    const clamp = (value) => Math.min(max, Math.max(min, value || min));
    const sync = () => {
        const next = clamp(parseInt(field.value, 10));
        field.value = next;
        onChange?.(next);
    };

    minusBtn?.addEventListener('click', () => {
        field.value = clamp(parseInt(field.value, 10) - 1);
        onChange?.(parseInt(field.value, 10));
    });
    plusBtn?.addEventListener('click', () => {
        field.value = clamp(parseInt(field.value, 10) + 1);
        onChange?.(parseInt(field.value, 10));
    });
    field.addEventListener('change', sync);
    field.addEventListener('blur', sync);
};

/* ---------- Product page ---------- */
const bindProductPage = () => {
    bindOptionGroup('[data-color-option]', '[data-color-label]', 'colorOption');
    bindOptionGroup('[data-size-option]', '[data-size-label]', 'sizeOption');

    bindStepper({
        minus: '[data-qty-minus]',
        plus: '[data-qty-plus]',
        input: '[data-qty-input]',
    });

    $$('[data-tab]').forEach((tab) => {
        tab.addEventListener('click', () => {
            $$('[data-tab]').forEach((t) => {
                t.removeAttribute('data-selected');
                t.removeAttribute('aria-selected');
            });
            tab.setAttribute('data-selected', 'true');
            tab.setAttribute('aria-selected', 'true');

            $$('[data-tab-panel]').forEach((panel) => panel.classList.add('hidden'));
            const panel = $(`[data-tab-panel="${tab.dataset.tab}"]`);
            panel?.classList.remove('hidden');
        });
    });

    const addBtn = $('[data-pdp-add]');
    addBtn?.addEventListener('click', () => {
        const qty = parseInt($('[data-qty-input]')?.value || '1', 10);
        const size = $('[data-size-label]')?.textContent?.trim();
        const color = $('[data-color-label]')?.textContent?.trim();
        bumpCount('cart');
        toast(`Added to cart${qty > 1 ? ` · ${qty} items` : ''}${size ? ` · ${size}` : ''}${color ? ` · ${color}` : ''}`);
    });

    $$('[data-pdp-buy]').forEach((btn) => {
        btn.addEventListener('click', () => {
            bumpCount('cart');
        });
    });
};

/* ---------- Cart page ---------- */
const FREE_DELIVERY_OVER = 2000;
const DELIVERY_FEE = 60;
const COUPONS = { EID2026: 0.1, BITMART10: 0.1 };

const bindCartPage = () => {
    const items = $('[data-cart-items]');
    if (!items) return;

    let discountRate = 0;

    const rows = () => $$('[data-cart-row]', items);

    const recalc = () => {
        let subtotal = 0;
        let count = 0;

        rows().forEach((row) => {
            const price = parseFloat(row.dataset.price || '0');
            const qtyField = $('[data-cart-qty]', row);
            const qty = Math.min(10, Math.max(1, parseInt(qtyField?.value || '1', 10) || 1));
            if (qtyField && qtyField.value !== String(qty)) qtyField.value = String(qty);

            const lineTotal = price * qty;
            subtotal += lineTotal;
            count += qty;

            const lineEl = $('[data-cart-line-total]', row);
            if (lineEl) lineEl.textContent = taka(lineTotal);
        });

        const delivery = subtotal >= FREE_DELIVERY_OVER ? 0 : DELIVERY_FEE;
        const discount = Math.round(subtotal * discountRate);
        const total = subtotal - discount + delivery;

        setSummary('subtotal', subtotal);
        setDeliverySummary(delivery);
        setSummary('total', total);

        const discountEl = $('[data-summary="discount"]');
        if (discountEl) discountEl.textContent = `−${taka(discount)}`;

        const discountRow = $('[data-summary-discount-row]');
        if (discountRow) discountRow.hidden = discount <= 0;

        const countEl = $('[data-cart-count]');
        if (countEl) {
            countEl.textContent = `${count} item${count === 1 ? '' : 's'} · Prices include all taxes`;
        }

        const note = $('[data-delivery-note]');
        if (note) {
            note.textContent = delivery === 0
                ? 'Free delivery unlocked on this order.'
                : `Add ${taka(FREE_DELIVERY_OVER - subtotal)} more for free delivery.`;
        }
    };

    items.addEventListener('click', (e) => {
        const row = e.target.closest('[data-cart-row]');
        if (!row) return;

        const qtyField = $('[data-cart-qty]', row);
        if (e.target.closest('[data-cart-minus]')) {
            qtyField.value = Math.max(1, parseInt(qtyField.value, 10) - 1);
            recalc();
        } else if (e.target.closest('[data-cart-plus]')) {
            qtyField.value = Math.min(10, parseInt(qtyField.value, 10) + 1);
            recalc();
        } else if (e.target.closest('[data-cart-remove]')) {
            const name = $('a', row)?.textContent?.trim() || 'Item';
            row.remove();
            recalc();
            toast(`${name} removed from cart`);

            const empty = $('[data-cart-empty]');
            if (rows().length === 0) {
                items.classList.add('hidden');
                empty?.classList.remove('hidden');
                $('[data-cart-summary]')?.classList.add('hidden');
            }
        }
    });

    items.addEventListener('change', (e) => {
        if (e.target.matches('[data-cart-qty]')) recalc();
    });

    const couponInput = $('[data-coupon-input]');
    const couponMessage = $('[data-coupon-message]');

    const applyCoupon = () => {
        const code = (couponInput?.value || '').trim().toUpperCase();

        if (!code) {
            discountRate = 0;
            couponMessage && (couponMessage.textContent = 'Enter a promo code first.');
            couponMessage?.classList.remove('hidden', 'text-success-700');
            couponMessage?.classList.add('text-error-700');
            recalc();
            return;
        }

        if (COUPONS[code]) {
            discountRate = COUPONS[code];
            couponMessage && (couponMessage.textContent = `${code} applied — ${Math.round(discountRate * 100)}% off your order.`);
            couponMessage?.classList.remove('hidden', 'text-error-700');
            couponMessage?.classList.add('text-success-700');
            toast(`Promo code ${code} applied`);
        } else {
            discountRate = 0;
            couponMessage && (couponMessage.textContent = 'That promo code is not valid.');
            couponMessage?.classList.remove('hidden', 'text-success-700');
            couponMessage?.classList.add('text-error-700');
        }

        recalc();
    };

    $('[data-coupon-apply]')?.addEventListener('click', applyCoupon);
    couponInput?.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            applyCoupon();
        }
    });
    $$('[data-coupon-fill]').forEach((btn) => {
        btn.addEventListener('click', () => {
            if (couponInput) couponInput.value = btn.dataset.couponFill;
            applyCoupon();
        });
    });

    recalc();
};

/* ---------- Checkout page ---------- */
const bindCheckout = () => {
    const form = $('[data-checkout-form]');
    if (!form) return;

    const subtotal = parseFloat(form.dataset.subtotal || '0');
    const freeOver = parseFloat(form.dataset.freeOver || String(FREE_DELIVERY_OVER));

    const deliveryOptions = $$('[data-delivery-option]');

    const applyDelivery = () => {
        const selected = deliveryOptions.find((o) => o.checked) || deliveryOptions[0];
        if (!selected) return;

        const charge = parseFloat(selected.dataset.charge || '0');
        const freeEligible = selected.dataset.freeOver !== undefined;
        const delivery = freeEligible && subtotal >= freeOver ? 0 : charge;

        deliveryOptions.forEach((option) => {
            const optionCharge = parseFloat(option.dataset.charge || '0');
            const optionFree = option.dataset.freeOver !== undefined && subtotal >= freeOver;
            const label = $('[data-delivery-charge-label]', option.closest('label') || option);
            if (!label) return;
            label.textContent = optionFree ? 'Free' : optionCharge === 0 ? 'Free' : taka(optionCharge);
        });

        setDeliverySummary(delivery);
        const discountEl = $('[data-summary="discount"]');
        const discount = discountEl ? Math.round(parseFloat(discountEl.textContent.replace(/[^\d.]/g, '')) || 0) : 0;
        setSummary('total', subtotal - discount + delivery);
    };

    deliveryOptions.forEach((option) => option.addEventListener('change', applyDelivery));

    const paymentOptions = $$('[data-payment-option]');
    const panels = $$('[data-payment-panel]');

    const applyPayment = () => {
        const selected = paymentOptions.find((o) => o.checked);
        panels.forEach((panel) => {
            panel.classList.toggle('hidden', panel.dataset.paymentPanel !== selected?.value);
        });
    };

    paymentOptions.forEach((option) => option.addEventListener('change', applyPayment));

    const showError = (field, message) => {
        const target = $(`[data-error="${field}"]`);
        if (target) {
            target.textContent = message;
            target.classList.remove('hidden');
        }
        field.setAttribute('aria-invalid', 'true');
    };

    const clearError = (field) => {
        const target = $(`[data-error="${field.name}"]`);
        if (target) {
            target.textContent = '';
            target.classList.add('hidden');
        }
        field.removeAttribute('aria-invalid');
    };

    const requiredFields = () => {
        const base = $$('[required]', form);
        const extra = paymentOptions.find((o) => o.checked)?.value;
        if (extra && extra !== 'cod') {
            const extraField = $(`[name="${extra}_number"]`, form)
                || (extra === 'card' ? $('[name="card_number"]', form) : null);
            if (extraField) base.push(extraField);
        }
        return base;
    };

    const validate = () => {
        let firstInvalid = null;

        requiredFields().forEach((field) => {
            const value = (field.value || '').trim();
            if (!value) {
                showError(field, 'This field is required.');
                firstInvalid = firstInvalid || field;
            } else if (field.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                showError(field, 'Enter a valid email address.');
                firstInvalid = firstInvalid || field;
            } else if (field.name === 'phone' || field.name === 'address_phone') {
                const digits = value.replace(/\D/g, '');
                if (digits.length < 10 || digits.length > 14) {
                    showError(field, 'Enter a valid Bangladeshi phone number.');
                    firstInvalid = firstInvalid || field;
                } else {
                    clearError(field);
                }
            } else {
                clearError(field);
            }
        });

        return firstInvalid;
    };

    $$('[data-place-order]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const invalid = validate();

            if (invalid) {
                invalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                invalid.focus({ preventScroll: true });
                toast('Please complete the highlighted fields', 'info');
                return;
            }

            const successUrl = btn.dataset.successUrl;
            if (successUrl) {
                window.location.href = successUrl;
            }
        });
    });

    form.addEventListener('input', (e) => {
        if (e.target.matches('[required]')) clearError(e.target);
    });

    applyDelivery();
    applyPayment();
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
    bindProductPage();
    bindCartPage();
    bindCheckout();
});