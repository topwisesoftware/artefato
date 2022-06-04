<?php
    $no = 1;
    
    foreach ($dadosUsuarios as $usuario) {
        ?>
            <tr>
                <td><?= $usuario->LOGIN ?></td>
                <td><?= $usuario->NOME ?></td>
                <td><?= $usuario->TELEFONE ?></td>
                <td>
                    <?= TOPWISE_retornaNivelAcesso($usuario->NIVEL, $usuario->COR_REGRA) ?>
                    <?= TOPWISE_retornaIdioma($usuario->IDIOMA) ?>
                    <?= TOPWISE_retornaFoto($usuario->FOTO) ?>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-primary btn-xs consultar-dadosUsuarios mr-1" data-id="<?= $usuario->ID ?>"><i class="far fa-eye"></i> <?= lang('Artefato.crud.botoes.consultar') ?></button>
                    <?php if(OK($usuarioLogado->NIVEL,  'ADMINISTRADOR')) : ?>
                        <button type="button" class="btn bg-gradient-success btn-xs editar-dadosUsuarios mr-3" data-id="<?= $usuario->ID ?>"><i class="far fa-edit"></i> <?= lang('Artefato.crud.botoes.editar') ?></button>
                    <?php endif; ?>
                    <?php if(OK($usuarioLogado->NIVEL,  'DESENVOLVEDOR')) : ?>
                        <button type="button" class="btn btn-outline-danger btn-xs confirmarExcluir-usuarios" data-id="<?= $usuario->ID ?>" data-nome="<?= $usuario->NOME ?>" <?= ($usuario->NIVEL == 'DESENVOLVEDOR') ? 'disabled' : '' ?>><i class="fas fa-trash" data-toggle="modal" data-target="#confirmarExclusao"></i> <?= lang('Artefato.crud.botoes.excluir') ?></button>
                    <?php endif; ?>
                </td>
            </tr>
        <?php
        
        $no++;
    }