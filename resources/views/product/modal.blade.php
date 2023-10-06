
<div class="modal fade" id="modal-delete-{{$pro->id}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    {{Form::Open(array('action'=>array('App\Http\Controllers\ProductController@destroy',$pro->id),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ELIMINAR PRODUCTO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar el producto <strong>{{ $pro->product_nam}}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
        </div>
    </div>
</div>
{{Form::Close()}}