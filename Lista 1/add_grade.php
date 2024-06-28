<?php
include_once 'db.php';
$semesterId = $_GET['semester_id'];
$studentId = $_GET['student_id'];
$student = getStudent($studentId);
// $subjects = getSemesterSubjects($semesterId);
$subjects = getSemesterSubjectsWithoutGrades($semesterId, $studentId);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Dodaj Oceny</title>
</head>

<body>

    <nav>
        <a href="index.php">Strona Główna</a> |
        <a href="create_student.php">Dodaj Studenta</a> |
        <a href="create_subject.php">Dodaj Przedmiot</a> |
    </nav>


    <div id="container">
        <h1>Dodaj Oceny</h1>
        <h1>Student: <?= $student['album_number'] ?></h1>
        <form action="process_grade.php" method="POST">
            <input type="hidden" name="student_id" value="<?= $_GET['student_id'] ?>">
            <input type="hidden" name="semester_id" value="<?= $_GET['semester_id'] ?>">
            <label for="subject">Przedmiot:</label><br>
            <select name="subjectId" id="subjectId">
                <?php foreach ($subjects as $subject) : ?>
                    <option value="<?= $subject['id'] ?>"><?= $subject['name'] ?></option>
                <?php endforeach; ?>
            </select><br />
            <label for="grade">Ocena:</label><br>
            <input type="number" id="grade" name="grade" min="2" max="5"><br>
            <label for="date">Data:</label><br>
            <input type="date" id="date" name="date" value="<?= date('Y-m-d') ?>"><br>
            <label for="instructor">Prowadzący:</label><br>
            <input type="text" id="instructor" name="instructor"><br>
            <input type="submit" value="Dodaj">
        </form>
    </div>
</body>

</html>