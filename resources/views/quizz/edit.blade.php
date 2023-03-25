<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Quiz Create') }}
            </h2>

            <a class="primary-btn py-2 flex items-center gap-2" href="{{ route('quiz.index') }}">
                @include('components.icons.list')
                List
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('quiz.update', $quiz->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="text-gray-500 ">
                            <label class="primary-label">Name: </label>
                            <input class="primary-input w-full mb-3" type="text" name="name"
                                value="{{ $quiz->name }}" />
                            <input type="hidden" class="primary-input w-full mb-3" name="id"
                                value="{{ $quiz->id }}" />
                        </div>
                        <div class="text-gray-500 gap-3 mt-4 w-1/3 ">
                            <button type="submit" class="primary-btn py-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
