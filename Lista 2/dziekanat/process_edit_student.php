<?php
include_once 'db.php';

// Sprawdź, czy formularz został wysłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobierz dane z formularza
    $studentId = $_POST['student_id'];
    $name = $_POST['name'];
    $albumNumber = $_POST['album_number'];
    $currentSemester = $_POST['current_semester'];

    // Aktualizuj dane studenta w bazie danych
    $sql = "UPDATE students SET name = '$name', album_number = '$albumNumber', current_semester = '$currentSemester' WHERE id = '$studentId'";
    if ($conn->query($sql) === TRUE) {
        echo "Dane studenta zostały zaktualizowane pomyślnie.";
    } else {
        echo "Błąd podczas aktualizowania danych studenta: " . $conn->error;
    }
}

// Przekieruj użytkownika z powrotem do strony informacji o studencie
header("Location: student.php?id=$studentId");
