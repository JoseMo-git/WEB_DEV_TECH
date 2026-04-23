<?php
class Student {
    private $conn;
    private $table = "students";

    public $id;
    public $name;
    public $email;
    public $course;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO $this->table (name, email, course)
                  VALUES (:name, :email, :course)";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':course' => $this->course
        ]);
    }

    public function read() {
        return $this->conn->query("SELECT * FROM $this->table");
    }

    public function delete() {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = :id");
        return $stmt->execute([':id' => $this->id]);
    }

    public function update() {
        $query = "UPDATE $this->table 
                  SET name = :name, email = :email, course = :course 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':course' => $this->course,
            ':id' => $this->id
        ]);
    }

    public function readOne() {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->execute([':id' => $this->id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}