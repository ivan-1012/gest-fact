@extends('layout.plantilla')
@section('contenido')
<div class="card">
    <div class="card-header text-center">
        <h1 class="card-title"><strong>GEST-FACT | INGRESAR CATEGORIA</strong></h1>
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
    {!!Form::open(array('url'=>'categorias','method'=>'POST','autocomplete'=>'off')
    )!!}
    {{Form::token()}}
    <div class="card-body ">
        <div class="row ">
            
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12 ">
                <div class="form-group">
                    <label for="name_categoria">Nombre Categoría</label>
                    <input type="text" name="name_categoria" id="name_categoria" class="form-control"
                        placeholder="Ingrese Nombre de la Categoría" required>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="observacion">Descripción de Categoría</label>
                    <textarea name="observacion" rows="0" cols="0" id="observacion" class="form-control" placeholder="Ingrese la descripción de Categoría" required></textarea>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <div class="form-group"> <br>
                    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span>
                        Guardar</button>
                    <button class="btn btn-primary" type="reset"><span class="glyphicon glyphicon-remove"></span>
                        Vaciar
                        Campos</button>
                    <a class="btn btn-danger" type="reset" href="{{url('categorias')}}">
                        <span class="glyphicon glyphicon-home"></span> Regresar </a>
                </div>

            </div>
        </div>
    </div>
    {!!Form::close()!!}
    @endsection