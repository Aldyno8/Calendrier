<?php

namespace datee\date;
use DateTime;

//  Declaration de la classe mois
class mois{

    // Les jours de la semaine et les mois de l'année
public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimache'] ;
private $months =['Janvier','Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juiller', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];
public $month;
public $year;

/**
 *  Constructeur du mois
 * @param int $mois le mois compris entre 1 et 12
 * @param int $year L'année
 * @throws \Exception
 */


    public function __construct(?int $month=null, ?int $year=null){
        // Verifie si la aucun mois n'est précisé si c'est le cas, il prend la valeur de la date du jour 
        if ($month === null){
            $month = intval(date('m'));
        }
            // Verifie si aucune année n'est donnée si c'est le cas, il prend la valeur de la date du jour
        if($year === null){
            $year = intval(date('Y'));
        }


        // Vérifie si le mois est valide 
if($month < 1|| $month > 12){

    throw new \Exception("Le mois suivi du mois n'est pas valide");
}

// Vérifie si l'anneé est valide
if ($year < 1970){
    throw new \Exception("L'année est inférieur à 1970");
}
$this->month = $month;
$this->year = $year;
}


/**
 * fonction qui va retourner la date du premier jour du mois
 * @return DateTime
 */

public function getFirstDay(): \DateTime{
    return new DateTime("{$this->year}-{$this->month}-01");
}


/**
 * retourne le mois en lettre
 * @return string
 */
public function toString() : string{
    return $this->months[$this->month-1].''.$this->year;
}

/**
 * retourne le nombre de semaine en un mois 
 */
public function getWeeks() : int{
    $start = $this->getFirstDay();
    $first = intval($start->format("W"));
    $end = clone $start->modify('last day of this month ');
    $last = intval($end->format('W'));
    $interval = $last - $first + 1;
    return $interval;
}

/**
 * incremente la valeur du mois ou la remet a 1 si superieur a 12 et incremente l'année
 */
public function nextMonth() : mois{
    $month = $this ->month +1;
    $year = $this ->year;
    if ($month >12){
        $month = 1;
        $year+=1;
    }
    return new mois($month, $year);
}

/**
 * decremente la valeur du mois ou la remet e 12 si inferieur a 1 et decremente l'année
 */
public function prevMonth() : mois{
    $month = $this ->month -1;
    $year = $this ->year;
    if ($month <1){
        $month = 12;
        $year-=1;
    }
    return new mois($month, $year);
}
}
?>