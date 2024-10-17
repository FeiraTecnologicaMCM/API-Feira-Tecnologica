<?php

namespace Api\Controllers;
use Api\Database, PDO;

class VotosController{
    private $db;
    
    public function __construct(){
        //CONSTANTE DEFINIDA NO index.php
        $this->db = Database::getInstance(_CONF);
    }

    public function projetoMaisVotado(): array {
        $sql = "SELECT projeto_id, COUNT(*) as total_votos 
                FROM Votos 
                GROUP BY projeto_id 
                ORDER BY total_votos DESC 
                LIMIT 10"; // Modificado para retornar os 10 mais votados
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Usar fetchAll para pegar todos os resultados
    
        if ($resultados) {
            return [
                'code' => 200,
                'data' => $resultados, // Retorna todos os projetos mais votados
                'message' => 'Top 10 projetos mais votados encontrados.'
            ];
        } else {
            return [
                'code' => 404,
                'data' => null,
                'message' => 'Nenhum voto registrado.'
            ];
        }
    }
    
    public function registrarVoto(): array {
        // Obtém o JSON do corpo da requisição
        $data = json_decode(file_get_contents('php://input'), true);
    
        // Verifica se os campos não são nulos
        if (empty($data['projeto_id']) || empty($data['telefone'])) {
            return [
                'code' => 400,
                'data' => null,
                'message' => 'Todos os campos são obrigatórios.'
            ];
        }
    
        // Valida o telefone
        if (!preg_match('/^\+?\d{10,15}$/', $data['telefone'])) {
            return [
                'code' => 400,
                'data' => null,
                'message' => 'Telefone inválido.'
            ];
        }
    
        // Verifica se o telefone já votou
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM Votos WHERE telefone = :telefone");
        $stmt->execute(['telefone' => $data['telefone']]);
        if ($stmt->fetchColumn() > 0) {
            return [
                'code' => 403,
                'data' => null,
                'message' => 'Cada telefone pode votar apenas uma vez.'
            ];
        }
    
        // Registra o voto
        $stmt = $this->db->prepare("INSERT INTO Votos (projeto_id, telefone) VALUES (:projeto_id, :telefone)");
        $stmt->execute(['projeto_id' => $data['projeto_id'], 'telefone' => $data['telefone']]);
    
        return [
            'code' => 200,
            'data' => [
                'projeto_id' => $data['projeto_id'],
                'telefone' => $data['telefone']
            ],
            'message' => 'Voto registrado com sucesso.'
        ];
    }    

}