<!-- <div class="container"> -->
	<!-- <h2>Dobro Došli!</h2> -->
		<!-- <form method="POST" action="access/login">

			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" name="login_username" id="login_username" placeholder="mirkica">
				<p></p>
			</div>


			<div class="form-article">
				<label for="password">Password:</label>
				<input type="password" class="form-control" name="login_password" id="login_password" placeholder="123456">
				<p></p>
			</div>
			<input type="submit" value="Uloguj se!" class="btn btn-dark"> -->

			<?php// if(isset($_GET['err'])) : ?>
			<!-- 	<small style="color: red; font-weight: bold; display:block"> -->
					<?php// echo $_GET['err']; ?>	
				<!-- </small> -->
			<?php// endif; ?>
<!-- 
		</form>
</div> -->

<!-- *********************************************************** -->



<video autoplay muted loop id="myVideo">
  <source src="<?php  echo URLROOT; ?>/assets/access/videos/letters.mp4" type="video/mp4">
</video>

	<div class="box">
		<h2>Login</h2>
		<form action="access/login" method="POST">
			<div class="inputBox">
				<input type="text" name="login_username" required="">
				<label>Username</label>
			</div>
			<div class="inputBox">
				<input type="password" name="login_password" required="">
				<label>Password</label>
			</div>
			<input type="submit" value="Uloguj se!">
			<?php if(isset($_GET['err'])) : ?>
			 	<p class="text-center mt-2 text-danger font-weight-bold">
					<?php echo $_GET['err']; ?>	
				 </p> 
			<?php endif; ?>
		</form>
	</div>
	
</body>
</html>

