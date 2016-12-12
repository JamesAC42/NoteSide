$(document).ready(function(){

	$(".note-container, .signup-btn").mouseenter(function(){

		$(this).addClass("shadow");

	}).mouseleave(function(){

		$(this).removeClass("shadow");

	})

    /*
	$(".note-container").click(function() {

	  window.location = $(this).find(".note-action").find(".view-btn").attr("href"); 

	  return false;

	});*/

	$('.delete-btn').on('click', function () {

        return confirm('Are you sure?');

    });
    /*
    $('.note-title').mouseenter(function(){

    	$(this).animate({

    		scrollLeft: $(this).position().left

    	},"slow")

    }).mouseleave(function(){

    	$(this).animate({

    		scrollLeft: (-1 * $(this).position().left)

    	},"fast")

    })*/

})