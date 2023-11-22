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
        $voucher = New VoucherModel();

        $data['vouchers'] = $voucher
            ->select('vouchers.*', 'events.name AS event_name', 'users.name AS user_name')
            ->join('events', 'events.id = vouchers.event_id', 'left')
            ->join('users', 'users.id = vouchers.user_id', 'left')
            ->where('vouchers.user_id is not null')
            ->findAll();

        return view('vouchers', $data);
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
