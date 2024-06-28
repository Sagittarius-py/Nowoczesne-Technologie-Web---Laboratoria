<?php
include_once 'db.php';

// Sprawdź, czy przekazano identyfikator studenta do usunięcia
if (isset($_GET['id'])) {
    $studentId = $_GET['id'];

    // Usuń studenta z bazy danych
    $sql = "DELETE FROM students WHERE id = $studentId";

    if ($conn->query($sql) === TRUE) {
        echo "Student został pomyślnie usunięty.";
    } else {
        echo "Błąd podczas usuwania studenta: " . $conn->error;
    }

    // Przekieruj użytkownika na stronę główną po usunięciu studenta
    header("Location: index.php");
} else {
    echo "Nieprawidłowy identyfikator studenta.";
}
