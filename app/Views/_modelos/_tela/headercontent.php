<?php if($breadcrumb != '') : ?>
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1><?= @$titulo ?></h1>
        </div>
        <?= $breadcrumb ?>
    </div>
<?php endif; ?>