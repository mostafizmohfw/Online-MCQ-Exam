<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Result Show') }}
            </h2>

            <a class="primary-btn py-2 flex items-center gap-2" href="{{ route('generate.pdf', $result->id) }}">
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
                        <div class="text-center"<p>Your got {{ $result->score }} marks.</p>
                            <p>Your archieved {{ $result->percentage }}% marks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-xl p-2 text-center font-bold mt-3">Your Answer Sheet:</h2>
                @if (auth()->id() === $result->user_id)
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($answered_questions as $question)
                        <div class="">
                            <p class="px-5 py-2">Q{{ $i++ }}. {!! $question->question !!}</p>
                            <div class="ml-10">
                                <p
                                    class="px-5 py-2 @if ($question->user_answered == $question->correct_answer) text-green-600 @else text-red-600 @endif">
                                    Answered:
                                    {!! $question->user_answered !!}</p>
                                <p class="px-5 py-2 text-orange-400">Correct Answer: {!! $question->correct_answer !!}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-red-500 text-center my-5">your are unauthorized</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
