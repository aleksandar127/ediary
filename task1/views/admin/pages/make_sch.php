<div class="container">
    <form method="POST" action="#">
        <div class="form-group">
            <label for="class_sch">Odaberite razred za koji pravite raspored:</label>
            <select class="form-control" id="class_sch" name="class_sch">
                <option></option>   
                <?php foreach($this->data['available_classes'] as $avl_cls): ?>
                    <option value="<?php echo $avl_cls['id'].','.$avl_cls['high_low']; ?>"><?php echo $avl_cls['name']; ?></option>
                <?php endforeach;?>
            </select>
        </div>
    <div class="form-row">
        <div class="col">
            <div>Ponedeljak</div>
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <div>Utorak</div>
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <div>Sreda</div>
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <div>Četvrtak</div>
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <div>Petak</div>
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <input type="text" class="form-control">
        </div>
        <div class="col">
        <select class="form-control" id="exampleFormControlSelect1">
           <!-- fill here with specific data -->
        </select>
        </div>
    </div>
   
    <input type="submit" class="btn btn-dark" value="Sačuvaj raspored!">
    </form>
</div>

<script src="http://localhost/eDiary/task1/assets/admin/js/ajax_make_sch.js"></script>