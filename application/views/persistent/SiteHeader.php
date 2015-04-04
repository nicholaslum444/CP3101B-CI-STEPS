<!DOCTYPE html>
<html lang="en">
<?php
// setting the urls for the login iframes
$studentUrl = "https://ivle.nus.edu.sg/api/login/?"
. "apikey=3bBGOIdtC1T2d7SXeQAO9&url="
. $baseUrl . "index.php/IvleLogin?s";

$lecturerUrl = "https://ivle.nus.edu.sg/api/login/?"
. "apikey=3bBGOIdtC1T2d7SXeQAO9&url="
. $baseUrl . "index.php/IvleLogin?l";

// setting which navbar link becomes active
$modulesActive = "";
$registerActive = "";
$sponsorsActive = "";
switch($loader) {
    case LOADER_TYPE_PUBLIC_MODULES :
    $modulesActive = "active";
    break;

    case /*LOADER_TYPE_PUBLIC_REGISTER*/1 :
    $registerActive = "active";
    break;

    case /*LOADER_TYPE_PUBLIC_SPONSOR*/2 :
    $sponsorsActive = "active";
    break;
}
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="stylesheet" href="/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="/css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="/css/bootswatch-flatly.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

    <script src="/js/jquery-2.1.3.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/main.js"></script>

    <script>
    // for the binding later
    var studentIframe = '<iframe id="studentIframe" frameBorder="0" src="<?php echo $studentUrl; ?>"></iframe>';
    var lecturerIframe = '<iframe id="lecturerIframe" frameBorder="0" src="<?php echo $lecturerUrl; ?>"></iframe>';
    </script>

    <title>STePS</title>

</head>

<body>

    <?php
    // creates the modal login dialogs for un-logged-in non-admins
    if ((isset($loader) && $loader === LOADER_TYPE_ADMIN)) {
        // do nothing
    } else if ($isLoggedIn) {
        // do nothing
    } else {
        ?>

        <!-- Modal -->
        <div class="modal fade" id="ivleStudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Student Login - via IVLE</h4>
                    </div>
                    <div class="modal-body login-iframe-container" id="studentIframeContainer"></div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ivleLecturerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Staff Login - via IVLE</h4>
                    </div>
                    <div class="modal-body login-iframe-container" id="lecturerIframeContainer"></div>
                </div>
            </div>
        </div>
        <?php
    } // end modal creation
    ?>

    <!-- include the navbar as well -->
    <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
        <div class="container-fluid">

            <!-- contains the collapse and the brand name -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/index.php">
                    <?php echo $iteration ?>th <!-- ALERT TODO this "th" is hard coded! -->
                    STePS
                </a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <!-- links to public pages -->
                <div class="navbar-left"> <!--align left-->
                    <ul class="nav navbar-nav">
                        <li class="<?php echo $modulesActive; ?>">
                            <a href="/index.php/modules">Modules</a>
                        </li>
                        <li class="<?php echo $registerActive; ?>">
                            <a href="/index.php/register">Register</a>
                        </li>
                        <li class="<?php echo $sponsorsActive; ?>">
                            <a href="/index.php/sponsors">Sponsors</a>
                        </li>
                    </ul>
                </div>

                <!-- sign-in boxes -->
                <div class="navbar-right">
                    <?php
                    // (messy) code to load the correct buttons
                    // based on whether user logged in or not
                    $buttonType = "success";
                    if ($isLoggedIn) {
                        if ($userType === USER_TYPE_LECTURER) {
                            $userType = "Lecturer";
                            $buttonType = "info";
                        } else if ($userType === USER_TYPE_STUDENT) {
                            $userType = "Student";
                        } else if ($userType === USER_TYPE_ADMIN) {
                            $userType = "Admin";
                        }
                        ?>
                        <a href="/index.php/<?php echo $userType; ?>/console">
                            <button class="btn btn-<?php echo $buttonType; ?> navbar-btn"><?php echo $name; ?></button>
                        </a>
                        <a href="/index.php/logout">
                            <button class="btn btn-danger navbar-btn">Logout</button>
                        </a>
                        <?php
                    } else if (!(isset($loader) && $loader === LOADER_TYPE_ADMIN)) {
                        ?>
                        <p class="navbar-text navbar-login-text">Sign in as:</p>
                        <button class="btn btn-success navbar-btn" id="loginBtnStudent"
                        data-toggle="modal" data-target="#ivleStudentModal" data-backdrop="static">
                            Student
                        </button>
                        <button class="btn btn-info navbar-btn" id="loginBtnLecturer"
                        data-toggle="modal" data-target="#ivleLecturerModal" data-backdrop="static">
                            Lecturer
                        </button>
                        <?php
                    }
                    ?>
                </div>
            </div><!--/.navbar-collapse -->
        </div>
    </nav>
