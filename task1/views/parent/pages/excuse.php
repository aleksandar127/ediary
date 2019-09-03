


<form action='<?php echo URLROOT."parent/excuse.php"?>' method="post" enctype="multipart/form-data">
<div class="form-group">
    
<select class="mdb-select md-form">
  <option value="" disabled selected>Izaberi ucenika</option>
  <option value="1">Option 1</option>
 
</select>
   
  </div>
  <div class="form-group">
    <label for="Opravdanje">Opravdanje</label>
    <input type="file" class="form-control" id="opravdanje">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>