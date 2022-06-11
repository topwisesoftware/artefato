<?= $this->extend('_modelos/_relatorio/principal') ?>

<?= $this->section('content') ?>

<?php
    $no = 1;
    $descricao_relatorio = mb_strtoupper($titulo . ' (' . $descricao . ')');
?>
<div id="tabela" class="table-responsive">
    <table id="list-data" class="table table-condensed ">
        <thead>
            <tr>
                <th colspan="9"><?php echo $descricao_relatorio; ?></th>
            </tr>
            <tr>
                <th><?= lang('Clientes.geral.campos.id.nome') ?></th>
                <th><?= lang('Clientes.geral.campos.nome.nome') ?></th>
                <th><?= lang('Clientes.geral.campos.email.nome') ?></th>
                <th><?= lang('Clientes.geral.campos.telefone.nome') ?></th>
                <th><?= lang('Clientes.geral.campos.foto.nome') ?>?</th>
            </tr>
        </thead>
        <tbody id="dados-relatorio">

            <?php foreach ($dadosClientes as $cliente) { ?>
                <tr>
                    <td><?= $cliente->ID ?></td>
                    <td><?= $cliente->NOME ?></td>
                    <td><?= $cliente->EMAIL ?></td>
                    <td><?= $cliente->TELEFONE ?></td>
                    <td><?= mb_strtoupper(($cliente->FOTO == '') ? lang('Artefato.relatorios.mensagens.nao') : lang('Artefato.relatorios.mensagens.sim')); ?></td>
                </tr>
            <?php $no++; } ?>

        </tbody>
    </table>
</div>

<?= $this->endSection() ?>