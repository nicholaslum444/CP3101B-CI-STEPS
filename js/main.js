
	/*$(function() {
	$( "#fakeLogin" ).click(function() {
		var apiUrl = "https://ivle.nus.edu.sg/api/login/?apikey=3bBGOIdtC1T2d7SXeQAO9&url=";
		var callbackUrl = "http://localhost:8080/index.php/ivleauth/";
		openInNewWindow(apiUrl + callbackUrl);
	});
});

function openInNewWindow(url) {
	var newWindow = window.open(url,'name','height=500,width=700');
	if (window.focus) {
		newWindow.focus();
		return newWindow;
	}
	return false;
}
*/

/* BEAUTIFUL FUNCTIONS BELOW */

function getLoginUrl(url) {
	var loginUrl = "https://ivle.nus.edu.sg/api/login/?"
					+ "apikey=3bBGOIdtC1T2d7SXeQAO9&url="
					+ url + "index.php/IvleLogin";
}

$(function() {
    $('.addProjectTitleBtn').click(function() {
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
    	$(this).siblings(".glyphicon-pencil").css("display","block");
    }, function() {
    	$(this).siblings(".glyphicon-pencil").css("display","none");
    });

    $(".field-list").click(function() {
    	$(this).children(".inputText").css("display", "none");
    	$(this).children(".inputField").css("display", "block");
    });
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
});

function addToModuleList(moduleName) {	
	$("#moduleList").append("<div class=\"panel panel-default\"><div class=\"panel-body\"><a href=\"/index.php/lecturer/" + moduleName + "\">" + moduleName + "</a></div></div>");
}