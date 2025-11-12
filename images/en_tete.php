
  <div id="en_tete">


<script>
var myVar=setInterval(function(){myTimer()},4000);
var MonTableau = ["CouvertureClub.jpg","CouvertureClub.jpg","bannier3.jpg","bannier4.jpg", "bannier5.jpg"];
var i = 0;
function myTimer() {		
	//i+= 1; 
//	if (i>4)
///	i=0;
//	}

	var link = "url('images/" + MonTableau[i]+"')";
document.getElementById("en_tete").style.backgroundImage = link
  
}
</script>

 </div>
