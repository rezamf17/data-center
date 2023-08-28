<?php

namespace App\Controllers;
use App\Models\ProyekModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();
        // echo "Hello : ".$session->get('name');
        $data['sessionName'] = $session->get('name');
        $model = new ProyekModel();
        $data['total'] = $model->totalProyek();
        $data['totalOnGoing'] = $model->totalProyekOnGoing();
        $data['totalHold'] = $model->totalProyekHold();
        $data['totalFinish'] = $model->totalProyekFinish();
        return view('Dashboard/HomeDashboard', $data);
    }
}
