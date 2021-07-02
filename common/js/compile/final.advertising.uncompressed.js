// syntheticMagic ABS - JS Core Lib ============================================


// ADVERTISING LEGACY ------------------


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





var GlobalCounter = 0;





/*
// ------------------------------------------------------------------------------------------
	var xmlhttpPoll = false;
	if(window.XMLHttpRequest){
		var xmlhttpPoll = new XMLHttpRequest();
    //xmlhttpPoll.overrideMimeType('text/xml');
	}else if(window.ActiveXObject){
		var xmlhttpPoll = new ActiveXObject("Microsoft.XMLHTTP");
	}
// ------------------------------------------------------------------------------------------
*/





// ------------------------------------------------------------------------------------------
function httpOBJCreator(){

	var NewXMLHTTPObject = false;

	if(window.XMLHttpRequest){
		var NewXMLHTTPObject = new XMLHttpRequest();
    //NewXMLHTTPObject.overrideMimeType('text/xml');
	}else if(window.ActiveXObject){
		var NewXMLHTTPObject = new ActiveXObject("Microsoft.XMLHTTP");
	}

	return NewXMLHTTPObject;
}
// ------------------------------------------------------------------------------------------








/*
// -----------------------------------------------------------------------------
function friendRequest(divID, FriendStatus, FriendCommand){
	alert(divID + FriendStatus + FriendCommand);
}
// -----------------------------------------------------------------------------
*/




















// -----------------------------------------------------------------------------
function IntervalWindowRefresh(){

	var _UserSession				=	document.getElementById('__onlineWindow_UserSession').value;
	var _Command						=	document.getElementById('__onlineWindow_Command').value;
	var _OptionalParameter	=	document.getElementById('__onlineWindow_OptionalParameter').value;	

	window_REFRESH(_UserSession, _Command, _OptionalParameter);
	setTimeout("IntervalWindowRefresh()", 10000);

}
// -----------------------------------------------------------------------------
























// -----------------------------------------------------------------------------
function window_REFRESH(UserSession, Command, OptionalParameter){



	var OpenScope = false;

	if(OptionalParameter === undefined){
		var OptionalParameter = false;
	}


	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();




	switch(Command){
		case 'report.myfriends.requests':
			var UpdateWindow = 'panel_lft_full_1';
		break;

		case 'report.myfriends.pending':
			var UpdateWindow = 'panel_rht_full_1a';
		break;

		case 'report.myfriends.current':
			var UpdateWindow = 'panel_lft_full_2';
		break;

		case 'report.myfriends.current.myhome':
			var UpdateWindow = 'myhome_panel_lft_3';
			var Command			 = 'report.myfriends.current';
		break;

		case 'report.myfriends.favorites':
			var UpdateWindow = 'panel_rht_full_2a';
		break;

		case 'report.myfriends.block':
			var UpdateWindow = 'panel_rht_full_2a';
		break;

		case 'report.onlinenow.myhome':
			var UpdateWindow = 'myhome_panel_lft_1';
		break;

		case 'report.myphotos.myprofileeditor':
			var UpdateWindow = 'subcontainer_level1_data';
		break;

		case 'report.prereg_preview.current.home':
			var UpdateWindow 	= 'column_connect_latestloginlistb';
			OpenScope 				= true;
			//var Exp_OptionalParameter	=	OptionalParameter.split(":"); 
			//alert(Exp_OptionalParamter[0]);
			//Exp_OptionalParameter[1]		=	document.getElementById('prereg_search_zipcodeA').value;
			//alert(Exp_OptionalParamter[1]);
			//ExplodedParameter 				= true;
			//alert(document.getElementById('prereg_search_zipcodeA').value);
			GlobalCounter = 0;

		break;

		case 'execute.myprofile.photo.remove':
			var UpdateWindow = 'subcontainer_level1_data';
		break;

		case 'execute.myprofile.photo.primary':
			var UpdateWindow = 'subcontainer_level1_data';
		break;

	}



	var target_url 		= 'execute';

	
	if(OpenScope == true){
		var params 				= '_function=ajax-WindowRefreshOS' + '&_UserSession=' + UserSession + '&_Command=' + Command + '&_OptionalParameter=' + OptionalParameter;
	}else{
  	if(OptionalParameter == false){
  		var params 				= '_function=ajax-WindowRefresh' + '&_UserSession=' + UserSession + '&_Command=' + Command;
  	}else{
  		var params 				= '_function=ajax-WindowRefresh' + '&_UserSession=' + UserSession + '&_Command=' + Command + '&_OptionalParameter=' + OptionalParameter;
  	}
	}


	INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
	INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");
	INTERNAL_XMLHTTPOBJ.onreadystatechange = function() {


		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
			document.getElementById(UpdateWindow).innerHTML = INTERNAL_XMLHTTPOBJ.responseText;
		}else{
			
			if(GlobalCounter < 2){
				document.getElementById(UpdateWindow).innerHTML = '<br><br><br><center><img src="common/img/ani-circle.2.gif" /></center>';
				GlobalCounter = GlobalCounter + 1;	
			}
			
		}
	};
		INTERNAL_XMLHTTPOBJ.send(params);
}
// -----------------------------------------------------------------------------











// -----------------------------------------------------------------------------
function AuthenticateUser(){

	var _LoginCredentialA		=	document.getElementById('signin_emailaddress').value;
	var _LoginCredentialB		=	document.getElementById('signin_password').value;
	var _LoginCredentialC		=	document.getElementById('signin_authenticationToken').value;
	var _LoginCredentialD		=	document.getElementById('signin_remember_me').checked;

	var target_url 		= 'execute';
	var params 				= '_function=member-Authenticate' + '&_LoginCredentialA=' + _LoginCredentialA + '&_LoginCredentialB=' + _LoginCredentialB + '&_LoginCredentialC=' + _LoginCredentialC + '&_LoginCredentialD=' + _LoginCredentialD;

	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
	INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");
	INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){
		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
			

			if(INTERNAL_XMLHTTPOBJ.responseText == 222){
					window.location = "MyHome";
			}else if(INTERNAL_XMLHTTPOBJ.responseText == 666){
					//alert('Hack Attempt - IP Logged');
					alert('An Error Occurred - Please Try Again');
			}else{
					alert('Login and/or Password Incorrect');
			}
		}
	};
	INTERNAL_XMLHTTPOBJ.send(params);
}
// -----------------------------------------------------------------------------










// -----------------------------------------------------------------------------
function LogoutUser(){


	var target_url 		= 'execute';
	var params 				= '_function=ajax.member.logout' + '&_Logout=1';

	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
	INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");
	INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){
		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
			
			//alert(INTERNAL_XMLHTTPOBJ.responseText);
			if(INTERNAL_XMLHTTPOBJ.responseText == 222){
					window.location = "MyHome";
			}
		}
	};
	INTERNAL_XMLHTTPOBJ.send(params);
}
// -----------------------------------------------------------------------------












// add/remove friend  ----------------------------------------------------------
function MyNetwork(UserSession, FriendID, Command, cID, WindowFrom){

  // -----------------------------------------------------------------
  function getElementsByName_iefix(tag, name) {
       var elem = document.getElementsByTagName(tag);
       var arr = new Array();
       for(i = 0,iarr = 0; i < elem.length; i++) {
            att = elem[i].getAttribute("name");
            if(att == name) {
                 arr[iarr] = elem[i];
                 iarr++;
            }
       }
       return arr;
  }
	// -----------------------------------------------------------------


	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();



	if(!UserSession || !FriendID || !Command){
		alert('Error! Spoof Attempt!');
	}else{

		var target_url 		= 'execute';
		var params 				= '_function=ajax.network' + '&_FriendID=' + FriendID + '&_Command=' + Command;

		INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
		INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
		INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");

		INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){


		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){

			switch(Command){
				
				// add friend --------------------------------------
				case('execute.myfriends.add'):

  				if(INTERNAL_XMLHTTPOBJ.responseText == 1){
    				//alert('Added to Friends');
    				//fade('option_add2Friends' + cID, 'out');
    				var Elems = getElementsByName_iefix('div', 'optionGroup_add2Friends_' + FriendID);
    				for(var x = 0; x < Elems.length; x++){
    					//fade(Elems[x].id, 'out');
    					document.getElementById(Elems[x].id).innerHTML = '<div style="position: absolute; top: 5px; right: 4px; border: 0px solid #ffffff; width: 180px; height: 30px;"> <table><tr><td><font color=yellow size=3><b><i>Friend Request Sent!</i></b></font></td></tr></table> </div>';
    				}
  				}else if(INTERNAL_XMLHTTPOBJ.responseText == 2){
  					alert('Friend Requested Already - Check MyFriends Section');
  
  				}else{
  					alert('Failure - Try Again');
  				}

				break;
				// -------------------------------------------------


				// accept friend request ---------------------------
				case('execute.myfriends.accept'):

					if(INTERNAL_XMLHTTPOBJ.responseText == 1){
						document.getElementById(cID).style.display = 'none';
					}

					
					if(WindowFrom == 'report.myfriends.requests'){
						window_REFRESH(UserSession, 'report.myfriends.current');
   					window_REFRESH(UserSession, 'report.myfriends.requests');
					}


				break;
				// -------------------------------------------------

				
				// block member ------------------------------------
				case('execute.myfriends.block'):

  				if(INTERNAL_XMLHTTPOBJ.responseText == 1){
    				//alert('Blocked from Friends');
    				//fade('option_add2Friends' + cID, 'out');
    				var Elems = getElementsByName_iefix('div', 'optionGroup_blockFriend_' + FriendID);
    				for(var x = 0; x < Elems.length; x++){
    					//fade(Elems[x].id, 'out');
    					document.getElementById(Elems[x].id).innerHTML = '<div style="position: absolute; top: 5px; right: 4px; border: 0px solid #ffffff; width: 180px; height: 30px;"> <table><tr><td><font color=yellow size=3><b><i>Blocked!</i></b></font></td></tr></table> </div>';
    				}
  
    				var Elems = getElementsByName_iefix('div', 'optionGroup_add2Friends_' + FriendID);
    				for(var x = 0; x < Elems.length; x++){
    					//fade(Elems[x].id, 'out');
    					document.getElementById(Elems[x].id).style.display = 'none';
    				}  				
    				
  				}else if(INTERNAL_XMLHTTPOBJ.responseText == 2){
  					alert('Blocked Already - Check MyFriends Section');
  					
  				}else{
  					alert('Failure - Try Again');
  				}

				break;
				// -------------------------------------------------

				// remove friend -----------------------------------
				case('execute.myfriends.remove'):

					if(INTERNAL_XMLHTTPOBJ.responseText == 1){
						document.getElementById(cID).style.display = 'none';

						if(WindowFrom == 'report.myfriends.current'){
							window_REFRESH(UserSession, 'report.myfriends.current');
						}

						if(WindowFrom == 'report.myfriends.requests'){
							window_REFRESH(UserSession, 'report.myfriends.requests');
						}

						if(WindowFrom == 'report.myfriends.pending'){
							window_REFRESH(UserSession, 'report.myfriends.pending');
						}
					}
				break;
				// -------------------------------------------------



				// unblock member ----------------------------------
				case('execute.myfriends.unblock'):

					if(INTERNAL_XMLHTTPOBJ.responseText == 1){
						document.getElementById(cID).style.display = 'none';

						if(WindowFrom == 'report.myfriends.block'){
							window_REFRESH(UserSession, 'report.myfriends.block');
						}					
					}
				break;
				// -------------------------------------------------



				// delete photo ------------------------------------
				case('execute.myprofile.photo.remove'):

					if(INTERNAL_XMLHTTPOBJ.responseText == 1){
						//document.getElementById(cID).innerHTML = '<img src="http://friendsnflings.com/common/img/icons/icon_20x20_redx.png" style="height: 100px; width: 100px; align: center;" />';

						if(WindowFrom == 'subcontainer_level1_data'){
							window_REFRESH(UserSession, 'report.myphotos.myprofileeditor');
							CheckNumUploadedImages('delete');
						}
					}
				break;
				// -------------------------------------------------


				// primary photo -----------------------------------
				case('execute.myprofile.photo.primary'):

					if(INTERNAL_XMLHTTPOBJ.responseText == 1){
						//document.getElementById(cID).innerHTML = '<img src="http://friendsnflings.com/common/img/icons/icon_20x20_redx.png" style="height: 100px; width: 100px; align: center;" />';

						if(WindowFrom == 'subcontainer_level1_data'){
							window_REFRESH(UserSession, 'report.myphotos.myprofileeditor');
						}					
					}
				break;
				// -------------------------------------------------


			}
		}else{
			//document.getElementById('specificMessage_reply' + cID).innerHTML = 'updating...';
		}
	};
		//INTERNAL_XMLHTTPOBJ.send(null);
		INTERNAL_XMLHTTPOBJ.send(params);
	}
}
// -----------------------------------------------------------------------------



/*
// add/remove friend  -----------------------------------------------------------------
function MyNetwork(NetworkOwner_UserID, ToBeAdded_UserID, NetworkType, cID){



  // ------------------------------------------------------------------------------------------
  function getElementsByName_iefix(tag, name) {
       var elem = document.getElementsByTagName(tag);
       var arr = new Array();
       for(i = 0,iarr = 0; i < elem.length; i++) {
            att = elem[i].getAttribute("name");
            if(att == name) {
                 arr[iarr] = elem[i];
                 iarr++;
            }
       }
       return arr;
  }
	// ------------------------------------------------------------------------------------------



	// ------------------------------------------------------------------------------------------
	var xmlhttpAdd2Network = false;
	if(window.XMLHttpRequest){
		var xmlhttpAdd2Network = new XMLHttpRequest();
    //xmlhttpPoll.overrideMimeType('text/xml');
	}else if(window.ActiveXObject){
		var xmlhttpAdd2Network = new ActiveXObject("Microsoft.XMLHTTP");
	}
	// ------------------------------------------------------------------------------------------





	if(!NetworkOwner_UserID || !ToBeAdded_UserID || !NetworkType){
		alert('Error! Spoof Attempt!');
	}else{
		
		var target_url 	= 'common/js/sendmsg/network.php?_NetworkOwner_UserID=' + NetworkOwner_UserID + '&_ToBeAdded_UserID=' + ToBeAdded_UserID + '&_NetworkType=' + NetworkType;

		xmlhttpAdd2Network.open('GET', target_url, true);
		xmlhttpAdd2Network.onreadystatechange = function(){
	
		if(xmlhttpAdd2Network.readyState == 4 && xmlhttpAdd2Network.status == 200){

			//document.getElementById('specificMessage_reply' + cID).innerHTML = xmlhttpSetMailRead.responseText;
			
			
			if(NetworkType == 'add'){
				//alert('Added to Friends');
				//fade('option_add2Friends' + cID, 'out');

				var Elems = getElementsByName_iefix('div', 'optionGroup_add2Friends_' + ToBeAdded_UserID);

				for(var x = 0; x < Elems.length; x++){
					//fade(Elems[x].id, 'out');
					document.getElementById(Elems[x].id).innerHTML = '<div style="position: absolute; top: 5px; right: 4px; border: 0px solid #ffffff; width: 180px; height: 30px;"> <table><tr><td><font color=yellow size=3><b><i>Friend Request Sent!</i></b></font></td></tr></table> </div>';
				}


			}else if(NetworkType == 'remove'){
				alert('Removed from Friends');
			
			}else if(NetworkType == 'block'){
				alert('Member Blocked');
			}
			

		}else{
			//document.getElementById('specificMessage_reply' + cID).innerHTML = 'updating...';
		}

	};
		xmlhttpAdd2Network.send(null);

	}
}
// -----------------------------------------------------------------------------


*/



// set mail read  --------------------------------------------------------------
function SetMailRead(cID, senderID){

	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	if(!senderID || !cID){
		alert('Error! Spoof Attempt!');
	}else{

  	var target_url 		= 'execute';
  	var params 				= '_function=ajax.mail.setread' + '&_cID=' + cID + '&_senderID=' + senderID;


  	INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
  	INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
  	INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");

  	INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){
		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
			//document.getElementById('specificMessage_reply' + cID).innerHTML = xmlhttpSetMailRead.responseText;
		}else{
			//document.getElementById('specificMessage_reply' + cID).innerHTML = 'updating...';
		}
	};
		INTERNAL_XMLHTTPOBJ.send(params);
	}
}
// -----------------------------------------------------------------------------











// set mail deleted  -----------------------------------------------------------
function SetMailDeleted(cID, senderID, who){

		var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

  	if(!senderID || !cID || !who){
  		alert('Error! Spoof Attempt!');
  	}else{

  		var target_url 		= 'execute';
  		var params 				= '_function=ajax.mail.setdeleted' + '&_cID=' + cID + '&_senderID=' + senderID + '&_who=' + who;

  		INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
  		INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  		INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
  		INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");

  		INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){

  		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
	 			//document.getElementById('specificMessage_reply' + cID).innerHTML = xmlhttpSetMailRead.responseText;
  			document.getElementById('conversation' + cID).style.display 	= 'none';
  			//fade('conversation' + cID, 'out');
  			document.getElementById('msgs' + cID).style.display 					= 'none';
  			//fade('msgs' + cID, 'out');
	 			//alert(xmlhttpSetMailRead.responseText);
  			//window.location='MyMail';
  		}else{
  			document.getElementById('conversation' + cID).innerHTML = '&nbsp;&nbsp;<font size=6 color=white><b>Deleting...</b></font>';
  		}
  	};
  		INTERNAL_XMLHTTPOBJ.send(params);
  	}

}
// -----------------------------------------------------------------------------











// send reply  -----------------------------------------------------------------
function SendReply(cID, senderID){

	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	var _replyBody	= document.getElementById('specificMessage_reply_response' + cID).value;

	if(!_replyBody || !cID){
		alert('You Must Type Something to Send a Reply!');
	}else{
		
		document.getElementById('specificMessage_reply' + cID).innerHTML = '<img src="http://egenerations.com/common/js/greybox/indicator.gif" align="middle" valign="middle">';

		var target_url 		= 'execute';
		var params 				= '_function=ajax.mail.sendreply' + '&_cID=' + cID + '&_replyBody=' + _replyBody + '&_senderID=' + senderID;

		INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
		INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
		INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");
		INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){
	
		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){

    	//content retrieved from query code --------
			document.getElementById('specificMessage_reply' + cID).innerHTML = INTERNAL_XMLHTTPOBJ.responseText;

		}else{
			document.getElementById('specificMessage_reply' + cID).innerHTML = '<img src="http://egenerations.com/common/js/greybox/indicator.gif" align="middle" valign="middle">';
		}

	};
		INTERNAL_XMLHTTPOBJ.send(params);
	}
}
// -----------------------------------------------------------------------------










// send email from profile  ----------------------------------------------------
function SendEmail(){

	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	var _sender			=	document.getElementById('profileviewer').value;
	var _senderUN		=	document.getElementById('profileviewerusername').value;
	var _recipient	=	document.getElementById('profileowner').value;
	var _body				=	document.getElementById('email_body_via_profile').value;
	var _msgToken		=	document.getElementById('profilemsgToken').value;


	if(!_sender || !_recipient || !_body){
		alert('You Must Type Something to Send EMail');
	}else{

		var target_url 		= 'execute';
		var params 				= '_function=ajax.mail.sendemail' + '&_sender=' + _sender + '&_recipient=' + _recipient + '&_body=' + _body + '&_senderUN=' + _senderUN + '&_msgToken=' + _msgToken;

		INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
		INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
		INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");
		INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){
	
		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){

    	//content retrieved from query code --------
			document.getElementById('emailme_panel_dataset').innerHTML = INTERNAL_XMLHTTPOBJ.responseText + ' ';

		}else{
    	//if error || no response say this ---------
			document.getElementById('emailme_panel_dataset').innerHTML = 'sending...';
		}

	};
		INTERNAL_XMLHTTPOBJ.send(params);
	}
}
// -----------------------------------------------------------------------------



















// IM ==============================================================================================================================================================================




// IM poller ===================================================================
function IMRequestCheckPoller(){
	setTimeout("IMRequestCheckPoller()", 6000);
	var _userid			=	document.getElementById('active_session_userid').value;
	IMRequestCheck(_userid);
}
// =============================================================================






// chat refresh clock ==========================================================
function IMPoller(){
	setTimeout("IMPoller()", 2000);
	GetIM();
}
// =============================================================================











// send IM  ====================================================================
function SendIM(){

	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	var _sender			=	document.getElementById('im_sender').value;
	var _sessionid	=	document.getElementById('im_sessionid').value;
	var _body				=	document.getElementById('im_body').value;
	var target_url 	= 'common/js/instantmsgr/im-send.php?_sender=' + _sender + '&_sessionid=' + _sessionid + '&_body=' + _body;

		INTERNAL_XMLHTTPOBJ.open('GET', target_url, true);
		INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){
	
		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
			//document.getElementById('emailme_panel_dataset').innerHTML = xmlhttp.responseText + ' ';
		}else{
			//document.getElementById('IM-scrollpane').innerHTML = xmlhttp.responseText + '!no go';
		}
	};
	INTERNAL_XMLHTTPOBJ.send(null);

	document.getElementById('im_body').value='';
	document.getElementById('im_body').focus();
}
// =============================================================================











// chat refresh ================================================================
function GetIM() {

	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	var _sessionid	=	document.getElementById('im_sessionid').value;

	var target_url 	= 'common/js/instantmsgr/im-receive.php?_sessionid=' + _sessionid;

	INTERNAL_XMLHTTPOBJ.open('GET', target_url, true);
	INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){

		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
			document.getElementById('IM-scrollpane').innerHTML = INTERNAL_XMLHTTPOBJ.responseText + ' ';
		}
	};
	INTERNAL_XMLHTTPOBJ.send(null);
}
// =============================================================================











// close IM  ===================================================================
function closeIM(){

	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	var _sender			=	document.getElementById('im_sender').value;
	var _recipient	=	document.getElementById('im_recipient').value;
	var _sessionid	=	document.getElementById('im_sessionid').value;
	
	
	

	var target_url 	= 'common/js/instantmsgr/im-close.php';
	var params 			= '_sender=' + _sender + '&_sessionid=' + _sessionid;

	INTERNAL_XMLHTTPOBJ.open('POST', target_url, false); //false=sync true=async

	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");

	INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){	};
	INTERNAL_XMLHTTPOBJ.send(params);

	window.opener.document.getElementById('IM_Session_Request' + _recipient).value		= "Instant Message Me";
	window.opener.document.getElementById('IM_Session_Request' + _recipient).disabled	= false;
}
// =============================================================================











// check IM requests ===========================================================
function IMRequestCheck(userid) {

//GB_showCenter('IM', 'http://n8dog.com');
//_userid	=	 inbound;
//_userid	=	'108136';
//var _userid			=	document.getElementById('active_session_userid').value;
//alert(userid);
//document.getElementById('nav_chatroomindicator').innerHTML = '<b><font color="white">Checking Chatroom...</font></b>';

	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();


	var target_url 	= 'common/js/instantmsgr/im-request-check.php?_userid=' + userid;


	INTERNAL_XMLHTTPOBJ.open('GET', target_url, true);
  
	INTERNAL_XMLHTTPOBJ.onreadystatechange = function() {
	
	if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
        //content retrieved from query code
				//document.getElementById('nav_chatroomindicator').innerHTML = '<b><font color="white">IM Request <a href="chat" style="color: #feae2f;">Chat</a>: ' + xmlhttpPoll.responseText + '</font></b>';

				if(INTERNAL_XMLHTTPOBJ.responseText != 0){
					//document.getElementById('nav_chatroomindicator').innerHTML = '<b><font color="white">' + xmlhttpPoll.responseText + '</font></b>';
					GB_showCenter('', 'http://friendsnflings.com/IMRequest-' + INTERNAL_XMLHTTPOBJ.responseText, 490, 465);
					
				}

			}else{

        //if error || no response say this -------
				//document.getElementById('nav_chatroomindicator').innerHTML = '<b><font color="white">no IM requests</font></b>';
			}
		};
		INTERNAL_XMLHTTPOBJ.send(null);  


}
// =============================================================================







// record deny ===================================
function DenyIM(sessionid, userid){

	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	var target_url 	= 'common/js/instantmsgr/im-deny.php?_sessionid=' + sessionid + '&_sender=' + userid;

	INTERNAL_XMLHTTPOBJ.open('GET', target_url, true);

	INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){

		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
			parent.parent.GB_CURRENT.hide();
		}
	};
	INTERNAL_XMLHTTPOBJ.send(null);
}
// ===============================================








// record accept =================================
function AcceptIM(sessionid, userid){

	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	var target_url 	= 'common/js/instantmsgr/im-accept.php?_sessionid=' + sessionid + '&_sender=' + userid;

	INTERNAL_XMLHTTPOBJ.open('GET', target_url, true);

	INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){

		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
			//window.open('IMAccept-' + sessionid, sessionid ,width = 500, height = 500);
			//window.open("http://www.w3schools.com");
			//parent.parent.GB_CURRENT.hide();
		}
	};
	INTERNAL_XMLHTTPOBJ.send(null);
}
// ===============================================









// =============================================================================
function InitiateIMRequest(RecipientUserID_ENCRYPTED_PUBLIC){


	//setTimeout(function() {OpenIMWindow(RecipientUserID_ENCRYPTED_PUBLIC)},2000);

	var ButtonToDisable = "IM_Session_Request" + RecipientUserID_ENCRYPTED_PUBLIC;
	document.getElementById(ButtonToDisable).value		= "IM in Session";
	document.getElementById(ButtonToDisable).disabled	= true;
	OpenIMWindow(RecipientUserID_ENCRYPTED_PUBLIC);

	// open window
	//window.open("IM-" + RecipientUserID_ENCRYPTED_PUBLIC, "IMWindow","width=400,height=400,toolbar=no,directories=no,menubar=no,status=no,location=no,scrollbars=no,resizeable=0");
	//window.open("IM-" + destinationUserID, "WMWindow_" + userID + "_" + destinationUserID, "width=400,height=400,toolbar=no,directories=no,menubar=no,status=no,location=no,scrollbars=no,resizeable=0");
}
// =============================================================================




function OpenIMWindow(RecipientUserID_ENCRYPTED_PUBLIC){
	window.open("IM-" + RecipientUserID_ENCRYPTED_PUBLIC, "IMWindow_" + RecipientUserID_ENCRYPTED_PUBLIC, "width=400,height=400,toolbar=no,directories=no,menubar=no,status=no,location=no,scrollbars=no,resizeable=0");
}






// =============================================================================
function launchIM( userID, destinationUserID, destinationName ){
	up_localUserID = userID;
	//window.open("IM-" + destinationUserID, "WMWindow_" + up_replaceAlpha(userID) + "_" + up_replaceAlpha(destinationUserID), "width=360, height=400, toolbar=0, directories=0, menubar=0, status=0, location=0, scrollbars=0, resizable=1");
	//window.open("IM-" + destinationUserID, "WMWindow_" + userID + "_" + destinationUserID, "width=360,height=400,toolbar=no,directories=no,menubar=no,status=no,location=no,scrollbars=no");
	window.open("IM-" + destinationUserID, "WMWindow_" + userID + "_" + destinationUserID, "width=400,height=400,toolbar=no,directories=no,menubar=no,status=no,location=no,scrollbars=no,resizeable=0");
}
// =============================================================================




// END IM ==========================================================================================================================================================================
























// Profile Editing =================================================================================


function doThisReset(){
	
	document.forms["member-Add-Picture"].reset();
	
	var UserSession 	= document.getElementById('UserSession').value;
	var Command 			= document.getElementById('Command').value;

	window_REFRESH(UserSession, Command);
	//document.getElementById('upload').disabled													= false;																																			//upload button
	document.getElementById('image').disabled														= false;																																				//browse button
	document.getElementById('upload').disabled													= false;																																				//upload button
	document.getElementById('upload').value															= 'Upload Photo';																																//upload button	
	CheckNumUploadedImages('add');
}


function stopUpload(SomeThing){
	doThisReset()
}



// Upload Image File to Profile Gallery-----------------------------------------
function UploadImageFile(){

	if(document.getElementById('image').value){
		document.getElementById('member-Add-Picture').onsubmit=function(){
			document.getElementById('member-Add-Picture').target = 'upload_target';
		}
		
		setTimeout("CheckUploadProgress()",1000);
	}else{
		alert('Browse/Select an Image to Upload!');
	}
}
// -----------------------------------------------------------------------------




// Check Upload Progess (interactive Upload ------------------------------------
function CheckUploadProgress(){

		var ProgressKey 				= document.getElementById('progress_key').value;
		var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

		//var target_url 		= 'http://friendsnflings.com/common/func/upload_progress.php';
		var target_url 					= 'execute';
		var params 							= '_function=ajax.image.uploadprogess&APC_UPLOAD_PROGRESS=' + ProgressKey;

		INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
		INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
		INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");

		INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){
			if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
				//document.getElementById('subcontainer_level1_data').innerHTML = 'stuff here';
				//document.getElementById('picture_options_overlay').style.display 		= 'inline';

				if(INTERNAL_XMLHTTPOBJ.responseText > 99){
					document.getElementById('upload_progress').innerHTML 		= '&nbsp;&nbsp;<b>Completing...</b>';																												//green upload meter
					//fade('upload_progress', 'out');
					setTimeout(function() {fade('upload_progress', 'out')},1000);																																												//green upload meter
					document.getElementById('upload').value															= 'Resizing...';																																//upload button
					//document.getElementById('picture_options_overlay').innerHTML 				= '';
					//document.getElementById('picture_options_overlay').style.display 		= 'none';

				}else{
					fade('upload_progress', 'in');																																																											//green upload meter
					document.getElementById('image').disabled														= true;
					document.getElementById('upload').disabled													= true;																																					//upload button
					document.getElementById('upload').value															= 'Uploading...';																																//upload button
					document.getElementById('upload_progress').style.width 							= (INTERNAL_XMLHTTPOBJ.responseText * 2) + 'px';																//green upload meter
					document.getElementById('upload_progress').innerHTML 								= '&nbsp;&nbsp;<b>' + Math.round(INTERNAL_XMLHTTPOBJ.responseText) + '%</b>';		//green upload meter
					setTimeout("CheckUploadProgress()",1000);
					//document.getElementById('picture_options_overlay').innerHTML 		= '<b>Completing...</b>';
				}
			}else{
				//alert(INTERNAL_XMLHTTPOBJ.responseText);
				//document.getElementById('subcontainer_level1_data').innerHTML = '<img src="http://egenerations.com/common/js/greybox/indicator.gif" align="middle" valign="middle">';
			}
		};

		INTERNAL_XMLHTTPOBJ.send(params); 
}
// -----------------------------------------------------------------------------




// Check Total Images Uploaded -------------------------------------------------
function CheckNumUploadedImages(Operation){
	
	NumImages			= null;	
	var NumImages = parseInt(document.getElementById('numberCurrentImages').value);
	NumImages			= parseInt(NumImages);

	if(Operation == 'delete'){
		NumImages = parseInt(NumImages) - 1;
		document.getElementById('numberCurrentImages').value								= parseInt(NumImages);
		document.getElementById('numberCurrentImagesCurrent').value					= parseInt(NumImages);

	}else if(Operation == 'add'){
		NumImages = parseInt(NumImages) + 1;
		document.getElementById('numberCurrentImages').value								= parseInt(NumImages);
		document.getElementById('numberCurrentImagesCurrent').value					= parseInt(NumImages);
	}
	var NumCurrentImages = document.getElementById('numberCurrentImagesCurrent').value;

	if(NumCurrentImages > 11){
		document.getElementById('image').disabled		= true;
		document.getElementById('upload').disabled	= true;
		document.getElementById('upload').value			= 'Max Images';
	}else{
		document.getElementById('image').disabled		= false;
		document.getElementById('upload').disabled	= false;
		document.getElementById('upload').value			= 'Upload Photo';		
	}

}
// -----------------------------------------------------------------------------



// =================================================================================================


















// SEARCH ==========================================================================================




// profile spec sheet --------------------------------------------------------------------
function search_UTILITY(page){


var INTERNAL_XMLHTTPOBJ = httpOBJCreator();





	if(page){
		var _offset	=	page;
	}else if(document.getElementById('search_current_page').value){
		var _offset	=	document.getElementById('search_current_page').value;
	}


	var _nudity		=	document.getElementById('search_nuditymode').value;


	// browse referred -------------------
	var _browse		=	document.getElementById('search_browse').value;


	// seek checkboxes -------------------
	if(document.getElementById('search_seek_m').checked == true){
		var seek_m	=	document.getElementById('search_seek_m').value;
	}else{
		var seek_m	=	'0';
	}

	if(document.getElementById('search_seek_w').checked == true){
		var seek_w	=	document.getElementById('search_seek_w').value;
	}else{
		var seek_w	=	'0';
	}

	if(document.getElementById('search_seek_t').checked == true){
		var seek_t	=	document.getElementById('search_seek_t').value;
	}else{
		var seek_t	=	'0';
	}

	if(document.getElementById('search_seek_c').checked == true){
		var seek_c	=	document.getElementById('search_seek_c').value;
	}else{
		var seek_c	=	'0';
	}
	// -----------------------------------


	// into checkboxes -------------------
	if(document.getElementById('search_into_friends').checked == true){
		var into_friends	=	document.getElementById('search_into_friends').value;
	}else{
		var into_friends	=	'0';
	}

	if(document.getElementById('search_into_flirting').checked == true){
		var into_flirting	=	document.getElementById('search_into_flirting').value;
	}else{
		var into_flirting	=	'0';
	}

	if(document.getElementById('search_into_sex').checked == true){
		var into_sex			=	document.getElementById('search_into_sex').value;
	}else{
		var into_sex			=	'0';
	}

	if(document.getElementById('search_into_relationship').checked == true){
		var into_relationship	=	document.getElementById('search_into_relationship').value;
	}else{
		var into_relationship	=	'0';
	}

	if(document.getElementById('search_into_fetish').checked == true){
		var into_fetish	=	document.getElementById('search_into_fetish').value;
	}else{
		var into_fetish	=	'0';
	}
	// -----------------------------------


	// into checkboxes -------------------
	if(document.getElementById('search_option_onlinenow').checked == true){
		var option_onlinenow	=	document.getElementById('search_option_onlinenow').value;
	}else{
		var option_onlinenow	=	'0';
	}

	if(document.getElementById('search_option_memberwpics').checked == true){
		var option_memberwpics	=	document.getElementById('search_option_memberwpics').value;
	}else{
		var option_memberwpics	=	'0';
	}

	if(document.getElementById('search_option_verifiedpics').checked == true){
		var option_verifiedpics			=	document.getElementById('search_option_verifiedpics').value;
	}else{
		var option_verifiedpics			=	'0';
	}
	// -----------------------------------



	var _gender		= document.getElementById('search_gender').value;
	var _zipcode	= document.getElementById('search_zipcode').value;
	var _seeking	=	seek_m + seek_w + seek_t + seek_c;
	var _interest	= into_friends + into_flirting + into_sex + into_relationship + into_fetish;
	var _agerange	= document.getElementById('search-agemin').value + document.getElementById('search-agemax').value;
	var _options	= option_onlinenow + option_memberwpics + option_verifiedpics;

	var _uid			= document.getElementById('search_current_userid').value;



	if(_gender !== ""){

 		//change DIV to "searching" ------------------
		document.getElementById('search_results_window').innerHTML = '<table cellpadding=\"0\" cellspacing=\"0\" width=100%><td align=left><img src=\"/common/img/icons/icon_search_small.png\"></td> <td width=\"25\"></td> <td align=middle><b><font color=\"#146ADB\" face=arial size=6>Searching...</b></font></td></table>';

		var target_url 	= 'common/js/search/ajax-search.php';

		if(!_browse){

			//window.location.replace("Search");
  		if(_offset){
  			//var url = 'common/js/search/ajax-search.php?_gender=' + _gender + '&_zipcode=' + _zipcode + '&_seeking=' + _seeking + '&_interest=' + _interest + '&_agerange=' + _agerange + '&_options=' + _options + '&_offset=' + _offset + '&_uid=' + _uid + '&_nudity=' + _nudity;
  			var params 	= '_function=ajax.search&_gender=' + _gender + '&_zipcode=' + _zipcode + '&_seeking=' + _seeking + '&_interest=' + _interest + '&_agerange=' + _agerange + '&_options=' + _options + '&_offset=' + _offset + '&_uid=' + _uid + '&_nudity=' + _nudity;
  			
  		}else{
  			//var url = 'common/js/search/ajax-search.php?_gender=' + _gender + '&_zipcode=' + _zipcode + '&_seeking=' + _seeking + '&_interest=' + _interest + '&_agerange=' + _agerange + '&_options=' + _options + '&_uid=' + _uid + '&_nudity=' + _nudity;
  			var params 	= '_function=ajax.search&_gender=' + _gender + '&_zipcode=' + _zipcode + '&_seeking=' + _seeking + '&_interest=' + _interest + '&_agerange=' + _agerange + '&_options=' + _options + '&_uid=' + _uid + '&_nudity=' + _nudity;

  		}

		}else{
			//window.location.replace("Search");
			if(_offset){
				//var url = 'common/js/search/ajax-search.php?_gender=' + _gender + '&_zipcode=' + _zipcode + '&_seeking=' + _seeking + '&_interest=' + _interest + '&_agerange=' + _agerange + '&_options=' + _options + '&_uid=' + _uid + '&_nudity=' + _nudity + '&_browse=' + _browse + '&_offset=' + _offset;
				var params 	= '_function=ajax.search&_gender=' + _gender + '&_zipcode=' + _zipcode + '&_seeking=' + _seeking + '&_interest=' + _interest + '&_agerange=' + _agerange + '&_options=' + _options + '&_uid=' + _uid + '&_nudity=' + _nudity + '&_browse=' + _browse + '&_offset=' + _offset;
			}else{
				//var url = 'common/js/search/ajax-search.php?_gender=' + _gender + '&_zipcode=' + _zipcode + '&_seeking=' + _seeking + '&_interest=' + _interest + '&_agerange=' + _agerange + '&_options=' + _options + '&_uid=' + _uid + '&_nudity=' + _nudity + '&_browse=' + _browse;
				var params 	= '_function=ajax.search&_gender=' + _gender + '&_zipcode=' + _zipcode + '&_seeking=' + _seeking + '&_interest=' + _interest + '&_agerange=' + _agerange + '&_options=' + _options + '&_uid=' + _uid + '&_nudity=' + _nudity + '&_browse=' + _browse;
			}
		}





		INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
		INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
		INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");

	

		//alert(url);

 		//open URL async -----------------------------
		//INTERNAL_XMLHTTPOBJ.open('GET', url, true);
  
  	//check for query result ---------------------
		INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){
	
		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){

    	//content retrieved from query code --------
			document.getElementById('search_results_window').innerHTML = INTERNAL_XMLHTTPOBJ.responseText + ' ';
			
				if(INTERNAL_XMLHTTPOBJ.responseText == '<table cellpadding="0" cellspacing="0"><td><img src="/common/img/icons/icon_success_small.png"></td> <td width="5"></td> <td><b><font color=#12A805>Updated!</b></font></td></table>'){
					//emailOk = 1;
					//submitenable();
				}

		}else{
    
    	//if error || no response say this ---------
			document.getElementById('search_results_window').innerHTML = '<table cellpadding=\"1\" cellspacing=\"0\" border=0 width=100%><td align=right></td> <td width=\"25\"></td> <td align=middle> <div style="border: 3px solid #000000; width: 400px;"><table bgcolor=white width="400" cellpadding=8 cellspacing=5><tr><td><b><font color=\"#146ADB\" face=arial size=6>Searching / Loading...</b></font></td></tr><tr><td><img src="http://egenerations.com/common/img/progress_bar.gif"></td></tr></table></div>  </td></table>';
		}

	};
		INTERNAL_XMLHTTPOBJ.send(params);
	}


}
// END search ============================================================================






// clear and recall defaults to inputs --------------------------------------------

















// Profile Editor ==================================================================================











// profile spec sheet --------------------------------------------------------------------
function UpdateEmailAddress(){

	var UpdateEM_eaddr		=	document.getElementById('member.email.update.address').value;
	var UpdateEM_Token		=	document.getElementById('member.email.update.token').value;
	var UpdateEM_UIDP			=	document.getElementById('_userid_private').value;



	var target_url				= 'execute';
	var params 						= '_function=ajax.email.update&UpdateEM_eaddr=' + UpdateEM_eaddr + '&UpdateEM_Token=' + UpdateEM_Token + '&UpdateEM_UIDP=' + UpdateEM_UIDP;


	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
	INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Pragma", "no-cache");
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");


	INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){

	if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
	//alert(INTERNAL_XMLHTTPOBJ.responseText);
	var XHR_Result = INTERNAL_XMLHTTPOBJ.responseText;
	
	
		switch(parseInt(XHR_Result)){
			case 666:
				document.getElementById('member.email.update.address').style.backgroundColor	='#fb6818';
				alert('Error: Please Retry');
			break;

			case 111:
				document.getElementById('member.email.update.address').style.backgroundColor	='#d1ffc5';
				alert('E-Mail Updated & New Activation Sent');
			break;

			case 664:
				document.getElementById('member.email.update.address').style.backgroundColor	='#fb6818';
				alert('That Address is Taken');
			break;

			case 665:
				document.getElementById('member.email.update.address').style.backgroundColor	='#fb6818';
				alert('Error - Close Browser & Revisit');
			break;

		}
		
		


	}else{
		
	}
};
	INTERNAL_XMLHTTPOBJ.send(params);


}
// ---------------------------------------------------------------------------------------











// profile spec sheet --------------------------------------------------------------------
function SaveMyGiftBoxAddress(){
	
	var GiftGet_name			=	document.getElementById('GiftGet.name').value;
	var GiftGet_address1	=	document.getElementById('GiftGet.address1').value;
	var GiftGet_address2	=	document.getElementById('GiftGet.address2').value;
	var GiftGet_city			=	document.getElementById('GiftGet.city').value;
	var GiftGet_state			=	document.getElementById('GiftGet.state').value;
	var GiftGet_zipcode		=	document.getElementById('GiftGet.zipcode').value;
	var GiftGet_Token			=	document.getElementById('GiftGet.saveToken').value;
	var GiftGet_UIDP			=	document.getElementById('_userid_private').value;



	var target_url				= 'execute';
	var params 						= '_function=ajax.giftbox.destination&GiftGet_name=' + GiftGet_name + '&GiftGet_address1=' + GiftGet_address1 + '&GiftGet_address2=' + GiftGet_address2 + '&GiftGet_city=' + GiftGet_city + '&GiftGet_state=' + GiftGet_state + '&GiftGet_zipcode=' + GiftGet_zipcode + '&GiftGet_Token=' + GiftGet_Token + '&GiftGet_UIDP=' + GiftGet_UIDP;


	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
	INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Pragma", "no-cache");
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");


	INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){

	if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){

		if(INTERNAL_XMLHTTPOBJ.responseText == 666){
			alert('Error: Please Retry');
		}else if(INTERNAL_XMLHTTPOBJ.responseText == 111){
			alert('Information Encrypted & Stored Securely');
			document.getElementById('GiftGet.name').style.backgroundColor	='#d1ffc5';
			document.getElementById('GiftGet.address1').style.backgroundColor	='#d1ffc5';
			document.getElementById('GiftGet.address2').style.backgroundColor	='#d1ffc5';
			document.getElementById('GiftGet.city').style.backgroundColor	='#d1ffc5';
			document.getElementById('GiftGet.state').style.backgroundColor	='#d1ffc5';
			document.getElementById('GiftGet.zipcode').style.backgroundColor	='#d1ffc5';
		}


	}else{
		
	}
};
	INTERNAL_XMLHTTPOBJ.send(params);


}
// ---------------------------------------------------------------------------------------







// profile spec sheet --------------------------------------------------------------------
function profile_EDITOR(element, elementNumber){

//alert(elementNumber);
	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	var profile_gender			=	document.getElementById('profile_gender').value;
	
	var ProfileEditToken		=	document.getElementById('ProfileEditToken').value;




 	// horns or halo --------------------------------------------------------------
 	
 	//var profile-fantasy_twogirls	=	document.getElementById('profile-fantasy_twogirls').checked;
 	//var profile-fantasy_twoguys		=	document.getElementById('profile-fantasy_twoguys').checked;
 	
 	
 	
 	if(document.getElementById('profile-fantasy_twoguys').checked || document.getElementById('profile-fantasy_twogirls').checked || document.getElementById('profile-fantasy_dominatrix').checked || document.getElementById('profile-fantasy_illegal').checked){
		document.getElementById('profile-container').style.backgroundColor	=	'#000000';
		document.getElementById('profile-container_halohorns').innerHTML		=	'<img src="/common/img/bling/horns/horns1.png">';
		document.getElementById('profile-container_halohorns').style.left		=	'-8px';
		document.getElementById('profile-container_halohorns').style.top		=	'-55px';
		document.getElementById('profile-titlebar-text').style.color				=	'#ffffff';
		document.getElementById('profile-agegender-text').style.color				=	'#ffffff';
		document.getElementById('profile-location-text').style.color				=	'#ffffff';
		document.getElementById('profile-fantasy_data-text').style.color		=	'#ffffff';
		document.getElementById('profile-fantasy_title-text').style.color		=	'#ffffff';
		document.getElementById('profile-turnon_title-text').style.color		=	'#ffffff';
		document.getElementById('profile-turnon_data-text').style.color			=	'#ffffff';


		document.getElementById('profile-container').style.border	=	'1px solid #ffffff';
		document.getElementById('profile-avatar').style.border	=	'1px solid #ffffff';		
		document.getElementById('profile-morepictures').style.border	=	'1px solid #ffffff';

		document.getElementById('profile-morepictures_title-text').style.color			=	'#ffffff';

	}else{
		document.getElementById('profile-container').style.backgroundColor	='#ffffff';
		document.getElementById('profile-container_halohorns').innerHTML		=	'<img src="/common/img/bling/halo/halo3.png">';
		document.getElementById('profile-container_halohorns').style.left		=	'-1px';
		document.getElementById('profile-container_halohorns').style.top		=	'-52px';
		document.getElementById('profile-titlebar-text').style.color				=	'#000000';
		document.getElementById('profile-agegender-text').style.color				=	'#000000';
		document.getElementById('profile-location-text').style.color				=	'#000000';
		document.getElementById('profile-fantasy_data-text').style.color		=	'#000000';
		document.getElementById('profile-fantasy_title-text').style.color		=	'#000000';
		document.getElementById('profile-turnon_title-text').style.color		=	'#000000';
		document.getElementById('profile-turnon_data-text').style.color			=	'#000000';

		document.getElementById('profile-container').style.border	=	'1px solid #000000';
		document.getElementById('profile-avatar').style.border	=	'1px solid #000000';
		document.getElementById('profile-morepictures').style.border	=	'1px solid #000000';

		document.getElementById('profile-morepictures_title-text').style.color			=	'#000000';


	}
	// ---------------------------------------------------------------------------












	//checkbox limitation ------------------
	if( chkcontrol_fantasies(elementNumber) == false || chkcontrol_turnons(elementNumber) == false || chkcontrol_badness(elementNumber) == false){
		
		// do nothing 
		
	}else{

		// core code to the data save ------------------
  	var userID 			= document.getElementById('profile-userid').value;
  	var formElement	= element;
  
  	// smoking -------------------------------------------------------------------
  	if(formElement == 'smoke_dont'){
  		formElement	= 'smoke_do';
  	}
  	// ---------------------------------------------------------------------------
  
  	// drinking ------------------------------------------------------------------
  	if(formElement == 'drink_dont'){
  		formElement	= 'drink_do';
  	}
  	// ---------------------------------------------------------------------------
  
  	// tattoos -------------------------------------------------------------------
  	if(formElement == 'tattoo_dont'){
  		formElement	= 'tattoo_have';
  	}
  	// ---------------------------------------------------------------------------
  
  	// piercings -----------------------------------------------------------------
  	if(formElement == 'piercings_dont'){
  		formElement	= 'piercings_have';
  	}
  	// ---------------------------------------------------------------------------	
  
  	// worst trait ---------------------------------------------------------------
  	if(formElement == 'worsttrait_1' || formElement == 'worsttrait_2' || formElement == 'worsttrait_3' || formElement == 'worsttrait_4' || formElement == 'worsttrait_5' || formElement == 'worsttrait_6' || formElement == 'worsttrait_7' || formElement == 'worsttrait_8'){
  		formElement	= 'worsttrait';
  	}
  	// ---------------------------------------------------------------------------	





  	
  	// best trait ---------------------------------------------------------------
  	if(formElement == 'besttrait_1' || formElement == 'besttrait_2' || formElement == 'besttrait_3' || formElement == 'besttrait_4' || formElement == 'besttrait_5' || formElement == 'besttrait_6' || formElement == 'besttrait_7' || formElement == 'besttrait_8'){



		switch(formElement){


			// personality ---------------------
			case('besttrait_8'):

				var ImageChoiceFemale	=	new Array();
				ImageChoiceFemale[0]	=	'<img src="/common/img/miniprofile-backgrounds/f-personality-1.png">';
				ImageChoiceFemale[1]	=	'<img src="/common/img/miniprofile-backgrounds/f-personality-2.png">';
				ImageChoiceFemale[2]	=	'<img src="/common/img/miniprofile-backgrounds/f-personality-3.png">';
				ImageChoiceFemale[3]	=	'<img src="/common/img/miniprofile-backgrounds/f-personality-4.png">';

				var ImageChoiceMale		=	new Array();
				ImageChoiceMale[0]		=	'<img src="/common/img/miniprofile-backgrounds/m-personality-1.png">';
				ImageChoiceMale[1]		=	'<img src="/common/img/miniprofile-backgrounds/m-personality-2.png">';
				ImageChoiceMale[2]		=	'<img src="/common/img/miniprofile-backgrounds/m-personality-3.png">';
				ImageChoiceMale[3]		=	'<img src="/common/img/miniprofile-backgrounds/m-personality-4.png">';


				if(profile_gender == 1){
					var	profile_subprofile_image	=	ImageChoiceMale[Math.round(Math.random()*3)];
				}else{
					var	profile_subprofile_image	=	ImageChoiceFemale[Math.round(Math.random()*3)];
				}
				
				document.getElementById('profile-container_specialbgimage').innerHTML = profile_subprofile_image;

			break;
			// ---------------------------------



			// legs --------------------------
			case('besttrait_7'):

				var ImageChoiceFemale	=	new Array();
				ImageChoiceFemale[0]	=	'<img src="/common/img/miniprofile-backgrounds/f-legs-1.png">';
				ImageChoiceFemale[1]	=	'<img src="/common/img/miniprofile-backgrounds/f-legs-2.png">';
				ImageChoiceFemale[2]	=	'<img src="/common/img/miniprofile-backgrounds/f-legs-3.png">';
				ImageChoiceFemale[3]	=	'<img src="/common/img/miniprofile-backgrounds/f-legs-4.png">';
				ImageChoiceFemale[4]	=	'<img src="/common/img/miniprofile-backgrounds/f-legs-5.png">';

				var ImageChoiceMale	=	new Array();
				ImageChoiceMale[0]		=	'<img src="/common/img/miniprofile-backgrounds/m-legs-1.png">';
				ImageChoiceMale[1]		=	'<img src="/common/img/miniprofile-backgrounds/m-legs-2.png">';

				if(profile_gender == 1){
					var	profile_subprofile_image	=	ImageChoiceMale[Math.round(Math.random()*1)];
				}else{
					var	profile_subprofile_image	=	ImageChoiceFemale[Math.round(Math.random()*4)];
				}
				
				document.getElementById('profile-container_specialbgimage').innerHTML = profile_subprofile_image;

			break;
			// ---------------------------------



			// chest ---------------------------
			case('besttrait_6'):


				var ImageChoiceMale	=	new Array();
				ImageChoiceMale[0]	=	'<img src="/common/img/miniprofile-backgrounds/m-chest-1.png">';
				ImageChoiceMale[1]	=	'<img src="/common/img/miniprofile-backgrounds/m-chest-2.png">';
				ImageChoiceMale[2]	=	'<img src="/common/img/miniprofile-backgrounds/m-chest-3.png">';

				var ImageChoiceFemale	=	new Array();
				ImageChoiceFemale[0]	=	'<img src="/common/img/miniprofile-backgrounds/f-chest-1.png">';
				ImageChoiceFemale[1]	=	'<img src="/common/img/miniprofile-backgrounds/f-chest-2.png">';


				if(profile_gender == 1){
					var	profile_subprofile_image	=	ImageChoiceMale[Math.round(Math.random()*2)];
				}else{
					var	profile_subprofile_image	=	ImageChoiceFemale[Math.round(Math.random()*1)];
				}

				document.getElementById('profile-container_specialbgimage').innerHTML = profile_subprofile_image;

			break;
			// ---------------------------------
			
			
			
			
			// butt ----------------------------
			case('besttrait_5'):

				var ImageChoiceFemale	=	new Array();
				ImageChoiceFemale[0]	=	'<img src="/common/img/miniprofile-backgrounds/f-butt-1.png">';
				ImageChoiceFemale[1]	=	'<img src="/common/img/miniprofile-backgrounds/f-butt-2.png">';
				ImageChoiceFemale[2]	=	'<img src="/common/img/miniprofile-backgrounds/f-butt-3.png">';

				var ImageChoiceMale	=	new Array();
				ImageChoiceMale[0]	=	'<img src="/common/img/miniprofile-backgrounds/m-butt-1.png">';
				ImageChoiceMale[1]	=	'<img src="/common/img/miniprofile-backgrounds/m-butt-2.png">';

				if(profile_gender == 1){
					var	profile_subprofile_image	=	ImageChoiceMale[Math.round(Math.random()*2)];
					
				}else{
					var	profile_subprofile_image	=	ImageChoiceFemale[Math.round(Math.random()*2)];
				}
				
				document.getElementById('profile-container_specialbgimage').innerHTML = profile_subprofile_image;


			break;
			// ---------------------------------




			// sensuality ----------------------
			case('besttrait_4'):

				var ImageChoiceFemale	=	new Array();
				ImageChoiceFemale[0]	=	'<img src="/common/img/miniprofile-backgrounds/f-sensuality-1.png">';
				ImageChoiceFemale[1]	=	'<img src="/common/img/miniprofile-backgrounds/f-sensuality-2.png">';
				ImageChoiceFemale[2]	=	'<img src="/common/img/miniprofile-backgrounds/f-sensuality-3.png">';

				var ImageChoiceMale	=	new Array();
				ImageChoiceMale[0]	=	'<img src="/common/img/miniprofile-backgrounds/m-sensuality-1.png">';
				ImageChoiceMale[1]	=	'<img src="/common/img/miniprofile-backgrounds/m-sensuality-2.png">';

				if(profile_gender == 1){
					var	profile_subprofile_image	=	ImageChoiceMale[Math.round(Math.random()*1)];
				}else{
					var	profile_subprofile_image	=	ImageChoiceFemale[Math.round(Math.random()*2)];
				}
				
				document.getElementById('profile-container_specialbgimage').innerHTML = profile_subprofile_image;

			break;
			// ---------------------------------


			// money ---------------------------
			case('besttrait_3'):

				var	profile_subprofile_image	=	'<img src="/common/img/miniprofile-backgrounds/money.png">';
				
				document.getElementById('profile-container_specialbgimage').innerHTML = profile_subprofile_image;

			break;
			// ---------------------------------


			// brain ---------------------------
			case('besttrait_2'):

				var ImageChoice	=	new Array();
				ImageChoice[0]	=	'<img src="/common/img/miniprofile-backgrounds/brain-1.png">';
				ImageChoice[1]	=	'<img src="/common/img/miniprofile-backgrounds/brain-2.png">';


				var	profile_subprofile_image	=	ImageChoice[Math.round(Math.random()*1)];
				
				document.getElementById('profile-container_specialbgimage').innerHTML = profile_subprofile_image;

			break;
			// ---------------------------------


			// body ----------------------------
			case('besttrait_1'):

				var ImageChoiceMale	=	new Array();
				ImageChoiceMale[0]	=	'<img src="/common/img/miniprofile-backgrounds/m-body-1.png">';
				ImageChoiceMale[1]	=	'<img src="/common/img/miniprofile-backgrounds/m-body-2.png">';
				ImageChoiceMale[2]	=	'<img src="/common/img/miniprofile-backgrounds/m-body-3.png">';
				ImageChoiceMale[3]	=	'<img src="/common/img/miniprofile-backgrounds/m-body-4.png">';

				var ImageChoiceFemale	=	new Array();
				ImageChoiceFemale[0]	=	'<img src="/common/img/miniprofile-backgrounds/f-body-1.png">';
				ImageChoiceFemale[1]	=	'<img src="/common/img/miniprofile-backgrounds/f-body-2.png">';


			if(profile_gender == 1){
				var	profile_subprofile_image	=	ImageChoiceMale[Math.round(Math.random()*3)];

			}else if(profile_gender == 2){
				var	profile_subprofile_image	=	ImageChoiceFemale[Math.round(Math.random()*1)];
			
			}else if(profile_gender == 3){
				var	profile_subprofile_image	=	'<img src="/common/img/miniprofile-backgrounds/body-transexual.png">';
			
			}else if(profile_gender == 4){
				var	profile_subprofile_image	=	'<img src="/common/img/miniprofile-backgrounds/body-couples-groups.png">';
			}

			document.getElementById('profile-container_specialbgimage').innerHTML = profile_subprofile_image;
			break;
			// ---------------------------------


		}


  		formElement	= 'besttrait';
  	}
  	// ---------------------------------------------------------------------------	
  	
  	
  	var formValueA 	= document.getElementById('profile-' + element).value;

  	
  	if(element == 'aboutme' || element == 'aboutyou'){
  		//var updateDIV		= 'datasave-profile-essay';
  		var updateDIV		= 'datasave-profile';
  		switch(element){
  			case 'aboutme':
  				document.getElementById('profile-aboutme.pending').innerHTML = '<font color="orange"><i>Pending Approval</i></font>';	
  			break;
  			case 'aboutyou':
  				document.getElementById('profile-aboutyou.pending').innerHTML = '<font color="orange"><i>Pending Approval</i></font>';	
  			break;  			
  		}
  		
  	}else{
  		var updateDIV		= 'datasave-profile';
  	}
  
  
  	// birth date ----------------------------------------------------------------
  	if(formElement == 'birthmonth' || formElement == 'birthday' || formElement == 'birthyear'){
  
  		switch(formElement){
  			
  			case('birthmonth'):
  				var month	 	= formValueA;
  				var day 		= document.getElementById('profile-birthday').value;
  				var year 		= document.getElementById('profile-birthyear').value;
  				formValueA 	= mktime(0,0,0,month, day, year);
  			break;
  
  			case('birthday'):
  				var month	 	= document.getElementById('profile-birthmonth').value;
  				var day 		= formValueA;
  				var year 		= document.getElementById('profile-birthyear').value;
  				formValueA 	= mktime(0,0,0,month, day, year);
  			break;
  
  			case('birthyear'):
  				var month	 	= document.getElementById('profile-birthmonth').value;
  				var day 		= document.getElementById('profile-birthday').value;
  				var year 		= formValueA;
  				formValueA 	= mktime(0,0,0,month, day, year);
  			break;
  
  			default:
  
  			break;
  		}
		// ---------------------------------------------
	}
	
	
	
	
	
	
	

	if(formValueA !== ""){

		document.getElementById(updateDIV).innerHTML = '<table cellpadding=\"0\" cellspacing=\"0\"><td><img src=\"/common/img/icons/icon_search_small.png\"></td> <td width=\"5\"></td> <td><b><font color=\"#146ADB\" face=arial>Updating...</b></font></td></table>';
			
  	//set URL & query ----------------------------
		//var url = 'common/js/profile-editor/ajax-profile-edit.php?value=' + formValueA + '&userID=' + userID + '&key=' + formElement;


		var target_url 					= 'execute';
		var params 							= '_function=ajax.profile.editor&value=' + formValueA + '&userID=' + userID + '&key=' + formElement + '&ProfileEditToken=' + ProfileEditToken;

		INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
		INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
		INTERNAL_XMLHTTPOBJ.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
		INTERNAL_XMLHTTPOBJ.setRequestHeader("Pragma", "no-cache");
		INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");


		INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){
	
		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){

			document.getElementById(updateDIV).innerHTML = INTERNAL_XMLHTTPOBJ.responseText + ' ';
			
				if(INTERNAL_XMLHTTPOBJ.responseText == '<table cellpadding="0" cellspacing="0"><td><img src="/common/img/icons/icon_success_small.png"></td> <td width="5"></td> <td><b><font color=#12A805>Updated!</b></font></td></table>'){
					//emailOk = 1;
					//submitenable();
				}

		}else{
			document.getElementById(updateDIV).innerHTML = '<table cellpadding=\"0\" cellspacing=\"0\"><td><img src=\"/common/img/icons/icon_search_small.png\"></td> <td width=\"5\"></td> <td><b><font color=\"#146ADB\" face=arial>Updating...</b></font></td></table>';
		}
	};
		INTERNAL_XMLHTTPOBJ.send(params);
	}

	
	
	}
	// ---------------------------------------------------------------------------





}
// ---------------------------------------------------------------------------------------
























// ---------------------------------------------------------------------------------------
function mktime() {
    // http://kevin.vanzonneveld.net
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: baris ozdil
    // +      input by: gabriel paderni 
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: FGFEmperor
    // +      input by: Yannoo
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: jakes
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // *     example 1: mktime(14, 10, 2, 2, 1, 2008);
    // *     returns 1: 1201871402
    // *     example 2: mktime(0, 0, 0, 0, 1, 2008);
    // *     returns 2: 1196463600
    
    var no, ma = 0, mb = 0, i = 0, d = new Date(), argv = arguments, argc = argv.length;
    d.setHours(0,0,0); d.setDate(1); d.setMonth(1); d.setYear(1972);
 
    var dateManip = {
        0: function(tt){ return d.setHours(tt); },
        1: function(tt){ return d.setMinutes(tt); },
        2: function(tt){ set = d.setSeconds(tt); mb = d.getDate() - 1; return set; },
        3: function(tt){ set = d.setMonth(parseInt(tt)-1); ma = d.getFullYear() - 1972; return set; },
        4: function(tt){ return d.setDate(tt+mb); },
        5: function(tt){ return d.setYear(tt+ma); }
    };
    
    for( i = 0; i < argc; i++ ){
        no = parseInt(argv[i]*1);
        if (isNaN(no)) {
            return false;
        } else {
            // arg is number, let's manipulate date object
            if(!dateManip[i](no)){
                // failed
                return false;
            }
        }
    }
 
    return Math.floor(d.getTime()/1000);
}
// ---------------------------------------------------------------------------------------






// chkbox limitation ---------------------------------------------------------------------
 function chkcontrol_fantasies(en){

   var total=0;


   for(var i=0; i < document.form_fantasy.profilefantasy.length; i++){
   
     if(document.form_fantasy.profilefantasy[i].checked){
     	total = total +1;
     }
     
     if(total > 5){
     	alert("Woah! Only 5 Fantasies Please") 
     	document.form_fantasy.profilefantasy[en].checked = false ;
     	return false;
     }
   }
 }
// ---------------------------------------------------------------------------------------



// chkbox limitation ---------------------------------------------------------------------
 function chkcontrol_turnons(en){

   var total=0;
   


   for(var i=0; i < document.form_turnon.profileturnon.length; i++){
   
     if(document.form_turnon.profileturnon[i].checked){
     	total = total +1;
     	//alert(total);
     }
     
     if(total > 6){
     	alert("Yipes! Maximum of 6 Turn-Ons Please") 
     	document.form_turnon.profileturnon[en].checked = false ;
     	return false;
     }
   }
 }
// ---------------------------------------------------------------------------------------


// chkbox limitation ---------------------------------------------------------------------
 function chkcontrol_badness(en){

   var total=0;

   for(var i=0; i < document.form_badness.profilenaughtyskill_badness.length; i++){
   
     if(document.form_badness.profilenaughtyskill_badness[i].checked){
     	total = total +1;
     	//alert(total);
     }
     
     if(total > 3){
     	document.form_badness.profilenaughtyskill_badness[en].checked = false ;
     	alert("Maximum of 3 Badnesses Please") 
     	return false;
     }
   }
   

   
 }
// ---------------------------------------------------------------------------------------












// Account/Profile Settings ========================================================================




// profile general settings --------------------------------------------------------------
function profile_SETTINGS(_key){

	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	var _userID 						= null;
	var _value 							= null;



	if(document.getElementById('_userid_private').value){
		var _userID 						= document.getElementById('_userid_private').value;
	}else{
		var _userID 						= document.getElementById('profile_settings_userid').value;
	}


	var _value								= document.getElementById(_key + '_activesetting_hfield').value;
//alert(_value);
	// set to opposite of current --------
	if(_value == 1){
		_value = 0;
	}else if(_value == 0){
		_value = 1;
	}
	// -----------------------------------


	var target_url 					= 'execute';
	var params 							= '_function=ajax.account.settings&_userID=' + _userID + '&_key=' + _key + '&_value=' + _value;

	INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
	INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
	//INTERNAL_XMLHTTPOBJ.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
	//INTERNAL_XMLHTTPOBJ.setRequestHeader("Pragma", "no-cache");
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");


		//INTERNAL_XMLHTTPOBJ.open('GET', target_url, true);
		INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){
	
  		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){

  			if(INTERNAL_XMLHTTPOBJ.responseText != 'fail'){
  				

        	switch(_key){

        		case 'profile_setting_nudity':
        			if(INTERNAL_XMLHTTPOBJ.responseText == 1){
        				document.getElementById('profile_setting_nudity_button').value 							= 'No';
        				document.getElementById('profile_setting_nudity_activesetting').innerHTML 	= '<img src="/common/img/icons/icon_20x20_greencheck.png"> Nudity <font color="red">Enabled</font>';
        				document.getElementById('nav_current_setting_safemode').innerHTML 					= '<table cellpadding="0" cellspacing="0"><tr><td align="left" width="70"><a href="http://friendsnflings.com/MyStuff"><font style="font-size: 11px; color: #ffffff; font-style: bold;">View Nudity</td> <td width="5"></td> <td><font style="font-size: 11px; color: #24ff00;">YES</font></td></tr></table>';
        			}else if(INTERNAL_XMLHTTPOBJ.responseText == 0){
        				document.getElementById('profile_setting_nudity_button').value 							= 'Yes';
        				document.getElementById('profile_setting_nudity_activesetting').innerHTML 	= '<img src="/common/img/icons/icon_20x20_redx.png"> Nudity <font color="red">Disabled</font>';
        				document.getElementById('nav_current_setting_safemode').innerHTML 					= '<table cellpadding="0" cellspacing="0"><tr><td align="left" width="70"><a href="http://friendsnflings.com/MyStuff"><font style="font-size: 11px; color: #ffffff; font-style: bold;">View Nudity</td> <td width="5"></td> <td><font style="font-size: 11px; color: #ff6c00;">NO</font></td></tr></table>';
	       			}
	       		break;


        		case 'profile_setting_graphics':
        			if(INTERNAL_XMLHTTPOBJ.responseText == 1){
        				document.getElementById('profile_setting_graphics_button').value 							= 'Minimum';
        				document.getElementById('profile_setting_graphics_activesetting').innerHTML 	= '<img src="/common/img/icons/icon_20x20_greencheck.png"> Maximum <font color="red">Enabled</font>';
        			}else{
        				document.getElementById('profile_setting_graphics_button').value 							= 'Maximum';
        				document.getElementById('profile_setting_graphics_activesetting').innerHTML 	= '<img src="/common/img/icons/icon_20x20_redx.png"> Maximum <font color="red">Disabled</font>';
        			}
        		break;


        		case 'profile_setting_discreet':
        			if(INTERNAL_XMLHTTPOBJ.responseText == 1){
        				document.getElementById('profile_setting_discreet_button').value 							= 'Turn Off';
        				document.getElementById('profile_setting_discreet_activesetting').innerHTML 	= '<img src="/common/img/icons/icon_20x20_greencheck.png"> Discreet <font color="red">Enabled</font>';
        				document.getElementById('nav_current_setting_discreetmode').innerHTML					= '<table cellpadding="0" cellspacing="0"><tr><td align="left" width="70"><a href="http://friendsnflings.com/MyStuff"><font style="font-size: 11px; color: #ffffff; font-style: bold;">Discreet Mode</td> <td width="5"></td> <td><font style="font-size: 11px; color: #24ff00;">ON</font></td></tr></table>';
        			}else{
        				document.getElementById('profile_setting_discreet_button').value 							= 'Turn On';
        				document.getElementById('profile_setting_discreet_activesetting').innerHTML 	= '<img src="/common/img/icons/icon_20x20_redx.png"> Discreet <font color="red">Disabled</font>';
        				document.getElementById('nav_current_setting_discreetmode').innerHTML					= '<table cellpadding="0" cellspacing="0"><tr><td align="left" width="70"><a href="http://friendsnflings.com/MyStuff"><font style="font-size: 11px; color: #ffffff; font-style: bold;">Discreet Mode</td> <td width="5"></td> <td><font style="font-size: 11px; color: #ff6c00;">OFF</font></td></tr></table>';
        			}
        		break;


        		case 'profile_setting_im_availability':
        			if(INTERNAL_XMLHTTPOBJ.responseText == 1){
        				//document.getElementById('profile_setting_discreet_button').value 							= 'Turn Off';
        				//document.getElementById('profile_setting_discreet_activesetting').innerHTML 	= '<img src="/common/img/icons/icon_20x20_greencheck.png"> Discreet <font color="red">Enabled</font>';
        				document.getElementById('nav_current_setting_instantmessenger').innerHTML			= '<table cellpadding="0" cellspacing="0"><tr><td align="left" width="70"><a onclick="profile_SETTINGS(\'profile_setting_im_availability\');"><font style="font-size: 11px; color: #ffffff; font-style: bold; cursor: pointer;">IM Status</td> <td width="5"></td> <td><font style="font-size: 11px; color: #24ff00;">AVAILABLE</font></td></tr></table>';
        			}else{
        				//document.getElementById('profile_setting_discreet_button').value 							= 'Turn On';
        				//document.getElementById('profile_setting_discreet_activesetting').innerHTML 	= '<img src="/common/img/icons/icon_20x20_redx.png"> Discreet <font color="red">Disabled</font>';
        				document.getElementById('nav_current_setting_instantmessenger').innerHTML			= '<table cellpadding="0" cellspacing="0"><tr><td align="left" width="70"><a onclick="profile_SETTINGS(\'profile_setting_im_availability\');"><font style="font-size: 11px; color: #ffffff; font-style: bold; cursor: pointer;">IM Status</td> <td width="5"></td> <td><font style="font-size: 11px; color: #ff6c00;">UNAVAILABLE</font></td></tr></table>';
        			}
        		break;


        		case 'profile_setting_disable':
        			if(INTERNAL_XMLHTTPOBJ.responseText == 1){
        				document.getElementById('profile_setting_disable_button').value 							= 'Show';
        				document.getElementById('profile_setting_disable_activesetting').innerHTML 		= '<img src="/common/img/icons/icon_20x20_redx.png"> Profile <font color="red">n</font>';
        			}else{
        				document.getElementById('profile_setting_disable_button').value 							= 'Hide';
        				document.getElementById('profile_setting_disable_activesetting').innerHTML 		= '<img src="/common/img/icons/icon_20x20_greencheck.png"> Profile <font color="red">Displayed</font>';
        			}
        		break;

        		case 'profile_setting_mailnotifier':
        			if(INTERNAL_XMLHTTPOBJ.responseText == 1){
        				document.getElementById('profile_setting_mailnotifier_button').value 						= 'Don\'t Send';
        				document.getElementById('profile_setting_mailnotifier_activesetting').innerHTML = '<img src="/common/img/icons/icon_20x20_greencheck.png"> Notify <font color="red">Enabled</font>';
        			}else{
        				document.getElementById('profile_setting_mailnotifier_button').value 						= 'Send';
        				document.getElementById('profile_setting_mailnotifier_activesetting').innerHTML = '<img src="/common/img/icons/icon_20x20_redx.png"> Notify <font color="red">Disabled</font>';
        			}
        			//alert(xmlhttpProfileSettings.responseText);
        			
        		break;

        	}

					// set current value per latest update -----------
  				//document.getElementById(_key + '_activesetting').innerHTML 			= xmlhttpProfileSettings.responseText;
  				document.getElementById(_key + '_activesetting_hfield').value 	= INTERNAL_XMLHTTPOBJ.responseText;
  				//alert(_key);
  				//alert('out: ' + INTERNAL_XMLHTTPOBJ.responseText);
  			}else{
  				alert('Error: Please Try Again');
  			}

  		}else{
  			//document.getElementById('IM-scrollpane').innerHTML = xmlhttp.responseText + '!no go';
  			//alert('nothing');
  		}
		};
		INTERNAL_XMLHTTPOBJ.send(params);

}
// ---------------------------------------------------------------------------------------
















// HELP DESK =============================================================================



// helpdesk --------------------------------------------------------------------
function HelpDesk(){


	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();

	var _issueType				=	document.getElementById('_issueType').value;
	var _emailAddr				=	document.getElementById('_emailAddr').value;
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



































// EFFECTS & Utilities =============================================================================







// -----------------------------------------------------------------------------
function DivRollOver(divID, BGColorParameter, FontColorParameter){
	document.getElementById(divID).style.backgroundColor	=	BGColorParameter;
	document.getElementById(divID).style.color						=	FontColorParameter;
}
// -----------------------------------------------------------------------------









// -----------------------------------------------------------------------------
function flashDetect(){
	
  var MM_contentVersion = 6;
  var plugin = (navigator.mimeTypes && navigator.mimeTypes["application/x-shockwave-flash"]) ? navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin : 0;
  if ( plugin ) {
  		var words = navigator.plugins["Shockwave Flash"].description.split(" ");
  	    for (var i = 0; i < words.length; ++i)
  	    {
  		if (isNaN(parseInt(words[i])))
  		continue;
  		var MM_PluginVersion = words[i]; 
  	    }
  	var MM_FlashCanPlay = MM_PluginVersion >= MM_contentVersion;
  }
  else if (navigator.userAgent && navigator.userAgent.indexOf("MSIE")>=0 
     && (navigator.appVersion.indexOf("Win") != -1)) {
  	document.write('<SCR' + 'IPT LANGUAGE=VBScript\> \n'); //FS hide this from IE4.5 Mac by splitting the tag
  	document.write('on error resume next \n');
  	document.write('MM_FlashCanPlay = ( IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash." & MM_contentVersion)))\n');
  	document.write('</SCR' + 'IPT\> \n');
  }
  if ( MM_FlashCanPlay ) {
  	//alert('flash installed');
  	//document.getElementById("flashornot").value = 'Flash Installed';
  	
  } else{
  	document.getElementById("flashornot").value = 'Flash NOT Installed';
  	//alert('flash not installed');
  }
	
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





// -----------------------------------------------------------------------------
function clickclear(thisfield, defaulttext, color){
	if(thisfield.value == defaulttext){
		thisfield.value = "";
		if(!color){
			color = "8c332c";
		}
		thisfield.style.color = "#" + color;
	}
}
// -----------------------------------------------------------------------------


// -----------------------------------------------------------------------------
function clickrecall(thisfield, defaulttext, color){
	if(thisfield.value == ""){
		thisfield.value = defaulttext;
		if(!color){
			color = "8c332c";
		}
		thisfield.style.color = "#" + color;
	}
}
// -----------------------------------------------------------------------------




// Submit on Enter ===================================================
function submitViaEnter(evt){
	Evt 					= (evt) ? evt : event;
	var target 		= (evt.target) ? evt.target : evt.srcElement;
	var form 			= target;
	var charCode 	= (evt.charCode) ? evt.charCode :
	((evt.which) ? evt.which : evt.keyCode);
	if(charCode == 13){
		SendIM();
		return false;
	}

	return true;
}
// ===================================================================



// -------------------------------------
function onEnter(evt,frm) {
	var keyCode = null;
	if(evt.which){
		keyCode = evt.which;
	}else if(evt.keyCode){
		keyCode = evt.keyCode;
	}
	
	if(13 == keyCode){
		AuthenticateUser();
		//frm.login.click();
		return false;
	}
	return true;
}
// -------------------------------------



// -------------------------------------
function onEnter_R2(evt, Parameter) {
	var keyCode = null;
	if(evt.which){
		keyCode = evt.which;
	}else if(evt.keyCode){
		keyCode = evt.keyCode;
	}
	
	if(13 == keyCode){
		//frm.prereg_search_zipcode.click();
		LookupUtility_PREREG_ZIPCODE('lookup.zipcode.prereg', Parameter);
		return false;
	}
	return true;
}
// -------------------------------------




// -------------------------------------
function SignUp_Goto(){

		window.location = "https://FriendsNFlings.com/Signup";

}
// -------------------------------------




// -------------------------------------
function TransferValue2HiddenInput(inputID, newValue){
	document.getElementById(inputID).value		=			newValue;
}
// -------------------------------------





// -------------------------------------
function hideThis(ItemToHide){
	document.getElementById(ItemToHide).style.display 					= 'none';
	document.getElementById('signin_password').style.display 	= 'inline';
	document.getElementById('signin_password').focus();
}
// -------------------------------------






// -----------------------------------------------------------------------------
function PreRegQuickSearch(Gender){
	
	if(Gender == 'women'){
		document.getElementById('prereg_people_definition').innerHTML 					= '<font color=black>Women</font> Looking For...';
		if(document.getElementById('prereg_search_zipcode_entry').value === undefined || document.getElementById('prereg_search_zipcode_entry').value == ''){
			var ZipCode 		= document.getElementById('prereg_search_zipcodeC').value;
			var Composite		=	'0100:' + ZipCode;
			window_REFRESH('f94bf4859beddb98f93083c70b403290244e4e140effeec0614f4e6546ca5e8c', 'report.prereg_preview.current.home', Composite);
		}else{
			var ZipCode 		= document.getElementById('prereg_search_zipcode_entry').value;
			var Composite		=	'0100:' + ZipCode;
			window_REFRESH('f94bf4859beddb98f93083c70b403290244e4e140effeec0614f4e6546ca5e8c', 'report.prereg_preview.current.home', Composite);
		}

	}else if(Gender == 'men'){
		document.getElementById('prereg_people_definition').innerHTML 					= '<font color=black>Men</font> Looking For...';
		if(document.getElementById('prereg_search_zipcode_entry').value === undefined || document.getElementById('prereg_search_zipcode_entry').value == ''){
			var ZipCode 		= document.getElementById('prereg_search_zipcodeC').value;
			var Composite		=	'1000:' + ZipCode;
			window_REFRESH('f94bf4859beddb98f93083c70b403290244e4e140effeec0614f4e6546ca5e8c', 'report.prereg_preview.current.home', Composite);
		}else{
			var ZipCode 		= document.getElementById('prereg_search_zipcode_entry').value;
			var Composite		=	'1000:' + ZipCode;
			window_REFRESH('f94bf4859beddb98f93083c70b403290244e4e140effeec0614f4e6546ca5e8c', 'report.prereg_preview.current.home', Composite);
		}

	}else if(Gender == 'all'){
		document.getElementById('prereg_people_definition').innerHTML 					= 'People Looking For...';
		if(document.getElementById('prereg_search_zipcode_entry').value === undefined || document.getElementById('prereg_search_zipcode_entry').value == ''){
			var ZipCode 		= document.getElementById('prereg_search_zipcodeC').value;
			var Composite		=	'1111:' + ZipCode;
			window_REFRESH('f94bf4859beddb98f93083c70b403290244e4e140effeec0614f4e6546ca5e8c', 'report.prereg_preview.current.home', Composite);
		}else{
			var ZipCode 		= document.getElementById('prereg_search_zipcode_entry').value;
			var Composite		=	'1111:' + ZipCode;
			window_REFRESH('f94bf4859beddb98f93083c70b403290244e4e140effeec0614f4e6546ca5e8c', 'report.prereg_preview.current.home', Composite);
		}
	}

	
}
// -----------------------------------------------------------------------------





// -----------------------------------------------------------------------------
function LookupUtility_PREREG_ZIPCODE(Command, Parameter){
	
	document.getElementById('prereg_search_zipcodeC').value 	= Parameter;

	var INTERNAL_XMLHTTPOBJ = httpOBJCreator();
	var UserToken = document.getElementById('signin_authenticationToken').value;

	switch(Command){
		case 'lookup.zipcode.prereg':
			var UpdateWindow = 'prereg_search_city';
		break;
	}

	var target_url 		= 'execute';
	var params 				= '_function=ajax.lookup.utility' + '&_Command=' + Command + '&_Parameter=' + Parameter + '&_UserToken=' + UserToken;

	INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
	INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Pragma", "no-cache");
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");
	INTERNAL_XMLHTTPOBJ.onreadystatechange = function() {

	if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
		document.getElementById(UpdateWindow).innerHTML 					= INTERNAL_XMLHTTPOBJ.responseText;
		//var CompositeParameter = '1111:' + Parameter;
		var CompositeParameter = '1111:' + document.getElementById('prereg_search_zipcodeC').value;
		window_REFRESH('f94bf4859beddb98f93083c70b403290244e4e140effeec0614f4e6546ca5e8c', 'report.prereg_preview.current.home', CompositeParameter);
	}
	};
		INTERNAL_XMLHTTPOBJ.send(params);
}
// -----------------------------------------------------------------------------









var agt=navigator.userAgent.toLowerCase();

// -----------------------------------------------------------------------------
function sz(ObjectToResize){

	if(ObjectToResize.rows < 6){
	var a;
	var b;

	a = ObjectToResize.value.split('\n');
	b	=	1;

	for(x=0;x < a.length; x++){
 		if(a[x].length >= ObjectToResize.cols) b+= Math.floor(a[x].length/ObjectToResize.cols);
 	}
	b+= a.length;

	if(b > ObjectToResize.rows && agt.indexOf('opera') == -1) ObjectToResize.rows = b;
}
}
// -----------------------------------------------------------------------------





// progress bar ----------------------------------------------------------------
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
// -----------------------------------------------------------------------------












// TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING ======================================
// TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING ======================================
// TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING ======================================
// TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING ======================================
// TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING ======================================
// TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING ======================================
// TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING TESTING ======================================























// -----------------------------------------------------------------------------
function TEST_test(serializedSession){


	var target_url 	= 'common/js/compile/test.php?_var=' + serializedSession;

	xmlhttpPoll.open('GET', target_url, true);
  
	xmlhttpPoll.onreadystatechange = function() {
	
	if(xmlhttpPoll.readyState == 4 && xmlhttpPoll.status == 200){
        //content retrieved from query code
				//document.getElementById('nav_chatroomindicator').innerHTML = '<b><font color="white">IM Request <a href="chat" style="color: #feae2f;">Chat</a>: ' + xmlhttpPoll.responseText + '</font></b>';


				alert(xmlhttpPoll.responseText);

			}else{
        //if error || no response say this -------
				//document.getElementById('nav_chatroomindicator').innerHTML = '<b><font color="white">no IM requests</font></b>';
			}
		};
		xmlhttpPoll.send(null);  	
		//alert(serializedSession);
}
// -----------------------------------------------------------------------------
























function YahooTest(){
	var TargetURL = 'http://friendsnflings.com/common/js/TEST_1.php';

var args = ['foo','bar'];

var responseSuccess = function(o){
/* Please see the Success Case section for more
 * details on the response object's properties.
 * o.tId
 * o.status
 * o.statusText
 * o.getResponseHeader[ ]
 * o.getAllResponseHeaders
 * o.responseText
 * o.responseXML
 * o.argument
 */
 alert(o.responseText);
};

var responseFailure = function(o){
	alert('bad');
}

var callback =
{
  success:responseSuccess,
  failure:responseFailure,
  argument:args
};



	
	var transaction = YAHOO.util.Connect.asyncRequest('POST', TargetURL, callback, '_function=thisShit');
	
	
}

// close IM  ========================================================
function closeIMYahoo(){


	var args = ['foo','bar'];

  var responseSuccess = function(o){
  /* Please see the Success Case section for more
   * details on the response object's properties.
   * o.tId
   * o.status
   * o.statusText
   * o.getResponseHeader[ ]
   * o.getAllResponseHeaders
   * o.responseText
   * o.responseXML
   * o.argument
   */
   alert(o.responseText);
  };
  
  var responseFailure = function(o){
  	alert('bad');
  }
  
  var callback =
  {
    success:responseSuccess,
    failure:responseFailure,
    argument:args
  };

	var _sender			=	document.getElementById('im_sender').value;
	var _sessionid	=	document.getElementById('im_sessionid').value;


	var target_url 	= 'common/js/instantmsgr/im-close.php';
	var params 			= '_sender=' + _sender + '&_sessionid=' + _sessionid;
	

	var transaction = YAHOO.util.Connect.asyncRequest('POST', target_url, callback, params);
	


}
// ===================================================================