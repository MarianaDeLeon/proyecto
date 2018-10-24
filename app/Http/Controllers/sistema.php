<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\cliente;
use App\municipio;
use App\usuario;
use App\maquina;
class sistema extends Controller
{
    //procesos realizados con el catalogo CLIENTES
    //ALTA
    public function altacliente()
	{

    $clavequesigue = cliente::orderBy('id','desc')
                              ->take(1)
                                ->get();
        $idc = $clavequesigue[0]->id+1;

        //select * from carreras
        //orm eloquent
        $municipios =municipio:: all();
        $usuarios =usuario:: all();
    return view ('proyecto.altacliente')
            ->with('municipios', $municipios)
            ->with('usuarios', $usuarios)
            ->with('idc',$idc);
    }
	public function guardacliente(Request $request)
	{   
    $id= $request->id;
	$nombre = $request->nombre;
    $apat = $request->apat;
    $amat = $request->amat;
    $empresa = $request->empresa;
    $telefono = $request->telefono;
    $direccion= $request->direccion;
	$municipio_id = $request->municipio_id;
    $cp = $request->cp;
    $usuario_id = $request->usuario_id;
	//no se resive el archivo
	 $this->validate($request,[
	     'id'=>'required|numeric',
         'nombre'=>'required|alpha',
         'apat'=>'required|alpha',
         'amat'=>'required|alpha',
         'empresa'=>'required|alpha',
         'telefono'=>'required|numeric|min:7',
		 'cp'=>['regex:/^[0-9]{5}/'],
        'archivo' => 'image|mimes:jpg,jpeg,gif,png'
         ]);
         
    $file = $request->file('archivo');
    if($file!="")
    {
    $ldate = date('Ymd_His_');
    $img = $file->getClientOriginalName();
    $img2 = $ldate.$img;
    \Storage::disk('local')->put($img2, \File::get($file));
    }
    else
    {
        $img2 = 'sinfoto.jpg';
    }
    //insert into maestros...     
        $clie = new cliente;
        $clie->archivo = $img2;
        $clie->id = $request->id;
        $clie->nombre = $request->nombre;
        $clie->apat = $request->apat;
        $clie->amat = $request->amat;
        $clie->empresa = $request->empresa;
        $clie->telefono = $request->telefono;
        $clie->cp = $request->cp;
        $clie->municipio_id = $request->municipio_id;
        $clie->usuario_id = $request->usuario_id;
        $clie->save();
        
        $proceso = "ALTA DE cliente";
        $mensaje = "cliente guardado correctamente";
        return view ("proyecto.mensaje")
        ->with('proceso', $proceso)
        ->with('mensaje',$mensaje);
	  
	}
//REPORTE CLIENTE
public function reportecliente() 
    {
        $clientes = cliente::orderBy('nombre', 'asc')->get();
        return view ('proyecto.reportecl')
        ->with ('clientes', $clientes);
    }

   
//PROCESOS REALIZADOS CON EL CATALOGO USUARIOS

public function altausuario()
	{

    $clavequesigue = usuario::orderBy('id','desc')
                              ->take(1)
                                ->get();
        $idu = $clavequesigue[0]->id+1;

        //select * from carreras
        //orm eloquent
       
    return view ('proyecto.altausuario')
            ->with('idu',$idu);
    }
	public function guardausuario(Request $request)
	{   
    $id = $request->id;   
	$nombre = $request->nombre;
    $apat = $request->apat;
    $amat = $request->amat;
    $calle = $request->calle;
    $telefono = $request->telefono;
    $correo_usu= $request->correo_usu;
    $pass = $request->pass;
    $tipo = $request->tipo;
    $activo = $request->activo;
	//no se resive el archivo
	 $this->validate($request,[
	     'id'=>'required|numeric',
         'nombre'=>'required|alpha',
         'apat'=>'required|alpha',
         'amat'=>'required|alpha',
         'calle'=>'required|alpha',
         'telefono'=>'required|numeric|min:7',
         'correo_usu'=>'required|email',
         'pass'=>'required',
        'archivo' => 'image|mimes:jpg,jpeg,gif,png'
         ]);
         
    $file = $request->file('archivo');
    if($file!="")
    {
    $ldate = date('Ymd_His_');
    $img = $file->getClientOriginalName();
    $img2 = $ldate.$img;
    \Storage::disk('local')->put($img2, \File::get($file));
    }
    else
    {
        $img2 = 'sinfoto.jpg';
    }
    //insert into maestros...     
        $usu = new usuario;
        $usu->archivo = $img2;
        $usu->id = $request->id;
        $usu->nombre = $request->nombre;
        $usu->apat = $request->apat;
        $usu->amat = $request->amat;
        $usu->calle = $request->calle;
        $usu->telefono = $request->telefono;
        $usu->correo_usu = $request->correo_usu;
        $usu->pass = $request->pass;
        $usu->tipo = $request->tipo;
        $usu->activo = $request->activo;
        $usu->save();
        
        $proceso = "ALTA USUARIO";
        $mensaje = "usuario guardado correctamente";
        return view ("proyecto.mensaje")
        ->with('proceso', $proceso)
        ->with('mensaje',$mensaje);
	  
	}
//REPORTE USUARIO
public function reporteusu() 
    {
        $usuarios = usuario::orderBy('nombre', 'asc')->get();
        return view ('proyecto.reporteusu')
        ->with ('usuarios', $usuarios);
    }


}
