<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use App\Http\Requests\StoreCarritoRequest;
use App\Http\Requests\UpdateCarritoRequest;
use App\Models\Carrito;
use App\Models\Factura;
use App\Models\Linea;
use App\Models\User;
use App\Models\Zapato;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carritos = Carrito::where('user_id', auth()->user()->id)->orderBy('id')->get();
        //$Totalarticulos = Carrito::where('user_id',auth()->user()->id)->sum('cantidad');

        $sumalinea = 0;

        foreach ($carritos as $key => $linea) {
            # code...
            $sumalinea += $linea->zapato->precio * $linea->cantidad;
        }
        //dd($sumalinea);

        return view('carritos/index', [
            'carritos' => $carritos,
            'totalCarrito' => $sumalinea
        ]);
    }


    public function VaciarCarrito()
    {
        $carritos = Carrito::where('user_id', auth()->user()->id)->get();

        
        if (!$carritos->count()) {
            
            return redirect()->route('carrito.index')->with('error', 'El carrito esta vacio.');
       
            // dd($carritos->count());
        }
        // dd($carritos);
        $carritos->each->delete();

        return redirect()->route('dashboard')->with('success', 'El carrito esta vacio.');
    }

    public function Comprar()
    {

        
        $carrito = Carrito::where('user_id', auth()->user()->id)->get();


        if ($carrito->count()) {

            $factura = new Factura();
            $factura->user_id = Auth::user()->id;
            $factura->save();


            foreach ($carrito as $lineacarrito) {
                $linea_nueva = new Linea();
                $linea_nueva->factura_id = $factura->id;
                $linea_nueva->zapato_id = $lineacarrito->zapato_id;
                $linea_nueva->cantidad = $lineacarrito->cantidad;
                $linea_nueva->save();
            }

            $carrito->each->delete();

            return redirect()->route('dashboard')->with('success', 'Pedido realizado.');
        } else {
            return redirect()->route('carrito.index')->with('error', 'el carrito esta vacio.');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function agregarCarrito(Zapato $zapato)
    {
        //$carrito = Carrito::where('zapato_id', $zapato->id)->first();
        
        $carrito = Carrito::where('zapato_id', $zapato->id)->where('user_id', auth()->user()->id)->first();

        //dd(Auth::user()->id.'-'.$carrito.$zapato);

        //dd($zapato->id .''.$carrito->count());
        if (!$carrito) {
            
            $carrito = New Carrito();
            $carrito->user_id = Auth::user()->id;
            $carrito->zapato_id = $zapato->id;
            $carrito->cantidad = 1;
        }else{
            $carrito->cantidad =$carrito->cantidad+1;
        }

        $carrito->save();

        return redirect()->route('dashboard')->with('success', 'Producto añadido con exito.');


        
    }


    public function aumentar(Carrito $carrito)
    {
        
        //dd($carrito->zapato->denominacion);
        $carrito->cantidad++;
      
        $carrito->save();

        return redirect()->route('carrito.index')->with('success', 'producto ( '.$carrito->zapato->denominacion.' ) aumentado');
    }


    public function disminuir(Carrito $carrito)
    {

        $carrito->cantidad--;
        
        if ($carrito->cantidad) {
            // dd($carrito->cantidad);
            
            $carrito->save();
            
            return redirect()->route('carrito.index')->with('success', 'producto ( '.$carrito->zapato->denominacion.' ) disminuido');
        }else{

            $carrito->delete();
            return redirect()->route('carrito.index')->with('success', 'producto ( '.$carrito->zapato->denominacion.' ) se ha eliminado del carrito');
        }
       
   
    }




    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarritoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarritoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarritoRequest  $request
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarritoRequest $request, Carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrito $carrito)
    {
        //
    }
}
