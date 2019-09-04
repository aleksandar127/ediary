<!DOCTYPE html>
<html>
	<head>
	<title>Director</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/director/css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-0c38nfCMzF8w8DBI+9nTWzApOpr1z0WuyswL4y6x/2ZTtmj/Ki5TedKeUcFusC/k" crossorigin="anonymous">
    <!-- Resources -->
  <script src="https://www.amcharts.com/lib/4/core.js"></script>
  <script src="https://www.amcharts.com/lib/4/charts.js"></script>
  <script src="https://www.amcharts.com/lib/4/themes/material.js"></script>
  <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

	
</head>
<body>


<div class="wrapper">
<header class="fixed-top">



<div class="container-fluid">

  	<div class="row py-2">
<a href="<?php  echo URLROOT; ?>/director/index" type="btn" class="btn btn-dark nav-link links font-weight-bold menu-btn"><span><i class="fas fa-user"></i></span> Director</a>
        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle nav-link links font-weight-bold menu-btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span><i class="fas fa-chart-bar"></i></span> Statistika
            </button>
             

               
            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                <li class="dropdown-item">
                	<a class="nav-link drop" href="<?php echo URLROOT; ?>/director/avgschool">Statistika uspešnosti na nivou škole</a>
                </li>
                                <li class="dropdown-divider"></li>
                <li class="dropdown-submenu">
                  <a class="dropdown-item ml-2" tabindex="-1" href="#">Statistika uspešnosti odeljenja</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item">
                    	<a class="nav-link drop-link" tabindex="-1" href="<?php echo URLROOT; ?>/director/avgclass?class=1/1&high_low=0">Odeljenje <span class="drop-grade">1/1</span></a>
                    </li>
                    <li class="dropdown-item">
                    	<a class="nav-link drop-link" href="<?php echo URLROOT; ?>/director/avgclass?class=2/1&high_low=0">Odeljenje 2/1</a>
                    </li>
                    <li class="dropdown-item">
                    	<a class="nav-link drop-link" href="<?php echo URLROOT; ?>/director/avgclass?class=3/1&high_low=0">Odeljenje 3/1</a>
                    </li>
                    <li class="dropdown-item">
                    	<a class="nav-link drop-link" href="<?php echo URLROOT; ?>/director/avgclass?class=4/1&high_low=0">Odeljenje 4/1</a>
                    </li>
                    <li class="dropdown-item">
                    	<a class="nav-link drop-link" href="<?php echo URLROOT; ?>/director/avgclass?class=5/1&high_low=1">Odeljenje 5/1</a>
                    </li>
                    <li class="dropdown-item">
                    	<a class="nav-link drop-link" href="<?php echo URLROOT; ?>/director/avgclass?class=6/1&high_low=1">Odeljenje 6/1</a>
                    </li>
                    <li class="dropdown-item">
                    	<a class="nav-link drop-link" href="<?php echo URLROOT; ?>/director/avgclass?class=7/1&high_low=1">Odeljenje 7/1</a>
                    </li>
                    <li class="dropdown-item">
                    	<a class="nav-link drop-link" href="<?php echo URLROOT; ?>/director/avgclass?class=8/1&high_low=1">Odeljenje 8/1</a>
                    </li>

                  </ul>
                </li>
               
              </ul>
 
        </div>
       <a type="btn" class="btn btn-dark nav-link links font-weight-bold menu-btn ml-auto" href="<?php echo URLROOT; ?>/director/logout">Izloguj se 
       	<span class="ml-1"><i class="fas fa-sign-out-alt"></i></span></a>
   
    			
    </div>

    	
</div>


</header>
