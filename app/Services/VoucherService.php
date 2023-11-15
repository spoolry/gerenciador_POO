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

    public function getVoucher()
    {
        return $this->voucherModel->getVouchersWithRelations();
    }
    public function getPresence($data)
    {
        return $this->voucherModel->confirmedPresence($data);
    }

}
