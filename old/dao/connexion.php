<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$usager = 'wow';
$motdepasse = '/vLQf1iFu!iwCOo)';
$hote = 'localhost';
$base = 'wow';
$charset = 'utf8';    //$charset = 'utf8mb4';

$dsn = "mysql:host=$hote;dbname=$base;$charset";
$basededonnees = new PDO($dsn, $usager, $motdepasse);

// echo "Connecte";
// print_r($basededonnees);