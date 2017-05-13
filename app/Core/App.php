<?php

namespace Tren\Core;

/*
 * Class App
 */

class App {

    protected $controller = 'register';
    protected $method = 'user';
    protected $params = [];

    /**
     * Main clontrollers namespace
     * @var namespace 
     */
    private $namespace = "\\Tren\\Controllers\\";

    /*
     * Constructor
     */

    public function __construct() {
        $url = $this->parseUrl();

        if (file_exists('../app/Controllers/' . ucfirst($url[0]) . '.php')) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }

        $this->controller = $this->namespace . $this->controller;
        $this->controller = new $this->controller();


        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /*
     * 
     */

    public function parseUrl() {

        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

}
