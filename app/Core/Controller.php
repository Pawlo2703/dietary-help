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

    public function header() {
        if (($this->session->get('zmienna2')) != null) {
            $this->view('home/headfoot/header_logged');
        } else {
            $this->view('home/headfoot/header');
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

    public function redirect($controller, $method = "index", $args = array()) {

        $location = '../' . $controller . "/" . $method . "/" . implode("/", $args);

        header("Location: " . $location);
        exit;
    }

}
