<x-layouts.app title="Shopping Cart — BitMart" description="Review the items in your BitMart cart and continue to checkout.">

    <div class="mx-auto w-full max-w-[1320px] px-4 py-6 md:px-6 lg:px-8 lg:py-10">

        <x-breadcrumb :items="[
            ['label' => 'Home', 'href' => '/'],
            ['label' => 'Shopping Cart'],
        ]" />

        <div class="mb-6 flex items-end justify-between gap-4">
            <div>
                <h1 class="text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-3xl">Shopping Cart</h1>
                <p class="mt-1.5 text-sm text-neutral-500" data-cart-count>{{ count($lines) }} items · Prices include all taxes</p>
            </div>
            <a href="/" class="hidden shrink-0 items-center gap-1 text-sm font-semibold text-primary-700 transition hover:text-primary-800 sm:inline-flex">
                Continue shopping
                <x-icon name="arrow-right" class="size-4" />
            </a>
        </div>

        <div class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_380px] lg:gap-8">

            {{-- Items --}}
            <div>
                <div class="space-y-3" data-cart-items>
                    @foreach ($lines as $line)
                        <article class="rounded-xl border border-neutral-200 bg-white p-4" data-cart-row data-price="{{ $line['price'] }}">
                            <div class="flex gap-4">
                                <x-product-thumb :icon="$line['icon']" :image="$line['image'] ?? null" :tint="$line['tint']" class="size-20 rounded-lg sm:size-24" icon-class="size-8" />

                                <div class="min-w-0 flex-1">
                                    <div class="flex items-start justify-between gap-3">
                                        <div class="min-w-0">
                                            <a href="{{ route('products.show', $line['slug']) }}" class="line-clamp-2 text-sm font-semibold leading-snug text-neutral-900 transition hover:text-primary-700">
                                                {{ $line['name'] }}
                                            </a>
                                            <p class="mt-1 text-xs text-neutral-500">Size {{ $line['size'] }} · {{ $line['color'] }}</p>
                                            <p class="mt-0.5 text-xs text-neutral-400">In stock · ships in 1–2 days</p>
                                        </div>

                                        <button
                                            type="button"
                                            data-cart-remove
                                            class="inline-flex size-9 shrink-0 items-center justify-center rounded-md text-neutral-400 transition hover:bg-error-50 hover:text-error-700"
                                            aria-label="Remove {{ $line['name'] }} from cart"
                                        >
                                            <x-icon name="trash" class="size-4" />
                                        </button>
                                    </div>

                                    <div class="mt-3 flex flex-wrap items-center justify-between gap-3">
                                        <div class="inline-flex items-center rounded-md border border-neutral-300">
                                            <button type="button" data-cart-minus class="inline-flex size-11 items-center justify-center rounded-l-md text-neutral-600 transition hover:bg-neutral-100" aria-label="Decrease quantity">
                                                <x-icon name="minus" class="size-4" />
                                            </button>
                                            <input
                                                type="number"
                                                data-cart-qty
                                                value="{{ $line['quantity'] }}"
                                                min="1"
                                                max="10"
                                                inputmode="numeric"
                                                aria-label="Quantity of {{ $line['name'] }}"
                                                class="h-11 w-14 border-x border-neutral-300 bg-white text-center text-sm font-semibold tabular-nums text-neutral-900 focus:outline-none"
                                            >
                                            <button type="button" data-cart-plus class="inline-flex size-11 items-center justify-center rounded-r-md text-neutral-600 transition hover:bg-neutral-100" aria-label="Increase quantity">
                                                <x-icon name="plus" class="size-4" />
                                            </button>
                                        </div>

                                        <div class="text-right">
                                            <p class="text-base font-bold tabular-nums text-neutral-900" data-cart-line-total>৳{{ number_format($line['lineTotal']) }}</p>
                                            <p class="text-xs tabular-nums text-neutral-500">৳{{ number_format($line['price']) }} each</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Empty state --}}
                <div data-cart-empty class="hidden rounded-xl border border-dashed border-neutral-300 bg-white p-10 text-center">
                    <span class="mx-auto mb-4 flex size-14 items-center justify-center rounded-full bg-primary-50 text-primary-700">
                        <x-icon name="cart" class="size-7" />
                    </span>
                    <h2 class="text-lg font-bold text-neutral-900">Your cart is empty</h2>
                    <p class="mx-auto mt-2 max-w-sm text-sm leading-relaxed text-neutral-500">
                        Browse the catalogue and add products you like — they will show up here.
                    </p>
                    <a href="/" class="mt-6 inline-flex h-12 items-center justify-center gap-2 rounded-lg bg-primary-700 px-6 text-sm font-semibold text-white shadow-sm transition hover:bg-primary-800">
                        Start shopping
                        <x-icon name="arrow-right" class="size-4" />
                    </a>
                </div>

                {{-- Coupon --}}
                <div class="mt-4 rounded-xl border border-neutral-200 bg-white p-4 sm:p-5">
                    <div class="flex items-center gap-2">
                        <x-icon name="tag" class="size-4 text-primary-700" />
                        <label for="coupon" class="text-sm font-semibold text-neutral-900">Have a promo code?</label>
                    </div>

                    <div class="mt-3 flex gap-2">
                        <input
                            type="text"
                            id="coupon"
                            data-coupon-input
                            autocomplete="off"
                            placeholder="Enter promo code"
                            class="h-11 flex-1 rounded-md border border-neutral-300 bg-white px-3.5 text-sm text-neutral-800 placeholder:text-neutral-400 focus:border-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-600/30"
                        >
                        <button type="button" data-coupon-apply class="inline-flex h-11 shrink-0 items-center justify-center rounded-md bg-neutral-900 px-5 text-sm font-semibold text-white transition hover:bg-neutral-800">
                            Apply
                        </button>
                    </div>

                    <p data-coupon-message class="mt-2 hidden text-xs font-medium" role="alert"></p>
                    <p class="mt-2 text-xs text-neutral-500">
                        Try
                        <button type="button" data-coupon-fill="EID2026" class="font-semibold text-primary-700 transition hover:text-primary-800 hover:underline">EID2026</button>
                        for 10% off your order.
                    </p>
                </div>

                <div class="mt-5 flex items-center justify-between gap-4">
                    <a href="/" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary-700 transition hover:text-primary-800">
                        <x-icon name="chevron-left" class="size-4" />
                        Continue shopping
                    </a>
                    <p class="text-xs text-neutral-500">Items are reserved for this session.</p>
                </div>
            </div>

            {{-- Summary --}}
            <div class="lg:sticky lg:top-24 lg:self-start" data-cart-summary>
                <x-order-summary :lines="$lines" :summary="$summary" title="Order Summary" :show-items="false">
                    <x-slot:actions>
                        <a href="{{ route('checkout.index') }}" class="inline-flex h-12 w-full items-center justify-center gap-2 rounded-lg bg-primary-700 px-6 text-sm font-semibold text-white shadow-sm transition hover:bg-primary-800 active:scale-[0.99]">
                            <x-icon name="lock" class="size-4" />
                            Proceed to Checkout
                        </a>
                        <a href="/" class="inline-flex h-10 w-full items-center justify-center text-sm font-semibold text-primary-700 transition hover:text-primary-800">
                            Continue shopping
                        </a>
                    </x-slot:actions>

                    <div class="mt-5 space-y-2.5 border-t border-neutral-200 pt-4">
                        <div class="flex items-start gap-2.5 text-sm text-neutral-600">
                            <x-icon name="truck" class="mt-0.5 size-4 shrink-0 text-primary-700" />
                            <span data-delivery-note>Free delivery unlocked on this order.</span>
                        </div>
                        <div class="flex items-start gap-2.5 text-sm text-neutral-600">
                            <x-icon name="rotate-ccw" class="mt-0.5 size-4 shrink-0 text-primary-700" />
                            <span>7-day easy return on eligible items</span>
                        </div>
                        <div class="flex items-start gap-2.5 text-sm text-neutral-600">
                            <x-icon name="shield-check" class="mt-0.5 size-4 shrink-0 text-primary-700" />
                            <span>Secure payment — bKash, Nagad, card or COD</span>
                        </div>
                    </div>
                </x-order-summary>
            </div>
        </div>
    </div>

    {{-- Suggestions --}}
    <section class="border-t border-neutral-200 bg-neutral-50">
        <div class="mx-auto w-full max-w-[1320px] px-4 py-12 md:px-6 md:py-16 lg:px-8">
            <div class="mb-8 flex items-end justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-3xl">Frequently bought together</h2>
                    <p class="mt-1.5 text-sm text-neutral-500">Popular picks that pair well with your cart</p>
                </div>
                <a href="/" class="inline-flex shrink-0 items-center gap-1 text-sm font-semibold text-primary-700 transition hover:text-primary-800">
                    View all
                    <x-icon name="arrow-right" class="size-4" />
                </a>
            </div>

            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                @foreach ($suggestions as $suggestion)
                    <x-product-card
                        :href="route('products.show', $suggestion['slug'])"
                        :name="$suggestion['name']"
                        :price="$suggestion['price']"
                        :original-price="$suggestion['originalPrice']"
                        :rating="$suggestion['rating']"
                        :reviews="$suggestion['reviews']"
                        :icon="$suggestion['icon']"
                        :tint="$suggestion['tint']"
                    />
                @endforeach
            </div>
        </div>
    </section>

</x-layouts.app>
