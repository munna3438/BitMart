<x-layouts.app :title="$product['name'] . ' — BitMart'" :description="$product['short']">

    <div class="mx-auto w-full max-w-[1320px] px-4 py-6 md:px-6 lg:px-8 lg:py-10">

        <x-breadcrumb :items="[
            ['label' => 'Home', 'href' => '/'],
            ['label' => $product['category'], 'href' => '#'],
            ['label' => $product['name']],
        ]" />

        <div class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_400px] lg:gap-12 xl:grid-cols-[minmax(0,1fr)_440px]">

            {{-- Gallery --}}
            <div class="lg:col-start-1 lg:row-start-1">
                <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white shadow-xs">
                    <div class="relative flex aspect-[4/3] items-center justify-center bg-primary-50 text-primary-700">
                        <x-icon :name="$product['icon']" class="size-32 opacity-80" />

                        @if ($product['badge'])
                            <span class="absolute left-4 top-4 inline-flex items-center gap-1.5 rounded-full bg-white px-3 py-1.5 text-xs font-semibold text-neutral-800 shadow-sm">
                                <x-icon name="star" filled class="size-3.5 text-warning-500" />
                                {{ $product['badge'] }}
                            </span>
                        @endif

                        <button
                            type="button"
                            data-wishlist
                            class="absolute right-4 top-4 inline-flex size-10 items-center justify-center rounded-full bg-white/90 text-neutral-500 shadow-xs backdrop-blur transition hover:text-error-600"
                            aria-label="Add to wishlist"
                        >
                            <x-icon name="heart" filled class="size-5" />
                        </button>
                    </div>
                </div>

                <div class="mt-3 grid grid-cols-4 gap-3">
                    @foreach([
                        ['primary', $product['icon']],
                        ['secondary', $product['icon']],
                        ['info', $product['icon']],
                        ['neutral', $product['icon']],
                    ] as [$thumbTint, $thumbIcon])
                        <button type="button" class="group overflow-hidden rounded-lg border border-neutral-200 bg-white transition hover:border-primary-200 hover:shadow-sm" aria-label="View product image {{ $loop->iteration }}">
                            <x-product-thumb
                                :icon="$thumbIcon"
                                :tint="$thumbTint"
                                class="aspect-[4/3]"
                                icon-class="size-8 opacity-80 transition-transform duration-300 group-hover:scale-110"
                            />
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- Buy box --}}
            <div class="lg:col-start-2 lg:row-start-1 lg:row-span-2">
                <div class="space-y-4 lg:sticky lg:top-24">

                    <div class="rounded-xl border border-neutral-200 bg-white p-5 shadow-xs sm:p-6">
                        <div class="flex items-center justify-between gap-3">
                            <span class="text-xs font-semibold uppercase tracking-wide text-neutral-500">{{ $product['brand'] }}</span>
                            @if ($product['badge'])
                                <span class="inline-flex items-center gap-1 rounded-full bg-primary-50 px-2.5 py-1 text-[11px] font-semibold text-primary-800">
                                    <x-icon name="check" class="size-3" />{{ $product['badge'] }}
                                </span>
                            @endif
                        </div>

                        <h1 class="mt-2 text-xl font-semibold leading-snug tracking-tight text-neutral-900 sm:text-2xl">{{ $product['name'] }}</h1>

                        <div class="mt-2 flex flex-wrap items-center gap-x-3 gap-y-1.5 text-sm text-neutral-500">
                            <span class="inline-flex items-center gap-1">
                                <x-icon name="star" filled class="size-4 text-warning-500" />
                                <span class="font-semibold text-neutral-700">{{ $product['rating'] }}</span>
                            </span>
                            <span>({{ number_format($product['reviews']) }} reviews)</span>
                            <span class="inline-flex items-center gap-1 rounded-full bg-primary-50 px-2 py-0.5 text-[11px] font-semibold text-primary-800">
                                <x-icon name="shield-check" class="size-3" />Verified reviews
                            </span>
                        </div>

                        <div class="mt-4 flex flex-wrap items-baseline gap-2">
                            <span class="text-2xl font-bold tracking-tight text-neutral-900">৳{{ number_format($product['price']) }}</span>
                            @if ($product['originalPrice'])
                                <span class="text-sm text-neutral-400 line-through">৳{{ number_format($product['originalPrice']) }}</span>
                                @if ($discount)
                                    <span class="rounded-md bg-error-50 px-1.5 py-0.5 text-xs font-bold text-error-700">-{{ $discount }}%</span>
                                @endif
                            @endif
                        </div>
                        <p class="mt-1 text-xs text-neutral-500">Price includes all taxes</p>

                        <div class="mt-4 flex items-center gap-2 text-sm font-medium text-warning-700">
                            <x-icon name="zap" class="size-4" />
                            Only {{ $product['stock'] }} left in stock
                        </div>

                        {{-- Colours --}}
                        @php
                            $swatches = ['bg-primary-200', 'bg-secondary-500', 'bg-neutral-300', 'bg-info-100'];
                        @endphp
                        <div class="mt-6">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-semibold text-neutral-900">Colour: <span data-color-label class="font-medium text-neutral-600">{{ $product['colors'][0] }}</span></p>
                            </div>
                            <div class="mt-2.5 flex flex-wrap gap-2">
                                @foreach ($product['colors'] as $index => $color)
                                    <button
                                        type="button"
                                        data-color-option="{{ $color }}"
                                        @if ($loop->first) data-selected="true" @endif
                                        class="inline-flex h-10 items-center gap-2 rounded-md border border-neutral-300 px-3.5 text-sm font-medium text-neutral-700 transition hover:border-neutral-400 data-[selected=true]:border-primary-600 data-[selected=true]:bg-primary-50 data-[selected=true]:text-primary-800"
                                    >
                                        <span class="size-3.5 rounded-full border border-neutral-300 {{ $swatches[$index % count($swatches)] }}"></span>
                                        {{ $color }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        {{-- Sizes --}}
                        <div class="mt-6">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-semibold text-neutral-900">Size: <span data-size-label class="font-medium text-neutral-600">{{ $product['sizes'][0] }}</span></p>
                                <button type="button" class="text-xs font-semibold text-primary-700 transition hover:text-primary-800 hover:underline">Size guide</button>
                            </div>
                            <div class="mt-2.5 flex flex-wrap gap-2">
                                @foreach ($product['sizes'] as $size)
                                    <button
                                        type="button"
                                        data-size-option="{{ $size }}"
                                        @if ($loop->first) data-selected="true" @endif
                                        class="inline-flex h-10 min-w-12 items-center justify-center rounded-md border border-neutral-300 px-3.5 text-sm font-medium text-neutral-700 transition hover:border-neutral-400 data-[selected=true]:border-primary-600 data-[selected=true]:bg-primary-50 data-[selected=true]:text-primary-800"
                                    >
                                        {{ $size }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        {{-- Quantity --}}
                        <div class="mt-6">
                            <p class="text-sm font-semibold text-neutral-900">Quantity</p>
                            <div class="mt-2.5 inline-flex items-center rounded-md border border-neutral-300">
                                <button type="button" data-qty-minus class="inline-flex size-11 items-center justify-center rounded-l-md text-neutral-600 transition hover:bg-neutral-100" aria-label="Decrease quantity">
                                    <x-icon name="minus" class="size-4" />
                                </button>
                                <input
                                    type="number"
                                    data-qty-input
                                    value="1"
                                    min="1"
                                    max="10"
                                    inputmode="numeric"
                                    aria-label="Quantity"
                                    class="h-11 w-14 border-x border-neutral-300 bg-white text-center text-sm font-semibold tabular-nums text-neutral-900 focus:outline-none"
                                >
                                <button type="button" data-qty-plus class="inline-flex size-11 items-center justify-center rounded-r-md text-neutral-600 transition hover:bg-neutral-100" aria-label="Increase quantity">
                                    <x-icon name="plus" class="size-4" />
                                </button>
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="mt-6 flex gap-2.5">
                            <button
                                type="button"
                                data-add-to-cart
                                data-pdp-add
                                class="inline-flex h-12 flex-1 items-center justify-center gap-2 rounded-lg bg-primary-700 px-5 text-sm font-semibold text-white shadow-sm transition hover:bg-primary-800 active:scale-[0.99]"
                            >
                                <x-icon name="cart" class="size-4.5" />
                                Add to Cart
                            </button>
                            <a
                                href="{{ route('checkout.index') }}"
                                data-pdp-buy
                                class="inline-flex h-12 items-center justify-center gap-2 rounded-lg border border-neutral-300 bg-white px-5 text-sm font-semibold text-neutral-800 transition hover:bg-neutral-50"
                            >
                                Buy Now
                            </a>
                            <button
                                type="button"
                                data-wishlist
                                class="inline-flex size-12 items-center justify-center rounded-lg border border-neutral-300 bg-white text-neutral-600 transition hover:border-error-600 hover:text-error-600"
                                aria-label="Add to wishlist"
                            >
                                <x-icon name="heart" class="size-5" />
                            </button>
                        </div>

                        <ul class="mt-6 space-y-2.5 border-t border-neutral-200 pt-5 text-sm text-neutral-600">
                            <li class="flex items-start gap-2.5">
                                <x-icon name="truck" class="mt-0.5 size-4.5 shrink-0 text-primary-700" />
                                <span>{{ $product['delivery'] }} · Free delivery over ৳2,000</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <x-icon name="rotate-ccw" class="mt-0.5 size-4.5 shrink-0 text-primary-700" />
                                <span>7-day easy return on eligible items</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <x-icon name="banknote" class="mt-0.5 size-4.5 shrink-0 text-primary-700" />
                                <span>Cash on Delivery available</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <x-icon name="shield-check" class="mt-0.5 size-4.5 shrink-0 text-primary-700" />
                                <span>Secure payment — bKash, Nagad or card</span>
                            </li>
                        </ul>

                        <p class="mt-4 font-bengali text-[15px] leading-[1.65] text-neutral-500">ঢাকায় ডেলিভারি ১–৩ দিন · সারা বাংলাদেশে ২–৫ দিন</p>
                    </div>

                    {{-- AI nudge --}}
                    <div class="rounded-xl border border-ai-200 bg-ai-50 p-4">
                        <div class="flex items-start gap-3">
                            <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-white text-ai-600">
                                <x-icon name="sparkles" class="size-4.5" />
                            </span>
                            <div class="min-w-0">
                                <p class="text-sm font-bold text-ai-700">Need help choosing?</p>
                                <p class="mt-1 text-xs leading-relaxed text-ai-800">Ask BitMart AI about fit, fabric and the right size for you.</p>
                                <button type="button" data-ai-trigger class="mt-3 inline-flex h-9 items-center gap-1.5 rounded-lg bg-ai-600 px-4 text-xs font-semibold text-white transition hover:bg-ai-700">
                                    <x-icon name="sparkles" class="size-3.5" />
                                    Ask BitMart AI
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Trust grid --}}
                    <div class="grid grid-cols-2 gap-2.5">
                        @foreach([
                            ['shield-check', 'Secure payment', 'Protected checkout'],
                            ['rotate-ccw', 'Easy returns', '7-day return window'],
                            ['truck', 'Fast delivery', 'Across Bangladesh'],
                            ['headphones', 'Support', '24/7 customer care'],
                        ] as [$icon, $title, $sub])
                            <div class="rounded-xl border border-neutral-200 bg-white p-3.5">
                                <x-icon :name="$icon" class="size-5 text-primary-700" />
                                <p class="mt-2 text-xs font-bold text-neutral-900">{{ $title }}</p>
                                <p class="mt-0.5 text-[11px] text-neutral-500">{{ $sub }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Details --}}
            <div class="lg:col-start-1 lg:row-start-2">
                <div data-tabs>
                    <div class="border-b border-neutral-200">
                        <nav class="flex gap-6 overflow-x-auto no-scrollbar" role="tablist" aria-label="Product information">
                            @foreach(['description' => 'Description', 'specifications' => 'Specifications', 'delivery' => 'Delivery & Returns'] as $key => $label)
                                <button
                                    type="button"
                                    role="tab"
                                    data-tab="{{ $key }}"
                                    @if ($loop->first) data-selected="true" aria-selected="true" @endif
                                    class="shrink-0 border-b-2 border-transparent pb-3 text-sm font-semibold text-neutral-500 transition hover:text-neutral-800 data-[selected=true]:border-primary-700 data-[selected=true]:text-neutral-900"
                                >
                                    {{ $label }}
                                </button>
                            @endforeach
                        </nav>
                    </div>

                    <div data-tab-panel="description" class="py-6">
                        <p class="max-w-3xl text-sm leading-relaxed text-neutral-600">{{ $product['description'] }}</p>

                        <h3 class="mt-6 text-sm font-bold text-neutral-900">Highlights</h3>
                        <ul class="mt-3 grid gap-2 sm:grid-cols-2">
                            @foreach ($product['highlights'] as $highlight)
                                <li class="flex items-start gap-2.5 text-sm text-neutral-600">
                                    <x-icon name="check" class="mt-0.5 size-4 shrink-0 text-primary-700" />
                                    {{ $highlight }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div data-tab-panel="specifications" class="hidden py-6">
                        <dl class="max-w-2xl divide-y divide-neutral-100 overflow-hidden rounded-xl border border-neutral-200">
                            @foreach ($product['specs'] as [$label, $value])
                                <div class="flex items-center justify-between gap-4 bg-white px-4 py-3 text-sm">
                                    <dt class="text-neutral-500">{{ $label }}</dt>
                                    <dd class="text-right font-medium text-neutral-900">{{ $value }}</dd>
                                </div>
                            @endforeach
                        </dl>
                    </div>

                    <div data-tab-panel="delivery" class="hidden py-6">
                        <div class="grid gap-3 sm:grid-cols-2">
                            @foreach([
                                ['truck', 'Delivery', 'Standard delivery in ' . $product['deliveryDays'] . '. Free over ৳2,000, otherwise ৳60.'],
                                ['rotate-ccw', 'Returns', '7-day easy return on eligible items. Items must be unworn with tags attached.'],
                                ['banknote', 'Cash on Delivery', 'Pay in cash when your order arrives, where COD is available.'],
                                ['shield-check', 'Secure payment', 'Payment details are never stored on BitMart servers.'],
                            ] as [$icon, $title, $body])
                                <div class="rounded-xl border border-neutral-200 bg-white p-4">
                                    <span class="flex size-9 items-center justify-center rounded-lg bg-primary-50 text-primary-700">
                                        <x-icon :name="$icon" class="size-4.5" />
                                    </span>
                                    <p class="mt-3 text-sm font-bold text-neutral-900">{{ $title }}</p>
                                    <p class="mt-1 text-xs leading-relaxed text-neutral-500">{{ $body }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Reviews --}}
                <div class="border-t border-neutral-200 pt-8">
                    <div class="mb-6 flex items-end justify-between gap-4">
                        <div>
                            <h2 class="text-xl font-extrabold tracking-tight text-neutral-900 sm:text-2xl">Ratings &amp; reviews</h2>
                            <p class="mt-1.5 text-sm text-neutral-500">Only customers who bought this item can review it.</p>
                        </div>
                        <button type="button" class="inline-flex h-10 shrink-0 items-center gap-1.5 rounded-lg border border-neutral-300 bg-white px-4 text-sm font-semibold text-neutral-800 transition hover:bg-neutral-50">
                            <x-icon name="pencil" class="size-4" />
                            Write a review
                        </button>
                    </div>

                    <div class="grid gap-4 md:grid-cols-[240px_minmax(0,1fr)]">
                        <div class="rounded-xl border border-neutral-200 bg-white p-5 text-center">
                            <p class="text-4xl font-extrabold tracking-tight text-neutral-900">{{ $product['rating'] }}</p>
                            <div class="mt-2 flex items-center justify-center gap-0.5">
                                @for ($i = 0; $i < 5; $i++)
                                    <x-icon name="star" filled class="size-4 text-warning-500" />
                                @endfor
                            </div>
                            <p class="mt-1.5 text-xs text-neutral-500">{{ number_format($product['reviews']) }} reviews</p>
                            <span class="mt-3 inline-flex items-center gap-1 rounded-full bg-primary-50 px-2.5 py-1 text-[11px] font-semibold text-primary-800">
                                <x-icon name="shield-check" class="size-3" />Verified reviews
                            </span>
                        </div>

                        <div class="space-y-2">
                            @foreach ([5, 4, 3, 2, 1] as $star)
                                <div class="flex items-center gap-3">
                                    <span class="w-3 text-xs text-neutral-600">{{ $star }}</span>
                                    <x-icon name="star" filled class="size-3.5 text-warning-500" />
                                    <div class="h-2 flex-1 overflow-hidden rounded-full bg-neutral-100">
                                        <div class="h-full rounded-full bg-warning-500" style="width: {{ $product['ratingBreakdown'][$star] }}%"></div>
                                    </div>
                                    <span class="w-9 text-right text-xs tabular-nums text-neutral-500">{{ $product['ratingBreakdown'][$star] }}%</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-5 space-y-3">
                        @foreach ($product['reviewsList'] as $review)
                            <article class="rounded-xl border border-neutral-200 bg-white p-4 sm:p-5">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="flex items-center gap-3">
                                        <span class="flex size-9 items-center justify-center rounded-full bg-primary-100 text-xs font-bold text-primary-800">
                                            {{ strtoupper(substr($review['name'], 0, 1)) }}
                                        </span>
                                        <div>
                                            <p class="text-sm font-semibold text-neutral-900">{{ $review['name'] }}</p>
                                            <div class="mt-0.5 flex items-center gap-1.5">
                                                <span class="inline-flex items-center gap-0.5">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <x-icon name="star" filled class="size-3 {{ $i < $review['rating'] ? 'text-warning-500' : 'text-neutral-200' }}" />
                                                    @endfor
                                                </span>
                                                <span class="text-xs text-neutral-500">{{ $review['date'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="hidden shrink-0 items-center gap-1 rounded-full bg-success-50 px-2 py-0.5 text-[11px] font-semibold text-success-700 sm:inline-flex">
                                        <x-icon name="check" class="size-3" />Verified purchase
                                    </span>
                                </div>
                                <p class="mt-3 text-sm font-bold text-neutral-900">{{ $review['title'] }}</p>
                                <p class="mt-1 text-sm leading-relaxed text-neutral-600">{{ $review['body'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Related --}}
    <section class="border-t border-neutral-200 bg-neutral-50">
        <div class="mx-auto w-full max-w-[1320px] px-4 py-12 md:px-6 md:py-16 lg:px-8">
            <div class="mb-8 flex items-end justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-3xl">You may also like</h2>
                    <p class="mt-1.5 text-sm text-neutral-500">Similar products shoppers picked</p>
                </div>
                <a href="{{ route('cart.index') }}" class="inline-flex shrink-0 items-center gap-1 text-sm font-semibold text-primary-700 transition hover:text-primary-800">
                    View cart
                    <x-icon name="arrow-right" class="size-4" />
                </a>
            </div>

            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                @foreach ($related as $relatedProduct)
                    <x-product-card
                        :href="route('products.show', $relatedProduct['slug'])"
                        :name="$relatedProduct['name']"
                        :price="$relatedProduct['price']"
                        :original-price="$relatedProduct['originalPrice']"
                        :rating="$relatedProduct['rating']"
                        :reviews="$relatedProduct['reviews']"
                        :icon="$relatedProduct['icon']"
                        :tint="$relatedProduct['tint']"
                    />
                @endforeach
            </div>
        </div>
    </section>

</x-layouts.app>
