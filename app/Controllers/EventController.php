<?php

namespace App\Controllers;

use App\Entities\Eventos;
use app\Models\EventosModel;
use App\Services\EventService;
use CodeIgniter\Config\Factories;

class EventController extends BaseController
{

    private $eventService;
    private $eventoModel;

    public function __construct()
    {
        $this->eventService = Factories::class(EventService::class);
        $this->eventoModel = Factories::models(EventosModel::class);
    }

    public function cadastro()
    {
        echo view('create');
    }


    public function createEvento()
    {
        if ($this->eventService->createEvent($this->request->getPost())) {

            return redirect()->to('/eventosCadastrados');
            session()->setFlashdata('sucess', 'Evento cadastrado com sucesso.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->eventService->errors());
        }
    }


    public function updateEvento($idEvento)
    { 
        // Verifica se eu estou enviando os dados via post do formulario
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $evento = $this->eventService->getEvento($idEvento);
            if ($evento->creator === session()->get('id')) {
                $evento->fill($data);
                $event = new Eventos($data);
                $this->eventService->updateEvent($evento); 
            } else {
                session()->setFlashdata('error', 'Você não tem permissão para alterar este registro.');
                return redirect()->back();
            }
        } else {
            // pegar o evento pelo id
            $event = $this->eventService->getEvento($idEvento);
            if ($event->creator === session()->get('id')) {
                $dataView['evento'] = $event;
                return view('update_evento', $dataView);
            }else{
                session()->setFlashdata('error', 'Você não tem permissão para alterar este registro.');
                return redirect()->back();
            }
        }
    }

    public function deleteEvento()
    {
        $id = session('id');

        $this->eventService->selfDelete($id);
        return redirect()->to('/eventosCadastrados');
    }

    public function showEvento()
    {
        $eventoModel = new EventosModel();
        $data['eventos'] = $eventoModel->findAll();
        return view('cadastrados', $data);
    }
}
