<div id="teachers">
		<div class="wrapper">
        	<div id="teacher">
                
                <h2 class="title">Ucenici</h2>

                <?php foreach($this->data['students'] as $student): ?>

                <div class="student">
					<h3 class="title"><a href="#"><span><?php echo $student['id']; ?>. </span> <?php echo $student['first_name']; ?> <span> <?php echo $student['last_name'];?></span></a></h3>
				</div>
                <?php endforeach; ?>
			</div>
        </div>
	</div>