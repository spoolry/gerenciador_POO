<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Voucher;
use App\Models\VoucherModel;
use App\Services\VoucherService;
use CodeIgniter\Config\Factories;

class VoucherController extends BaseController
{
    private $voucherServices;



    public function __construct()
    {
        $this->voucherServices = Factories::class(VoucherService::class);
    }

    public function showVoucher()
    {
        $data['vouchers'] = $this->voucherServices->getVoucher();
        return view('vouchers', $data);
    }

    public function confirmed($data)
    {
        $this->request->getPost($data);

        $data[
            'event_id' => $data,
            'user_id' => session('id'),
        ];
         $this->voucherServices->getPresence($data);

        return view('vouchers', session('id'));
    }
}
