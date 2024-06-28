<?php
include_once 'db.php';

$semesterId = $_GET['id'];
$subjects = getSemesterSubjects($semesterId);

// Obsługa formularza edycji przedmiotu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_subject'])) {
    $subjectId = $_POST['subject_id'];
    $editedName = $_POST['edited_name'];
    $sql = "UPDATE subjects SET name = '$editedName' WHERE id = '$subjectId'";
    if ($conn->query($sql) === TRUE) {
        echo "Przedmiot został zaktualizowany pomyślnie.";
        // Odśwież stronę po zaktualizowaniu przedmiotu
        header("Refresh:0");
    } else {
        echo "Błąd podczas aktualizowania przedmiotu: " . $conn->error;
    }
}

// Obsługa formularza usuwania przedmiotu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_subject'])) {
    $subjectId = $_POST['subject_id'];
    $sql = "DELETE FROM subjects WHERE id = '$subjectId'";
    if ($conn->query($sql) === TRUE) {
        echo "Przedmiot został usunięty pomyślnie.";
        // Odśwież stronę po usunięciu przedmiotu
        header("Refresh:0");
    } else {
        echo "Błąd podczas usuwania przedmiotu: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Przedmioty Semestru</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <nav>
        <a href="index.php">Strona Główna</a> |
        <a href="create_student.php">Dodaj Studenta</a> |
        <a href="create_subject.php">Dodaj Przedmiot</a> |
    </nav>
    <div id="container">
        <h1>Dodaj Przedmiot</h1>
        <form action="process_subject.php" method="POST">
            <label for="name">Nazwa Przedmiotu:</label><br>
            <input type="text" id="name" name="name"><br>
            <input type="hidden" name="semester_id" value="<?= $semesterId ?>"><br>
            <input type="submit" value="Dodaj">
        </form>

        <h1>Przedmioty Semestru</h1>
        <table>
            <tr>
                <th>Nazwa Przedmiotu</th>
                <th>Akcje</th>
            </tr>
            <?php foreach ($subjects as $subject) : ?>
                <tr>
                    <td><?= $subject['name'] ?></td>
                    <td>
                        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) . '?' . http_build_query($_GET); ?>" method="POST">
                            <input type="hidden" name="subject_id" value="<?= $subject['id'] ?>">
                            <input type="text" name="edited_name" value="<?= $subject['name'] ?>">
                            <input type="submit" name="edit_subject" value="Edytuj">
                        </form>
                        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) . '?' . http_build_query($_GET); ?>" method="POST">
                            <input type="hidden" name="subject_id" value="<?= $subject['id'] ?>">
                            <input type="submit" name="delete_subject" value="Usuń">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>