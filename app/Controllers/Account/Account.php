<?php

namespace Tren\Controllers\Account;

use Tren\Core\Controller;
use Tren\Models\User;
use \Tren\Models\Calculator\Activities\Person;

class Account extends Controller {

    public function display() {
        $this->header();
        $this->session->loginCheck();
        $user = new User();
        $id = ($this->session->get('zmienna2'));
        $user->load($id);
        $data = [
            'user' => $user
        ];
        $this->view('home/account/account', $data);
    }
   
}
