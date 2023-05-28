<?php echo view('header') ?>

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="card">
<div class="card-header">Tambah Register Proyek</div>
<div class="card-body">
  <form action="<?php echo base_url(); ?>post-register-proyek" method="POST" enctype="multipart/form-data">
  <?=csrf_field()?>
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Proyek</label>
      <input type="text" class="form-control" placeholder="Masukan Nama Proyek" name="nama_proyek" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Document Title</label>
      <input type="text" class="form-control" placeholder="Masukan Document Title" name="document_title" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Kategori Document</label>
      <input type="text" class="form-control" placeholder="Masukan Kategori Document" name="kategori_document" required>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Dokumen (format : .xls, .pdf, .docx, dan .doc)</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile" name="document">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
        </div>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Deparment</label>
      <input type="text" class="form-control" placeholder="Masukan Deparment" name="deparment" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Tipe</label>
      <input type="text" class="form-control" placeholder="Masukan Tipe" name="tipe" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Industri</label>
      <input type="text" class="form-control" placeholder="Masukan Industri" name="industri" required>
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-outline-primary">Simpan</button>
    <a href="<?php echo base_url(); ?>register-proyek" class="btn btn-outline-secondary float-right">Kembali</a>
  </div>
</form>
</div>
</div>

</section>

</div>
<?php echo view('footer') ?>