

function orderModal(page){

		$.ajax({
			url:page
		}).done(function(response){
			$('.content').html(response);
		});
}


$(document).ready(function(){
	
	$(document).on('click', '.image', function(){
		orderModal("modal.php");
	});



});

