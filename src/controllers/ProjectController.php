<?php

namespace Api\Controllers;
use Api\Database, PDO;

class ProjectController{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance(_CONF);
    }
    public function get(){
        $query = $this->db->prepare("SELECT * FROM projetos");
        if($query->execute()){
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            if(count($results) > 0){
                return [
                    'code' => 200,
                    'data' => $results
                ];
            }else{
                return [
                    'code'=> 200,
                    'data' => 'No projects found in database'
                ];
            }
        }
    }
    public function getbyid(): void{
        echo 'uou';
    }
}