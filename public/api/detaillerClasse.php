<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/WorldOfWarcraftDAO.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idClasse = (int) $_GET['id'];

    $classe = WorldOfWarcraftDAO::getClasseDetails($idClasse);

    if ($classe) {
        header('Content-Type: application/json');
        echo json_encode($classe->toArray());
    } else {
        header('Content-Type: application/json', true, 404);
        echo json_encode(['error' => 'Classe non trouvée']);
    }
} else {
    header('Content-Type: application/json', true, 400);
    echo json_encode(['error' => 'ID de la classe invalide ou manquant']);
}
?>
