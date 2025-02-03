<?php

class Specialisation{
    public $id;
    public $idClasse;
    public $nom;
    public $description;
    public $role;
    public $distanceCombat;
    public $logo;

    private static $format = array(
        'id' => FILTER_VALIDATE_INT,
        'id_classe' => FILTER_VALIDATE_INT,
        'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
        'description' => FILTER_SANITIZE_SPECIAL_CHARS,
        'role' => FILTER_SANITIZE_SPECIAL_CHARS,
        'distance_combat' => FILTER_SANITIZE_SPECIAL_CHARS,
        'logo' => FILTER_SANITIZE_SPECIAL_CHARS,
    );

    public function __construct($array){
        $array = filter_var_array($array, Specialisation::$format);

        $this->id = $array['id'];
        $this->idClasse = $array['id_classe'];
        $this->nom = $array['nom'];
        $this->description = $array['description'];
        $this->role = $array['role'];
        $this->distanceCombat = $array['distance_combat'];
        $this->logo = $array['logo'];
    }
}