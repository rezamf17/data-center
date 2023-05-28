<?php

namespace App\Controllers;
use App\Models\ProyekModel;

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
            'document'         => 'required',
            'deparment'      => 'required',
            'tipe'  => 'required',
            'industri'  => 'required'
        ];
        if($this->validate($rules)){
            $data = [
                'nama_proyek'     => $this->request->getVar('nama_proyek'),
                'document_title'     => $this->request->getVar('document_title'),
                'kategori_document'    => $this->request->getVar('kategori_document'),
                'document' => $this->request->getVar('document'),
                'deparment'    => $this->request->getVar('deparment'),
                'tipe'    => $this->request->getVar('tipe'),
                'industri'    => $this->request->getVar('industri'),
            ];
            // print_r($data);exit();
            $proyekModel = new ProyekModel();
            $proyekModel->insertData($data);
            session()->setFlashdata('success', 'Proyek berhasil ditambahkan.');
            return redirect()->to('register-proyek');
        }else{
            $data['validation'] = $this->validator;
            $proyekModel = new ProyekModel();
            $data['proyek'] = $proyekModel->getAll();
            echo view('RegisterProyek/HomeRegisterProyek', $data);
        }
    }
}
