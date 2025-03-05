<?php include_once "header.php";?>
<link href="css/class.css" rel="stylesheet" />
<h1 class="text-center mb-4">Classes de World of Warcraft</h1>


    <div class="row mx-4 mt-4">
        <div class="col-md-4">
            <div class="card class-card p-3">
                <h5 class="card-title">
                    <img src="https://placehold.co/56" alt="Guerrier" class="me-2" width="56">    
                Guerrier</h5>
                <p class="card-text">Rôles : Tank, DPS</p>
                <p class="card-text">Energy : Mana</p>
                <button class="btn btn-primary" onclick="toggleSpecs('warrior-specs')">Savoir plus</button>
                <div id="warrior-specs" class="specialisations mt-2" style="display: none;">
                    <a href="specialisation.php?id=1" class="d-block"><img src="https://placehold.co/32" alt="Spé 1" width="32"> Arme</a>
                    <a href="specialisation.php?id=2" class="d-block"><img src="https://placehold.co/32" alt="Spé 2" width="32"> Fureur</a>
                    <a href="specialisation.php?id=3" class="d-block"><img src="https://placehold.co/32" alt="Spé 3" width="32"> Protection</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card class-card p-3">
                <h5 class="card-title">
                    <img src="https://placehold.co/56" alt="Guerrier" class="me-2" width="56">    
                Mage</h5>
                <p class="card-text">Rôles : DPS</p>
                <p class="card-text">Energy : Mana</p>
                <button class="btn btn-primary" onclick="toggleSpecs('mage-specs')">Savoir plus</button>
                <div id="mage-specs" class="specialisations mt-2" style="display: none;">
                    <a href="specialisation.php?id=4" class="d-block"><img src="https://placehold.co/32" alt="Spé 1" width="32"> Feu</a>
                    <a href="specialisation.php?id=5" class="d-block"><img src="https://placehold.co/32" alt="Spé 2" width="32"> Givre</a>
                    <a href="specialisation.php?id=6" class="d-block"><img src="https://placehold.co/32" alt="Spé 3" width="32"> Arcane</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card class-card p-3">
                <h5 class="card-title">
                    <img src="https://placehold.co/56" alt="Guerrier" class="me-2" width="56">    
                Hunter</h5>
                <p class="card-text">Rôles : DPS</p>
                <p class="card-text">Energy : Mana</p>
                <button class="btn btn-primary" onclick="toggleSpecs('hunter-specs')">Savoir plus</button>
                <div id="hunter-specs" class="specialisations mt-2" style="display: none;">
                    <a href="specialisation.php?id=4" class="d-block"><img src="https://placehold.co/32" alt="Spé 1" width="32"> Marksmanship</a>
                    <a href="specialisation.php?id=5" class="d-block"><img src="https://placehold.co/32" alt="Spé 2" width="32"> Beast Master</a>
                    <a href="specialisation.php?id=6" class="d-block"><img src="https://placehold.co/32" alt="Spé 3" width="32"> Survival</a>
                </div>
            </div>
        </div>
    </div>




<?php include_once "footer.php";?>
