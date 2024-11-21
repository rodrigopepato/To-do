<?php

require '../vendor/autoload.php';

use App\Database;
use App\Task;

// Conexão com o banco de dados
$db = new Database();
$conn = $db->connection;

// Instância da classe Task
$task = new Task($conn);

// Lidar com o envio do formulário para adicionar uma nova tarefa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['description'])) {
    $description = trim($_POST['description']);

    // Validação simples
    if (!empty($description)) {
        $task->addTask($description);
        header("Location: index.php"); // Redireciona para evitar reenvio do formulário
        exit;
    } else {
        $error = "A descrição da tarefa não pode estar vazia!";
    }
}

// Buscar todas as tarefas
$tasks = $task->getAllTasks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>
    <h1>Lista de Tarefas</h1>

    <!-- Formulário para adicionar tarefas -->
    <form action="" method="POST">
        <input type="text" name="description" placeholder="Descrição da tarefa" required>
        <button type="submit">Adicionar</button>
    </form>

    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <!-- Exibir tarefas -->
    <ul>
        <?php while ($row = $tasks->fetch_assoc()): ?>
            <li>
                <?= $row['is_done'] ? '<s>' . htmlspecialchars($row['description']) . '</s>' : htmlspecialchars($row['description']) ?>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
