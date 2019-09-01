<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>eDiary</title>
<link href="http://localhost/eDiary/task1/assets/teacher/css/style.css" type="text/css" rel="stylesheet">
<link href="http://localhost/eDiary/task1/assets/teacher/css/https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
<link href="http://localhost/eDiary/task1/assets/teacher/css/fa/css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link href="http://localhost/eDiary/task1/assets/teacher/css/web-fonts-with-css/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div id="headerTop">
		<div class="wrapper">
			<div id="contact">
				<i class="fas fa-phone"></i> <span>065 854 2515</span>
				<a href="https://accounts.google.com/signin/v2/identifier?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin"><i class="fas fa-envelope"></i> <span>OS.BrankoRadicevic@gmail.com</span></a>
			</div><!-- end #contact -->
			<div id="network">
				<a href="https://www.facebook.com/"><i class="fab fa-facebook-square"></i></a>
				<a href="https://twitter.com/"><i class="fab fa-twitter-square"></i></a>
				<a href="https://www.linkedin.com/"><i class="fab fa-linkedin-square"></i></a>
			</div><!-- end #network -->
		</div><!-- end .wrapper -->
	</div><!-- end #headerTop -->
	
	<div id="header">
		<div class="wrapper">
			<div id="logo">
				 <img src="http://localhost/eDiary/task1/assets/teacher/images/logo1.png" alt="logo"> 
			</div><!-- end #logo -->
			<div id="class">
				<?php foreach($this->data['class'] as $class): ?>
				<p>Odeljenje <span> <?php echo $class['name']; ?> </span> </p>
				<?php endforeach; ?>
				<p id="logoutP"><a href="http://localhost/eDiary/task1/teacher/logout">Izloguj se</a></p>
            </div><!-- end #class -->
        </div><!-- end .wrapper -->
	</div><!-- end #header -->
	
	<div id="navigation">
		<div class="wrapper">
			<div id="nav">
				<ul>
					<li><a href="http://localhost/eDiary/task1/teacher/grade/">ocene</a></li>
					<li><a href="http://localhost/eDiary/task1/teacher">ucenici</a></li>
					<li><a href="http://localhost/eDiary/task1/teacher/objects">predmeti</a></li>
					<li><a href="http://localhost/eDiary/task1/teacher/schedule">raspored casova</a></li>
					<li><a href="http://localhost/eDiary/task1/teacher/message">poruke</a></li>
				</ul>
			</div><!-- end #nav -->
		</div><!-- end .wrapper -->
	</div><!-- end #navigation -->