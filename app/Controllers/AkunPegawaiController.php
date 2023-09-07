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

    public function postTambahPegawai()
    {
        helper(['form']);
        $rules = [
            'nip'          => 'required|min_length[10]|max_length[13]|is_unique[user.nip]',
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email',
            'nomor_hp'         => 'required|min_length[4]|max_length[100]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
        $password = $this->request->getVar('confirmpassword');
        if($this->validate($rules)){
            $data = [
                'nip'     => $this->request->getVar('nip'),
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'nomor_hp'    => $this->request->getVar('nomor_hp'),
                'role'    => $this->request->getVar('role'),
                'status'    => $this->request->getVar('status'),
            ];
            $userModel = new UserModel();
            $userModel->insertData($data);
            session()->setFlashdata('success', 'User berhasil ditambahkan.');
            return redirect()->to('akun-pegawai');
        }else{
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
        if($this->validate($rules)){
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
            }else{
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
        }else{
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
