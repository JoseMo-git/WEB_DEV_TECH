<?php
require '../config/database.php';
require '../models/Student.php';

$db = (new Database())->connect();
$student = new Student($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);

    if (!empty($name) && !empty($email) && !empty($course) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $student->name = $name;
        $student->email = $email;
        $student->course = $course;

        if ($student->create()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error adding student";
        }

    } else {
        echo "All fields are required and email must be valid!";
    }
}
?>

<link rel="stylesheet" href="../assets/css/style.css">


<h2>Add Student</h2>

<form method="POST">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    Course: <input type="text" name="course"><br><br>
    <button type="submit">Add</button>
</form>