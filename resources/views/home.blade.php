<x-layouts.app>

    @php
        $trending = [
            (object)['name' => 'Premium Cotton T-Shirt', 'price' => 890, 'original' => 1200, 'rating' => 4.6, 'reviews' => 312, 'icon' => 'shirt', 'tint' => 'primary', 'label' => 'Bestseller'],
            (object)['name' => 'Men\'s Casual Shirt', 'price' => 1290, 'original' => null, 'rating' => 4.4, 'reviews' => 188, 'icon' => 'shirt', 'tint' => 'info', 'label' => 'Popular'],
            (object)['name' => 'Women\'s Kurti', 'price' => 1490, 'original' => 1900, 'rating' => 4.7, 'reviews' => 264, 'icon' => 'gem', 'tint' => 'secondary', 'label' => null],
            (object)['name' => 'Casual Sneakers', 'price' => 2350, 'original' => 2800, 'rating' => 4.5, 'reviews' => 421, 'icon' => 'footprints', 'tint' => 'info', 'label' => null],
            (object)['name' => 'Panjabi', 'price' => 1850, 'original' => null, 'rating' => 4.8, 'reviews' => 156, 'icon' => 'shirt', 'tint' => 'secondary', 'label' => 'Popular'],
            (object)['name' => 'Classic Oxford Shoe', 'price' => 3150, 'original' => 3600, 'rating' => 4.4, 'reviews' => 98, 'icon' => 'footprints', 'tint' => 'neutral', 'label' => null],
        ];

        $forYou = [
            (object)['name' => 'Premium Cotton T-Shirt', 'price' => 890, 'original' => null, 'rating' => 4.6, 'reviews' => 312, 'icon' => 'shirt', 'tint' => 'primary', 'reason' => 'Picked for you'],
            (object)['name' => 'Women\'s Kurti', 'price' => 1490, 'original' => null, 'rating' => 4.7, 'reviews' => 264, 'icon' => 'gem', 'tint' => 'secondary', 'reason' => 'Because you viewed Kurtis'],
            (object)['name' => 'Casual Sneakers', 'price' => 2350, 'original' => null, 'rating' => 4.5, 'reviews' => 421, 'icon' => 'footprints', 'tint' => 'info', 'reason' => 'Popular with shoppers'],
            (object)['name' => 'Men\'s Casual Shirt', 'price' => 1290, 'original' => null, 'rating' => 4.4, 'reviews' => 188, 'icon' => 'shirt', 'tint' => 'info', 'reason' => 'Picked for you'],
            (object)['name' => 'Canvas Backpack', 'price' => 1650, 'original' => 1900, 'rating' => 4.3, 'reviews' => 97, 'icon' => 'bag', 'tint' => 'primary', 'reason' => 'Popular with shoppers'],
        ];

        $newArrivals = [
            (object)['name' => 'Men\'s Casual Shirt', 'price' => 1290, 'original' => null, 'rating' => 4.4, 'reviews' => 188, 'icon' => 'shirt', 'tint' => 'info', 'label' => 'New'],
            (object)['name' => 'Women\'s Kurti', 'price' => 1490, 'original' => null, 'rating' => 4.7, 'reviews' => 264, 'icon' => 'gem', 'tint' => 'secondary', 'label' => 'New'],
            (object)['name' => 'Casual Sneakers', 'price' => 2350, 'original' => null, 'rating' => 4.5, 'reviews' => 421, 'icon' => 'footprints', 'tint' => 'info', 'label' => null],
            (object)['name' => 'Panjabi', 'price' => 1850, 'original' => null, 'rating' => 4.8, 'reviews' => 156, 'icon' => 'shirt', 'tint' => 'secondary', 'label' => 'New'],
            (object)['name' => 'Sports Watch', 'price' => 2950, 'original' => 3400, 'rating' => 4.2, 'reviews' => 74, 'icon' => 'watch', 'tint' => 'neutral', 'label' => null],
        ];

        $bd = [
            (object)['name' => 'Panjabi', 'price' => 1850, 'original' => 2100, 'rating' => 4.8, 'reviews' => 156, 'icon' => 'shirt', 'tint' => 'secondary', 'label' => null],
            (object)['name' => 'Women\'s Kurti', 'price' => 1490, 'original' => null, 'rating' => 4.7, 'reviews' => 264, 'icon' => 'gem', 'tint' => 'primary', 'label' => 'Eid favourite'],
            (object)['name' => 'Premium Cotton T-Shirt', 'price' => 890, 'original' => 1100, 'rating' => 4.6, 'reviews' => 312, 'icon' => 'shirt', 'tint' => 'info', 'label' => null],
            (object)['name' => 'Casual Sneakers', 'price' => 2350, 'original' => 2700, 'rating' => 4.5, 'reviews' => 421, 'icon' => 'footprints', 'tint' => 'info', 'label' => 'Popular'],
            (object)['name' => 'Men\'s Casual Shirt', 'price' => 1290, 'original' => null, 'rating' => 4.4, 'reviews' => 188, 'icon' => 'shirt', 'tint' => 'primary', 'label' => null],
        ];
    @endphp

    {{-- 3. Hero --}}
    <section class="relative overflow-hidden border-b border-neutral-200">
        {{-- soft background wash --}}
        <div class="absolute inset-0 bg-gradient-to-b from-primary-50/70 via-neutral-0 to-neutral-0" aria-hidden="true"></div>

        <div class="relative mx-auto grid w-full max-w-[1320px] gap-10 px-4 py-12 sm:py-16 md:px-6 lg:grid-cols-2 lg:items-center lg:gap-14 lg:px-8 lg:py-20">
            <div class="max-w-xl">
                <p class="mb-4 inline-flex items-center gap-2 rounded-full border border-primary-200 bg-white px-3 py-1 text-xs font-semibold text-primary-800">
                    <x-icon name="sparkles" class="size-3.5 text-ai-500" />
                    Smart shopping, made in Bangladesh
                </p>
                <h1 class="text-4xl font-extrabold leading-[1.08] tracking-tight text-neutral-900 sm:text-5xl lg:text-[3.4rem]">
                    Shopping made
                    <span class="text-primary-700">smarter.</span>
                </h1>
                <p class="mt-5 max-w-md text-base leading-relaxed text-neutral-600 sm:text-lg">
                    Find what you need faster, discover products you'll love, and get help whenever you need it.
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="#" class="inline-flex h-12 items-center justify-center gap-2 rounded-lg bg-primary-700 px-7 text-sm font-semibold text-white shadow-sm transition hover:bg-primary-800 active:scale-[0.99]">
                        Start Shopping
                        <x-icon name="arrow-right" class="size-4" />
                    </a>
                    <button type="button" data-ai-trigger class="inline-flex h-12 items-center justify-center gap-2 rounded-lg border border-ai-200 bg-ai-50 px-7 text-sm font-semibold text-ai-700 transition hover:bg-ai-100 active:scale-[0.99]">
                        <x-icon name="sparkles" class="size-4" />
                        Ask BitMart AI
                    </button>
                </div>
                <p class="mt-4 text-xs text-neutral-500">Free shipping on orders over ৳2,000 · Cash on Delivery available</p>
            </div>

            <div class="relative">
                <div class="rounded-2xl border border-neutral-200 bg-white p-4 shadow-md sm:p-5">
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-ai-50 px-2.5 py-1 text-[11px] font-semibold text-ai-700">
                            <x-icon name="sparkles" class="size-3" />BitMart AI
                        </span>
                        <span class="inline-flex items-center gap-1 rounded-full bg-primary-50 px-2.5 py-1 text-[11px] font-semibold text-primary-800">
                            <x-icon name="check" class="size-3" />In stock
                        </span>
                    </div>

                    <div class="my-4 flex aspect-[16/9] items-center justify-center rounded-lg bg-primary-50 text-primary-700">
                        <x-icon name="gem" class="size-20 opacity-80" />
                    </div>

                    <div class="space-y-2">
                        <p class="text-sm font-semibold leading-snug text-neutral-900">Women's Kurti · Premium cotton blend</p>
                        <div class="flex items-center gap-1.5 text-xs text-neutral-500">
                            <x-icon name="star" filled class="size-3.5 text-warning-500" />
                            <span class="font-semibold text-neutral-700">4.7</span>
                            <span>(264 reviews)</span>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-2xl font-bold tracking-tight text-neutral-900">৳1,490</span>
                            <span class="text-sm text-neutral-400 line-through">৳1,900</span>
                        </div>
                        <div class="flex gap-2 pt-1">
                            <button type="button" data-add-to-cart class="flex h-11 flex-1 items-center justify-center gap-1.5 rounded-lg bg-primary-700 text-sm font-semibold text-white transition hover:bg-primary-800">
                                <x-icon name="cart" class="size-4" />Add to Cart
                            </button>
                            <a href="#" class="inline-flex h-11 items-center justify-center rounded-lg border border-neutral-300 px-4 text-sm font-semibold text-neutral-700 transition hover:bg-neutral-50">
                                View
                            </a>
                        </div>
                    </div>
                </div>

                {{-- floating trust chips --}}
                <div class="mt-4 grid grid-cols-2 gap-2.5 sm:grid-cols-4">
                    @foreach([['shield-check', 'Secure', 'payment'], ['truck', 'Fast', 'delivery'], ['rotate-ccw', 'Easy', 'returns'], ['banknote', 'Cash on', 'delivery']] as [$icon, $t, $s])
                        <div class="flex flex-col items-center gap-1 rounded-xl border border-neutral-200 bg-white/80 px-2 py-3 text-center backdrop-blur">
                            <x-icon :name="$icon" class="size-5 text-primary-700" />
                            <span class="text-xs font-semibold leading-tight text-neutral-800">{{ $t }}</span>
                            <span class="text-[10px] text-neutral-500">{{ $s }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- 4. AI discovery --}}
    <section class="mx-auto w-full max-w-[1320px] px-4 py-12 md:px-6 md:py-16 lg:px-8">
        <div class="mb-8 max-w-xl">
            <p class="mb-2 flex items-center gap-1.5 text-xs font-bold uppercase tracking-wide text-ai-600">
                <x-icon name="sparkles" class="size-3.5" />BitMart AI
            </p>
            <h2 class="text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-3xl">Your smarter way to shop</h2>
            <p class="mt-2 text-sm leading-relaxed text-neutral-600 sm:text-base">BitMart helps you search, discover and choose products more easily.</p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @php
                $aiCards = [
                    ['icon' => 'search', 'title' => 'AI Search', 'desc' => 'Describe what you\'re looking for in your own words.', 'cta' => 'Try AI Search'],
                    ['icon' => 'gem', 'title' => 'AI Shopping Assistant', 'desc' => 'Tell BitMart what you need and get personalized product suggestions.', 'cta' => 'Ask BitMart AI'],
                    ['icon' => 'sparkles', 'title' => 'Personalized Picks', 'desc' => 'Discover products selected around your interests.', 'cta' => 'Explore For You'],
                    ['icon' => 'message-circle', 'title' => 'AI Support', 'desc' => 'Get quick help with orders, delivery, returns and payments.', 'cta' => 'Get Help'],
                ];
            @endphp
            @foreach($aiCards as $i => $card)
                <div class="group flex flex-col rounded-xl border border-neutral-200 bg-white p-5 transition hover:-translate-y-0.5 hover:border-ai-200 hover:shadow-md">
                    <div class="mb-4 flex items-center justify-between">
                        <span class="flex size-11 items-center justify-center rounded-lg bg-ai-50 text-ai-600 transition group-hover:bg-ai-100">
                            <x-icon :name="$card['icon']" class="size-5.5" />
                        </span>
                        <span class="inline-flex items-center rounded-full bg-ai-50 px-2 py-0.5 text-[10px] font-bold text-ai-700">AI</span>
                    </div>
                    <h3 class="text-base font-bold text-neutral-900">{{ $card['title'] }}</h3>
                    <p class="mt-1.5 flex-1 text-sm leading-relaxed text-neutral-600">{{ $card['desc'] }}</p>
                    <button type="button" data-ai-trigger class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-ai-700 transition group-hover:gap-2.5">
                        {{ $card['cta'] }}
                        <x-icon name="arrow-right" class="size-4" />
                    </button>
                </div>
            @endforeach
        </div>
    </section>

    {{-- 5. Categories --}}
    <section class="border-y border-neutral-200 bg-neutral-50">
        <div class="mx-auto w-full max-w-[1320px] px-4 py-12 md:px-6 md:py-16 lg:px-8">
            <div class="mb-8">
                <h2 class="text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-3xl">Shop by Category</h2>
            </div>

            <div class="grid grid-cols-2 gap-3 sm:grid-cols-4 lg:grid-cols-8">
                @php
                    $cats = [
                        ['Men\'s Fashion', 'shirt', 'primary'],
                        ['Women\'s Fashion', 'gem', 'secondary'],
                        ['Kids', 'baby', 'info'],
                        ['Electronics', 'smartphone', 'neutral'],
                        ['Beauty & Care', 'leaf', 'primary'],
                        ['Home & Living', 'lamp', 'secondary'],
                        ['Footwear', 'footprints', 'info'],
                        ['Accessories', 'watch', 'neutral'],
                    ];
                    $catTints = ['primary' => 'bg-primary-50 text-primary-700', 'secondary' => 'bg-secondary-100 text-secondary-700', 'info' => 'bg-info-50 text-info-700', 'neutral' => 'bg-neutral-100 text-neutral-700'];
                @endphp
                @foreach($cats as [$cat, $icon, $tint])
                    <a href="#" class="group flex flex-col items-center gap-3 rounded-xl border border-neutral-200 bg-white p-4 text-center transition hover:-translate-y-0.5 hover:border-primary-300 hover:shadow-sm">
                        <span class="flex size-14 items-center justify-center rounded-full transition group-hover:scale-105 {{ $catTints[$tint] }}">
                            <x-icon :name="$icon" class="size-7" />
                        </span>
                        <span class="text-sm font-semibold leading-tight text-neutral-800 group-hover:text-primary-700">{{ $cat }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 6. Trending --}}
    <section class="mx-auto w-full max-w-[1320px] px-4 py-12 md:px-6 md:py-16 lg:px-8">
        <div class="mb-8 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-3xl">Trending Now</h2>
                <p class="mt-1.5 text-sm text-neutral-500">Most loved products this week</p>
            </div>
            <a href="#" class="inline-flex shrink-0 items-center gap-1 text-sm font-semibold text-primary-700 transition hover:text-primary-800">
                View all
                <x-icon name="arrow-right" class="size-4" />
            </a>
        </div>

        <div data-product-grid data-load="skeleton">
            {{-- skeleton --}}
            <div data-skeleton class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
                @for ($i = 0; $i < 6; $i++)
                    <div class="overflow-hidden rounded-xl border border-neutral-200 bg-white">
                        <div class="skeleton aspect-[4/3]"></div>
                        <div class="space-y-2.5 p-3">
                            <div class="skeleton h-3.5 rounded-md"></div>
                            <div class="skeleton h-3 rounded-md w-1/2"></div>
                            <div class="skeleton h-8 rounded-lg w-full"></div>
                        </div>
                    </div>
                @endfor
            </div>

            <div data-content class="hidden grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
                @foreach($trending as $p)
                    <x-product-card :name="$p->name" :price="$p->price" :original-price="$p->original" :rating="$p->rating" :reviews="$p->reviews" :icon="$p->icon" :tint="$p->tint" :label="$p->label" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- 7. Personalized picks --}}
    <section class="border-y border-neutral-200 bg-neutral-50">
        <div class="mx-auto w-full max-w-[1320px] px-4 py-12 md:px-6 md:py-16 lg:px-8">
            <div class="mb-8 flex items-end justify-between gap-4">
                <div class="max-w-md">
                    <p class="mb-2 flex items-center gap-1.5 text-xs font-bold uppercase tracking-wide text-ai-600">
                        <x-icon name="sparkles" class="size-3.5" />For you
                    </p>
                    <h2 class="text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-3xl">Picked for you</h2>
                    <p class="mt-1.5 text-sm text-neutral-500">Recommendations based on your shopping activity. New here? See popular picks instead.</p>
                </div>
                <a href="#" class="hidden shrink-0 items-center gap-1 text-sm font-semibold text-primary-700 transition hover:text-primary-800 sm:inline-flex">
                    Explore For You
                    <x-icon name="arrow-right" class="size-4" />
                </a>
            </div>

            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                @foreach($forYou as $p)
                    <x-product-card :name="$p->name" :price="$p->price" :original-price="$p->original" :rating="$p->rating" :reviews="$p->reviews" :icon="$p->icon" :tint="$p->tint" :label="$p->reason" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- 8. Smart shopping promo --}}
    <section class="mx-auto w-full max-w-[1320px] px-4 py-12 md:px-6 md:py-16 lg:px-8">
        <div class="relative overflow-hidden rounded-2xl bg-neutral-900 px-6 py-12 text-center md:px-12 lg:py-16">
            <div class="pointer-events-none absolute -bottom-24 -right-24 size-72 rounded-full bg-ai-600/20 blur-3xl" aria-hidden="true"></div>
            <div class="pointer-events-none absolute -left-20 -top-20 size-64 rounded-full bg-primary-600/20 blur-3xl" aria-hidden="true"></div>

            <div class="relative mx-auto max-w-2xl">
                <p class="mb-3 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-1 text-xs font-semibold text-ai-100 backdrop-blur">
                    <x-icon name="sparkles" class="size-3.5" />BitMart AI
                </p>
                <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">Not sure what to buy?</h2>
                <p class="mx-auto mt-3 max-w-md text-sm leading-relaxed text-neutral-300 sm:text-base">
                    Tell BitMart AI what you're looking for and we'll help you find it.
                </p>

                <div class="mt-8">
                    <button type="button" data-ai-trigger class="inline-flex h-12 items-center justify-center gap-2 rounded-lg bg-ai-600 px-8 text-sm font-semibold text-white shadow-ai transition hover:bg-ai-700 active:scale-[0.99]">
                        <x-icon name="sparkles" class="size-4" />
                        Ask BitMart AI
                    </button>
                </div>

                <div class="mt-8 flex flex-wrap justify-center gap-2.5">
                    @foreach(['Find something under ৳1,500', 'Help me choose a gift', 'Find an outfit for a casual event', 'Show popular products'] as $chip)
                        <button type="button" data-ai-prompt="{{ $chip }}" class="rounded-full border border-white/20 bg-white/5 px-4 py-2 text-sm font-medium text-neutral-200 backdrop-blur transition hover:border-ai-400 hover:bg-white/10 hover:text-white">
                            {{ $chip }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- 9. New arrivals --}}
    <section class="mx-auto w-full max-w-[1320px] px-4 pb-12 md:px-6 md:pb-16 lg:px-8">
        <div class="mb-8 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-3xl">New Arrivals</h2>
                <p class="mt-1.5 text-sm text-neutral-500">Just landed on BitMart</p>
            </div>
            <a href="#" class="inline-flex shrink-0 items-center gap-1 text-sm font-semibold text-primary-700 transition hover:text-primary-800">
                View all
                <x-icon name="arrow-right" class="size-4" />
            </a>
        </div>

        <div data-product-grid data-load="skeleton">
            <div data-skeleton class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                @for ($i = 0; $i < 5; $i++)
                    <div class="overflow-hidden rounded-xl border border-neutral-200 bg-white">
                        <div class="skeleton aspect-[4/3]"></div>
                        <div class="space-y-2.5 p-3">
                            <div class="skeleton h-3.5 rounded-md"></div>
                            <div class="skeleton h-3 rounded-md w-1/2"></div>
                            <div class="skeleton h-8 rounded-lg w-full"></div>
                        </div>
                    </div>
                @endfor
            </div>

            <div data-content class="hidden grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                @foreach($newArrivals as $p)
                    <x-product-card :name="$p->name" :price="$p->price" :original-price="$p->original" :rating="$p->rating" :reviews="$p->reviews" :icon="$p->icon" :tint="$p->tint" :label="$p->label" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- 10. Popular in Bangladesh --}}
    <section class="border-y border-neutral-200 bg-neutral-50">
        <div class="mx-auto w-full max-w-[1320px] px-4 py-12 md:px-6 md:py-16 lg:px-8">
            <div class="mb-8 flex items-end justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-3xl">Popular in Bangladesh</h2>
                    <p class="mt-1.5 text-sm text-neutral-500">Trending with local shoppers right now</p>
                </div>
                <a href="#" class="hidden shrink-0 items-center gap-1 text-sm font-semibold text-primary-700 transition hover:text-primary-800 sm:inline-flex">
                    View all
                    <x-icon name="arrow-right" class="size-4" />
                </a>
            </div>

            <div class="mb-8 flex flex-wrap gap-2">
                @foreach(['Eid collection', 'Panjabi', 'Kurti', 'Sneakers', 'Gift for him', 'Gift for her'] as $c)
                    <a href="#" class="rounded-full border border-neutral-200 bg-white px-4 py-2 text-sm font-medium text-neutral-600 transition hover:border-primary-400 hover:text-primary-700">{{ $c }}</a>
                @endforeach
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach($bd as $p)
                    <x-product-card :name="$p->name" :price="$p->price" :original-price="$p->original" :rating="$p->rating" :reviews="$p->reviews" :icon="$p->icon" :tint="$p->tint" :label="$p->label" />
                @endforeach
                <div class="flex flex-col justify-center rounded-xl border border-dashed border-neutral-300 bg-white/60 p-6 text-center">
                    <span class="mx-auto mb-3 flex size-12 items-center justify-center rounded-full bg-primary-100 text-primary-700">
                        <x-icon name="tag" class="size-6" />
                    </span>
                    <p class="text-sm font-semibold text-neutral-900">Extensive local catalog</p>
                    <p class="mt-1 text-xs text-neutral-500">Thousands of products across categories, priced in BDT.</p>
                    <a href="#" class="mt-4 inline-flex items-center justify-center gap-1 text-sm font-semibold text-primary-700 transition hover:text-primary-800">
                        Browse catalog <x-icon name="arrow-right" class="size-4" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- 11. Trust + 12. Support --}}
    <section class="mx-auto w-full max-w-[1320px] px-4 py-12 md:px-6 md:py-16 lg:px-8">
        <div class="mb-10 max-w-xl">
            <h2 class="text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-3xl">Shop with confidence</h2>
            <p class="mt-2 text-sm leading-relaxed text-neutral-600 sm:text-base">Clear information, honest reviews and help when you need it.</p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
            @php
                $trust = [
                    ['shield-check', 'Secure Payments', 'Pay securely with supported payment methods.'],
                    ['banknote', 'Cash on Delivery', 'Available where applicable.'],
                    ['rotate-ccw', 'Easy Returns', 'Clear and simple return policies.'],
                    ['truck', 'Fast Delivery', 'Reliable delivery options across Bangladesh.'],
                    ['headphones', 'Customer Support', 'Get help whenever you need it.'],
                ];
            @endphp
            @foreach($trust as [$icon, $t, $s])
                <div class="rounded-xl border border-neutral-200 bg-white p-5">
                    <span class="mb-3 flex size-11 items-center justify-center rounded-lg bg-primary-50 text-primary-700">
                        <x-icon :name="$icon" class="size-5.5" />
                    </span>
                    <h3 class="text-sm font-bold text-neutral-900">{{ $t }}</h3>
                    <p class="mt-1 text-xs leading-relaxed text-neutral-500">{{ $s }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-10 flex flex-col items-center justify-between gap-6 rounded-2xl border border-neutral-200 bg-neutral-50 p-6 md:flex-row md:p-8">
            <div class="max-w-2xl text-center md:text-left">
                <h3 class="text-lg font-bold text-neutral-900">Need help?</h3>
                <p class="mt-1 text-sm text-neutral-600">Ask BitMart AI about orders, delivery, returns or payments.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-2.5">
                @foreach(['bKash', 'Nagad', 'Card', 'Cash on Delivery'] as $method)
                    <span class="rounded-md border border-neutral-200 bg-white px-3 py-1.5 text-xs font-semibold text-neutral-600">{{ $method }}</span>
                @endforeach
                <button type="button" data-ai-trigger class="inline-flex h-11 items-center justify-center gap-2 rounded-lg bg-ai-600 px-5 text-sm font-semibold text-white transition hover:bg-ai-700">
                    <x-icon name="sparkles" class="size-4" />Get Help
                </button>
            </div>
        </div>
    </section>

</x-layouts.app>