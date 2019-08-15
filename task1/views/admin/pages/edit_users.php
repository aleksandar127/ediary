<div class="container">
    <form>
    <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" class="form-control" id="first_name" value="<?php echo $this->data['user']['first_name']; ?>">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" class="form-control" id="last_name" value="<?php echo $this->data['user']['last_name']; ?>">
    </div>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" value="<?php echo $this->data['user']['username']; ?>">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="text" class="form-control" id="password" value="<?php echo $this->data['user']['password']; ?>">
    </div>
    <div class="form-group" style="width: 30%;">
          <label for="roles">Role:</label>
            <select class="custom-select mr-sm-2" id="roles">
            <?php foreach ($this->data['roles'] as $role) : ?>
                <?php if($this->data['user']['role_id'] == $role['id']): ?>
                    <option value="<?php echo $role['id'];?>" selected><?php echo $role['name'];?></option>
                    <?php else : ?>
                    <option value="<?php echo $role['id'];?>"><?php echo $role['name'];?></option>
            <?php endif; ?>
            <?php endforeach;?>
            </select>
    </div>
    <button type="submit" class="btn btn-dark">Update User</button>
    </form>
</div>