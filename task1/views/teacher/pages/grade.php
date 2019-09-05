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
                <?php foreach($this->data['listings'] as $id => $student): ?>
                
                <tr>
                    <td>
                        <?php echo $this->data['students'][$id]['first_name'].$this->data['students'][$id]['last_name']; ?>
                    </td>


                    <?php foreach($this->data['subjectss'] as $idPredmeta => $nesto): ?>
                    
                    <td>
                        <?php if(!empty($student[$idPredmeta])) {
                            foreach($student[$idPredmeta] as $idPredmeta => $ocene) {
                                var_dump($ocene);
                            }
                        }

                        else {
                            echo "<td></td>";
                        }

                        ?> 
                    </td>

                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </table>
        </div><!-- end .wrapper -->
    </div><!-- end #table -->