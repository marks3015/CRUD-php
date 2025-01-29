<?php
require 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if (!empty($nome) && !empty($email)) {
        try {
            $sql = "INSERT INTO pessoas (nome, email) VALUES (:nome, :email)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            header("Location: index.php?success=1");
            exit();
        } catch (PDOException $e) {
            echo "Erro ao inserir: " . $e->getMessage();
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
} else {
    header("Location: create.php");
    exit();
}
?>
