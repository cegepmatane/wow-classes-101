<?php

class Race {
    public readonly int $id;
    public readonly string $nom;
    public readonly string $faction;
    public readonly array $classesJouables;

    public function __construct(array $data) {
        $this->id = $data['id'];
        $this->nom = $data['nom'];
        $this->faction = $data['faction'];
        $this->classesJouables = $data['classes_jouables'];
    }

    public function toArray(): array {
        return get_object_vars($this);
    }
}
?>
