<?php

class Specialisation {
    public readonly int $id;
    public readonly string $nom;
    public readonly string $description;
    public readonly string $role;

    public function __construct(array $data) {
        $this->id = $data['id'];
        $this->nom = $data['nom'];
        $this->description = $data['description'];
        $this->role = $data['role'];
    }

    public function toArray(): array {
        return get_object_vars($this);
    }
}
?>
