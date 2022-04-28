<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarritoRequest;
use App\Http\Requests\UpdateCarritoRequest;
use App\Models\Carrito;
use App\Models\User;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carritos = Carrito::where('user_id',auth()->user()->id)->get();
        //$Totalarticulos = Carrito::where('user_id',auth()->user()->id)->sum('cantidad');
        
        $sumalinea=0;

        foreach ($carritos as $key => $linea) {
            # code...
            $sumalinea+=$linea->zapato->precio * $linea->cantidad;
        }
//dd($sumalinea);

        return view('carritos/index',['carritos'=>$carritos,
                                'totalCarrito'=> $sumalinea]);
    }


    public function VaciarCarrito()
    {
        $carritos = Carrito::where('user_id',auth()->user()->id)->get();

           // dd($carritos);
        $carritos->each->delete();

        return redirect()->route('dashboard')->with('success', 'El carrito esta vacio.');
    }

    public function Comprar()
    {


        return 'comprar';
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
