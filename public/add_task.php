<?php

require '../vendor/autoload.php';

use App\Database;
use App\Task;

// Conexão com o banco
$db = new Database();
$conn = $db->connection;

// Instância da classe Task
$task = new Task($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = $_POST['description'] ?? '';

    if (!empty($description)) {
        // Adicionar tarefa
        $task->addTask($description);
        header('Location: index.php'); // Redireciona de volta para a lista
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Tarefa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<main>
    <div class="add-task-container">
        <h2>Adicionar Tarefa</h2>

        <form action="" method="POST">
            <input type="text" name="description" placeholder="Digite a descrição da tarefa" required>
            <button type="submit">Adicionar Tarefa</button>
        </form>

        <a href="index.php" class="back-to-list">Voltar para a lista</a>
    </div>
</main>

</body>
</html>
