<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            {{ __('Your Scripts') }}
        </h2>
    </x-slot>
    <script>
        $(document).ready(function() {
            App.loadOwnScripts(@json($scripts))
        });
    </script>
    <div class="grid xl:grid-cols-3 md:grid-cols-2 2xl:grid-cols-4 sm:grid-cols-1 grid-cols-1 gap-4 py-6 sm:pt-6" id="preview-container"></div>
</x-app-layout>
