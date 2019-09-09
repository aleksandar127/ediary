
<div class='container'>
<div class='col-md-6 text-center'>

<?php

$sub=null;
$name=null;

foreach($this->data['grades'] as $subject){
   
    if($name!=$subject['first_name'])
        echo '<div class="col-md-12 mb-3"><h1 class="text-center"><i class="fa fa-user"></i> '.$subject['first_name'].' '.$subject['last_name'].'</h1></div>';
    
    if( $sub==$subject['name'] && $name==$subject['first_name']){
        echo "<div style='display:inline-block;'> ".$subject['grades']." </div>";

    }
    else
    echo "<div class='col-md-12 text-center'>";
        echo "<div class='col-md-6 d-inline-block font-weight-bold'>".$subject['name']."</div><div class='col-md-6 d-inline-block font-weight-bold'> ".$subject['grades']." ,</div>";
        echo "</div>";

    $sub=$subject['name'];
    $name=$subject['first_name'];
   
}

?>
</div>
</div>