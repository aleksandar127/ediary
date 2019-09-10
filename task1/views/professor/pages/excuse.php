<br>
<div style="margin-bottom:120px;">
<h1 style="text-align:center;margin-bottom:30px;font-size:60px;">Opravdanja</h1>
<?php
$counter=0;
//print_r($this->data['excuses']);
foreach($this->data['excuses'] as $excuse):
    $counter++;
    echo '<div class="excuseDiv" style="width:600px;object-fit:contain;">'; 
    if($counter>3){
    echo '<img style="width:600px;" data-src="../assets/access/images/'.$excuse['image'].'"></img><figcaption>'.$excuse['last_name'].' '.$excuse['first_name'].'</figcaption><br>';
    
    }
    else{
    echo '<figure><img style=width:600px;" src="../assets/access/images/'.$excuse['image'].'" data-src="../assets/access/images/'.$excuse['image'].'"></img><figcaption>'.$excuse['last_name'].' '.$excuse['first_name'].'</figcaption></figure>';
    }
    
    echo '</div>';
endforeach;


?>
</div>
<script src="<?php echo URLROOT; ?>/assets/professor/js/lazyload.js"></script>