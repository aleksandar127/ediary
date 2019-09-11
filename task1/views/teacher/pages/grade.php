<div id="table">
        <div class="wrapper">
        <?php if(isset($_GET['err'])):?>
        <span style="color:#000;font-size:18px;font-weight:400">
           <?php echo $_GET['err']; ?>
        </span>
        <?php endif;?>

        <?php if(isset($_GET['success'])): ?>
        <span style="color:#000;font-size:18px;font-weight:400">
        <?php echo $_GET['success']; ?>
        </span>
        <?php endif; ?>
            <table>
                 <tr>
                    <th>#</th>
                    <?php foreach($this->data['subjects'] as $subject): ?>
                    <th value="<?php echo $subject['id'];?>"><?php echo $subject['name'];?></th>
                    <th><?php $subject['id']; ?> </th>
                    <?php endforeach; ?>
                    <th> # </th>
                </tr>

                <?php foreach($this->data['listings'] as $student_id => $student): ?>
                
                
                <tr>
                    <td><a href="<?php echo $this->data['students'][$student_id]['id']; ?>"><span><?php echo $this->data['students'][$student_id]['first_name']; ?></span> <span><?php echo $this->data['students'][$student_id]['last_name'];?></span></a></td>

                    <?php foreach($this->data['subjects'] as $id_subjects => $data_subjects): ?>
                    
                    <td>
                        <?php if(!empty($student[$id_subjects])) {
                            foreach($student[$id_subjects] as $id_subject => $grade) {
                                echo $grade . " | ";
                            }
                        }else {
                            echo " ";
                        }?> 
                    </td>

                    <td class="final_grade"><?php
                    if(!empty($this->data['show_final_grade'][$student_id][$id_subjects])) {
                        foreach ($this->data['show_final_grade'][$student_id][$id_subjects] as $key => $value) {
                            echo $value;
                        }
                    } else {
                        echo " ";
                       
                    }
                    ?>
                    </td>
                    <?php endforeach; ?>
                    
                    <td id="tdInput">
                    <a href="<?php echo 'http://localhost/eDiary/task1/teacher/new_grade/'. $student_id;?>"><input type="button" value="Unesi"></a>
                    <a href="<?php echo 'http://localhost/eDiary/task1/teacher/delete_grade/' . $student_id; ?>"><input type="button" value="Obrisi"></a>
                    <a href="<?php echo 'http://localhost/eDiary/task1/teacher/final_grade/' . $student_id; ?>"><input type="button" value="Zakljucivanje ocena"></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                   
            </table>
        </div><!-- end .wrapper -->
    </div><!-- end #table -->