<!DOCTYPE html>
<html>
<head>
	<title>Professor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/professor/css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-0c38nfCMzF8w8DBI+9nTWzApOpr1z0WuyswL4y6x/2ZTtmj/Ki5TedKeUcFusC/k" crossorigin="anonymous">
	
	
	
</head>
<body>
		<div class="wrapper">
	<header class="fixed-top">
		<ul class="left_nav">
			<li><a class="font-weight-bold menu-link navProf" data-a='0' href="<?php echo URLROOT; ?>/professor"><span><i class="fa fa-home"></i></span> Pocetna</a></li>
			<li><a class="font-weight-bold menu-link navProf" data-a='0' href="<?php echo URLROOT; ?>/professor/diary"><span><i class="fas fa-book"></i></span> Dnevnici</a></li>
			<li><a class="font-weight-bold menu-link navProf" data-a='0' href="<?php echo URLROOT; ?>/professor/messages"><span><i class="fa fa-envelope"></i></span> Poruke</a></li>
			<li><a class="font-weight-bold menu-link navProf" data-a='0' href="<?php echo URLROOT; ?>/professor/open"><span><i class="fas fa-handshake"></i></span> Otvorena vrata</a></li>
			<li><a class="font-weight-bold menu-link navProf" data-a='0' href="<?php echo URLROOT; ?>/professor/schedule"><span><i class="fas fa-clipboard-list"></i></span> Raspored</a></li>
			<li><a class="font-weight-bold menu-link navProf" data-a='0' href="<?php echo URLROOT; ?>/professor/excuse"><span><i class="fas fa-clipboard-list"></i></span> Opravdanja</a></li>
			
		</ul>
		<ul class="right_nav">
			<li><a id='logout' class="font-weight-bold menu-link navProf" href="<?php echo URLROOT; ?>/professor/logout">Izloguj se <span><i class="fas fa-sign-out-alt"></i></span></a></li>
		</ul>
	</header>