
<br>



</table>

<table id='open_request_table' style='min-height:200px;'>
<tr><th colspan='4';>ZAKAZIVANJE OTVORENIH VRATA</th></tr>
<tr><th>IME</th><th>PREDMET</th><th>VREME</th><th>ZAKAZI</th></tr>
<?php
//print_r($this->data['open_sent']);
foreach($this->data['professors'] as $open){
    if($open['title']=='professor' || $open['title']=='teacher')
        $open['title']='razredni';

    echo '<tr>';
    echo '<td>'.$open['last_name'].' '.$open['first_name'].'</td>';
    echo '<td>'.$open['title'].'</td>';
    echo '<td>'.substr($open['time'],0,-3).'</td>';
    echo '<td><a  class="btn btn-success" href="'.URLROOT.'/parent/open_send_request/'.$open['id'].'">ZAKAZI</a></td>';
    echo '</tr>';
}

?>
</table>


<table  id='open_response_table' style='min-height:200px;'>
<tr><th colspan='3';>STATUS OTVORENIH VRATA</th></tr>
<tr><th>VREME</th><th>IME</th><th>STATUS</th></tr>
<?php
foreach($this->data['open_sent'] as $open){
    if($open[4]=='professor' || $open[4]=='teacher')
        $open[4]='razredni';
    $status="ZAHTEV POSLAT";
    $color="silver";
    echo  '<tr>';
    echo  '<td>'.substr($open[0],0,-3).'</td>';
    echo '<td>'.$open[1].' '.$open[2].' '.$open[4].'</td>';
    if($open[3]==1){
        $status="<b>PRIHVACENO</b>";
        $color="green";
    }
    if($open[3]==2){
        $status="<b>ODBIJENO</b>";
        $color="red";
    }
    echo  '<td style="background-color:'.$color.';">'.$status.'</td>';
    echo  '</tr>';
}

echo  '</table>';


//print_r($this->data['open_sent']);
//print_r($this->data['professors']);
?>