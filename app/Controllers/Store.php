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

    public function update_stock(){
        $addStock = $this->request->getPost('stock');
        $post =     [
            'name' => $this->request->getPost('item_name'),
            'price' => $this->request->getPost('price'),
            'desc' => $this->request->getPost('desc')
        ];
        $this->stock_model->where(['id' => $this->request->getPost('id')])->set($post)->update();
        $this->stock_model->where(['id' => $this->request->getPost('id')])->set('stock', "stock + $addStock", FALSE)->update();
        return redirect()->back();  
    }
    }
