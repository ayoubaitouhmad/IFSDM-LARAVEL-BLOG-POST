<!-- resources/views/components/select.blade.php -->
@props([
    'label'        => null,
    'name',
    'options'      => [],      // associative array: value => label
    'value'        => null,    // selected value
    'placeholder'  => null,    // first empty option label
    'required'     => false,
    'disabled'     => false,
    'wrapperClass' => '',
])

<div class=" {{ $wrapperClass }}">
    @if($label)
        <label for="{{ $name }}" class="block text-nowrap text-gray-700 font-medium mb-1">
            {{ $label }}@if($required)<span class="text-red-500">*</span>@endif
        </label>
    @endif

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
        {{ $attributes->merge([ 'class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500' ]) }}
    >
        @if($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach($options as $optValue => $optLabel)
            <option value="{{ $optValue }}" @selected(old($name, $value) == $optValue)>
                {{ $optLabel }}
            </option>
        @endforeach
    </select>

    @error($name)
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
