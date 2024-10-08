<?php

namespace Api\Core\Response;

class Response{
    private $data = [];
    private const _ACC_METHODS = ['GET','POST','PUT'];
    public function __construct(string $method, array $params = []){
        if(!$this->MethodExists($method)){
            $this->RequestError(405, 'Method not allowed', $params);
        }
        $this->data = [
            'api_version' => 1.0,
            'method'=> $method,
            'parameters'=> $params
        ];
    }
    private function MethodExists(string $method): bool{
        return in_array(strtoupper($method), self::_ACC_METHODS);
    }
    public static function RequestError(int $code, string $message, array $params): void{
        header('Content-Type:application/json');
        http_response_code($code);
        self::$data = [
            'code' => $code,
            'message' => $message,
            'parameters' => $params,
            'data' => null
        ];
        echo json_encode(self::$data);
        die();
    }
    public function AddToResponse(string $key, string $value): void{
        $this->data[$key] = $value;
    }
    public function SendResponse(int $code, string $message): void{
        header('Content-Type:application/json');
        http_response_code($code);
        $this->data['code'] = $code;
        $this->data['message'] = $message;
        echo json_encode($this->data);
        die();
    }
}