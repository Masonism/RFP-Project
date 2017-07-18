window.onload = function(){

	document.getElementById("updateSearch").addEventListener("submitSearch", function(event){

		event.preventDefault();

		var message = "";

		var city = document.getElementById("city").value;
		var state = document.getElementById("state").value;

		var game = document.getElementById("game").options[document.getElementById("game").selectedIndex].value;
		var meet = document.getElementById("meet").options[document.getElementById("meet").selectedIndex].value;

		var day = document.getElementById("day").options[document.getElementById("day").selectedIndex].value;
		var time = document.getElementById("time").options[document.getElementById("time").selectedIndex].value;

		alert(city + state + game + meet + day + time);

		
	});

};