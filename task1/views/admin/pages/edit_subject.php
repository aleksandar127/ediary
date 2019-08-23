<div class="container">
    <form method="POST" action="<?php echo 'http://localhost/eDiary/task1/admin/save_edit/'.$this->data['subject']['id'];?>">
        <div class="form-group">
            <label for="sub_name">Ime predmeta</label>
            <input type="text" class="form-control" id="sub_name" value="<?php echo $this->data['subject']['name'];?>">
        </div>
        <?php if($this->data['subject']['users_id'] != NULL):?>
            <div class="form-group">
                <label for="select_prof">Izaberi profesora</label>
                <select class="form-control" id="select_prof">
                <option value="<?php echo $this->data['subject']['users_id'];?>"><?php echo $this->data['subject']['first_name'].' '.$this->data['subject']['last_name'];?></option>
                </select>
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-dark">Izmeni</button>
    </form>
</div>