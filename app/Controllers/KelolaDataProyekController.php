<?php

namespace App\Controllers;
use App\Models\ProyekModel;
use App\Models\FileModel;
use App\Models\UserModel;
use DateTime;
use DateTimeZone;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KelolaDataProyekController extends BaseController
{
    //function untuk tampilan halaman kelola data proyek
    public function index()
    {
        $proyekModel = new ProyekModel();
        //variabel data merupakan semua data yang ada pada tabel proyek
        $session = session();
//         SELECT proyek_member.id, proyek_member.id_proyek, proyek_member.id_user, proyek.nama_proyek, proyek.document_title,
// proyek.kategori_document, proyek.deparment, proyek.created, proyek.ended, proyek.pj_proyek, proyek.industri,user.name
// FROM proyek_member
// JOIN proyek ON proyek.id = proyek_member.id_proyek
// JOIN user ON user.id = proyek_member.id_user;
        if ($session->get('role') == 'SU') {
            $data['proyek'] = $proyekModel->getAll();
        }elseif($session->get('role') == 'Member'){
            $data['proyek'] = $proyekModel->dataMemberProyek($session->get('name'));
        }elseif($session->get('role') == 'PJ'){
            $data['proyek'] = $proyekModel->dataPJProyek($session->get('name'));
        }else{
            $data['proyek'] = $proyekModel->getAll();
        }
        return view('KelolaDataProyek/HomeKelolaDataProyek', $data);
    }

    public function searchProyek()
    {
        // Menerima kriteria pencarian dari form
        $nama_proyek = $this->request->getPost('nama_proyek');
        $document_title = $this->request->getPost('document_title');
        $kategori_document = $this->request->getPost('kategori_document');
        $departmen = $this->request->getPost('deparment');
        $startdate = $this->request->getPost('startdate');
        $enddate = $this->request->getPost('enddate');
        $industri = $this->request->getPost('industri');

        // Membuat instance model
        $model = new ProyekModel();

        // Mengambil data berdasarkan kriteria pencarian
        $data['proyek'] = $model->getSearch($nama_proyek, $document_title, $kategori_document, $departmen, $startdate, $enddate, $industri);
        $data['proyekView'] = [
            'nama_proyek'=>$nama_proyek, 
            'document_title'=>$document_title, 
            'kategori_document'=>$kategori_document,
            'deparment'=>$departmen,
            'startdate'=>$startdate, 
            'enddate' => $enddate, 
            'industri'=>$industri];
        // print_r($startdate);exit();
        // Menampilkan hasil pencarian ke tampilan
        return view('KelolaDataProyek/SearchHomeKelolaDataProyek', $data);
    }

    //function untuk menampikan halaman edit
    public function editView($id)
    {
        $proyekModel = new ProyekModel();
        //variabel data merupakan pemilihan data proyek berdasarkan id yg dipilih
        $data['proyek'] = $proyekModel->find($id);
        return view('KelolaDataProyek/EditKelolaDataProyek', $data);
    }

    // function untuk menampilkan halaman tambah data proyek
    public function tambahProyek()
    {
        $userModel = new UserModel();
        $data['userPJ'] = $userModel->getPJProyek();
        return view('KelolaDataProyek/TambahKelolaDataProyek', $data);
    }

    //function untuk menambahkan sebuah proyek
    public function tambahDataProyek()
    {
        //validasi
        helper(['form']);
        $rules = [
            'nama_proyek'          => 'required',
            'document_title'          => 'required',
            'kategori_document'         => 'required',
            'deparment'      => 'required',
            'industri'  => 'required'
        ];
        //validasi jika semua lolos validasi
        if($this->validate($rules)){
            //variabel array berisi data yg di inputkan dari halaman tambah data proyek
            $tz = 'Asia/Jakarta';
            $dt = new DateTime("now", new DateTimeZone($tz));
            $timestamp = $dt->format('Y-m-d G:i:s');
            $data = [
                'nama_proyek'     => $this->request->getVar('nama_proyek'),
                'document_title'     => $this->request->getVar('document_title'),
                'kategori_document'    => $this->request->getVar('kategori_document'),
                'deparment'    => $this->request->getVar('deparment'),
                'created'    => $timestamp,
                'ended'    => $this->request->getVar('ended'),
                'pj_proyek'    => $this->request->getVar('pj_proyek'),
                'industri'    => $this->request->getVar('industri'),
            ];
            // print_r($data);exit();
            $document1 = $this->request->getFile('document1');
            $document2 = $this->request->getFile('document2');
            $document3 = $this->request->getFile('document3');
            $keterangan1 = $this->request->getVar('keterangan1');
            $keterangan2 = $this->request->getVar('keterangan2');
            $keterangan3 = $this->request->getVar('keterangan3');
            $file1 = $document1->getRandomName();
            $file2 = $document2->getRandomName();
            $file3 = $document3->getRandomName();
            $db = db_connect('default');
            $proyekModel = new ProyekModel();
            $proyekModel->insertData($data);
            
            //variabel array document merupakan data yg akan di insert ke dalam table file
            $document = [
                [
                    'proyek_id' => $proyekModel->insertID(), 
                    'nama_file' => $file1,
                    'keterangan' => $keterangan1
                ],
                [
                    'proyek_id' => $proyekModel->insertID(), 
                    'nama_file' => $file2,
                    'keterangan' => $keterangan2
                ],
                [
                    'proyek_id' => $proyekModel->insertID(),
                    'nama_file' => $file3,
                    'keterangan' => $keterangan3
                ]
            ];

            $fileModel = new FileModel();
            $fileModel->insertBatch($document);
            //move merupakan pemindahan file yg di upload kedalam aplikasi web data center
            $document1->move('Uploads/', $file1);
            if ($document2->isValid()) {
                $document2->move('Uploads/', $file2);
            }
            if ($document3->isValid()) {
                $document3->move('Uploads/', $file3);
            }
            session()->setFlashdata('success', 'Proyek berhasil ditambahkan.');
            return redirect()->to('kelola-data-proyek');
        }else{
            //validasi kondisi ketika tidak masuk validasi
            $data['validation'] = $this->validator;
            $proyekModel = new ProyekModel();
            $data['proyek'] = $proyekModel->getAll();
            echo view('KelolaDataProyek/HomeKelolaDataProyek', $data);
        }
    }

    //function untuk update data proyek
    public function editProyek($id)
    {

        // validasi
        helper(['form']);
        $rules = [
            'nama_proyek'          => 'required',
            'document_title'          => 'required',
            'kategori_document'         => 'required',
            'deparment'      => 'required',
            'industri'  => 'required'
        ];
        $password = $this->request->getVar('confirmpassword');
        if($this->validate($rules)){
            // array data untuk inputan data yg akan di update
            $tz = 'Asia/Jakarta';
            $dt = new DateTime("now", new DateTimeZone($tz));
            $timestamp = $dt->format('Y-m-d');
            $data = [
                'nama_proyek'     => $this->request->getVar('nama_proyek'),
                'document_title'     => $this->request->getVar('document_title'),
                'kategori_document'    => $this->request->getVar('kategori_document'),
                'deparment'    => $this->request->getVar('deparment'),
                'industri'    => $this->request->getVar('industri'),
                'ended' => $this->request->getVar('kategori_document') == 'Finish' && $this->request->getVar('ended') == '0000-00-00' ? $timestamp : $this->request->getVar('ended')
            ];
            // print_r($data);exit();
            $proyekModel = new ProyekModel();
            $proyekModel->updateProyek($id, $data);
            session()->setFlashdata('success', 'Proyek berhasil diupdate.');
            return redirect()->to('kelola-data-proyek');
        }else{
            $data['validation'] = $this->validator;
            $proyekModel = new ProyekModel();
            $data['proyek'] = $proyekModel->find($id);
            echo view('KelolaDataProyek/EditKelolaDataProyek', $data);
        }
    }
    // function untuk menampilkan halaman edit dokumen
    public function editViewDocument($id)
    {
        $fileModel = new FileModel();
        $data['fileProyek'] = $fileModel->viewDoc($id);
        return view('KelolaDataProyek/EditDokumen', $data);
    }
    // functio untuk menghapus proyek
    public function deleteProyek($id)
    {
        $proyekModel = new ProyekModel();
        $proyek = $proyekModel->find($id);
        $proyekModel->deleteProyek($id);
        session()->setFlashdata('success', 'Proyek berhasil dihapus.');
        return redirect()->to(base_url('kelola-data-proyek'));
    }

    //function untuk ganti dokumen 1
    public function gantiDokumen1($id)
    {
        $fileModel = new FileModel();
        $document1 = $this->request->getFile('document1');
        $file1 = $document1->getRandomName();
        $id_proyek = $this->request->getVar('id_proyek');
        $data = [
            'nama_file'     => $file1,
        ];
        // print_r($id);exit();
        $document1->move('Uploads/', $file1);
        $fileModel->changeDocument1($id, $data);
        session()->setFlashdata('success', 'Dokumen berhasil diedit.');
        return redirect()->to(base_url('edit-dokumen/'.$id_proyek));
    }

    public function gantiDokumen2($id)
    {
        $fileModel = new FileModel();
        $document2 = $this->request->getFile('document2');
        $file2 = $document2->getRandomName();
        $id_proyek = $this->request->getVar('id_proyek');
        $data = [
            'nama_file'     => $file2,
        ];
        // print_r($file2);exit();
        $document2->move('Uploads/', $file2);
        $fileModel->changeDocument1($id, $data);
        session()->setFlashdata('success', 'Dokumen berhasil diedit.');
        return redirect()->to(base_url('edit-dokumen/'.$id_proyek));
    }

    public function gantiDokumen3($id)
    {
        $fileModel = new FileModel();
        $document3 = $this->request->getFile('document3');
        $file3 = $document3->getRandomName();
        $id_proyek = $this->request->getVar('id_proyek');
        $data = [
            'nama_file'     => $file3,
        ];
        // print_r($id);exit();
        $document3->move('Uploads/', $file3);
        $fileModel->changeDocument1($id, $data);
        session()->setFlashdata('success', 'Dokumen berhasil diedit.');
        return redirect()->to(base_url('edit-dokumen/'.$id_proyek));
    }

    //function untuk ganti keterangan 1
    public function gantiKeterangan1($id)
    {
        $fileModel = new FileModel();
        $keterangan1 = $this->request->getVar('keterangan1');
        $id_proyek = $this->request->getVar('id_proyek');
        $data = [
            'keterangan'     => $keterangan1,
        ];
        $fileModel->changeDocument1($id, $data);
        session()->setFlashdata('success', 'Dokumen berhasil diedit.');
        return redirect()->to(base_url('edit-dokumen/'.$id_proyek));
    }
    public function gantiKeterangan2($id)
    {
        $fileModel = new FileModel();
        $keterangan2 = $this->request->getVar('keterangan2');
        $id_proyek = $this->request->getVar('id_proyek');
        $data = [
            'keterangan'     => $keterangan2,
        ];
        $fileModel->changeDocument1($id, $data);
        session()->setFlashdata('success', 'Dokumen berhasil diedit.');
        return redirect()->to(base_url('edit-dokumen/'.$id_proyek));
    }

    public function gantiKeterangan3($id)
    {
        $fileModel = new FileModel();
        $keterangan3 = $this->request->getVar('keterangan3');
        $id_proyek = $this->request->getVar('id_proyek');
        $data = [
            'keterangan'     => $keterangan3,
        ];
        $fileModel->changeDocument1($id, $data);
        session()->setFlashdata('success', 'Dokumen berhasil diedit.');
        return redirect()->to(base_url('edit-dokumen/'.$id_proyek));
    }

    public function exportExcel()
    {
        $model = new ProyekModel();
        $dataModel = $model->getAll();

        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Nama Proyek')
                    ->setCellValue('B1', 'Document Title')
                    ->setCellValue('C1', 'Kategori Document')
                    ->setCellValue('D1', 'Department')
                    ->setCellValue('E1', 'Tanggal Masuk Proyek')
                    ->setCellValue('F1', 'Tempat Proyek');
        
        $column = 2;
        // tulis data mobil ke cell
        foreach($dataModel as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $data['nama_proyek'])
                        ->setCellValue('B' . $column, $data['document_title'])
                        ->setCellValue('C' . $column, $data['kategori_document'])
                        ->setCellValue('D' . $column, $data['deparment'])
                        ->setCellValue('E' . $column, $data['created'])
                        ->setCellValue('F' . $column, $data['industri']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Laporan Proyek';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function exportExcelSearch()
    {
                // Menerima kriteria pencarian dari form
        $nama_proyek = $this->request->getPost('nama_proyek');
        $document_title = $this->request->getPost('document_title');
        $kategori_document = $this->request->getPost('kategori_document');
        $deparment = $this->request->getPost('deparment');
        $startdate = $this->request->getPost('startdate');
        $enddate = $this->request->getPost('enddate');
        $industri = $this->request->getPost('industri');

        // Membuat instance model
        $model = new ProyekModel();
        if ($startdate == null || $enddate == "null") {
            $startdate = "";
            $enddate = "";
        }
        // Mengambil data berdasarkan kriteria pencarian
        $dataModel = $model->getSearch($nama_proyek, $document_title, $kategori_document, $deparment, $startdate, $enddate, $industri);

        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Nama Proyek')
                    ->setCellValue('B1', 'Document Title')
                    ->setCellValue('C1', 'Kategori Document')
                    ->setCellValue('D1', 'Department')
                    ->setCellValue('E1', 'Tanggal Masuk Proyek')
                    ->setCellValue('F1', 'Tempat Proyek');
        
        $column = 2;
        // tulis data mobil ke cell
        foreach($dataModel as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $data['nama_proyek'])
                        ->setCellValue('B' . $column, $data['document_title'])
                        ->setCellValue('C' . $column, $data['kategori_document'])
                        ->setCellValue('D' . $column, $data['deparment'])
                        ->setCellValue('E' . $column, $data['created'])
                        ->setCellValue('F' . $column, $data['industri']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Laporan Proyek';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        // session()->setFlashdata('success', 'Export Excel Berhahasil.');
        // return redirect()->to(base_url('kelola-data-proyek'));
    }

    public function exportPDF()
    {
        $mpdf = new \Mpdf\Mpdf();
        $proyekModel = new ProyekModel();
        //variabel data merupakan semua data yang ada pada tabel proyek
        $data['proyek'] = $proyekModel->getAll();
		$html = view('KelolaDataProyek/ExportPDF', $data);
        // return view('KelolaDataProyek/ExportPDF', $data);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('Laporan Data Proyek.pdf','I');
    }

    public function searchExportPDF()
    {
        // Mengambil data dari POST
        $nama_proyek = $this->request->getPost('nama_proyek');
        $document_title = $this->request->getPost('document_title');
        $kategori_document = $this->request->getPost('kategori_document');
        $departmen = $this->request->getPost('deparment');
        $startdate = $this->request->getPost('startdate');
        $enddate = $this->request->getPost('enddate');
        $industri = $this->request->getPost('industri');

        // Membuat instance model
        $model = new ProyekModel();
        $mpdf = new \Mpdf\Mpdf();
        // Mengambil data berdasarkan kriteria pencarian
        $data['proyek'] = $model->getSearch($nama_proyek, $document_title, $kategori_document, $departmen, $startdate, $enddate, $industri);

        // Generate PDF menggunakan mPDF
        $pdfFilePath = FCPATH . 'pdf_output.pdf'; // Lokasi penyimpanan file PDF

        // Konfigurasi mPDF
        $pdfConfig = [
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
        ];

        // Load view yang akan di-render ke PDF
        // $html = $this->load->view('KelolaDataProyek/SearchExportPDF', $data, true);
        $html = view('KelolaDataProyek/ExportPDF', $data);

		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('Laporan Data Proyek.pdf','I');
    }
}
