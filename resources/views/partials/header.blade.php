<header class="sticky top-0 z-50 border-b border-neutral-200 bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/80">
    <div class="mx-auto w-full max-w-[1320px] px-4 md:px-6 lg:px-8">
        {{-- Main row --}}
        <div class="flex h-16 items-center gap-3 md:h-[72px] md:gap-6">

            {{-- Mobile: menu + brand --}}
            <button type="button" data-menu-toggle class="inline-flex size-10 items-center justify-center rounded-md text-neutral-600 transition hover:bg-neutral-100 lg:hidden" aria-label="Open category menu">
                <x-icon name="menu" class="size-6" />
            </button>

            <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2" aria-label="BitMart home">
                <span class="flex size-9 items-center justify-center rounded-lg bg-primary-700 text-white">
                    <x-icon name="sparkles" class="size-5" />
                </span>
                <span class="text-xl font-extrabold tracking-tight text-neutral-900">Bit<span class="text-primary-700">Mart</span></span>
            </a>

            {{-- Desktop: categories trigger --}}
            <div class="group relative hidden lg:block" data-category-dropdown>
                <button type="button" class="flex h-11 items-center gap-1.5 rounded-md px-3 text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 hover:text-primary-700" aria-haspopup="true">
                    <x-icon name="grid" class="size-4.5" />
                    Categories
                    <x-icon name="chevron-down" class="size-4 opacity-70" />
                </button>
                <div class="invisible absolute left-0 top-full z-50 w-72 origin-top scale-95 rounded-xl border bg-white p-2 opacity-0 shadow-lg transition-all duration-150 group-focus-within:visible group-focus-within:opacity-100 group-hover:visible group-hover:scale-100 group-hover:opacity-100">
                    @foreach ([
                        'Men\'s Fashion' => 'shirt',
                        'Women\'s Fashion' => 'gem',
                        'Kids' => 'baby',
                        'Electronics' => 'smartphone',
                        'Beauty & Care' => 'leaf',
                        'Home & Living' => 'lamp',
                        'Footwear' => 'footprints',
                        'Accessories' => 'watch',
                    ] as $cat => $icon)
                        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-neutral-700 transition hover:bg-primary-50 hover:text-primary-800">
                            <span class="flex size-8 items-center justify-center rounded-md bg-neutral-100 text-neutral-500">
                                <x-icon :name="$icon" class="size-4" />
                            </span>
                            {{ $cat }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Desktop smart search --}}
            <div class="relative hidden flex-1 lg:block" data-search-wrap>
                <form class="relative" role="search" action="#" onsubmit="return false;">
                    <x-icon name="search" class="pointer-events-none absolute left-3.5 top-1/2 size-4 -translate-y-1/2 text-neutral-400" />
                    <input
                        type="search"
                        data-search-input
                        autocomplete="off"
                        placeholder="Search products or ask BitMart AI…"
                        class="h-11 w-full rounded-full border border-neutral-300 bg-neutral-100/70 pl-10 pr-24 text-sm text-neutral-800 placeholder:text-neutral-400 focus:border-primary-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-600/30"
                    >
                    <div class="pointer-events-none absolute right-2 top-1/2 flex -translate-y-1/2 items-center gap-1 rounded-full bg-ai-100 px-2 py-1">
                        <x-icon name="sparkles" class="size-3 text-ai-600" />
                        <span class="text-xs font-semibold text-ai-700">AI</span>
                    </div>
                </form>

                {{-- Smart search panel --}}
                <div data-search-panel class="absolute left-0 right-0 top-full z-50 mt-2 hidden rounded-xl border border-neutral-200 bg-white p-4 shadow-lg">
                    <div class="max-h-[70vh] space-y-4 overflow-y-auto">

                        <div>
                            <p class="mb-2 flex items-center gap-1.5 text-xs font-semibold uppercase tracking-wide text-neutral-500">
                                <x-icon name="clock" class="size-3.5" />Recent searches
                            </p>
                            <div class="flex flex-wrap gap-2">
                                @foreach(['Panjabi', 'Kurti', 'Sneakers under ৳2,000'] as $s)
                                    <button data-search-term="{{ $s }}" class="rounded-full bg-neutral-100 px-3 py-1.5 text-xs font-medium text-neutral-700 transition hover:bg-neutral-200">{{ $s }}</button>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <p class="mb-2 flex items-center gap-1.5 text-xs font-semibold uppercase tracking-wide text-neutral-500">
                                <x-icon name="trending-up" class="size-3.5" />Popular searches
                            </p>
                            <div class="flex flex-wrap gap-2">
                                @foreach(['Cotton t-shirt', 'Eid collection', 'Men\'s panjabi', 'Running shoes'] as $s)
                                    <button data-search-term="{{ $s }}" class="rounded-full border border-neutral-200 px-3 py-1.5 text-xs font-medium text-neutral-700 transition hover:border-primary-300 hover:bg-primary-50">{{ $s }}</button>
                                @endforeach
                            </div>
                        </div>

                        <div class="rounded-xl bg-ai-50 p-3">
                            <p class="mb-2 flex items-center gap-1.5 text-xs font-semibold uppercase tracking-wide text-ai-700">
                                <x-icon name="sparkles" class="size-3.5" />Ask BitMart AI
                            </p>
                            <div class="space-y-1.5">
                                @foreach([
                                    'Find a black T-shirt under ৳1,500',
                                    'Office shirt for summer',
                                    'Gift for my brother under ৳2,000',
                                    'Show me popular sneakers',
                                ] as $ex)
                                    <button data-ai-prompt="{{ $ex }}" class="flex w-full items-center gap-2 rounded-lg bg-white/70 px-3 py-2 text-left text-sm text-ai-700 transition hover:bg-white">
                                        <x-icon name="sparkles" class="size-3.5 shrink-0" />
                                        {{ $ex }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @php
                $iconBtn = 'relative inline-flex size-10 items-center justify-center rounded-full text-neutral-700 transition hover:bg-neutral-100 hover:text-primary-700';
                $pill = 'absolute -right-0.5 -top-0.5 flex size-5 items-center justify-center rounded-full bg-error-600 text-[10px] font-bold text-white';
            @endphp

            {{-- Right actions --}}
            <div class="ml-auto flex items-center gap-0.5 md:gap-1">

                <button type="button" data-wishlist-nav class="{{ $iconBtn }}" aria-label="Wishlist">
                    <x-icon name="heart" class="size-5.5" />
                    <span class="{{ $pill }}" data-count="wishlist" hidden>0</span>
                </button>

                <a href="{{ route('cart.index') }}" data-cart-nav class="{{ $iconBtn }}" aria-label="Shopping cart">
                    <x-icon name="cart" class="size-5.5" />
                    <span class="{{ $pill }}" data-count="cart" hidden>0</span>
                </a>

                {{-- Mobile search trigger --}}
                <button type="button" data-search-open class="{{ $iconBtn }} lg:hidden" aria-label="Search">
                    <x-icon name="search" class="size-5.5" />
                </button>

                <div class="group relative hidden lg:block">
                    <button type="button" class="flex h-11 items-center gap-2 rounded-full pl-2 pr-3 text-sm font-medium text-neutral-700 transition hover:bg-neutral-100" aria-haspopup="true">
                        <span class="flex size-8 items-center justify-center rounded-full bg-primary-700 text-white">
                            <x-icon name="user" class="size-4.5" />
                        </span>
                        Account
                        <x-icon name="chevron-down" class="size-4 opacity-70" />
                    </button>
                    <div class="invisible absolute right-0 top-full z-50 w-56 origin-top scale-95 rounded-xl border bg-white p-2 opacity-0 shadow-lg transition-all duration-150 group-focus-within:visible group-focus-within:opacity-100 group-hover:visible group-hover:scale-100 group-hover:opacity-100">
                        <a href="{{ route('order.success') }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium text-neutral-700 transition hover:bg-neutral-100">My Orders</a>
                        <a href="#" class="block rounded-lg px-3 py-2.5 text-sm font-medium text-neutral-700 transition hover:bg-neutral-100">Wishlist</a>
                        <a href="#" class="block rounded-lg px-3 py-2.5 text-sm font-medium text-neutral-700 transition hover:bg-neutral-100">Addresses</a>
                        <a href="#" class="block rounded-lg px-3 py-2.5 text-sm font-medium text-neutral-700 transition hover:bg-neutral-100">Help & Support</a>
                        <div class="my-2 h-px bg-neutral-100"></div>
                        <a href="#" class="block rounded-lg px-3 py-2.5 text-sm font-medium text-error-700 transition hover:bg-error-50">Sign Out</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Secondary nav (desktop) --}}
        <nav class="hidden gap-6 pb-3 lg:flex" aria-label="Category shortcuts">
            @foreach([
                'Men\'s Fashion' => 'shirt',
                'Women\'s Fashion' => 'gem',
                'Panjabi & Kurta' => 'gift',
                'Kids' => 'baby',
                'Footwear' => 'footprints',
                'Electronics' => 'smartphone',
                'Home & Living' => 'lamp',
                'Beauty & Care' => 'leaf',
                'Offers' => 'tag',
            ] as $cat => $icon)
                <a href="#" class="group inline-flex items-center gap-1.5 text-[13px] font-medium text-neutral-600 transition hover:text-primary-700">
                    <x-icon :name="$icon" class="size-4 text-neutral-400 transition group-hover:text-primary-600" />
                    {{ $cat }}
                </a>
            @endforeach
        </nav>
    </div>

    {{-- Mobile full search overlay --}}
    <div data-mobile-search class="fixed inset-0 z-50 hidden bg-white lg:hidden">
        <div class="flex items-center gap-2 border-b border-neutral-200 px-4 py-3">
            <button type="button" data-search-close class="inline-flex size-10 items-center justify-center rounded-md text-neutral-600 hover:bg-neutral-100" aria-label="Close search">
                <x-icon name="x" class="size-5" />
            </button>
            <div class="relative flex-1">
                <x-icon name="search" class="pointer-events-none absolute left-3.5 top-1/2 size-4 -translate-y-1/2 text-neutral-400" />
                <input type="search" data-search-input-mobile autocomplete="off" autofocus placeholder="Search products or ask BitMart AI…"
                    class="h-11 w-full rounded-full border border-neutral-300 bg-neutral-100/70 pl-10 pr-12 text-sm text-neutral-800 placeholder:text-neutral-400 focus:border-primary-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-600/30">
                <div class="pointer-events-none absolute right-2 top-1/2 flex -translate-y-1/2 items-center rounded-full bg-ai-100 px-2 py-1">
                    <x-icon name="sparkles" class="size-3 text-ai-600" />
                </div>
            </div>
        </div>
        <div class="space-y-5 overflow-y-auto px-4 py-5 pb-24">
            <div>
                <p class="mb-2.5 flex items-center gap-1.5 text-xs font-semibold uppercase tracking-wide text-neutral-500"><x-icon name="clock" class="size-3.5" />Recent</p>
                <div class="flex flex-wrap gap-2">
                    @foreach(['Panjabi', 'Sneakers', 'Kurti'] as $s)
                        <button data-search-term="{{ $s }}" class="rounded-full bg-neutral-100 px-3.5 py-2 text-sm font-medium text-neutral-700">{{ $s }}</button>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="mb-2.5 flex items-center gap-1.5 text-xs font-semibold uppercase tracking-wide text-ai-700"><x-icon name="sparkles" class="size-3.5" />Try searching like this</p>
                <div class="space-y-2">
                    @foreach([
                        'Find a black T-shirt under ৳1,500',
                        'Office shirt for summer',
                        'Gift for my brother under ৳2,000',
                        'Show me popular sneakers',
                    ] as $ex)
                        <button data-ai-prompt="{{ $ex }}" class="flex w-full items-center gap-2.5 rounded-xl bg-ai-50 px-3.5 py-3 text-left text-sm font-medium text-ai-700 transition active:bg-ai-100">
                            <x-icon name="sparkles" class="size-4 shrink-0" />
                            {{ $ex }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Mobile categories drawer --}}
    <div data-menu-panel class="fixed inset-0 z-50 hidden lg:hidden">
        <div class="absolute inset-0 bg-neutral-950/50" data-menu-close></div>
        <div class="absolute inset-y-0 left-0 w-[85%] max-w-sm bg-white shadow-lg">
            <div class="flex items-center justify-between border-b border-neutral-200 px-4 py-4">
                <span class="text-base font-bold text-neutral-900">Categories</span>
                <button type="button" data-menu-close class="inline-flex size-9 items-center justify-center rounded-md text-neutral-500 hover:bg-neutral-100" aria-label="Close menu">
                    <x-icon name="x" class="size-5" />
                </button>
            </div>
            <nav class="space-y-0.5 overflow-y-auto px-2 py-2">
                @foreach ([
                    'Men\'s Fashion' => 'shirt',
                    'Women\'s Fashion' => 'gem',
                    'Kids' => 'baby',
                    'Electronics' => 'smartphone',
                    'Beauty & Care' => 'leaf',
                    'Home & Living' => 'lamp',
                    'Footwear' => 'footprints',
                    'Accessories' => 'watch',
                ] as $cat => $icon)
                    <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-3 text-sm font-medium text-neutral-700 transition hover:bg-primary-50">
                        <span class="flex size-9 items-center justify-center rounded-md bg-neutral-100 text-neutral-500"><x-icon :name="$icon" class="size-4.5" /></span>
                        {{ $cat }}
                        <x-icon name="chevron-right" class="ml-auto size-4 text-neutral-400" />
                    </a>
                @endforeach
            </nav>
        </div>
    </div>
</header>
