<!DOCTYPE html>
<html>

<head>
    <title>Edycja Studenta</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <nav>
        <a href="index.php">Strona Główna</a> |
        <a href="create_student.php">Dodaj Studenta</a> |
        <a href="create_subject.php">Dodaj Przedmiot</a> |
    </nav>
    <div id="container">
        <h1>Edycja Studenta</h1>
        <?php
        include_once 'db.php';
        $studentId = $_GET['id'];
        $student = getStudent($studentId);
        ?>

        <form action="process_edit_student.php" method="POST">
            <input type="hidden" name="student_id" value="<?= $studentId ?>">
            <label for="name">Imię i Nazwisko:</label><br>
            <input type="text" id="name" name="name" value="<?= $student['name'] ?>"><br>
            <label for="album_number">Nr Albumu:</label><br>
            <input type="text" id="album_number" name="album_number" value="<?= $student['album_number'] ?>"><br>
            <label for="current_semester">Aktualny Semestr:</label><br>
            <input type="number" id="current_semester" name="current_semester" value="<?= $student['current_semester'] ?>" min="1" max="7"><br>
            <input type="submit" value="Zapisz zmiany">
        </form>
    </div>
</body>

</html>