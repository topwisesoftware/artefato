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

    // campos
    $campoLOGIN = array(
        'componente' => 'input',
        'tipo' => 'text',
        'campo' => 'LOGIN',
        'dados' => ($exibir) ? $dadosUsuarios->LOGIN : $vazio,
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.login.nome'),
        ),
        'config' => array(
            'dica' => lang('Usuarios.geral.campos.login.descricao'),
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => 'text-transform:uppercase;',
            'autofocus' => TRUE,
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-6',
            'estado' => $consultar,
        ),
    );

    $campoEMAIL = array(
        'componente' => 'input',
        'tipo' => 'email',
        'campo' => 'EMAIL',
        'dados' => ($exibir) ? $dadosUsuarios->EMAIL : $vazio,
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.email.nome'),
        ),
        'config' => array(
            'dica' => lang('Usuarios.geral.campos.email.descricao'),
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => 'text-transform:lowercase;',
            'autofocus' => FALSE,
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-6',
            'estado' => $consultar,
        ),
    );

    $campoNOME = array(
        'componente' => 'input',
        'tipo' => 'text',
        'campo' => 'NOME',
        'dados' => ($exibir) ? $dadosUsuarios->NOME : $vazio,
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.nome.nome'),
        ),
        'config' => array(
            'dica' => lang('Usuarios.geral.campos.nome.descricao'),
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => '',
            'autofocus' => FALSE,
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-12',
            'estado' => $consultar,
        ),
    );

    $campoTELEFONE = array(
        'componente' => 'input',
        'tipo' => 'text',
        'campo' => 'TELEFONE',
        'dados' => ($exibir) ? $dadosUsuarios->TELEFONE : $vazio,
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.telefone.nome'),
        ),
        'config' => array(
            'dica' => lang('Usuarios.geral.campos.telefone.descricao'),
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => '',
            'autofocus' => FALSE,
            'obrigatorio' => FALSE,
            'grade' => 'col-sm-5',
            'estado' => $consultar,
        ),
    );

    $campoSENHA = array(
        'componente' => 'input',
        'tipo' => 'password',
        'campo' => 'SENHA',
        'dados' => ($exibir) ? '[47756bbae402385717293664a281ace9]' : $vazio,
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.senha.nome'),
        ),
        'config' => array(
            'dica' => lang('Usuarios.geral.campos.senha.descricao'),
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => '',
            'autofocus' => FALSE,
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-6',
            'estado' => $consultar,
            //'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w!@#$%&*()-_=+|<,>.;:?§ªº°¹²³£¢¬]{6,}$/',
        ),
        'mensagem' => array(
            'cor' => 'text-info',
            'texto' => lang('Usuarios.geral.campos.senha.info'),
        )
    );             


?>

<?php if($acao == 'editar'): ?>

    <input type="hidden" name="ID" value="<?= $dadosUsuarios->ID ?>">
    <input type="hidden" name="USER" value="<?= $dadosUsuarios->LOGIN ?>">
    <input type="hidden" name="HASH" value="<?= topwise_gerar_senha($dadosUsuarios->ID . $dadosUsuarios->LOGIN) ?>">

<?php endif ?>

<div class="row">

    <?= Componente($campoLOGIN) ?>
    <?= Componente($campoEMAIL) ?>

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

                            <?= Componente($campoNOME) ?>
                            <?= Componente($campoTELEFONE) ?>

                        </div>
                    </div> <!-- tab-pane -->

                    <div class="tab-pane fade" id="tab_2_<?= $acao ?>" role="tabpanel" aria-labelledby="tab_2_tab_<?= $acao ?>">
                        <div class="row">

                            <div class="form-group col-sm-12">
                                <label for="NIVEL"><?= lang('Usuarios.geral.campos.permissao.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger"></i></label>
                                <select class="custom-select form-control" id="NIVEL" name="NIVEL" <?= $consultar ?>>

                                    <?php foreach ($dadosRegras as $regra) : ?>
                                        <?php if(OK($usuarioLogado->NIVEL, $regra->PERMISSAO)) : ?>
                                        <option value="<?= $regra->REGRA ?>" class="text-<?= $regra->COR ?>" <?php if($exibir) { echo (($dadosUsuarios->NIVEL == $regra->ID) ? 'selected' : $vazio); } else { echo (($regra->PADRAO == 'S') ? 'selected' : $vazio); } ?>><?= mb_strtoupper($regra->REGRA) . ' - ' . $regra->DESCRICAO ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>

                                </select>
                            </div>

                            <?= Componente($campoSENHA) ?>

                            <div class="form-group col-sm-6">
                                <label for="IDIOMA"><?= lang('Usuarios.geral.campos.idioma.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger"></i></label>
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

        
    });
</script>