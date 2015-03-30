<div class="container-fluid afternav">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar"><!--List of modules to be generated-->
            <ul class="nav nav-sidebar">
                <li class="active"><a href="/index.php/Modules/view">Overview <span class="sr-only">(current)</span></a></li>
                <!-- generate the list of modules for the sidebar -->
                <?php for ($i = 0; $i < count($modules); $i++) {
                    $module = $modules[$i]; ?>
                    <li>
                        <a href="/index.php/Modules/view/<?php echo $module['moduleCode']; ?>">
                            <?php echo $module['moduleCode'] . " - " . $module['moduleName']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-body" id="moduleContent">
                    <!-- show the module pane if a module is selected -->
                    <?php if (isset($selectedModule) && isset($projects)) { ?>
                        <!-- module code, name and desc -->
                        <h1><?php echo $selectedModule["moduleCode"]; ?></h1>
                        <h2><?php echo $selectedModule["moduleName"]; ?></h2>
                        <p><?php echo $selectedModule["moduleDescription"]; ?></p>
                        <!-- break -->
                        <p>List of Projects:</p>
                        <?php for ($i = 0; $i < count($projects); $i++) {
                            $project = $projects[$i];
                            $students = $projectDetails[$i]; ?>
                            <!-- make a div for each project -->
                            <div class="col-sm-8">
                                <h3><?php echo $project["title"]; ?></h3>
                                <ul>
                                    <?php for ($j = 0; $j < count($students); $j++) {
                                        $student = $students[$j]; ?>
                                        <li><?php echo $student["name"]; ?> - <?php echo $student["matricNo"]; ?></li>
                                    <?php } ?>
                                </ul>
                                <p><?php echo $project["abstract"]; ?></p>
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
