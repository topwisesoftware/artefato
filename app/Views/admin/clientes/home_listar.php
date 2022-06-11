<?php
    $no = 1;
    foreach ($dadosClientes as $cliente) {
        ?>
            <tr>
                <td><?= $cliente->NOME ?></td>
                <td><?= $cliente->EMAIL ?></td>
                <td><?= $cliente->TELEFONE ?></td>
                <td>
                    <?= TOPWISE_retornaFoto($cliente->FOTO) ?>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-primary btn-xs consultar-dadosClientes mr-1" data-id="<?= $cliente->ID ?>"><i class="far fa-eye"></i> <?= lang('Artefato.crud.botoes.consultar') ?></button>
                    <?php if(OK($usuarioLogado->NIVEL,  'ADMINISTRADOR')) : ?>
                        <button type="button" class="btn bg-gradient-success btn-xs editar-dadosClientes mr-3" data-id="<?= $cliente->ID ?>"><i class="far fa-edit"></i> <?= lang('Artefato.crud.botoes.editar') ?></button>
                    <?php endif; ?>
                    <?php if(OK($usuarioLogado->NIVEL,  'DESENVOLVEDOR')) : ?>
                        <button type="button" class="btn btn-outline-danger btn-xs confirmarExcluir-clientes" data-id="<?= $cliente->ID ?>" data-nome="<?= $cliente->NOME ?>"><i class="fas fa-trash" data-toggle="modal" data-target="#confirmarExclusao"></i> <?= lang('Artefato.crud.botoes.excluir') ?></button>
                    <?php endif; ?>
                </td>
            </tr>
        <?php
        
        $no++;
    };
