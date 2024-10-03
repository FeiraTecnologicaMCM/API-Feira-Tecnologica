<?php

namespace Api\Router;

class Router{
    private static $routes = [];    
    public static function get(string $url, string $action): void{
        self::$routes[] = [
            "url"=> strtoupper($url),
            "action"=> $action,
            "method"=>"GET"
        ];
    }
    public static function post(string $url, string $action): void{
        self::$routes[] = [
            "url"=> strtoupper($url),
            "action"=> $action,
            "method"=>"POST"
        ];
    }
    public static function put(string $url, string $action): void{
        self::$routes[] = [
            "url"=> strtoupper($url),
            "action"=> $action,
            "method"=>"PUT"
        ];
    }
    public static function delete(string $url, string $action): void{
        self::$routes[] = [
            "url"=> strtoupper($url), 
            "action"=> $action,
            "method"=>"DELETE"
        ];
    }
    public static function routes(): array{
        return self::$routes;
    }
}