<?php
require '../config/database.php';
require '../models/Student.php';

$db = (new Database())->connect();
$student = new Student($db);
$result = $student->read();
?>

<link rel="stylesheet" href="../assets/css/style.css">

<h2>Student List</h2>
<a href="create.php">Add Student</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['course'] ?></td>
    <td>
        <a href="delete.php?id=<?= $row['id'] ?>"
        onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
    </td>
</tr>
<?php endwhile; ?>
</table>