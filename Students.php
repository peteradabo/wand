<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $stmt = $pdo->prepare("INSERT INTO Student (name, dob, email, address) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $dob, $email, $address]);
    echo "Student added!";
}
?>

<form method="post">
    Name: <input name="name"><br>
    DOB: <input type="date" name="dob"><br>
    Email: <input name="email"><br>
    Address: <textarea name="address"></textarea><br>
    <button type="submit">Add Student</button>
</form>Changes made on 20/09/2025