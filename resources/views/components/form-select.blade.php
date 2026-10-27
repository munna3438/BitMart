@props([
    'label' => '',
    'name' => '',
    'options' => [],
    'placeholder' => 'Select an option',
    'required' => false,
    'hint' => null,
    'span' => null,
])

<div class="{{ $span }}">
    <label for="{{ $name }}" class="block text-sm font-semibold text-neutral-900">
        {{ $label }}
        @if ($required)
            <span class="text-error-700" aria-hidden="true">*</span>
        @endif
    </label>

    <div class="relative mt-2">
        <select
            id="{{ $name }}"
            name="{{ $name }}"
            @if ($required) required @endif
            class="h-11 w-full appearance-none rounded-md border border-neutral-300 bg-white px-3.5 pr-10 text-sm text-neutral-800 focus:border-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-600/30 aria-[invalid=true]:border-error-600 aria-[invalid=true]:ring-2 aria-[invalid=true]:ring-error-600/20"
        >
            @if ($placeholder)
                <option value="">{{ $placeholder }}</option>
            @endif
            @foreach ($options as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
        <x-icon name="chevron-down" class="pointer-events-none absolute right-3 top-1/2 size-4 -translate-y-1/2 text-neutral-400" />
    </div>

    @if ($hint)
        <p class="mt-1.5 text-xs text-neutral-500">{{ $hint }}</p>
    @endif

    <p data-error="{{ $name }}" class="mt-1.5 hidden text-xs font-medium text-error-700" role="alert"></p>
</div>
