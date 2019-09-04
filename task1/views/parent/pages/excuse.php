


<form action='<?php echo URLROOT."/parent/send_excuse"?>' method="post" enctype="multipart/form-data" name="myForm" >
<div class="form-group">
    
<select class="mdb-select md-form" name="student">
  <option value="" disabled selected>Izaberi ucenika</option>
  <?php 
  foreach($this->data['students'] as $student):
  echo '<option value="'.$student['id'].'">'.$student['first_name'].' '.$student['last_name'].'</option>';
  endforeach;
  ?>
</select>
   
  </div>
  <div class="form-group">
    <label for="Opravdanje">Opravdanje</label>
    <input type="file" class="form-control" id="excuse" name="excuse">
  </div>

  <button type="submit"  class="btn btn-primary" onclick="return(validateForm())">Submit</button>
</form>

<script>
function validateForm() {
  var x = document.forms["myForm"]["student"].value;
  var y = document.forms["myForm"]["excuse"].value;
  if (x == "" || y=="") {
    alert("Morate izabrati sliku i ucenika");
    return false;
  }
}
</script>