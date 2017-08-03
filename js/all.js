//pjesa poshte eshte sa per prove
$("document").ready(function(){
	$(".text-info").css("cursor" , "pointer");
	$(".menuja").hide();

	var i = 0;
	$(".text-info").click(function(){
		if(i%2==0){
			$(".menuja").slideDown(450);
			i++;
		}else{
			$(".menuja").slideUp(450);
			i++;
		}
	});

});