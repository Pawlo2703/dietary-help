<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;
use Tren\Models\Calculator\Calculator;
use Tren\Models\User\Macronutrient;
use Tren\Models\Calculator\Activities\Person;

/**
 * Class Calc
 */
class Calc extends Controller {

    /**
     * Displays calculator forms
     */
    public function User() {
        $this->session->loginCheck();
        $id = ($this->session->get('zmienna2'));
        $macro = new Macronutrient();
        $macro->loadMacros($id);
        if ($macro->getProtein() > 0) {
             header("Location: http://localhost/Tren/public/UserDetails/Display");
        } else {
            $this->view('home/calculator');
        }
    }

    /**
     * 
     */
    public function setMacros() {
        $this->session->loginCheck();
        $params = $this->getParameters();

        $calc = new Calculator();
        $user = new Macronutrient();
        $person = new Person();

        $digit = $params;
        $to_delete = array('activity', 'state', 'cardio', 'workout', 'state', 'url', 'gender');
        
        foreach ($to_delete as $key) {
            unset($digit[$key]);
        }

        foreach ($digit as $numeric) {
            if (is_numeric($numeric)) {
                
            } else {
                
                $this->view('home/calculatorDigitError');
                exit();
            }
        }
        $calc->init($params);
        $calc->totaldailyEnergyExpenditure();


        $id = ($this->session->get('zmienna2'));
        $user->setCalories($calc->getTdee());


        $person->init($params);
        $person->personalData($id);

        $user->init($params);
        $weight = $person->getWeight();
        $user->setMacros($id, $weight);

        header("Location: http://localhost/Tren/public/UserDetails/display");
    }

    /**
     * Displays form
     */
    public function userTwo() {

        $this->view('home/details');
    }

}
