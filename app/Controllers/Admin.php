<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CourierModel;
use App\Models\PaymentModel;
use App\Models\TransactionModel;
use App\Models\UsersModel;
use App\Models\StockModel;
use Dompdf\Dompdf;

class Admin extends BaseController
{
    protected $data;
    protected $transaction;
    protected $courier;
    protected $payment;
    protected $stock;
    protected $user;

    public function __construct()
    {
        $this->transaction = new TransactionModel();
        $this->stock = new StockModel();
        $this->courier = new CourierModel();
        $this->payment = new PaymentModel();
        $this->user = new UsersModel();
    }

    public function display()
    {
        $arrayComplete = array('status' => 'paid');
        $this->data["data"] = $this->transaction->select('*')->orderBy("created_at", "DESC")->where($arrayComplete)->get()->getResult();
        echo view('/templates/header', $this->data);
        echo view('/store/admin-view.php', $this->data);
        echo view('/templates/footer');
    }
}
