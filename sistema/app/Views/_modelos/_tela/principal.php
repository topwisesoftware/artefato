<!DOCTYPE html>
<html lang="pt_BR">
	<head>
		<title><?= TopWise_App_Nome() ?> | <?= @$titulo ?></title>
		<!-- meta -->
		<?= $this->include('_modelos/_tela/meta') ?>
		<!-- css -->
		<?= $this->include('_modelos/_tela/css') ?>
	</head>
	<body class="hold-transition sidebar-mini pace-primary layout-fixed">
		<div class="wrapper">
			<!-- Navbar -->
			<?= $this->include('_modelos/_tela/nav') ?>
			<!-- sidebar -->
			<?= $this->include('_modelos/_tela/sidebar') ?>
			<!-- content -->
			<?= $this->include('_modelos/_tela/content') ?>
			<!-- footer -->
			<?= $this->include('_modelos/_tela/footer') ?>
		</div>

		<!-- js -->
		<?= $this->include('_modelos/_tela/js') ?>
	</body>
</html>