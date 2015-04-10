<div class="container">

    <div class="row">
        <h2>Select your Team Members</h2>
    </div>
    <div class="row">
        <div class="col-lg-7"></div>
        <button class="btn btn-default addMemberBtn">Add</button>
    </div>

    <form id ="memberNameForm">
        <div class="members">
            <div class="memberField">
                <div class="row">  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectSelect"></label>
                            <select class="form-control" name="memberIDs">
                                <option value="" default selected>Select Member</option>
                                <?php 
                                if(isset($data)){
                                    foreach($data as $student){
                                        ?>
                                        <option value="<?php echo $student['userID']; ?>"><?php echo $student['name']; ?>
                                        </option>
                                        <?php 
                                    }
                                }?>
                            </select>
                        </div>
                    </div><!--End md-6-->
                </div>
            </div>
        </div>  

        <div class="row">
            <div class="col-lg-7"></div>
            <button type="button" class="btn btn-success" id="submitMembers-btn">Submit</button>
        </div>
    </form>
</div><!-- Container -->


<script>
    $(function(){
        $('.addMemberBtn').click(function() {
        //Dynamically generate dropdowns
        $('.members').append('<div class="memberField"><div class="row"><div class="col-md-6"><div class="form-group"><label for="projectSelect"></label><select class="form-control" name="memberIDs"><option value="" default selected>Select Member</option><?php if(isset($data)){foreach($data as $student){?><option value="<?php echo $student["userID"]; ?>"><?php echo $student["name"]; ?></option><?php }}?></select></div></div></div></div>');
    });

        $('#submitMembers-btn').click(function(e) {
            var membersData = $('#memberNameForm').serializeArray();        
            var projectId = <?php echo $pId; ?>;

            //Array of student IDs
            var arrMemberIDs = [];
            for(var i = 0; i < membersData.length; i++) {
                arrMemberIDs.push(membersData[i].value); 
            }
            console.log(JSON.stringify(arrMemberIDs));

            
            var jsonArr ={
                "projectId": projectId,
                "memberIDs": arrMemberIDs
            };

            console.log(jsonArr);

            $.ajax({
                url: "/index.php/ajaxreceivers/registerProject",
                method: "POST",
                data: jsonArr,
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