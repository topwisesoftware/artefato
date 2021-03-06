<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-top: 5px;">
        <?php if((!isset($cabecalho)) || (isset($cabecalho) && ($cabecalho === TRUE))) : ?>
            <!-- Content Header -->
            <div class="content-header" <?php //= (@$titulo == $this->lang->line('cibase_interface_inicio') ? 'style="display: none;"' : ''); ?>> 
                <div class="container-fluid">
                    <?= $this->include('_modelos/_tela/headercontent') ?>
                </div>
            </div>
        <?php endif; ?>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?= $this->renderSection('content') ?>
        </div>
    </section>
</div>

