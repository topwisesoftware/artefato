<!-- Navbar -->
<nav class="main-header navbar navbar-expand <?= (($usuarioLogado->MODO == 'ESCURO') ? 'navbar-dark' : 'navbar-light') ?>">

    <?= TOPWISE_menu_superior($titulo, $usuarioLogado) ?>

</nav>
<!-- /.navbar -->