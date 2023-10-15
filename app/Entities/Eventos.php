<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Eventos extends Entity
{
    protected $datamap = [];
    protected $attributes = [
        'id' => null,
        'name'=> null,
        'data_hora' => null,
        'local' => null,
        'descricao' => null,
        'creator' => null,
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
