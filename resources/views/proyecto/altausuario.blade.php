@extends('proyecto.principal')

@section('contenido')

<h1> Alta de usuario</h1>
<form action ="" method = 'POST' enctype= 'multipart/form-data'>
{{csrf_field()}}

@if($errors->first('id')) 
<i> {{ $errors->first('id') }} </i> 
@endif	<br>
    
clave <input type = 'text' name = 'id' value="{{$idu}}" readonly = 'readonly'>
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
@if($errors->first('calle')) 
<i> {{ $errors->first('calle') }} </i> 
@endif	<br>
Calle<input type = 'text' name = 'calle' value="{{old('calle')}}">
<br>
@if($errors->first('telefono')) 
<i> {{ $errors->first('telefono') }} </i> 
@endif	<br>
Telefono<input type = 'text' name = 'telefono' value="{{old('telefono')}}">
<br>

@if($errors->first('correo')) 
<i> {{ $errors->first('correo_usu') }} </i> 
@endif	<br>
Telefono<input type ='text' name = 'telefono' value="{{old('telefono')}}">
<br>
@if($errors->first('pass')) 
<i> {{ $errors->first('pass') }} </i> 
@endif	<br>
Contraseña<input type = 'password' name= 'pass' value="{{old('pass')}}">
<br>
Tipo<select name = 'tipo'>
<option value= 1>Admin</option>
<option value=2>Usuario</option>


                  </select>
<br>
Activo<select name = 'activo'>
<option value= 1>si</option>
<option value=0>no</option>
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




