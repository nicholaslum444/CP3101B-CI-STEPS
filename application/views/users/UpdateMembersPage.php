  <div class="container">
    <div class="form-group">
      <h2 class="control-label"><?php echo $projectData['title'] ?></h2>
    </div>
    <?php foreach($data as $member) { ?>
    <form class="form-horizontal" role="form" id="updateMembersForm">
      <div class="projectMemberandDetails">

        <div class="row memberDetails"> <!-- Duplicate starts here -->         
          <div class="row firstRow">
            <label class="control-label col-sm-2">Team Member</label>
            <div class="col-sm-10">
              <div class="col-sm-4"> 
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                  <h5 id="name"><?php echo $member['name']; ?></h5>
                </div>
              </div>
              <div class="col-sm-4"> 
                <label class="control-label col-sm-4" for="userId">User ID:</label>
                <div class="col-sm-8">
                  <input class="form-control" name="userId" class="userId" value="<?php echo $member['userID']; ?>" <?php echo $freeze == 1 ? "disabled" : ""; ?> placeholder="UserID" required>
                </div>
              </div>
              <div class="col-sm-4"> 
               <label class="control-label col-sm-4" for="mobile">Mobile:</label>
               <div class="col-sm-8">
                <input <?php echo $freeze == 1 ? "disabled" : ""; ?> type="text" class="form-control" name="contact" class="mobile" value="<?php echo $member['contact']; ?>" <?php echo $freeze == 1 ? "disabled" : ""; ?>placeholder="Mobile" required>
              </div>
            </div>
          </div> 
        </div><!-- End of First Row -->

        <div class="row secondRow">
          <label class="control-label col-sm-1"></label>
          <div class="col-sm-11">            
            <label class="control-label col-sm-2" id="emailLabel" for="email">Email:</label>
            <div class="col-sm-6 emailDiv">
             <input type="email" class="form-control" name="email" class="email" value="<?php echo $member['email']; ?>" placeholder="Email" <?php echo $freeze == 1 ? "disabled" : ""; ?> required>
           </div>
         </div>
       </div><!-- End of second row -->

        <div class="row thirdRow"> 
         <label class="control-label col-sm-2"></label>
         <label class="control-label col-sm-3" id="foodLabel" for="food">Food Preference: </label>
         <div class="radio col-sm-2 food" required>
          <label><input type="radio" name="foodPref" <?php echo ($member['foodPref'] == 2)? "checked":""; ?> <?php echo $freeze == 1 ? "disabled" : ""; ?> value="Non-Vegetarians">Non-Vegetarians</label>
          <label><input type="radio" name="foodPref" <?php echo ($member['foodPref'] == 1)? "checked":""; ?> <?php echo $freeze == 1 ? "disabled" : ""; ?> value="Vegetarians">Vegetarians</label>
        </div>
      </div>
    </div><!-- End of duplicate class, end of md-10 nested fields-->
  </div> <!-- End of projectMemberDetails -->
  <?php //echo var_dump($data); ?>
</form>    <?php } ?>

  <div class="form-group">
    <label class="control-label col-sm-2" for="abstract">Abstract:</label>
    <div class="col-sm-10"> 
      <textarea <?php echo $freeze == 1 ? "disabled" : ""; ?> class="form-control" name="abstract" rows="5" id="abstract" value="" placeholder="Abstract for your project"><?php echo $projectData['abstract']; ?></textarea>
    </div>

    <label class="control-label col-sm-2" for="poster">Poster:</label>
    <div class="col-sm-10"> 
      <input <?php echo $freeze == 1 ? "disabled" : ""; ?> class="form-control" name="poster" rows="5" id="poster" value="<?php echo $projectData['poster']; ?>" placeholder="URL for your poster"></textarea>
    </div>

    <label class="control-label col-sm-2" for="video">Video:</label>
    <div class="col-sm-10"> 
      <input <?php echo $freeze == 1 ? "disabled" : ""; ?> class="form-control" name="video" rows="5" id="video" value="<?php echo $projectData['video']; ?>" placeholder="URL for your video"></textarea>
    </div>



  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button <?php echo $freeze == 1 ? "disabled" : ""; ?> type="submit" class="btn btn-default" id="updateMembers-btn">Submit</button>
    </div>
  </div>
</div>

<script>
  $(function(){


    $('#updateMembers-btn').click(function(e) {
      var membersData = $('#updateMembersForm').serializeArray();        
      //console.log(membersData);
      var formData = [];
      //prepare data
      var studentForms = $('form');
      //console.log(studentForms);

      var doneOnce = false;

      $('form').each(function(index, value) {
        formData.push($(value).serializeArray());
      });

      console.log(formData);

      var users = {
        "users" : formData
      }

        $.ajax({
            url: "/index.php/ajaxreceivers/editUserInformation",
            method: "POST",
            data: users,
            dataType: "json"
        })

        .done(function(data) {
            if(data["success"] == true) {
              if(!doneOnce) 
                  doneOnce = true;
              else
                window.location.href="/index.php/Student/updateMembers/" + <?php echo $projectData['projectId'] ?>;
              console.log("success");
            }
            else {
                console.log("error " + JSON.stringify(data));
            }
        })
        .fail(function(data) {
            console.log("failed" + JSON.stringify(data));
        });

      var projectData = { 
                           "project" : {
                                     "projectId" : <?php echo $projectData['projectId'] ?>,
                                     "poster" : $("#poster").val(),
                                     "video" : $("#video").val(),
                                     "abstract" : $("#abstract").val()
                                     }
                          }

      $.ajax({
            url: "/index.php/ajaxreceivers/editProject",
            method: "POST",
            data: projectData,
            dataType: "json"
        })

        .done(function(data) {
            if(data["success"] == true) {
              if(!doneOnce) 
                  doneOnce = true;
              else
                window.location.href="/index.php/Student/updateMembers/" + <?php echo $projectData['projectId'] ?>;
              console.log("success");
            }
            else {
                console.log("error " + JSON.stringify(data));
            }
        })
        .fail(function(data) {
            console.log("failed" + JSON.stringify(data));
        });

      e.preventDefault();
    });
  });

</script>