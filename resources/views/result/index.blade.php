<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Result') }}
            </h2>
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
                                <th class="text-left border px-4 py-1">Student</th>
                                <th class="text-left border px-4 py-1">Score</th>
                                <th class="text-center border px-4 py-1">Actions:</th>
                            </tr>
                            @foreach ($results as $result)
                                <tr>
                                    <td class="text-left border px-4 py-1">{{ $result->id }}</td>
                                    <td class="text-left border px-4 py-1">{{ $result->user->name }}</td>
                                    <td class="text-left border px-4 py-1">{{ $result->score }}</td>
                                    <td class="border px-4 py-1">
                                        <div class="flex justify-center text-center items-center space-x-2">
                                            <a class="bg-green-600 text-white p-1 rounded" href="{{ route('result.show', $result->id) }}">
                                                @include('components.icons.eye')
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