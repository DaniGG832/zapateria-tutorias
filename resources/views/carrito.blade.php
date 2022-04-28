<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carrito') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   

                    @forelse ($carritos as $key =>$linea)
                    <p>
                        
                        {{'linea '. $key+1 .' - '. $linea->zapato->denominacion}}
                        {{'Cantidad: '.$linea->cantidad}}
                        {{'Precio: '.$linea->zapato->precio .' = '  
                        .$linea->zapato->precio*$linea->cantidad.' €'}}
                    </p>
                    @empty
                        <p>No hay articulos en el Carrito</p>
                    @endforelse

                    {{-- {{$carritos[0]->zapatos->precio}} --}}


                   

                </div>
            </div>
        </div>
    </div>
</x-app-layout>