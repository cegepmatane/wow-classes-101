<?php

class Race {
    public int $id;
    public string $nom;
    public string $faction;
    public array $classesJouables;

    public function __construct(array $data) {
        $this->id = $data['id'] ?? 0;
        $this->nom = $data['nom'] ?? 'Inconnu';
        $this->faction = $data['faction'] ?? 'Inconnu';
        $this->classesJouables = $data['classes_jouables'] ?? [];
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'faction' => $this->faction,
            'classes_jouables' => $this->classesJouables
        ];
    }
}
?>

