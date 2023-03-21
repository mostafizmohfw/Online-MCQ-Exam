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
                                <th class="text-center border px-4 py-1">Actions:</th>
                            </tr>
                            @foreach ($quizzs as $quiz)
                                <tr>
                                    <td class="text-left border px-4 py-1">{{ $quiz->id }}</td>
                                    <td class="text-left border px-4 py-1">{{ $quiz->name }}</td>
                                    
                                    <td class="border px-4 py-1">
                                        <div class="flex justify-center text-center items-center space-x-2">
                                            <a class="bg-orange-600 text-white p-1 rounded" href="{{ route('quiz.show', $quiz->id) }}">
                                                @include('components.icons.eye')
                                            </a>
                                            
                                            <a class="bg-green-600 text-white p-1 rounded" href="{{ route('quiz.edit', $quiz->id) }}">
                                                @include('components.icons.edit')
                                            </a>
                                            <form class="bg-red-600 text-white p-1 w-7 h-7 rounded">
                                                <button type="submit">
                                                    @include('components.icons.delete')
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
