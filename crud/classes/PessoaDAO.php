<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/Pessoa.php';

class PessoaDAO {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Criar um novo registro
    public function create(Pessoa $pessoa) {
        $sql = "INSERT INTO pessoas (nome, email) VALUES (:nome, :email)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $pessoa->getNome());
        $stmt->bindParam(':email', $pessoa->getEmail());
        return $stmt->execute();
    }

    // Listar todas as pessoas
    public function getAll() {
        $sql = "SELECT * FROM pessoas ORDER BY id ASC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar uma pessoa pelo ID
    public function getById($id) {
        $sql = "SELECT * FROM pessoas WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Atualizar um registro
    public function update(Pessoa $pessoa) {
        $sql = "UPDATE pessoas SET nome = :nome, email = :email WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $pessoa->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':nome', $pessoa->getNome());
        $stmt->bindParam(':email', $pessoa->getEmail());
        return $stmt->execute();
    }

    // Excluir um registro
    public function delete($id) {
        $sql = "DELETE FROM pessoas WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
