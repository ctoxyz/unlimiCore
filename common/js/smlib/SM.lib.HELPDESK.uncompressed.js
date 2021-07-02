// syntheticMagic ABS - JS Core Lib ============================================


// HELPDESK ------------------


// --------------------------------------------------------------------------------------------------------------------------------
// Author: 	Nathaniel Adam Briggs @ 2010
// Contact:	accounts@syntheticmagic.com
// Owner:		eGenerations Network, Inc. | syntheticMagic Advanced Business Services
// Client:	SM Clients
// Class:		N/A
// Version:	Release 2.1
// Method:	example()
// Purpose:	Handle all Core Ajax Operations
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
function SM_httpOBJCreator(){

	var NewXMLHTTPObject = false;

	if(window.XMLHttpRequest){
		var NewXMLHTTPObject = new XMLHttpRequest();
    //NewXMLHTTPObject.overrideMimeType('text/xml');
	}else if(window.ActiveXObject){
		var NewXMLHTTPObject = new ActiveXObject("Microsoft.XMLHTTP");
	}

	return NewXMLHTTPObject;
}
// -----------------------------------------------------------------------------









// helpdesk --------------------------------------------------------------------
function HelpDesk(){


	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	var _issueType				=	document.getElementById('_issueType').value;
	//var _emailAddr				=	document.getElementById('_emailAddr').value;
	var _emailAddr				=	document.getElementById('form_helpdesk.helpdesk.email_addr_nocheck').value;
	var _additionalData		=	document.getElementById('_additionalData').value;
	var _platform					=	document.getElementById('_platform').value;
	var _userID						=	document.getElementById('_userID').value;

	var target_url 					= 'execute';
	var params 							= '_function=ajax.service.helpdesk&_issueType=' + _issueType + '&_emailAddr=' + _emailAddr + '&_additionalData=' + _additionalData + '&_platform=' + _platform + '&_userID=' + _userID;

	INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
	INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
	//INTERNAL_XMLHTTPOBJ.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
	//INTERNAL_XMLHTTPOBJ.setRequestHeader("Pragma", "no-cache");
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");


		INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){
	
  		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
				
				if(INTERNAL_XMLHTTPOBJ.responseText == 99){
					alert('Issue Received - We Will Get Right On It!');
					document.getElementById('form_helpdesk').reset();
				}else if(INTERNAL_XMLHTTPOBJ.responseText == 33){
					alert('An Error Occurred - Please Try Again');
				}
				
			}
		};
		INTERNAL_XMLHTTPOBJ.send(params);
}
// ---------------------------------------------------------------------------------------