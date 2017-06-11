<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\User;

class Account extends Controller {

    public function display() {
        $this->header();
        $this->session->loginCheck();
        $user = new User();
        $id = ($this->session->get('zmienna2'));
        $user->load($id);



        $data = [
            'user' => $user,
        ];
        $this->view('home/account/account', $data);
    }

    public function changePasswordForm() {
        $this->header();
        $this->view('home/account/change_password/change_password');
    }

    public function changePassword() {
        $this->header();
        $this->session->loginCheck();
        $params = $this->getParameters();
        $user = new User();
        $id = ($this->session->get('zmienna2'));
        $oldPw = $user->checkPassword($id);
        $oldPw2 = $params['old'];
        $new = $params['new'];
        $repeat = $params['repeat'];


        if (password_verify($oldPw2, $oldPw)) {
            $new = $params['new'];
            $repeat = $params['repeat'];
            if (($new == $repeat) && ((strlen($new)) < 15)) {
                $user->setPassword(password_hash($new, PASSWORD_DEFAULT, ['cost' => 10]));
                $user->changePassword($id);
                $this->view('home/account/change_password/error/changed_password');
            } else {
                $this->view('home/account/change_password/error/new_password');
            }
        } else {
            $this->view('home/account/change_password/error/old_password');
        }
    }

    public function changeAvatar() {
        
    }

    public function changePersonalData() {
        
    }

}
