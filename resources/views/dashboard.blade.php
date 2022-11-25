<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            {{ __('Your Scripts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-background overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-text">
                    {{ __("No scripts yet") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
