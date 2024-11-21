<?php

require '../vendor/autoload.php';

use App\Database;
use App\Task;

// Conexão com o banco
$db = new Database();
$conn = $db->connection;

// Instância da classe Task
$task = new Task($conn);

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
    <a href="add_task.php">Adicionar Tarefa</a>
    <ul>
        <?php while ($row = $tasks->fetch_assoc()): ?>
            <li>
                <?= $row['is_done']
                    ? '<s>' . htmlspecialchars($row['description']) . '</s>'
                    : htmlspecialchars($row['description']) ?>

                <?php if (!$row['is_done']): ?>
                    <a href="mark_done.php?id=<?= $row['id'] ?>">✔</a>
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
