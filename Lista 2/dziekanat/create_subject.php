<!DOCTYPE html>
<html>

<head>
    <title>Dodaj Przedmiot</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <nav>
        <a href="index.php">Strona Główna</a> |
        <a href="create_student.php">Dodaj Studenta</a> |

    </nav>
    <div id="container">
        <h1>Dodaj Przedmiot</h1>
        <form action="process_subject.php" method="POST">
            <label for="name">Nazwa Przedmiotu:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="semester_id">ID Semestru:</label><br>
            <input type="number" id="semester_id" name="semester_id"><br>
            <input type="submit" value="Dodaj">
        </form>
    </div>
</body>

</html>