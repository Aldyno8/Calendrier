<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Event</title>
    <link rel="stylesheet" href="css/addEvent.css">
</head>
<body>
    <form action="../modeles/addEvent.modeles.php" method="post">
        <div class="event_text">
            <label for="text">Nom de l'évenement:</label><br>
            <input type="text" name="nom"><br>
            <label for="text">Description de l'évenement:</label><br>
            <input type="text" name="about"><br>
        </div>

        <div class="event_date">
            <label for="text">Date de début:</label><br>
            <input type="date" name="debut"><br>
            <label for="text">Date de fin:</label><br>
            <input type="date" name="end"><br>
            <input type="submit" name="save" value="Save">
        </div>
    </form>
</body>

</html>