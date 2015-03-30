<div class="container">
  <div class="row">

    <!--List of modules to be generated-->
    <div id = "moduleList" class="col-md-6">
            <?php
            if (isset($data)) {
              for ($i = 0; $i < count($data); $i++) {
                $module = $data[$i]; ?>
                <div class="container">
                  <div class="row">
                    <h3>Module <?php echo $module['moduleCode']; ?></h3>





                    <div class="form-horizontal" role="form">
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="classSize">Class Size:</label>
                        <div class="col-sm-4 field-group has-feedback">
                          <h5 class="inputText" id="classSizeText"><?php $classSize = $module['classSize']; 
                              if ($classSize == null) echo 0; 
                              else echo $classSize; ?></h5>
                        </div>

                        <label class="control-label col-sm-2" for="numProjects">Number of Projects:</label>
                        <div class="col-sm-4 field-group has-feedback">
                          <h5 class="inputText" id="numProjectsText"><?php $numProjects = count($module['project']); 
                          if ($numProjects == null) echo 0;
                          else echo $numProjects; ?></h5>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2" for="moduleDescription">Description:</label>
                        <div class="col-sm-10 field-group">
                          <h5 class="inputText" id="moduleDescriptionText"><?php $moduleDescription = $module['moduleDescription']; 
                            if($moduleDescription == null) echo '-';
                              else echo $moduleDescription; ?></h5>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2" for="">Project Titles:</label>
                        <div class="col-sm-5 field-group field-list projectTitleFields">
                          <?php $counter=1; ?>
                          <h5 class="inputText" id="projectTitle<?php echo $counter++ ?>">Awesome Posum</h5>
                          <h5 class="inputText" id="projectTitle<?php echo $counter++ ?>">Awesome Posum</h5>
                          <h5 class="inputText" id="projectTitle<?php echo $counter++ ?>">Awesome Posum</h5>
                          <h5 class="inputText" id="projectTitle<?php echo $counter++ ?>">Awesome Posum</h5>
                        </div>
                        <div class="col-sm-5"><button class="btn btn-default addProjectTitleBtn">Add</button></div>
                      </div>
                      <div class="form-group">
                      </div>
                    </div>










                  </div>
                </div>
                <?php }
            } else { ?>
                <a href="/index.php/lecturer/viewModule">Dummy Module</a>
            <?php } ?>
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

<!-- Modal for registering module-->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="registerModuleForm">
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
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for editing module-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!--Form for editing module insert here-->
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <!-- CLASS SIZE -->
          <label class="control-label col-sm-2" for="classSize">Class Size:</label>
          <div class="col-sm-4">
            <input type="number" class="form-control" id="classSize" placeholder="Class Size" >
          </div>
          <!-- NUMBER OF PROJECTS -->
          <label class="control-label col-sm-2" for="numProjects">Number of Projects:</label>
          <div class="col-sm-4">
            <input type="number" class="form-control" id="numProjects" placeholder="Number of Projects">
          </div>
        </div>

        <div class="form-group">
          <!-- DESCRIPTIONS -->
          <label class="control-label col-sm-2" for="moduleDescription">Description:</label>
          <div class="col-sm-10">
            <textarea class="form-control" rows="5" id="moduleDescription" placeholder="Add Description for Module"></textarea>
          </div>
        </div>

        <div class="form-group">
          <!-- PROJECT TITLES -->
          <label class="control-label col-sm-2" for="">Project Titles:</label>
          <div class="col-sm-5" class="projectTitleFields">
            <!-- DYNAMICALLY GENERATE AND INSERT INPUT FIELDS INTO HERE
            SAMPLE: <input type="text" class="form-control" placeholder="Project Title">
             -->
          </div>

          <div class="col-sm-5"><div class="btn btn-default addProjectTitleBtn">Add</div></div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
