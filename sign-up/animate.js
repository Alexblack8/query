$(document).ready(function() {
	$(".outline").click(function() {
		let id = this.id;
		if(id == 'login') {
			$("form").animate({
				left: "440px",
				right: null
			},"swing");
			$("input[name*='Name']").fadeOut("fast").slideUp("fast");
			$(".formButton").text("Login");
		}
		else if(id == 'signup') {
			$("form").animate({
				left: null,
				right: "440px"
			},"swing");
			$("input[name*='Name']").fadeIn("fast").slideDown("fast");
			$(".formButton").text("Sign Up");
		}
	});

	$(".loginBtn").click(function() {
		$(".signup-part").slideUp('slow');
		$(".login-part").slideDown();
		$(".loginBtn, #member-info").hide();
	});

	$(".crtAcc").click(function() {
		$(".login-part").hide(10);
		$(".signup-part").slideDown();
		$(".loginBtn, #member-info").show();
	});
});