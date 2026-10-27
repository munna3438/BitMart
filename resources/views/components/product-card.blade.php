@props([
    'id' => 'p-' . uniqid(),
    'name' => '',
    'href' => null,
    'price' => 0,
    'originalPrice' => null,
    'rating' => null,
    'reviews' => null,
    'discount' => null,
    'badge' => null,
    'tint' => 'primary',
    'icon' => 'shirt',
    'label' => null,
    'available' => true,
])

@php
    $discount = $discount ?? ($originalPrice ? round((1 - $price / $originalPrice) * 100) : null);
@endphp

<article class="group relative flex flex-col overflow-hidden rounded-lg border border-neutral-200 bg-white shadow-xs transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md" data-product-id="{{ $id }}">
    <div class="relative overflow-hidden">
        <x-product-thumb
            :icon="$icon"
            :tint="$available ? $tint : 'muted'"
            class="relative aspect-[4/3] transition-colors"
            icon-class="size-16 opacity-80 transition-transform duration-300 group-hover:scale-110"
        >
            @if ($label)
                <span class="absolute left-2 top-2 inline-flex items-center gap-1 rounded-full bg-ai-50 bg-white/70 px-2 py-1 text-[11px] font-semibold text-ai-700 shadow-xs backdrop-blur">
                    <x-icon name="sparkles" class="size-3" />
                    {{ $label }}
                </span>
            @elseif ($badge)
                <span class="absolute left-2 top-2 inline-flex items-center rounded-full bg-error-50 px-2 py-1 text-[11px] font-semibold text-error-700">
                    {{ $badge }}
                </span>
            @endif

            <button
                type="button"
                data-wishlist
                class="absolute right-2 top-2 inline-flex size-8 items-center justify-center rounded-full bg-white/80 text-neutral-500 shadow-xs backdrop-blur transition hover:text-error-600 focus-visible:outline-primary-700"
                aria-label="Add to wishlist"
            >
                <x-icon name="heart" filled class="size-4" />
            </button>
        </x-product-thumb>

        @if ($available)
<button
                        type="button"
                        data-quick-view-open
                        data-name="{{ $name }}"
                        data-price="{{ number_format($price) }}৳"
                        @if ($originalPrice) data-original="{{ number_format($originalPrice) }}৳" @endif
                        data-rating="{{ $rating ?? '' }}"
                        data-reviews="{{ $reviews ?? '' }}"
                        data-icon="{{ $icon }}"
                        data-tint="{{ $tint }}"
                        class="absolute inset-x-0 bottom-0 flex items-center justify-center gap-1.5 bg-neutral-900/80 py-2 text-xs font-medium text-white opacity-0 transition group-hover:opacity-100 focus-visible:opacity-100"
                    >
                <x-icon name="eye" class="size-4" />
                Quick view
            </button>
        @endif
    </div>

    <div class="flex flex-1 flex-col gap-1 p-3">
        <a href="{{ $href ?? '#' }}" class="line-clamp-2 text-[13px] font-medium leading-snug text-neutral-800 transition-colors hover:text-primary-700">
            {{ $name }}
        </a>

        @if ($rating)
            <div class="flex items-center gap-1 text-xs text-neutral-500">
                <x-icon name="star" filled class="size-3.5 text-warning-500" />
                <span class="font-semibold text-neutral-700">{{ $rating }}</span>
                @if ($reviews)
                    <span>({{ number_format($reviews) }})</span>
                @endif
            </div>
        @endif

        <div class="mt-auto space-y-2 pt-1">
            <div class="flex items-baseline gap-2">
                <span class="text-base font-bold tracking-tight text-neutral-900">{{ number_format($price) }}৳</span>
                @if ($originalPrice)
                    <span class="text-xs text-neutral-400 line-through">{{ number_format($originalPrice) }}৳</span>
                @endif
                @if (!$available)
                    <span class="ml-auto text-[11px] font-medium text-neutral-400">Out of stock</span>
                @endif
            </div>

            @if ($available)
                <button
                    type="button"
                    data-add-to-cart
                    class="flex h-9 w-full items-center justify-center gap-1.5 rounded-md bg-primary-700 text-[13px] font-semibold text-white transition-colors hover:bg-primary-800 active:bg-primary-900">
                    <x-icon name="cart" class="size-4" />
                    Add to Cart
                </button>
            @else
                <button disabled class="flex h-9 w-full cursor-not-allowed items-center justify-center gap-1.5 rounded-md bg-neutral-100 text-[13px] font-semibold text-neutral-400">
                    Not available
                </button>
            @endif
        </div>
    </div>
</article>