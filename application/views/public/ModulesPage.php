<div id="page-container" class="sidebar-visible-lg">
    <div id="sidebar-alt">
        <div id="sidebar-alt-scroll">
        </div>
    </div>
    <div id="sidebar">
        <div id="sidebar-scroll">
            <div class="sidebar-content">
                <ul class="sidebar-nav wrap-sidebar">
                    <?php
                    foreach ($allModulesDetails as $details) { ?>
                    <li>
                        <a href="/index.php/Modules/view/<?php echo $details['moduleCode']; ?>">
                            <span class="sidebar-module-code"><?php echo $details['moduleCode']; ?></span>
                            <span class="sidebar-separator"><br></span>
                            <small class="sidebar-module-name"><?php echo $details['moduleName']; ?></small>
                        </a>
                    </li>
                    <?php
                } ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- The box to the right of the side-bar, just replace with the contents you want-->
    <div id="main-container">
        <div id="page-content" style="min-height: 873px;">
            <button class="btn btn-default" id="toggle-btn">Module Sidebar</button>
            <div class="panel-body" id="moduleContent">
                <!-- show the module pane if a module is selected -->
                <?php
                if (!is_null($selectedModuleData)) {
                    $projects = $selectedModuleData["projectList"];
                    $numProjects = count($projects);
                                //echo json_encode($projects);
                    $numStudents = 0;
                    foreach ($projects as $project) {
                                    // sum the total students
                        $numStudents += count($project["members"]);
                    }
                                // TODO replace with real variable!!
                    $moduleLecturer = "Dr. STEVEN HALIM";
                    ?>

                    <!-- module code, name and desc -->
                    <div>
                        <h2>
                            <?php echo $selectedModuleData["moduleCode"]; ?>
                            <small><br>
                                <?php echo $selectedModuleData["moduleName"]; ?>
                            </small>
                        </h2>
                        <p><strong>
                            Chaired by
                            <?php echo $moduleLecturer ?>
                        </strong></p>
                        <p><em>
                            <?php echo $numStudents ?>
                            students in
                            <?php echo $numProjects ?>
                            groups
                        </em></p>
                        <p><?php echo $selectedModuleData["moduleDescription"]; ?></p>
                    </div>

                    <!-- projects section -->
                    <div class="projects-container panel">
                        <?php
                        if (count($projects) <= 0) {
                                        // if no projects
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <p>
                                        Projects not yet available!
                                    </p>
                                </div>
                            </div>
                            <?php
                            } else {
                                        // there are projects
                                foreach ($projects as $project) {
                                    ?>
                                    <!-- make a div for each project -->
                                    <div class="col-md-6">
                                        <div class="widget">
                                            <div class="widget-advanced widget-advanced-alt">

                                                <div class="widget-header text-left">
                                                  <!--   <img src="/css/noimage.jpg" alt="background" class="widget-background"> -->
                                                    <h4 class="widget-content widget-content-image widget-content-light clearfix">
                                                        <a href="javascript:void(0)" class="widget-icon pull-right">
                                                            <i class="fa fa-picture-o"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="widget-icon pull-right">
                                                            <i class="fa fa-video-camera"></i>
                                                        </a>
                                                        <span class="themed-color-default text-success" id="pjtTitle">
                                                            <?php echo $project["title"]; ?>
                                                        </span><br />
                                                                <!-- Group member names -->
                                                                <small><?php
                                                                    if (isset($project["members"])) {
                                                                        $students = $project["members"];
                                                                        ?> by <span>
                                                                        <?php
                                                                        $studentNames = "";
                                                                        foreach($students as $student) {
                                                                            ?>
                                                                            <span>
                                                                                <?php $studentNames .= (namecaps($student["name"]) . ','); ?>
                                                                                <!-- <?php //echo $student["userID"]; ?> -->
                                                                            </span>
                                                                            <?php  
                                                                        }
                                                                        //remove last comma 
                                                                        $studentNames = substr($studentNames, 0, -1);
                                                                            echo $studentNames;
                                                                        ?>                                                
                                                                    <?php
                                                                    } else {
                                                                        //show that there are no students!
                                                                        ?>
                                                                        Group members not yet available!                                                   
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </small>
                                                                </span>
                                                    </h4>
                                                </div>

                                                    <div class="widget-main">
                                                        <?php
                                                        if (count($project["abstract"]) <= 0) {
                                                            ?>
                                                            <h4>
                                                                <small>
                                                                    Project abstract not yet available!
                                                                </small>
                                                            </h4>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p>
                                                                <?php echo $project["abstract"]; ?>
                                                            </p>
                                                            <?php
                                                        }
                                                        ?>                                            
                                                    </div>

                                            </div>
                                        </div>
                                    </div>

                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <!-- else show the default page content for this page -->
                                    <div class="page-header">
                                        <h1>
                                            Participating Modules
                                        </h1>
                                        <p>
                                            Students, faculty, technology entrepreneurs and prospective students will have the opportunity to experience the innovations
                                            created by the students.
                                            EIGHT courses are participating in the Term Project Showcase this semester.
                                        </p>
                                        <p>
                                            Click on the modules on the right to view their respective projects.
                                        </p>
                                    </div>
                <?php
                }
                ?>
                    </div>
            </div><!-- End of Module Content -->
        </div>
    </div>
</div>

<script>

$(window).resize(function() {
    var width = $(this).width();
    console.log(width);
    if (width < 768) {
        $('#page-container').removeClass();
        $('#toggle-btn').css("display","inline-block");

    }   else {
        $('#page-container').addClass('sidebar-visible-lg');
       $('#toggle-btn').css("display","none");

    }
});

$('#toggle-btn').click(function(){
    $('#page-container').toggleClass('sidebar-visible-lg sidebar-no-animations sidebar-visible-xs');
});

</script>