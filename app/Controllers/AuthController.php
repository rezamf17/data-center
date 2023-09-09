<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function loginProcess()
    {
      // Mengambil instance session dan model user
      $session = session();
      $userModel = new UserModel();
  
      // Mengambil nilai NIP (Nomor Induk Pegawai) dan password dari form login
      $nip = $this->request->getVar('nip');
      $password = $this->request->getVar('password');
  
      // Mencari data pengguna berdasarkan NIP
      $data = $userModel->where('nip', $nip)->first();
  
      // Jika data pengguna dengan NIP tersebut ditemukan
      if($data){
          // Mengambil hashed password dari data pengguna
          $pass = $data['password'];
  
          // Memeriksa apakah password yang dimasukkan cocok dengan hashed password dalam database
          $authenticatePassword = password_verify($password, $pass);
          if($data['status'] !== 'Active'){
            // Menyimpan pesan flash (pesan yang akan ditampilkan sekali) ke session
            $session->setFlashdata('msg', 'User Tidak Aktif!'); 
            // Mengarahkan pengguna kembali ke halaman login
            return redirect()->to('/');
          }
          // Jika password cocok
          if($authenticatePassword){
              // Menyiapkan data sesi (session data) yang akan disimpan
              $ses_data = [
                  'id' => $data['id'],
                  'name' => $data['name'],
                  'role' => $data['role'],
                  'nip' => $data['nip'],
                  'isLoggedIn' => TRUE // Menandakan bahwa pengguna sudah login
              ];
  
              // Menyimpan data sesi ke session
              $session->set($ses_data);
  
              // Mengarahkan pengguna ke halaman dashboard setelah login berhasil
              return redirect()->to('/dashboard');
          
          // Jika password tidak cocok
          }else{
              // Menyimpan pesan flash (pesan yang akan ditampilkan sekali) ke session
              $session->setFlashdata('msg', 'NIP atau password salah!');
  
              // Mengarahkan pengguna kembali ke halaman login
              return redirect()->to('/');
          }
      }else{
          // Jika data pengguna dengan NIP tersebut tidak ditemukan
          $session->setFlashdata('msg', 'NIP atau password salah!');
  
          // Mengarahkan pengguna kembali ke halaman login
          return redirect()->to('/');
      }
    }

    public function profileSession()
    {
        $session = session();
        echo "Hello : " . $session->get('name');
    }

    public function doLogout()
    {
        $session = session();

        // Menghancurkan (menghapus) semua data sesi untuk meng-logout pengguna
        $session->destroy();

        // Mengarahkan pengguna kembali ke halaman utama atau halaman login
        return redirect()->to('/');
    }
}
