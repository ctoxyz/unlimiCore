// syntheticMagic ABS - JS Core Lib ============================================


// FORMS ------------------


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





	// -----------------------------------------------------------------------------
	function addCommas(nStr){
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}
	// -----------------------------------------------------------------------------




	// -----------------------------------------------------------------------------
 	function isInt(x) { 
   var y=parseInt(x); 
   if (isNaN(y)) return false; 
   return x==y && x.toString()==y.toString(); 
 	}
	// -----------------------------------------------------------------------------






	// -----------------------------------------------------------------------------
	function WMG_CALC_GrossProfit(DOMID){

		if(isInt(document.getElementById('form_transaction_new.booking.po_cost').value) && isInt(document.getElementById('form_transaction_new.booking.total_client_net').value)){
			var _PO_COST			=	document.getElementById('form_transaction_new.booking.po_cost').value;
			var _CLIENT_NET		=	document.getElementById('form_transaction_new.booking.total_client_net').value;
			var _GROSS_PROFIT	= _CLIENT_NET - _PO_COST;
			//_GROSS_PROFIT			=	'$' + _GROSS_PROFIT.toFixed(2); 

			//document.getElementById('form_transaction_new.booking.gross_profit').value 									= addCommas(_GROSS_PROFIT);
			document.getElementById('form_transaction_new.booking.gross_profit').value 									= _GROSS_PROFIT;
			//document.getElementById('form_transaction_new.booking.gross_profit').disabled 							= true;
			document.getElementById('form_transaction_new.booking.gross_profit').style.color						=	'#a91b1b';
			
			WMG_CALC_ProfitPercentage();
		}

  }
	// -----------------------------------------------------------------------------







	// -----------------------------------------------------------------------------
	function WMG_CALC_ProfitPercentage(DOMID){

		if(isInt(document.getElementById('form_transaction_new.booking.gross_profit').value) && isInt(document.getElementById('form_transaction_new.booking.total_client_net').value)){
			var _GROSS_PROFIT	=	document.getElementById('form_transaction_new.booking.gross_profit').value;
			var _CLIENT_NET		=	document.getElementById('form_transaction_new.booking.total_client_net').value;
			var _GM_PERCENT		=	Math.round(100 * (_GROSS_PROFIT	/ _CLIENT_NET));
			//_GROSS_PROFIT			=	'$' + _GROSS_PROFIT.toFixed(2); 

			//document.getElementById('form_transaction_new.booking.gross_profit').value 									= addCommas(_GROSS_PROFIT);
			document.getElementById('form_transaction_new.booking.profit_percentage').value 							= _GM_PERCENT;
			//document.getElementById('form_transaction_new.booking.gross_profit').disabled 							= true;
			document.getElementById('form_transaction_new.booking.profit_percentage').style.color					=	'#a91b1b';
		}

  }
	// -----------------------------------------------------------------------------





      function insertOption(id, value, text) {
            var option = document.createElement('option');
            option.text 			= text;
            option.value 			= value;
            option.selected 	= true;
            var select = document.getElementById(id);
            try { select.add(option,null); } catch(ex) { select.add(option); }
      }





	// -----------------------------------------------------------------------------
	function WMG_MEDIUM_TIMING_SelectPopulation(DOMID){

		if(isInt(document.getElementById('form_transaction_new.booking.medium_id').value)){
			
			var	_MEDIUM_TYPE_ID	=	 document.getElementById('form_transaction_new.booking.medium_id').value;
			//_GROSS_PROFIT			=	'$' + _GROSS_PROFIT.toFixed(2);




		// make visiible -------------------
		if(_MEDIUM_TYPE_ID > 1){
			document.getElementById('form_transaction_new.booking.ts_start_day').style.visibility			= "visible";
			document.getElementById('form_transaction_new.booking.ts_start_month').style.visibility		= "visible";
			document.getElementById('form_transaction_new.booking.ts_start_year').style.visibility		= "visible";

			document.getElementById('form_transaction_new.booking.ts_end_day').style.visibility				= "visible";
			document.getElementById('form_transaction_new.booking.ts_end_month').style.visibility			= "visible";
			document.getElementById('form_transaction_new.booking.ts_end_year').style.visibility			= "visible";
			
			document.getElementById('form_transaction_new.booking.medium_timing_id').disabled 						= true;
		}




			switch(_MEDIUM_TYPE_ID){
				
				// print
				case '1':
					insertOption('form_transaction_new.booking.medium_timing_id', '1', 'Daily');
					insertOption('form_transaction_new.booking.medium_timing_id', '2', 'Weekly');
					insertOption('form_transaction_new.booking.medium_timing_id', '17','Monthly');
					insertOption('form_transaction_new.booking.medium_timing_id', '3', 'Bi-Weekly');
					insertOption('form_transaction_new.booking.medium_timing_id', '4', 'Bi-Monthly');
					insertOption('form_transaction_new.booking.medium_timing_id', '5', 'Quarterly');
					insertOption('form_transaction_new.booking.medium_timing_id', '6', 'Annually');
					insertOption('form_transaction_new.booking.medium_timing_id', '7', '2Month Issue');
					
					document.getElementById('form_transaction_new.booking.medium_timing_id').disabled 					= false;
					
					document.getElementById('form_transaction_new.booking.ts_start_day').disabled 							= true;
					document.getElementById('form_transaction_new.booking.ts_start_month').disabled							= true;
					document.getElementById('form_transaction_new.booking.ts_start_year').disabled 							= true;

					document.getElementById('form_transaction_new.booking.ts_end_day').disabled 								= true;
					document.getElementById('form_transaction_new.booking.ts_end_month').disabled								= true;
					document.getElementById('form_transaction_new.booking.ts_end_year').disabled 								= true;

				break;

				// outdoor
				case '2':
					insertOption('form_transaction_new.booking.medium_timing_id', '8', 'Campaign Start/End OUTDOOR');
					document.getElementById('form_transaction_new.booking.ts_start_day').disabled 							= false;
					document.getElementById('form_transaction_new.booking.ts_start_month').disabled							= false;
					document.getElementById('form_transaction_new.booking.ts_start_year').disabled 							= false;

					document.getElementById('form_transaction_new.booking.ts_end_day').disabled 								= false;
					document.getElementById('form_transaction_new.booking.ts_end_month').disabled								= false;
					document.getElementById('form_transaction_new.booking.ts_end_year').disabled 								= false;

				break;


				// tv
				case '3':
					insertOption('form_transaction_new.booking.medium_timing_id', '10', 'Campaign Start/End TV');
					document.getElementById('form_transaction_new.booking.ts_start_day').disabled 							= false;
					document.getElementById('form_transaction_new.booking.ts_start_month').disabled							= false;
					document.getElementById('form_transaction_new.booking.ts_start_year').disabled 							= false;

					document.getElementById('form_transaction_new.booking.ts_end_day').disabled 								= false;
					document.getElementById('form_transaction_new.booking.ts_end_month').disabled								= false;
					document.getElementById('form_transaction_new.booking.ts_end_year').disabled 								= false;

				break;

				// radio
				case '4':
					insertOption('form_transaction_new.booking.medium_timing_id', '12', 'Campaign Start/End RADIO');
					document.getElementById('form_transaction_new.booking.ts_start_day').disabled 							= false;
					document.getElementById('form_transaction_new.booking.ts_start_month').disabled							= false;
					document.getElementById('form_transaction_new.booking.ts_start_year').disabled 							= false;

					document.getElementById('form_transaction_new.booking.ts_end_day').disabled 								= false;
					document.getElementById('form_transaction_new.booking.ts_end_month').disabled								= false;
					document.getElementById('form_transaction_new.booking.ts_end_year').disabled 								= false;

				break;

				// internet
				case '5':
					insertOption('form_transaction_new.booking.medium_timing_id', '14', 'Campaign Start/End INTERNET');
					document.getElementById('form_transaction_new.booking.ts_start_day').disabled 							= false;
					document.getElementById('form_transaction_new.booking.ts_start_month').disabled							= false;
					document.getElementById('form_transaction_new.booking.ts_start_year').disabled 							= false;

					document.getElementById('form_transaction_new.booking.ts_end_day').disabled 								= false;
					document.getElementById('form_transaction_new.booking.ts_end_month').disabled								= false;
					document.getElementById('form_transaction_new.booking.ts_end_year').disabled 								= false;
				break;


				// mobile
				case '6':
					insertOption('form_transaction_new.booking.medium_timing_id', '16', 'Campaign Start/End MOBILE');
					document.getElementById('form_transaction_new.booking.ts_start_day').disabled 							= false;
					document.getElementById('form_transaction_new.booking.ts_start_month').disabled							= false;
					document.getElementById('form_transaction_new.booking.ts_start_year').disabled 							= false;

					document.getElementById('form_transaction_new.booking.ts_end_day').disabled 								= false;
					document.getElementById('form_transaction_new.booking.ts_end_month').disabled								= false;
					document.getElementById('form_transaction_new.booking.ts_end_year').disabled 								= false;
				break;

			}
			
			

			//document.getElementById('form_transaction_new.booking.gross_profit').value 									= addCommas(_GROSS_PROFIT);
			//document.getElementById('form_transaction_new.booking.profit_percentage').value 							= _GM_PERCENT;
			//document.getElementById('form_transaction_new.booking.gross_profit').disabled 							= true;
			//document.getElementById('form_transaction_new.booking.profit_percentage').style.color					=	'#a91b1b';
		}

  }
	// -----------------------------------------------------------------------------












// -----------------------------------------------------------------------------
function SM_Form_Submit(FormID){




		// report switch =================================================
 		switch(FormID){

			// MODULE: TRANSACTION NEW ---------------------------
			case('form_transaction_new'):

				var params_base					= '_function=ajax.secureform.preprocess';
				var params							= '';

			
			break;
			// ---------------------------------------------------


			// MODULE: RESOURCE HUMAN NEW ------------------------
			case('form_resources_human_new'):
				var params_base					= '_function=ajax.secureform.preprocess';
				var params							= '';
			break;
			// -----------------------------------------


			// MODULE: RESOURCE CLIENT NEW ------------------------
			case('form_resources_client_new'):
				var params_base					= '_function=ajax.secureform.preprocess';
				var params							= '';
			break;
			// -----------------------------------------


			// MODULE: RESOURCE ADVERTISER NEW -------------------
			case('form_resources_advertiser_new'):
				var params_base					= '_function=ajax.secureform.preprocess';
				var params							= '';
			break;
			// -----------------------------------------


			// MODULE: RESOURCE VENDOR NEW -------------
			case('form_resources_vendor_new'):
				var params_base					= '_function=ajax.secureform.preprocess';
				var params							= '';
			break;
			// -----------------------------------------


			// MODULE: UNDEFINED ---------------------------------
			case('undefined.undefined'):


			break;
			// -----------------------------------------


		}
		// ===============================================================







	// build query string from form element values =====================
	var form 				= document.forms[FormID];

  for(i = 0; i < form.elements.length; i++){

  	// IF -------------------- 
  	if(form.elements[i].type == "text" || form.elements[i].type == "hidden" || form.elements[i].type == "select-one"){

    	var FormComponent_EXPLODED	= form.elements[i].id.split('.');
    	
    	// form components -------------------
    	FormComponent_FORMTYPE	=	FormComponent_EXPLODED[0];
    	FormComponent_TABLE			=	FormComponent_EXPLODED[1];
    	FormComponent_FIELD			=	FormComponent_EXPLODED[2];

			params 									+= '&' + FormComponent_FIELD + '=' + form.elements[i].value;

    }
  }
  // =================================================================






	// process form via ajax ===========================================
	var target_url				= 'execute';
	var params						= params_base + params;


//DEBUG ================================
//alert(params);


	var INTERNAL_XMLHTTPOBJ = SM_httpOBJCreator();

	INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
	INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Pragma", "no-cache");
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");


	INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){

	if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){



//DEBUG ================================
//alert(INTERNAL_XMLHTTPOBJ.responseText);



		// VALIDATION - iterate response -------------
		var _response = INTERNAL_XMLHTTPOBJ.responseText.split('+');

		for(x = 0; x < _response.length; x++){
			if(_response[x] != '' && _response[x] != 666 && _response[x] != 111 && _response[x] != 661){

//DEBUG ======================
//alert(_response[x]);

				//document.getElementById('lead.user.' + _response[x]).style.backgroundColor	=	'#a91b1b';
				document.getElementById(FormComponent_FORMTYPE + '.' + FormComponent_TABLE + '.' + _response[x]).style.backgroundColor	=	'#a91b1b';
			}
		}
		// -------------------------------------------




		// error report ------------------------------
		if(INTERNAL_XMLHTTPOBJ.responseText == 666){
			alert('ERROR: Please Retry');
		}else if(INTERNAL_XMLHTTPOBJ.responseText == 661){
			alert('ERROR - Validation :: Form Field NOT Registered');
		}else if(INTERNAL_XMLHTTPOBJ.responseText == 111){
			alert('SUCCESS - Form Valid & Successfully Processed');
			document.forms[FormID].reset();
			SM_Reset_ValidationHTML();


			// update switch ===============================================
	 		switch(FormID){
	
				// MODULE: TRANSACTION NEW ---------------------------
				case('form_transaction_new'):
	
					SM_Report_Update(FormID, 'transaction_today.report', 'ts_entered:asc');	
				
				break;
				// -----------------------------------------
	
	
				// MODULE: RESOURCE NEW ------------------------------
				case('form_resources_human_new'):
					SM_Report_Update(FormID, 'human_resource.report', 'userid:asc');
				break;
				// -----------------------------------------
	
	
				// MODULE: UNDEFINED ---------------------------------
				case('undefined.undefined'):
	
	
				break;
				// -----------------------------------------
	
	
			}
			// ===============================================================



		}else if(INTERNAL_XMLHTTPOBJ.responseText == ''){
			//alert(INTERNAL_XMLHTTPOBJ.responseText);
			alert('ERROR - Unknown/Blank Response: '+INTERNAL_XMLHTTPOBJ.responseText);
		}
		// -------------------------------------------




	}else{
		// no response ---------------------
	}
};
	INTERNAL_XMLHTTPOBJ.send(params);





/*



	var FormComponent_EXPLODED	= FormComponent.id.split('.');
	
	// form components -------------------
	var	FormComponent_FORMTYPE	=	FormComponent_EXPLODED[0];
	var	FormComponent_TABLE			=	FormComponent_EXPLODED[1];
	var	FormComponent_FIELD			=	FormComponent_EXPLODED[2];

alert(FormComponent_FIELD);
end;

	// LEAD form -----------------------------------
 	switch(FormComponent_FORMTYPE){

		// -----------------------------------------
		case('process'):
			
			var	FormComponent_VALUE			=	FormComponent.value;
			var	FormComponent_COMMAND		=	'ajax.form.process';
			var	FormComponent_PARAMETER	=	FormComponent_TABLE+':'+FormComponent_FIELD+':'+FormComponent_VALUE;
			// execute ajax communication --------------
			SM_AjaxComm(FormComponent_COMMAND, FormComponent_PARAMETER);
			
		break;
		// -----------------------------------------


	}



*/


	//document.getElementById('cont-maincontent').style.visibility 				=	'hidden';
	

}
// -----------------------------------------------------------------------------










// -----------------------------------------------------------------------------
function SM_Reset_ValidationHTML(){


	// reset validation divs 000
	var divs = document.getElementsByTagName("div");
	for(var i=0;i<divs.length;i++){
		var b = divs[i].id.indexOf("VALIDATIONRESPONSE.")>=0;
		if(b){
    	divs[i].innerHTML = "";
		}
	}
	// -------------------------


	// reset form background ---
	var form 				= document.forms[0];
  for(i = 0; i < form.elements.length; i++){
  	// IF -------------------- 
  	if(form.elements[i].type == "text" || form.elements[i].type == "hidden" || form.elements[i].type == "select-one"){
			form.elements[i].style.backgroundColor	=	'#ffffff';
    }
  }
	// -------------------------

}
// -----------------------------------------------------------------------------













// -----------------------------------------------------------------------------
function SM_Button_State(State, ButtonID){

	if(State == 'disable'){
		document.getElementById(ButtonID).disabled 	= true;
	}else if(State == 'enable'){
		document.getElementById(ButtonID).disabled 	= false;
	}
}
// -----------------------------------------------------------------------------












// -----------------------------------------------------------------------------
function SM_Validate(FormComponent, Type){



	if(Type == 'explicit'){
		var FormComponent_EXPLODED	= FormComponent.split('.');
	}else{
		var FormComponent_EXPLODED	= FormComponent.id.split('.');		
	}


	// form components -------------------
	var	FormComponent_FORMTYPE	=	FormComponent_EXPLODED[0];
	var	FormComponent_TABLE			=	FormComponent_EXPLODED[1];
	var	FormComponent_FIELD			=	FormComponent_EXPLODED[2];



	// FORM TYPE =============================================
 	switch(FormComponent_FORMTYPE){

		// -----------------------------------------
		case('lead'):
			
			var	FormComponent_VALUE			=	FormComponent.value;
			var	FormComponent_COMMAND		=	'ajax.form.validator';
			var	FormComponent_PARAMETER	=	FormComponent_TABLE+':'+FormComponent_FIELD+':'+FormComponent_VALUE;

			// execute ajax communication --------------
			SM_AjaxComm(FormComponent_COMMAND, FormComponent_PARAMETER);
			
		break;
		// -----------------------------------------


		// -----------------------------------------
		default:
			
			var	FormComponent_VALUE			=	FormComponent.value;
			var	FormComponent_COMMAND		=	'ajax.form.validator';
			var	FormComponent_PARAMETER	=	FormComponent_TABLE+':'+FormComponent_FIELD+':'+FormComponent_VALUE;



			// execute ajax communication --------------
			SM_AjaxComm(FormComponent_COMMAND, FormComponent_PARAMETER);
			
		break;
		// -----------------------------------------

  }
	// =======================================================


}
// -----------------------------------------------------------------------------













// -----------------------------------------------------------------------------
function SM_Comm_InnerHTML(ArrayParameter){

	var AlertCount								= 0;

	var response_message 					= ArrayParameter[0];
	//var response_icon 						= window.location.protocol + '//' + window.location.hostname + '/' + ArrayParameter[1];
	var response_icon 						= ArrayParameter[1];
	var response_div_id 					= ArrayParameter[2];
	var response_validity					= ArrayParameter[3];

//alert(response_div_id);


	switch(String(response_validity)){
		case 'valid':
			var response_color				=	' color: #1de90b; ';
		break;
		case 'invalid':
			var response_color				=	' color: #ff0006; ';
		break;
		
		default:
			var response_color				=	' color: #ffffff; ';
		break;
	}


	var response_innerHTML 				= '<table border=0 style="margin: 0px; padding: 0px;" cellpadding="0" cellspacing="0" class="SM_Ajax_Form_innerHTML"><tr> <td valign="middle"><img src="'+response_icon+'"/></td> <td width="5"></td> <td width="70" valign="middle" style="'+response_color+'">'+response_message+'</td></tr></table>';

	document.getElementById(response_div_id).innerHTML = response_innerHTML;
	
	/*
	INCOMPLETE :: input bgcolor & text color
	if(response_validity != 'valid'){
		response_bgColor = response_div_id.split('.');
		alert('lead.user.'+response_bgColor[1]);
		document.getElementById('lead.user.'+response_bgColor[1]).style.backgroundColor	=	'#f00';
		document.getElementById('lead.user.'+response_bgColor[1]).style.color						=	'#f00';
	}
	*/
	
	return false;
}
// -----------------------------------------------------------------------------









// -----------------------------------------------------------------------------
function SM_AjaxComm(Command, Parameter){


	var base_url 			= window.location.protocol + '//' + window.location.hostname;
	var target_url 		= base_url + '/execute';
	var params 				= '_function='+Command+'&_Parameter='+Parameter;


	var INTERNAL_XMLHTTPOBJ = SM_httpOBJCreator();

	INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
	INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");
	INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){


		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){
//alert(INTERNAL_XMLHTTPOBJ.responseText);
			if(INTERNAL_XMLHTTPOBJ.responseText && INTERNAL_XMLHTTPOBJ.responseText !=""){

				// update html ---------------------------
				SM_Comm_InnerHTML(INTERNAL_XMLHTTPOBJ.responseText.split('+'));

			}

			/*
			if(INTERNAL_XMLHTTPOBJ.responseText == '111'){
					alert('SMLib.AjaxComm:120 :: Command Completed');
					//Click2Call('execute.monitor.modalwindow');
					//window.location = "MyHome";
					//window.parent.location.href="http://syntheticmagic.com/";
			}else if(INTERNAL_XMLHTTPOBJ.responseText == '666'){
					//alert('Hack Attempt - IP Logged');
					alert('SMLib.AjaxComm:126 :: Specified Error');
					//window.parent.location.href="http://syntheticmagic.com/";
			}else{
					alert('SMLib.AjaxComm:129 :: Undefined Error');
			}
			*/
		}
	};
	INTERNAL_XMLHTTPOBJ.send(params);
}
// -----------------------------------------------------------------------------











// =============================================================================
function SM_TransactionEdit(Transaction){
	location="transaction." + Transaction;
}
// =============================================================================










// =============================================================================
function SM_recordEdit(EXE_Command_Group, Specific_Command, ContentID){



 	var specific_command_EXPLODED	= Specific_Command.split('.');
    	
 	// form components -------------------
 	__Subject_Acted_Upon		=	specific_command_EXPLODED[0];
 	__Command								=	specific_command_EXPLODED[1];



//DEBUG --------------------------------
//alert(ContentID); //DEBUG


	// confirmation ----------------------
	if(__Command == 'delete' || __Command == 'type' || __Command == 'login'){
  	var answer = confirm("Press OK to Confirm " + __Command)
  	if(answer){
  		//alert('Record ID: ' + ContentID + ' DELETED');
  	}else{
  		//alert('Record ID: ' + ContentID + ' NOT Deleted');
  		return;
  		exit();
  	}
  }
	// -----------------------------------


	if(__Command == 'type'){
		var ParameterValue			=	document.getElementById('input_usertype_' + ContentID).value;
		__Command								=	ParameterValue;
		//alert(ParameterValue);
	}

	if(__Command == 'manager'){
		var ParameterValue			=	document.getElementById('input_usermanager_' + ContentID).value;
		__Command								=	ParameterValue;
		//alert(ParameterValue);
	}

	if(__Command == 'quota'){
		var ParameterValue			=	document.getElementById('input_quota_' + ContentID).value;
		__Command								=	ParameterValue;
		//alert(ParameterValue);
	}

	//legacy code
	//var ParameterValue			=	encodeURIComponent(document.getElementById('input_' + Specific_Command + '_' + ContentID).value);



	var INTERNAL_XMLHTTPOBJ = SM_httpOBJCreator();


	var base_url 			= window.location.protocol + '//' + window.location.hostname;
	var target_url 		= base_url + '/execute';
	var params 				= '_function='+EXE_Command_Group+'&_Command='+Specific_Command+'&_Parameter='+__Command+'&_ContentID='+ContentID;



//DEBUG --------------------------------
//alert(params); //DEBUG



	INTERNAL_XMLHTTPOBJ.open('POST', target_url, true);
	INTERNAL_XMLHTTPOBJ.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Content-length", params.length);
	INTERNAL_XMLHTTPOBJ.setRequestHeader("Connection", "close");
	INTERNAL_XMLHTTPOBJ.onreadystatechange = function(){


		if(INTERNAL_XMLHTTPOBJ.readyState == 4 && INTERNAL_XMLHTTPOBJ.status == 200){


			var XHR_Result = INTERNAL_XMLHTTPOBJ.responseText;


//DEBUG ==========================================
//alert(XHR_Result);


			// response per exe command response -----------------			
  		switch(parseInt(XHR_Result)){

  			case 555:
  				//document.getElementById('input_' + ParameterName + '_' + ContentID).style.backgroundColor	='#ff9c00';
  				alert('NOT UPDATED - Duplicate Detected');
  			break;

  			case 666:
  				//document.getElementById('input_' + ParameterName + '_' + ContentID).style.backgroundColor	='#ffc9c9';
  				alert('Error: Please Retry');
  				exit();
  			break;

				// success -----------  
  			case 111:

					//alert('** Edit Completed ** \n Refresh Page to See Change');

					switch(__Command){
						
						case 'disable':
  						//document.getElementById('listing_global_container_' + ContentID).style.backgroundColor		='#ffc9c9';
  						//document.getElementById('input_' + ParameterName + '_' + ContentID).value									='DISABLED';
							//document.getElementById('input_' + ParameterName + '_' + ContentID).disabled							=true;						
  						
  						switch(Specific_Command){
  							case 'user.disable':
  								SM_Report_Update('form_resource_new', 'human_resource.report', 'userid:asc');	
  							break;
  						}
						
						
						break;

						case 'enable':
  						//document.getElementById('listing_global_container_' + ContentID).style.backgroundColor		='#c3ffb3';
  						//document.getElementById('input_' + ParameterName + '_' + ContentID).style.backgroundColor	='#c3ffb3';
  						//document.getElementById('input_' + ParameterName + '_' + ContentID).disabled							=true;
  						//document.getElementById('input_' + ParameterName + '_' + ContentID).value									='ENABLED';

  						switch(Specific_Command){
  							case 'user.enable':
  								SM_Report_Update('form_resource_new', 'human_resource.report', 'userid:asc');	
  							break;
  						}


						break;

						case 'delete':
  						//document.getElementById('listing_global_container_' + ContentID).style.display 	= 'none';
  						//alert('User Deleted');
  						
  						//alert(Specific_Command);
  						switch(Specific_Command){
  							case 'user.delete':
  								SM_Report_Update('form_resource_new', 'human_resource.report', 'userid:asc');
  							break;

  							case 'transaction.delete':
  								SM_Report_Update('form_organization_currentmonth', 'organization_current_month_all_records.report', 'ts_sold:asc');
  							break;

  						}
  						
  						
  						
						break;

						default:
							//document.getElementById('input_' + ParameterName + '_' + ContentID).style.backgroundColor	='#c3ffb3';
							alert('Completed');
						break;

					}
  			break;
  			// -------------------

  		}
  		// ---------------------------------------------------


		}
	};
		INTERNAL_XMLHTTPOBJ.send(params);
	
	
}
// =============================================================================











// =============================================================================
function SM_ValuePass(ContentID){

	//var sel = document.getElementById("selectTagId");
	//sel.options[sel.selectedIndex].value;

	//var _OO	= document.getElementById(ContentID).value;
	alert(ContentID.value);

	//var ParameterValue			=	encodeURIComponent(document.getElementById('input_' + Specific_Command + '_' + ContentID).value);


}
// =============================================================================









// -----------------------------------------------------------------------------
function onEnter(evt,frm) {
	var keyCode = null;
	if(evt.which){
		keyCode = evt.which;
	}else if(evt.keyCode){
		keyCode = evt.keyCode;
	}
	
	if(13 == keyCode){
		Click2Call('execute.initiate.modalwindow');
		return false;
	}
	return true;
}
// -----------------------------------------------------------------------------











// -----------------------------------------------------------------------------
function clickclear(thisfield, defaulttext, color){
	if(thisfield.value == defaulttext){
		thisfield.value = "";
		if(!color){
			color = "16baff";
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
			color = "d2d2d2";
		}
		thisfield.style.color = "#" + color;
	}
}
// -----------------------------------------------------------------------------





































// DEPRECIATED CODE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/*











// -----------------------------------------------------------------------------
function SM_Form_VerifyComplete(){
	
	var form 				= document.forms[0];
	var alertCount	=	0;

  
  for(i = 0; i < form.elements.length; i++){

  	// IF --------------------
  	//if(form.elements[i].type == "text" && form.elements[i].value == "" || form.elements[i].value == "SSN" || form.elements[i].value == "ZIP Code" || form.elements[i].value == "Credit Card" || form.elements[i].value == "Display Name" || form.elements[i].value == "Phone" || form.elements[i].value == "Password" || form.elements[i].value == "eMail Address"){
  	if(form.elements[i].type == "text"){

			// allert count check ------------
			if(alertCount == 1){
				break;
			}

			// form input completion check ---
    	switch(form.elements[i].value){

    		case('eMail Address'):
    			//alert("Please Complete - " + form.elements[i].value);
    			form.elements[i].focus();
    			alertCount = 1;
    		break;

    		case('Password'):
    			//alert("Please Complete - " + form.elements[i].value);
    			form.elements[i].focus();
    			alertCount = 1;
    		break;

    		case('Phone'):
    			//alert("Please Complete - " + form.elements[i].value);
    			form.elements[i].focus();
    			alertCount = 1;
    		break;

    		case('Display Name'):
    			//alert("Please Complete - " + form.elements[i].value);
    			form.elements[i].focus();
    			alertCount = 1;
    		break;

    		case('Screen Name'):
    			//alert("Please Complete - " + form.elements[i].value);
    			form.elements[i].focus();
    			alertCount = 1;
    		break;

    		case('Credit Card'):
    			//alert("Please Complete - " + form.elements[i].value);
    			form.elements[i].focus();
    			alertCount = 1;
    		break;

    		case('ZIP Code'):
    			//alert("Please Complete - " + form.elements[i].value);
    			form.elements[i].focus();
    			alertCount = 1;
    		break;

    		case('SSN'):
    			//alert("Please Complete - " + form.elements[i].value);
    			form.elements[i].focus();
    			alertCount = 1;
    		break;

    		default:
    			//alert("ERR: Incomplete Form - DEFAULT SWITCH CASE");
    		break;
    		
    	}
    	// END switch --------------------



		// enable submit button ------------
    }else{
    	for(i = 0; i < form.elements.length; i++){
    		if(form.elements[i].type == 'button'){
    			SM_Button_State('enable', form.elements[i].id);
    		}
    	}
    }
    // END if --------------------------
    
  }
}
// -----------------------------------------------------------------------------








*/