<div class="container">

    <div class="row">
        <h2>Select your Team Members</h2>
    </div>
    <div class = "row">
        <form id ="memberNameForm">
            <div class="members">
                <div class="memberField">
                    <div class="col-md-7 form-inline" style="padding: 5px; 0px; 5px; 0px">
                        <div class="form-group studentOption col-md-10">
                            <select class="form-control" name="memberIDs" style="width: 100%" <?php echo $freeze == 1 ? "disabled" : ""; ?>>
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

                        <button class="btn btn-default addMemberBtn col-md-2" <?php echo $freeze == 1 ? "disabled" : ""; ?>>Add</button>
                    </div>

                </div>
            </div> 
        </form>
    </div>
    <div class="row">
        <button type="button" class="btn btn-success pull-left col-md-1" style="margin-left: 20px" id="submitMembers-btn" <?php echo $freeze == 1 ? "disabled" : ""; ?>>Submit</button>
    </div>
</div><!-- Container -->


<script>

    function rebind() {
        $(".deleteBtn").unbind();
        $(".deleteBtn").click(function() {
            $(".appended[id='"+$(this).attr("id")+"']").remove();
        });
    }
    $(function(){
        var id = 1;

        $('.addMemberBtn').click(function(e) {
            //Dynamically generate dropdowns
            $('.memberField').append('<div id = "'+id+'" class="col-md-7 form-inline appended" style="padding: 5px; 0px; 5px; 0px"><div class="form-group studentOption col-md-10"><select class="form-control" name="memberIDs" style="width:100%"><option value="" default selected>Select Member</option><?php if(isset($data)){foreach($data as $student){?><option value="<?php echo $student["userID"]; ?>"><?php echo $student["name"]; ?></option><?php }}?></select></div><button id = "'+id+'" class="btn btn-danger col-md-2 deleteBtn" type="button">Delete</button></div></div></div>');
            rebind();
            id++;
            e.preventDefault();
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

            for(var i = 0; i < membersData.length; i++) {

                if(membersData[i].value == "") {
                    $(".studentOption").addClass("has-error");
                    return;
                }

                for(var j = i; j < membersData.length; j++) {
                    if(i!= j) {    
                        if(membersData[i].value == membersData[j].value) {
                            $(".studentOption").addClass("has-error");
                            return;
                        }
                    }
                } 
            }


            $(".studentOption").removeClass("has-error");
            
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