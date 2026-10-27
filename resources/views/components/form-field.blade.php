@props([
    'label' => '',
    'name' => '',
    'type' => 'text',
    'placeholder' => '',
    'value' => null,
    'required' => false,
    'hint' => null,
    'autocomplete' => null,
    'inputmode' => null,
    'span' => null,
])

<div class="{{ $span }}">
    <label for="{{ $name }}" class="block text-sm font-semibold text-neutral-900">
        {{ $label }}
        @if ($required)
            <span class="text-error-700" aria-hidden="true">*</span>
        @endif
    </label>

    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        @if ($value !== null) value="{{ $value }}" @endif
        @if ($required) required @endif
        @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        @if ($inputmode) inputmode="{{ $inputmode }}" @endif
        placeholder="{{ $placeholder }}"
        class="mt-2 h-11 w-full rounded-md border border-neutral-300 bg-white px-3.5 text-sm text-neutral-800 placeholder:text-neutral-400 focus:border-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-600/30 aria-[invalid=true]:border-error-600 aria-[invalid=true]:ring-2 aria-[invalid=true]:ring-error-600/20"
    >

    @if ($hint)
        <p class="mt-1.5 text-xs text-neutral-500">{{ $hint }}</p>
    @endif

    <p data-error="{{ $name }}" class="mt-1.5 hidden text-xs font-medium text-error-700" role="alert"></p>
</div>
