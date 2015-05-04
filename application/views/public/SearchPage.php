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
          <input id="searchInput" type="text" class="form-control" aria-label="Enter keywords...">
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

<script>
  $("#searchForm").on("submit", function(e) {
    e.preventDefault();
    if($("#searchInput").val() !== "") {
      $.get("/ajaxreceivers/Lookup",
      {"searchTerm":$("#searchInput").val()},
      function(data) {
        console.log(data.searchResults);
        var i;
        $("#results").html("");

        var totalSearchResults = data.searchResults.project.length+data.searchResults.module.length+data.searchResults.user.length;
        var successOrNot, successMessage;
        if(totalSearchResults > 0) {
          successOrNot = "success";
          successMessage = "Showing " + totalSearchResults + " results.";
        }

        else {
          successOrNot = "danger";
          successMessage = "No results found.";
        }
        console.log(totalSearchResults);
        $("#results").append("<p class='alert alert-" + successOrNot + "'>" + successMessage + "</p>");


        if(data.searchResults.project !== null && data.searchResults.project !== undefined) {
          for(i = 0; i < data.searchResults.project.length; i ++) {
            $("#results").append("<div class='results" + i + "'><a href='#'><h4>"+data.searchResults.project[i].title+"</h4></a></div>");
            $("#results").append("<div class='details" + i + "'>"+data.searchResults.project[i].abstract+"<br><br></div>");
          }
        }

        if(data.searchResults.module !== null && data.searchResults.module !== undefined) {
          for(i; i < data.searchResults.module.length; i ++) {
            $("#results").append("<div class='results" + i + "'><a href='#'><h4>"+data.searchResults.module[i].moduleCode+": " + data.searchResults.module[i].moduleName + "</h4></a></div>");
            $("#results").append("<div class='details" + i + "'>"+data.searchResults.module[i].moduleDescription +"<br><br></div>");
          }
        }

        if(data.searchResults.user !== null && data.searchResults.user !== undefined) {
          for(i; i < data.searchResults.user.length; i ++) {
            $("#results").append("<div class='results" + i + "'><a href='#'><h4>"+data.searchResults.user[i].name+"</h4></a></div>");
            $("#results").append("<div class='details" + i + "'></div>");
            $(".details"+i).append("Projects taken: ");
            for(var j = 0; j < data.searchResults.user[i].projects  .length; j++) {
              console.log($(".details"+i));
              $(".details"+i).append(data.searchResults.user[i].projects[j].title);
            }
            $(".details"+i).append("<br>");
            $(".details"+i).append("Email: " + data.searchResults.user[i].email);
            $(".details"+i).append("<br><br>");
          }
        }

        //$("#results").html(JSON.stringify(data));
      });
    }
  });
</script>

</div>
