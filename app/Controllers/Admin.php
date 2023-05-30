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
        $this->data["data"] = $this->transaction->where($arrayComplete)->groupBy('invoice_id')->paginate(10, 'data');
        $this->data["pager"] = $this->transaction->pager;
        $this->data["number"] = nomor($this->request->getVar('page_data'), 10);
        echo view('/templates/header', $this->data);
        echo view('/store/admin-view.php', $this->data);
        echo view('/templates/footer');
    }

    public function addItem()
         {
            if (!$this->validate([
                'image1' => [
                    'rules' => 'uploaded[image1]|mime_in[image1,image/jpg,image/jpeg,image/gif,image/png]|',
                    'errors' => [
                        'uploaded' => 'No Uploaded Files',
                        'mime_in' => 'File Extention Must Be jpg, jpeg, gif, png',
                    ]
                    ],
                    'image2' => [
                        'rules' => 'uploaded[image2]|mime_in[image2,image/jpg,image/jpeg,image/gif,image/png]|',
                        'errors' => [
                            'uploaded' => 'No Uploaded Files',
                            'mime_in' => 'File Extention Must Be jpg, jpeg, gif, png',
                        ]
                        ],
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }else{
                session()->setFlashdata('success', 'Item Berhasil Ditambahkan');
            }

		$dataImage1 = $this->request->getFile('image1');
        $dataImage2 = $this->request->getFile('image2');
		$fileName1 = $dataImage1->getRandomName();
        $fileName2 = $dataImage2->getRandomName();
		$this->stock->insert([
			'image1' => "assets/content/display/$fileName1",
            'image2' => "assets/content/display/$fileName2",
			'name' => $this->request->getPost('ItemName'),
            'price' => $this->request->getPost('ItemPrice'),
            'desc' => $this->request->getPost('ItemDesc'),
            'stock' => $this->request->getPost('ItemStock')
        ]);
		$dataImage1->move('assets/content/display', $fileName1);
        $dataImage2->move('assets/content/display', $fileName2);
		return redirect()->to(base_url('admin/display/#addItem'));
    }
}
