<?php

namespace App\Core;

use App\Core\Exceptions\NotFoundException;

class Router
{
    private $routes = [];

    /**
     * Register a new route
     */
    public function register(string $path, string $action)
    {
        $this->routes[trim($path, '/')] = $action;
    }

    public function fire(string $path)
    {
        $action = $this->routes[trim($path, '/')] ?? null;

        if (!$action) {
            require view('404.php');
        }

        [$controller, $method] = explode('@', $action);
        $fullNamespace = sprintf('App\Controllers\%s', $controller);

        try {
            $obj = new $fullNamespace();

            if(!method_exists($obj, $method)) {
                throw new NotFoundException(sprintf('Method %s not found.', $method));
            }

            echo call_user_func([$obj, $method]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
