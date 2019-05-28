var i = 1;
carousel();
var x = document.getElementsByClassName("lista");

function mouseOver(value) {
	for (j = 0; j < x.length; j++)
		document.getElementById('li'+j).classList.remove('hover');
	i = value - 1;
	document.getElementById('li'+i).classList.add('hover');
	document.getElementById('imagen').style.backgroundImage = "url('../vista/img"+value+".jpg')";
	i = value;
	if (i == 5)
		i = 0; 
}

function carousel() {
	document.getElementById('li'+i).click(); 
	setTimeout(carousel, 5000);
}
