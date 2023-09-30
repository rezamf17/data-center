<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Proyek</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .title {
            text-align: center;
        }

        table,
        tr,
        td,
        td {
            text-align: left;
            width: 30%;
        }

        .img-proyek {
            max-width: 10em;
        }

        .table-dokumen {
            width: 100%;
        }

        .table-dokumen .no {
            width: 4rem;
        }

        th {
            text-align: left;
            padding-right: 2rem;
        }

        .desc {
            text-align: justify;
        }

        @page {
            background: url('./img/logo-wika3.svg') no-repeat center;
            background-image-resize: 1.5;
        }
    </style>
</head>

<body>
    <h3 class="title"><?php echo $proyek['nama_proyek']; ?></h3>
    <table id="isi">
        <tr>
            <th>Status</th>
            <td><?php echo $proyek['kategori_document']; ?></td>
        </tr>
        <tr>
            <th>Department</th>
            <td><?php echo $proyek['deparment']; ?></td>
        </tr>
        <tr>
            <th>Tanggal Mulai</th>
            <td><?php echo $proyek['created']; ?></td>
        </tr>
        <tr>
            <th>Tanggal Selesai</th>
            <td><?php echo $proyek['ended']; ?></td>
        </tr>
        <tr>
            <th>Lokasi</th>
            <td><?php echo $proyek['industri']; ?></td>
        </tr>
        <tr>
            <th>Gambar Proyek</th>
            <td>
                <a class="btn btn-success" href="<?php echo base_url("Uploads/" . $gambar[0]['nama_file']); ?>"><?php echo base_url("Uploads/" . $gambar[0]['nama_file']); ?></a>
            </td>
            <!-- <td>
                <img class="img-proyek" src="http://localhost:8080/Uploads/<?php echo $gambar[0]['nama_file']; ?>" alt="" srcset="">
            </td> -->
        </tr>
        <tr>
            <th>Deskprisi</th>
            <td><?php echo $proyek['deskripsi']; ?></td>
        </tr>
        <tr>
            <th>PJ Proyek</th>
            <td><?php echo $proyek['pj_proyek']; ?></td>
        </tr>
    </table>

    <p class="desc"><?php echo $proyek['deskripsi']; ?></p>

    <?php if (sizeof($member) > 0) : ?>
        <h4>Member Proyek</h4>
        <table class="table-dokumen">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Member</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($member as $item) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $item['nip'] ?></td>
                        <td><?= $item['name'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>



    <h4>Dokumen Proyek</h4>
    <table class="table-dokumen">
        <thead>
            <tr>
                <th>No</th>
                <th>Dokumen</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($file as $item) : ?>
                <tr>
                    <td class="no"><?= $i++ ?></td>
                    <td>
                        <?php if (substr($item['nama_file'], -3) == 'pdf') : ?>
                            <a class="btn btn-success" href="<?php echo base_url("Uploads/" . $item["nama_file"]); ?>"><?php echo base_url("Uploads/" . $item["nama_file"]); ?></a>
                        <?php elseif (substr($item['nama_file'], -3) == 'xls' || substr($item['nama_file'], -4) == 'xlsx') : ?>
                            <a class="btn btn-secondary" href="<?php echo base_url('Uploads/' . $item['nama_file']); ?>"><?php echo base_url('Uploads/' . $item['nama_file']); ?></a>
                        <?php elseif (substr($item['nama_file'], -3) == 'doc' || substr($item['nama_file'], -4) == 'docx') : ?>
                            <a class="btn btn-secondary" href="<?php echo base_url('Uploads/' . $item['nama_file']); ?>"><?php echo base_url('Uploads/' . $item['nama_file']); ?></a>
                        <?php elseif (substr($item['nama_file'], -3) == 'mp4' || substr($item['nama_file'], -3) == 'mkv') : ?>
                            <a class="btn btn-secondary" href="<?php echo base_url('Uploads/' . $item['nama_file']); ?>"><?php echo base_url('Uploads/' . $item['nama_file']); ?></a>
                        <?php elseif (substr($item['nama_file'], -3) == 'jpg' || substr($item['nama_file'], -3) == 'png') : ?>
                            <!-- <img src="/Uploads/<?php echo $item['nama_file']; ?>" alt="Gambar Dokumen 3" style="max-width : 20em;"> -->
                            <a class="btn btn-secondary" href="<?php echo base_url('Uploads/' . $item['nama_file']); ?>"><?php echo base_url('Uploads/' . $item['nama_file']); ?></a>
                        <?php else : ?>
                            <p>Format file tidak didukung atau file tidak ada</p>
                        <?php endif; ?>
                    </td>
                    <td><?= $item['keterangan'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>