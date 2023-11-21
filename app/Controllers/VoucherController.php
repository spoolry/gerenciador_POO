<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Voucher;
use App\Models\VoucherModel;
use App\Services\VoucherService;
use CodeIgniter\Config\Factories;

class VoucherController extends BaseController
{
    private $voucherService;
    private $voucherModel;


    public function __construct()
    {
        $this->voucherService = Factories::class(VoucherService::class);
        $this->voucherModel = Factories::models(VoucherModel::class);
    }

    public function showVoucher()
    {
        $id = session('id');

        $dataView = ['vouchers' => $this->voucherService->getVoucher($id)];
        
        if ($data = $this->request->getPost()) {

            $voucher = new VoucherModel();

            $voucher = $this->voucherService->getVoucher($data['id']);

            $voucher->fill($data);
            
            $this->voucherService->tryUpdate($voucher);
            return redirect()->to('/dashboard');
        } else {
            return view('vouchers', $dataView);
        }
    }

    public function confirmed($data)
    {
        $data = [
            'user_id' => session('id'),
            'event_id' => $data,
        ];

        $this->voucherService->getPresence($data);

        return view('vouchers', $data);
    }
}
