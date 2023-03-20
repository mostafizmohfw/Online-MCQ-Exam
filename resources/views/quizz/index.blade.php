<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quizz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>

                        @php
                            $i = 1;
                        @endphp
                        <div class="bg-gray-50 items-center gap-4 p-4 mb-3">
                            <div class="mb-2 ">
                                @foreach ($quizzs as $quiz)
                                    <p class="py-2 flex w-1/2">Exam Name: {{ $quiz->name }}</p>
                                @endforeach
                            </div>
                            {{-- <div class="flex">
                                <p class="flex items-center gap-1">Total: <span
                                        class=" text-sm radius-full flex justify-center items-center w-8 h-8">{{ count($quiz->questions) }}</span>
                                </p>
                                <p class="flex items-center gap-1">Correct: <span
                                        class=" text-sm radius-full flex justify-center items-center w-8 h-8">{{ $count_correct_answer }}</span>
                                </p>
                                <p class="flex items-center gap-1">Wrong: <span
                                        class=" text-sm radius-full flex justify-center items-center w-8 h-8">{{ $count_incorrect_answer }}</span>
                                </p>
                                <p class="flex items-center gap-1"> Percentage: <span
                                        class=" text-sm radius-full flex justify-center items-center w-8 h-8">{{ round(($this->count_correct_answer * 100) / count($quiz->questions)) }}</span>
                                </p>
                            </div> --}}
                        </div>
                        {{-- @foreach ($quiz->questions as $question)
                            <div
                                class="border border-gray-300 mb-4 p-4  @if (array_key_exists($question->id, $correct_answers)) {{ $correct_answers[$question->id] ? 'bg-green-200' : 'bg-red-200' }} @endif}}">
                                <h3 class=""> {{ $i++ }}. {{ $question->name }}</h3>
                                <div class="flex gap-4">
                                    @foreach ($answerOpitons as $option)
                                        <div class="flex items-center pl-4  rounded">
                                            <input wire:click="answerUpdate({{ $question->id }})"
                                                @if (array_key_exists($question->id, $correct_answers)) disabled @endif wire:change="result"
                                                wire:model="answer.{{ $question->id }}"
                                                id="answer-{{ $option }}-{{ $question->id }}" type="radio"
                                                value="{{ explode('_', $option)[1] }}"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                            <label for="answer-{{ $option }}-{{ $question->id }}"
                                                class="w-full py-4 cursor-pointer ml-2 text-sm font-medium text-gray-900">{{ $question->$option }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
