<br>
<div class="container">
<?php if($this->data['open']!=null): ?>
   <h1 class="text-center">Otvorena vrata: <span class="h4"><?php echo substr($this->data['open'][0]['time'],0,-3); ?>h</span></h1>
<?php endif; ?>

<div class="col-md-12">
<form action="<?php echo URLROOT; ?>/professor/open_create/"  method='get'>
  <div class="form-group col-md-4 mx-auto text-center">
    <label for="date">Zakazi otvorena vrata: </label>
    <input class="form-control" type="datetime-local" name="date" id="date">
  </div>
  <div class="form-group col-md-4 mx-auto">
    <input class="form-control btn btn-info" type="submit" value="Zakazi">
  </div>
</form>
</div>
<table class="table table-striped col-md-6 mx-auto mt-5">
  <thead>
    <tr>
      <th>IME</th>
      <th>STATUS</th>
    </tr>
  </thead>
  <tbody>
<?php
echo '<tr>';
//print_r($this->data['open']);



   
foreach($this->data['open'] as $parent): 
    
switch($parent['accepted']){
    case 0:
      echo '<td>';
      echo $parent['last_name'].' '.$parent['first_name'];
      echo "</td>";
      echo "<td><a href='".URLROOT."/professor/open_yes/".$parent['user_open_id']."'  class='btn btn-success' >Potvrdi</a>";
      echo "<a href='".URLROOT."/professor/open_no/".$parent['user_open_id']."'  class='btn btn-danger' >Odbij</a>";
      echo '</td>';
      break;
    case 1:
      echo '<td>';
      echo $parent['last_name'].' '.$parent['first_name'];
      echo "</td>";
      echo "<td class='font-weight-bold'>Potvrdjeno!!</td>";
  
      break;
    case 2:
      echo '<td>';
      echo $parent['last_name'].' '.$parent['first_name'];
      echo '</td>';
      echo "<td class='font-weight-bold'>Odbijeno!!</td>";

      break;
    default: 
       return;
}

echo '</tr>';
endforeach;




?>
</tbody>
</table>

</div>