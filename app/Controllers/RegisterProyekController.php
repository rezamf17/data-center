<?php

namespace App\Controllers;
use App\Models\ProyekModel;
use App\Models\FileModel;
use DateTime;
use DateTimeZone;

class RegisterProyekController extends BaseController
{
    public function index()
    {
        $proyekModel = new ProyekModel();
        $data['proyek'] = $proyekModel->getAll();
        return view('RegisterProyek/HomeRegisterProyek', $data);
    }

    public function tambahRegisterProyek()
    {
        return view('RegisterProyek/TambahRegisterProyek');
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
        return view('RegisterProyek/SearchRegisterProyek', $data);
    }

    public function postRegisterProyek()
    {
        helper(['form']);
        $rules = [
            'nama_proyek'          => 'required',
            'document_title'          => 'required',
            'kategori_document'         => 'required',
            'deparment'      => 'required',
            'industri'  => 'required'
        ];
        if($this->validate($rules)){
            $tz = 'Asia/Jakarta';
            $dt = new DateTime("now", new DateTimeZone($tz));
            $timestamp = $dt->format('Y-m-d G:i:s');
            $data = [
                'nama_proyek'     => $this->request->getVar('nama_proyek'),
                'document_title'     => $this->request->getVar('document_title'),
                'kategori_document'    => $this->request->getVar('kategori_document'),
                'deparment'    => $this->request->getVar('deparment'),
                'created'    => $timestamp,
                'industri'    => $this->request->getVar('industri'),
            ];
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
            $document1->move('Uploads/', $file1);
            if ($document2->isValid()) {
                $document2->move('Uploads/', $file2);
            }
            if ($document3->isValid()) {
                $document3->move('Uploads/', $file3);
            }
            session()->setFlashdata('success', 'Proyek berhasil ditambahkan.');
            return redirect()->to('register-proyek');
        }else{
            $data['validation'] = $this->validator;
            $proyekModel = new ProyekModel();
            $data['proyek'] = $proyekModel->getAll();
            echo view('RegisterProyek/HomeRegisterProyek', $data);
        }
    }

    public function lihatDocument($id)
    {
        $fileModel = new FileModel();
        $data['fileProyek'] = $fileModel->viewDoc($id);
        $data['file'] = $fileModel->viewDocMember($id);
        // print_r($view);exit();
        return view('RegisterProyek/LihatDokumen', $data);
    }
}
