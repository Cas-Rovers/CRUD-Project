@use(Illuminate\Support\Str)
@props([
    'type' => 'text',
    'name',
    'id' => $name ?? Str::slug($name),
    'placeholder' => '',
    'value' => old($name),
    'autocomplete' => 'off',
    'required' => false,
    'readonly' => false,
    'disabled' => false,
    'maxlength' => null,
])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $id }}"
    value="{{ $value }}"
    autocomplete="{{ $autocomplete }}"
    {{ $required ? 'required' : '' }}
    {{ $readonly ? 'readonly' : '' }}
    {{ $disabled ? 'disabled' : '' }}
    {{ $maxlength ? "maxlength=$maxlength" : '' }}
    {{ $placeholder ? "placeholder=$placeholder" : '' }}
    {{ $attributes->merge(['class' => 'w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500']) }}
    {{ $attributes }}>
