
<div class="site-container admin-loginPage-container">
  <div class="row">

    <div class ="small-login-box col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">

      <form class="form" role="form" action="" method="POST">
        
        <div class="row">
          <div class="form-group">
            <label class="control-label col-md-3" for="username">Admin Username:</label>
            <div class="col-md-8 col-sm-12">
              <input type="text" class="form-control" id="username" name="username" placeholder="Admin Username">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group">
            <label class="control-label col-md-3" for="password">Password:</label>
            <div class="col-md-8 col-sm-12">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
          </div>
        </div>

        <div class="form-group" id="admin-login-btn-div">
          <div class="col-md-4 col-md-offset-8 col-xs-12">
            <input type="submit" class="form-control btn btn-secondary" id="numProjects" placeholder="Password">
          </div>
        </div>

        <!-- this chunk will only appear if the user key in his user/pass wrong the first time -->
        <!-- may want to restyle this -->
        <?php 
          if($retry) { 
        ?>
        <div id="admin-bad-login-msg">Wrong username/password combination!</div>
        <?php } ?>

      </form>
    </div><!-- end of login box-->



  </div>
</div>
