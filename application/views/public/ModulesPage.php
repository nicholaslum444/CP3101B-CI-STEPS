<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar"><!--List of modules to be generated-->
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="?">Module1</a></li>
            <li><a href="?">Module2</a></li>
            <li><a href="?">Module3</a></li>
            <li><a href="?">Module4</a></li>
          </ul>
        </div>

      <div class="col-md-10">
        <div class="panel panel-default">
          <div class="panel-body">
              <!-- use the data from the give data object here -->
              <!-- see modules.php controller for more info -->
              <h1><?php echo $moduleCode ?></h1>
              <h1><?php echo $moduleName ?></h1>
              <!-- yes we can code php inside this file too! -->
           <p>Modules participating and their information</p>
         </div>
       </div>
     </div>

   </div>
</div> <!-- End of container -->
