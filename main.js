$(document).ready(function(){
	$("#emailSend").click(function(){
		var body = "Name: " + $("#emailName").val() + "%0D%0AEmail: " + $("#emailEmail").val() + "%0D%0ABody: " + $("#emailBody").val();
		window.open('mailto:powerlabsystems@gmail.com?subject=Contact&body=' + body);
	});
});