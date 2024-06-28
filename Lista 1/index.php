<?php
include_once 'db.php';
$students = getStudents();
$semesters = getAllSemesters();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista Studentów</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <nav>
        <a href="index.php">Strona Główna</a> |
        <a href="create_student.php">Dodaj Studenta</a> |
        <a href="create_subject.php">Dodaj Przedmiot</a> |
    </nav>
    <div id="container">
        <h1>Lista Studentów</h1>
        <table>
            <tr>
                <th>Imię i Nazwisko</th>
                <th>Nr Albumu</th>
                <th>Aktualny Semestr</th>
            </tr>
            <?php foreach ($students as $student) : ?>
                <tr>
                    <td><a href="student.php?id=<?= $student['id'] ?>"><?= $student['name'] ?></a></td>
                    <td><?= $student['album_number'] ?></td>
                    <td><?= $student['current_semester'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h1>Lista Semestrów</h1>
        <ul>
            <?php foreach ($semesters as $semester) : ?>
                <li><a href="semester_subjects.php?id=<?= $semester['id'] ?>"><?= $semester['name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>