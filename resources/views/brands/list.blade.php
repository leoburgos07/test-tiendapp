@extends('layouts/app')

@section('title')
Marcas
@endsection

@section('item')
<a class="nav-link" href="{{url('brands/create')}}">Crear Marca</a>
@endsection

@section('title-content')
<h1>Listado de marcas</h1>
@endsection

@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">Referencia</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($brands as $brand)
        <tr>
            <th>{{$brand->reference}}</th>
            <td>{{$brand->name}}</td>
            <td class="d-flex justify-content-center">
                
                <a href="{{url("brands/{$brand->id}/edit")}}" class="btn btn-dark"><i class="fas fa-pen-square"></i></a>
                <form action="{{ url("brands/{$brand->id}") }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dark"><i class="fas fa-trash-alt"></i></button>
                </form>  
            </td>
            <td>
            </td>
        </tr>
        @empty
        <h3 class="text-danger">No hay marcas registradas</h3>
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