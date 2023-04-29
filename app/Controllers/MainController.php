<?php

namespace App\Controllers;

class MainController extends BaseController
{
    public function index()
    {
        $session = session();
        // echo "Hello : ".$session->get('name');
        $data['sessionName'] = $session->get('name');
        return view('main', $data);
    }
}
