<link rel="stylesheet" href={{ asset('../css/register.css') }}>
@props(['value'])

<label {{ $attributes->merge(['class' => 'block_name block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
    
</label>
