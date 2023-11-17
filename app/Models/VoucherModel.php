<?php

namespace App\Models;

use App\Entities\Voucher;
use CodeIgniter\Model;

class VoucherModel extends Model
{
    protected $table            = 'vouchers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Voucher::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['event_id', 'user_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected function setCreatedAt(array $data)
    {
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getVouchersWithRelations($data)
    {
        $this->select('vouchers.*, events.name, users.name');
        $this->join('events', 'vouchers.event_id = events.id');
        $this->join('users', 'vouchers.user_id = users.id');
        $this->where('vouchers.user_id', session('id_user'));
        return $this->save($data);
    }

    public function confirmedPresence($data)
    {
        return $this->insert($data);
    }
}
