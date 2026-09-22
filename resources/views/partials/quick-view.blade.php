<div data-quick-view class="pointer-events-none fixed inset-0 z-[60] hidden">
    <div data-qv-backdrop class="absolute inset-0 bg-neutral-950/40 opacity-0 transition-opacity duration-200"></div>

    <div class="pointer-events-auto absolute inset-x-0 bottom-0 mx-auto max-w-lg rounded-t-2xl bg-white shadow-lg transition-transform duration-300 lg:inset-x-auto lg:right-6 lg:bottom-6 lg:left-6 lg:mx-auto lg:w-[520px] lg:rounded-2xl">
        <button type="button" data-qv-close class="absolute right-4 top-4 z-10 inline-flex size-9 items-center justify-center rounded-md bg-white/90 text-neutral-600 shadow-sm transition hover:bg-neutral-100" aria-label="Close quick view">
            <x-icon name="x" class="size-5" />
        </button>

        <div class="grid gap-4 p-5 sm:grid-cols-2 sm:gap-6">
            <div data-qv-visual class="flex aspect-[4/3] items-center justify-center rounded-xl bg-primary-50 text-primary-700 sm:aspect-auto sm:h-full sm:min-h-56">
                <x-icon :name="'shirt'" class="size-16 opacity-70" data-qv-icon />
            </div>
            <div class="flex flex-col gap-3 py-2 sm:py-3">
                <span class="inline-flex w-fit items-center gap-1 rounded-full bg-ai-50 px-2.5 py-1 text-[11px] font-semibold text-ai-700">
                    <x-icon name="sparkles" class="size-3" />Picked for you
                </span>
                <h3 class="text-lg font-semibold leading-snug text-neutral-900" data-qv-title>Premium Cotton T-Shirt</h3>
                <div class="flex items-center gap-2 text-sm text-neutral-500">
                    <x-icon name="star" filled class="size-4 text-warning-500" />
                    <span class="font-semibold text-neutral-700" data-qv-rating>4.6</span>
                    <span>(<span data-qv-reviews>312</span> reviews)</span>
                </div>
                <div class="flex items-baseline gap-2">
                    <span class="text-2xl font-bold tracking-tight text-neutral-900" data-qv-price>৳890</span>
                    <span class="text-sm text-neutral-400 line-through" data-qv-original>৳1,200</span>
                </div>
                <p class="text-xs text-neutral-500">Delivery in Dhaka 1–3 days · Returns within 7 days</p>
                <div class="mt-auto flex gap-2 pt-2">
                    <button type="button" data-add-to-cart class="flex h-11 flex-1 items-center justify-center gap-1.5 rounded-lg bg-primary-700 text-sm font-semibold text-white transition hover:bg-primary-800 active:bg-primary-900">
                        <x-icon name="cart" class="size-4" />Add to Cart
                    </button>
                    <button type="button" data-ai-trigger class="flex h-11 items-center justify-center gap-1.5 rounded-lg border border-ai-200 bg-ai-50 px-3 text-sm font-semibold text-ai-700 transition hover:bg-ai-100">
                        <x-icon name="sparkles" class="size-4" />
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>