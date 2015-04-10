<div class="container spaceout">
  <div class="panel panel-primary">
    <div class="panel panel-heading">
      <h2 class="panel-title"><?php echo $projectData['title'] ?></h2>
    </div>
    <div class="panel panel-body">
      <label class="control-label col-sm-2 spaceout-align" for="abstract">Abstract:</label>
      <div class="col-sm-10 control-label spaceout"> 
        <textarea maxlength="2000" class="form-control" name="abstract" rows="5" id="abstract" value="" placeholder="Abstract for your project"><?php echo $projectData['abstract']; ?></textarea>
      </div>

      <label class="control-label col-sm-2 spaceout-align" for="poster">Poster link:</label>
      <div class="col-sm-10 control-label spaceout"> 
        <input class="form-control" name="poster" rows="5" id="poster" value="<?php echo $projectData['poster']; ?>" placeholder="URL for your poster"></textarea>
      </div>

      <label class="control-label col-sm-2 spaceout-align" for="video">Video link:</label>
      <div class="col-sm-10 spaceout"> 
        <input class="form-control" name="video" rows="5" id="video" value="<?php echo $projectData['video']; ?>" placeholder="URL for your video"></textarea>
      </div>
      <div class="col-sm-12">
        <h4 class="control-label subtitle" >Team Member</h4>
        <?php $odd = true; foreach($data as $member) { ?>
        
          <div class="projectMemberandDetails control-label col-md-5 col-sm-12" >

            <div class="row memberDetails panel panel-primary"> <!-- Duplicate starts here -->   
              <div class="panel-heading">
                <h5 id="name" class="panel-title" ><?php echo $member['name']; ?></h5>      
              </div>
            <input class="form-control" style="display:none" name="userId" class="userId" value="<?php echo $member['userID']; ?>" placeholder="UserID" required>
             
             <div class="panel-body">
              <form class="form-horizontal " role="form" id="updateMembersForm">
             <div class="row">
                <!-- <label class="control-label col-sm-2"></label> -->
                <label class="control-label col-sm-4 align-text-box"   for="email">Email:</label>
                <div class="control-label col-sm-8" >
                  <input id="email" type="email" class="form-control" name="email" class="email" value="<?php echo $member['email']; ?>" placeholder="Email" required>
                </div>
                
              </div><!-- End of First Row -->

              <div class="row">
                <!-- <label class="control-label col-sm-2"></label> -->
                <label class="control-label col-sm-4 align-text-box" for="mobile">Mobile:</label>
                <div class="control-label col-sm-8">
                  <input type="tel" class="form-control" name="contact" class="mobile" value="<?php echo $member['contact']; ?>"placeholder="Mobile" required>
                </div> 
              </div><!-- End of second row -->

              <div class="row">
                <!-- <label class="control-label col-sm-2"></label> -->
                <label class="control-label col-sm-4 align-text-box"  id="foodLabel"  for="food">Food Preference:</label>
                <div class="radio col-sm-8"  required>
                  <label><input type="radio" name="foodPref" <?php echo ($member['foodPref'] == 2)? "checked":""; ?> value="Non-Vegetarians">Non-Vegetarians</label>
                  <br>
                  <label><input type="radio" name="foodPref" <?php echo ($member['foodPref'] == 1)? "checked":""; ?> value="Vegetarians">Vegetarians</label>
                </div>
              </div><!-- End of second row -->
                </form> 
             </div>   
              
            </div><!-- End of duplicate class, end of md-10 nested fields-->
          </div> <!-- End of projectMemberDetails -->
          <?php //echo var_dump($data); ?>
        
          
      <?php if($odd){ echo "<div class='col-sm-2'></div>"; $odd = false;} else {$odd = true;}  } ?>
      </div>
    

    </div>

    
  </div>
    
    




  </div>

  <div class="form-group"> 
    <div id="submitUpdate">
      <button type="submit" class="btn btn-default" id="updateMembers-btn">Submit</button>
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