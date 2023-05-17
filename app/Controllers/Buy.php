<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StockModel;
use App\Models\UsersModel;
use App\Models\PaymentModel;
use App\Models\CourierModel;
use App\Models\CommentsModel;

class Buy extends BaseController
{

    protected $session;
    protected $data; 

    protected $stock_model; 
    protected $users;
    protected $comments;
    protected $payment;
    protected $courier;

    public function __construct(){
        $this->stock_model = new StockModel();
        $this->users = new UsersModel();
        $this->comments = new CommentsModel();
        $this->courier = new CourierModel();
        $this->payment = new PaymentModel();
        $this->data['session'] = $this->session;
        }

    public function display($id='')
    {
        $this->data['page_title'] = "Buy";
        $qry = $this->stock_model->select('*')->where(['id'=>$id]);

        $this->data['data'] = $qry->first();
        $this->data['comments'] = $this->comments->where("clothes_id", $id)->orderBy('created_at', 'DESC')->findAll();
        $this->data['courier'] = $this->courier->findAll();
        $this->data['payment'] = $this->payment->findAll();
        echo view('templates/header', $this->data);
        echo view('store/buy-view.php', $this->data);
        echo view('store/comments-view.php', $this->data);
        echo view('templates/footer');
    }   

    public function AddComments()
    {
        $comments = new CommentsModel();
        $comments->insert([
            'user' => session("username"),
            'comment' => $this->request->getVar('comment'),
            'clothes_id' => $this->request->getVar('clothes_id')
        ]);
        return redirect()->back();
    }
    }