<?php

namespace Api\Controllers;

class HomeController{
    public function index(): array{
        return [
            'message' => 'Welcome to Feira Tecnológica API :)',
            'data' => null
        ];
    }
}