<div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Odeljenje</th>
      <th scope="col">Raspored</th>
      <th scope="col">Razredni starešina</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($this->data['all_classes'] as $class): ?>
        <tr>
            <th scope="row"><?php echo $class['id'];?></th>
            <td><?php echo $class['name'];?></td>
            <td><a href="<?php echo URLROOT.'/admin/show_schedule/'.$class['id']; ?>" class="btn btn-light">Otvori</a></td>
            <td><?php echo $class['first_name'].' '.$class['last_name'];?></td>
        </tr>
    <?php endforeach;?>
  </tbody>
</table>

</div>