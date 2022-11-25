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
    <div class="grid sm:grid-cols-1 xl:grid-cols-4 md:grid-cols-2 gap-4 py-6 sm:pt-6" id="preview-container"></div>
</x-app-layout>
