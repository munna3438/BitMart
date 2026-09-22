<footer class="border-t border-neutral-200 bg-neutral-50 pb-24 text-neutral-600 lg:pb-2">
    <div class="mx-auto w-full max-w-[1320px] px-4 py-12 md:px-6 md:py-16 lg:px-8">

        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-[1.4fr_1fr_1fr_1fr]">
            <div class="space-y-4">
                <a href="#" class="flex items-center gap-2" aria-label="BitMart home">
                    <span class="flex size-8 items-center justify-center rounded-lg bg-primary-700 text-white">
                        <x-icon name="sparkles" class="size-4.5" />
                    </span>
                    <span class="text-lg font-extrabold tracking-tight text-neutral-900">Bit<span class="text-primary-700">Mart</span></span>
                </a>
                <p class="max-w-sm text-sm leading-relaxed">
                    BitMart is a modern online store for Bangladesh — easy browsing, clear pricing, honest reviews, and smart AI help whenever you need it.
                </p>
                <div class="flex items-center gap-2 pt-1">
                    @foreach(['facebook', 'instagram', 'twitter', 'youtube'] as $social)
                        <a href="#" aria-label="{{ ucfirst($social) }}" class="inline-flex size-9 items-center justify-center rounded-lg border border-neutral-200 bg-white text-neutral-500 transition hover:border-primary-300 hover:text-primary-700">
                            <x-icon :name="$social" class="size-4.5" />
                        </a>
                    @endforeach
                </div>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-bold uppercase tracking-wide text-neutral-900">BitMart</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="#" class="transition hover:text-primary-700">About BitMart</a></li>
                    <li><a href="#" class="transition hover:text-primary-700">Contact</a></li>
                    <li><a href="#" class="transition hover:text-primary-700">Careers</a></li>
                </ul>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-bold uppercase tracking-wide text-neutral-900">Customer Care</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="#" class="transition hover:text-primary-700">Help Center</a></li>
                    <li><a href="#" class="transition hover:text-primary-700">Delivery</a></li>
                    <li><a href="#" class="transition hover:text-primary-700">Returns</a></li>
                    <li><a href="#" class="transition hover:text-primary-700">Payment</a></li>
                    <li><a href="#" class="transition hover:text-primary-700">Order Tracking</a></li>
                </ul>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-bold uppercase tracking-wide text-neutral-900">Information</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="#" class="transition hover:text-primary-700">Privacy Policy</a></li>
                    <li><a href="#" class="transition hover:text-primary-700">Terms &amp; Conditions</a></li>
                    <li><a href="#" class="transition hover:text-primary-700">Refund Policy</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-6 border-t border-neutral-200 pt-8 md:flex-row md:items-center md:justify-between">
            <div class="flex items-center gap-2 text-xs text-neutral-500">
                <span class="font-semibold uppercase tracking-wide">We accept</span>
                @foreach(['bKash', 'Nagad', 'Card', 'Cash on Delivery'] as $method)
                    <span class="rounded-md border border-neutral-200 bg-white px-2.5 py-1.5 font-semibold">{{ $method }}</span>
                @endforeach
            </div>
            <p class="text-xs text-neutral-400">© {{ date('Y') }} BitMart · Made in Bangladesh</p>
        </div>
    </div>
</footer>