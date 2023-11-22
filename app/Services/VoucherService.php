<?php

namespace App\Services;

use App\Entities\Voucher;
use App\Models\VoucherModel;
use CodeIgniter\Config\Factories;
use CodeIgniter\Validation\Validation;
use CodeIgniter\Database\RawSql;

class VoucherService
{
    protected $voucherModel;

    public function __construct()
    {
        $this->voucherModel = Factories::models(VoucherModel::class);
    }

    public function getVoucher($id)
    {
        return $this->voucherModel->getId($id);
    }
    public function getPresence($data)
    {
        return $this->voucherModel->confirmedPresence($data);
    }
    

}
