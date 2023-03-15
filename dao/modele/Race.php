<?php

class Race {
    public $id;
    public $nom;
    public $faction;
    public $description;

    private static $format = array(
        'id' => FILTER_VALIDATE_INT,
        'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
        'faction' => FILTER_SANITIZE_SPECIAL_CHARS,
        'description' => FILTER_SANITIZE_SPECIAL_CHARS,
    );

    public function __construct($array){
        $array = filter_var_array($array, Race::$format);

        $this->id = $array['id'];
        $this->nom = $array['nom'];
        $this->faction = $array['faction'];
        $this->description = $array['description'];
    }
}