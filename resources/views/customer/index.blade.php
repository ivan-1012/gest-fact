@extends('layout.plantilla')
@section('contenido')

<div class="card">
    <div class="card-header text-center">
        <h1 class="card-title"><strong>GEST-FACT | LISTADO DE CLIENTES</strong></h1>

    </div>
    <div class="card-body ">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('clientes/create')}}" class="text-center">
                    <button class="btn btn-success">Crear Cliente</button> </a>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombres Completos</th>
                        <th>Tipo de Documento</th>
                        <th>Documento Identidad</th>
                        <th>Teléfono</th>
                        <th>Correo Electrónico</th>
                        <th>Accíones</th>
                    </thead>
                    <tbody>

                        @foreach($customer as $cus)
                        <tr>
                            <td>{{ $cus->id }}</td>
                            <td>{{ $cus->full_name }}</td>
                            <td>{{ $cus->name_document }}</td>
                            <td>{{ $cus->document}}</td>
                            <td>{{ $cus->phone }}</td>
                            <td>{{ $cus->email }}</td>
                            <td>
                                <a href="{{URL::action('App\Http\Controllers\CustomersController@edit',$cus->id)}}"><button
                                        class="btn btn-primary">Actualizar</button></a>
                                <a href="" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$cus->id}}">
                                    <button type="button" class="btn btn-danger"> Eliminar</button>
                                </a>
                            </td>
                        </tr>

                        @include('customer.modal')

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
            {{ $customer->links('pagination::bootstrap-5') }}
        </div>


        @endsection