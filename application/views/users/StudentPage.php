<div class="container">

    <div class="row">
        <h2>List of Projects</h2>
    </div>
    
    <!--Loop through all modules the student is currently studying. modulename, modulecode-->
    <div class="row">     
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    module code 
                    <!-- modulecode to be placed in data-module-->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#registerProjectModal" data-module="">Sign up</button>
                </div>
            </div>
        </div><!--End md-12-->
    </div>

    <!--To be shown only when student signed up for it -->
    <div class="row">     
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-horizontal" role="form" index="1">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="projectTitle">Project Title:</label>
                            <div class="col-sm-4 field-group has-feedback">
                                <h5 class="inputText projectTitleText" id="projectTitle" project="">ABCproject</h5>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="abstractText">Abstract:</label>
                            <div class="col-sm-10 field-group">
                                <h5 class="inputText abstractText" project=""></h5>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="">Team Members: </label>
                            <div class="col-sm-5 field-group field-list projectTitles" module="" numOfProject = "4">
                            </div>
                        </div>
                        <!-- Edit Button for Leaders -->
                    </div>
                </div>
            </div>
        </div><!--End md-12-->
    </div>


</div>

<!-- Modal for registering module-->
<div class="modal fade" id="registerProjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="registerProjectForm">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4><!-- put in module code -->
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="projectSelect">Select list:</label>
                        <select class="form-control" name="projectTitle" id="projectSelect"> <!-- Dyanamic Project Titles -->
                            <option value="" default selected>Select a Project</option>
                            <option>Awesome Project</option>
                            <option>Awesome Project</option>
                            <option>Awesome Project</option>
                            <option>Awesome Project</option>
                        </select>
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

<script> 
$('#registerProjectModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var moduleCode = 'CS1231'; //button.data('module') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-title').text(moduleCode + " Project Sign Up");
}) 
</script>