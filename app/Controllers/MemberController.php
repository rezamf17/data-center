<?php

namespace App\Controllers;
use App\Models\ProyekModel;
use App\Models\MemberModel;
use App\Models\UserModel;

class MemberController extends BaseController
{
    public function index()
    {
        $memberModel = new MemberModel();
        $session = session();
        $username = $session->get('name');
        if ($session->get('role') !== 'SU') {
            $data['users'] = $memberModel->getData($username);
        }else{
            $data['users'] = $memberModel->getAllMembers();
        }
        // print_r($data);exit();
        return view('KelolaMember/HomeMember', $data);
    }

    public function addMember()
    {
        $proyekModel = new ProyekModel();
        $userModel = new UserModel();
        $session = session();
        $username = $session->get('name');
        $data['proyek'] = $proyekModel->dataPJProyek($username);
        $data['member'] = $userModel->getMemberProyek();
        return view('KelolaMember/TambahMember', $data);
    }

    public function postMember()
    {
        $data = [
            'id_proyek' => $this->request->getVar('id_proyek'),
            'id_user' => $this->request->getVar('id_user')
        ];
        $memberModel = new MemberModel();
        $memberModel->insertData($data);
        session()->setFlashdata('success', 'Member berhasil ditambahkan.');
        return redirect()->to('daftar-member');
    }

    public function deleteMember($id)
    {
        $memberModel = new MemberModel();
        $member = $memberModel->find($id);
        $memberModel->deleteMember($id);
        session()->setFlashdata('success', 'Member berhasil dihapus.');
        return redirect()->to(base_url('daftar-member'));
    }
}
