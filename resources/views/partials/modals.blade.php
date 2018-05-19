<div class="modal fade" tabindex="-1" role="dialog" id="modal-delete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Eliminando registro</h4>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de eliminar éste registro?</p>
                {!! Form::open(['id' => 'form-delete', 'method' => 'DELETE']) !!}
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button id="yes-delete" type="button" class="btn btn-danger" data-dismiss="modal">Sí estoy seguro</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal" id="pleaseWait" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <span class="glyphicon glyphicon-time"></span>
                    Por favor espere...
                </h4>
            </div>
            <div class="modal-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-info active" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
</div>