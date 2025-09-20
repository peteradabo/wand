<?php
include 'db.php';

// Fetch students and courses for dropdowns
$students = $pdo->query("SELECT id, name FROM Student")->fetchAll(PDO::FETCH_ASSOC);
$courses = $pdo->query("SELECT id, name FROM Course")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stud_id = $_POST['stud_id'];
    $course_id = $_POST['course_id'];
    $desc = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO Reg_Student (stud_id, course_id, description) VALUES (?, ?, ?)");
    $stmt->execute([$stud_id, $course_id, $desc]);
    echo "Student registered to course!";
}
?>

<form method="post">
    Student:
    <select name="stud_id">
        <?php foreach ($students as $student): ?>
        <option value="<?= $student['id'] ?>"><?= htmlspecialchars($student['name']) ?></option>
        <?php endforeach; ?>
    </select><br>

    Course:
    <select name="course_id">
        <?php foreach ($courses as $course): ?>
        <option value="<?= $course['id'] ?>"><?= htmlspecialchars($course['name']) ?></option>
        <?php endforeach; ?>
    </select><br>

    Description: <textarea name="description"></textarea><br>
    <button type="submit">Register</button>
</form>