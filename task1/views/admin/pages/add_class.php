<div class="container">
    <form>
        <div class="form-group">
            <label for="cls_n">Naziv odeljenja:</label>
            <input type="text" class="form-control" id="cls_n" placeholder="Upiši naziv odeljenja">
        </div>
        <div class="form-group" style="width: 30%;">
            <label for="classes">Izaberi razred:</label>
                <select class="custom-select mr-sm-2" id="classes" name="class">
                    <option value="0">Niži</option>
                    <option value="1">Viši</option>
                </select>
        </div>
        <input type="submit" class="btn btn-dark" value="Kreiraj!">
    </form>
</div>

<script src="http://localhost/eDiary/task1/assets/admin/js/ajax_class.js"></script>