<?php 
include_once "header.php";
?>
<link rel="stylesheet" href="css/classe.css">

<section class="content d-grid">
    <header>
        <h2 class="text-center text-white mt-3 mb-5">World of Warcraft Classes</h2>
    </header>

    <div class="col col-10 mx-auto">
        <div class="row mx-auto d-flex justify-content-between">
            <?php
            // Données hardcodées pour les classes
            $classes = [
                (object)[
                    "nom" => "Warrior",
                    "nomCSS" => "warrior",
                    "roles" => ["Tank", "DPS"],
                    "specialisations" => [(object)["distanceCombat" => "Melee"]],
                    "nomSpecialisations" => ["Arms", "Fury", "Protection"],
                    "description" => "Warriors are melee fighters who rely on heavy armor and powerful weapons to dominate the battlefield."
                ],
                (object)[
                    "nom" => "Mage",
                    "nomCSS" => "mage",
                    "roles" => ["DPS"],
                    "specialisations" => [(object)["distanceCombat" => "Ranged"]],
                    "nomSpecialisations" => ["Arcane", "Fire", "Frost"],
                    "description" => "Mages are masters of arcane magic, using their spells to deal massive damage from a distance."
                ],
                (object)[
                    "nom" => "Priest",
                    "nomCSS" => "priest",
                    "roles" => ["Healer", "DPS"],
                    "specialisations" => [(object)["distanceCombat" => "Ranged"]],
                    "nomSpecialisations" => ["Discipline", "Holy", "Shadow"],
                    "description" => "Priests are versatile spellcasters who can heal their allies or deal damage with shadow magic."
                ],
                // Ajoutez d'autres classes ici...
            ];

            // PARTIE VUE
            foreach ($classes as $classe) {
            ?>
            <div class="card d-flex flex-wrap col-5 row-6 mb-5 mr-3 flex-row align-items-center style-card class-card">
                <img class="card-img-center crest" src="https://placehold.co/100" alt="<?=$classe->nom?> Crest"/>
                <div class="text-white fw-bold w-50">
                    <div class="card-body  text-center">
                        <!-- Class name-->
                        <h5 class="fw-bolder fs-2 ff-lifecraft <?=$classe->nomCSS?>-color"><?=$classe->nom?></h5>
                        <!-- Available roles -->
                        <?php
                        for ($i = 0; $i < count($classe->roles); $i++) {
                            if($i < count($classe->roles) -1){
                                echo $classe->roles[$i]. " & ";
                            }
                            else {
                                echo  $classe->roles[$i];
                            }
                        }
                        ?>
                        <br>
                        <?=$classe->specialisations[0]->distanceCombat?>

                    </div>
                </div>
    
                <div class="d-flex justify-content-end w-100 p-2" >
                    <div class=""><a class="btn mt-auto button-open border-white text-white">Learn more</a></div>
                </div>
            </div>
            
            <div class="container px-4 px-lg-5 class-detail class-detail-hidden" id="<?= $classe->nom ?>-detail">
                <div class="row gx-4 gx-lg-5 row-cols-11 row-cols-md-11 row-cols-xl-11 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100 d-flex flex-row style-detail">
                            <!-- Character image-->
                            <img class="card-img-left image-detail" src="https://placehold.co/400" alt="<?=$classe->nom?> Image" />
                            <!-- Class details-->
                            <div class="card-body p-4 text-white">
                                <!-- Class name-->
                                <h5 class="fw-bolder"><?= $classe->nom ?></h5>
                                <!-- Descriptiion -->
                                <br>
                                <?= $classe->description ?> 
                                <br>
                                <br>
                                <!-- Specialization -->
                                <h5 class="fw-bolder">Specialization</h5>
                                <?php
                                for ($i = 0; $i < count($classe->nomSpecialisations); $i++) {
                                    if($i < count($classe->nomSpecialisations) -1){
                                        echo $classe->nomSpecialisations[$i]. ", ";
                                    }
                                    else {
                                        echo  $classe->nomSpecialisations[$i];
                                    }
                                }
                                ?>
                            </div>

                            <div class="card-footer p-4 pt-3 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto button-close text-white border-white">✖</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php  
            }
            ?>
        </div>
    </div>
</section>

<?php include_once "footer.php"?>