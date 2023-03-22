<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Result Show') }}
            </h2>

            <a class="primary-btn py-2 flex items-center gap-2" href="{{ route('generate.pdf') }}">
                @include('components.icons.print')
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <h2 class="text-center mb-3">Welcome {{ $result->user->name }}, your result is ready.</h2>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
