<div class="container site-container">

    <?php
    /* $data is an array of two parts
    data[0] is the modules that he already registered for.
    data[1] is the projects that he have not registered for.

    data[0] is an array of modules
    data[0][i] is an object of the modules detail, with project as the attr.

    data[1] is an array of
    data[1][i] is an object of the little project detail.

    */
    $modules = $data[0];
    $unregisteredModules = $data[1];
    ?>

    <?php
    if (count($unregisteredModules) > 0) {
        ?>
        <div class="alert-container">
            <div class="alert alert-warning fade in" role="alert">
                <span class="console-module-block-header-code">
                    Project Sign Up</span>
                <p>
                    You should encourage your group leader to sign your group up for a project under these modules.
                </p>
                <p>
                    <?php
                    foreach ($unregisteredModules as $unregisteredModule) {
                        $unregisteredModuleCode = $unregisteredModule['moduleCode'];
                        $unregisteredModuleId = $unregisteredModule['moduleID'];
                        ?>
                        <button type="button"
                            <?php echo $freeze == 1 ? "disabled" : ""; ?>
                            class="btn btn-info"
                            data-toggle="modal"
                            data-target="#registerProjectModal"
                            data-moduleId="<?php echo $unregisteredModuleId; ?>"
                            data-module="<?php echo $unregisteredModuleCode; ?>">
                            <?php echo $unregisteredModuleCode; ?>
                        </button>
                        <?php
                    }
                    ?>
                </p>
            </div>
        </div>
        <?php
    }
    ?>

    <?php
    foreach ($modules as $module) {
        $project = $module['project'];
        $moduleCode = $module['moduleCode'];
        $projectTitle = $project['title'];
        $projectAbstract = $project['abstract'];
        $projectId = $project['projectID'];
        $projectPosterUrl = $project['poster'];
        $projectMembers = $project['members'];
        $projectLeaderId = $project['leader'];
        ?>
        <div class="console-module-list" id="moduleList">
            <div class="console-module-block">
                <!-- header -->
                <div class="console-module-block-header">
                    <div class="console-module-block-header-code-container">
                        <span class="console-module-block-header-code">
                            <?php echo $projectTitle; ?>
                        </span>
                    </div>
                    <div class="console-module-block-header-name-container">
                        <span class="console-module-block-header-name">
                            <?php echo $moduleCode; ?>
                        </span>
                    </div>
                </div>

                <!-- body of box -->
                <div class="console-module-block-details">
                    <!-- poster
                    video
                    teammembers
                    abstract -->
                    <div class="row">
                        <div class="col-xs-12 console-module-block-entry">
                            <div class="project-num-header-container">
                                <span class="project-num-header console-module-block-entry-header">
                                    Video
                                </span>
                            </div>
                            <div class="console-project-video-container">
                                No video yet. Upload your URL on the edit page!
                                <!-- <img class="img-responsive" src="<?php echo $projectPosterUrl; ?>"> -->
                                <!-- <iframe
                                class="img-responsive console-project-video"
                                src="https://www.youtube.com/embed/Vck2Q0GYJdo?rel=0"
                                frameborder="0"
                                allowfullscreen></iframe> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 console-module-block-entry">
                            <div class="class-size-header-container">
                                <span class="class-size-header console-module-block-entry-header">
                                    Poster
                                </span>
                            </div>
                            <div class="console-project-poster-container">
                                <?php if (isset($projectPosterUrl)) {
                                    ?>
                                    <img class="img-responsive console-project-poster"
                                    src="<?php echo $projectPosterUrl; ?>">
                                    <?php
                                } else {
                                    ?>
                                    No poster yet. Upload your URL on the edit page!
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 console-module-block-entry">
                            <div class="class-size-header-container">
                                <span class="class-size-header console-module-block-entry-header">
                                    Team Members
                                </span>
                            </div>
                            <div class="project-titles-text-container">
                                <?php
                                foreach ($projectMembers as $member) {
                                    $memberName = $member['name'];
                                    $memberId = $member['userID'];
                                    $leaderTag = ($memberId == $projectLeaderId) ? "leader" : "";
                                    ?>
                                    <div class="project-titles-text">
                                        <span><?php echo $memberName; ?></span>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 console-module-block-entry">
                            <div class="description-header-container">
                                <span class="description-header console-module-block-entry-header">
                                    Project Abstract
                                </span>
                            </div>
                            <div class="description-text-container">
                                <span class="description-text">
                                    <?php echo $projectAbstract; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="console-edit-btn-container">
                    <button
                        type="button"
                        class="btn btn-info editBtn console-edit-btn"
                        data-toggle="modal"
                        data-target="#editModal"
                        data-backdrop="static"
                        id="editButton<?php echo $moduleCode ?>"
                        module="<?php echo $moduleCode; ?>"
                        projectid="<?php echo $projectId; ?>"
                        <?php echo $freeze == 1 ? "disabled" : ""; ?>>
                        <i class="fa fa-pencil fa-5"></i>
                    </button>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button <?php echo $freeze == 1 ? "disabled" : ""; ?> type="submit" class="btn btn-success" id="projectSubmitBtn" moduleid="">Register</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script>

$(function() {
    var untakenProjects = <?php echo (json_encode($dataUnregistered)); ?>; //an object of arrays

    $('#registerProjectModal').on('hidden.bs.modal', function () {
        $('#projectSelect').prop( "disabled", false );
    });

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
	        var str = "";
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
    });

    $('#projectSubmitBtn').click(function(event){

        var projectSelect = $("#projectSelect");
        var index = projectSelect[0].selectedIndex;
        var projectTitle = projectSelect[0].options[index].text;
        var projectId = projectSelect[0].options[index].value;
        var moduleId = $(this).attr('moduleid');
        console.log(projectId);
        console.log(moduleId);
        window.location.href = "/student/registerProject/" + moduleId + "/" + projectId ;
    });

    $('.editBtn').on('click', function() {
    	window.location.href="/student/updateMembers/" + $(this).attr("projectId");
    });


});
</script>
