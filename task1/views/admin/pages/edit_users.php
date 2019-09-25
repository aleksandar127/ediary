<div class="container">
    <form method="POST" action="<?php echo URLROOT; ?>/admin/save_update/<?php echo $this->data['user']['id'];?>">
    <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $this->data['user']['first_name']; ?>">
        <p></p>
    </div>
    <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $this->data['user']['last_name']; ?>">
        <p></p>
    </div>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $this->data['user']['username']; ?>">
        <p></p>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="text" class="form-control" id="password" name="password" value="<?php echo $this->data['user']['password']; ?>">
        <p></p>
    </div>
    <div class="form-group" style="width: 30%;">
          <label for="roles">Role:</label>
            <select class="custom-select mr-sm-2" id="roles" name="roles_id">
            <?php foreach ($this->data['roles'] as $role) : ?>
                <?php if($this->data['user']['roles_id'] == $role['id']): ?>
                    <option value="<?php echo $role['id'];?>" selected><?php echo $role['name'];?></option>
                    <?php else : ?>
                    <option value="<?php echo $role['id'];?>"><?php echo $role['name'];?></option>
            <?php endif; ?>
            <?php endforeach;?>
            </select>
    </div>
    <button type="submit" class="btn btn-dark">Update User</button>
    </form>
    <?php if(isset($_SESSION['msg'])): ?>
        <small style="color: green; font-weight: bold; margin-top: 5px;">
            <?php echo $_SESSION['msg']; ?>
        </small>
    <?php endif; ?>
</div>

<script src="<?php echo URLROOT; ?>/assets/admin/js/add_user.js"></script>