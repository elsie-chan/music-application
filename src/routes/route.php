<?php
namespace App\Route;
class Route{
    public $controller = 'defaultController';
    public $method = 'index';

    public  function post($name) {
        return $_POST[$name] ?? null;
    }
    public function get($name) {
        return $_GET[$name] ?? null;
    }
    public function __construct()
    {
        $this->getSystemParams();
    }

    public function getSystemParams()
    {
        if ($this->get('name') != null) {
            $this->controller = $this->get('name') . 'Controller';
        }

        if ($this->get('method') != null) {
            $this->method = $this->get('method');
        }
    }

    public function handler($path, $method) {

    }
}

