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
    <form action="{{url('products')}}" method="POST">
        {!! csrf_field() !!}
        <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name" class="font-weight-bold">Nombre</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="stock" class="font-weight-bold">Cantidad</label>
                            <span class="text-danger">*</span>
                            <input type="number" class="form-control" name="stock" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="boardingDate" class="font-weight-bold">Fecha de embarque</label>
                            <span class="text-danger">*</span>
                            <input type="date" class="form-control" name="boardingDate" required>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="size" class="font-weight-bold">Talla</label>
                            <span class="text-danger">*</span> <br>
                            <select name="size" id="">
                                @forelse ($sizes as $size)
                                <option value="{{$size->id}}">{{$size->size}}</option>
                                @empty
                                <option value="#"> - </option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="brand" class="font-weight-bold">Marca</label>
                            <span class="text-danger">*</span> <br>
                            <select name="brand" id="">
                                @forelse ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @empty
                                <option value="#"> - </option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="observations" class="font-weight-bold">Observaciones</label>
                            <span class="text-danger">*</span>
                            <textarea name="observations" class="form-control" cols="10" rows="3" required></textarea>
                        </div>
                        
                        
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>

    @if($errors->any())
        <h4 class="text-danger">{{$errors->first()}}</h4>
    @endif

@endsection