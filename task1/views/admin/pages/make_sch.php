<div class="container">
    <form method="POST" action="http://localhost/eDiary/task1/admin/save_sch">
        <div class="form-group">
            <label for="class_sch">Odaberite razred za koji pravite raspored:</label>
            <select class="form-control" id="class_sch" name="class_sch">
                <option></option>   
                <?php foreach($this->data['available_classes'] as $avl_cls): ?>
                    <option value="<?php echo $avl_cls['id'].','.$avl_cls['high_low']; ?>"><?php echo $avl_cls['name']; ?></option>
                <?php endforeach;?>
            </select>
            <p></p>
        </div>
        <div style="display: none;">
            <div class="form-row">
                <div class="col">
                    <div>Ponedeljak</div>
                    <select class="form-control" id="monday<?php echo $this->data['counter'];?>">
                        <!-- fill here with specific data -->
                    </select>
                    <small></small>
                </div>
                <div class="col">
                    <div>Utorak</div>
                    <select class="form-control" id="tuesday<?php echo $this->data['counter'];?>">
                        <!-- fill here with specific data -->
                    </select>
                    <small></small>
                </div>
                <div class="col">
                    <div>Sreda</div>
                    <select class="form-control" id="wednesday<?php echo $this->data['counter'];?>">
                        <!-- fill here with specific data -->
                    </select>
                    <small></small>
                </div>
                <div class="col">
                    <div>Četvrtak</div>
                    <select class="form-control" id="thursday<?php echo $this->data['counter'];?>">
                        <!-- fill here with specific data -->
                    </select>
                    <small></small>
                </div>
                <div class="col">
                    <div>Petak</div>
                    <select class="form-control" id="friday<?php echo $this->data['counter'];?>">
                        <!-- fill here with specific data -->
                    </select>
                    <small></small>
                </div>
            </div>
            <?php for($i = 1; $i < 7; $i++): ?>
            <?php $this->data['counter']++; ?>
                <div class="form-row">
                    <div class="col">
                        <select class="form-control" id="monday<?php echo $this->data['counter'];?>">
                        <!-- fill here with specific data -->
                        </select>
                        <small></small>
                    </div>
                    <div class="col">
                        <select class="form-control" id="tuesday<?php echo $this->data['counter'];?>">
                        <!-- fill here with specific data -->
                        </select>
                        <small></small>
                    </div>
                    <div class="col">
                        <select class="form-control" id="wednesday<?php echo $this->data['counter'];?>">
                        <!-- fill here with specific data -->
                        </select>
                        <small></small>
                    </div>
                    <div class="col">
                        <select class="form-control" id="thursday<?php echo $this->data['counter'];?>">
                        <!-- fill here with specific data -->
                        </select>
                        <small></small>
                    </div>
                    <div class="col">
                        <select class="form-control" id="friday<?php echo $this->data['counter'];?>">
                        <!-- fill here with specific data -->
                        </select>
                        <small></small>
                    </div>
                </div>
            <?php endfor; ?>
    
            <input type="submit" class="btn btn-dark" value="Sačuvaj raspored!">
        </div>
    </form>

    
    <?php if(isset($_GET['success'])): ?>
        <small style="color: green; font-weight: bold; margin-top: 5px; ">
            <?php echo $_GET['success']; ?>
        </small>
    <?php endif; ?>

</div>

<script src="http://localhost/eDiary/task1/assets/admin/js/make_schedule.js"></script>