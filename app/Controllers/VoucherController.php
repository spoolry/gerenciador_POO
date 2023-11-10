<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VoucherModel;
use App\Services\VoucherService;
use CodeIgniter\Config\Factories;

class VoucherController extends BaseController
{
    private $voucherModel;
    private $voucherServices;

    public function __construct()
    {
        $this->voucherModel = Factories::models(VoucherModel::class);
        $this->voucherServices = Factories::class(VoucherService::class);
    }

    public function showVoucher()
    {
        $data['vouchers'] = $this->voucherServices->getVoucher();
        return view('vouchers', $data);
    }
}
