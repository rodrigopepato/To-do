<?php

require '../vendor/autoload.php';

use App\Database;
use App\Task;

// Conexão com o banco de dados
$db = new Database();
$conn = $db->connection;

// Instância da classe Task
$task = new Task($conn);

// Buscando as tarefas
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
