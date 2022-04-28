<?php

namespace App\View\Components;

use App\Models\Carrito;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {

        //dd(Carrito::where('user_id',auth()->user()->id)->get());
    
        //dd(Carrito::where('user_id',auth()->user()->id)->sum('cantidad'));
        $cantidad = Carrito::where('user_id',auth()->user()->id)->sum('cantidad');
        
        return view('layouts.app',['cantidad'=>$cantidad]);
    }
}
