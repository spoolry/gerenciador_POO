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

    public function createEvento()
    {
        if ($this->eventService->createEvento($this->request->getPost())) {

            return redirect('/');
            session()->setFlashdata('sucess', 'Evento cadastrado com sucesso.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->eventService->errors());
        }
    }


public function updateEvento($id){
  if(!$this->request->getPost()){
    $idEvento = $this->request->uri->getSegment(3);
    $evento = $this->eventoModel->find($idEvento);
    if($evento->creator ==  session('id'))
    {
        return view('update_evento', $evento);
    }else{
        session()->setFlashdata('error', 'Você não tem permissão para alterar este registro.');
        return redirect()->back();
    }
  }else{
    // fazer o update
  }
}
        
public function deleteEvento(){

}

}