<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index.html">STePs</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="navbar-right"> <!--align right-->
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/modules">Modules</a>
                    </li>
                </ul>
                <!-- IMPORTANT! For the (student) log in, redirect the user to this url:  -->
                <!-- https://ivle.nus.edu.sg/api/login/?apikey=3bBGOIdtC1T2d7SXeQAO9&url=http://steps.tk/student/-->

                <!-- After login, the user will be directed to the landing page url, and the url will have the auth token appended to it. -->
                <!-- Example: http://steps.tk/student/?token=ATRUWEY8UBB23JKJDA89312JH3B8HB (note: the actual token is very long) -->
                <!-- Post the token from the url to php/login.php (see example-landing-page.html for code example of how to do this) -->
                <!-- Our server will then tell you whether the token is valid or not. It will also start the session for the user if valid. -->
                <div class="navbar-form navbar-right">
                    <button type="button" class="btn btn-success" id="studentLogin">Student</button>
                    <button type="button" class="btn btn-success" id="lecturerLogin">Lecturer</button>
                </div>
            </div>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Temporary User Interface</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h2>For easy testing & navigation</h2>
            <p>Admin </p>
            <p><a class="btn btn-default" href="/admin" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Lecturer</h2>
            <p><a class="btn btn-default" href="/lecturer" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Student</h2>
            <p><a class="btn btn-default" href="/student" role="button">View details &raquo;</a></p>
        </div>
    </div>

</div> <!-- End of container -->
