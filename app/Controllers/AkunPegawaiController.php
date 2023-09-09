<?php

namespace App\Controllers;

use App\Models\UserModel;

class AkunPegawaiController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->getAll();

        return view('AkunPegawai/HomeAkunPegawai', $data);
    }

    public function tambahPegawai()
    {
        return view('AkunPegawai/TambahAkunPegawai');
    }

    public function searchAkun()
    {
        // Menerima kriteria pencarian dari form
        $role = $this->request->getPost('role');

        // Membuat instance model
        $model = new UserModel();

        // Mengambil data berdasarkan kriteria pencarian
        $data['users'] = $model->getSearch($role);
        $data['usersView'] = ['role'=>$role];
        // print_r($startdate);exit();
        // Menampilkan hasil pencarian ke tampilan
        return view('AkunPegawai/SearchHomeAkunPegawai', $data);
    }

    public function postTambahPegawai()
    {
        helper(['form']);
        //validasi input data pada form tambah akun pegawai
        $rules = [
            'nip'          => 'required|min_length[10]|max_length[13]|is_unique[user.nip,id,{nip}]',
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[user.email,id,{nip}]',
            'nomor_hp'         => 'required|min_length[4]|max_length[100]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
        $password = $this->request->getVar('confirmpassword');

        // Jika validasi sesuai dengan $rules.
        if ($this->validate($rules)) {
            // Tampung semua input tambah user di variabel array of object $data
            $data = [
                'nip'     => $this->request->getVar('nip'),
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($password, PASSWORD_DEFAULT), //hasshing password
                'nomor_hp'    => $this->request->getVar('nomor_hp'),
                'role'    => $this->request->getVar('role'),
                'status'    => $this->request->getVar('status'),
            ];

            // Memanggil class UseModel
            $userModel = new UserModel();

            // Insert data yang berada di variabel $data ke tabel user di database melalui model UserModel
            $userModel->insertData($data);

            // membuat session success untuk memberitahu kepada user bahwa insert data berhasil dilakukan
            session()->setFlashdata('success', 'User berhasil ditambahkan.');

            // Mengarahkan ulang ke route akun-pegawai dengan membawa session success
            return redirect()->to('akun-pegawai');
        } else {
            $data['validation'] = $this->validator;
            $userModel = new UserModel();
            $data['users'] = $userModel->getAll();
            echo view('AkunPegawai/HomeAkunPegawai', $data);
        }
    }

    public function editPegawai($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);
        return view('AkunPegawai/EditAkunPegawai', ['user' => $user]);
    }

    public function postEditPegawai($id)
    {
        helper(['form']);
        $rules = [
            'nip'          => 'required|min_length[10]|max_length[13]',
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email',
            'nomor_hp'         => 'required|min_length[4]|max_length[100]',
            'password'      => 'min_length[0]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];

        $password = $this->request->getVar('confirmpassword');
        if ($this->validate($rules)) {
            if (!empty($password)) {
                $data = [
                    'nip'     => $this->request->getVar('nip'),
                    'name'     => $this->request->getVar('name'),
                    'email'    => $this->request->getVar('email'),
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'nomor_hp'    => $this->request->getVar('nomor_hp'),
                    'role'    => $this->request->getVar('role'),
                    'status'    => $this->request->getVar('status'),
                ];
            } else {
                $data = [
                    'nip'     => $this->request->getVar('nip'),
                    'name'     => $this->request->getVar('name'),
                    'email'    => $this->request->getVar('email'),
                    'nomor_hp'    => $this->request->getVar('nomor_hp'),
                    'role'    => $this->request->getVar('role'),
                    'status'    => $this->request->getVar('status'),
                ];
            }
            $userModel = new UserModel();
            $userModel->updateUser($id, $data);
            session()->setFlashdata('success', 'User berhasil diupdate.');
            return redirect()->to('akun-pegawai');
        } else {
            $data['validation'] = $this->validator;
            $userModel = new UserModel();
            $data['users'] = $userModel->getAll();
            echo view('AkunPegawai/HomeAkunPegawai', $data);
        }
    }

    public function postDeletePegawai($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);
        $userModel->deleteUser($id);
        session()->setFlashdata('success', 'User berhasil dihapus.');
        return redirect()->to(base_url('akun-pegawai'));
    }
}
