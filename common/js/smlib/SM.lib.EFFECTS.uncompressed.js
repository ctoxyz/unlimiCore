// syntheticMagic ABS - JS Core Lib ============================================


// EFFECTS ------------------


// --------------------------------------------------------------------------------------------------------------------------------
// Author: 	Nathaniel Adam Briggs @ 2010
// Contact:	accounts@syntheticmagic.com
// Owner:		eGenerations Network, Inc. | syntheticMagic Advanced Business Services
// Client:	SM Clients
// Class:		N/A
// Version:	Release 2.1
// Method:	example()
// Purpose:	Handle all Core Effects Operations
// Usage:		

//					Instantiate ----------------------------------------------------------------------
//         	

//					Execute example() Method with $x (array) parameter (Examples @ base of file)
//					
//					
//					
//					
// --------------------------------------------------------------------------------------------------------------------------------


// =============================================================================














// -----------------------------------------------------------------------------
function SM_td_rollover(domID){

	alert(domID);

}
// -----------------------------------------------------------------------------







// -----------------------------------------------------------------------------
function fade(cID, Ease){
	//var divID = 'conversation' + cID;
	var divID = cID;
	
	if(Ease == 'out'){
		opacity(divID, 100, 0, 200);
		setTimeout(function() {invisi(divID, Ease)},200);	
	}else if(Ease == 'in'){
		opacity(divID, 0, 100, 200);
		setTimeout(function() {invisi(divID, Ease)},200);
	}

	
}
// -----------------------------------------------------------------------------



// -----------------------------------------------------------------------------
function invisi(cID, Ease){
	if(Ease == 'out'){
		document.getElementById(cID).style.display 	= 'none';
	}else if(Ease == 'in'){
		document.getElementById(cID).style.display 	= 'inline';
	}
}
// -----------------------------------------------------------------------------
	

// -----------------------------------------------------------------------------
function changeOpacity(opacity, id) { 
    var object = document.getElementById(id).style; 
    object.opacity = (opacity / 100); 
    object.MozOpacity = (opacity / 100); 
    object.KhtmlOpacity = (opacity / 100); 
    object.filter = "alpha(opacity=" + opacity + ")"; 
}
// -----------------------------------------------------------------------------


// -----------------------------------------------------------------------------
function opacity(id, opacStart, opacEnd, millisec) { 
    //speed for each frame 
    var speed = Math.round(millisec / 100); 
    var timer = 0; 

    //determine the direction for the blending, if start and end are the same nothing happens 
    if(opacStart > opacEnd) { 
        for(i = opacStart; i >= opacEnd; i--) { 
            setTimeout("changeOpacity(" + i + ",'" + id + "')",(timer * speed)); 
            timer++; 
        } 
    } else if(opacStart < opacEnd) { 
        for(i = opacStart; i <= opacEnd; i++) 
            { 
            setTimeout("changeOpacity(" + i + ",'" + id + "')",(timer * speed)); 
            timer++; 
        } 
    } 
}
// -----------------------------------------------------------------------------



