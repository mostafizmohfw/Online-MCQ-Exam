<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Quizzes') }}
            </h2>

            <a class="primary-btn py-2 flex items-center gap-2" href="{{ route('quiz.create') }}">
                @include('components.icons.add')
                Add Quiz
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <table class="w-full table-auto">
                            <tr class="bg-gray-200 rounded-t">
                                <th class="text-left border px-4 py-1">Sl:</th>
                                <th class="text-left border px-4 py-1">Quiz Name</th>
                                <th class="text-left border px-4 py-1">No of Question</th>
                                <th class="text-left border px-4 py-1">Add Question</th>
                                <th class="text-left border px-4 py-1">Start Exam:</th>
                                <th class="text-left border px-4 py-1">Edit Quiz:</th>
                                <th class="text-left border px-4 py-1">Remove:</th>
                            </tr>
                            @foreach ($quizzs as $quiz)
                                <tr>
                                    <td class="text-left border px-4 py-1">{{ $quiz->id }}</td>
                                    <td class="text-left border px-4 py-1">{{ $quiz->name }}</td>
                                    <td class="text-left border px-4 py-1">{{ $quiz->questions->count() }}</td>

                                    <td class="text-left border px-4 py-1">
                                        <div class="flex jtext-left items-center space-x-2">
                                            <a class="bg-green-600 text-white py-1 px-2 rounded"
                                                href="{{ route('viewAddQuestion', $quiz->id) }}">
                                                Add Question
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-left border px-4 py-1">
                                        <div class="flex text-left items-center space-x-2">
                                            <a class="bg-orange-600 text-white py-1 px-2 rounded"
                                                href="{{ route('quiz.show', $quiz->id) }}">
                                                Start
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-left border px-4 py-1">
                                        <div class="flex jtext-left items-center space-x-2">
                                            <a class="bg-green-600 text-white py-1 px-2 rounded"
                                                href="{{ route('quiz.edit', $quiz->id) }}">
                                                Edit Quiz
                                            </a>
                                        </div>
                                    </td>
                                    <td class="border px-4 py-1">
                                        <div class="flex text-left items-center space-x-2">
                                            <form class="bg-red-600 text-white p-1 px-2 rounded">
                                                <button type="submit">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
