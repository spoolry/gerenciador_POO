<?php

namespace App\Services;

use App\Entities\User;
use App\Models\UserModel;
use CodeIgniter\Config\Factories;

class UserService{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = Factories::models(UserModel::class);
    }

    public function authenticate($name, $email, $password){

        $user = $this->userModel->getUser($email);
       
        if($user && password_verify($password, $user->password)){
           
            $variavalDeSessao = [
                'email' => $user->email,
                'data_login' => bd2br(date('Y-m-d')),
                'data_cad' => $user->created_at,
                'isLoggedIn' => true,
                'user_locale' => getPreferredLanguage(['en', 'pt-BR'], session('user_locale')),
            ];
            
            session()->set($variavalDeSessao);
            session()->setFlashdata('success', lang('App.successLogin', [], session('user_locale')));
            return true;
        }else{
            session()->setFlashdata('error', lang('App.errorLogin'));
            return false;
        }
    }

    public function createUser($userArray){

        $user = new User();
       
        $user->name = $userArray['nome'];
        $user->email = $userArray['email'];
        $user->password = $userArray['password'];
    
        if($this->userModel->save($user)){
            session()->setFlashdata('success', lang('App.successCreateLogin'));
            return redirect()->to('/');
        }else{
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors()); 
        }

    }

}