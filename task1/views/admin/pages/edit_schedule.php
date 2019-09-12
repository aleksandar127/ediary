<div class="container">
    <form method="POST" action="<?php echo URLROOT;?>/admin/save_sch_update">
        <div class="form-row">
                <div class="col">
                    <div>Ponedeljak</div>
                    <select class="form-control" id="monday<?php echo $this->data['counter'];?>">
                        <?php foreach($this->data['sch'] as $sch): ?>
                            <?php if($sch['day_in_week'] == 1 && $sch['lesson_no'] == 1): ?>
                                <option value="<?php echo $sch['subjects_id'].'/'.$sch['spec_row'];?>" selected><?php echo $sch['selected_sub']; ?></option>
                                    <?php foreach($sch as $other_subs):?>
                                        <?php if(isset($other_subs['name'])):?>
                                            <option  value="<?php echo $other_subs['id'].'/'.$sch['spec_row'];;?>"><?php echo $other_subs['name'];?></option>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                            <?php endif;?>
                        <?php endforeach;?>
                    </select>
                    <small></small>
                </div>
                <div class="col">
                    <div>Utorak</div>
                    <select class="form-control" id="tuesday<?php echo $this->data['counter'];?>">

                        <?php foreach($this->data['sch'] as $sch): ?>
                            <?php if($sch['day_in_week'] == 2 && $sch['lesson_no'] == 1): ?>
                                <option value="<?php echo $sch['subjects_id'].'/'.$sch['spec_row'];;?>" selected><?php echo $sch['selected_sub']; ?></option>
                                    <?php foreach($sch as $other_subs):?>
                                        <?php if(isset($other_subs['name'])):?>
                                            <option  value="<?php echo $other_subs['id'].'/'.$sch['spec_row'];;?>"><?php echo $other_subs['name'];?></option>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                            <?php endif;?>
                        <?php endforeach;?>
                    </select>
                    <small></small>
                </div>
                <div class="col">
                    <div>Sreda</div>
                    <select class="form-control" id="wednesday<?php echo $this->data['counter'];?>">

                         <?php foreach($this->data['sch'] as $sch): ?>
                            <?php if($sch['day_in_week'] == 3 && $sch['lesson_no'] == 1): ?>
                                <option value="<?php echo $sch['subjects_id'].'/'.$sch['spec_row'];;?>" selected><?php echo $sch['selected_sub']; ?></option>
                                    <?php foreach($sch as $other_subs):?>
                                            <?php if(isset($other_subs['name'])):?>
                                                <option value="<?php echo $other_subs['id'].'/'.$sch['spec_row'];;?>"><?php echo $other_subs['name'];?></option>
                                            <?php endif;?>
                                    <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endforeach;?>
                    </select>
                    <small></small>
                </div>
                <div class="col">
                    <div>Četvrtak</div>
                    <select class="form-control" id="thursday<?php echo $this->data['counter'];?>">

                         <?php foreach($this->data['sch'] as $sch): ?>
                            <?php if($sch['day_in_week'] == 4 && $sch['lesson_no'] == 1): ?>
                                <option value="<?php echo $sch['subjects_id'].'/'.$sch['spec_row'];;?>" selected><?php echo $sch['selected_sub']; ?></option>
                                    <?php foreach($sch as $other_subs):?>
                                        <?php if(isset($other_subs['name'])):?>
                                            <option value="<?php echo $other_subs['id'].'/'.$sch['spec_row'];;?>"><?php echo $other_subs['name'];?></option>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endforeach;?>
                    </select>
                    <small></small>
                </div>
                <div class="col">
                    <div>Petak</div>
                    <select class="form-control" id="friday<?php echo $this->data['counter'];?>">

                         <?php foreach($this->data['sch'] as $sch): ?>
                            <?php if($sch['day_in_week'] == 5 && $sch['lesson_no'] == 1): ?>
                                <option value="<?php echo $sch['subjects_id'].'/'.$sch['spec_row'];;?>" selected><?php echo $sch['selected_sub']; ?></option>
                                <?php foreach($sch as $other_subs):?>
                                    <?php if(isset($other_subs['name'])):?>
                                        <option value="<?php echo $other_subs['id'].'/'.$sch['spec_row'];;?>"><?php echo $other_subs['name'];?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endforeach;?>
                    </select>
                    <small></small>
                </div>
            </div>
      
            <?php for($i = 1; $i < 7; $i++): ?>
            <?php $this->data['counter']++; ?> 
                <div class="form-row">
                        <div class="col">
                            <select class="form-control" id="monday<?php echo $this->data['counter'];?>">

                            <?php foreach($this->data['sch'] as $sch): ?>
                                <?php if($sch['day_in_week'] == 1 && $sch['lesson_no'] == $this->data['counter']): ?>
                                    <option value="<?php echo $sch['subjects_id'].'/'.$sch['spec_row'];;?>" selected><?php echo $sch['selected_sub']; ?></option>
                                        <?php foreach($sch as $other_subs):?>
                                            <?php if(isset($other_subs['name'])):?>
                                                <option  value="<?php echo $other_subs['id'].'/'.$sch['spec_row'];;?>"><?php echo $other_subs['name'];?></option>
                                            <?php endif;?>
                                        <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach;?>
                            </select>
                            <small></small>
                        </div>
                        <div class="col">
                            <select class="form-control" id="tuesday<?php echo $this->data['counter'];?>">

                            <?php foreach($this->data['sch'] as $sch): ?>
                                <?php if($sch['day_in_week'] == 2 && $sch['lesson_no'] == $this->data['counter']): ?>
                                    <option value="<?php echo $sch['subjects_id'].'/'.$sch['spec_row'];;?>" selected><?php echo $sch['selected_sub']; ?></option>
                                        <?php foreach($sch as $other_subs):?>
                                            <?php if(isset($other_subs['name'])):?>
                                                <option  value="<?php echo $other_subs['id'].'/'.$sch['spec_row'];;?>"><?php echo $other_subs['name'];?></option>
                                            <?php endif;?>
                                        <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach;?>
                            </select>
                            <small></small>
                        </div>
                        <div class="col">
                            <select class="form-control" id="wednesday<?php echo $this->data['counter'];?>">

                            <?php foreach($this->data['sch'] as $sch): ?>
                                <?php if($sch['day_in_week'] == 3 && $sch['lesson_no'] == $this->data['counter']): ?>
                                    <option value="<?php echo $sch['subjects_id'].'/'.$sch['spec_row'];;?>" selected><?php echo $sch['selected_sub']; ?></option>
                                        <?php foreach($sch as $other_subs):?>
                                            <?php if(isset($other_subs['name'])):?>
                                                <option  value="<?php echo $other_subs['id'].'/'.$sch['spec_row'];;?>"><?php echo $other_subs['name'];?></option>
                                            <?php endif;?>
                                        <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach;?>
                            </select>
                            <small></small>
                        </div>
                        <div class="col">
                            <select class="form-control" id="thursday<?php echo $this->data['counter'];?>">

                            <?php foreach($this->data['sch'] as $sch): ?>
                                <?php if($sch['day_in_week'] == 4 && $sch['lesson_no'] == $this->data['counter']): ?>
                                    <option value="<?php echo $sch['subjects_id'].'/'.$sch['spec_row'];;?>" selected><?php echo $sch['selected_sub']; ?></option>
                                        <?php foreach($sch as $other_subs):?>
                                            <?php if(isset($other_subs['name'])):?>
                                                <option  value="<?php echo $other_subs['id'].'/'.$sch['spec_row'];;?>"><?php echo $other_subs['name'];?></option>
                                            <?php endif;?>
                                        <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach;?>
                            </select>
                            <small></small>
                        </div>
                        <div class="col">
                            <select class="form-control" id="friday<?php echo $this->data['counter'];?>">

                            <?php foreach($this->data['sch'] as $sch): ?>
                                <?php if($sch['day_in_week'] == 5 && $sch['lesson_no'] == $this->data['counter']): ?>
                                    <option value="<?php echo $sch['subjects_id'].'/'.$sch['spec_row'];;?>" selected><?php echo $sch['selected_sub']; ?></option>
                                        <?php foreach($sch as $other_subs):?>
                                            <?php if(isset($other_subs['name'])):?>
                                                <option  value="<?php echo $other_subs['id'].'/'.$sch['spec_row'];;?>"><?php echo $other_subs['name'];?></option>
                                            <?php endif;?>
                                        <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach;?>
                            </select>
                            <small></small>
                        </div>
                    </div>
                    <?php endfor; ?>
                    
                    <input type="hidden" name="id_of_class" value="<?php echo $this->data['class_id'];?>">
                    <input type="submit" class="btn btn-dark" value="Izmenite raspored!">
    </form> 
    <?php if(isset($_GET['success'])): ?>
        <small style="color: green; font-weight: bold; margin-top: 5px; ">
            <?php echo $_GET['success']; ?>
        </small>
    <?php endif; ?>
</div>

<script src="http://localhost/eDiary/task1/assets/admin/js/edit_sch.js"></script>
<?php if($this->data['high_low'] === "1"): ?>
    <script src="http://localhost/eDiary/task1/assets/admin/js/edit_is_lesson_occup.js"></script>
<?php endif; ?>