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
    public function getbyid(string $id): array{
        $query = $this->db->prepare("SELECT * FROM projetos WHERE id_stand = :id");
        $query->bindValue(":id",$id);
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
                    'message' => "Project of id $id not found in database"
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
    public function getbyods(string $ods): array{
        $query = $this->db->prepare("SELECT * FROM projetos WHERE ods LIKE :ods");
        $query->bindValue(":ods","%$ods%");
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
                    'message' => "Project of ods $ods not found in database"
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
    public function getbyname(string $name): array{
        $query = $this->db->prepare("SELECT * FROM projetos WHERE nome LIKE :nome");
        $query->bindValue(":nome","%$name%");
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
                    'message' => "Project of name $name not found in database"
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
    public function getbyclass(string $class): array{
        $query = $this->db->prepare("SELECT * FROM projetos WHERE turma LIKE :turma");
        $query->bindValue(":turma","%$class%");
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
                    'message' => "Project of class $class not found in database"
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
    public function getbyperiodo(string $periodo): array{
        $query = $this->db->prepare("SELECT * FROM projetos WHERE periodo LIKE :periodo");
        $query->bindValue(":periodo","%$periodo%");
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
                    'message' => "Project of period $periodo not found in database"
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
    public function getbycourse(string $course): array{
        $query = $this->db->prepare("SELECT * FROM projetos WHERE curso LIKE :course");
        $query->bindValue(":course","%$course%");
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
                    'message' => "Project of course $course not found in database"
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
    
}