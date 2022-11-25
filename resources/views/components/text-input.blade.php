@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border border-secondary rounded-md shadow-sm bg-background text-text placeholder:text-text focus:outline-none']) !!}>
