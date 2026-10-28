<x-layouts.app title="Payment Failed — BitMart" description="Your BitMart payment could not be completed. Retry with another method.">

    <div class="mx-auto w-full max-w-[1320px] px-4 py-6 md:px-6 lg:px-8 lg:py-10">
        <div class="mx-auto max-w-5xl">

            {{-- Failure hero --}}
            <section class="rounded-xl border border-neutral-200 bg-white p-6 text-center shadow-xs sm:p-8">
                <span class="mx-auto flex size-14 items-center justify-center rounded-full bg-error-700 text-white">
                    <x-icon name="circle-alert" class="size-7" />
                </span>

                <h1 class="mt-4 text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-3xl">Payment failed</h1>
                <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-neutral-600 sm:text-base">
                    We could not complete the payment for order <span class="font-semibold text-neutral-900">{{ $order['number'] }}</span>.
                    No money has been taken from your account.
                </p>

                <div class="mx-auto mt-6 grid max-w-md gap-3 sm:grid-cols-2">
                    <div class="flex items-center gap-3 rounded-lg border border-neutral-200 bg-neutral-50 px-4 py-3 text-left">
                        <x-icon name="receipt" class="size-4.5 shrink-0 text-primary-700" />
                        <div class="min-w-0">
                            <p class="text-[11px] font-semibold uppercase tracking-wide text-neutral-500">Order number</p>
                            <p class="mt-0.5 text-sm font-bold text-neutral-900">{{ $order['number'] }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 rounded-lg border border-neutral-200 bg-neutral-50 px-4 py-3 text-left">
                        <x-icon name="banknote" class="size-4.5 shrink-0 text-primary-700" />
                        <div class="min-w-0">
                            <p class="text-[11px] font-semibold uppercase tracking-wide text-neutral-500">Amount due</p>
                            <p class="mt-0.5 text-sm font-bold text-neutral-900">৳{{ number_format($order['summary']['total']) }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex flex-col justify-center gap-2.5 sm:flex-row">
                    <a href="{{ route('checkout.index') }}" class="inline-flex h-12 items-center justify-center gap-2 rounded-lg bg-primary-700 px-6 text-sm font-semibold text-white shadow-sm transition hover:bg-primary-800 active:scale-[0.99]">
                        <x-icon name="rotate-ccw" class="size-4" />
                        Retry payment
                    </a>
                    <a href="{{ route('cart.index') }}" class="inline-flex h-12 items-center justify-center gap-2 rounded-lg border border-neutral-300 bg-white px-6 text-sm font-semibold text-neutral-800 transition hover:bg-neutral-50">
                        <x-icon name="cart" class="size-4" />
                        Back to cart
                    </a>
                </div>
            </section>

            <div class="mt-6 grid gap-6 lg:grid-cols-[minmax(0,1fr)_360px]">

                {{-- Left: explanation + actions --}}
                <div class="space-y-6">

                    <section class="rounded-xl border border-neutral-200 bg-white p-5 shadow-xs sm:p-6">
                        <h2 class="text-base font-bold text-neutral-900">What happened</h2>
                        <p class="mt-1.5 text-sm leading-relaxed text-neutral-600">
                            Your {{ $order['paymentMethod'] }} payment was declined, so the order was not confirmed.
                        </p>

                        <ul class="mt-4 space-y-2.5">
                            @foreach([
                                'Your account balance was not enough to cover the order total.',
                                'The transaction was declined by your mobile operator.',
                                'The payment request expired before it was completed.',
                            ] as $reason)
                                <li class="flex items-start gap-2.5 text-sm text-neutral-600">
                                    <x-icon name="info" class="mt-0.5 size-4 shrink-0 text-error-700" />
                                    {{ $reason }}
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-5 flex items-start gap-2.5 rounded-lg bg-info-50 p-4 text-sm text-info-700">
                            <x-icon name="info" class="mt-0.5 size-4.5 shrink-0" />
                            <span>Your cart is saved. Retry with the same method, switch to another one, or choose Cash on Delivery at checkout.</span>
                        </div>
                    </section>

                    <section class="rounded-xl border border-neutral-200 bg-white p-5 shadow-xs sm:p-6">
                        <h2 class="text-base font-bold text-neutral-900">What you can do</h2>

                        <div class="mt-4 space-y-2.5">
                            <a href="{{ route('checkout.index') }}" class="group flex items-start gap-3 rounded-lg border border-neutral-200 p-4 transition hover:border-primary-200 hover:bg-primary-50/40">
                                <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-primary-50 text-primary-700">
                                    <x-icon name="rotate-ccw" class="size-4.5" />
                                </span>
                                <span class="min-w-0 flex-1">
                                    <span class="block text-sm font-semibold text-neutral-900">Retry with the same method</span>
                                    <span class="mt-0.5 block text-xs text-neutral-500">Double-check your {{ $order['paymentMethod'] }} details and try again.</span>
                                </span>
                                <x-icon name="arrow-right" class="mt-1 size-4 shrink-0 text-neutral-400 transition group-hover:translate-x-0.5 group-hover:text-primary-700" />
                            </a>

                            <a href="{{ route('checkout.index') }}" class="group flex items-start gap-3 rounded-lg border border-neutral-200 p-4 transition hover:border-primary-200 hover:bg-primary-50/40">
                                <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-primary-50 text-primary-700">
                                    <x-icon name="card" class="size-4.5" />
                                </span>
                                <span class="min-w-0 flex-1">
                                    <span class="block text-sm font-semibold text-neutral-900">Change payment method</span>
                                    <span class="mt-0.5 block text-xs text-neutral-500">Pay with bKash, Nagad, card or Cash on Delivery instead.</span>
                                </span>
                                <x-icon name="arrow-right" class="mt-1 size-4 shrink-0 text-neutral-400 transition group-hover:translate-x-0.5 group-hover:text-primary-700" />
                            </a>

                            <button type="button" data-ai-trigger class="group flex w-full items-start gap-3 rounded-lg border border-ai-200 bg-ai-50 p-4 text-left transition hover:bg-ai-100">
                                <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-white text-ai-600">
                                    <x-icon name="sparkles" class="size-4.5" />
                                </span>
                                <span class="min-w-0 flex-1">
                                    <span class="block text-sm font-semibold text-ai-700">Ask BitMart AI</span>
                                    <span class="mt-0.5 block text-xs text-ai-800">Get help with payment, delivery and returns.</span>
                                </span>
                                <x-icon name="arrow-right" class="mt-1 size-4 shrink-0 text-ai-500 transition group-hover:translate-x-0.5" />
                            </button>
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
                </div>

                {{-- Right: summary + support --}}
                <div class="space-y-4">
                    <x-order-summary :lines="$order['lines']" :summary="$order['summary']" title="Order summary" :show-items="false" />

                    <div class="rounded-xl border border-neutral-200 bg-white p-5 shadow-xs">
                        <div class="flex items-center gap-2 text-sm font-bold text-neutral-900">
                            <x-icon name="headphones" class="size-4 text-primary-700" />
                            Need a hand?
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
