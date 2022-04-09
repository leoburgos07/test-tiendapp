@extends('layouts/app')

@section('title')
    Marcas
@endsection

@section('item')
<a class="nav-link" href="{{url('brands/create')}}">Crear Marca</a>
@endsection

@section('title-content')   
    <h1>Creación de marcas</h1>
@endsection

@section('content')
    <hr>
    
    <form action="{{url('brands')}}" method="POST">
        {!! csrf_field() !!}
        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" class="font-weight-bold">Nombre</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="reference" class="font-weight-bold">Reference</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="reference" maxlength="6" placeholder="Alfanumerica de 6 caracteres" required>
                        </div>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>

    @if($errors->any())
        <h4 class="text-danger">{{$errors->first()}}</h4>
    @endif

@endsection