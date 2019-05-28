var x = document.getElementsByClassName("mySlides");

function mouseOver(value) {
	
for (i = 0; i < x.length; i++) 
	x[i].style.display = "none";
  document.getElementById("img"+value).style.display = "block";
}
