<?php
    $entidade = 'Configuracoes';
?>
<script type="text/javascript">
    // _modelos/_js/js_<?= $pagina ?>

    function exibir<?= $entidade ?>() {
        //console.log('exibirFuncao...');
    }

    var out = jQuery.parseJSON('<?php echo $saida; ?>');

    if (out.estado == 'form') {

        j = 0;

        for(var i=0; i<Object.keys(out.msg).length; i++) {
            toastr.error(Object.keys(out.msg)[i] + '<br>' + Object.values(out.msg)[i]);
            if(j == 0) {
                $('#' + Object.keys(out.msg)[i]).focus();   
                j++;
            }
            $('#' + Object.keys(out.msg)[i]).addClass('is-invalid');
            $('#error' + Object.keys(out.msg)[i]).remove();
            $('#' + Object.keys(out.msg)[i]).after('<span class="error invalid-feedback" id="error' + Object.keys(out.msg)[i] + '">' + Object.values(out.msg)[i] + '</span>');
        }

    } else {

        $('#editar-<?= Strtolower($entidade) ?>').modal('hide');

        if (out.estado == 'erro') {

            Swal.fire({
              position: 'center',
              icon: out.icone,
              title: out.titulo,
              text: out.msg,
              showConfirmButton: false,
              timer: 3000
            })

        } else
        if (out.estado == 'abrindo') {
            // se estiver no modo 'abrindo' não faz nada
        } else {
            exibir<?= $entidade ?>();
            $('#reiniciar').show();
            Swal.fire({
              position: 'center',
              icon: out.icone,
              title: out.titulo,
              text: out.msg,
              showConfirmButton: false,
              timer: 3000
            })
        }
    }
</script>