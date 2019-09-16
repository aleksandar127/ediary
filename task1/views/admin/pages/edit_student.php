<div class="container">
    <form method="POST" action="http://localhost/eDiary/task1/admin/save_puple_edit/<?php echo $this->data['student']['id']?>">
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
            <input type="text" class="form-control" id="parent_name" name="parent_name" value="<?php echo $this->data['student']['parent_name'];?>">
        </div>
        <div class="form-group">
            <label for="parent_surname">Prezime roditelja:</label>
            <input type="text" class="form-control" id="parent_surname" name="parent_surname" value="<?php echo $this->data['student']['student_surname'];?>">
        </div>
        <input type="hidden" name="parent_id" value="<?php echo($this->data['student']['users_id']);?>">
        <div class="form-group">
            <label for="class_picker">Da li želite da prebacite učenika u drugo odeljenje?</label>
            <select class="form-control" id="class_picker" name="class_picker">
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

        
    <?php if(isset($_GET['success'])): ?>
        <small style="color: green; font-weight: bold; margin-top: 5px; ">
            <?php echo $_GET['success']; ?>
        </small>
    <?php endif; ?>
</div>
