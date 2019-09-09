
<div class='container'>
<div class='col-md-12 text-center bg-info p-3'>

<?php

$sub=null;
$name=null;

foreach($this->data['grades'] as $subject){
   
    if($name!=$subject['first_name'])
        echo '<div class="col-md-12 mb-3"><h1 class="text-center"><i class="fa fa-user text-warning"></i> '.$subject['first_name'].' '.$subject['last_name'].'</h1></div>';
    
    if( $sub==$subject['name'] && $name==$subject['first_name']){
        echo "<div style='display:inline-block;'> ".$subject['grades']." </div>";

    }
    else
    echo "<div class='row'><div class='col-md-12'>";
        echo "<div class='col-md-4 bg-dark d-inline-block text-light font-weight-bold h4 text-center p-2 rounded mr-1'>".$subject['name']."</div>";
        echo "<div class='col-md-4 bg-dark d-inline-block text-light font-weight-bold h4 p-2 rounded'> ".$subject['grades']." </div>";
echo "</div></div>";

    $sub=$subject['name'];
    $name=$subject['first_name'];
   
}

?>
</div>
</div>