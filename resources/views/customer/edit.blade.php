@extends('layout.plantilla')
@section ('contenido')
<div class="card">
    <div class="card-header text-center">
        <h1 class="card-title"><strong>GEST-FACT | EDITAR CLIENTE</strong></h1>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    {{Form::open(array('action'=>array('App\Http\Controllers\CustomersController@update', $customer->id),'method'=>'patch'))}}
    <div class="card-body ">
        <div class="row">
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="tipo_documento">Tipo de Documento</label>
                    <select type="select" name="tipo_documento" id="tipo_documento" class="form-control" required>
                        <option value="$type_document->id">Selecciona Tipo de Documento</option>
                        @foreach($type_document as $id => $name_document)
                        <option value="{{ $id }}" {{ $customer->id_type == $id ? 'selected' : '' }}>
                            {{ $name_document  }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="documento_identidad" class="form-label">Documento
                        Identidad</label>
                    <input type="number" name="documento_identidad" id="documento_identidad" class="form-control"
                        value="{{$customer->document}}" required>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{$customer->first_name}}"required>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="Apellido" class="form-label">Apellido</label>

                    <input type="text" name="apellido" id="apellido" class="form-control"
                        value="{{$customer->last_name}}" required>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{$customer->phone}}" required>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{$customer->email}}" required>
                </div>
            </div>


            <div class="col-md-12 text-center">
                <button class="btn btn-success" type="submit"><span class="glyphicon glyphiconrefresh"></span>
                    Actualizar
                </button>
                <a class="btn btn-danger" type="reset" href="{{url('clientes')}}">
                    <span class="glyphicon glyphicon-home"></span> Regresar </a>
            </div>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection