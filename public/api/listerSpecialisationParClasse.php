<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/WorldOfWarcraftDAO.php';

header('Content-Type: application/json');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Paramètre id invalide']);
    exit;
}

$classId = (int) $_GET['id'];
$specialisations = WorldOfWarcraftDAO::getSpecialisationsParClasse($classId);

echo json_encode(array_map(fn($spec) => $spec->toArray(), $specialisations));
