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
function getLoginUrl(url) {
	var loginUrl = "https://ivle.nus.edu.sg/api/login/?"
					+ "apikey=3bBGOIdtC1T2d7SXeQAO9&url="
					+ url + "index.php/IvleLogin";
}

