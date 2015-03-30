/* BEAUTIFUL FUNCTIONS BELOW */

function getLoginUrl(url) {
	var loginUrl = "https://ivle.nus.edu.sg/api/login/?"
					+ "apikey=3bBGOIdtC1T2d7SXeQAO9&url="
					+ url + "index.php/IvleLogin";
}

$(function() {
/*    $('.addProjectTitleBtn').click(function() {
    	//Dynamically generate buttons
    	$('.projectTitleFields').append('<input type="text" class="form-control inputField" placeholder="Project Title"style="display:block">');
    });

    $(".inputText").click(function() {
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

	$('#editClassSize').on('submit', function(e) {
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
	});	
});