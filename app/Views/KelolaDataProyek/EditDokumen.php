<?php echo view('header') ?>

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="card">
<div class="card-header">Edit Dokumen</div>
<div class="card-body">
    <?php print_r($fileProyek); ?>
    
</div>
<div class="card-footer">
    <a href="<?php echo base_url(); ?>register-proyek" class="btn btn-outline-secondary float-right">Kembali</a>
</div>
</div>
</section>

</div>
<?php echo view('footer') ?>