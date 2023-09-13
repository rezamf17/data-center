<?php echo view('header') ?>

<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">Tambah Member Proyek</div>
				<form action="<?php echo base_url(); ?>tambah-daftar-member" method="POST">
					<?= csrf_field() ?>
					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputPassword1">Nama Proyek</label>
							<select name="id_proyek" class="form-control" required>
								<option value="">Pilih Nama Proyek</option>
                                <?php foreach ($proyek as $item): ?>
                                    <option value="<?= $item['id']; ?>"><?= $item['nama_proyek']; ?></option>
                                <?php endforeach; ?> 
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Member Proyek</label>
							<select name="id_user" class="form-control" required>
								<option value="">Pilih Member Proyek</option>
                                <?php foreach ($member as $item): ?>
                                    <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                <?php endforeach; ?> 
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