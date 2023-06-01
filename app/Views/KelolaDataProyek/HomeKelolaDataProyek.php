<?php echo view('header') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Data Proyek</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kelola Data Proyek</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Kelola Data Proyek</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                    <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Proyek</th>
                                <th>Document Title</th>
                                <th>Kategori Document</th>
                                <th>Departmen</th>
                                <th>Tipe</th>
                                <th>Industri</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; foreach ($proyek as $item): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $item['nama_proyek'] ?></td>
                                <td><?= $item['document_title'] ?></td>
                                <td><?= $item['kategori_document'] ?></td>
                                <td><?= $item['deparment'] ?></td>
                                <td><?= $item['tipe'] ?></td>
                                <td><?= $item['industri'] ?></td>
                                <td>
                                    <a href="<?= base_url('edit-akun-pegawai/'.$item['id']) ?>" class="btn btn-success">Edit</a>
                                    <form class="btn btn-danger" action="<?php echo base_url('hapus-akun-pegawai/'.$item['id']); ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" >Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php echo view('footer') ?>