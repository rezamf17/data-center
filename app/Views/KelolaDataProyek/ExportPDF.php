<html>
<head>
    <style>
        .title{
            text-align : center;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
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
<body>
    <div class="container">
                <h3 class="title">Laporan Data Proyek</h3>
    </div>
    </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Proyek</th>
                <th>Document Title</th>
                <th>Kategori Document</th>
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
                    <td><?= $item['document_title'] ?></td>
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
</body>
</html>