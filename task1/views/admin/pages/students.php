<div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Odeljenje</th>
      <th scope="col">Učenici</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($this->data['all_classes'] as $class): ?>
        <tr>
            <th scope="row"><?php echo $class['id'];?></th>
            <td><?php echo $class['name'];?></td>
            <td><a href="<?php echo URLROOT.'/admin/show_students/'.$class['id']; ?>" class="btn btn-light">Otvori</a></td>
        </tr>
    <?php endforeach;?>
  </tbody>
</table>
</div>