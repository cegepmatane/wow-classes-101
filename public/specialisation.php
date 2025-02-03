<?php 
include_once "header.php";
?>
<link rel="stylesheet" href="css/specialisation.css">

<div class="thumbnails">
    <div class="container d-flex flex-column">    
        <div class="text-white" id="zone-affichage"></div>
        <?php
        // Données hardcodées pour les classes et leurs spécialisations
        $classes = [
            (object)[
                "nom" => "Warrior",
                "specialisations" => [
                    (object)[
                        "id" => 1,
                        "nom" => "Arms",
                        "logo" => "https://via.placeholder.com/100"
                    ],
                    (object)[
                        "id" => 2,
                        "nom" => "Fury",
                        "logo" => "https://via.placeholder.com/100"
                    ],
                    (object)[
                        "id" => 3,
                        "nom" => "Protection",
                        "logo" => "https://via.placeholder.com/100"
                    ]
                ]
            ],
            (object)[
                "nom" => "Mage",
                "specialisations" => [
                    (object)[
                        "id" => 4,
                        "nom" => "Arcane",
                        "logo" => "https://via.placeholder.com/100"
                    ],
                    (object)[
                        "id" => 5,
                        "nom" => "Fire",
                        "logo" => "https://via.placeholder.com/100"
                    ],
                    (object)[
                        "id" => 6,
                        "nom" => "Frost",
                        "logo" => "https://via.placeholder.com/100"
                    ]
                ]
            ],
            (object)[
                "nom" => "Priest",
                "specialisations" => [
                    (object)[
                        "id" => 7,
                        "nom" => "Discipline",
                        "logo" => "https://via.placeholder.com/100"
                    ],
                    (object)[
                        "id" => 8,
                        "nom" => "Holy",
                        "logo" => "https://via.placeholder.com/100"
                    ],
                    (object)[
                        "id" => 9,
                        "nom" => "Shadow",
                        "logo" => "https://via.placeholder.com/100"
                    ]
                ]
            ],
        ];

        foreach ($classes as $classe) {
        ?>
        <div class="row text-white text-center justify-content-center justify-content-between">
            <h3><?= htmlspecialchars($classe->nom) ?></h3>
            <?php foreach ($classe->specialisations as $specialisation) { ?>
            <div class="col-sm-2" onmousedown="afficherDetailSpecialisation(<?= htmlspecialchars($specialisation->id) ?>)">
                <div class="panel panel-default">
                    <div class="panel-body"><?= htmlspecialchars($specialisation->nom) ?></div>   
                    <div class="panel-footer">
                        <img class="icon-specialisation" src="<?= htmlspecialchars($specialisation->logo) ?>" alt="<?= htmlspecialchars($specialisation->nom) ?> Icon">
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>

<?php include_once "footer.php"; ?>
