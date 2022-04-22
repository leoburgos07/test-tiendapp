@extends('layouts/app')

@section('title')
Editar producto
@endsection



@section('title-content')
<h1>Edición de Producto</h1>
@endsection

@section('content')
<hr>
    <form action="{{ url("products/{$product->id}") }}" method="post">

    {!! csrf_field() !!}
    @method('PUT')
    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name" class="font-weight-bold">Nombre</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="name" value="{{$product->name}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="stock" class="font-weight-bold">Cantidad</label>
                            <span class="text-danger">*</span>
                            <input type="number" class="form-control" name="stock" value="{{$product->stock}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="boardingDate" class="font-weight-bold">Fecha de embarque</label>
                            <span class="text-danger">*</span>
                            <input type="date" class="form-control" name="boardingDate" value="{{$product->boardingDate}}">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="size" class="font-weight-bold">Talla</label>
                            <span class="text-danger">*</span> <br>
                            <select name="size" id="">
                                @forelse ($sizes as $size)
                                    @if ($size->id == $product->size_id )
                                        <option value="{{$size->id}}" selected>{{$size->size}}</option>
                                        @else
                                        <option value="{{$size->id}}">{{$size->size}}</option>
                                    @endif
                                    
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
                                @if ($brand->id == $product->brand_id)
                                    <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                                    @else
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endif
                                
                                @empty
                                <option value="#"> - </option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="observations" class="font-weight-bold">Observaciones</label>
                            <span class="text-danger">*</span>
                            <textarea name="observations" class="form-control" cols="10" rows="3" >{{$product->observations}}</textarea>
                        </div>
                        
                        
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    @if($errors->any())
        <h4 class="text-danger">{{$errors->first()}}</h4>
    @endif

@endsection