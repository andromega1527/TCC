$(document).ready(function(e) {
	$('.btn-modal').click(function() {
		$('#modal').fadeIn(500);
	});

	$('.fechar, #modal').click(function(event) {
		if(event.target !== this) {
			return;
		}

		$('#modal').fadeOut(500);
	});
});