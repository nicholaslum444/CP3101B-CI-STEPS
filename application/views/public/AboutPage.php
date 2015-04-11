<!-- Main jumbotron for a primary marketing message or call to action -->
<!-- <div class="jumbotron afternav">
    <div class="container">
        <h1>STePS<br>
            <small>
                <strong>S</strong>chool of Computing
                <strong>Te</strong>rm <strong>P</strong>roject <strong>S</strong>howcase
            </small>
        </h1>
    </div>
</div> -->

<div class="container">

    <div class="row">
        <div class="col-sm-4 col-md-offset-1">
            <!-- steps poster -->
            <div class="block--spaced">
                <h2 class="section__heading about-page-right">About STePS</h2>
                <div class="steps-poster-container">
                    <img src="/img/6thsteps.jpg">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="block--spaced">
                <h2 class="section__heading blank-heading">&nbsp;</h2>
                <div class="">
                    <p>
                        The <b>S</b>chool of Computing <b>Te</b>rm <b>P</b>roject <b>S</b>howcase (<b>STePS</b>) aims
                        to bring together all of the class-based projects and project
                        modules in NUS School of Computing (SoC).
                    </p>
                    <p>
                        It's a festive yet serious class showcase, in which students present their
                        projects in all aspects of computer science and information
                        systems to the respective Faculty for grading and to Industry
                        guests, Government agencies, Sponsors and Investors to
                        connect with potential employers and to seek opportunities
                        for further development of their work through collaboration.
                    </p>
                    <p>
                        Students, faculty, technology entrepreneurs and prospective
                        students will have the opportunity to experience the
                        innovations created by the students.
                    </p>
                    <a href="index.php/Register" class="btn btn-secondary">Register</a>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-4 col-md-offset-1">
            <h2 class="section__heading about-page-right">Schedule</h2>
            <ul class="list-stylised list-jumbo u-uppercase about-page-right">
                <li>
                    <span class="glyphicon glyphicon-globe"></span>
                    <!-- need php XXX -->
                    SoC COM1
                </li>
                <li>
                    <span class="glyphicon glyphicon-calendar"></span>
                    <!-- need php TODO -->
                    <?php echo $eventDate; ?>
                </li>
                <li>
                    <span class="glyphicon glyphicon-time"></span>
                    <!-- need php TODO -->
                    <?php echo $eventStartTime; ?>
                    to
                    <?php echo $eventEndTime; ?>
                </li>
            </ul>
        </div>
        <div class="col-sm-6">
            <h2 class="section__heading about-page-right blank-heading">&nbsp;</h2>
            <ul class="list-unstyled schedule--full schedule--first">
                <li class="h-event schedule__item schedule__item--no-link schedule__item--alt gap-">
                    <a class="schedule__item__link" href="talks.php#">
                        <div class="schedule__item__name">
                            <h3 class="schedule__item__heading">
                                Registration
                            </h3>
                            <span class="schedule__item__desc">
                                Collect Food Coupon and Voter ID Number
                            </span>
                        </div>
                        <span class="schedule__item__time">
                            <time>17:30</time>
                        </span>
                    </a>
                </li>
                <li class="h-event schedule__item schedule__item--no-link gap-">
                    <a class="schedule__item__link" href="talks.php#">
                        <div class="schedule__item__name">
                            <h3 class="schedule__item__heading">
                                Catering Opens
                            </h3>
                            <span class="schedule__item__desc">
                                For Exhibitors and Organisers
                            </span>
                        </div>
                        <span class="schedule__item__time">
                            <time>17:30</time>
                        </span>
                    </a>
                </li>
                <li class="h-event schedule__item schedule__item--no-link gap-">
                    <a class="schedule__item__link" href="talks.php#">
                        <div class="schedule__item__name">
                            <h3 class="schedule__item__heading">
                                Poster and Demo Session
                            </h3>
                            <span class="schedule__item__desc">
                                &nbsp;
                            </span>
                        </div>
                        <span class="schedule__item__time">
                            <time>18:00</time>
                        </span>
                    </a>
                </li>
                <li class="h-event schedule__item schedule__item--no-link schedule__item--alt gap-">
                    <a class="schedule__item__link" href="talks.php#">
                        <div class="schedule__item__name">
                            <h3 class="schedule__item__heading">
                                Buffet Dinner
                            </h3>
                            <span class="schedule__item__desc">
                                For registered guests. Food Coupon to be used.
                            </span>
                        </div>
                        <span class="schedule__item__time">
                            <time>19:00</time>
                        </span>
                    </a>
                </li>
                <li class="h-event schedule__item schedule__item--no-link gap-">
                    <a class="schedule__item__link" href="talks.php#">
                        <div class="schedule__item__name">
                            <h3 class="schedule__item__heading">
                                Last Call for Votes
                            </h3>
                            <span class="schedule__item__desc">
                                Poster session still ongoing
                            </span>
                        </div>
                        <span class="schedule__item__time">
                            <time>20:50</time>
                        </span>
                    </a>
                </li>
                <li class="h-event schedule__item schedule__item--no-link gap-">
                    <a class="schedule__item__link" href="talks.php#">
                        <div class="schedule__item__name">
                            <h3 class="schedule__item__heading">
                                Closing Ceremony
                            </h3>
                            <span class="schedule__item__desc">
                                &nbsp;
                            </span>
                        </div>
                        <span class="schedule__item__time">
                            <time>21:00</time>
                        </span>
                    </a>
                </li>
                <li class="h-event schedule__item schedule__item--no-link schedule__item--alt gap-">
                    <a class="schedule__item__link" href="talks.php#">
                        <div class="schedule__item__name">
                            <h3 class="schedule__item__heading">
                                Finish
                            </h3>
                            <span class="schedule__item__desc">
                                &nbsp;
                            </span>
                        </div>
                        <span class="schedule__item__time">
                            <time>22:00</time>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <hr>

    <!-- registration prompt -->
    <div class="block--spaced">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="section__heading">Come On Down</h2>
                <div class="u-center">
                    <p>
                        Buffet dinner will be provided to add registered attendees.<br>
                        Confirm your spot by registering. It's free!
                    </p>
                    <a href="index.php/Register" class="btn btn-secondary">Register</a>
                </div>
            </div>
        </div>
    </div>

    <!-- publicity prompt -->
    <div class="block--spaced">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="section__heading">Already Participating?</h2>
                <div class="u-center">
                    <p>
                        Share the excitement with your friends and relatives!<br>
                        Invite them down for a night of innovation, genius and enterprise<br>
                        <!-- fb like btn -->
                        <div class="fb-like" data-href="http://steps.tk/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
