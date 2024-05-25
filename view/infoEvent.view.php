<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>infoEvent</title>
    <link rel="stylesheet" href="css/infoEvent.css">
</head>
<?php include("../modeles/infoEvent.modeles.php");?>

<body>
    <form action="" method="post">
        <div class="event_text">
            <label for="text">Nom de l'évenement:</label><br>
            <input type="text" value="<?php echo $rep['Nom']?>"><br>
            <label for="text">Description de l'évenement:</label><br>
            <input type="text" value="<?php echo $rep['about']?>" id="about"><br>
        </div>

        <div class="event_date">
            <label for="text">Date de début:</label><br>
            <input type="text" value="<?php echo $rep['debut']?>"><br>
            <label for="text">Date de fin:</label><br>
            <input type="text" value="<?php echo $rep['fin']?>"><br>
        </div>
    </form>
</body>

</html>