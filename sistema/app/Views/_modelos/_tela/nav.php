<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url('') ?>" class="nav-link">Início</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Suporte</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <?php //if(OK($userdata, 'DESENVOLVEDOR')): ?>
        <form action="<?= base_url() ?>/Pesquisa/" method="post" class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Pesquisar..." aria-label="Pesquisar" id="palavra" name="palavra">
                <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </div>
        </form>
    <?php //endif ?>
    
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <span class="nav-link lead"><b><?= mb_strtoupper(@$titulo) ?></b></span>
        </li>
    </ul>

        <!-- Right navbar links -->
    <?php //if(OK($userdata, 'GATE')): ?>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <?php //Form_Comp('foto', 'usuarios', $userdata->ID, 'user-image img-circle elevation-2', 'foto_mini'); ?>
                    
                    <span class="d-none d-md-inline">Usuario<?php //=$userdata->NOME ?></span>
                </a>
                
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                
                    <!-- User image -->
                    <li class="user-header bg-info">
                        <?php /*
                            if($userdata->FOTO == 1) {
                                $idfoto = $userdata->ID;
                            } else {
                                $idfoto = -1;
                            }                        
                            Form_Comp('foto', 'usuarios', $idfoto, 'img-circle img-fluid', 'foto_perfil');
                        */?>
                        <p>
                            <?php //= $userdata->NOME ?>
                            <small><?php //= $userdata->NVL_ACES ?></small>
                            <small><?php //= $userdata->NOME_FUNCAO ?></small>
                        </p>
                    </li>
                    
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="<?= base_url('Perfil') ?>" class="btn btn-default btn-flat">Perfil<?php //= $this->lang->line('cibase_interface_perfil') ?></a>
                        <a href="#" class="menuSair btn btn-default btn-flat float-right"><i class="fas fa-sign-out-alt mr-2"></i>Sair<?php //= $this->lang->line('cibase_menu_sair') ?></a>
                    </li>
                </ul>
            </li>

        </ul>
    <?php //endif ?>

</nav>
<!-- /.navbar -->