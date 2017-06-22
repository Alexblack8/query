$(document).ready(function() {
	
	// like and unlike click
	$(".like").click(function() {
		var id = this.id; // getting button id
		var split_id = id.split("-");

		var text = split_id[0];
		var question_id = split_id[1];
		// ajax request
		$.ajax({
			url: 'like_unlike.php',
			type: 'POST',
			data: {question_id:question_id},
			dataType: 'json',
			success: function(data) {
				var likes = data['likes'];
				var dislikes = data['dislikes'];
				$("#showL"+question_id).html(likes);
				$("#showD"+question_id).html(dislikes);
			}

		});

	});

});