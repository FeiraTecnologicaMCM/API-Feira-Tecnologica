<?php

namespace Api\Core;
use Api\Core\Response;

class Core{
    public static function load(array $routes): void{
        $urlArray = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($urlArray);
        unset($urlArray[0]);
        $param = null;
        if(isset($urlArray[3])){
            $param = $urlArray[3];
            unset($urlArray[3]);
        }
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
                [$controller, $action] = explode('@', $route['action']);
                $controller = $controllerPrefix . $controller;
                $extendController = new $controller();
                $data = $extendController->$action($param);
                $response = new Response($_SERVER['REQUEST_METHOD'],$_GET);
                $response->AddToResponse('data', $data['data']);
                $response->SendResponse($data['code'], $data['message']);
            }
        }
    }
}