<h1> {{$modo}} Libro</h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
<ul>        
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
</ul>         
    </div>

@endif

<div class= "form-group">
<label for = "Nombre"> Nombre </label>
<input type="text" class = "form-control" name = "Nombre" value = "{{ isset($libro->Nombre)?$libro->Nombre:old('Nombre')}}" id = "Nombre">
</div>

<div class= "form-group">
<label for = "Autor"> Autor </label>
<input type="text" class = "form-control" name = "Autor" value = "{{ isset($libro->Autor)?$libro->Autor:old('Autor')}}" id = "Autor">
</div>

<div class= "form-group">
<label for = "Editorial">Editorial</label>
<input type="text" class = "form-control" name = "Editorial" value = "{{ isset($libro->Editorial)?$libro->Editorial:old('Editorial')}}" id = "Editorial">
</div>

<div class= "form-group">
<label for = "Categoria"> Categoria </label>
<input type="text" class = "form-control" name = "Categoria" value = "{{ isset($libro->Categoria)?$libro->Categoria:old('Categoria')}}" id = "Categoria">
</div>

<div class= "form-group">
<label for = "Isbn"> Isbn </label>
<input type="number" class = "form-control" name = "Isbn" value = "{{ isset($libro->Isbn)?$libro->Isbn:old('Isbn')}}" id = "Isbn">
</div>

<div class= "form-group">
<label for = "Paginas"> Paginas </label>
<input type="number" class = "form-control" name = "Paginas" value = "{{ isset($libro->Paginas)?$libro->Paginas:old('Paginas')}}" id = "Paginas">
</div>

<div class= "form-group">
<label for = "Encuadernacion"> Encuadernacion </label>
<input type="text" class = "form-control" name = "Encuadernacion" value = "{{ isset($libro->Encuadernacion)?$libro->Encuadernacion:old('Encuadernacion')}}" id = "Encuadernacion">
</div>


<div class= "form-group">
<label for = "Tipo"> Tipo </label>
<input type="text" class = "form-control" name = "Tipo" value = "{{ isset($libro->Tipo)?$libro->Isbn:old('Tipo')}}" id = "Tipo">
</div>

<div class= "form-group">
<label for = "Foto"> </label>
@if(isset($libro->Foto))
<img src = "{{ asset('storage').'/'.$libro->Foto }}" width = "200" alt="">
@endif
<input type="file" class = "form-control"  name = "Foto"  value = "" id = "Foto">
<br>
</div>

<input class = "btn btn-success" type="submit" value = "{{$modo}} datos">

<a class = "btn btn-primary" href="{{url('libro/')}}"> Regresar </a>

<br>