<?php echo view('header') ?>

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="card">
<div class="card-header">Edit Dokumen</div>
<div class="card-body">
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
    <table class="table">
        <tr>
            <th>Dokumen 1</th>
            <td>
                <?php if (substr($fileProyek[0]->nama_file, -3) == 'pdf') : ?>
                    <a class="btn btn-success" onclick="openTab1()" href="#">Lihat</a>
                <?php elseif (substr($fileProyek[0]->nama_file, -3) == 'xls' || substr($fileProyek[0]->nama_file, -4) == 'xlsx'): ?>
                    <a class="btn btn-secondary" href="<?php echo base_url('Uploads/'.$fileProyek[0]->nama_file); ?>">Download</a>
                <?php elseif (substr($fileProyek[0]->nama_file, -3) == 'doc' || substr($fileProyek[0]->nama_file, -4) == 'docx'): ?>
                    <a class="btn btn-secondary" href="<?php echo base_url('Uploads/'.$fileProyek[0]->nama_file); ?>">Download</a>
                <?php elseif (substr($fileProyek[0]->nama_file, -3) == 'mp4' || substr($fileProyek[0]->nama_file, -3) == 'mkv'): ?>
                    <video controls width="250">
                    <source src="<?php echo $fileProyek[0]->nama_file; ?>" type="video/webm">

                    <source src="/Uploads/<?php echo $fileProyek[0]->nama_file; ?>" type="video/mp4">

                    Download the
                    <a href="<?php echo $fileProyek[0]->nama_file; ?>">WEBM</a>
                    or
                    <a href="<?php echo $fileProyek[0]->nama_file; ?>">MP4</a>
                    video.
                </video>
                <?php elseif (substr($fileProyek[0]->nama_file, -3) == 'jpg' || substr($fileProyek[0]->nama_file, -3) == 'png'): ?>
                    <img src="/Uploads/<?php echo $fileProyek[0]->nama_file; ?>" alt="Gambar Dokumen 1" style="max-width : 20em;">
                <?php else: ?>
                    <p>Format file tidak didukung atau file tidak ada</p>
                <?php endif; ?>
            </td>
            <td>
                <label>Ganti File</label>
                <form action="<?php echo base_url('edit-dokumen1/'.$fileProyek[0]->id); ?>" method="post" enctype="multipart/form-data">
                <?=csrf_field()?>
                    <input id="files" type="file" name="document1" required>
                    <input type="hidden" value="<?php echo $fileProyek[0]->proyek_id; ?>" name="id_proyek" >
                    <button type="submit" class="btn btn-outline-primary">Ganti</button>
                </form>
            </td>
            <td>
                <label>Keterangan</label>
                <form action="<?php echo base_url('edit-keterangan1/'.$fileProyek[0]->id); ?>" method="post" enctype="multipart/form-data">
                <?=csrf_field()?>
                    <input type="hidden" value="<?php echo $fileProyek[0]->proyek_id; ?>" name="id_proyek" >
                    <input type="text" class="form-control" name="keterangan1" value="<?php echo $fileProyek[0]->keterangan; ?>">
                    <button type="submit" class="btn btn-outline-primary">Ganti Keterangan</button>
                </form>
            </td>
        </tr>
        <tr>
            <th>Dokumen 2</th>
            <td>
                <?php if (substr($fileProyek[1]->nama_file, -3) == 'pdf') : ?>
                    <a class="btn btn-success" onclick="openTab2()">Lihat</a>
                <?php elseif (substr($fileProyek[1]->nama_file, -3) == 'xls' || substr($fileProyek[1]->nama_file, -4) == 'xlsx'): ?>
                    <a class="btn btn-secondary" href="<?php echo base_url('Uploads/'.$fileProyek[1]->nama_file); ?>">Download</a>
                <?php elseif (substr($fileProyek[1]->nama_file, -3) == 'doc' || substr($fileProyek[1]->nama_file, -4) == 'docx'): ?>
                    <a class="btn btn-secondary" href="<?php echo base_url('Uploads/'.$fileProyek[1]->nama_file); ?>">Download</a>
                <?php elseif (substr($fileProyek[1]->nama_file, -3) == 'mp4' || substr($fileProyek[1]->nama_file, -3) == 'mkv'): ?>
                    <video controls width="250">
                    <source src="<?php echo $fileProyek[1]->nama_file; ?>" type="video/webm">

                    <source src="/Uploads/<?php echo $fileProyek[1]->nama_file; ?>" type="video/mp4">

                    Download the
                    <a href="<?php echo $fileProyek[1]->nama_file; ?>">WEBM</a>
                    or
                    <a href="<?php echo $fileProyek[1]->nama_file; ?>">MP4</a>
                    video.
                </video>
                <?php elseif (substr($fileProyek[1]->nama_file, -3) == 'jpg' || substr($fileProyek[1]->nama_file, -3) == 'png'): ?>
                    <img src="/Uploads/<?php echo $fileProyek[1]->nama_file; ?>" alt="Gambar Dokumen 2" style="max-width : 20em;">
                <?php else: ?>
                    <p>Format file tidak didukung atau file tidak ada</p>
                <?php endif; ?>
            </td>
            <td>
            <label>Ganti File</label>
            <form action="<?php echo base_url('edit-dokumen2/'.$fileProyek[1]->id); ?>" method="post" enctype="multipart/form-data">
                <?=csrf_field()?>
                    <input id="files" type="file" name="document2" required>
                    <input type="hidden" value="<?php echo $fileProyek[0]->proyek_id; ?>" name="id_proyek" >
                    <button type="submit" class="btn btn-outline-primary">Ganti</button>
            </form>
            </td>
            <td>
                <label>Keterangan</label>
                <form action="<?php echo base_url('edit-keterangan2/'.$fileProyek[1]->id); ?>" method="post" enctype="multipart/form-data">
                <?=csrf_field()?>
                    <input type="hidden" value="<?php echo $fileProyek[0]->proyek_id; ?>" name="id_proyek" >
                    <input type="text" class="form-control" name="keterangan2" value="<?php echo $fileProyek[1]->keterangan; ?>">
                    <button type="submit" class="btn btn-outline-primary">Ganti Keterangan</button>
                </form>
            </td>
        </tr>
        <tr>
            <th>Dokumen 3</th>
            <td>
                <?php if (substr($fileProyek[2]->nama_file, -3) == 'pdf') : ?>
                    <a class="btn btn-success" onclick="openTab2()">Lihat</a>
                <?php elseif (substr($fileProyek[2]->nama_file, -3) == 'xls' || substr($fileProyek[2]->nama_file, -4) == 'xlsx'): ?>
                    <a class="btn btn-secondary" href="<?php echo base_url('Uploads/'.$fileProyek[2]->nama_file); ?>">Download</a>
                <?php elseif (substr($fileProyek[2]->nama_file, -3) == 'doc' || substr($fileProyek[2]->nama_file, -4) == 'docx'): ?>
                    <a class="btn btn-secondary" href="<?php echo base_url('Uploads/'.$fileProyek[2]->nama_file); ?>">Download</a>
                <?php elseif (substr($fileProyek[2]->nama_file, -3) == 'mp4' || substr($fileProyek[2]->nama_file, -3) == 'mkv'): ?>
                    <video controls width="250">
                    <source src="<?php echo $fileProyek[2]->nama_file; ?>" type="video/webm">

                    <source src="/Uploads/<?php echo $fileProyek[2]->nama_file; ?>" type="video/mp4">

                    Download the
                    <a href="<?php echo $fileProyek[2]->nama_file; ?>">WEBM</a>
                    or
                    <a href="<?php echo $fileProyek[2]->nama_file; ?>">MP4</a>
                    video.
                </video>
                <?php elseif (substr($fileProyek[2]->nama_file, -3) == 'jpg' || substr($fileProyek[2]->nama_file, -3) == 'png'): ?>
                    <img src="/Uploads/<?php echo $fileProyek[2]->nama_file; ?>" alt="Gambar Dokumen 3" style="max-width : 20em;">
                <?php else: ?>
                    <p>Format file tidak didukung atau file tidak ada</p>
                <?php endif; ?>
            </td>
            <td>
            <label>Ganti File</label>
                <form action="<?php echo base_url('edit-dokumen3/'.$fileProyek[2]->id); ?>" method="post" enctype="multipart/form-data">
                    <?=csrf_field()?>
                        <input id="files" type="file" name="document3" required>
                        <input type="hidden" value="<?php echo $fileProyek[0]->proyek_id; ?>" name="id_proyek" >
                        <button type="submit" class="btn btn-outline-primary">Ganti</button>
                </form>
            </td>
            <td>
                <form action="<?php echo base_url('edit-keterangan3/'.$fileProyek[2]->id); ?>" method="post" enctype="multipart/form-data">
                <?=csrf_field()?>
                <label>Keterangan</label>
                    <input type="hidden" value="<?php echo $fileProyek[0]->proyek_id; ?>" name="id_proyek" >
                    <input type="text" class="form-control" name="keterangan3" value="<?php echo $fileProyek[2]->keterangan; ?>">
                    <button type="submit" class="btn btn-outline-primary">Ganti Keterangan</button>
                </format>
            </td>
        </tr>
    </table>
</div>
<div class="card-footer">
    <a href="<?php echo base_url('edit-kelola-data-proyek/'.$fileProyek[0]->proyek_id); ?>" class="btn btn-outline-secondary float-right">Kembali</a>
</div>
</div>
</section>

</div>
<script>
        function openTab1() {
            window.open('<?php echo base_url('Uploads/'.$fileProyek[0]->nama_file); ?>', '_blank');
        }
        function openTab2() {
            window.open('<?php echo base_url('Uploads/'.$fileProyek[1]->nama_file); ?>', '_blank');
        }
        function openTab2() {
            window.open('<?php echo base_url('Uploads/'.$fileProyek[2]->nama_file); ?>', '_blank');
        }
</script>
<?php echo view('footer') ?>