@extends('layout.plantilla')
@section ('contenido')
<div class="card">
    <div class="card-header text-center">
        <h1 class="card-title"><strong>GEST-FACT | EDITAR PRODUCTO</strong></h1>
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

    {{Form::open(array('action'=>array('App\Http\Controllers\ProductController@update', $product->id),'method'=>'patch'))}}
    <div class="card-body ">
        <div class="row">
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="name_product">Nombre Producto</label>
                    <input type="text" name="name_product" id="name_product" class="form-control"
                        placeholder="Digite el nombre del producto" value="{{$product->product_nam}}" required>
                </div>
            </div>

            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="tipo_categoria">Categoría del Producto</label>
                    <select type="select" name="tipo_categoria" id="tipo_categoria" class="form-control" required>
                        <option  value="$type_category->id">Selecciona Tipo de Categoría</option>
                        @foreach($type_category as $id => $name_category)
                        <option value="{{ $id }}" {{ $product->id_category == $id ? 'selected' : '' }}>{{ $name_category }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="observacion">Descripción del Producto</label>
                    <textarea name="observacion" rows="0" cols="0" id="observacion" class="form-control" placeholder="Ingrese la descripción del Producto" required>{{$product->descriptions}}</textarea>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="price">Precío Por Unidad</label>
                    <input type="number" name="price" id="price" class="form-control"
                        placeholder="Digite el precío por unidad" value="{{$product->price}}" required>
                </div>
            </div>

            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="stock">Cantidad</label>
                    <input type="number" name="stock" id="stock" class="form-control"
                        placeholder="Digite la cantidad de existencias actuales" value="{{$product->stock}}" required>
                </div>
            </div>


            <div class="col-md-12 text-center">
                <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-refresh"></span>
                    Actualizar
                </button>
                <a class="btn btn-danger" type="reset" href="{{url('productos')}}">
                    <span class="glyphicon glyphicon-home"></span> Regresar </a>
            </div>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection