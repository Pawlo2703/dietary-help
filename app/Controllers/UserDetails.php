<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;
use Tren\Core\Database;

/*
 * Class UserDetails
 */

class UserDetails extends Controller {
    /*
     * Displays logged users data
     */

    public function display($login = '') {
        $user = new User();

        $id = ($this->session->get('zmienna2'));
        var_dump($id);
        $user->load($id);
        $data = [
            'user' => $user->getLogin(),
            'user' => $user
        ];
        $this->view('home/index', $data);
    }

}
