<?php echo view('header') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Member</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar</li>
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
                    <h3 class="card-title">Daftar Member</h3>

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
                <?php elseif (session()->getFlashdata('warning')) : ?>
                    <div class="alert alert-warning" role="alert">
                        <?= session()->getFlashdata('warning'); ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <!-- /.card-header -->
                <div class="card-body">
                    <?php if(session()->get('role') !== 'SU') : ?>
                        <a href="<?php echo base_url(); ?>tambah-daftar-member" class="btn btn-primary mb-3">Tambah</a>
                    <?php endif; ?>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Role</th>
                                <th>Nama Member</th>
                                <th>Nama Proyek</th>
                                <?php if (session()->get('role') == 'SU') : ?>
                                <th>PJ Proyek</th>
                                <?php endif; ?>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; foreach ($users as $user): ?>
                            <?php if ($user['role'] != 'SU') : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $user['nip'] ?></td>
                                <td><?= $user['role'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['nama_proyek'] ?></td>
                                <?php if (session()->get('role') == 'SU') : ?>
                                <td><?= $user['pj_proyek'] ?></td>
                                <?php endif; ?>
                                <td>
                                    <form class="btn btn-danger" action="<?php echo base_url('delete-daftar-member/'.$user['id']); ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus member ini?')">
                                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                        <button type="submit" >Hapus</button><?=csrf_field()?>
                                    </form><?=csrf_field()?>
                                </td>
                            </tr>
                            <?php endif; ?>
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