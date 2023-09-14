<html>

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .pdf {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .title {
            text-align: center;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 10px;
        }

        #customers td,
        #customers th {
            border: 0.5px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #00a0e4;
            color: white;
        }

        .signature {
            margin-top: 4rem;
            margin-right: auto;
            text-align: right;
            display: flex;
            padding: 0 0 0 0;
            font-size: 10px;
        }

        .signature-name {
            margin-top: 6rem;
            text-decoration: underline;
            font-weight: bold;
        }

        @page {
            background: url('./img/logo-wika3.svg') no-repeat center;
            background-image-resize: 1.5;
        }
        .container{
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Membuat 3 kolom dengan lebar yang sama */
            gap: 10px; /* Ruang antara kolom */
        }
        .row {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Membuat 3 kolom dengan lebar yang sama */
            gap: 10px; /* Ruang antara kolom */
        }
        .col {
            flex-basis: calc(33.33% - 10px); /* Membuat 3 kolom dengan lebar yang sama */
            margin-right: 10px; /* Mengatur jarak antara kolom */
            width : 14em;
        }
        img{
            width : 8em;
        }
    </style>
</head>
<h3 class="title">Laporan Data Proyek</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Proyek</th>
            <th>Status Proyek</th>
            <th>Departmen</th>
            <th>Tanggal Masuk Proyek</th>
            <th>Tanggal Berakhir Proyek</th>
            <th>PJ Proyek</th>
            <th>Tempat Proyek</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($proyek as $item): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $item['nama_proyek'] ?></td>
                <td><?= $item['kategori_document'] ?></td>
                <td><?= $item['deparment'] ?></td>
                <td><?= $item['created'] ?></td>
                <td><?= $item['ended'] == '0000-00-00' ? "-" : $item['ended'] ?></td>
                <td><?= $item['pj_proyek'] ?></td>
                <td><?= $item['industri'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>