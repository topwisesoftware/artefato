<?php
    $entidade = 'Clientes';
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
                    url: "<?= base_url($entidade . '/excluir') ?>",
                    data: "id=" + id_objeto
                })
                .done(function(data) {
                    if (data == '0') {
                        Swal.fire(
                            '<?= lang('Artefato.crud.mensagens.excluir.erro') ?>',
                            '<?= lang('Artefato.crud.mensagens.excluir.erromsg') ?> ' + desc_objeto + '! <?= lang('Artefato.crud.mensagens.geral.verifique') ?>',
                            'error'
                        )
                    } else {
                        exibir<?= $entidade ?>();
                        Swal.fire({
                          title: '<?= lang('Artefato.crud.mensagens.excluir.excluido') ?>',
                          text: '<?= lang('Artefato.crud.mensagens.geral.registro') ?> ' + desc_objeto + ' <?= lang('Artefato.crud.mensagens.excluir.sucesso') ?>',
                          type: 'success', 
                          icon: 'success',
                          timer: 4000,
                          showConfirmButton: false
                        })
                    }
                })
            }
        })
    })

    $('#form-inserir-<?= Strtolower($entidade) ?>').submit(function(e) {
        var data = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: '<?= base_url($entidade . '/salvar') ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);
            exibir<?= $entidade ?>();
            
            if (out.estado == 'form') {

                j = 0;

                $('.error').remove();
                $('.is-invalid').removeClass('is-invalid');

                for(var i=0; i<Object.keys(out.erros).length; i++) {
                    toastr.error(Object.keys(out.erros)[i] + '<br>' + Object.values(out.erros)[i]);

                    if(j == 0) {
                        $('#' + Object.keys(out.erros)[i]).focus();   
                        j++;
                    }
                    $('#' + Object.keys(out.erros)[i]).addClass('is-invalid');
                    $('#' + Object.keys(out.erros)[i]).after('<span class="error invalid-feedback" id="error' + Object.keys(out.erros)[i] + '">' + Object.values(out.erros)[i] + '</span>');
                }                
                
            } else {
                document.getElementById("form-inserir-<?= Strtolower($entidade) ?>").reset();
                $('#inserir-<?= Strtolower($entidade) ?>').modal('hide');

                if (out.estado == 'erro') {
                    Swal.fire(
                        out.titulo,
                        out.msg,
                        out.icone
                    )
                } else {
                    exibir<?= $entidade ?>();
                    Swal.fire({
                      position: 'center',
                      type: out.icone,
                      icon: out.icone,
                      title: out.titulo,
                      text: out.msg,
                      showConfirmButton: false,
                      timer: 3000
                    })
                }
            }
        })

        e.preventDefault();
    });

    $(document).on('submit', '#form-editar-<?= Strtolower($entidade) ?>', function(e){
        var data = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: '<?php echo base_url($entidade . '/salvar'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            $('.error').remove();
            $('.is-invalid').removeClass('is-invalid');

            if (out.estado == 'form') {

                j = 0;

                for(var i=0; i<Object.keys(out.erros).length; i++) {
                    toastr.error(Object.keys(out.erros)[i] + '<br>' + Object.values(out.erros)[i]);
                    if(j == 0) {
                        $('#e' + Object.keys(out.erros)[i]).focus();   
                        j++;
                    }
                    $('#e' + Object.keys(out.erros)[i]).addClass('is-invalid');
                    $('#e' + Object.keys(out.erros)[i]).after('<span class="error invalid-feedback" id="errore' + Object.keys(out.erros)[i] + '">' + Object.values(out.erros)[i] + '</span>');
                }

            } else {
                document.getElementById("form-editar-<?= Strtolower($entidade) ?>").reset();
                $('#editar-<?= Strtolower($entidade) ?>').modal('hide');

                if (out.estado == 'erro') {
                    Swal.fire(
                        out.titulo,
                        out.msg,
                        out.icone
                    )
                } else {
                    exibir<?= $entidade ?>();
                    Swal.fire({
                      position: 'center',
                      type: out.icone,
                      icon: out.icone,
                      title: out.titulo,
                      text: out.msg,
                      showConfirmButton: false,
                      timer: 3000
                    })
                }

            }
        })

        e.preventDefault();
    });    


    $('#inserir-<?= Strtolower($entidade) ?>').on('hidden.bs.modal', function () {
        $('.form-msg').html('');
    })

    $('#editar-<?= Strtolower($entidade) ?>').on('hidden.bs.modal', function () {
        $('.form-msg').html('');
    })
</script>