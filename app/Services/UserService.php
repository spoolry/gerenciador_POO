<?php

namespace App\Services;

use App\Entities\User;
use App\Models\UserModel;
use CodeIgniter\Config\Factories;
use CodeIgniter\Validation\Validation;
use Config\Validation as ConfigValidation;

class UserService
{

    protected $userModel;
    protected $userService;

    public function __construct()
    {
        $this->userModel = Factories::models(UserModel::class);
    }

    public function authenticate($email, $password)
    {
        //verifica se o email digitado é igual ao email cadastrado
        $user = $this->userModel->getUser($email);
        //verifica se a senha e o email são os mesmos cadastrados
        if ($user && password_verify($password, $user->password)) {

            $variavalDeSessao = [
                'id' => $user->id,
                'email' => $user->email,
                'data_login' => bd2br(date('Y-m-d, H:s')),
                'data_cad' => $user->created_at,
                'isLoggedIn' => true,
                'user_locale' => getPreferredLanguage(['en', 'pt-BR'], session('user_locale')),
            ];

            session()->set($variavalDeSessao);
            session()->setFlashdata('success', lang('App.successLogin', [], session('user_locale')));
            return true;
        } else {
            session()->setFlashdata('error', lang('App.errorLogin'));
            return false;
        }
    }
    //metodo para criar o usuario
    public function createUser($userArray)
    {
        //usando a entidade para selecionar os campos para criar
        $user = new User();
        $user->name = $userArray['name'];
        $user->email = $userArray['email'];
        $user->password = $userArray['password'];

        //verifica e envia os dados para o model para a criação
        if ($this->userModel->save($user)) {
            session()->setFlashdata('success', lang('App.successCreateLogin', [], session('user_locale')));
            return redirect()->to('/');
        } else {
            return redirect()->with('error', 'Email já cadastrado!');
        }
    }


    public function selfDelete($id)
    {
        if ($this->userModel->delete($id)) {
            return redirect()->to('/registerUser');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }
    }

    public function tryUpdate(User $user)
    {
        try {
            if($user->hasChanged()){
                $this->userModel->trySaveUser($user);
            }
        } catch (\Exception $e) {
            die("Erro ao realizar o processo.");
        }
    }

    public function getUser($id)
    {
        return $this->userModel->getId($id);
    }
}
