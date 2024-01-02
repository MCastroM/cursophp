var url = 'http://proyecto-laravel.local';
window.addEventListener("load", function(){
	
	$('.btn-like').css('cursor', 'pointer');
	$('.btn-dislike').css('cursor','pointer');

	// Botón like
	function like(){
		$('.btn-like').unbind('click').click(function(){
			console.log('like');
			$(this).addClass('btn-dislike').removeClass('btn-like');
			$(this).attr('src', url+'/img/heart-red.png');

			$.ajax({
				url: url+'/like/'+$(this).data('id'),
				type: 'GET',
				success: function(response){
					if(response.like){
						console.log('Has dado like');	
					}else{
						console.log('Error al dar like');
					}
					
				}
			});

			dislake();
		});
	}
	like();

	// Botón dislike
	function dislake(){
		$('.btn-dislike').unbind('click').click(function(){
			console.log('dislike');
			$(this).addClass('btn-like').removeClass('btn-dislike');
			$(this).attr('src',url+'/img/heart-black.png');
			$.ajax({
				url: url+'/dislike/'+$(this).data('id'),
				type: 'GET',
				success: function(response){
					if(response.like){
						console.log('Has dado dislike');	
					}else{
						console.log('Error al dar dislike');
					}
					
				}
			});
			like();
		});
	}
	dislake();

	// BUSCADOR
	$('#buscador').submit(function(){
		$(this).attr('action',url+'/gente/'+$('#buscador #search').val());
	});
});