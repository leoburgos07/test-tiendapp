@extends('layouts/app')

@section('title')
Marcas
@endsection



@section('title-content')
<h1>Edición de Marca</h1>
@endsection

@section('content')
<hr>
    <form action="{{ url("brands/{$brand->id}") }}" method="post">

    {!! csrf_field() !!}
    @method('PUT')
        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" class="font-weight-bold">Nombre</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="name" value="{{$brand->name}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="reference" class="font-weight-bold">Referencia</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="reference" maxlength="6" value="{{$brand->reference}}" >
                        </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    @if($errors->any())
        <h4 class="text-danger">{{$errors->first()}}</h4>
    @endif

@endsection