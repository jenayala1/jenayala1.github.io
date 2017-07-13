(function() {
    "use strict";



function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}


function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

$('#header1').click(function(){
		$('header1').animate({
			"font-size": "200px", ///increases the elements size &
			"opacity": 0 //fade out the element to invisible 
		}, 1500, function(){ ///time designated for the 1st function, followed by the call of a new function to
			window.location = "https.google,com" //-redirect the page to the link
		});
	});









})();