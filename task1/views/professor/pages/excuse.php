<br>
<?php
$counter=0;
//print_r($this->data['excuses']);
foreach($this->data['excuses'] as $excuse):
    $counter++;
    echo '<div class="excuseDiv">'; 
    if($counter>3)   
    echo '<img data-src="../assets/access/images/'.$excuse['image'].'"></img><br>';
    else
    echo '<img src="../assets/access/images/'.$excuse['image'].'" data-src="../assets/access/images/'.$excuse['image'].'"></img><br>';
    echo $excuse['last_name'].' '.$excuse['first_name'];
    echo '</div>';
endforeach;


?>
<script src="<?php echo URLROOT; ?>/assets/professor/js/lazyload.js"></script>