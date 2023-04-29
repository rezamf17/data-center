<?php

namespace App\Controllers;

class AkunPegawaiController extends BaseController
{
    public function index()
    {
        return view('AkunPegawai/HomeAkunPegawai');
    }

    public function tambahPegawai()
    {
        return view('AkunPegawai/TambahAkunPegawai');
    }
}
