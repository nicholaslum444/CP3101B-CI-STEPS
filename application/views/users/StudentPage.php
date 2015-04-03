<div class="container">

<div class="row">
    <h3>Projects</h3>
</div>


<!--To be shown only when student is signed up for it -->
<?php if(isset($data[0])) {
    foreach($data[0] as $module) { ?>
    <div class="row">     
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-horizontal" role="form" index="1">

                        <h3 class="col-sm-12"><?php echo $module['moduleCode'].'-'.$module['moduleName'] ?></h3>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for="projectTitle">Project Title:</label>
                            <div class="col-sm-4 field-group has-feedback">
                                <h5 class="inputText projectTitleText" id="projectTitle" project=""><?php echo $module['project']['title']?></h5>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="abstractText">Abstract:</label>
                            <div class="col-sm-10 field-group">
                                <h5 class="inputText abstractText" project=""><?php echo $module['project']['abstract'] ?></h5>
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
    <?php 
}}
?>

<div class="row">
    <h3>Modules without registered project</h3>
</div>

<!--Modules where student has no project-->
<?php 
if(isset($data[1])){
    foreach($data[1] as $module) {  ?>
    <div class="row">     
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><?php echo $module['moduleCode']. '-' . $module['moduleName'] ?></h3>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#registerProjectModal" data-module="<?php echo $module['moduleCode'] ?>">Sign up</button>
                </div>
            </div>
        </div><!--End md-12-->
    </div>
    <?php }} ?>

</div>

<!-- Modal for registering module-->
<div class="modal fade" id="registerProjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="registerProjectForm">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4><!-- put in module code -->
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="projectSelect">Select list:</label>
                        <select class="form-control" name="projectTitle" id="projectSelect"> <!-- Dyanamic Project Titles -->
                            <option value="" default selected>Select a Project</option>
                            <?php 
                            if(isset($dataUnregistered['BB3218'])){
                                $module = $dataUnregistered['BB3218'];
                                foreach($module as $project) {
                                    echo "<option>". $project['title'] ."</option>";
                                }
                            } 
                            ?>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="projectSubmitBtn">Register</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
var_dump($dataUnregistered);
?>

<script> 
$(function() {
    
    $('#registerProjectModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var moduleCode = button.data('module') // Extract info from data-* attributes
        var modal = $(this);
        modal.find('.modal-title').text(moduleCode + " Project Sign Up");
    }) 

    $('#projectSubmitBtn').click(function(event){

        var projectSelect = $("#projectSelect");
        var index = projectSelect[0].selectedIndex;
        var projectTitle = projectSelect[0].options[index].text;

        console.log(projectTitle);

    })
});
</script>