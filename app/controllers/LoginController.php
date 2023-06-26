<?php
namespace Bank\Controllers;

use Bank\App;
use Bank\FileWriter;
use Bank\Messages;
use Bank\OldData;

class LoginController
{

    public function index()
    {
        $old = OldData::getFlashData();
        
        return App::view('auth/index', [
            'pageTitle' => 'Login',
            'inLogin' => true,
            'old' => $old,
        ]);
    }

    public function login(array $data)
    {
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';
        

        $users = (new FileWriter('users'))->showAll();

        foreach ($users as $user) {
            if ($user['email'] == $email && $user['password'] == md5($password)) {
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $user['name'];
                Messages::addMessage('success', 'You are logged in');
                header('Location: /');
                die;
            }
        }

        Messages::addMessage('danger', 'Wrong email or password');
        OldData::flashData($data);
        header('Location: /login');
        die;
    }

    public function logout()
    {
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        Messages::addMessage('success', 'You are logged out');
        header('Location: /');
        exit;
    }
}