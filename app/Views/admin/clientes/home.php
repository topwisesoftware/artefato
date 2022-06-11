<?= $this->extend('_modelos/_tela/principal') ?>

<?= $this->section('content') ?>

<!-- Content Here -->
<div class="msg" style="display:none;"><?= session()->getFlashData('mensagem') ?></div>

<div class="card">
    
    <div class="card-header">
    
        <?php if(OK($usuarioLogado->NIVEL,  'EQUIPE')) : ?>
            <a href="<?= base_url('/clientes/relatorio/listagem') ?>" class="btn bg-gradient-info mr-2" target="_blank" <?php if($tipo_janela_impressao == 'POPUP') { ?> onclick="window.open('<?= base_url('/Clientes/Relatorio/listagem') ?>', 'newwindow', 'width=800,height=600'); return false;" <?php } ?>><i class="fas fa-print mr-2"></i><?= lang('Artefato.crud.botoes.listagem') ?></a>
        <?php endif; ?>

        <?php if(OK($usuarioLogado->NIVEL,  'EQUIPE')) : ?>
            <button type="button" class="btn bg-gradient-primary float-right" id="btn-incluir-clientes" data-toggle="modal" data-target="#inserir-clientes"><i class="fas fa-user-plus mr-2"></i><?= lang('Artefato.crud.botoes.incluir') ?> <?= lang('Clientes.geral.singular') ?></button>
        <?php endif; ?>

    </div> <!-- /.box-header -->

    <div class="card-body">

        <table id="list-data" class="<?= TOPWISE_retornaConfigTabela() ?>">
            <thead>
                <tr>
                    <th><?= lang('Clientes.geral.campos.nome.nome') ?></th>
                    <th><?= lang('Clientes.geral.campos.email.nome') ?></th>
                    <th><?= lang('Clientes.geral.campos.telefone.nome') ?></th>
                    <th><?= lang('Clientes.geral.campos.foto.nome') ?></th>
                    <th style="text-align: center;"><?= lang('Artefato.crud.campos.acoes') ?></th>
                </tr>
            </thead>
            <tbody id="dados-clientes"></tbody>
        </table>

    </div> <!-- card-body -->
</div> <!-- card -->

<?php echo $modal_inserir_clientes; ?>

<div id="lugar-modal"></div>

<?= $this->endSection() ?>