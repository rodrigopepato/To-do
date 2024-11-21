<?php

require '../vendor/autoload.php';

use App\Database;

// Testando a conexão
try {
    $db = new Database();
    echo "Conexão com o banco de dados estabelecida com sucesso!";
} catch (Exception $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
