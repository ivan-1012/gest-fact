@extends('layout.plantilla')
@section('contenido')

<div class="card">
    <div class="card-header text-center">
        <h1 class="card-title"><strong>GEST-FACT | LISTADO DE PRODUCTOS</strong></h1>

    </div>
    <div class="card-body ">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('productos/create')}}" class="text-center">
                    <button class="btn btn-success">Crear Producto</button> </a>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre del Producto</th>
                        <th>Descripción del Producto</th>
                        <th>Categoría</th>
                        <th>Precío Unitarios</th>
                        <th>Existencías</th>
                        <th>Accíones</th>
                    </thead>
                    <tbody>

                        @foreach($product as $pro)
                        <tr>
                            <td>{{ $pro->id }}</td>
                            <td>{{ $pro->product_nam }}</td>
                            <td>{{ $pro->descriptions }}</td>
                            <td>{{ $pro->name_category}}</td>
                            <td>{{ $pro->price }}</td>
                            <td>{{ $pro->stock }}</td>
                            <td>
                                <a href="{{URL::action('App\Http\Controllers\ProductController@edit',$pro->id)}}"><button
                                        class="btn btn-primary">Actualizar</button></a>
                                <a href="" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$pro->id}}">
                                    <button type="button" class="btn btn-danger"> Eliminar</button>
                                </a>
                            </td>
                        </tr>

                        @include('product.modal')

                        @endforeach


                    </tbody>

                </table>
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
                @elseif(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
            </div>
            {{ $product->links('pagination::bootstrap-5') }}
        </div>


        @endsection