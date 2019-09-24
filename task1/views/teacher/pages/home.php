<div id="teachers">
		<div class="wrapper">
        	<div id="teacher">
				<?php foreach($this->data['class'] as $class): ?>
					<h1 class="text-center mb-4 font-weight-bold text">
						<?php echo $class['name']; ?>
					</h1>
				<?php endforeach; ?>
				<table class="table table-hover table-dark table-striped table-home">
					<tr>
						<th style="border:none" class="text-warning text-center h4 font-weight-bold"><i class="fa fa-user"></i> Ime</th>
						<th style="border:none" class="text-warning text-center h4 font-weight-bold"><i class="fas fa-file-alt"></i> Svedocanstvo</th>
					</tr>
				<?php foreach($this->data['students'] as $student): ?>
					<tr>
						<td><h3 style="color:#FFF";></span> <?php echo $student['first_name']; ?> <span> <?php echo $student['last_name']; ?></span></h3></td>
						<td><a href="<?php echo URLROOT.'/teacher/success/' . $student['id'].'" >Svedocanstvo </a>';?> <?php 
						if(isset($_GET['err']) && $_GET['id'] == $student['id']){
							echo '<br><span style="color:red;font-size:20px;">' . $_GET['err'] . '</span>';
						}
							?></td>
					</tr>
				<?php endforeach; ?>
				</table>
					
			</div>
        </div>
	</div>