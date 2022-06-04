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
                <th><?= lang('Usuarios.geral.campos.id.nome') ?></th>
                <th><?= lang('Usuarios.geral.campos.login.nome') ?></th>
                <th><?= lang('Usuarios.geral.campos.nome.nome') ?></th>
                <th><?= lang('Usuarios.geral.campos.telefone.nome') ?></th>
                <th><?= lang('Usuarios.geral.campos.permissao.nome') ?></th>
                <th><?= lang('Usuarios.geral.campos.idioma.nome') ?></th>
                <th><?= lang('Usuarios.geral.campos.foto.nome') ?>?</th>
            </tr>
        </thead>
        <tbody id="dados-relatorio">

            <?php foreach ($dadosUsuarios as $usuario) { ?>
                <tr>
                    <td><?= $usuario->ID ?></td>
                    <td><?= $usuario->LOGIN ?></td>
                    <td><?= $usuario->NOME ?></td>
                    <td><?= $usuario->TELEFONE ?></td>
                    <td><?= $usuario->NIVEL ?></td>
                    <td><?= $usuario->IDIOMA ?></td>
                    <td><?= mb_strtoupper(($usuario->FOTO == '') ? lang('Artefato.relatorios.mensagens.nao') : lang('Artefato.relatorios.mensagens.sim')); ?></td>
                </tr>
            <?php $no++; } ?>

        </tbody>
    </table>
</div>

<?= $this->endSection() ?>