<?php
namespace MinhasTarefas\Model;

class Tarefas{
    private string $table_name = "tarefas";
    private $conexao;

    public int $id_tarefa;
    public int $id_usuario;
    public string $titulo;
    public string $descricao;

    public function __construct($db) {
        $this->conexao = $db;
    }

    // Criar usuário
    public function create() {
        $query = 'INSERT INTO ' . $this->table_name . ' SET id_usuario = :id_usuario, titulo = :titulo, descricao = :descricao';
        $stmt = $this->conexao->prepare($query);
        $this->id_usuario = htmlspecialchars(strip_tags($this->id_usuario));
        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));

        $stmt->bindParam(':id_usuario', $this->id_usuario);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':descricao', $this->descricao);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Ler usuários
    public function getAll() {
        $query = 'SELECT * FROM ' . $this->table_name;
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Obter usuário pelo ID
    public function getUserById($id_tarefa) {
        $query = 'SELECT * FROM ' . $this->table_name . ' WHERE id_tarefa = :id_tarefa';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':id', $id_tarefa);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            $this->id_tarefa = $row['id_tarefa'];
            $this->id_usuario = $row['id_usuario'];
            $this->titulo = $row['titulo'];
            $this->descricao = $row['descricao'];
            return $row;
        }
        return [];
    }


    // Atualizar usuário
    public function update() {
        $query = 'UPDATE ' . $this->table_name . ' SET id_usuario = :id_usuario, titulo = :titulo, descricao = :descricao, WHERE id_tarefa = :id_tarefa';
        $stmt = $this->conexao->prepare($query);
        $this->id_usuario = htmlspecialchars(strip_tags($this->id_usuario));
        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->id_tarefa = htmlspecialchars(strip_tags($this->id_tarefa));
        $stmt->bindParam(':id_usuario', $this->id_usuario);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':id_tarefa', $this->id_tarefa);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Deletar usuário
    public function remove() {
        $query = 'DELETE FROM ' . $this->table_name . ' WHERE id_tarefa = :id_tarefa';
        $stmt = $this->conexao->prepare($query);

        $this->id_tarefa = (int) $this->id_tarefa;
        $stmt->bindParam(':id_tarefa', $this->id_tarefa);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
};

