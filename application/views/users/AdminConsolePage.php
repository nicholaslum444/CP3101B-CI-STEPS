<?php 
// event info
$hasIteration = !empty($iterationInfo);

if (!isset($iteration)) {
    $iteration = "Invalid value";
}

if (isset($iterationInfo["semester"])) {
    $semester = $iterationInfo["semester"];
} else {
    $semester = "Invalid value";
}

if (isset($iterationInfo["registrationDate"])) {
    $registrationDate = $iterationInfo["registrationDate"];
} else {
    $registrationDate = "Invalid value";
}

if (isset($iterationInfo["cutOffDate"])) {
    $cutOffDate = $iterationInfo["cutOffDate"];
} else {
    $cutOffDate = "Invalid value";
}

if (isset($iterationInfo["startDate"])) {
    $startDate = $iterationInfo["startDate"];
} else {
    $startDate = "Invalid value";
}

if (isset($iterationInfo["endDate"])) {
    $endDate = $iterationInfo["endDate"];
} else {
    $endDate = "Invalid value";
}

// food prefs
if (isset($foodPref["NON_VEGE"])) {
    $nonVeganFoodCount = $foodPref["NON_VEGE"];
} else {
    $nonVeganFoodCount = 0;
}

if (isset($foodPref["VEGE"])) {
    $veganFoodCount = $foodPref["VEGE"];
} else {
    $veganFoodCount = 0;
}

?>

<div class="container admin-container site-container">
    <div class="row">
        
        <!-- module section -->
        <div class="col-md-6 accordion panel panel-primary" id="admin-accordion">
            <?php
            if (isset($moduleData)) {
                foreach($moduleData as $module) {
                    //echo json_encode($moduleData);
                    //Preprocess the data nicely
                    $moduleData = $module['data'];
                    
                    $moduleId = "dummy-id";
                    $moduleCode = "Dummy";
                    $moduleName = "-";
                    $classSize = 0;
                    $numProjects = 0;
                    $moduleDescription = "-";
                    $lecturers = "-";
                    
                    if (isset($module['lecturers'])) {
                        $lecturers = $module['lecturers'];
                    }
                    if (isset($moduleData['moduleID'])) {
                        $moduleId = $moduleData['moduleID'];
                    }
                    if (isset($moduleData['moduleCode'])) {
                        $moduleCode = $moduleData['moduleCode'];
                    }
                    if (isset($moduleData['moduleName'])) {
                        $moduleName = $moduleData['moduleName'];
                    }
                    if (isset($moduleData['moduleDescription'])) {
                        $moduleDescription = $moduleData['moduleDescription'];
                    }
                    if (isset($moduleData['classSize'])) {
                        $classSize = $moduleData['classSize'];
                    }
                    if (isset($moduleData['projectList'])) {
                        $numProjects = count($moduleData['projectList']);
                    }
                    ?>
                    
                    <div class="accordion-group console-module-block">
                        <div class="accordion-heading accordion-toggle console-module-block-header"  data-toggle="collapse" data-target="#<?php echo $moduleCode ?>" href="#" >
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
                        
                        
                        <i class="glyphicon glyphicon-chevron-down text-muted"></i>
                        <div class="console-module-block-header">
                            <div class="console-module-block-header-code-container">
                                <span class="console-module-block-header-code" moduleId = "<?php echo $moduleId; ?>">
                                    <?php 
                                    echo $moduleCode; 
                                    ?>
                                </span>
                            </div>
                            <div class="console-module-block-header-name-container">
                                <span class="console-module-block-header-name">
                                    <?php echo $moduleName; ?>
                                </span>
                            </div>
                            <button class="btn btn-xs btn-default editModuleBtn" data-toggle="modal" data-target= "#editModal" id="editButton<?php echo $moduleCode; ?>" module="<?php echo $moduleCode; ?>">Edit</button>
                        </div>
                        
                        <div class="accordion-body collapse in">
                            <div id="<?php echo $moduleCode ?>" class="accordion-inner collapse panel-collapse">
                                <br>
                                <div class="form-horizontal" role="form" index="1">
                                    
                                    <div class="col-xs-12 console-module-block-entry">
                                        <div class="class-size-header-container">
                                            <span class="class-size-header console-module-block-entry-header">
                                                Lecturer
                                            </span>
                                        </div>
                                        <div class="class-size-text-container">
                                            <?php 
                                            foreach($lecturers as $lecturer) { ?>
                                                <div class="class-size-text">
                                                    <?php echo $lecturer['name'];
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            
                                        </div>
                                    </div>
                                    
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
                                    
                                    <div class="col-xs-12 console-module-block-entry">
                                        <div class="description-header-container">
                                            <span class="description-header console-module-block-entry-header">
                                                Module Description
                                            </span>
                                        </div>
                                        <div class="">
                                            <span class="description-text">
                                                <?php echo $moduleDescription; ?>
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 console-module-block-entry">
                                        <div class="project-titles-header-container">
                                            <span class="project-titles-header console-module-block-entry-header">
                                                Project Titles
                                            </span>
                                        </div>
                                        <div class="project-titles-text-container">
                                            <?php $counter = 1;
                                            foreach($module['data']['projectList'] as $project) {
                                                if(!is_null($project['title'])) { ?>
                                                    <div class="project-titles-text" module="<?php echo $moduleCode; ?>" projectId="<?php echo $project['projectID']; ?>" innerIndex="<?php echo $counter++; ?>">
                                                        <?php echo $project['title']; ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No Module Information";
            }
            ?>
            
        </div>
        
        <!-- Information section -->
        <div class="col-md-6">
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Event Information
                </div>
                
                <div class="panel-body">
                    <button class="btn btn-primary" data-toggle="modal" data-target= "#newStepModal" id="newStepButton">New Iteration</button>
                
                    <hr>
                
                    <?php 
                    if ($hasIteration) {
                        ?>
                        <span class="event-info-header">Iteration Number:</span>
                        <div>
                            <?php echo $iteration; ?>
                        </div>
                        <br>
                        <span class="event-info-header">Acad Year/Semester:</span>
                        <div>
                            <?php echo $semester; ?>
                        </div>
                        <br>
                        <span class="event-info-header">Registration Opens:</span>
                        <div>
                            <?php echo $registrationDate; ?>
                        </div>
                        <br>
                        <span class="event-info-header">Registration Closes:</span>
                        <div>
                            <?php echo $cutOffDate; ?>
                        </div>
                        <br>
                        <span class="event-info-header">Event Starts:</span>
                        <div>
                            <?php echo $startDate; ?>
                        </div>
                        <br>
                        <span class="event-info-header">Event Ends:</span>
                        <div>
                            <?php echo $endDate; ?>
                        </div>
                        
                        <!-- <div class="eventDate-container clear">
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
                        </div> -->
                        
                        <?php
                    }
                    ?>
                </div>
            </div>

            <!-- Food Preference -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Food Preferences
                </div>
                <?php 
                if (isset($foodPref)) { 
                    ?>
                    <div class="food-container panel-body">
                        <div class="col-md-12">
                            <div class="col-md-6" id="nonVeganDiv">
                                <h3 class="text-muted">Non-Vegetarian</h3>
                                <h2 id="NonVegans">
                                    <?php echo $nonVeganFoodCount; ?>
                                </h2>
                            </div>
                            <div class="col-md-6" id="veganDiv">
                                <h3 class="text-muted">Vegetarian</h3>
                                <h2 id="Vegans">
                                    <?php echo $veganFoodCount; ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
                ?>
            </div>
            
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
                        <!-- <button type="button" class="btn btn-info" id="syncRosterButton" moduleId="">Sync Class Roster With IVLE</button> -->
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
                <h4 class="modal-title" id="newStepModalLabel">New Iteration for STePS</h4>
            </div>
            <div class="modal-body">
                <!--Form for editing module insert here-->
                <form id="newStepForm" class="form-horizontal" role="form">
                    <div class="form-group">
                        <!-- iteration -->
                        <label class="control-label col-sm-2" for="iteration">Iteration:</label>
                        <div class="col-sm-9">
                            <input disabled type="number" class="form-control" name="iteration" placeholder="Iteration Number" value="<?php echo ($iteration + 1); ?>">
                        </div>
                        <!-- iteration -->
                    </div>
                    
                    <div class="form-group">
                        <!-- SEM -->
                        <label class="control-label col-sm-2" for="sem">Semester:</label>
                        <div class="col-sm-9">
                            <input required type="text" class="form-control" name="sem" placeholder="Acad Year/Sem e.g. 1314/2" value="">
                        </div>
                        <!-- SEM -->
                    </div>
                    
                    <div class="form-group">
                        <!-- START DATE -->
                        <label class="control-label col-sm-2" for="newStartDate">Start of STePS:</label>
                        <div class="col-sm-9">
                            <input required type="date" class="form-control" name="newStartDate"></input>
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
                            <input required type="datetime-local" class="form-control" name="newRegistrationDate" placeholder=""></input>
                        </div>
                        <!-- REGISTRATION DATE -->
                    </div>
                    
                    <div class="form-group">
                        <!-- CUTOFF DATE -->
                        <label class="control-label col-sm-2" for="newCutOffDate">Cut Off Date:</label>
                        <div class="col-sm-9">
                            <input required type="datetime-local" class="form-control" name="newCutOffDate" placeholder=""></input>
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
                location.reload();
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
