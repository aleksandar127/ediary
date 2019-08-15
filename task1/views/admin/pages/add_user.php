<div class="container">
    <form method="post" action="http://localhost/eDiary/task1/admin/save_user">
    <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="John">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe">
    </div>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Johnny">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="text" class="form-control" id="password" name="password" placeholder="123456">
    </div>
    <div class="form-group">
        <label for="password">Re-Type Password:</label>
        <input type="text" class="form-control" id="re_password" name="re_password" placeholder="123456">
    </div>
    <div class="form-group" style="width: 30%;">
          <label for="roles">Role:</label>
            <select class="custom-select mr-sm-2" id="roles" name="role_id">
                 <?php foreach ($this->data['roles'] as $role) : ?>
                    <option value="<?php echo $role['id']; ?>"><?php echo $role['name']; ?></option>
                <?php endforeach; ?>
            </select>
    </div>
    <button type="submit" class="btn btn-dark">Add User</button>
    </form>
</div>