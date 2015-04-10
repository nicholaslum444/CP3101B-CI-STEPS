var deletedProjects = [];

function bindDeleteBtn() {
	$(".deleteProjectBtn").unbind();
	$(".deleteProjectBtn").on('click', function(e) {
		var innerIndex = $(this).attr('innerIndex');
		if(innerIndex == -1) {
			$(this).parent().remove();
		}
		else {
			var projectID = $("input[innerIndex="+innerIndex+"]").attr("projectID");
			deletedProjects.push(projectID);
			$(this).parent().remove();
		}
	});
}

$(function() {

	// for header vvvvvvvvvvvvvvvvvvvvvvvvv

	$("#loginBtnStudent").bind("click", function() {
		if ($("#studentIframeContainer #studentIframe").length === 0) {
			$("#studentIframeContainer").append(studentIframe);
		}
	});

	$("#loginBtnLecturer").bind("click", function() {
		if ($("#lecturerIframeContainer #lecturerIframe").length === 0) {
			$("#lecturerIframeContainer").append(lecturerIframe);
		}
	});

	// end header ^^^^^^^^^^^^^^^^^^^^^^^^^


	// for lecturer page vvvvvvvvvvvvvvvvvvvvvvvvvvvv

	$('.addProjectTitleBtn').click(function() {
    	//Dynamically generate buttons
    	var index = $("#editProjectTitles input").length+1;
    	var moduleCode = $('.addProjectTitleBtn').attr('moduleCode');
    	$('.projectTitleFields').append('<span class = "projectTitleInput"><input type="text" class="form-control" innerIndex="-1" projectID="-1" moduleCode="'
    		+ moduleCode + '" placeholder="projectTitle" value="'+ moduleCode +"-"+ index +'">'+
				'<button type="button" innerIndex = "-1" class="close deleteProjectBtn" aria-label="Close"><span aria-hidden="true">×</span></button></span>');
    	bindDeleteBtn();
    });

	$('#registerModuleForm').on('submit',function (e) {
		$.ajax({
			url: "/index.php/ajaxreceivers/RegisterModule",
			method: "POST",
			data: {"moduleId" : $("#moduleCode option:selected").attr("value")},
			dataType: "json"
		})

		.done(function(data) {
			if(data["success"] == true) {
				$('#registerModal').modal('hide');
				location.reload();
			}
			else {
	            if (data["error"] == "MODULE_EXISTS") {
	                $("#alr-reg").show();
	            }
				$('#registerModuleForm').addClass("has-error");
			}
		})

		.fail(function(data) {
			console.log(JSON.stringify(data));
		});
		e.preventDefault();
	});

	$('#syncRosterButton').click(function (e) {
		var moduleCode = $("#editModalLabel").html();
		var moduleId = $("#editButton" + moduleCode).attr("moduleId");
		console.log("sending" + moduleId);
		$.ajax({
			url: "/index.php/ajaxreceivers/SyncClassRoster",
			method: "POST",
			data: {"moduleId" : moduleId},
			dataType: "json"
		})

		.done(function(data) {
			if(data["success"] == true) {
				$('#registerModal').modal('hide');
				location.reload();
			}
			else {
				$('#syncRosterButton').removeClass("btn-primary").addClass("btn-warning");
			}
		})

		.fail(function(data) {
			alert(JSON.stringify(data));
			$('#syncRosterButton').removeClass("btn-primary").addClass("btn-warning");
		});
		e.preventDefault();
	});

	$('#editModuleForm').on('submit', function(e) {

		//GETTING MODULE CODE AND NUMBER OF PROJECTS
		var moduleCode = $("#editModalLabel").attr("moduleCode");
		var moduleId = $("#editModalLabel").attr("moduleId");
		var numberOfProjects = $(".projectTitles[module="+moduleCode+"]").attr("numOfProject");

		//GETTING ALL EDITED INPUTS
		var editedClassSize = $("#editClassSize").val();
		//var editedNumProjects = $("#editNumProjects").val();
		var editedModuleDescription = $("#editModuleDescription").val();
		var allProjectTitles = $("#editProjectTitles input");
		var editedExistingProjectTitles = new Array();
		var editedNewProjectTitles = new Array();

		//GETTING ALL ORIGINAL INPUTS
		var prevClassSize = $(".classSizeText[module="+moduleCode+"]").html();
		var prevNumProjects = $(".numProjectsText[module="+moduleCode+"]").html();
		var prevModuleDescription = $(".moduleDescriptionText[module="+moduleCode+"]").html();
		var prevProjectTitles = $(".projectTitles[module="+moduleCode+"] .projectTitle");

		//DISCLAIMER: NULL MEANS DO NOT CHANGE WHEN SENT TO THE RECEIVER

		//CHECKING CLASS SIZE
		if(editedClassSize == prevClassSize) {
			editedClassSize = null;
		}

		//CHECKING DESCRIPTION OF MODULE
		if(editedModuleDescription == prevModuleDescription) {
			editedModuleDescription = null;
		}

		//CHECKING PROJECT TITLES
		var currentValueOfProjectTitle;
		var editedValueOfProjectTitle;

		$.each(allProjectTitles, function(index, newInput) {
			editedProjectInnerIndex = $(this).attr('innerIndex');
			editedValueOfProjectTitle = newInput.value;
			//Edited from current title
			if(editedProjectInnerIndex != -1) {
				//Get original title
				currentValueOfProjectTitle = $(".projectTitles[module="+moduleCode+"] .projectTitle[innerIndex=" +editedProjectInnerIndex+"]").html();
				//If not null and different
				if(editedValueOfProjectTitle != "" && editedValueOfProjectTitle != currentValueOfProjectTitle) {
					editedProjectID = $(this).attr('projectID');
					editedExistingProjectTitles.push([editedProjectID, editedValueOfProjectTitle]);
				}
			}
			//New value
			else {
				if(editedValueOfProjectTitle != "") {
					editedNewProjectTitles.push(editedValueOfProjectTitle);
				}
			}
		});

		if(editedExistingProjectTitles.length == 0) {
			editedExistingProjectTitles = null;
		}

		if(editedNewProjectTitles.length == 0) {
			editedNewProjectTitles = null;
		}

		//PREPARING THE FORM TO SEND TO THE RECEIVER
		var editFormData =
		{
			"moduleCode" : moduleCode,
			"moduleId" : moduleId,
			"editedClassSize" : editedClassSize,
			//"editedNumProjects" : editedNumProjects,
			"editedModuleDescription" : editedModuleDescription,
			"editedExistingProjectTitles" : editedExistingProjectTitles,
			"editedNewProjectTitles" : editedNewProjectTitles,
			"deletedProjects" : deletedProjects
		};

		console.log(editFormData);

		// 4=(form)=}=> Server
		$.ajax({
			url: "/index.php/ajaxreceivers/EditModule",
			method: "POST",
			data: editFormData,
			dataType: "json"
		})
		.done(function(data) {
			// Client <={=(result)=4
			if(data["success"] == true) {
				$('#editModal').modal('hide');
				location.reload();
			}
			else {
				alert("Adding error");
				$('#editModuleForm').addClass("has-error");
			}
		})
		//Temporary work around until Mun Aw patches the database
/*		.complete(function(data) {
			$('#editModal').modal('hide');
			location.reload();
		});*/

		e.preventDefault();
	});

	//HANDLER TO DYNAMICALLY UPDATE EDIT MODULE FORM
	$(".editModuleBtn").on('click', function(e) {

		var moduleCode = $(this).attr("module");
		var moduleId = $(this).attr("moduleid");
		var moduleTitle = $("h3[moduleid="+moduleId+"]").html();
		//THE CLEANING PART
		$("#editClassSize").attr("value", "");
		$("#editNumProjects").attr("value", "");
		$("#editModuleDescription").html("");
		$("#editProjectTitles").html("");
		$(".addProjectTitleBtn").attr("moduleCode", "");

		//THE EASY PART
		$("#editModalLabel").html(moduleTitle);
		$("#editModalLabel").attr("moduleId", moduleId);
		$("#editModalLabel").attr("moduleCode", moduleCode);
		$("#editClassSize").attr("value", $(".classSizeText[module="+moduleCode+"]").html());
		//$("#editNumProjects").attr("value", $(".numProjectsText[module="+moduleCode+"]").html());
		$("#editModuleDescription").html($(".moduleDescriptionText[module="+moduleCode+"]").html());
		$(".addProjectTitleBtn").attr("moduleCode", moduleCode);

		//THE HARD PART
		var projects = $(".projectTitles[module="+moduleCode+"] .projectTitle");
		$.each(projects, function(index, value) {
			$("#editProjectTitles").append('<span class = "projectTitleInput"><input type="text" class="form-control" innerIndex="' + $(this).attr('innerIndex') +
				'" projectID="' + $(this).attr('projectID') + '" moduleCode="' + $(this).attr('module') + '" placeholder="Project Title" value="' + value.innerHTML + '">'+
				'<button type="button" innerIndex = "' + $(this).attr('innerIndex') + '" class="close deleteProjectBtn" aria-label="Close"><span aria-hidden="true">×</span></button></span>');
			bindDeleteBtn();
		});
	});
});
