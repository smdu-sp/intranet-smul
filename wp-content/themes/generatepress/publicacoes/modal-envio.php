<div backdrop="static" class="modal fade" id="modal-publicacoes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Publicação</h5>
            </div>
            <div class="modal-body" v-html="modalTexto">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" :disabled="modalTrava">Fechar</button>
            </div>
        </div>
    </div>
</div>