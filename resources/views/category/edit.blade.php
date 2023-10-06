@extends('layout.plantilla')
@section ('contenido')
<div class="card">
    <div class="card-header text-center">
        <h1 class="card-title"><strong>GEST-FACT | EDITAR CATEGORIA</strong></h1>
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

    {{Form::open(array('action'=>array('App\Http\Controllers\CategoryController@update', $category->id),'method'=>'patch'))}}
    <div class="card-body ">
        <div class="row">
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="name_categoria" class="form-label">Nombre de Categoria</label>
                    <input type="text" name="name_categoria" id="name_categoria" class="form-control"
                        value="{{$category->name_category}}" required>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="observacion" class="form-label">Descripcion de Categoria</label>
                    <textarea name="observacion" rows="0" cols="0" id="observacion" class="form-control" placeholder="Ingrese la descripción de Categoría" required>{{$category->descripcion}}</textarea>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-refresh"></span>
                    Actualizar
                </button>
                <a class="btn btn-danger" type="reset" href="{{url('categorias')}}">
                    <span class="glyphicon glyphicon-home"></span> Regresar </a>
            </div>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection