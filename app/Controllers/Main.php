<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{

    protected $session;
    protected $data; 

    public function index()
    {
        $this->data['page_title'] = "Home";
        echo view('templates/header', $this->data);
        echo view('store/home', $this->data);
        echo view('templates/footer');
    }
    }
