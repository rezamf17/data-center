<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();

        // Cek apakah pengguna sudah login dan memiliki sesi
        if ($session->get('isLoggedIn') == 1) {
            // Pengguna sudah login, mungkin Anda ingin mengarahkan mereka ke halaman lain
            return redirect()->to('dashboard');
        }
    
        // Jika pengguna belum login, tampilkan halaman HomeViews
        return view('Home/HomeViews');
    }
}
