<div class="container">
    <a href="<?php echo URLROOT; ?>/admin/add_user" class="btn btn-success">Dodaj novog korisnika</a>
    <table class="table">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ime</th>
      <th scope="col">Prezime</th>
      <th scope="col">Korisničko ime</th>
      <th scope="col">Šifra</th>
      <th scope="col">Uloga</th>
      <th scope="col">Izmeni informacije</th>
      <th scope="col">Izbrisati korisnika</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($this->data['users'] as $user): ?>
    <tr>
      <th scope="row"><?php echo $user['id']; ?></th>
      <td><?php echo $user['first_name']; ?></td>
      <td><?php echo $user['last_name']; ?></td>
      <td><?php echo $user['username']; ?></td>
      <td><?php echo str_replace($user['password'], str_repeat(' &#9679;', 6) , $user['password']); ?></td>
      <td><?php echo $user['role_name']; ?></td>
      <td><a class="btn btn-dark" href="<?php echo URLROOT; ?>/admin/edit_user/<?php echo $user['id'];?>">Izmeni</a></td>
      <?php if($user['role_name'] !== 'admin'): ?>
        <td><a class="btn btn-danger" href="#">Izbriši korisnika</a>

            <div class="pop-up" id="pop-up">
              <p>Are you sure you want to delete this user?</p>
              <a class="delete" href="<?php echo URLROOT; ?>/admin/delete_user/<?php echo $user['id'];?>">Izbriši</a>
              <a class="cancel">Otkaži</a>
            </div>

            <div id="overlay"></div>
        </td>
      <?php endif; ?>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>

<script src="<?php echo URLROOT; ?>/assets/admin/js/delete_confirm.js"></script>