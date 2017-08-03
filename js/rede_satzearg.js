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
//variabli qe do te ruaje piket
var punkt = 0;
$(document).ready(function(){


    //marrim nga fili php 5 fjali qe ndodhen ne db, nr i fjalive mund te ndryshohet sa te duam, mjafton te ndryshojme
    // queryn te fili php un e kam ba limit 5 ama mund te behet limit cado
    $.get("../rede_satzerg/rede_satzerg.php", function(data, status){
        //satzArr edhe array qe cdo el i tij mban nje fjali dhe pathet a audiove, fjalite ndahen me <br> nga njera tjetra
        var satzArr = data.split("<br>");
        //ketu pathi i audiove ndahet nga fjalia dmth satz[0 eshte fjalia kurse satz[1] jane pathet e audiove
        var satz = satzArr[0].split("||");
        //ketu ndaj pathin e audios dmth el i pare rede_satz[0] permban pathin per te fili.ogg kurse i dyti per te fili mp3
        var rede_satz = satz[1].split("|");
        //breda divit me id myTune vendosim dy sourcet me src = me pathin qe kemi marre nga db
        $("#myTune").html('<source src="'+rede_satz[0]+'"><br><source src="'+rede_satz[1]+'">');

        //marrim fjaline e pare, fjalet e fjalise ruhen ne db te ndara nga # prandaj per te ndare vec e vec fjalet e fjalise
        // i bejme split sipas #, ne kete rast fjalise se pare
        var word = satz[0].split("#");
        
        //marrim nje array bosh
        var arr = [];
        // e mbushim me numra nga 1 te nr i fjaleve qe permban fjalia
        for(var x = 1; x <= word.length; x++){
            arr.push(x);
        }

        //i bejme shuffle, idea eshte se cdo index i arrayt qe formohet perfaqeson nje fjale pra arr[0] psh fjalen e pare,
        //arr[1] te dyten e kshu me rradhe. Kur i behet shuffle, perzihen indexet qe fjalet si fillim te dalin komplet pa rregull
        shuffleArray(arr);

        //cikli me posht mbush <ul id="sortable" > me ele li qe ka id te barabarte me indexin e arr[k] qe do jete nje numer nga 1 deri
        // te nr i fjaleve ne fjali dhe fjala ku word[0] psh eshte fjala e pare, ketu arr[k] eshte indexi qe po shqyrtojme kurse
        //word[arr[k]-1] eshte fjala qe i korrespondon ketij indexi
        for (var k = 0; k < word.length; k++) {
            var li = '<li id="'+arr[k]+'" class="li-drag btn btn-default btn-lg">'+word[arr[k]-1]+'</li>';
            $("#sortable").append(li);
        }

        //marrim var y qe numeron se sa fjali kemi procesuar dhe ne momentin qe shtypet butoni next, el me poshte boshatisen, idea
        //eshte qe per cdo fjale te paraqitet pamja fillestare dmth fjalet e crenditura dhe butoni check order
        //pastaj perseritet edhe njeher procesi me siper, kete rradhe per fjaline e dyte qe vjen, pastaj te treten e deri ne fund
        var y = 1;
        $(".next").click(function(){
            $("#sortable").html(" ");
            $(".answer").html(' ');
            $(".reset").html(' ');
            $(".next").css("visibility", "hidden");
            $(".checkOrder").removeClass("btn-danger disabled");
            $(".checkOrder").addClass("btn-success");
            
            var stz = satzArr[y].split("||");

            var rede_s = stz[1].split("|");

    
            

            $("#myTune").html('<source src="'+rede_s[0]+'"><br><source src="'+rede_s[1]+'">');


            var word = stz[0].split("#");
            var arr = [];
            for(var x = 1; x <= word.length; x++){
                arr.push(x);
            }
            shuffleArray(arr);
            for (var k = 0; k < word.length; k++) {
                var li = '<li id="'+arr[k]+'" class="li-drag btn btn-default btn-lg">'+word[arr[k]-1]+'</li>';
                $("#sortable").append(li);
            }

            y = y+1;
        
            //kur y=6, dmth qe jane procesuar 5 fjali, ateher piket qe ka fituar lojtari i cohen filit punkt.php qe do ti
            //ruaje ne db dhe na kalon te loja tjeter, ktu kam vene nje loj

            if (y == 5) {
                
                $.post( "../rede_satzerg/rede_punkt.php", {p: punkt}).done(function(data) {
                        window.location = "../wortanpassung/indexWort.php";
                    });

                
            }

        });

    });

});

    $( function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
    });


    function sortItems() {
        var items = $('#sortable li').get();
        items.sort(function(a,b){
            return parseInt(a.id) > parseInt(b.id);
        });
        var ul = $('#sortable');
        $.each(items, function(i, li){
          ul.append(li);
      });
    };


    function checkOrd() {
        var items = $('#sortable li').map(function(){
         return $.trim($(this).attr('id'));
     }).get();
        var itsort = $('#sortable li').map(function(){
         return $.trim($(this).attr('id'));
     }).get();
        <!-- console.log(items); -->
        <!-- console.log(itsort); -->
        itsort.sort();
        if (JSON.stringify(items) == JSON.stringify(itsort)){
            //kur pergjigjia eshte e sakte, brenda el me klase answer paraqitet mesazhi right order, 
            $(".answer").html('<p style="color: green; padding-top: 3%; font-size: 30px;"><b>Right order</b></p><br />');
            //i shfaqet butoni next qe by default eshte i fshehur
            $(".next").css("visibility", "visible");
            //butoni check order behet disable, dhe i rriten piket me 2, prap, me sa rriten piket mund te ndryshohet
            $(".checkOrder").addClass("disabled");
            punkt = punkt + 2;
        }else{
            //pjesa kur useri ka bere renditje te gabuar, shfaqet butoni reset
            $(".reset").html('<button class="btn btn-primary btn-lg btn-block" onclick="sortItems();">Reset</button>');
            //shfaqet mesazhi i gabimit
            $(".answer").html('<p style="color: red; padding-top: 3%; font-size: 30px;"><b>Wrong order</b></p><br />');
            //i shfaqet butoni next qe by default eshte i fshehur
            $(".next").css("visibility", "visible");
            //butoni check order behet disable dhe i kuq, piket i mbesin aq sa kishte
            $(".checkOrder").removeClass("btn-success");
            $(".checkOrder").addClass("btn-danger disabled");
        }

    };

