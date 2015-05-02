<?php 
function getAwardIndex($projectId, $selectedModuleRanking) {
    $firstId = $selectedModuleRanking["first"][0];
    $secondId = $selectedModuleRanking["second"][0];
    $thirdId = $selectedModuleRanking["third"][0];
    if ($firstId === $projectId) {
        return 1;
    } else if ($secondId === $projectId) {
        return 2;
    } else if ($thirdId === $projectId) {
        return 3;
    } else {
        return -1;
    } 
}

function getAwardClass($awardIndex) {
    switch ($awardIndex) {
        case 1 :
        return "award award-gold";
        
        case 2 : 
        return "award award-silver";
        
        case 3 :
        return "award award-bronze";
        
        default :
        return "";
    } 
}

function getAwardName($awardIndex) {
    switch ($awardIndex) {
        case 1 :
        return "Gold";
        
        case 2 : 
        return "Silver";
        
        case 3 :
        return "Bronze";
        
        default :
        return "Winner";
    } 
}

?>
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


            <!-- actual content -->
            <div class="module-container" id="moduleContent">

                <!-- sidebar toggle btn -->
                <button class="btn btn-default toggle-btn">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                    <span>See More</span>
                </button>

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
                    $moduleCode = $selectedModuleData["moduleCode"];
                    $moduleName = strtoupper($selectedModuleData["moduleName"]);
                    ?>

                    <!-- module code, name, img and desc -->
                    <div class="row">
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 module-page-module-header">
                            <h1>
                                <?php echo $moduleCode; ?>
                                <small><br>
                                    <?php echo $moduleName ?>
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
                            <p>
                                <?php echo $selectedModuleData["moduleDescription"]; ?>
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 module-page-module-img">
                            <figure class="module-thumb">
                                    <div class="module-thumb-img">
                                        <img src="/img/<?php echo $moduleCode; ?>-img.jpg">
                                    </div>
                            </figure>
                        </div>
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
                        // echo json_encode($projects);
                        
                        for ($i = 0; $i < count($projects); $i++) {
                            $project = $projects[$i];
                            $projectId = $project["projectID"];
                            $awardIndex = getAwardindex($projectId, $selectedModuleRanking);
                            $awardClass = getAwardClass($awardIndex);
                            $awardName = getAwardName($awardIndex);
                            $projectIdNum = sprintf("%'.02d", ($i + 1));
                            $studentNames = "Group members not yet available!";
                            ?>
                            <!-- make a div for each project -->
                            <div class="col-lg-12 <?php echo $awardClass; ?>">
                                <div class="project-id-container" id="<?php echo $i; ?>">
                                    <span class="project-id-num">
                                        <?php echo $projectIdNum; ?>
                                    </span>
                                </div>
                                <div class="project-award-container pull-right" id="<?php echo $awardName; ?>">
                                    <span class="project-award-type">
                                        <?php echo $awardName; ?>
                                    </span>
                                </div>
                                <div class="project-box">
                                    <div class="project-box-header">
                                        <div class="project-header-details">
                                            <div class="project-title-container">
                                                <span class="project-title">
                                                    <?php echo $project["title"]; ?>
                                                </span>
                                            </div>
                                        </div> <!--end project box header details -->
                                    </div> <!--end project box header -->
                                    <div class="project-box-body">
                                        <div class="project-video-container">
                                            <!-- <img src="http://img.youtube.com/vi/KYmOuiGRnWE/hqdefault.jpg"> -->
                                            <!-- <iframe class="project-video-embed" width="356" height="200" src="https://www.youtube.com/embed/KYmOuiGRnWE?rel=0" frameborder="0" allowfullscreen></iframe> -->
                                        </div>
                                        <div class="project-abstract-container scroll-abstract">
                                            <span class="project-abstract-heading">
                                                Abstract:
                                            </span>
                                            <span class="project-abstract-text">
                                                <?php echo $project["abstract"]; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="project-members-container">
                                        <?php
                                        if (isset($project["members"])) {
                                            $students = $project["members"];
                                            foreach($students as $student) {
                                                $studentName = namecaps($student["name"]);
                                                ?>
                                                <a href="/search?searchTerm=<?php echo $studentName; ?>" 
                                                    target="_blank" 
                                                    class="project-member-plate">
                                                    <div class="project-member-text"><?php echo $studentName; ?></div>
                                                </a>
                                                <?php
                                            }
                                        }
                                        ?>
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
                    <div class="row">
                        <div class="col-lg-9">
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
                                Click on the modules on the sidebar to view their respective projects.
                            </p>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <!-- back to top btn -->
                <div class="btt-btn-container">
                    <button class="btn btn-default btt-btn">
                        <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
                        <span></span>
                    </button>
                </div>

            </div><!-- End of Module Content -->


        </div>
    </div><!-- end of main container -->
</div>

<script>

$(window).resize(function() {
    var width = $(this).width();

    if (width < 500 ) {
        $(".page-header img").css("display","none");
    } else {
        $(".page-header img").css("display","inline-block");
    }

    if (width < 768) {
        $('#page-container').removeClass();
        $('.toggle-btn').css("display","inline-block");

    } else {

        $('#page-container').addClass('sidebar-visible-lg');
        setTimeout(function(){
            $(".module-thumb-img img").css("height","");},
        1);

        $('.toggle-btn').css("display","none");
    }
});

$(window).resize();
$(function() {
    $("#page-content").css("min-height", ($("#sidebar").height() + 100));
});

$('.toggle-btn').click(function(){
    $('#page-container').toggleClass('sidebar-visible-lg sidebar-no-animations sidebar-visible-xs');
    // if ($('#page-container').attr("overflow") == "hidden") {
    //     $('#page-container').attr("overflow") = "inherit";
    // } else {
    //     $('#page-container').attr("overflow") = "hidden";
    // }
});

// for back to top button
jQuery(document).ready(function() {
    var offset = 250;
    var duration = 300;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.btt-btn').fadeIn(duration);
        } else {
            jQuery('.btt-btn').fadeOut(duration);
        }
    });

    jQuery('.btt-btn').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});

</script>
