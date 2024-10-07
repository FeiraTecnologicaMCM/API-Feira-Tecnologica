<?php

namespace Api\Core\Response;

class Response{
    private $data = [];
    private const _ACC_METHODS = ['GET','POST','PUT'];
    public function __construct(){
        if(!$this->MethodExists(self::_ACC_METHODS)){

        }
    }
    private function MethodExists(string $method): bool{
        return in_array(strtoupper($method), self::_ACC_METHODS);
    }
    public static function RequestError(int $code, string $message){
        
    }
}