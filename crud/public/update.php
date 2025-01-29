<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../classes/Pessoa.php';
require_once __DIR__ . '/../classes/PessoaDAO.php';

$pessoaDAO = new PessoaDAO($pdo);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int)$_GET['id'];
    $pessoaData = $pessoaDAO->getById($id);

    if (!$pessoaData) {
        die("Registro não encontrado.");
    }
    $pessoa = new Pessoa($pessoaData['nome'], $pessoaData['email'], $pessoaData['id']);
} else {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    
    if (!empty($nome) && !empty($email)) {
        $pessoa->setNome($nome);
        $pessoa->setEmail($email);
        if ($pessoaDAO->update($pessoa)) {
            header("Location: index.php?success=1");
            exit();
        } else {
            $erro = "Erro ao atualizar a pessoa.";
        }
    } else {
        $erro = "Por favor, preencha todos os campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pessoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Pessoa</h2>
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?= $erro ?></div>
        <?php endif; ?>
        <div class="card p-4">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($pessoa->getNome()) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($pessoa->getEmail()) ?>" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
