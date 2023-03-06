<?php

namespace App\Route;

use App\Controller;

class Route
{
    protected $path;
    protected $user_func;
    protected $method;
    protected $class;

    protected $current_path;
    public function __construct($path, $method, $class, $user_func)
    {
        $this->path = $path;
        $this->method = $method;
        $this->class = $class;
        $this->user_func = $user_func;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getUserFunc()
    {
        return $this->user_func;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path): void
    {
        $this->path = $path;
    }

    /**
     * @param mixed $user_func
     */
    public function setUserFunc($user_func): void
    {
        $this->user_func = $user_func;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method): void
    {
        $this->method = $method;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class): void
    {
        $this->class = $class;
    }


    public function parse()
    {
        if ($_SERVER['REQUEST_METHOD'] === $this->method) {
            $options = $this->isParamInPath();
            $path = $options['path'];
            $current_path = $options['current_path'];

            if ($options['has_param'] && $path === $current_path) {
                return $this->validateCallFunction($this->class, $this->user_func);
            } else if (!$options['has_param'] && $this->getCurrentPath() === $path) {
                return $this->validateCallFunction($this->class, $this->user_func);
            }
        } else {
            return false;
        }
    }

    private function validateCallFunction($class, $user_func) {
        if (!file_exists(assets('controllers/'.$class.'.php'))) {
            echo $class . '.php';
            return false;
        }

        $class = new $class;
        if (!method_exists($class, $user_func)) {
            return false;
        }

        call_user_func(array($class, $user_func));
        return true;
    }

    private function getCurrentPath() {
        $path_args = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path_args = substr($path_args, 1);

        $path = explode('/', $path_args);
        array_shift($path);

        return empty(join('/', $path)) ?  '/' : join('/', $path);
    }
    public function isParamInPath() {
        $has_param = str_contains($this->path, ":id");
        $current_path = dirname($this->getCurrentPath()) === '.' ? '/' : dirname($this->getCurrentPath());
        $path = $this->deleteIdParam();

        return clean_array([
            'has_param' => $has_param,
            'current_path' => $current_path,
            'path' => $path
        ]);
    }

    private function getQueryParam()
    {
        $query = $_SERVER['REQUEST_URI'];
        $path = parse_url($query);
        return basename($path['path']);
    }

    private function deleteIdParam() {
        return explode('/:id', $this->path)[0];
    }
}
