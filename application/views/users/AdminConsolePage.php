
<!-- If the lecturer clicks on an existing module, all fields are to be filled in and greyed out -->
<!-- When edit button is clicked, they will be editable -->

<div class="container">
  <div class="row">
    <h3>Module <span id="moduleCode">CS1010</span></h3>
    <form class="form-horizontal" role="form">
      <div class="form-group">
        <label class="control-label col-sm-2" for="classSize">Class Size:</label>
        <div class="col-sm-4">
          <input type="number" class="form-control" id="classSize" placeholder="Class Size">
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
        <div class="col-sm-5">
          <input type="text" class="form-control">
          <input type="text" class="form-control">
          <input type="text" class="form-control">
          <input type="text" class="form-control">
          <input type="text" class="form-control">
        </div>
        <div class="col-sm-5"><button type="submit" class="btn btn-default">Add</button></div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>

    </form>
  </div>
</div>
