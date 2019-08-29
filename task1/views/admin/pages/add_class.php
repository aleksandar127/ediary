<div class="container">
    <form method="POST" action="http://localhost/eDiary/task1/admin/save_class">
        <div class="form-group">
            <label for="cls_n">Naziv odeljenja:</label>
            <input type="text" class="form-control" id="cls_n" name="name_of_class" placeholder="Upiši naziv odeljenja">
            <p></p>
        </div>
        <div class="form-group" style="width: 30%;">
            <label for="cls_h_l">Izaberi razred:</label>
                <select class="custom-select mr-sm-2" id="cls_h_l" name="class">
                    <option value="null"></option>
                    <option value="0">Niži</option>
                    <option value="1">Viši</option>
                </select>
                <p></p>
        </div>
        <div class="form-group" style="display: none;">
                <label for="select_head">Izaberi razrednog starešinu:</label>
                <select class="form-control" id="select_head" name="prof/tec_id">
                    <!-- place for appending prof or teachers with js -->
                </select>
                <small>Primetite: Ukoliko ne odaberete ime profesora ili učitelja, biće uneto prvo ime!</small>
        </div>
        <div class="form-group">
            <label for="puple">Unesi ime učenika za dato odeljenje:</label>
            <input type="text" class="form-control" id="puple" name="puple">
            <p></p>
        </div>
        <div class="form-group">
            <label for="puple_s">Unesi prezime učenika za dato odeljenje:</label>
            <input type="text" class="form-control" id="puple_s" name="puple_surname">
            <p></p>
        </div>
        <div class="form-group">
            <label for="parent">Unesi ime roditelja za dato odeljenje:</label>
            <input type="text" class="form-control" id="parent" name="parent">
            <p></p>
        </div>
        <div class="form-group">
            <label for="parent_s">Unesi prezime roditelja za dato odeljenje:</label>
            <input type="text" class="form-control" id="parent_s" name="parent_surname">
            <p></p>
        </div>
        <input type="submit" class="btn btn-dark" value="Kreiraj!">
    </form>

    <?php if(isset($_GET['success'])): ?>
        <small style="color: green; font-weight: bold; margin-top: 5px; ">
            <?php echo $_GET['success']; ?>
        </small>
    <?php endif; ?>
</div>

<script src="http://localhost/eDiary/task1/assets/admin/js/ajax_add_class.js"></script>