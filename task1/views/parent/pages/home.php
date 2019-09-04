
<div style='width:500px;background-color:silver;font-size:22px;margin:auto;padding:20px;'>

<?php

$sub=null;
$name=null;

foreach($this->data['grades'] as $subject){
   
    if($name!=$subject['first_name'])
        echo '<br><br><h1 style="text-align:center;">'.$subject['first_name'].' '.$subject['last_name'].'</h1>';
    
    if( $sub==$subject['name'] && $name==$subject['first_name']){
        echo "<div style='display:inline-block;'> ".$subject['grades']." ,</div>";

    }
    else
        echo "<br><div style='display:inline-block;width:200px;margin-right:50px;'>".$subject['name']."</div><div style='display:inline-block;'> ".$subject['grades']." ,</div>";

    $sub=$subject['name'];
    $name=$subject['first_name'];
   
}

?>
</div>