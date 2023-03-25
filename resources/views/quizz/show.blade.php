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
                    <div class="flex w-full bg-cyan-800 items-center align-middle mb-4 py-2">
                        <h2 class="text-left pl-4 text-white w-5/6">{{ $quiz->name }}</h2>
                        <h2 id="deadline" class="text-center text-red-500 bg-white mx-1 py-2 w-1/6 rounded-sm">
                        </h2>
                    </div>
                    @php
                        $i = 1;
                    @endphp
                    <form action="{{ route('quiz.submit') }}" method="post">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}" />
                        @foreach ($quiz->questions as $question)
                            <fieldset id="{{ $question->id }}" class="mt-4">
                                <h3 class="bg-orange-200 p-2 rounded">
                                    <p class="">Q{{ $i++ }}. {!! $question->question !!}</p>
                                </h3>
                                <div class="flex bg-gray-200">
                                    <div class="flex items-center pl-4 rounded">
                                        <input id="quesion-{{ $question->id }}-a" type="radio" required
                                            name="{{ $question->id }}" value="{{ $question->answer_1 }}"
                                            {{-- required="required" --}}
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                        <label for="quesion-{{ $question->id }}-a"
                                            class="w-full py-4 cursor-pointer ml-2 text-sm font-medium text-gray-900">{!! $question->answer_1 !!}</label>
                                    </div>

                                    <div class="flex items-center pl-4 rounded">
                                        <input id="quesion-{{ $question->id }}-b" type="radio"
                                            name="{{ $question->id }}" value="{{ $question->answer_2 }}"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                        <label for="quesion-{{ $question->id }}-b"
                                            class="w-full py-4 cursor-pointer ml-2 text-sm font-medium text-gray-900">{!! $question->answer_2 !!}</label>
                                    </div>
                                    <div class="flex items-center pl-4 rounded">
                                        <input id="quesion-{{ $question->id }}-c" type="radio"
                                            name="{{ $question->id }}" value="{{ $question->answer_3 }}"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                        <label for="quesion-{{ $question->id }}-c"
                                            class="w-full py-4 cursor-pointer ml-2 text-sm font-medium text-gray-900">{!! $question->answer_3 !!}</label>
                                    </div>
                                    <div class="flex items-center pl-4 rounded">
                                        <input id="quesion-{{ $question->id }}-d" type="radio"
                                            name="{{ $question->id }}" value="{{ $question->answer_4 }}"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                        <label for="quesion-{{ $question->id }}-d"
                                            class="w-full py-4 cursor-pointer ml-2 text-sm font-medium text-gray-900">{!! $question->answer_4 !!}</label>
                                    </div>
                                </div>
                            </fieldset>
                        @endforeach
                        <button id="submitExamAuto" type="submit" class="primary-btn py-2 mt-4">Finish Exam</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    var duration = {{ $duration }} * 60;
    var time = duration;
    var deadline = document.getElementById('deadline');
    setInterval(function() {
        var counter = time--,
            min = (counter / 60) >> 0,
            sec = (counter - min * 60) + '';
        deadline.textContent = "Exam end in: " + min + ":" + (sec.length > 1 ? "" : "0") + sec

        if (counter == 0) {
            document.getElementById('submitExamAuto').click();
            document.getElementById('deadline').hide();
        }
    }, 1000);
</script>
