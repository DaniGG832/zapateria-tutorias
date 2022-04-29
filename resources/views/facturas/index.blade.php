<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Facturas') }}

    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- {{$facturas[0]->zapatos->precio}} --}}
                    <div class="">
                        {{-- {{$facturas->isEmpty()}} --}}
                        @if ($facturas->isEmpty())
                            <p class="text-2xl"> No hay facturas</p>
                        @else
                            <table class="table-auto border-separate border border-blue-100">
                                <thead>
                                    <tr>
                                        <th class="border border-blue-400">facturas</th>
                                        <th class="border border-blue-400">numero factura</th>
                                        <th class="border border-blue-400">fecha</th>
                                        <th class="border border-blue-400">Articulos</th>
                                        <th class="border border-blue-400">Detalles</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($facturas as $key =>$factura)
                                        {{ $factura->lineas }}
                                        <tr class="m-96">
                                            <td class="text-center border border-blue-200">{{ $key + 1 }}</td>
                                            <td class="w-80 text-center border border-blue-200">
                                                {{ $factura->id }}</td>
                                            <td class="text-right border border-blue-200">
                                                {{ $factura->created_at }}</td>
                                            <td class="text-right border border-blue-200">
                                                {{ $factura->lineas->sum('cantidad') }}</td>
                                            <td class="text-right border border-blue-200">
                                              <a href="{{route('facturas.detalles',$factura)}}">
                                                <button
                                                    class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    mostrar
                                                </button>
                                            </a>
                                              
                                            </td>


                                        </tr>



                                    @empty
                                        <p class="text-2xl"> No hay articulos en el factura</p>
                                    @endforelse
                                    <tr>
                                        <td></td>
                                    </tr>



                                </tbody>
                            </table>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
