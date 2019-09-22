<!DOCTYPE html>
<html>
	<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/admin/css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-0c38nfCMzF8w8DBI+9nTWzApOpr1z0WuyswL4y6x/2ZTtmj/Ki5TedKeUcFusC/k" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="#">
	</head>
		<body>
		<div class="wrapper">
			<header>
				<ul class="left_nav">
					<li><a class="font-weight-bold menu-link" href="<?php echo URLROOT; ?>/admin/"><span><i class="fa fa-home"></i></span> Početna strana</a></li>
					<li><a class="font-weight-bold menu-link" href="<?php echo URLROOT; ?>/admin/users"><span><i class="fa fa-user"></i></span> Korisnici</a></li>
					<li><a class="font-weight-bold menu-link" href="<?php echo URLROOT; ?>/admin/subjects"><span><i class="fas fa-calendar-alt"></i></span> Predmeti</a></li>
					<li><a class="font-weight-bold menu-link" href="<?php echo URLROOT; ?>/admin/classes"><span><i class="fas fa-graduation-cap"></i></span> Odeljenja</a></li>
					<li><a class="font-weight-bold menu-link" href="<?php echo URLROOT; ?>/admin/schedule"><span><i class="fas fa-clipboard-list"></i></span> Raspored časova</a></li>
					<li><a class="font-weight-bold menu-link" href="<?php echo URLROOT; ?>/admin/students"><span><i class="fas fa-user-graduate"></i></span> Učenici</a></li>
					<li><a class="font-weight-bold menu-link" href="<?php echo URLROOT; ?>/admin/messages"><span><i class="fas fa-envelope-open"></i></span> Obaveštenja</a></li>
				</ul>
				<ul class="right_nav">
					<li><a class="font-weight-bold menu-link" href="<?php echo URLROOT; ?>/admin/logout">Izloguj se <span><i class="fas fa-sign-out-alt"></i></i></a></li>
				</ul>
			</header>