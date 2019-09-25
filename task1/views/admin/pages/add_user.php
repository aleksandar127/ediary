<div class="container">
    <form method="post" action="<?php echo URLROOT; ?>/admin/save_user">
    <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="John">
        <p></p>
    </div>
    <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe">
        <p></p>
    </div>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Johnny">
        <p></p>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="text" class="form-control" id="password" name="password" placeholder="123456">
        <p></p>
    </div>
    <div class="form-group">
        <label for="re_password">Re-Type Password:</label>
        <input type="text" class="form-control" id="re_password" name="re_password" placeholder="123456">
        <p></p>
    </div>
    <div class="form-group" style="width: 30%;">
          <label for="roles">Role:</label>
            <select class="custom-select mr-sm-2" id="roles" name="role_id">
                 <?php foreach ($this->data['roles'] as $role) : ?>
                    <option value="<?php echo $role['id']; ?>"><?php echo $role['name']; ?></option>
                <?php endforeach; ?>
            </select>
            <small class="text-muted">Note: if you don't choose role, it will be set by default.</small>
    </div>
    <button type="submit" class="btn btn-dark">Add User</button>
    </form>

    <?php if(isset($_SESSION['err'])): ?>
        <small style="color: rgb(255,0,0); font-weight: bold; margin-top: 5px; ">
            <?php echo $_SESSION['err']; ?>
        </small>
    <?php endif; ?>

    <?php if(isset($_SESSION['msg'])): ?>
        <small style="color: green; font-weight: bold; margin-top: 5px; ">
            <?php echo $_SESSION['msg']; ?>
            <?php  unset($_SESSION['msg']);?>
        </small>
    <?php endif; ?>
</div>

<script src="<?php echo URLROOT; ?>/assets/admin/js/add_user.js"></script>