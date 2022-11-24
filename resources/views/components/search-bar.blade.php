@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border border-secondary rounded-3xl shadow-sm bg-background text-text placeholder:text-text p-5 focus:outline-none']) !!}>
