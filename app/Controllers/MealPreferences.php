<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;
use Tren\Models\User\Macronutrient;
use Tren\Models\Calculator\Activities\Person;

/**
 * Class Macros
 */
class MealPreferences extends Controller {

    /**
     * Displays form
     */
    public function User() {
        $this->header();
        $this->session->loginCheck();
        $this->view('home/macronutrient/macronutirient_preferences');
    }

    /**
     * Saves user data
     */
    public function changeMacro() {
        $this->header();
        $this->session->loginCheck();
        $params = $this->getParameters();
        $id = $this->session->get('zmienna2');
       
        $macro = new Macronutrient; 
        $macro->setMealPref($params['prefs']);      
        $macro->loadMacros($id);
        $macro->mealPreferences($id);
       $this->redirect("UserDetails", "Display", array(""));

    }

}
