<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\Calculator\Activities\Person;
use Tren\Models\User\DailyWeight;
use Tren\Models\User\Macronutrient;

/**
 * Class Calc
 */
class Weight extends Controller {

//    /**
//     * Displays calculator forms
//     */
//    public function display() {
//        $this->session->loginCheck();
//        $this->view('home/weight_in');
//    } do wyjebki chyba

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

    public function weightCompare() {
        $this->session->loginCheck();
        $params = $this->getParameters();
        $id = ($this->session->get('zmienna2'));


        $person = new Person();
        $dailyWeight = new DailyWeight();
        $macro = new \Tren\Models\User\Macronutrient();

        $person->loadPersonalData($id);
        $state = $person->getState();
        $dailyWeight->getSevenWeightsLastWeek($id);
        $dailyWeight->getSevenWeights($id);
        $macro->loadMacros($id);
        $person->isSundayUpdate($id);

        $calories = $macro->getCalories();

        $macro->setCalories($dailyWeight->macroUpdate($state, $calories));

        $weight = $person->getWeight();

        $macro->setMacros($id, $weight);



        header("Location: http://localhost/Tren/public/UserDetails/Display");
    }

}
