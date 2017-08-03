<?php session_start();

	require('dbconnect.php');
	$ctrl_query = "select count(kunde_ID) as total from progress where kunde_ID = ?";
	//funksioni count i sql numeron rreshtat e kolones kunde_ID te tabela progress dhe na tregon sa here haset
	//id qe ne po kerkojme. Me ane te 'as total' ne bejme te mundur qe te kapim vleren qe kthen query
	$stmt = $dbh->prepare($ctrl_query);
	$stmt->bindParam(1,$_SESSION['kunde_ID']);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$s = $dbh->prepare("select * from progress where kunde_ID = ?");
	$s->bindParam(1,$_SESSION['kunde_ID']);
	$s->execute();
	$r = $s->fetchAll(PDO::FETCH_ASSOC);

	$progress = ($r[0]['total_progress']/60)*100;

?>

<style>

	div#graph {
    position:relative;
    margin:40px auto;
    width:100px;
		height:100px;
}
canvas {
    display: block;
    position:absolute;
    top:0;
    left:0;
}
strong {
    color:#555;
    display:block;
    line-height:120px;
    text-align:center;
    width:120px;
    font-family:sans-serif;
    font-size:40px;
    font-weight:100;
    margin-left:5px;
}

input {
    width: 200px;
}

strong {

}
</style>

<center><div class="chart" id="graph" data-percent="<?php printf("%d",$progress);; ?>"></div></center>

<script>

	var el = document.getElementById('graph'); // get canvas

var options = {
    percent:  el.getAttribute('data-percent') || 25,
    size: el.getAttribute('data-size') || 130,
    lineWidth: el.getAttribute('data-line') || 15,
    rotate: el.getAttribute('data-rotate') || 0
}

var canvas = document.createElement('canvas');
var strong = document.createElement('strong');
strong.textContent = options.percent + '%';

if (typeof(G_vmlCanvasManager) !== 'undefined') {
    G_vmlCanvasManager.initElement(canvas);
}

var ctx = canvas.getContext('2d');
canvas.width = canvas.height = options.size;

el.appendChild(strong);
el.appendChild(canvas);

ctx.translate(options.size / 2, options.size / 2); // change center
ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

//imd = ctx.getImageData(0, 0, 240, 240);
var radius = (options.size - options.lineWidth) / 2;

var drawCircle = function(color, lineWidth, percent) {
		percent = Math.min(Math.max(0, percent || 1), 1);
		ctx.beginPath();
		ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
		ctx.strokeStyle = color;
        ctx.lineCap = 'round'; // butt, round or square
		ctx.lineWidth = lineWidth
		ctx.stroke();
};

drawCircle('#efefef', options.lineWidth, 100 / 100);
drawCircle('#555555', options.lineWidth, options.percent / 100);
</script>
