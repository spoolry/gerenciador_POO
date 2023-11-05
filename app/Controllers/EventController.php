<?php

namespace App\Controllers;

use App\Entities\Event;
use app\Models\EventModel;
use App\Services\EventService;
use CodeIgniter\Config\Factories;

class EventController extends BaseController
{

    private $eventService;
    private $eventModel;

    public function __construct()
    {
        $this->eventService = Factories::class(EventService::class);
        $this->eventModel = Factories::models(EventModel::class);
    }

    public function registerEvent()
    {
        echo view('createEvent');
    }

    public function createEvent()
    {
        if ($this->eventService->createEvent($this->request->getPost())) {

            return redirect()->to('/registeredEvent');
            session()->setFlashdata('sucess', 'Evento cadastrado com sucesso.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->eventService->errors());
        }
    }


    public function updateEvent($idEvent)

    {
        // Verifica se eu estou enviando os dados via post do formulario
        if ($data = $this->request->getPost()) {
            $event = $this->eventService->getEvent($idEvent);
            if ($event->creator === session()->get('id')) {
                $this->eventService->updateEvent($event);
                $dataView['event'] = $event;
                $event = new EventModel();
                $event->fill($data);     
                return view('updateEvent', $data);
            } else {
                session()->setFlashdata('error', 'Você não tem permissão para alterar este registro.');
                return redirect()->back();
            }
        }
    }

    public function deleteEvent()
    {
        $id = session('id');

        $this->eventService->selfDelete($id);
        return redirect()->to('/registeredEvent');
    }

    public function showEvent()
    {
        $eventModel = new EventModel();
        $data['events'] = $eventModel->findAll();
        return view('/registeredEvent', $data);
    }
}
