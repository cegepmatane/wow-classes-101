<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/WorldOfWarcraftDAO.php';

header('Content-Type: application/json');

if (!isset($_GET['class_id']) || !is_numeric($_GET['class_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Paramètre class_id invalide']);
    exit;
}

$classId = (int) $_GET['class_id'];
$specialisations = WorldOfWarcraftDAO::getSpecialisationsParClasse($classId);

echo json_encode(array_map(fn($spec) => $spec->toArray(), $specialisations));
