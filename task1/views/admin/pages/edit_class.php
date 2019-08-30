<div class="container">
    <form method="POST" action="<?php echo URLROOT;?>/admin/save_ed_cl/<?php echo $this->data['class']['id'];?>";>
        <div class="form-group">
            <label for="class_n">Naziv odeljenja:</label>
            <input type="text" class="form-control" id="class_n" name="class_name" value="<?php echo $this->data['class']['name']; ?>">
        </div>
        <div class="form-group" style="width: 30%;">
            <label for="classes">Izaberi razred:</label>
                <select class="custom-select mr-sm-2" id="classes" name="high_low">
                <?php if($this->data['class']['high_low'] == 0): ?>
                    <option value="0" selected>Niži</option>
                    <option value="1">Viši</option>
                <?php else: ?>
                    <option value="1" selected>Viši</option>
                    <option value="0">Niži</option>
                <?php endif; ?>
                </select>
        </div>
        <div class="form-group" style="display:none;">
                <label for="select_prof">Izaberi razrednog starešinu:</label>
                <select class="form-control" id="select_prof" name="users_id">
                    <!-- place for appending prof or teachers with js -->
                </select>
                <input type="hidden" name="current_class_head" value="<?php echo $this->data['class']['users_id']?>">
        </div>
        <input type="submit" class="btn btn-dark" value="Izmeni">
    </form>
    
    <?php if(isset($_GET['success'])): ?>
       <small style="color: green; font-weight: bold; margin-top: 5px;">
           <?php echo $_GET['success']; ?>
       </small>
   <?php endif; ?>
</div>

<script src="<?php echo URLROOT; ?>/assets/admin/js/ajax_class.js"></script>