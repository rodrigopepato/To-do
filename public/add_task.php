<?php

require '../vendor/autoload.php';

use App\Database;
use App\Task;

// Conexão com o banco
$db = new Database();
$conn = $db->connection;
$task = new Task($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['description'])) {
    $description = trim($_POST['description']);
    if (!empty($description)) {
        $task->addTask($description);
        header("Location: index.php");
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
</head>
<body>
    <h1>Adicionar Nova Tarefa</h1>
    <form action="" method="POST">
        <input type="text" name="description" placeholder="Descrição da tarefa" required>
        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
