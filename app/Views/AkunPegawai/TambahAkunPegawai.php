<?php echo view('header') ?>

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="card">
<div class="card-header">Tambah Akun Pegawai</div>
<div class="card-body">
  <div class="form-group">
    <label for="exampleInputEmail1">NIP</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIP" name="nip">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukan email" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nomor HP</label>
    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor HP" name="nomor_hp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Konfirmasi Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Konfirmasi Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Role</label>
    <select name="role" class="form-control">
        <option value="">Pilih Role</option>
        <option value="Admin">Admin</option>
        <option value="Pegawai">Pegawai</option>
        <option value="PJ">PJ Proyek</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Status</label>
    <select name="role" class="form-control">
        <option value="">Pilih Status</option>
        <option value="Admin">Active</option>
        <option value="Pegawai">InActive</option>
    </select>
  </div>
</div>
<div class="card-footer">
  <button type="submit" class="btn btn-outline-primary">Simpan</button>
  <a href="<?php echo base_url(); ?>akun-pegawai" class="btn btn-outline-secondary float-right">Kembali</a>
</div>
</div>
</div>

</section>

</div>
<?php echo view('footer') ?>