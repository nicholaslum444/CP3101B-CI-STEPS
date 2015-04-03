<div class="container">
    <form class="form">
        <div class="form-group">
            <input type="hidden" class="form-control" id="registerModule">
        </div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#registerModal">Register Module</button>
    </form>
    <!--List of modules to be generated-->
    <div class="row">
        <div id = "moduleList">
            <?php
            if (isset($data)) {
                foreach($data as $module) {
                    //Preprocess the data nicely
                    $moduleCode = $module['data']['moduleCode'] == null ? "Dummy" : $module['data']['moduleCode'];
                    $moduleName = $module['data']['moduleName'] == null ? "-" : $module['data']['moduleName'];
                    $classSize = $module['data']['classSize'] == null ? 0 : $module['data']['classSize'];
                    $numProjects = $module['data']['project'] == null ? 0 : count($module['data']['project']);
                    $moduleDescription = $module['data']['moduleDescription'] == null ? "-" : $module['data']['moduleDescription'];
                    ?>
                    <div class="container">
                        <div class="row">
                            <h3><?php echo $moduleCode; ?> - <?php echo $moduleName; ?></h3>

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
                                    <div class="col-sm-5 field-group field-list projectTitles" module="<?php echo $moduleCode; ?>" numOfProject = "4"> <!-- numOfProject should be DYNAMIC too -->
                                        <?php $counter=1; ?>
                                        <h5 class="inputText projectTitle" module="<?php echo $moduleCode; ?>" index="<?php echo $counter++; ?>">Awesome Posum</h5>
                                        <h5 class="inputText projectTitle" module="<?php echo $moduleCode; ?>" index="<?php echo $counter++; ?>">Awesome Posum</h5>
                                        <h5 class="inputText projectTitle" module="<?php echo $moduleCode; ?>" index="<?php echo $counter++; ?>">Awesome Posum</h5>
                                        <h5 class="inputText projectTitle" module="<?php echo $moduleCode; ?>" index="<?php echo $counter++; ?>">Awesome Posum</h5>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-default editModuleBtn" data-toggle="modal" data-target="#editModal" module="<?php echo $moduleCode; ?>">Edit Module</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php } else {  ?>
                    <a href="/index.php/lecturer/viewModule">Dummy Module</a>
                <?php } ?>
                </div>

            </div>
        </div>

        <!-- Modal for registering module-->
        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="registerModuleForm">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Register a Module</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="moduleCode">Module Code</label>
                                <input type="text" class="form-control" id="moduleCode" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="moduleName">Module Name</label>
                                <input type="text" class="form-control" id="moduleName" placeholder="">
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
                                    <input type="number" class="form-control" id="editClassSize" placeholder="Class Size" value="">
                                </div>
                                <!-- CLASS SIZE -->
                                <!-- NUMBER OF PROJECTS -->
                                <label class="control-label col-sm-2" for="editNumProjects">Number of Projects:</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="editNumProjects" placeholder="Number of Projects" value="">
                                </div>
                                <!-- NUMBER OF PROJECTS -->
                            </div>

                            <div class="form-group">
                                <!-- DESCRIPTIONS -->
                                <label class="control-label col-sm-2" for="editModuleDescription">Description:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="5" id="editModuleDescription" placeholder="Add Description for Module"></textarea>
                                </div>
                                <!-- DESCRIPTIONS -->
                            </div>

                            <div class="form-group">
                                <!-- PROJECT TITLES -->
                                <label class="control-label col-sm-2" for="">Project Titles:</label>
                                <div id = "editProjectTitles" class="col-sm-5 projectTitleFields">
                                    <!-- DYNAMICALLY GENERATE AND INSERT INPUT FIELDS INTO HERE
                                    SAMPLE: <input type="text" class="form-control" placeholder="Project Title">
                                -->
                            </div>
                            <!-- PROJECT TITLES -->

                            <div class="col-sm-5"><div class="btn btn-default addProjectTitleBtn">Add</div></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
