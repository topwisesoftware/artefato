<div class="modal fade" id="<?= $modal_config['id'] ?>" role="dialog">
    
    <div class="modal-dialog modal-<?= $modal_config['size'] ?>" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title"><?= $modal_config['titulo'] ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="form-msg"></div>

            <form id="form-<?= $modal_config['id'] ?>" method="POST" autocomplete="on">

                <div class="modal-body">

                    <?= $this->renderSection('content') ?>

                </div> <!-- modal-body -->

                <div class="modal-footer justify-content-between">
                    <?php if($modal_config['acao'] == 'consultar') : ?>
                        <button type="button" class="btn btn-default" id="cancel_form_edit" data-dismiss="modal"> <i class="fas fa-times mr-2 text-danger"></i> <?= lang('Artefato.crud.botoes.fechar') ?></button>
                    <?php else : ?>
                        <button type="button" class="btn btn-default" id="cancel_form_edit" data-dismiss="modal"> <i class="fas fa-times mr-2 text-danger"></i> <?= lang('Artefato.crud.botoes.cancelar') ?></button>
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-save mr-2"></i></i> <?= lang('Artefato.crud.botoes.salvar') ?></button>
                    <?php endif ?>
                </div>
            </form>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })

        $('input').change(function () {
            $('#' + this.id).removeClass('is-invalid');
            $('#error' + this.id).remove;
        });

        $(document).on("click", "#cancel_form_edit", function() {
            $('.error').remove();
            $('.is-invalid').removeClass('is-invalid');
            document.getElementById("form-inserir-usuario").reset();
            $('#NOME').focus();
        })
    });
</script>