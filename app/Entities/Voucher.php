<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Voucher extends Entity
{
    protected $datamap = [];
    protected $attributes = [
        'id' => null,
        'event_id' => null,
        'user_id' => null,
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}