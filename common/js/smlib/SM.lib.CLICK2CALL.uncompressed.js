// syntheticMagic ABS - JS Core Lib ============================================


// Click to Call @ Twilio ------------------


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
function Click2Call(Command){

	



	switch(Command){
		

		// initiate ----------------------------------
		case('execute.initiate.modalwindow'):
	
			var _InputClick2Call	=	document.getElementById('click2callInput').value;
			
			if(!_InputClick2Call || _InputClick2Call == 6025551212 || _InputClick2Call.length !=10 || _InputClick2Call.search(/\d{3}\d{3}\d{4}/) == -1){
				

				alert('Please Enter Your Phone Number');
				Click2Call('execute.initiate.reset');
				return false;
			}

			//alert('debug');
			//GB_showCenter('', 'http://syntheticmagic.com/Call-Me-Now-' + _InputClick2Call, 380, 600);

			var base_url 			= window.location.protocol + '//' + window.location.hostname;
			var target_url 		= base_url + '/execute';
			var params 				= '_function=modal.form.click2call' + '&_InputClick2Call=' + _InputClick2Call + '&_Command=' + 'click2call';


    	var INTERNAL_XMLHTTPOBJ = SM_httpOBJCreator();
    
    	INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
    	INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
    	INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");
    	INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){
    		
    		//alert(INTERNAL_XMLHTTPOBJ.responseText);
    		
    		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
    			//alert(INTERNAL_XMLHTTPOBJ.responseText);
    
    			if(INTERNAL_XMLHTTPOBJ.responseText == '111'){
    					//alert('Click2Call :: Call Completed');
    					Click2Call('execute.monitor.modalwindow');
    					//window.location = "MyHome";
    					//window.parent.location.href="http://syntheticmagic.com/";
    			}else if(INTERNAL_XMLHTTPOBJ.responseText == '666'){
    					//alert('Hack Attempt - IP Logged');
    					alert('Click2Call :: Specified Error');
    					//window.parent.location.href="http://syntheticmagic.com/";
    			}else{
    					alert('Click2Call :: Undefined Error');
    			}
    		}
    	};
    	INTERNAL_XMLHTTPOBJ.send(params);


		break;
		// -------------------------------------------







		// monitor -----------------------------------
		case('execute.monitor.modalwindow'):

			var _InputClick2Call	=	document.getElementById('click2callInput').value;

			document.getElementById('div_click2call').innerHTML = '<img style="position: absolute; left: 110px; top: 22px;" src="/common/img/click2call/click2call_call-in-progress.png" />';

    	var speed = Math.round(2000 / 100); 
    	var timer = 0;
			setTimeout("Click2Call('execute.initiate.reset')",10000);
		break;
		// -------------------------------------------


		// reset -------------------------------------
		case('execute.initiate.reset'):
			document.getElementById('div_click2call').innerHTML = '<input style="position: absolute; left: 120px; top: 22px; width: 125px; border: 0px; font-size: 22px; color: #d2d2d2; background: transparent;" type="text" id="click2callInput" size="10" value="6025551212" onkeypress="return onEnter(event,this.form);" onclick="clickclear(this, \'6025551212\')" onfocus="clickclear(this, \'6025551212\')" onblur="clickrecall(this,\'6025551212\')" /><div id="click2call_button" onclick="Click2Call(\'execute.initiate.modalwindow\');" style="cursor: pointer; position: absolute; left: 0px; bottom: 0px; width: 40px; height: 30px; border: 0px solid #f00; z-index: 100;"></div>';
			//document.getElementById('click2callInput').style.color = "#" + "d2d2d2";
			//document.getElementById('click2callInput').value = 6025551212;
		break;
		// -------------------------------------------



	}
}
// -----------------------------------------------------------------------------