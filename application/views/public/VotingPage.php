<div class="container site-container">
    

    <div class="btn btn-primary" id="search">search</div>
    <input type="text" id="term" autofocus></input>
    <div id="results"></div>
    <script>
    $("#search").click(function() {
        $.get("/ajaxreceivers/Lookup",
        {"searchTerm":$("#term").val()},
        function(data) {
            console.log(data);
            $("#results").append(JSON.stringify(data));
        });
    }).click();
    </script>
    
    <h2 class="subtitle">VOTING</h2>
    <div class="row">
        <div class="col-sm-4 col-xs-1">
        </div>
        <div class="col-sm-3 col-xs-5" style="text-align:left;">
            <h4>CP 3101B:</h4>
            <hr>
            <h4>FYP:</h4>
            <hr>
            <h4>IS 5126:</h4>
            <hr>
            <h4>CS 3217:</h4>
            <hr>
            <h4>CS 3218:</h4>
            <hr>
            <h4>CS 3240:</h4>
            <hr>
            <h4>CS 3247:</h4>
            <hr>
            <h4>CS 3284:</h4>
            <hr>
            <h4>CS 4244:</h4>
            <hr>
            <h4>CS 4344:</h4>
            <hr>
        </div>
        <div class="col-sm-3 col-xs-5">
            <h4><a target="_blank" href="http://goo.gl/forms/Ne4DuptDoX">Vote!</a></h4>
            <hr>
            <h4><a target="_blank" href="http://goo.gl/forms/zYQ3l5lcId">Vote!</a></h4>
            <hr>
            <h4><a target="_blank" href="http://goo.gl/forms/a43Jgvq5XT">Vote!</a></h4>
            <hr>
            <h4><a target="_blank" href="http://goo.gl/forms/LxybXNfIPr">Vote!</a></h4>
            <hr>
            <h4><a target="_blank" href="http://goo.gl/forms/ycNLXxlUYj">Vote!</a></h4>
            <hr>
            <h4><a target="_blank" href="http://goo.gl/forms/ku4OOI3tzU">Vote!</a></h4>
            <hr>
            <h4><a target="_blank" href="http://goo.gl/forms/ZlQR6mDJuQ">Vote!</a></h4>
            <hr>
            <h4><a target="_blank" href="http://goo.gl/forms/mRhNwiiF4c">Vote!</a></h4>
            <hr>
            <h4><a target="_blank" href="http://goo.gl/forms/nF3C3SBEiy">Vote!</a></h4>
            <hr>
            <h4><a target="_blank" href="http://goo.gl/forms/YURCjmDMfr">Vote!</a></h4>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12" style="text-align:center; margin: 10px auto;">
            <a class="btn btn-primary btn-lg" href="/">
                Back Home
            </a>
        </div>
    </div>

</div>
