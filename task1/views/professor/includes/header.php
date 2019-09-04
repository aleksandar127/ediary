<!DOCTYPE html>
<html>
	<head>
	<title>Professor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/professor/css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-0c38nfCMzF8w8DBI+9nTWzApOpr1z0WuyswL4y6x/2ZTtmj/Ki5TedKeUcFusC/k" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	</head>
		<body>
		<div class="wrapper">
			<header>
				<ul class="left_nav">
					<li><a class="navProf font-weight-bold" href="<?php echo URLROOT; ?>/professor"><i class="fa fa-home"></i> Pocetna</a></li>
					<li><a class="navProf font-weight-bold" href="<?php echo URLROOT; ?>/professor/diary"><i class="fas fa-book"></i> Dnevnici</a></li>
					<li><a class="navProf font-weight-bold" href="<?php echo URLROOT; ?>/professor/messages"><i class="fa fa-envelope"></i> Poruke</a></li>
					<li><a class="navProf font-weight-bold" href="<?php echo URLROOT; ?>/professor/open"><i class="fas fa-handshake"></i> Otvorena vrata</a></li>
					<li><a class="navProf font-weight-bold" href="<?php echo URLROOT; ?>/professor/schedule"><i class="fas fa-clipboard-list"></i> Raspored</a></li>
					
				</ul>
				<ul class="right_nav">
					<li><a class="font-weight-bold" href="<?php echo URLROOT; ?>/professor/logout">Logout <i class="fas fa-sign-out-alt"></i></a></li>
				</ul>
			</header>