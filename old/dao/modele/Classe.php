<?php

class Classe {
    public $id;
    public $nom;
    public $nomCSS;
    public $description;
    public $imageClasse;
    public $imageBlason;
    public $imageTransmog;
    
    public $specialisations = array();
    public $roles = array();
    public $nomSpecialisations = array();
    public $distancesCombat;

    private static $format = array(
        'id' => FILTER_VALIDATE_INT,
        'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
        'nom_css' => FILTER_SANITIZE_SPECIAL_CHARS,
        'description' => FILTER_SANITIZE_SPECIAL_CHARS,
        'image_classe' => FILTER_SANITIZE_SPECIAL_CHARS,
        'image_blason' => FILTER_SANITIZE_SPECIAL_CHARS,
        'image_transmog' => FILTER_SANITIZE_SPECIAL_CHARS,
    );

    public function __construct($array){
        $array = filter_var_array($array, Classe::$format);

        $this->id = $array['id'];
        $this->nom = $array['nom'];
        $this->nomCSS = $array['nom_css'];
        $this->description = $array['description'];
        $this->imageClasse = $array['image_classe'];
        $this->imageBlason = $array['image_blason'];
        $this->imageTransmog = $array['image_transmog'];
    }

    public function ajouterSpecialisation($specialisation) {
        $this->specialisations[] = $specialisation;
        
    }

    public function ajouterNomSpecialisations(){
        if(!$this->specialisations) return;
        foreach($this->specialisations as $specialisation){
            $this->nomSpecialisations[] = $specialisation->nom;
        }
    }

    public function ajouterRoles(){
        if (!$this->specialisations) return;
        foreach($this->specialisations as $specialisation){
            if (!in_array($specialisation->role, $this->roles)){
               $this->roles[] = $specialisation->role;
            }
        }
    }
}