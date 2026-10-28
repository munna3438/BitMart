<x-layouts.app title="Order Confirmed — BitMart" description="Your BitMart order has been confirmed.">

    <div class="mx-auto w-full max-w-[1320px] px-4 py-6 md:px-6 lg:px-8 lg:py-10">
        <div class="mx-auto max-w-5xl">

            {{-- Confirmation hero --}}
            <section class="rounded-xl border border-neutral-200 bg-white p-6 text-center shadow-xs sm:p-8">
                <span class="mx-auto flex size-14 items-center justify-center rounded-full bg-success-700 text-white">
                    <x-icon name="circle-check" class="size-7" />
                </span>

                <h1 class="mt-4 text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-3xl">Order confirmed</h1>
                <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-neutral-600 sm:text-base">
                    Thanks for shopping with BitMart. We sent the order details to your email and phone.
                </p>

                <div class="mt-6 grid gap-3 sm:grid-cols-3">
                    @foreach([
                        ['Order number', $order['number'], 'receipt'],
                        ['Total paid', '৳' . number_format($order['summary']['total']), 'banknote'],
                        ['Payment', $order['paymentMethod'] . ' · ' . $order['paymentStatus'], 'check'],
                    ] as [$label, $value, $icon])
                        <div class="flex items-center gap-3 rounded-lg border border-neutral-200 bg-neutral-50 px-4 py-3 text-left">
                            <x-icon :name="$icon" class="size-4.5 shrink-0 text-primary-700" />
                            <div class="min-w-0">
                                <p class="text-[11px] font-semibold uppercase tracking-wide text-neutral-500">{{ $label }}</p>
                                <p class="mt-0.5 truncate text-sm font-bold text-neutral-900">{{ $value }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <p class="mt-4 font-bengali text-[15px] leading-[1.65] text-neutral-500">অর্ডার নিশ্চিত হয়েছে — ধন্যবাদ!</p>
            </section>

            <div class="mt-6 grid gap-6 lg:grid-cols-[minmax(0,1fr)_360px]">

                {{-- Left: progress + items --}}
                <div class="space-y-6">

                    <section class="rounded-xl border border-neutral-200 bg-white p-5 shadow-xs sm:p-6">
                        <div class="flex items-center justify-between gap-4">
                            <h2 class="text-base font-bold text-neutral-900">Order progress</h2>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-primary-50 px-2.5 py-1 text-[11px] font-semibold text-primary-800">
                                <x-icon name="package" class="size-3" />{{ $order['status'] }}
                            </span>
                        </div>

                        <ol class="mt-5">
                            @foreach ($order['timeline'] as $step)
                                <li class="relative flex gap-3 {{ $loop->last ? '' : 'pb-5' }}">
                                    @unless ($loop->last)
                                        <span class="absolute bottom-0 left-[13px] top-7 w-px bg-neutral-200" aria-hidden="true"></span>
                                    @endunless
                                    <span class="relative z-10 flex size-7 shrink-0 items-center justify-center rounded-full {{ $step['done'] ? 'bg-primary-700 text-white' : 'border-2 border-neutral-300 bg-white text-neutral-400' }}">
                                        @if ($step['done'])
                                            <x-icon name="check" class="size-3.5" />
                                        @else
                                            <span class="size-1.5 rounded-full bg-neutral-300"></span>
                                        @endif
                                    </span>
                                    <div class="min-w-0 flex-1">
                                        <div class="flex flex-wrap items-center justify-between gap-2">
                                            <p class="text-sm font-semibold {{ $step['done'] ? 'text-neutral-900' : 'text-neutral-500' }}">{{ $step['label'] }}</p>
                                            <span class="text-[11px] font-semibold {{ $step['done'] ? 'text-success-700' : 'text-neutral-400' }}">
                                                {{ $step['done'] ? 'Done' : 'Upcoming' }}
                                            </span>
                                        </div>
                                        <p class="mt-0.5 text-xs text-neutral-500">{{ $step['at'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ol>

                        <div class="mt-5 flex items-start gap-2.5 rounded-lg bg-primary-50 p-4 text-sm text-primary-900">
                            <x-icon name="truck" class="mt-0.5 size-4.5 shrink-0 text-primary-700" />
                            <span>Expected delivery <strong>{{ $order['eta'] }}</strong>. We will send a message when your order ships.</span>
                        </div>
                    </section>

                    <section class="rounded-xl border border-neutral-200 bg-white p-5 shadow-xs sm:p-6">
                        <h2 class="text-base font-bold text-neutral-900">Items in this order</h2>

                        <ul class="mt-4 divide-y divide-neutral-100">
                            @foreach ($order['lines'] as $line)
                                <li class="flex items-center gap-4 py-3 first:pt-0 last:pb-0">
                                    <x-product-thumb :icon="$line['icon']" :image="$line['image'] ?? null" :tint="$line['tint']" class="size-14 rounded-lg" icon-class="size-6" />
                                    <div class="min-w-0 flex-1">
                                        <a href="{{ route('products.show', $line['slug']) }}" class="line-clamp-1 text-sm font-medium text-neutral-900 transition hover:text-primary-700">{{ $line['name'] }}</a>
                                        <p class="mt-0.5 text-xs text-neutral-500">Size {{ $line['size'] }} · {{ $line['color'] }} · Qty {{ $line['quantity'] }}</p>
                                    </div>
                                    <span class="shrink-0 text-sm font-semibold tabular-nums text-neutral-900">৳{{ number_format($line['lineTotal']) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </section>

                    <section class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-xl border border-neutral-200 bg-white p-5 shadow-xs">
                            <div class="flex items-center gap-2 text-sm font-bold text-neutral-900">
                                <x-icon name="map-pin" class="size-4 text-primary-700" />
                                Delivery address
                            </div>
                            <address class="mt-3 text-sm not-italic leading-relaxed text-neutral-600">
                                <span class="block font-semibold text-neutral-900">{{ $order['address']['name'] }}</span>
                                {{ $order['address']['line'] }}<br>
                                {{ $order['address']['area'] }}<br>
                                {{ $order['address']['phone'] }}
                            </address>
                            <button type="button" class="mt-3 inline-flex items-center gap-1.5 text-xs font-semibold text-primary-700 transition hover:text-primary-800">
                                <x-icon name="pencil" class="size-3.5" />
                                Edit address
                            </button>
                        </div>

                        <div class="rounded-xl border border-neutral-200 bg-white p-5 shadow-xs">
                            <div class="flex items-center gap-2 text-sm font-bold text-neutral-900">
                                <x-icon name="shield-check" class="size-4 text-primary-700" />
                                Payment
                            </div>
                            <dl class="mt-3 space-y-2 text-sm">
                                <div class="flex items-center justify-between gap-3">
                                    <dt class="text-neutral-500">Method</dt>
                                    <dd class="font-medium text-neutral-900">{{ $order['paymentMethod'] }}</dd>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <dt class="text-neutral-500">Status</dt>
                                    <dd class="inline-flex items-center gap-1 font-medium text-success-700">
                                        <x-icon name="check" class="size-3.5" />{{ $order['paymentStatus'] }}
                                    </dd>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <dt class="text-neutral-500">Placed</dt>
                                    <dd class="font-medium text-neutral-900">{{ $order['placedAt'] }}</dd>
                                </div>
                            </dl>
                        </div>
                    </section>
                </div>

                {{-- Right: totals + actions --}}
                <div class="space-y-4">
                    <x-order-summary :lines="$order['lines']" :summary="$order['summary']" title="Payment summary" :show-items="false">
                        <x-slot:actions>
                            <a href="{{ route('cart.index') }}" class="inline-flex h-12 w-full items-center justify-center gap-2 rounded-lg bg-primary-700 px-6 text-sm font-semibold text-white shadow-sm transition hover:bg-primary-800 active:scale-[0.99]">
                                Continue shopping
                                <x-icon name="arrow-right" class="size-4" />
                            </a>
                            <div class="grid grid-cols-2 gap-2.5">
                                <button type="button" class="inline-flex h-10 items-center justify-center gap-1.5 rounded-lg border border-neutral-300 bg-white text-sm font-semibold text-neutral-800 transition hover:bg-neutral-50">
                                    <x-icon name="printer" class="size-4" />
                                    Invoice
                                </button>
                                <button type="button" class="inline-flex h-10 items-center justify-center gap-1.5 rounded-lg border border-neutral-300 bg-white text-sm font-semibold text-neutral-800 transition hover:bg-neutral-50">
                                    <x-icon name="package" class="size-4" />
                                    Track order
                                </button>
                            </div>
                        </x-slot:actions>
                    </x-order-summary>

                    <button type="button" data-ai-trigger class="flex w-full items-center gap-3 rounded-xl border border-ai-200 bg-ai-50 p-4 text-left transition hover:bg-ai-100">
                        <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-white text-ai-600">
                            <x-icon name="sparkles" class="size-4.5" />
                        </span>
                        <span class="min-w-0">
                            <span class="block text-sm font-bold text-ai-700">Need help with this order?</span>
                            <span class="mt-0.5 block text-xs text-ai-800">Ask BitMart AI about delivery, returns or payments.</span>
                        </span>
                    </button>

                    <div class="rounded-xl border border-neutral-200 bg-white p-5 shadow-xs">
                        <div class="flex items-center gap-2 text-sm font-bold text-neutral-900">
                            <x-icon name="headphones" class="size-4 text-primary-700" />
                            Customer support
                        </div>
                        <p class="mt-2 text-xs leading-relaxed text-neutral-500">
                            Our team is available 9 AM – 9 PM, every day. Quote order number {{ $order['number'] }} when you contact us.
                        </p>
                        <div class="mt-3 flex flex-col gap-2">
                            <a href="tel:09612-000-000" class="inline-flex h-10 items-center gap-2 rounded-lg border border-neutral-300 bg-white px-3.5 text-sm font-semibold text-neutral-800 transition hover:bg-neutral-50">
                                <x-icon name="phone" class="size-4" />
                                09612-000-000
                            </a>
                            <a href="mailto:support@bitmart.com" class="inline-flex h-10 items-center gap-2 rounded-lg border border-neutral-300 bg-white px-3.5 text-sm font-semibold text-neutral-800 transition hover:bg-neutral-50">
                                <x-icon name="mail" class="size-4" />
                                support@bitmart.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
