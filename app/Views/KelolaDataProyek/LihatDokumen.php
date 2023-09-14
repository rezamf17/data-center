<?php echo view('header') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lihat Dokumen</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lihat Dokumen</li>
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
                    <h3 class="card-title">Data Dokumen</h3>

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
                    <a href="<?php echo base_url(); ?>tambah-dokumen" class="btn btn-primary mb-3">Tambah</a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Dokumen</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; foreach ($file as $item): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td>
                                <?php if (substr($item['nama_file'], -3) == 'pdf') : ?>
                                    <a class="btn btn-success" onclick="openTab2('<?php echo base_url("Uploads/" . $item["nama_file"]); ?>')">Lihat</a>
                                <?php elseif (substr($item['nama_file'], -3) == 'xls' || substr($item['nama_file'], -4) == 'xlsx'): ?>
                                    <a class="btn btn-secondary" href="<?php echo base_url('Uploads/'.$item['nama_file']); ?>">Download</a>
                                <?php elseif (substr($item['nama_file'], -3) == 'doc' || substr($item['nama_file'], -4) == 'docx'): ?>
                                    <a class="btn btn-secondary" href="<?php echo base_url('Uploads/'.$item['nama_file']); ?>">Download</a>
                                <?php elseif (substr($item['nama_file'], -3) == 'mp4' || substr($item['nama_file'], -3) == 'mkv'): ?>
                                    <video controls width="250">
                                    <source src="<?php echo $item['nama_file']; ?>" type="video/webm">

                                    <source src="/Uploads/<?php echo $item['nama_file']; ?>" type="video/mp4">

                                    Download the
                                    <a href="<?php echo $item['nama_file']; ?>">WEBM</a>
                                    or
                                    <a href="<?php echo $item['nama_file']; ?>">MP4</a>
                                    video.
                                </video>
                                <?php elseif (substr($item['nama_file'], -3) == 'jpg' || substr($item['nama_file'], -3) == 'png'): ?>
                                    <img src="/Uploads/<?php echo $item['nama_file']; ?>" alt="Gambar Dokumen 3" style="max-width : 20em;">
                                <?php else: ?>
                                    <p>Format file tidak didukung atau file tidak ada</p>
                                <?php endif; ?>
                                </td>
                                <td><?= $item['keterangan'] ?></td>
                                <td>
                                    <a href="<?= base_url('edit-dokumen/' . $item['id']) ?>" class="btn btn-success">Edit Dokumen</a>
                                    <form class="btn btn-danger" action="<?php echo base_url('delete-dokumen/' . $item['id']); ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">
                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                        <button type="submit">Hapus Dokumen</button><?= csrf_field() ?>
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
<script>
    function openTab2(url) {
    window.open(url, '_blank');
}
</script>
<?php echo view('footer') ?>