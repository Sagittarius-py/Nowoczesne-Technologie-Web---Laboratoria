<?php
include_once 'db.php';

$name = $_POST['name'];
$semesterId = $_POST['semester_id'];

$sql = "INSERT INTO subjects (name, semester_id) VALUES ('$name', '$semesterId')";
$conn->query($sql);

header("Location: semester_subjects.php?id=$semesterId");
