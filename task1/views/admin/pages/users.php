<div class="container">
    <table class="table">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Role</th>
      <th scope="col">Edit User</th>
      <th scope="col">Delete User</th>
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
      <td><a class="btn btn-dark" href="<?php echo 'http://localhost/eDiary/task1/admin/edit_user/'.$user['id'];?>">edit</a></td>
      <?php if($user['role_name'] !== 'admin'): ?>
        <td><a class="btn btn-danger" href="#">delete</a>

            <div class="pop-up" id="pop-up">
              <p>Are you sure you want to delete this user?</p>
              <a class="delete" href="<?php  echo 'http://localhost/eDiary/task1/admin/delete_user/'.$user['id'];?>">Delete</a>
              <a class="cancel">Cancel</a>
            </div>

            <div id="overlay"></div>
        </td>
      <?php endif; ?>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<a href="http://localhost/eDiary/task1/admin/add_user" class="btn btn-success">Add New User</a>
</div>



<script src="http://localhost/eDiary/task1/assets/admin/js/delete_confirm.js"></script>