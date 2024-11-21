<?php
require '../vendor/autoload.php';

use App\Database;
use App\Task;

// Conexão com o banco
$db = new Database();
$conn = $db->connection;

// Instância da classe Task
$task = new Task($conn);

// Obtém a tarefa pelo ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $taskData = $task->getTaskById($id);
}

// Atualiza a tarefa no banco de dados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $description = htmlspecialchars($_POST['description']);
    $task->updateTask($id, $description);
    header('Location: index.php'); // Redireciona para a lista
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main>
    <div class="edit-task-container">
        <h2>Atualizar Tarefa</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $taskData['id'] ?>">
            <input type="text" name="description" value="<?= htmlspecialchars($taskData['description']) ?>" required>
            <button type="submit">Salvar</button>
        </form>
        <!-- Link para voltar à lista -->
        <a href="index.php" class="back-to-list">Voltar para a Lista</a>
    </div>
</main>

</body>
</html>
