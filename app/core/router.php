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

    public function put($url, $controller)
    {
        $this->routes['PUT'][$url] = $controller;
    }

    public function delete($url, $controller)
    {
        $this->routes['DELETE'][$url] = $controller;
    }

    public function resolve($url, $method)
    {
        $method = strtoupper($method);
        $action = $this->routes[$method][$url] ?? null;

        if ($action) {
            return $this->dispatch($action);
        }

        foreach ($this->routes[$method] ?? [] as $route => $handler) {
            $paramNames = [];
            $pattern = preg_replace_callback('/\{([^}]+)\}/', function ($matches) use (&$paramNames) {
                $paramNames[] = $matches[1];
                return '([^/]+)';
            }, $route);

            $pattern = '#^' . $pattern . '$#';

            if (!preg_match($pattern, $url, $matches)) {
                continue;
            }

            array_shift($matches);
            $params = [];

            foreach ($matches as $index => $value) {
                $params[$paramNames[$index] ?? $index] = $value;
            }

            return $this->dispatch($handler, array_values($params));
        }

        http_response_code(404);
        echo '404 Not Found';
        return;
    }

    private function dispatch($action, $params = [])
    {
        [$class, $method] = explode('@', $action);

        if (!class_exists($class)) {
            http_response_code(500);
            echo 'Controller not found';
            return;
        }

        $controller = new $class();

        if (!method_exists($controller, $method)) {
            http_response_code(500);
            echo 'Method not found';
            return;
        }

        return call_user_func_array([$controller, $method], $params);
    }
}
