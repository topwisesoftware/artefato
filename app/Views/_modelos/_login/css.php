<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url() ?>/vendor/adminlte/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="<?= base_url() ?>/vendor/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url() ?>/vendor/adminlte/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<?php if($modo == 'ESCURO') : ?>
<style type="text/css">
    .login-page {
        background: #454d55 !important;
    }
    .login-logo {
        color: #adb5bd !important;
        font-weight: 400;        
    }

    .login-card-body {
        background: #252e38 !important;
    }

    .login-box-msg {
        color: #adb5bd !important;
    }

    .form-control {
        background: #454d55 !important;
        color: #adb5bd !important;
        border: 0;
    }

    .input-group-text {
        background: #454d55 !important;
        border: 0;
    }
</style>

<?php endif; ?>