$(document).ready(function() {
	// for reply like and dislike
	$(".reply_like, .reply_dislike").click(function() {
		//alert("i am clicked");
		var id = this.id; // getting button id
		var split_id = id.split("-");
		var my_id = split_id[2];
		var user_id = split_id[3];
		var text = split_id[0];
		var reply_id = split_id[1];
		var type = 0;
		if(text == 'replyLike')
			type = 1;
		else
			type = 0;

		alert(my_id+"  "+user_id); 
		// ajax request
		$.ajax({
			url: 'like_unlike_reply.php',
			type: 'POST',
			data: {reply_id:reply_id,type:type,my_id:my_id,user_id:user_id},
			dataType: 'json',
			success: function(data) {
				var likes = data['likes'];
				var dislikes = data['dislikes'];
				//to check that data is being fetched or not	
				//alert("the likes are "+likes+" the dislikes are "+dislikes+" the reply_id is: "+reply_id);
				
				$("#label-like-"+reply_id).html("Likes: "+likes);
				$("#label-dislike-"+reply_id).html("DisLikes: "+dislikes);
			}

		});

	});
});