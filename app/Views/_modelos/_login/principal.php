<!DOCTYPE html>
<html lang="pt_BR">
	<head>
		<title><?= TopWise_App_Nome() ?> | <?= lang('Artefato.login.titulo') ?></title>
		<!-- meta -->
		<?= $this->include('_modelos/_login/meta') ?>
		<!-- css -->
		<?= $this->include('_modelos/_login/css') ?>
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<!-- Navbar -->
			<?= $this->include('_modelos/_login/logo') ?>

            <div class="card ">
                <div class="card-body login-card-body rounded">

					<!-- content -->
					<?= $this->renderSection('content') ?>

				</div>
            </div>

			<!-- footer -->
			<?= $this->include('_modelos/_login/footer') ?>

		</div>

		<!-- js -->
		<?= $this->include('_modelos/_login/js') ?>
	</body>
</html>