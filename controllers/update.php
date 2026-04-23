<?php
require '../config/database.php';
require '../models/Student.php';

$db = (new Database())->connect();
$student = new Student($db);

$student->id = trim($_POST['id']);
$student->name = trim($_POST['name']);
$student->email = trim($_POST['email']);
$student->course = trim($_POST['course']);

if (empty($student->name) || empty($student->email) || empty($student->course) || !filter_var($student->email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../views/index.php?msg=invalid");
    exit();
}

if ($student->update()) {
    header("Location: ../views/index.php?msg=updated");
} else {
    header("Location: ../views/index.php?msg=error");
}