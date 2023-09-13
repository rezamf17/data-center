<?php echo view('header') ?>

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="card">
<div class="card-header">Edit Dokumen</div>
<div class="card-body">
  <form action="<?php echo base_url('edit-dokumen/'.$fileProyek['id']); ?>" method="POST" enctype="multipart/form-data">
  <?=csrf_field()?>
  <div class="form-group">
        <label for="exampleInputFile">Pilih Proyek</label>
        <select name="proyek" class="form-control" required>
            <option value="">Pilih Proyek</option>
            <?php foreach ($proyek as $item): ?>
                <option value="<?= $item['id']; ?>" <?php if($item['id'] == $fileProyek['proyek_id']) echo "selected"; ?>>
                <?= $item['nama_proyek']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Dokumen (format : .xls, .xlsx, .pdf, .docx, .doc, .jpg, .png, .mp4, .mkv)</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile" name="document" />
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
        </div>
        <b>*Kosongkan Jika Tidak Ingin Mengganti Dokumen</b>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Keterangan Dokumen</label>
        <input type="text" class="form-control" name="keterangan" value="<?= $fileProyek['keterangan']; ?>">
        <b>*Diwajibkan</b>
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-outline-success">Edit</button>
    <a href="<?php echo base_url(); ?>kelola-data-proyek" class="btn btn-outline-secondary float-right">Kembali</a>
  </div>
</form>
</div>
</div>

</section>
</div>
<?php echo view('footer') ?>