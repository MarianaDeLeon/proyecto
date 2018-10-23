@extends('proyecto.principal')

@section('contenido')
<h1> Reporte de Clientes</h1>
<br>
<table border =1>
<tr><td>Clave</td><td>Logo</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Empresa</td><td>Telefono</td><td>Direccion</td><td>CP</td><td>Municipio</td><td>Operaciones</td></tr>
@foreach($clientes as $cl)
<tr><td>{{$cl->id}}</td><td><img src = "{{asset('archivo/'.$cl->archivo)}}" height=50 width= 50></td><td>{{$cl->nombre}}</td><td>{{$cl->apat}}</td><td>{{$cl->amat}}</td><td>{{$cl->empresa}}</td><td>{{$cl->telefono}}</td><td>{{$cl->direccion}}</td>
<td>{{$cl->cp}}</td><td>{{$cl->municipio_id}}</td>
<td><a href= "">
Elimina</a> 
<a href= "">
Modificar</a></td></tr>
@endforeach
</table>
@stop