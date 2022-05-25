<?php

	// VIEW: _js.php
	// TIPO: Layout
	// Descrição: carregamento de arquivos de JS

?>
	<!-- REQUIRED JS SCRIPTS -->

	<script>
	$.widget.bridge('uibutton', $.ui.button)


$(function () {

	function LogOffCIBase() {	

		Swal.fire({
			title: "Sair<?php //echo $this->lang->line('cibase_interface_js_sair'); ?>",
			text: "Quer realmente sair?<?php //echo $this->lang->line('cibase_interface_js_sair_pergunta'); ?>",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: "Sim<?php //echo $this->lang->line('cibase_interface_js_sair_sim'); ?>",
			cancelButtonText: "Não<?php //echo $this->lang->line('cibase_interface_js_sair_nao'); ?>"
		}).then((result) => {
			if (result.value) {
				window.location = "<?php echo base_url('Login/sair'); ?>";
			}
		})

	}
		
	$(document).on("click", ".menuSair", function() {
		LogOffCIBase();
	})

})

	</script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/chart.js/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/sparklines/sparkline.js"></script>
	<!-- JQVMap -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/moment/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- pace-progress -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/pace-progress/pace.min.js"></script>
	<!-- iCheck for checkboxes and radio inputs -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>/vendor/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- DataTables -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- <script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->
	<!-- Select2 -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/select2/js/select2.full.min.js"></script>
	<!-- SweetAlert2 -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<!-- Toastr -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/toastr/toastr.min.js"></script>
	<!-- jquery-validation -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
	<!-- jquery-idle -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/jquery-idle/jquery.idle.min.js"></script>
	<!-- Bootstrap Switch -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>/vendor/adminlte/dist/js/adminlte.js"></script>

	<!-- js personalizados -->
    <?= $this->include('_modelos/_js/js_main') ?>
<?php

	// Fim do arquivo: _js.php 
	// Local: ./application/views/_layout/_js.php