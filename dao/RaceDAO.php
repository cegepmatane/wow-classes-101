<?php
include_once "modele/Race.php";
class RaceDAO {
    public static function listerRaceParFaction($faction){
        require "connexion.php";
        
        $requete = $basededonnees->prepare("SELECT * FROM race WHERE faction = '$faction'");
        $requete -> execute();
        $races = $requete -> fetchAll(PDO::FETCH_ASSOC);


        $racesFiltres = array();
        foreach ($races as $race) {
            $racesFiltres[] = new Race($race);
        }
        
        // print_r($racesFiltres[0]->nom);
        return $racesFiltres;
    }
}