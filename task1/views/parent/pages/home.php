

<div class="container p-3">
<div class="col-md-6 text-center bg-info mx-auto p-2">


<?php

$sub="";
$name="";

foreach($this->data['grades'] as $subject){
   
    if($name!==$subject['first_name'])

        echo '<h1 class="mt-5 font-weight-bold">'.$subject['first_name'].' '.$subject['last_name'].'</h1>';
    
    if( $sub===$subject['name'] && $name===$subject['first_name']){
        echo "<div class='grades_home_parent'> ".$subject['grades']."</div>";

    }
    else
        echo "<br><div class='subject_home_parent font-weight-bold'>".ucfirst($subject['name'])."</div><div class='grades_home_parent'> ".$subject['grades']."</div>";

    


    $sub=$subject['name'];
    $name=$subject['first_name'];
   
}

?>
</div>
</div>
