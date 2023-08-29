<head>
    <style>
        .title{
            text-align : center;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<h3 class="title">Laporan Data Proyek</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Proyek</th>
            <th>Document Title</th>
            <th>Kategori Document</th>
            <th>Departmen</th>
            <th>Tanggal Masuk Proyek</th>
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
                <td><?= $item['industri'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>