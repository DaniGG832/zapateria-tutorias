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

                    {{-- {{$carritos[0]->zapatos->precio}} --}}
                    <div class="bg-blue-200">
                        <table class="table-auto border-separate border border-blue-900">
                            <thead>
                                <tr>
                                    <th class="border border-blue-600">Lineas carrito</th>
                                    <th class="border border-blue-600">Descripción</th>
                                    <th class="border border-blue-600">Cantidad</th>
                                    <th class="border border-blue-600">Precio</th>
                                    <th class="border border-blue-600">Total </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($carritos as $key =>$linea)
                                    <tr class="m-96">
                                        <td class="text-center border border-blue-600">{{ 'linea ' . $key + 1 }}</td>
                                        <td class="w-80 text-center border border-blue-600">
                                            {{ $linea->zapato->denominacion }}</td>
                                        <td class="text-right border border-blue-600">{{ $linea->cantidad }}</td>
                                        <td class="text-right border border-blue-600">
                                            {{ $linea->zapato->precio . ' €' }}</td>
                                        <td class="text-right border border-blue-600">
                                            {{ $linea->zapato->precio * $linea->cantidad . ' €' }}</td>

                                    </tr>
                                @empty
                                    <p>No hay articulos en el Carrito</p>
                                @endforelse
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <th class="border-2 border-blue-600">TOTAL CARRITO</th>
                                    <th class="w-28 text-right border-4 border-blue-600">{{ $totalCarrito . ' €' }}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="{{route('carrito.vaciar')}}">
                                            <button
                                                class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                Vaciar Carrito
                                            </button>
                                        </a>
                                    </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <th>
                                    <a href="{{route('carrito.comprar')}}">
                                            <button
                                                class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                Comprar
                                            </button>
                                        </a>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
