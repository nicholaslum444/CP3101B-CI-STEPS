<div class="container admin-container site-container">
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
                $numProjects = $module['data']['projectList'] == null ? 0 : count($module['data']['projectList']);
                $moduleDescription = $module['data']['moduleDescription'] == null ? "-" : $module['data']['moduleDescription'];
                ?>

                <div class="accordion-group panel-default">
                    <div class="accordion-heading accordion-toggle panel-heading"  data-toggle="collapse" data-target="#<?php echo $moduleCode ?>" href="#" >
                        <i class="glyphicon glyphicon-chevron-down text-muted"></i><span class="admin-accordion-modulename text-success"><?php echo $moduleCode ?>  - <?php echo $moduleName; ?></span>
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
                                  <?php $counter = 1;
                                  foreach($module['data']['projectList'] as $project) {
                                    if(!is_null($project['title'])) { ?>
                                    <h5 class="inputText projectTitle" module="<?php echo $moduleCode; ?>" projectId="<?php echo $project['projectID']; ?>" innerIndex="<?php echo $counter++; ?>"><?php echo $project['title']; ?></h5>
                                    <?php } ?>
                                    <?php } ?>
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

        <div> <!-- Date container -->
        <?php if(isset($dates)) {
            ?>
            <!-- EVENT DATES -->
            <div class="eventDate-container clear">
                <form class="form" role="form" id="eventDatesForm">
                    <div class="form-group col-md-12">
                        <label for="startDate">Start Of Event</label>
                        <input type="date" class="form-control" name="startDate" id="startDate" value="<?php echo $dates['startDate'] ?>" placeholder="DD/MM/YYYY">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="endDate">End of Event</label>
                        <input type="date" class="form-control" name="endDate" id="endDate" value="<?php echo $dates['endDate'] ?>" placeholder="DD/MM/YYYY">
                    </div>
            </div>


            <!-- REGISTRATION DATES -->
            <div class="eventDate-container clear">        
                    <div class="form-group col-md-12">
                        <label for="registrationDate">Registration Date</label>
                        <input type="date" class="form-control" name="registrationDate" id="registrationDate" value="<?php echo $dates['registerDate'] ?>" placeholder="DD/MM/YYYY">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="cutOffDate">Cut-Off Date</label>
                        <input type="date" class="form-control" name="cutOffDate" id="cutOffDate" value="<?php echo $dates['cutOffDate'] ?>" placeholder="DD/MM/YYYY">
                    </div>
                    <button type="submit" class="btn btn-default" id="eventDate-btn">Save</button>
                </form>
            </div>
        <?php } ?>
        </div> <!-- end of date container-->

        <!-- Food Preference -->
        <?php 
        if(isset($foodPref)) {
            ?>
            <div class="thumbnail col-md-12 food-container">
                <div class="col-md-6" id="nonVeganDiv">
                    <h3 class="text-muted">Non-Vegetarian</h3>
                    <h2 id="NonVegans"><?php echo $foodPref["NON_VEGE"] ?></h2>
                </div>
                <div class="col-md-6" id="veganDiv">
                    <h3 class="text-muted">Vegetarian</h3>
                    <h2 id="Vegans"><?php echo $foodPref["VEGE"]; ?></h2>
                </div>
            </div>
        <?php } ?>

        <!-- NEW STEPS BUTTON -->
        <button class="btn btn-default" data-toggle="modal" data-target= "#newStepModal" id="newStepButton">NEW STEPS</button>

    </div><!--End md-6-->

</div><!-- End of row -->
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

<!-- MODAL FOR NEW STEPS-->
<div class="modal fade bs-example-modal-lg" id="newStepModal" tabindex="-1" role="dialog" aria-labelledby="newStepModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="newStepModalLabel">New STePS</h4>
            </div>
            <div class="modal-body">
                <!--Form for editing module insert here-->
                <form id="newStepForm" class="form-horizontal" role="form">
                    <div class="form-group">
                        <!-- SEM -->
                        <label class="control-label col-sm-2" for="sem">Semester:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="sem" placeholder="1314/2" value="">
                        </div>
                        <!-- SEM -->
                    </div>

                    <div class="form-group">
                        <!-- START DATE -->
                        <label class="control-label col-sm-2" for="newStartDate">Start of STePS:</label>
                        <div class="col-sm-9">
                            <input required type="date" class="form-control" name="newStartDate" placeholder=""></input>
                        </div>
                        <!-- START DATE -->
                    </div>

                    <div class="form-group">
                        <!-- END DATE -->
                        <label class="control-label col-sm-2" for="newEndDate">End of STePS:</label>
                        <div class="col-sm-9">
                            <input required type="date" class="form-control" name="newEndDate" placeholder=""></input>
                        </div>
                        <!-- END DATE -->
                    </div>

                    <div class="form-group">
                        <!-- REGISTRATION DATE -->
                        <label class="control-label col-sm-2" for="newRegistrationDate">Registration Date:</label>
                        <div class="col-sm-9">
                            <input required type="date" class="form-control" name="newRegistrationDate" placeholder=""></input>
                        </div>
                        <!-- REGISTRATION DATE -->
                    </div>

                    <div class="form-group">
                        <!-- CUTOFF DATE -->
                        <label class="control-label col-sm-2" for="newCutOffDate">Cut Off Date:</label>
                        <div class="col-sm-9">
                            <input required type="date" class="form-control" name="newCutOffDate" placeholder=""></input>
                        </div>
                        <!-- CUTOFF DATE -->
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-9 col-sm-10">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- End of Modal-->

<script type="text/javascript">

$(function(){

$('#eventDatesForm').submit(function(e){
    var dates = $(this).serializeArray();

    var dateArr = {
        "startDate" : dates[0].value,
        "endDate" : dates[1].value,
        "registrationDate" : dates[2].value,
        "cutOffDate" : dates[3].value
    };
    
    //console.log(JSON.stringify(dateArr));

    $.ajax({
        url: "/index.php/ajaxreceivers/setEventDates",
        method: "POST",
        data: dateArr,
        dataType: "json"
    })

    .done(function(data) {
        if(data["success"] == true) {
            console.log("success");
        }
        else {
            console.log("error " + JSON.stringify(data));
        }
    })
    .fail(function(data) {
        console.log("failed" + JSON.stringify(data));
    });

    e.preventDefault();
});

$('#newStepForm').submit(function(e){
    e.preventDefault();

    var dates = $(this).serializeArray();
    //console.log(dates);

    var dateArr = {
        "sem" : dates[0].value,
        "startDate" : dates[1].value,
        "endDate" : dates[2].value,
        "registrationDate" : dates[3].value,
        "cutOffDate" : dates[4].value
    };
    
    //console.log(JSON.stringify(dateArr));

    $.ajax({
        url: "/index.php/ajaxreceivers/NewStep",
        method: "POST",
        data: dateArr,
        dataType: "json"
    })

    .done(function(data) {
        if(data["success"] == true) {
            console.log("success");
        }
        else {
            console.log("error " + JSON.stringify(data));
        }
    })
    .fail(function(data) {
        console.log("failed" + JSON.stringify(data));
    });

});




})

</script>
