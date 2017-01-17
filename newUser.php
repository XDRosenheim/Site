<?php
	$HTML_TITLE = "New user";
?>
<form class="form-horizontal" method="post" action="addUser.php">
  <fieldset>
    <legend>New user</legend>
    <div class="form-group">
      <label for="newuser_username" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="newuser_username" name="newuser_username" placeholder="Maximum length = 32">
      </div>
    </div>
    <div class="form-group">
      <label for="newuser_password" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="newuser_password" name="newuser_password" placeholder="Password">
        <div class="checkbox">
          <label>
            <input type="checkbox" onchange="document.getElementById('newuser_password').type = this.checked ? 'text' : 'password'"> Show password
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="newuser_confpass" class="col-lg-2 control-label">Confirm Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="newuser_confpass" name="newuser_confpass" placeholder="Password">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
