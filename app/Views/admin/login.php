<?php //$this->extend('_modelos/_login/principal') ?>
<?= $this->extend('_modelos/_urbanui/_login/principal') ?>

<?php



?>

<?= $this->section('content_urbanui') ?>

    <form action="<?= base_url('login/autenticar') ?>" method="post">
        <div class="form-group">
            <label for="loginUsuario" class="sr-only"><?= lang('Login.form.usuario') ?></label>
            <input type="text" name="loginUsuario" id="loginUsuario" class="form-control" placeholder="<?= lang('Login.form.usuario') ?>" autofocus required>
        </div>
        <div class="form-group mb-4">
            <label for="password" class="sr-only"><?= lang('Login.form.senha') ?></label>
            <input type="password" name="loginSenha" id="loginSenha" class="form-control" placeholder="<?= lang('Login.form.senha') ?>" required>
        </div>
        <button type="submit" class="btn btn-block login-btn mb-4"><?= lang('Login.form.botao') ?></button>
    </form>

<?= $this->endSection() ?>

<?= $this->section('content_adminlte') ?>

    <p class="login-box-msg"><?= lang('Login.cabecalho') ?></p>

    <form action="<?= base_url('login/autenticar') ?>" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="<?= lang('Login.form.usuario') ?>" name="loginUsuario" autofocus required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="loginSenha" placeholder="<?= lang('Login.form.senha') ?>" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="row">        
            
            <!-- /.col -->
            <div class="col-8">

            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-<?= (($modo == 'ESCURO') ? 'dark' : 'primary') ?> btn-block"><?= lang('Login.form.botao') ?></button>
            </div>
            <!-- /.col -->

        </div>
    </form>

<?= $this->endSection() ?>