var i = 1;
carousel();
var x = document.getElementsByClassName("lista");

function mouseOver(value) {
	for (j = 0; j < 5; j++) {
		document.getElementById('li'+j).classList.remove('hover');
		document.getElementById('div'+j).style.display = "none";
	}
	i = value - 1;
	document.getElementById('li'+i).classList.add('hover');
	document.getElementById('div'+i).style.display = "block";
	i = value;
	if (i == 5)
		i = 0; 
}

function carousel() {
	document.getElementById('li'+i).click(); 
	setTimeout(carousel, 5000);
}