@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium m-2 text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
