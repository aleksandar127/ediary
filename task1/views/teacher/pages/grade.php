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
                    <th> </th>
                    <?php endforeach; ?>
                    <th>prosek</th>
                    <th> # </th>
                </tr>

                <?php foreach($this->data['listings'] as $id_students => $student): var_dump($student);?>

                <tr>
                    <td><a href="<?php echo $id_students ?>"><span><?php echo $this->data['students'][$id_students]['first_name'] ?></span> <span><?php echo $this->data['students'][$id_students]['last_name'];?></span></td>

                    <?php foreach($this->data['subjects'] as $id_subjects => $data_subjects): ?>
                   
                    <td>
                        <?php if(!empty($student[$id_subjects])) {
                            foreach($student[$id_subjects] as $id_subjects => $grade) {
                                echo $grade . " | ";
                            }
                        }else {
                            echo " ";
                        }?> 
                    </td>
                    <td class="final_grade"> # </td>
                    <?php endforeach; ?>
                    
                    <td>Prosek ucenika</td>
                    <td id="tdInput">
                    <a href="<?php echo 'http://localhost/eDiary/task1/teacher/new_grade/'. $id_students;?>"><input type="button" value="Unesi"></a>
                    <a href="<?php echo 'http://localhost/eDiary/task1/teacher/delete_grade/' . $id_students; ?>"><input type="button" value="Obrisi"></a>
                    <a href="<?php echo 'http://localhost/eDiary/task1/teacher/final_grade/' . $id_students; ?>"><input type="button" value="Zakljucivanje ocena"></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                   
            </table>
        </div><!-- end .wrapper -->
    </div><!-- end #table -->