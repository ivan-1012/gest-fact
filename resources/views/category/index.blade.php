@extends('layout.plantilla')
@section('contenido')

<div class="card">
    <div class="card-header text-center">
        <h1 class="card-title"><strong>GEST-FACT | LISTADO DE CATEGORIAS</strong></h1>

    </div>
    <div class="card-body ">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('categorias/create')}}" class="text-center">
                    <button class="btn btn-success">Crear Categoria</button> </a>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre Categoría</th>
                        <th>Descripción</th>
                        <th>Accíones</th>
                    </thead>
                    <tbody>

                        @foreach($category as $ca)
                        <tr>
                            <td>{{ $ca->id }}</td>
                            <td>{{ $ca->name_category }}</td>
                            <td>{{ $ca->descripcion }}</td>

                            <td>
                                <a href="{{URL::action('App\Http\Controllers\CategoryController@edit',$ca->id)}}"><button
                                        class="btn btn-primary">Actualizar</button></a>
                                <a href="" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$ca->id}}">
                                    <button type="button" class="btn btn-danger"> Eliminar</button>
                                </a>
                            </td>
                        </tr>

                        @include('category.modal')

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
            {{ $category->links('pagination::bootstrap-5') }}
        </div>


        @endsection