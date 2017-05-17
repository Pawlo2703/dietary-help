<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;
use Tren\Models\User\Macronutrient;

/**
 * Class Macros
 */
class Macros extends Controller {

    /**
     * Displays form
     */
    public function User() {
        $this->session->loginCheck();
        $this->view('home/nocalculator');
    }

    /**
     * Saves user data
     */
    public function saveMacros() {
        $this->session->loginCheck();
        $params = $this->getParameters();
    
        
        $user = new User();
                
        $id = ($this->session->get('zmienna2'));
        
        
        $user->setProtein($params['protein']);
        $user->setFat($params['fat']);
        $user->setCarbohydrate($params['carbs']);

        $user->saveMacros($id);

        header("Location: http://localhost/Tren/public/Macros/userTwo");
    }

    /**
     * Displays form
     */
    public function userTwo() {
        $this->session->loginCheck();
        $this->view('home/details');
    }

    /**
     * Saves user data
     */
    public function saveDetails() {
        $this->session->loginCheck();
        $user = new User();
        $id = ($this->session->get('zmienna2'));

        $user->setWeight($this->getParam('weight'));
        $user->setState($this->getParam('state'));

        $user->saveDetails($id);

        header("Location: http://localhost/Tren/public/UserDetails/display");
    }

}
