<div class="container">

    <!--  STEP ONE: CHOOSE YOUR TEAM MEMBERS -->
    <div class="row">
        <h2>Select your Team Members</h2>
    </div>
    
    <div class="memberField">
        <button class="btn btn-default addMemberBtn">Add</button>
        <div class="row">  <!-- Loop through all -->   
            <div class="col-md-6">
                <div class="form-group">
                    <label for="projectSelect"></label>
                    <select class="form-control" name="studentName"><!-- Add Name1 Name2 --> <!--Loop through all the untaken classmates in the module--> 
                        <option value="" default selected>Select Member</option>
                        <?php 
                        if(isset($data)){
                            echo "data is here";
                            foreach($data as $student){
                            ?>
                            <option><?php echo $student['name']; ?>
                            </option>
                        <?php 
                            }
                        }?>
                    </select>
                </div>
            </div><!--End md-6-->
        </div>
    </div>

    <div class="row">
        <button type="button" class="btn btn-success" id="next-btn" data-module="">Next</button>
    </div>


    <!-- STEP 2: FILL IN INFORMATION, DONE BY AJAX -->
    <div class="row">     
        <div class="col-md-6">

        </div><!--End md-6-->
    </div>

</div><!-- Container -->

<!-- moduleCode and projecTitle, i have to keep it till the next page-->

<script>

$('.addMemberBtn').click(function() {
        //Dynamically generate buttons
        $('.memberField').append('<div class="row"><div class="col-md-6"><div class="form-group"><label for="projectSelect"></label><select class="form-control" name="studentName"><option value="" default selected>Select Member</option><?php if(isset($data)){echo "data is here";foreach($data as $student){?><option><?php echo $student["name"]; ?></option><?php }}?></select></div></div></div>');
    });

</script>