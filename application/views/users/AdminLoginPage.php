
<!-- please style this page when there is time -->

<div class="container">
  <div class="row">
    <h3>Admin Login</h3>
    <!-- form must POST the username and password to this page -->
    <form class="form-horizontal" role="form" action="" method="POST">
      <div class="form-group">
        <label class="control-label col-sm-4" for="username">Admin Username:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="username" name="username" placeholder="Admin Username">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="password">Password</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>

      <!-- this chunk will only appear if the user key in his user/pass wrong the first time -->
      <!-- may want to restyle this -->
      <?php if($retry) { ?>
        <p style="color:red;">Wrong username/password combination!</p>
      <?php } ?>

      <div class="form-group">
        <div class="col-sm-8">
          <input type="submit" class="form-control" id="numProjects" placeholder="Password">
        </div>
      </div>
    </form>
  </div>
</div>
