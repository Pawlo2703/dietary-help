<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\Calculator\Activities\Person;

/**
 * Class Calc
 */
class Weight extends Controller {

    /**
     * Displays calculator forms
     */
    public function display() {
        $this->session->loginCheck();
        $this->view('home/weight_in');
    }

    /**
     * 
     */
    public function saveWeight() {
        $this->session->loginCheck();
        $id = ($this->session->get('zmienna2'));
        $params = $this->getParameters();

        $person = new Person();
        
        $person->setDate(date("Y/m/d"));
        $person->setWeight($params['weight']);
        $person->updateDailyWeight($id);

        
    }

    /**
     * Displays form
     */
    public function userTwo() {

        $this->view('home/details');
    }

}
