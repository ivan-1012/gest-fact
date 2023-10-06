
<div class="modal fade" id="modal-delete-{{$cus->id}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    {{Form::Open(array('action'=>array('App\Http\Controllers\CustomersController@destroy',$cus->id),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ELIMINAR CLIENTE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar el cliente con N° de Documento <strong>{{ $cus->document}}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
        </div>
    </div>
</div>
{{Form::Close()}}