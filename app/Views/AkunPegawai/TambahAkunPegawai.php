<?php echo view('header') ?>

<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">Tambah Akun Pegawai</div>
				<form action="<?php echo base_url(); ?>post-akun-pegawai" method="POST">
					<?= csrf_field() ?>
					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputEmail1">NIP</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIP" name="nip" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Nama</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama" name="name" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukan email" name="email" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Nomor HP</label>
							<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor HP" name="nomor_hp" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Konfirmasi Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Konfirmasi Password" name="confirmpassword" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Role</label>
							<select name="role" class="form-control" required>
								<option value="">Pilih Role</option>
								<option value="Admin">Admin</option>
								<option value="Pegawai">Pegawai</option>
								<option value="PJ">PJ Proyek</option>
								<option value="Member">Member Proyek</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Status</label>
							<select name="status" class="form-control" required>
								<option value="">Pilih Status</option>
								<option value="Active">Active</option>
								<option value="InActive">InActive</option>
							</select>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-outline-primary">Simpan</button>
						<a href="<?php echo base_url(); ?>akun-pegawai" class="btn btn-outline-secondary float-right">Kembali</a>
					</div>
				</form>
			</div>
		</div>

	</section>

</div>
<?php echo view('footer') ?>