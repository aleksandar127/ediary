
<div class="container-fluid">
<h1 class="text-center mb-4 font-weight-bold text">
	<?php echo $this->data['class']['name']; ?>
</h1>

<<<<<<< HEAD
<table class="table table-hover table-dark table-striped col-md-8 mx-auto table-home">
<thead>
	<tr>
    	<th class="text-warning text-center h4 font-weight-bold"><i class="fa fa-user"></i> Ime</th>
    	<th class="text-warning text-center h4 font-weight-bold"><i class="fas fa-file-alt"></i> Svedocanstvo</th>
	</tr>
</thead>
<tbody>
<?php
=======
	<table class="table table-hover table-dark table-striped col-md-8 mx-auto table-home">
		<thead>
			<tr>
				<th class="text-warning text-center h4 font-weight-bold"><i class="fa fa-user"></i> Ime</th>
				<th class="text-warning text-center h4 font-weight-bold"><i class="fas fa-file-alt"></i> Svedočanstvo</th>
			</tr>
		</thead>
		<tbody>
			<?php
>>>>>>> 1f80ea191263b15b7e74f8d44d565e184a751900

//print_r($this->data['class']);

<<<<<<< HEAD
foreach($this->data['students'] as $students){
    echo "<tr>";
    echo '<td class="text-center font-weight-bold">'.ucfirst($students['last_name']).' '.ucfirst($students['first_name']).'</td>';
	echo '<td class="text-center"><a class="btn btn-outline-light font-weight-bold" href="'.URLROOT.'/professor/success/'.$students['id'].'">Svedocanstvo</a>';
	
	if(isset($_GET['err']) && $_GET['id']==$students['id'])
	echo '<br><span style="color:red;">'.$_GET['err'].'</span>';
	
    echo "</td></tr>";
=======
			foreach($this->data['students'] as $students){
				echo "<tr>";
				echo '<td class="text-center font-weight-bold">'.ucfirst($students['last_name']).' '.ucfirst($students['first_name']).'</td>';
				echo '<td class="text-center"><a class="btn btn-outline-light font-weight-bold" href="'.URLROOT.'/professor/success/'.$students['id'].'" >Svedočanstvo</a>';
				
				if(isset($_GET['err']) && $_GET['id']==$students['id'])
					echo '<br><span style="color:red;">'.$_GET['err'].'</span>';
>>>>>>> 1f80ea191263b15b7e74f8d44d565e184a751900

}
?>
</tbody>
</table>
</div>
