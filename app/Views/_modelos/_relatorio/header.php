<div class="row">
    <div class="col-12">
        <h2 class="page-header">

            <i class="fas fa-key"></i>
            <?= TopWise_App_Nome() ?>
            <small class="float-right">
                <?= lang('Artefato.relatorios.mensagens.data') ?>: <?= date(lang('Artefato.sistema.formatos.data')) ?><br>
                <?= lang('Artefato.relatorios.mensagens.emitidopor') ?> <?= $usuarioLogado->LOGIN ?>
            </small>

        </h2>
    </div>
</div>