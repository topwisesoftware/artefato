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

    $campoCARGO = array(
        'componente' => 'input',
        'tipo' => 'text',
        'campo' => 'CARGO',
        'dados' => ($exibir) ? $dadosUsuarios->CARGO : $vazio,
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.cargo.nome'),
        ),
        'config' => array(
            'dica' => lang('Usuarios.geral.campos.cargo.descricao'),
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => '',
            'autofocus' => FALSE,
            'obrigatorio' => FALSE,
            'grade' => 'col-sm-5',
            'estado' => $consultar,
        ),
    );


    $campoNIVEL = array(
        'componente' => 'select',
        'campo' => 'NIVEL',
        'dados' => ($exibir) ? $dadosUsuarios->NIVEL : '',
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.permissao.nome'),
        ),
        'config' => array(
            'class' => 'custom-select form-control',
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-7',
            'estado' => $consultar,
        ),
        'opcoes' => array(
        ),
    );
    foreach ($dadosRegras as $regra):
        if(OK($usuarioLogado->NIVEL, $regra->PERMISSAO)) :
            $campoNIVEL['opcoes'][$regra->REGRA] = array(
                'descricao' => mb_strtoupper($regra->REGRA) . ' - ' . $regra->DESCRICAO,
                'cor' => $regra->COR,
                'padrao' => $regra->PADRAO,
            );
        endif;
    endforeach;


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
            'grade' => 'col-sm-7',
            'estado' => $consultar,
        ),
        'mensagem' => array(
            'cor' => 'text-info',
            'texto' => lang('Usuarios.geral.campos.senha.info'),
        )
    );

    $campoIDIOMA = array(
        'componente' => 'select',
        'campo' => 'IDIOMA',
        'dados' => ($exibir) ? $dadosUsuarios->IDIOMA : '',
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.idioma.nome'),
        ),
        'config' => array(
            'class' => 'custom-select form-control',
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-7',
            'estado' => $consultar,
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

    $campoMODO = array(
        'componente' => 'select',
        'campo' => 'MODO',
        'dados' => ($exibir) ? $dadosUsuarios->MODO : '',
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.modo.nome'),
        ),
        'config' => array(
            'class' => 'custom-select form-control',
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-7',
            'estado' => $consultar,
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

    if($exibir)
    {

        $campoFOTO = array(
            'componente' => 'foto',
            'label' => array(
                'texto' => 'Foto',
            ),
            'campo' => 'userfile',
            'imagem' => array(
                'componente' => 'img',
                'id' => 'fotoUsuarios',
                'pasta' => 'usuarios',
                'imagem' => ($dadosUsuarios->FOTO == 1 ? $dadosUsuarios->ID : -1),
                'classe' => 'img-fluid img-circle img-thumbnail',
                'estilo' => '',
                'descricao' => lang('Artefato.perfil.textos.descricaoFoto'),
                'titulo' => $dadosUsuarios->NOME,
                'cripto' => TRUE,
            ),
            'arquivo' => array(
                'label' => 'Foto',
                'campo' => 'userfile',
                'codigo' => $dadosUsuarios->ID,
                'componente' => 'file',
                'texto' => 'Selecionar uma foto...',
                'accept' => '.jpg',
            ),
            'instrucoes' => '<b class="text-danger">ATENÇÃO!!</b> A imagem escolhida para a foto deve ser <b>JPG</b> no tamanho de <b>300px x 300px</b> com resolução de até <b>96 dpi</b>. Imagens muito grandes serão diminuidas/cortadas para estas configurações/proporções, mas dependendo do caso, podem gerar erros no sistema.',
        );
    }

    $entidade = 'Usuarios';
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
                    <li class="nav-item"><a class="nav-link" id="tab_3_tab_<?= $acao ?>" data-toggle="pill" href="#tab_3_<?= $acao ?>" role="tab" aria-controls="tab_3_<?= $acao ?>" aria-selected="false"><?= lang('Usuarios.geral.abas.configuracao') ?></a></li>
                    <?php if($exibir): ?>
                    <li class="nav-item"><a class="nav-link" id="tab_4_tab_<?= $acao ?>" data-toggle="pill" href="#tab_4_<?= $acao ?>" role="tab" aria-controls="tab_7_<?= $acao ?>" aria-selected="false"><?= lang('Usuarios.geral.abas.foto') ?></a></li>
                    <?php endif; ?>
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

                            <?= Componente($campoNIVEL) ?>
                            <?= Componente($campoSENHA) ?>
                            
                        </div>
                    </div> <!-- tab-pane -->

                    <div class="tab-pane fade" id="tab_3_<?= $acao ?>" role="tabpanel" aria-labelledby="tab_3_tab_<?= $acao ?>">
                        <div class="row">

                            <?= Componente($campoIDIOMA) ?>
                            <?= Componente($campoMODO) ?>

                        </div>
                    </div> <!-- tab-pane -->

                    <?php if($exibir): ?>
                    <div class="tab-pane fade" id="tab_4_<?= $acao ?>" role="tabpanel" aria-labelledby="tab_4_tab_<?= $acao ?>">
                        <div class="row">

                            <?= Componente($campoFOTO) ?>

                        </div>
                    </div> <!-- tab-pane -->
                    <?php endif; ?>

                </div> <!-- tab-content -->
            </div> <!-- card-body -->

        </div> <!-- ./card -->
    </div> <!-- ./col -->
</div> <!-- ./row -->

<script>
    $(function () {
        $('#userfile').change(function(e){
            e.preventDefault(); 
           
            var dadosArquivo = new FormData();
            id_objeto = $(this).attr("data-id");

            dadosArquivo.append('userfile', $('input[type=file]')[0].files[0]);

            $.ajax({
                url: '<?= base_url(Strtolower($entidade) . '/salvarfoto'); ?>' + '/' + id_objeto,
                cache: false,
                contentType: false,
                processData:false,
                data: dadosArquivo,
                type: "post",
                //async:false,
                success: function(data){
                    d = new Date();
                    var out = jQuery.parseJSON(data);
                    $("#foto<?= $entidade ?>").removeAttr("src").attr("src",out.foto);
                    exibir<?= $entidade ?>();
                    
                    Swal.fire({
                        title: out.titulo,
                        text: out.msg,
                        icon: out.icone, 
                        timer: 4000,
                        showConfirmButton: false
                    })
                },
                error: function(data){
                    var out = jQuery.parseJSON(data);
                    Swal.fire({
                        title: out.titulo,
                        text: out.msg,
                        icon: out.icone, 
                        timer: 4000,
                        showConfirmButton: true
                    })
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>
