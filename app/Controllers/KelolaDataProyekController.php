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
}
