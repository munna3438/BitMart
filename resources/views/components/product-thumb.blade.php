@props([
    'icon' => 'shirt',
    'tint' => 'primary',
    'iconClass' => 'size-6',
    'image' => null,
])

@php
    $tints = [
        'primary' => 'bg-primary-50 text-primary-700',
        'secondary' => 'bg-secondary-100 text-secondary-700',
        'ai' => 'bg-ai-50 text-ai-700',
        'info' => 'bg-info-50 text-info-700',
        'neutral' => 'bg-neutral-100 text-neutral-600',
        'muted' => 'bg-neutral-100 text-neutral-400',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'flex shrink-0 items-center justify-center overflow-hidden rounded-lg ' . ($image ? 'bg-neutral-50' : ($tints[$tint] ?? $tints['primary']))]) }}>
    @if ($image)
        <img src="{{ asset($image) }}" alt="" class="h-full w-full object-cover" loading="lazy">
    @else
        <x-icon :name="$icon" :class="$iconClass" />
    @endif
    {{ $slot }}
</div>
