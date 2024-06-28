<?php
include_once 'db.php';
$semesterId = $_GET['semester_id'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dodaj Oceny</title>
</head>

<body>
    <h1>Dodaj Oceny</h1>
    
    <form action="process_grade.php" method="POST">
        <label for="subject">Przedmiot:</label><br>
        <input type="text" id="subject" name="subject"><br>
        <label for="grade">Ocena:</label><br>
        <input type="number" id="grade" name="grade" min="2" max="5"><br>
        <label for="date">Data:</label><br>
        <input type="date" id="date" name="date"><br>
        <label for="instructor">Prowadzący:</label><br>
        <input type="text" id="instructor" name="instructor"><br>
        <input type="submit" value="Dodaj">
    </form>
</body>

</html>