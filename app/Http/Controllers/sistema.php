<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\cliente;;
class sistema extends Controller
{
    public function altacliente()
	{

    $clavequesigue = cliente::orderBy('id','desc')
                              ->take(1)
                                ->get();
        $idc = $clavequesigue[0]->id+1;

        //select * from carreras
        //orm eloquent
       // $carreras = carreras:: all();
    return view ('sistema.altacliente')
         //   ->with('carreras', $carreras)
            ->with('idc',$idc);
    }
}
