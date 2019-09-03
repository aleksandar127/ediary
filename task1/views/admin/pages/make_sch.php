<div class="container">
    <form method="POST" action="#">
        <div class="form-group">
            <label for="class_sch">Odaberite razred za koji pravite raspored:</label>
            <select class="form-control" id="class_sch" name="class_sch">
                <option></option>   
                <?php foreach($this->data['available_classes'] as $avl_cls): ?>
                    <option value="<?php echo $avl_cls['id'].','.$avl_cls['high_low']; ?>"><?php echo $avl_cls['name']; ?></option>
                <?php endforeach;?>
            </select>
        </div>
    
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><select class="form-control" id="exampleFormControlSelect1">
                <!-- fill here with specific data -->
            </select></td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
    </form>
</div>

<script src="http://localhost/eDiary/task1/assets/admin/js/make_schedule.js"></script>