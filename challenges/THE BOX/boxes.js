"use strict"

// Gets the colors of a clicked element (split into rgb) and inverts them
function invertColor(element){
	var colors = splitColors($(element).css("background-color"));
	$(element).css("background-color", "rgb(" + (255 - colors[0]) + ',' + (255 - colors[1]) + ',' + (255 - colors[2]) + ")");
}

// Takes the color attribute of an element in,
// Uses a loop to iterate through all the colors and place them into an array
function splitColors(colors){
	var to_return = [];
  	var start = 4;
  	for(var i = 0; i < 3; i++){
  		var end = colors.indexOf(",", start + 1);
  		// To account for the final color not having a comma after it. 
  		if(end == -1){
  			end = colors.length-1;
  		}
  		to_return[i] = colors.substring(start, end);
  		start = end + 1;
  	}
  	return to_return;
}