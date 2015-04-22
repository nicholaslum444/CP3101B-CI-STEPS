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

var tagBody = '(?:[^"\'>]|"[^"]*"|\'[^\']*\')*';

var tagOrComment = new RegExp(
    '<(?:'
    // Comment body.
    + '!--(?:(?:-*[^->])*--+|-?)'
    // Special "raw text" elements whose content should be elided.
    + '|script\\b' + tagBody + '>[\\s\\S]*?</script\\s*'
    + '|style\\b' + tagBody + '>[\\s\\S]*?</style\\s*'
    // Regular name
    + '|/?[a-z]'
    + tagBody
    + ')>',
    'gi');

function sanitize(input) {
  var oldHtml;
  do {
    oldHtml = input;
    input = input.replace(tagOrComment, '');
  } while (input !== oldHtml);
  return input.replace(/</g, '&lt;');
}


$(function() {

	/* This function helps to load unavailable-img when error exist on path to src
	   When the posters link are uploaded for real, we can use php instead to check for null */
	$(".module-thumb-img img").error(function(){
	  $(this)[0].src = "/img/unavailable-img.jpg";
	});

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


});
