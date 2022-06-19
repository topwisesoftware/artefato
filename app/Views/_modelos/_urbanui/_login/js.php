<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('/vendor/adminlte/plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>

<script>

	window.onload = function() {
	
		msg = '<?= session()->getFlashData('mensagem') ?>';

		if(msg != '') {
			Swal.fire({
				title: 'Atenção!',
				text: msg,
				icon: 'error',
				timer: 1800,
				showConfirmButton: false
			})
		}

	}

</script>