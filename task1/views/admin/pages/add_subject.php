<div class="container">
    <form method="POST" action="<?php echo URLROOT; ?>/admin/save_sub">
        <div class="form-group">
            <label for="subject_name">Ime predmeta</label>
            <input type="text" class="form-control" id="subject_name" name="subject_name" placeholder="Ukucaj naziv novog predmeta">
            <p></p>
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
                <option value=""></option>
                <?php foreach($this->data['professors'] as $prof): ?>
                    <option value="<?php echo $prof['id']; ?>"><?php echo $prof['first_name'].' '.$prof['last_name'];?></option>
                <?php endforeach;?>
            </select>
        </div>
        <input type="submit" class="btn btn-dark" value="Dodaj!">
    </form> 

    <?php if(isset($_GET['success'])): ?>
        <small style="color: green; font-weight: bold; margin-top: 5px; ">
            <?php echo $_GET['success']; ?>
        </small>
    <?php endif; ?>

</div>


<script src="<?php echo URLROOT; ?>/assets/admin/js/add_sub.js"></script>
<!-- test -->