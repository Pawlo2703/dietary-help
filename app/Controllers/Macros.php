<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;

/**
 * Class Macros
 */
class Macros extends Controller {

    /**
     * Displays form
     */
    public function User() {

        $this->view('home/nocalculator');
    }

    /**
     * Saves user data
     */
    public function saveMacros() {
        $user = new User();
        $id = ($this->session->get('zmienna2'));

        $user->setProtein($this->getParam('protein'));
        $user->setFat($this->getParam('fat'));
        $user->setCarbohydrate($this->getParam('carbs'));

        $user->saveMacros($id);

        header("Location: http://localhost/Tren/public/UserDetails/display");
    }

    /**
     * Displays form
     */
    public function userTwo() {

        $this->view('home/details');
    }

    /**
     * Saves user data
     */
    public function saveDetails() {
        $user = new User();
        $id = ($this->session->get('zmienna2'));

        $user->setWeight($this->getParam('weight'));
        $user->setState($this->getParam('state'));

        $user->saveDetails($id);

        header("Location: http://localhost/Tren/public/UserDetails/display");
    }

}
