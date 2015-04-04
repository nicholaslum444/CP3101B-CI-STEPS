<div class="container-fluid">
    <div class="row">

        <div class="col-xs-1">
            <!-- nothing inside here -->
        </div>

        <div class="col-xs-2 sidebar">
            <ul class="nav nav-sidebar wrap-sidebar">
                <li class="active"><a href="/index.php/Modules/view">Overview <span class="sr-only">(current)</span></a></li>
                <!-- generate the list of modules for the sidebar -->
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

        <div class="col-xs-7 panel">
            <div clss="panel panel-default">
                <div class="panel-body" id="moduleContent">
                    <!-- show the module pane if a module is selected -->
                    <?php if (!is_null($selectedModuleData)) {
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
                        <div class="page-header">
                            <h1>
                                <?php echo $selectedModuleData["moduleCode"]; ?>
                                <small><br>
                                    <?php echo $selectedModuleData["moduleName"]; ?>
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
                            <?php echo $selectedModuleData["moduleDescription"]; ?>
                        </div>
                        <!-- break -->
                        <h3>Projects</h3>
                        <div class="projects-container">
                            <?php
                            foreach ($projects as $project) { ?>
                                <!-- make a div for each project -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?php echo $project["title"]; ?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <p>
                                            <?php echo $project["abstract"]; ?>
                                        </p>
                                    </div>
                                    <ul class="list-group">
                                        <?php
                                        if (isset($project["members"])) {
                                            $students = $project["members"];
                                        } else {
                                            $students = [];
                                        }
                                        foreach($students as $student) {
                                            ?>
                                            <li class="list-group-item">
                                                <?php echo $student["name"]; ?>
                                                <!-- -  -->
                                                <!-- <?php echo $student["userID"]; ?> -->
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <!-- else show the default page content for this page -->
                        <h1>Participating Modules</h1>
                        <p>Choose a module on the sidebar to see more information about it.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End of container -->
