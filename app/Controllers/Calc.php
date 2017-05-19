<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;
use Tren\Models\Calculator\Calculator;
use Tren\Models\User\Macronutrient;


/**
 * Class Calc
 */
class Calc extends Controller {

    /**
     * Displays calculator forms
     */
    public function User() {
        $this->session->loginCheck();
        $this->view('home/calculator');
    }

    /**
     * 
     */
    public function setMacros() {
        $this->session->loginCheck();
        $params = $this->getParameters();
        $calc = new Calculator();
        $calc->init($params);
        $calc->totaldailyEnergyExpenditure();

        $user = new Macronutrient();
        
        $id = ($this->session->get('zmienna2'));
        $user->setCalories($calc->getTdee());
        
        $user->setMacros($id);
    }

    /**
     * Displays form
     */
    public function userTwo() {

        $this->view('home/details');
    }

}
