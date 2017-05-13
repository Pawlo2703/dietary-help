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

        $this->view('home/register');
    }

    /*
     * Adds new user to database
     */

    public function register() {
        $add = new User();
        $add->setLogin($this->getParam('login'));

        $password = $this->getParam('password');
        $add->setPassword(password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]));


        $add->register();
        $this->view('home/register');
    }

}
