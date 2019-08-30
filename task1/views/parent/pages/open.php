
<br>



</table>

<table  style='border:solid black 3px;display:inline-block;'>
<tr><th>IME</th><th>PREDMET</th><th>VREME</th><th>ZAKAZI</th></tr>
<?php
//print_r($this->data['open_sent']);
foreach($this->data['professors'] as $open){
    if($open['title']=='professor' || $open['title']=='teacher')
    $open['title']='razredni';
   
    echo  '<tr>';
   
    echo '<td>'.$open['last_name'].' '.$open['first_name'].'</td>';
    echo  '<td>'.$open['title'].'</td>';
   
    echo  '<td>'.substr($open['time'],0,-3).'</td>';
    echo  '<td><a  class="btn btn-success" href="http://localhost/eDiary/task1/parent/open_send_request/'.$open['id'].'">ZAKAZI</a></td>';
  
    echo  '</tr>';
}

?>



</table>

<table style='margin-left:500px;border:solid black 3px;display:inline-block;'>
<tr><th>VREME</th><th>IME</th><th>STATUS</th></tr>
<?php
foreach($this->data['open_sent'] as $open){
    $status="ZAHTEV POSLAT";
    $color="silver";
    echo  '<tr>';
    echo  '<td>'.substr($open[0],0,-3).'</td>';
    echo '<td>'.$open[1].' '.$open[2].' '.$open[4].'</td>';
    if($open[3]==1){
    $status="PRIHVACENO";
    $color="green";
    }
    if($open[3]==2){
    $status="ODBIJENO";
    $color="red";
    }
    echo  '<td style="background-color:'.$color.';">'.$status.'</td>';
    
    echo  '</tr>';
}

?>



<?php

//print_r($this->data['open_sent']);

//print_r($this->data['professors']);











?>