<!-- resources/views/components/input.blade.php -->
@props([
    'label'        => null,
    'name',
    'type'         => 'text',
    'value'        => null,
    'placeholder'  => '',
    'required'     => false,
    'disabled'     => false,
    'wrapperClass' => '',
])

<div class="{{ $wrapperClass }}">
    @if($label)
        <label for="{{ $name }}" class="block text-gray-700 font-medium mb-1">
            {{ $label }}@if($required)<span class="text-red-500">*</span>@endif
        </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
        placeholder="{{ $placeholder }}"
        value="{{ old($name, $value) }}"
        {{ $attributes->merge([ 'class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500' ]) }}
    />

    @error($name)
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
