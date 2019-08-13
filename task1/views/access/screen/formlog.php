<div class="login">
		<form action="access/login" method="post">
			<h2>Login</h2>

			<div class="form-article">
				<label for="username">Username:</label>
				<input type="text" name="login_username" id="login_username">
				<p></p>
			</div>


			<div class="form-article">
				<label for="password">Password:</label>
				<input type="password" name="login_password" id="login_password">
				<p></p>
			</div>
			<input type="submit" value="Login" class="btn">
		</form>


		<?php if(isset($_GET['err'])) : ?>
			<small style="color: red; background-color: transparent;">
				<?php echo $_GET['err']; ?>	
			</small>
		<?php endif; ?>

</div>


