<div class="container">
    <form method="POST" action="#" >
        <div class="form-group">
            <label for="student_name">Ime učenika:</label>
            <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $this->data['student']['student_name'];?>">
        </div>
        <div class="form-group">
            <label for="student_surname">Prezime učenika:</label>
            <input type="text" class="form-control" id="student_surname" name="student_surname" value="<?php echo $this->data['student']['student_surname'];?>">
        </div>
        <div class="form-group">
            <label for="parent_name">Ime roditelja:</label>
            <input type="text" class="form-control" id="parent_name" value="<?php echo $this->data['student']['parent_name'];?>">
        </div>
        <div class="form-group">
            <label for="parent_surname">Prezime roditelja:</label>
            <input type="text" class="form-control" id="parent_surname" value="<?php echo $this->data['student']['student_surname'];?>">
        </div>
        <div class="form-group">
            <label for="class_picker">Da li želite da prebacite učenika u drugo odeljenje?</label>
            <select class="form-control" id="class_picker">
                <?php foreach ($this->data['all_classes'] as $class) : ?>
                    <?php if($class['name'] == $this->data['student']['class_name']): ?>
                        <option value="<?php echo $class['id']; ?>" selected><?php echo $class['name'];?></option>
                    <?php else: ?>
                        <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-dark">Izmeni</button>  
    </form>
</div>



	<!-- <?php //foreach ($this->data['categories'] as $category) : ?>
            <?php //if ($category->id === $this->data['post']->category_id) : ?>
                <option value="<?php// echo $category->id; ?>" selected><?php echo $category->name; ?></option>
            <?php// else : ?>
                <option value="<?php //echo $category->id; ?>"><?php echo $category->name; ?></option>
            <?php// endif; ?>
		<?php// endforeach; ?> -->