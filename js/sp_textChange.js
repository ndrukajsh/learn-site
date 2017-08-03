$(document).ready(function(){



//marrim 5 array bosh ku secili do te kete te njejten gjatesi. El i pare te arr word eshte fjala ne anglisht, el i pare i 
//arr explanation eshte fjala ne gjermanisht e keshtu me rradhe
	var word = [];
	var explanation = [];
	var noun = [];
	var gender = [];
	var synonyms = []; 
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
	    }// ne fund te ciklit for kemi arrayt word, explanation, gender, noun, synonyms te gjithe te mbushur me vlera nga db

	    //ketu mbushim fillimisht elementet html me vlerat e para qe jane gjeneruar ne menyre random nga db, pastaj mbushja e tyre
	    // behet nga pjesa me poshte e js qe ka qene me perpara.
		$("#the-h").html(word[0]);
	    $("#the-p").html(explanation[0]);
	    $("#noun").html(noun[0]);
	    $("#gender").html(gender[0]);
	    $("#synonyms").html(synonyms[0]);

	 });

	 var i=0;

	function updateDiv(id, content) {
		document.getElementById(id).innerHTML = content;
	}
 	

	function counter (step){
		if (word[i+step] !== undefined) {
			i+=step;
		} else {
			step < 0 ? i=word.length+1 : i=1;
		}

		updateDiv('the-h',word[i]);
		updateDiv('the-p',explanation[i]);
		updateDiv('noun', noun[i]);
		updateDiv('gender', gender[i]);
		updateDiv('synonyms', synonyms[i]);
	}


	var decos = document.getElementById('deco');
		decos.addEventListener('click', function() {
			if (i != 0) {counter(-1);}
		}, false);

	var incos = document.getElementById('inco');
		incos.addEventListener('click', function() {
		counter(+1);
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