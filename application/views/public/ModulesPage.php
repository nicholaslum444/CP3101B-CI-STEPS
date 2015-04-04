<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar wrap-sidebar">
                <li class="active"><a href="/index.php/Modules/view">Overview <span class="sr-only">(current)</span></a></li>
                <!-- generate the list of modules for the sidebar -->
                <?php
                foreach($allModulesDetails as $details) { ?>
                    <li>
                        <a href="/index.php/Modules/view/<?php echo $details['moduleCode']; ?>">
                            <span class="sidebar-module-code"><?php echo $details['moduleCode']; ?></span>
                            <span class="sidebar-separator"> - </span>
                            <span class="sidebar-module-name"><?php echo $details['moduleName']; ?></span>
                        </a>
                    </li>
                    <?php
                } ?>
            </ul>
        </div>

        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-body" id="moduleContent">
                    <!-- show the module pane if a module is selected -->
                    <?php if (!is_null($selectedModuleData)) { ?>
                        <!-- module code, name and desc -->
                        <h1><?php echo $selectedModuleData["moduleCode"]; ?></h1>
                        <h2><?php echo $selectedModuleData["moduleName"]; ?></h2>
                        <p><?php echo $selectedModuleData["moduleDescription"]; ?></p>
                        <!-- break -->
                        <p>List of Projects:</p>
                        <?php
                        $projects = $selectedModuleData["projectList"];
                        foreach($projects as $project) { ?>
                            <!-- make a div for each project -->
                            <div class="col-sm-8">
                                <h3><?php echo $project["title"]; ?></h3>
                                <ul>
                                    <?php
                                    if (isset($project["members"])) {
                                        $students = $project["members"];
                                    } else {
                                        $students = [];
                                    }
                                    foreach($students as $student) {
                                        ?>
                                        <li>
                                            <?php echo $student["name"]; ?> - <?php echo $student["userID"]; ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <p>
                                    <?php echo $project["abstract"]; ?>
                                </p>
                            </div>
                        <?php } ?>
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
