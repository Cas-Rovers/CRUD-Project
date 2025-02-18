@props([
    'name',
    'id' => $name ?? Str::slug($name),
    'placeholder' => '',
    'rows' => 5,
    'value' => old($name),
    'required' => false,
    'readonly' => false,
    'disabled' => false,
])

<textarea
    name="{{ $name }}"
    id="{{ $id }}"
    rows="{{ $rows }}"
    {{ $required ? 'required' : '' }}
    {{ $readonly ? 'readonly' : '' }}
    {{ $disabled ? 'disabled' : '' }}
    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500 transition-all"
    {{ $placeholder ? "placeholder=$placeholder" : '' }}>{{ $slot }}</textarea>
