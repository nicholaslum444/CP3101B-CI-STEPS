<div class="container-fluid afternav">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar"><!--List of modules to be generated-->
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
                <?php for ($i = 0; $i < count($modules); $i++) {
                    $module = $modules[$i]; ?>
                    <li><a href="/index.php/Modules/view/<?php echo $module['moduleCode']; ?>"><?php echo $module['moduleName']; ?></a></li>
                <?php } ?>
            </ul>
        </div>

        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-body" id="moduleContent">
                    <?php if (isset($selectedModule) && isset($projects)) { ?>
                        <h1><?php echo $selectedModule["moduleCode"]; ?></h1>
                        <h1><?php echo $selectedModule["moduleName"]; ?></h1>
                        <p>List of Projects:</p>
                        <?php for ($i = 0; $i < count($projects); $i++) {
                            $project = $projects[$i];
                            $students = $projectDetails[$i]; ?>
                            <!-- make a div for the project -->
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End of container -->
