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
                    <label class="primary-label">Name: {{ $quiz->name }}</label>
                    <form action="{{ route('add.question') }}" method="post">
                        @csrf
                        <input type="hidden" class="primary-input w-full mb-3" name="quiz_id"
                            value="{{ $quiz->id }}" />
                        <div class="flex w-full align-middle items-center gap-10">
                            <div class="text-gray-500 gap-3 mt-4 w-1/3">
                                <label class="primary-label">Select Category:</label>
                                <select class="w-full" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-gray-500 gap-3 mt-4 w-1/3">
                                <label class="primary-label">Number of Question:</label>
                                <select class="w-full" name="total_question">
                                    <option value="1">1</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-gray-500 gap-3 mt-4 w-1/3 ">
                            <button type="submit" class="primary-btn py-2">Insert Question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
