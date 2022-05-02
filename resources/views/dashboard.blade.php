<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articulos') }}
        
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                    <x-zapatos-index :zapatos=$zapatos :page=$page>


                    </x-zapatos-index>
                   
{{$page}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
