<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;
use Tren\Models\User\Macronutrient;
use Tren\Models\User\PersonalData;

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
        $personalData = new PersonalData();

        $this->session->loginCheck();
        $id = ($this->session->get('zmienna2'));

        $user->load($id);
        $macro->loadMacros($id);
        $personalData->loadPersonalData($id);
        $data = [
            'user' => $user,
            'macro' => $macro,
            'personalData' => $personalData
        ];
        $this->view('home/index', $data);
    }

}
