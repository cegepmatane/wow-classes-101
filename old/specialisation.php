<?php 
include_once "header.php";
include_once "dao/ClasseDAO.php";

$classes = ClasseDAO::listerClasseAvecSpecialisation();
?>
<link rel="stylesheet" href="css/specialisation.css">

<div class="thumbnails">
<div class="container d-flex flex-column">	
<div class="text-white" id="zone-affichage"></div>
    <?php foreach ($classes as $classe) {?>
    <div class="row text-white text-center justify-content-center justify-content-between">
        <h3><?= $classe->nom?></h3>
        <?php foreach ($classe->specialisations as $specialisation) {?>
        <div class="col-sm-2" onmousedown="afficherDetailSpecialisation('<?=$specialisation->id?>')">
    		<div class="panel panel-default">
            <div class="panel-body"><?= $specialisation->nom?></div>   
                <div class="panel-footer"><img class="icon-specialisation" src="<?= $specialisation->logo ?>" alt="<?= $specialisation->nom?> Icon"></div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php }?>
</div>

<?php include_once "footer.php"?>