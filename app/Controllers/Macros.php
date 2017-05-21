<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;
use Tren\Models\User\Macronutrient;
use Tren\Models\Calculator\Activities\Person;

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

        $macro = new Macronutrient();
        $person = new Person();

        $id = ($this->session->get('zmienna2'));
        $macro->setProtein($params['protein']);
        $macro->setFat($params['fat']);
        $macro->setCarbohydrate($params['carbs']);
        $person->init($params);
        $person->personalData($id);
        $macro->setMacros($id);

        header("Location: http://localhost/Tren/public/Macros/userTwo");
    }

}
