


<div class="grid justify-center md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-7 my-10">

    @foreach ($zapatos as $zapato)
        <div class="bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">

            <div class="p-3">


                <h2 class="font-semibold text-xl leading-6 text-blue-700 my-2">
                    <span class="text-sm text-primary text-gray-700">{{$zapato->codigo}}</span><br>
                    {{ $zapato->denominacion }}
                </h2>
                <p class="paragraph-normal text-blue-400">
                   {{ $zapato->precio.' €'}}
                </p>
                
                <br>


               {{--  <a href="{{ route('zapatoes.show', $zapato, true) }}"
                    class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Mostrar</a>

                <a href="{{ route('zapatoes.edit', $zapato, true) }}"
                    class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>

                <form action="{{ route('zapatoes.destroy', $zapato) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <br>
                    <button onclick="return confirm('¿Seguro que desea borrar el zapato?')"
                        class="px-4 py-1 text-sm text-white bg-red-400 rounded" type="submit">Borrar</button>
                </form> --}}

            </div>
        </div>
    @endforeach

</div>