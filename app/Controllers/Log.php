<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;

/*
 * Class Log
 */

class Log extends Controller {

    /**
     * Displays login form
     */
    public function User() {

        $this->view('home/login');
    }

    /**
     * Creates user sESSION
     */
    public function Login() {

        $user = new User();
        $userId = $user->findByLogin($this->getParam('login'));

        if (!$userId) {
            echo 'nie ma takiego usera';
            $this->view('home/login');
            return;
        }

        $userPw = $user->checkPassword($userId);
        $pw = $this->getParam('password');

        if (password_verify($pw, $userPw)) {

            $user->load($userId);

            $this->session->set('zmienna', $user->getLogin());
            $this->session->set('zmienna2', $user->getId());

            $protein = $user->getProtein();

            if ($protein == null) {
                $this->view('home/macros');
            } else {


                $this->view('home/login');
            }
        } else {
            $this->view('home/login');
        }
    }

    /**
     * Ends user session
     */
    public function Logout() {
        if ($result = $this->session->get('zmienna')) {
            var_dump($result);
            $this->session->destroy('zmienna');
            $this->session->destroy('zmienna2');

            $this->view('home/login');
            echo "You are now logged out.";
            return;
        }
        $this->view('home/login');
        echo "I couldn't log you out, sorry.";
    }

}
