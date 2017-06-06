<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;

/*
 * Class Register
 */

class Register extends Controller {
    /*
     * Displays register form
     */

    public function User() {
        $this->view('home/register/register');
    }

    /*
     * Adds new user to database
     */

    public function register() {
        $add = new User();
        $params = $this->getParameters();

        
        if (strlen($params['login']) < 15) {
            $add->setLogin($params['login']);
        } else {
            $this->view('home/register/error/login_or_pw_too_long');
        }

        if (strlen($params['password']) < 15) {
            $add->setPassword(password_hash($params['password'], PASSWORD_DEFAULT, ['cost' => 10]));
        } else {
            $this->view('home/register/error/login_or_pw_too_long');
        }

        if ($add->register() == !NULL) {
            $this->view('home/login/new_user_login');
        } else {
            $this->view('home/register/error/taken');
        }
    }

}
