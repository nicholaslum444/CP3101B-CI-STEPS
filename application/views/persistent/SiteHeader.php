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

    <meta name="description" content="The School of Computing Term Project Showcase (STePS) aims to bring together all of the class-based projects and project module in the School of Computing (SoC). It's a festive yet serious class showcase, in which students present their projects in all aspects of computer science and information systems to the respective Faculty for grading and to Industry guests, Government agencies, Sponsors and Investors to connect with potential employers and to seek opportunities for further development of their work through collaboration.">

    <!-- <link rel="stylesheet" href="/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="/css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="/css/bootswatch-flatly.css">
    <!-- <link rel="stylesheet" href="/css/jqueryuk15.css"> -->
    <link rel="stylesheet" href="/css/jqueryuk15extracted.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700' rel='stylesheet' type='text/css'>

    <script src="/js/jquery-2.1.3.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/ui.js"></script>

    <script>
    // for the binding later
    var studentIframe = '<iframe id="studentIframe" frameBorder="0" src="<?php echo $studentUrl; ?>"></iframe>';
    var lecturerIframe = '<iframe id="lecturerIframe" frameBorder="0" src="<?php echo $lecturerUrl; ?>"></iframe>';
    </script>

    <title>STePS - SoC Term Project Showcase</title>

</head>

<body>
    <!-- facebook like code -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=287314788099485";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!-- end facebook like -->

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
    <header class="navbar navbar-fixed-top navbar-default site__header" role="navigation">
        <!-- <div class="nav__contain"> -->
            <div class="container">
                <a href="/index.php" class="navbar-brand"><?php echo $iteration ?>th STePS&nbsp;</a>
                <!-- contains the collapse and the brand name -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- <a class="navbar-brand" href="/index.php">
                    <?php echo $iteration ?>th STePS
                </a> -->
                <!--navbar-collapse collapse centered-navbar-->
                <div id="navbar" class="navbar-collapse collapse list-inline nav--primary u-uppercase">
                    <!-- links to public pages -->
                    <!-- <div class="navbar-left">  -->
                    <ul class="nav navbar-nav navbar-left">
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
                    <!-- </div> -->

                    <!-- sign-in boxes -->
                    <ul class="nav navbar-nav navbar-right dropdown">
                        <?php
                        // (messy) code to load the correct buttons
                        // based on whether user logged in or not
                        $buttonType = "student";
                        if ($isLoggedIn) {
                            if ($userType === USER_TYPE_LECTURER) {
                                $userType = "Lecturer";
                                $buttonType = "lecturer";
                            } else if ($userType === USER_TYPE_STUDENT) {
                                $userType = "Student";
                            } else if ($userType === USER_TYPE_ADMIN) {
                                $userType = "Admin";
                            }
                            ?>
                            <li>
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="true">
                                    <?php echo $name; ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu user-dropdown-menu" role="menu">
                                    <li>
                                        <a href="/index.php/<?php echo $userType; ?>/console" class="<?php echo $buttonType; ?>-console-choice">
                                            Console
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/index.php/logout" class="logout-choice">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php
                        } else if (!(isset($loader) && $loader === LOADER_TYPE_ADMIN)) {
                            ?>
                            <li data-toggle="dropdown" class="dropdown-toggle" aria-expanded="true">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="true">
                                    Log in as:&nbsp;
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu user-dropdown-menu" role="menu">
                                    <li>
                                        <a href="#" class="student-login-choice" id="loginBtnStudent" data-toggle="modal" data-target="#ivleStudentModal" data-backdrop="static">
                                            Student
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="lecturer-login-choice" id="loginBtnLecturer" data-toggle="modal" data-target="#ivleLecturerModal" data-backdrop="static">
                                            Lecturer
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <span class="navbar-text navbar-login-text">Log in as:&nbsp;</span> -->
                            <?php
                        }
                        ?>
                    </ul>
                </div><!--/.navbar-collapse -->
            </div>
        <!-- </div> -->
    </header>
