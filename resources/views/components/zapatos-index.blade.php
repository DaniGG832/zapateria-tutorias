


<div class="grid justify-center md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-7 my-10">

    @foreach ($zapatos as $zapato)
        <div class="bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">

            <div class="p-3">

                <span> </span>
                <h2 class="font-semibold text-xl leading-6 text-blue-700 my-2">
                    <span class="text-sm text-primary text-gray-700">Codigo: {{$zapato->codigo}}<br>Denominación: </span>
                     {{$zapato->denominacion }}
                </h2>
                <p class="paragraph-normal text-blue-400">
                   {{'Precio: '. $zapato->precio.' €'}}
                </p>
                
                <br>


                 {{-- <a href="{{ route('zapatoes.show', $zapato, true) }}"
                    class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Mostrar</a>

                <a href="{{ route('zapatoes.edit', $zapato, true) }}"
                    class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>
 --}}
                <form action="{{ route('carrito.agregarCarrito', $zapato) }}" method="POST">
                    @csrf
                    @method('POST')
                    <br>
                    <button {{-- onclick="return confirm('¿Seguro que desea borrar el zapato?')" --}}
                        class="px-4 py-1 text-sm text-white bg-blue-400 rounded" type="submit">Añadir</button>
                </form> 

            </div>
        </div>
    @endforeach

</div>

{{ $zapatos->links() }}