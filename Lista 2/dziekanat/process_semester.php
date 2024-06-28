<?php
include_once 'db.php';

$studentId = $_POST['student_id'];
$newSemester = $_POST['new_semester']; // Zaktualizowana nazwa zmiennej

// Zaktualizuj aktualny semestr studenta
$sql = "UPDATE students SET current_semester = '$newSemester' WHERE id = '$studentId'";
$conn->query($sql);

header("Location: student.php?id=$studentId");
