<div class="container">
    <form method="POST" action="http://localhost/eDiary/task1/admin/save_sub">
        <div class="form-group">
            <label for="subject_name">Ime predmeta</label>
            <input type="text" class="form-control" id="subject_name" placeholder="Ukucaj naziv nogov predmeta">
        </div>
        <div class="form-group" style="width: 30%;">
            <label for="classes">Izaberi razred:</label>
                <select class="custom-select mr-sm-2" id="classes" name="class">
                    <option value="0">Niži</option>
                    <option value="1">Viši</option>
                </select>
        </div>
        <div class="form-group" style="width: 30%; display: none;">
            <label for="profs">Izaberi profesora za dati predmet:</label>
            <select class="custom-select mr-sm-2" id="profs" name="prof_id">
                <?php foreach($this->data['professors'] as $prof): ?>
                    <option value="<?php echo $prof['id']; ?>"><?php echo $prof['first_name'].' '.$prof['last_name'];?></option>
                <?php endforeach;?>
            </select>
        </div>
        <input type="submit" class="btn btn-dark" value="Dodaj!">
    </form> 
</div>


<script src="http://localhost/eDiary/task1/assets/admin/js/add_sub.js"></script>