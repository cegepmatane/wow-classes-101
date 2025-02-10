<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/WorldOfWarcraftDAO.php';

header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Paramètre "id" requis']);
    exit;
}

$id = $_GET['id'];

try {
    // Récupère les détails de la race par son ID
    $raceDetails = WorldOfWarcraftDAO::getRaceDetails($id);
    
    if (!$raceDetails) {
        http_response_code(404);
        echo json_encode(['error' => 'Race non trouvée']);
        exit;
    }

    // Retourne les informations détaillées de la race
    echo json_encode($raceDetails->toArray());
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
