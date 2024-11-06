<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('vue test') }}
        </h2>
    </x-slot>

    @php
        // laravel debugbar の Messages に出力
        \Debugbar::info("Debugbar::info vue test");
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <!-- -- vue.js -- -->
                <!-- app.js で起動している -->
                <div id="vue_app"></div>

            </div>
        </div>
    </div>
</x-app-layout>
