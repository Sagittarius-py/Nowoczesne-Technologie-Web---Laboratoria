<?php
include_once 'db.php';
$studentId = $_GET['id'];
$student = getStudent($studentId);
$semesters = getStudentSemesters($studentId);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Informacje o Studencie</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <nav>
        <a href="index.php">Strona Główna</a> |
        <a href="create_student.php">Dodaj Studenta</a> |
        <a href="create_subject.php">Dodaj Przedmiot</a> |
    </nav>
    <div id="container">
        <h1>Informacje o Studencie</h1>
        <h2><?= $student['name'] ?></h2>
        <p>Nr albumu: <?= $student['album_number'] ?></p>
        <p>Aktualny semestr: <?= $student['current_semester'] ?></p>
        [<a href="edit_student.php?id=<?= $studentId ?>">Zmień</a>] <!-- Dodaj link do edycji studenta -->
        [<a href="delete_student.php?id=<?= $studentId ?>">Usuń</a>] <!-- Dodaj link do usuwania studenta -->
        [<a href="add_grade.php?semester_id=<?= $student['current_semester'] ?>&student_id=<?= $studentId ?>">Dodaj Oceny</a>]
        [<a href="semester_grades.php?semester_id=<?= $student['current_semester'] ?>&student_id=<?= $studentId ?>">Oceny</a>]
        <h2>Semestry</h2>
        <ul>
            <?php foreach ($semesters as $semester) : ?>
                <li>
                    <?= $semester['semester_id'] ?>
                    [<a href="semester_grades.php?semester_id=<?= $semester['semester_id'] ?>&student_id=<?= $studentId ?>">Oceny</a>]
                </li>
            <?php endforeach; ?>
        </ul>
        <h2>Zmień aktualny semestr</h2>
        <form action="process_semester.php" method="POST">
            <input type="hidden" name="student_id" value="<?= $studentId ?>">
            <label for="new_semester">Nowy Semestr:</label><br>
            <input type="number" id="new_semester" name="new_semester" min="1" max="7"><br>
            <input type="submit" value="Zmień">
        </form>
    </div>
</body>

</html>