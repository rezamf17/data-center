<?php

namespace App\Controllers;
use App\Models\ProyekModel;
use App\Models\FileModel;

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

    public function postRegisterProyek()
    {
        helper(['form']);
        $rules = [
            'nama_proyek'          => 'required',
            'document_title'          => 'required',
            'kategori_document'         => 'required',
            'deparment'      => 'required',
            'tipe'  => 'required',
            'industri'  => 'required'
        ];
        if($this->validate($rules)){
            $data = [
                'nama_proyek'     => $this->request->getVar('nama_proyek'),
                'document_title'     => $this->request->getVar('document_title'),
                'kategori_document'    => $this->request->getVar('kategori_document'),
                'deparment'    => $this->request->getVar('deparment'),
                'tipe'    => $this->request->getVar('tipe'),
                'industri'    => $this->request->getVar('industri'),
            ];
            $document1 = $this->request->getFile('document1');
            $document2 = $this->request->getFile('document2');
            $document3 = $this->request->getFile('document3');
            $file1 = $document1->getRandomName();
            $file2 = $document2->getRandomName();
            $file3 = $document3->getRandomName();
            $db = db_connect('default');
            $proyekModel = new ProyekModel();
            $proyekModel->insertData($data);
            $document = [
                [
                    'proyek_id' => $proyekModel->insertID(), 
                    'nama_file' => $file1
                ],
                [
                    'proyek_id' => $proyekModel->insertID(), 
                    'nama_file' => $file2
                ],
                [
                    'proyek_id' => $proyekModel->insertID(),
                    'nama_file' => $file3
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
        // print_r($view);exit();
        return view('RegisterProyek/LihatDokumen', $data);
    }
}
