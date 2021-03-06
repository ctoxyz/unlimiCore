function textCounter(field,counter,maxlimit,linecounter) {
	// text width//
	var fieldWidth =  parseInt(field.offsetWidth);
	var charcnt = field.value.length;        

	// trim the extra text
	if (charcnt > maxlimit) { 
		field.value = field.value.substring(0, maxlimit);
	}

	else { 
	// progress bar percentage
	var percentage = parseInt(100 - (( maxlimit - charcnt) * 100)/maxlimit) ;
	document.getElementById(counter).style.width =  parseInt((fieldWidth*percentage)/100)+"px";
	document.getElementById(counter).innerHTML="Limit: "+percentage+"%"
	// color correction on style from CCFFF -> CC0000
	setcolor(document.getElementById(counter),percentage,"background-color");
	}
}

function setcolor(obj,percentage,prop){
	obj.style[prop] = "rgb(80%,"+(100-percentage)+"%,"+(100-percentage)+"%)";
}

// clear and recall defaults to inputs --------------------------------------------------------
function clickclear(thisfield, defaulttext, color) {
	if (thisfield.value == defaulttext) {
		thisfield.value = "";
		if (!color) {
			color = "FF0000";
		}
		thisfield.style.color = "#" + color;
	}
}

function clickrecall(thisfield, defaulttext, color) {
	if (thisfield.value == "") {
		thisfield.value = defaulttext;
		if (!color) {
			color = "FF0000";
		}
		thisfield.style.color = "#" + color;
	}
}

