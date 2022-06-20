<?php
    $imagemLogin = 'login_' . str_pad(rand(0, 11), 2, '0', STR_PAD_LEFT) . '.jpg';
?>
<div class="col-md-5">
    <img src="<?= base_url('/assets/img/urbanui/' . $imagemLogin) ?>" alt="login" class="login-card-img">
</div>
<div class="col-md-7">
    <div class="card-body">
        <div class="brand-wrapper">
            <img src="<?= base_url('/assets/img/logo-artefato.png') ?>" alt="logo" class="logo">
        </div>
        <p class="login-card-description"><?= lang('Login.mensagens.cabecalho') ?></p>