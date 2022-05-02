<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de factura numero: '.$factura->id) }}

    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <p class="text-gray-500">Nombre usuario: <span class="text-blue-900">{{' '.Auth::user()->name}}</span></p>
                    <p class="text-gray-500">Email: <span class="text-blue-800">{{' '.Auth::user()->email}}</span></p>
                    <p class="text-gray-500">Numero de factura:<span class="text-blue-800">{{' '.$factura->id}}</span></p>
                    <p class="text-gray-500">fecha factura:<span class="text-blue-800">{{' '.$factura->created_at}}</span></p>

                    {{-- {{$facturas[0]->zapatos->precio}} --}}
                    <div class="bg-blue-50">
                        {{-- {{$facturas->isEmpty()}} --}}
                       
                            <table class="table-auto border-separate border border-blue-100 mt-4">
                                <thead>
                                    <tr>
                                        <th class="border border-blue-400">denominacion</th>
                                        <th class="border border-blue-400">precio</th>
                                        <th class="border border-blue-400">cantidad</th>
                                        <th class="border border-blue-400">total</th>
                                        {{-- <th class="border border-blue-600">Detalles</th> --}}

                                    </tr>
                                </thead>
                                <tbody>
                                   {{--  {{$factura->lineas[0]}}
                                    {{$factura->lineas[0]->zapato}} --}}

                                  
                                    @foreach ($factura->lineas as $key =>$linea)
                                            
                                    <tr class="m-96">
                                        <td class="text-center border border-blue-300">
                                            {{ $linea->zapato->denominacion}}</td>

                                        <td class="w-80 text-center border border-blue-300">
                                            {{ $linea->zapato->precio.' €'}}</td>

                                        <td class="text-right border border-blue-300">
                                            {{ $linea->cantidad }}</td>

                                        <td class="text-right border border-blue-300">
                                            {{ $linea->cantidad* $linea->zapato->precio.' €'}}</td>
                                        

                                    </tr>
                                    
                                    
                                    
                                    
                                    @endforeach 
                                    <tr>
                                        <td></td>
                                    </tr>

                                    <tr class="m-96 ">
                                        <td ></td>
                                        <td ></td>
                                        <td class="text-center font-semibold border-2 border-blue-400">IVA<span class="text-sm text-gray-500" > 21%</span></td>
                                        <td class="text-center text-lg font-semibold border-2 border-blue-600 w-44">{{$iva.' €'}}</td>
                                
                                    </tr>

                                    <tr class="m-96 ">
                                        <td ></td>
                                        <td ></td>
                                        <td class="text-center text-xl font-semibold border-2 border-blue-800">Total</td>
                                        <td class="text-center text-xl font-bold border-2 border-blue-800 w-44">{{$total.' €'}}</td>
                                
                                    </tr>

                                </tbody>
                            </table>
                       
                    </div>
                   

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
