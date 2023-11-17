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
            session()->setFlashdata('success', 'Evento cadastrado com sucesso.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->eventService->errors());
        }
    }


    public function updateEvent($idEvent)

    {
        // Verifica se eu estou enviando os dados via post do formulario
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $event = $this->eventService->getEvent($idEvent);

            if ($event->creator === session()->get('id')) {
                $event->fill($data);
                $this->eventService->updateEvent($event);
                session()->setFlashdata('success', 'Evento alterado com sucesso.');
                return redirect()->to('/registeredEvent');

            } else {
                session()->setFlashdata('error', 'Você não tem permissão para alterar este registro.');
                return redirect()->back();
            }
        } else {
            // pegar o evento pelo id
            $event = $this->eventService->getEvent($idEvent);
            if ($event->creator === session()->get('id')) {
                $dataView['event'] = $event;
                return view('updateEvent', $dataView);
            } else {
                session()->setFlashdata('error', 'Você não tem permissão para alterar este registro.');
                return redirect()->back();
            }
        }
    }

    public function deleteEvent($id)
    {
        $this->eventService->deleteEvent($id);
        return redirect()->to('/registeredEvent');
    }

    public function showEvent()
    {
        $data['events'] = $this->eventModel->findAll();
        return view('/registeredEvent', $data);
    }
}
