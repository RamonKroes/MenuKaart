
var currentPage = null;

function animation(){
	    $("#content").bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){
	 	  $(this).removeClass("fadeIn");
		}).addClass("fadeIn");
	
}

function callNewPage(page){
		
		if(page!=currentPage) {
			animation();
			currentPage = page;
		}

		$.ajax({
			url:page
		}).done(function(response){
			$('#content').html(response);
		});
}

animation();

$(document).ready(function(){
	
	$(document).on('click', '.button1', function(){
		callNewPage("home.php");
	});

	$(document).on('click', '.button2', function(){
		callNewPage("panini.php");
	});

	$(document).on('click', '.button3', function(){
		callNewPage("broodje.php");
	});

});

