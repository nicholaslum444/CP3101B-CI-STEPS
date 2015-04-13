<div id="page-container" class="sidebar-visible-lg sidebar-no-animations sidebar-visible-xs">
    <div id="sidebar-alt">
        <div id="sidebar-alt-scroll">
        </div>
    </div>
    <div id="sidebar">
        <div id="sidebar-scroll">
            <div class="sidebar-content">
                <ul class="sidebar-nav wrap-sidebar">
                    <?php
                    foreach ($allModulesDetails as $details) {
                        ?>
                        <li class="<?php if($selectedModuleData['moduleCode'] === $details['moduleCode']) { echo "sidebar-chosen-module"; } ?>">
                            <a href="/modules/view/<?php echo $details['moduleCode']; ?>">
                                <div class="sidebar-module-box">
                                    <div class="sidebar-module-code-box">
                                        <span class="sidebar-module-code"><?php echo $details['moduleCode']; ?></span>
                                    </div>
                                    <div class="sidebar-module-name-box">
                                        <span class="sidebar-module-name"><?php echo namecaps($details['moduleName']); ?></span>
                                    </div>
                                </div>
                                <!-- <br> -->
                                <span class="sidebar-separator"></span>
                                <!-- <hr> -->
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- The box to the right of the side-bar, just replace with the contents you want-->
    <div id="main-container">
        <div id="page-content">

            <!-- sidebar toggle btn -->
            <button class="btn btn-default" id="toggle-btn">
                <span id="sidebar-direction" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                <span>See More</span>
            </button>

            <!-- actual content -->
            <div class="module-container" id="moduleContent">
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

                    // realdata
                    $supervisors = $selectedModuleData["supervisors"];
                    $numSups = count($supervisors);
                    $moduleLecturer = namecaps($supervisors[$numSups - 1]["name"]);
                    if ($numSups > 1) {
                        for ($i = 0; $i < $numSups - 1; $i++) {
                            $moduleLecturer = namecaps($supervisors[$i]["name"]) . " and " . $moduleLecturer;
                        }
                    }
                    ?>

                    <!-- module code, name and desc -->
                    <div class="page-header">
                        <h1>
                            <?php echo $selectedModuleData["moduleCode"]; ?>
                            <small><br>
                                <?php echo strtoupper($selectedModuleData["moduleName"]); ?>
                            </small>
                        </h1>
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
                    <div class="row">
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
                            <div class="col-lg-4 col-md-6">
                                <div class="project-box">
                                    <div class="project-box-header">
                                        <div class="project-header-details">
                                            <div class="project-title-container">
                                                <span class="project-title">
                                                    <?php echo $project["title"]; ?>
                                                </span>
                                            </div>
                                            <div class="project-members-container">
                                                <span class="project-members">
                                                    <?php
                                                    if (isset($project["members"])) {
                                                        $students = $project["members"];
                                                        $studentNames = "";
                                                        foreach($students as $student) {
                                                            $studentNames .= (namecaps($student["name"]) . ', ');
                                                        }
                                                        //remove last comma
                                                        $studentNames = substr($studentNames, 0, -2);
                                                        ?>
                                                        <!-- by -->
                                                        <span class="project-student-names">
                                                            <!-- code here -->
                                                            <?php echo $studentNames; ?>
                                                        </span>
                                                        <?php
                                                    } else {
                                                        //show that there are no students!
                                                        ?>
                                                        Group members not yet available!
                                                        <?php
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div> <!--end project box header details -->
                                        <div class="project-header-links pull-right">
                                            <a href="">
                                                <i class="fa fa-external-link fa-inverse fa-2x"></i>
                                            </a>
                                        </div>
                                    </div> <!--end project box header -->
                                    <div class="project-box-body">
                                        <div class="project-video-container">
                                            <!-- <img src="http://img.youtube.com/vi/KYmOuiGRnWE/hqdefault.jpg"> -->
                                            <iframe class="project-video-embed" width="356" height="200" src="https://www.youtube.com/embed/KYmOuiGRnWE?rel=0" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                        <div class="project-abstract-container">
                                            <span class="project-abstract-heading">
                                                Abstract:
                                            </span>
                                            <span class="project-abstract-text">
                                                <?php echo $project["abstract"]; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div> <!-- end of project box -->
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
                            <?php echo count($allModulesDetails); ?>
                            courses are participating in the Term Project Showcase this semester.
                        </p>
                        <p>
                            Click on the modules on the right to view their respective projects.
                        </p>
                    </div>
                    <?php
                }
                ?>
            </div><!-- End of Module Content -->
        </div>
    </div>
</div>

<script>

$(window).resize(function() {
    var width = $(this).width();
    //console.log(width);
    if (width < 768) {
        $('#page-container').removeClass();
        $('#toggle-btn').css("display","inline-block");

    } else {
        $('#page-container').addClass('sidebar-visible-lg');
        $('#toggle-btn').css("display","none");
    }
});

$(window).resize();
$(function() {
    $("#page-content").css("min-height", ($("#sidebar").height() + 100));
});

$('#toggle-btn').click(function(){
    $('#page-container').toggleClass('sidebar-visible-lg sidebar-no-animations sidebar-visible-xs');
    //$("#sidebar-direction").toggleClass("glyphicon-menu-left");
});

</script>
