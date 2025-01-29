<?php
require 'config/database.php';

// Verifica se o ID foi passado pela URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int)$_GET['id']; // Garante que o ID é um número inteiro

    try {
        // Deleta o registro do banco de dados
        $sql = "DELETE FROM pessoas WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Redireciona para a página inicial com uma mensagem de sucesso
        header("Location: index.php?delete_success=1");
        exit();
    } catch (PDOException $e) {
        die("Erro ao excluir registro: " . $e->getMessage());
    }
} else {
    // Redireciona para a página inicial se o ID não for fornecido
    header("Location: index.php?error=1");
    exit();
}
?>
