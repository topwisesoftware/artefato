    // _modelos/_js/js_<?= $pagina ?>

    function exibirUsuarios()
    {
        $.get('<?= base_url('Usuarios/exibir') ?>', function(data)
        {
            MyTable.fnDestroy();
            $('#dados-usuario').html(data);
            refresh();
        });
    }