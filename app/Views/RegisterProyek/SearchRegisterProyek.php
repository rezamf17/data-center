<?php echo view('header') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Register Proyek</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Register Proyek</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="card card-default">
                <div class="card-header">Filter Data Proyek</div>
                <div class="card-body">
                <form action="<?php echo base_url(); ?>register-proyek/search" method="POST" enctype="multipart/form-data">
                <?=csrf_field()?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Proyek</label>
                    <input type="text" class="form-control" placeholder="Masukan Nama Proyek" name="nama_proyek" value="<?php echo $proyekView['nama_proyek']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Document Title</label>
                    <input type="text" class="form-control" placeholder="Masukan Document Title" name="document_title" value="<?php echo $proyekView['document_title']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Document</label>
                    <select name="kategori_document" class="form-control">
                        <option value="">Pilih Kategori Document</option>
                        <option value="On-Going" <?php if($proyekView['kategori_document'] == "On-Going") echo "selected"; ?>>On-Going</option>
                        <option value="Hold" <?php if($proyekView['kategori_document'] == "Hold") echo "selected"; ?>>Hold</option>
                        <option value="Finish" <?php if($proyekView['kategori_document'] == "Finish") echo "selected"; ?>>Finish</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Deparment</label>
                    <select name="deparment" class="form-control" >
                        <option value="">Pilih Deparment</option>
                        <option value="Building" <?php if($proyekView['deparment'] == "Building") echo "selected"; ?>>Building</option>
                        <option value="Bim dan Riset" <?php if($proyekView['deparment'] == "Bim dan Riset") echo "selected"; ?>>Bim dan Riset</option>
                        <option value="Infrastruktur" <?php if($proyekView['deparment'] == "Infrastruktur") echo "selected"; ?>>Infrastruktur</option>
                        <option value="EPCC" <?php if($proyekView['deparment'] == "EPCC") echo "selected"; ?>>EPCC</option>
                        <option value="Knowledge Management" <?php if($proyekView['deparment'] == "Knowledge Management") echo "selected"; ?>>Knowledge Management</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Tempat Proyek</label>
                    <input type="text" class="form-control" name="industri" placeholder="Tempat Proyek" value="<?php echo $proyekView['industri']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Mulai</label>
                    <input type="date" class="form-control" name="startdate" >
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Akhir</label>
                    <input type="date" class="form-control" name="enddate" >
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                    <a href="<?php echo base_url(); ?>register-proyek" class="btn btn-outline-secondary float-right">Reset</a>
                </div>
                </form>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Register Proyek</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="<?php echo base_url(); ?>tambah-register-proyek" class="btn btn-primary mb-3">Tambah</a>
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Proyek</th>
                                <th>Document Title</th>
                                <th>Kategori Document</th>
                                <th>Departmen</th>
                                <th>Tanggal Masuk Proyek</th>
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
                                <td><?= $item['created'] ?></td>
                                <td><?= $item['industri'] ?></td>
                                <td>
                                    <a href="<?= base_url('lihat-dokumen/'.$item['id']) ?>" class="btn btn-success">Lihat Dokumen</a>
                                    <!-- <form class="btn btn-secondary" action="<?php echo base_url('lihat-dokumen'); ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" >Lihat Dokumen</button>
                                    </form> -->
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