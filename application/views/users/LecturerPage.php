<div class="container">
  <div class="row">

    <!--List of modules to be generated-->
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
            <?php
            if (isset($data)) {
                foreach ($data as $module) { ?>
                    <a href="/index.php/lecturer/newModule/<?php $module['moduleCode']; ?>"><?php $module["moduleName"]; ?></a>
                <?php }
            } else { ?>
                <a href="/index.php/lecturer/newModule">Module</a>
            <?php } ?> 
         <a href="/index.php/lecturer/newModule">Module</a>
       </div>
     </div>
   </div><!--End md-6-->

   <div class="col-md-6">
    <form class="form" action="">
      <div class="form-group">
        <input type="hidden" class="form-control" id="registerModule">
      </div>
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#registerModal">Register Module</button>
    </form>
  </div>

</div>
</div>

<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register a Module</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="moduleCode">Module Code</label>
          <input type="text" class="form-control" id="moduleCode" placeholder="">
        </div>
        <div class="form-group">
          <label for="moduleName">Module Name</label>
          <input type="text" class="form-control" id="moduleName" placeholder="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Register</button>
      </div>
    </div>
  </div>
</div>
