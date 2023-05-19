<?php

namespace App\Controllers;

class RegisterProyekController extends BaseController
{
    public function index()
    {
        return view('RegisterProyek/HomeRegisterProyek');
    }

    public function tambahRegisterProyek()
    {
        return view('RegisterProyek/TambahRegisterProyek');
    }
}
