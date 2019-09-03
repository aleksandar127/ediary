<!DOCTYPE html>
<html>
	<head>
	<title>Director</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/director/css/main.css">
    <!-- Resources -->
  <script src="https://www.amcharts.com/lib/4/core.js"></script>
  <script src="https://www.amcharts.com/lib/4/charts.js"></script>
  <script src="https://www.amcharts.com/lib/4/themes/material.js"></script>
  <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

	
	</head>
		<body>
		<div class="wrapper">
			<header>
				<!-- <div class="btn-group">
					<button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Statistika uspešnosti
					</button>
					<div class="dropdown-menu dropdown-menu-right">
						<button class="dropdown-item btn" type="button"><a href="#">Statistika uspešnosti odeljenja po predmetima</a></button>
						<button class="dropdown-item" type="button"><a href="#">Statistika uspešnosti po predmetima	na nivou škole</a></button>
					</div>
				</div>
				<ul class="right_nav">
					<li><a href="#">Izloguj se</a></li>
				</ul> -->


		<ul class="nav pt-2">
			<li class="nav-item home">
				<a href="<?php echo URLROOT; ?>/director/index" class="btn btn-dark nav-link home">Home</a>
			</li>

			<div class="dropdown">
			<button class="btn btn-dark dropdown-toggle nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Statistika
			</button>
		
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="<?php echo URLROOT; ?>/director/avgclass">Statistika uspešnosti odeljenja</a>
				<a class="dropdown-item" href="<?php echo URLROOT; ?>/director/avgschool">Statistika uspešnosti na nivou škole</a>
			</div>
			</div>
		</ul>

		</header>
