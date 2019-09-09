
<<<<<<< HEAD
<div id='wrapper_home_parent'>
=======
<div class='container'>
<div class='col-md-6 text-center'>
>>>>>>> 16518a977a289cbd9b69b566d5466425e07c5902

<?php

$sub=null;
$name=null;

foreach($this->data['grades'] as $subject){
   
    if($name!=$subject['first_name'])
<<<<<<< HEAD
        echo '<br><br><h1>'.$subject['first_name'].' '.$subject['last_name'].'</h1>';
    
    if( $sub==$subject['name'] && $name==$subject['first_name']){
        echo "<div class='grades_home_parent'> ".$subject['grades']."</div>";

    }
    else
        echo "<br><div class='subject_home_parent'>".ucfirst($subject['name'])."</div><div class='grades_home_parent'> ".$subject['grades']."</div>";
=======
        echo '<div class="col-md-12 mb-3"><h1 class="text-center"><i class="fa fa-user"></i> '.$subject['first_name'].' '.$subject['last_name'].'</h1></div>';
    
    if( $sub==$subject['name'] && $name==$subject['first_name']){
        echo "<div style='display:inline-block;'> ".$subject['grades']." </div>";

    }
    else
    echo "<div class='col-md-12 text-center'>";
        echo "<div class='col-md-6 d-inline-block font-weight-bold'>".$subject['name']."</div><div class='col-md-6 d-inline-block font-weight-bold'> ".$subject['grades']." ,</div>";
        echo "</div>";
>>>>>>> 16518a977a289cbd9b69b566d5466425e07c5902

    $sub=$subject['name'];
    $name=$subject['first_name'];
   
}

?>
</div>
</div>