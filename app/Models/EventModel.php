<?php

namespace App\Models;

use App\Entities\Event;
use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table            = 'events';
    protected $allowedFields    = ['name', 'datetime', 'local', 'description', 'creator'];
    protected $returnType = Event::class;
    protected $DBGroup          = 'default';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;


    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $beforeInsert   = ['setCreatedAt'];
    protected function setCreatedAt(array $data)
    {
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected $beforeUpdate = ['setUpdatedAt'];
    protected function setUpdatedAt(array $data)
    {
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    // Validation
    protected $validationRules = [
        'name' => 'required|min_length[3]|',
        'datetime' => 'required',
        'local' => 'required|min_length[2]',
        'description' => 'min_length[6]',
    ];

    public function SaveEvent(Event $event)
    {
        try {
            $this->db->transStart();
            $this->save($event);
            $this->db->transComplete();
        } catch (\Exception $e) {
            die("Erro ao salvar os dados.");
        }
    }

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
