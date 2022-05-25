<?= $this->extend('_modelos/_login/principal') ?>

<?= $this->section('content') ?>

    <p class="login-box-msg"><?= lang('Artefato.login.cabecalho') ?></p>

    <form action="<?= base_url('Login/autenticar') ?>" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="<?= lang('Artefato.login.form.usuario') ?>" name="loginUsuario" autofocus required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="loginSenha" placeholder="<?= lang('Artefato.login.form.senha') ?>" required>
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
                <button type="submit" class="btn btn-primary btn-block"><?= lang('Artefato.login.form.botao') ?></button>
            </div>
            <!-- /.col -->

        </div>
    </form>

<?= $this->endSection() ?>