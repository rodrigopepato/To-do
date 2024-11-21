<?php

require '../vendor/autoload.php';

use App\Database;
use App\Task;

// Conexão com o banco
$db = new Database();
$conn = $db->connection;
$task = new Task($conn);

if (isset($_GET['id'])) {
    $taskId = intval($_GET['id']);
    $task->markTaskDone($taskId);
}

header("Location: index.php");
exit;
