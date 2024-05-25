<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    
    <?php 
    include("../controllers/classes/mois.php");
    include("../controllers/classes/event.php");
    // include("../modeles/infoEvent.php");
    try {
    $month = new datee\classes\mois($_GET['month']?? null, $_GET['year']?? null); 
    $event = new datee\classes\event();

    } catch (Exception $e) {
        $month = new datee\classes\mois();
    };

     /**
     * il faut faire une condition qui vérifie que le premier jour du mois n'est pas un Lundi
     * Dans le cas ou le premier jour du mois est un lundi alors on ne cherche plus le Lundi précedent
     */
    $firstday =intval($month->getFirstDay()->format('N'));
    $weeks = $month->getWeeks();

    if ($firstday != 1 ){
    $firstMon = $month-> getFirstDay()->modify('last monday');
    }
    else {
        $firstMon = $month->getFirstDay();
    };
    $end = (clone $firstMon )->modify('+'.(6 + 7*($weeks-1)).'days');
    $events = $event->getEventByDay($firstMon, $end);
  
    
    
    ?>

<div class="header">
<img src="../assets/Image/logo.png" alt="logo">
<?php echo $month->toString(); ?>
<div class="button">
<a href="addEvent.view.php">Add New event</a>
<a href="calendar.view.php?month=<?= $month->prevMonth()->month;?> &year=<?= $month->prevMonth()->year?>" class="prev"><</a>
<a href="calendar.view.php?month=<?= $month->nextMonth()->month;?> &year=<?= $month->nextMonth()->year?>" class="next">></a>
</div>
</div>

<div class="calendar">
<!-- Volet de navigation -->
 <div class="navigation">
        <nav>
            <ul>
                <li><a href="#"><img src="../assets/Image/acceuil.png" alt="Icone" width="30px" height="30px"> </a></li>
                <li><a href="#"><img src="../assets/Image/discuter.png" alt="Icone" width="30px" height="30px"> </a></li>
                <li><a href="#"><img src="../assets/Image/gestion.png" alt="Icone" width="30px" height="30px"></a></li>
                <li><a href="#"><img src="../assets/Image/travail-en-equipe.png" alt="Icone" width="30px" height="30px"></a></li>
                <li><a href="#"><img src="../assets/Image/calendrier.png" alt="Icone" width="30px" height="30px"></a></li>
                <li><a href="#"><img src="../assets/Image/bouton-notifications.png" alt="Icone" width="30px" height="30px"></a></li>
                <li><a href="#"><img src="../assets/Image/utilisateur-de-profil.png" alt="Icone" width="30px" height="30px"></a></li>
                <li><a href="#"><img src="../assets/Image/se-deconnecter.png" alt="Icone" width="30px" height="30px"></a></li>
                
            </ul>
        </nav>
    </div> 

    <!-- Tableau du calendrier -->
    <table class="tabcalendar">

        <?php
        
         for($i = 0; $i < $weeks ;$i++ ){
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
            $date = (clone $firstMon )->modify('+'.($k + $i *7).'days');
            $dateForEvent = $date->format('Y-m-d');
            $eventsForDay = $events[$dateForEvent] ?? [];
            echo "<td>";
            echo $date->format('d');
            foreach($eventsForDay as $event){
                echo "<div class='event'><a href='infoEvent.view.php?id={$event['id']}'>";
                echo $event['Nom'];
                echo '</a></div>';
                
            }
            echo "</td>";  
        }
       
        echo "</tr>";
   
    }
    ?>
    </table>
    </div>
</body>

</html>