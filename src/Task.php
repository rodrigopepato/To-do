<?php

namespace App;

class Task
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllTasks()
    {
        $sql = "SELECT * FROM tasks ORDER BY created_at DESC";
        return $this->db->query($sql);
    }

    public function addTask($description)
    {
        $stmt = $this->db->prepare("INSERT INTO tasks (description) VALUES (?)");
        $stmt->bind_param("s", $description);
        return $stmt->execute();
    }

    public function markTaskDone($id)
    {
        $stmt = $this->db->prepare("UPDATE tasks SET is_done = 1 WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function markTaskPending($id)
    {
        $stmt = $this->db->prepare("UPDATE tasks SET is_done = 0 WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }


    public function getTaskById($id)
    {
        $query = "SELECT * FROM tasks WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateTask($id, $description)
    {
        $query = "UPDATE tasks SET description = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $description, $id);
        return $stmt->execute();
    }


    public function deleteTask($id)
    {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
