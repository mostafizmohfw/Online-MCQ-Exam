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
        <div class="max-w-7xl mx-auto ">
            <div class="bg-white overflow-hidden shadow-sm">
                <div class="p-6 text-gray-900">
                    <h2 class="mb-4">Quizz Name: {{ $quiz->name }}</h2>
                    @php
                        $i = 1;
                    @endphp
                    <form action="{{ route('quiz.submit') }}" method="post">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}" />
                        @foreach ($quiz->questions as $question)
                            @php
                                //dd($question);
                            @endphp

                            <div class="mt-4">
                                <h3 class="bg-orange-200 p-2 rounded">
                                    {{ $i++ }}. {!! $question->question !!}
                                    
                                    <input type="hidden" name="questions_id[{{ $question->id }}]" value="{{ $question->id }}">


                                </h3>
                                <div class="flex bg-gray-200">
                                    <div class="flex items-center pl-4 rounded">
                                        <input id="option-{{ $question->incorrect_answers_1 }}" type="radio"
                                            name="submitted_answer[{{ $question->id }}]" value="{{ $question->incorrect_answers_1 }}"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                        <label for="option-{{ $question->incorrect_answers_1 }}"
                                            class="w-full py-4 cursor-pointer ml-2 text-sm font-medium text-gray-900">{!! $question->incorrect_answers_1 !!}</label>
                                    </div>
                                    <div class="flex items-center pl-4 rounded">
                                        <input id="option-{{ $question->incorrect_answers_2 }}" type="radio"
                                            name="submitted_answer[{{ $question->id }}]" value="{{ $question->incorrect_answers_2 }}"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                        <label for="option-{{ $question->incorrect_answers_2 }}"
                                            class="w-full py-4 cursor-pointer ml-2 text-sm font-medium text-gray-900">{!! $question->incorrect_answers_2 !!}</label>
                                    </div>
                                    <div class="flex items-center pl-4 rounded">
                                        <input id="option-{{ $question->incorrect_answers_3 }}" type="radio"
                                            name="submitted_answer[{{ $question->id }}]" value="{{ $question->incorrect_answers_3 }}"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                        <label for="option-{{ $question->incorrect_answers_3 }}"
                                            class="w-full py-4 cursor-pointer ml-2 text-sm font-medium text-gray-900">{!! $question->incorrect_answers_3 !!}</label>
                                    </div>
                                    <div class="flex items-center pl-4 rounded">
                                        <input id="option-{{ $question->correct_answer }}" type="radio"
                                            name="submitted_answer[{{ $question->id }}]" value="{{ $question->correct_answer }}"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                        <label for="option-{{ $question->correct_answer }}"
                                            class="w-full py-4 cursor-pointer ml-2 text-sm font-medium text-gray-900">{!! $question->correct_answer !!}</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <button type="submit" class="primary-btn py-2 mt-4">Result</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
