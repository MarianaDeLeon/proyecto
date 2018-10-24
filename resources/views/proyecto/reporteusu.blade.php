@extends('proyecto.principal')

@section('contenido')
<h1> Reporte de Usuario</h1>
<br>
<table border =1>
<tr><td>Clave</td><td>Nombre</td><td>Archivo</td><td>Apellido Paterno</td><td>Apellido Materno</td>
<td>Calle</td><td>Telefono</td><td>Correo</td><td>Tipo</td><td>Activo</td><td>Operaciones</td></tr>
@foreach($usuarios as $us)
<tr><td>{{$us->id}}</td><td><img src = "{{asset('archivo/'.$usu->archivo)}}" height=50 width= 50></td>
<td>{{$usu->nombre}}</td><td>{{$usu->apat}}</td><td>{{$usu->amat}}</td><td>{{$usu->calle}}</td><td>{{$usu->telefono}}</td><td>{{$usu->correo}}</td>
<td>{{$usu->correo_usu}}</td><td>{{$usu->tipo}}</td><td>{{$usu->activo}}</td>
<td><a href= "">
Elimina</a> 
<a href= "">
Modificar</a></td></tr>
@endforeach
</table>
@stop