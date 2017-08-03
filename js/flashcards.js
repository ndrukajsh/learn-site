function flip(el){
    var obj = document.getElementById('flip3D');
    if(obj.getAttribute('flipped') === 'true') {
        obj.children[1].style.transform = "perspective(600px) rotateY(-180deg)";
    	obj.children[0].style.transform = "perspective(600px) rotateY(0deg)";         
        obj.setAttribute('flipped', 'false');
    } else {
        obj.children[1].style.transform = "perspective(600px) rotateY(0deg)";
    	obj.children[0].style.transform = "perspective(600px) rotateY(180deg)"; 
        obj.setAttribute('flipped', 'true');
    }	
}
var vlib = document.getElementById('flip3D');
vlib.addEventListener('click', flip);
vlib.addEventListener('keydown', flip);

document.onkeydown = function(evt) {
  evt = evt || window.event;
  switch (evt.keyCode) {
      case 32:
          leftArrowPressed();
          break;
  }
};