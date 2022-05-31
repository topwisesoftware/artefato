<?php

	// ASSET: ajax.php
	// TIPO: lib javascript
	// DESCRIÇÃO: gerenciamento de funções de ajax do sistema

	// paginas que não precisam ter um arquivo ajax
	// devem ser adicinadas aqui
	$paginas_excluidas = array(
		"home",
		"perfil",
	)

	//// GERAL
?>
<script type="text/javascript">

	<?= '// _modelos/_js/js_main' ?>

	var MyTable = $('#list-data').dataTable();

	window.onload = function() {

		<?php
			// carrega apenas a função necessária para evitar desperdício
			// evitando as páginas definidas como excluídas
		 	if (!in_array($pagina, $paginas_excluidas)) {
				echo 'exibir' . ucfirst($pagina) . '(); ';
			}

			// se houver mensagem carrega o loader do efeito
			//if ((@$session->getFlashdata('msg') != '') || (isset($msg))) {
			//	echo "effect_msg(); ";
			//}

		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable({
	        //"scrollY": "40vh",
	        "responsive": {
	        	breakpoints: [
            		{ name: 'desktop', width: Infinity },
            		{ name: 'tablet',  width: 1024 },
            		{ name: 'fablet',  width: 768 },
            		{ name: 'phone',   width: 480 }
        		]
        	},
			<?php if($pagina == 'agendamento') { ?>"order": [[ 0, "desc" ]], <?php } ?>
			<?php if($pagina == 'agendamento') { ?>"pageLength": 6, <?php } else { ?>"pageLength": 10,<?php } ?>
	        "lengthChange": false,
			"scrollX": false,
	        "scrollCollapse": false,
	        "info": false,
	        "paging": true,
	        "autoWidth": true,
	        "language": {
	            "lengthMenu": "<?php echo 'Exibindo _MENU_ registros por página'; //$this->lang->line('cibase_interface_js_tabelas_exibindo_registro'); ?>",
	            "zeroRecords": "<?php echo 'Nenhum registro encontrado - verifique'; // $this->lang->line('cibase_interface_js_tabelas_nenhum_registro'); ?>",
	            "info": "<?php echo 'Exibindo página _PAGE_ de _PAGES_'; //$this->lang->line('cibase_interface_js_tabelas_exibindo_pagina''); ?>",
	            "infoEmpty": "<?php echo 'Nenhum registro disponível'; //$this->lang->line('cibase_interface_js_tabelas_nenhum_disponivel'); ?>",
	            "lengthMenu": "<?php echo 'Exibindo _MENU_ registros'; // $this->lang->line('cibase_interface_js_tabelas_exibindo_menu'); ?>",
	            "search": "<?php echo 'Localizar:'; // $this->lang->line('cibase_interface_js_tabelas_localizar''); ?>",
				"infoFiltered": "<?php echo '(filtrado de um total de _MAX_ registros)'; //$this->lang->line('cibase_interface_js_tabelas_filtro'); ?>",
				paginate: {
          			first: "<?php echo 'Primeira'; // $this->lang->line('cibase_interface_js_tabelas_primeira'); ?>",
            		previous: "<?php echo 'Anterior'; //$this->lang->line('cibase_interface_js_tabelas_anterior'); ?>",
            		next: "<?php echo 'Próxima'; //$this->lang->line('cibase_interface_js_tabelas_proxima'); ?>",
            		last: "<?php echo 'Última'; //$this->lang->line('cibase_interface_js_tabelas_ultima'); ?>"
        		},
	        }
	    });
	}

	function effect_msg_form() {
		$('.form-msg').hide();
		$('.form-msg').show(250);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		$('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}
</script>

<?php
	// carrega apenas a lib de funções Ajax necessária para evitar desperdício
	// evitando as páginas definidas como excluídas
	if (!in_array($pagina, $paginas_excluidas)) {
        echo $this->include('admin/' . strtolower($pagina) . '/js_' . strtolower($pagina));        
	}
?>
