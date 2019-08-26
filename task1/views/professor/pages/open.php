<br>
<?php

//print_r($this->data['open']);
$keys=[];
//print_r($this->data['open_parents']);
foreach($this->data['open_parents'] as $niz):
    $keys[]=$niz['last_name']." ".$niz['first_name'];
    endforeach;
    
    echo '<div style="background-color:#defffa;height:500px;overflow:auto;width:450px;margin-left:500px;">';
foreach($this->data['open'] as $parent):
    
switch($parent['accepted']){
    case 0:
echo '<div style="background-color:#e0cf48;border-radius:15px;min-height:50px;"><span style="display:inline-block;width=300px;font-size:20px;">';
echo current($keys)." ".substr($parent['time'],0,-3);
echo "</span>";
echo "<a href='http://localhost/eDiary/task1/professor/open_yes/".$parent['user_open_id']."'  class='btn btn-success' >Potvrdi</a>";
echo "<a href='http://localhost/eDiary/task1/professor/open_no/".$parent['user_open_id']."'  class='btn btn-danger' >Odbij</a>";
echo '</div>';
echo "<br>";
break;
case 1:
echo '<div style="background-color:#71ff52;border-radius:15px;font-size:20px;min-height:50px;">';
echo current($keys)." ".substr($parent['time'],0,-3);
//echo $parent['last_name']." ".$parent['first_name']." ".$parent['time'];
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Potvrdjeno!!<br>";
echo '</div>';
echo "<br>";
break;
case 2:
echo '<div style="background-color:#fa1e25;border-radius:15px;font-size:20px;min-height:50px;">';
echo current($keys)." ".substr($parent['time'],0,-3);
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Odbijeno!!<br>";
echo '</div>';
echo "<br>";
break;
default:
return;


}
next($keys);
endforeach;

echo '</div>';


?>