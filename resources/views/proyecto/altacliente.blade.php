<html>
<body>
<h1> Alta de Cliente</h1>
<form action ="" method = 'POST' enctype= 'multipart/form-data'>
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

@if($errors->first('edad')) 
<i> {{ $errors->first('edad') }} </i> 
@endif	<br>
Edad<input type ='text' name = 'edad' value="{{old('edad')}}">
<br>
@if($errors->first('correo')) 
<i> {{ $errors->first('correo') }} </i> 
@endif	<br>
correo<input type = 'text' name= 'correo' value="{{old('correo')}}">
<br>
@if($errors->first('cp')) 
<i> {{ $errors->first('cp') }} </i> 
@endif	<br>
Codigo Postal<input type = 'text' name= 'cp' value="{{old('cp')}}" alt='el codigo postal debe de ser de 5 digitos'>
<br>

<br>
<br>
@if($errors->first('archivo')) 
<i> {{ $errors->first('archivo') }} </i> 
@endif	<br>
<br>
Seleciones foto <input type = 'file' name= 'archivo'>
<br>
<input type = 'submit' value = 'Guardar'>
</form>
</body>
</html>




