@props([
    'items' => [],
])

<nav aria-label="Breadcrumb" class="mb-5">
    <ol class="flex flex-wrap items-center gap-1.5 text-xs text-neutral-500">
        @foreach ($items as $item)
            <li class="flex items-center gap-1.5">
                @if (! $loop->last && ! empty($item['href']))
                    <a href="{{ $item['href'] }}" class="transition hover:text-primary-700">{{ $item['label'] }}</a>
                @else
                    <span class="font-medium text-neutral-800" aria-current="page">{{ $item['label'] }}</span>
                @endif
                @unless ($loop->last)
                    <x-icon name="chevron-right" class="size-3.5 text-neutral-300" />
                @endunless
            </li>
        @endforeach
    </ol>
</nav>
