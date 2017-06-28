$(document).ready(function() {
	
	// like and unlike click
	$(".like, .dislike").click(function() {
		var id = this.id; // getting button id
		var split_id = id.split("-");
		var user_id = split_id[3];
		var my_id = split_id[2];
		var text = split_id[0];
		var question_id = split_id[1];
		var type = 0;
		if(text == 'like')
			type = 1;
		else
			type = 0;

		//alert(my_id+'   '+user_id); 
		// ajax request
		$.ajax({
			url: 'like_unlike.php',
			type: 'POST',
			data: {question_id:question_id,type:type,user_id:user_id,my_id:my_id},
			dataType: 'json',
			success: function(data) {
				//alert("i am success");
				var likes = data['likes'];
				var dislikes = data['dislikes'];
				
				$("#showL"+question_id).html(likes);
				$("#showD"+question_id).html(dislikes);
			}

		});

	});

});