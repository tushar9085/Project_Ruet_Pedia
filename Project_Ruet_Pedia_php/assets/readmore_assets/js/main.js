
$(document).ready(function(){
	$(".read").click(function(){
		$(this).prev().toggle();
		$(this).siblings('.dots').toggle();
		if($(this).text()=='read the post'){
			$(this).text('hide');
		}
		else{
			$(this).text('read the post');
		}
	});
});