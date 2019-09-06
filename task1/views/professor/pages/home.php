<div class="container-fluid">
<h1 class="text-center mb-4 font-weight-bold text">
	<?php echo $this->data['class']['name']; ?>
</h1>

<table class="table table-hover table-dark table-striped col-md-8 mx-auto table-home">
<thead>
	<tr>
    	<th class="text-warning text-center"><i class="fa fa-user"></i> Ime</th>
    	<th class="text-warning text-center"><i class="fas fa-file-alt"></i> Svedocanstvo</th>
	</tr>
</thead>
<tbody>
<?php

//print_r($this->data['class']);


foreach($this->data['students'] as $students){
    echo "<tr>";
    echo '<td class="text-center font-weight-bold">'.$students['last_name'].' '.$students['first_name'].'</td>';
    echo '<td class="text-center"><a class="btn btn-outline-light font-weight-bold" href="'.URLROOT.'/professor/success/'.$students['id'].'">Svedocanstvo</a></td>';
    echo "</tr>";

}
?>
</tbody>
</table>
</div>