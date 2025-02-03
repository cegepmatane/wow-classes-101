<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/ClasseDAO.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idClasse = (int) $_GET['id'];

    // Récupérer la classe et ses spécialisations
    $classe = ClasseDAO::getClasseDetails($idClasse);

    if ($classe) {
        // Récupérer les spécialisations
        $specialisations = ClasseDAO::getSpecialisationsByClasse($idClasse);

        if ($specialisations) {
            header('Content-Type: application/json');
            echo json_encode($specialisations);
        } else {
            header('Content-Type: application/json', true, 404);
            echo json_encode(['error' => 'Aucune spécialisation trouvée pour cette classe']);
        }
    } else {
        header('Content-Type: application/json', true, 404);
        echo json_encode(['error' => 'Classe non trouvée']);
    }
} else {
    header('Content-Type: application/json', true, 400);
    echo json_encode(['error' => 'ID de la classe invalide ou manquant']);
}
?>
