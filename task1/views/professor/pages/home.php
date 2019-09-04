
<table>
<tr><th>Ime</th><th>Svedocanstvo</th></tr>
<?php

//print_r($this->data['class']);
echo "<h1>".$this->data['class']['name']."</h1>";

foreach($this->data['students'] as $students){
    echo '<tr>';
    echo '<td>'.$students['last_name'].' '.$students['first_name'].'</td>';
    echo '<td><a  class="btn btn-warning" href="'.URLROOT.'/professor/success/'.$students['id'].'">Svedocanstvo</a></td>';

    echo '</tr>';

}
?>
</table>