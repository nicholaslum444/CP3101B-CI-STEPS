<div class="container site-container">

    <!--
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
-->
<div class="row">
    <h1 style="text-align: center;">Looking for more STePS information?</h1>
</div>

<!--Form-->
<div class="row">
    <form id="searchForm">
        <div class="form-group">
            <!--Label-->
            <label for="searchInput" class="control-label"><h2>Search</h2></label>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                <!--Input-->
                <input id="searchInput" type="text" class="form-control" aria-label="Enter keywords..." autofocus>
                <!--Button-->
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default" type="button">Go</button>
                </span>
            </div>
        </div>
    </form>
</div>

<div id="results" class = "row">
</div>

<!-- carry out search if there is searchTerm found in the url. -->
<?php
if ($hasSearchTerm) {
    ?>
    <script>
    $(function() {
        var searchTerm = "<?php echo $searchTerm; ?>";
        $("#searchInput").val(searchTerm);
        $("#searchForm").submit();
    });
    </script>
    <?php
}
?>

<script>
// carrying out the actual search
$("#searchForm").on("submit", function(e) {
    e.preventDefault();
    if($("#searchInput").val() !== "") {
        $.get("/ajaxreceivers/Lookup",
        {"searchTerm":$("#searchInput").val()},
        function(data) {
            console.log(data.searchResults);
            var k = 0;
            $("#results").html("");

            var totalSearchResults = data.searchResults.project.length+data.searchResults.module.length+data.searchResults.user.length;
            var successOrNot, successMessage;
            if(totalSearchResults > 0) {
                var gotS = totalSearchResults > 1 ? "s" : ""
                successOrNot = "success";
                successMessage = "Showing " + totalSearchResults + " result" + gotS + " for \"" + $("#searchInput").val() + "\".";
            }

            else {
                successOrNot = "danger";
                successMessage = "No results found for \"" + $("#searchInput").val() + "\".";
            }

            $("#results").append("<p class='alert alert-" + successOrNot + "'>" + successMessage + "</p>");


            if(data.searchResults.project !== null && data.searchResults.project !== undefined) {
                for(i = 0; i < data.searchResults.project.length; i ++) {
                    $("#results").append("<div class='results" + k + "'><a href='/modules/view/" + data.searchResults.project[i].module + "#" + data.searchResults.project[i].projectID + "'><h4>"+data.searchResults.project[i].title+"</h4></a></div>");
                    $("#results").append("<div class='details" + k++ + "'>"+data.searchResults.project[i].abstract+"<br><hr><br></div>");
                }
            }

            if(data.searchResults.module !== null && data.searchResults.module !== undefined) {
                for(i = 0; i < data.searchResults.module.length; i ++) {
                    $("#results").append("<div class='results" + k + "'><a href='/modules/view/" + data.searchResults.module[i].moduleCode + "'><h4>"+data.searchResults.module[i].moduleCode+": " + data.searchResults.module[i].moduleName + "</h4></a></div>");
                    $("#results").append("<div class='details" + k++ + "'>"+data.searchResults.module[i].moduleDescription +"<br><hr><br></div>");
                }
            }

            if(data.searchResults.user !== null && data.searchResults.user !== undefined) {
                for(i = 0; i < data.searchResults.user.length; i ++) {
                    $("#results").append("<div class='results" + k + "'><a href='#'><h4>"+data.searchResults.user[i].name+"</h4></a></div>");
                    $("#results").append("<div class='details" + k + "'></div>");
                    if(data.searchResults.user[i].userType != 2) {
                      $(".details"+k).append("Projects taken: ");
                      for(var j = 0; j < data.searchResults.user[i].projects  .length; j++) {
                          $(".details"+k).append("<a href='/modules/view/" + data.searchResults.user[i].projects[j].moduleCode + "#" + data.searchResults.user[i].projects[j].projectID + "'>" + data.searchResults.user[i].projects[j].title);
                      }
                    }
                    $(".details"+k).append("<br><hr><br>");
                    k++;
                }
            }

            //$("#results").html(JSON.stringify(data));
        });
    }
});
</script>

</div>
