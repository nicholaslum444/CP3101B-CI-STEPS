<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="hero afternav">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h1 class="hero__heading">STePS</h1>
            <h2 class="hero__subheading">School of Computing's Term Project Showcase</h2>
            <a class="btn btn-learn-more btn-lg" href="/index.php/About">
                Learn More
            </a>
        </div>
    </div>
</div>

<div class="container">

    <!-- location, date and time information -->
    <div class="block--half-spaced">
        <ul class="list-stylised list-jumbo u-uppercase">
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

    <!-- event short info -->
    <div class="block--spaced">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2 class="section__heading">About The Showcase</h2>
                <div class="u-center">
                    <p>
                        The School of Computing Term Project Showcase (STePS) aims to bring together all of the class-based projects and project module in the School of Computing (SoC).
                    </p>
                    <p>
                        Get the <a href="">Programme Booklet</a> or view our <a href="">Poster Invitation</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <!-- module thumbnails -->
    <div class="block--spaced u-center">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2 class="section__heading">Participating Modules</h2>
                <div class="u-center">
                    <p>
                        Students, faculty, technology entrepreneurs and prospective students will have the opportunity to experience the innovations created by the students.
                        <br>
                        <!-- use php! -->
                        95
                        innovative projects from
                        <!-- use php! -->
                        10
                        participating courses/tracks will be showcased in the Term Project Showcase this semester.
                    </p>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <?php
            // start generating the module thumbs
            foreach ($modules as $module) {
                ?>
                <div class="col-sm-3">
                    <figure class="module-thumb">
                        <a href="/index.php/Modules/view/<?php echo $module['moduleCode']; ?>">
                            <div class="module-thumb-img">
                                <!-- TODO generate from php when ready -->
                                <img src="/img/<?php echo $module['moduleCode']; ?>-img.jpg">
                            </div>
                            <figcaption class="module-thumb-caption">
                                <span class="module-thumb-caption-header">
                                    <?php echo $module['moduleCode']; ?>
                                </span>
                                <br>
                                <span class="module-thumb-caption-text">
                                    <?php echo $module['moduleName']; ?>
                                </span>
                            </figcaption>
                        </a>
                    </figure>
                </div>
                <?php
            }
            ?>
        </div>
        <br>
        <a href="talks.php" class="btn btn-primary">See all modules</a>
    </div>

    <hr>

    <!-- registration prompt -->
    <div class="block--spaced">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
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
            <div class="col-md-6 col-md-offset-3">
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
