<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\Calculator\Activities\Person;
use Tren\Models\User\DailyWeight;

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
     * Potrzebne?
     */
//    public function userTwo() {
//
//        $this->view('home/details');
//    }
//
//      public function avargeWeight() {
//        $this->session->loginCheck();
//        $params = $this->getParameters();
//
//        $weight = new DailyWeight();
//
//        $id = ($this->session->get('zmienna2'));
//        $weight->getSevenWeights($id);
//    }
//    
        public function weightCompare() {
        $this->session->loginCheck();
        $id = ($this->session->get('zmienna2'));
        //$params = $this->getParameters();

        $person = new Person();
        $dailyWeight = new DailyWeight();
      
        $person->loadPersonalData($id);
        
        
        $state = $person->getState();
        $dailyWeight->getSevenWeightsLastWeek($id);
        $dailyWeight->getSevenWeights($id);
        $dailyWeight->macroUpdate($state);
        
        
        
        
    }
    
}
