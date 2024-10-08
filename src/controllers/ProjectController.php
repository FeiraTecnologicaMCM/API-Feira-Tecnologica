<?php

namespace Api\Controllers;
use Api\Database, PDO;

class ProjectController{
    private $db;
    public function __construct(){
        //CONSTANTE DEFINIDA NO index.php
        $this->db = Database::getInstance(_CONF);
    }
    public function index(): array{
        return [
            'code' => 200,
            'data' => null,
            'message' => 'Projects route...'            
        ];
    }
    public function get(): array{
        $query = $this->db->prepare("SELECT * FROM projetos");
        if($query->execute()){
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            if(count($results) > 0){
                return [
                    'code' => 200,
                    'data' => $results,
                    'message' => 'Request OK'
                ];
            }else{
                return [
                    'code'=> 200,
                    'data' => null,
                    'message' => 'No projects found in database'
                ];
            }
        }else{
            return [
                'code' => 500,
                'data' => null,
                'message' => 'An error occurred'
            ];
        }
    }
    public function getbyid(): void{
        echo 'uou';
    }
}