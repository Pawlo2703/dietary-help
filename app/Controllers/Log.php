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
        $this->header();

        $this->view('home/login/login');
    }

    /**
     * Creates user SESSION
     */
    public function Login() {
        $this->header();

        $user = new User();
        $macro = new User\Macronutrient;
        if ($userId = $user->findByLogin($this->getParam('login'))) {

            if (!$userId) {
                $this->view('home/login/login');
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
                    $this->redirect("UserDetails", "Display", array(""));
                } else {
                    $this->view('home/macronutrient/macronutrient');
                }
            } else {
                $this->view('home/login/error/incorrect_details');
            }
        } else {
            $this->view('home/login/error/incorrect_details');
        }
    }

    /**
     * Ends user session
     */
    public function Logout() {
        $this->header();
        if ($result = $this->session->get('zmienna')) {
                       $this->session->destroy('zmienna');
            $this->session->destroy('zmienna2');


            $this->view('home/login/login');
            echo "You are now logged out.";
            return;
        }
        echo "Log in first.";
        $this->view('home/login/login');
    }

}
