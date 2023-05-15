<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StockModel;

class Store extends BaseController
{

    protected $session;
    protected $data; 

    protected $stock_model;

    public function __construct(){
        $this->stock_model = new StockModel();
        $this->data['session'] = $this->session;
        }

    public function index()
    {
        $this->data['page_title'] = "Store";
        $this->data['list'] = $this->stock_model->select('*')->get()->getResult();
        echo view('templates/header', $this->data);
        echo view('store/store-view.php', $this->data);
        echo view('templates/footer');
    }
    }
