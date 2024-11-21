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
                <?php if ($row['is_done']): ?>
                    <!-- Se a tarefa estiver concluída, clicar no nome a marcará como não concluída -->
                    <a href="mark_pending.php?id=<?= $row['id'] ?>" style="text-decoration: none; color: gray;">
                        <s><?= htmlspecialchars($row['description']) ?></s>
                    </a>
                <?php else: ?>
                    <!-- Se a tarefa não estiver concluída, exibe o nome normalmente e o ícone ✔ -->
                    <?= htmlspecialchars($row['description']) ?>
                    <a href="mark_done.php?id=<?= $row['id'] ?>">✔</a>
                <?php endif; ?>
                <!-- Link para excluir a tarefa -->
                <a href="delete_task.php?id=<?= $row['id'] ?>" style="color: red;">❌</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
