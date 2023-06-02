<?php echo view('header') ?>

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="card">
<div class="card-header">Lihat Dokumen</div>
<div class="card-body">
    <!-- <?php print_r(substr($fileProyek[0]->nama_file, -3)); ?> -->
    <table class="table">
        <tr>
            <th>Dokumen 1</th>
            <td>
                <?php if (substr($fileProyek[0]->nama_file, -3) == 'pdf') : ?>
                    <a class="btn btn-success" onclick="openTab1()" href="#">Lihat</a>
                <?php elseif (substr($fileProyek[0]->nama_file, -3) == 'xls' || substr($fileProyek[0]->nama_file, -4) == 'xlsx'): ?>
                    <a class="btn btn-secondary" href="#">Download</a>
                <?php else: ?>
                    <p>Format file tidak didukung atau file tidak ada</p>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Dokumen 2</th>
            <td>
                <?php if (substr($fileProyek[1]->nama_file, -3) == 'pdf') : ?>
                    <a class="btn btn-success" onclick="openTab2()">Lihat</a>
                <?php elseif (substr($fileProyek[1]->nama_file, -3) == 'xls' || substr($fileProyek[1]->nama_file, -4) == 'xlsx'): ?>
                    <a class="btn btn-secondary" href="<?php echo base_url('Uploads/'.$fileProyek[1]->nama_file); ?>">Download</a>
                <?php else: ?>
                    <p>Format file tidak didukung atau file tidak ada</p>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Dokumen 3</th>
            <td>
                <?php if (substr($fileProyek[2]->nama_file, -3) == 'pdf') : ?>
                    <a href="<?php echo base_url('Uploads/'.$fileProyek[2]->nama_file); ?>">File</a>
                <?php elseif (substr($fileProyek[2]->nama_file, -3) == 'xls' || substr($fileProyek[2]->nama_file, -4) == 'xlsx'): ?>
                    <a class="btn btn-secondary" href="<?php echo base_url('Uploads/'.$fileProyek[2]->nama_file); ?>">Download</a>
                <?php else: ?>
                    <p>Format file tidak didukung atau file tidak ada</p>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</div>
<div class="card-footer">
    <a href="<?php echo base_url(); ?>register-proyek" class="btn btn-outline-secondary float-right">Kembali</a>
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
</script>
<?php echo view('footer') ?>