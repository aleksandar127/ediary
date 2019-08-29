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
            <input type="text" class="form-control" id="puple" name="puple" placeholder="Miloš">
            <p></p>
        </div>
        <div class="form-group">
            <label for="puple_s">Unesi prezime učenika za dato odeljenje:</label>
            <input type="text" class="form-control" id="puple_s" name="puple_surname" placeholder="Milovanović">
            <p></p>
        </div>
        <div class="form-group">
            <label for="parent">Unesi ime roditelja za dato odeljenje:</label>
            <input type="text" class="form-control" id="parent" name="parent" placeholder="Milovan">
            <p></p>
        </div>
        <div class="form-group">
            <label for="parent_s">Unesi prezime roditelja za dato odeljenje:</label>
            <input type="text" class="form-control" id="parent_s" name="parent_surname" placeholder="Milovanović">
            <p></p>
        </div>
        <div class="form-group">
            <label for="parent_usr">Unesi username koji ce roditelj koristiti:</label>
            <input type="text" class="form-control" id="parent_usr" name="parent_username" placeholder="mikica">
            <p></p>
        </div>

        <div class="form-group">
            <label for="pass">Generisati šifru roditelja:</label>
            <input type="text" class="form-control" id="pass" name="parent_pass" placeholder="123456">
            <p></p>
        </div>

        <div class="form-group">
            <label for="re_pass">Potvrditi šifru:</label>
            <input type="text" class="form-control" id="re_pass" name="parent_re_pass" placeholder="123456">
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