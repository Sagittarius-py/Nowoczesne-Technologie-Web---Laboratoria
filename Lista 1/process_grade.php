<?php
include_once 'db.php';

$studentId = $_POST['student_id'];
$semesterId = $_POST['semester_id'];
$subjec_id = $_POST['subjectId'];
$grade = $_POST['grade'];
$date = $_POST['date'];
$instructor = $_POST['instructor'];

$sql = "INSERT INTO grades (subject_id, grade, date, instructor, semester_id, student_id) VALUES ('$subjec_id', '$grade', '$date', '$instructor', '$semesterId', $studentId)";
$conn->query($sql);

header("Location: student.php?id=$studentId");
