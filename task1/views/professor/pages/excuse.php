<br>
<?php
$counter=0;
//print_r($this->data['excuses']);
foreach($this->data['excuses'] as $excuse):
    $counter++;
    echo '<div class="excuseDiv" style="width:500px;object-fit:contain;">'; 
    if($counter>3){
    echo '<img style="width:500px;" data-src="../assets/access/images/'.$excuse['image'].'"></img><figcaption>'.$excuse['last_name'].' '.$excuse['first_name'].'</figcaption><br>';
    
    }
    else{
    echo '<figure><img style=width:500px;" src="../assets/access/images/'.$excuse['image'].'" data-src="../assets/access/images/'.$excuse['image'].'"></img><figcaption>'.$excuse['last_name'].' '.$excuse['first_name'].'</figcaption></figure>';
    }
    
    echo '</div>';
endforeach;


?>
<script src="<?php echo URLROOT; ?>/assets/professor/js/lazyload.js"></script>