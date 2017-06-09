<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;
use Tren\Models\User\Macronutrient;
use Tren\Models\Calculator\Activities\Person;
use Tren\Controllers\UserDetails;

/**
 * Class Macros
 */
class Macronutrients extends Controller {

    /**
     * Displays form
     */
    public function User() {
        $this->header();
        $this->session->loginCheck();
        $id = ($this->session->get('zmienna2'));
        $macro = new Macronutrient();
        $macro->loadMacros($id);
        if ($macro->getProtein() > 0) {

            $this->redirect("UserDetails", "Display", array(""));
                    
        } else {
            $this->view('home/macronutrient/form/details_form');
        }
    }

    /**
     * Saves user data
     */
    public function setMacros() {
        $this->header();
        $this->session->loginCheck();
        $params = $this->getParameters();

        $macro = new Macronutrient();
        $person = new Person();



        $digit = $params;
        $to_delete = array('state', 'url');

        foreach ($to_delete as $key) {
            unset($digit[$key]);
        }

        foreach ($digit as $numeric) {
            if (is_numeric($numeric)) {
                
            } else {

                $this->view('home/macronutrient/form/error/numeric_error');
                exit();
            }
        }



        $id = ($this->session->get('zmienna2'));
        $macro->setProtein($params['protein']);
        $macro->setFat($params['fat']);
        $macro->setCarbohydrate($params['carbs']);
        $weight = $person->getWeight();
        $person->init($params);
        $person->personalData($id);
        $macro->setMacros($id, $weight);

        $this->redirect("UserDetails", "Display", array(""));
        
    }

}
