<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/ClasseDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/model/Classe.php';


$classes = ClasseDAO::getClasses();

echo "<h1>Liste des classes (JSON)</h1>";
echo "<pre>";
echo json_encode($classes, JSON_PRETTY_PRINT);
echo "</pre>";

if (isset($classes[0])) {
    $classeId = $classes[0]['id'];
    echo "<h2>Détails de la classe avec ID {$classeId} (JSON)</h2>";
    $classeDetails = ClasseDAO::getClasseDetails($classeId);

    if ($classeDetails) {
        // Affichage des détails en JSON
        $classeDetailsData = [
            'nom' => $classeDetails->nom,
            'specialisations' => $classeDetails->specialisations,
            'energie' => $classeDetails->energie,
        ];
        
        echo "<pre>";
        echo json_encode($classeDetailsData, JSON_PRETTY_PRINT);
        echo "</pre>";
    } else {
        echo "<p>Les détails de la classe ne sont pas disponibles.</p>";
    }
} else {
    echo "<p>Aucune classe n'a été récupérée pour les détails.</p>";
}
?>
