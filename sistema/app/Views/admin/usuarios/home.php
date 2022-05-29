<?= $this->extend('_modelos/_tela/principal') ?>

<?= $this->section('content') ?>

<!-- Content Here -->
<div class="msg" style="display:none;"><?= session()->getFlashData('mensagem') ?></div>

<div class="card">
    
    <div class="card-header">
        
        <?php //if(OK($userdata, 'COMERCIAL')) { ?>
            <a href="<?= base_url('/Usuarios/Relatorio/listagem') ?>" class="btn bg-gradient-info mr-2" target="_blank" <?php if($tipo_janela_impressao == 'POPUP') { ?> onclick="window.open('<?= base_url('/Usuarios/Relatorio/listagem') ?>', 'newwindow', 'width=800,height=600'); return false;" <?php } ?>><i class="fas fa-print mr-2"></i><?= lang('Artefato.crud.botoes.listagem') ?></a>
        <?php //} ?>

        <?php //if(OK($userdata, 'COMERCIAL')) { ?>
            <button type="button" class="btn bg-gradient-primary float-right" id="btn-incluir-usuarios" data-toggle="modal" data-target="#inserir-usuarios"><i class="fas fa-user-plus mr-2"></i><?= lang('Artefato.crud.botoes.incluir') ?> <?= lang('Usuarios.geral.singular') ?></button>
        <?php //} ?>

    </div> <!-- /.box-header -->

    <div class="card-body">

        <table id="list-data" class="<?= TOPWISE_retornaConfigTabela() ?>">
            <thead>
                <tr>
                    <th><?= lang('Usuarios.geral.campos.login.nome') ?></th>
                    <th><?= lang('Usuarios.geral.campos.nome.nome') ?></th>
                    <th><?= lang('Usuarios.geral.campos.telefone.nome') ?></th>
                    <th><?= lang('Artefato.crud.campos.status') ?></th>
                    <th style="text-align: center;"><?= lang('Artefato.crud.campos.acoes') ?></th>
                </tr>
            </thead>
            <tbody id="dados-usuarios"></tbody>
        </table>

    </div> <!-- card-body -->
</div> <!-- card -->

<?php echo $modal_inserir_usuarios; ?>

<div id="lugar-modal"></div>


<?= $this->endSection() ?>