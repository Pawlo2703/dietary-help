<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;
use Tren\Models\Calculator\Calculator;
use Tren\Models\Calculator\Activities;
use Tren\Models\Calculator\Activities\Person;
use Tren\Models\Calculator\Activities\Cardio;
use Tren\Models\Calculator\Activities\Workout;

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
    public function saveMacros() {
        $this->session->loginCheck();
        $params = $this->getParameters();
        $calc = new Calculator();
        $calc->init($params);
        $calc->totaldailyEnergyExpenditure();

        $user = new User();
        $result = $user->setCalories($calc->getTdee());
        $id = ($this->session->get('zmienna2'));
        $user->saveMacros($id);
    }

    /**
     * Displays form
     */
    public function userTwo() {

        $this->view('home/details');
    }

}
