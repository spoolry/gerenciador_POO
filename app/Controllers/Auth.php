<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Services\UserService;
use CodeIgniter\Config\Factories;

class Auth extends BaseController
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

    public function register()
    {
        echo view('register');
    }

    public function authenticate()
    {

        $name = $this->request->getPost('nome');
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        return ($this->userService->authenticate($name, $email, $senha)) ? redirect()->to('/dashboard') : redirect()->back();
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
        return redirect()->to('/');
    }

    public function updateUser()
    {
        $id = session('id');

        $dataView = ['user' => $this->userService->getUser($id)];

        if ($data = $this->request->getPost()) {

            $user = $this->userService->getUser($data['id']);
            $user->fill($data);
            $user = new User($data);
            $this->userService->tryUpdate($user);
            return redirect()->to('/dashboard');
        } else {
            return view('update', $dataView);
        }
    }
}
