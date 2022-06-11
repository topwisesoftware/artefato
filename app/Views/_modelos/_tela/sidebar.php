<!-- Main Sidebar Container -->
<aside class="main-sidebar <?= (($usuarioLogado->MODO == 'ESCURO') ? 'sidebar-dark-primary' : 'sidebar-dark-primary') ?> elevation-4">
    <!-- Brand Logo -->
    <?= TOPWISE_menu_logo() ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <?= TOPWISE_menu($pagina) ?>

        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>