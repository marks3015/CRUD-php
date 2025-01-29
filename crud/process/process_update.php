<?php
require_once '../config/database.php';
require_once '../classes/Pessoa.php';
require_once '../classes/PessoaDAO.php';

$pessoaDAO = new PessoaDAO($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if (!empty($nome) && !empty($email)) {
        $pessoa = new Pessoa($nome, $email, $id);
        if ($pessoaDAO->update($pessoa)) {
            header("Location: ../index.php?success=1");
            exit();
        } else {
            header("Location: ../update.php?id=$id&error=1");
            exit();
        }
    } else {
        header("Location: ../update.php?id=$id&error=1");
        exit();
    }
}
?>
