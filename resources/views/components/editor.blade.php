@props(['language' => 'javascript'])

<textarea id="editor" {!! $attributes->merge(['class' => 'border border-secondary rounded-md shadow-sm bg-background text-text placeholder:text-text focus:outline-none w-full min-h-96']) !!}></textarea>

