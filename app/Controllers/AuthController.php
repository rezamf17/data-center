<?php

namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function loginProcess()
    {
        $session = session();
        $userModel = new UserModel();
        $nip = $this->request->getVar('nip');
        $password = $this->request->getVar('password');
        $data = $userModel->where('nip', $nip)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'role' => $data['role'],
                    'nip' => $data['nip'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            
            }else{
                $session->setFlashdata('msg', 'NIP atau password salah!');
                return redirect()->to('/');
            }
        }else{
            $session->setFlashdata('msg', 'NIP atau password salah!');
            return redirect()->to('/');
        }
    }

    public function profileSession ()
    {
        $session = session();
        echo "Hello : ".$session->get('name');
    }

    public function doLogout ()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
