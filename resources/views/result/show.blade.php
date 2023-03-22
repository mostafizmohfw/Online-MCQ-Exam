<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Result Show') }}
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
                                <td class="text-left border px-4 py-1">Sl:</td>                    
                                <td class="text-left border px-4 py-1">{{ $result->id }}</td>                    
                            </tr>  
                            <tr class="bg-gray-200 rounded-t">
                                <td class="text-left border px-4 py-1">Name:</td>                    
                                <td class="text-left border px-4 py-1">{{ $result->quiz_id }}</td>                    
                            </tr> 

                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
