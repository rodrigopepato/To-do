<?php

namespace App;

use mysqli;

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'todo_list';
    public $connection;

public function __construct($host = 'localhost', $user = 'root', $password = '', $database = 'todo_list')
{
    $this->connection = new mysqli($host, $user, $password, $database);

    if ($this->connection->connect_error) {
        die("Database connection failed: " . $this->connection->connect_error);
    }
}
}
