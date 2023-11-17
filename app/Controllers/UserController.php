<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UserModel;
use App\Services\UserService;
use CodeIgniter\Config\Factories;

class UserController extends BaseController
{

    private $userService;

    public function __construct()
    {
        $this->userService = Factories::class(UserService::class);
    }

    public function index()
    {
        echo view('login');
    }

    public function registerUser()
    {
        echo view('registerUser');
    }
    //autenticação dos dados que vem do post
    public function authenticate()
    {

        //$name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        //verifica no service se o email e senha estão corretos
        return ($this->userService->authenticate($email, $password)) ? redirect()->to('/dashboard') : redirect()->back();
    }

    public function createUser()
    {
        if ($this->userService->createUser($this->request->getPost())) {

            return redirect('/');
            session()->setFlashdata('success', 'Usuário cadastrado com sucesso.');
        } else {

            return redirect()->back()->withInput()->with('errors', $this->userService->errors());
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function deleteUser()
    {
        $id = session('id');

        $this->userService->selfDelete($id);
        return redirect()->to('/')->with('success', 'Usuário deletado com sucesso.');

    }

    public function updateUser()
    {
        $id = session('id');

        $dataView = ['user' => $this->userService->getUser($id)];

        if ($data = $this->request->getPost()) {

            $user = new UserModel();
            $user = $this->userService->getUser($data['id']);
            $user->fill($data);
            
            $this->userService->tryUpdate($user);
            return redirect()->to('/dashboard');
        } else {
            return view('updateUser', $dataView);
        }
    }
}
