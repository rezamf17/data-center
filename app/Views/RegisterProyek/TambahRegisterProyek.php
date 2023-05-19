<?php echo view('header') ?>

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="card">
<div class="card-header">Tambah Register Proyek</div>
<div class="card-body">
  <form action="<?php echo base_url(); ?>post-akun-pegawai" method="POST">
  <?=csrf_field()?>
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Proyek</label>
      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIP" name="nip" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Document Title</label>
      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama" name="name" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Kategori Document</label>
      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukan email" name="email" required>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Document</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Upload</span>
          </div>
        </div>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Deparment</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Tipe</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Konfirmasi Password" name="confirmpassword" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Industri</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Konfirmasi Password" name="confirmpassword" required>
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