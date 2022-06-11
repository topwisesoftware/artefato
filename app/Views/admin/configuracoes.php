<?= $this->extend('_modelos/_tela/principal') ?>

<?= $this->section('content') ?>

<?php

  $campoJANELA = array(
    'componente' => 'select',
    'campo' => 'JANELA',
    'dados' => $dadosConfiguracoes->TIPO_JANELA_IMPRESSAO,
    'label' => array(
        'texto' => 'Como serão exibidos os relatórios',
    ),
    'config' => array(
        'class' => 'custom-select form-control',
        'obrigatorio' => TRUE,
        'grade' => 'col-sm-7',
        'estado' => '',
    ),
    'opcoes' => array(
        'ABA' => array(
            'descricao' => 'Abas - Abas na mesma janela do navegador',
            'cor' => '',
            'padrao' => 'S',
        ),
        'POPUP' => array(
            'descricao' => 'PopUps - Em uma janela flutuante',
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
          'texto' => 'Tema Padrão do Aplicativo',
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
            <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção!</h5>
            <a href="<?= base_url('login/sair') ?>"><button type="button" class="btn btn-outline-danger mr-2">Reiniciar agora</button></a>
            Reinicie o sistema para que as alterações tenham efeito!
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12"> <!-- /.col -->

        <div class="card">
            <div class="card-header p-2">

                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Relatórios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Geral</a></li>
                </ul>

            </div><!-- /.card-header -->

            <form id="form-editar-config" action="<?= base_url('configuracao/editar') ?>" method="POST" autocomplete="on">

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
                    <p class="float-left"><i class="fas fa-exclamation-circle fa-lg ml-2 text-warning"></i> Qualquer alteração efetuada aqui só tem efeito ao sair e retornar do sistema.</p>
                    <button type="submit" class="btn btn-primary float-right"> <i class="fas fa-save mr-2"></i></i> Atualizar Configurações</button>
                </div>

            </form>
        </div>

    </div> <!-- /.nav-tabs-custom -->


    </div>
</div> <!-- row -->


<?= $this->endSection() ?>
