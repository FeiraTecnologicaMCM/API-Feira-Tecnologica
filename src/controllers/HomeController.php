<?php

namespace Api\Controllers;

class HomeController{
    //adcionar construtro com metodo da requisição
    public function index(): array{
        return [
            'code' => 200,
            'data' => null,
            'message' => 'Welcome to Feira Tecnológica API :)',
        ];
    }
}