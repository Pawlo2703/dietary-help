<?php

namespace Tren\Controllers\Account;

use Tren\Core\Controller;
use Tren\Models\User;

class Avatar extends Controller {

    public function display() {
        $this->header();
        $this->view('home/account/change_avatar/change_avatar');
    }

    public function changeAvatar() {
        $this->header();
        $id = ($this->session->get('zmienna2'));
        
        $user = new User;
        $user->uploadImage($id);
        
    if (($user->uploadImage($id)) == 0) {
                 $this->view('home/account/error/avatar');
                 
    } else {
        $this->redirect("account_account", "Display", array(""));
    }

}
}