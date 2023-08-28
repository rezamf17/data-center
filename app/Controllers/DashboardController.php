<?php

namespace App\Controllers;
use App\Models\ProyekModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();
        // echo "Hello : ".$session->get('name');
        $data['sessionName'] = $session->get('name');
        $model = new ProyekModel();
        $userModel = new UserModel();
        $data['total'] = $model->totalProyek();
        $data['totalOnGoing'] = $model->totalProyekOnGoing();
        $data['totalHold'] = $model->totalProyekHold();
        $data['totalFinish'] = $model->totalProyekFinish();
        $data['totalAkun'] = $userModel->totalAkun();
        $data['totalAkunAdmin'] = $userModel->totalAkunAdmin();
        $data['totalAkunPJProyek'] = $userModel->totalAkunPJProyek();
        $data['totalAkunMemberProyek'] = $userModel->totalAkunMemberProyek();
        $data['totalAkunPegawai'] = $userModel->totalAkunPegawai();
        return view('Dashboard/HomeDashboard', $data);
    }
}
