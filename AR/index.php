<?php 

 require_once('Active.php');

 // CREATE..
if(isset($_POST['insert'])) {
	$name  = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);

	$attr = [$name, $email]; 
	Active::createUser($attr);
 }

 // READ..
$users = Active::findAll();


// UPDATE..
if(isset($_POST['update'])) {
	$id   = $_POST['id'];
	$name = $_POST['name'];

	Active::updateUser($id, $name);
}


// DELETE..
if(isset($_POST['delete'])){
	$id = $_POST['id'];
	$deleteUser = Active::deleteUser($id);
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Active Record Pattern</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

	<h1>Active Record Pattern</h1>
	<div class="container">
		<div class="left-pane">
			<h2>Create User</h2>
			<form action="#" method="POST">
				<input class="gt-input rounded-left  rounded-right" type="text" name="name" placeholder="Name..">
				<input class="gt-input rounded-left" type="email" name="email" placeholder="Email..">
				<input class="gt-button rounded-right" type="submit" name="insert" Value="Create">
			</form>

			<h2>Delete User</h2>
			<form action="#" method="POST">
				<select name="id" id="deleteList" class="gt-input full-width rounded-left">
					<?php  foreach($users as $user): ?>
					<option value="<?php echo $user->id; ?>"><?php echo $user->id .' - '.$user->name; ?></option>
				<?php endforeach; ?>
				</select>
				<input type="submit" name="delete" value="Delete" class="gt-button rounded-right">
			</form>

			<h2>Update User</h2>
			<form action="#" method="POST">
				<select name="id" id="editList" class="gt-input full-width rounded-left">
				<?php foreach($users as $user): ?>
					<option value="<?php echo $user->id; ?>"><?php echo $user->id .' - '.$user->name; ?></option>
				<?php endforeach; ?>				</select>
				<input class="gt-input" type="text" name="name" placeholder="Name..">
				<input class="gt-button rounded-right" type="submit" name="update" value="Update">
			</form>
		</div> <!--  End of left-pane -->

		<div class="right-pane">
			<h2 class="users">Users</h2>
			<!-- <form method="POST">
				<input class="gt-input rounded-left rounded-right" type="text" name="search" placeholder="Search.." onkeyup="searchNames(this.value);">
			</form> -->

			<div class="data-wrapper">
				<table>
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody class="data-table">
						<?php foreach($users as $user): ?>
						<tr>
							<td><?php echo $user->id; ?></td>
							<td><?php echo $user->name; ?></td>
							<td><?php echo $user->email; ?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div> <!-- End of right-pane -->

	</div> <!-- End of Container -->
	
	<script src="main.js"></script>
</body>
</html>