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
    </style>
</head>

<body>
    <main class="pdf">
        <h3 class="title">Laporan Data Proyek Pembangunan</h3>
        <table id="customers">
            <thead>
                <tr>
                    <th style="text-align: center;">No</th>
                    <th>Nama Proyek</th>
                    <th>Document Title</th>
                    <th>Kategori Document</th>
                    <th>Departmen</th>
                    <th>Tanggal Masuk Proyek</th>
                    <th>Tempat Proyek</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($proyek as $item) : ?>
                    <tr>
                        <td style="text-align: center;"><?= $i++ ?></td>
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

        <section class="signature">
            <span>Atas Nama</span>
            <p style="margin-top: 0;">Jakarta, <span><?= date("d/M/Y") ?></span></p>
            <p class="signature-name" style="margin-bottom: 0;"><?= session()->get('name') ?></p>
            <p style="margin-top: 0;">NIP: <?= session()->get('nip'); ?></p>
        </section>
    </main>
</body>

</html>