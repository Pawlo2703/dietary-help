<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;
use Tren\Models\User\Macronutrient;
use Tren\Models\User\PersonalData;

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
    public function setMacros() {
        $this->session->loginCheck();
        $params = $this->getParameters();
        
        $user = new Macronutrient();
        
        $id = ($this->session->get('zmienna2'));
        $user->setProtein($params['protein']);
        $user->setFat($params['fat']);
        $user->setCarbohydrate($params['carbs']);
        $user->setMacros($id);

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
        $params = $this->getParameters();
        
        $personalData = new PersonalData();
       //dodac wyswetlanie personal data

        $id = ($this->session->get('zmienna2'));
        var_dump($params);
        $personalData->setWeight($params['weight']);
        $personalData->setHeight($params['height']);
        $personalData->setState($params['state']);
        


        $personalData->personalData($id);

        header("Location: http://localhost/Tren/public/UserDetails/display");
    }

}
