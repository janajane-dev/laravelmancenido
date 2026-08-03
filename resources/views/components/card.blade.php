@props([
    'id' => null,
])

<div
    id="{{ $id }}"
    {{ $attributes->merge(['class' => 'card']) }}
>
    {{ $slot }}
</div>