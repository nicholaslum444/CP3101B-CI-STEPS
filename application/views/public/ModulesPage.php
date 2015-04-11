<div id="page-container" class="sidebar-visible-lg sidebar-no-animations">
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
        <div id="page-content" style="min-height: 793px;">

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
                                <?php
                            } else {
                                    // there are projects
                                foreach ($projects as $project) {
                                    ?>
                                    <!-- make a div for each project -->
                                    <div class="col-md-6">
                                        <div class="widget">
                                            <div class="widget-simple themed-background-dark">

                                                <h4 class="widget-content widget-content-light">
                                                    <span class="text-success"><?php echo $project["title"]; ?><span>
                                                        <!-- Group member names -->
                                                        <small><?php
                                                            if (isset($project["members"])) {
                                                                $students = $project["members"];
                                                                ?> by <span>
                                                                <?php
                                                                foreach($students as $student) {
                                                                    ?>
                                                                    <span>
                                                                        <?php echo $student["name"]; ?>
                                                                        <!-- <?php //echo $student["userID"]; ?> -->
                                                                    </span>
                                                                    <?php    
                                                                } ?>                                                
                                                                <?php
                                                            } else {
                                                    //show that there are no students!
                                                                ?>
                                                                Group members not yet available!                                                   
                                                                <?php
                                                            }
                                                            ?>
                                                        </span></small>
                                                    </h4>
                                                </div>


                                                <div class="widget-extra">
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
                                        <!-- original -->

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