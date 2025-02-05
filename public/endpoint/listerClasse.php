<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/WorldOfWarcraftDAO.php';

header('Content-Type: application/json');

$classes = WorldOfWarcraftDAO::getClasses();

echo json_encode($classes);
?>
