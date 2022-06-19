$(document).ready(function(){
	$('#eye').click(function(){
		$(this).toggleClass('open');
		$(this).children('i').toggleClass('fas fa-eye-slash fas fa-eye');
		if($(this).hasClass('open')){
			//alert('Tpye text');
			$(this).prev().attr('type', 'text');
		}
		else $(this).prev().attr('type', 'password');
	});
});