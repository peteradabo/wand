<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO Course (name, description) VALUES (?, ?)");
    $stmt->execute([$name, $desc]);
    echo "Course added!";
}
?>

<form method="post">
    Name: <input name="name"><br>
    Description: <textarea name="description"></textarea><br>
    <button type="submit">Add Course</button>
</form>