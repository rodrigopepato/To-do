<?php
require '../vendor/autoload.php';

use App\Database;
use App\Task;

$db = new Database();
$conn = $db->connection;

$task = new Task($conn);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $taskData = $task->getTaskById($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $description = htmlspecialchars($_POST['description']);
    $task->updateTask($id, $description);
    header('Location: index.php'); // Redireciona após salvar
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
</head>
<body>
    <h1>Editar Tarefa</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $taskData['id'] ?>">
        <input type="text" name="description" value="<?= htmlspecialchars($taskData['description']) ?>" required>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
