function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}

var rand = [];
var i = 0;
var punkt = 0;

$(document).ready(function(){
	//te divi qe ka klasen clock, me metoden load marrin resultatin nga fili uhr.php
	//uhr.php merr 5 rreshta random nga db
	$('.clock').load("../uhr/uhr.php", function(result){
		//split sipas karakterit te $ na jep nje array qe ka si elemente rreshtat dmth rreshti
		//i pare(res[0]) permban rreshtin e pare qe eshte marre nga db, (res[1]) permban
		//rreshtin e dyte etj etj
		var res = result.split("$");
		//res[0] eshte rreshti i pare dhe kur bejme split sipas char | marrim nje array me 3
		//elemente qe si el i pare eshte pathi i imazhit, si el i dyte eshte nje string
		//qe permban pergj e gabuara dhe si el i trete (pra comp[2]) eshte pergj e sakte
		var comp = res[0].split("|");
		//comp[1] eshte stringu qe permban pergj e gabuara te cilat ndahen me char #
		//duke perdor split marrim nje arr me 3 el (array qe i kam vu emrin error)
		//ku secili element i arr error eshte pergj e gabuar
		var error = comp[1].split("#");

		//marrim array rand me poshte qe permban stringjet qe do paraqiten, pra 4 butona ku
		//3 kane pergj te gabuar kurse 1 pergj e sakte.
		//Nqs nuk perdorim funksionin shuffle me poshte, sa here do kalojme te pyetja tjeter
		//pergj e sakte del gjithmone butoni i katert. Duke i bere shuffle arr rand, pergj
		//e sakte del ne pozicione random!
		rand = [
			'<button type="button" class="btn btn-default btn-lg btn-block e1">'+error[0]+'</button>',
			'<button type="button" class="btn btn-default btn-lg btn-block e1">'+error[1]+'</button>',
			'<button type="button" class="btn btn-default btn-lg btn-block e1">'+error[2]+'</button>',
			'<button type="button" class="btn btn-default btn-lg btn-block correct">'+comp[2]+'</button>'
		];

		shuffleArray(rand);
		//mbushim divin me class clock me html ku, el nga arr rand jane alternativat
		//kurse comp[0] eshte fotoja perkatese
		$('.clock').html(comp[0]+"<br />"+rand[0]+rand[1]+rand[2]+rand[3]);
		//nqs shtypet butoni me pergj e sakte rrisim piket, e bejme jeshile pergj e sakte dhe 
		//te kuqe pergj jo te sakta dhe me metoden off bejme qe butonat te mos klikohen
		//si dhe bejme te dukshem butonin next qe te kaloje te pytja tjeter. Butoni next 
		//fillimisht eshte i fshehur
		$(".correct").click(function(){
			punkt = punkt + 2;
			$(".correct").addClass('btn-success disabled');
			$(".e1").addClass('btn-danger disabled');
			$(".e1").off('click');
			$(".correct").off('click');
			$(".next").css("visibility", "visible");
		});
		//njelloj si kur shtypet butoni i sakte vtm se ktu nuk i japim pike
		$(".e1").click(function(){
			$(".correct").addClass('btn-success disabled');
			$(".e1").addClass('btn-danger disabled');
			$(".e1").off('click');
			$(".correct").off('click');
			$(".next").css("visibility", "visible");
		});

		//kur shtypet next-i kalojme te pytja tjeter dhe perserisim te njejtin proces si me siper
		//ama marrim comp=res[i].split ku res[i] tregon pytjen ku jemi pra pytja 2, 3, 4,5 
		//dhe sa here shtypet next rritet i me 1 pra kalojme te pytja tjeter derisa te
		//shqyrtojm 5 pytje.
		$(".next").click(function(){
			i = i+1;
			//nqs i = 5 pra jane shqyrtu 5 pytje, dergome me metoden post piket te fili punkt.php
			//i cili i fut ne db si dhe i ben update progresit total dhe e cojme userin te loja
			//tjeter me window.location
			if (i == 5) {
				$.post("../uhr/punkt.php", {p:punkt}, function(result){
					window.location = "../satzeargenzung/indexSatzeargenzung.php";
				});

			}

			comp = res[i].split("|");
			error = comp[1].split("#");

			rand = [
				'<button type="button" class="btn btn-default btn-lg btn-block e1">'+error[0]+'</button>',
				'<button type="button" class="btn btn-default btn-lg btn-block e1">'+error[1]+'</button>',
				'<button type="button" class="btn btn-default btn-lg btn-block e1">'+error[2]+'</button>',
				'<button type="button" class="btn btn-default btn-lg btn-block correct">'+comp[2]+'</button>'
			];

			shuffleArray(rand);

			$('.clock').html(comp[0]+"<br />"+rand[0]+rand[1]+rand[2]+rand[3]);
			$(".next").css("visibility", "hidden");

			$(".correct").click(function(){
				punkt = punkt + 2;
				$(".correct").addClass('btn-success disabled');
				$(".e1").addClass('btn-danger disabled');
				$(".e1").off('click');
				$(".correct").off('click');
				$(".next").css("visibility", "visible");
			});

			$(".e1").click(function(){
				$(".correct").addClass('btn-success disabled');
				$(".e1").addClass('btn-danger disabled');
				$(".e1").off('click');
				$(".correct").off('click');
				$(".next").css("visibility", "visible");
			});

		});

	

	});
});