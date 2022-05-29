<div class="modal-header">
    <h4 class="modal-title"><?= lang('Artefato.crud.botoes.incluir') ?> <? lang('Usuarios.geral.singular') ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>

<div class="form-msg"></div>

<form id="form-inserir-usuario" method="POST" autocomplete="on">

    <div class="modal-body">

        <div class="row">
        
            <div class="form-group col-sm-7">
                <label for="nome"><?= lang('Usuarios.geral.campos.login.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger"></i></label>
                <input type="email" class="form-control" placeholder="<?= lang('Usuarios.geral.campos.login.descricao') ?>" id="NOME" name="NOME" autocomplete="off" style="text-transform:uppercase;" autofocus>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card card-secondary card-tabs">
                    <div class="card-header p-0 pt-1">

                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="tab_1_tab" data-toggle="pill" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true"><?= lang('Usuarios.geral.abas.info') ?></a></li>
                            <li class="nav-item"><a class="nav-link" id="tab_2_tab" data-toggle="pill" href="#tab_2" role="tab" aria-controls="tab_2" aria-selected="false"><?= lang('Usuarios.geral.abas.acesso') ?></a></li>
                        </ul>

                    </div> <!-- card-header -->

                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">

                            <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1_tab">
                                <div class="row">
                                    
                                    <div class="form-group col-sm-12">
                                        <label for="nome_completo"><?= lang('Usuarios.geral.campos.nome.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger"></i></label>
                                        <input type="text" class="form-control" placeholder="<?= lang('Usuarios.geral.campos.nome.descricao') ?>" id="NOME_COMPLETO" name="NOME_COMPLETO">
                                    </div>

                                    <div class="form-group col-sm-5">
                                        <label for="nome"><?= lang('Usuarios.geral.campos.telefone.nome') ?>:</label>
                                        <input type="text" class="form-control" placeholder="<?= lang('Usuarios.geral.campos.telefone.descricao') ?>" id="TELEFONE" name="TELEFONE">
                                    </div>

                                </div>
                            </div> <!-- tab-pane -->

                            <div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="tab_2_tab">
                                <div class="row">

                                    <div class="form-group col-sm-12">
                                        <label><?= lang('Usuarios.geral.campos.permissao.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger"></i></label>
                                        <select class="custom-select form-control" id="NVL_ACES" name="NVL_ACES">

                                            <?php foreach ($dadosRegras as $regra) { if(OK($usuarioLogado->NIVEL, $regra->PERMISSAO)) { ?>
                                                <option value="<?= $regra->REGRA ?>" class="text-<?= $regra->COR ?>" <?= ($regra->PADRAO == 'S' ? 'selected' : '') ?>><?= mb_strtoupper($regra->REGRA) . ' - ' . $regra->DESCRICAO ?></option>
                                            <?php }} ?>

                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="nome"><?= lang('Usuarios.geral.campos.senha.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger" id="senhareq" style="display: none;"></i></label>
                                        <input type="password" class="form-control" placeholder="<?= lang('Usuarios.geral.campos.senha.descricao') ?>" id="SENHA" name="SENHA" autocomplete="off">
                                        <p class="help-block text-info small"><?= lang('Usuarios.geral.campos.senha.info') ?></p>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label><?= lang('Usuarios.geral.campos.idioma.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger"></i></label>
                                        <select class="custom-select form-control" id="idioma" name="IDIOMA">
                                            <option value="portuguese-br" selected>Português</option>
                                            <option value="english">English</option>
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- tab-pane -->

                        </div> <!-- tab-content -->
                    </div> <!-- card-body -->

                </div> <!-- ./card -->
            </div> <!-- ./col -->
        </div> <!-- ./row -->

    </div> <!-- modal-body -->

    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" id="cancel_form_edit" data-dismiss="modal"> <i class="fas fa-times mr-2 text-danger"></i> <?= lang('Artefato.crud.botoes.cancelar') ?></button>
        <button type="submit" class="btn btn-primary"> <i class="fas fa-save mr-2"></i></i> <?= lang('Artefato.crud.botoes.salvar') ?></button>
    </div>
</form>

<script type="text/javascript">
    $(function () {
        function verificarCampos() {
            var sist = $('#NVL_ACES').val();

            if(sist) {
                if((sist == "INATIVO")) {
                    $('#senhareq').hide();
                    $("#SENHA").attr("disabled", true);
                    $('#nvlreq').hide();
                } else {
                    $('#nvlreq').show();

                    if((sist == "INATIVO") || (sist == "EXTRA")) {
                        $('#senhareq').hide();
                        $("#SENHA").attr("disabled", true);
                    } else {
                        $('#senhareq').show();
                        $("#SENHA").attr("disabled", false);
                    }

                }
            }
        }

        verificarCampos();

        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })

        $('input').change(function () {
            $('#' + this.id).removeClass('is-invalid');
            $('#error' + this.id).remove;
        });

        $('#NVL_ACES').change(function() {
            verificarCampos();
        });

        $(document).on("click", "#cancel_form_edit", function() {
            $('.error').remove();
            $('.is-invalid').removeClass('is-invalid');
            document.getElementById("form-inserir-usuario").reset();
            $('#NOME').focus();
        })
    });
</script>