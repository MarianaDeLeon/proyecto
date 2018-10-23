<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\cliente;
use App\municipio;
use App\usuario;
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
	$nombre = $request->nombre;
    $apat = $request->apat;
    $amat = $request->amat;
    $empresa = $request->empresa;
    $telefono = $request->telefono;
    $direccion= $request->direccion;
	$id = $request->id;
    $cp = $request->cp;
    $id = $request->id;
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
        $clie->muncipio_id = $request->municipio_id;
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

    public function eliminam($idm) 
    {
       //echo "El maestro a eliminar es $idm";
       maestros::find($idm)->delete();
       $proceso = "Eliminar Maestros";
       $mensaje = "El maestro ha sido borrado correctamente";
       return view ('proyecto.mensaje')
       ->with('proceso', $proceso)
       ->with('mensaje', $mensaje);
    
    }

    public function modificam($idm) 
    {
       //echo "El maestro a Modificar es $idm";
      
       $maestro = maestros::where('idm', '=', $idm)->get();
      $idc = $maestro[0]->idc;
      $carrera = carreras::where('idc','=', $idc)->get(); 
      $todasdemas = carreras::where('idc','!=',$idc)->get();

      return view ('proyecto.modificamaestro')
       ->with('maestro',$maestro[0])
       ->with('idc',$idc)
     ->with('carrera', $carrera[0]->nombre)
     ->with('todasdemas', $todasdemas);
    }    

    public function guardaedicionm(Request $request)
    {
       // echo $request->nombre;
       $nombre = $request->nombre;
	$edad= $request->edad;
	$correo = $request->correo;
	$idm = $request->idm;
	$cp = $request->cp;
	//no se resive el archivo
	 $this->validate($request,[
	     'idm'=>'required|numeric',
         'nombre'=>'required|alpha',
         'edad'=>'required|integer|min:18|max:70',
         'correo'=>'required|email',
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
         $maest =  maestros::find($idm);
         if($file!="")
        {
            $maest->archivo = $img2;
        }
        $maest->idm = $request->idm;
        $maest->nombre = $request->nombre;
        $maest->edad = $request->edad;
        $maest->correo = $request->correo;
        $maest->cp = $request->cp;
        $maest->idc = $request->idc;
        $maest->save();
        
        $proceso = "MODIFICACION DE MAESTRO";
        $mensaje = "Maestro Modificado correctamente";
        return view ("proyecto.mensaje")
        ->with('proceso', $proceso)
        ->with('mensaje',$mensaje);
         
       
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
	public function guardaclien(Request $request)
	{   
	$nombre = $request->nombre;
    $apat = $request->apat;
    $amat = $request->amat;
    $empresa = $request->empresa;
    $telefono = $request->telefono;
    $direccion= $request->direccion;
	$id = $request->id;
    $cp = $request->cp;
    $id = $request->id;
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
        $clie->muncipio_id = $request->municipio_id;
        $clie->usuario_id = $request->usuario_id;
        $clie->save();
        
        $proceso = "ALTA DE cliente";
        $mensaje = "cliente guardado correctamente";
        return view ("proyecto.mensaje")
        ->with('proceso', $proceso)
        ->with('mensaje',$mensaje);
	  
	}
//REPORTE CLIENTE
public function reporteclie() 
    {
        $clientes = cliente::orderBy('nombre', 'asc')->get();
        return view ('proyecto.reportecl')
        ->with ('clientes', $clientes);
    }



}
