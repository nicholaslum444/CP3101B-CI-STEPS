
<div class="container">
  <div class="row">
    <h3>Module <?php echo $data['moduleCode']; ?></h3>
    <div class="form-horizontal" role="form">

      <div class="form-group">
        <label class="control-label col-sm-2" for="classSize">Class Size:</label>
        <div class="col-sm-4 field-group has-feedback">
          <h5 class="inputText" id="classSizeText"><?php $classSize = $data['classSize']; 
              if ($classSize == null) echo 0; 
              else echo $classSize; ?></h5>
          <i class="glyphicon glyphicon-pencil form-control-feedback"></i>
          <form id="editClassSize">
            <input type="number" class="form-control inputField" id="classSizeField" value="<?php echo $data['classSize']; ?>">
          </form>
          <i class="glyphicon glyphicon-ok form-control-feedback"></i>
        </div>

        <label class="control-label col-sm-2" for="numProjects">Number of Projects:</label>
        <div class="col-sm-4 field-group has-feedback">
          <h5 class="inputText" id="numProjectsText"><?php $numProjects = count($data['project']); 
          if ($numProjects == null) echo 0;
          else echo $numProjects; ?></h5>
          <i class="glyphicon glyphicon-pencil form-control-feedback"></i>
          <form id="editNumProjects">
            <input type="number" class="form-control inputField" id="numProjectsField" value="<?php echo count($data['project']); ?>">
          </form>
          <i class="glyphicon glyphicon-ok form-control-feedback"></i>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="moduleDescription">Description:</label>
        <div class="col-sm-10 field-group">
          <h5 class="inputText" id="moduleDescriptionText"><?php $moduleDescription = $data['moduleDescription']; 
            if($moduleDescription == null) echo '-';
              else echo $moduleDescription; ?></h5>
          <i class="glyphicon glyphicon-pencil form-control-feedback"></i>
          <form id="editModuleDescription">
            <textarea class="form-control inputField" rows="5" id="moduleDescriptionField" placeholder="Add Description for Module"><?php echo $data['moduleDescription']; ?></textarea>
          </form>
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

          <form id="editProjectTitle">
            <?php $counter=1;$abc=1 ?>
            <input type="text" name="projectTitle<?php echo $counter++ ?>" class="form-control inputField" data-id="<?php echo $abc++ ?>" value="">
            <input type="text" name="projectTitle<?php echo $counter++ ?>" class="form-control inputField" data-id="<?php echo $abc++ ?>" value="">
            <input type="text" name="projectTitle<?php echo $counter++ ?>" class="form-control inputField" data-id="<?php echo $abc++ ?>" value="">
            <input type="text" name="projectTitle<?php echo $counter++ ?>" class="form-control inputField" data-id="<?php echo $abc++ ?>" value="">
            <input type="text" name="projectTitle<?php echo $counter++ ?>" class="form-control inputField" data-id="<?php echo $abc++ ?>" value="">
            <input type="submit" style="display: none;">
          </form>
        </div>
        <div class="col-sm-5"><button class="btn btn-default addProjectTitleBtn">Add</button></div>
      </div>

      <div class="form-group">
      </div>
    </div>
  </div>
</div>

<!-- FOR THE FIRST TIME THE MODULE IS REGISTERED
<div class="container">
  <div class="row">
    <h3>Module <span id="moduleCode">CS1010</span></h3>
    <form class="form-horizontal" role="form">

      <div class="form-group">
        <label class="control-label col-sm-2" for="classSize">Class Size:</label>
        <div class="col-sm-4">
          <input type="number" class="form-control" id="classSize" placeholder="Class Size" >
        </div>
        <label class="control-label col-sm-2" for="numProjects">Number of Projects:</label>
        <div class="col-sm-4">
          <input type="number" class="form-control" id="numProjects" placeholder="Number of Projects">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="moduleDescription">Description:</label>
        <div class="col-sm-10">
          <textarea class="form-control" rows="5" id="moduleDescription" placeholder="Add Description for Module"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="">Project Titles:</label>
        <div class="col-sm-5" class="projectTitleFields">
          <input type="text" class="form-control" placeholder="Project Title">
          <input type="text" class="form-control" placeholder="Project Title">
          <input type="text" class="form-control" placeholder="Project Title">
          <input type="text" class="form-control" placeholder="Project Title">
          <input type="text" class="form-control" placeholder="Project Title">
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
</div-->
