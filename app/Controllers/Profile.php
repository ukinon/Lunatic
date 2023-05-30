<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Profile extends BaseController
{

    protected $session;
    protected $data; 
    protected $users;

    public function __construct(){
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
        $this->users = new UsersModel();
    }

    public function index()
    {
        $this->data['page_title'] = "Profile";
        $this->data["data"] = $this->users->select('*')->where(['username' => session('username')])->first();
        echo view('templates/header', $this->data);
        echo view('store/profile-view', $this->data);
        echo view('templates/footer');
    }

    public function update_profile(){

        if (!$this->validate([
            'image_avatar' => [
                'rules' => 'mime_in[image_avatar,image/jpg,image/jpeg,image/gif,image/png]|',
                'errors' => [
                    'mime_in' => 'File Extention Must Be jpg, jpeg, gif, png',
                ]
                ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $dataImage = $this->request->getFile('image_avatar');
		$fileName = $dataImage->getRandomName();

        
        if(is_uploaded_file($this->request->getFile('image_avatar'))){
            
        $post =     [
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'birth_date' => $this->request->getPost('birth_date'),
            'imagePath' => "assets/content/users/$fileName"
        ];    
        session()->set($post);
        $dataImage->move('assets/content/users/', $fileName);
        }else{
            
            $post =     [
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'birth_date' => $this->request->getPost('birth_date'),
        ];    
        session()->set($post);
        }
        $this->users->where(['id' => $this->request->getPost('id')])->set($post)->update();
        return redirect()->back();  
    }
}