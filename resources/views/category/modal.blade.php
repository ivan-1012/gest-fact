
<div class="modal fade" id="modal-delete-{{$ca->id}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    {{Form::Open(array('action'=>array('App\Http\Controllers\CategoryController@destroy',$ca->id),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ELIMINAR CATEGORIA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar la categoria <strong>{{ $ca->name_category}}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
        </div>
    </div>
</div>
{{Form::Close()}}