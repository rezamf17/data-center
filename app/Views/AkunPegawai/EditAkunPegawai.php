<?php echo view('header') ?>

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">Edit Akun Pegawai</div>
        <div class="card-body">
          <form action="<?php echo base_url('edit-akun-pegawai/' . $user['id']); ?>" method="POST">
            <?= csrf_field() ?>
            <div class="form-group">
              <label for="exampleInputEmail1">NIP</label>
              <input type="text" class="form-control" value="<?= $user['nip'] ?>" placeholder="Masukan NIP" name="nip" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" class="form-control" value="<?= $user['name'] ?>" placeholder="Masukan Nama" name="name" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" value="<?= $user['email'] ?>" placeholder="Masukan email" name="email" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nomor HP</label>
              <input type="number" class="form-control" value="<?= $user['nomor_hp'] ?>" placeholder="Masukan Nomor HP" name="nomor_hp" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password">
              <i>*Kosongkan Password Jika Tidak Diganti</i>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Konfirmasi Password</label>
              <input type="password" class="form-control" placeholder="Konfirmasi Password" name="confirmpassword">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Role</label>
              <select name="role" class="form-control" required>
                <option value="">Pilih Role</option>
                <option value="Admin" <?php if ($user['role'] == "Admin") echo "selected"; ?>>Admin</option>
                <option value="Pegawai" <?php if ($user['role'] == "Pegawai") echo "selected"; ?>>Pegawai</option>
                <option value="PJ" <?php if ($user['role'] == "PJ") echo "selected"; ?>>PJ Proyek</option>
                <option value="Member" <?php if ($user['role'] == "Member") echo "selected"; ?>>Member Proyek</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Status</label>
              <select name="status" class="form-control" required>
                <option value="">Pilih Status</option>
                <option value="Active" <?php if ($user['status'] == "Active") echo "selected"; ?>>Active</option>
                <option value="InActive" <?php if ($user['status'] == "InActive") echo "selected"; ?>>InActive</option>
              </select>
            </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-outline-success">Edit</button>
          <a href="<?php echo base_url(); ?>akun-pegawai" class="btn btn-outline-secondary float-right">Kembali</a>
        </div>
        </form>
      </div>
    </div>

  </section>

</div>
<?php echo view('footer') ?>