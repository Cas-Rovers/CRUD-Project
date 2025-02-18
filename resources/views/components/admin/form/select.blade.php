@props([
    'name',
    'id' => $name ?? Str::slug($name),
    'required' => false,
    'disabled' => false,
])

<select
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $required ? 'required' : '' }}
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => 'w-full px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500']) }}>
    {{ $slot }}
</select>
