
<!-- If the lecturer clicks on an existing module, all fields are to be filled in and greyed out -->
<!-- When edit button is clicked, they will be editable -->

<div class="container">
  <div class="row">
    <h3>Admin Login</h3>
    <!-- form must POST the username and password to this page -->
    <form class="form-horizontal" role="form" action="" method="POST">
      <div class="form-group">
        <label class="control-label col-sm-4" for="username">Admin Username:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="usernme" name="username" placeholder="Admin Username">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="password">Password</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-8">
          <input type="submit" class="form-control" id="numProjects" placeholder="Password">
        </div>
      </div>
    </form>
  </div>
</div>
