<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../classes/PessoaDAO.php';

$pessoaDAO = new PessoaDAO($pdo);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int)$_GET['id'];
    if ($pessoaDAO->delete($id)) {
        header("Location: index.php?delete_success=1");
        exit();
    } else {
        header("Location: index.php?delete_error=1");
        exit();
    }
} else {
    header("Location: index.php?error=1");
    exit();
}
?>