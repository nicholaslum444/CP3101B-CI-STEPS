<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="/css/bootswatch-flatly.css">
	<link rel="stylesheet" href="/css/main.css">
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>


	<script src="/js/jquery-2.1.3.min.js"></script>
	<script src="/js/bootstrap.js"></script>
	<script src="/js/main.js"></script>

	<title>STePS</title>

</head>

<body>
	<!-- include the navbar as well -->
	<nav class="navbar" role="navigation">
	    <div class="container">
	      <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	          <span class="sr-only">Toggle navigation</span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="/index.php">STePS</a>
	      </div>
	      <div id="navbar" class="navbar-collapse collapse">
	        <div class="navbar-right"> <!--align right-->
	          <ul class="nav navbar-nav">
	            <li class="active"><a href="/index.php/modules">Modules</a></li>
	          </ul>
				<div class="navbar-form navbar-right">
					<?php
					// (messy) code to load the correct buttons
					// based on whether user logged in or not

					// this is a hack(?) to get the callback url to match the
					// current url, rather than hardcoding "steps.tk"
					$studentUrl = "https://ivle.nus.edu.sg/api/login/?"
						. "apikey=3bBGOIdtC1T2d7SXeQAO9&url="
						. $baseUrl . "index.php/IvleLogin?s";
					$lecturerUrl = "https://ivle.nus.edu.sg/api/login/?"
						. "apikey=3bBGOIdtC1T2d7SXeQAO9&url="
						. $baseUrl . "index.php/IvleLogin?l";

					if ($isLoggedIn) {
						if ($userType === 2) {
							$userType = "Lecturer";
						} else if ($userType === 3) {
							$userType = "Student";
						} ?>
						<a href="/index.php/<?php echo $userType; ?>/console" class="btn btn-success"><?php echo $name ?></a>
						<a href="/index.php/logout" class="btn btn-danger">Logout</a>
					<?php } else if (!(isset($loader) && $loader === "Admin")) { ?>
						<button class = "btn btn-success" id="loginBtn" data-toggle="modal" data-target="#ivleStudentModal">Student</button>
						<button class = "btn btn-success" id="loginBtn" data-toggle="modal" data-target="#ivleLecturerModal">Lecturer</button>
					<?php } ?>
				</div>
	        </div>
	      </div><!--/.navbar-collapse -->
	    </div>
	  </nav>

	  <!-- Modal -->
<div class="modal fade" id="ivleStudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Log in via IVLE</h4>
      </div>
      <div class="modal-body">
      	<p><iframe id="testingid" src="<?php echo $studentUrl; ?>"></iframe></p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ivleLecturerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Log in via IVLE</h4>
      </div>
      <div class="modal-body">
      	<p><iframe id="testingid" src="<?php echo $lecturerUrl; ?>"></iframe></p>
      </div>
    </div>
  </div>
</div>
