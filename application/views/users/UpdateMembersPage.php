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
                  <input class="form-control" name="userId" class="userId" value="<?php echo $member['userID']; ?>" placeholder="UserID" required>
                </div>
              </div>
              <div class="col-sm-4"> 
               <label class="control-label col-sm-4" for="mobile">Mobile:</label>
               <div class="col-sm-8">
                <input type="text" class="form-control" name="contact" class="mobile" value="<?php echo $member['contact']; ?>"placeholder="Mobile" required>
              </div>
            </div>
          </div> 
        </div><!-- End of First Row -->

        <div class="row secondRow">
          <label class="control-label col-sm-1"></label>
          <div class="col-sm-11">            
            <label class="control-label col-sm-2" id="emailLabel" for="email">Email:</label>
            <div class="col-sm-6 emailDiv">
             <input type="email" class="form-control" name="email" class="email" value="<?php echo $member['email']; ?>" placeholder="Email" required>
           </div>
         </div>
       </div><!-- End of second row -->

        <div class="row thirdRow"> 
         <label class="control-label col-sm-2"></label>
         <label class="control-label col-sm-3" id="foodLabel" for="food">Food Preference: </label>
         <div class="radio col-sm-2 food" required>
          <label><input type="radio" name="foodPref" value="Non-Vegeterians">Non-Vegeterians</label>
          <label><input type="radio" name="foodPref" value="Vegeterians">Vegeterians</label>
        </div>
      </div>
    </div><!-- End of duplicate class, end of md-10 nested fields-->
  </div> <!-- End of projectMemberDetails -->
  <?php //echo var_dump($data); ?>
</form>    <?php } ?>

  <div class="form-group">
    <label class="control-label col-sm-2" for="abstract">Abstract:</label>
    <div class="col-sm-10"> 
      <textarea class="form-control" name="abstract" rows="5" id="abstract" value="<?php echo $projectData['abstract']; ?>" placeholder="Abstract for your project"></textarea>
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
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



      $('form').each(function(index, value) {
        formData.push($(value).serializeArray());
      });

      console.log(formData);

      $.ajax({
            url: "/index.php/ajaxreceivers/editUserInformation",
            method: "POST",
            data: JSON.stringify(formData),
            dataType: "json"
        })

        .done(function(data) {
            if(data["success"] == true) {
                window.location.href="/index.php/Student/updateMembers/" + projectId;
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