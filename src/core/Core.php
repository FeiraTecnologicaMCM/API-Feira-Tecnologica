<?php

namespace Api\Core;

class Core{
    public static function load(array $routes): void{
        $urlArray = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($urlArray);
        unset($urlArray[0]);
        $url = '';

        foreach($urlArray as $key => $value){
            $url .= '/' . $value;
        }
        if (substr($url,-1) != '/') {
            $url .= '/';
        }
        $url = strtoupper($url);
        
        $controllerPrefix = "Api\\Controllers\\";
        foreach ($routes as $route) {
            // $pattern = '#^' . preg_replace('/\{id\}/', '([\w-]+)', $route['url']) . '$#';
            if(strtoupper($route['url']) == $url){
                echo 'a';die();
                [$controller, $action] = explode('@', $route['action']);
                $controller = $controllerPrefix . $controller;
                $extendController = new $controller();
                $extendController->$action();
            }
            else{
                echo 'ERRO 404';
            }
        }
    }
}