<?php echo view('header') ?>

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="card">
<div class="card-header">Tambah Kelola Data Proyek</div>
<div class="card-body">
  <form action="<?php echo base_url(); ?>tambah-data-proyek" method="POST" enctype="multipart/form-data">
  <?=csrf_field()?>
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Proyek</label>
      <input type="text" class="form-control" placeholder="Masukan Nama Proyek" name="nama_proyek" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Status Proyek</label>
      <select name="kategori_document" class="form-control" required>
        <option value="">Pilih Status Proyek</option>
        <option value="On-Going">On-Going</option>
        <option value="Hold">Hold</option>
        <option value="Finish">Finish</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Deparment</label>
      <select name="deparment" class="form-control" required>
        <option value="">Pilih Deparment</option>
        <option value="Building">Building</option>
        <option value="Bim dan Riset">Bim dan Riset</option>
        <option value="Infrastruktur">Infrastruktur</option>
        <option value="EPCC">EPCC</option>
        <option value="Knowledge Management">Knowledge Management</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Tempat Proyek</label>
      <input type="text" class="form-control" name="industri" required placeholder="Tempat Proyek">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Tanggal Berakhir Proyek</label>
      <input type="date" class="form-control" name="ended" placeholder="Tempat Proyek">
      <b>*Opsional</b>
    </div>
    <?php if (session()->get('role') === 'SU' || session()->get('role') === 'Member')  : ?>
    <div class="form-group">
      <label for="exampleInputPassword1">PJ Proyek</label>
      <select name="pj_proyek" class="form-control" required>
        <option value="">Pilih PJ Proyek</option>
        <?php foreach ($userPJ as $user): ?>
          <option value="<?= $user['name']; ?>"><?= $user['name']; ?></option>
        <?php endforeach; ?> 
      </select>
    </div>
    <?php elseif(session()->get('role') === 'PJ'): ?>
    <div class="form-group">
      <label for="exampleInputPassword1">PJ Proyek</label>
      <input type="text" class="form-control" name="pj_proyek" value="<?php echo session()->get('name'); ?>" readonly>
    </div>
    <?php endif; ?>
    <div class="form-group">
      <label for="exampleInputPassword1">Gambar Proyek </label>
      <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar" accept="image/png, image/gif, image/jpeg" required />
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
        </div>
    </div>
    <label for="exampleInputPassword1">Deskripsi Proyek</label>
    <textarea id="summernote" row="5" name="deskripsi">
    </textarea>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-outline-primary">Simpan</button>
    <a href="<?php echo base_url(); ?>kelola-data-proyek" class="btn btn-outline-secondary float-right">Kembali</a>
  </div>
</form>
</div>
</div>

</section>
</div>
<script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
<?php echo view('footer') ?>