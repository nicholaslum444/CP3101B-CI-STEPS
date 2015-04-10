<div class="container admin-container">
    <div class="row">

        <div class="col-md-6 accordion panel panel-primary" id="admin-accordion">
            <?php
            if (isset($moduleData)) {
                foreach($moduleData as $module) {
                    //echo json_encode($moduleData);
                    //Preprocess the data nicely
                    $moduleId = $module['data']['moduleID'] == null ? "dummy-id" : $module['data']['moduleID'];
                    $moduleCode = $module['data']['moduleCode'] == null ? "Dummy" : $module['data']['moduleCode'];
                    $moduleName = $module['data']['moduleName'] == null ? "-" : $module['data']['moduleName'];
                    $classSize = $module['data']['classSize'] == null ? 0 : $module['data']['classSize'];
                    $numProjects = $module['data']['project'] == null ? 0 : count($module['data']['project']);
                    $moduleDescription = $module['data']['moduleDescription'] == null ? "-" : $module['data']['moduleDescription'];
                    ?>

                    <div class="accordion-group panel-default">
                        <div class="accordion-heading accordion-toggle panel-heading" >
                            <a data-toggle="collapse" data-target="#<?php echo $moduleCode ?>" href="#"><?php echo $moduleCode ?>  - <?php echo $moduleName; ?></a>
                            <button class="btn btn-xs btn-default editModuleBtn" data-toggle="modal" data-target= "#editModal" id="editButton<?php echo $moduleCode; ?>" module="<?php echo $moduleCode; ?>">Edit</button>
                        </div>
                        <div id="<?php echo $moduleCode ?>" class=" collapse panel-collapse">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "data not set";
            }
            ?>

        </div>
        <!--loop end -->


        <div class="col-md-6">
            <form role="form">
                <div class="form-group">
                    <label for="updates">Updates: </label>
                    <textarea class="form-control" rows="5" id="updates" placeholder="Add updates in front page"></textarea>
                </div>
                <button type="submit" class="btn btn-default" id="admin-update-btn">Submit</button>
            </form>


            <div class="eventDate-container clear">
            <form class="form" role="form" id="eventDates">
                <div class="form-group col-md-12">
                    <label for="eventStartDate">Start Of Event</label>
                    <input type="date" class="form-control" id="eventStartDate" placeholder="dd/mm/yyyy">
                </div>
                <div class="form-group col-md-12">
                    <label for="cutOffDate">Cut-Off Date</label>
                    <input type="date" class="form-control" id="cutOffDate" placeholder="dd/mm/yyyy">
                </div>
                <button type="submit" class="btn btn-default" id="eventDate-btn">Save</button>
            </form>
            </div>

            <!-- Data to be fetched -->
            <div class="thumbnail col-md-12 food-container">
                <div class="col-md-6" id="nonVeganDiv">
                    <h3 class="text-muted">Non-Vegeterian</h3>
                    <h2 id="NonVegans">50</h2>
                </div>
                <div class="col-md-6" id="veganDiv">
                    <h3 class="text-muted">Vegeterian</h3>
                    <h2 id="Vegans">10</h2>
                </div>
            </div>


        </div><!--End md-6-->

    </div>
</div>

<!-- Modal -->
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
                            <button type="button" class="btn btn-info" id="syncRosterButton" moduleId="">Sync Class Roster With IVLE</button>
                            <!-- CLASS SIZE -->

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
                            <div id = "editProjectTitles" class="col-sm-5 projectTitleFields"></div>
                            <!-- DYNAMICALLY GENERATE AND INSERT INPUT FIELDS INTO HERE
                            SAMPLE: <input type="text" class="form-control" innerIndex="" projectID="" moduleCode="" placeholder="Project Title">-->
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
    </div><!-- End of Modal-->



