<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;
use Tren\Models\User\Macronutrient;
use Tren\Models\Calculator\Activities\Person;

/*
 * Class UserDetails
 */

class UserDetails extends Controller {
    /*
     * Displays logged users data
     */

    public function display() {
        $user = new User();
        $macro = new Macronutrient();
        $person = new Person();
        $weight = new User\DailyWeight();
        
        $this->session->loginCheck();
        $id = ($this->session->get('zmienna2'));

        $user->load($id);
        $macro->loadMacros($id);
        $person->loadPersonalData($id);
      
        $weight->getSevenWeightsLastWeek($id);
        var_dump($weight->getSevenWeightsLastWeek($id));
  
        $data = [
            'user' => $user,
            'macro' => $macro,
            'person' => $person,
                'weight' => $weight
        ];
       $this->view('home/index', $data);
       
    }
}

