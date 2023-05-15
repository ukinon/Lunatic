<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Register extends BaseController
{

    protected $session;
    protected $data;

    public function __construct(){
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index()
    {
        $this->data['page_title'] = "Register";
        echo view('templates/header', $this->data);
        echo view('store/register-view', $this->data);
        echo view('templates/footer');
    }

    public function process()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} Required',
                    'min_length' => '{field} 4 Characters Min',
                    'max_length' => '{field} 20 Characters Max',
                    'is_unique' => 'Username has been used'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Required',
                    'min_length' => '{field} 4 Characters Min',
                    'max_length' => '{field} 50 Characters Max',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Password Not Same',
                ]
            ],
            'name' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Required',
                    'min_length' => '{field} 4 Characters Min',
                    'max_length' => '{field} 100 Characters Max',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $users = new UsersModel();
        $users->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'birth_date' => $this->request->getVar('birth_date')
        ]);
        return redirect()->to('/login');
    }
}