<?php

namespace App\Services;

use App\Entities\Event;
use App\Models\EventModel;
use CodeIgniter\Config\Factories;
use CodeIgniter\Validation\Validation;

class EventService
{
    protected $eventModel;

    public function __construct()
    {
        $this->eventModel = Factories::models(EventModel::class);
    }

    public function createEvent($eventArray)
    {

        $event = new Event($eventArray);

        if ($this->eventModel->save($event)) {
            session()->setFlashdata('success', lang('App.successCreateLogin', [], session('user_locale')));
            return redirect()->to('registeredEvent');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->eventModel->errors());
        }
    }

    public function updateEvent(Event $event)
    {
        try {
            if ($event->hasChanged()) {
                $this->eventModel->trySaveEvent($event);
            }
        } catch (\Exception $e) {
            die("Erro ao realizar o processo.");
        }
    } 

    public function deleteEvent($id)
    {
        if ($this->eventModel->delete($id)) {
            return redirect()->to('/registeredEvent');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->eventModel->errors());
        }
    }

    public function getEvent($id){

        return $this->eventModel->find($id);

    }
}
