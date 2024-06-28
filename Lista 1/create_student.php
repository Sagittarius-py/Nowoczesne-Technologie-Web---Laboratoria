<!DOCTYPE html>
<html>

<head>
    <title>Dodaj Studenta</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <nav>
        <a href="index.php">Strona Główna</a> |
        <a href="create_subject.php">Dodaj Przedmiot</a> |
    </nav>
    <div id="container">
        <h1>Dodaj Studenta</h1>
        <form action="process_student.php" method="POST">
            <label for="name">Imię i Nazwisko:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="album_number">Nr Albumu:</label><br>
            <input type="text" id="album_number" name="album_number"><br>
            <label for="current_semester">Aktualny Semestr:</label><br>
            <input type="number" id="current_semester" name="current_semester" min="1" max="7"><br>
            <input type="submit" value="Dodaj">
        </form>
    </div>
</body>

</html>