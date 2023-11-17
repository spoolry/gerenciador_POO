<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $allowedFields    = ['name', 'email', 'password'];
    protected $returnType = User::class;
    protected $DBGroup          = 'default';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $useSoftDeletes   = true;
    protected $protectFields    = true;

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
    protected $beforeUpdate   = ['setUpdatedAt'];
    protected function setUpdatedAt(array $data)
    {
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected $validationRules = [
        'name' => 'required|min_length[3]|',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
    ];
    //pega os dados no banco no caso o email
    public function getUser($email)
    {
        return $this->where('email', $email)->first();
    }

    public function getId($id)
    {
        return $this->find($id);
    }

    public function trySaveUser(User $user){
        try {
            $this->db->transStart();
            $this->save($user);
            $this->db->transComplete();
        } catch (\Exception $e) {
            die("Erro ao salvar os dados.");
        }
    }
}