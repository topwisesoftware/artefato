<?= $this->extend('_modelos/_tela/principal') ?>

<?= $this->section('content') ?>

<?php

  $campoJANELA = array(
    'componente' => 'select',
    'campo' => 'JANELA',
    'dados' => $dadosConfiguracoes->TIPO_JANELA_IMPRESSAO,
    'label' => array(
        'texto' => lang('Configuracoes.campos.impressao.descricao'),
    ),
    'config' => array(
        'class' => 'custom-select form-control',
        'obrigatorio' => TRUE,
        'grade' => 'col-sm-7',
        'estado' => '',
    ),
    'opcoes' => array(
        'ABA' => array(
            'descricao' => lang('Configuracoes.campos.impressao.opcoes.aba'),
            'cor' => '',
            'padrao' => 'S',
        ),
        'POPUP' => array(
            'descricao' => lang('Configuracoes.campos.impressao.opcoes.popup'),
            'cor' => '',
            'padrao' => 'N',
        ),
    ),
  );

  $campoMODO = array(
      'componente' => 'select',
      'campo' => 'MODO',
      'dados' => $dadosConfiguracoes->MODO,
      'label' => array(
          'texto' => lang('Configuracoes.campos.modo.descricao'),
      ),
      'config' => array(
          'class' => 'custom-select form-control',
          'obrigatorio' => TRUE,
          'grade' => 'col-sm-6',
          'estado' => '',
      ),
      'opcoes' => array(
          'CLARO' => array(
              'descricao' => lang('Artefato.sistema.temas.claro'),
              'cor' => '',
              'padrao' => 'S',
          ),
          'ESCURO' => array(
              'descricao' => lang('Artefato.sistema.temas.escuro'),
              'cor' => '',
              'padrao' => 'N',
          ),
      ),
  );

  $campoIDIOMA = array(
    'componente' => 'select',
    'campo' => 'IDIOMA',
    'dados' => $dadosConfiguracoes->IDIOMA,
    'label' => array(
        'texto' => 'Idioma Padrão',
    ),
    'config' => array(
        'class' => 'custom-select form-control',
        'obrigatorio' => TRUE,
        'grade' => 'col-sm-7',
        'estado' => '',
    ),
    'opcoes' => array(
        'portuguese-br' => array(
            'descricao' => lang('Artefato.sistema.idiomas.pt-br'),
            'cor' => '',
            'padrao' => 'S',
        ),
        'english' => array(
            'descricao' => lang('Artefato.sistema.idiomas.en'),
            'cor' => '',
            'padrao' => 'N',
        ),
    ),
);
        
?>

<div class="row">

    <div id="reiniciar" class="col-xl-12 col-lg-12 col-md-12 col-xs-12" style="display: none;"> <!-- /.col -->
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> <?= lang('Configuracoes.mensagens.atencao') ?></h5>
            <a href="<?= base_url('login/sair') ?>"><button type="button" class="btn btn-outline-danger mr-2"><?= lang('Configuracoes.botoes.reiniciar') ?></button></a>
            <?= lang('Configuracoes.mensagens.reiniciar') ?>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12"> <!-- /.col -->

        <div class="card">
            <div class="card-header p-2">

                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab"><?= lang('Configuracoes.abas.relatorios') ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab"><?= lang('Configuracoes.abas.geral') ?></a></li>
                </ul>

            </div><!-- /.card-header -->

            <form id="form-editar-config" action="<?= base_url('configuracoes/salvar') ?>" method="POST" autocomplete="on">

                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane" id="activity">

                            <!-- TAB1 -->
                            <?= componente($campoIDIOMA) ?>
                            <?= componente($campoMODO) ?>

                        </div><!-- /.tab-pane -->

                        <div class="active tab-pane" id="timeline">

                            <!-- TAB2 -->
                            <?= componente($campoJANELA) ?>

                        </div> <!-- /.tab-pane -->

                    </div> <!-- /.tab-content -->

                </div> <!-- /.card-body -->

                <div class="card-footer">
                    <p class="float-left"><i class="fas fa-exclamation-circle fa-lg ml-2 text-warning"></i> <?= lang('Configuracoes.mensagens.aviso') ?></p>
                    <button type="submit" class="btn btn-primary float-right"> <i class="fas fa-save mr-2"></i></i> <?= lang('Configuracoes.botoes.atualizar') ?></button>
                </div>

            </form>
        </div>

    </div> <!-- /.nav-tabs-custom -->


    </div>
</div> <!-- row -->

<?= $this->endSection() ?>
