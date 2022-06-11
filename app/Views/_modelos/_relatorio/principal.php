<!DOCTYPE html>
	<html lang="pt_BR">
		<head>
			<title><?= TopWise_App_Nome() ?> | <?= @$titulo ?></title>
			<!-- meta -->
			<?= $this->include('_modelos/_relatorio/meta') ?>
			
			<!-- css -->
			<?= $this->include('_modelos/_relatorio/css') ?>

			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		</head>
	<body onload="window.print();">
		<div class="wrapper">
			<!-- Main content -->
  			<section class="relatorio">
  
				<!-- header -->
				<?= $this->include('_modelos/_relatorio/header') ?>

				<!-- content -->
				<?= $this->include('_modelos/_relatorio/content') ?>

				<!-- footer -->
				<?= $this->include('_modelos/_relatorio/footer') ?>
			
			</section>
  			<!-- /.content -->
		</div>
	</body>
</html>