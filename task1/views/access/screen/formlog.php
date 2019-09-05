

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

