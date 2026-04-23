<?php
require '../config/database.php';

$db = (new Database())->connect();

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];

$stmt = $db->prepare("UPDATE students 
    SET name = :name, email = :email, course = :course 
    WHERE id = :id");

$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':course', $course);
$stmt->bindParam(':id', $id);

$stmt->execute();

header("Location: ../views/index.php?msg=updated");