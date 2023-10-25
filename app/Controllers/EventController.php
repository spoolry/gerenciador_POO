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
        if (!$this->request->getPost()) {
            $idEvento = $this->request->uri->getSegment(3);
            $evento = $this->eventoModel->find($idEvento);
            if ($evento->creator ==  session()->get('id')) {
                return view('update_evento', $evento);
            } else {
                session()->setFlashdata('error', 'Você não tem permissão para alterar este registro.');
                return redirect()->back();
            }
        } else {
            // fazer o update
        }
    }

    public function deleteEvento()
    {
    }

    public function showEvento()
    {
        $eventoModel = new EventosModel();
        $data['eventos'] = $eventoModel->findAll();
        return view('/cadastrados', $data);
    }
}
