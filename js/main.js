/* BEAUTIFUL FUNCTIONS BELOW */

function getLoginUrl(url) {
	var loginUrl = "https://ivle.nus.edu.sg/api/login/?"
					+ "apikey=3bBGOIdtC1T2d7SXeQAO9&url="
					+ url + "index.php/IvleLogin";
}

$(function() {
    $('.addProjectTitleBtn').click(function() {
    	//Dynamically generate buttons

    	$('.projectTitleFields').append('<input type="text" class="form-control" innerIndex="-1" projectID="-1" moduleCode="' + $('.addProjectTitleBtn').attr('moduleCode') + '" placeholder="projectTitle" value="">');
    });

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

    /*$(".inputText").click(function() {
    	//Turns from words to fields
    	$(this).parent().closest('.field-group').children('.inputText').css("display", "none");
    	$(this).parent().closest('.field-group').children('.glyphicon-pencil').css("display", "none");
    	$(this).closest('.field-group').children('form').children('.inputField').css("display", "block");
    	$(this).closest('.field-group').children('.glyphicon-ok').css("display", "block");
    });

    $(".inputText").hover(function() {
    	//Glyphicons appear on hover
    	$(this).siblings(".glyphicon-pencil").css("display","block");
    }, function() {
    	$(this).siblings(".glyphicon-pencil").css("display","none");
    });

    $(".field-list").click(function() {
    	$(this).children(".inputText").css("display", "none");
    	$(this).children(".inputField").css("display", "block");
    });*/
});


/* FUNCTIONAL FUNCTIONS BELOW */
$(function() {
	$('#registerModuleForm').on('submit',function (e) {
		$.ajax({
			url: "/index.php/ajaxreceivers/registermodule",
			method: "POST",
			data: {"moduleCode" : $("#moduleCode").val(), "moduleName" : $("#moduleName").val()},
			dataType: "json"
		})

		.done(function(data) {
			if(data["success"] == true) {
				$('#registerModal').modal('hide');
				location.reload();
			}
			else {
				$('#registerModuleForm').addClass("has-error");
			}
		})

		.fail(function(data) {
			alert(JSON.stringify(data));
		});
		e.preventDefault();
	});

	$('#editModuleForm').on('submit', function(e) {

		//GETTING MODULE CODE AND NUMBER OF PROJECTS
		var moduleCode = $("#editModalLabel").html();
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

		//CHECKING NUMBER OF PROJECT
/*		if(editedNumProjects == prevNumProjects) {
			editedNumProjects = null;
		}*/

		//CHECKING DESCRIPTION OF MODULE
		if(editedModuleDescription == prevModuleDescription) {
			editedModuleDescription = null;
		}

		//CHECKING PROJECT TITLES
		var currentValueOfProjectTitle;
		var editedValueOfProjectTitle;

/*		for(var i = 0; i < allProjectTitles.length; i++) {
			currentValueOfProjectTitle = $(".projectTitle[module="+moduleCode+"][projectID=" + (i+1) + "]").html();
			editedValueOfProjectTitle = allProjectTitles[i].value;
			//IF SAME PUSH NULL
			if(currentValueOfProjectTitle == editedValueOfProjectTitle) {
				editedProjectTitles.push(null);
			}
			//IF DIFFERENT PUSH NEW TITLE
			else {
				if(editedValueOfProjectTitle != "" && editedValueOfProjectTitle != null) {
					editedProjectTitles.push(editedValueOfProjectTitle);
				}
			}
		}*/
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
			"editedClassSize" : editedClassSize,
			"editedNumProjects" : editedNumProjects,
			"editedModuleDescription" : editedModuleDescription,
			"editedExistingProjectTitles" : editedExistingProjectTitles,
			"editedNewProjectTitles" : editedNewProjectTitles
		};

		console.log(editFormData);

		// 4=(form)=}=> Server
		$.ajax({
			url: "/index.php/ajaxreceivers/editmodule",
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
		.complete(function(data) {
			$('#editModal').modal('hide');
			location.reload();
		});

		e.preventDefault();
	});

	//HANDLER TO DYNAMICALLY UPDATE EDIT MODULE FORM
	$(".editModuleBtn").on('click', function(e) {

		var moduleCode = $(this).attr("module");


		//THE CLEANING PART
		$("#editClassSize").attr("value", "");
		$("#editNumProjects").attr("value", "");
		$("#editModuleDescription").html("");
		$("#editProjectTitles").html("");
		$(".addProjectTitleBtn").attr("moduleCode", "");

		//THE EASY PART
		$("#editModalLabel").html(moduleCode);
		$("#editClassSize").attr("value", $(".classSizeText[module="+moduleCode+"]").html());
		//$("#editNumProjects").attr("value", $(".numProjectsText[module="+moduleCode+"]").html());
		$("#editModuleDescription").html($(".moduleDescriptionText[module="+moduleCode+"]").html());
		$(".addProjectTitleBtn").attr("moduleCode", moduleCode);

		//THE HARD PART
		var projects = $(".projectTitles[module="+moduleCode+"] .projectTitle");
		$.each(projects, function(index, value) {
			$("#editProjectTitles").append('<input type="text" class="form-control" innerIndex="' + $(this).attr('innerIndex') + 
				'" projectID="' + $(this).attr('projectID') + '" moduleCode="' + $(this).attr('module') + '" placeholder="Project Title" value="' + value.innerHTML + '">');
		});
	});

/*	$('#editClassSize').on('submit', function(e) {
		editedClassSize = $("#classSizeField").val();
		prevClassSize = $("#classSizeText").html();
		alert(editedClassSize != prevClassSize);
		if(editedClassSize != prevClassSize) {
			if(editedClassSize != null) {
				$.ajax({
					url: "/index.php/ajaxreceivers/editmodule",
					method: "POST",
					data: {"classSize" : $("#classSizeField").val()},
					dataType: "json"
				})

				.done(function(data) {
					if(data["success"] == true) {
						$('#editClassSize').css('display', 'none');
						$('#classSizeField').html(editedClassSize);
						$('#classSizeField').css('display', 'initial');
					}
					else {
						$('#editClassSize').addClass("has-error");
					}
				})

				.fail(function(data) {
					alert(JSON.stringify(data));
				});
				e.preventDefault();
			}
			else {
				console.log("Empty class size")
			}
		}
		else {
			console.log("Different class size")
		}
	});

	$('#editNumProjects').on('submit', function(e) {
		editedNumProjects = $("#numProjectsField").val();
		prevNumProjects = $("#numProjectsText").html();
		if(editedNumProjects != prevNumProjects && editedNumProjects != null) {
			$.ajax({
				url: "/index.php/ajaxreceivers/editmodule",
				method: "POST",
				data: {"numProjects" : $("#numProjectsField").val()},
				dataType: "json"
			})

			.done(function(data) {
				if(data["success"] == true) {
					$('#editNumProjects').css('display', 'none');
					$('#numProjectsField').html(editedNumProjects);
					$('#numProjectsField').css('display', 'initial');
				}
				else {
					$('#editNumProjects').addClass("has-error");
				}
			})

			.fail(function(data) {
				alert(JSON.stringify(data));
			});
			e.preventDefault();
		}
	});

	$('#editModuleDescription').on('submit', function(e) {
		editedModuleDescription = $("#moduleDescriptionField").val();
		prevModuleDescription = $("#moduleDescriptionText").html();
		if(editedModuleDescription != prevModuleDescription && editedModuleDescription != null
				&& editedModuleDescription != "") {
			$.ajax({
				url: "/index.php/ajaxreceivers/editmodule",
				method: "POST",
				data: {"moduleDescription" : $("#moduleDescriptionField").val()},
				dataType: "json"
			})

			.done(function(data) {
				if(data["success"] == true) {
					$('#editModuleDescription').css('display', 'none');
					$('#moduleDescriptionField').html(editedModuleDescription);
					$('#moduleDescriptionField').css('display', 'initial');
				}
				else {
					$('#editModuleDescription').addClass("has-error");
				}
			})

			.fail(function(data) {
				alert(JSON.stringify(data));
			});
			e.preventDefault();
		}

	});

	$('#editProjectTitle').on('submit', function(e) {
		var formData = $('#editProjectTitle').serializeArray();
		var sendData = [];
		$.each(formData, function(index, value) {
			var editedTitle = value;
			var prevTitle = $("#projectTitle"+(index+1)).html();
			if(editedTitle != prevTitle && editedTitle != null && editedTitle != "") {
				sendData.push({titleNumber : editedTitle});
			}
		});
		$.ajax({
			url: "/index.php/ajaxreceivers/editmodule",
			method: "POST",
			data: {"projectTitles" : sendData},
			dataType: "json"
		})

		.done(function(data) {
			if(data["success"] == true) {
				$('#editProjectTitle').css('display', 'none');
				$.each(sendData, function(index, value) {
					$("#projectTitle"+(index+1)).html(value.titleNumber);
				});
				$('#projectTitles').css('display', 'initial');
			}
		})
	});	*/
});
