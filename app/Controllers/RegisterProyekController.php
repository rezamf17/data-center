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
}
