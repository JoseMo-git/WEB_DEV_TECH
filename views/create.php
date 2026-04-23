<?php
require '../config/database.php';
require '../models/Student.php';

$db = (new Database())->connect();
$student = new Student($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['course'])) {

        $student->name = $_POST['name'];
        $student->email = $_POST['email'];
        $student->course = $_POST['course'];

        if ($student->create()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error adding student";
        }

    } else {
        echo "All fields are required!";
    }
}
?>

<h2>Add Student</h2>

<form method="POST">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    Course: <input type="text" name="course"><br><br>
    <button type="submit">Add</button>
</form>