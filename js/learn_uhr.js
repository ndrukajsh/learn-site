var i = 0;

var time_h = [
	"eins Uhr",
	"zwei Uhr",
	"drei Uhr",
	"vier Uhr",
	"f&uuml;nf Uhr",
	"sechs Uhr",
	"sieben Uhr",
	"acht Uhr",
	"neun Uhr",
	"zehn Uhr",
	"elf Uhr",
	"z&ouml;lf Uhr",
	"dreizehn Uhr",
	"vierzehn Uhr",
	"f&uuml;nfzehn Uhr",
	"sechszehn Uhr",
	"siebzehn Uhr",
	"achtzehn Uhr",
	"neunzehn Uhr",
	"zwanzig Uhr",
	"einundzwanzig  Uhr",
	"zweiundzwanzig Uhr",
	"dreiundzwanzig Uhr",
	"vierundzwanzig Uhr",
];


var time_m = [
"eins",
"zwei",
"drei",
"vier",
"f&uuml;nf",
"sechs",
"sieben",
"acht",
"neun",
"zehn",
"elf",
"z&ouml;lf",
"dreizehn",
"vierzehn",
"f&uuml;nfzehn",
"sechszehn",
"siebzehn",
"achtzehn",
"neunzehn",
"zwanzig",
"einundzwanzig",
"zweiundzwanzig",
"dreiundzwanzig",
"vierundzwanzig",
"f&uuml;nfundzwanzig",
"sechsundzwanzig",
"siebenundzwanzig",
"achtundzwanzig",
"neunundzwanzig",
"drei&szlig;ig"

];


$(document).ready(function(){
	$(".uph").click(function(){
		i++;
		if (i<10) {
			$("#hours").html("0"+i);
		}else{
			if (i<=24) {
				$("#hours").html(i);
			}else{
				i=24;
			}
		}
	});


	$(".downh").click(function(){
		i--;
		if (i<0) {
			i = 0;
		}else{
			if (i<10) {
				$("#hours").html("0"+i);
			}else{
				$("#hours").html(i);
			}
		}
	});


	var y = 0

	$(".upmin").click(function(){
		y++;
		if (y<10) {
			$("#min").html("0"+y);
		}else{
			if (y<=59) {
				$("#min").html(y);
			}else{
				y=59;
			}
		}
	});


	$(".downmin").click(function(){
		y--;
		if (y<0) {
			y = 0;
		}else{
			if (y<10) {
				$("#min").html("0"+y);
			}else{
				$("#min").html(y);
			}
		}
	});



	$("#confirm").click(function(){
		var h = $("#hours").text();
		var m = $("#min").text();

		var int_h = parseInt(h);
		var int_m = parseInt(m);

		if (int_m > 30) {
			var remain = 60 - int_m;
			$(".result").html("Es ist "+time_m[remain-1]+" vor "+time_h[int_h]);
		}else if(int_m < 30 && int_m > 0){
			$(".result").html("Es ist "+time_m[int_m-1]+" nach "+time_h[int_h-1]);
		}else if(int_m == 30){
			$(".result").html("Es ist halb nach "+time_h[int_h-1]);
		}else if(int_m == 0 && int_h == 0){
			$(".result").html("Es ist 0 Uhr");
		}else if(int_m == 0){
			$(".result").html("Es ist "+time_h[int_h-1]);
		}



	});



});
