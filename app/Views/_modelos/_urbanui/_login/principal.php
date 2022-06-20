<!DOCTYPE html>
<html lang="pt_BR">
	<head>
		<title><?= TopWise_App_Nome() ?> | <?= lang('Login.titulo') ?></title>
		<!-- meta -->
		<?= $this->include('_modelos/_urbanui/_login/meta') ?>
		<!-- css -->
		<?= $this->include('_modelos/_urbanui/_login/css') ?>
	</head>
	<body>
		<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
			<div class="container">
				<div class="card login-card">
					<div class="row no-gutters">

						<!-- Navbar -->
						<?= $this->include('_modelos/_urbanui/_login/header') ?>

						<!-- content -->
						<?= $this->renderSection('content_urbanui') ?>

						<!-- footer -->
						<?= $this->include('_modelos/_urbanui/_login/footer') ?>

					</div>
				</div>
			</div>
		</main>
		<!-- js -->
		<?= $this->include('_modelos/_urbanui/_login/js') ?>
	</body>
</html>