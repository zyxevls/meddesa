<?php

class Router
{
    private $routes = [];

    public function get($url, $controller)
    {
        $this->routes['GET'][$url] = $controller;
    }

    public function post($url, $controller)
    {
        $this->routes['POST'][$url] = $controller;
    }

    public function resolve($url, $method)
    {
        $action = $this->routes[$method][$url] ?? null;

        if (!$action) {
            throw new Error("404 Not Found");
            return;
        }

        [$class, $method] = explode('@', $action);
        $controller = new $class();
        return $controller->$method();
    }
}