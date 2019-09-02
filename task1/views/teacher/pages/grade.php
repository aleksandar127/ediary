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
                <?php foreach($this->data['students'] as $student): ?>
                <tr>
                    <td><a href="<?php echo $student['id'];?>"><span> <?php echo $student['first_name'];?> </span> <span> <?php echo $student['last_name'];?> </span> </a></td>
                    <td> 
                        <?php
                            foreach ($this->data['listings'] as $listing){
                                if($student['id'] == $listing['students_id']){
                                    echo $listing['grades'] . " | ";
                            }
                        }?>
                    </td>
                    <td class="final_grade"> # </td>
                    <td> # </td>
                    <td class="final_grade"> # </td>
                    <td> # </td>
                    <td class="final_grade"> # </td>
                    <td> # </td>
                    <td class="final_grade"> # </td>
                    <td> # </td>
                    <td class="final_grade"> # </td>
                    <td> # </td>
                    <td class="final_grade"> # </td>
                    <td> # </td>
                    <td class="final_grade"> # </td>
                    <td>Prosek ucenika</td>
                    
                    
                    <td id="tdInput">
                    <a href="<?php echo 'http://localhost/eDiary/task1/teacher/new_grade/'. $student['id'];?>"><input type="button" value="Unesi"></a>
                    <a href="<?php echo 'http://localhost/eDiary/task1/teacher/delete_grade/' . $student['id']; ?>"><input type="button" value="Obrisi"></a>
                    <a href="<?php echo 'http://localhost/eDiary/task1/teacher/final_grade/' . $student['id']; ?>"><input type="button" value="Zakljucivanje ocena"></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div><!-- end .wrapper -->
    </div><!-- end #table -->