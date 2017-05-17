<?php

namespace Tren\Core;

class Controller {

    /**
     * @var \Tren\libs\Session
     */
    protected $session;

    public function __construct() {
        $this->session = new \Tren\libs\Session();
    }

    public function getParam($name) {
        if (isset($_POST[$name])) {
            return $_POST[$name];
        }

        if (isset($_GET[$name])) {
            return $_GET[$name];
        }
    }

    public function getParameters() {
        $params = array_merge($_POST, $_GET);
        if ($params) {
            return $params;
        }

        return [];
    }

    public function view($view, $data = []) {
        require_once '../app/Views/' . $view . '.php';
    }

}
