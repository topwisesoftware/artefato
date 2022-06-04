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

    // campos Clientes
    $campoNOME = array(
        'componente' => 'input',
        'tipo' => 'text',
        'campo' => 'NOME',
        'dados' => ($exibir) ? $dadosClientes->NOME : $vazio,
        'label' => array(
            'texto' => lang('Clientes.geral.campos.nome.nome'),
        ),
        'config' => array(
            'dica' => lang('Clientes.geral.campos.nome.descricao'),
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => '',
            'autofocus' => FALSE,
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-12',
            'estado' => $consultar,
        ),
    );

    $campoEMAIL = array(
        'componente' => 'input',
        'tipo' => 'email',
        'campo' => 'EMAIL',
        'dados' => ($exibir) ? $dadosClientes->EMAIL : $vazio,
        'label' => array(
            'texto' => lang('Clientes.geral.campos.email.nome'),
        ),
        'config' => array(
            'dica' => lang('Clientes.geral.campos.email.descricao'),
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => 'text-transform:lowercase;',
            'autofocus' => FALSE,
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-6',
            'estado' => $consultar,
        ),
    );

    $campoTELEFONE = array(
        'componente' => 'input',
        'tipo' => 'text',
        'campo' => 'TELEFONE',
        'dados' => ($exibir) ? $dadosClientes->TELEFONE : $vazio,
        'label' => array(
            'texto' => lang('Clientes.geral.campos.telefone.nome'),
        ),
        'config' => array(
            'dica' => lang('Clientes.geral.campos.telefone.descricao'),
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => '',
            'autofocus' => FALSE,
            'obrigatorio' => FALSE,
            'grade' => 'col-sm-5',
            'estado' => $consultar,
        ),
    );

?>

<?php if($acao == 'editar'): ?>

    <input type="hidden" name="ID" value="<?= $dadosClientes->ID ?>">
    <input type="hidden" name="HASH" value="<?= topwise_gerar_senha($dadosClientes->ID) ?>">

<?php endif ?>

<div class="row">

    <?= Componente($campoNOME) ?>

</div>

<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card card-secondary card-tabs">
            <div class="card-header p-0 pt-1">

                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="tab_1_tab_<?= $acao ?>" data-toggle="pill" href="#tab_1_<?= $acao ?>" role="tab" aria-controls="tab_1_<?= $acao ?>" aria-selected="true"><?= lang('Clientes.geral.abas.um') ?></a></li>
                    <li class="nav-item"><a class="nav-link" id="tab_2_tab_<?= $acao ?>" data-toggle="pill" href="#tab_2_<?= $acao ?>" role="tab" aria-controls="tab_2_<?= $acao ?>" aria-selected="false"><?= lang('Clientes.geral.abas.dois') ?></a></li>
                </ul>

            </div> <!-- card-header -->

            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">

                    <div class="tab-pane fade show active" id="tab_1_<?= $acao ?>" role="tabpanel" aria-labelledby="tab_1_tab_<?= $acao ?>">
                        <div class="row">

                            <?= Componente($campoEMAIL) ?>

                        </div>
                    </div> <!-- tab-pane -->

                    <div class="tab-pane fade" id="tab_2_<?= $acao ?>" role="tabpanel" aria-labelledby="tab_2_tab_<?= $acao ?>">
                        <div class="row">

                            <?= Componente($campoTELEFONE) ?>

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