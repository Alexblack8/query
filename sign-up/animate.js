$(document).ready(function() {
	$(".outline").click(function() {
		let id = this.id;
		if(id == 'login') {
			$("form").animate({
				left: "440px",
				right: null
			});
			$("input[name*='name'],.text-area,#email").fadeOut("fast").slideUp("fast");
			$("#username").fadeIn("fast").slideDown("fast");
			$(".formButton").text("Login");
			$("#desktop_form").attr("action","../userlogin.php");
			$("#desktop_form").attr("novalidate","");
		}
		else if(id == 'signup') {
			$("form").animate({
				left: null,
				right: "440px"
			});
			$("input[name*='name'],.text-area,#email").fadeIn("fast").slideDown("fast");
			$(".formButton").text("Sign Up");
			$("#desktop_form").attr("action","../userregister.php");
			$("#desktop_form").removeAttr("novalidate");
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