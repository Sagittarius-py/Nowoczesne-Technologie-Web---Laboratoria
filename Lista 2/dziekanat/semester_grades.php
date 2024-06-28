<?php
include_once 'db.php';

// Sprawdź, czy przekazano identyfikator semestru i studenta
if (isset($_GET['semester_id']) && isset($_GET['student_id'])) {
    $semesterId = $_GET['semester_id'];
    $studentId = $_GET['student_id'];
    $grades = getSemesterGrades($semesterId, $studentId);
}

// Sprawdź, czy formularz edycji oceny został wysłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_grade'])) {
        $gradeId = $_POST['grade_id'];
        $editedGrade = $_POST['edited_grade'];
        $editedDate = $_POST['edited_date'];
        $editedInstructor = $_POST['edited_instructor'];

        // Edytuj ocenę w bazie danych
        $sql = "UPDATE grades SET grade = '$editedGrade', date = '$editedDate', instructor = '$editedInstructor' WHERE id = '$gradeId'";
        if ($conn->query($sql) === TRUE) {
            header("Refresh:0");
        } else {
            echo "Błąd podczas aktualizowania oceny: " . $conn->error;
        }
    }

    // Sprawdź, czy formularz usuwania oceny został wysłany
    if (isset($_POST['delete_grade'])) {
        $gradeId = $_POST['grade_id'];

        // Usuń ocenę z bazy danych
        $sql = "DELETE FROM grades WHERE id = '$gradeId'";
        if ($conn->query($sql) === TRUE) {
            header("Refresh:0");
        } else {
            echo "Błąd podczas usuwania oceny: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Oceny Semestru</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
    <nav>
        <a href="index.php">Strona Główna</a> |
        <a href="create_student.php">Dodaj Studenta</a> |
        <a href="create_subject.php">Dodaj Przedmiot</a> |
    </nav>
    <div id="container">
        <h1>Oceny Semestru</h1>
        <table>
            <tr>
                <th>Przedmiot</th>
                <th>Ocena</th>
                <th>Data</th>
                <th>Prowadzący</th>
                <th>Akcje</th>
            </tr>
            <?php foreach ($grades as $grade) : ?>
                <tr>
                    <td><?= $grade['subject_name'] ?></td>
                    <td><?= $grade['grade'] ?></td>
                    <td><?= $grade['date'] ?></td>
                    <td><?= $grade['instructor'] ?></td>
                    <td>
                        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) . '?' . http_build_query($_GET); ?>" method="POST">
                            <input type="hidden" name="grade_id" value="<?= $grade['id'] ?>">
                            <label for="edited_grade">Ocena:</label>
                            <input type="number" id="edited_grade" name="edited_grade" value="<?= $grade['grade'] ?>" min="2" max="5">
                            <label for="edited_date">Data:</label>
                            <input type="date" id="edited_date" name="edited_date" value="<?= $grade['date'] ?>">
                            <label for="edited_instructor">Prowadzący:</label>
                            <input type="text" id="edited_instructor" name="edited_instructor" value="<?= $grade['instructor'] ?>">
                            <input type="submit" name="edit_grade" value="Edytuj">
                        </form>
                        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) . '?' . http_build_query($_GET); ?>" method="POST">
                            <input type="hidden" name="grade_id" value="<?= $grade['id'] ?>">
                            <input type="submit" name="delete_grade" value="Usuń">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>