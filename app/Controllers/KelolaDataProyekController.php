<?php

namespace App\Controllers;
use App\Models\ProyekModel;
use App\Models\FileModel;

class KelolaDataProyekController extends BaseController
{
    public function index()
    {
        $proyekModel = new ProyekModel();
        $data['proyek'] = $proyekModel->getAll();
        return view('KelolaDataProyek/HomeKelolaDataProyek', $data);
    }

    public function editView($id)
    {
        $proyekModel = new ProyekModel();
        $data['proyek'] = $proyekModel->find($id);
        return view('KelolaDataProyek/EditKelolaDataProyek', $data);
    }

    public function editProyek($id)
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
        $password = $this->request->getVar('confirmpassword');
        if($this->validate($rules)){
            $data = [
                'nama_proyek'     => $this->request->getVar('nama_proyek'),
                'document_title'     => $this->request->getVar('document_title'),
                'kategori_document'    => $this->request->getVar('kategori_document'),
                'deparment'    => $this->request->getVar('deparment'),
                'tipe'    => $this->request->getVar('tipe'),
                'industri'    => $this->request->getVar('industri'),
            ];
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

    public function editViewDocument($id)
    {
        $fileModel = new FileModel();
        $data['fileProyek'] = $fileModel->viewDoc($id);
        return view('KelolaDataProyek/EditDokumen', $data);
    }

    public function deleteProyek($id)
    {
        $proyekModel = new ProyekModel();
        $proyek = $proyekModel->find($id);
        $proyekModel->deleteProyek($id);
        session()->setFlashdata('success', 'Proyek berhasil dihapus.');
        return redirect()->to(base_url('kelola-data-proyek'));
    }

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
        // print_r($id);exit();
        $document2->move('Uploads/', $file2);
        $fileModel->changeDocument1($id, $data);
        session()->setFlashdata('success', 'Dokumen berhasil diedit.');
        return redirect()->to(base_url('edit-dokumen/'.$id_proyek));
    }
}
