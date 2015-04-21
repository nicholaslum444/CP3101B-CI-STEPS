<div class="container site-container">

    <!-- strategy: have one original div then clone it onclick add btn -->
    <!-- the thing to be cloned -->
    <div class="form-group studentOption" id="studentSelect">
        <select class="form-control"
            name="memberIDs"
            <?php echo $freeze == 1 ? "disabled" : ""; ?>>
            <?php
            if(isset($data)){
                foreach($data as $student){
                    ?>
                    <option value="<?php echo $student['userID']; ?>">
                        <?php echo $student['name']; ?>
                    </option>
                    <?php
                }
            }?>
        </select>
        <button type="button"
            class="btn btn-danger deleteBtn">
            &times;
        </button>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <h2>Add Members</h2>
            <button class="btn btn-info addMemberBtn"
            <?php echo $freeze == 1 ? "disabled" : ""; ?>>Add</button>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 member-form-container">
            <form id="memberNameForm">
                <div class="memberField">
                    <p>Total team size: <strong><span id="teamSize"></span></strong></p>
                    <p>Use the "Add" button above to add more members.</p>
                    <!-- put the clones here -->
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <button class="btn btn-danger"
                onclick="javascript:window.history.back();">
                Cancel
            </button>
            <button type="button"
                class="btn btn-success"
                id="submitMembers-btn"
                <?php echo $freeze == 1 ? "disabled" : ""; ?>>
                CONFIRM TEAM
            </button>
        </div>
    </div>

    <!-- <div class = "row">
        <form id ="memberNameForm">
            <div class="members">
                <div class="memberField">
                    <div class="form-group studentOption col-xs-6">
                        <select class="form-control" name="memberIDs" style="width: 100%" <?php echo $freeze == 1 ? "disabled" : ""; ?>>
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
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <button type="button" class="btn btn-success pull-left col-md-1" style="margin-left: 20px" id="submitMembers-btn" <?php echo $freeze == 1 ? "disabled" : ""; ?>>Submit</button>
    </div> -->
</div><!-- Container -->


<script>
$(function() {
    var numMembers = 1;
    var counter = 0;

    function rebind() {
        $(".deleteBtn").unbind();
        $(".deleteBtn").click(function() {
            $(".studentOption[id='"+$(this).attr("id")+"']").remove();
            numMembers--;
            refreshTeamSize();
        });
        refreshTeamSize();
    }

    function refreshTeamSize() {
        $("#teamSize").html(numMembers + " (including you)");
    }

    $(".addMemberBtn").click(function(e) {
        counter++;
        numMembers++;
        $("#studentSelect button").attr("id", counter);
        var studentSelect = $("#studentSelect").clone();
        studentSelect.css("display","inherit");
        studentSelect.attr("id", counter);
        $(".memberField").append(studentSelect);
        rebind();
    }).click();
});

$(function(){
    var id = 1;

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
                window.location.href="/student/updateMembers/" + projectId;
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
