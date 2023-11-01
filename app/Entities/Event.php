<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Event extends Entity
{
    protected $datamap = [];
    protected $attributes = [
        'id' => null,
        'name' => null,
        'date_time' => null,
        'local' => null,
        'description' => null,
        'creator' => null,
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
