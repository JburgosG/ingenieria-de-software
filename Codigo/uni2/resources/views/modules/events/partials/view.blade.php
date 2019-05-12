<div class="modal inmodal" id="viewEvent_{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title">{{ $row->name }}</h4>
                <div class="hr-line-dashed"></div>
                <img src="{{ url('storage/' . $row->image) }}" class="img-responsive img-thumbnail img-event">
            </div>
            <div class="modal-body">
                <p>{{ $row->description }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>