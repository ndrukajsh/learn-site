var punkt = 0;
var i=0;
//marrim nje funksion qe i ben shuffle el te nje array
function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}


function changeState(){
	$("#alt1").click(function(){
		punkt = punkt + 2;
		$("#alt1").addClass('btn-success disabled');
		$("#alt1").off('click');
		$("#alt2").off('click');
		$("#alt3").off('click');
		$("#alt4").off('click');
		flip();
	});

	$("#alt2").click(function(){
		$("#alt1").addClass('btn-success disabled');
		$("#alt2").addClass('btn-danger disabled');
		$("#alt3").addClass('btn-danger disabled');
		$("#alt4").addClass('btn-danger disabled');
		$("#alt1").off('click');
		$("#alt2").off('click');
		$("#alt3").off('click');
		$("#alt4").off('click');
		flip();
	});

	$("#alt3").click(function(){
		$("#alt1").addClass('btn-success disabled');
		$("#alt2").addClass('btn-danger disabled');
		$("#alt3").addClass('btn-danger disabled');
		$("#alt4").addClass('btn-danger disabled');
		$("#alt1").off('click');
		$("#alt2").off('click');
		$("#alt3").off('click');
		$("#alt4").off('click');
		flip();
	});

	$("#alt4").click(function(){
		$("#alt1").addClass('btn-success disabled');
		$("#alt2").addClass('btn-danger disabled');
		$("#alt3").addClass('btn-danger disabled');
		$("#alt4").addClass('btn-danger disabled');
		$("#alt1").off('click');
		$("#alt2").off('click');
		$("#alt3").off('click');
		$("#alt4").off('click');
		flip();
	});
}

function updateDiv(id, content) {
	document.getElementById(id).innerHTML = content;
}

$(document).ready(function(){
//marrim 5 array bosh ku secili do te kete te njejten gjatesi. El i pare te arr word eshte fjala ne anglisht, el i pare i 
//arr explanation eshte fjala ne gjermanisht e keshtu me rradhe
//arayt alt1, 2, 3 mbajne alternativat e gabuara
	var word = [];
	var explanation = [];
	var noun = [];
	var gender = [];
	var synonyms = []; 

	var alt1 = [];
	var alt2 = [];
	var alt3 = [];
//marrim nga db te gjithe fjalet qe ndodh brenda
	 $.get("../flashcard/flashcard.php", function(data, status){


	    // ketu behet ndarja ne rreshta dmth el i pare i arr eshte komplet rreshti i pare ne db, i dyti eshte rreshti i dyte e me rradhe
	    var arr = data.split("<br>");
	    // ketu behet ndarja e rreshtit dmth konsideroje arr si nje matrice, (aaray 2 dimensional) dhe rreshtin e pare arr[0] 
	    //po e ndajme qe te marrim vec e vec elementet psh el i pare i rreshtit te pare eshte fjala ne angl, 
	    //el i dyte i rreshtit te pare eshte e njejta fjale ne deutsch, el i trete i rreshtit te pare eshte gjinia etj, 
	    //pastaj kalojme te rreshti i dyte dmth te arr[1] dhe bejme te njejten gje!
	    

	    for(var j = 0; j<arr.length-1; j++){
	    	var elements = arr[j].split("#");
    		word.push(elements[0]);
    		explanation.push(elements[1]);
    		gender.push(elements[2]);
    		noun.push(elements[3]);
    		synonyms.push(elements[4]);
    		alt1.push(elements[5]);
    		alt2.push(elements[6]);
    		alt3.push(elements[7]);
	    }// ne fund te ciklit for kemi arrayt word, explanation, gender, noun, synonyms te gjithe te mbushur me vlera nga db

	    //ketu mbushim fillimisht elementet html me vlerat e para qe jane gjeneruar ne menyre random nga db, pastaj mbushja e tyre
	    // behet nga pjesa me poshte e js qe ka qene me perpara.
		$("#the-h").html(word[0]);
	    $("#the-p").html(explanation[0]);
	    $("#noun").html(noun[0]);
	    $("#gender").html(gender[0]);
	    $("#synonyms").html(synonyms[0]);

	    randDisplay = [
	    	'<button id="alt1" class="alt btn btn-default btn-lg">'+word[0]+'</button>',
	    	'<button id="alt2" class="alt btn btn-default btn-lg">'+alt1[0]+'</button>',
	    	'<button id="alt3" class="alt btn btn-default btn-lg">'+alt2[0]+'</button>',
	    	'<button id="alt4" class="alt btn btn-default btn-lg">'+alt3[0]+'</button>'
	    ];

	    shuffleArray(randDisplay);

		$('#buttons').html(randDisplay[0]+randDisplay[1]+randDisplay[2]+randDisplay[3]);

		changeState();
		flip();



	 });
 	

	function counter (step){
		if (word[i+step] !== undefined) {
			i+=step;
		} else {
			step < 0 ? i=word.length+1 : i=0;
		}
		randDisplay = [
	    	'<button id="alt1" class="alt btn btn-default btn-lg">'+word[i]+'</button>',
	    	'<button id="alt2" class="alt btn btn-default btn-lg">'+alt1[i]+'</button>',
	    	'<button id="alt3" class="alt btn btn-default btn-lg">'+alt2[i]+'</button>',
	    	'<button id="alt4" class="alt btn btn-default btn-lg">'+alt3[i]+'</button>'
	    ];

	    shuffleArray(randDisplay);

		$('#buttons').html(randDisplay[0]+randDisplay[1]+randDisplay[2]+randDisplay[3]);

		changeState();


		$("#the-h").html("<h1>Loading...</h1>");
		updateDiv('the-p',explanation[i]);
		setInterval(function() {
			$("#the-h").html("<h1>"+word[i-1]+"</h1>");
		}, 4000);
		updateDiv('noun', noun[i]);
		updateDiv('gender', gender[i]);
		updateDiv('synonyms', synonyms[i]);

	

	}


	var decos = document.getElementById('deco');
		decos.addEventListener('click', function() {
		if (i != 0) {counter(-1);}
		if ($("#flip3D").attr("flipped", "false")) {
			flip();
		}
	}, false);

	var incos = document.getElementById('inco');
		incos.addEventListener('click', function() {
		counter(+1);
		i = i + 1;
		if (i == 5) {
			$.post('../flcards_sp/punkt.php', {p:punkt}).done(function(data){

				window.location = "../rede_satzerg/indexRede_satzerg.php";
			});
		}
		if ($("#flip3D").attr("flipped", "false")) {
			flip();
		}
	}, false);


	// Keyboard Shortcut

	function leftArrowPressed() {
		decos.addEventListener('keydown', function() {
			if (i != 0) {counter(-1);}
			}, false);
	}

	function rightArrowPressed() {
		incos.addEventListener('keydown', function() {
			counter(+1);
		}, false);
	}

	document.onkeydown = function(evt) {
		evt = evt || window.event;
		switch (evt.keyCode) {
		  case 37:
		      leftArrowPressed();
		      break;
		  case 39:
		      rightArrowPressed();
		      break;
		}
	};





});

