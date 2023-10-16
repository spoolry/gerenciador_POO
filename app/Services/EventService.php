<?php

namespace App\Services;

use App\Entities\Eventos;
use App\Models\EventosModel;
use CodeIgniter\Config\Factories;
use CodeIgniter\Validation\Validation;

class EventService 
{
    protected $eventModel;

    public function __construct()
    {
        $this->eventModel = Factories::models(EventosModel::class);
    }

    public function createEvent(){

    }

    public function updateEvent(){

    }

    public function deleteEvent(){
        
    }
}