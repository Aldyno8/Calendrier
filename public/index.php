<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    
    <?php 
    include("../src/date/mois.php");
    try {
    $month = new datee\date\mois($_GET['month']?? null, $_GET['year']?? null); 

    } catch (Exception $e) {
        $month = new datee\date\mois();
    };
    $firstMon = $month-> getFirstDay()->modify('last monday');

    ?>

<div class="header">
<a href="index.php?month=<?= $month->prevMonth()->month;?> &year = <?= $month->prevMonth()->year?>"><</a>
<?php echo $month->toString(); ?>
<a href="index.php?month=<?= $month->nextMonth()->month;?> &year = <?= $month->nextMonth()->year?>">></a>
</div>
<div class="calendar">
<!-- Volet de navigation -->
<div class="navigation">
        <nav>
            <ul>
                <li><a href="acceuil.view.php">Acceuil</a></li>
                <li><a href="#">Message </a></li>
                <li><a href="#">Projets</a></li>
                <li><a href="acceuil.view.php?collab">Collaborateur</a></li>
                <li><a href="#">Agenda</a></li>
                <li><a href="#">Notifications</a></li>
                <li><a href="information.view.php">Profil</a></li>
                <li><a href="acceuil.view.php?deco">Deconnexion</a></li>
                
            </ul>
        </nav>
    </div>

    <!-- Tableau du calendrier -->
    <table class="tabcalendar">

        <?php for($i = 0; $i < $month->getWeeks();$i++ ){
            if ($i<1){
            echo '<tr>';
            echo '<th>Lundi</th>';
            echo '<th>Mardi</th>';
            echo '<th>Mercredi</th>';
            echo '<th>Jeudi</th>';
            echo '<th>Vendredi</th>';
            echo '<th>Samedi</th>';
            echo '<th>Dimanche</th>';
            echo '</tr>';
        }
        echo '<tr>';
        foreach($month->days as $k => $day){
            echo "<td><b>"."</b><br>".(clone $firstMon )->modify('+'.($k + $i *7).'days')->format('d')."</td>";
            
        }
        echo "</tr>";
   
    }
    ?>

    </table>
    </div>
</body>

</html>