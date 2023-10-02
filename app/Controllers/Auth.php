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
            return redirect()->to('/');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->userService->errors());
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
