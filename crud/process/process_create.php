<?php
require_once '../config/database.php';
require_once '../classes/Pessoa.php';
require_once '../classes/PessoaDAO.php';

$pessoaDAO = new PessoaDAO($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if (!empty($nome) && !empty($email)) {
        $pessoa = new Pessoa($nome, $email);
        if ($pessoaDAO->create($pessoa)) {
            header("Location: ../index.php?success=1");
            exit();
        } else {
            header("Location: ../create.php?error=1");
            exit();
        }
    } else {
        header("Location: ../create.php?error=1");
        exit();
    }
}
?>