<?php

namespace App\Services;

use App\Entities\Voucher;
use App\Models\VoucherModel;
use CodeIgniter\Config\Factories;
use CodeIgniter\Validation\Validation;

class VoucherService
{
    protected $voucherModel;

    public function __construct()
    {
        $this->voucherModel = Factories::models(VoucherModel::class);
    }

    public function showVoucher($event_id, $user_id)
    {
        $voucher = $this->voucherModel->getVoucher($event_id, $user_id);
    }
}
