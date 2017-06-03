<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;
use Tren\Models\User\Macronutrient;

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
     * Creates user SESSION
     */
    public function Login() {

        $user = new User();
        $macro = new User\Macronutrient;
        if ($userId = $user->findByLogin($this->getParam('login'))) {

            if (!$userId) {
                $this->view('home/login');
                return;
            }

            $userPw = $user->checkPassword($userId);
            $pw = $this->getParam('password');

            if (password_verify($pw, $userPw)) {

                $user->load($userId);

                $this->session->set('zmienna', $user->getLogin());
                $this->session->set('zmienna2', $user->getId());

                $macro->loadMacros($userId);
                if ($macro->getProtein() != null) {
                    header("Location: http://localhost/Tren/public/UserDetails/display");
                } else {
                    $this->view('home/macros');
                }
            } else {
                $this->view('home/loginError');
            }
        } else {
            $this->view('home/loginError');
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
        echo "Log in first, idiot.";
        $this->view('home/login');
    }

}
