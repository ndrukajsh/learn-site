function hiddenWord(a){
	//marrim nje variabel poz1 qe eshte nje nr random ndermjet 0 dhe gjatesise se fjales
	var poz1 =Math.floor(Math.random() * a.length);

	//marrim nje variabel str ku do te ruhen germat e fjales te cilat nuk do te fshihen
	//e deklarojme ketu ne menyre qe te mund ta perdorim dhe me poshte dhe jo vtm brenda ciklit for me poshte, nqs e deklarojme 
	//brenda ciklit for, scope i variables nuk eshte jashte ciklit dhe nuk e perdorim dot me teper!
	var str = "";

	for (var i = 0; i < a.length; i++) {
		if (i != poz1) {
			//nqs nuk kemi ardhur te pozicioni ku do fshehim karakterin e fjales, shtojme karakteret te variabli str
			str	+= a[i];
		}else if(i == poz1){
			//nqs kemi ardhur te pozicioni ku do fshehim karakterin e fjales, i ngisim vargur te karaktereve nje input-text
			str +='<input type="text" id="latterone" pattern="[A-Za-z]{1}" maxlength="1" class="form-control wort-form" style="width: 20px; text-align:center; display:inline; padding: 0;">';
		}
	}
	//brenda divit me class bild vendosim html-ne me poshte, pra fillimisht res[0] qe eshte imazhi pastaj variablin str
	return str+"|"+poz1;		
}
var k = 0;
var count = 0;
$(document).ready(function(){
//me metoden load me poshte komunikojme me filin wort.php, fili php merr 
//fjalen dhe pergjigjia qe vjen
//(result qe eshte parameter te funksioni me poshte) kalon si parameter te funksioni anonim!

	$(".bild").load("../wortanpassung/wort.php", function(result){
		//rezultati(pergjigjia) qe marrim nga fili php eshte nje string qe permban karakterin '|'
		var res = result.split("|");

		//perdoret metoda split qe ndan stringun qe kemi kudo qe has karakterin '|', stringu ndahet ne 5 pjese
		//ajo qe marrim eshte nje array me 5 elemente, ku secili el permban nje fjale qe e kalojme si parameter tek funksioni hiddenWord
		//qe te marrim nje karakter nga fjala dhe ne vend te atij te vendosim nje input-text qe e ben funksioni.
		//k-ja luan rolin e nje variable qe bredh ne array dhe ben te mundur te kapim fjalet e arrayt me rradhe!
		//Te njejten logjike do perdorim edhe me poshte per te kaluar nga njera fjale te tjetra!
		var r = hiddenWord(res[k]);
		//funksioni na kthen si rezultat nje string qe e ndajme sipas char '|' ku resultString[0] edhe fjala me char
		//te fshehur kurse resultString[2] eshte pozicioni i input-textit
		var resultString = r.split("|");
		var poz1 = parseInt(resultString[1]);
	
		//brenda divit me class bild vendosim html-ne me poshte pra permbajtjen e variablit str
		$(".bild").html(resultString[0]);

		

		$(".check0").off("click").click(function(){
			
			//marrim karakterin qe duhet per te plotesu fjalen nga fusha e teksit qe ka klasen wort-form dhe i
			//bejme direkt kontrollin
			//nqs inputi qe eshte futur tek input-text eshte i njejte me shkronjen qe duhet
			if ($(".wort-form").val() == res[k][poz1]){
				//nqs pergjigjia eshte e sakte rrisim countin. Variabli count do sherbeje per te numru piket ne fund
				count++;
				//te divi me klas btn-ctrl me metoden .html i ndryshojme permbajtjen html qe ka dhe i veme pjesen me
				//poshte si dhe butonin next e bejme te dukshem duke qene se by default eshte i fshehur
				$(".btn-ctrl").html('<button type="button" id="submit" value="Submit" class="btn btn-success disabled btn-lg check"><span class="glyphicon glyphicon-ok"></span></button>');
				$(".next").css("visibility", "visible");
			}else{
				//perndryshe nga butoni qe ka klasen check heqim klasen btn-default dhe i veme klasen btn-danger si dhe ndryshjom
				//glyphin qe ka brenda brenda paragrafit me klasen result i nxjerrim pergjigjen e sakte
				//dhe butonin next per te kalu te fjala tjeter
				$(".btn-ctrl").html('<button type="button" id="submit" value="Submit" class="btn btn-danger disabled btn-lg check"><span class="glyphicon glyphicon-remove"></span></button>');
				$(".result").html("The missing letter is: <b>"+res[k][poz1]+"</b><br/>");
				$(".next").css("visibility", "visible");				
			}


		});

			$(".next").off("click").click(function(){
				//rrisim k me 1 per te kalu te imazhi i fjales tjeter
				k = k + 1;
				// kontrollojme nqs k < 5 dmth nqs nuk kemi arritur ne fund te 5 fjaleve te zgjedhura
				if (k<5) {
					$(".next").css("visibility", "hidden");
					$(".result").html('');
					$(".check").removeClass("btn-success btn-danger disabled");
					$(".check").addClass("btn-default");
					$(".check").html('<span class="glyphicon glyphicon-ok"></span>');

					var nextWort = hiddenWord(res[k]);

					var rstring = nextWort.split("|");

					poz1 = parseInt(rstring[1]);
					
					$(".bild").html(rstring[0]);
					
					

					$(".check").off("click").click(function(){
						
						//marrim karakterin qe duhet per te plotesu fjalen nga fusha e teksit qe ka klsen wort-form
						//nqs  inputi qe eshte futur tek input-text eshte i njejte me shkronjen qe duhet
						if ($(".wort-form").val() == res[k][poz1]) {
							count++;
							//nga butoni qe ka klasen check heqim klasen btn-default dhe i veme klasen btn-success si dhe shtojme butonin next
							//brenda paragrafit me klasen result per te kalu te fjala tjeter
							$(".check").removeClass("btn-default");
							$(".check").addClass("btn-success disabled");
							$(".next").css("visibility", "visible");							
						}else{
							//perndryshe nga butoni qe ka klasen check heqim klasen btn-default dhe 
							//i veme klasen btn-danger si dhe ndryshjom
							//glyphin qe ka brenda brenda paragrafit me klasen result i nxjerrim pergjigjen e sakte
							//dhe butonin next per te kalu te fjala tjeter
							$(".check").removeClass("btn-default");
							$(".check").addClass("btn-danger disabled");
							$(".check").html('<span class="glyphicon glyphicon-remove"></span>');
							$(".result").html("The missing letter is: <b>"+res[k][poz1]+"</b><br/>");
							$(".next").css("visibility", "visible");

						}

					});

				}else{

					//ketu jemi ne fund te fjaleve, dmth loja ka mbaru. Llogarisim piket dhe i dergojme
					//te fili punkt.php qe keto pike qe useri ka mbledh ti ruajme ne db
					count = count*2;
					//me poshte percaktojme qe variabli count te cohet te punkt.php qe te futet ne db
					$.post("../wortanpassung/punkt.php", {p : count});
					//ne fund e cojme te loja tjeter
					alert("Game Over!!!!");
				}


			});
		

	});

});
