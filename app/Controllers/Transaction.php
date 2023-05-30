<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CourierModel;
use App\Models\PaymentModel;
use App\Models\TransactionModel;
use App\Models\StockModel;

class Transaction extends BaseController
{
    protected $data;
    protected $transaction;
    protected $courier;
    protected $payment;
    protected $stock;

    public function __construct()
    {
        $this->transaction = new TransactionModel();
        $this->stock = new StockModel();
        $this->courier = new CourierModel();
        $this->payment = new PaymentModel();
    }

    public function index()
    {
        $transaction = new TransactionModel();

        $transArr = $transaction->select('*')->orderBy('id', 'DESC')->limit(1)->first();

        $pay = $transArr['payment_method'];
        $cour = $transArr['delivery_courier'];

        $this->data["data"] = $this->transaction->select('*')->orderBy('id', 'DESC')->limit(1)->first();
        $this->data["courierArr"] = $this->courier->select('*')->where(['courier_name' => $cour])->first();
        $this->data["paymentArr"] = $this->payment->select('*')->where(['payment_method' => $pay])->first();
        echo view('/templates/header', $this->data);
        echo view('/store/transaction-view.php', $this->data);
        echo view('/templates/footer');
    }

    public function AddTransaction(){
        $payment = new PaymentModel();
        $courier = new CourierModel();

        $paymentMethod =  $this->request->getPost('payment_method');
        $courierName = $this->request->getPost('courier');

        $paymentAdmin = $payment->select('payment_method, admin_fee')->where([
            'payment_method' => $paymentMethod,
        ])->first();
        $courierPrice = $courier->select('courier_name, price')->where([
            'courier_name' => $courierName,
        ])->first();

        $pay = $paymentAdmin['admin_fee'];
        $cour = $courierPrice['price'];

        $arrayTransaction =[
            'item_name' => $this->request->getPost('item_name'),
            'size' => $this->request->getPost('size'),
            'payment_method' => $this->request->getPost('payment_method'),
            'delivery_courier' => $this->request->getPost('courier'),
            'status' => 'pending'
        ];

        $quantity = $this->request->getPost('quantity');
        $transactionSelect = $this->transaction->where($arrayTransaction)->select('*')->get()->getResult();
        $price = $this->request->getPost('price');

        if(count($transactionSelect)>0){
            $this->transaction->where($arrayTransaction)->set('quantity', "quantity + $quantity", false)->update();
            $this->transaction->where($arrayTransaction)->set('total_price', "total_price + $quantity * $price", false)->update();
        }else{

        $this->transaction->insert([
            'item_name' => $this->request->getPost('item_name'),
            'size' => $this->request->getPost('size'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
            'payment_method' => $this->request->getPost('payment_method'),
            'delivery_courier' => $this->request->getPost('courier'),
            'total_price' => $this->request->getPost('quantity')*$this->request->getPost('price')+$pay+$cour,
            'address' => session('address'),
            'user' => session('name'),
            'invoice_id' => random_string('alnum', 20)
        ]);
    }

        return redirect()->route('transactions');
    }

    public function updateStatus(){
        $stockQty = $this->request->getPost('quantity');
        $this->transaction->where(['id' => $this->request->getPost('id')])->set('status','paid')->update();
        $this->stock->where(['name' => $this->request->getPost('item_name')])->set('stock', "stock - $stockQty", FALSE )->update();
        return redirect()->to('/confirm');
    }

    public function updateCartStatus(){
        $cart_id = $this->request->getPost('cart_id');
        $inv_id =  random_string('alnum', 20);
$quantity = $this->request->getPost('cart_quantity');

        for($i=0; $i<sizeof($cart_id); $i++){
            $data_id = array('id' => $cart_id[$i]);
            $this->transaction->where(['id' => $data_id])->set('status','paid')->update();
            $this->transaction->where(['id' => $data_id])->set('invoice_id', "$inv_id")->update(); 
            $this->transaction->where(['id' => $data_id])->set('quantity', "$quantity[$i]")->update();   
        }
        $cart_name = $this->request->getPost('cart_name');
        $stockQty = $this->request->getPost('cart_quantity');
        for($i=0; $i<sizeof($cart_name); $i++){
            $data_name = array('name' => $cart_name[$i]);
            $stocks = $stockQty[$i];
            $this->stock->where(['name' => $data_name])->set('stock', "stock - $stocks", FALSE )->update();
        }

        return redirect()->back();
    }

    public function cartTransaction($id = '')
    {
        $transaction = new TransactionModel();

        $transArr = $transaction->select('*')->where(['id' => $id])->first();

        $pay = $transArr['payment_method'];
        $cour = $transArr['delivery_courier'];

        $this->data["data"] = $this->transaction->select('*')->orderBy('id', 'DESC')->limit(1)->first();
        $this->data["courierArr"] = $this->courier->select('*')->where(['courier_name' => $cour])->first();
        $this->data["paymentArr"] = $this->payment->select('*')->where(['payment_method' => $pay])->first();
        echo view('/templates/header', $this->data);
        echo view('/store/transaction-view.php', $this->data);
        echo view('/templates/footer');
    }
}
