<div class="container site-container">
    <div class="row">
        <h4>Projects</h4>
    </div>


<!--To be shown only when student is signed up for it -->
<?php if(isset($data[0])) {
    //var_dump($data);
    foreach($data[0] as $module) { ?>
    <div class="row">     
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-horizontal" role="form" index="1">

                        <h4 class="col-sm-12"><?php echo $module['moduleCode'].'-'.$module['moduleName'] ?></h4>


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
                            <div class="col-sm-5 field-group teamMembers" project="">
                            <h5><?php foreach($module['project']['members'] as $member){ 
                                    echo $member['name']; 
                                    if($member['userID']== $module['project']['leader']) {
                                        echo " (Leader)";
                                    }
                                    echo "<br />";
                                } ?>
                            </h5>
                            </div>
                        </div>
                        <!-- Edit Button for Leaders -->
                        <button <?php echo $freeze == 1 ? "disabled" : ""; ?> type="button" class="editBtn btn btn-success pull-right" projectId="<?php echo $module['project']['projectID']?>">Edit</button>
                    </div>
                </div>
            </div>
        </div><!--End md-12-->
    </div>
    <?php 
}}
?>


<!--Modules where student has no project-->
<?php 
if(isset($data[1]) && count($data[1])>0) { ?>
    
    <div class="row">
    <h4>Modules without registered project</h4>
    </div>

    <?php
    foreach($data[1] as $module) {  ?>
    <div class="row">     
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4><?php echo $module['moduleCode']. '-' . $module['moduleName'] ?></h4>
                    <button <?php echo $freeze == 1 ? "disabled" : ""; ?> type="button" class="btn btn-success" data-toggle="modal" data-target="#registerProjectModal" data-moduleId="<?php echo $module['moduleID']?>" data-module="<?php echo $module['moduleCode'] ?>">Sign up</button>
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
                        <label for="projectSelect">Select Project:</label>
                        <select class="form-control" name="projectTitle" id="projectSelect"> <!-- Dyanamic Project Titles -->                            
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button <?php echo $freeze == 1 ? "disabled" : ""; ?> type="submit" class="btn btn-primary" id="projectSubmitBtn" moduleid="">Register</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script> 
$(function() {
    
    var untakenProjects = <?php echo json_encode($dataUnregistered); ?>; //an object of arrays

    $('#registerProjectModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var moduleCode = button.data('module') // Extract info from data-* attributes
        var currModuleId = button.attr('data-moduleId');
        var modal = $(this);
        modal.find('.modal-title').text(moduleCode + " Project Sign Up");
        
        //change register button moduleid attribute
        modal.find('#projectSubmitBtn').attr('moduleid', currModuleId);

        //empty selection
        $('#projectSelect').html("");

        //generate string
        var projects = untakenProjects[moduleCode];
        if(projects[0] != 0) {
	        var str = '<option value="" default selected>Select a Project</option>' ;
	        for(var i = 0; i < projects.length; i++) {
	            str += ('<option value = "'+ projects[i].projectID +'">');
	            str += projects[i].title;
	            str += "</option>";
	        }
	        $('#projectSelect').append(str);
	    }
	    else {
	    	$('#projectSelect').prop( "disabled", true );
	    }
    }) 

    $('#projectSubmitBtn').click(function(event){

        var projectSelect = $("#projectSelect");
        var index = projectSelect[0].selectedIndex;
        var projectTitle = projectSelect[0].options[index].text;
        var projectId = projectSelect[0].options[index].value;
        var moduleId = $(this).attr('moduleid');
        console.log(projectId);
        console.log(moduleId);
        window.location.href = "/index.php/Student/registerProject/" + moduleId + "/" + projectId ;
    });

    $('.editBtn').on('click', function() {
    	window.location.href="/index.php/Student/updateMembers/" + $(this).attr("projectId");
    });
});
</script>