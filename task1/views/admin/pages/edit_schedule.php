<div class="container">
    <form method="POST" action="#">
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
            <!-- <?php //$this->data['counter']++; ?> -->
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
                
                    <input type="submit" class="btn btn-dark" value="Izmenite raspored!">
                </div>
        </div>