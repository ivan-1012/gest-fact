@extends('layout.plantilla')
@section('contenido')
<div class="card">
    <div class="card-header text-center">
        <h1 class="card-title"><strong>GEST-FACT | INGRESAR CLIENTE</strong></h1>
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
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        </div>
    </div>
    {!!Form::open(array('url'=>'clientes','method'=>'POST','autocomplete'=>'off')
    )!!}
    {{Form::token()}}
    <div class="card-body ">
        <div class="row">
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="tipo_documento">Tipo de Documento</label>
                    <select type="select" name="tipo_documento" id="tipo_documento" class="form-control"required>
                        <option value="">Selecciona Tipo de Documento</option>
                        @foreach($type_document as $id => $name_document)
                            <option value="{{ $id }}">{{ $name_document }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="documento">Numero Documento</label>
                    <input type="number" name="documento_identidad" id="documento_identidad" class="form-control"
                        placeholder="Digite el número Documento" required>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre Completo"
                        required>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="apellido">Apellidos</label>
                    <input type="text" name="apellido" id="apeliido" class="form-control"
                        placeholder="Apellidos Completos" required>
                </div>
            </div>



            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="email">Telefono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono"
                        required>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electrónico"
                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                        title="Por favor, ingrese una dirección de correo electrónico válida" required>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <div class="form-group"> <br>
                    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span>
                        Guardar</button>
                    <button class="btn btn-primary" type="reset"><span class="glyphicon glyphicon-remove"></span>
                        Vaciar
                        Campos</button>
                    <a class="btn btn-danger" type="reset" href="{{url('clientes')}}">
                        <span class="glyphicon glyphicon-home"></span> Regresar </a>
                </div>

            </div>
        </div>
    </div>
    {!!Form::close()!!}
    @endsection