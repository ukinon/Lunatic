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
            'image_avatar' => [
                'rules' => 'uploaded[image_avatar]|mime_in[image_avatar,image/jpg,image/jpeg,image/gif,image/png]|',
                'errors' => [
                    'uploaded' => 'No Uploaded Files',
                    'mime_in' => 'File Extention Must Be jpg, jpeg, gif, png',
                ]
                ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $dataImage = $this->request->getFile('image_avatar');
		$fileName = $dataImage->getRandomName();
        $users = new UsersModel();
        $users->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'birth_date' => $this->request->getVar('birth_date'),
            'user_type' => 'user',
            'imagePath' => "assets/content/users/$fileName"
        ]);
        $dataImage->move('assets/content/users/', $fileName);
        return redirect()->to('/login');
    }
}