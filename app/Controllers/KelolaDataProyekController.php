<?php

namespace App\Controllers;
use App\Models\ProyekModel;

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

    public function deleteProyek($id)
    {
        $proyekModel = new ProyekModel();
        $proyek = $proyekModel->find($id);
        $proyekModel->deleteProyek($id);
        session()->setFlashdata('success', 'Proyek berhasil dihapus.');
        return redirect()->to(base_url('kelola-data-proyek'));
    }
}
