<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= lang('Artefato.sobre.titulo') ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="widget-user-image text-center pb-4">
                    <a href="https://topwise.com.br/" target="_blank"><img class="bg-white" src="<?= base_url('/assets/img/topwise.png') ?>" alt="User Avatar"></a><br>
                    Desenvolvido por TopWise Tecnologia
                </div> 



                <!-- TAB1 -->
                <div class="card card-widget widget-user-2">
                    <div class="widget-user-header bg-light">
                        <div class="widget-user-image ">
                            <img class="img" src="<?= base_url('/assets/img/artefato.png'); ?>" alt="User Avatar">
                        </div> 

                        <h3 class="widget-user-username"><?php echo TopWise_App_Nome(); ?></h3>
                        <h5 class="widget-user-desc"><?= lang(TopWise_App_Sistema_Descricao()); ?></h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link"><?= lang('Artefato.sobre.versao'); ?> <span class="float-right text-primary"><?php echo TopWise_App_Versao(); ?></span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><?= lang('Artefato.sobre.release'); ?> <span class="float-right text-info"><?php echo TopWise_App_Data_Release(); ?></span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><?= lang('Artefato.sobre.inicio'); ?> <span class="float-right text-danger"><?php echo TopWise_App_Data_Inicio(); ?></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('Artefato.crud.botoes.fechar'); ?></button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<?php //if(OK($userdata, 'ADMINISTRADOR')) [[&copy; 1999-<?php echo date('Y');</div>]] { ?>
<footer class="main-footer small text-center">
    

    <strong>&copy; 1999-<?php echo date('Y'); ?>&nbsp;<a href="https://topwise.com.br/" target="_blank">TLSoft Tecnologia</a>.</strong>
    <div data-toggle="modal" style="cursor: pointer;" data-target="#modal-default" class="float-right d-none d-sm-inline-block">&nbsp;&sdot;&nbsp;<?php echo TopWise_App_Versao(); ?>&nbsp;&sdot;&nbsp;</div>

</footer>
<?php //} ?>