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

    public function createEvent($eventArray)
    {

        $evento = new Eventos();

        $evento->name = $eventArray['nome'];
        $evento->data_hora = $eventArray['data_hora'];
        $evento->local = $eventArray['local'];
        $evento->descricao = $eventArray['descricao'];
        $evento->creator = $eventArray['creator'];
        

        if ($this->eventModel->save($evento)) {
            session()->setFlashdata('success', lang('App.successCreateLogin', [], session('user_locale')));
            return redirect()->to('/');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->eventModel->errors());
        }
    }

    public function updateEvent(Eventos $event)
    {
        try {
            if ($event->hasChanged()) {
                $this->eventModel->trySaveUser($event);
            }
        } catch (\Exception $e) {
            die("Erro ao realizar o processo.");
        }
    }

    public function deleteEvent($id)
    {
        if ($this->eventModel->delete($id)) {
            return redirect()->to('/register');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->eventModel->errors());
        }
    }
}
