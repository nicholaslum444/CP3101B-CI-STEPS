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
            <?php echo "_allModuleData=" . json_encode($data); ?>;
            <?php echo "console.log(" . json_encode($data) . ")"; ?>;
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
                                                <div class="project-titles-text" module="<?php echo $moduleCode; ?>" projectId="<?php echo $project['projectID']; ?>" innerIndex="<?php echo $counter++; ?>"><?php echo $project['title']; ?></div>
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
                                class="btn btn-default editModuleBtn console-edit-btn"
                                data-toggle="modal"
                                data-target="#editModal"
                                data-backdrop="static"
                                id="editButton<?php echo $moduleCode ?>"
                                module="<?php echo $moduleCode; ?>"
                                moduleid="<?php echo $moduleId; ?>" <?php echo $freeze == 1 ? "disabled" : ""; ?>>
                                <i class="fa fa-pencil fa-5"></i>
                            </button>
                        </div>

                        <!-- <div class="console-module-block-details">
                            <div class="form-horizontal" role="form" index="1">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="classSize">Class Size:</label>
                                    <div class="col-sm-4 field-group has-feedback">
                                        <h5 class="inputText classSizeText" module="<?php echo $moduleCode; ?>"><?php echo $classSize; ?></h5>
                                    </div>

                                    <label class="control-label col-sm-2" for="numProjects">Number of Projects:</label>
                                    <div class="col-sm-4 field-group has-feedback">
                                        <h5 class="inputText numProjectsText" module="<?php echo $moduleCode; ?>"><?php echo $numProjects; ?></h5>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="moduleDescription">Description:</label>
                                    <div class="col-sm-10 field-group">
                                        <h5 class="inputText moduleDescriptionText" module="<?php echo $moduleCode; ?>"><?php echo $moduleDescription; ?></h5>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="">Project Titles:</label>
                                    <div class="col-sm-5 field-group field-list projectTitles" module="<?php echo $moduleCode; ?>">
                                        <?php $counter = 1;
                                        // numOfProject should be DYNAMIC too
                                        foreach($module['projectList'] as $project) {
                                            if(!is_null($project['title'])) { ?>
                                                <h5 class="inputText projectTitle" module="<?php echo $moduleCode; ?>" projectId="<?php echo $project['projectID']; ?>" innerIndex="<?php echo $counter++; ?>"><?php echo $project['title']; ?></h5>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">

                                </div>
                            </div>
                        </div> -->
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="registerBtn" type="submit" class="btn btn-primary" <?php echo $freeze == 1 ? "disabled" : ""; ?>>Register</button>
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

                        <div class="form-group">
                            <!-- PROJECT TITLES -->
                            <label class="control-label col-sm-2" for="">Project Titles:</label>
                            <div id = "editProjectTitles" class="col-sm-5 projectTitleFields"></div>
                            <!-- DYNAMICALLY GENERATE AND INSERT INPUT FIELDS INTO HERE
                            SAMPLE: <input type="text" class="form-control" innerIndex="" projectID="" moduleCode="" placeholder="Project Title">-->
                            <!-- PROJECT TITLES -->
                            <div class="col-sm-5">
                                <div class="btn btn-default addProjectTitleBtn" <?php echo $freeze == 1 ? "disabled" : ""; ?>>
                                    <span class="glyphicon glyphicon-plus"><span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 console-edit-submit-container">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="cancel">Cancel</button>
                                <button type="submit" class="btn btn-success" <?php echo $freeze == 1 ? "disabled" : ""; ?>>Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- End of Modal-->
