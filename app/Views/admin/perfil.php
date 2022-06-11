<?= $this->extend('_modelos/_tela/principal') ?>

<?= $this->section('content') ?>

<?php
    $compIMGcartao = array(
        'componente' => 'img',
        'id' => 'foto_exp',
        'pasta' => 'usuarios',
        'imagem' => ($dadosUsuarios->FOTO == 1 ? $dadosUsuarios->ID : -1),
        'classe' => 'profile-user-img img-fluid img-circle',
        'estilo' => '',
        'descricao' => lang('Artefato.perfil.textos.descricaoFoto'),
        'titulo' => $dadosUsuarios->NOME,
        'cripto' => FALSE,
    );

    $campoNOME = array(
        'componente' => 'input',
        'tipo' => 'text',
        'campo' => 'NOME',
        'dados' => $dadosUsuarios->NOME,
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.nome.nome'),
        ),
        'config' => array(
            'dica' => lang('Usuarios.geral.campos.nome.descricao'),
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => '',
            'autofocus' => TRUE,
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-12',
            'estado' => '',
        ),
    );    

    $campoTELEFONE = array(
        'componente' => 'input',
        'tipo' => 'text',
        'campo' => 'TELEFONE',
        'dados' => $dadosUsuarios->TELEFONE,
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.telefone.nome'),
        ),
        'config' => array(
            'dica' => lang('Usuarios.geral.campos.telefone.descricao'),
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => '',
            'autofocus' => FALSE,
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-5',
            'estado' => '',
        ),
    );

    $campoEMAIL = array(
        'componente' => 'input',
        'tipo' => 'email',
        'campo' => 'EMAIL',
        'dados' => $dadosUsuarios->EMAIL,
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
            'grade' => 'col-sm-7',
            'estado' => '',
        ),
    );    

    $campoCARGO = array(
        'componente' => 'input',
        'tipo' => 'text',
        'campo' => 'CARGO',
        'dados' => $dadosUsuarios->CARGO,
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
            'grade' => 'col-sm-7',
            'estado' => '',
        ),
    );        

    $campoIDIOMA = array(
        'componente' => 'select',
        'campo' => 'IDIOMA',
        'dados' => $dadosUsuarios->IDIOMA,
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.idioma.nome'),
        ),
        'config' => array(
            'class' => 'custom-select form-control',
            'obrigatorio' => FALSE,
            'grade' => 'col-sm-6',
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

    $campoMODO = array(
        'componente' => 'select',
        'campo' => 'MODO',
        'dados' => $dadosUsuarios->MODO,
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.modo.nome'),
        ),
        'config' => array(
            'class' => 'custom-select form-control',
            'obrigatorio' => FALSE,
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

    $botaoSalvarAlteracoes = array(
        'componente' => 'button',
        'tipo' => 'submit',
        'texto' => lang('Artefato.crud.botoes.salvaralt'),
        'cor' => 'primary',
        'icone' => 'fas fa-save mr-2',
        'classe' => '',
    );

    $botaoAlterarSenha = array(
        'componente' => 'button',
        'tipo' => 'submit',
        'texto' => lang('Artefato.crud.botoes.senha'),
        'cor' => 'danger',
        'icone' => 'fas fa-save mr-2',
        'classe' => '',
    );

    $campoSENHAantiga = array(
        'componente' => 'input',
        'tipo' => 'password',
        'campo' => 'SENHAANTIGA',
        'dados' => '',
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.senhaanterior.nome'),
        ),
        'config' => array(
            'dica' => lang('Usuarios.geral.campos.senhaanterior.descricao'),
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => '',
            'autofocus' => FALSE,
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-6',
            'estado' => '',
        ),
        'mensagem' => array(
            'cor' => 'text-info',
            'texto' => '',
        )
    );

    $campoSENHAnova = array(
        'componente' => 'input',
        'tipo' => 'password',
        'campo' => 'SENHANOVA',
        'dados' => '',
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.novasenha.nome'),
        ),
        'config' => array(
            'dica' => lang('Usuarios.geral.campos.novasenha.descricao'),
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => '',
            'autofocus' => FALSE,
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-6',
            'estado' => '',
        ),
        'mensagem' => array(
            'cor' => 'text-info',
            'texto' => lang('Usuarios.geral.campos.senha.info'),
        )
    );   
    
    $campoSENHAconfirmar = array(
        'componente' => 'input',
        'tipo' => 'password',
        'campo' => 'CONFIRMARSENHA',
        'dados' => '',
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.confirmarsenha.nome'),
        ),
        'config' => array(
            'dica' => lang('Usuarios.geral.campos.confirmarsenha.descricao'),
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => '',
            'autofocus' => FALSE,
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-6',
            'estado' => '',
        ),
        'mensagem' => array(
            'cor' => 'text-info',
            'texto' => '',
        )
    );

    $campoFOTO = array(
        'componente' => 'foto',
        'label' => array(
            'texto' => 'Foto',
        ),
        'campo' => 'userfile',
        'imagem' => array(
            'componente' => 'img',
            'id' => 'foto_usuario',
            'pasta' => 'usuarios',
            'imagem' => ($dadosUsuarios->FOTO == 1 ? $dadosUsuarios->ID : -1),
            'classe' => 'img-fluid img-circle img-thumbnail',
            'estilo' => '',
            'descricao' => lang('Artefato.perfil.textos.descricaoFoto'),
            'titulo' => $dadosUsuarios->NOME,
            'cripto' => FALSE,
        ),
        'arquivo' => array(
            'label' => 'Foto',
            'campo' => 'userfile',
            'componente' => 'file',
            'texto' => 'Selecionar uma foto...',
            'accept' => '.jpg',
        ),
        'instrucoes' => '<b class="text-danger">ATENÇÃO!!</b> A imagem escolhida para a foto deve ser <b>JPG</b> no tamanho de <b>300px x 300px</b> com resolução de até <b>96 dpi</b>. Imagens muito grandes serão diminuidas/cortadas para estas configurações/proporções, mas dependendo do caso, podem gerar erros no sistema.',
    );

?>

<div class="row">
        <div class="col-md-4">
            <!-- imagem do perfil -->

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <?= Componente($compIMGcartao) ?>
                    </div>

                    <h3 class="profile-username text-center"><?= $dadosUsuarios->NOME ?></h3>
                    <p class="text-muted text-center"><?= $dadosUsuarios->CARGO ?></p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b><?= lang('Usuarios.geral.campos.id.nome') ?></b> <a class="float-right"><?= $dadosUsuarios->ID ?></a>
                        </li>
                        <li class="list-group-item">
                            <b><?= lang('Usuarios.geral.campos.email.nome') ?></b> <a class="float-right"><?= $dadosUsuarios->EMAIL ?></a>
                        </li>
                        <li class="list-group-item">
                            <b><?= lang('Usuarios.geral.campos.cargo.nome') ?></b> <a class="float-right"><?= $dadosUsuarios->CARGO ?></a>
                        </li>
                        <li class="list-group-item">
                            <b><?= lang('Usuarios.geral.campos.telefone.nome') ?></b> <a class="float-right"><?= $dadosUsuarios->TELEFONE ?></a>
                        </li>
                        <li class="list-group-item">
                            <b><?= lang('Usuarios.geral.campos.permissao.nome') ?></b> <a class="float-right"><?= $dadosUsuarios->NIVEL ?></a>
                        </li>
                    </ul>

                    <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                </div>
                <!-- /.card-body -->
            </div>
        </div>


        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><?= lang('Usuarios.geral.abas.perfil') ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><?= lang('Usuarios.geral.abas.senha') ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="#foto" data-toggle="tab" id="tab_7_tab" role="tab" aria-controls="tab_7" aria-selected="false"><?= lang('Usuarios.geral.abas.foto') ?></a></li>
                    </ul>
                </div><!-- /.card-header -->

                <div class="card-body">
                    <div class="tab-content">
                        
                        <div class="active tab-pane" id="activity">
                            
                            <form class="form-horizontal" action="<?= base_url('perfil/salvar') ?>" method="POST" enctype="multipart/form-data">
                                <h5 class="mt-2 text-primary">Dados do Usuário</h5><hr>
                                <div class="row">
                                    <?= componente($campoNOME) ?>
                                    <?= componente($campoEMAIL) ?>
                                    <?= componente($campoTELEFONE) ?>
                                    <?= componente($campoCARGO) ?>
                                </div>

                                <h5 class="mt-2 text-primary">Configurações do Ambiente</h5><hr>
                                <div class="row">
                                    <?= componente($campoIDIOMA) ?>
                                    <?= componente($campoMODO) ?>
                                    
                                    <div class="tab-footer col-sm-12 d-flex justify-content-end">
                                        <?= componente($botaoSalvarAlteracoes) ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                       
                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal" action="<?= base_url('perfil/alterarsenha') ?>" method="POST">
                                <?= componente($campoSENHAantiga) ?>
                                <?= componente($campoSENHAnova) ?>
                                <?= componente($campoSENHAconfirmar) ?>
                                <div class="tab-footer col-sm-12 d-flex justify-content-end">
                                    <?= componente($botaoAlterarSenha) ?>
                                </div>
                            </form>
                        </div> <!-- /.tab-pane -->


                        <div class="tab-pane fade" id="foto" role="tabpanel" aria-labelledby="tab_7_tab">
                            <div class="row">

                                <div class="form-group col-lg-12">
                                    <div class="row">

                                        <?= Componente($campoFOTO) ?>

                                    </div>
                                </div>

                            </div>
                        </div> <!-- tab-pane -->



                    </div> <!-- /.tab-content -->
                </div><!-- /.card-body -->
            
            </div> <!-- /.card -->
        </div>


        // tudo certo
                $saida['estado'] = 'ok';
                $saida['titulo'] = lang('Artefato.crud.mensagens.geral.ok');
                if($usuariosModel->affectedRows() > 0) {
                    $saida['msg'] = lang('Artefato.crud.mensagens.salvar.sucesso');
                } else {
                    $saida['msg'] = lang('Artefato.crud.mensagens.salvar.nada');
                }
                $saida['icone'] = 'success';
                $saida['rows'] = $usuariosModel->affectedRows();

        <?php if($estado != 'entrou') : ?>
        <div class="col-md-12">
            <div class="msg" style="display:none;">
                <script>
                    $(function () {
                        tit = "<?= session()->getFlashData('tit') ?>";
                        msg = "<?= session()->getFlashData('msg') ?>";
                        sts = "<?= session()->getFlashData('sts') ?>";

                        if (sts != '') {

                            if (sts == 'error') {
                                Swal.fire(
                                    tit,
                                    msg,
                                    sts
                                )
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    type: sts,
                                    icon: sts,
                                    title: tit,
                                    text: msg,
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                            }
                        }
                    })
                </script>

            </div>
        </div>
        <?php endif; ?>
    </div>

    <script type="text/javascript">
    $(function () {

        $('#userfile').change(function(e){
            e.preventDefault(); 
            files = e.target.files;
            var formData = new FormData(), file = [];

            formData.append('userfile', e.target.files[0]);

            $.ajax({
                url: '<?= base_url('perfil/alterarfoto') ?>',
                cache: false,
                contentType: false,
                processData:false,
                data: formData,
                type: "post",
                //async:false,
                success: function(data){
                    d = new Date();
                    var out = jQuery.parseJSON(data);
                    $("#foto_mini").removeAttr("src").attr("src",out.foto + d.getTime());
                    $("#foto_perfil").removeAttr("src").attr("src",out.foto + d.getTime());
                    $("#foto_exp").removeAttr("src").attr("src",out.foto + d.getTime());
                    $("#foto_usuario").removeAttr("src").attr("src",out.foto + d.getTime());
                    
                    Swal.fire({
                        title: out.tit,
                        text: out.msg,
                        type: out.status, 
                        timer: 4000,
                        showConfirmButton: false
                    })
                },
                error: function(data){
                    var out = jQuery.parseJSON(data);
                    Swal.fire({
                        title: out.tit,
                        text: out.msg,
                        type: out.status, 
                        timer: 4000,
                        showConfirmButton: true
                    })
                }
            });
        });
    });

</script>    

<?= $this->endSection() ?>