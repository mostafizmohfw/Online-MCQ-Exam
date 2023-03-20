<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quizz Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <form action="{{ route('quiz.store') }}" method="post">
                            @csrf
                            <div class="text-gray-500 flex gap-3">
                                <label>Name: </label>
                                <input type="text" name="name" id="name">
                            </div>

                            {{-- <div class="text-gray-500 flex gap-3">
                                <label>Select Category: </label>
                                <select class="">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="text-gray-500">
                                <label></label>
                                <button type="submit"
                                    class="text-white bg-teal-500 py-2 px-4 mt-4 rounded">Create</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
