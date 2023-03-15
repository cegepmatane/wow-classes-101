<?php
require "ClasseDAO.php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json; charset=utf-8');

$id = $_GET["id"];
//print_r("GET : " . $id);
$listeSpecialisation = ClasseDAO::listerSpecialisation();
$listeSpecialisation = json_encode($listeSpecialisation);
//print_r($listeSpecialisation);
if(strlen($listeSpecialisation) > 0){
  $listeSpecialisation = json_decode($listeSpecialisation);
  foreach($listeSpecialisation as $specialisation) {
      if ($id == $specialisation->id) {
          echo json_encode($specialisation);
          die();
      }
  }
}
echo json_encode([]);

