<!-- jQuery -->
<script src="<?= base_url() ?>/vendor/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/vendor/adminlte/dist/js/adminlte.min.js"></script>

<script>

	window.onload = function() {
	
		effect_msg();

		function effect_msg() {
			$('.msg').hide();
			$('.msg').show(100);
			setTimeout(function() { $('.msg').fadeOut(100); }, 3000);
		}

	}

</script>