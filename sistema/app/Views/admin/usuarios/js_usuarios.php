<?php
    $entidade = 'Usuarios';
?>
<script type="text/javascript">
    // _modelos/_js/js_<?= $pagina ?>

    function exibir<?= $entidade ?>()
    {
        $.get('<?= base_url($entidade . '/exibir') ?>', function(data)
        {
            MyTable.fnDestroy();
            $('#dados-<?= Strtolower($entidade) ?>').html(data);
            refresh();
        });
    }

    $(document).on("click", ".editar-dados<?= $entidade ?>", function() {
        var id = $(this).attr("data-id");
        $.ajax({
            method: "POST",
            url: "<?= base_url($entidade . '/editar') ?>",
            data: "id=" + id + '&tp=1'
        })
        .done(function(data) {
            $('#lugar-modal').html(data);
            $('#editar-<?= Strtolower($entidade) ?>').modal('show');
            $('#NOME').focus();
        })
    })

    $(document).on("click", ".consultar-dados<?= $entidade ?>", function() {
        var id = $(this).attr("data-id");
        $.ajax({
            method: "POST",
            url: "<?= base_url($entidade . '/editar') ?>",
            data: "id=" + id + '&tp=2',
        })
        .done(function(data) {
            $('#lugar-modal').html(data);
            $('#editar-<?= Strtolower($entidade) ?>').modal('show');
            $('#NOME').focus();
        })
    })

    var id_objeto;
    $(document).on("click", ".confirmarExcluir-<?= Strtolower($entidade) ?>", function() {
        id_objeto = $(this).attr("data-id");
        desc_objeto = $(this).attr("data-nome");

        Swal.fire({
            title: '<p><?= lang('Artefato.crud.mensagens.excluir.excluindo') ?> <?= lang($entidade . '.geral.singular') ?><hr><b class="text-primary">' + desc_objeto + '</b><hr><?= lang("Artefato.crud.mensagens.geral.certeza") ?></p>',
            text: "<?= lang('Artefato.crud.mensagens.geral.aviso') ?>",
            //icon: 'warning',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<i class="far fa-thumbs-up mr-2"></i><?= lang("Artefato.crud.mensagens.excluir.sim"); ?>',
            cancelButtonText : '<i class="fas fa-ban mr-2"></i><?= lang("Artefato.crud.mensagens.excluir.nao"); ?>'
        }).then((result) => {
            
            if (result.value) {
                $.ajax({
                    method: "POST",
                    url: "<?php echo base_url($entidade . '/excluir'); ?>",
                    data: "id=" +id_objeto
                })
                .done(function(data) {
                    if (data == '0') {
                        Swal.fire(
                            '<?= lang('Artefato.crud.mensagens.excluir.erro') ?>',
                            '<?= lang('Artefato.crud.mensagens.excluir.erromsg') ?> ' + desc_objeto + '! <?= lang('Artefato.crud.mensagens.geral.verifique') ?>',
                            'error'
                        )
                    } else {
                        exibirUsuario();
                        Swal.fire({
                          title: '<?= lang('Artefato.crud.mensagens.excluir.excluido') ?>',
                          text: '<?= lang('Artefato.crud.mensagens.geral.registro') ?> ' + desc_objeto + ' <?= lang('Artefato.crud.mensagens.excluir.sucesso') ?>',
                          type: 'success', 
                          timer: 4000,
                          showConfirmButton: false
                        })
                    }
                })
            }
        })
    })

</script>