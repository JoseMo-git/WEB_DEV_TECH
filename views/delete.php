<?php
require '../config/database.php';
require '../models/Student.php';

$db = (new Database())->connect();
$student = new Student($db);

if (isset($_GET['id'])) {
    $student->id = $_GET['id'];
    $student->delete();
}

header("Location: index.php");
exit();