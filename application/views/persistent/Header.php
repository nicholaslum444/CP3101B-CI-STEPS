<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="/css/main.css">

	<script src="/js/jquery-2.1.3.min.js"></script>
	<script src="/js/bootstrap.js"></script>
	<script src="/js/main.js"></script>

	<title>STePS</title>

</head>

<body>
	<!-- include the navbar as well -->
	<nav class="navbar navbar-inverse" role="navigation">
	    <div class="container">
	      <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	          <span class="sr-only">Toggle navigation</span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="/index.html">STePS</a>
	      </div>
	      <div id="navbar" class="navbar-collapse collapse">
	        <div class="navbar-right"> <!--align right-->
	          <ul class="nav navbar-nav">
	            <li class="active"><a href="/modules">Modules</a></li>
	          </ul>
			<div class="navbar-form navbar-right">
				<?php
				// (messy) code to load the correct buttons
				// based on whether user logged in or not

				// this is a hack(?) to get the callback url to match the
				// current url, rather than hardcoding "steps.tk"
				$loginUrl = "https://ivle.nus.edu.sg/api/login/?"
					. "apikey=3bBGOIdtC1T2d7SXeQAO9&url="
					. $baseUrl . "index.php/ivleauth";

				if ($isLoggedIn) {
					$name = $userProfile->Results[0]->Name; ?>
					<a href="/index.php/console" class="btn btn-success"><?php echo $name ?></a>
					<a href="/index.php/logout" class="btn btn-danger">Logout</a>
				<?php } else { ?>
					<a href="<?php echo $loginUrl; ?>" target="about:blank" class="btn btn-success">Student</a>
					<a href="<?php echo $loginUrl; ?>" target="about:blank" class="btn btn-success">Lecturer</a>
				<?php } ?>
			</div>
	        </div>
	      </div><!--/.navbar-collapse -->
	    </div>
	  </nav>
