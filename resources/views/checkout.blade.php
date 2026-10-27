<x-layouts.app title="Checkout — BitMart" description="Complete your BitMart order — delivery address, payment method and order review.">

    <div class="mx-auto w-full max-w-[1320px] px-4 py-6 md:px-6 lg:px-8 lg:py-10">

        <x-breadcrumb :items="[
            ['label' => 'Home', 'href' => '/'],
            ['label' => 'Cart', 'href' => route('cart.index')],
            ['label' => 'Checkout'],
        ]" />

        <div class="mb-6">
            <h1 class="text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-3xl">Checkout</h1>
            <p class="mt-1.5 text-sm text-neutral-500">Almost there — confirm your delivery and payment details.</p>
        </div>

        {{-- Steps --}}
        <ol class="mb-8 flex flex-wrap items-center gap-x-3 gap-y-2" aria-label="Checkout steps">
            @foreach([
                ['Cart', 'done', route('cart.index')],
                ['Information', 'current', null],
                ['Payment', 'upcoming', null],
                ['Confirmation', 'upcoming', null],
            ] as $index => [$label, $state, $href])
                <li class="flex items-center gap-2">
                    @if ($href)
                        <a href="{{ $href }}" class="flex items-center gap-2">
                            <span class="flex size-6 items-center justify-center rounded-full bg-primary-700 text-[11px] font-bold text-white">
                                <x-icon name="check" class="size-3.5" />
                            </span>
                            <span class="text-xs font-semibold text-neutral-600 transition hover:text-primary-700">{{ $label }}</span>
                        </a>
                    @else
                        <span class="flex items-center gap-2">
                            <span class="flex size-6 items-center justify-center rounded-full text-[11px] font-bold {{ $state === 'current' ? 'border-2 border-primary-700 text-primary-700' : 'border border-neutral-300 text-neutral-400' }}">
                                {{ $index + 1 }}
                            </span>
                            <span class="text-xs font-semibold {{ $state === 'current' ? 'text-neutral-900' : 'text-neutral-400' }}">{{ $label }}</span>
                        </span>
                    @endif
                    @unless ($loop->last)
                        <span class="hidden h-px w-6 bg-neutral-200 sm:block"></span>
                    @endunless
                </li>
            @endforeach
        </ol>

        <div class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_380px] lg:gap-8">

            {{-- Form --}}
            <form data-checkout-form data-subtotal="{{ $summary['subtotal'] }}" data-free-over="2000" class="space-y-5" novalidate>

                {{-- Contact --}}
                <section class="rounded-xl border border-neutral-200 bg-white p-5 shadow-xs sm:p-6">
                    <div class="mb-5 flex items-center gap-2.5">
                        <span class="flex size-7 items-center justify-center rounded-full bg-primary-50 text-xs font-bold text-primary-700">1</span>
                        <h2 class="text-base font-bold text-neutral-900">Contact details</h2>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <x-form-field label="Email address" name="email" type="email" placeholder="you@example.com" autocomplete="email" required />
                        <x-form-field label="Phone number" name="phone" type="tel" placeholder="01XXX-XXXXXX" autocomplete="tel" required hint="We call if the delivery needs confirmation." />
                    </div>

                    <label class="mt-4 flex cursor-pointer items-center gap-2.5 text-sm text-neutral-600">
                        <input type="checkbox" name="email_updates" checked class="size-4 rounded border-neutral-300 accent-primary-700">
                        Send me order updates by email and SMS
                    </label>
                </section>

                {{-- Address --}}
                <section class="rounded-xl border border-neutral-200 bg-white p-5 shadow-xs sm:p-6">
                    <div class="mb-5 flex items-center gap-2.5">
                        <span class="flex size-7 items-center justify-center rounded-full bg-primary-50 text-xs font-bold text-primary-700">2</span>
                        <h2 class="text-base font-bold text-neutral-900">Delivery address</h2>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <x-form-field label="Full name" name="name" placeholder="Arif Hossain" autocomplete="name" required />
                        <x-form-field label="Phone number" name="address_phone" type="tel" placeholder="01XXX-XXXXXX" autocomplete="tel" required />
                        <x-form-field label="Address line" name="address" placeholder="House 42, Road 7, Dhanmondi" autocomplete="street-address" required span="sm:col-span-2" />
                        <x-form-field label="Area / Thana" name="area" placeholder="Dhanmondi" autocomplete="address-level3" required />
                        <x-form-select label="District" name="district" :options="$districts" placeholder="Select district" required />
                        <x-form-field label="Postal code" name="postal_code" placeholder="1209" autocomplete="postal-code" span="sm:col-span-2" />
                    </div>

                    <label class="mt-4 flex cursor-pointer items-center gap-2.5 text-sm text-neutral-600">
                        <input type="checkbox" name="save_address" checked class="size-4 rounded border-neutral-300 accent-primary-700">
                        Save this address for next time
                    </label>
                </section>

                {{-- Delivery method --}}
                <section class="rounded-xl border border-neutral-200 bg-white p-5 shadow-xs sm:p-6">
                    <div class="mb-5 flex items-center gap-2.5">
                        <span class="flex size-7 items-center justify-center rounded-full bg-primary-50 text-xs font-bold text-primary-700">3</span>
                        <h2 class="text-base font-bold text-neutral-900">Delivery method</h2>
                    </div>

                    <div class="space-y-2.5">
                        @foreach([
                            ['standard', 'Standard delivery', '1–3 days in Dhaka, 2–5 days elsewhere', '60', 'truck', true, true],
                            ['express', 'Express delivery', 'Next day in Dhaka, 2 days elsewhere', '120', 'zap', false, false],
                            ['pickup', 'Pickup from BitMart point', 'Ready to collect within 1 day', '0', 'package', false, false],
                        ] as [$value, $title, $sub, $charge, $icon, $checked, $freeEligible])
                            <label class="flex cursor-pointer items-start gap-3 rounded-lg border border-neutral-200 bg-white p-4 transition hover:border-neutral-300 has-[:checked]:border-primary-600 has-[:checked]:bg-primary-50/50 has-[:checked]:ring-1 has-[:checked]:ring-primary-600/20">
                                <input
                                    type="radio"
                                    name="delivery_method"
                                    value="{{ $value }}"
                                    data-delivery-option
                                    data-charge="{{ $charge }}"
                                    @if ($freeEligible) data-free-over="2000" @endif
                                    @checked($checked)
                                    class="mt-0.5 size-4 shrink-0 accent-primary-700"
                                >
                                <span class="flex min-w-0 flex-1 items-start gap-3">
                                    <x-icon :name="$icon" class="mt-0.5 size-4.5 shrink-0 text-primary-700" />
                                    <span class="min-w-0 flex-1">
                                        <span class="flex items-center justify-between gap-3">
                                            <span class="text-sm font-semibold text-neutral-900">{{ $title }}</span>
                                            <span class="shrink-0 text-sm font-bold tabular-nums text-neutral-900" data-delivery-charge-label>
                                                {{ $charge === '0' ? 'Free' : '৳' . $charge }}
                                            </span>
                                        </span>
                                        <span class="mt-1 block text-xs text-neutral-500">{{ $sub }}</span>
                                    </span>
                                </span>
                            </label>
                        @endforeach
                    </div>

                    <p class="mt-3 text-xs text-neutral-500">Free standard delivery on orders over ৳2,000.</p>
                </section>

                {{-- Payment --}}
                <section class="rounded-xl border border-neutral-200 bg-white p-5 shadow-xs sm:p-6">
                    <div class="mb-5 flex items-center gap-2.5">
                        <span class="flex size-7 items-center justify-center rounded-full bg-primary-50 text-xs font-bold text-primary-700">4</span>
                        <h2 class="text-base font-bold text-neutral-900">Payment method</h2>
                    </div>

                    <div class="space-y-2.5">
                        {{-- Cash on delivery --}}
                        <label class="flex cursor-pointer items-start gap-3 rounded-lg border border-neutral-200 bg-white p-4 transition hover:border-neutral-300 has-[:checked]:border-primary-600 has-[:checked]:bg-primary-50/50 has-[:checked]:ring-1 has-[:checked]:ring-primary-600/20">
                            <input type="radio" name="payment_method" value="cod" data-payment-option checked class="mt-0.5 size-4 shrink-0 accent-primary-700">
                            <span class="flex min-w-0 flex-1 items-start gap-3">
                                <x-icon name="banknote" class="mt-0.5 size-4.5 shrink-0 text-primary-700" />
                                <span class="min-w-0 flex-1">
                                    <span class="flex items-center justify-between gap-3">
                                        <span class="text-sm font-semibold text-neutral-900">Cash on Delivery</span>
                                        <span class="shrink-0 text-sm font-bold tabular-nums text-success-700">৳0 fee</span>
                                    </span>
                                    <span class="mt-1 block text-xs text-neutral-500">Pay in cash when your order arrives.</span>
                                </span>
                            </span>
                        </label>

                        {{-- bKash --}}
                        <div class="rounded-lg border border-neutral-200 bg-white p-4 transition has-[:checked]:border-primary-600 has-[:checked]:bg-primary-50/50 has-[:checked]:ring-1 has-[:checked]:ring-primary-600/20">
                            <label class="flex cursor-pointer items-start gap-3">
                                <input type="radio" name="payment_method" value="bkash" data-payment-option class="mt-0.5 size-4 shrink-0 accent-primary-700">
                                <span class="flex min-w-0 flex-1 items-start gap-3">
                                    <x-icon name="smartphone" class="mt-0.5 size-4.5 shrink-0 text-primary-700" />
                                    <span class="min-w-0 flex-1">
                                        <span class="flex items-center justify-between gap-3">
                                            <span class="text-sm font-semibold text-neutral-900">bKash</span>
                                            <span class="shrink-0 text-sm font-bold tabular-nums text-success-700">৳0 fee</span>
                                        </span>
                                        <span class="mt-1 block text-xs text-neutral-500">Pay with your bKash wallet or card.</span>
                                    </span>
                                </span>
                            </label>

                            <div data-payment-panel="bkash" class="mt-4 hidden border-t border-neutral-200 pt-4">
                                <div class="grid gap-4 sm:grid-cols-2">
                                    <x-form-field label="bKash number" name="bkash_number" type="tel" placeholder="01XXXXXXXXX" span="sm:col-span-2" />
                                </div>
                            </div>
                        </div>

                        {{-- Nagad --}}
                        <div class="rounded-lg border border-neutral-200 bg-white p-4 transition has-[:checked]:border-primary-600 has-[:checked]:bg-primary-50/50 has-[:checked]:ring-1 has-[:checked]:ring-primary-600/20">
                            <label class="flex cursor-pointer items-start gap-3">
                                <input type="radio" name="payment_method" value="nagad" data-payment-option class="mt-0.5 size-4 shrink-0 accent-primary-700">
                                <span class="flex min-w-0 flex-1 items-start gap-3">
                                    <x-icon name="smartphone" class="mt-0.5 size-4.5 shrink-0 text-primary-700" />
                                    <span class="min-w-0 flex-1">
                                        <span class="flex items-center justify-between gap-3">
                                            <span class="text-sm font-semibold text-neutral-900">Nagad</span>
                                            <span class="shrink-0 text-sm font-bold tabular-nums text-success-700">৳0 fee</span>
                                        </span>
                                        <span class="mt-1 block text-xs text-neutral-500">Pay with your Nagad wallet.</span>
                                    </span>
                                </span>
                            </label>

                            <div data-payment-panel="nagad" class="mt-4 hidden border-t border-neutral-200 pt-4">
                                <div class="grid gap-4 sm:grid-cols-2">
                                    <x-form-field label="Nagad number" name="nagad_number" type="tel" placeholder="01XXXXXXXXX" span="sm:col-span-2" />
                                </div>
                            </div>
                        </div>

                        {{-- Card --}}
                        <div class="rounded-lg border border-neutral-200 bg-white p-4 transition has-[:checked]:border-primary-600 has-[:checked]:bg-primary-50/50 has-[:checked]:ring-1 has-[:checked]:ring-primary-600/20">
                            <label class="flex cursor-pointer items-start gap-3">
                                <input type="radio" name="payment_method" value="card" data-payment-option class="mt-0.5 size-4 shrink-0 accent-primary-700">
                                <span class="flex min-w-0 flex-1 items-start gap-3">
                                    <x-icon name="card" class="mt-0.5 size-4.5 shrink-0 text-primary-700" />
                                    <span class="min-w-0 flex-1">
                                        <span class="flex items-center justify-between gap-3">
                                            <span class="text-sm font-semibold text-neutral-900">Card (Visa / Mastercard)</span>
                                            <span class="shrink-0 text-sm font-bold tabular-nums text-success-700">৳0 fee</span>
                                        </span>
                                        <span class="mt-1 block text-xs text-neutral-500">Pay with your debit or credit card.</span>
                                    </span>
                                </span>
                            </label>

                            <div data-payment-panel="card" class="mt-4 hidden border-t border-neutral-200 pt-4">
                                <div class="grid gap-4 sm:grid-cols-2">
                                    <x-form-field label="Card number" name="card_number" placeholder="0000 0000 0000 0000" inputmode="numeric" span="sm:col-span-2" />
                                    <x-form-field label="Expiry (MM/YY)" name="card_expiry" placeholder="12/28" />
                                    <x-form-field label="CVV" name="card_cvv" placeholder="123" inputmode="numeric" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="mt-3 flex items-start gap-2 text-xs text-neutral-500">
                        <x-icon name="lock" class="mt-0.5 size-3.5 shrink-0 text-primary-700" />
                        Payment details are encrypted and never stored on BitMart servers.
                    </p>
                </section>

                {{-- Notes --}}
                <section class="rounded-xl border border-neutral-200 bg-white p-5 shadow-xs sm:p-6">
                    <div class="mb-5 flex items-center gap-2.5">
                        <span class="flex size-7 items-center justify-center rounded-full bg-primary-50 text-xs font-bold text-primary-700">5</span>
                        <h2 class="text-base font-bold text-neutral-900">Order note</h2>
                    </div>

                    <label for="note" class="block text-sm font-semibold text-neutral-900">Anything we should know? <span class="font-normal text-neutral-500">(optional)</span></label>
                    <textarea
                        id="note"
                        name="note"
                        rows="3"
                        placeholder="Delivery instructions, landmark, preferred time…"
                        class="mt-2 w-full rounded-md border border-neutral-300 bg-white px-3.5 py-3 text-sm text-neutral-800 placeholder:text-neutral-400 focus:border-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-600/30"
                    ></textarea>
                </section>

                <button
                    type="button"
                    data-place-order
                    data-success-url="{{ route('order.success') }}"
                    class="inline-flex h-12 w-full items-center justify-center gap-2 rounded-lg bg-primary-700 px-6 text-sm font-semibold text-white shadow-sm transition hover:bg-primary-800 active:scale-[0.99] sm:hidden"
                >
                    <x-icon name="lock" class="size-4" />
                    Place Order
                </button>
            </form>

            {{-- Summary --}}
            <div class="lg:sticky lg:top-24 lg:self-start">
                <x-order-summary :lines="$lines" :summary="$summary" title="Order Summary">
                    <x-slot:actions>
                        <button type="button" data-place-order data-success-url="{{ route('order.success') }}" class="inline-flex h-12 w-full items-center justify-center gap-2 rounded-lg bg-primary-700 px-6 text-sm font-semibold text-white shadow-sm transition hover:bg-primary-800 active:scale-[0.99]">
                            <x-icon name="lock" class="size-4" />
                            Place Order
                        </button>
                        <a href="{{ route('cart.index') }}" class="inline-flex h-10 w-full items-center justify-center text-sm font-semibold text-primary-700 transition hover:text-primary-800">
                            Back to cart
                        </a>
                        <a href="{{ route('order.failed') }}" class="block pt-1 text-center text-[11px] text-neutral-400 transition hover:text-neutral-600">
                            Preview failed payment state
                        </a>
                    </x-slot:actions>

                    <div class="mt-5 space-y-2.5 border-t border-neutral-200 pt-4">
                        <div class="flex items-start gap-2.5 text-sm text-neutral-600">
                            <x-icon name="shield-check" class="mt-0.5 size-4 shrink-0 text-primary-700" />
                            <span>Your order is protected by BitMart buyer support.</span>
                        </div>
                        <div class="flex items-start gap-2.5 text-sm text-neutral-600">
                            <x-icon name="truck" class="mt-0.5 size-4 shrink-0 text-primary-700" />
                            <span>Dispatched within 24 hours of confirmation.</span>
                        </div>
                    </div>
                </x-order-summary>

                <button type="button" data-ai-trigger class="mt-4 flex w-full items-center gap-3 rounded-xl border border-ai-200 bg-ai-50 p-4 text-left transition hover:bg-ai-100">
                    <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-white text-ai-600">
                        <x-icon name="sparkles" class="size-4.5" />
                    </span>
                    <span class="min-w-0">
                        <span class="block text-sm font-bold text-ai-700">Need help choosing?</span>
                        <span class="mt-0.5 block text-xs text-ai-800">Ask BitMart AI about delivery, payment or returns.</span>
                    </span>
                </button>
            </div>
        </div>
    </div>

</x-layouts.app>
