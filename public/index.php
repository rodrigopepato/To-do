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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h1>To-Do List</h1>
</header>

<main>
    <div class="task-container">
        <a href="add_task.php" class="add-task-button">Adicionar Tarefa</a>
        <ul>
            <?php if ($tasks->num_rows > 0): ?>
                <?php while ($row = $tasks->fetch_assoc()): ?>
                    <li>
                        <div class="task-content">
                            <?php if ($row['is_done']): ?>
                                <a href="mark_pending.php?id=<?= $row['id'] ?>" style="text-decoration: none; color: gray;">
                                    <s><?= htmlspecialchars($row['description']) ?></s>
                                </a>
                            <?php else: ?>
                                <?= htmlspecialchars($row['description']) ?>
                            <?php endif; ?>
                        </div>
                        <div class="task-actions">
                            <?php if (!$row['is_done']): ?>
                                <a href="mark_done.php?id=<?= $row['id'] ?>">✔</a>
                            <?php endif; ?>
                            <a href="delete_task.php?id=<?= $row['id'] ?>" style="color: red;">❌</a>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <li style="text-align: center; color: gray;">Adicione uma tarefa</li>
            <?php endif; ?>
        </ul>
    </div>
</main>
</body>
</html>
