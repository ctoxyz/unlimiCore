// syntheticMagic ABS - JS Core Lib ============================================


// REPORTS FUSION CHARTS ---------------


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





















// -----------------------------------------------------------------------------
	function SM_Chart_Update(formID, targetMethod, parameters, ChartID){


		var _targetMethodExploded	=	targetMethod.split(".");
		var	_formSubject					=	_targetMethodExploded[0];
		var	_objectTarget					=	_targetMethodExploded[1];
		
		var	series_param					= null;
		
		//var	_formSuffix						=	_targetMethodExploded[2];


//DEBUG ==========================================
//alert(formID + '.'+_formSubject+'.'+'date_start_month');
//alert(ChartID);


		// range ---------------------------
		var range_start_COMP;
		var range_end_COMP;

    var range_start_MONTH	= document.getElementById(formID + '.'+_formSubject+'.'+'date_start_month').value;
    var range_start_DAY		= document.getElementById(formID + '.'+_formSubject+'.'+'date_start_day').value;
    var range_start_YEAR	= document.getElementById(formID + '.'+_formSubject+'.'+'date_start_year').value;

		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;

    var range_end_MONTH		= document.getElementById(formID + '.'+_formSubject+'.'+'date_end_month').value;
    var range_end_DAY			= document.getElementById(formID + '.'+_formSubject+'.'+'date_end_day').value;
    var range_end_YEAR		= document.getElementById(formID + '.'+_formSubject+'.'+'date_end_year').value;

		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		



		if(_formSubject == 'salesman_current_month_all_records' || _formSubject == 'manager_current_month_all_records' || _formSubject == 'organization_current_month_all_records'){

			var series						=	new Array();
			

			var series_client_net					= document.getElementById(formID + '.'+_formSubject+'.'+'series_client_net').checked;
			var series_gross_profit				= document.getElementById(formID + '.'+_formSubject+'.'+'series_gross_profit').checked;
			var series_po_cost						= document.getElementById(formID + '.'+_formSubject+'.'+'series_po_cost').checked;
			var series_direct_commission	= document.getElementById(formID + '.'+_formSubject+'.'+'series_direct_commission').checked;
			var series_profit_percentage	= document.getElementById(formID + '.'+_formSubject+'.'+'series_profit_percentage').checked;
			var series_gm_per_transaction	= document.getElementById(formID + '.'+_formSubject+'.'+'series_gm_per_transaction').checked;
			
			if(series_client_net == true){
				series[0]				=	'1';
			}else if(series_client_net == false){
				series[0]				=	'0';
			}

			if(series_gross_profit == true){
				series[1]				=	'1';
			}else if(series_gross_profit == false){
				series[1]				=	'0';
			}

			if(series_po_cost == true){
				series[2]				=	'1';
			}else if(series_po_cost == false){
				series[2]				=	'0';
			}

			if(series_direct_commission == true){
				series[3]				=	'1';
			}else if(series_direct_commission == false){
				series[3]				=	'0';
			}

			if(series_profit_percentage == true){
				series[4]				=	'1';
			}else if(series_profit_percentage == false){
				series[4]				=	'0';
			}

			if(series_gm_per_transaction == true){
				series[5]				=	'1';
			}else if(series_gm_per_transaction == false){
				series[5]				=	'0';
			}

			series_param					=	series[0] + ':' + series[1] + ':' + series[2] + ':' + series[3] + ':' + series[4] + ':' + series[5];


				var params_users			= ':';

				// capture user specific checkbox selections ---------------------------
				var form 				= document.forms[formID];
			
			  for(i = 0; i < form.elements.length; i++){
			
			  	// IF -------------------- 
			  	if(form.elements[i].type == "checkbox"){
			
			    	var FormComponent_EXPLODED	= form.elements[i].id.split('.');
			    	
			    	// form components -------------------
			    	FormComponent_FORMTYPE	=	FormComponent_EXPLODED[0];
			    	FormComponent_TABLE			=	FormComponent_EXPLODED[1];
			    	FormComponent_FIELD			=	FormComponent_EXPLODED[2];
			
						if(form.elements[i].checked && FormComponent_FIELD != 'series_gm_per_transaction' && FormComponent_FIELD != 'series_client_net' && FormComponent_FIELD != 'series_gross_profit' && FormComponent_FIELD != 'series_po_cost' && FormComponent_FIELD != 'series_direct_commission' && FormComponent_FIELD != 'series_profit_percentage'){
							params_users					+= form.elements[i].value + '.';
						}
			    }
			  }
			  // =================================================================

		}








		var params_base					= '_function=' + targetMethod;
		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;

		if(series_param != null){

			if(params_users != null){
				//var params							= '&_filter=' + parameters + params_users + range;
				var params							= '&_filter=' + parameters + params_users + range + '&_series=' + series_param;
			}else{
				//var params							= '&_filter=' + parameters + range;	
				var params							= '&_filter=' + parameters + range + '&_series=' + series_param;	
			}

		}else{
			var params							= '&_filter=' + parameters + range;
		}


		
		


//DEBUG ================================
//var params							= '&_filter=' + parameters;




  	// process form via ajax -----------------------
  	var target_url				= 'execute';
  	var params						= params_base + params;
  	//var params						= params_base;



//DEBUG ----------------------
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

//DEBUG ----------------------
//alert(INTERNAL_XMLHTTPOBJ.responseText);

  		if(INTERNAL_XMLHTTPOBJ.responseText == 666){
  			alert('ERROR: Please Retry');
  		}else if(INTERNAL_XMLHTTPOBJ.responseText == 111){
  			alert('SUCCESS');
  		}else if(INTERNAL_XMLHTTPOBJ.responseText != ''){
  			//alert(INTERNAL_XMLHTTPOBJ.responseText);
  			//document.getElementById('results_window').innerHTML = INTERNAL_XMLHTTPOBJ.responseText;
  			//document.getElementById('_progressMeter').innerHTML = '';

       //using updateChartXML method defined in FusionCharts JavaScript class
       //updateChartXML(ChartID,INTERNAL_XMLHTTPOBJ.responseText);
       
       //var myChart = new FusionCharts("../Charts/Gantt.swf", "myChartId", "700", "400", "1", "0");
			//myChart.setDataXML(1);



			
			// check for chart load completion ---------
			if(FC_Rendered(ChartID) == true){
				SM_UpdateChart(ChartID,INTERNAL_XMLHTTPOBJ.responseText);
			}
			// -----------------------------------------



			//updateChart(ChartID,INTERNAL_XMLHTTPOBJ.responseText);
			
//alert(1);
       //Disable the button
       //this.document.frmUpdate.btnUpdate.disabled = true;

  		}
  
  	}else{
  		// no response ---------------------
  		//document.getElementById('_progressMeter').innerHTML = '<img src="/common/img/ani/disc.gif" />';
  		//document.getElementById('_progressMeter').innerHTML = 'querying...';
  	}
  };
  	INTERNAL_XMLHTTPOBJ.send(params);






	}
// -----------------------------------------------------------------------------




// -----------------------------------------------------------------------------
	function SM_UpdateChart(DOMId, XMLData){

			var chartObj = getChartFromId(DOMId);
			chartObj.setDataXML(XMLData);
			//chartObj.setDataURL('SM.core.exe.php?_function=client_campaign.chart');
	}
// -----------------------------------------------------------------------------





// -----------------------------------------------------------------------------
	function FC_Rendered(DOMId){
         if(DOMId){
            //window.alert(DOMId);
            return true;
         }
	}
// -----------------------------------------------------------------------------


















// -----------------------------------------------------------------------------
	function SM_DynaDash_Erase(targetMethod){
		document.getElementById(targetMethod).innerHTML = '';
	}
// -----------------------------------------------------------------------------













// -----------------------------------------------------------------------------
	function SM_Report_Update(formID, targetMethod, parameters){


		//alert(targetMethod + ' - ' + parameters);
		//alert(formID);








		// report swtich =================================================
 		switch(targetMethod){

			// MODULE: ACTIVITY ----------------------------------
			case('user_session_activity.report'):
			
    		// range ---------------------------------
    		var range_start_COMP;
    		var range_end_COMP;
    
        var range_start_MONTH	= document.getElementById(formID + '.user_session_activity.date_start_month').value;
        var range_start_DAY		= document.getElementById(formID + '.user_session_activity.date_start_day').value;
        var range_start_YEAR	= document.getElementById(formID + '.user_session_activity.date_start_year').value;
    
    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;
    
        var range_end_MONTH		= document.getElementById(formID + '.user_session_activity.date_end_month').value;
        var range_end_DAY			= document.getElementById(formID + '.user_session_activity.date_end_day').value;
        var range_end_YEAR		= document.getElementById(formID + '.user_session_activity.date_end_year').value;
    
    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		
    
    
    
    
    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		var params							= '&_filter=' + parameters + range;

			
			break;
			// -----------------------------------------












			// MODULE: RESOURCES ---------------------------------
			case('human_resource.report'):

    		var params_base					= '_function=' + targetMethod;
    		//var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		var params							= '&_filter=' + parameters;

			break;
			// -----------------------------------------







			// MODULE: TRANSACTIONS TODAY ------------------------
			case('transaction_today.report'):

    		// range ---------------------------------
    		var range_start_COMP;
    		var range_end_COMP;
    
        var range_start_MONTH	= document.getElementById(formID + '.booking.date_start_month').value;
        var range_start_DAY		= document.getElementById(formID + '.booking.date_start_day').value;
        var range_start_YEAR	= document.getElementById(formID + '.booking.date_start_year').value;
    
    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;
    
        var range_end_MONTH		= document.getElementById(formID + '.booking.date_end_month').value;
        var range_end_DAY			= document.getElementById(formID + '.booking.date_end_day').value;
        var range_end_YEAR		= document.getElementById(formID + '.booking.date_end_year').value;
    
    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;


    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		var params							= '&_filter=' + parameters + range;;

			break;
			// -----------------------------------------


			// MODULE: CLIENT CAMPAIGN -----------------
			case('client_campaign.report'):

    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		var params							= '&_filter=' + parameters;

			break;
			// -----------------------------------------








			// MODULE: REPORTS - ALL TRANSACTIONS --------------------------
			case('organization_current_month_all_records.report'):

				var params_users			= ':';

				// capture user specific checkbox selections ---------------------------
				var form 				= document.forms[formID];
			
			  for(i = 0; i < form.elements.length; i++){
			
			  	// IF -------------------- 
			  	if(form.elements[i].type == "checkbox"){
			
			    	var FormComponent_EXPLODED	= form.elements[i].id.split('.');
			    	
			    	// form components -------------------
			    	FormComponent_FORMTYPE	=	FormComponent_EXPLODED[0];
			    	FormComponent_TABLE			=	FormComponent_EXPLODED[1];
			    	FormComponent_FIELD			=	FormComponent_EXPLODED[2];
			
						if(form.elements[i].checked && FormComponent_FIELD != 'series_gm_per_transaction' && FormComponent_FIELD != 'series_client_net' && FormComponent_FIELD != 'series_gross_profit' && FormComponent_FIELD != 'series_po_cost' && FormComponent_FIELD != 'series_direct_commission' && FormComponent_FIELD != 'series_profit_percentage'){
							params_users					+= form.elements[i].value + '.';
						}
			    }
			  }
			  // =================================================================



    		// range ---------------------------------
    		var range_start_COMP;
    		var range_end_COMP;

        var range_start_MONTH	= document.getElementById(formID + '.organization_current_month_all_records.date_start_month').value;
        var range_start_DAY		= document.getElementById(formID + '.organization_current_month_all_records.date_start_day').value;
        var range_start_YEAR	= document.getElementById(formID + '.organization_current_month_all_records.date_start_year').value;
    
    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;
    
        var range_end_MONTH		= document.getElementById(formID + '.organization_current_month_all_records.date_end_month').value;
        var range_end_DAY			= document.getElementById(formID + '.organization_current_month_all_records.date_end_day').value;
        var range_end_YEAR		= document.getElementById(formID + '.organization_current_month_all_records.date_end_year').value;
    
    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		
    
    
    
    
    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		
    		if(params_users != null){
    			var params							= '&_filter=' + parameters + params_users + range;
    		}else{
    			var params							= '&_filter=' + parameters + range;	
    		}
    		

			
			break;
			// -----------------------------------------





			// MODULE: REPORTS - ALL TRANSACTIONS --------------------------
			case('manager_current_month_all_records.report'):

				var params_users			= ':';

				// capture user specific checkbox selections ---------------------------
				var form 				= document.forms[formID];
			
			  for(i = 0; i < form.elements.length; i++){
			
			  	// IF -------------------- 
			  	if(form.elements[i].type == "checkbox"){
			
			    	var FormComponent_EXPLODED	= form.elements[i].id.split('.');
			    	
			    	// form components -------------------
			    	FormComponent_FORMTYPE	=	FormComponent_EXPLODED[0];
			    	FormComponent_TABLE			=	FormComponent_EXPLODED[1];
			    	FormComponent_FIELD			=	FormComponent_EXPLODED[2];
			
						if(form.elements[i].checked && FormComponent_FIELD != 'series_gm_per_transaction' && FormComponent_FIELD != 'series_client_net' && FormComponent_FIELD != 'series_gross_profit' && FormComponent_FIELD != 'series_po_cost' && FormComponent_FIELD != 'series_direct_commission' && FormComponent_FIELD != 'series_profit_percentage'){
							params_users					+= form.elements[i].value + '.';
						}
			    }
			  }
			  // =================================================================



    		// range ---------------------------------
    		var range_start_COMP;
    		var range_end_COMP;

        var range_start_MONTH	= document.getElementById(formID + '.manager_current_month_all_records.date_start_month').value;
        var range_start_DAY		= document.getElementById(formID + '.manager_current_month_all_records.date_start_day').value;
        var range_start_YEAR	= document.getElementById(formID + '.manager_current_month_all_records.date_start_year').value;
    
    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;
    
        var range_end_MONTH		= document.getElementById(formID + '.manager_current_month_all_records.date_end_month').value;
        var range_end_DAY			= document.getElementById(formID + '.manager_current_month_all_records.date_end_day').value;
        var range_end_YEAR		= document.getElementById(formID + '.manager_current_month_all_records.date_end_year').value;
    
    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		
    
    
    
    
    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		
    		if(params_users != null){
    			var params							= '&_filter=' + parameters + params_users + range;
    		}else{
    			var params							= '&_filter=' + parameters + range;	
    		}
    		

			
			break;
			// -----------------------------------------










			// MODULE: REPORTS - ALL TRANSACTIONS --------------------------
			case('salesman_current_month_all_records.report'):

    		// range ---------------------------------
    		var range_start_COMP;
    		var range_end_COMP;

        var range_start_MONTH	= document.getElementById(formID + '.salesman_current_month_all_records.date_start_month').value;
        var range_start_DAY		= document.getElementById(formID + '.salesman_current_month_all_records.date_start_day').value;
        var range_start_YEAR	= document.getElementById(formID + '.salesman_current_month_all_records.date_start_year').value;
    
    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;
    
        var range_end_MONTH		= document.getElementById(formID + '.salesman_current_month_all_records.date_end_month').value;
        var range_end_DAY			= document.getElementById(formID + '.salesman_current_month_all_records.date_end_day').value;
        var range_end_YEAR		= document.getElementById(formID + '.salesman_current_month_all_records.date_end_year').value;
    
    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		
    
    
    
    
    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		var params							= '&_filter=' + parameters + range;

			
			break;
			// -----------------------------------------




			// MODULE: DASHBOARD SALESPERSON ---------------------
			case('salesman_current_month.report'):
			
    		// range ---------------------------------
    		var range_start_COMP;
    		var range_end_COMP;
    
        var range_start_MONTH	= document.getElementById(formID + '.salesman_current_month.date_start_month').value;
        var range_start_DAY		= document.getElementById(formID + '.salesman_current_month.date_start_day').value;
        var range_start_YEAR	= document.getElementById(formID + '.salesman_current_month.date_start_year').value;
    
    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;

        var range_end_MONTH		= document.getElementById(formID + '.salesman_current_month.date_end_month').value;
        var range_end_DAY			= document.getElementById(formID + '.salesman_current_month.date_end_day').value;
        var range_end_YEAR		= document.getElementById(formID + '.salesman_current_month.date_end_year').value;
    
    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		

    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		var params							= '&_filter=' + parameters + range;

			break;
			// -----------------------------------------


			// MODULE: DASHBOARD MANAGER -------------------------
			case('manager_current_month.report'):
			
    		// range ---------------------------------
    		var range_start_COMP;
    		var range_end_COMP;
    
        var range_start_MONTH	= document.getElementById(formID + '.manager_current_month.date_start_month').value;
        var range_start_DAY		= document.getElementById(formID + '.manager_current_month.date_start_day').value;
        var range_start_YEAR	= document.getElementById(formID + '.manager_current_month.date_start_year').value;
    
    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;

        var range_end_MONTH		= document.getElementById(formID + '.manager_current_month.date_end_month').value;
        var range_end_DAY			= document.getElementById(formID + '.manager_current_month.date_end_day').value;
        var range_end_YEAR		= document.getElementById(formID + '.manager_current_month.date_end_year').value;
    
    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		

    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		var params							= '&_filter=' + parameters + range;

			break;
			// -----------------------------------------












			// MODULE: DASHBOARD SALESPERSON ---------------------
			case('manager_totals.report'):
			
    		// range ---------------------------------
    		var range_start_COMP;
    		var range_end_COMP;
    
        var range_start_MONTH	= document.getElementById(formID + '.manager_current_month.date_start_month').value;
        var range_start_DAY		= document.getElementById(formID + '.manager_current_month.date_start_day').value;
        var range_start_YEAR	= document.getElementById(formID + '.manager_current_month.date_start_year').value;
    
    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;

        var range_end_MONTH		= document.getElementById(formID + '.manager_current_month.date_end_month').value;
        var range_end_DAY			= document.getElementById(formID + '.manager_current_month.date_end_day').value;
        var range_end_YEAR		= document.getElementById(formID + '.manager_current_month.date_end_year').value;
    
    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		

    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		var params							= '&_filter=' + parameters + range;


			break;
			// -----------------------------------------








			// MODULE: DASHBOARD SALESPERSON ---------------------
			case('salesman_totals.report'):
			
    		// range ---------------------------------
    		var range_start_COMP;
    		var range_end_COMP;
    
        var range_start_MONTH	= document.getElementById(formID + '.salesman_current_month.date_start_month').value;
        var range_start_DAY		= document.getElementById(formID + '.salesman_current_month.date_start_day').value;
        var range_start_YEAR	= document.getElementById(formID + '.salesman_current_month.date_start_year').value;
    
    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;

        var range_end_MONTH		= document.getElementById(formID + '.salesman_current_month.date_end_month').value;
        var range_end_DAY			= document.getElementById(formID + '.salesman_current_month.date_end_day').value;
        var range_end_YEAR		= document.getElementById(formID + '.salesman_current_month.date_end_year').value;
    
    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		

    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		var params							= '&_filter=' + parameters + range;


			break;
			// -----------------------------------------



			// MODULE: DASHBOARD SALESPERSON ---------------------
			case('salesman_quota_dashboard.report'):
			
    		// range ---------------------------------
    		var range_start_COMP;
    		var range_end_COMP;
    
        var range_start_MONTH	= document.getElementById(formID + '.salesman_current_month.date_start_month').value;
        var range_start_DAY		= document.getElementById(formID + '.salesman_current_month.date_start_day').value;
        var range_start_YEAR	= document.getElementById(formID + '.salesman_current_month.date_start_year').value;
    
    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;

        var range_end_MONTH		= document.getElementById(formID + '.salesman_current_month.date_end_month').value;
        var range_end_DAY			= document.getElementById(formID + '.salesman_current_month.date_end_day').value;
        var range_end_YEAR		= document.getElementById(formID + '.salesman_current_month.date_end_year').value;
    
    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		

    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		var params							= '&_filter=' + parameters + range;


			break;
			// -----------------------------------------




			// MODULE: DASHBOARD SALESPERSON ---------------------
			case('salesman_overunder.report'):
			
    		// range ---------------------------------
    		var range_start_COMP;
    		var range_end_COMP;
    
        var range_start_MONTH	= document.getElementById(formID + '.salesman_current_month.date_start_month').value;
        var range_start_DAY		= document.getElementById(formID + '.salesman_current_month.date_start_day').value;
        var range_start_YEAR	= document.getElementById(formID + '.salesman_current_month.date_start_year').value;
    
    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;

        var range_end_MONTH		= document.getElementById(formID + '.salesman_current_month.date_end_month').value;
        var range_end_DAY			= document.getElementById(formID + '.salesman_current_month.date_end_day').value;
        var range_end_YEAR		= document.getElementById(formID + '.salesman_current_month.date_end_year').value;
    
    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		

    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		var params							= '&_filter=' + parameters + range;


			break;
			// -----------------------------------------



			default:
			
				if(targetMethod == 'manager_current_month.dynadash.outdoor' || targetMethod == 'manager_current_month.dynadash.internet' || targetMethod == 'manager_current_month.dynadash.tv' || targetMethod == 'manager_current_month.dynadash.radio' || targetMethod == 'manager_current_month.dynadash.print' || targetMethod == 'manager_current_month.dynadash.mobile'){

	    		// range ---------------------------------
	    		var range_start_COMP;
	    		var range_end_COMP;
	    
	        var range_start_MONTH	= document.getElementById(formID + '.manager_current_month.date_start_month').value;
	        var range_start_DAY		= document.getElementById(formID + '.manager_current_month.date_start_day').value;
	        var range_start_YEAR	= document.getElementById(formID + '.manager_current_month.date_start_year').value;
	    
	    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;
	
	        var range_end_MONTH		= document.getElementById(formID + '.manager_current_month.date_end_month').value;
	        var range_end_DAY			= document.getElementById(formID + '.manager_current_month.date_end_day').value;
	        var range_end_YEAR		= document.getElementById(formID + '.manager_current_month.date_end_year').value;
	    
	    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		
	
	    		var params_base				= '_function=' + targetMethod;
	    		var range							= '&_range=' + range_start_COMP + ':' + range_end_COMP;
	    		var params						= '&_filter=' + parameters + range;
	
					targetMethod					= 'manager_current_month.dynadash';



				}else if(targetMethod == 'salesman_current_month.dynadash.outdoor' || targetMethod == 'salesman_current_month.dynadash.internet' || targetMethod == 'salesman_current_month.dynadash.tv' || targetMethod == 'salesman_current_month.dynadash.radio' || targetMethod == 'salesman_current_month.dynadash.print' || targetMethod == 'salesman_current_month.dynadash.mobile'){

	    		// range ---------------------------------
	    		var range_start_COMP;
	    		var range_end_COMP;
	    
	        var range_start_MONTH	= document.getElementById(formID + '.salesman_current_month.date_start_month').value;
	        var range_start_DAY		= document.getElementById(formID + '.salesman_current_month.date_start_day').value;
	        var range_start_YEAR	= document.getElementById(formID + '.salesman_current_month.date_start_year').value;
	    
	    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;
	
	        var range_end_MONTH		= document.getElementById(formID + '.salesman_current_month.date_end_month').value;
	        var range_end_DAY			= document.getElementById(formID + '.salesman_current_month.date_end_day').value;
	        var range_end_YEAR		= document.getElementById(formID + '.salesman_current_month.date_end_year').value;
	    
	    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		
	
	    		var params_base				= '_function=' + targetMethod;
	    		var range							= '&_range=' + range_start_COMP + ':' + range_end_COMP;
	    		var params						= '&_filter=' + parameters + range;
	
					targetMethod					= 'salesman_current_month.dynadash';

				}



			
			
			
			break;





		}
		// ===============================================================






  	// process form via ajax -----------------------
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

  		if(INTERNAL_XMLHTTPOBJ.responseText == 666){
  			alert('ERROR: Please Retry');

  		}else if(INTERNAL_XMLHTTPOBJ.responseText == 111){
  			alert('SUCCESS');

  		}else if(INTERNAL_XMLHTTPOBJ.responseText != ''){
  			//alert(INTERNAL_XMLHTTPOBJ.responseText);
  			

  			document.getElementById(targetMethod).innerHTML = INTERNAL_XMLHTTPOBJ.responseText;
  			
  			//document.getElementById('results_window').innerHTML = INTERNAL_XMLHTTPOBJ.responseText;
  			document.getElementById('_progressMeter').innerHTML = '';
  		}
  
  	}else{
  		// no response ---------------------
  		//document.getElementById('_progressMeter').innerHTML = '<img src="/common/img/ani/disc.gif" />';
  		document.getElementById('_progressMeter').innerHTML = 'querying...';
  	}
  };
  	INTERNAL_XMLHTTPOBJ.send(params);


	}
// -----------------------------------------------------------------------------

























// -----------------------------------------------------------------------------
	function _SM_Report_Update_TEST(){

			//alert(field.value);

		var range_start_COMP;
		var range_end_COMP;

    var range_start_MONTH	= document.getElementById('form_activity.user_session_activity.date_start_month').value;
    var range_start_DAY		= document.getElementById('form_activity.user_session_activity.date_start_day').value;
    var range_start_YEAR	= document.getElementById('form_activity.user_session_activity.date_start_year').value;

		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;

    var range_end_MONTH		= document.getElementById('form_activity.user_session_activity.date_end_month').value;
    var range_end_DAY			= document.getElementById('form_activity.user_session_activity.date_end_day').value;
    var range_end_YEAR		= document.getElementById('form_activity.user_session_activity.date_end_year').value;

		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;



		alert(range_end_COMP);

}
// -----------------------------------------------------------------------------




















// -----------------------------------------------------------------------------
	function SM_PDF_Report(formID, targetMethod){

 		var params_base					= '_function=' + targetMethod;

//alert(targetMethod);


		// report swtich =================================================
 		switch(targetMethod){

			// MODULE: ACTIVITY ----------------------------------
			case('salesman_current_month_all_records'):

				//formID	=	'form_activity';
			
    		// range ---------------------------------
    		var range_start_COMP;
    		var range_end_COMP;
    
        var range_start_MONTH	= document.getElementById(formID + '.' + targetMethod + '.' + 'date_start_month').value;
        var range_start_DAY		= document.getElementById(formID + '.' + targetMethod + '.' + 'date_start_day').value;
        var range_start_YEAR	= document.getElementById(formID + '.' + targetMethod + '.' + 'date_start_year').value;
    
    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;
    
        var range_end_MONTH		= document.getElementById(formID + '.' + targetMethod + '.' + 'date_end_month').value;
        var range_end_DAY			= document.getElementById(formID + '.' + targetMethod + '.' + 'date_end_day').value;
        var range_end_YEAR		= document.getElementById(formID + '.' + targetMethod + '.' + 'date_end_year').value;
    
    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		
    
    
				targetMethod					=	targetMethod + '.pdf';
    
    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		var params							= '&_filter=' + 'ts_sold:desc' + range;

			
			break;
			// -----------------------------------------




			// MODULE: MGR TRANSACTIONS --------------------------
			case('manager_current_month_all_records'):


				var params_users			= ':';

				// capture user specific checkbox selections ---------------------------
				var form 				= document.forms[formID];
			
			  for(i = 0; i < form.elements.length; i++){
			
			  	// IF -------------------- 
			  	if(form.elements[i].type == "checkbox"){
			
			    	var FormComponent_EXPLODED	= form.elements[i].id.split('.');
			    	
			    	// form components -------------------
			    	FormComponent_FORMTYPE	=	FormComponent_EXPLODED[0];
			    	FormComponent_TABLE			=	FormComponent_EXPLODED[1];
			    	FormComponent_FIELD			=	FormComponent_EXPLODED[2];
			
						if(form.elements[i].checked && FormComponent_FIELD != 'series_gm_per_transaction' && FormComponent_FIELD != 'series_client_net' && FormComponent_FIELD != 'series_gross_profit' && FormComponent_FIELD != 'series_po_cost' && FormComponent_FIELD != 'series_direct_commission' && FormComponent_FIELD != 'series_profit_percentage'){
							params_users					+= form.elements[i].value + '.';
						}
			    }
			  }
			  // =================================================================



    		// range ---------------------------------
    		var range_start_COMP;
    		var range_end_COMP;

        var range_start_MONTH	= document.getElementById(formID + '.manager_current_month_all_records.date_start_month').value;
        var range_start_DAY		= document.getElementById(formID + '.manager_current_month_all_records.date_start_day').value;
        var range_start_YEAR	= document.getElementById(formID + '.manager_current_month_all_records.date_start_year').value;
    
    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;
    
        var range_end_MONTH		= document.getElementById(formID + '.manager_current_month_all_records.date_end_month').value;
        var range_end_DAY			= document.getElementById(formID + '.manager_current_month_all_records.date_end_day').value;
        var range_end_YEAR		= document.getElementById(formID + '.manager_current_month_all_records.date_end_year').value;
    
    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		
    
    
    		targetMethod					=	targetMethod + '.pdf';
    
    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		
    		if(params_users != null){
    			var params							= '&_filter=' + 'ts_sold:desc' + params_users + range;
    		}else{
    			var params							= '&_filter=' + 'ts_sold:desc' + range;	
    		}
    		
			
			break;
			// -----------------------------------------






			// MODULE: ORG TRANSACTIONS --------------------------
			case('organization_current_month_all_records'):


				var params_users			= ':';

				// capture user specific checkbox selections ---------------------------
				var form 				= document.forms[formID];
			
			  for(i = 0; i < form.elements.length; i++){
			
			  	// IF -------------------- 
			  	if(form.elements[i].type == "checkbox"){
			
			    	var FormComponent_EXPLODED	= form.elements[i].id.split('.');
			    	
			    	// form components -------------------
			    	FormComponent_FORMTYPE	=	FormComponent_EXPLODED[0];
			    	FormComponent_TABLE			=	FormComponent_EXPLODED[1];
			    	FormComponent_FIELD			=	FormComponent_EXPLODED[2];
			
						if(form.elements[i].checked && FormComponent_FIELD != 'series_gm_per_transaction' && FormComponent_FIELD != 'series_client_net' && FormComponent_FIELD != 'series_gross_profit' && FormComponent_FIELD != 'series_po_cost' && FormComponent_FIELD != 'series_direct_commission' && FormComponent_FIELD != 'series_profit_percentage'){
							params_users					+= form.elements[i].value + '.';
						}
			    }
			  }
			  // =================================================================



    		// range ---------------------------------
    		var range_start_COMP;
    		var range_end_COMP;

        var range_start_MONTH	= document.getElementById(formID + '.organization_current_month_all_records.date_start_month').value;
        var range_start_DAY		= document.getElementById(formID + '.organization_current_month_all_records.date_start_day').value;
        var range_start_YEAR	= document.getElementById(formID + '.organization_current_month_all_records.date_start_year').value;
    
    		range_start_COMP			= range_start_MONTH + '.' + range_start_DAY + '.' + range_start_YEAR;
    
        var range_end_MONTH		= document.getElementById(formID + '.organization_current_month_all_records.date_end_month').value;
        var range_end_DAY			= document.getElementById(formID + '.organization_current_month_all_records.date_end_day').value;
        var range_end_YEAR		= document.getElementById(formID + '.organization_current_month_all_records.date_end_year').value;
    
    		range_end_COMP				= range_end_MONTH + '.' + range_end_DAY + '.' + range_end_YEAR;		
    
    
    		targetMethod					=	targetMethod + '.pdf';
    
    		var params_base					= '_function=' + targetMethod;
    		var range								= '&_range=' + range_start_COMP + ':' + range_end_COMP;
    		
    		if(params_users != null){
    			var params							= '&_filter=' + 'ts_sold:desc' + params_users + range;
    		}else{
    			var params							= '&_filter=' + 'ts_sold:desc' + range;	
    		}
    		
			
			break;
			// -----------------------------------------


		}



  	// process form via ajax -----------------------
		//var base_url 			= window.location.protocol + '//' + window.location.hostname;
		//var target_url 		= base_url + '/execute';
		//var params 				= '_function='+params_base+'&_Parameter='+Parameter;
		//var params 				= '_function='+targetMethod;




  	// process form via ajax -----------------------
		var base_url 			= window.location.protocol + '//' + window.location.hostname;
		var target_url 		= base_url + '/execute';
  	//var target_url				= 'execute';
  	var params						= params_base + params;

//DEBUG
//alert(params);



			window.location = target_url+'?'+params;
			document.getElementById('_progressMeter').innerHTML = 'generating...';
			setTimeout("eraseProgressMeter()",4000);

/*
  	// process form via ajax -----------------------
		var base_url 			= window.location.protocol + '//' + window.location.hostname;
		var target_url 		= base_url + '/execute';
		var params 				= '_function='+params_base+'&_Parameter='+Parameter;
		var params 				= '_function='+targetMethod;
*/

/*
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


			window.location = target_url+'?'+params;
			document.getElementById('_progressMeter').innerHTML = 'presenting...';

			setTimeout("eraseProgressMeter()",4000);

  	}else{
  		document.getElementById('_progressMeter').innerHTML = 'generating...';
  	}
  };
  	INTERNAL_XMLHTTPOBJ.send(params);


*/

}
// -----------------------------------------------------------------------------





		function eraseProgressMeter(){
			document.getElementById('_progressMeter').innerHTML = '';
		}