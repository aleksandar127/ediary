<br>
<div style="margin-bottom:120px;">
<<<<<<< HEAD
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
=======
    <h1 style="text-align:center;margin-bottom:30px;font-size:60px;">Opravdanja</h1>
    <?php
    $counter=0;
    foreach($this->data['excuses'] as $excuse):
        $counter++;
        echo '<div class="excuseDiv" style="width:600px;object-fit:contain;">'; 
        if($counter>3){
            echo '<img style="width:600px;" data-src="../assets/access/images/'.$excuse['image'].'"></img><figcaption><b>'.ucfirst($excuse['last_name']).' '.ucfirst($excuse['first_name']).'</b></figcaption><br>';
        }
        else{
            echo '<figure><img style=width:600px;" src="../assets/access/images/'.$excuse['image'].'" data-src="../assets/access/images/'.$excuse['image'].'"></img><figcaption><b>'.ucfirst($excuse['last_name']).' '.ucfirst($excuse['first_name']).'</b></figcaption></figure>';
        }
        
        echo '</div>';
    endforeach;
>>>>>>> 1f80ea191263b15b7e74f8d44d565e184a751900


?>
</div>
<script src="<?php echo URLROOT; ?>/assets/professor/js/lazyload.js"></script>