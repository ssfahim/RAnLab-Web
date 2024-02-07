@props(['active'])

@php
$classes = ($active ?? false)
            ? 'active_page'
            : 'inactive_page';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
