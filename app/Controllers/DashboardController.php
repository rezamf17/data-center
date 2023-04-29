<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();
        // echo "Hello : ".$session->get('name');
        $data['sessionName'] = $session->get('name');
        return view('Dashboard/HomeDashboard', $data);
    }
}
