<?php 
include_once "header.php";
include_once "dao/RaceDAO.php";

$racesAlliance = RaceDAO::listerRaceParFaction("Alliance");
$racesHorde = RaceDAO::listerRaceParFaction("Horde");
?>
<link rel="stylesheet" href="css/race.css">

<section class="slider-alliance text-center text-white splide pt-3 pb-2" aria-labelledby="carousel-heading">
<h2 id="carousel-heading">Races de l'Alliance</h2>
<div class="splide__track">
        <ul class="splide__list text-center">
            <?php foreach($racesAlliance as $race){ ?>
            <li class="splide__slide d-flex flex-column">
                <div><img class="image-slide text-center" src="assets/race/<?=strtolower($race->nom)?>.jpg" alt="<?=$race->nom?>"></div>
                <div><p class="race-description text-white pt-3 mb-3 w-50 mx-auto"><?=$race->description?></p></div>
            </li>
            <?php } ?>
        </ul>
        <br>
</div>
<br>

</section>

<section class="slider-horde text-center text-white pt-3 pb-2 splide" aria-labelledby="carousel-heading">
<h2 id="carousel-heading">Races de la Horde</h2>

<div class="splide__track">
        <ul class="splide__list text-center">
            <?php foreach($racesHorde as $race){ ?>
            <li class="splide__slide d-flex flex-column">
                <div><img class="image-slide text-center" src="assets/race/<?=strtolower($race->nom)?>.jpg" alt=""></div>
                <div class=""><p class="race-description text-white pt-3 w-50 mx-auto"><?=$race->description?></p></div>
            </li>
            <?php } ?>
        </ul>
        <br>
</div>
<br>
</section>

<script>
document.addEventListener( 'DOMContentLoaded', function() {
    var elms = document.getElementsByClassName( 'splide' );

    for ( var i = 0; i < elms.length; i++ ) {
    new Splide( elms[ i ] ).mount();
    }
} );
</script>

<?php include_once "footer.php"?>