$(document).ready(function() {
	// for reply like and dislike
	$(".reply_like, .reply_dislike").click(function() {
<<<<<<< HEAD
		alert("i am clicked");
=======
		//alert("i am clicked");
>>>>>>> 2c7acaacdfa605cf689696dde30878bc9f00f38f
		var id = this.id; // getting button id
		var split_id = id.split("-");
		var user_id = split_id[2];
		var text = split_id[0];
		var reply_id = split_id[1];
		var type = 0;
		if(text == 'replyLike')
			type = 1;
		else
			type = 0;

<<<<<<< HEAD
		alert("the text is: "+text+"the user_id is: "+user_id+"the reply_id is: "+reply_id+"the type is: "+type); 
=======
		//alert("the text is: "+text+"the user_id is: "+user_id+"the reply_id is: "+reply_id+"the type is: "+type); 
>>>>>>> 2c7acaacdfa605cf689696dde30878bc9f00f38f
		// ajax request
		$.ajax({
			url: 'like_unlike_reply.php',
			type: 'POST',
			data: {reply_id:reply_id,type:type,user_id:user_id},
			dataType: 'json',
			success: function(data) {
				var likes = data['likes'];
				var dislikes = data['dislikes'];
				//to check that data is being fetched or not	
<<<<<<< HEAD
				alert("the likes are "+likes+" the dislikes are "+dislikes+" the reply_id is: "+reply_id);
				
				$("#label-like-"+reply_id).html(likes);
				$("#label-dislike-"+reply_id).html(dislikes);
=======
				//alert("the likes are "+likes+" the dislikes are "+dislikes+" the reply_id is: "+reply_id);
				
				$("#label-like-"+reply_id).html("Likes: "+likes);
				$("#label-dislike-"+reply_id).html("DisLikes: "+dislikes);
>>>>>>> 2c7acaacdfa605cf689696dde30878bc9f00f38f
			}

		});

	});
});