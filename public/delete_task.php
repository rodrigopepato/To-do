<?php

require '../vendor/autoload.php';

use App\Database;
use App\Task;

// Conexão com o banco
$db = new Database();
$conn = $db->connection;
$task = new Task($conn);

// Verificar se o ID foi passado na URL
if (isset($_GET['id'])) {
    $taskId = intval($_GET['id']); // Sanitizar o ID
    $task->deleteTask($taskId);   // Chamar o método para excluir a tarefa
    header("Location: index.php"); // Redirecionar de volta para a lista
    exit;
}
?>
