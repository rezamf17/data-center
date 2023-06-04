<?php echo view('header') ?>

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="card">
<div class="card-header">Edit Proyek</div>
<div class="card-body">
  <form action="<?php echo base_url('edit-kelola-data-proyek/'.$proyek['id']); ?>" method="POST">
  <?=csrf_field()?>
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Proyek</label>
      <input type="text" class="form-control" placeholder="Masukan Nama Proyek" name="nama_proyek" value="<?php echo $proyek['nama_proyek']; ?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Document Title</label>
      <input type="text" class="form-control" placeholder="Masukan Document Title" name="document_title" value="<?php echo $proyek['document_title']; ?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Kategori Document</label>
      <input type="text" class="form-control" placeholder="Masukan Kategori Document" name="kategori_document" value="<?php echo $proyek['kategori_document']; ?>" required>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Dokumen (format : .xls, .pdf, .docx, dan .doc)</label>
        <div class="input-group">
          <div class="custom-file">
            <a href="<?php echo base_url('edit-dokumen/'.$proyek['id']); ?>" class="btn btn-success">Lihat Dokumen</a>
          </div>
        </div>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Department</label>
      <input type="text" class="form-control" placeholder="Masukan Deparment" name="deparment" value="<?php echo $proyek['deparment']; ?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Tipe</label>
      <input type="text" class="form-control" placeholder="Masukan Tipe" name="tipe" value="<?php echo $proyek['tipe']; ?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Industri</label>
      <input type="text" class="form-control" placeholder="Masukan Industri" name="industri" value="<?php echo $proyek['industri']; ?>" required>
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