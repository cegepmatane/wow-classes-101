<?php include_once "dao/connexion.php"?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Wow Classes</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/bs_styles.css" rel="stylesheet" />
        <!-- My Scripts -->
		<script src="js/ajax.js"></script>
		<script src="js/SpecialisationDAO.js"></script>
        <script src="js/scripts.js" defer></script>
        <!-- My Style -->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/class_color.css" rel="stylesheet" />
		<!-- Splide Caroussel -->
		<script src=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js "></script>
		<link href=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css " rel="stylesheet">

    </head>
    <body>
	
	<?php 
    $currentPage = basename($_SERVER['PHP_SELF']); 
	?>

	<nav class="navbar navbar-expand-lg navbar-dark header-footer-color p-3">
		<div class="container-fluid">
			<a class="navbar-brand ff-lifecraft" href="index.php">Wow classes 101</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link mx-2 <?= ($currentPage == 'classe.php') ? 'active' : '' ?>" href="classe.php">Classes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link mx-2 <?= ($currentPage == 'specialisation.php') ? 'active' : '' ?>" href="specialisation.php">Specializations</a>
					</li>
					<li class="nav-item">
						<a class="nav-link mx-2 <?= ($currentPage == 'race.php') ? 'active' : '' ?>" href="race.php">Races</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

        