<?= $this->extend('_modelos/_tela/modais') ?>

<?= $this->section('content') ?>

<?php 
    // configurações iniciais
    $acao = $modal_config['acao'];
    $vazio = '';
    $conteudosValidos = array('editar', 'consultar');

    // tratamentos
    $exibir = in_array($acao, $conteudosValidos);
    $consultar = ($acao == 'consultar') ? 'disabled' : $vazio;
?>

<?php if($acao == 'editar'): ?>

    <input type="hidden" name="ID" value="<?= $dadosUsuarios->ID ?>">
    <input type="hidden" name="usuario_atual" value="<?= $dadosUsuarios->NOME ?>">

<?php endif ?>

<div class="row">

    <div class="form-group col-sm-6">
        <label for="nome"><?= lang('Usuarios.geral.campos.login.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger"></i></label>
        <input type="text" class="form-control" placeholder="<?= lang('Usuarios.geral.campos.login.descricao') ?>" id="NOME" name="NOME" autocomplete="off" style="text-transform:uppercase;" value="<?= ($exibir) ? $dadosUsuarios->NOME : $vazio ?>" autofocus <?= $consultar ?>>
    </div>

    <div class="form-group col-sm-6">
        <label for="nome"><?= lang('Usuarios.geral.campos.email.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger"></i></label>
        <input type="email" class="form-control" placeholder="<?= lang('Usuarios.geral.campos.email.descricao') ?>" id="EMAIL" name="EMAIL" autocomplete="off" style="text-transform:lowercase;" value="<?= ($exibir) ? $dadosUsuarios->EMAIL : $vazio ?>" <?= $consultar ?>>
    </div>

</div>

<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card card-secondary card-tabs">
            <div class="card-header p-0 pt-1">

                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="tab_1_tab_<?= $acao ?>" data-toggle="pill" href="#tab_1_<?= $acao ?>" role="tab" aria-controls="tab_1_<?= $acao ?>" aria-selected="true"><?= lang('Usuarios.geral.abas.info') ?></a></li>
                    <li class="nav-item"><a class="nav-link" id="tab_2_tab_<?= $acao ?>" data-toggle="pill" href="#tab_2_<?= $acao ?>" role="tab" aria-controls="tab_2_<?= $acao ?>" aria-selected="false"><?= lang('Usuarios.geral.abas.acesso') ?></a></li>
                </ul>

            </div> <!-- card-header -->

            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">

                    <div class="tab-pane fade show active" id="tab_1_<?= $acao ?>" role="tabpanel" aria-labelledby="tab_1_tab_<?= $acao ?>">
                        <div class="row">
                            
                            <div class="form-group col-sm-12">
                                <label for="nome_completo"><?= lang('Usuarios.geral.campos.nome.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger"></i></label>
                                <input type="text" class="form-control" placeholder="<?= lang('Usuarios.geral.campos.nome.descricao') ?>" id="NOME_COMPLETO" name="NOME_COMPLETO" value="<?= ($exibir) ? $dadosUsuarios->NOME : $vazio ?>" <?= $consultar ?>>
                            </div>

                            <div class="form-group col-sm-5">
                                <label for="nome"><?= lang('Usuarios.geral.campos.telefone.nome') ?>:</label>
                                <input type="text" class="form-control" placeholder="<?= lang('Usuarios.geral.campos.telefone.descricao') ?>" id="TELEFONE" name="TELEFONE" value="<?= ($exibir) ? $dadosUsuarios->TELEFONE : $vazio ?>" <?= $consultar ?>>
                            </div>

                        </div>
                    </div> <!-- tab-pane -->

                    <div class="tab-pane fade" id="tab_2_<?= $acao ?>" role="tabpanel" aria-labelledby="tab_2_tab_<?= $acao ?>">
                        <div class="row">

                            <div class="form-group col-sm-12">
                                <label><?= lang('Usuarios.geral.campos.permissao.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger"></i></label>
                                <select class="custom-select form-control" id="NVL_ACES" name="NVL_ACES" <?= $consultar ?>>

                                    <?php foreach ($dadosRegras as $regra) : ?>
                                        <?php if(OK($usuarioLogado->NIVEL, $regra->PERMISSAO)) : ?>
                                        <option value="<?= $regra->REGRA ?>" class="text-<?= $regra->COR ?>" <?php if($exibir) { echo (($dadosUsuarios->NIVEL == $regra->ID) ? 'selected' : $vazio); } else { echo (($regra->PADRAO == 'S') ? 'selected' : $vazio); } ?>><?= mb_strtoupper($regra->REGRA) . ' - ' . $regra->DESCRICAO ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>

                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="nome"><?= lang('Usuarios.geral.campos.senha.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger" id="senhareq" style="display: none;"></i></label>
                                <input type="password" class="form-control" placeholder="<?= lang('Usuarios.geral.campos.senha.descricao') ?>" id="SENHA" name="SENHA" autocomplete="off" value="<?= ($exibir) ? $dadosUsuarios->TELEFONE : '[47756bbae402385717293664a281ace9]' ?>" <?= $consultar ?>>
                                <p class="help-block text-info small"><?= lang('Usuarios.geral.campos.senha.info') ?></p>
                            </div>

                            <div class="form-group col-sm-6">
                                <label><?= lang('Usuarios.geral.campos.idioma.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger"></i></label>
                                <select class="custom-select form-control" id="idioma" name="IDIOMA" <?= $consultar ?>>
                                    <option value="portuguese-br" <?php if($exibir) { echo (($dadosUsuarios->IDIOMA == 'portuguese-br') ? 'selected' : $vazio); } else { echo 'selected'; } ?>>Português</option>
                                    <option value="english" <?php if($exibir) { echo (($dadosUsuarios->IDIOMA == 'english') ? 'selected' : $vazio); } else { echo $vazio; } ?>>English</option>
                                </select>
                            </div>
                        </div>
                    </div> <!-- tab-pane -->

                </div> <!-- tab-content -->
            </div> <!-- card-body -->

        </div> <!-- ./card -->
    </div> <!-- ./col -->
</div> <!-- ./row -->

<?= $this->endSection() ?>

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

        $('#NVL_ACES').change(function() {
            verificarCampos();
        });
    });
</script>