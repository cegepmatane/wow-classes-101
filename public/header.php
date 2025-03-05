<?php 
$current_page = basename($_SERVER['PHP_SELF']); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Wow Classes</title>

	<link rel="icon" type="image/x-icon" href="asset/favicon.ico"/>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
	
	<link href="css/style.css" rel="stylesheet"/>
	
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark header-footer-color p-3">
	<div class="container-fluid">
		<a class="navbar-brand ff-lifecraft" href="/">Wow classes 101</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link mx-2 <?= ($current_page == 'index.php') ? 'active' : '' ?>" href="/">Home</a>
				</li>  
				<li class="nav-item">
					<a class="nav-link mx-2 <?= ($current_page == 'classes.php') ? 'active' : '' ?>" href="classes.php">Classes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link mx-2 <?= ($current_page == 'races.php') ? 'active' : '' ?>" href="races.php">Races</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
	