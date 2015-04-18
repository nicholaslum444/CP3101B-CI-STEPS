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

		// make the project entry in the list
		var entry = '<span class = "projectTitleInput">'
		+ '<input type="text" class="form-control" placeholder="Project Title"'
		+ ' innerIndex="'
		+ -1
		+ '" projectID="'
		+ -1
		+ '" moduleCode="'
		+ moduleCode
		+ '" value="'
		+ moduleCode + "-" + index
		+ '"><button type="button" class="close deleteProjectBtn" aria-label="Close"'
		+ ' innerIndex="'
		+ -1
		+ '"><span aria-hidden="true">×</span></button></span>';

		$(".projectTitleFields").append(entry);
		bindDeleteBtn();

    	// $('.projectTitleFields').append('<span class = "projectTitleInput"><input type="text" class="form-control" innerIndex="-1" projectID="-1" moduleCode="'
    	// 	+ moduleCode + '" placeholder="projectTitle" value="'+ moduleCode +"-"+ index +'" >'+
		// 		'<button type="button" innerIndex = "-1" class="close deleteProjectBtn" aria-label="Close"><span aria-hidden="true">×</span></button></span>');

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
		var moduleCode = $('#syncRosterButton').attr("moduleCode");
		var moduleId = $('#syncRosterButton').attr("moduleId");
		$('#ivleSyncFa').addClass("fa-spin");
		console.log("sending " + moduleId);
		$.ajax({
			url: "/index.php/ajaxreceivers/SyncClassRoster",
			method: "POST",
			data: {"moduleId" : moduleId},
			dataType: "json"
		})

		.done(function(data) {
			while ($('#ivleSyncFa').hasClass("fa-spin")) {
				$('#ivleSyncFa').removeClass("fa-spin");
			}
			if(data["success"]) {
				//$('#registerModal').modal('hide');
				//location.reload();
				console.log(data);
				$('#syncFailedMsg').hide();
				$('#syncRosterButton').removeClass("btn-info");
				$('#syncRosterButton').removeClass("btn-warning").addClass("btn-success");
				$("#editClassSize").attr("value", data["classSize"]);
			}
			else {
				$('#syncRosterButton').removeClass("btn-info").addClass("btn-warning");
				$('#syncFailedMsg').show();
			}
		})

		.fail(function(data) {
			console.log(JSON.stringify(data));
			$('#syncRosterButton').removeClass("btn-primary").addClass("btn-warning");
			$('#syncFailedMsg').show();
		});
		e.preventDefault();
	});

	$('#editModuleForm').on('submit', function(e) {

		//GETTING MODULE CODE AND NUMBER OF PROJECTS
		var moduleCode = $("#editModalLabel").attr("moduleCode");
		var moduleId = $("#editModalLabel").attr("moduleid");
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

	// a convenience function to get the correct module
	function getModule(id) {
		for (var i = 0; i < _allModuleData.length; i++) {
			var module = _allModuleData[i];
			if (module["moduleID"] == id) {
				return module;
			}
		}
		return {};
	}

	//HANDLER TO DYNAMICALLY UPDATE EDIT MODULE FORM
	$(".editModuleBtn").on('click', function(e) {

		var moduleId = $(this).attr("moduleId");
		var module = getModule(moduleId);
		// console.log(module);

		//THE CLEANING PART
		$("#editClassSize").attr("value", "");
		$("#editNumProjects").attr("value", "");
		$("#editModuleDescription").val("-");
		$("#editProjectTitles").html("");
		$(".addProjectTitleBtn").attr("moduleCode", "");

		//THE EASY PART
		$("#editModalLabel").html("Editing: " + module["moduleCode"]);
		$("#editModalLabel").attr("moduleId", module["moduleID"]);
		$("#syncRosterButton").attr("moduleId", module["moduleID"]);
		$("#editModalLabel").attr("moduleCode", module["moduleCode"]);
		$("#editClassSize").attr("value", module["classSize"]);
		$("#editModuleDescription").val(module["moduleDescription"]);
		console.log("this");
		$(".addProjectTitleBtn").attr("moduleCode", module["moduleCode"]);

		//THE HARD PART
		var projects = module["projectList"];
		// console.log(projects);
		for (var i = 0; i < projects.length; i++) {
			var project = projects[i];
			var innerIndex = i + 1;
			// make the project entry in the list
			var entry = '<span class = "projectTitleInput">'
			+ '<input type="text" class="form-control" placeholder="Project Title"'
			+ ' innerIndex="'
			+ innerIndex
			+ '" projectID="'
			+ project["projectID"]
			+ '" moduleCode="'
			+ module["moduleCode"]
			+ '" value="'
			+ project["title"]
			+ '"><button type="button" class="close deleteProjectBtn" aria-label="Close"'
			+ ' innerIndex="'
			+ innerIndex
			+ '"><span aria-hidden="true">×</span></button></span>';

			$("#editProjectTitles").append(entry);

			bindDeleteBtn();
			// $("#editProjectTitles").append('<span class = "projectTitleInput"><input type="text" class="form-control" innerIndex="' + $(this).attr('innerIndex') +
			// 	'" projectID="' + $(this).attr('projectID') + '" moduleCode="' + $(this).attr('module') + '" placeholder="Project Title" value="' + value.innerHTML + '">'+
			// 	'<button type="button" innerIndex = "' + $(this).attr('innerIndex') + '" class="close deleteProjectBtn" aria-label="Close"><span aria-hidden="true">×</span></button></span>');
		}
	});
});

var _allModuleData = [];
