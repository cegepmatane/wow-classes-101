<?php
include_once "modele/Classe.php";
include_once "modele/Specialisation.php";

class ClasseDAO {
    public static function listerClasseAvecSpecialisation() {
        require "connexion.php";
        //print_r($basededonnees);

        $classesFiltres = ClasseDAO::listerClasse();
        $specialisationsFiltres = ClasseDAO::listerSpecialisation();
        
        $listeClasses = ClasseDAO::trierSpecialisationParClasse($classesFiltres, $specialisationsFiltres);

        ClasseDAO::creerListeNomSpecialisations($listeClasses);
        ClasseDAO::creerListeRole($listeClasses);
        // print_r($listeClasses[0]->nomSpecialisations);
        
        return $listeClasses;
    }

    public static function listerSpecialisation(){
        require "connexion.php";
        $requeteSpecialisation = $basededonnees->prepare("SELECT * FROM specialisation");
        $requeteSpecialisation -> execute();
        $specialisations = $requeteSpecialisation -> fetchAll(PDO::FETCH_ASSOC);
        // print_r($specialisations);

        $specialisationsFiltres = array();

        foreach($specialisations as $specialisation) {
            $specialisationsFiltres[] = new Specialisation($specialisation);
        }

        return $specialisationsFiltres;
    }
    
    public static function listerClasse(){
        require "connexion.php";
        $requeteClasse = $basededonnees->prepare("SELECT * FROM classe");
        $requeteClasse -> execute();
        $classes = $requeteClasse -> fetchAll(PDO::FETCH_ASSOC);
        // print_r($classes);

        $classesFiltres = array();

        foreach($classes as $classe){
            $classesFiltres[] = new Classe($classe);
        }

        return $classesFiltres;
    }

    private static function trierSpecialisationParClasse($classes, $specialisations) {
        foreach ($classes as $classe) {
            foreach ($specialisations as $specialisation) {
                if ($specialisation->idClasse == $classe->id) {
                    $classe->ajouterSpecialisation($specialisation);
                }
            }
        }
        return $classes;
    }

    private static function creerListeNomSpecialisations($classes){
        foreach ($classes as $classe) {
            $classe->ajouterNomSpecialisations();
        }
    }

    private static function creerListeRole($classes){
        foreach ($classes as $classe) {
            $classe->ajouterRoles();
        }
    }
}