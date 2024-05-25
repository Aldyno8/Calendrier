<?php 
namespace datee\classes;
use DateTime;
use PDO;


/**
 * classe qui va gerer les évents
 * @param int $mois le mois compris entre 1 et 12
 * @param int $year L'année
 * @throws \Exception
 */

class event {

    public function getEvents(DateTime $startEvent, DateTime $endEvent):array {
        $user = 'root';
        $password = '';
        $db = new PDO('mysql:host=localhost;dbname=calendar', $user, $password );
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
    if ($db){
        $startDateString = $startEvent->format('Y-m-d 00:00:00');
        $endDateString = $endEvent->format('Y-m-d 23:59:59');
        $requete = $db->query("SELECT * FROM evenement WHERE debut BETWEEN' $startDateString' AND '$endDateString'");
        $reponse = $requete->fetchAll() ;
    }

    else {
        echo "erreur de connexion a la data base";
        }
    return $reponse;  
        }
           
        /**
         * methode qui va recupérer les évenement et les indexe par jour
         * @return array
         */
    public function getEventByDay(DateTime $startEvent, DateTime $endEvent):array {
        $evenement = $this->getEvents($startEvent, $endEvent);
        $days = [];
        foreach ($evenement as $event) {
            $date = explode(" ",$event['debut'])[0];
            if (!isset($days[$date])){
                $days[$date] = [$event];
            }
            else{
                $days[$date][] = $event;
            }
        }
        
        return $days;

    
    }
}
?>