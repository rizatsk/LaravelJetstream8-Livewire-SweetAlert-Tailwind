<x-app-layout>
    <x-slot name="header">
        {{-- <div style="background-color: rgb(218, 218, 218)"> --}}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contact') }}
            </h2>
            <livewire:contact-index></livewire:contact-index>
        {{-- </div> --}}
    </x-slot>
{{--    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
</x-app-layout>
