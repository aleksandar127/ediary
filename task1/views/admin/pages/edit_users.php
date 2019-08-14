<div class="container">
    <form>
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" value="<?php echo $this->data['user']['first_name']; ?>">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" value="<?php echo $this->data['user']['last_name']; ?>">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" value="<?php echo $this->data['user']['username']; ?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" id="password" value="<?php echo $this->data['user']['password']; ?>">
    </div>
    <div class="form-group" style="width: 30%;">
          <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option value="<?php echo $this->data['user']['role_id'];?>">One</option>
            </select>
    </div>
    <button type="submit" class="btn btn-dark">Update User</button>
    </form>
</div>