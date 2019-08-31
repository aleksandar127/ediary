<div class="container">
	<!-- <h2>Dobro Došli!</h2> -->
		<form method="POST" action="access/login">

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
			<input type="submit" value="Uloguj se!" class="btn btn-dark">

			<?php if(isset($_GET['err'])) : ?>
				<small style="color: red; font-weight: bold; display:block">
					<?php echo $_GET['err']; ?>	
				</small>
			<?php endif; ?>

		</form>
</div>


