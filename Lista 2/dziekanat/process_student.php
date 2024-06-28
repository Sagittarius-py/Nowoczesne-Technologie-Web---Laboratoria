<?php
include_once 'db.php';

$name = $_POST['name'];
$albumNumber = $_POST['album_number'];
$currentSemester = $_POST['current_semester'];

$sql = "INSERT INTO students (name, album_number, current_semester) VALUES ('$name', '$albumNumber', '$currentSemester')";
$conn->query($sql);

header("Location: index.php");
