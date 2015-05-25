<div class="container site-container">
    <div class='console-register-btn-container'>
        <button type="button" class="btn btn-success console-register-btn" data-toggle="modal" data-backdrop="static" data-target="#registerModal" id="registerModuleBtn" <?php echo $freeze == 1 ? "disabled" : ""; ?>>
            <i class="fa fa-plus"></i>&nbsp;Register Module
        </button>
    </div>
    <!--List of modules to be generated-->
    <div class="console-module-list" id="moduleList">
        <?php
        if (isset($data)) {
            ?>

            <script>
            // set the modules data as a variable to be extracted
            <?php echo "var _allModuleData=" . json_encode($data); ?>;
            </script>

            <?php
            foreach($data as $module) {
                // var_dump($module['moduleID']);
                //Preprocess the data nicely
                /* $data = $module;
                if (isset($data["moduleId"])) {
                    $moduleId = $module['moduleId'];
                } else {
                    $moduleId = "dummy-id";
                }*/

                // Build the module only if these fields are set
                if(isset($module['moduleID']) && isset($module['moduleName']) && isset($module['moduleCode'])) {
                    $moduleId = $module['moduleID'];
                    $moduleCode = $module['moduleCode'];
                    $moduleName = $module['moduleName'];
                    //Just set 0 if not exist
                    $classSize = 0;
                    $numProjects = 0;
                    $moduleDescription = "-";
                    if (isset($module['classSize'])) {
                        $classSize = $module['classSize'];
                    }
                    if (isset($module['numProjects'])) {
                        $numProjects = $module['numProjects'];
                    }
                    if (isset($module['moduleDescription'])) {
                        $moduleDescription = $module['moduleDescription'];
                    }
                    ?>
                    <!-- module block (individual module) -->
                    <div class="console-module-block" moduleId="<?php echo $moduleId; ?>">

                        <div class="console-module-block-header">
                            <div class="console-module-block-header-code-container">
                                <span class="console-module-block-header-code" moduleId = "<?php echo $moduleId; ?>">
                                    <?php echo $moduleCode; ?>
                                </span>
                            </div>
                            <div class="console-module-block-header-name-container">
                                <span class="console-module-block-header-name">
                                    <?php echo $moduleName; ?>
                                </span>
                            </div>
                        </div>

                        <div class="console-module-block-details">
                            <!-- class size and num projects -->
                            <div class="row">
                                <div class="col-xs-6 console-module-block-entry">
                                    <div class="class-size-header-container">
                                        <span class="class-size-header console-module-block-entry-header">
                                            Class Size
                                        </span>
                                    </div>
                                    <div class="class-size-text-container">
                                        <span class="class-size-text">
                                            <?php echo $classSize; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-6 console-module-block-entry">
                                    <div class="project-num-header-container">
                                        <span class="project-num-header console-module-block-entry-header">
                                            No. of Projects
                                        </span>
                                    </div>
                                    <div class="project-num-text-container">
                                        <span class="project-num-text">
                                            <?php echo $numProjects; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 console-module-block-entry">
                                    <div class="project-titles-header-container">
                                        <span class="project-titles-header console-module-block-entry-header">
                                            Project Titles
                                        </span>
                                    </div>
                                    <div class="project-titles-text-container">
                                        <?php $counter = 1;
                                        foreach($module['projectList'] as $project) {
                                            if(!is_null($project['title'])) { ?>
                                                <a href="/index.php/Student/updateMembers/<?php echo $project['projectID']; ?>">
                                                    <div class="project-titles-text" module="<?php echo $moduleCode; ?>" projectId="<?php echo $project['projectID']; ?>" innerIndex="<?php echo $counter++; ?>">
                                                    	<span><?php echo $project['title']; ?></span>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
                                            Module Description
                                        </span>
                                    </div>
                                    <div class="description-text-container">
                                        <span class="description-text">
                                            <?php echo $moduleDescription; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="console-edit-btn-container">
                            <button
                                type="button"
                                class="btn btn-info editModuleBtn console-edit-btn"
                                data-toggle="modal"
                                data-target="#editModal"
                                data-backdrop="static"
                                id="editButton<?php echo $moduleCode ?>"
                                module="<?php echo $moduleCode; ?>"
                                moduleid="<?php echo $moduleId; ?>"
                                <?php echo $freeze == 1 ? "disabled" : ""; ?>>
                                <i class="fa fa-pencil fa-5"></i>
                            </button>
                        </div>
                    </div>
                    <?php
                }
            }
        } else {
            ?>
            <a href="/index.php/Lecturer/viewModule">Dummy Module</a>
            <?php
        }
        ?>
    </div> <!-- end generated modules -->
</div>

    <!-- use the $ivleStaffedModules object to get the modules to fill the dropdown -->
    <!-- will need some preprocessing of the data to populate dropdown? -->
<script>
var allModules;

$(function() {

    function addProjectEntry(innerIndex, projectId, moduleCode, value) {
        // make the project entry in the list
        $("#projectTitleOrig button").attr("innerIndex", innerIndex);
        var input = $("#projectTitleOrig input");
        input.attr("innerIndex", innerIndex);
        input.attr("projectID", projectId);
        input.attr("moduleCode", moduleCode);
        input.attr("value", value);
        var entry = $("#projectTitleOrig").clone();
        entry.removeAttr("id");

        $(".projectTitleFields").append(entry);
        bindDeleteBtn();
    }

    $('.addProjectTitleBtn').click(function() {
        //Dynamically generate buttons
        var index = $("#editProjectTitles input").length+1;
        var moduleCode = $('.addProjectTitleBtn').attr('moduleCode');
        // make the project entry in the list
        addProjectEntry(-1, -1, moduleCode, moduleCode + "-" + index);

    });

    $('#registerModuleForm').on('submit',function (e) {
        $.ajax({
            url: "/index.php/ajaxreceivers/RegisterModule",
            method: "POST",
            data: {"moduleId" : $("#moduleCode option:selected").attr("value")},
            dataType: "json"
        })

        .done(function(data) {
            if(data["success"] == true) {
                $('#registerModal').modal('hide');
                location.reload();
            }
            else {
                if (data["error"] == "MODULE_EXISTS") {
                    $("#alr-reg").show();
                }
                $('#registerModuleForm').addClass("has-error");
            }
        })

        .fail(function(data) {
            console.log(JSON.stringify(data));
        });
        e.preventDefault();
    });

    $('#syncRosterButton').click(function (e) {
        var moduleCode = $('#syncRosterButton').attr("moduleCode");
        var moduleId = $('#syncRosterButton').attr("moduleId");
        $('#ivleSyncFa').addClass("fa-spin");
        console.log("sending " + moduleId);
        $.ajax({
            url: "/index.php/ajaxreceivers/SyncClassRoster",
            method: "POST",
            data: {"moduleId" : moduleId},
            dataType: "json"
        })

        .done(function(data) {
            while ($('#ivleSyncFa').hasClass("fa-spin")) {
                $('#ivleSyncFa').removeClass("fa-spin");
            }
            if(data["success"]) {
                //$('#registerModal').modal('hide');
                //location.reload();
                console.log(data);
                $('#syncFailedMsg').hide();
                $('#syncRosterButton').removeClass("btn-info");
                $('#syncRosterButton').removeClass("btn-warning").addClass("btn-success");
                $("#editClassSize").attr("value", data["classSize"]);
            }
            else {
                $('#syncRosterButton').removeClass("btn-info").addClass("btn-warning");
                $('#syncFailedMsg').show();
            }
        })

        .fail(function(data) {
            console.log(JSON.stringify(data));
            $('#syncRosterButton').removeClass("btn-primary").addClass("btn-warning");
            $('#syncFailedMsg').show();
        });
        e.preventDefault();
    });

    $('#editModal').on('hidden.bs.modal', function () {
        $("#editModuleSubmitBtn").attr("disabled", false);
        deletedProjects = [];
    })

    $('#editModuleForm').on('submit', function(e) {
        //Lock the submit button to prevent multiple inserts
        $("#editModuleSubmitBtn").attr("disabled", true);

        //GETTING MODULE CODE AND NUMBER OF PROJECTS
        var moduleCode = $("#editModalLabel").attr("moduleCode");
        var moduleId = $("#editModalLabel").attr("moduleid");
        var numberOfProjects = $(".projectTitles[module="+moduleCode+"]").attr("numOfProject");

        //GETTING ALL EDITED INPUTS
        var editedClassSize = $("#editClassSize").val();
        //var editedNumProjects = $("#editNumProjects").val();
        var editedModuleDescription = sanitize($("#editModuleDescription").val());
        var allProjectTitles = $("#editProjectTitles input");
        var editedExistingProjectTitles = new Array();
        var editedNewProjectTitles = new Array();

        //GETTING ALL ORIGINAL INPUTS
        var prevClassSize = $(".classSizeText[module="+moduleCode+"]").html();
        var prevNumProjects = $(".numProjectsText[module="+moduleCode+"]").html();
        var prevModuleDescription = $(".moduleDescriptionText[module="+moduleCode+"]").html();
        var prevProjectTitles = $(".projectTitles[module="+moduleCode+"] .projectTitle");

        //DISCLAIMER: NULL MEANS DO NOT CHANGE WHEN SENT TO THE RECEIVER

        //CHECKING CLASS SIZE
        if(editedClassSize == prevClassSize) {
            editedClassSize = null;
        }

        //CHECKING DESCRIPTION OF MODULE
        if(editedModuleDescription == prevModuleDescription) {
            editedModuleDescription = null;
        }

        //CHECKING PROJECT TITLES
        var currentValueOfProjectTitle;
        var editedValueOfProjectTitle;

        $.each(allProjectTitles, function(index, newInput) {
            editedProjectInnerIndex = $(this).attr('innerIndex');
            editedValueOfProjectTitle = sanitize(newInput.value);
            //Edited from current title
            if(editedProjectInnerIndex != -1) {
                //Get original title
                currentValueOfProjectTitle = $(".projectTitles[module="+moduleCode+"] .projectTitle[innerIndex=" +editedProjectInnerIndex+"]").html();
                //If not null and different
                if(editedValueOfProjectTitle != "" && editedValueOfProjectTitle != currentValueOfProjectTitle) {
                    editedProjectID = $(this).attr('projectID');
                    editedExistingProjectTitles.push([editedProjectID, editedValueOfProjectTitle]);
                }
            }
            //New value
            else {
                if(editedValueOfProjectTitle != "") {
                    editedNewProjectTitles.push(editedValueOfProjectTitle);
                }
            }
        });

        if(editedExistingProjectTitles.length == 0) {
            editedExistingProjectTitles = null;
        }

        if(editedNewProjectTitles.length == 0) {
            editedNewProjectTitles = null;
        }

        //PREPARING THE FORM TO SEND TO THE RECEIVER
        var editFormData =
        {
            "moduleCode" : moduleCode,
            "moduleId" : moduleId,
            "editedClassSize" : editedClassSize,
            //"editedNumProjects" : editedNumProjects,
            "editedModuleDescription" : editedModuleDescription,
            "editedExistingProjectTitles" : editedExistingProjectTitles,
            "editedNewProjectTitles" : editedNewProjectTitles,
            "deletedProjects" : deletedProjects
        };

        //console.log(editFormData);

        // 4=(form)=}=> Server
        $.ajax({
            url: "/index.php/ajaxreceivers/EditModule",
            method: "POST",
            data: editFormData,
            dataType: "json"
        })
        .done(function(data) {
            // Client <={=(result)=4
            if(data["success"] == true && (data["undeletedProjects"] == null || data["undeletedProjects"].length == 0)) {
                $('#editModal').modal('hide');
                location.reload();
            }
            else if(data["success"] == true && (data["undeletedProjects"] != null && !data["undeletedProjects"].length == 0)) {
                //Add back and say cannot delete
                $("#editModuleSubmitBtn").attr("disabled", true);
                var error =
                    '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
                +   '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'
                +   '<h4>Please go back and ensure projects are empty before deleting!</h4>'
                +   '<p>The following projects are currently occupied: ';

                for(var i = 0; i < data["undeletedProjects"].length-1; i++) {
                    error += data["undeletedProjects"][i]["title"] + ", ";
                }
                error += data["undeletedProjects"][data["undeletedProjects"].length-1]["title"] + "." + "</p></div>"
                $("#error").prepend(error);
            }
            else {
                alert("Adding error");
                $('#editModuleForm').addClass("has-error");
                $("#editModuleSubmitBtn").attr("disabled", false);
            }
        })
        //Temporary work around until Mun Aw patches the database
/*      .complete(function(data) {
            $('#editModal').modal('hide');
            location.reload();
        });*/

        e.preventDefault();
    });

    // a convenience function to get the correct module
    function getModule(id) {
        for (var i = 0; i < _allModuleData.length; i++) {
            var module = _allModuleData[i];
            if (module["moduleID"] == id) {
                return module;
            }
        }
        return {};
    }

    //HANDLER TO DYNAMICALLY UPDATE EDIT MODULE FORM
    $(".editModuleBtn").on('click', function(e) {

        var moduleId = $(this).attr("moduleId");
        var module = getModule(moduleId);
        // console.log(module);

        //THE CLEANING PART
        $("#editClassSize").attr("value", "");
        $("#editNumProjects").attr("value", "");
        $("#editModuleDescription").val("-");
        $("#editProjectTitles").empty();
        $("#error").empty();
        $(".addProjectTitleBtn").attr("moduleCode", "");

        //THE EASY PART
        $("#editModalLabel").html("Editing: " + module["moduleCode"]);
        $("#editModalLabel").attr("moduleId", module["moduleID"]);
        $("#syncRosterButton").attr("moduleId", module["moduleID"]);
        $("#editModalLabel").attr("moduleCode", module["moduleCode"]);
        $("#editClassSize").attr("value", module["classSize"]);
        $("#editModuleDescription").val(module["moduleDescription"]);
        //console.log("this");
        $(".addProjectTitleBtn").attr("moduleCode", module["moduleCode"]);

        //THE HARD PART
        var projects = module["projectList"];
        // console.log(projects);
        for (var i = 0; i < projects.length; i++) {
            var project = projects[i];
            var innerIndex = i + 1;
            // make the project entry in the list
            addProjectEntry(innerIndex, project["projectID"], module["moduleCode"], project["title"]);
        }
    });

    $("#alr-reg").hide();
    // to update the fields when different module selected
    function getModuleDetail(id, detail) {
        for (var i = 0; i < allModules.length; i++) {
            var oid = allModules[i]["ID"];
            if (id === oid) {
                return allModules[i][detail];
            }
        }
        return "Invalid Module ID";
    }
    
    // to change the title of the module when selected
    $("#moduleCode").change(function() {
        // sets the module details on select of module
        var id = $("#moduleCode option:selected").attr("value");
        $("#moduleName").attr("value", getModuleDetail(id, "CourseName"));
        $("#moduleSem").attr("value", getModuleDetail(id, "CourseSemester"));
        $("#moduleYear").attr("value", getModuleDetail(id, "CourseAcadYear"));
    });

    // to retrieve list of modules for lecturer to sign up
    $("#registerModuleFormBody").hide();
    $("#getModulesFailedBody").hide();
    $("#loadingSplash").show();
    $("#registerBtn").prop("disabled", true);
    var url = "/index.php/apibypass/IvleApiBypass/GetIvleStaffedModules/";
    $.get(url, function(data) {
        var data = JSON.parse(data)['Results'];
        allModules = data;
        for (var i = 0; i < data.length; i++) {
            var code = data[i]['CourseCode'];
            var id = data[i]["ID"];
            var option = "<option value='"+id+"'>"+code+"</option>";
            $("#moduleCode").append(option);
        }
        $("#moduleCode").change();
        $("#loadingSplash").hide();
        $("#registerBtn").prop("disabled", false);
        $("#registerModuleFormBody").show();
    }).fail(function(data) {
        $("#loadingSplash").hide();
        $("#registerBtn").prop("disabled", false);
        $("#getModulesFailedBody").show();
    });

});
</script>

    <!-- Modal for registering module-->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="registerModuleForm">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Register a Module</h4>
                    </div>
                    <div class="modal-body" id="loadingSplash">
                        <p>
                            <!-- should make a proper loading screen -->
                            <span class="fa fa-refresh fa-spin"></span>&nbsp;
                            Please wait while we retrieve your modules..
                        </p>
                    </div>
                    <div class="modal-body" id="getModulesFailedBody">
                        <p>
                            <!-- should make a proper loading screen -->
                            <span class="fa fa-exclamation btn btn-danger"></span>&nbsp;
                            Failed to get modules from IVLE. Please <a href="">refresh</a> the page.
                        </p>
                        <p>
                            Contact the Administrator if this occurs repeatedly.
                        </p>
                    </div>
                    <div class="modal-body" id="registerModuleFormBody">
                        <div class="form-group">
                            <label for="moduleCode">Module Code<span style="color:red;" id="alr-reg"> already registered!</span></label>
                            <select class="form-control" name="moduleCode" id="moduleCode"<?php echo $freeze == 1 ? "disabled" : ""; ?>>
                            </select>
                        </div>
                        <div class="form-group">
                            <!-- TODO change these to static fields -->
                            <label for="moduleName">Module Name</label>
                            <input type="text" class="form-control" disabled id="moduleName" placeholder="Module Name">
                            <label for="moduleName">Semester</label>
                            <input type="text" class="form-control" disabled id="moduleSem" placeholder="Semester">
                            <label for="moduleName">Year</label>
                            <input type="text" class="form-control" disabled id="moduleYear" placeholder="Year">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-danger"
                            data-dismiss="modal">
                            Close
                        </button>
                        <button id="registerBtn"
                            type="submit"
                            class="btn btn-success"
                            <?php echo $freeze == 1 ? "disabled" : ""; ?>>
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for editing module-->
    <div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="editModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <!--Form for editing module insert here-->
                    <form id="editModuleForm" class="form-horizontal" role="form">
                        <div class="form-group">
                            <!-- CLASS SIZE -->
                            <label class="control-label col-xs-2" for="editClassSize">Class Size:</label>
                            <div class="col-xs-6">
                                <input type="number" disabled class="form-control" id="editClassSize" placeholder="Class Size" value="" <?php echo $freeze == 1 ? "disabled" : ""; ?>>
                            </div>
                            <div class="col-xs-2">
                            <button type="button" class="btn btn-info console-sync-btn" id="syncRosterButton" moduleCode="" moduleId="" <?php echo $freeze == 1 ? "disabled" : ""; ?>>
                                <span class="fa fa-refresh" id="ivleSyncFa"></span></button>
                                <span class="ivle-sync-instructions">IVLE Sync</span>
                            </div>
                            <!-- END CLASS SIZE -->
                        </div>

                        <div class="form-group">
                            <!-- DESCRIPTIONS -->
                            <label class="control-label col-sm-2" for="editModuleDescription">Description:</label>
                            <div class="col-sm-10">
                                <textarea rows="6" class="form-control" id="editModuleDescription" placeholder="Add Description for Module" <?php echo $freeze == 1 ? "disabled" : ""; ?>></textarea>
                            </div>
                            <!-- DESCRIPTIONS -->
                        </div>
                        <div class="form-group" id="error"></div>
                        <div class="form-group">
                            <!-- PROJECT TITLES -->

                            <label class="control-label col-sm-2 col-xs-6" for="">Project Titles:</label>
                            <div class="col-xs-2 col-sm-1" style="display:inline-block;">
                                <div class="btn btn-info addProjectTitleBtn"
                                    <?php echo $freeze == 1 ? "disabled" : ""; ?>>
                                    <span class="glyphicon glyphicon-plus"><span>
                                </div>
                            </div>
                            <div id="editProjectTitles" class="col-xs-12 col-sm-7 projectTitleFields">
                                <!-- DYNAMICALLY GENERATE AND INSERT INPUT FIELDS INTO HERE -->
                            </div>

                            <!-- PROJECT TITLES -->
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 console-edit-submit-container">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="cancel">Cancel</button>
                                <button id="editModuleSubmitBtn" type="submit" class="btn btn-success" <?php echo $freeze == 1 ? "disabled" : ""; ?>>Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- End of Modal-->

    <!-- thing to clone for the project rows. -->
    <div class="projectTitleInput"
        id="projectTitleOrig">
        <input type="text"
            class="form-control"
            placeholder="Project Title">
        <button class="btn btn-danger deleteProjectBtn">
            &times;
        </button>
    </div>
