
<div class="container site-container">
  <div class="row">
    <h3>Module <span id="moduleCode">CS1010</span></h3>
    <div class="form-horizontal" role="form">       

      <div class="form-group">
        <label class="control-label col-sm-2" for="classSize">Class Size:</label>
        <div class="col-sm-4 field-group has-feedback">
          <h5 class="inputText" id="classSizeText">20</h5>
          <i class="glyphicon glyphicon-pencil form-control-feedback"></i>
          <form id="editClassSize">
          <input type="number" class="form-control inputField" id="classSizeField" placeholder="Class Size">
          </form>
          <i class="glyphicon glyphicon-ok form-control-feedback"></i>
        </div>     

        <label class="control-label col-sm-2" for="numProjects">Number of Projects:</label>
        <div class="col-sm-4 field-group has-feedback">
          <h5 class="inputText" id="numProjectsText">20</h5>
          <i class="glyphicon glyphicon-pencil form-control-feedback"></i>
          <form id="editNumProjects"> 
          <input type="number" class="form-control inputField" id="numProjectsField" placeholder="Number of Projects">
          </form>
          <i class="glyphicon glyphicon-ok form-control-feedback"></i>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="moduleDescription">Description:</label>
        <div class="col-sm-10 field-group"> 
          <h5 class="inputText" id="moduleDescriptionText">hellover 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes</h5>
          <form id="editModuleDescription">
          <textarea class="form-control inputField" rows="5" id="moduleDescriptionField" placeholder="Add Description for Module"></textarea>
          </form>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="">Project Titles:</label> 
        <div class="col-sm-5 field-group field-list projectTitleFields">
          <div id = "projectTitles">
          <?php $counter=1 ?> 
          <h5 class="inputText" id="projectTitle<?php echo $counter++ ?>">Awesome Posum</h5> 
          <h5 class="inputText" id="projectTitle<?php echo $counter++ ?>">Awesome Posum</h5> 
          <h5 class="inputText" id="projectTitle<?php echo $counter++ ?>">Awesome Posum</h5> 
          <h5 class="inputText" id="projectTitle<?php echo $counter++ ?>">Awesome Posum</h5>
          </div>
          <input type="text" class="form-control inputField" placeholder="Project Title">
          <input type="text" class="form-control inputField" placeholder="Project Title">
          <input type="text" class="form-control inputField" placeholder="Project Title">
          <input type="text" class="form-control inputField" placeholder="Project Title">
          <input type="text" class="form-control inputField" placeholder="Project Title"> 
        </div>
        <div class="col-sm-5"><button class="btn btn-default addProjectTitleBtn">Add</button></div>
      </div>
      <div class="form-group"> 
      </div>
    </div>
  </div>
</div>

<!-- FOR THE FIRST TIME THE MODULE IS REGISTERED -->
<!-- <div class="container">
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
</div> -->