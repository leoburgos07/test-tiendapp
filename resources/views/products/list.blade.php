@extends('layouts/app')

@section('title')
    Productos
@endsection

@section('item')
<a class="nav-link" href="{{url('products/create')}}">Crear Producto</a>
@endsection

@section('title-content')   
    <h1>Listado de productos</h1>
@endsection

@section('content')
<br>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Observaciones</th>
            <th scope="col">Marca</th>
            <th scope="col">Talla</th>
            <th scope="col">Stock</th>
            <th scope="col">Fecha de embarque</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
        <tr>
            <th>{{$product->name}}</th>
            <td>{{$product->observations}}</td>
            <td>{{$product->marca}}</td>
            <td>{{$product->talla}}</td>
            <td>{{$product->stock}}</td>
            <td>{{$product->boardingDate}}</td>
            <td class="d-flex justify-content-center">
                
                <a href="{{url("products/{$product->id}/edit")}}" class="btn btn-dark"><i class="fas fa-pen-square"></i></a>
                <form action="{{ url("products/{$product->id}") }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dark"><i class="fas fa-trash-alt"></i></button>
                </form>
                
            </td>

            
        </tr>
        @empty
        <h3 class="text-danger">No hay productos registrados</h3>
        @endforelse

    </tbody>
</table>
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('status') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@endsection