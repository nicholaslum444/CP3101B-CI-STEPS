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
        <h4 class="control-label subtitle" >Team Members </h4>
        <?php $odd = true; 
              if(isset($data) && count($data) > 0) {
                foreach($data as $member) { ?>
                  <div class="overall-member-div  control-label col-md-5 col-sm-12" who="<?php echo $member['userID'] ?>">
                    <div class="projectMemberandDetails" who="<?php echo $member['userID'] ?>" >
                      <div class="row memberDetails panel panel-primary"> <!-- Duplicate starts here -->   
                        <div class="panel-heading member-header" who="<?php echo $member['userID'] ?>">
                          <h5 id="name" class="panel-title" ><?php echo $member['name']; ?></h5>
                          <?php 
                          //PHP LOCK TO REMOVE THE BUTTON WHEN ITS SET TO LOCKDOWN
                          if($freeze == 0 && $canRemoveMember == 1) { 
                            echo '<button aria-label="Close" class="deleteMember btn btn-danger" style="display:none; position: relative; top:-23px; left: 10px; padding:0px 5px 0px 5px;"  who="'.$member['userID'].'">×</button>';  
                          }
                          ?>
                        </div>

                       
                       <div class="panel-body">
                        <form class="form-horizontal " role="form" id="updateMembersForm">
                         <!-- hidden field of ID -->
                         <input class="form-control" style="display:none" name="userId" class="userId" value="<?php echo $member['userID']; ?>" placeholder="UserID" required>
                        <div class="row">
                          <!-- <label class="control-label col-sm-2"></label> -->
                          <label class="control-label col-sm-4 align-text-box"   for="email">Email:</label>
                          <div class="control-label col-sm-8" >
                            <input <?php echo $freeze == 1 ? "disabled" : ""; ?> id="email" type="email" class="form-control" name="email" class="email" value="<?php echo $member['email']; ?>" placeholder="Email" required>
                          </div>
                          
                        </div><!-- End of First Row -->

                        <div class="row">
                          <!-- <label class="control-label col-sm-2"></label> -->
                          <label class="control-label col-sm-4 align-text-box" for="mobile">Mobile:</label>
                          <div class="control-label col-sm-8">
                            <input <?php echo $freeze == 1 ? "disabled" : ""; ?> type="tel" class="form-control" name="contact" class="mobile" value="<?php echo $member['contact']; ?>"placeholder="Mobile" required>
                          </div> 
                        </div><!-- End of second row -->

                        <div class="row">
                          <!-- <label class="control-label col-sm-2"></label> -->
                          <label class="control-label col-sm-4 align-text-box"  id="foodLabel"  for="food">Food Preference:</label>
                          <div <?php echo $freeze == 1 ? "disabled" : ""; ?> class="radio col-sm-8"  required>
                            <label><input type="radio" name="foodPref" <?php echo ($member['foodPref'] == 2)? "checked":""; ?> value="Non-Vegetarians">Non-Vegetarians</label>
                            <br>
                            <label><input type="radio" name="foodPref" <?php echo ($member['foodPref'] == 1)? "checked":""; ?> value="Vegetarians">Vegetarians</label>
                          </div>
                        </div><!-- End of second row -->
                          </form> 
                       </div>   
                        
                      </div><!-- End of duplicate class, end of md-10 nested fields-->
                    </div> <!-- End of projectMemberDetails -->
                </div>
          <?php //echo var_dump($data); ?>
      <?php if($odd){ echo "<div class='col-sm-2'></div>"; $odd = false;} else {$odd = true;}  
          }//For the forloop 
        }//For the If ?>
      </div>
    

    </div>

    
  </div>
  </div>

  <div class="form-group"> 
    <div id="submitUpdate">
      <button <?php echo $freeze == 1 ? "disabled" : ""; ?> type="submit" class="btn btn-default" id="updateMembers-btn">Submit</button>
    </div>
  </div>
    
</div>
 
<script>
  $(function(){

    //USE PHP TO LOCK THESE FUNCTIONS WHEN USER IS A STUDENT
    <?php if($canRemoveMember == 1) { echo '
    var deleteMembers = [];

    $(".member-header").hover(
      function() {
        $(".deleteMember[who=\'"+$(this).attr("who")+"\']").css("display", "initial");  
      }, 
      function() {
        $(".deleteMember[who=\'"+$(this).attr("who")+"\']").css("display", "none");  
      }
    );

    $(".deleteMember").click(function() {
      var userId = $(this).attr("who");
      deleteMembers.push(userId);
      $(".projectMemberandDetails[who=\'"+userId+"\']").css("opacity", "0.5");
      $(".projectMemberandDetails[who=\'"+userId+"\'] :input").attr("disabled", true);
      $(".overall-member-div[who=\'"+userId+"\']").append(\'<div style="position: absolute; top:45%; left: 45%; opacity:1; padding: 15px 15px 15px 15 px; border-radius: 20px" class="btn btn-success undo" who="\'+userId+\'">Undo<div>\');
      $(".undo[who=\'"+userId+"\']").click(function() {
        var index = -1;
        for(var i = 0; i < deleteMembers.length; i++) {
          if(deleteMembers[i] === userId) {
            index = i;
          }
        }
        if(index >= 0) {
          deleteMembers.splice(index, 1);
        }
        $(".projectMemberandDetails[who=\'"+userId+"\']").css("opacity", "1");
        $(".projectMemberandDetails[who=\'"+userId+"\'] :input").attr("disabled", false);
        $(".undo[who=\'"+userId+"\']").remove();
        console.log(deleteMembers);
      });
      console.log(deleteMembers);
    });

    //USE PHP TO LOCK THESE FUNCTIONS WHEN USER IS A STUDENT
    '; } ?>

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

      //console.log(formData);
      //sanitize input
      for(var i=0;i<formData.length;i++) {
        for(var j=0; j<formData[i].length; j++) {
          //console.log(formData[i][j]);
          if(formData[i][j].name == 'email' || formData[i][j].name == 'contact') {
            formData[i][j].value = sanitize(formData[i][j].value);
          }
        }
      }

      var users = {
        "users" : formData
      }

      //console.log(users);

        $.ajax({
            url: "/index.php/ajaxreceivers/editUserInformation",
            method: "POST",
            data: users,
            dataType: "json"
        })

        .done(function(data) {
            if(data["success"] == true) {
              if(!doneOnce) { 
                  doneOnce = true;
              } else {
                //window.location.href="/index.php/Student/updateMembers/" + <?php echo $projectData['projectId'] ?>;
              }
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
                                     "poster" : sanitize($("#poster").val()),
                                     "video" : sanitize($("#video").val()),
                                     "abstract" : sanitize($("#abstract").val())
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
              else {
                //window.location.href="/index.php/Student/updateMembers/" + <?php echo $projectData['projectId'] ?>;
              }
              console.log("success");
            }
            else {
                console.log("error " + JSON.stringify(data));
            }
        })
        .fail(function(data) {
            console.log("failed" + JSON.stringify(data));
        });

      //AJAX FOR DELETING MEMBERS
      //LOCK WITH PHP ALSO
      <?php if($canRemoveMember == 1) { echo '
      if(deleteMembers instanceof Array && deleteMembers.length != 0) {
        $.ajax({
          url: "/index.php/ajaxreceivers/dropstudentfromproject",
          method: "POST",
          dataType: "json",
          data: {
            "members" : deleteMembers,
            "projectId" : '.$projectData["projectId"].'
          }
        })
      }
      ';} ?>


      e.preventDefault();
      <?php 
      if($isLecturer) {
        echo 'window.location.href="/index.php/Lecturer/console";';
      }
      else {
        echo 'window.location.href="/index.php/Student/console";';
      }
      ?>
    });
  });
</script>