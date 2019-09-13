<div class="container">
    <a href="http://localhost/eDiary/task1/admin/make_schedule" class="btn btn-success">Napravi raspored!</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Odeljenje</th>
      <th scope="col">Raspored</th>
      <th scope="col">Razredni starešina</th>
      <th scope="col">Izmeni raspored</th>
      <th scope="col">Izbriši raspored</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($this->data['all_classes'] as $class): ?>
        <tr>
            <th scope="row"><?php echo $class['id'];?></th>
            <td><?php echo $class['name'];?></td>
            <td><a href="<?php echo URLROOT.'/admin/show_schedule/'.$class['id']; ?>" class="btn btn-light">Otvori</a></td>
            <td><?php echo $class['first_name'].' '.$class['last_name'];?></td>
            <td><a class="btn btn-dark" href="<?php echo URLROOT.'/admin/edit_sch/'.$class['id']?>">Izmeni</a></td>
            <td><a class="btn btn-danger" href="#">Izbriši</a>
            
              <div class="pop-up" id="pop-up">
                <p>Da li ste sigurni da želite da izbrišete raspored za ovo odeljenje?</p>
                <a class="delete" href="<?php echo URLROOT; ?>/admin/delete_sch/<?php echo $class['id'];?>">Izbriši</a>
                <a class="cancel">Otkaži</a>
              </div>

              <div id="overlay"></div>
            
            </td>
        </tr>
    <?php endforeach;?>
  </tbody>
</table>
    <?php if(isset($_GET['success'])): ?>
        <small style="color: green; font-weight: bold; margin-top: 5px; ">
            <?php echo $_GET['success']; ?>
        </small>
    <?php endif; ?>
    <?php if(isset($_GET['err'])): ?>
        <small style="color: red; font-weight: bold; margin-top: 5px; ">
            <?php echo $_GET['err']; ?>
        </small>
    <?php endif; ?>
</div>

<script  src="<?php echo URLROOT; ?>/assets/admin/js/delete_confirm.js"></script>