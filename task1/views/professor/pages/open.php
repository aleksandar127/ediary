<br>
<?php

//print_r($this->data['open']);

foreach($this->data['open'] as $parent):

echo $parent['last_name']." ".$parent['first_name']." ".$parent['time'];
echo "<a href='http://localhost/eDiary/task1/professor/open_yes/".$parent['user_open_id']."'  class='btn btn-success' >Potvrdi</a>";
echo "<a href='http://localhost/eDiary/task1/professor/open_no/".$parent['user_open_id']."'  class='btn btn-danger' >Odbij</a>";
echo "<br>";

endforeach;




?>