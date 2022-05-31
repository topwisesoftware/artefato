<script type="text/javascript">
    // _modelos/_js/js_<?= $pagina ?>

    function exibirUsuarios()
    {
        $.get('<?= base_url('Usuarios/exibir') ?>', function(data)
        {
            MyTable.fnDestroy();
            $('#dados-usuarios').html(data);
            refresh();
        });
    }

    $(document).on("click", ".editar-dadosUsuarios", function() {
        var id = $(this).attr("data-id");
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('Usuarios/editar'); ?>",
            data: "id=" + id + '&tp=1'
        })
        .done(function(data) {
            $('#lugar-modal').html(data);
            $('#editar-usuarios').modal('show');
            $('#NOME').focus();
        })
    })

    $(document).on("click", ".consultar-dadosUsuarios", function() {
        var id = $(this).attr("data-id");
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('Usuarios/editar'); ?>",
            data: "id=" + id + '&tp=2',
        })
        .done(function(data) {
            $('#lugar-modal').html(data);
            $('#editar-usuarios').modal('show');
            $('#NOME').focus();
        })
    })
</script>