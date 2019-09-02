<br>
<h1>
<?php
if($this->data['open']!=null)
echo 'Otvorena vrata: '.substr($this->data['open'][0]['time'],0,-3).'h';
?>

</h1>
<form action="http://localhost/eDiary/task1/professor/open_create"  method='get'>
  Zakazi otvorena vrata: <input type="datetime-local" name="date" id="date"><br>
 
  <input type="submit" value="Zakazi">
</form>
<table style='border:solid silver 3px;font-size:20px;'>
<tr style='border:solid silver 3px;text-align:center;padding:2px;'><th>IME</th><th>STATUS</th></tr>
<?php
echo '<tr>';
//print_r($this->data['open']);



   
foreach($this->data['open'] as $parent):
    
switch($parent['accepted']){
    case 0:
echo '<td style="background-color:#e0cf48;border-radius:15px;min-height:50px;"><span style="display:inline-block;min-width=300px;font-size:20px;">';
echo $parent['last_name'].' '.$parent['first_name'];
echo "</span></td>";
echo "<td><a href='".URLROOT."/professor/open_yes/".$parent['user_open_id']."'  class='btn btn-success' >Potvrdi</a>";
echo "<a href='".URLROOT."/professor/open_no/".$parent['user_open_id']."'  class='btn btn-danger' >Odbij</a>";
echo '</td>';

break;
case 1:
echo '<td style="background-color:#71ff52;font-size:20px;min-height:50px;">';
echo $parent['last_name'].' '.$parent['first_name'];

echo "<td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Potvrdjeno!!</b></td>";
echo '</td>';

break;
case 2:
echo '<td style="background-color:#fa1e25;font-size:20px;min-height:50px;">';
echo $parent['last_name'].' '.$parent['first_name'];
echo '<td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Odbijeno!!</b></td>';
echo '</td>';

break;
default: 
return;


}

echo '</tr>';
endforeach;




?>

</table>
