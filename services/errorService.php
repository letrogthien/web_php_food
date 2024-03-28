<?php

require_once '../database/database.php';

class ErrorService
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Database();
    }

    public function addError($error_message)
    {
        try {
            $sql = "INSERT INTO exception (time, message) VALUES (NOW(), :error_message)";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':error_message', $error_message);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getErrorById($error_id)
    {
        try {
            $sql = "SELECT * FROM exception WHERE id = :error_id";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':error_id', $error_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
