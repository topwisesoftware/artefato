<?= '// funções de ' . $pagina ?>

    function exibirAdmin()
    {
        $.get('<?= base_url('Usuario/exibir') ?>', function(data)
        {
            MyTable.fnDestroy();
            $('#dados-usuario').html(data);
            refresh();
        });
    }