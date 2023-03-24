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
                        <h2 class="text-center mb-3">Welcome <span
                                class="font-bold text-cyan-600 text-lg">{{ $result->user->name }}</span>, your result is
                            ready.
                        </h2>
                        <div class="text-center"<p>Your got <span
                                class="text-orange-500 italic font-extrabold text-xl">{{ $result->score }}</span> marks.
                            </p>
                            <p>Your archieved <span
                                    class="text-orange-500 italic font-extrabold text-xl">{{ $result->percentage }}%</span>
                                marks.</p>
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
                            <p class="px-5 py-2 bg-orange-100">Q{{ $i++ }}. {!! $question->question !!}</p>
                            <div class="ml-10">
                                @if ($question->user_answered == $question->correct_answer)
                                    <p class="px-5 py-2 text-green-600 font-bold flex gap-1"> <svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Correct Answer:
                                        {!! $question->correct_answer !!}</p>
                                @else
                                    <p class="px-5 py-2 text-green-600 flex gap-1"> <svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg> Correct Answer:
                                        {!! $question->correct_answer !!}</p>
                                    <p
                                        class="px-5 py-2 flex gap-1 @if ($question->user_answered == $question->correct_answer) text-green-600 @else text-red-600 @endif">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        You Answered:
                                        {!! $question->user_answered !!}
                                    </p>
                                @endif
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
