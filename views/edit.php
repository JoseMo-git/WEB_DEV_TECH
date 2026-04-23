<?php
require '../config/database.php';
require '../models/Student.php';

$db = (new Database())->connect();
$student = new Student($db);

$student->id = $_GET['id'];
$row = $student->readOne();
?>

<link rel="stylesheet" href="../assets/css/style.css">

<h2>Edit Student</h2>

<form method="POST" action="../controllers/update.php">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">

    Name: <input type="text" name="name" value="<?= $row['name'] ?>"><br><br>
    Email: <input type="text" name="email" value="<?= $row['email'] ?>"><br><br>
    Course: <input type="text" name="course" value="<?= $row['course'] ?>"><br><br>

    <button type="submit">Update</button>
</form>