<?php

namespace App;

class Router
{
    protected $routes = [];

    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "POST");
    }

    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];

        if ($this->routeExists($uri, $method)) {
            $this->executeRoute($uri, $method);
        } else {
            $this->showNotFoundPage();
        }
    }

    private function addRoute($route, $controller, $action, $method)
    {
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    private function routeExists($uri, $method)
    {
        return array_key_exists($uri, $this->routes[$method]);
    }

    private function executeRoute($uri, $method)
    {
        $controller = $this->routes[$method][$uri]['controller'];
        $action = $this->routes[$method][$uri]['action'];

        $controllerInstance = new $controller();
        $controllerInstance->$action();
    }

    private function showNotFoundPage()
    {
        $htmlNotFound = <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Not Found</title>
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #f5f5f5;
                    color: #333;
                    text-align: center;
                    padding: 50px;
                }

                h1 {
                    color: #d9534f;
                }

                p {
                    font-size: 18px;
                }
            </style>
        </head>
        <body>
            <h1>404 Not Found</h1>
            <p>The page you are looking for might be in another castle.</p>
        </body>
        </html>
HTML;
        echo $htmlNotFound;
    }
}
