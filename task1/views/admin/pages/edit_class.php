<div class="container">
    <form>
        <div class="form-group">
            <label for="class_n">Naziv odeljenja:</label>
            <input type="email" class="form-control" id="class_n" value="hahah">
        </div>
        <div class="form-group" style="width: 30%;">
            <label for="classes">Izaberi razred:</label>
                <select class="custom-select mr-sm-2" id="classes" name="class">
                    <option value="0">Niži</option>
                    <option value="1">Viši</option>
                </select>
        </div>
        <div class="form-group" style="width: 30%;">
                <label for="select_prof">Izaberi razrednog starešinu:</label>
                <select class="form-control" id="select_prof" name="users_id">
                <!-- <?php //foreach ($this->data['professors'] as $professor) : ?>
                <?php //if($this->data['subject']['users_id'] == $professor['id']): ?>
                    <option value="<?php //echo $professor['id'];?>" selected><?php //echo //$professor['first_name'].' '.$professor['last_name'];?></option>
                    <?php// else : ?>
                    <option value="<?php //echo $professor['id'];?>"><?php //   echo //$professor['first_name'].' '.$professor['last_name'];?></option>
                <?php //endif; ?> -->
                <?php //endforeach;?>
                </select>
        </div>
        <input type="submit" class="btn btn-dark" value="Izmeni">
    </form>
</div>

<script src="http://localhost/eDiary/task1/assets/admin/js/ajax_class.js"></script>