<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/ClasseDAO.php';

header('Content-Type: application/json');

$classes = ClasseDAO::getClasses();

echo json_encode($classes);
?>
