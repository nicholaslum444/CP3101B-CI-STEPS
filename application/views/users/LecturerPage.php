<div class="container">
    <form class="form">
        <div class="form-group">
            <input type="hidden" class="form-control" id="registerModule">
        </div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#registerModal" id="registerModuleBtn" <?php echo $freeze == 1 ? "disabled" : ""; ?>>Register Module</button>
    </form>
    <!--List of modules to be generated-->
    <div class="row">
        <div id = "moduleList">
            <?php if (isset($data)) {
                foreach($data as $module) {
                    //Preprocess the data nicely
/*                    $data = $module['data'];
                    if (isset($data["moduleId"])) {
                        $moduleId = $module['data']['moduleId'];
                    } else {
                        $moduleId = "dummy-id";
                    }*/
                    //Check the 3 essentials
                    if(isset($module['data']['moduleID']) && isset($module['data']['moduleName']) && isset($module['data']['moduleCode'])) {
                        $moduleId = $module['data']['moduleID'];
                        $moduleCode = $module['data']['moduleCode'];
                        $moduleName = $module['data']['moduleName'];
                        //Just set 0 if not exist
                        $classSize = isset($module['data']['classSize']) ? $module['data']['classSize'] : 0;
                        $numProjects = isset($module['data']['numProjects']) ? $module['data']['numProjects'] : 0;
                        $moduleDescription = isset($module['data']['moduleDescription']) ? $module['data']['moduleDescription'] : '-';?>
                        <div class="container" moduleId="<?php echo $moduleId; ?>">
                            <div class="row">
                                <h3 moduleId = "<?php echo $moduleId; ?>"><?php echo $moduleCode; ?> - <?php echo $moduleName; ?></h3>

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
                                        <div class="col-sm-5 field-group field-list projectTitles" module="<?php echo $moduleCode; ?>"> <!-- numOfProject should be DYNAMIC too -->
                                           <!--<h5 class="inputText projectTitle" module="ABC123" projectId="123" innerIndex="1">A-Team</h5>-->
                                            <?php $counter = 1;
                                            foreach($module['data']['projectList'] as $project) {
                                                if(!is_null($project['title'])) { ?>
                                                    <h5 class="inputText projectTitle" module="<?php echo $moduleCode; ?>" projectId="<?php echo $project['projectID']; ?>" innerIndex="<?php echo $counter++; ?>"><?php echo $project['title']; ?></h5>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-default editModuleBtn" data-toggle="modal" data-target="#editModal" id="editButton<?php echo $moduleCode ?>" module="<?php echo $moduleCode; ?>" moduleId="<?php echo $moduleId; ?>" <?php echo $freeze == 1 ? "disabled" : ""; ?>>Edit Module</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else {  ?>
                <a href="/index.php/Lecturer/viewModule">Dummy Module</a>
            <?php } ?>
        </div>
    </div> <!-- end generated modules -->

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
            $("#registerModuleFormBody").show();
        }).fail(function(data) {
            $("#loadingSplash").hide();
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
                            Please wait while we retrieve your modules..
                        </p>
                    </div>
                    <div class="modal-body" id="getModulesFailedBody">
                        <p>
                            <!-- should make a proper loading screen -->
                            Failed to get modules from IVLE! If this occurs repeatedly, please contact the Administrator.
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
                        <button type="submit" class="btn btn-primary" <?php echo $freeze == 1 ? "disabled" : ""; ?>>Register</button>
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
                            <label class="control-label col-sm-2" for="editClassSize">Class Size:</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="editClassSize" placeholder="Class Size" value="" <?php echo $freeze == 1 ? "disabled" : ""; ?>>
                            </div>
                            <button type="button" class="btn btn-info" id="syncRosterButton" moduleId="" <?php echo $freeze == 1 ? "disabled" : ""; ?>>Sync Class Roster With IVLE</button>
                            <!-- CLASS SIZE -->

                        </div>

                        <div class="form-group">
                            <!-- DESCRIPTIONS -->
                            <label class="control-label col-sm-2" for="editModuleDescription">Description:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="editModuleDescription" placeholder="Add Description for Module" <?php echo $freeze == 1 ? "disabled" : ""; ?>></textarea>
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
                            <div class="col-sm-5"><div class="btn btn-default addProjectTitleBtn" <?php echo $freeze == 1 ? "disabled" : ""; ?>>Add</div></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success" <?php echo $freeze == 1 ? "disabled" : ""; ?>>Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- End of Modal-->
