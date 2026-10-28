@props([
    'lines' => [],
    'summary' => [],
    'title' => 'Order Summary',
    'showItems' => true,
])

<div class="rounded-xl border border-neutral-200 bg-white shadow-xs">
    <div class="flex items-center justify-between gap-3 border-b border-neutral-200 px-5 py-4">
        <h2 class="text-base font-bold text-neutral-900">{{ $title }}</h2>
        @if ($showItems && count($lines) > 0)
            <span class="text-xs text-neutral-500">{{ count($lines) }} items</span>
        @endif
    </div>

    <div class="px-5 py-4">
        @if ($showItems && count($lines) > 0)
            <ul class="space-y-3.5">
                @foreach ($lines as $line)
                    <li class="flex items-start gap-3">
                        <x-product-thumb :icon="$line['icon']" :image="$line['image'] ?? null" :tint="$line['tint']" class="size-12 rounded-md" icon-class="size-5" />
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-medium leading-snug text-neutral-800">{{ $line['name'] }}</p>
                            <p class="mt-0.5 text-xs text-neutral-500">
                                {{ $line['size'] }} · {{ $line['color'] }} · Qty {{ $line['quantity'] }}
                            </p>
                        </div>
                        <span class="shrink-0 text-sm font-semibold tabular-nums text-neutral-900">৳{{ number_format($line['lineTotal']) }}</span>
                    </li>
                @endforeach
            </ul>

            <div class="my-4 h-px bg-neutral-200"></div>
        @endif

        <dl class="space-y-2.5 text-sm">
            <div class="flex items-center justify-between gap-4">
                <dt class="text-neutral-600">Subtotal</dt>
                <dd class="font-semibold tabular-nums text-neutral-900" data-summary="subtotal">৳{{ number_format($summary['subtotal'] ?? 0) }}</dd>
            </div>
            <div class="flex items-center justify-between gap-4">
                <dt class="text-neutral-600">Delivery</dt>
                <dd class="font-semibold tabular-nums text-neutral-900" data-summary="delivery">
                    @if (($summary['delivery'] ?? 0) > 0)
                        ৳{{ number_format($summary['delivery']) }}
                    @else
                        <span class="text-success-700">Free</span>
                    @endif
                </dd>
            </div>
            <div class="flex items-center justify-between gap-4" data-summary-discount-row @if (($summary['discount'] ?? 0) <= 0) hidden @endif>
                <dt class="text-neutral-600">Discount</dt>
                <dd class="font-semibold tabular-nums text-success-700" data-summary="discount">−৳{{ number_format($summary['discount'] ?? 0) }}</dd>
            </div>
            <div class="flex items-center justify-between gap-4 border-t border-neutral-200 pt-3">
                <dt class="font-bold text-neutral-900">Total</dt>
                <dd class="text-lg font-bold tabular-nums text-neutral-900" data-summary="total">৳{{ number_format($summary['total'] ?? 0) }}</dd>
            </div>
        </dl>

        @isset($actions)
            <div class="mt-5 space-y-2.5">
                {{ $actions }}
            </div>
        @endisset

        {{ $slot }}
    </div>
</div>
