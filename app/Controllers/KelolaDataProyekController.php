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

    public function tambahProyek()
    {
        return view('KelolaDataProyek/TambahKelolaDataProyek');
    }

    public function tambahDataProyek()
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
            return redirect()->to('kelola-data-proyek');
        }else{
            $data['validation'] = $this->validator;
            $proyekModel = new ProyekModel();
            $data['proyek'] = $proyekModel->getAll();
            echo view('KelolaDataProyek/HomeKelolaDataProyek', $data);
        }
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
}
