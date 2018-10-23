@extends('proyecto.principal')

@section('contenido')

<h1> Alta de Clientes</h1>
<form action ="{{route('guardacliente')}}" method = 'POST' enctype= 'multipart/form-data'>
{{csrf_field()}}

@if($errors->first('id')) 
<i> {{ $errors->first('id') }} </i> 
@endif	<br>
    
clave <input type = 'text' name = 'id' value="{{$idc}}" readonly = 'readonly'>
<br>
@if($errors->first('nombre')) 
<i> {{ $errors->first('nombre') }} </i> 
@endif	<br>
Nombre<input type = 'text' name = 'nombre' value="{{old('nombre')}}">
<br>
@if($errors->first('apat')) 
<i> {{ $errors->first('apat') }} </i> 
@endif	<br>
Apellido Paterno<input type = 'text' name = 'apat' value="{{old('apat')}}">
<br>
@if($errors->first('amat')) 
<i> {{ $errors->first('amat') }} </i> 
@endif	<br>
Apellido Materno<input type = 'text' name = 'amat' value="{{old('amat')}}">
<br>
@if($errors->first('empresa')) 
<i> {{ $errors->first('empresa') }} </i> 
@endif	<br>
Empresa<input type = 'text' name = 'empresa' value="{{old('empresa')}}">
<br>
@if($errors->first('telefono')) 
<i> {{ $errors->first('telefono') }} </i> 
@endif	<br>
Telefono<input type ='text' name = 'telefono' value="{{old('telefono')}}">
<br>
@if($errors->first('direccion')) 
<i> {{ $errors->first('direccion') }} </i> 
@endif	<br>
Direccion<input type = 'text' name = 'direccion' value="{{old('direccion')}}">
<br>

@if($errors->first('cp')) 
<i> {{ $errors->first('cp') }} </i> 
@endif	<br>
Codigo Postal<input type = 'text' name= 'cp' value="{{old('cp')}}" alt='el codigo postal debe de ser de 5 digitos'>
<br>
Municipio<select name = 'municipio_id'>
@foreach($municipios as $mun)
 <option value = '{{$mun->id}}'>{{$mun->municipio}}</option>
 @endforeach
                  </select>
<br>
Usuario<select name = 'usuario_id'>
@foreach($usuarios as $us)
 <option value = '{{$us->id}}'>{{$us->nombre}}</option>
 @endforeach
                  </select>
<br>
@if($errors->first('archivo')) 
<i> {{ $errors->first('archivo') }} </i> 
@endif	<br>
<br>
Selecionar Logo <input type = 'file' name= 'archivo'>
<br>
<input type = 'submit' value = 'Guardar'>
</form>
@stop





