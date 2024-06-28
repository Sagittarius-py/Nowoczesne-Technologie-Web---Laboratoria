<?php
// Połączenie z bazą danych
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dziekanat";

$conn = new mysqli($servername, $username, $password, $dbname);

// Funkcje do pobierania danych

function getStudents()
{
    global $conn;
    $sql = "SELECT * FROM students ORDER BY current_semester";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getStudent($id)
{
    global $conn;
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function getStudentSemesters($studentId)
{
    global $conn;
    $sql = "SELECT DISTINCT semester_id
    FROM grades
    WHERE student_id = $studentId";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getSemesterGrades($semesterId, $studentId)
{
    global $conn;
    $sql = "SELECT grades.*, subjects.name AS subject_name FROM grades LEFT JOIN subjects ON subjects.id = grades.subject_id WHERE grades.semester_id = $semesterId AND grades.student_id = $studentId";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getSemesterSubjects($semesterId)
{
    global $conn;
    $sql = "SELECT * FROM subjects WHERE semester_id = $semesterId";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getSemesterSubjectsWithoutGrades($semesterId, $studentId)
{
    global $conn;

    // Pobieramy przedmioty danego semestru, które nie mają ocen dla danego studenta
    $sql = "SELECT * FROM subjects WHERE semester_id = $semesterId AND id NOT IN (SELECT DISTINCT subject_id FROM grades WHERE student_id = $studentId AND semester_id = $semesterId)";
    $result = $conn->query($sql);
    $subjects_without_grades = $result->fetch_all(MYSQLI_ASSOC);

    return $subjects_without_grades;
}



function getAllSemesters()
{
    global $conn;
    $sql = "SELECT * FROM semesters";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
