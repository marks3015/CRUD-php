<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../classes/Pessoa.php';
require_once __DIR__ . '/../classes/PessoaDAO.php';


$pessoaDAO = new PessoaDAO($pdo);
$pessoas = $pessoaDAO->getAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Pessoas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function confirmarExclusao(id) {
            if (confirm("Tem certeza que deseja excluir este registro?")) {
                window.location.href = 'delete.php?id=' + id;
            }
        }
    </script>
</head>
<body>
    <div class="container mt-5 text-center">
        <h2 class="text-center">Cadastro de Pessoas</h2>
        <div class="d-flex justify-content-center mb-3">
            <a href="create.php" class="btn btn-success">Adicionar Pessoa</a>
        </div>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pessoas)): ?>
                    <?php foreach ($pessoas as $pessoa): ?>
                        <tr>
                            <td><?= htmlspecialchars($pessoa['id']) ?></td>
                            <td><?= htmlspecialchars($pessoa['nome']) ?></td>
                            <td><?= htmlspecialchars($pessoa['email']) ?></td>
                            <td>
                                <a href="update.php?id=<?= $pessoa['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="#" onclick="confirmarExclusao(<?= $pessoa['id'] ?>)" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Nenhuma pessoa cadastrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
