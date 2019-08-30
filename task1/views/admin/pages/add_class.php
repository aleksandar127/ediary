<div class="container">
    <form>
        <div class="form-group">
            <label for="cls_n">Naziv odeljenja:</label>
            <input type="text" class="form-control" id="cls_n" placeholder="Upiši naziv odeljenja">
        </div>
        <div class="form-group" style="width: 30%;">
            <label for="cls_h_l">Izaberi razred:</label>
                <select class="custom-select mr-sm-2" id="cls_h_l" name="class">
                    <option value="null"></option>
                    <option value="0">Niži</option>
                    <option value="1">Viši</option>
                </select>
        </div>
        <div class="form-group" style="display: none;">
                <label for="select_head">Izaberi razrednog starešinu:</label>
                <select class="form-control" id="select_head" name="prof/tec_id">
                    <!-- place for appending prof or teachers with js -->
                </select>
        </div>
        <input type="submit" class="btn btn-dark" value="Kreiraj!">
    </form>
</div>

<script src="<?php echo URLROOT; ?>/assets/admin/js/ajax_add_class.js"></script>