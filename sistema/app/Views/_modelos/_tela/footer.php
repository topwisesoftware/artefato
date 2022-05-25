<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sobre<?php //echo $this->lang->line('cibase_interface_sobre'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">TopWise Teste<?php //echo TLSoft_App_Nome(); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">TopWise Tecnologia</a></li>
                        </ul>

                    </div>

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">

                                <!-- TAB1 -->
                                <div class="card card-widget widget-user-2">
                                    <div class="widget-user-header bg-info">
                                        <div class="widget-user-image ">
                                            <img class="img-circle elevation-2 bg-light" src="<?php echo base_url(); ?>/assets/img/logo-128x128.png" alt="User Avatar">
                                        </div> 

                                        <h3 class="widget-user-username">TopWise Teste<?php //echo TLSoft_App_Nome(); ?></h3>
                                        <h5 class="widget-user-desc">Teste de Sistema em CI4<?php // echo $this->lang->line(TLSoft_App_Sistema_Descricao()); ?></h5>
                                    </div>
                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Versão <?php //echo $this->lang->line('cibase_interface_versao'); ?> <span class="float-right text-primary">22.2.2022<?php //echo TLSoft_App_Versao(); ?></span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Release<?php //echo $this->lang->line('cibase_interface_release'); ?> <span class="float-right text-info">(release)<?php //echo TLSoft_App_Data_Release(); ?></span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="https://tlsoft.com.br/" target="_blank" class="nav-link">Desenvolvido por<?php //echo $this->lang->line('cibase_interface_desenvovido'); ?> <span class="float-right text-success">TopWise Tecnologia</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Iniciado em <?php //echo $this->lang->line('cibase_interface_iniciado'); ?> <span class="float-right text-danger">2.2.22<?php //echo TLSoft_App_Data_Inicio(); ?></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="timeline">

                                <!-- TAB2 -->
                                <p class="text-muted">Soluções<?php //echo $this->lang->line('cibase_interface_solucoes'); ?></p>
                                <hr>
                                <dl class="dl-horizontal">

                                    <dt>Site<?php //echo $this->lang->line('cibase_interface_site'); ?>:</dt>
                                    <dd class="ml-4"><a href="https://topwise.com.br/" target="_blank">https://topwise.com.br/</a><br></dd>

                                    <dt>Endereço<?php //echo $this->lang->line('cibase_interface_endereco'); ?>:</dt>
                                    <dd class="ml-4">Rua Urbano Gondim, 139 - Centro - Jequié - BA</dd>

                                    <dt>Telefone<?php //echo $this->lang->line('cibase_interface_telefone'); ?>:</dt>
                                    <dd class="ml-4">+55 73 999 977 472</dd>

                                    <dt>Email<?php //echo $this->lang->line('cibase_interface_email'); ?>:</dt>
                                    <dd class="ml-4">contato@topwise.com.br</dd>

                                </dl>

                            </div> 
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar<?php //echo $this->lang->line('cibase_interface_fechar'); ?></button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<?php //if(OK($userdata, 'ADMINISTRADOR')) { ?>
<footer class="main-footer small text-center">
    &copy; 1999-<?php echo date('Y'); ?>&nbsp;<?= TopWise_App_Versao() ?></div>
</footer>
<?php //} ?>