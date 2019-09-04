<br>
<?php
$counter=0;
//print_r($this->data['excuses']);
foreach($this->data['excuses'] as $excuse):
    $counter++;
    echo '<div class="excuseDiv" style="height:300px;width:300px;object-fit:contain;">'; 
    if($counter>3){
    echo '<img style="max-height:100%;max-width:100%;" data-src="../assets/access/images/'.$excuse['image'].'"></img><br>';
    echo $excuse['last_name'].' '.$excuse['first_name'];
    }
    else{
    echo '<img style="max-height:100%;max-width:100%;" src="../assets/access/images/'.$excuse['image'].'" data-src="../assets/access/images/'.$excuse['image'].'"></img><br>';
    }
    echo $excuse['last_name'].' '.$excuse['first_name'];
    echo '</div>';
endforeach;


?>
<script src="<?php echo URLROOT; ?>/assets/professor/js/lazyload.js"></script>