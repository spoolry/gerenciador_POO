<?php

namespace App\Models;

use App\Entities\Eventos;
use CodeIgniter\Model;

class EventosModel extends Model
{
    protected $table            = 'eventos';
    protected $allowedFields    = ['name', 'data_hora', 'local', 'descricao', 'creator'];
    protected $returnType = Eventos::class;
    protected $DBGroup          = 'default';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;


    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $beforeInsert   = ['setCreatedAt'];
    protected function setCreatedAt(array $data){
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected $beforeUpdate   = ['setUpdatedAt'];
    protected function setUpdatedAt(array $data)
    {
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    // Validation
    protected $validationRules = [
        'name' => 'required|min_length[3]|',
        'data_hora' => 'required',
        'local' => 'required|min_length[2]',
        'descricao' => 'min_length[6]',
    ];

    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $afterInsert    = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
