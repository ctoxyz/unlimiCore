<?php

// --------------------------------------------------------------------------------------------------------------------------------
// Author: 	Nathaniel Adam Briggs @ Q1 - Q4 2008  nathaniel.briggs@gmail.com - REVISED 08/2010
// Owner:		eGenerations Network, Inc. | syntheticMagic Advanced Business Services
// Client:	SM
// Class:		memberAffiliate
// Version:	Release 1.1
// Method:	example()
// Purpose:	Handle all Member Operations
// Usage:		

//					Instantiate ----------------------------------------------------------------------
//         	

//					Execute example() Method with $x (array) parameter (Examples @ base of file)
//					
//					
//					
//					
// --------------------------------------------------------------------------------------------------------------------------------





// INTERFACE ===========================================================================================================

interface EXT_unlimiCoreInterface {

	// Core Commands ---------------------------------------------------
	public function Create($NewUserArray);
	public function Encrypt($PlainText, $Cipher = 'public', $Property = null);
	public function Decrypt($CipherText, $Cipher = 'public', $Property = null);



	// mail commands ---------------------------------------------------
	public function SendActivationEmail($UserID, $EmailAddress = 0, $UserPassword = 0);


	// security methods ------------------------------------------------
	public function ModuleAuthentication($UserID, $URI);
	
	
	// user commands ---------------------------------------------------
	public function CreateResource($ResourceArray);
	public function CreateUserModules($UserID, $ResourceUserTypeID);
	public function EditResource($ResourceArray);



	//transactions -----------------------------------------------------
	public function CreateTransaction($TransactionArray);
	public function KillTransaction($TransactionArray);
	public function GenerateIO($UserID, $SoldDate);
	public function GeneratePO($UserID, $SoldDate);

	public function IMPORT_CreateTransaction($TransactionArray);
	public function GENERATE_CreateTransaction($NumTransactions);






	// conversion commands ---------------------------------------------
	public function FieldName_to_HumanReadable($FieldName);
	public function UserID_to_UserType($UserID);
	public function UserTypeID_to_UserType($UserTypeID);
	public function UserID_to_UserInitials($UserID);
	public function Disabled_to_Status($Enum);

	public function VendorID_to_VendorName($ID);
	public function AdvertiserID_to_AdvertiserName($ID);
	public function ClientID_to_ClientName($ID);
	
	public function GetCommission_to_CommissionRate($CommissionRateID);
	public function CommissionDecimal_to_CommissionRateID($CommissionRateDecimal);

	public function MediumID_to_MediumType($ID);
	public function MediumID_to_MediumTiming($ID);
	public function MediumType_to_MediumID($MediumType);
	public function OriginType_to_OriginID($OriginType);






	// get datasets ----------------------------------------------------
	public function GetDataRecords($ContentType, $Mode = 'multi', $RecordID = null, $Limit = null);
	public function GetOrganization($OrganizationID, $SpecificField = null);
	public function GetUserModules($UserID);
	public function GetHumanCapital($Domain, $Filter = null);

	public function GetClients($Domain, $SubDomain = null, $SubSubDomain = null);
	public function GetVendors($Domain, $SubDomain = null, $SubSubDomain = null);
	public function GetAdvertisers($Domain, $SubDomain = null, $SubSubDomain = null);
	
	public function GetMedium();
	public function GetMediumTiming();
	//public function GetVendors();
	public function GetOrganizations($Domain, $SubDomain = null);
	public function GetOrigin();
	public function GetCommissionRates();
	public function GetUserTypes($BaseLevel);

	public function GetManagers($Domain, $SubDomain = null);
	public function GetUserRecord($UserID);
	public function GetUsersManager($ActiveUserSession);

	public function GetManagerTeam($ManagerUserID);
	public function GetOrganizationTeam($OrganizationID);


	// get financial data ----------------------------------------------
	public function GetUserQuota($UserID, $Month, $Year);
	public function GetUserSalesTotal($UserID, $Month, $Year);
	public function GetAllSalesAverage_ORG($Domain, $Month, $Year, $SubtractUserID = null);
	public function GetUserDirectCommissionTotal($UserID, $Month, $Year);
	public function GetUserSalesTotals_ByMedia($UserID, $Month, $Year);
	public function GetUserSalesTotals_ByMonthRange($UserID, $Range);


	public function GetMANAGERSalesTotals_ByMonthRange($ManagerUserID, $Range, $Filter);
	public function GetORGANIZATIONSalesTotals_ByMonthRange($OrganizationID, $Range, $Filter);
	
	public function GetManagerQuota($UserID, $Range);
	public function GetManagerTeamSalesTotal($UserID, $Month, $Year);
	public function GetManagerTeamSalesTotals_ByMedia($UserID, $Month, $Year);



	public function GetTransactions($Domain, $SubDomain = null, $Filter = null, $Range = null, $ReportID = null);

	// sales reports ---------------------
	public function Get_SalesPerson_Dashboard_Month_COMPOSITE($SalesPersonUserID = null, $Filter = null, $Range = null);
	public function Get_SalesPerson_Transactions_Month_FULLDETAIL($SalesPersonUserID = null, $Filter = null, $Range = null);
	public function Get_SalesPerson_Dashboard_Month_MEDIUM($SalesPersonUserID = null, $MediumID, $Filter = null, $Range = null);


	// manager reports -------------------
	public function Get_MANAGER_Dashboard_Month_COMPOSITE($ManagerUserID = null, $Filter = null, $Range = null);
	public function Get_MANAGER_Transactions_Month_FULLDETAIL($ManagerUserID = null, $Filter = null, $Range = null);
	public function Get_MANAGER_Dashboard_Month_MEDIUM($ManagerUserID = null, $MediumID, $Filter = null, $Range = null);





	// navbar total (SALESPERSON) --------------------------------------
	public function Get_SalesPerson_NavBoard_Today($SalesPersonUserID);
	public function Get_SalesPerson_NavBoard_CurrentMonth($SalesPersonUserID);













	// tracking --------------------------------------------------------
	public function TrackAction($UserID, $Action, $SubAction = 'n/a', $RelativeData = 'n/a', $Token = 'n/a', $AgentSignature = 'n/a');


	// form processing -------------------------------------------------
	public function GetFormValidationRules($Field = null);
	public function ValidateForm($FormData, $Mode = 1);
	public function Validate_USPhone($PhoneNumber);
	public function Validate_ZIPCode($ZIPCode);
	public function VerifyUnique_eMail($eMail_Addr);

	// user methods ----------------------------------------------------
	public function GetMemberSessionActions($UserID, $Filter = null, $Range = null, $Limit = null);



	// helper methods --------------------------------------------------
	public function GetRangeLimit($ReportType);
	public function NumDaysInMonth($Month, $Year);

	public function Month_to_MonthFirstTS($Month, $Year);
	public function Month_to_MonthLastTS($Month, $Year);

	public function Filter_Non_Numeric($Data);
	
	public function Timestamp_to_Quarter($Timestamp);

	public function Timestamp_Start_Today();
	public function Timestamp_End_Today();



	// reports ---------------------------------------------------------
	public function Report_UserSessionActions($Dataset, $Title, $DataType = 'HTML', $Range = null);
	public function Report_SalesPerson_Primary($Dataset, $Title, $DataType = 'HTML', $Range = null, $TargetReport = null);
	public function Report_SalesPerson_Secondary($Dataset, $Title, $DataType = 'HTML', $Range = null);
	public function Report_SalesPerson_OverUnder($Dataset, $Title, $DataType = 'HTML', $Range = null);

	public function Report_MANAGER_Primary($Dataset, $Title, $DataType = 'HTML', $Range = null, $TargetReport = null);
	public function Report_Manager_Primary_DYNDASHCOMPOSITE($Dataset, $Title, $DataType = 'HTML', $Range = null, $TargetReport = null);

	// charts ----------------------------------------------------------
	public function CHART_DASHBOARD_SalesPerson_QUOTA($UserID);
	public function CHART_DASHBOARD_SalesPerson_MEDIUM($UserID);
	public function CHART_REPORTS_Transactions($UserID, $Title, $Range, $Series = null, $Filter= null);

	public function CHART_DASHBOARD_Manager_QUOTA($UserID);
	public function CHART_DASHBOARD_Manager_MEDIUM($UserID);





	// IN DEVELOPMENT !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	public function Report_HumanCapital($Dataset, $Title, $DataType = 'HTML', $Range = null);
	public function Report_Transactions($Dataset, $Title, $DataType = 'HTML', $Range = null);
	
	public function Report_ClientCampaigns($Dataset, $Title, $DataType = 'HTML', $Range = null);
	
	


	// release canidates !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	public function MatrixPromo($Dataset);
	public function Spreadsheet_1($Dataset, $Title);

	






	// templates / reference -------------------------------------------
	public function Generate_SessionActivity_Report($PromoID_DECRYPTED, $Type, $Range = false, $Option = false);






// DEPRECIATED / LEGACY !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	// affiliate operations --------------------------------------------
	public function GetLanderData($LanderID);																																		//legacy
	public function GetAllLanders($Property);																																		//legacy

	
}

// END OF INTERFACE ====================================================================================================












// START OF CLASS ======================================================================================================

class EXT_unlimiCore extends unlimiCore implements EXT_unlimiCoreInterface{


// PROPERTIES ----------------------------------------------------------------------------









// METHODS -------------------------------------------------------------------------------




	// CONSTRUCTOR =====================================================


	// CONSTRUCTOR =====================================================
	public function __construct(){
		parent::__construct();
	}
	// =================================================================






	// DESTRUCTOR ======================================================
	public function __destruct(){
		parent::__destruct();
	}
	// =================================================================













// =======================================================================================
	public function GenerateIO($UserID, $SoldDate){

		$_return					= false;
		$ResultArray			= null;
		$IO								=	'IO';

		$_UserRecord			=	$this->GetUserRecord($UserID);
		$IO								.=	strtoupper(substr($_UserRecord['first_name'],0,1)).strtoupper(substr($_UserRecord['last_name'],0,1));
		$IO								.=	date('dmy',$SoldDate);

		$_return					=	$IO;

	 return $_return;
	}
// =======================================================================================







// =======================================================================================
	public function GeneratePO($UserID, $SoldDate){

		$_return					= false;
		$ResultArray			= null;
		$IO								=	'PO';

		$_UserRecord			=	$this->GetUserRecord($UserID);
		$IO								.=	strtoupper(substr($_UserRecord['first_name'],0,1)).strtoupper(substr($_UserRecord['last_name'],0,1));
		$IO								.=	date('dmy',$SoldDate);

		$_return					=	$IO;

	 return $_return;
	}
// =======================================================================================










// =======================================================================================
	public function KillTransaction($TransactionArray){

		$_return					= 666;

		$_timestamp				= time();

		//convert array ------------------------------
		$_Command				=	$TransactionArray['command'];
		$_Parameter			=	$TransactionArray['parameter'];
		$_contentID			=	$TransactionArray['contentid'];



		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------





		// functions ---------------------------------
		switch($_Command){




			// =============================================================
			case 'transaction.delete':

				// IF finance || god ---------------------
				if($_SESSION['ActiveUser']['user_type'] == 'finance' || $_SESSION['ActiveUser']['user_type'] == 'god'){

	  			// EDIT --------------------------------
	  			if($_contentID){
	
	   				if( mysql_query("DELETE FROM booking WHERE booking.id = $_contentID") ){
	   				//if( 1 == 1 ){
	
							// record action -----------------------------
							$this->TrackAction($_SESSION['ActiveUser']['userid'], 'transaction.'.$_contentID, 'deleted', $_SERVER['HTTP_REFERER'], $ResourceArray['_token'], $ResourceArray['_agent_signature']);
	
	   					// report success ----------------
	   					$_return			= 111;
	   					return $_return;
	   				}
	      	}
			}else{
				// record action -----------------------------
				$this->TrackAction($_SESSION['ActiveUser']['userid'], 'transaction.'.$_contentID, 'BREACH - KILL ATTEMPT', $_SERVER['HTTP_REFERER'], $ResourceArray['_token'], $ResourceArray['_agent_signature']);
			}


			break;
			// =============================================================

		} // END switch
		// -------------------------------------------





		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================




















// =======================================================================================
	public function EditResource($DataArray){

		$_return					= 666;

		$_timestamp				= time();

		//convert array ------------------------------
		$_Command				=	$DataArray['command'];
		$_Parameter			=	$DataArray['parameter'];
		$_contentID			=	$DataArray['contentid'];



		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1, $Property);  //read operation
		// -------------------------------------------






		// functions ---------------------------------
		switch($_Command){



			// user.quota ==================================================
			case 'user.quota':

  			// EDIT --------------------------------
  			if($_contentID){

   				if(is_numeric($_Parameter)){
	   				if(mysql_query("UPDATE user SET user.quota_default = $_Parameter WHERE user.userid = $_contentID")){
	   					// report success ----------------
	   					$_return			= 111;
	   					return $_return;
	   				}
   				}
   				

      	}

			break;
			// =============================================================


			// user.login ==================================================
			case 'user.login':

  			// EDIT --------------------------------
  			if($_contentID){

					
					$__UserRecord	=	$this->GetUserRecord($_contentID);
					
					//echo $this->Decrypt($__UserRecord['password'], 'private');
					
					//print_r($temp__);
					//die();
					
					//activation email -----------------
					$this->SendActivationEmail($_contentID, $__UserRecord['email_addr'], $this->Decrypt($__UserRecord['password'], 'private'));

   				//if(mysql_query("DELETE FROM user WHERE user.userid = $_contentID") && mysql_query("DELETE FROM user_modules WHERE user_modules.user_id = $_contentID") && mysql_query("DELETE FROM user_session_actions WHERE user_session_actions.userid = $_contentID")){

   					// report success ----------------
   					$_return			= 111;
   					return $_return;
   				//}
      	}

			break;
			// =============================================================



			// user.delete =================================================
			case 'user.delete':

  			// EDIT --------------------------------
  			if($_contentID){

   				if(mysql_query("DELETE FROM user WHERE user.userid = $_contentID") && mysql_query("DELETE FROM user_modules WHERE user_modules.user_id = $_contentID") && mysql_query("DELETE FROM user_session_actions WHERE user_session_actions.userid = $_contentID")){

   					// report success ----------------
   					$_return			= 111;
   					return $_return;
   				}
      	}

			break;
			// =============================================================


			// user.disable ================================================
			case 'user.disable':

  			// EDIT --------------------------------
  			if($_contentID){

   				if(mysql_query("UPDATE user SET user.disabled = '1' WHERE user.userid = $_contentID")){

   					// report success ----------------
   					$_return			= 111;
   					return $_return;
   				}
      	}

			break;
			// =============================================================


			// user.enable =================================================
			case 'user.enable':

  			// EDIT --------------------------------
  			if($_contentID){

   				if(mysql_query("UPDATE user SET user.disabled = '0' WHERE user.userid = $_contentID")){

   					// report success ----------------
   					$_return			= 111;
   					return $_return;
   				}
      	}

			break;
			// =============================================================



			// user.type ===================================================
			case 'user.type':

  			// EDIT --------------------------------
  			if($_contentID){

   				if(mysql_query("DELETE FROM user_modules WHERE user_modules.user_id = $_contentID") && mysql_query("UPDATE user SET user.user_type = '$_Parameter' WHERE user.userid = $_contentID") && $this->CreateUserModules($_contentID, $_Parameter)){

   					// report success ----------------
   					$_return			= 111;
   					return $_return;
   				}
      	}

			break;
			// =============================================================




			// user.manager ================================================
			case 'user.manager':

  			// EDIT --------------------------------
  			if($_contentID){

   				if(mysql_query("UPDATE user SET user.manager_id = '$_Parameter' WHERE user.userid = $_contentID")){

   					// report success ----------------
   					$_return			= 111;
   					return $_return;
   				}
      	}

			break;
			// =============================================================


/*
			// disable.tech ================================================
			case 'disable.tech':
				
				$TableName	=	'tech';

  			// EDIT --------------------------------
  			if($_contentID){
    			
   				if(mysql_query("UPDATE $TableName SET $TableName.enabled = '0' WHERE $TableName.id = $_contentID")){
   					// report success ----------------
   					$_return			= 111;
   					return $_return;
   				}
      	}

			break;
			// =============================================================

			// enable.tech =================================================
			case 'enable.tech':
				
				$TableName	=	'tech';

  			// EDIT --------------------------------
  			if($_contentID){
    			
   				if(mysql_query("UPDATE $TableName SET $TableName.enabled = '1' WHERE $TableName.id = $_contentID")){
   					// report success ----------------
   					$_return			= 111;
   					return $_return;
   				}
      	}

			break;
			// =============================================================

			// update.tech  ================================================
			case 'update.tech':
				
				$TableName	=	'tech';



  			// EDIT --------------------------------
  			if($_contentValue){

    			// check for existing value ----------
    			//$sql_result			=	mysql_query("SELECT * FROM $TableName WHERE $TableName.$_contentName = '$_contentValue' AND $TableName.id != $_contentID");
    			
    			// if new - insert -------------------
    			//if(!mysql_numrows($sql_result) && $_contentValue){
    			$_contentValue = strtolower($_contentValue);

    			if($_contentValue){
    				if(mysql_query("UPDATE $TableName SET $TableName.$_contentName = '$_contentValue' WHERE $TableName.id = $_contentID")){
    					// report success ----------------
    					$_return			= 111;
    					return $_return;
    				}
    			}else{
						// report duplicate ----------------
						$_return			= 555;
						return $_return;
						die();
    			}
    			die();
      	}
     		// -----------------------------------

    		if(mysql_query("UPDATE $TableName SET $TableName.$_contentName = '$_contentValue' WHERE $TableName.id = $_contentID")){

    			// report success ----------
    			$_return			= 111;
    		}				

			break;
			// =============================================================
*/

		} // END switch
		// -------------------------------------------





		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================
















// =======================================================================================
	public function CreateUserModules($UserID, $ResourceUserTypeID){

		$_return					= true;


		$this->Resource_ts_created				=	time();
		$_Resource_entry_id								=	$UserID;
		

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		// determine modules & create ----
		switch($ResourceUserTypeID){
			
			// client USERTYPE -------------
			case '1':
				// dashboard
				//mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '1', '$this->Resource_ts_created') ");

				// campaigns
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '4', '$this->Resource_ts_created') ");

				// assistance
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '3', '$this->Resource_ts_created') ");					
			break;

			// sales USERTYPE --------------
			case '2':
				// dashboard
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '1', '$this->Resource_ts_created') ");

				// bigboard
				//mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '5', '$this->Resource_ts_created') ");

				// reports
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '2', '$this->Resource_ts_created') ");

				// assistance
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '3', '$this->Resource_ts_created') ");					
			break;

			// manager USERTYPE ------------
			case '3':
				// dashboard
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '1', '$this->Resource_ts_created') ");

				// reports
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '2', '$this->Resource_ts_created') ");

				// bigboard
				//mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '5', '$this->Resource_ts_created') ");

				// assistance
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '3', '$this->Resource_ts_created') ");					
			break;

			// finance USERTYPE ------------
			case '4':
				// dashboard
				//mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '1', '$this->Resource_ts_created') ");

				// reports
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '2', '$this->Resource_ts_created') ");

				// transaction
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '7', '$this->Resource_ts_created') ");

				// resources
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '6', '$this->Resource_ts_created') ");


				// assistance
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '3', '$this->Resource_ts_created') ");					
			break;

			// executive USERTYPE ------------
			case '5':	// 11.17.2010. replaced ADMIN user type
				// dashboard
				//mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '1', '$this->Resource_ts_created') ");

				// reports
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '2', '$this->Resource_ts_created') ");

				// bigboard
				//mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '5', '$this->Resource_ts_created') ");

				// assistance
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '3', '$this->Resource_ts_created') ");					
			break;



			// admin USERTYPE --------------
			//case '5':		// 11.17.2010.changed to allow for executive user type
			case '7':
				// dashboard
				//mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '1', '$this->Resource_ts_created') ");

				// resources
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '6', '$this->Resource_ts_created') ");

				// activity
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '8', '$this->Resource_ts_created') ");

				// assistance
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '3', '$this->Resource_ts_created') ");					
			break;

			// 3rdparty USERTYPE -----------
			case '6':
				// dashboard
				//mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '1', '$this->Resource_ts_created') ");

				// assistance
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '3', '$this->Resource_ts_created') ");					
			break;

			// god USERTYPE ----------------
			case '999':
				// dashboard
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '1', '$this->Resource_ts_created') ");

				// campaigns
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '4', '$this->Resource_ts_created') ");

				// bigboard
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '5', '$this->Resource_ts_created') ");

				// reports
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '2', '$this->Resource_ts_created') ");

				// transaction
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '7', '$this->Resource_ts_created') ");

				// resources
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '6', '$this->Resource_ts_created') ");

				// activity
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '8', '$this->Resource_ts_created') ");

				// assistance
				mysql_query("INSERT INTO user_modules (user_id, module_id, ts) VALUES('$_Resource_entry_id', '3', '$this->Resource_ts_created') ");					
			break;

		}
		// -------------------------------


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================














// =======================================================================================
	public function CreateResource($ResourceArray){


// DEBUG================================
//print_r($ResourceArray);
//echo 'class';
//die();

		// random word generator for passwords -------
		require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/class.rand_word.php');





		// resource type -------------------
		switch($ResourceArray['_table']){

			
			// ---------------------------------------------------------------------------------
			case 'user':


				$__FLAG_SELF_MANAGEGED_RESOURCE = false;


				// record vars -------------------------------
				$this->Resource_organization_id				=	$ResourceArray['organization_id'];
		
				$this->Resource_first_name						=	trim($ResourceArray['first_name']);
				$this->Resource_last_name							=	trim($ResourceArray['last_name']);
				$this->Resource_user_type_id					=	$ResourceArray['user_type_id'];
				
				$this->Resource_email_addr						=	trim($ResourceArray['email_addr']);
				$this->Resource_manager_id						=	$ResourceArray['manager_id'];


				if($this->Resource_manager_id == '99999999'){
					$__FLAG_SELF_MANAGEGED_RESOURCE = true;
				}



				// generate random word + 2 numbers PW
				$__PW 																=& new rand_word(5, false, true); 
				$ResourceArray['password']						=	 $__PW->word.rand(10,99);
				$this->Resource_password							=	$this->Encrypt($ResourceArray['password'], 'private');
		
		
				$this->Resource_ts_created						=	time();
		
				$this->Resource_agent_signature				=	$ResourceArray['_agent_signature'];
				$this->Resource_token									=	$ResourceArray['_token'];
		
		
		
		
				// record action -----------------------------
				$this->TrackAction($_SESSION['ActiveUser']['userid'], 'create resource', 'started', $_SERVER['HTTP_REFERER'], $ResourceArray['_token'], $ResourceArray['_agent_signature']);
		
		
		
				$_return					= false;
				$ResultArray			= null;

		
				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------

				// duplicate record check --------------------
				$sql_query		= mysql_query("SELECT * FROM user WHERE user.email_addr = '$this->Resource_email_addr'") or die(mysql_error());
				$sql_numrows	=	mysql_num_rows($sql_query);
		
				if($sql_numrows){
					die('666');
				}
				// -------------------------------------------
		
		
		
		
				// database connection -----------------------
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------
				
				if( mysql_query("INSERT INTO user (organization_id, manager_id, password, email_addr, first_name, last_name, ts_signup, ts_created, user_type, agent_signature, transaction_token) VALUES('$this->Resource_organization_id', '$this->Resource_manager_id', '$this->Resource_password', '$this->Resource_email_addr', '$this->Resource_first_name', '$this->Resource_last_name', '$this->Resource_ts_created', '$this->Resource_ts_created',	'$this->Resource_user_type_id', '$this->Resource_agent_signature', '$this->Resource_token') ") ){
		
					// get last inserted userID
		  	  $_Resource_entry_id				= mysql_insert_id();
		
					// create user modules ---------------------
					$this->CreateUserModules($_Resource_entry_id, $this->Resource_user_type_id);
		

					// if self managed - update with own userid for manager ----
					if($__FLAG_SELF_MANAGEGED_RESOURCE == true){

						// database connection -----------------------
						$obj_db->Connect(1);  //read operation
						// -------------------------------------------

						mysql_query("UPDATE user SET manager_id = '$_Resource_entry_id' WHERE userid = '$_Resource_entry_id'");
					}

		
					// record action -----------------------------
					$this->TrackAction($_SESSION['ActiveUser']['userid'], 'create resource', 'create.successful.ID.'.$_Resource_entry_id, $_SERVER['HTTP_REFERER'], $ResourceArray['_token'], $ResourceArray['_agent_signature']);



					//activation email -----------------
					$this->SendActivationEmail($_Resource_entry_id, $this->Resource_email_addr, $this->Resource_password);
		
					// return success flag -----------
					echo 111;
				}
		
				// destroy database connection object --------
				$obj_db->Close();
				unset($obj_db);
				// -------------------------------------------


			break;
			// ---------------------------------------------------------------------------------









			// ---------------------------------------------------------------------------------
			case 'client':


				// record vars -------------------------------
				$this->Resource_organization_owner_id	=	$ResourceArray['organization_id'];
				$this->Resource_name									=	trim($ResourceArray['client_name']);
				$this->Resource_first_name						=	trim($ResourceArray['client_first_name']);
				$this->Resource_last_name							=	trim($ResourceArray['client_last_name']);
				$this->Resource_email_addr						=	trim($ResourceArray['client_email_addr']);
				$this->Resource_user_type_id					=	1;

				$this->Resource_ts_created						=	time();
		
				$this->Resource_agent_signature				=	$ResourceArray['_agent_signature'];
				$this->Resource_token									=	$ResourceArray['_token'];

				// generate random word + 2 numbers PW
				$__PW 																=& new rand_word(5, false, true); 
				$ResourceArray['password']						=	 $__PW->word.rand(10,99);
				$this->Resource_password							=	$this->Encrypt($ResourceArray['password'], 'private');		



				// record action -----------------------------
				//$this->TrackAction($_SESSION['ActiveUser']['userid'], 'create client resource', 'started', $_SERVER['HTTP_REFERER'], $ResourceArray['_token'], $ResourceArray['_agent_signature']);


				$_return					= false;
				$ResultArray			= null;
		
				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------
		
				// duplicate record check --------------------
				$sql_query		= mysql_query("SELECT * FROM client WHERE client.name = '$this->Resource_name' && client.organization_owner_id = '$this->Resource_organization_owner_id'") or die(mysql_error());
				$sql_numrows	=	mysql_num_rows($sql_query);
		
				if($sql_numrows){
					die('666');
				}
				// -------------------------------------------


					// database connection -----------------------
					$obj_db->Connect(1);  //read operation
					// -------------------------------------------

				if( mysql_query("INSERT INTO client (organization_owner_id, name) VALUES('$this->Resource_organization_owner_id', '$this->Resource_name') ") ){
		
					// get last inserted userID
		  	  $_Resource_entry_id_CLIENTID		= mysql_insert_id();


					// record action -----------------------------
					$this->TrackAction($_SESSION['ActiveUser']['userid'], 'create client resource', 'create.successful.ID.'.$_Resource_entry_id_CLIENTID, $_SERVER['HTTP_REFERER'], $ResourceArray['_token'], $ResourceArray['_agent_signature']);
		
					// return success flag -----------
					//echo 111;
				}




				// CREATE CLIENT USER ACCOUNT ==========================================


					// database connection -----------------------
					$obj_db->Connect(1);  //read operation
					// -------------------------------------------

					// duplicate record check --------------------
					$sql_query		= mysql_query("SELECT * FROM user WHERE user.email_addr = '$this->Resource_email_addr'") or die(mysql_error());
					$sql_numrows	=	mysql_num_rows($sql_query);
			
					if($sql_numrows){
						die('666');
					}
					// -------------------------------------------


					// database connection -----------------------
					$obj_db->Connect(1);  //read operation
					// -------------------------------------------

					if( mysql_query("INSERT INTO user (organization_id, client_id, password, email_addr, first_name, last_name, ts_signup, ts_created, user_type, agent_signature, transaction_token) VALUES('$this->Resource_organization_owner_id', '$_Resource_entry_id_CLIENTID', '$this->Resource_password', '$this->Resource_email_addr', '$this->Resource_first_name', '$this->Resource_last_name', '$this->Resource_ts_created', '$this->Resource_ts_created',	'$this->Resource_user_type_id', '$this->Resource_agent_signature', '$this->Resource_token') ") ){
			
						// get last inserted userID
			  	  $_Resource_entry_id_USERID				= mysql_insert_id();
			
						// create user modules ---------------------
						$this->CreateUserModules($_Resource_entry_id_USERID, $this->Resource_user_type_id);


						// database connection -----------------------
						$obj_db->Connect(1);  //read operation
						// -------------------------------------------

						// update CLIENT table with USERID -------------
						mysql_query("UPDATE client SET userid = '$_Resource_entry_id_USERID' WHERE id = '$_Resource_entry_id_CLIENTID'");

						// record action -----------------------------
						$this->TrackAction($_SESSION['ActiveUser']['userid'], 'create client acct', 'create.successful.ID.'.$_Resource_entry_id_USERID, $_SERVER['HTTP_REFERER'], $ResourceArray['_token'], $ResourceArray['_agent_signature']);

	
						//activation email -----------------
						//$this->SendActivationEmail($_Resource_entry_id, $this->Resource_email_addr, $this->Resource_password);
			
						// return success flag -----------
						echo 111;
					}
	
			
					// destroy database connection object --------
					$obj_db->Close();
					unset($obj_db);
					// -------------------------------------------

				// END CREATE CLIENT USER ACCOUNT ======================================



			break;
			// ---------------------------------------------------------------------------------





			// ---------------------------------------------------------------------------------
			case 'advertiser':


				// record vars -------------------------------
				$this->Resource_organization_owner_id	=	$ResourceArray['organization_id'];
				$this->Resource_name									=	trim($ResourceArray['advertiser_name']);
		
		
				// record action -----------------------------
				$this->TrackAction($_SESSION['ActiveUser']['userid'], 'create advertiser resource', 'started', $_SERVER['HTTP_REFERER'], $ResourceArray['_token'], $ResourceArray['_agent_signature']);


				$_return					= false;
				$ResultArray			= null;

		
				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------

				// duplicate record check --------------------
				$sql_query		= mysql_query("SELECT * FROM advertiser WHERE advertiser.name = '$this->Resource_name' && advertiser.organization_owner_id = '$this->Resource_organization_owner_id'") or die(mysql_error());
				$sql_numrows	=	mysql_num_rows($sql_query);
		
				if($sql_numrows){
					die('666');
				}
				// -------------------------------------------



				// database connection -----------------------
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------

				if( mysql_query("INSERT INTO advertiser (organization_owner_id, name) VALUES('$this->Resource_organization_owner_id', '$this->Resource_name') ") ){
		
					// get last inserted userID
		  	  $_Resource_entry_id				= mysql_insert_id();


					// record action -----------------------------
					$this->TrackAction($_SESSION['ActiveUser']['userid'], 'create advertiser resource', 'create.successful.ID.'.$_Resource_entry_id, $_SERVER['HTTP_REFERER'], $ResourceArray['_token'], $ResourceArray['_agent_signature']);
		
					// return success flag -----------
					echo 111;
				}
		
				// destroy database connection object --------
				$obj_db->Close();
				unset($obj_db);
				// -------------------------------------------

			break;
			// ---------------------------------------------------------------------------------






			// ---------------------------------------------------------------------------------
			case 'vendor':


				// record vars -------------------------------
				$this->Resource_organization_owner_id	=	$ResourceArray['organization_id'];
				$this->Resource_name									=	trim($ResourceArray['vendor_name']);
		
		
				// record action -----------------------------
				$this->TrackAction($_SESSION['ActiveUser']['userid'], 'create vendor resource', 'started', $_SERVER['HTTP_REFERER'], $ResourceArray['_token'], $ResourceArray['_agent_signature']);


				$_return					= false;
				$ResultArray			= null;
		
				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------

				// duplicate record check --------------------
				$sql_query		= mysql_query("SELECT * FROM vendor WHERE vendor.name = '$this->Resource_name' && vendor.organization_owner_id = '$this->Resource_organization_owner_id'") or die(mysql_error());
				$sql_numrows	=	mysql_num_rows($sql_query);
		
				if($sql_numrows){
					die('666');
				}
				// -------------------------------------------


				// database connection -----------------------
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------

				if( mysql_query("INSERT INTO vendor (organization_owner_id, name) VALUES('$this->Resource_organization_owner_id', '$this->Resource_name') ") ){
		
					// get last inserted userID
		  	  $_Resource_entry_id				= mysql_insert_id();


					// record action -----------------------------
					$this->TrackAction($_SESSION['ActiveUser']['userid'], 'create vendor resource', 'create.successful.ID.'.$_Resource_entry_id, $_SERVER['HTTP_REFERER'], $ResourceArray['_token'], $ResourceArray['_agent_signature']);
		
					// return success flag -----------
					echo 111;
				}
		
				// destroy database connection object --------
				$obj_db->Close();
				unset($obj_db);
				// -------------------------------------------

			break;
			// ---------------------------------------------------------------------------------



		}
		// ---------------------------------








/*


    	// Create/Insert New Member --------------------------------------
    		$sql_NewMember		= mysql_query("INSERT INTO user (first_name, last_name, password, email_addr, ts_signup, ts_created, activated, level, disabled, referrer) VALUES('$this->NewMember_firstname', '$this->NewMember_lastname', '$this->NewMember_address1', '$this->NewMember_taxpayee', '$this->NewMember_taxpayee', '$this->NewMember_taxid', '$this->NewMember_sitename', '$this->NewMember_phone', '$this->NewMember_password', '$this->NewMember_email_addr', '$this->NewMember_dob', '$this->NewMember_country', '$this->NewMember_zipcode', '$this->NewMember_ts_signup', '$this->NewMember_ts_created', '$this->NewMember_ts_lastlogin', '$this->NewMember_ip', '$this->NewMember_activated', '1', '$this->NewMember_disabled', '$this->NewMember_referrer') ");

			// get last inserted userID
	  	  $userID						= mysql_insert_id();


		
		// Promocode =====================================================
		if($this->NewMember_promocode){
    	// Create/Insert New Member Specifications ---------------------
    	$sql_NewMbrSpecs	= mysql_query("INSERT INTO user_promocode (userid, promocode, discount, tsexpiration) VALUES('$userID', '$this->NewMember_promocode', '$this->NewMember_promodiscount', '$this->NewMember_promoexpire') ") or die (mysql_error());
    }
		// ===============================================================



    // Profile =======================================================
    	// Create/Insert New Member Specifications ---------------------
    	//$sql_NewMbrSpecs	= mysql_query("INSERT INTO user_profile_specs (userid, tsdob, tsjoinedon, zipcode, seek_m, seek_w, seek_c, seek_t) VALUES('$userID', '$this->NewMember_dob', '$this->NewMember_ts_created', '$this->NewMember_zipcode', '$this->NewMember_seek_m', '$this->NewMember_seek_f', '$this->NewMember_seek_c', '$this->NewMember_seek_t') ") or die (mysql_error());

    	// Insert Affiliate Host Site ----------------------------------
    	//$sql_HostSite			= mysql_query("INSERT INTO user_hostsites (userid, name, domain, ts) VALUES('$userID', '$this->NewMember_sitename', '$this->NewMember_sitename', '$this->NewMember_ts_created') ") or die (mysql_error());



			$this->SendActivationEmail($userID, $this->NewMember_email_addr, $this->NewMember_password);








		$_return					= 111;



		// record action -----------------------------
		$this->TrackAction($_SESSION['ActiveUser']['userid'], 'booking trans', 'create.successful', $_SERVER['HTTP_REFERER']);
*/





	 return $_return;
	}
// =======================================================================================






















// =======================================================================================
	public function CreateTransaction($TransactionArray){

// DEBUG ---------------------
//print_r($TransactionArray);
//die();


		// check for revision TRUE -------------------
		if($TransactionArray['_revision'] == 1){
			$this->Transaction_revised							=	0;
			$this->Transaction_revision							=	1;
			$this->Transaction_revision_parent_id		=	$this->Decrypt($TransactionArray['_revision_parent_id'],'private');
			$_ParentRecord_Revised_TS								=	time();

			// database connection -----------------------
			$obj_db						= new db;
			$obj_db->Connect(1);  //read operation
			// -------------------------------------------

			mysql_query("UPDATE booking SET revised = '$_ParentRecord_Revised_TS' WHERE id = '$this->Transaction_revision_parent_id'");
		
		// check for revision FALSE ------------------
		}elseif($TransactionArray['_revision'] == 0){
			$this->Transaction_revised							=	0;
			$this->Transaction_revision							=	0;
			$this->Transaction_revision_parent_id		=	null;
		}
		// -------------------------------------------




		// generate PO & IO ----------------
		$this->Transaction_IO_AUTO								=	$this->GenerateIO($TransactionArray['sales_person_id'], time());
		$this->Transaction_PO_AUTO								=	$this->GeneratePO($TransactionArray['sales_person_id'], time());

		// collect human entered PO & IO ---
		$this->Transaction_IO											=	$TransactionArray['io'];
		$this->Transaction_PO											=	$TransactionArray['po'];

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		// check for previous inserts ----------------
		$sql_query				= mysql_query("SELECT * FROM booking WHERE booking.po = '$this->Transaction_PO'") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);
		
		if($sql_numrows){
			
			switch(strlen($sql_numrows)){
				case 1:
					$sql_numrows	=	$sql_numrows +1;
					$this->Transaction_IO_PO_suffix_num				=	'00'.$sql_numrows;
				break;

				case 2:
					$sql_numrows	=	$sql_numrows +1;
					$this->Transaction_IO_PO_suffix_num				=	'0'.$sql_numrows;
				break;

				case 3:
					$sql_numrows	=	$sql_numrows +1;
					$this->Transaction_IO_PO_suffix_num				=	''.$sql_numrows;
				break;
			}
			
			
		}else{
			$this->Transaction_IO_PO_suffix_num						=	'001';
		}
		// -------------------------------------------






		// record vars -------------------------------
		$this->Transaction_organization_owner_id	=	$_SESSION['ActiveUser']['organization_id'];

		$this->Transaction_ts_entered							=	time();
		$this->Transaction_ts_sold								=	mktime(0, 0, 0, $TransactionArray['date_sale_month'], $TransactionArray['date_sale_day'], $TransactionArray['date_sale_year']);

		$this->Transaction_sold_month							=	strtolower(date('M',$this->Transaction_ts_sold));
		$this->Transaction_sold_year							=	date('Y',$this->Transaction_ts_sold);
		$this->Transaction_sold_quarter						=	ceil(date("m", $this->Transaction_ts_sold)/3);


		$this->Transaction_ts_check_rec						=	mktime(0, 0, 0, $TransactionArray['date_check_rec_month'], $TransactionArray['date_check_rec_day'], $TransactionArray['date_check_rec_year']);
		
		$this->Transaction_ts_on_sale							=	mktime(0, 0, 0, $TransactionArray['date_on_sale_month'], $TransactionArray['date_on_sale_day'], $TransactionArray['date_on_sale_year']);
		
		if($this->Transaction_medium_id == 1){

			$this->Transaction_ts_start							=	0;
			$this->Transaction_ts_end								=	0;
			
		}else{

			// ts start --------------
			if(!$TransactionArray['ts_start_month'] && !$TransactionArray['ts_start_day'] && !$TransactionArray['ts_start_year']){
				$this->Transaction_ts_start							=	0;
			}else{
				$this->Transaction_ts_start							=	mktime(0, 0, 0, $TransactionArray['ts_start_month'], $TransactionArray['ts_start_day'], $TransactionArray['ts_start_year']);	
			}
	
			// ts end ----------------
			if(!$TransactionArray['ts_end_month'] && !$TransactionArray['ts_end_day'] && !$TransactionArray['ts_end_year']){
				$this->Transaction_ts_end								=	0;
			}else{
				$this->Transaction_ts_end								=	mktime(0, 0, 0, $TransactionArray['ts_end_month'], $TransactionArray['ts_end_day'], $TransactionArray['ts_end_year']);	
			}		
		}
			
		

		
		$this->Transaction_issue									=	mktime(0, 0, 0, $TransactionArray['issue_month'], $TransactionArray['issue_day'], $TransactionArray['issue_year']);
		$this->Transaction_num_inserts						=	$this->Filter_Non_Numeric($TransactionArray['num_inserts']);




		$this->Transaction_medium_id							=	$TransactionArray['medium_id'];
		$this->Transaction_medium_timing_id				=	$TransactionArray['medium_timing_id'];


		$this->Transaction_origin_id							=	$TransactionArray['origin_id'];
		$this->Transaction_sales_person_id				=	$TransactionArray['sales_person_id'];
		$this->Transaction_manager_id							=	$TransactionArray['manager_id'];

		$this->Transaction_client_id							=	$TransactionArray['client_id'];
		$this->Transaction_advertiser_id					=	$TransactionArray['advertiser_id'];
		$this->Transaction_vendor_id							=	$TransactionArray['vendor_id'];
		

		$this->Transaction_total_rate_card				=	$this->Filter_Non_Numeric($TransactionArray['total_rate_card']);
		$this->Transaction_total_client_net				=	$this->Filter_Non_Numeric($TransactionArray['total_client_net']);
		$this->Transaction_po_cost								=	$this->Filter_Non_Numeric($TransactionArray['po_cost']);


		$this->Transaction_gross_profit						=	$this->Filter_Non_Numeric($TransactionArray['gross_profit']);
		$this->Transaction_profit_percentage			=	$this->Filter_Non_Numeric($TransactionArray['profit_percentage']);


		// direct commission rate --------------------
		$this->Transaction_direct_commission_id		=	$TransactionArray['direct_commission'];
		$_CommissionRate_Details									=	$this->GetCommission_to_CommissionRate($this->Transaction_direct_commission_id);
		$this->Transaction_direct_commission			=	$_CommissionRate_Details['rate'] * $this->Transaction_gross_profit;



		$this->Transaction_override_commission_id			=	$TransactionArray['override_commission'];
		$this->Transaction_marketing_commission_id		=	$TransactionArray['marketing_commission'];
		$this->Transaction_marketing_person_id				=	$TransactionArray['marketing_person_id'];

		$this->Transaction_third_party_commission_id 	=	$TransactionArray['third_party_commission'];
		$this->Transaction_third_party_person_id			=	$TransactionArray['third_party_person_id'];

		$this->Transaction_agent_signature				=	$TransactionArray['_agent_signature'];
		$this->Transaction_token									=	$TransactionArray['_token'];


// DEBUG ============================
//echo $this->Transaction_total_client_net;
//die();




		// record action -----------------------------
		$this->TrackAction($_SESSION['ActiveUser']['userid'], 'booking trans', 'create.started', $_SERVER['HTTP_REFERER'], $TransactionArray['_token'], $TransactionArray['_agent_signature']);










		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		
		
		if( mysql_query("INSERT INTO booking (
		organization_owner_id, 
		ts_entered, 
		ts_sold,
		sold_month,
		sold_year,
		sold_quarter,
		ts_on_sale,
		ts_start,
		ts_end,
		date_check_rec, 
		io,
		io_auto, 
		po,
		po_auto,
		io_po_suffix_num, 
		medium_id,
		medium_timing_id,
		sales_person_id, 
		manager_id, 
		advertiser_id, 
		client_id, 
		publication_id, 
		issue,
		num_inserts, 
		rate_card_total, 
		client_net_total,
		po_cost,
		origin_id,
		direct_commission_id,
		direct_commission,
		override_commission_id,
		marketing_commission_id,
		marketing_person_id,
		third_party_commission_id,
		third_party_person_id,
		gross_profit,
		profit_percentage,
		agent_signature, 
		transaction_token,
		revised,
		revision,
		revision_parent_id) 
		VALUES(
		'$this->Transaction_organization_owner_id', 
		'$this->Transaction_ts_entered', 
		'$this->Transaction_ts_sold',
		'$this->Transaction_sold_month',
		'$this->Transaction_sold_year',
		'$this->Transaction_sold_quarter',
		'$this->Transaction_ts_on_sale',
		'$this->Transaction_ts_start',
		'$this->Transaction_ts_end',
		'$this->Transaction_ts_check_rec',
		'$this->Transaction_IO',
		'$this->Transaction_IO_AUTO',
		'$this->Transaction_PO',
		'$this->Transaction_PO_AUTO',
		'$this->Transaction_IO_PO_suffix_num', 		
		'$this->Transaction_medium_id', 
		'$this->Transaction_medium_timing_id', 
		'$this->Transaction_sales_person_id', 
		'$this->Transaction_manager_id', 
		'$this->Transaction_advertiser_id', 
		'$this->Transaction_client_id', 
		'$this->Transaction_vendor_id',
		'$this->Transaction_issue',
		'$this->Transaction_num_inserts', 
		'$this->Transaction_total_rate_card',
		'$this->Transaction_total_client_net',
		'$this->Transaction_po_cost',
		'$this->Transaction_origin_id',
		'$this->Transaction_direct_commission_id',
		'$this->Transaction_direct_commission',
		'$this->Transaction_override_commission_id',
		'$this->Transaction_marketing_commission_id',
		'$this->Transaction_marketing_person_id',
		'$this->Transaction_third_party_commission_id',
		'$this->Transaction_third_party_person_id',
		'$this->Transaction_gross_profit',
		'$this->Transaction_profit_percentage',
		'$this->Transaction_agent_signature',
		'$this->Transaction_token',
		'$this->Transaction_revised',
		'$this->Transaction_revision',
		'$this->Transaction_revision_parent_id') ") ){



			// get last inserted userID
  	  $_transaction_entry_id				= mysql_insert_id();

			// record action -----------------------------
			$this->TrackAction($_SESSION['ActiveUser']['userid'], 'booking trans', 'create.successful.ID.'.$_transaction_entry_id, $_SERVER['HTTP_REFERER'], $TransactionArray['_token'], $TransactionArray['_agent_signature']);
		
			echo 111;
		}





die();

  	// check for duplicate ---------------------------------
  	//$sql_NewMember			= mysql_query("SELECT user.userid FROM user WHERE user.email_addr = '$this->NewMember_email_addr'");
		//$sql_obj_result			=	mysql_fetch_object($sql_NewMember);





    	// Create/Insert New Member --------------------------------------

    		//$sql_NewMember		= mysql_query("INSERT INTO user (first_name, last_name, address_1, tax_payee, tax_business_name, tax_id_ssn, site_name, password, email_addr, dob, country, zipcode, ts_signup, ts_created, ts_lastlogin, ip, activated, level, disabled, referrer) VALUES('$this->NewMember_firstname', '$this->NewMember_lastname', '$this->NewMember_address1', '$this->NewMember_taxpayee', '$this->NewMember_taxbizname', '$this->NewMember_sitename', '$this->NewMember_password', '$this->NewMember_email_addr', '$this->NewMember_dob', '$this->NewMember_country', '$this->NewMember_zipcode', '$this->NewMember_ts_signup', '$this->NewMember_ts_created', '$this->NewMember_ts_lastlogin', '$this->NewMember_ip', '$this->NewMember_activated', '1', '$this->NewMember_disabled', '$this->NewMember_referrer') ");
    		$sql_NewMember		= mysql_query("INSERT INTO user (first_name, last_name, password, email_addr, ts_signup, ts_created, activated, level, disabled, referrer) VALUES('$this->NewMember_firstname', '$this->NewMember_lastname', '$this->NewMember_address1', '$this->NewMember_taxpayee', '$this->NewMember_taxpayee', '$this->NewMember_taxid', '$this->NewMember_sitename', '$this->NewMember_phone', '$this->NewMember_password', '$this->NewMember_email_addr', '$this->NewMember_dob', '$this->NewMember_country', '$this->NewMember_zipcode', '$this->NewMember_ts_signup', '$this->NewMember_ts_created', '$this->NewMember_ts_lastlogin', '$this->NewMember_ip', '$this->NewMember_activated', '1', '$this->NewMember_disabled', '$this->NewMember_referrer') ");
    		//$sql_NewMember		= mysql_query("INSERT INTO user (first_name, last_name, address_1, tax_payee, tax_business_name, tax_id_ssn, site_name, password, email_addr, dob, country, zipcode, ts_signup, ts_created, ts_lastlogin, ip, activated, level, disabled) VALUES('$this->NewMember_firstname', '$this->NewMember_lastname', '$this->NewMember_address1', '$this->NewMember_taxpayee', '$this->NewMember_taxbizname', '$this->NewMember_sitename', '$this->NewMember_password', '$this->NewMember_email_addr', '$this->NewMember_dob', '$this->NewMember_country', '$this->NewMember_zipcode', '$this->NewMember_ts_signup', '$this->NewMember_ts_created', '$this->NewMember_ts_lastlogin', '$this->NewMember_ip', '$this->NewMember_activated', '1', '$this->NewMember_disabled') ");
    	

			// get last inserted userID
  	  $userID						= mysql_insert_id();




		
		// Promocode =====================================================
		if($this->NewMember_promocode){
    	// Create/Insert New Member Specifications ---------------------
    	$sql_NewMbrSpecs	= mysql_query("INSERT INTO user_promocode (userid, promocode, discount, tsexpiration) VALUES('$userID', '$this->NewMember_promocode', '$this->NewMember_promodiscount', '$this->NewMember_promoexpire') ") or die (mysql_error());
    }
		// ===============================================================



    // Profile =======================================================
    	// Create/Insert New Member Specifications ---------------------
    	//$sql_NewMbrSpecs	= mysql_query("INSERT INTO user_profile_specs (userid, tsdob, tsjoinedon, zipcode, seek_m, seek_w, seek_c, seek_t) VALUES('$userID', '$this->NewMember_dob', '$this->NewMember_ts_created', '$this->NewMember_zipcode', '$this->NewMember_seek_m', '$this->NewMember_seek_f', '$this->NewMember_seek_c', '$this->NewMember_seek_t') ") or die (mysql_error());

    	// Insert Affiliate Host Site ----------------------------------
    	//$sql_HostSite			= mysql_query("INSERT INTO user_hostsites (userid, name, domain, ts) VALUES('$userID', '$this->NewMember_sitename', '$this->NewMember_sitename', '$this->NewMember_ts_created') ") or die (mysql_error());



			$this->SendActivationEmail($userID, $this->NewMember_email_addr, $this->NewMember_password);









		print_r($_POST);
		die();

		$_return					= 111;

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------

		// record action -----------------------------
		$this->TrackAction($_SESSION['ActiveUser']['userid'], 'booking trans', 'create.successful', $_SERVER['HTTP_REFERER']);


	 return $_return;
	}
// =======================================================================================

















// =======================================================================================
	public function IMPORT_CreateTransaction($TransactionArray){

// DEBUG ---------------------
//print_r($TransactionArray);
//die();




	$__counter = 1;
	// parse XML -----------------------------------
	foreach($TransactionArray as $ImportKey){











		// month
		$__DateSoldMonth	=	substr($ImportKey->io,4,2);

		// day
		$__DateSoldDay		= substr($ImportKey->io,6,2);

		// year
		$__DateSoldYear		=	 substr($ImportKey->io,8,2);



		echo $__counter.' : '.$ImportKey->date_entered.' '.strtotime($ImportKey->date_entered).' '.$ImportKey->io.'  <br>';

		//echo mktime(0, 0, 0, $__DateSoldMonth, $__DateSoldDay, $__DateSoldYear);


		





		// generate PO & IO ----------------
		//$this->Transaction_IO_AUTO								=	$this->GenerateIO($TransactionArray['sales_person_id'], time());
		//$this->Transaction_PO_AUTO								=	$this->GeneratePO($TransactionArray['sales_person_id'], time());

		// collect human entered PO & IO ---
		$this->Transaction_IO											=	$ImportKey->io;
		$this->Transaction_PO											=	$ImportKey->po;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		// check for previous inserts ----------------
		$sql_query				= mysql_query("SELECT * FROM booking WHERE booking.po = '$this->Transaction_PO'") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);
		
		if($sql_numrows){
			
			switch(strlen($sql_numrows)){
				case 1:
					$sql_numrows	=	$sql_numrows +1;
					$this->Transaction_IO_PO_suffix_num				=	'00'.$sql_numrows;
				break;

				case 2:
					$sql_numrows	=	$sql_numrows +1;
					$this->Transaction_IO_PO_suffix_num				=	'0'.$sql_numrows;
				break;

				case 3:
					$sql_numrows	=	$sql_numrows +1;
					$this->Transaction_IO_PO_suffix_num				=	''.$sql_numrows;
				break;
			}
			
			
		}else{
			$this->Transaction_IO_PO_suffix_num						=	'001';
		}
		// -------------------------------------------






		// record vars -------------------------------
		$this->Transaction_organization_owner_id	=	$_SESSION['ActiveUser']['organization_id'];

		$this->Transaction_ts_entered							=	time();

		//$this->Transaction_ts_sold								=	mktime(0, 0, 0, $TransactionArray['date_sale_month'], $TransactionArray['date_sale_day'], $TransactionArray['date_sale_year']);
		$this->Transaction_ts_sold								=	mktime(0, 0, 0, $__DateSoldMonth, $__DateSoldDay, $__DateSoldYear);
		
		$this->Transaction_ts_check_rec						=	(strtolower($ImportKey->date_check_rec) == 'terms' ? mktime(0, 0, 0, $__DateSoldMonth, $__DateSoldDay, $__DateSoldYear):'');
		
		//$this->Transaction_ts_on_sale							=	mktime(0, 0, 0, $TransactionArray['date_on_sale_month'], $TransactionArray['date_on_sale_day'], $TransactionArray['date_on_sale_year']);
		$this->Transaction_ts_on_sale							=	0;



		$this->Transaction_medium_id							=	$this->MediumType_to_MediumID($ImportKey->medium);;
		$this->Transaction_medium_timing_id				=	$TransactionArray['medium_timing_id'];

		
		if($this->Transaction_medium_id == 1){

			$this->Transaction_ts_start							=	0;
			$this->Transaction_ts_end								=	0;
			
		}else{

			// ts start --------------
			if(!$TransactionArray['ts_start_month'] && !$TransactionArray['ts_start_day'] && !$TransactionArray['ts_start_year']){
				$this->Transaction_ts_start							=	0;
			}else{
				$this->Transaction_ts_start							=	mktime(0, 0, 0, $TransactionArray['ts_start_month'], $TransactionArray['ts_start_day'], $TransactionArray['ts_start_year']);	
			}
	
			// ts end ----------------
			if(!$TransactionArray['ts_end_month'] && !$TransactionArray['ts_end_day'] && !$TransactionArray['ts_end_year']){
				$this->Transaction_ts_end								=	0;
			}else{
				$this->Transaction_ts_end								=	mktime(0, 0, 0, $TransactionArray['ts_end_month'], $TransactionArray['ts_end_day'], $TransactionArray['ts_end_year']);	
			}		
		}
			
		

		
		//$this->Transaction_issue									=	mktime(0, 0, 0, $TransactionArray['issue_month'], $TransactionArray['issue_day'], $TransactionArray['issue_year']);
		$this->Transaction_issue									=	0;
		$this->Transaction_num_inserts						=	$ImportKey->inserts;







		$this->Transaction_origin_id							=	$this->OriginType_to_OriginID($ImportKey->origin_sale);
		//$this->Transaction_sales_person_id				=	$TransactionArray['sales_person_id'];
		$this->Transaction_sales_person_id				=	24;
		$this->Transaction_manager_id							=	$TransactionArray['manager_id'];

		$this->Transaction_client_id							=	$TransactionArray['client_id'];
		$this->Transaction_advertiser_id					=	$TransactionArray['advertiser_id'];
		$this->Transaction_vendor_id							=	$TransactionArray['vendor_id'];
		

		$this->Transaction_total_rate_card				=	$ImportKey->rate_card;
		$this->Transaction_total_client_net				=	$ImportKey->client_net;
		$this->Transaction_po_cost								=	$ImportKey->po_cost;


		$this->Transaction_gross_profit						=	$ImportKey->gross_profit;
		$this->Transaction_profit_percentage			=	100*($ImportKey->profit_percentage);




		// if decimal >> convert -----------
		if(strpos(trim($ImportKey->direct_commission), '.')){
			//$ImportKey->direct_commission	=	100*($ImportKey->direct_commission);
			
			$this->Transaction_direct_commission_id		=	$this->CommissionDecimal_to_CommissionRateID($ImportKey->direct_commission);
			$this->Transaction_direct_commission			=	100*($ImportKey->direct_commission);
			
		}else{
			
			$this->Transaction_direct_commission_id		=	0; //FIX
			$this->Transaction_direct_commission			=	$ImportKey->direct_commission;
		}
		// ---------------------------------



		// direct commission rate --------------------
		//$this->Transaction_direct_commission_id		=	$TransactionArray['direct_commission'];
		$_CommissionRate_Details									=	$this->GetCommission_to_CommissionRate($this->Transaction_direct_commission_id);



		$this->Transaction_direct_commission			=	$_CommissionRate_Details['rate'] * $this->Transaction_gross_profit;



		$this->Transaction_override_commission_id			=	$TransactionArray['override_commission'];
		$this->Transaction_marketing_commission_id		=	$TransactionArray['marketing_commission'];
		$this->Transaction_marketing_person_id				=	$TransactionArray['marketing_person_id'];

		$this->Transaction_third_party_commission_id 	=	$TransactionArray['third_party_commission'];
		$this->Transaction_third_party_person_id			=	$TransactionArray['third_party_person_id'];

		$this->Transaction_agent_signature						=	'IMPORT_METHOD';
		$this->Transaction_token											=	'IMPORT_METHOD';


// DEBUG ============================
//echo $this->Transaction_total_client_net;
//die();




		// record action -----------------------------
		//$this->TrackAction($_SESSION['ActiveUser']['userid'], 'booking trans', 'create.started', $_SERVER['HTTP_REFERER'], $TransactionArray['_token'], $TransactionArray['_agent_signature']);










		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		
		if( mysql_query("INSERT INTO booking (
		organization_owner_id, 
		ts_entered, 
		ts_sold,
		ts_on_sale,
		ts_start,
		ts_end,
		date_check_rec, 
		io,
		io_auto, 
		po,
		po_auto,
		io_po_suffix_num, 
		medium_id,
		medium_timing_id,
		sales_person_id, 
		manager_id, 
		advertiser_id, 
		client_id, 
		publication_id, 
		issue,
		num_inserts, 
		rate_card_total, 
		client_net_total,
		po_cost,
		origin_id,
		direct_commission_id,
		direct_commission,
		override_commission_id,
		marketing_commission_id,
		marketing_person_id,
		third_party_commission_id,
		third_party_person_id,
		gross_profit,
		profit_percentage,
		agent_signature, 
		transaction_token,
		revised,
		revision,
		revision_parent_id,
		imported) 
		VALUES(
		'$this->Transaction_organization_owner_id', 
		'$this->Transaction_ts_entered', 
		'$this->Transaction_ts_sold',
		'$this->Transaction_ts_on_sale',
		'$this->Transaction_ts_start',
		'$this->Transaction_ts_end',
		'$this->Transaction_ts_check_rec',
		'$this->Transaction_IO',
		'$this->Transaction_IO_AUTO',
		'$this->Transaction_PO',
		'$this->Transaction_PO_AUTO',
		'$this->Transaction_IO_PO_suffix_num', 		
		'$this->Transaction_medium_id', 
		'$this->Transaction_medium_timing_id', 
		'$this->Transaction_sales_person_id', 
		'$this->Transaction_manager_id', 
		'$this->Transaction_advertiser_id', 
		'$this->Transaction_client_id', 
		'$this->Transaction_vendor_id',
		'$this->Transaction_issue',
		'$this->Transaction_num_inserts', 
		'$this->Transaction_total_rate_card',
		'$this->Transaction_total_client_net',
		'$this->Transaction_po_cost',
		'$this->Transaction_origin_id',
		'$this->Transaction_direct_commission_id',
		'$this->Transaction_direct_commission',
		'$this->Transaction_override_commission_id',
		'$this->Transaction_marketing_commission_id',
		'$this->Transaction_marketing_person_id',
		'$this->Transaction_third_party_commission_id',
		'$this->Transaction_third_party_person_id',
		'$this->Transaction_gross_profit',
		'$this->Transaction_profit_percentage',
		'$this->Transaction_agent_signature',
		'$this->Transaction_token',
		'$this->Transaction_revised',
		'$this->Transaction_revision',
		'$this->Transaction_revision_parent_id',
		'1') ") ){



			// get last inserted userID
  	  //$_transaction_entry_id				= mysql_insert_id();

			// record action -----------------------------
			//$this->TrackAction($_SESSION['ActiveUser']['userid'], 'booking trans', 'create.successful.ID.'.$_transaction_entry_id, $_SERVER['HTTP_REFERER'], $TransactionArray['_token'], $TransactionArray['_agent_signature']);
		
			//echo 111;
		}









	$__counter++;
	}
	// ---------------------------------------------








	 return $_return;
	}
// =======================================================================================


















// =======================================================================================
	public function GENERATE_CreateTransaction($NumTransactions){

// DEBUG ---------------------
//print_r($TransactionArray);

		$__USERID			=	27;




	for($TCounter = 12; $TCounter > 1; $TCounter--){


	echo $TCounter;



		for($Counter = $NumTransactions; $Counter > 0; $Counter--){




  		// generate PO & IO ----------------
  		$this->Transaction_IO_AUTO								=	$this->GenerateIO($__USERID, time());
  		$this->Transaction_PO_AUTO								=	$this->GeneratePO($__USERID, time());
  
  		// collect human entered PO & IO ---
  		$this->Transaction_IO											=	'IOXX010110000G';
  		$this->Transaction_PO											=	'POXX010110000G';
  
  		// database connection -----------------------
  		$obj_db						= new db;
  		$obj_db->Connect(1);  //read operation
  		// -------------------------------------------
  
  
  		// check for previous inserts ----------------
  		$sql_query				= mysql_query("SELECT * FROM booking WHERE booking.po = '$this->Transaction_PO'") or die(mysql_error());
  		$sql_numrows			=	mysql_num_rows($sql_query);
  		
  		if($sql_numrows){
  			
  			switch(strlen($sql_numrows)){
  				case 1:
  					$sql_numrows	=	$sql_numrows +1;
  					$this->Transaction_IO_PO_suffix_num				=	'00'.$sql_numrows;
  				break;
  
  				case 2:
  					$sql_numrows	=	$sql_numrows +1;
  					$this->Transaction_IO_PO_suffix_num				=	'0'.$sql_numrows;
  				break;
  
  				case 3:
  					$sql_numrows	=	$sql_numrows +1;
  					$this->Transaction_IO_PO_suffix_num				=	''.$sql_numrows;
  				break;
  			}
  			
  			
  		}else{
  			$this->Transaction_IO_PO_suffix_num						=	'001';
  		}
  		// -------------------------------------------
  
  
  
  
  
  
  		// record vars -------------------------------
  		$this->Transaction_organization_owner_id	=	1;
  
  		$this->Transaction_ts_entered							=	time();
  		$this->Transaction_ts_sold								=	mktime(0, 0, 0, $TCounter, rand(1,30), 2010);

			$this->Transaction_sold_month							=	strtolower(date('M',$this->Transaction_ts_sold));
			$this->Transaction_sold_year							=	date('Y',$this->Transaction_ts_sold);
			$this->Transaction_sold_quarter						=	ceil(date("m", $this->Transaction_ts_sold)/3);

  		
  		$this->Transaction_ts_check_rec						=	$this->Transaction_ts_sold;
  		
  		$this->Transaction_ts_on_sale							=	$this->Transaction_ts_sold;







  		if($this->Transaction_medium_id == 1){
  
  			$this->Transaction_ts_start							=	0;
  			$this->Transaction_ts_end								=	0;
  			
  		}else{


  
  			// ts start --------------
  			if(!$TransactionArray['ts_start_month'] && !$TransactionArray['ts_start_day'] && !$TransactionArray['ts_start_year']){
  				$this->Transaction_ts_start							=	0;
  			}else{
  				$this->Transaction_ts_start							=	mktime(0, 0, 0, $TransactionArray['ts_start_month'], $TransactionArray['ts_start_day'], $TransactionArray['ts_start_year']);	
  			}
  	
  			// ts end ----------------
  			if(!$TransactionArray['ts_end_month'] && !$TransactionArray['ts_end_day'] && !$TransactionArray['ts_end_year']){
  				$this->Transaction_ts_end								=	0;
  			}else{
  				$this->Transaction_ts_end								=	mktime(0, 0, 0, $TransactionArray['ts_end_month'], $TransactionArray['ts_end_day'], $TransactionArray['ts_end_year']);	
  			}		
  		}
  			
  		
  
  		
  		$this->Transaction_issue									=	$this->Transaction_ts_sold;
  		$this->Transaction_num_inserts						=	rand(1,10);
  
  
  
  
  		$this->Transaction_medium_id							=	rand(1,6);
  		$this->Transaction_medium_timing_id				=	rand(1,16);
  
  
  		$this->Transaction_origin_id							=	rand(1,3);
  		$this->Transaction_sales_person_id				=	$__USERID;
  		$this->Transaction_manager_id							=	2;
  
  		$this->Transaction_client_id							=	rand(1,14);
  		$this->Transaction_advertiser_id					=	$this->Transaction_client_id;
  		$this->Transaction_vendor_id							=	rand(1,6);
  		
  
  		$this->Transaction_total_rate_card				=	rand(5000,100000);
  		$this->Transaction_total_client_net				=	rand(1000,25000);
  		$this->Transaction_po_cost								=	round($this->Transaction_total_client_net * .65);
  
  
  		$this->Transaction_gross_profit						=	$this->Transaction_total_client_net - $this->Transaction_po_cost;
  		$this->Transaction_profit_percentage			=	100*($this->Transaction_po_cost / $this->Transaction_total_client_net);
  
  
  		// direct commission rate --------------------
  		$this->Transaction_direct_commission_id		=	14;
  		$_CommissionRate_Details									=	$this->GetCommission_to_CommissionRate(14);
  		$this->Transaction_direct_commission			=	$_CommissionRate_Details['rate'] * $this->Transaction_gross_profit;
  
  
  
  		$this->Transaction_override_commission_id			=	0;
  		$this->Transaction_marketing_commission_id		=	0;
  		$this->Transaction_marketing_person_id				=	0;
  
  		$this->Transaction_third_party_commission_id 	=	0;
  		$this->Transaction_third_party_person_id			=	0;
  
  		$this->Transaction_agent_signature						=	'GENERATED';
  		$this->Transaction_token											=	'GENERATED';
  
  
  // DEBUG ============================
  //echo $this->Transaction_total_client_net;
  //die();
  
  
  
  
  		// record action -----------------------------
  		//$this->TrackAction($_SESSION['ActiveUser']['userid'], 'booking trans', 'create.started', $_SERVER['HTTP_REFERER'], $TransactionArray['_token'], $TransactionArray['_agent_signature']);
  
  
  
  
  
  		$_return					= false;
  		$ResultArray			= null;
  
  
  		// database connection -----------------------
  		$obj_db						= new db;
  		$obj_db->Connect(1);  //read operation
  		// -------------------------------------------
  
  
  
  		
  		
  		if( mysql_query("INSERT INTO booking (
  		organization_owner_id, 
  		ts_entered, 
  		ts_sold,
  		sold_month,
  		sold_year,
  		sold_quarter,
  		ts_on_sale,
  		ts_start,
  		ts_end,
  		date_check_rec, 
  		io,
  		io_auto, 
  		po,
  		po_auto,
  		io_po_suffix_num, 
  		medium_id,
  		medium_timing_id,
  		sales_person_id, 
  		manager_id, 
  		advertiser_id, 
  		client_id, 
  		publication_id, 
  		issue,
  		num_inserts, 
  		rate_card_total, 
  		client_net_total,
  		po_cost,
  		origin_id,
  		direct_commission_id,
  		direct_commission,
  		override_commission_id,
  		marketing_commission_id,
  		marketing_person_id,
  		third_party_commission_id,
  		third_party_person_id,
  		gross_profit,
  		profit_percentage,
  		agent_signature, 
  		transaction_token,
  		revised,
  		revision,
  		revision_parent_id,
  		generated) 
  		VALUES(
  		'$this->Transaction_organization_owner_id', 
  		'$this->Transaction_ts_entered', 
  		'$this->Transaction_ts_sold',
  		'$this->Transaction_sold_month',
  		'$this->Transaction_sold_year',
  		'$this->Transaction_sold_quarter',
  		'$this->Transaction_ts_on_sale',
  		'$this->Transaction_ts_start',
  		'$this->Transaction_ts_end',
  		'$this->Transaction_ts_check_rec',
  		'$this->Transaction_IO',
  		'$this->Transaction_IO_AUTO',
  		'$this->Transaction_PO',
  		'$this->Transaction_PO_AUTO',
  		'$this->Transaction_IO_PO_suffix_num', 		
  		'$this->Transaction_medium_id', 
  		'$this->Transaction_medium_timing_id', 
  		'$this->Transaction_sales_person_id', 
  		'$this->Transaction_manager_id', 
  		'$this->Transaction_advertiser_id', 
  		'$this->Transaction_client_id', 
  		'$this->Transaction_vendor_id',
  		'$this->Transaction_issue',
  		'$this->Transaction_num_inserts', 
  		'$this->Transaction_total_rate_card',
  		'$this->Transaction_total_client_net',
  		'$this->Transaction_po_cost',
  		'$this->Transaction_origin_id',
  		'$this->Transaction_direct_commission_id',
  		'$this->Transaction_direct_commission',
  		'$this->Transaction_override_commission_id',
  		'$this->Transaction_marketing_commission_id',
  		'$this->Transaction_marketing_person_id',
  		'$this->Transaction_third_party_commission_id',
  		'$this->Transaction_third_party_person_id',
  		'$this->Transaction_gross_profit',
  		'$this->Transaction_profit_percentage',
  		'$this->Transaction_agent_signature',
  		'$this->Transaction_token',
  		'$this->Transaction_revised',
  		'$this->Transaction_revision',
  		'$this->Transaction_revision_parent_id',
  		'1') ") ){
  
  
  
  			// get last inserted userID
    	  echo 'RECORD: '.$_transaction_entry_id				= mysql_insert_id();
    	  echo '<br>';


  			// record action -----------------------------
  			//$this->TrackAction($_SESSION['ActiveUser']['userid'], 'booking trans', 'create.successful.ID.'.$_transaction_entry_id, $_SERVER['HTTP_REFERER'], $TransactionArray['_token'], $TransactionArray['_agent_signature']);
  		
  
  		}






			
		}
		// END loop create






	}






	 return $_return;
	}
// =======================================================================================













// =======================================================================================
	public function GetAllSalesAverage_ORG($Domain, $Month, $Year, $SubtractUserID = null){


		// check for explicit subscope -----------
		if($SubDomain != null){
			$Org_ID			=	$SubDomain;
		}else{
			$Org_ID			=	$_SESSION['ActiveUser']['organization_id'];
		}


		if($SubtractUserID != null){
			$_Subtract_SQL = "booking.sales_person_id != ".$SubtractUserID." AND ";
		}else{
			$_Subtract_SQL = '';
		}


		$_return					= false;
		$ResultArray			= null;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$_TS_Month_MIN		=	$this->Month_to_MonthFirstTS($Month, $Year);
		$_TS_Month_MAX		=	$this->Month_to_MonthLastTS($Month, $Year);


		// check for override quota ------------------
		$sql_query				= mysql_query("SELECT avg(client_net_total) as client_net_total_average FROM booking WHERE $_Subtract_SQL booking.organization_owner_id = $Org_ID AND booking.ts_sold >= $_TS_Month_MIN AND booking.ts_sold <= $_TS_Month_MAX GROUP BY booking.sales_person_id") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);
		$sql_array_result	=	mysql_fetch_assoc($sql_query);
		$_return					= $sql_array_result['client_net_total_average'];


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	 return $_return;
	}
// =======================================================================================











// =======================================================================================
	public function GetUserSalesTotals_ByMedia($UserID, $Month, $Year){

		$_return					= false;
		$ResultArray			= null;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$_TS_Month_MIN		=	$this->Month_to_MonthFirstTS($Month, $Year);
		$_TS_Month_MAX		=	$this->Month_to_MonthLastTS($Month, $Year);


		// check for override quota ------------------
		$sql_query				= mysql_query("SELECT medium_id, sum(client_net_total) as client_net_total, sum(po_cost) as po_cost_total, sum(gross_profit) as gross_profit_total FROM booking WHERE booking.sales_person_id = $UserID AND booking.ts_sold >= $_TS_Month_MIN AND booking.ts_sold <= $_TS_Month_MAX GROUP BY booking.medium_id") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);

  	// populate result array --------------------
  	$counter = 0;
  	while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
  		$ResultArray[$counter] = $sql_array_result;
  		$counter++;
  	}
  	// -------------------------------------------

		$_return					= $ResultArray;


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	 return $_return;
	}
// =======================================================================================











// =======================================================================================
	public function GetManagerTeamSalesTotals_ByMedia($UserID, $Month, $Year){

		$_return					= false;
		$ResultArray			= null;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$_TS_Month_MIN		=	$this->Month_to_MonthFirstTS($Month, $Year);
		$_TS_Month_MAX		=	$this->Month_to_MonthLastTS($Month, $Year);


		// check for override quota ------------------
		$sql_query				= mysql_query("SELECT medium_id, sum(client_net_total) as client_net_total, sum(po_cost) as po_cost_total, sum(gross_profit) as gross_profit_total FROM booking WHERE booking.sales_person_id IN (SELECT user.userid FROM user WHERE user.manager_id = $UserID) AND booking.ts_sold >= $_TS_Month_MIN AND booking.ts_sold <= $_TS_Month_MAX GROUP BY booking.medium_id") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);

  	// populate result array --------------------
  	$counter = 0;
  	while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
  		$ResultArray[$counter] = $sql_array_result;
  		$counter++;
  	}
  	// -------------------------------------------

		$_return					= $ResultArray;


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	 return $_return;
	}
// =======================================================================================











// =======================================================================================
	public function GetORGANIZATIONSalesTotals_ByMonthRange($OrganizationID, $Range, $Filter){

		$_return					= false;
		$ResultArray			= null;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------




		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start = $_exploded_range_start[0];
    $_day_Start 	= $_exploded_range_start[1];
    $_year_Start 	= $_exploded_range_start[2];
    $_TS_START 		= mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------
  
  
  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End = $_exploded_range_end[0];
    $_day_End 	= $_exploded_range_end[1];
    $_year_End 	= $_exploded_range_end[2];
    $_TS_END 		= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------



		// check for filter ----------------
		if($Filter != null){
			$_FLAG_filterPresent	= true;
 			$_Exploded_FILTER 		= explode(':', $Filter);
 			$_column							= $_Exploded_FILTER[0];
 			$_sortMethod					= $_Exploded_FILTER[1];


			// user filter ---------------------
			$_User_Filter					= $_Exploded_FILTER[2];
			$_users								=	explode('.',$_User_Filter);
			
			// build sql IN list -------------			
			$__Filter_USERS				=	'(';
			$__counter = 1;
			foreach($_users as $key => $value){
				if($value){
					$__Filter_USERS			.= $value.((count($_users)-1) != $__counter ? ',':'');
				}
				$__counter++;
			}
			trim($__Filter_USERS,',');
			$__Filter_USERS				.=	')';
		}
		// ---------------------------------


/*
		$_Base_Elements		=	'booking.sales_person_id as sales_person, booking.sold_month, booking.sold_quarter, booking.advertiser_id, client_net_total, booking.po_cost, booking.gross_profit, booking.profit_percentage, booking.direct_commission';

		if($_User_Filter){
			$sql_query				= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.sales_person_id IN ".$__Filter_USERS." AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());	
		}else{
			$sql_query				= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.sales_person_id IN (SELECT user.userid FROM user WHERE user.manager_id = $ManagerUserID) AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());	
		}
*/


		//$_TS_Month_MIN		=	$this->Month_to_MonthFirstTS($Month, $Year);
		//$_TS_Month_MAX		=	$this->Month_to_MonthLastTS($Month, $Year);


		$_Base_Elements		=	'sales_person_id, count(id) as number_deals, sold_month as month, sum(client_net_total) as client_net_total, sum(po_cost) as po_cost_total, sum(gross_profit) as gross_profit_total, sum(direct_commission) as direct_commission_total';

		// check for override quota ------------------
		//$sql_query				= mysql_query("SELECT ".$_Base_Elements." FROM booking WHERE booking.sales_person_id = ".$UserID." AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." GROUP BY booking.sold_month ORDER BY booking.ts_sold") or die(mysql_error());
		$sql_query				= mysql_query("SELECT ".$_Base_Elements." FROM booking WHERE booking.revised = 0 AND booking.sales_person_id IN ".$__Filter_USERS." AND booking.ts_sold >= $_TS_START AND booking.ts_sold <= $_TS_END GROUP BY booking.sold_month, booking.sales_person_id ORDER BY booking.ts_sold") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);

  	// populate result array --------------------
  	$counter = 0;
  	while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
  		$ResultArray[$counter] = $sql_array_result;
  		$counter++;
  	}
  	// -------------------------------------------

		$_return					= $ResultArray;


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	 return $_return;
	}
// =======================================================================================
















// =======================================================================================
	public function GetMANAGERSalesTotals_ByMonthRange($ManagerUserID, $Range, $Filter){

		$_return					= false;
		$ResultArray			= null;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------




		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start = $_exploded_range_start[0];
    $_day_Start 	= $_exploded_range_start[1];
    $_year_Start 	= $_exploded_range_start[2];
    $_TS_START 		= mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------
  
  
  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End = $_exploded_range_end[0];
    $_day_End 	= $_exploded_range_end[1];
    $_year_End 	= $_exploded_range_end[2];
    $_TS_END 		= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------



		// check for filter ----------------
		if($Filter != null){
			$_FLAG_filterPresent	= true;
 			$_Exploded_FILTER 		= explode(':', $Filter);
 			$_column							= $_Exploded_FILTER[0];
 			$_sortMethod					= $_Exploded_FILTER[1];


			// user filter ---------------------
			$_User_Filter					= $_Exploded_FILTER[2];
			$_users								=	explode('.',$_User_Filter);
			
			// build sql IN list -------------			
			$__Filter_USERS				=	'(';
			$__counter = 1;
			foreach($_users as $key => $value){
				if($value){
					$__Filter_USERS			.= $value.((count($_users)-1) != $__counter ? ',':'');
				}
				$__counter++;
			}
			trim($__Filter_USERS,',');
			$__Filter_USERS				.=	')';
		}
		// ---------------------------------


/*
		$_Base_Elements		=	'booking.sales_person_id as sales_person, booking.sold_month, booking.sold_quarter, booking.advertiser_id, client_net_total, booking.po_cost, booking.gross_profit, booking.profit_percentage, booking.direct_commission';

		if($_User_Filter){
			$sql_query				= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.sales_person_id IN ".$__Filter_USERS." AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());	
		}else{
			$sql_query				= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.sales_person_id IN (SELECT user.userid FROM user WHERE user.manager_id = $ManagerUserID) AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());	
		}
*/


		//$_TS_Month_MIN		=	$this->Month_to_MonthFirstTS($Month, $Year);
		//$_TS_Month_MAX		=	$this->Month_to_MonthLastTS($Month, $Year);


		$_Base_Elements		=	'sales_person_id, count(id) as number_deals, sold_month as month, sum(client_net_total) as client_net_total, sum(po_cost) as po_cost_total, sum(gross_profit) as gross_profit_total, sum(direct_commission) as direct_commission_total';

		// check for override quota ------------------
		//$sql_query				= mysql_query("SELECT ".$_Base_Elements." FROM booking WHERE booking.sales_person_id = ".$UserID." AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." GROUP BY booking.sold_month ORDER BY booking.ts_sold") or die(mysql_error());
		$sql_query				= mysql_query("SELECT ".$_Base_Elements." FROM booking WHERE booking.revised = 0 AND booking.sales_person_id IN ".$__Filter_USERS." AND booking.ts_sold >= $_TS_START AND booking.ts_sold <= $_TS_END GROUP BY booking.sold_month, booking.sales_person_id ORDER BY booking.ts_sold") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);

  	// populate result array --------------------
  	$counter = 0;
  	while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
  		$ResultArray[$counter] = $sql_array_result;
  		$counter++;
  	}
  	// -------------------------------------------

		$_return					= $ResultArray;


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	 return $_return;
	}
// =======================================================================================












// =======================================================================================
	public function GetUserSalesTotals_ByMonthRange($UserID, $Range){

		$_return					= false;
		$ResultArray			= null;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------




		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start = $_exploded_range_start[0];
    $_day_Start 	= $_exploded_range_start[1];
    $_year_Start 	= $_exploded_range_start[2];
    $_TS_START 		= mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------
  
  
  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End = $_exploded_range_end[0];
    $_day_End 	= $_exploded_range_end[1];
    $_year_End 	= $_exploded_range_end[2];
    $_TS_END 		= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------



		//$_TS_Month_MIN		=	$this->Month_to_MonthFirstTS($Month, $Year);
		//$_TS_Month_MAX		=	$this->Month_to_MonthLastTS($Month, $Year);


		// check for override quota ------------------
		$sql_query				= mysql_query("SELECT count(id) as number_deals, sold_month as month, sum(client_net_total) as client_net_total, sum(po_cost) as po_cost_total, sum(gross_profit) as gross_profit_total, sum(direct_commission) as direct_commission_total FROM booking WHERE booking.revised = 0 AND booking.sales_person_id = $UserID AND booking.ts_sold >= $_TS_START AND booking.ts_sold <= $_TS_END GROUP BY booking.sold_month ORDER BY booking.ts_sold") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);

  	// populate result array --------------------
  	$counter = 0;
  	while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
  		$ResultArray[$counter] = $sql_array_result;
  		$counter++;
  	}
  	// -------------------------------------------

		$_return					= $ResultArray;


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	 return $_return;
	}
// =======================================================================================








// =======================================================================================
	public function GetManagerTeamSalesTotal($UserID, $Month, $Year){

		$_return					= false;
		$ResultArray			= null;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$_TS_Month_MIN		=	$this->Month_to_MonthFirstTS($Month, $Year);
		$_TS_Month_MAX		=	$this->Month_to_MonthLastTS($Month, $Year);


		// check for override quota ------------------
		$sql_query				= mysql_query("SELECT sum(client_net_total) FROM booking WHERE booking.sales_person_id IN (SELECT user.userid FROM user WHERE user.manager_id = $UserID) AND booking.ts_sold >= $_TS_Month_MIN AND booking.ts_sold <= $_TS_Month_MAX") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);
		$sql_array_result	=	mysql_fetch_assoc($sql_query);
		$_return					= $sql_array_result['sum(client_net_total)'];


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	 return $_return;
	}
// =======================================================================================














// =======================================================================================
	public function GetUserSalesTotal($UserID, $Month, $Year){

		$_return					= false;
		$ResultArray			= null;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$_TS_Month_MIN		=	$this->Month_to_MonthFirstTS($Month, $Year);
		$_TS_Month_MAX		=	$this->Month_to_MonthLastTS($Month, $Year);


		// check for override quota ------------------
		$sql_query				= mysql_query("SELECT sum(client_net_total) FROM booking WHERE booking.sales_person_id = $UserID AND booking.ts_sold >= $_TS_Month_MIN AND booking.ts_sold <= $_TS_Month_MAX") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);
		$sql_array_result	=	mysql_fetch_assoc($sql_query);
		$_return					= $sql_array_result['sum(client_net_total)'];


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	 return $_return;
	}
// =======================================================================================













// =======================================================================================
	public function GetUserDirectCommissionTotal($UserID, $Month, $Year){

		$_return					= false;
		$ResultArray			= null;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$_TS_Month_MIN		=	$this->Month_to_MonthFirstTS($Month, $Year);
		$_TS_Month_MAX		=	$this->Month_to_MonthLastTS($Month, $Year);


		// check for override quota ------------------
		$sql_query				= mysql_query("SELECT sum(direct_commission) FROM booking WHERE booking.sales_person_id = $UserID AND booking.ts_sold >= $_TS_Month_MIN AND booking.ts_sold <= $_TS_Month_MAX") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);
		$sql_array_result	=	mysql_fetch_assoc($sql_query);
		$_return					= $sql_array_result['sum(direct_commission)'];


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	 return $_return;
	}
// =======================================================================================











// =======================================================================================
	public function GetManagerQuota($UserID, $Range){

		$_return					= false;
		$ResultArray			= null;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start = $_exploded_range_start[0];
    $_day_Start 	= $_exploded_range_start[1];
    $_year_Start 	= $_exploded_range_start[2];
    $_TS_START 		= @mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------
  
  
  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End = $_exploded_range_end[0];
    $_day_End 	= $_exploded_range_end[1];
    $_year_End 	= $_exploded_range_end[2];
    $_TS_END 		= @mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------



		//$_TS_Month_MIN		=	$this->Month_to_MonthFirstTS($Month, $Year);
		//$_TS_Month_MAX		=	$this->Month_to_MonthLastTS($Month, $Year);

/*
DISABLED UNTIL MONTH to MONTH BECOMES A REALITY 10.10.2010 NB



		// check for override quota ------------------
		$sql_query		= mysql_query("SELECT sum(quota) as quota FROM user_quota WHERE user_quota.userid IN (SELECT user.userid FROM user WHERE user.manager_id = $UserID) AND user_quota.ts_month >= $_TS_Month_MIN AND user_quota.ts_month <= $_TS_Month_MAX") or die(mysql_error());
		$sql_numrows	=	mysql_num_rows($sql_query);

		// quota override exists ---------------------		
		if($sql_numrows){

			$sql_array_result	=	mysql_fetch_assoc($sql_query);
			$_subtotalA_QUOTA	= $sql_array_result['quota'];

		// quota override doesnt exist get default ---
		}else{
			$sql_query				= mysql_query("SELECT sum(quota_default) as quota_default FROM user WHERE user.manager_id = $UserID") or die(mysql_error());
			$sql_array_result	=	mysql_fetch_assoc($sql_query);
			$_subtotalB_QUOTA	= $sql_array_result['quota_default'];
		}
*/

			$sql_query				= mysql_query("SELECT sum(quota_default) as quota_default FROM user WHERE user.manager_id = $UserID") or die(mysql_error());
			$sql_array_result	=	mysql_fetch_assoc($sql_query);
			$_subtotalB_QUOTA	= $sql_array_result['quota_default'];


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		$_return		=		$_subtotalA_QUOTA + $_subtotalB_QUOTA;


	 return $_return;
	}
// =======================================================================================














// =======================================================================================
	public function GetUserQuota($UserID, $Month, $Year){

		$_return					= false;
		$ResultArray			= null;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$_TS_Month_MIN		=	$this->Month_to_MonthFirstTS($Month, $Year);
		$_TS_Month_MAX		=	$this->Month_to_MonthLastTS($Month, $Year);


		// check for override quota ------------------
		$sql_query		= mysql_query("SELECT * FROM user_quota WHERE user_quota.userid = $UserID AND user_quota.ts_month >= $_TS_Month_MIN AND user_quota.ts_month <= $_TS_Month_MAX") or die(mysql_error());
		$sql_numrows	=	mysql_num_rows($sql_query);

		// quota override exists ---------------------		
		if($sql_numrows){
			$sql_array_result	=	mysql_fetch_assoc($sql_query);
			$_return					= $sql_array_result['quota'];
		
		
		// quota override doesnt exist get default ---
		}else{
			$sql_query				= mysql_query("SELECT quota_default FROM user WHERE user.userid = $UserID") or die(mysql_error());
			$sql_array_result	=	mysql_fetch_assoc($sql_query);
			$_return					= $sql_array_result['quota_default'];
		}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	 return $_return;
	}
// =======================================================================================














// =======================================================================================
	public function GetUserModules($UserID){

		$_return					= false;
		$ResultArray			= null;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query		= mysql_query("SELECT * FROM user_modules, module WHERE user_modules.user_id = $UserID AND module.id = user_modules.module_id AND user_modules.enabled = '1' ORDER BY module.order ASC") or die(mysql_error());
		$sql_numrows	=	mysql_num_rows($sql_query);

  	// populate result array --------------------
  	$counter = 0;
  	while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
  		$ResultArray[$counter] = $sql_array_result;
  		$counter++;
  	}
  	// -------------------------------------------


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}

	 return $_return;
	}
// =======================================================================================














// =======================================================================================
	public function GetOrganization($OrganizationID, $SpecificField = null){

		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query		= mysql_query("SELECT * FROM organization WHERE organization.id = $OrganizationID") or die(mysql_error());
		$sql_numrows	=	mysql_num_rows($sql_query);

		if($SpecificField != null){
			$sql_array_result	=	mysql_fetch_assoc($sql_query);
			$_return 					= $sql_array_result[$SpecificField];
			return $_return;
		}else{
	  	// populate result array --------------------
	  	$counter = 0;
	  	while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
	  		$ResultArray[$counter] = $sql_array_result;
	  		//$ResultArray	= $sql_array_result;
	  		$counter++;
	  	}
	  	// -------------------------------------------			
		}

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$ResultArray[0]['name'] = 'No Records';
			$ResultArray[0]['id'] 	= 0;
			$_return = $ResultArray;
		}

	 return $_return;
	}
// =======================================================================================












// =======================================================================================
	public function Get_SalesPerson_NavBoard_CurrentMonth($SalesPersonUserID){



		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid

		$_return							= false;
		$_FLAG_filterPresent	= false;
		$ResultArray					= null;


	

		// today -----------------
    $_TS_START 	= $this->Month_to_MonthFirstTS(date('m',time()), date('Y',time()));
    $_TS_END 		= $this->Month_to_MonthLastTS(date('m',time()), date('Y',time()));



		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		$_Base_Elements		=	'sum(client_net_total) as client_net_total, sum(po_cost) as po_cost_total, sum(gross_profit) as gross_profit_total, sum(direct_commission) as direct_commission_total';
		
		$sql_query				= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.sales_person_id = $SalesPersonUserID AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END."") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);



 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray					= $sql_array_result;
 			$counter++;
 		}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$_return = 'no data';
		}

	 return $_return;
	}
// =======================================================================================











// =======================================================================================
	public function Get_SalesPerson_NavBoard_Today($SalesPersonUserID){



		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid

		$_return							= false;
		$_FLAG_filterPresent	= false;
		$ResultArray					= null;


		// today -----------------
    $_TS_START 	= $this->Timestamp_Start_Today();
    $_TS_END 		= $this->Timestamp_End_Today();



		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		$_Base_Elements		=	'sum(client_net_total) as client_net_total, sum(po_cost) as po_cost_total, sum(gross_profit) as gross_profit_total, sum(direct_commission) as direct_commission_total';
		
		$sql_query				= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.sales_person_id = $SalesPersonUserID AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END."") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);



 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray					= $sql_array_result;
 			$counter++;
 		}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$_return = 'no data';
		}

	 return $_return;
	}
// =======================================================================================















// =======================================================================================
	public function Get_MANAGER_Transactions_Month_FULLDETAIL($ManagerUserID = null, $Filter = null, $Range = null){



		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid

		$_return							= false;
		$_FLAG_filterPresent	= false;
		$ResultArray					= null;



		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start = $_exploded_range_start[0];
    $_day_Start 	= $_exploded_range_start[1];
    $_year_Start 	= $_exploded_range_start[2];
    $_TS_START 		= mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------
  
  
  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End = $_exploded_range_end[0];
    $_day_End 	= $_exploded_range_end[1];
    $_year_End 	= $_exploded_range_end[2];
    $_TS_END 		= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------





		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		// check for filter ----------------
		if($Filter != null){
			$_FLAG_filterPresent	= true;
 			$_Exploded_FILTER 		= explode(':', $Filter);
 			$_column							= $_Exploded_FILTER[0];
 			$_sortMethod					= $_Exploded_FILTER[1];


			// user filter ---------------------
			$_User_Filter					= $_Exploded_FILTER[2];
			$_users								=	explode('.',$_User_Filter);
			
			// build sql IN list -------------			
			$__Filter_USERS				=	'(';
			$__counter = 1;
			foreach($_users as $key => $value){
				if($value){
					$__Filter_USERS			.= $value.((count($_users)-1) != $__counter ? ',':'');
				}
				$__counter++;
			}
			trim($__Filter_USERS,',');
			$__Filter_USERS				.=	')';
		}
		// ---------------------------------









		$_Base_Elements		=	'booking.io, booking.id, booking.sales_person_id, booking.sold_month, booking.sold_quarter, booking.advertiser_id, client_net_total, booking.po_cost, booking.gross_profit, booking.profit_percentage, booking.direct_commission, booking.medium_id';

		if($_User_Filter){
			$sql_query				= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.sales_person_id IN ".$__Filter_USERS." AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());	
		}else{
			$sql_query				= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.sales_person_id IN (SELECT user.userid FROM user WHERE user.manager_id = $ManagerUserID) AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());	
		}

		$sql_numrows				=	mysql_num_rows($sql_query);





 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$_return = 'no data';
		}

	 return $_return;
	}
// =======================================================================================

















// =======================================================================================
	public function Get_SalesPerson_Transactions_Month_FULLDETAIL($SalesPersonUserID = null, $Filter = null, $Range = null){



		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid

		$_return							= false;
		$_FLAG_filterPresent	= false;
		$ResultArray					= null;



		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start = $_exploded_range_start[0];
    $_day_Start 	= $_exploded_range_start[1];
    $_year_Start 	= $_exploded_range_start[2];
    $_TS_START 		= mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------
  
  
  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End = $_exploded_range_end[0];
    $_day_End 	= $_exploded_range_end[1];
    $_year_End 	= $_exploded_range_end[2];
    $_TS_END 		= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------





		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		// check for filter ----------------
		if($Filter != null){
			$_FLAG_filterPresent	= true;
 			$_Exploded_FILTER 		= explode(':', $Filter);
 			$_column							= $_Exploded_FILTER[0];
 			$_sortMethod					= $_Exploded_FILTER[1];
		}
		// ---------------------------------



		$_Base_Elements		=	'advertiser_id, client_net_total, po_cost, gross_profit, profit_percentage, direct_commission, override_commission_id';
		
		$sql_query				= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.sales_person_id = $SalesPersonUserID AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);



 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$_return = 'no data';
		}

	 return $_return;
	}
// =======================================================================================















// =======================================================================================
	public function Get_MANAGER_Dashboard_Month_COMPOSITE($ManagerUserID = null, $Filter = null, $Range = null){



		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid

		$_return							= false;
		$_FLAG_filterPresent	= false;
		$ResultArray					= null;



		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start = $_exploded_range_start[0];
    $_day_Start 	= $_exploded_range_start[1];
    $_year_Start 	= $_exploded_range_start[2];
    $_TS_START 		= mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------
  
  
  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End = $_exploded_range_end[0];
    $_day_End 	= $_exploded_range_end[1];
    $_year_End 	= $_exploded_range_end[2];
    $_TS_END 		= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------





		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		// check for filter ----------------
		if($Filter != null){
			$_FLAG_filterPresent	= true;
 			$_Exploded_FILTER 		= explode(':', $Filter);
 			$_column							= $_Exploded_FILTER[0];
 			$_sortMethod					= $_Exploded_FILTER[1];
		}
		// ---------------------------------



		$_Base_Elements		=	'advertiser_id, sum(client_net_total) as client_net_total, sum(po_cost) as po_cost, sum(gross_profit) as gross_profit, profit_percentage, sum(direct_commission) as direct_commission';
		
		$sql_query				= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.sales_person_id IN (SELECT user.userid FROM user WHERE user.manager_id = $ManagerUserID) AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." GROUP BY booking.client_id ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);



 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$_return = 'no data';
		}

	 return $_return;
	}
// =======================================================================================





















// =======================================================================================
	public function Get_SalesPerson_Dashboard_Month_COMPOSITE($SalesPersonUserID = null, $Filter = null, $Range = null){



		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid

		$_return							= false;
		$_FLAG_filterPresent	= false;
		$ResultArray					= null;



		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start = $_exploded_range_start[0];
    $_day_Start 	= $_exploded_range_start[1];
    $_year_Start 	= $_exploded_range_start[2];
    $_TS_START 		= mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------
  
  
  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End = $_exploded_range_end[0];
    $_day_End 	= $_exploded_range_end[1];
    $_year_End 	= $_exploded_range_end[2];
    $_TS_END 		= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------





		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		// check for filter ----------------
		if($Filter != null){
			$_FLAG_filterPresent	= true;
 			$_Exploded_FILTER 		= explode(':', $Filter);
 			$_column							= $_Exploded_FILTER[0];
 			$_sortMethod					= $_Exploded_FILTER[1];
		}
		// ---------------------------------



		$_Base_Elements		=	'advertiser_id, sum(client_net_total) as client_net_total, sum(po_cost) as po_cost, sum(gross_profit) as gross_profit, profit_percentage, sum(direct_commission) as direct_commission';
		
		$sql_query				= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.sales_person_id = $SalesPersonUserID AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." GROUP BY booking.client_id ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);



 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$_return = 'no data';
		}

	 return $_return;
	}
// =======================================================================================















// =======================================================================================
	public function Get_MANAGER_Dashboard_Month_MEDIUM($ManagerUserID = null, $MediumID, $Filter = null, $Range = null){



		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid

		$_return							= false;
		$_FLAG_filterPresent	= false;
		$ResultArray					= null;



		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start = $_exploded_range_start[0];
    $_day_Start 	= $_exploded_range_start[1];
    $_year_Start 	= $_exploded_range_start[2];
    $_TS_START 		= mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------
  
  
  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End = $_exploded_range_end[0];
    $_day_End 	= $_exploded_range_end[1];
    $_year_End 	= $_exploded_range_end[2];
    $_TS_END 		= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------





		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		// check for filter ----------------
		if($Filter != null){
			$_FLAG_filterPresent	= true;
 			$_Exploded_FILTER 		= explode(':', $Filter);
 			$_column							= $_Exploded_FILTER[0];
 			$_sortMethod					= $_Exploded_FILTER[1];
		}
		// ---------------------------------



		$_Base_Elements		=	'sales_person_id, advertiser_id, client_net_total, po_cost, gross_profit, profit_percentage, direct_commission';
		//$_Base_Elements		=	'booking.id, booking.sales_person_id, booking.sold_month, booking.sold_quarter, booking.advertiser_id, client_net_total, booking.po_cost, booking.gross_profit, booking.profit_percentage, booking.direct_commission';
		
		$sql_query				= mysql_query("SELECT $_Base_Elements FROM booking, user WHERE booking.medium_id = $MediumID AND booking.revised = 0 AND booking.sales_person_id IN (SELECT user.userid FROM user WHERE user.manager_id = $ManagerUserID) AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." GROUP BY booking.sales_person_id ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);


 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$_return = 'no data';
		}

	 return $_return;
	}
// =======================================================================================















// =======================================================================================
	public function Get_SalesPerson_Dashboard_Month_MEDIUM($SalesPersonUserID = null, $MediumID, $Filter = null, $Range = null){



		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid

		$_return							= false;
		$_FLAG_filterPresent	= false;
		$ResultArray					= null;



		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start = $_exploded_range_start[0];
    $_day_Start 	= $_exploded_range_start[1];
    $_year_Start 	= $_exploded_range_start[2];
    $_TS_START 		= mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------
  
  
  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End = $_exploded_range_end[0];
    $_day_End 	= $_exploded_range_end[1];
    $_year_End 	= $_exploded_range_end[2];
    $_TS_END 		= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------





		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		// check for filter ----------------
		if($Filter != null){
			$_FLAG_filterPresent	= true;
 			$_Exploded_FILTER 		= explode(':', $Filter);
 			$_column							= $_Exploded_FILTER[0];
 			$_sortMethod					= $_Exploded_FILTER[1];
		}
		// ---------------------------------



		$_Base_Elements		=	'advertiser_id, client_net_total, po_cost, gross_profit, profit_percentage, direct_commission';
		
		$sql_query				= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.medium_id = $MediumID AND booking.revised = 0 AND booking.sales_person_id = $SalesPersonUserID AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);



 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$_return = 'no data';
		}

	 return $_return;
	}
// =======================================================================================



















// =======================================================================================
	public function GetTransactions($Domain, $SubDomain = null, $Filter = null, $Range = null, $ReportID = null){

//echo $Range;
//die();

		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid

		$_return							= false;
		$_FLAG_filterPresent	= false;
		$ResultArray					= null;


		// if NOT single record --------------------------------
		if($Domain != 'transaction_specific'){

			// range ---------------------------
	  	$_exploded_RANGE 	= explode(':',$Range);
	
	  	$_range_start			= $_exploded_RANGE[0];
	  	$_range_end				= $_exploded_RANGE[1];
	  
	  
	  	// RANGE start -----------------------
	  	$_exploded_range_start = explode('.',$_range_start);
	  	$_month_Start = $_exploded_range_start[0];
	    $_day_Start 	= $_exploded_range_start[1];
	    $_year_Start 	= $_exploded_range_start[2];
	    $_TS_START 		= mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
	  	// -----------------------------------
	  
	  
	  	// RANGE end -------------------------
	  	$_exploded_range_end = explode('.',$_range_end);
	  	$_month_End = $_exploded_range_end[0];
	    $_day_End 	= $_exploded_range_end[1];
	    $_year_End 	= $_exploded_range_end[2];
	    $_TS_END 		= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
	  	// -----------------------------------

		}
		// -----------------------------------------------------








		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		
		


		// check for filter ----------------
		if($Filter != null){
			$_FLAG_filterPresent	= true;
 			$_Exploded_FILTER 		= explode(':', $Filter);
 			$_column							= $_Exploded_FILTER[0];
 			$_sortMethod					= $_Exploded_FILTER[1];
		}
		// ---------------------------------








		// module specific query -----------------
		//switch($_SESSION['ActiveUser']['CurrentPage']){
		switch($ReportID){

			case 'transaction_today.report':
				$_Base_Elements		=	'io, client_id, publication_id, client_net_total, po_cost, gross_profit, revised, revision, revision_parent_id, id';
			break;

			case 'salesman_current_month.report':
				$_Base_Elements		=	'advertiser_id, client_net_total, po_cost, gross_profit, profit_percentage, direct_commission';
			break;

			case 'salesman_totals.report':
				$_Base_Elements		=	'count(id), sum(client_net_total), sum(po_cost), sum(gross_profit), profit_percentage, sum(direct_commission)';
			break;

			case 'manager_totals.report':
				$_Base_Elements		=	'count(id), sum(client_net_total), sum(po_cost), sum(gross_profit), profit_percentage, sum(direct_commission)';
			break;

			case 'salesman_overunder.report':
				$_Base_Elements		=	'sum(gross_profit), quota_default';
			break;

			default:
				$_Base_Elements		=	'ts_entered, ts_sold, io, po, io_po_suffix_num, medium_id, sales_person_id, manager_id, advertiser_id, client_id, revised, revision, revision_parent_id, id';			
			break;
			
		}
		// ---------------------------------------












		switch($Domain){

			// -------------------------------
			case 'system_all':

				// reference
				//$sql_query			= mysql_query("SELECT id, userid, action, subaction, ts FROM user_session_actions WHERE user_session_actions.ts > ".$_TS_START." AND user_session_actions.ts < ".$_TS_END." ORDER BY user_session_actions.".$_column." ".$_sortMethod."");
					
				switch($_FLAG_filterPresent){
					case true:
						$sql_query	= mysql_query("SELECT $_Base_Elements FROM booking ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());	
					break;

					default:
						$sql_query	= mysql_query("SELECT $_Base_Elements FROM booking ORDER BY ts_entered DESC") or die(mysql_error());	
					break;
				}
					
			break;
			// -------------------------------



			// -------------------------------
			case 'organization':

				// check for explicit subscope -----------
				if($SubDomain != null){
					$Org_ID			=	$SubDomain;
				}else{
					$Org_ID			=	$_SESSION['ActiveUser']['organization_id'];
				}


				switch($_FLAG_filterPresent){
					case true:
						// based on ts_sold
						//$sql_query	= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.organization_owner_id = $Org_ID AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());
						
						// based on ts_entered
						$sql_query	= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.organization_owner_id = $Org_ID AND booking.ts_entered >= ".$_TS_START." AND booking.ts_entered <= ".$_TS_END." ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());
					break;

					default:
						$sql_query	= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.organization_owner_id = $Org_ID ORDER BY ts_entered DESC") or die(mysql_error());
					break;
				}
				
			break;
			// -------------------------------


			// -------------------------------
			case 'manager':

				// check for explicit subscope -----------
				if($SubDomain != null){
					$Mgr_ID			=	$SubDomain;
				}else{
					$Mgr_ID			=	$_SESSION['ActiveUser']['manager_id'];
				}

				switch($_FLAG_filterPresent){
					case true:
						$sql_query	= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.manager_id = $Mgr_ID ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());
						//$sql_query	= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.manager_id = $Mgr_ID AND booking.ts_entered >= ".$_TS_START." AND booking.ts_entered <= ".$_TS_END." ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());
					break;

					default:
						$sql_query	= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.manager_id = $Mgr_ID ORDER BY ts_entered DESC") or die(mysql_error());
					break;
				}
				
			break;
			// -------------------------------






			// -------------------------------
			case 'salesperson':

				

				// check for explicit subscope -----------
				if($SubDomain != null){
					$SalesPerson_ID			=	$SubDomain;
				}else{
					$SalesPerson_ID			=	$_SESSION['ActiveUser']['userid'];
				}

				
				// specific report -------------
				if($ReportID == 'salesman_overunder.report'){
					$sql_query	= mysql_query("SELECT $_Base_Elements FROM booking, user WHERE user.userid = $SalesPerson_ID AND booking.revised = 0 AND booking.sales_person_id = $SalesPerson_ID AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());	



				// pre-defined ---------------------------
				}else{

					switch($_FLAG_filterPresent){
						case true:
							$sql_query	= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.sales_person_id = $SalesPerson_ID AND booking.ts_sold >= ".$_TS_START." AND booking.ts_sold <= ".$_TS_END." ORDER BY booking.".$_column." ".$_sortMethod."") or die(mysql_error());
						break;
	
						default:
							$sql_query	= mysql_query("SELECT $_Base_Elements FROM booking WHERE booking.revised = 0 AND booking.sales_person_id = $SalesPerson_ID ORDER BY ts_sold DESC") or die(mysql_error());
						break;
					}

				}

				


				
			break;
			// -------------------------------


			// -------------------------------
			case 'transaction_specific':

				$sql_query	= mysql_query("SELECT * FROM booking WHERE booking.id = '$SubDomain'") or die(mysql_error());
				
			break;
			// -------------------------------


			// -------------------------------
			default:
				$sql_query	= mysql_query("SELECT $_Base_Elements FROM booking") or die(mysql_error());
			break;
			// -------------------------------

		}
		// -------------------------------------------------------------------------
	
	
	
	
	
	
	
		
		// NOT Single Record populate array ----------		
		if($Domain != 'transaction_specific'){

  		$sql_numrows		=	mysql_num_rows($sql_query);

   		// populate result array --------------------
   		$counter = 0;
   		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
   			$ResultArray[$counter] = $sql_array_result;
   			$counter++;
   		}
   		// ---------------------------------------			
		}else{
			
			return mysql_fetch_assoc($sql_query);

		}




/*
		// single record response 
		if($Domain == 'transaction_specific'){

				
				$sql_query			= mysql_query("SELECT * FROM booking WHERE booking.id = '$SubDomain'") or die(mysql_error());
    		$sql_numrows		=	mysql_num_rows($sql_query);
    
     		// populate result array --------------------
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray= $sql_array_result;
     		}
     		// -------------------------------------------
			
		
		// multiple record response ------------------
		}else{

    		$sql_numrows		=	mysql_num_rows($sql_query);

     		// populate result array --------------------
     		$counter = 0;
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray[$counter] = $sql_array_result;
     			$counter++;
     		}
     		// ---------------------------------------
		}
		// -------------------------------------------
*/




		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			//$ResultArray[0]['name'] = 'No Records';
			//$ResultArray[0]['id'] 	= 0;
			//$_return = $ResultArray;
			$_return = 'no data';
		}

	 return $_return;
	}
// =======================================================================================












// =======================================================================================
	public function GetHumanCapital($Domain, $Filter = null){

		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid



		$_return							= false;
		$_FLAG_filterPresent	= false;
		$ResultArray					= null;



		// check for filter ----------------
		if($Filter != null){
			$_FLAG_filterPresent	= true;
 			$_Exploded_FILTER 		= explode(':', $Filter);
 			$_column							= $_Exploded_FILTER[0];
 			$_sortMethod					= $_Exploded_FILTER[1];
		}
		// ---------------------------------



		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------




		switch($Domain){

			// -------------------------------
			case 'system_all':
				$sql_query	= mysql_query("SELECT userid, organization_id, manager_id, first_name, last_name, ts_lastaction, user_type, disabled FROM user ORDER BY userid ASC") or die(mysql_error());
			break;
			// -------------------------------


			// -------------------------------
			case 'system_active':
				$TableName	=	'user';
				$sql_query	= mysql_query("SELECT * FROM $TableName WHERE $TableName.disabled = '0' ORDER BY userid ASC") or die(mysql_error());
			break;
			// -------------------------------


			// -------------------------------
			case 'organization':

					$Org_ID			=	$_SESSION['ActiveUser']['organization_id'];

					switch($_FLAG_filterPresent){
						case true:
							$sql_query	= mysql_query("SELECT userid, organization_id, manager_id, first_name, last_name, ts_lastaction, user_type, disabled, quota_default as quota FROM user WHERE user.organization_id = $Org_ID ORDER BY user.".$_column." ".$_sortMethod."") or die(mysql_error());
						break;
	
						default:
							$sql_query	= mysql_query("SELECT userid, organization_id, manager_id, first_name, last_name, ts_lastaction, user_type, disabled FROM user WHERE user.organization_id = $Org_ID ORDER BY first_name ASC") or die(mysql_error());
						break;
					}
				
			break;
			// -------------------------------


			// -------------------------------
			case 'manager':

				// check for explicit subscope -----------
				if($SubDomain != null){
					$Mgr_ID			=	$SubDomain;
				}else{
					$Mgr_ID			=	$_SESSION['ActiveUser']['manager_id'];
				}

				$TableName	=	'user';
				$sql_query	= mysql_query("SELECT * FROM $TableName WHERE $TableName.manager_id = $Mgr_ID ORDER BY userid ASC") or die(mysql_error());
			break;
			// -------------------------------


			// -------------------------------
			default:
				$TableName	=	'user';
				$sql_query	= mysql_query("SELECT * FROM $TableName") or die(mysql_error());
			break;
			// -------------------------------
		}




		// single record response 
		if($Domain == 'user'){

				$TableName	=	'user';
				
				$sql_query			= mysql_query("SELECT * FROM $TableName WHERE $TableName.userid = '$SubDomain'") or die(mysql_error());
    		$sql_numrows		=	mysql_num_rows($sql_query);
    
     		// populate result array --------------------
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray= $sql_array_result;
     		}
     		// -------------------------------------------
			
		
		// multiple record response ------------------
		}else{

    		$sql_numrows		=	mysql_num_rows($sql_query);

     		// populate result array --------------------
     		$counter = 0;
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray[$counter] = $sql_array_result;
     			$counter++;
     		}
     		// ---------------------------------------
		}
		// -------------------------------------------





		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$ResultArray[0]['name'] = 'No Records';
			$ResultArray[0]['id'] 	= 0;
			$_return = $ResultArray;
		}

	 return $_return;
	}
// =======================================================================================















// =======================================================================================
	public function GetManagers($Domain, $SubDomain = null){

		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid



		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		switch($Domain){

			// -------------------------------
			case 'system_all':
				$sql_query	= mysql_query("SELECT * FROM user WHERE user.user_type = '3' ORDER BY first_name ASC") or die(mysql_error());
			break;
			// -------------------------------

			// -------------------------------
			case 'system_active':
				$sql_query	= mysql_query("SELECT * FROM user WHERE user.user_type = '3' AND user.enabled = '1' ORDER BY first_name ASC") or die(mysql_error());
			break;
			// -------------------------------




			// -------------------------------
			case 'organization':

				// check for explicit subscope -----------
				if($SubDomain != null){
					$Org_ID			=	$SubDomain;
				}else{
					$Org_ID			=	$_SESSION['ActiveUser']['organization_id'];
				}

				$sql_query	= mysql_query("SELECT * FROM user WHERE user.organization_id = $Org_ID AND user.user_type = '3' ORDER BY first_name ASC") or die(mysql_error());
			break;
			// -------------------------------


			// -------------------------------
			default:
				$sql_query	= mysql_query("SELECT * FROM user WHERE user.user_type = '3' ORDER BY first_name ASC") or die(mysql_error());
			break;
			// -------------------------------
		}


		$sql_numrows		=	mysql_num_rows($sql_query);

 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}
 		// ---------------------------------------



		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			//$ResultArray[0]['name'] = 'No Records';
			//$ResultArray[0]['id'] 	= 0;
			$_return = 0;
		}

	 return $_return;
	}
// =======================================================================================












// =======================================================================================
	public function GetUserTypes($BaseLevel){

		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query	= mysql_query("SELECT * FROM user_type WHERE user_type_id <= $BaseLevel AND enabled = '1' ORDER BY user_type ASC") or die(mysql_error());

 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}
 		// ---------------------------------------

		$_return				=	$ResultArray;

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================










// =======================================================================================
	public function CommissionDecimal_to_CommissionRateID($CommissionRateDecimal){

		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query				= mysql_query("SELECT id FROM commission_rate WHERE rate = '$CommissionRateDecimal'") or die(mysql_error());
		$sql_array_result	=	mysql_fetch_assoc($sql_query);
		$_return					=	$sql_array_result['id'];
		

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================











// =======================================================================================
	public function GetCommission_to_CommissionRate($CommissionRateID){

		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query				= mysql_query("SELECT name, rate FROM commission_rate WHERE id = '$CommissionRateID'") or die(mysql_error());
		$_return					=	mysql_fetch_assoc($sql_query);


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================













// =======================================================================================
	public function GetCommissionRates(){

		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query	= mysql_query("SELECT * FROM commission_rate WHERE enabled = '1' ORDER BY rate ASC") or die(mysql_error());

 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}
 		// ---------------------------------------

		$_return				=	$ResultArray;

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================














// =======================================================================================
	public function GetOrigin(){

		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query	= mysql_query("SELECT * FROM origin WHERE enabled = '1' ORDER BY name ASC") or die(mysql_error());

 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}
 		// ---------------------------------------

		$_return				=	$ResultArray;

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================












// =======================================================================================
	public function ModuleAuthentication($UserID, $URI){

		$_return					= false;
		$sql_numrows			= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query				= mysql_query("SELECT * FROM module WHERE uri = '$URI'") or die(mysql_error());
		$sql_array_result	=	mysql_fetch_assoc($sql_query);
		$_ModuleID				=	$sql_array_result['id'];


		$sql_query				= mysql_query("SELECT * FROM user_modules WHERE module_id = '$_ModuleID' AND user_id = '$UserID'") or die(mysql_error());
		$sql_numrows			=	mysql_num_rows($sql_query);
		
		if($sql_numrows){
			$_return				= true;
		}
		

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================











// =======================================================================================
	public function MediumID_to_MediumTiming($ID){

		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query				= mysql_query("SELECT * FROM medium_timing WHERE id = '$ID'") or die(mysql_error());
		$sql_array_result	=	mysql_fetch_assoc($sql_query);
		$_return					=	$sql_array_result['type'];

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================












// =======================================================================================
	public function OriginType_to_OriginID($OriginType){

		$_return					= false;
		$ResultArray			= null;
		$OriginType				= trim(strtolower($OriginType));
		


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query				= mysql_query("SELECT * FROM origin WHERE name = '$OriginType'") or die(mysql_error());
		$sql_array_result	=	mysql_fetch_assoc($sql_query);
		$_return					=	$sql_array_result['id'];

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================













// =======================================================================================
	public function MediumType_to_MediumID($MediumType){

		$_return					= false;
		$ResultArray			= null;
		$MediumType				= strtolower($MediumType);
		


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query				= mysql_query("SELECT * FROM medium WHERE type = '$MediumType'") or die(mysql_error());
		$sql_array_result	=	mysql_fetch_assoc($sql_query);
		$_return					=	$sql_array_result['id'];

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================















// =======================================================================================
	public function MediumID_to_MediumType($ID){

		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query				= mysql_query("SELECT * FROM medium WHERE id = '$ID'") or die(mysql_error());
		$sql_array_result	=	mysql_fetch_assoc($sql_query);
		$_return					=	$sql_array_result['type'];

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================








// =======================================================================================
	public function ClientID_to_ClientName($ID){

		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query				= mysql_query("SELECT * FROM client WHERE id = '$ID'") or die(mysql_error());
		$sql_array_result	=	mysql_fetch_assoc($sql_query);
		$_return					=	$sql_array_result['name'];

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================











// =======================================================================================
	public function AdvertiserID_to_AdvertiserName($ID){

		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query				= mysql_query("SELECT * FROM advertiser WHERE id = '$ID'") or die(mysql_error());
		$sql_array_result	=	mysql_fetch_assoc($sql_query);
		$_return					=	$sql_array_result['name'];

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================










// =======================================================================================
	public function VendorID_to_VendorName($ID){

		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query				= mysql_query("SELECT * FROM vendor WHERE id = '$ID'") or die(mysql_error());
		$sql_array_result	=	mysql_fetch_assoc($sql_query);
		$_return					=	$sql_array_result['name'];

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================












// =======================================================================================
/*
	public function GetVendors(){

		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query	= mysql_query("SELECT * FROM vendor WHERE enabled = '1' ORDER BY name ASC") or die(mysql_error());

 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}
 		// ---------------------------------------

		$_return				=	$ResultArray;

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
*/
// =======================================================================================











// =======================================================================================
	public function GetMediumTiming(){

		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query	= mysql_query("SELECT * FROM medium_timing WHERE enabled = '1' ORDER BY type ASC") or die(mysql_error());

 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}
 		// ---------------------------------------

		$_return				=	$ResultArray;

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================













// =======================================================================================
	public function GetMedium(){

		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query	= mysql_query("SELECT * FROM medium WHERE enabled = '1' ORDER BY type ASC") or die(mysql_error());

 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}
 		// ---------------------------------------

		$_return				=	$ResultArray;

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
// =======================================================================================













// =======================================================================================
	public function GetOrganizations($Domain, $SubDomain = null){

		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid



		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		switch($Domain){

			// -------------------------------
			case 'system_all':
				$sql_query	= mysql_query("SELECT * FROM organization ORDER BY name ASC") or die(mysql_error());
			break;
			// -------------------------------


			// -------------------------------
			case 'system_active':
				$sql_query	= mysql_query("SELECT * FROM organization WHERE enabled = '1' ORDER BY name ASC") or die(mysql_error());
			break;
			// -------------------------------



			// -------------------------------
			case 'organization':

				// set limited domain ----------
				$Org_ID			=	$_SESSION['ActiveUser']['organization_id'];

				$sql_query	= mysql_query("SELECT * FROM organization WHERE id = $Org_ID ORDER BY name ASC") or die(mysql_error());
			break;
			// -------------------------------



			// -------------------------------
			default:
				$Org_ID			=	$_SESSION['ActiveUser']['organization_id'];
				$sql_query	= mysql_query("SELECT * FROM organization WHERE id = $Org_ID") or die(mysql_error());
			break;
			// -------------------------------
		}



		// single record response 
		if($Domain == 'organization_specific'){

				$sql_query			= mysql_query("SELECT * FROM organization WHERE id = '$SubDomain'") or die(mysql_error());
    		$sql_numrows		=	mysql_num_rows($sql_query);
    
     		// populate result array --------------------
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray= $sql_array_result;
     		}
     		// -------------------------------------------
			
		
		// multiple record response ------------------
		}else{

    		$sql_numrows		=	mysql_num_rows($sql_query);

     		// populate result array --------------------
     		$counter = 0;
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray[$counter] = $sql_array_result;
     			$counter++;
     		}
     		// ---------------------------------------
		}
		// -------------------------------------------





		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$ResultArray[0]['name'] = 'No Records';
			$ResultArray[0]['id'] 	= 0;
			$_return = $ResultArray;
		}

	 return $_return;
	}
// =======================================================================================













// =======================================================================================
	public function GetAdvertisers($Domain, $SubDomain = null, $SubSubDomain = null){

		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid



		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		switch($Domain){

			// -------------------------------
			case 'system_all':
				$sql_query	= mysql_query("SELECT * FROM advertiser ORDER BY name ASC") or die(mysql_error());
			break;
			// -------------------------------


			// -------------------------------
			case 'system_active':
				$sql_query	= mysql_query("SELECT * FROM advertiser WHERE enabled = '1' ORDER BY name ASC") or die(mysql_error());
			break;
			// -------------------------------






			// -------------------------------
			case 'organization':

				// check for explicit subscope -----------
				if($SubDomain != null){
					$Org_ID			=	$SubDomain;
				}else{
					$Org_ID			=	$_SESSION['ActiveUser']['organization_id'];
				}

				$sql_query	= mysql_query("SELECT * FROM advertiser WHERE organization_owner_id = $Org_ID ORDER BY name ASC") or die(mysql_error());
			break;
			// -------------------------------






			// -------------------------------
			default:
				$Org_ID			=	$_SESSION['ActiveUser']['organization_id'];
				$sql_query	= mysql_query("SELECT * FROM advertiser WHERE client.organization_owner_id = $Org_ID") or die(mysql_error());
			break;
			// -------------------------------
		}




		// single record response 
		if($Domain == 'client_specific'){

				$sql_query			= mysql_query("SELECT * FROM advertiser WHERE id = '$SubDomain'") or die(mysql_error());
    		$sql_numrows		=	mysql_num_rows($sql_query);
    
     		// populate result array --------------------
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray= $sql_array_result;
     		}
     		// -------------------------------------------
			
		
		// multiple record response ------------------
		}else{

    		$sql_numrows		=	mysql_num_rows($sql_query);

     		// populate result array --------------------
     		$counter = 0;
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray[$counter] = $sql_array_result;
     			$counter++;
     		}
     		// ---------------------------------------
		}
		// -------------------------------------------





		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$ResultArray[0]['name'] = 'No Records';
			$ResultArray[0]['id'] 	= 0;
			$_return = $ResultArray;
		}

	 return $_return;
	}
// =======================================================================================














// =======================================================================================
	public function GetVendors($Domain, $SubDomain = null, $SubSubDomain = null){

		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid



		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		switch($Domain){

			// -------------------------------
			case 'system_all':
				$sql_query	= mysql_query("SELECT * FROM vendor ORDER BY name ASC") or die(mysql_error());
			break;
			// -------------------------------


			// -------------------------------
			case 'system_active':
				$sql_query	= mysql_query("SELECT * FROM vendor WHERE enabled = '1' ORDER BY name ASC") or die(mysql_error());
			break;
			// -------------------------------






			// -------------------------------
			case 'organization':

				// check for explicit subscope -----------
				if($SubDomain != null){
					$Org_ID			=	$SubDomain;
				}else{
					$Org_ID			=	$_SESSION['ActiveUser']['organization_id'];
				}

				$sql_query	= mysql_query("SELECT * FROM vendor WHERE organization_owner_id = $Org_ID ORDER BY name ASC") or die(mysql_error());
			break;
			// -------------------------------






			// -------------------------------
			default:
				$Org_ID			=	$_SESSION['ActiveUser']['organization_id'];
				$sql_query	= mysql_query("SELECT * FROM vendor WHERE client.organization_owner_id = $Org_ID") or die(mysql_error());
			break;
			// -------------------------------
		}




		// single record response 
		if($Domain == 'client_specific'){

				$sql_query			= mysql_query("SELECT * FROM vendor WHERE id = '$SubDomain'") or die(mysql_error());
    		$sql_numrows		=	mysql_num_rows($sql_query);
    
     		// populate result array --------------------
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray= $sql_array_result;
     		}
     		// -------------------------------------------
			
		
		// multiple record response ------------------
		}else{

    		$sql_numrows		=	mysql_num_rows($sql_query);

     		// populate result array --------------------
     		$counter = 0;
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray[$counter] = $sql_array_result;
     			$counter++;
     		}
     		// ---------------------------------------
		}
		// -------------------------------------------





		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$ResultArray[0]['name'] = 'No Records';
			$ResultArray[0]['id'] 	= 0;
			$_return = $ResultArray;
		}

	 return $_return;
	}
// =======================================================================================


















// =======================================================================================
	public function GetClients($Domain, $SubDomain = null, $SubSubDomain = null){

		// SCOPE DEFINITION (users within...)
		// system, organization, manager, sales, admin, user
		// SUBSCOPE DEFINITION (specified or per user session variables)
		// orgid, mgrid, userid



		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		switch($Domain){

			// -------------------------------
			case 'system_all':
				$sql_query	= mysql_query("SELECT * FROM client ORDER BY name ASC") or die(mysql_error());
			break;
			// -------------------------------


			// -------------------------------
			case 'system_active':
				$sql_query	= mysql_query("SELECT * FROM client WHERE enabled = '1' ORDER BY name ASC") or die(mysql_error());
			break;
			// -------------------------------






			// -------------------------------
			case 'organization':

				// check for explicit subscope -----------
				if($SubDomain != null){
					$Org_ID			=	$SubDomain;
				}else{
					$Org_ID			=	$_SESSION['ActiveUser']['organization_id'];
				}

				$sql_query	= mysql_query("SELECT * FROM client WHERE organization_owner_id = $Org_ID ORDER BY name ASC") or die(mysql_error());
			break;
			// -------------------------------






			// -------------------------------
			default:
				$Org_ID			=	$_SESSION['ActiveUser']['organization_id'];
				$sql_query	= mysql_query("SELECT * FROM client WHERE client.organization_owner_id = $Org_ID") or die(mysql_error());
			break;
			// -------------------------------
		}




		// single record response 
		if($Domain == 'client_specific'){

				$sql_query			= mysql_query("SELECT * FROM client WHERE id = '$SubDomain'") or die(mysql_error());
    		$sql_numrows		=	mysql_num_rows($sql_query);
    
     		// populate result array --------------------
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray= $sql_array_result;
     		}
     		// -------------------------------------------
			
		
		// multiple record response ------------------
		}else{

    		$sql_numrows		=	mysql_num_rows($sql_query);

     		// populate result array --------------------
     		$counter = 0;
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray[$counter] = $sql_array_result;
     			$counter++;
     		}
     		// ---------------------------------------
		}
		// -------------------------------------------





		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$ResultArray[0]['name'] = 'No Records';
			$ResultArray[0]['id'] 	= 0;
			$_return = $ResultArray;
		}

	 return $_return;
	}
// =======================================================================================












// =======================================================================================
	public function GetUsersManager($ActiveUserSession){


		$_return					= false;
		$ResultArray			= null;

		
		if($_SESSION['ActiveUser']['manager_id'] == 0 || !$_SESSION['ActiveUser']['manager_id']){
			$ResultArray['userid'] 			= 0;
			$ResultArray['first_name'] 	= 'No';
			$ResultArray['last_name'] 	= 'Record';
			$_return 										= $ResultArray;
		}else{

			$Manager_UserID							=	$_SESSION['ActiveUser']['manager_id'];

  		// database connection -----------------------
  		$obj_db						= new db;
  		$obj_db->Connect(1);  //read operation
  		// -------------------------------------------

  		$sql_query			= mysql_query("SELECT * FROM user WHERE user.userid = '$Manager_UserID'") or die(mysql_error());
   		$sql_numrows		=	mysql_num_rows($sql_query);
      
   		// populate result array --------------------
   		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
  			$ResultArray	= $sql_array_result;
    	}
  		// -------------------------------------------
  
  
  		// destroy database connection object --------
  		$obj_db->Close();
  		unset($obj_db);
  		// -------------------------------------------
  
  
  		if($sql_numrows){
  			$_return = $ResultArray;
  		}else{
  			$ResultArray['name'] = 'No Record Found';
  			$ResultArray['id'] 	= 0;
  			$_return = $ResultArray;
  		}

		}



	 return $_return;
	}
// =======================================================================================













// =======================================================================================
	public function GetOrganizationTeam($OrganizationID){


		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$sql_query			= mysql_query("SELECT organization_id, first_name, last_name, user_type, userid FROM user WHERE user.organization_id = '$OrganizationID' AND user.disabled = '0'") or die(mysql_error());
 		$sql_numrows		=	mysql_num_rows($sql_query);
    
		// populate result array --------------------
		$counter = 0;
		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
			$ResultArray[$counter] = $sql_array_result;
			$counter++;
		}
		// -------------------------------------------


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$ResultArray[0]['name'] = 'No Record Found';
			$ResultArray[0]['id'] 	= 0;
			$_return = $ResultArray;
		}

	 return $_return;
	}
// =======================================================================================
















// =======================================================================================
	public function GetManagerTeam($ManagerUserID){


		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$sql_query			= mysql_query("SELECT organization_id, first_name, last_name, userid FROM user WHERE user.manager_id = '$ManagerUserID' AND user.disabled = '0'") or die(mysql_error());
 		$sql_numrows		=	mysql_num_rows($sql_query);
    
		// populate result array --------------------
		$counter = 0;
		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
			$ResultArray[$counter] = $sql_array_result;
			$counter++;
		}
		// -------------------------------------------


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$ResultArray[0]['name'] = 'No Record Found';
			$ResultArray[0]['id'] 	= 0;
			$_return = $ResultArray;
		}

	 return $_return;
	}
// =======================================================================================













// =======================================================================================
	public function GetUserRecord($UserID){


		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$sql_query			= mysql_query("SELECT * FROM user WHERE user.userid = '$UserID'") or die(mysql_error());
 		$sql_numrows		=	mysql_num_rows($sql_query);
    
 		// populate result array --------------------
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
			$ResultArray= $sql_array_result;
  	}
		// -------------------------------------------


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$ResultArray[0]['name'] = 'No Record Found';
			$ResultArray[0]['id'] 	= 0;
			$_return = $ResultArray;
		}

	 return $_return;
	}
// =======================================================================================















	// METHOD :: get base data records =================================
	public function GetDataRecords($ContentType, $Mode = 'multi', $RecordID = null, $Limit = null){


		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		switch($ContentType){

			case 'activity':
				$TableName	=	'activity';
				$sql_query	= mysql_query("SELECT * FROM $TableName ORDER BY ts DESC") or die(mysql_error());
			break;

			case 'user':
				$TableName	=	'user';
				$sql_query	= mysql_query("SELECT * FROM $TableName WHERE $TableName.userid = $Org_Scope ORDER BY name ASC") or die(mysql_error());
			break;


			default:
				$sql_query	= mysql_query("SELECT * FROM $TableName") or die(mysql_error());
			break;
		}


		// get type ----------------------------------
		switch($Mode){
			
			case 'single':
				$sql_query			= mysql_query("SELECT * FROM $TableName WHERE $TableName.id = '$RecordID'") or die(mysql_error());
    		$sql_numrows		=	mysql_num_rows($sql_query);
    
     		// populate result array --------------------
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray= $sql_array_result;
     		}
     		// -------------------------------------------
			break;

			case 'multi':
				//$sql_query			= mysql_query("SELECT * FROM $TableName WHERE $TableName.disabled = '0' ORDER BY ts DESC LIMIT $Limit") or die(mysql_error());
    		$sql_numrows		=	mysql_num_rows($sql_query);
    		
    		
     		// populate result array --------------------
     		$counter = 0;
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray[$counter] = $sql_array_result;
     			$counter++;
     		}
     		// -------------------------------------------


			break;

		}
		// -------------------------------------------



		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$ResultArray[0]['name'] = 'No Records';
			$ResultArray[0]['id'] 	= 0;
			$_return = $ResultArray;
		}

	 return $_return;
	}
	// =================================================================










// =======================================================================================
	public function Disabled_to_Status($Enum){

		$_return	= false;

		switch($Enum){
			case 0:
				$_return	= 'Enabled';
			break;

			case 1:
				$_return	= 'Disabled';
			break;
		}

	 return $_return;	
	}
// =======================================================================================
















// =======================================================================================
	public function UserID_to_UserInitials($UserID){

		$_return						= false;

		if(!$UserID){
			$_return						= 'None';
		}else{
			$_Array_USER_RECORD	=	$this->GetUserRecord($UserID);
			$Initials						=	strtoupper(substr($_Array_USER_RECORD['first_name'],0,1)).strtoupper(substr($_Array_USER_RECORD['last_name'],0,1));
			$_return						= $Initials;			
		}

	 return $_return;
	}
// =======================================================================================

















// =======================================================================================
	public function UserTypeID_to_UserType($UserTypeID){


		$_return					= false;
		$ResultArray			= null;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_query					= mysql_query("SELECT * FROM user_type WHERE user_type_id = $UserTypeID") or die(mysql_error());
		$ResultObject				=	mysql_fetch_object($sql_query);


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------

		$_return = $ResultObject->user_type;


	 return $_return;
	}
// =======================================================================================













// =======================================================================================
	public function UserID_to_UserType($UserID){


		$_return					= false;
		$ResultArray			= null;



		$_Array_USER_RECORD	=	$this->GetUserRecord($UserID);

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$_UserType_ID				=	$_Array_USER_RECORD['user_type'];
		$sql_query					= mysql_query("SELECT * FROM user_type WHERE user_type_id = $_UserType_ID") or die(mysql_error());


		$ResultObject				=	mysql_fetch_object($sql_query);


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultObject;
		}else{
			$ResultObject->name = 'No Records';
			$ResultObject->id 	= 0;
			$_return = $ResultObject;
		}

	 return $_return;
	}
// =======================================================================================













// =======================================================================================
	public function Timestamp_to_Quarter($Timestamp){

		$_return	= false;

		switch(strtolower(date('M',$Timestamp))){
			
			case 'jan':
				echo 'Q1';
			break;

			case 'feb':
				echo 'Q1';
			break;

			case 'mar':
				echo 'Q1';
			break;


			case 'apr':
				echo 'Q2';
			break;

			case 'may':
				echo 'Q2';
			break;

			case 'jun':
				echo 'Q2';
			break;



			case 'jul':
				echo 'Q3';
			break;

			case 'aug':
				echo 'Q3';
			break;

			case 'sep':
				echo 'Q3';
			break;


			case 'oct':
				echo 'Q4';
			break;

			case 'nov':
				echo 'Q4';
			break;

			case 'dec':
				echo 'Q4';
			break;


		}

	 return $_return;	
	}
// =======================================================================================














// =======================================================================================
	public function FieldName_to_HumanReadable($FieldName){

		$_return	= false;

		switch($FieldName){

			case 'sold_quarter':
				$_return	= 'QTR';
			break;

			case 'sold_month':
				$_return	= 'Month';
			break;

			case 'sales_person':
				$_return	= 'Sales Person';
			break;

			case 'sum(direct_commission)':
				$_return	= 'Direct Commission';
			break;

			case 'sum(gross_profit)':
				$_return	= 'Gross Profit';
			break;

			case 'sum(po_cost)':
				$_return	= 'COGS';
			break;

			case 'sum(client_net_total)':
				$_return	= 'Revenue';
			break;

			case 'count(id)':
				$_return	= 'Deals';
			break;

			case 'publication_id':
				$_return	= 'Vendor';
			break;

			case 'profit_percentage':
				$_return	= 'Profit %';
			break;

			case 'gross_profit':
				$_return	= 'Gross Profit';
			break;

			case 'override_commission_id':
				$_return	= 'Override';
			break;

			case 'direct_commission_id':
				$_return	= 'Direct Commission %';
			break;

			case 'direct_commission':
				$_return	= 'Direct';
			break;

			case 'po_cost':
				$_return	= 'PO Cost';
			break;

			case 'client_net_total':
				$_return	= 'Total Client Net';
			break;

			case 'disabled':
				$_return	= 'Status';
			break;

			case 'organization_id':
				$_return	= 'Organization';
			break;

			case 'user_type':
				$_return	= 'User Type';
			break;

			case 'last_name':
				$_return	= 'Last Name';
			break;

			case 'first_name':
				$_return	= 'First Name';
			break;

			case 'ts_lastaction':
				$_return	= 'Last Action';
			break;

			case 'ts_entered':
				$_return	= 'Entered';
			break;

			case 'ts_sold':
				$_return	= 'Sold';
			break;

			case 'ts':
				$_return	= 'Timestamp';
			break;

			case 'id':
				$_return	= 'Record ID';
			break;

			case 'userid':
				$_return	= 'UserID';
			break;

			case 'io':
				$_return	= 'IO#';
			break;

			case 'po':
				$_return	= 'PO#';
			break;

			case 'medium_id':
				$_return	= 'Medium';
			break;

			case 'sales_person_id':
				$_return	= 'Seller';
			break;

			case 'manager_id':
				$_return	= 'Manager';
			break;

			case 'advertiser_id':
				$_return	= 'Advertiser';
			break;

			case 'client_id':
				$_return	= 'Client';
			break;

			default:
				$_return	= $FieldName;
			break;
			
		}

	 return $_return;	
	}
	// =================================================================











	// =================================================================
	public function ValidateForm($FormData, $Mode = 1){


				// form processable by default -----------
				$_return		= 111;


				// form communication dataset ----------------------
				$Array_Post_EXPLODED = explode(':',$FormData);

				$Array_Post = array(
					'table' 			=> $Array_Post_EXPLODED[0],
					'field' 			=> $Array_Post_EXPLODED[1],
					'value' 			=> $Array_Post_EXPLODED[2]
				);
				// -------------------------------------------------



				// get Validation rules from DB ----------
				$__FieldRule									=	$Array_Post_EXPLODED[1];
				$_validation_DB_DATASET				=	$this->GetFormValidationRules($__FieldRule);
				
				// check for validation rule set ---------
				if($_validation_DB_DATASET == false){
					die('661');
				}


				// populate array from DB dataset --------
				foreach($_validation_DB_DATASET as $_Array_DB_VALIDATION_DATASET_RULE){
					foreach($_Array_DB_VALIDATION_DATASET_RULE as $_field_2 => $_value_2){

						if($_value_2 == $Array_Post['field']){
      				$Array_Validation_Response = array(
      					'response_invalid' 					=> $_Array_DB_VALIDATION_DATASET_RULE['response_invalid'],
      					'response_incomplete'				=> $_Array_DB_VALIDATION_DATASET_RULE['response_incomplete'],
      					'response_unavailable'			=> $_Array_DB_VALIDATION_DATASET_RULE['response_unavailable'],
      					'response_valid' 						=> $_Array_DB_VALIDATION_DATASET_RULE['response_valid'],
      					'icon_invalid_url_small'		=> $_Array_DB_VALIDATION_DATASET_RULE['icon_invalid_url'],
      					'icon_valid_url_small'			=> $_Array_DB_VALIDATION_DATASET_RULE['icon_valid_url'],
      					'response_div_id' 					=> $_Array_DB_VALIDATION_DATASET_RULE['response_div_id'],
      					'rule' 											=> $_Array_DB_VALIDATION_DATASET_RULE['rule'],
      					'check_func'								=> $_Array_DB_VALIDATION_DATASET_RULE['check_func'],
      					'default'										=> $_Array_DB_VALIDATION_DATASET_RULE['default'],
      					'field'											=> $_Array_DB_VALIDATION_DATASET_RULE['field']
      				);
						}
					}
				}
				// ---------------------------------------






//DEBUG --------------------------------
//echo $Array_Post['field'];






// check database for existing ===========================================================

						// validation rule from DB ---------------------
						eval('$evalResult=('.$Array_Validation_Response['rule'].')?true:false;');

			
						if($Array_Validation_Response['check_func']){


      				// exists --------
      				if($this->$Array_Validation_Response['check_func']($Array_Post['value']) == false){
  
      					switch($Mode){
      						case 1:
      							echo $Array_Validation_Response['response_unavailable'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
      							$_return		= null;
      						break;
  
      						case 2:
      							echo $Array_Validation_Response['default'].' '.$Array_Validation_Response['response_unavailable'];
      							$_return		= null;
      						break;
      					}
  						}
						}
// =======================================================================================






// validate field ========================================================================
						// incomplete ----
    				if(!$Array_Post['value']){
    					
    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    							$_return		= null;
    						break;

    						case 2:
    							// plan B response from Hard Validation ------------
    							//echo $Array_Validation_Response['default'].' '.$Array_Validation_Response['response_incomplete'].'+';
    							echo $Array_Validation_Response['field'].'+';
    							$_return		= null;
    						break;
    					}

    				// invalid -------
    				//}elseif(filter_var($Array_Post['value'], FILTER_VALIDATE_EMAIL) == false){
    				}elseif($evalResult){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    							$_return		= null;
    						break;

    						case 2:
    							//echo $Array_Validation_Response['default'].' '.$Array_Validation_Response['response_invalid'].'+';
    							echo $Array_Validation_Response['field'].'+';
    							$_return		= null;
    						break;
    					}


    				// valid ---------
    				}else{

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    							$_return		= null;
    						break;

    						case 2:
    							//echo 'Email Field Valid';
    						break;
    					}
    				}
// =======================================================================================




	 return $_return;	
	}
	// =================================================================
















	// METHOD :: Get - Performance =====================================
	public function Generate_SessionActivity_Report($PromoID_DECRYPTED, $Type, $Range = false, $Option = false){


		// specific time range -------------
		if($Range != null && $Range != 0){
			$Range = explode(',',$_GET['_range']);

    	$_day 	= date('d',$Range[0]);
    	$_month = date('m',$Range[0]);
    	$_year 	= date('Y',$Range[0]);

		// current month -------------------
		}else{
    	$_day 	= date('d',time());
    	$_month = date('m',time());
    	$_year 	= date('Y',time());			
		}

		// today -----------------
    $_startDayTS 	= mktime(0, 0, 0, $_month, $_day, $_year);
    $_endDayTS 		= mktime(23, 59, 59, $_month, $_day, $_year);


		// yesterday -------------
    $_startYDayTS	= (mktime(0, 0, 0, $_month, $_day, $_year) - 86400);
    $_endYDayTS 	= (mktime(23, 59, 59, $_month, $_day, $_year) - 86400);

		// start & end of month --
		$_startMonthTS 	= mktime(0, 0, 0, $_month, 1, $_year);
		$_endMonthTS 		= mktime(23, 59, 59, $_month, date('t',time()), $_year);


		$_return									= false;
		$num_rows									= false;
		$PerformanceArray[]				= 0;
		$_30DaysAgo								= time() - (86400 * 30);
		$_1DayAgo									= time() - 86400;



		switch($Type){
			
			// Nav Bar Performance Preview ---------------------------------
			case 'top_navbar':


    		// database connection -----------------------
    		$obj_db					= new db;
    		$obj_db->Connect(1); //read operation
    		// -------------------------------------------
    

    		// get Impressions & Clicks via eGenHQ DB ====
        foreach($PromoID_DECRYPTED as $key){
    
        	$PromoID = $key['promoid'];
    
    
        	// Retrieve Data -----------------------------
      		$sql_query	= mysql_query("SELECT * FROM user_promos_actions WHERE user_promos_actions.promoid = '$PromoID'");
      		$num_rows		=	mysql_num_rows($sql_query);
      		// -------------------------------------------
    
    			if($num_rows){
        		// populate result array --------------------
        		$counter = 0;
        		while($sql_array_result	=	mysql_fetch_assoc($sql_query) ){
        			$ResultArray[$counter] = $sql_array_result;
        			$counter++;
        		}
        		// -------------------------------------------
    
    
      			// iterate array -----------------------------
      			foreach($ResultArray as $key){
      				switch($key['action']){
      
      					case 'impression':
      						
      						// impression count per last 24 hours --------------
      						if($key['ts'] > $_startDayTS && $key['ts'] < $_endDayTS && $key['promoid'] == $PromoID){
      							$PerformanceArray['impressions_24hours']++;
      						}
      						// -------------------------------------------------
      						
      						// impression count per last 30 days ---------------
      						if($key['ts'] > $_30DaysAgo && $key['promoid'] == $PromoID){
      							$PerformanceArray['impressions_30days']++;
      						}
      						// -------------------------------------------------

          				// impression count per current month --------------
          				if($key['ts'] >= $_startMonthTS && $key['ts'] <= $_endMonthTS && $key['promoid'] == $PromoID){
          					$PerformanceArray['impressions_ThisMonth']++;	
          				}
          				// -------------------------------------------------


      						// impression count all time total -----------------
      						if($key['ts'] && $key['promoid'] == $PromoID){
      							$PerformanceArray['impressions_alltimetotal']++;
      						}
      						// -------------------------------------------------


      					break;
      
      					case 'click':
      						
      						// clicks count per last 24 hours --------------
      						if($key['ts'] >= $_startDayTS && $key['ts'] <= $_endDayTS && $key['promoid'] == $PromoID){
      							$PerformanceArray['clicks_24hours']++;
      						}
      						// -------------------------------------------------
      						
      						// clicks count per last 30 days ---------------
      						if($key['ts'] > $_30DaysAgo && $key['promoid'] == $PromoID){
      							$PerformanceArray['clicks_30days']++;
      						}
      						// -------------------------------------------------

          				// clicks count per current month ------------------
          				if($key['ts'] >= $_startMonthTS && $key['ts'] <= $_endMonthTS && $key['promoid'] == $PromoID){
          					$PerformanceArray['clicks_ThisMonth']++;	
          				}
          				// -----------------------------------------------------

      						// clicks count all time total -----------------
      						if($key['ts'] && $key['promoid'] == $PromoID){
      							$PerformanceArray['clicks_alltimetotal']++;
      						}
      						// -------------------------------------------------

      					break;
      				}
      			}
        		// -------------------------------------------
      		} // END num_rows check 
    
    
        }
        // ===========================================
    
    
    		// destroy database connection object --------
    		$obj_db->Close();
    		unset($obj_db);
    		// -------------------------------------------












    		// get Sign-Ups via Property DB ==============
        foreach($PromoID_DECRYPTED as $key){
    
        	$PromoID 		= $key['promoid'];
        	$PropertyID = $key['propertyid'];
    
    
      		// database connection -----------------------
      		$obj_db					= new db;
      		$obj_db->Connect(1, $PropertyID); //read operation
      		// -------------------------------------------

        	// Retrieve Data -----------------------------
        	switch($Option){
        		case 'unsettled':
        			$sql_query	= mysql_query("SELECT * FROM user WHERE user.promoid = '$PromoID' AND user.settled = '0' AND user.payment_qualified = '1'");
        		break;

        		case 'unqualified':
        			$sql_query	= mysql_query("SELECT * FROM user WHERE user.promoid = '$PromoID' AND user.settled = '0' AND user.payment_qualified = '0'");
        		break;

        		default:
        			$sql_query	= mysql_query("SELECT * FROM user WHERE user.promoid = '$PromoID'");
        		break;        		
        	}

      		$num_rows		=	@mysql_num_rows($sql_query);
      		// -------------------------------------------


    
    			if($num_rows){
        		// populate result array --------------------
        		$counter = 0;
        		while($sql_array_result	=	@mysql_fetch_assoc($sql_query) ){
        			$ResultArray[$counter] = $sql_array_result;
        			$counter++;
        		}
        		// -------------------------------------------
      
      
      			// iterate array -----------------------------
      			foreach($ResultArray as $key){
    
      				// signup count per last 24 hours ------------------
      				if($key['ts_signup'] >= $_startDayTS && $key['ts'] <= $_endDayTS && $key['promoid'] == $PromoID){
      					$PerformanceArray['signups_24hours']++;	
      				}
      				// -----------------------------------------------------

      				// signup count per last 30 days -------------------
      				if($key['ts_signup'] > $_30DaysAgo && $key['promoid'] == $PromoID){
      					$PerformanceArray['signups_30days']++;	
      				}
      				// -----------------------------------------------------


      				// signup count per current month ------------------
      				if($key['ts_signup'] >= $_startMonthTS && $key['ts_signup'] <= $_endMonthTS && $key['promoid'] == $PromoID){
      					$PerformanceArray['signups_ThisMonth']++;	
      				}
      				// -----------------------------------------------------


      				// signup count all time total ---------------------
      				if($key['ts_signup']  && $key['promoid'] == $PromoID){
      					$PerformanceArray['signups_alltimetotal']++;	
      				}
      				// -----------------------------------------------------



      				// signup count all time total ---------------------
      				if($key['ts_signup'] && $key['promoid'] == $PromoID){
      					//$PerformanceArray['signups_alltimetotal']++;	
      					
      					//$PerformanceArray['signups_price_alltimetotal'] = $PerformanceArray['signups_price_alltimetotal'] + $key['price'];
      					
      					$_PayoutSpecifics = $this->GetPromoPayoutRate($PromoID, 'signup');
      					
     						$PerformanceArray['signups_earnings_alltimetotal'] += $this->ComputePromoPayout($_PayoutSpecifics, 1);

      				}
      				// -----------------------------------------------------

      
      			}
        		// -------------------------------------------
      		} // END num_rows check 
    
    
      		// destroy database connection object --------
      		$obj_db->Close();
      		unset($obj_db);
      		// -------------------------------------------
    
        }
        // ===========================================
    
    
    
    
    
    
    

    		// get Upgrades via Property DB ==============
        foreach($PromoID_DECRYPTED as $key){
    
        	$PromoID 		= $key['promoid'];
        	$PropertyID = $key['propertyid'];
    
    
      		// database connection specific to property --
      		$obj_db					= new db;
      		$obj_db->Connect(1, $PropertyID); //read operation
      		// -------------------------------------------

        	// Retrieve Data -----------------------------
        	switch($Option){
        		case 'unsettled':
        			$sql_query					= mysql_query("SELECT * FROM user_upgrade WHERE user_upgrade.promoid = '$PromoID' AND user_upgrade.price > 0 AND user_upgrade.settled = '0'");	
        		break;

        		default:
        			$sql_query					= mysql_query("SELECT * FROM user_upgrade WHERE user_upgrade.promoid = '$PromoID' AND user_upgrade.price > 0");
        		break;        		
        	}
      		$num_rows		=	@mysql_num_rows($sql_query);
      		// -------------------------------------------
    
    			if($num_rows){
        		// populate result array --------------------
        		$counter = 0;
        		while($sql_array_result	=	@mysql_fetch_assoc($sql_query) ){
        			$ResultArray[$counter] = $sql_array_result;
        			$counter++;
        		}
        		// -------------------------------------------

      			// iterate array -----------------------------
      			foreach($ResultArray as $key){
      

      				// upgrades count per last 24 hours --------------------
      				if($key['tsdateofpurchase'] >= $_startDayTS && $key['tsdateofpurchase'] <= $_endDayTS && $key['promoid'] == $PromoID){
      					$PerformanceArray['upgrades_24hours']++;
      					$PerformanceArray['upgrades_price_24hours'] = $PerformanceArray['upgrades_price_24hours'] + $key['price'];
      					
      					$_PayoutSpecifics = $this->GetPromoPayoutRate($PromoID, 'upgrade');

      					if($_PayoutSpecifics['type'] == 'percentage'){
      						$PerformanceArray['upgrades_earnings_24hours'] = $PerformanceArray['upgrades_earnings_24hours'] + $this->ComputePromoPayout($_PayoutSpecifics, $key['price']);
      					}elseif($_PayoutSpecifics['type'] == 'flatrate'){
      						$PerformanceArray['upgrades_earnings_24hours'] += $this->ComputePromoPayout($_PayoutSpecifics, 1);
      					}
      				}
      				// -----------------------------------------------------



      				// upgrades count per last 30 days -------------------
      				if($key['tsdateofpurchase'] > $_30DaysAgo && $key['promoid'] == $PromoID){
      					$PerformanceArray['upgrades_30days']++;	
      					
      					$PerformanceArray['upgrades_price_30days'] = $PerformanceArray['upgrades_price_30days'] + $key['price'];
      					
      					$_PayoutSpecifics = $this->GetPromoPayoutRate($PromoID, 'upgrade');

      					if($_PayoutSpecifics['type'] == 'percentage'){
      						$PerformanceArray['upgrades_earnings_30days'] = $PerformanceArray['upgrades_earnings_30days'] + $this->ComputePromoPayout($_PayoutSpecifics, $key['price']);
      					}elseif($_PayoutSpecifics['type'] == 'flatrate'){
      						$PerformanceArray['upgrades_earnings_30days'] += $this->ComputePromoPayout($_PayoutSpecifics, 1);
      					}
      				}
      				// -----------------------------------------------------




      				// upgrades count per month --------------------------
      				if($key['tsdateofpurchase'] >= $_startMonthTS && $key['tsdateofpurchase'] <= $_endMonthTS && $key['promoid'] == $PromoID){
      					$PerformanceArray['upgrades_ThisMonth']++;	
      					
      					$PerformanceArray['upgrades_price_ThisMonth'] = $PerformanceArray['upgrades_price_ThisMonth'] + $key['price'];
      					
      					$_PayoutSpecifics = $this->GetPromoPayoutRate($PromoID, 'upgrade');

      					if($_PayoutSpecifics['type'] == 'percentage'){
      						$PerformanceArray['upgrades_earnings_ThisMonth'] = $PerformanceArray['upgrades_earnings_ThisMonth'] + $this->ComputePromoPayout($_PayoutSpecifics, $key['price']);
      					}elseif($_PayoutSpecifics['type'] == 'flatrate'){
      						$PerformanceArray['upgrades_earnings_ThisMonth'] += $this->ComputePromoPayout($_PayoutSpecifics, 1);
      					}
      				}
      				// -----------------------------------------------------





      				// upgrades count all time total ---------------------
      				if($key['tsdateofpurchase'] && $key['promoid'] == $PromoID){
      					$PerformanceArray['upgrades_alltimetotal']++;	
      					
      					$PerformanceArray['upgrades_price_alltimetotal'] = $PerformanceArray['upgrades_price_alltimetotal'] + $key['price'];
      					
      					$_PayoutSpecifics = $this->GetPromoPayoutRate($PromoID, 'upgrade');

      					if($_PayoutSpecifics['type'] == 'percentage'){
      						$PerformanceArray['upgrades_earnings_alltimetotal'] = $PerformanceArray['upgrades_earnings_alltimetotal'] + $this->ComputePromoPayout($_PayoutSpecifics, $key['price']);
      					}elseif($_PayoutSpecifics['type'] == 'flatrate'){
      						$PerformanceArray['upgrades_earnings_alltimetotal'] += $this->ComputePromoPayout($_PayoutSpecifics, 1);
      					}
      				}
      				// -----------------------------------------------------



      			}
        		// -------------------------------------------
      		} // END num_rows check 
    
    
      		// destroy database connection object --------
      		$obj_db->Close();
      		unset($obj_db);
      		// -------------------------------------------
    
        }
        // ===========================================



			break;
			// -------------------------------------------------------------











			// Chart A Performance -----------------------------------------
			case 'chart_A':


    		// database connection -----------------------
    		$obj_db					= new db;
    		$obj_db->Connect(1); //read operation
    		// -------------------------------------------



 				$_month = date('n',time());
 				$_year	= date('Y',time());
 				
 				$TotalDays_in_Month = cal_days_in_month(CAL_GREGORIAN, $_month, $_year);




    		// get Impressions & Clicks via eGenHQ DB ====
        foreach($PromoID_DECRYPTED as $key){
    
        	$PromoID = $key['promoid'];
    
    
        	// Retrieve Data -----------------------------
      		$sql_query	= mysql_query("SELECT * FROM user_promos_actions WHERE user_promos_actions.promoid = '$PromoID'");
      		$num_rows		=	mysql_num_rows($sql_query);
      		// -------------------------------------------
    
    			if($num_rows){
        		// populate result array --------------------
        		$counter = 0;
        		while($sql_array_result	=	mysql_fetch_assoc($sql_query) ){
        			$ResultArray[$counter] = $sql_array_result;
        			$counter++;
        		}
        		// -------------------------------------------


     				for($_day = 1; $_day <= $TotalDays_in_Month; $_day++){
            	$_startDayTS 	= mktime(0, 0, 0, $_month, $_day, $_year);
            	$_endDayTS 		= mktime(23, 59, 59, $_month, $_day, $_year);
    					
    					$_startYDayTS	= (mktime(0, 0, 0, $_month, $_day, $_year) - 86400);
    					$_endYDayTS 	= (mktime(23, 59, 59, $_month, $_day, $_year) - 86400);            	
            	
    

      			// iterate array -----------------------------
      			foreach($ResultArray as $key){
      				switch($key['action']){
      
      					case 'impression':
      						
      						// impression count per last 24 hours ----
      						if($key['ts'] > $_startDayTS && $key['ts'] < $_endDayTS && $key['promoid'] == $PromoID){
      							if($_day != 0){
      								$PerformanceArray[$_day]['impressions']++;	
      							}
      						}
      						// ---------------------------------------

      						// impression count per last 24 hours ----
      						if($key['ts'] > $_startYDayTS && $key['ts'] < $_endYDayTS && $key['promoid'] == $PromoID){
      							if($_day != 0){
      								$PerformanceArray[$_day]['impressions_y']++;	
      							}
      						}
      						// ---------------------------------------


      					break;
      
      					case 'click':

      						// impression count per last 24 hours ----
      						if($key['ts'] >= $_startDayTS && $key['ts'] <= $_endDayTS && $key['promoid'] == $PromoID){
      							if($_day != 0){
      								$PerformanceArray[$_day]['clicks']++;	
      							}
      						}
      						// ---------------------------------------

      						// impression count per last 24 hours ----
      						if($key['ts'] >= $_startYDayTS && $key['ts'] <= $_endYDayTS && $key['promoid'] == $PromoID){
      							if($_day != 0){
      								$PerformanceArray[$_day]['clicks_y']++;	
      							}
      						}
      						// ---------------------------------------

      					break;
      				}
      			}
        		// -------------------------------------------
     				} // END for
      		} // END num_rows check 
        }
        // ===========================================
    
    
    		// destroy database connection object --------
    		$obj_db->Close();
    		unset($obj_db);
    		// -------------------------------------------
    
    
    





    		// get Sign-Ups via Property DB ==============
        foreach($PromoID_DECRYPTED as $key){
    
        	$PromoID 		= $key['promoid'];
        	$PropertyID = $key['propertyid'];
    
    
      		// database connection -----------------------
      		$obj_db					= new db;
      		$obj_db->Connect(1, $PropertyID); //read operation
      		// -------------------------------------------
    
        	// Retrieve Data -----------------------------
      		$sql_query	= mysql_query("SELECT * FROM user WHERE user.promoid = '$PromoID'");
      		$num_rows		=	@mysql_num_rows($sql_query);
      		// -------------------------------------------
    
    			if($num_rows){
        		// populate result array --------------------
        		$counter = 0;
        		while($sql_array_result	=	@mysql_fetch_assoc($sql_query) ){
        			$ResultArray[$counter] = $sql_array_result;
        			$counter++;
        		}
        		// -------------------------------------------


     				for($_day = 1; $_day <= $TotalDays_in_Month; $_day++){
            	$_startDayTS 	= mktime(0, 0, 0, $_month, $_day, $_year);
            	$_endDayTS 		= mktime(23, 59, 59, $_month, $_day, $_year);

    					$_startYDayTS	= (mktime(0, 0, 0, $_month, $_day, $_year) - 86400);
    					$_endYDayTS 	= (mktime(23, 59, 59, $_month, $_day, $_year) - 86400);


        			// iterate array -----------------------------
        			foreach($ResultArray as $key){
      
        				// signup count per last 24 hours ----------
        				if($key['ts_signup'] >= $_startDayTS && $key['ts_signup'] <= $_endDayTS && $key['promoid'] == $PromoID){
     							if($_day != 0){
     								$PerformanceArray[$_day]['signups']++;
     							}
        				}
        				// -----------------------------------------

        				// signup for yesterday --------------------
        				if($key['ts_signup'] >= $_startYDayTS && $key['ts_signup'] <= $_endYDayTS && $key['promoid'] == $PromoID){
     							if($_day != 0){
     								$PerformanceArray[$_day]['signups_y']++;
     							}
        				}
        				// -----------------------------------------

        			}
          		// -------------------------------------------
    				} // END for
      		} // END num_rows check 

    
      		// destroy database connection object --------
      		$obj_db->Close();
      		unset($obj_db);
      		// -------------------------------------------
    
        }
        // ===========================================
    
    
    
    
    
    
    
    
    		// get Upgrades via Property DB ==============
        foreach($PromoID_DECRYPTED as $key){
    
        	$PromoID 		= $key['promoid'];
        	$PropertyID = $key['propertyid'];
    
    
      		// database connection -----------------------
      		$obj_db					= new db;
      		$obj_db->Connect(1, $PropertyID); //read operation
      		// -------------------------------------------
    
        	// Retrieve Data -----------------------------
      		$sql_query	= mysql_query("SELECT * FROM user_upgrade WHERE user_upgrade.promoid = '$PromoID' AND user_upgrade.price > 0");
      		$num_rows		=	@mysql_num_rows($sql_query);
      		// -------------------------------------------
    
    			if($num_rows){
        		// populate result array --------------------
        		$counter = 0;
        		while($sql_array_result	=	@mysql_fetch_assoc($sql_query) ){
        			$ResultArray[$counter] = $sql_array_result;
        			$counter++;
        		}
        		// -------------------------------------------


     				for($_day = 1; $_day <= $TotalDays_in_Month; $_day++){
            	$_startDayTS 	= mktime(0, 0, 0, $_month, $_day, $_year);
            	$_endDayTS 		= mktime(23, 59, 59, $_month, $_day, $_year);

    					$_startYDayTS	= (mktime(0, 0, 0, $_month, $_day, $_year) - 86400);
    					$_endYDayTS 	= (mktime(23, 59, 59, $_month, $_day, $_year) - 86400);

        			// iterate array -----------------------------
        			foreach($ResultArray as $key){
        
        				// upgrade count per last 24 hours ---------
        				if($key['tsdateofpurchase'] >= $_startDayTS && $key['tsdateofpurchase'] <= $_endDayTS && $key['promoid'] == $PromoID){
									if($_day != 0){
     								$PerformanceArray[$_day]['upgrades']++;	
     							}
        				}
        				// -----------------------------------------

        				// upgrade for yesterday -------------------
        				if($key['tsdateofpurchase'] >= $_startYDayTS && $key['tsdateofpurchase'] <= $_endYDayTS && $key['promoid'] == $PromoID){
									if($_day != 0){
     								$PerformanceArray[$_day]['upgrades_y']++;	
     							}
        				}
        				// -----------------------------------------


        			}
          		// -------------------------------------------
        		}
      		} // END num_rows check 
    
    
      		// destroy database connection object --------
      		$obj_db->Close();
      		unset($obj_db);
      		// -------------------------------------------
    
        }
        // ===========================================





			break;
			// -------------------------------------------------------------			
			
			
		}


	return $PerformanceArray;
	}
	// =================================================================













	// =================================================================
	public function Report_UserSessionActions($Dataset, $Title, $DataType = 'HTML', $Range = null){

		$_return									= false;
		$num_rows									= false;



		// catch NO DATA -------------------
		if($Dataset == 'no data'){
			echo '<center><font color="red" size=3><b>NO DATA AND/OR INVALID RANGE</b></font><br><br><font color="#00ff00" size=3><b>CHANGE RANGE TO REQUERY DATASOURCE</b></font></center>';
			die();
		}
		// ---------------------------------


		// populate fields of dataset ------
		foreach($Dataset as $_Array){
			foreach($_Array as $_field_2 => $_value_2){
				$_Array_FIELDS[] = $_field_2;
			}
		}
		// ---------------------------------


		// get only unique fields ----------
		$_Array_FIELDS 	= array_unique($_Array_FIELDS);

//print_r($_Array_FIELDS)
//die();


		// field count ---------------------
   	$_FieldCount 			= count($_Array_FIELDS);


		// record count --------------------
   	$_RecordCount			= count($Dataset);
		



//echo $_GET['_range'];
//die();
/*
		// specific time range -------------
		if($Range != null && $Range != 0){
			$Range = explode('.',$_GET['_range']);

    	$_day 	= date('d',$Range[0]);
    	$_month = date('m',$Range[0]);
    	$_year 	= date('Y',$Range[0]);

		// current month -------------------
		}else{
    	$_day 	= date('d',time());
    	$_month = date('m',time());
    	$_year 	= date('Y',time());			
		}

		// today -----------------
    $_startDayTS 	= mktime(0, 0, 0, $_month, $_day, $_year);
    $_endDayTS 		= mktime(23, 59, 59, $_month, $_day, $_year);


		// yesterday -------------
    $_startYDayTS	= (mktime(0, 0, 0, $_month, $_day, $_year) - 86400);
    $_endYDayTS 	= (mktime(23, 59, 59, $_month, $_day, $_year) - 86400);

		// start & end of month --
		$_startMonthTS 	= mktime(0, 0, 0, $_month, 1, $_year);
		$_endMonthTS 		= mktime(23, 59, 59, $_month, date('t',time()), $_year);



		$PerformanceArray[]				= 0;
		$_30DaysAgo								= time() - (86400 * 30);
		$_1DayAgo									= time() - 86400;
*/



		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start 						= $_exploded_range_start[0];
    $_day_Start 							= $_exploded_range_start[1];
    $_year_Start 							= $_exploded_range_start[2];
    $_TS_RANGE_START					= @mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
    $_TS_RANGE_START_DAY_END	=	@mktime(23, 59, 59, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------


  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End 							= $_exploded_range_end[0];
    $_day_End 								= $_exploded_range_end[1];
    $_year_End 								= $_exploded_range_end[2];
    //$_TS_RANGE_END						= mktime(0, 0, 0, $_month_End, $_day_End, $_year_End);
    $_TS_RANGE_END						= @mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
    //$_TS_RANGE_DAY_END				= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------
		
		// number of days within range -----
		$_NumDays									=	round((($_TS_RANGE_END - $_TS_RANGE_START) / 86400));


		$_30DaysAgo								= time() - (86400 * 30);
		$_1DayAgo									= time() - 86400;



		switch($DataType){

			case 'XML':


						$_TS_RANGE_START_ARRAY 	= $_TS_RANGE_START;
						$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_DAY_END;

					

							

//echo $_key['action'];
  					// "processing form" per 24HRS -----------------
  					//if($_key['ts'] >= $_TS_RANGE_START && $_key['ts'] <= $_TS_RANGE_START_DAY_END && $_key['action'] == 'processing form'){
//echo '('.$_NumDays.') ';


$_TS_RANGE_START_INC = $_TS_RANGE_START;
for($_forCount = 1; $_forCount <= $_NumDays; $_forCount++){
	$_Array_Days_TS[] = $_TS_RANGE_START_INC;

	$_TS_RANGE_START_INC = $_TS_RANGE_START_INC + 86400;
}
//echo 'START: '.$_TS_RANGE_START.'/n';
//print_r($_Array_Days_TS);
//echo 'END: '.$_TS_RANGE_END.'/n';


foreach($_Array_Days_TS as $_DayTS){
	//echo $_DayTS.' ';
	foreach($Dataset as $_record){
		//echo $_DayTS.'>='.$_record['ts'].'   ';
		//echo $_key['ts'].'/n';
  	
  	// activity report views ---------------------
  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && $_record['action'] == 'activity report'){
  		$Array_ActivityReport[$_DayTS]++;
  	}

		// processing form
  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && $_record['action'] == 'processing form'){
  		$Array_ProcessingForm[$_DayTS]++;
  	}

  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && strtolower($_record['action']) == 'booking trans'){
  		$Array_MODULE_Transaction[$_DayTS]++;
  	}

  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && strtolower($_record['action']) == 'new user'){
  		$Array_MODULE_Resource_NEWUSER[$_DayTS]++;
  	}


	}
}




//print_r($Array_ActivityReport);
//print_r($Array_ProcessingForm);
//print_r($Array_MODULE_Transaction);
//die();



						//$_WhileCount = 0;
						//while($_WhileCount <= $_NumDays){

/*
							foreach($Dataset as $_key){

								for($_forCount = 0; $_forCount <= $_NumDays; $_forCount++){

  								if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'processing form'){
  									$PerformanceArray[$_TS_RANGE_START_ARRAY]['processing_form']++;
  								}

  					//if($_key['action'] == 'activity report'){
  								if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'activity report'){
	  								$PerformanceArray[$_TS_RANGE_START_ARRAY]['activity_report']++;
  								}

									$_TS_RANGE_START_ARRAY	= $_TS_RANGE_START_ARRAY + 86400;
									$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_ARRAYE + 86400;

								}



						
							$_WhileCount++;

						
						//}


						}
*/



/*
  					//if($_key['action'] == 'processing form'){
  					if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'processing form'){
  						$PerformanceArray[$_TS_RANGE_START_ARRAY]['form_process']++;
  					}

  					//if($_key['action'] == 'activity report'){
  					if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'activity report'){
  						$PerformanceArray[$_TS_RANGE_START_ARRAY]['activity_report']++;
  					}
*/
						//$_TS_RANGE_START_ARRAY	= $_TS_RANGE_START_ARRAY + 86400;
						//$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_ARRAYE + 86400;
						
						//echo $_TS_RANGE_START_ARRAYE.' ';

					//}



				// XML DATATYPE ------------------------------------------------------------------
					//echo "<chart caption='User Action Report Trend' subcaption='RECORDS: ".$_RecordCount." - UPDATED: ".date('h:m:s',time())." - DAY RANGE: ".$_NumDays." Aug 2010' bgcolor='000000' bgAlpha='00' canvasBgAlpha='20' canvasBgColor='000000' baseFontSize='15' baseFontColor='ffffff' captioncolor='ff0000' hoverCapBgColor='ff0000' divlinecolor='F47E00' numdivlines='10' showAreaBorder='1' animation='0' areaBorderColor='000000' numberPrefix='' showNames='1' numVDivLines='5' vDivLineAlpha='30' formatNumberScale='1' rotateNames='1' decimalPrecision='0'>";
					echo "<chart caption='User Action Report Trend' subcaption='RECORDS: ".$_RecordCount." - UPDATED: ".date('h:m:s',time())." - DAY RANGE: ".$_NumDays." Aug 2010' bgColor='000000' bgAlpha='0' canvasBgAlpha='20' canvasBgColor='000000' outCnvBaseFontColor='666666' caption='' captioncolor='ff0000' hoverCapBgColor='ff0000' xAxisName='Date' yAxisName='Number of Events' numberPrefix='' animation='0' showNames='1' showValues='0' plotFillAlpha='60' numVDivLines='10' showAlternateVGridColor='1' AlternateVGridColor='000000' divLineColor='000000' vdivLineColor='000000' baseFontSize='12' baseFontColor='ffffff' rotateLabels='1' canvasBorderThickness='2' showPlotBorder='1' plotBorderThickness='1'>";
					echo "<categories>";

/*
					foreach($Dataset as $key){
						echo "<category name='".date('d',$key['ts'])."' />";
					}
*/					


					//for($_forCounter = 0; $_forCounter <= $_RecordCount; $_forCounter++){
					$_DayGRAPH 				= 1;
					$_TS_RANGE_STARTG	= $_TS_RANGE_START;
					while($_DayGRAPH <= $_NumDays){
						//echo "<category name='".date('m/d', $_TS_RANGE_STARTG).":".$_TS_RANGE_STARTG."' />";
						echo "<category label='".date('m/d', $_TS_RANGE_STARTG)."' />";
						$_DayGRAPH++;
						$_TS_RANGE_STARTG = $_TS_RANGE_STARTG + 86400;
					}
					echo "</categories>";
// END range =======================================================================================




					// activity report data series -----------------------------
					if(count($Array_ActivityReport) > 0){

  					echo "<dataset seriesname='Activity Report' color='FF5904' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='0' areaBorderColor='FF0000'>";
  
  					$_GRAPH_X_DAY_LABEL			= 1;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){

	  					if($Array_ActivityReport[$_TS_RANGE_START_INCREM]){
	  						echo "<set value='".$Array_ActivityReport[$_TS_RANGE_START_INCREM]."' />";
	  					}else{
	  						echo "<set value='0' />";
	  					}

  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------




					// processing form report data series ----------------------
					if(count($Array_ProcessingForm) > 0){

  					echo "<dataset seriesname='Processing Form' color='47bcff' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='0' areaBorderColor='006600'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){

	  					if($Array_ProcessingForm[$_TS_RANGE_START_INCREM]){
	  						echo "<set value='".$Array_ProcessingForm[$_TS_RANGE_START_INCREM]."' />";
	  					}else{
	  						echo "<set value='0' />";
	  					}

  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------



					// MODULE - Transaction - report data series ---------------
					if(count($Array_MODULE_Transaction) > 0){

  					echo "<dataset seriesname='Booking Transaction' color='46fd46' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='0' areaBorderColor='ff0000'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){

	  					if($Array_MODULE_Transaction[$_TS_RANGE_START_INCREM]){
	  						echo "<set value='".$Array_MODULE_Transaction[$_TS_RANGE_START_INCREM]."' />";
	  					}else{
	  						echo "<set value='0' />";
	  					}

  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------



					// MODULE - RESOURCE | NEW USER - report data series -------
					if(count($Array_MODULE_Transaction) > 0){

  					echo "<dataset seriesname='User Creation' color='ffea00' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='0' areaBorderColor='ff0000'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){

	  					if($Array_MODULE_Resource_NEWUSER[$_TS_RANGE_START_INCREM]){
	  						echo "<set value='".$Array_MODULE_Resource_NEWUSER[$_TS_RANGE_START_INCREM]."' />";
	  					}else{
	  						echo "<set value='0' />";
	  					}

  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------


					echo "</chart>";
			break;











			case 'HTML':
				// HTML DATATYPE -----------------------------------------------------------------

          	?>
          <!-- SM JS lib -->
          	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.REPORTS.uncompressed.js"></script>'; ?>
          <!-- END SM JS lib -->


          
          	<!-- spreadsheet -->
            <div id="spreadsheet_container" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; height: auto; width: 958px; padding-bottom: 5px;">
          
          		<!-- Promolist -->
          		<div id="pBuilder_editTools" style="position: relative; top: 0px; right: 0px; border: 0px solid #ff0; width: 100%; height: auto;">
          
          			<div id="spreadsheet_title" style="position: relative; z-index: 5; top: 2px; left: 2px; border: solid 0px #ffffff; width: 100%; height: 20px; font-size: 18px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
          				<? 
          					// report title --------------
          					echo $Title;
          					
          					// record total --------------
          					echo '&nbsp;&nbsp;&nbsp; <font color="#dc8c57">Total Records: '.$_RecordCount.'</font>';
          				?>
          			</div>
          
          			<!-- list holder -->
          			<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; width: 100%; height: auto;">


          				<!-- spreadsheet data -->
          				<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 5px; left: 0px; border: dashed 1px #767676; width: 100%; height: auto; overflow: auto;">
          
           					<table cellpadding="2" cellspacing="2" border="0" width="100%" style="background-color: #000;">
                     	<!-- data set -->
          
           						<tr>
                     	<!-- fields -->
                     	<?
                     		foreach($_Array_FIELDS as $_FieldName){
                     			?> 
                     			<td style="color: #fff;">
                     				<label style="color: #fff; cursor: pointer;" >
                     					<a <? echo 'onclick="SM_Report_Update(\'form_activity\', \'user_session_activity.report\', \''.$_FieldName.':asc\');"'; ?>>&uarr;</a>
                     					<a <? echo 'onclick="SM_Report_Update(\'form_activity\', \'user_session_activity.report\', \''.$_FieldName.':desc\');"'; ?>>&darr;</a>
                     				</label>
                     					<? echo ucwords($this->FieldName_to_HumanReadable($_FieldName)); ?>
                     			</td>
                     			<?
                     		}
          						?>
          						<!-- END fields -->
          					 </tr>
          
          						<?						
                     		if(count($Dataset) > 0){
                     	?>
          							<tr>
                     				<?
                             	$i=0;
                               foreach($Dataset as $key){
          
                               	if($_Level == 'extended'){
                               			$_Level = '<font color="#faac05">'.$_PromoName.'</font>';
                             		}else{
                             			$_Level 	= '<i>Default</i>';
                             		}
          
                     						if($i%2==0){
                     							$fgbg = '#1e4972';
                     						}else{
                     							$fgbg = '#14304b';
                     						}
          
          											// check for anonymous user ----------
                     						if($key['userid'] == 999999999){
                     							$_UserName = 'Anonymous';
                     						}else{
                     							$_UserDetails = $this->GetMemberProfile($key['userid']);
                     							$_UserName		=	$_UserDetails->first_name.' '.$_UserDetails->last_name;           							
                     						}
                     						// -----------------------------------
                    						
          
                           			?>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['id']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $_UserName; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['action']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['subaction']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo date('d-m-Y g:i.s A',$key['ts']); ?></font></td>
                    						</tr>
                        				<?
                            		$i++;
                     					}
                 				}
                     	?>
                     	<!-- END dataset -->
          				</table>
           				</div>
           				<!-- END spreadsheet data -->
          
          
          			</div>
          			<!-- END list holder -->
          
          
          		</div>
          		<!-- END Promolist -->
            	
            </div>
          	<!-- END spreadsheet -->
          	<?


				// END HTML DATATYPE -------------------------------------------------------------
			break;




			case 'PDF':
				// PDF DATATYPE ------------------------------------------------------------------





$_HTML = '<table cellpadding="2" cellspacing="2" border="0" style="background-color: #000; width: 100%; height: 25px;">';
$_HTML .= '<tr>';
$_HTML .= '<td valign="middle" style="color: #a3f59b; font-size: 30px; font-weight: bold; text-decoration: none; font-family: helvetica; background-color: #333333;">&nbsp;'.$Title.' - '.count($Dataset).'</td>';
$_HTML .= '<td align="right" style="color: #000000; font-size: 30px; text-decoration: none; font-family: helvetica; background-color: #333333;"><img src="common/img/logo/unlimicore-logo-pdf-corner.jpg"/></td>';
$_HTML .= '</tr>';
$_HTML .= '</table>';



$_HTML .= '<table cellpadding="2" cellspacing="2" border="0" width="100%" style="background-color: #000000;">';
$_HTML .= '<tr>';
                     		foreach($_Array_FIELDS as $_FieldName){
$_HTML .= '        			<td style="color: #ffffff; font-size: 16px; text-decoration: none; font-family: helvetica;">
                     					'.ucwords($this->FieldName_to_HumanReadable($_FieldName)).'
                     		</td>';
                     		}
$_HTML .= '</tr>';




                     		if(count($Dataset) > 0){



                             	$i=0;
                               foreach($Dataset as $key){
          
                               	if($_Level == 'extended'){
                               			$_Level = '<font style="color: #faac05; font-size: 12px; text-decoration: none; font-family: helvetica;">'.$_PromoName.'</font>';
                             		}else{
                             			$_Level 	= '<i>Default</i>';
                             		}
          
                     						if($i%2==0){
                     							$fgbg = '#dddddd';
                     						}else{
                     							$fgbg = '#ffffff';
                     						}
          
          											// check for anonymous user ----------
                     						if($key['userid'] == 999999999){
                     							$_UserName = 'Anonymous';
                     						}else{
                     							$_UserDetails = $this->GetMemberProfile($key['userid']);
                     							$_UserName		=	$_UserDetails->first_name.' '.$_UserDetails->last_name;           							
                     						}
                     						// -----------------------------------
                    						

$_HTML .= '<tr>';
$_HTML .= '<td bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.$key['id'].'</font></td>';
$_HTML .= '<td bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.$_UserName.'</font></td>';
$_HTML .= '<td bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.$key['action'].'</font></td>';
$_HTML .= '<td bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.$key['subaction'].'</font></td>';
$_HTML .= '<td bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.date('d-m-Y g:i.s A',$key['ts']).'</font></td>';
$_HTML .= '</tr>';

                            		$i++;
                     					}
                 				}


//$_HTML .= '</tr>';





$_HTML .= 	'</table>';




return $_HTML;


				// END PDF DATATYPE -------------------------------------------------------------
			break;



		}




	 return $_return;	
	}
	// =================================================================































	// =================================================================
	public function Report_ClientCampaigns($Dataset, $Title, $DataType = 'HTML', $Range = null){



		$_return									= false;
		$num_rows									= false;



		// catch NO DATA -------------------
		if($Dataset == 'no data'){
			echo '<center><font color="red" size=3><b>NO DATA AND/OR INVALID RANGE</b></font><br><br><font color="#00ff00" size=3><b>CHANGE RANGE TO REQUERY DATASOURCE</b></font></center>';
			die();
		}
		// ---------------------------------


		// populate fields of dataset ------
		foreach($Dataset as $_Array){
			foreach($_Array as $_field_2 => $_value_2){
				$_Array_FIELDS[] = $_field_2;
			}
		}
		// ---------------------------------


		// get only unique fields ----------
		//$_Array_FIELDS 	= array_unique($_Array_FIELDS);

//print_r($_Array_FIELDS);
//die();


		// field count ---------------------
   	$_FieldCount 			= count($_Array_FIELDS);


		// record count --------------------
   	$_RecordCount			= count($Dataset);
		


//echo $_GET['_range'];
//die();
/*
		// specific time range -------------
		if($Range != null && $Range != 0){
			$Range = explode('.',$_GET['_range']);

    	$_day 	= date('d',$Range[0]);
    	$_month = date('m',$Range[0]);
    	$_year 	= date('Y',$Range[0]);

		// current month -------------------
		}else{
    	$_day 	= date('d',time());
    	$_month = date('m',time());
    	$_year 	= date('Y',time());			
		}

		// today -----------------
    $_startDayTS 	= mktime(0, 0, 0, $_month, $_day, $_year);
    $_endDayTS 		= mktime(23, 59, 59, $_month, $_day, $_year);


		// yesterday -------------
    $_startYDayTS	= (mktime(0, 0, 0, $_month, $_day, $_year) - 86400);
    $_endYDayTS 	= (mktime(23, 59, 59, $_month, $_day, $_year) - 86400);

		// start & end of month --
		$_startMonthTS 	= mktime(0, 0, 0, $_month, 1, $_year);
		$_endMonthTS 		= mktime(23, 59, 59, $_month, date('t',time()), $_year);



		$PerformanceArray[]				= 0;
		$_30DaysAgo								= time() - (86400 * 30);
		$_1DayAgo									= time() - 86400;
*/



		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start 						= $_exploded_range_start[0];
    $_day_Start 							= $_exploded_range_start[1];
    $_year_Start 							= $_exploded_range_start[2];
    $_TS_RANGE_START					= @mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
    $_TS_RANGE_START_DAY_END	=	@mktime(23, 59, 59, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------


  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End 							= $_exploded_range_end[0];
    $_day_End 								= $_exploded_range_end[1];
    $_year_End 								= $_exploded_range_end[2];
    //$_TS_RANGE_END						= mktime(0, 0, 0, $_month_End, $_day_End, $_year_End);
    $_TS_RANGE_END						= @mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
    //$_TS_RANGE_DAY_END				= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------
		
		// number of days within range -----
		$_NumDays									=	round((($_TS_RANGE_END - $_TS_RANGE_START) / 86400));


		$_30DaysAgo								= time() - (86400 * 30);
		$_1DayAgo									= time() - 86400;



		switch($DataType){

			case 'XML':


						$_TS_RANGE_START_ARRAY 	= $_TS_RANGE_START;
						$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_DAY_END;

					

							

//echo $_key['action'];
  					// "processing form" per 24HRS -----------------
  					//if($_key['ts'] >= $_TS_RANGE_START && $_key['ts'] <= $_TS_RANGE_START_DAY_END && $_key['action'] == 'processing form'){
//echo '('.$_NumDays.') ';


$_TS_RANGE_START_INC = $_TS_RANGE_START;
for($_forCount = 1; $_forCount <= $_NumDays; $_forCount++){
	$_Array_Days_TS[] = $_TS_RANGE_START_INC;

	$_TS_RANGE_START_INC = $_TS_RANGE_START_INC + 86400;
}
//echo 'START: '.$_TS_RANGE_START.'/n';
//print_r($_Array_Days_TS);
//echo 'END: '.$_TS_RANGE_END.'/n';


foreach($_Array_Days_TS as $_DayTS){
	//echo $_DayTS.' ';
	foreach($Dataset as $_record){
		//echo $_DayTS.'>='.$_record['ts'].'   ';
		//echo $_key['ts'].'/n';
  	
  	// activity report views ---------------------
  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && $_record['action'] == 'activity report'){
  		$Array_ActivityReport[$_DayTS]++;
  	}

	}
}






				// XML DATATYPE ------------------------------------------------------------------
					//echo "<chart caption='User Action Report Trend' subcaption='RECORDS: ".$_RecordCount." - UPDATED: ".date('h:m:s',time())." - DAY RANGE: ".$_NumDays." Aug 2010' bgcolor='000000' bgAlpha='00' canvasBgAlpha='20' canvasBgColor='000000' baseFontSize='15' baseFontColor='ffffff' captioncolor='ff0000' hoverCapBgColor='ff0000' divlinecolor='F47E00' numdivlines='10' showAreaBorder='1' animation='0' areaBorderColor='000000' numberPrefix='' showNames='1' numVDivLines='5' vDivLineAlpha='30' formatNumberScale='1' rotateNames='1' decimalPrecision='0'>";
					//echo "<chart caption='User Action Report Trend' subcaption='RECORDS: ".$_RecordCount." - UPDATED: ".date('h:m:s',time())." - DAY RANGE: ".$_NumDays." Aug 2010' bgColor='000000' bgAlpha='0' canvasBgAlpha='20' canvasBgColor='000000' outCnvBaseFontColor='666666' caption='' captioncolor='ff0000' hoverCapBgColor='ff0000' xAxisName='Date' yAxisName='Number of Events' numberPrefix='' animation='0' showNames='1' showValues='0' plotFillAlpha='60' numVDivLines='10' showAlternateVGridColor='1' AlternateVGridColor='000000' divLineColor='000000' vdivLineColor='000000' baseFontSize='12' baseFontColor='ffffff' rotateLabels='1' canvasBorderThickness='2' showPlotBorder='1' plotBorderThickness='1'>";
					echo "<chart caption='2010 Campaigns' showTaskNames='1' bgColor='000000' bgAlpha='0' canvasBgAlpha='20' canvasBgColor='000000' outCnvBaseFontColor='666666' dateFormat='dd/mm/yyyy' hoverCapBgColor='FFFFFF' hoverCapBorderColor='333333' ganttLineColor='ff0000' ganttLineAlpha='20' baseFontColor='ffffff' baseFontSize='14' gridBorderColor='000000' taskBarRoundRadius='1' showShadow='0'>";
					
 


echo "
	<categories bgColor='333333' fontColor='daff6a' isBold='1' fontSize='16' >
		<category start='1/1/2010' end='31/12/2010' name='2010' />
	</categories>

	<categories  bgColor='99cc00' bgAlpha='40' fontColor='daff6a' align='center' fontSize='12' isBold='1'>
		<category start='1/1/2010' end='31/1/2010' name='Jan' />
		<category start='1/1/2010' end='28/2/2010' name='Feb' />
		<category start='1/1/2010' end='31/3/2010' name='Mar' />
		<category start='1/1/2010' end='30/4/2010' name='Apr'  />
		<category start='1/1/2010' end='31/5/2010' name='May' />
		<category start='1/1/2010' end='30/6/2010' name='Jun' />
		<category start='1/1/2010' end='31/7/2010' name='Jul' />
		<category start='1/1/2010' end='31/8/2010' name='Aug' />
		<category start='1/1/2010' end='31/9/2010' name='Sep' />
		<category start='1/1/2010' end='31/10/2010' name='Oct' />
		<category start='1/1/2010' end='31/11/2010' name='Nov' />
		<category start='1/1/2010' end='31/12/2010' name='Dec' />
		
	</categories>
";



//on sale date
						echo "<processes positionInGrid='right' align='center' headerText=' On Sale Date ' fontColor='c5c5c5' fontSize='11' isBold='1' isAnimated='1' bgColor='000000' headerbgColor='000000' headerFontColor='99CC00' headerFontSize='16' bgAlpha='40'>";

					foreach($Dataset as $key){
						echo "<process name='".date('m/d',$key['ts_on_sale'])."-".ucwords($this->MediumID_to_MediumTiming($key['medium_id']))."' id='".$key['id']."' />";
					}
						echo "</processes>";


// publication
						echo "
						<dataTable showProcessName='1' fontColor='ffffff' fontSize='11' isBold='1' headerFontColor='ffffff' headerFontSize='11'>
						<dataColumn headerbgColor='000000' width='150' headerfontSize='16' headerAlign='left' headerfontcolor='99cc00'  bgColor='000000' headerText=' Publication ' align='left' bgAlpha='65'>
						";
					
					$__textLabelIDCounter	=	1;
					foreach($Dataset as $key){
						echo "<text label='".$this->VendorID_to_VendorName($key['publication_id'])."' />";
						$__textLabelIDCounter++;
					}
						echo "</dataColumn></dataTable>";







// time coverage
						echo "<tasks width='10'>";
					
					foreach($Dataset as $key){
						echo "<text label='".$this->VendorID_to_VendorName($key['publication_id'])."' />";
						
						// ad type -----------------
						switch($key['medium_timing_id']){
							
							// daily -------
							case '1':
								echo "<task name='".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' hoverText='".$this->VendorID_to_VendorName($key['publication_id'])."-".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' processId='".$key['id']."' start='".date('m/d/Y',$key['ts_on_sale'])."' end='".date('m/d/Y',$key['ts_on_sale']+86400)."' id='Srvy' color='3fd0ff' alpha='60'/>";
							break;

							// weekly ------
							case '2':
								echo "<task name='".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' hoverText='".$this->VendorID_to_VendorName($key['publication_id'])."-".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' processId='".$key['id']."' start='".date('m/d/Y',$key['ts_on_sale'])."' end='".date('m/d/Y',$key['ts_on_sale']+604800)."' id='Srvy' color='3fd0ff' alpha='60'/>";
							break;

							// bi-weekly ---
							case '3':
								echo "<task name='".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' hoverText='".$this->VendorID_to_VendorName($key['publication_id'])."-".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' processId='".$key['id']."' start='".date('m/d/Y',$key['ts_on_sale'])."' end='".date('m/d/Y',$key['ts_on_sale']+1209600)."' id='Srvy' color='3fd0ff' alpha='60'/>";
							break;

							// bi-monthly --
							case '4':
								echo "<task name='".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' hoverText='".$this->VendorID_to_VendorName($key['publication_id'])."-".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' processId='".$key['id']."' start='".date('m/d/Y',$key['ts_on_sale'])."' end='".date('m/d/Y',$key['ts_on_sale']+2419200)."' id='Srvy' color='3fd0ff' alpha='60'/>";
							break;

							// quarterly ---
							case '5':
								echo "<task name='".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' hoverText='".$this->VendorID_to_VendorName($key['publication_id'])."-".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' processId='".$key['id']."' start='".date('m/d/Y',$key['ts_on_sale'])."' end='".date('m/d/Y',$key['ts_on_sale']+7884000)."' id='Srvy' color='3fd0ff' alpha='60'/>";
							break;

							// yearly ------
							case '6':
								echo "<task name='".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' hoverText='".$this->VendorID_to_VendorName($key['publication_id'])."-".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' processId='".$key['id']."' start='".date('m/d/Y',$key['ts_on_sale'])."' end='".date('m/d/Y',$key['ts_on_sale']+31536000)."' id='Srvy' color='3fd0ff' alpha='60'/>";
							break;

							// 2months -----
							case '7':
								echo "<task name='".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' hoverText='".$this->VendorID_to_VendorName($key['publication_id'])."-".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' processId='".$key['id']."' start='".date('m/d/Y',$key['ts_on_sale'])."' end='".date('m/d/Y',$key['ts_on_sale']+5184000)."' id='Srvy' color='3fd0ff' alpha='60'/>";
							break;

							// start/end date 
							default:
								echo "<task name='".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' hoverText='".$this->VendorID_to_VendorName($key['publication_id'])."-".ucwords($this->MediumID_to_MediumType($key['medium_id']))."' processId='".$key['id']."' start='".date('m/d/Y',$key['ts_on_sale'])."' end='".date('m/d/Y',$key['ts_on_sale']+5184000)."' id='Srvy' color='3fd0ff' alpha='60'/>";
							break;

						}

					}
						echo "</tasks>";




					echo "</chart>";
			break;




			case 'XMLS':
?>
<chart showTaskNames='1' dateFormat='dd/mm/yyyy' hoverCapBgColor='FFFFFF' hoverCapBorderColor='333333' ganttLineColor='99CC00' ganttLineAlpha='20' baseFontColor='333333' gridBorderColor='99CC00' taskBarRoundRadius='4' showShadow='0'>
	
	<categories  bgColor='333333' fontColor='99cc00' isBold='1' fontSize='14' >
		<category start='1/9/2005' end='31/12/2005' name='2005' />
		<category start='1/1/2006' end='31/7/2006' name='2006' />
	</categories>

	<categories  bgColor='99cc00' bgAlpha='40' fontColor='333333' align='center' fontSize='10' isBold='1'>
		<category start='1/9/2005' end='30/9/2005' name='Sep' />
		<category start='1/10/2005' end='31/10/2005' name='Oct' />
		<category start='1/11/2005' end='30/11/2005' name='Nov' />
		<category start='1/12/2005' end='31/12/2005' name='Dec' />
		<category start='1/1/2006' end='31/1/2006' name='Jan' />
		<category start='1/2/2006' end='28/2/2006' name='Feb' />
		<category start='1/3/2006' end='31/3/2006' name='March' />
		<category start='1/4/2006' end='30/4/2006' name='Apr'  />
		<category start='1/5/2006' end='31/5/2006' name='May' />
		<category start='1/6/2006' end='30/6/2006' name='June' />
		<category start='1/7/2006' end='31/7/2006' name='July' />
	</categories>
	
	
	<processes positionInGrid='right' align='center' headerText=' Agent  ' fontColor='333333' fontSize='11' isBold='1' isAnimated='1' bgColor='99cc00' headerbgColor='333333' headerFontColor='99CC00' headerFontSize='16' bgAlpha='40'>
		<process name='0' id='4' />
		<process name='2' id='3' />
		<process name='3' id='2' />
	</processes>

<dataTable showProcessName='1' fontColor='333333' fontSize='11' isBold='1' headerFontColor='000000' headerFontSize='11' >
	<dataColumn headerbgColor='333333' width='150' headerfontSize='16' headerAlign='left' headerfontcolor='99cc00'  bgColor='99cc00' headerText=' Team' align='left' bgAlpha='65'><text label='0' />
		<text label='3' />
		<text label='1' />
	</dataColumn>
</dataTable>
	
<tasks width='10'>
	<text label='0' />
	<task name='0' hoverText='Print Ad' processId='4' start='12/31/1969' end='12/31/1969' id='Srvy' color='99cc00' alpha='60'/>
	<text label='3' /><task name='5' hoverText='Print Ad' processId='3' start='12/31/1969' end='12/31/1969' id='Srvy' color='99cc00' alpha='60'/>
	<text label='1' /><task name='5' hoverText='Print Ad' processId='2' start='08/14/2010' end='09/06/2010' id='Srvy' color='99cc00' alpha='60'/>
</tasks>
	
</chart>











<?

					die();
				// END XML DATATYPE --------------------------------------------------------------
			break;











			case 'HTML':
				// HTML DATATYPE -----------------------------------------------------------------

          	?>
          <!-- SM JS lib -->
          	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.REPORTS.uncompressed.js"></script>'; ?>
          <!-- END SM JS lib -->


          
          	<!-- spreadsheet -->
            <div id="spreadsheet_container" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; height: auto; width: 958px; padding-bottom: 5px;">
          
          		<!-- Promolist -->
          		<div id="pBuilder_editTools" style="position: relative; top: 0px; right: 0px; border: 0px solid #ff0; width: 100%; height: auto;">
          
          			<div id="spreadsheet_title" style="position: relative; z-index: 5; top: 2px; left: 2px; border: solid 0px #ffffff; width: 100%; height: 20px; font-size: 18px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
          				<? 
          					// report title --------------
          					echo $Title;
          					
          					// record total --------------
          					echo '&nbsp;&nbsp;&nbsp; <font color="#dc8c57">Total Records: '.$_RecordCount.'</font>';
          				?>
          			</div>
          
          			<!-- list holder -->
          			<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; width: 100%; height: auto;">


          				<!-- spreadsheet data -->
          				<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 5px; left: 0px; border: dashed 1px #767676; width: 100%; height: auto; overflow: auto;">
          
           					<table cellpadding="2" cellspacing="2" border="0" width="100%" style="background-color: #000;">
                     	<!-- data set -->
          
           						<tr>
                     	<!-- fields -->
                     	<?
                     		foreach($_Array_FIELDS as $_FieldName){
                     			?> 
                     			<td style="color: #fff;">
                     				<label style="color: #fff; cursor: pointer;" >
                     					<a <? echo 'onclick="SM_Report_Update(\'form_activity\', \'user_session_activity.report\', \''.$_FieldName.':asc\');"'; ?>>&uarr;</a>
                     					<a <? echo 'onclick="SM_Report_Update(\'form_activity\', \'user_session_activity.report\', \''.$_FieldName.':desc\');"'; ?>>&darr;</a>
                     				</label>
                     					<? echo ucwords($this->FieldName_to_HumanReadable($_FieldName)); ?>
                     			</td>
                     			<?
                     		}
          						?>
          						<!-- END fields -->
          					 </tr>
          
          						<?						
                     		if(count($Dataset) > 0){
                     	?>
          							<tr>
                     				<?
                             	$i=0;
                               foreach($Dataset as $key){
          
                               	if($_Level == 'extended'){
                               			$_Level = '<font color="#faac05">'.$_PromoName.'</font>';
                             		}else{
                             			$_Level 	= '<i>Default</i>';
                             		}
          
                     						if($i%2==0){
                     							$fgbg = '#1e4972';
                     						}else{
                     							$fgbg = '#14304b';
                     						}
          
          											// check for anonymous user ----------
                     						if($key['userid'] == 999999999){
                     							$_UserName = 'Anonymous';
                     						}else{
                     							$_UserDetails = $this->GetMemberProfile($key['userid']);
                     							$_UserName		=	$_UserDetails->first_name.' '.$_UserDetails->last_name;           							
                     						}
                     						// -----------------------------------
                    						
          
                           			?>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['id']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $_UserName; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['action']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['subaction']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo date('d-m-Y g:i.s A',$key['ts']); ?></font></td>
                    						</tr>
                        				<?
                            		$i++;
                     					}
                 				}
                     	?>
                     	<!-- END dataset -->
          				</table>
           				</div>
           				<!-- END spreadsheet data -->
          
          
          			</div>
          			<!-- END list holder -->
          
          
          		</div>
          		<!-- END Promolist -->
            	
            </div>
          	<!-- END spreadsheet -->
          	<?


				// END HTML DATATYPE -------------------------------------------------------------
			break;
		}




//print_r(array_unique($_Array_FIELDS));
//print_r($__AffiliatesPromos);



	 return $_return;	
	}
	// =================================================================
















	// =================================================================
	public function Spreadsheet_1($Dataset, $Title){

		$__AffiliatesPromos	=	$Dataset;


				foreach($Dataset as $_Array){
					foreach($_Array as $_field_2 => $_value_2){
						$_Array_FIELDS[] = $_field_2;
					}
				}

//print_r(array_unique($_Array_FIELDS));

$_Array_FIELDS = array_unique($_Array_FIELDS)

//print_r($__AffiliatesPromos);



	?>
	<!-- spreadsheet -->
  <div id="spreadsheet_container" style="position: relative; top: 0px; left: 0px; border: solid 1px #ffffff; height: 400px; width: 800px; padding-bottom: -1px; border: 2px solid #f00;">


		<!-- Promolist -->
		<div id="pBuilder_editTools" style="position: relative; top: 0px; right: 0px; border: 1px solid #ff0; width: 100%; height: auto;">


			<div id="spreadsheet_title" style="position: absolute; z-index: 5; top: 2px; left: 2px; border: solid 0px #ffffff; width: 100%; height: 20px; font-size: 18px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
				<? echo $Title; ?>
			</div>

			<!-- list holder -->
			<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 50px; left: 12px; border: solid 0px #ffffff; width: 470px; height: auto;">
<!--
 					<table cellpadding="0" cellspacing="0" border="1" width="100%">
 						<tr>
           	<?
           		foreach($_Array_FIELDS as $_FieleName){
           			 ?> <td><? echo $_FieleName; ?></td> <?
           		}
						?>
					 </tr>
					</table>
-->						



<!--
				<div id="pBuilder_editTools_titles1" style="position: absolute; z-index: 5; top: 0px; left: 0px; border: solid 0px #ffffff; width: 140px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
					Property / Type / Name
				</div>

				<div id="pBuilder_editTools_titles2" style="position: absolute; z-index: 5; top: 0px; left: 135px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
					Impressions
				</div>

				<div id="pBuilder_editTools_titles3" style="position: absolute; z-index: 5; top: 0px; left: 215px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
					Clicks
				</div>

				<div id="pBuilder_editTools_titles4" style="position: absolute; z-index: 5; top: 0px; left: 275px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
					SignUps
				</div>

				<div id="pBuilder_editTools_titles5" style="position: absolute; z-index: 5; top: 0px; left: 330px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
					Upgrades
				</div>

				<div id="pBuilder_editTools_titles6" style="position: absolute; z-index: 5; top: 0px; left: 390px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
					Earnings
				</div>
-->
<?
	$_RowCount = count($_Array_FIELDS);
	//die();
?>



				<!-- spreadsheet data -->
				<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 20px; left: 0px; border: dashed 1px #767676; width: 800px; height: auto; overflow: auto;">

 					<table cellpadding="0" cellspacing="0" border="1" width="100%">
           	<!-- data set -->

 						<tr>
           	<!-- fields -->
           	<?
           		foreach($_Array_FIELDS as $_FieldName){
           			?> <td><font color="white"><? echo $_FieldName; ?></font></td> <?
           		}
						?>
						<!-- END fields -->
					 </tr>

<?						
							$_counter = 1;
           		if(count($__AffiliatesPromos) > 0){
           	?>
							<tr>

           				<?
                   	$i=0;
                     foreach($__AffiliatesPromos as $key){

                     	if($_Level == 'extended'){
                     			$_Level = '<font color="#faac05">'.$_PromoName.'</font>';
                   		}else{
                   			$_Level 	= '<i>Default</i>';
                   		}

           						if($i%2==0){
           							$fgbg = '#1e4972';
           						}else{
           							$fgbg = '#14304b';
           						}

                 			?>
          							<td><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key[$_FieldName]; ?></font></td>
              				<?
                  		$i++;

        	   		if($_counter % $_RowCount == 0){
             			?></tr><?
             		}
           		$_counter++;

           					}
             			?>
							</td>
             	<?
       			}
           	?>



           	<!-- END dataset -->
				</table>
 				</div>
 				<!-- END spreadsheet data -->


			</div>
			<!-- END list holder -->


		</div>
		<!-- END Promolist -->
  	
  </div>
	<!-- END spreadsheet -->
	<?

	 return $_return;	
	}
	// =================================================================













	// =================================================================
	public function Report_HumanCapital($Dataset, $Title, $DataType = 'HTML', $Range = null){

		$_return									= false;
		$num_rows									= false;




		// catch NO DATA -------------------
		if($Dataset == 'no data'){
			echo '<center><font color="red" size=3><b>NO DATA AND/OR INVALID RANGE</b></font><br><br><font color="#00ff00" size=3><b>CHANGE RANGE TO REQUERY DATASOURCE</b></font></center>';
			die();
		}
		// ---------------------------------


		// populate fields of dataset ------
		foreach($Dataset as $_Array){
			foreach($_Array as $_field_2 => $_value_2){
				$_Array_FIELDS[] = $_field_2;
			}
		}
		// ---------------------------------


		// get only unique fields ----------
		$_Array_FIELDS 	= array_unique($_Array_FIELDS);

//print_r($_Array_FIELDS);
//die();


		// field count ---------------------
   	$_FieldCount 			= count($_Array_FIELDS);


		// record count --------------------
   	$_RecordCount			= count($Dataset);
		





		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start 						= $_exploded_range_start[0];
    $_day_Start 							= $_exploded_range_start[1];
    $_year_Start 							= $_exploded_range_start[2];
    $_TS_RANGE_START					= @mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
    $_TS_RANGE_START_DAY_END	=	@mktime(23, 59, 59, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------


  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End 							= $_exploded_range_end[0];
    $_day_End 								= $_exploded_range_end[1];
    $_year_End 								= $_exploded_range_end[2];
    //$_TS_RANGE_END						= mktime(0, 0, 0, $_month_End, $_day_End, $_year_End);
    $_TS_RANGE_END						= @mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
    //$_TS_RANGE_DAY_END				= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------
		
		// number of days within range -----
		$_NumDays									=	round((($_TS_RANGE_END - $_TS_RANGE_START) / 86400));


		$_30DaysAgo								= time() - (86400 * 30);
		$_1DayAgo									= time() - 86400;



		switch($DataType){

			case 'XML':


						$_TS_RANGE_START_ARRAY 	= $_TS_RANGE_START;
						$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_DAY_END;

					

							

//echo $_key['action'];
  					// "processing form" per 24HRS -----------------
  					//if($_key['ts'] >= $_TS_RANGE_START && $_key['ts'] <= $_TS_RANGE_START_DAY_END && $_key['action'] == 'processing form'){
//echo '('.$_NumDays.') ';


$_TS_RANGE_START_INC = $_TS_RANGE_START;
for($_forCount = 1; $_forCount <= $_NumDays; $_forCount++){
	$_Array_Days_TS[] = $_TS_RANGE_START_INC;

	$_TS_RANGE_START_INC = $_TS_RANGE_START_INC + 86400;
}
//echo 'START: '.$_TS_RANGE_START.'/n';
//print_r($_Array_Days_TS);
//echo 'END: '.$_TS_RANGE_END.'/n';


foreach($_Array_Days_TS as $_DayTS){
	//echo $_DayTS.' ';
	foreach($Dataset as $_record){
		//echo $_DayTS.'>='.$_record['ts'].'   ';
		//echo $_key['ts'].'/n';
  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && $_record['action'] == 'activity report'){
  		$Array_ActivityReport[$_DayTS]++;
  	}

  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && $_record['action'] == 'processing form'){
  		$Array_ProcessingForm[$_DayTS]++;
  	}

  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && strtolower($_record['relativedata']) == 'http://sm0002.com/transaction'){
  		$Array_MODULE_Transaction[$_DayTS]++;
  	}

	}
}


//print_r($Array_ActivityReport);

//die();



						//$_WhileCount = 0;
						//while($_WhileCount <= $_NumDays){

/*
							foreach($Dataset as $_key){

								for($_forCount = 0; $_forCount <= $_NumDays; $_forCount++){

  								if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'processing form'){
  									$PerformanceArray[$_TS_RANGE_START_ARRAY]['processing_form']++;
  								}

  					//if($_key['action'] == 'activity report'){
  								if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'activity report'){
	  								$PerformanceArray[$_TS_RANGE_START_ARRAY]['activity_report']++;
  								}

									$_TS_RANGE_START_ARRAY	= $_TS_RANGE_START_ARRAY + 86400;
									$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_ARRAYE + 86400;

								}



						
							$_WhileCount++;

						
						//}


						}
*/



/*
  					//if($_key['action'] == 'processing form'){
  					if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'processing form'){
  						$PerformanceArray[$_TS_RANGE_START_ARRAY]['form_process']++;
  					}

  					//if($_key['action'] == 'activity report'){
  					if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'activity report'){
  						$PerformanceArray[$_TS_RANGE_START_ARRAY]['activity_report']++;
  					}
*/
						//$_TS_RANGE_START_ARRAY	= $_TS_RANGE_START_ARRAY + 86400;
						//$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_ARRAYE + 86400;
						
						//echo $_TS_RANGE_START_ARRAYE.' ';

					//}



				// XML DATATYPE ------------------------------------------------------------------
					//echo "<graph caption='User Action Report Trend' subcaption='RECORDS: ".$_RecordCount." - UPDATED: ".date('h:m:s',time())." - DAY RANGE: ".$_NumDays." Aug 2010' divlinecolor='F47E00' numdivlines='4' showAreaBorder='1' animation='0' areaBorderColor='000000' numberPrefix='' showNames='1' numVDivLines='29' vDivLineAlpha='30' formatNumberScale='1' rotateNames='1'  decimalPrecision='0'>";
					echo "<chart caption='User Action Report Trend' subcaption='RECORDS: ".$_RecordCount." - UPDATED: ".date('h:m:s',time())." - DAY RANGE: ".$_NumDays." Aug 2010' bgColor='000000' bgAlpha='0' canvasBgAlpha='20' canvasBgColor='000000' outCnvBaseFontColor='666666' caption='' captioncolor='ff0000' hoverCapBgColor='ff0000' xAxisName='Date' yAxisName='Number of Events' numberPrefix='' animation='0' showNames='1' showValues='0' plotFillAlpha='60' numVDivLines='10' showAlternateVGridColor='1' AlternateVGridColor='000000' divLineColor='000000' vdivLineColor='000000' baseFontSize='12' baseFontColor='ffffff' rotateLabels='1' canvasBorderThickness='2' showPlotBorder='1' plotBorderThickness='1'>";
					echo "<categories>";

/*
					foreach($Dataset as $key){
						echo "<category name='".date('d',$key['ts'])."' />";
					}
*/					







					//for($_forCounter = 0; $_forCounter <= $_RecordCount; $_forCounter++){
					$_DayGRAPH 				= 1;
					$_TS_RANGE_STARTG	= $_TS_RANGE_START;
					while($_DayGRAPH <= $_NumDays){
						echo "<category label='".date('d', $_TS_RANGE_STARTG)."' />";
						$_DayGRAPH++;
						$_TS_RANGE_STARTG = $_TS_RANGE_STARTG + 86400;
					}
					

					echo "</categories>";



					// activity report data series -----------------------------
					if(count($Array_ActivityReport) > 0){

  					echo "<dataset seriesname='Activity Report' color='FF5904' showValues='1' areaAlpha='50' showAreaBorder='1' areaBorderThickness='1' areaBorderColor='FF0000'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){
  
  						foreach($Array_ActivityReport as $_TS_DAY_ACTIVITY => $_DAY_ACTIVITY_TOTAL){

  							if($_TS_DAY_ACTIVITY == $_TS_RANGE_START_INCREM){
  								echo "<set value='".$_DAY_ACTIVITY_TOTAL."' />";
  							}else{
  								echo "<set value='0' />";
  							}
  						}
  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------




					// processing form report data series ----------------------
					if(count($Array_ProcessingForm) > 0){

  					echo "<dataset seriesname='Processing Form' color='99cc99' showValues='1' areaAlpha='50' showAreaBorder='1' areaBorderThickness='1' areaBorderColor='006600'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){
  
  						foreach($Array_ProcessingForm as $_TS_DAY_PROCESSINGFORM => $_DAY_PROCESSINGFORM_TOTAL){

  							if($_TS_DAY_PROCESSINGFORM == $_TS_RANGE_START_INCREM){
  								echo "<set value='".$_DAY_PROCESSINGFORM_TOTAL."' />";
  							}else{
  								echo "<set value='0' />";
  							}
  						}
  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------



					// MODULE - Transaction - report data series ---------------
					if(count($Array_MODULE_Transaction) > 0){

  					echo "<dataset seriesname='Module.Transaction' color='ff0000' showValues='1' areaAlpha='30' showAreaBorder='1' areaBorderThickness='1' areaBorderColor='ff0000'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){
  
  						foreach($Array_MODULE_Transaction as $_TS_DAY_MODULE_TRANSACTION => $_DAY_MODULE_TRANSACTION_TOTAL){

  							if($_TS_DAY_MODULE_TRANSACTION == $_TS_RANGE_START_INCREM){
  								echo "<set value='".$_DAY_MODULE_TRANSACTION_TOTAL."' />";
  							}else{
  								echo "<set value='0' />";
  							}
  						}
  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------





     /*  
      <set value='43653' /> 
      <set value='55565' /> 
      <set value='49457' /> 
      <set value='64654' /> 
      <set value='58457' /> 
      <set value='66456' /> 
      <set value='48765' /> 
      <set value='52574' /> 
      <set value='49546' /> 
      <set value='42346' /> 
      <set value='51765' /> 
      <set value='78456' /> 
      <set value='53867' /> 
      <set value='38359' /> 
      <set value='63756' /> 
      <set value='45554' /> 
      <set value='6543' /> 
      <set value='7555' /> 
      <set value='4567' /> 
      <set value='7544' /> 
      <set value='6565' /> 
      <set value='6433' /> 
      <set value='3465' /> 
      <set value='3574' /> 
      <set value='6646' /> 
      <set value='4546' /> 
      <set value='9565' /> 
      <set value='5456' /> 
      <set value='5667' /> 
      <set value='4359' /> 
   </dataset>

   echo "<dataset seriesname='Activity Report' color='99cc99' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='006600'>
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='13' /> 
      <set value='16' /> 
      <set value='17' /> 
      <set value='12' /> 
      <set value='11' /> 
      <set value='15' /> 
      <set value='16' /> 
      <set value='16' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='17' /> 
   </dataset>";
   */
					echo "</chart>";
			break;




			case 'XML2':
				// XML DATATYPE ------------------------------------------------------------------
					echo "<graph caption='CLASS:User Action Report Trend' subcaption='For the month of Aug 2004' divlinecolor='F47E00' numdivlines='4' showAreaBorder='1' areaBorderColor='000000' numberPrefix='' showNames='1' numVDivLines='29' vDivLineAlpha='30' formatNumberScale='1' rotateNames='1'  decimalPrecision='0'>";
					echo "   <categories>
      <category name='08/01' /> 
      <category name='08/02' /> 
      <category name='08/03' /> 
      <category name='08/04' /> 
      <category name='08/05' /> 
      <category name='08/06' /> 
      <category name='08/07' /> 
      <category name='08/08' /> 
      <category name='08/09' /> 
      <category name='08/10' /> 
      <category name='08/11' /> 
      <category name='08/12' /> 
      <category name='08/13' /> 
      <category name='08/14' /> 
      <category name='08/15' /> 
      <category name='08/16' /> 
      <category name='08/17' /> 
      <category name='08/18' /> 
      <category name='08/19' /> 
      <category name='08/20' /> 
      <category name='08/21' /> 
      <category name='08/22' /> 
      <category name='08/23' /> 
      <category name='08/24' /> 
      <category name='08/25' /> 
      <category name='08/26' /> 
      <category name='08/27' /> 
      <category name='08/28' /> 
      <category name='08/29' /> 
      <category name='08/30' /> 
      <category name='08/31' /> 
   </categories>
   <dataset seriesname='Product A' color='FF5904' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='FF0000'>
      <set value='36634' /> 
      <set value='43653' /> 
      <set value='55565' /> 
      <set value='49457' /> 
      <set value='64654' /> 
      <set value='58457' /> 
      <set value='66456' /> 
      <set value='48765' /> 
      <set value='52574' /> 
      <set value='49546' /> 
      <set value='42346' /> 
      <set value='51765' /> 
      <set value='78456' /> 
      <set value='53867' /> 
      <set value='38359' /> 
      <set value='63756' /> 
      <set value='45554' /> 
      <set value='6543' /> 
      <set value='7555' /> 
      <set value='4567' /> 
      <set value='7544' /> 
      <set value='6565' /> 
      <set value='6433' /> 
      <set value='3465' /> 
      <set value='3574' /> 
      <set value='6646' /> 
      <set value='4546' /> 
      <set value='9565' /> 
      <set value='5456' /> 
      <set value='5667' /> 
      <set value='4359' /> 
   </dataset>
   <dataset seriesname='Product B' color='99cc99' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='006600'>
      <set value='12152' /> 
      <set value='15349' /> 
      <set value='16442' /> 
      <set value='17551' /> 
      <set value='13478' /> 
      <set value='16553' /> 
      <set value='17338' /> 
      <set value='17263' /> 
      <set value='16552' /> 
      <set value='17649' /> 
      <set value='12442' /> 
      <set value='11151' /> 
      <set value='15478' /> 
      <set value='16553' /> 
      <set value='16538' /> 
      <set value='17663' /> 
      <set value='13252' /> 
      <set value='16549' /> 
      <set value='14342' /> 
      <set value='13451' /> 
      <set value='15378' /> 
      <set value='17853' /> 
      <set value='17638' /> 
      <set value='14363' /> 
      <set value='10952' /> 
      <set value='10049' /> 
      <set value='19442' /> 
      <set value='13951' /> 
      <set value='19778' /> 
      <set value='18453' /> 
      <set value='17338' /> 
   </dataset>";

					
					echo "</graph>";
					die();
				// END XML DATATYPE --------------------------------------------------------------
			break;



			case 'HTML':
				// HTML DATATYPE -----------------------------------------------------------------

          	?>
          <!-- SM JS lib -->
          	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.REPORTS.uncompressed.js"></script>'; ?>
          <!-- END SM JS lib -->


          
          	<!-- spreadsheet -->
            <div id="spreadsheet_container" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; height: auto; width: 958px; padding-bottom: 5px;">
          
          		<!-- Promolist -->
          		<div id="pBuilder_editTools" style="position: relative; top: 0px; right: 0px; border: 0px solid #ff0; width: 100%; height: auto;">
          
          			<div id="spreadsheet_title" style="position: relative; z-index: 5; top: 2px; left: 2px; border: solid 0px #ffffff; width: 100%; height: 20px; font-size: 18px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
          				<? 
          					// report title --------------
          					echo $Title;
          					
          					// record total --------------
          					echo '&nbsp;&nbsp;&nbsp; <font color="#dc8c57">Total Records: '.$_RecordCount.'</font>';
          				?>
          			</div>
          
          			<!-- list holder -->
          			<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; width: 100%; height: auto;">


          				<!-- spreadsheet data -->
          				<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 5px; left: 0px; border: dashed 1px #767676; width: 100%; height: auto; overflow: auto;">
          
           					<table cellpadding="2" cellspacing="2" border="0" width="100%" style="background-color: #000;">
                     	<!-- data set -->
          
           						<tr>
                     	<!-- fields -->
                     	<?
                     		foreach($_Array_FIELDS as $_FieldName){
														// skip userid field -------------                     			
														if($_FieldName != 'userid'){
	                     			?> 
	                     			<td style="color: #fff;">
															<?
																// skip userid field -------------                     			
																if($_FieldName != 'userid' && $_FieldName != 'user_type' && $_FieldName != 'quota' && $_FieldName != 'status'){
															?>
	                     				<label style="color: #fff; cursor: pointer;" >
	                     					<a <? echo 'onclick="SM_Report_Update(\'form_resources\', \'human_resource.report\', \''.$_FieldName.':asc\');"'; ?>>&uarr;</a>
	                     					<a <? echo 'onclick="SM_Report_Update(\'form_resources\', \'human_resource.report\', \''.$_FieldName.':desc\');"'; ?>>&darr;</a>
	                     				</label>
															<? 
																} 
															?>
	                     					<? echo ucwords($this->FieldName_to_HumanReadable($_FieldName)); ?>
	                     			</td>
	                     			<?
													}
                     		}
          						?>
          						<!-- END fields -->
          						
          							<!-- delete button -->
          							<td></td>
          							<!-- disable button -->
          							<td></td>
          						
          					 </tr>
          
          						<?						
                     		if(count($Dataset) > 0){
                     	?>
          							<tr>
                     				<?
                             	$i=0;
                               foreach($Dataset as $key){

          
                     						if($i%2==0){
                     							$fgbg = '#1e4972';
                     						}else{
                     							$fgbg = '#14304b';
                     						}

																if($key['disabled'] == 1){
																	$fgbg = '#818181';
																}
				

          											// check for anonymous user ----------
                     						if($key['userid'] == 999999999){
                     							$_UserName = 'Anonymous';
                     						}else{
                     							$_UserDetails = $this->GetMemberProfile($key['userid']);
                     							$_UserName		=	$_UserDetails->first_name.' '.$_UserDetails->last_name;           							
                     						}
                     						// -----------------------------------




                           			?>
                    							<td align="middle" bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $this->GetOrganization($key['organization_id'], 'name'); ?></font></td>
                    							<!-- <td align="middle" bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($key['manager_id'] == $key['userid'] ? 'Self Managed':ucwords($this->UserID_to_UserInitials($key['manager_id']))); ?></font></td> -->
																	
                    							<!-- user type edit -->
                    							<td bgcolor="<? echo $fgbg; ?>">
												    				<!-- select/dropdown form element -->
												    				<table>
																			<tr>
																				<td align="left">
													          			<select name="input_usermanager_<? echo $this->Encrypt($key['userid'],'private'); ?>" id="input_usermanager_<? echo $this->Encrypt($key['userid'],'private'); ?>" <? echo 'onchange="SM_recordEdit(\'resources.edit\', \'user.manager\', \''.$this->Encrypt($key['userid'], 'private').'\');"'; ?> class="formControl_inputSelect_50px">
													          				<option value="nan">Select a Manager</option>
													                 <?
													
													  								// get data --------------------------
																						$ResultArray_MANAGERS			= $this->GetManagers('organization');
													
																						foreach($ResultArray_MANAGERS as $_MANAGERS_KEY){
													                 		$_MANAGERS_NAME		= ucwords($this->UserID_to_UserInitials($_MANAGERS_KEY['manager_id']));
													                 		$_MANAGERS_ID			= $_MANAGERS_KEY['userid'];
													                 		echo '<option value="'.$_MANAGERS_ID.'" '.($key['manager_id'] == $_MANAGERS_ID ?'selected':'').'>'.ucwords($this->UserID_to_UserInitials($_MANAGERS_ID)).'</option>';
																						}
													                 ?>
													          			</select>
																				</td>
																			</tr>
																		</table>
												    				<!-- END select/dropdown form element -->
                    							</td>
                    							<!-- END user type edit -->

                    							<td align="middle" bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['first_name']; ?></font></td>
                    							<td align="middle" bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['last_name']; ?></font></td>
                    							<td align="middle" bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($key['ts_lastaction'] != 0 ? date('d-m-Y',$key['ts_lastaction']):'No Activity')   ; ?></font></td>
                    							
                    							<!-- user type edit -->
                    							<td bgcolor="<? echo $fgbg; ?>">

												    				<!-- select/dropdown form element -->
												    				<table>
																			<tr>
																				<td align="left">
													          			<select name="input_usertype_<? echo $this->Encrypt($key['userid'],'private'); ?>" id="input_usertype_<? echo $this->Encrypt($key['userid'],'private'); ?>" <? echo 'onchange="SM_recordEdit(\'resources.edit\', \'user.type\', \''.$this->Encrypt($key['userid'], 'private').'\');"'; ?> class="formControl_inputSelect_50px">
													          				<option value="nan">Select a User Type</option>
													                 <?
													
													  								// get data --------------------------
																						$ResultArray_USRTYPES			= $this->GetUserTypes($_SESSION['ActiveUser']['user_type_id']);
													
																						foreach($ResultArray_USRTYPES as $_USRTYPES_KEY){
													                 		$_USRTYPES_NAME		= ucwords($_USRTYPES_KEY['user_type']);
													                 		$_USRTYPES_ID			= $_USRTYPES_KEY['user_type_id'];
													                 		echo '<option value="'.$_USRTYPES_ID.'" '.($key['user_type'] == $_USRTYPES_ID ?'selected':'').'>'.$_USRTYPES_NAME.'</option>';
																						}
													                 ?>
													          			</select>
																				</td>
																			</tr>
																		</table>
												    				<!-- END select/dropdown form element -->
                    							</td>
                    							<!-- END user type edit -->
                    							
                    							<!-- disable/enable -->
                    							<td align="center" bgcolor="<? echo $fgbg; ?>">
          													<?
																			if($key['disabled'] == 1){
																				?>
																				<input id="input_enable_<? echo $key['userid']; ?>" type="button" value="ENABLE" class="reportControl_button_submit" <? echo 'onclick="SM_recordEdit(\'resources.edit\', \'user.enable\', \''.$this->Encrypt($key['userid'], 'private').'\');"'; ?> />
																				<?
																			}else{
																				?>
																				<input id="input_disable_<? echo $key['userid']; ?>" type="button" value="DISABLE" class="reportControl_button_submit" <? echo 'onclick="SM_recordEdit(\'resources.edit\', \'user.disable\', \''.$this->Encrypt($key['userid'], 'private').'\');"'; ?> />
																				<?
																			}
          													?>
                    							</td>
																	<!-- END disable/enable -->

																	<!-- user quota -->
                    							<td align="center" bgcolor="<? echo $fgbg; ?>">
                    								<?
                    									if($key['user_type'] == 2){
                    										?>
                    											<input id="input_quota_<? echo $this->Encrypt($key['userid'], 'private'); ?>" type="input" maxlength="6" width="20" value="<? echo $key['quota']; ?>" class="reportControl_quota_input" <? echo 'onchange="SM_recordEdit(\'resources.edit\', \'user.quota\', \''.$this->Encrypt($key['userid'], 'private').'\');"'; ?> />
                    										<?
                    									}
                    								?>
                    								
                    							</td>
                    							<!-- END user quota -->

																	<!-- send authent to user -->
                    							<td align="center" bgcolor="<? echo $fgbg; ?>">
                    								<input id="input_sendlogin_<? echo $key['userid']; ?>" type="button" value="SEND LOGIN" class="reportControl_button_submit" <? echo 'onclick="SM_recordEdit(\'resources.edit\', \'user.login\', \''.$this->Encrypt($key['userid'], 'private').'\');"'; ?> />
                    							</td>
                    							<!-- END send authent to user -->

																	<!-- delete user -->
                    							<td align="middle">
                    								<img id="input_delete_<? echo $key['userid']; ?>" <? echo 'onclick="SM_recordEdit(\'resources.edit\', \'user.delete\', \''.$this->Encrypt($key['userid'], 'private').'\');"'; ?> src="common/img/icons/icon_20x20_redx.png" border="0" style="cursor: pointer;" />
                    							</td>
                    							<!-- END delete user -->


                    						</tr>
                        				<?
                            		$i++;
                     					}
                 				}
                     	?>
                     	<!-- END dataset -->
          				</table>
           				</div>
           				<!-- END spreadsheet data -->
          
          
          			</div>
          			<!-- END list holder -->
          
          
          		</div>
          		<!-- END Promolist -->
            	
            </div>
          	<!-- END spreadsheet -->
          	<?


				// END HTML DATATYPE -------------------------------------------------------------
			break;
		}




//print_r(array_unique($_Array_FIELDS));
//print_r($__AffiliatesPromos);



	 return $_return;	
	}
	// =================================================================















	// =================================================================
	public function Report_Transactions($Dataset, $Title, $DataType = 'HTML', $Range = null){

		$_return									= false;
		$num_rows									= false;




		// catch NO DATA -------------------
		if($Dataset == 'no data'){
			echo '<center><font color="red" size=3><b>NO DATA AND/OR INVALID RANGE</b></font><br><br><font color="#00ff00" size=3><b>CHANGE RANGE TO REQUERY DATASOURCE</b></font></center>';
			die();
		}
		// ---------------------------------


		// populate fields of dataset ------
		foreach($Dataset as $_Array){
			foreach($_Array as $_field_2 => $_value_2){
				$_Array_FIELDS[] = $_field_2;
			}
		}
		// ---------------------------------


		// get only unique fields ----------
		$_Array_FIELDS 	= array_unique($_Array_FIELDS);

//print_r($_Array_FIELDS);
//die();


		// field count ---------------------
   	$_FieldCount 			= count($_Array_FIELDS);


		// record count --------------------
   	$_RecordCount			= count($Dataset);
		





		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start 						= $_exploded_range_start[0];
    $_day_Start 							= $_exploded_range_start[1];
    $_year_Start 							= $_exploded_range_start[2];
    $_TS_RANGE_START					= @mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
    $_TS_RANGE_START_DAY_END	=	@mktime(23, 59, 59, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------


  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End 							= $_exploded_range_end[0];
    $_day_End 								= $_exploded_range_end[1];
    $_year_End 								= $_exploded_range_end[2];
    //$_TS_RANGE_END						= mktime(0, 0, 0, $_month_End, $_day_End, $_year_End);
    $_TS_RANGE_END						= @mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
    //$_TS_RANGE_DAY_END				= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------
		
		// number of days within range -----
		$_NumDays									=	round((($_TS_RANGE_END - $_TS_RANGE_START) / 86400));


		$_30DaysAgo								= time() - (86400 * 30);
		$_1DayAgo									= time() - 86400;



		switch($DataType){

			case 'XML':


						$_TS_RANGE_START_ARRAY 	= $_TS_RANGE_START;
						$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_DAY_END;

					

							

//echo $_key['action'];
  					// "processing form" per 24HRS -----------------
  					//if($_key['ts'] >= $_TS_RANGE_START && $_key['ts'] <= $_TS_RANGE_START_DAY_END && $_key['action'] == 'processing form'){
//echo '('.$_NumDays.') ';


$_TS_RANGE_START_INC = $_TS_RANGE_START;
for($_forCount = 1; $_forCount <= $_NumDays; $_forCount++){
	$_Array_Days_TS[] = $_TS_RANGE_START_INC;

	$_TS_RANGE_START_INC = $_TS_RANGE_START_INC + 86400;
}
//echo 'START: '.$_TS_RANGE_START.'/n';
//print_r($_Array_Days_TS);
//echo 'END: '.$_TS_RANGE_END.'/n';


foreach($_Array_Days_TS as $_DayTS){
	//echo $_DayTS.' ';
	foreach($Dataset as $_record){
		//echo $_DayTS.'>='.$_record['ts'].'   ';
		//echo $_key['ts'].'/n';
  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && $_record['action'] == 'activity report'){
  		$Array_ActivityReport[$_DayTS]++;
  	}

  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && $_record['action'] == 'processing form'){
  		$Array_ProcessingForm[$_DayTS]++;
  	}

  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && strtolower($_record['relativedata']) == 'http://sm0002.com/transaction'){
  		$Array_MODULE_Transaction[$_DayTS]++;
  	}

	}
}


//print_r($Array_ActivityReport);

//die();



						//$_WhileCount = 0;
						//while($_WhileCount <= $_NumDays){

/*
							foreach($Dataset as $_key){

								for($_forCount = 0; $_forCount <= $_NumDays; $_forCount++){

  								if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'processing form'){
  									$PerformanceArray[$_TS_RANGE_START_ARRAY]['processing_form']++;
  								}

  					//if($_key['action'] == 'activity report'){
  								if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'activity report'){
	  								$PerformanceArray[$_TS_RANGE_START_ARRAY]['activity_report']++;
  								}

									$_TS_RANGE_START_ARRAY	= $_TS_RANGE_START_ARRAY + 86400;
									$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_ARRAYE + 86400;

								}



						
							$_WhileCount++;

						
						//}


						}
*/



/*
  					//if($_key['action'] == 'processing form'){
  					if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'processing form'){
  						$PerformanceArray[$_TS_RANGE_START_ARRAY]['form_process']++;
  					}

  					//if($_key['action'] == 'activity report'){
  					if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'activity report'){
  						$PerformanceArray[$_TS_RANGE_START_ARRAY]['activity_report']++;
  					}
*/
						//$_TS_RANGE_START_ARRAY	= $_TS_RANGE_START_ARRAY + 86400;
						//$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_ARRAYE + 86400;
						
						//echo $_TS_RANGE_START_ARRAYE.' ';

					//}



				// XML DATATYPE ------------------------------------------------------------------
					//echo "<graph caption='User Action Report Trend' subcaption='RECORDS: ".$_RecordCount." - UPDATED: ".date('h:m:s',time())." - DAY RANGE: ".$_NumDays." Aug 2010' divlinecolor='F47E00' numdivlines='4' showAreaBorder='1' animation='0' areaBorderColor='000000' numberPrefix='' showNames='1' numVDivLines='29' vDivLineAlpha='30' formatNumberScale='1' rotateNames='1'  decimalPrecision='0'>";
					echo "<chart caption='User Action Report Trend' subcaption='RECORDS: ".$_RecordCount." - UPDATED: ".date('h:m:s',time())." - DAY RANGE: ".$_NumDays." Aug 2010' bgColor='000000' bgAlpha='0' canvasBgAlpha='20' canvasBgColor='000000' outCnvBaseFontColor='666666' caption='' captioncolor='ff0000' hoverCapBgColor='ff0000' xAxisName='Date' yAxisName='Number of Events' numberPrefix='' animation='0' showNames='1' showValues='0' plotFillAlpha='60' numVDivLines='10' showAlternateVGridColor='1' AlternateVGridColor='000000' divLineColor='000000' vdivLineColor='000000' baseFontSize='12' baseFontColor='ffffff' rotateLabels='1' canvasBorderThickness='2' showPlotBorder='1' plotBorderThickness='1'>";
					echo "<categories>";

/*
					foreach($Dataset as $key){
						echo "<category name='".date('d',$key['ts'])."' />";
					}
*/					







					//for($_forCounter = 0; $_forCounter <= $_RecordCount; $_forCounter++){
					$_DayGRAPH 				= 1;
					$_TS_RANGE_STARTG	= $_TS_RANGE_START;
					while($_DayGRAPH <= $_NumDays){
						echo "<category label='".date('d', $_TS_RANGE_STARTG)."' />";
						$_DayGRAPH++;
						$_TS_RANGE_STARTG = $_TS_RANGE_STARTG + 86400;
					}
					

					echo "</categories>";



					// activity report data series -----------------------------
					if(count($Array_ActivityReport) > 0){

  					echo "<dataset seriesname='Activity Report' color='FF5904' showValues='1' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='FF0000'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){
  
  						foreach($Array_ActivityReport as $_TS_DAY_ACTIVITY => $_DAY_ACTIVITY_TOTAL){

  							if($_TS_DAY_ACTIVITY == $_TS_RANGE_START_INCREM){
  								echo "<set value='".$_DAY_ACTIVITY_TOTAL."' />";
  							}else{
  								echo "<set value='0' />";
  							}
  						}
  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------




					// processing form report data series ----------------------
					if(count($Array_ProcessingForm) > 0){

  					echo "<dataset seriesname='Processing Form' color='99cc99' showValues='1' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='006600'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){
  
  						foreach($Array_ProcessingForm as $_TS_DAY_PROCESSINGFORM => $_DAY_PROCESSINGFORM_TOTAL){

  							if($_TS_DAY_PROCESSINGFORM == $_TS_RANGE_START_INCREM){
  								echo "<set value='".$_DAY_PROCESSINGFORM_TOTAL."' />";
  							}else{
  								echo "<set value='0' />";
  							}
  						}
  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------



					// MODULE - Transaction - report data series ---------------
					if(count($Array_MODULE_Transaction) > 0){

  					echo "<dataset seriesname='Module.Transaction' color='ff0000' showValues='1' areaAlpha='30' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='ff0000'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){
  
  						foreach($Array_MODULE_Transaction as $_TS_DAY_MODULE_TRANSACTION => $_DAY_MODULE_TRANSACTION_TOTAL){

  							if($_TS_DAY_MODULE_TRANSACTION == $_TS_RANGE_START_INCREM){
  								echo "<set value='".$_DAY_MODULE_TRANSACTION_TOTAL."' />";
  							}else{
  								echo "<set value='0' />";
  							}
  						}
  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------





     /*  
      <set value='43653' /> 
      <set value='55565' /> 
      <set value='49457' /> 
      <set value='64654' /> 
      <set value='58457' /> 
      <set value='66456' /> 
      <set value='48765' /> 
      <set value='52574' /> 
      <set value='49546' /> 
      <set value='42346' /> 
      <set value='51765' /> 
      <set value='78456' /> 
      <set value='53867' /> 
      <set value='38359' /> 
      <set value='63756' /> 
      <set value='45554' /> 
      <set value='6543' /> 
      <set value='7555' /> 
      <set value='4567' /> 
      <set value='7544' /> 
      <set value='6565' /> 
      <set value='6433' /> 
      <set value='3465' /> 
      <set value='3574' /> 
      <set value='6646' /> 
      <set value='4546' /> 
      <set value='9565' /> 
      <set value='5456' /> 
      <set value='5667' /> 
      <set value='4359' /> 
   </dataset>

   echo "<dataset seriesname='Activity Report' color='99cc99' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='006600'>
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='13' /> 
      <set value='16' /> 
      <set value='17' /> 
      <set value='12' /> 
      <set value='11' /> 
      <set value='15' /> 
      <set value='16' /> 
      <set value='16' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='17' /> 
   </dataset>";
   */
					echo "</chart>";
			break;




			case 'XML2':
				// XML DATATYPE ------------------------------------------------------------------
					echo "<graph caption='CLASS:User Action Report Trend' subcaption='For the month of Aug 2004' divlinecolor='F47E00' numdivlines='4' showAreaBorder='1' areaBorderColor='000000' numberPrefix='' showNames='1' numVDivLines='29' vDivLineAlpha='30' formatNumberScale='1' rotateNames='1'  decimalPrecision='0'>";
					echo "   <categories>
      <category name='08/01' /> 
      <category name='08/02' /> 
      <category name='08/03' /> 
      <category name='08/04' /> 
      <category name='08/05' /> 
      <category name='08/06' /> 
      <category name='08/07' /> 
      <category name='08/08' /> 
      <category name='08/09' /> 
      <category name='08/10' /> 
      <category name='08/11' /> 
      <category name='08/12' /> 
      <category name='08/13' /> 
      <category name='08/14' /> 
      <category name='08/15' /> 
      <category name='08/16' /> 
      <category name='08/17' /> 
      <category name='08/18' /> 
      <category name='08/19' /> 
      <category name='08/20' /> 
      <category name='08/21' /> 
      <category name='08/22' /> 
      <category name='08/23' /> 
      <category name='08/24' /> 
      <category name='08/25' /> 
      <category name='08/26' /> 
      <category name='08/27' /> 
      <category name='08/28' /> 
      <category name='08/29' /> 
      <category name='08/30' /> 
      <category name='08/31' /> 
   </categories>
   <dataset seriesname='Product A' color='FF5904' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='FF0000'>
      <set value='36634' /> 
      <set value='43653' /> 
      <set value='55565' /> 
      <set value='49457' /> 
      <set value='64654' /> 
      <set value='58457' /> 
      <set value='66456' /> 
      <set value='48765' /> 
      <set value='52574' /> 
      <set value='49546' /> 
      <set value='42346' /> 
      <set value='51765' /> 
      <set value='78456' /> 
      <set value='53867' /> 
      <set value='38359' /> 
      <set value='63756' /> 
      <set value='45554' /> 
      <set value='6543' /> 
      <set value='7555' /> 
      <set value='4567' /> 
      <set value='7544' /> 
      <set value='6565' /> 
      <set value='6433' /> 
      <set value='3465' /> 
      <set value='3574' /> 
      <set value='6646' /> 
      <set value='4546' /> 
      <set value='9565' /> 
      <set value='5456' /> 
      <set value='5667' /> 
      <set value='4359' /> 
   </dataset>
   <dataset seriesname='Product B' color='99cc99' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='006600'>
      <set value='12152' /> 
      <set value='15349' /> 
      <set value='16442' /> 
      <set value='17551' /> 
      <set value='13478' /> 
      <set value='16553' /> 
      <set value='17338' /> 
      <set value='17263' /> 
      <set value='16552' /> 
      <set value='17649' /> 
      <set value='12442' /> 
      <set value='11151' /> 
      <set value='15478' /> 
      <set value='16553' /> 
      <set value='16538' /> 
      <set value='17663' /> 
      <set value='13252' /> 
      <set value='16549' /> 
      <set value='14342' /> 
      <set value='13451' /> 
      <set value='15378' /> 
      <set value='17853' /> 
      <set value='17638' /> 
      <set value='14363' /> 
      <set value='10952' /> 
      <set value='10049' /> 
      <set value='19442' /> 
      <set value='13951' /> 
      <set value='19778' /> 
      <set value='18453' /> 
      <set value='17338' /> 
   </dataset>";

					
					echo "</graph>";
					die();
				// END XML DATATYPE --------------------------------------------------------------
			break;



			case 'HTML':
				// HTML DATATYPE -----------------------------------------------------------------

          	?>
          <!-- SM JS lib -->
          	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.REPORTS.uncompressed.js"></script>'; ?>
          <!-- END SM JS lib -->


          
          	<!-- spreadsheet -->
            <div id="spreadsheet_container" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; height: auto; width: 958px; padding-bottom: 5px;">
          
          		<!-- Promolist -->
          		<div id="pBuilder_editTools" style="position: relative; top: 0px; right: 0px; border: 0px solid #ff0; width: 100%; height: auto;">
          
          			<div id="spreadsheet_title" style="position: relative; z-index: 5; top: 2px; left: 2px; border: solid 0px #ffffff; width: 100%; height: 20px; font-size: 18px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
          				<? 
          					// report title --------------
          					echo $Title;
          					
          					// record total --------------
          					echo '&nbsp;&nbsp;&nbsp; <font color="#dc8c57">Total Records: '.$_RecordCount.'</font>';
          				?>
          			</div>
          
          			<!-- list holder -->
          			<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; width: 100%; height: auto;">


          				<!-- spreadsheet data -->
          				<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 5px; left: 0px; border: dashed 1px #767676; width: 100%; height: auto; overflow: auto;">
          
           					<table cellpadding="2" cellspacing="2" border="0" width="100%" style="background-color: #000;">
                     	<!-- data set -->
          
           						<tr>
                     	<!-- fields -->
                     	<?
                     		foreach($_Array_FIELDS as $_FieldName){
													// skip userid field -------------                     			
                     			if($_FieldName != 'revision' && $_FieldName != 'revised' && $_FieldName != 'revision_parent_id' && $_FieldName != 'id' && $_FieldName != 'io_po_suffix_num'){
	                     			?>
	                     			<td style="color: #fff;">
	                     				<label style="color: #fff; cursor: pointer;">
	                     					<a <? echo 'onclick="SM_Report_Update(\'form_transaction_new\', \'transaction_today.report\', \''.$_FieldName.':asc\');"'; ?>>&uarr;</a>
	                     					<a <? echo 'onclick="SM_Report_Update(\'form_transaction_new\', \'transaction_today.report\', \''.$_FieldName.':desc\');"'; ?>>&darr;</a>
	                     				</label>
															<? echo ucwords($this->FieldName_to_HumanReadable($_FieldName)); ?>
	                     			</td>
	                     			<?                     				
                     			} // END IF
                     		} // END FOREACH
          						?>
          						<!-- END fields -->
          					 </tr>
          
          						<?						
                     		if(count($Dataset) > 0){
                     	?>
          							<tr>
                     				<?
                             	$i=0;
                               foreach($Dataset as $key){
          
                               	if($_Level == 'extended'){
                               			$_Level = '<font color="#faac05">'.$_PromoName.'</font>';
                             		}else{
                             			$_Level 	= '<i>Default</i>';
                             		}
          
                     						if($i%2==0){
                     							$fgbg = '#1e4972';
                     						}else{
                     							$fgbg = '#14304b';
                     						}

																if($key['revised']){
																	$fgbg = '#631002';
																}

          											// check for anonymous user ----------
                     						if($key['userid'] == 999999999){
                     							$_UserName = 'Anonymous';
                     						}else{
                     							$_UserDetails = $this->GetMemberProfile($key['userid']);
                     							$_UserName		=	$_UserDetails->first_name.' '.$_UserDetails->last_name;           							
                     						}
                     						// -----------------------------------
                    						
          
                           			?>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['io']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ucwords($this->ClientID_to_ClientName($key['client_id'])); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $this->VendorID_to_VendorName($key['publication_id']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['client_net_total']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['po_cost']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['gross_profit']; ?></font></td>

                    							<!-- disable/enable -->
                    							<td align="center" bgcolor="<? echo $fgbg; ?>">
          													<?
																			if(!$key['revised']){
																				?>
																				<!-- <input id="input_edit_<? echo $key['id']; ?>" type="button" value="EDIT" class="reportControl_button_submit" <? echo 'onclick="SM_recordEdit(\'transaction.edit\', \'transaction.edit\', \''.$this->Encrypt($key['id'], 'private').'\');"'; ?> /> -->
																				<input id="input_edit_<? echo $key['id']; ?>" type="button" value="EDIT" class="reportControl_button_submit" <? echo 'onclick="SM_TransactionEdit(\''.$this->Encrypt($key['id'], 'private').'\');"'; ?> />
																				<?
																			}else{
																				echo '<font size="3" color="white"><b>R</b></font>';
																			}
          													?>
                    							</td>
																	<!-- END disable/enable -->


                    						</tr>
                        				<?
                            		$i++;
                     					}
                 				}
                     	?>
                     	<!-- END dataset -->
          				</table>
           				</div>
           				<!-- END spreadsheet data -->
          
          
          			</div>
          			<!-- END list holder -->
          
          
          		</div>
          		<!-- END Promolist -->
            	
            </div>
          	<!-- END spreadsheet -->
          	<?


				// END HTML DATATYPE -------------------------------------------------------------
			break;
		}




//print_r(array_unique($_Array_FIELDS));
//print_r($__AffiliatesPromos);



	 return $_return;	
	}
	// =================================================================












	// =================================================================
	public function CHART_REPORTS_Transactions($UserID, $Title, $Range, $Series = null, $Filter = null){

		$_return									= false;
		$_TeamQuota								= false;

//echo $Filter;
//die();

		// dashboard selection ---------------------------------
		switch($_SESSION['ActiveUser']['user_type']){
			
			case 'sales':
				$_SalesByMonth			=	$this->GetUserSalesTotals_ByMonthRange($UserID, $Range);
			break;								

			case 'management':
				$_SalesByMonth			=	$this->GetMANAGERSalesTotals_ByMonthRange($UserID, $Range, $Filter);
				$_TeamQuota					=	$this->GetManagerQuota($UserID, $Range);
			break;

			case 'finance':
				$_SalesByMonth			=	$this->GetMANAGERSalesTotals_ByMonthRange($UserID, $Range, $Filter);
			break;

			case 'executive':
				$_SalesByMonth			=	$this->GetMANAGERSalesTotals_ByMonthRange($UserID, $Range, $Filter);
			break;

			case 'admins':

			break;

			case 'god':

			break;

			default:

			break;
			
		}


//print_r($_SalesByMonth);
//die();

		?>
		<chart bgColor="000000" toolTipFontColor="000000" caption="<? echo $Title; ?>" bgAlpha="0" showBorder="0" baseFont="arial" toolTipFontColor='D9E5F1' baseFontSize="15" baseFontColor="ffffff" outCnvBaseFontSize="12" outCnvBaseFontColor="ffffff" decimalPrecision="0" numberSuffix="" chartBottomMargin="0" captionPadding="0">
			<?



//print_r($_SalesByMonth);
//die();
/*
			foreach($_SalesByMonth as $key => $value){
				echo '<set value="'.$value['client_net_total'].'" name="'.strtoupper($value['month']).'" color="ff0022" link="JavaScript: isJavaScriptCall=true; SM_Report_Update(\'form_sales_currentmonth\', \'salesman_current_month.dynadash.print\', \'ts_sold:desc\');" />';		
				echo '<set value="'.$value['gross_profit_total'].'" name="'.strtoupper($value['month']).'" color="FFCC33" link="JavaScript: isJavaScriptCall=true; SM_Report_Update(\'form_sales_currentmonth\', \'salesman_current_month.dynadash.print\', \'ts_sold:desc\');" />';		
			}
*/




			echo '<categories>';
				foreach($_SalesByMonth as $key => $value){
					echo '<category label="'.strtoupper($value['month']).($value['month'] ? ' '.$this->UserID_to_UserInitials($value['sales_person_id']):'').'"/>';
				}
			echo '</categories>';


			$_Series	=	explode(':',$Series);
			
			
			// client net total series -----------------
			if($_Series[0] == '1'){

/*
				echo '<dataset seriesName="Team Quota-'.strtoupper($value['month']).$value['year'].'">';
					foreach($_SalesByMonth as $key => $value){
						//echo '<set value="'.$value['client_net_total'].'" color="a50303" />';
						echo '<set value="'.$_TeamQuota.'" color="ffa200" />';
					}
				echo '</dataset>';
*/

				echo '<dataset seriesName="Client Net Total">';
					foreach($_SalesByMonth as $key => $value){
						echo '<set value="'.$value['client_net_total'].'" color="a50303" />';
					}
				echo '</dataset>';

				// Sales User Quota Trend Lines ==============================
				if($_SESSION['ActiveUser']['user_type'] != 'finance'){

					echo '<trendLines>';
					$_UserQuota	=	$this->GetUserQuota($UserID, date('m',time()), date('Y',time()));
					echo '<line startValue="'.$_UserQuota.'" thickness="5" color="00ccff" displayvalue="Quota-'.$this->UserID_to_UserInitials($UserID).'-'.$_UserQuota.'" valueOnRight="1" />';
	
					// Team Quota Total ------------				
					if($_TeamQuota){
						echo '<line startValue="'.$_TeamQuota.'" thickness="5" color="00ccff" displayvalue="Quota-Team-'.$_TeamQuota.'" valueOnRight="1" />';
					}
					echo '</trendLines>';					
				}
				// ===========================================================
			}

			// gross profit total series ---------------
			if($_Series[1] == '1'){
				echo '<dataset seriesName="Gross Profit Total">';
					foreach($_SalesByMonth as $key => $value){
						echo '<set value="'.$value['gross_profit_total'].'" color="149e0a"/>';
					}
				echo '</dataset>';
			}

			// gross profit total series ---------------
			if($_Series[2] == '1'){
				echo '<dataset seriesName="PO Cost Total">';
					foreach($_SalesByMonth as $key => $value){
						echo '<set value="'.$value['po_cost_total'].'" />';
					}
				echo '</dataset>';
			}

			// gross profit total series ---------------
			if($_Series[3] == '1'){
				echo '<dataset seriesName="Direct Commission Total">';
					foreach($_SalesByMonth as $key => $value){
						echo '<set value="'.$value['direct_commission_total'].'" />';
					}
				echo '</dataset>';
			}

			// gross profit total series ---------------
			if($_Series[4] == '1'){
				echo '<dataset seriesName="Profit Percentage">';
					foreach($_SalesByMonth as $key => $value){
						echo '<set value="'.(round(100*($value['gross_profit_total'] / $value['client_net_total']))).'" />';
					}
				echo '</dataset>';
			}

			// GM/transaction total series --------------
			if($_Series[5] == '1'){
				echo '<dataset seriesName="GM / Transaction">';
					foreach($_SalesByMonth as $key => $value){
						echo '<set value="'.(round($value['gross_profit_total'] / $value['number_deals'])).'" />';
					}
				echo '</dataset>';
			}



			?>
<styles>
<definition>
	<style type="font" name="CaptionFont" color="ffffff" size="25"/>
	<style type="font" name="SubCaptionFont" bold="0" color="000000"/>
	<style name='myToolTipFont' type='font' font='Arial' size='12' color='000000'/>
	<style name='Anim1' type='animation' param='_xScale' start='0' duration='1' />
	<style name='Anim2' type='animation' param='_alpha' start='0' duration='1' />

</definition>
	<application>
		<apply toObject="caption" styles="CaptionFont"/>
		<apply toObject="SubCaption" styles="SubCaptionFont"/>
		<apply toObject="DataValues" styles="SubCaptionFont"/>
		<apply toObject="Legend" styles="SubCaptionFont"/>
		<apply toObject="ToolTip" styles="myToolTipFont"/>
		<apply toObject='TRENDLINES' styles='Anim1, Anim2' />
	</application>
</styles>

		</chart>
		<?


	 return $_return;	
	}
	// =================================================================













	// =================================================================
	public function CHART_DASHBOARD_Manager_MEDIUM($UserID){

		$_return									= false;
		
		// get user sales by media ---------
		$_SalesByMedium			=	$this->GetManagerTeamSalesTotals_ByMedia($UserID, date('M',time()), 2010);

		?>
		<chart bgColor="000000" toolTipFontColor="000000" caption="Media" bgAlpha="0" showBorder="0" baseFontColor="ffffff" decimalPrecision="0" numberSuffix="$" chartBottomMargin="0" captionPadding="0">
			<?

			foreach($_SalesByMedium as $key => $value){
				
				switch($value['medium_id']){
					
					case '1':
						echo '<set value="'.$value['gross_profit_total'].'" name="Print" color="FFCC33" link="JavaScript: isJavaScriptCall=true; SM_Report_Update(\'form_sales_currentmonth\', \'manager_current_month.dynadash.print\', \'ts_sold:desc\');" />';		
					break;

					case '2':
						echo '<set value="'.$value['gross_profit_total'].'" name="Outdoor" color="0066CC" link="JavaScript: isJavaScriptCall=true; SM_Report_Update(\'form_sales_currentmonth\', \'manager_current_month.dynadash.outdoor\', \'ts_sold:desc\');" />';		
					break;

					case '3':
						echo '<set value="'.$value['gross_profit_total'].'" name="TV" color="D95000" link="JavaScript: isJavaScriptCall=true; SM_Report_Update(\'form_sales_currentmonth\', \'manager_current_month.dynadash.tv\', \'ts_sold:desc\');" />';		
					break;

					case '4':
						echo '<set value="'.$value['gross_profit_total'].'" name="Radio" color="9B72CF" link="JavaScript: isJavaScriptCall=true; SM_Report_Update(\'form_sales_currentmonth\', \'manager_current_month.dynadash.radio\', \'ts_sold:desc\');" />';		
					break;

					case '5':
						echo '<set value="'.$value['gross_profit_total'].'" name="Internet" color="A10303" link="JavaScript: isJavaScriptCall=true; SM_Report_Update(\'form_sales_currentmonth\', \'manager_current_month.dynadash.internet\', \'ts_sold:desc\');" />';		
					break;

					case '6':
						echo '<set value="'.$value['gross_profit_total'].'" name="Mobile" color="FFCC33" link="JavaScript: isJavaScriptCall=true; SM_Report_Update(\'form_sales_currentmonth\', \'manager_current_month.dynadash.mobile\', \'ts_sold:desc\');"  />';		
					break;
				}
			}

			?>
  <styles>
  	<definition>
  		<style name='myToolTipFont' type='font' font='Arial' size='15' color='910707'/>
  	</definition>
  <application>
  	<apply toObject='ToolTip' styles='myToolTipFont' />
  </application>
  </styles>

		</chart>
		<?


	 return $_return;	
	}
	// =================================================================











	// =================================================================
	public function CHART_DASHBOARD_SalesPerson_MEDIUM($UserID){

		$_return									= false;
		
		// get user sales by media ---------
		$_SalesByMedium			=	$this->GetUserSalesTotals_ByMedia($UserID, date('M',time()), date('Y',time()));

		?>
		<chart bgColor="000000" toolTipFontColor="000000" caption="Media" bgAlpha="0" showBorder="0" baseFontColor="ffffff" decimalPrecision="0" numberSuffix="$" chartBottomMargin="0" captionPadding="0">
			<?

			foreach($_SalesByMedium as $key => $value){
				
				switch($value['medium_id']){
					
					case '1':
						echo '<set value="'.$value['gross_profit_total'].'" name="Print" color="FFCC33" link="JavaScript: isJavaScriptCall=true; SM_Report_Update(\'form_sales_currentmonth\', \'salesman_current_month.dynadash.print\', \'ts_sold:desc\');" />';		
					break;

					case '2':
						echo '<set value="'.$value['gross_profit_total'].'" name="Outdoor" color="0066CC" link="JavaScript: isJavaScriptCall=true; SM_Report_Update(\'form_sales_currentmonth\', \'salesman_current_month.dynadash.outdoor\', \'ts_sold:desc\');" />';		
					break;

					case '3':
						echo '<set value="'.$value['gross_profit_total'].'" name="TV" color="D95000" link="JavaScript: isJavaScriptCall=true; SM_Report_Update(\'form_sales_currentmonth\', \'salesman_current_month.dynadash.tv\', \'ts_sold:desc\');" />';		
					break;

					case '4':
						echo '<set value="'.$value['gross_profit_total'].'" name="Radio" color="9B72CF" link="JavaScript: isJavaScriptCall=true; SM_Report_Update(\'form_sales_currentmonth\', \'salesman_current_month.dynadash.radio\', \'ts_sold:desc\');" />';		
					break;

					case '5':
						echo '<set value="'.$value['gross_profit_total'].'" name="Internet" color="A10303" link="JavaScript: isJavaScriptCall=true; SM_Report_Update(\'form_sales_currentmonth\', \'salesman_current_month.dynadash.internet\', \'ts_sold:desc\');" />';		
					break;

					case '6':
						echo '<set value="'.$value['gross_profit_total'].'" name="Mobile" color="FFCC33" link="JavaScript: isJavaScriptCall=true; SM_Report_Update(\'form_sales_currentmonth\', \'salesman_current_month.dynadash.mobile\', \'ts_sold:desc\');"  />';		
					break;
				}
			}

			?>
  <styles>
  	<definition>
  		<style name='myToolTipFont' type='font' font='Arial' size='15' color='910707'/>
  	</definition>
  <application>
  	<apply toObject='ToolTip' styles='myToolTipFont' />
  </application>
  </styles>

		</chart>
		<?


	 return $_return;	
	}
	// =================================================================











	// =================================================================
	public function CHART_DASHBOARD_SalesPerson_QUOTA($UserID){
		
		$_return									= false;

		
		// get user quota ------------------
		$_Quota			=	$this->GetUserQuota($UserID, date('M',time()), date('Y',time()));
		
		// get user sales ------------------
		$_Sales			=	$this->GetUserSalesTotal($UserID, date('M',time()), date('Y',time()));

		// get average sales ---------------
		$_SalesAvg	=	$this->GetAllSalesAverage_ORG($_SESSION['ActiveUser']['organization_id'], date('M',time()), date('Y',time()), $_SESSION['ActiveUser']['userid']);

		?>
		 <chart palette="2" majorTMNumber='12' gaugeFillMix="{light-10},{light-30},{light-20},{dark-5},{color},{light-30},{light-20},{dark-10}" bgAlpha="0" bgColor="FFFFFF" lowerLimit="0" upperLimit="<? echo $_Quota; ?>" numberPrefix="$" showBorder="0" basefontColor="FFFFDD" chartTopMargin="25" chartBottomMargin="25" chartLeftMargin="25" chartRightMargin="25" toolTipBgColor="009999" gaugeFillMix="{dark-10},{light-70},{dark-10}" gaugeFillRatio="3" pivotRadius="8" gaugeInnerRadius="60%" tickValueDistance="20" majorTMColor='333333' majorTMAlpha='100' majorTMHeight='10' majorTMThickness='2' minorTMColor='666666' minorTMAlpha='100' minorTMHeight='7' minorTMThickness='1' >
		 <colorRange>
		  <color minValue="0" maxValue="15000" code="FF654F" /> 
		  <color minValue="15000" maxValue="20000" code="F6BD0F" /> 
		  <color minValue="20000" maxValue="<? echo $_Quota; ?>" code="8BBA00" /> 
		  </colorRange>
		 <dials>
		  <dial value="<? echo $_Sales; ?>" rearExtension="10" baseWidth="10" /> 
		  </dials>
		 <trendpoints>
		  <!-- <point value="<? echo $_SalesAvg; ?>" displayValue="Average" useMarker="1" markerRadius="8" dashed="1" dashLen="2" dashGap="2" /> -->
		  <point value="<? echo $_Quota; ?>" displayValue="Quota" useMarker="1" markerRadius="8" dashed="1" dashLen="2" dashGap="2" color="3fd0ff" thickness="5" />
		 </trendpoints>
		 <!-- Rectangles behind the gauge 
		  --> 
		
		  </chart>
		<?


	 return $_return;	
	}
	// =================================================================









	// =================================================================
	public function CHART_DASHBOARD_Manager_QUOTA($UserID){
		
		$_return									= false;

		
		// get user quota ------------------
		$_Quota			=	$this->GetManagerQuota($UserID, date('M',time()), date('Y',time()));

		// get user sales ------------------
		$_Sales			=	$this->GetManagerTeamSalesTotal($UserID, date('M',time()), date('Y',time()));

		// get average sales ---------------
		$_SalesAvg	=	$this->GetAllSalesAverage_ORG($_SESSION['ActiveUser']['organization_id'], date('M',time()), date('Y',time()), $_SESSION['ActiveUser']['userid']);

		?>
		 <chart palette="2" majorTMNumber='12' gaugeFillMix="{light-10},{light-30},{light-20},{dark-5},{color},{light-30},{light-20},{dark-10}" bgAlpha="0" bgColor="FFFFFF" lowerLimit="0" upperLimit="<? echo $_Quota; ?>" numberPrefix="$" showBorder="0" basefontColor="FFFFDD" chartTopMargin="25" chartBottomMargin="25" chartLeftMargin="25" chartRightMargin="25" toolTipBgColor="009999" gaugeFillMix="{dark-10},{light-70},{dark-10}" gaugeFillRatio="3" pivotRadius="8" gaugeInnerRadius="60%" tickValueDistance="20" majorTMColor='333333' majorTMAlpha='100' majorTMHeight='10' majorTMThickness='2' minorTMColor='666666' minorTMAlpha='100' minorTMHeight='7' minorTMThickness='1' >
		 <colorRange>
		  <color minValue="0" maxValue="15000" code="FF654F" /> 
		  <color minValue="15000" maxValue="20000" code="F6BD0F" /> 
		  <color minValue="20000" maxValue="<? echo $_Quota; ?>" code="8BBA00" /> 
		  </colorRange>
		 <dials>
		  <dial value="<? echo $_Sales; ?>" rearExtension="10" baseWidth="10" /> 
		  </dials>
		 <trendpoints>
		  <point value="<? echo $_SalesAvg; ?>" displayValue="Average" useMarker="1" markerRadius="8" dashed="1" dashLen="2" dashGap="2" />
		  <!-- <point value="<? echo $_Quota; ?>" displayValue="Quota" useMarker="1" markerRadius="8" dashed="1" dashLen="2" dashGap="2" color="3fd0ff" thickness="5" /> -->
		 </trendpoints>
		 <!-- Rectangles behind the gauge 
		  --> 
		
		  </chart>
		<?


	 return $_return;	
	}
	// =================================================================














	// =================================================================
	public function Report_SalesPerson_OverUnder($Dataset, $Title, $DataType = 'HTML', $Range = null){

		$_return									= false;
		$num_rows									= false;




		// catch NO DATA -------------------
		if($Dataset == 'no data'){
			echo '<center><font color="red" size=3><b>NO DATA AND/OR INVALID RANGE</b></font><br><br><font color="#00ff00" size=3><b>CHANGE RANGE TO REQUERY DATASOURCE</b></font></center>';
			die();
		}
		// ---------------------------------


		// populate fields of dataset ------
		foreach($Dataset as $_Array){
			foreach($_Array as $_field_2 => $_value_2){
				$_Array_FIELDS[] = $_field_2;
			}
		}
		// ---------------------------------


		// get only unique fields ----------
		$_Array_FIELDS 	= array_unique($_Array_FIELDS);

//print_r($_Array_FIELDS);
//die();


		// field count ---------------------
   	$_FieldCount 			= count($_Array_FIELDS);


		// record count --------------------
   	$_RecordCount			= count($Dataset);
		





		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start 						= $_exploded_range_start[0];
    $_day_Start 							= $_exploded_range_start[1];
    $_year_Start 							= $_exploded_range_start[2];
    $_TS_RANGE_START					= @mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
    $_TS_RANGE_START_DAY_END	=	@mktime(23, 59, 59, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------


  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End 							= $_exploded_range_end[0];
    $_day_End 								= $_exploded_range_end[1];
    $_year_End 								= $_exploded_range_end[2];
    //$_TS_RANGE_END						= mktime(0, 0, 0, $_month_End, $_day_End, $_year_End);
    $_TS_RANGE_END						= @mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
    //$_TS_RANGE_DAY_END				= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------
		
		// number of days within range -----
		$_NumDays									=	round((($_TS_RANGE_END - $_TS_RANGE_START) / 86400));


		$_30DaysAgo								= time() - (86400 * 30);
		$_1DayAgo									= time() - 86400;



		switch($DataType){

			case 'XML':


						$_TS_RANGE_START_ARRAY 	= $_TS_RANGE_START;
						$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_DAY_END;

					

							

//echo $_key['action'];
  					// "processing form" per 24HRS -----------------
  					//if($_key['ts'] >= $_TS_RANGE_START && $_key['ts'] <= $_TS_RANGE_START_DAY_END && $_key['action'] == 'processing form'){
//echo '('.$_NumDays.') ';


$_TS_RANGE_START_INC = $_TS_RANGE_START;
for($_forCount = 1; $_forCount <= $_NumDays; $_forCount++){
	$_Array_Days_TS[] = $_TS_RANGE_START_INC;

	$_TS_RANGE_START_INC = $_TS_RANGE_START_INC + 86400;
}
//echo 'START: '.$_TS_RANGE_START.'/n';
//print_r($_Array_Days_TS);
//echo 'END: '.$_TS_RANGE_END.'/n';


foreach($_Array_Days_TS as $_DayTS){
	//echo $_DayTS.' ';
	foreach($Dataset as $_record){
		//echo $_DayTS.'>='.$_record['ts'].'   ';
		//echo $_key['ts'].'/n';
  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && $_record['action'] == 'activity report'){
  		$Array_ActivityReport[$_DayTS]++;
  	}

  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && $_record['action'] == 'processing form'){
  		$Array_ProcessingForm[$_DayTS]++;
  	}

  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && strtolower($_record['relativedata']) == 'http://sm0002.com/transaction'){
  		$Array_MODULE_Transaction[$_DayTS]++;
  	}

	}
}


//print_r($Array_ActivityReport);

//die();



						//$_WhileCount = 0;
						//while($_WhileCount <= $_NumDays){

/*
							foreach($Dataset as $_key){

								for($_forCount = 0; $_forCount <= $_NumDays; $_forCount++){

  								if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'processing form'){
  									$PerformanceArray[$_TS_RANGE_START_ARRAY]['processing_form']++;
  								}

  					//if($_key['action'] == 'activity report'){
  								if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'activity report'){
	  								$PerformanceArray[$_TS_RANGE_START_ARRAY]['activity_report']++;
  								}

									$_TS_RANGE_START_ARRAY	= $_TS_RANGE_START_ARRAY + 86400;
									$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_ARRAYE + 86400;

								}



						
							$_WhileCount++;

						
						//}


						}
*/



/*
  					//if($_key['action'] == 'processing form'){
  					if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'processing form'){
  						$PerformanceArray[$_TS_RANGE_START_ARRAY]['form_process']++;
  					}

  					//if($_key['action'] == 'activity report'){
  					if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'activity report'){
  						$PerformanceArray[$_TS_RANGE_START_ARRAY]['activity_report']++;
  					}
*/
						//$_TS_RANGE_START_ARRAY	= $_TS_RANGE_START_ARRAY + 86400;
						//$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_ARRAYE + 86400;
						
						//echo $_TS_RANGE_START_ARRAYE.' ';

					//}



				// XML DATATYPE ------------------------------------------------------------------
					//echo "<graph caption='User Action Report Trend' subcaption='RECORDS: ".$_RecordCount." - UPDATED: ".date('h:m:s',time())." - DAY RANGE: ".$_NumDays." Aug 2010' divlinecolor='F47E00' numdivlines='4' showAreaBorder='1' animation='0' areaBorderColor='000000' numberPrefix='' showNames='1' numVDivLines='29' vDivLineAlpha='30' formatNumberScale='1' rotateNames='1'  decimalPrecision='0'>";
					echo "<chart caption='User Action Report Trend' subcaption='RECORDS: ".$_RecordCount." - UPDATED: ".date('h:m:s',time())." - DAY RANGE: ".$_NumDays." Aug 2010' bgColor='000000' bgAlpha='0' canvasBgAlpha='20' canvasBgColor='000000' outCnvBaseFontColor='666666' caption='' captioncolor='ff0000' hoverCapBgColor='ff0000' xAxisName='Date' yAxisName='Number of Events' numberPrefix='' animation='0' showNames='1' showValues='0' plotFillAlpha='60' numVDivLines='10' showAlternateVGridColor='1' AlternateVGridColor='000000' divLineColor='000000' vdivLineColor='000000' baseFontSize='12' baseFontColor='ffffff' rotateLabels='1' canvasBorderThickness='2' showPlotBorder='1' plotBorderThickness='1'>";
					echo "<categories>";

/*
					foreach($Dataset as $key){
						echo "<category name='".date('d',$key['ts'])."' />";
					}
*/					







					//for($_forCounter = 0; $_forCounter <= $_RecordCount; $_forCounter++){
					$_DayGRAPH 				= 1;
					$_TS_RANGE_STARTG	= $_TS_RANGE_START;
					while($_DayGRAPH <= $_NumDays){
						echo "<category label='".date('d', $_TS_RANGE_STARTG)."' />";
						$_DayGRAPH++;
						$_TS_RANGE_STARTG = $_TS_RANGE_STARTG + 86400;
					}
					

					echo "</categories>";



					// activity report data series -----------------------------
					if(count($Array_ActivityReport) > 0){

  					echo "<dataset seriesname='Activity Report' color='FF5904' showValues='1' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='FF0000'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){
  
  						foreach($Array_ActivityReport as $_TS_DAY_ACTIVITY => $_DAY_ACTIVITY_TOTAL){

  							if($_TS_DAY_ACTIVITY == $_TS_RANGE_START_INCREM){
  								echo "<set value='".$_DAY_ACTIVITY_TOTAL."' />";
  							}else{
  								echo "<set value='0' />";
  							}
  						}
  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------




					// processing form report data series ----------------------
					if(count($Array_ProcessingForm) > 0){

  					echo "<dataset seriesname='Processing Form' color='99cc99' showValues='1' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='006600'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){
  
  						foreach($Array_ProcessingForm as $_TS_DAY_PROCESSINGFORM => $_DAY_PROCESSINGFORM_TOTAL){

  							if($_TS_DAY_PROCESSINGFORM == $_TS_RANGE_START_INCREM){
  								echo "<set value='".$_DAY_PROCESSINGFORM_TOTAL."' />";
  							}else{
  								echo "<set value='0' />";
  							}
  						}
  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------



					// MODULE - Transaction - report data series ---------------
					if(count($Array_MODULE_Transaction) > 0){

  					echo "<dataset seriesname='Module.Transaction' color='ff0000' showValues='1' areaAlpha='30' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='ff0000'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){
  
  						foreach($Array_MODULE_Transaction as $_TS_DAY_MODULE_TRANSACTION => $_DAY_MODULE_TRANSACTION_TOTAL){

  							if($_TS_DAY_MODULE_TRANSACTION == $_TS_RANGE_START_INCREM){
  								echo "<set value='".$_DAY_MODULE_TRANSACTION_TOTAL."' />";
  							}else{
  								echo "<set value='0' />";
  							}
  						}
  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------





     /*  
      <set value='43653' /> 
      <set value='55565' /> 
      <set value='49457' /> 
      <set value='64654' /> 
      <set value='58457' /> 
      <set value='66456' /> 
      <set value='48765' /> 
      <set value='52574' /> 
      <set value='49546' /> 
      <set value='42346' /> 
      <set value='51765' /> 
      <set value='78456' /> 
      <set value='53867' /> 
      <set value='38359' /> 
      <set value='63756' /> 
      <set value='45554' /> 
      <set value='6543' /> 
      <set value='7555' /> 
      <set value='4567' /> 
      <set value='7544' /> 
      <set value='6565' /> 
      <set value='6433' /> 
      <set value='3465' /> 
      <set value='3574' /> 
      <set value='6646' /> 
      <set value='4546' /> 
      <set value='9565' /> 
      <set value='5456' /> 
      <set value='5667' /> 
      <set value='4359' /> 
   </dataset>

   echo "<dataset seriesname='Activity Report' color='99cc99' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='006600'>
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='13' /> 
      <set value='16' /> 
      <set value='17' /> 
      <set value='12' /> 
      <set value='11' /> 
      <set value='15' /> 
      <set value='16' /> 
      <set value='16' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='17' /> 
   </dataset>";
   */
					echo "</chart>";
			break;




			case 'XML2':
				// XML DATATYPE ------------------------------------------------------------------
?>
 <chart palette="2" bgAlpha="0" bgColor="FFFFFF" lowerLimit="0" upperLimit="100" numberSuffix="%25" showBorder="0" basefontColor="FFFFDD" chartTopMargin="25" chartBottomMargin="25" chartLeftMargin="25" chartRightMargin="25" toolTipBgColor="009999" gaugeFillMix="{dark-10},{light-70},{dark-10}" gaugeFillRatio="3" pivotRadius="8" gaugeInnerRadius="50%" tickValueDistance="20">
 <colorRange>
  <color minValue="0" maxValue="45" code="FF654F" /> 
  <color minValue="45" maxValue="80" code="F6BD0F" /> 
  <color minValue="80" maxValue="100" code="8BBA00" /> 
  </colorRange>
 <dials>
  <dial value="72" rearExtension="10" baseWidth="10" /> 
  </dials>
 <trendpoints>
  <point value="62" displayValue="Average" useMarker="1" markerRadius="8" dashed="1" dashLen="2" dashGap="2" /> 
  </trendpoints>
 <!-- Rectangles behind the gauge 
  --> 

  </chart>
<?
die();
					echo "<graph caption='CLASS:User Action Report Trend' subcaption='For the month of Aug 2004' divlinecolor='F47E00' numdivlines='4' showAreaBorder='1' areaBorderColor='000000' numberPrefix='' showNames='1' numVDivLines='29' vDivLineAlpha='30' formatNumberScale='1' rotateNames='1'  decimalPrecision='0'>";
					echo "   <categories>
      <category name='08/01' /> 
      <category name='08/02' /> 
      <category name='08/03' /> 
      <category name='08/04' /> 
      <category name='08/05' /> 
      <category name='08/06' /> 
      <category name='08/07' /> 
      <category name='08/08' /> 
      <category name='08/09' /> 
      <category name='08/10' /> 
      <category name='08/11' /> 
      <category name='08/12' /> 
      <category name='08/13' /> 
      <category name='08/14' /> 
      <category name='08/15' /> 
      <category name='08/16' /> 
      <category name='08/17' /> 
      <category name='08/18' /> 
      <category name='08/19' /> 
      <category name='08/20' /> 
      <category name='08/21' /> 
      <category name='08/22' /> 
      <category name='08/23' /> 
      <category name='08/24' /> 
      <category name='08/25' /> 
      <category name='08/26' /> 
      <category name='08/27' /> 
      <category name='08/28' /> 
      <category name='08/29' /> 
      <category name='08/30' /> 
      <category name='08/31' /> 
   </categories>
   <dataset seriesname='Product A' color='FF5904' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='FF0000'>
      <set value='36634' /> 
      <set value='43653' /> 
      <set value='55565' /> 
      <set value='49457' /> 
      <set value='64654' /> 
      <set value='58457' /> 
      <set value='66456' /> 
      <set value='48765' /> 
      <set value='52574' /> 
      <set value='49546' /> 
      <set value='42346' /> 
      <set value='51765' /> 
      <set value='78456' /> 
      <set value='53867' /> 
      <set value='38359' /> 
      <set value='63756' /> 
      <set value='45554' /> 
      <set value='6543' /> 
      <set value='7555' /> 
      <set value='4567' /> 
      <set value='7544' /> 
      <set value='6565' /> 
      <set value='6433' /> 
      <set value='3465' /> 
      <set value='3574' /> 
      <set value='6646' /> 
      <set value='4546' /> 
      <set value='9565' /> 
      <set value='5456' /> 
      <set value='5667' /> 
      <set value='4359' /> 
   </dataset>
   <dataset seriesname='Product B' color='99cc99' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='006600'>
      <set value='12152' /> 
      <set value='15349' /> 
      <set value='16442' /> 
      <set value='17551' /> 
      <set value='13478' /> 
      <set value='16553' /> 
      <set value='17338' /> 
      <set value='17263' /> 
      <set value='16552' /> 
      <set value='17649' /> 
      <set value='12442' /> 
      <set value='11151' /> 
      <set value='15478' /> 
      <set value='16553' /> 
      <set value='16538' /> 
      <set value='17663' /> 
      <set value='13252' /> 
      <set value='16549' /> 
      <set value='14342' /> 
      <set value='13451' /> 
      <set value='15378' /> 
      <set value='17853' /> 
      <set value='17638' /> 
      <set value='14363' /> 
      <set value='10952' /> 
      <set value='10049' /> 
      <set value='19442' /> 
      <set value='13951' /> 
      <set value='19778' /> 
      <set value='18453' /> 
      <set value='17338' /> 
   </dataset>";

					
					echo "</graph>";
					die();
				// END XML DATATYPE --------------------------------------------------------------
			break;



			case 'HTML':
				// HTML DATATYPE -----------------------------------------------------------------

          	?>
          <!-- SM JS lib -->
          	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.REPORTS.uncompressed.js"></script>'; ?>
          <!-- END SM JS lib -->


          
          	<!-- spreadsheet -->
            <div id="spreadsheet_container" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; height: auto; width: 938px; padding-bottom: 5px;">
          
          		<!-- Promolist -->
          		<div id="pBuilder_editTools" style="position: relative; top: 0px; right: 0px; border: 0px solid #ff0; width: 100%; height: auto;">
          
          			<div id="spreadsheet_title" style="position: relative; z-index: 5; top: 2px; left: 2px; border: solid 0px #ffffff; width: 100%; height: 20px; font-size: 18px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
          				<? 
          					// report title --------------
          					echo $Title;
          					
          					// record total --------------
          					//echo '&nbsp;&nbsp;&nbsp; <font color="#dc8c57">Total Records: '.$_RecordCount.'</font>';
          				?>
          			</div>
          
          			<!-- list holder -->
          			<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; width: 100%; height: auto;">


          				<!-- spreadsheet data -->
          				<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 5px; left: 0px; border: dashed 1px #767676; width: 100%; height: auto; overflow: auto;">
          
           					<table cellpadding="2" cellspacing="2" border="0" width="100%" style="background-color: #000;">
                     	<!-- data set -->
          
           						<tr>
                     	<!-- fields -->
                     	<?
                     		foreach($_Array_FIELDS as $_FieldName){
                     			?> 
                     			<td style="color: #fff;">
                     				<label style="color: #fff; cursor: pointer;">
                     					<a <? echo 'onclick="SM_Report_Update(\'form_sales_currentmonth\', \'salesman_current_month.report\', \''.$_FieldName.':asc\');"'; ?>>&uarr;</a>
                     					<a <? echo 'onclick="SM_Report_Update(\'form_sales_currentmonth\', \'salesman_current_month.report\', \''.$_FieldName.':desc\');"'; ?>>&darr;</a>
                     				</label>
														<? echo ucwords($this->FieldName_to_HumanReadable($_FieldName)); ?>
                     			</td>
                     			<?
                     		}
												?>
                     			<td style="color: #fff;">
														Gross Margin per Transaction
                     			</td>
                     		<?
                     		
          						?>
          						<!-- END fields -->
          					 </tr>
          
          						<?						
                     		if(count($Dataset) > 0){
                     	?>
          							<tr>
                     				<?
                             	$i=0;
                               foreach($Dataset as $key){
          
                               	if($_Level == 'extended'){
                               			$_Level = '<font color="#faac05">'.$_PromoName.'</font>';
                             		}else{
                             			$_Level 	= '<i>Default</i>';
                             		}
          
                     						if($i%2==0){
                     							$fgbg = '#1e4972';
                     						}else{
                     							$fgbg = '#14304b';
                     						}
          
          											// check for anonymous user ----------
                     						if($key['userid'] == 999999999){
                     							$_UserName = 'Anonymous';
                     						}else{
                     							$_UserDetails = $this->GetMemberProfile($key['userid']);
                     							$_UserName		=	$_UserDetails->first_name.' '.$_UserDetails->last_name;           							
                     						}
                     						// -----------------------------------

																$_CommissionRate_Details	=	$this->GetCommission_to_CommissionRate($key['direct_commission_id']);



																// compute totals ------------------------------
																//$__GRANDTOTAL_total_client_net	+=	$key['client_net_total'];
																//$__GRANDTOTAL_po_cost						+=	$key['po_cost'];
																//$__GRANDTOTAL_gross_profit			+=	$key['gross_profit'];
																//$__GRANDTOTAL_direct_commission	+=	$_CommissionRate_Details['rate'] * $key['gross_profit'];


                           			?>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['count(id)']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['sum(client_net_total)']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['sum(po_cost)']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['sum(gross_profit)']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo round(100*($key['sum(gross_profit)'] / $key['sum(client_net_total)'])).'%'; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['sum(direct_commission)']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo round($key['sum(gross_profit)'] / $key['count(id)']); ?></font></td>
                    						</tr>
                        				<?
                            		$i++;
                     					}
                 				}
                     	?>


                     	<!-- END dataset -->
          				</table>
           				</div>
           				<!-- END spreadsheet data -->




          
          
          			</div>
          			<!-- END list holder -->
          
          
          		</div>
          		<!-- END Promolist -->
            	
            </div>
          	<!-- END spreadsheet -->
          	<?


				// END HTML DATATYPE -------------------------------------------------------------
			break;
		}




//print_r(array_unique($_Array_FIELDS));
//print_r($__AffiliatesPromos);



	 return $_return;	
	}
	// =================================================================














	// =================================================================
	public function Report_SalesPerson_Secondary($Dataset, $Title, $DataType = 'HTML', $Range = null){

		$_return									= false;
		$num_rows									= false;




		// catch NO DATA -------------------
		if($Dataset == 'no data'){
			echo '<center><font color="red" size=3><b>NO DATA AND/OR INVALID RANGE</b></font><br><br><font color="#00ff00" size=3><b>CHANGE RANGE TO REQUERY DATASOURCE</b></font></center>';
			die();
		}
		// ---------------------------------


		// populate fields of dataset ------
		foreach($Dataset as $_Array){
			foreach($_Array as $_field_2 => $_value_2){
				$_Array_FIELDS[] = $_field_2;
			}
		}
		// ---------------------------------


		// get only unique fields ----------
		$_Array_FIELDS 	= array_unique($_Array_FIELDS);

//print_r($_Array_FIELDS);
//die();


		// field count ---------------------
   	$_FieldCount 			= count($_Array_FIELDS);


		// record count --------------------
   	$_RecordCount			= count($Dataset);
		





		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start 						= $_exploded_range_start[0];
    $_day_Start 							= $_exploded_range_start[1];
    $_year_Start 							= $_exploded_range_start[2];
    $_TS_RANGE_START					= @mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
    $_TS_RANGE_START_DAY_END	=	@mktime(23, 59, 59, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------


  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End 							= $_exploded_range_end[0];
    $_day_End 								= $_exploded_range_end[1];
    $_year_End 								= $_exploded_range_end[2];
    //$_TS_RANGE_END						= mktime(0, 0, 0, $_month_End, $_day_End, $_year_End);
    $_TS_RANGE_END						= @mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
    //$_TS_RANGE_DAY_END				= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------
		
		// number of days within range -----
		$_NumDays									=	round((($_TS_RANGE_END - $_TS_RANGE_START) / 86400));


		$_30DaysAgo								= time() - (86400 * 30);
		$_1DayAgo									= time() - 86400;



		switch($DataType){

			case 'XML':


						$_TS_RANGE_START_ARRAY 	= $_TS_RANGE_START;
						$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_DAY_END;

					

							

//echo $_key['action'];
  					// "processing form" per 24HRS -----------------
  					//if($_key['ts'] >= $_TS_RANGE_START && $_key['ts'] <= $_TS_RANGE_START_DAY_END && $_key['action'] == 'processing form'){
//echo '('.$_NumDays.') ';


$_TS_RANGE_START_INC = $_TS_RANGE_START;
for($_forCount = 1; $_forCount <= $_NumDays; $_forCount++){
	$_Array_Days_TS[] = $_TS_RANGE_START_INC;

	$_TS_RANGE_START_INC = $_TS_RANGE_START_INC + 86400;
}
//echo 'START: '.$_TS_RANGE_START.'/n';
//print_r($_Array_Days_TS);
//echo 'END: '.$_TS_RANGE_END.'/n';


foreach($_Array_Days_TS as $_DayTS){
	//echo $_DayTS.' ';
	foreach($Dataset as $_record){
		//echo $_DayTS.'>='.$_record['ts'].'   ';
		//echo $_key['ts'].'/n';
  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && $_record['action'] == 'activity report'){
  		$Array_ActivityReport[$_DayTS]++;
  	}

  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && $_record['action'] == 'processing form'){
  		$Array_ProcessingForm[$_DayTS]++;
  	}

  	if($_record['ts'] >= $_DayTS && $_record['ts'] <= ($_DayTS + 86399) && strtolower($_record['relativedata']) == 'http://sm0002.com/transaction'){
  		$Array_MODULE_Transaction[$_DayTS]++;
  	}

	}
}


//print_r($Array_ActivityReport);

//die();



						//$_WhileCount = 0;
						//while($_WhileCount <= $_NumDays){

/*
							foreach($Dataset as $_key){

								for($_forCount = 0; $_forCount <= $_NumDays; $_forCount++){

  								if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'processing form'){
  									$PerformanceArray[$_TS_RANGE_START_ARRAY]['processing_form']++;
  								}

  					//if($_key['action'] == 'activity report'){
  								if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'activity report'){
	  								$PerformanceArray[$_TS_RANGE_START_ARRAY]['activity_report']++;
  								}

									$_TS_RANGE_START_ARRAY	= $_TS_RANGE_START_ARRAY + 86400;
									$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_ARRAYE + 86400;

								}



						
							$_WhileCount++;

						
						//}


						}
*/



/*
  					//if($_key['action'] == 'processing form'){
  					if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'processing form'){
  						$PerformanceArray[$_TS_RANGE_START_ARRAY]['form_process']++;
  					}

  					//if($_key['action'] == 'activity report'){
  					if($_key['ts'] >= $_TS_RANGE_START_ARRAY && $_key['ts'] <= $_TS_RANGE_START_ARRAYE && $_key['action'] == 'activity report'){
  						$PerformanceArray[$_TS_RANGE_START_ARRAY]['activity_report']++;
  					}
*/
						//$_TS_RANGE_START_ARRAY	= $_TS_RANGE_START_ARRAY + 86400;
						//$_TS_RANGE_START_ARRAYE = $_TS_RANGE_START_ARRAYE + 86400;
						
						//echo $_TS_RANGE_START_ARRAYE.' ';

					//}



				// XML DATATYPE ------------------------------------------------------------------
					//echo "<graph caption='User Action Report Trend' subcaption='RECORDS: ".$_RecordCount." - UPDATED: ".date('h:m:s',time())." - DAY RANGE: ".$_NumDays." Aug 2010' divlinecolor='F47E00' numdivlines='4' showAreaBorder='1' animation='0' areaBorderColor='000000' numberPrefix='' showNames='1' numVDivLines='29' vDivLineAlpha='30' formatNumberScale='1' rotateNames='1'  decimalPrecision='0'>";
					echo "<chart caption='User Action Report Trend' subcaption='RECORDS: ".$_RecordCount." - UPDATED: ".date('h:m:s',time())." - DAY RANGE: ".$_NumDays." Aug 2010' bgColor='000000' bgAlpha='0' canvasBgAlpha='20' canvasBgColor='000000' outCnvBaseFontColor='666666' caption='' captioncolor='ff0000' hoverCapBgColor='ff0000' xAxisName='Date' yAxisName='Number of Events' numberPrefix='' animation='0' showNames='1' showValues='0' plotFillAlpha='60' numVDivLines='10' showAlternateVGridColor='1' AlternateVGridColor='000000' divLineColor='000000' vdivLineColor='000000' baseFontSize='12' baseFontColor='ffffff' rotateLabels='1' canvasBorderThickness='2' showPlotBorder='1' plotBorderThickness='1'>";
					echo "<categories>";

/*
					foreach($Dataset as $key){
						echo "<category name='".date('d',$key['ts'])."' />";
					}
*/					







					//for($_forCounter = 0; $_forCounter <= $_RecordCount; $_forCounter++){
					$_DayGRAPH 				= 1;
					$_TS_RANGE_STARTG	= $_TS_RANGE_START;
					while($_DayGRAPH <= $_NumDays){
						echo "<category label='".date('d', $_TS_RANGE_STARTG)."' />";
						$_DayGRAPH++;
						$_TS_RANGE_STARTG = $_TS_RANGE_STARTG + 86400;
					}
					

					echo "</categories>";



					// activity report data series -----------------------------
					if(count($Array_ActivityReport) > 0){

  					echo "<dataset seriesname='Activity Report' color='FF5904' showValues='1' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='FF0000'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){
  
  						foreach($Array_ActivityReport as $_TS_DAY_ACTIVITY => $_DAY_ACTIVITY_TOTAL){

  							if($_TS_DAY_ACTIVITY == $_TS_RANGE_START_INCREM){
  								echo "<set value='".$_DAY_ACTIVITY_TOTAL."' />";
  							}else{
  								echo "<set value='0' />";
  							}
  						}
  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------




					// processing form report data series ----------------------
					if(count($Array_ProcessingForm) > 0){

  					echo "<dataset seriesname='Processing Form' color='99cc99' showValues='1' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='006600'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){
  
  						foreach($Array_ProcessingForm as $_TS_DAY_PROCESSINGFORM => $_DAY_PROCESSINGFORM_TOTAL){

  							if($_TS_DAY_PROCESSINGFORM == $_TS_RANGE_START_INCREM){
  								echo "<set value='".$_DAY_PROCESSINGFORM_TOTAL."' />";
  							}else{
  								echo "<set value='0' />";
  							}
  						}
  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------



					// MODULE - Transaction - report data series ---------------
					if(count($Array_MODULE_Transaction) > 0){

  					echo "<dataset seriesname='Module.Transaction' color='ff0000' showValues='1' areaAlpha='30' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='ff0000'>";
  
  					$_GRAPH_X_DAY_LABEL			= 0;
  					$_TS_RANGE_START_INCREM	= $_TS_RANGE_START;
  					while($_GRAPH_X_DAY_LABEL <= $_NumDays){
  
  						foreach($Array_MODULE_Transaction as $_TS_DAY_MODULE_TRANSACTION => $_DAY_MODULE_TRANSACTION_TOTAL){

  							if($_TS_DAY_MODULE_TRANSACTION == $_TS_RANGE_START_INCREM){
  								echo "<set value='".$_DAY_MODULE_TRANSACTION_TOTAL."' />";
  							}else{
  								echo "<set value='0' />";
  							}
  						}
  						$_GRAPH_X_DAY_LABEL++;
  						$_TS_RANGE_START_INCREM = $_TS_RANGE_START_INCREM + 86400;
  					}
  					echo "</dataset>";
					}
					// ---------------------------------------------------------





     /*  
      <set value='43653' /> 
      <set value='55565' /> 
      <set value='49457' /> 
      <set value='64654' /> 
      <set value='58457' /> 
      <set value='66456' /> 
      <set value='48765' /> 
      <set value='52574' /> 
      <set value='49546' /> 
      <set value='42346' /> 
      <set value='51765' /> 
      <set value='78456' /> 
      <set value='53867' /> 
      <set value='38359' /> 
      <set value='63756' /> 
      <set value='45554' /> 
      <set value='6543' /> 
      <set value='7555' /> 
      <set value='4567' /> 
      <set value='7544' /> 
      <set value='6565' /> 
      <set value='6433' /> 
      <set value='3465' /> 
      <set value='3574' /> 
      <set value='6646' /> 
      <set value='4546' /> 
      <set value='9565' /> 
      <set value='5456' /> 
      <set value='5667' /> 
      <set value='4359' /> 
   </dataset>

   echo "<dataset seriesname='Activity Report' color='99cc99' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='006600'>
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='13' /> 
      <set value='16' /> 
      <set value='17' /> 
      <set value='12' /> 
      <set value='11' /> 
      <set value='15' /> 
      <set value='16' /> 
      <set value='16' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='0' /> 
      <set value='17' /> 
   </dataset>";
   */
					echo "</chart>";
			break;




			case 'XML2':
				// XML DATATYPE ------------------------------------------------------------------
					echo "<graph caption='CLASS:User Action Report Trend' subcaption='For the month of Aug 2004' divlinecolor='F47E00' numdivlines='4' showAreaBorder='1' areaBorderColor='000000' numberPrefix='' showNames='1' numVDivLines='29' vDivLineAlpha='30' formatNumberScale='1' rotateNames='1'  decimalPrecision='0'>";
					echo "   <categories>
      <category name='08/01' /> 
      <category name='08/02' /> 
      <category name='08/03' /> 
      <category name='08/04' /> 
      <category name='08/05' /> 
      <category name='08/06' /> 
      <category name='08/07' /> 
      <category name='08/08' /> 
      <category name='08/09' /> 
      <category name='08/10' /> 
      <category name='08/11' /> 
      <category name='08/12' /> 
      <category name='08/13' /> 
      <category name='08/14' /> 
      <category name='08/15' /> 
      <category name='08/16' /> 
      <category name='08/17' /> 
      <category name='08/18' /> 
      <category name='08/19' /> 
      <category name='08/20' /> 
      <category name='08/21' /> 
      <category name='08/22' /> 
      <category name='08/23' /> 
      <category name='08/24' /> 
      <category name='08/25' /> 
      <category name='08/26' /> 
      <category name='08/27' /> 
      <category name='08/28' /> 
      <category name='08/29' /> 
      <category name='08/30' /> 
      <category name='08/31' /> 
   </categories>
   <dataset seriesname='Product A' color='FF5904' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='FF0000'>
      <set value='36634' /> 
      <set value='43653' /> 
      <set value='55565' /> 
      <set value='49457' /> 
      <set value='64654' /> 
      <set value='58457' /> 
      <set value='66456' /> 
      <set value='48765' /> 
      <set value='52574' /> 
      <set value='49546' /> 
      <set value='42346' /> 
      <set value='51765' /> 
      <set value='78456' /> 
      <set value='53867' /> 
      <set value='38359' /> 
      <set value='63756' /> 
      <set value='45554' /> 
      <set value='6543' /> 
      <set value='7555' /> 
      <set value='4567' /> 
      <set value='7544' /> 
      <set value='6565' /> 
      <set value='6433' /> 
      <set value='3465' /> 
      <set value='3574' /> 
      <set value='6646' /> 
      <set value='4546' /> 
      <set value='9565' /> 
      <set value='5456' /> 
      <set value='5667' /> 
      <set value='4359' /> 
   </dataset>
   <dataset seriesname='Product B' color='99cc99' showValues='0' areaAlpha='50' showAreaBorder='1' areaBorderThickness='2' areaBorderColor='006600'>
      <set value='12152' /> 
      <set value='15349' /> 
      <set value='16442' /> 
      <set value='17551' /> 
      <set value='13478' /> 
      <set value='16553' /> 
      <set value='17338' /> 
      <set value='17263' /> 
      <set value='16552' /> 
      <set value='17649' /> 
      <set value='12442' /> 
      <set value='11151' /> 
      <set value='15478' /> 
      <set value='16553' /> 
      <set value='16538' /> 
      <set value='17663' /> 
      <set value='13252' /> 
      <set value='16549' /> 
      <set value='14342' /> 
      <set value='13451' /> 
      <set value='15378' /> 
      <set value='17853' /> 
      <set value='17638' /> 
      <set value='14363' /> 
      <set value='10952' /> 
      <set value='10049' /> 
      <set value='19442' /> 
      <set value='13951' /> 
      <set value='19778' /> 
      <set value='18453' /> 
      <set value='17338' /> 
   </dataset>";

					
					echo "</graph>";
					die();
				// END XML DATATYPE --------------------------------------------------------------
			break;



			case 'HTML':
				// HTML DATATYPE -----------------------------------------------------------------

          	?>
          <!-- SM JS lib -->
          	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.REPORTS.uncompressed.js"></script>'; ?>
          <!-- END SM JS lib -->


          
          	<!-- spreadsheet -->
            <div id="spreadsheet_container" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; height: auto; width: 938px; padding-bottom: 5px;">
          
          		<!-- Promolist -->
          		<div id="pBuilder_editTools" style="position: relative; top: 0px; right: 0px; border: 0px solid #ff0; width: 100%; height: auto;">
          
          			<div id="spreadsheet_title" style="position: relative; z-index: 5; top: 2px; left: 2px; border: solid 0px #ffffff; width: 100%; height: 20px; font-size: 18px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
          				<? 
          					// report title --------------
          					echo $Title;
          					
          					// record total --------------
          					//echo '&nbsp;&nbsp;&nbsp; <font color="#dc8c57">Total Records: '.$_RecordCount.'</font>';
          				?>
          			</div>
          
          			<!-- list holder -->
          			<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; width: 100%; height: auto;">


          				<!-- spreadsheet data -->
          				<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 5px; left: 0px; border: dashed 1px #767676; width: 100%; height: auto; overflow: auto;">
          
           					<table cellpadding="2" cellspacing="2" border="0" width="100%" style="background-color: #000;">
                     	<!-- data set -->
          
           						<tr>
                     	<!-- fields -->
                     	<?
                     		foreach($_Array_FIELDS as $_FieldName){
                     			?> 
                     			<td style="color: #fff;">
                     				<label style="color: #fff; cursor: pointer;">
                     					<a <? echo 'onclick="SM_Report_Update(\'form_sales_currentmonth\', \'salesman_current_month.report\', \''.$_FieldName.':asc\');"'; ?>>&uarr;</a>
                     					<a <? echo 'onclick="SM_Report_Update(\'form_sales_currentmonth\', \'salesman_current_month.report\', \''.$_FieldName.':desc\');"'; ?>>&darr;</a>
                     				</label>
														<? echo ucwords($this->FieldName_to_HumanReadable($_FieldName)); ?>
                     			</td>
                     			<?
                     		}
												?>
                     			<td style="color: #fff;">
														Gross Margin per Transaction
                     			</td>
                     		<?
                     		
          						?>
          						<!-- END fields -->
          					 </tr>
          
          						<?						
                     		if(count($Dataset) > 0){
                     	?>
          							<tr>
                     				<?
                             	$i=0;
                               foreach($Dataset as $key){
          
                               	if($_Level == 'extended'){
                               			$_Level = '<font color="#faac05">'.$_PromoName.'</font>';
                             		}else{
                             			$_Level 	= '<i>Default</i>';
                             		}
          
                     						if($i%2==0){
                     							$fgbg = '#1e4972';
                     						}else{
                     							$fgbg = '#14304b';
                     						}
          
          											// check for anonymous user ----------
                     						if($key['userid'] == 999999999){
                     							$_UserName = 'Anonymous';
                     						}else{
                     							$_UserDetails = $this->GetMemberProfile($key['userid']);
                     							$_UserName		=	$_UserDetails->first_name.' '.$_UserDetails->last_name;           							
                     						}
                     						// -----------------------------------

																$_CommissionRate_Details	=	$this->GetCommission_to_CommissionRate($key['direct_commission_id']);



																// compute totals ------------------------------
																//$__GRANDTOTAL_total_client_net	+=	$key['client_net_total'];
																//$__GRANDTOTAL_po_cost						+=	$key['po_cost'];
																//$__GRANDTOTAL_gross_profit			+=	$key['gross_profit'];
																//$__GRANDTOTAL_direct_commission	+=	$_CommissionRate_Details['rate'] * $key['gross_profit'];


                           			?>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['count(id)']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['sum(client_net_total)']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['sum(po_cost)']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['sum(gross_profit)']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo round(100*($key['sum(gross_profit)'] / $key['sum(client_net_total)'])).'%'; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['sum(direct_commission)']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo round($key['sum(gross_profit)'] / $key['count(id)']); ?></font></td>
                    						</tr>
                        				<?
                            		$i++;
                     					}
                 				}
                     	?>


                     	<!-- END dataset -->
          				</table>
           				</div>
           				<!-- END spreadsheet data -->




          
          
          			</div>
          			<!-- END list holder -->
          
          
          		</div>
          		<!-- END Promolist -->
            	
            </div>
          	<!-- END spreadsheet -->
          	<?


				// END HTML DATATYPE -------------------------------------------------------------
			break;
		}




//print_r(array_unique($_Array_FIELDS));
//print_r($__AffiliatesPromos);



	 return $_return;	
	}
	// =================================================================






















	// =================================================================
	public function Report_MANAGER_Primary($Dataset, $Title, $DataType = 'HTML', $Range = null, $TargetReport = null){


		$_return									= false;
		$num_rows									= false;




		// catch NO DATA -------------------
		if($Dataset == 'no data'){
			echo '<center><font color="red" size=3><b>NO DATA AND/OR INVALID RANGE</b></font><br><br><font color="#00ff00" size=3><b>CHANGE RANGE TO REQUERY DATASOURCE</b></font></center>';
			die();
		}
		// ---------------------------------


		// populate fields of dataset ------
		foreach($Dataset as $_Array){
			foreach($_Array as $_field_2 => $_value_2){
				$_Array_FIELDS[] = $_field_2;
			}
		}
		// ---------------------------------


		// get only unique fields ----------
		$_Array_FIELDS 	= array_unique($_Array_FIELDS);

//print_r($_Array_FIELDS);
//die();


		// field count ---------------------
   	$_FieldCount 			= count($_Array_FIELDS);


		// record count --------------------
   	$_RecordCount			= count($Dataset);
		





		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start 						= $_exploded_range_start[0];
    $_day_Start 							= $_exploded_range_start[1];
    $_year_Start 							= $_exploded_range_start[2];
    $_TS_RANGE_START					= @mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
    $_TS_RANGE_START_DAY_END	=	@mktime(23, 59, 59, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------


  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End 							= $_exploded_range_end[0];
    $_day_End 								= $_exploded_range_end[1];
    $_year_End 								= $_exploded_range_end[2];
    //$_TS_RANGE_END						= mktime(0, 0, 0, $_month_End, $_day_End, $_year_End);
    $_TS_RANGE_END						= @mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
    //$_TS_RANGE_DAY_END				= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------
		
		// number of days within range -----
		$_NumDays									=	round((($_TS_RANGE_END - $_TS_RANGE_START) / 86400));


		$_30DaysAgo								= time() - (86400 * 30);
		$_1DayAgo									= time() - 86400;























		switch($DataType){








			case 'HTML':
				// HTML DATATYPE -----------------------------------------------------------------

          	?>
          <!-- SM JS lib -->
          	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.REPORTS.uncompressed.js"></script>'; ?>
          <!-- END SM JS lib -->


          
          	<!-- spreadsheet -->
            <div id="spreadsheet_container" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; height: auto; width: 958px; padding-bottom: 5px;">
          
          		<!-- Promolist -->
          		<div id="pBuilder_editTools" style="position: relative; top: 0px; right: 0px; border: 0px solid #ff0; width: 100%; height: auto;">
          
          			<div id="spreadsheet_title" style="position: relative; z-index: 5; top: 2px; left: 2px; border: solid 0px #ffffff; width: 100%; height: 20px; font-size: 18px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
          				<? 
          					// report title --------------
          					echo $Title;
          					
          					// record total --------------
          					//echo '&nbsp;&nbsp;&nbsp; <font color="#dc8c57">Total Records: '.$_RecordCount.'</font>';
          				?>
          			</div>
          
          			<!-- list holder -->
          			<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; width: 100%; height: auto;">


          				<!-- spreadsheet data -->
          				<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 5px; left: 0px; border: dashed 1px #767676; width: 100%; height: auto; overflow: auto;">
          
           					<table cellpadding="2" cellspacing="2" border="0" width="100%" style="background-color: #000;">
                     	<!-- data set -->
          
           						<tr>


                     	<!-- fields -->
                     	<?
                     		foreach($_Array_FIELDS as $_FieldName){

													if($_FieldName != 'id'){
	                     			?> 
	                     			<td style="color: #fff;">
														<?
														//skip userid field -------------
	  	                 			if($_FieldName != 'sales_person'){
	  	                 			?>
	                     				<label style="color: #fff; cursor: pointer;">
	                     					<?
																	switch($_SESSION['ActiveUser']['user_type']){
										
																		case 'finance':
																			?>
					                     					<a <? echo 'onclick="SM_Report_Update(\'form_organization_currentmonth\', \''.$TargetReport.'\', \''.$_FieldName.':asc\');"'; ?>>&uarr;</a>
					                     					<a <? echo 'onclick="SM_Report_Update(\'form_organization_currentmonth\', \''.$TargetReport.'\', \''.$_FieldName.':desc\');"'; ?>>&darr;</a>
																			<?
																		break;
										
																		case 'executive':
																			?>
					                     					<a <? echo 'onclick="SM_Report_Update(\'form_organization_currentmonth\', \''.$TargetReport.'\', \''.$_FieldName.':asc\');"'; ?>>&uarr;</a>
					                     					<a <? echo 'onclick="SM_Report_Update(\'form_organization_currentmonth\', \''.$TargetReport.'\', \''.$_FieldName.':desc\');"'; ?>>&darr;</a>
																			<?
																		break;
										
										
																		default:
																			?>
					                     					<a <? echo 'onclick="SM_Report_Update(\'form_team_currentmonth\', \''.$TargetReport.'\', \''.$_FieldName.':asc\');"'; ?>>&uarr;</a>
					                     					<a <? echo 'onclick="SM_Report_Update(\'form_team_currentmonth\', \''.$TargetReport.'\', \''.$_FieldName.':desc\');"'; ?>>&darr;</a>
																			<?
																		break;
																		
																	}
	                     					?>
	                     				</label>
	                     			<? } ?>
															<? echo ucwords($this->FieldName_to_HumanReadable($_FieldName)); ?>
	                     			</td>
	                     			<?
	                     		}
                     		}
          						?>
          						<!-- END fields -->
          					 </tr>
          
          						<?						
                     		if(count($Dataset) > 0){
                     	?>
          							<tr>
                     				<?
                             	$i=0;
                               foreach($Dataset as $key){
          
                               	if($_Level == 'extended'){
                               			$_Level = '<font color="#faac05">'.$_PromoName.'</font>';
                             		}else{
                             			$_Level 	= '<i>Default</i>';
                             		}
          
                     						if($i%2==0){
                     							$fgbg = '#1e4972';
                     						}else{
                     							$fgbg = '#14304b';
                     						}
          
          											// check for anonymous user ----------
                     						if($key['userid'] == 999999999){
                     							$_UserName = 'Anonymous';
                     						}else{
                     							$_UserDetails = $this->GetMemberProfile($key['userid']);
                     							$_UserName		=	$_UserDetails->first_name.' '.$_UserDetails->last_name;           							
                     						}
                     						// -----------------------------------

																$_CommissionRate_Details	=	$this->GetCommission_to_CommissionRate($key['direct_commission_id']);



																// compute totals ------------------------------
																$__GRANDTOTAL_total_client_net	+=	$key['client_net_total'];
																$__GRANDTOTAL_po_cost						+=	$key['po_cost'];
																$__GRANDTOTAL_gross_profit			+=	$key['gross_profit'];
																$__GRANDTOTAL_direct_commission	+=	$key['direct_commission'];


                           			?>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['io']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $this->UserID_to_UserInitials($key['sales_person_id']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="middle"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo strtoupper($key['sold_month']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="middle"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo 'Q'.$key['sold_quarter']; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $this->AdvertiserID_to_AdvertiserName($key['advertiser_id']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="middle"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['client_net_total']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="middle"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['po_cost']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="middle"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['gross_profit']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="middle"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['profit_percentage'].'%'; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="middle"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['direct_commission']); ?></font></td>
																	<td bgcolor="<? echo $fgbg; ?>" align="middle"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ucwords($this->MediumID_to_MediumType($key['medium_id'])); ?></font></td>
																	<?
																	
																		// KILL TRANSACTION if ADMIN || GOD -----------------
																		if($_SESSION['ActiveUser']['user_type'] == 'finance' || $_SESSION['ActiveUser']['user_type'] == 'god'){
																			?>
																				<!-- delete -->
			                    							<td align="middle">
			                    								<img id="input_delete_<? echo $key['id']; ?>" <? echo 'onclick="SM_recordEdit(\'transaction.edit\', \'transaction.delete\', \''.$this->Encrypt($key['id'], 'private').'\');"'; ?> src="common/img/icons/icon_20x20_redx.png" border="0" style="cursor: pointer;" />
			                    							</td>
			                    							<!-- END delete -->

			                    							<!-- disable/enable -->
			                    							<td align="center" bgcolor="<? echo $fgbg; ?>">
			          													<?
																						if(!$key['revised']){
																							?>
																							<!-- <input id="input_edit_<? echo $key['id']; ?>" type="button" value="EDIT" class="reportControl_button_submit" <? echo 'onclick="SM_recordEdit(\'transaction.edit\', \'transaction.edit\', \''.$this->Encrypt($key['id'], 'private').'\');"'; ?> /> -->
																							<input id="input_edit_<? echo $key['id']; ?>" type="button" value="EDIT" class="reportControl_button_submit" <? echo 'onclick="SM_TransactionEdit(\''.$this->Encrypt($key['id'], 'private').'\');"'; ?> />
																							<?
																						}else{
																							echo '<font size="3" color="white"><b>R</b></font>';
																						}
			          													?>
			                    							</td>
																				<!-- END disable/enable -->

																			<?
																		}
																	?>

                    						</tr>
                        				<?
                            		$i++;
                     					}
                 				}
                     	?>

																<tr>
                    							<td bgcolor="#830805" align="middle" colspan="5"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;">Grand Total</font></td>
                    							<td bgcolor="#830805" align="middle"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo number_format($__GRANDTOTAL_total_client_net); ?></font></td>
                    							<td bgcolor="#830805" align="middle"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo number_format($__GRANDTOTAL_po_cost); ?></font></td>
                    							<td bgcolor="#830805" align="middle"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo number_format($__GRANDTOTAL_gross_profit); ?></font></td>
                    							<td bgcolor="#830805" align="middle"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo round(100*($__GRANDTOTAL_gross_profit / $__GRANDTOTAL_total_client_net)).'%'; ?></font></td>
                    							<td bgcolor="#830805" align="middle"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo number_format($__GRANDTOTAL_direct_commission); ?></font></td>
                    						</tr>


                     	<!-- END dataset -->
          				</table>
           				</div>
           				<!-- END spreadsheet data -->




          
          
          			</div>
          			<!-- END list holder -->
          
          
          		</div>
          		<!-- END Promolist -->
            	
            </div>
          	<!-- END spreadsheet -->
          	<?


				// END HTML DATATYPE -------------------------------------------------------------
			break;








			case 'PDF':
				// PDF DATATYPE ------------------------------------------------------------------





$_HTML = '<table cellpadding="2" cellspacing="2" border="0" style="background-color: #000; width: 100%; height: 25px;">';
$_HTML .= '<tr>';
$_HTML .= '<td valign="middle" style="color: #a3f59b; font-size: 30px; font-weight: bold; text-decoration: none; font-family: helvetica; background-color: #333333;">&nbsp;'.$Title.'</td>';
$_HTML .= '<td align="right" style="color: #000000; font-size: 30px; text-decoration: none; font-family: helvetica; background-color: #333333;"><img src="common/img/logo/unlimicore-logo-pdf-corner.jpg"/></td>';
$_HTML .= '</tr>';
$_HTML .= '</table>';



$_HTML .= '<table cellpadding="2" cellspacing="2" border="0" width="100%" style="background-color: #000000;">';
$_HTML .= '<tr>';
                     		foreach($_Array_FIELDS as $_FieldName){
                     			if($_FieldName != 'id'){
$_HTML .= '        			<td style="color: #ffffff; font-size: 12px; text-decoration: none; font-family: helvetica;">
                     					'.ucwords($this->FieldName_to_HumanReadable($_FieldName)).'
                     		</td>';
                     			}
                     		}
$_HTML .= '</tr>';




                     		if(count($Dataset) > 0){



                             	$i=0;
                               foreach($Dataset as $key){

                     						if($i%2==0){
                     							$fgbg = '#dddddd';
                     						}else{
                     							$fgbg = '#ffffff';
                     						}
          
          											// check for anonymous user ----------
                     						if($key['userid'] == 999999999){
                     							$_UserName = 'Anonymous';
                     						}else{
                     							$_UserDetails = $this->GetMemberProfile($key['userid']);
                     							$_UserName		=	$_UserDetails->first_name.' '.$_UserDetails->last_name;           							
                     						}

																// compute totals ------------------------------
																$__GRANDTOTAL_total_client_net	+=	$key['client_net_total'];
																$__GRANDTOTAL_po_cost						+=	$key['po_cost'];
																$__GRANDTOTAL_gross_profit			+=	$key['gross_profit'];
																$__GRANDTOTAL_direct_commission	+=	$key['direct_commission'];
                     						// -----------------------------------




$_HTML .= '<tr>';
$_HTML .= '<td width="60" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.$key['io'].'</font></td>';
$_HTML .= '<td width="20" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.$this->UserID_to_UserInitials($key['sales_person_id']).'</font></td>';
$_HTML .= '<td width="20" align="middle" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.strtoupper($key['sold_month']).'</font></td>';
$_HTML .= '<td width="20" align="middle" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">Q'.$key['sold_quarter'].'</font></td>';
$_HTML .= '<td width="60" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.$this->AdvertiserID_to_AdvertiserName($key['advertiser_id']).'</font></td>';
$_HTML .= '<td width="60" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.number_format($key['client_net_total']).'</font></td>';
$_HTML .= '<td width="30" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.number_format($key['po_cost']).'</font></td>';
$_HTML .= '<td width="30" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.number_format($key['gross_profit']).'</font></td>';
$_HTML .= '<td width="20" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.$key['profit_percentage'].'%</font></td>';
$_HTML .= '<td width="20" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.number_format($key['direct_commission']).'</font></td>';
$_HTML .= '<td width="20" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.ucwords($this->MediumID_to_MediumType($key['medium_id'])).'</font></td>';
$_HTML .= '</tr>';


                            		$i++;
                     					}


$_HTML .= '<tr>';
$_HTML .= '<td width="120" colspan="5" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">Grand Total</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.number_format($__GRANDTOTAL_total_client_net).'</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.number_format($__GRANDTOTAL_po_cost).'</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.number_format($__GRANDTOTAL_gross_profit).'</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.round(100*($__GRANDTOTAL_gross_profit / $__GRANDTOTAL_total_client_net)).'%'.'</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.number_format($__GRANDTOTAL_direct_commission).'</font></td>';
$_HTML .= '</tr>';



                 				}







$_HTML .= 	'</table>';




return $_HTML;


				// END PDF DATATYPE -------------------------------------------------------------
			break;

		}








	 return $_return;	
	}
	// =================================================================
















	// =================================================================
	public function Report_SalesPerson_Primary($Dataset, $Title, $DataType = 'HTML', $Range = null, $TargetReport = null){


		$_return									= false;
		$num_rows									= false;




		// catch NO DATA -------------------
		if($Dataset == 'no data'){
			echo '<center><font color="red" size=3><b>NO DATA AND/OR INVALID RANGE</b></font><br><br><font color="#00ff00" size=3><b>CHANGE RANGE TO REQUERY DATASOURCE</b></font></center>';
			die();
		}
		// ---------------------------------


		// populate fields of dataset ------
		foreach($Dataset as $_Array){
			foreach($_Array as $_field_2 => $_value_2){
				$_Array_FIELDS[] = $_field_2;
			}
		}
		// ---------------------------------


		// get only unique fields ----------
		$_Array_FIELDS 	= array_unique($_Array_FIELDS);

//print_r($_Array_FIELDS);
//die();


		// field count ---------------------
   	$_FieldCount 			= count($_Array_FIELDS);


		// record count --------------------
   	$_RecordCount			= count($Dataset);
		





		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start 						= $_exploded_range_start[0];
    $_day_Start 							= $_exploded_range_start[1];
    $_year_Start 							= $_exploded_range_start[2];
    $_TS_RANGE_START					= @mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
    $_TS_RANGE_START_DAY_END	=	@mktime(23, 59, 59, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------


  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End 							= $_exploded_range_end[0];
    $_day_End 								= $_exploded_range_end[1];
    $_year_End 								= $_exploded_range_end[2];
    //$_TS_RANGE_END						= mktime(0, 0, 0, $_month_End, $_day_End, $_year_End);
    $_TS_RANGE_END						= @mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
    //$_TS_RANGE_DAY_END				= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------
		
		// number of days within range -----
		$_NumDays									=	round((($_TS_RANGE_END - $_TS_RANGE_START) / 86400));


		$_30DaysAgo								= time() - (86400 * 30);
		$_1DayAgo									= time() - 86400;























		switch($DataType){








			case 'HTML':
				// HTML DATATYPE -----------------------------------------------------------------

          	?>
          <!-- SM JS lib -->
          	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.REPORTS.uncompressed.js"></script>'; ?>
          <!-- END SM JS lib -->


          
          	<!-- spreadsheet -->
            <div id="spreadsheet_container" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; height: auto; width: 938px; padding-bottom: 5px;">
          
          		<!-- Promolist -->
          		<div id="pBuilder_editTools" style="position: relative; top: 0px; right: 0px; border: 0px solid #ff0; width: 100%; height: auto;">
          
          			<div id="spreadsheet_title" style="position: relative; z-index: 5; top: 2px; left: 2px; border: solid 0px #ffffff; width: 100%; height: 20px; font-size: 18px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
          				<? 
          					// report title --------------
          					echo $Title;
          					
          					// record total --------------
          					//echo '&nbsp;&nbsp;&nbsp; <font color="#dc8c57">Total Records: '.$_RecordCount.'</font>';
          				?>
          			</div>
          
          			<!-- list holder -->
          			<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; width: 100%; height: auto;">


          				<!-- spreadsheet data -->
          				<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 5px; left: 0px; border: dashed 1px #767676; width: 100%; height: auto; overflow: auto;">
          
           					<table cellpadding="2" cellspacing="2" border="0" width="100%" style="background-color: #000;">
                     	<!-- data set -->
          
           						<tr>
                     	<!-- fields -->
                     	<?
                     		foreach($_Array_FIELDS as $_FieldName){
                     			?> 
                     			<td style="color: #fff;">
                     				<label style="color: #fff; cursor: pointer;">
                     					<a <? echo 'onclick="SM_Report_Update(\'form_sales_currentmonth\', \''.$TargetReport.'\', \''.$_FieldName.':asc\');"'; ?>>&uarr;</a>
                     					<a <? echo 'onclick="SM_Report_Update(\'form_sales_currentmonth\', \''.$TargetReport.'\', \''.$_FieldName.':desc\');"'; ?>>&darr;</a>
                     				</label>
														<? echo ucwords($this->FieldName_to_HumanReadable($_FieldName)); ?>
                     			</td>
                     			<?
                     		}
          						?>
          						<!-- END fields -->
          					 </tr>
          
          						<?						
                     		if(count($Dataset) > 0){
                     	?>
          							<tr>
                     				<?
                             	$i=0;
                               foreach($Dataset as $key){
          
                               	if($_Level == 'extended'){
                               			$_Level = '<font color="#faac05">'.$_PromoName.'</font>';
                             		}else{
                             			$_Level 	= '<i>Default</i>';
                             		}
          
                     						if($i%2==0){
                     							$fgbg = '#1e4972';
                     						}else{
                     							$fgbg = '#14304b';
                     						}
          
          											// check for anonymous user ----------
                     						if($key['userid'] == 999999999){
                     							$_UserName = 'Anonymous';
                     						}else{
                     							$_UserDetails = $this->GetMemberProfile($key['userid']);
                     							$_UserName		=	$_UserDetails->first_name.' '.$_UserDetails->last_name;           							
                     						}
                     						// -----------------------------------

																$_CommissionRate_Details					=	$this->GetCommission_to_CommissionRate($key['direct_commission_id']);
																$_CommissionRate_Details_OVERRIDE	=	$this->GetCommission_to_CommissionRate($key['override_commission_id']);


																// compute totals ------------------------------
																$__GRANDTOTAL_total_client_net	+=	$key['client_net_total'];
																$__GRANDTOTAL_po_cost						+=	$key['po_cost'];
																$__GRANDTOTAL_gross_profit			+=	$key['gross_profit'];
																$__GRANDTOTAL_direct_commission	+=	$key['direct_commission'];
																$__GRANDTOTAL_override_comm			+=	$_CommissionRate_Details_OVERRIDE['rate'];
																


                           			?>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $this->AdvertiserID_to_AdvertiserName($key['advertiser_id']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['client_net_total']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['po_cost']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['gross_profit']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['profit_percentage'].'%'; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['direct_commission']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $_CommissionRate_Details_OVERRIDE['name']; ?></font></td>
                    						</tr>
                        				<?
                            		$i++;
                     					}
                 				}
                     	?>

																<tr>
                    							<td bgcolor="#830805" align="center"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;">Grand Total</font></td>
                    							<td bgcolor="#830805" align="center"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo number_format($__GRANDTOTAL_total_client_net); ?></font></td>
                    							<td bgcolor="#830805" align="center"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo number_format($__GRANDTOTAL_po_cost); ?></font></td>
                    							<td bgcolor="#830805" align="center"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo number_format($__GRANDTOTAL_gross_profit); ?></font></td>
                    							<td bgcolor="#830805" align="center"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo round(100*($__GRANDTOTAL_gross_profit / $__GRANDTOTAL_total_client_net)).'%'; ?></font></td>
                    							<td bgcolor="#830805" align="center"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo number_format($__GRANDTOTAL_direct_commission); ?></font></td>
                    							<td bgcolor="#830805" align="center"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo number_format($__GRANDTOTAL_override_comm * 100); ?></font></td>
                    						</tr>


                     	<!-- END dataset -->
          				</table>
           				</div>
           				<!-- END spreadsheet data -->




          
          
          			</div>
          			<!-- END list holder -->
          
          
          		</div>
          		<!-- END Promolist -->
            	
            </div>
          	<!-- END spreadsheet -->
          	<?


				// END HTML DATATYPE -------------------------------------------------------------
			break;








			case 'PDF':
				// PDF DATATYPE ------------------------------------------------------------------





$_HTML = '<table cellpadding="2" cellspacing="2" border="0" style="background-color: #000; width: 100%; height: 25px;">';
$_HTML .= '<tr>';
$_HTML .= '<td valign="middle" style="color: #a3f59b; font-size: 30px; font-weight: bold; text-decoration: none; font-family: helvetica; background-color: #333333;">&nbsp;'.$Title.'</td>';
$_HTML .= '<td align="right" style="color: #000000; font-size: 30px; text-decoration: none; font-family: helvetica; background-color: #333333;"><img src="common/img/logo/unlimicore-logo-pdf-corner.jpg"/></td>';
$_HTML .= '</tr>';
$_HTML .= '</table>';



$_HTML .= '<table cellpadding="2" cellspacing="2" border="0" width="100%" style="background-color: #000000;">';
$_HTML .= '<tr>';
                     		foreach($_Array_FIELDS as $_FieldName){
$_HTML .= '        			<td style="color: #ffffff; font-size: 14px; text-decoration: none; font-family: helvetica;">
                     					'.ucwords($this->FieldName_to_HumanReadable($_FieldName)).'
                     		</td>';
                     		}
$_HTML .= '</tr>';




                     		if(count($Dataset) > 0){



                             	$i=0;
                               foreach($Dataset as $key){

                     						if($i%2==0){
                     							$fgbg = '#dddddd';
                     						}else{
                     							$fgbg = '#ffffff';
                     						}
          
          											// check for anonymous user ----------
                     						if($key['userid'] == 999999999){
                     							$_UserName = 'Anonymous';
                     						}else{
                     							$_UserDetails = $this->GetMemberProfile($key['userid']);
                     							$_UserName		=	$_UserDetails->first_name.' '.$_UserDetails->last_name;           							
                     						}

																// compute totals ------------------------------
																$__GRANDTOTAL_total_client_net	+=	$key['client_net_total'];
																$__GRANDTOTAL_po_cost						+=	$key['po_cost'];
																$__GRANDTOTAL_gross_profit			+=	$key['gross_profit'];
																$__GRANDTOTAL_direct_commission	+=	$key['direct_commission'];

                     						// -----------------------------------
                    						

$_HTML .= '<tr>';
$_HTML .= '<td width="120" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.$this->AdvertiserID_to_AdvertiserName($key['advertiser_id']).'</font></td>';
$_HTML .= '<td width="60" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.number_format($key['client_net_total']).'</font></td>';
$_HTML .= '<td width="60" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.number_format($key['po_cost']).'</font></td>';
$_HTML .= '<td width="60" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.number_format($key['gross_profit']).'</font></td>';
$_HTML .= '<td width="60" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.$key['profit_percentage'].'%'.'</font></td>';
$_HTML .= '<td width="60" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.number_format($key['direct_commission']).'</font></td>';
$_HTML .= '</tr>';


                            		$i++;
                     					}


$_HTML .= '<tr>';
$_HTML .= '<td width="120" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">Grand Total</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.number_format($__GRANDTOTAL_total_client_net).'</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.number_format($__GRANDTOTAL_po_cost).'</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.number_format($__GRANDTOTAL_gross_profit).'</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.round(100*($__GRANDTOTAL_gross_profit / $__GRANDTOTAL_total_client_net)).'%'.'</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.number_format($__GRANDTOTAL_direct_commission).'</font></td>';
$_HTML .= '</tr>';



                 				}







$_HTML .= 	'</table>';




return $_HTML;


				// END PDF DATATYPE -------------------------------------------------------------
			break;

		}








	 return $_return;	
	}
	// =================================================================













	// =================================================================
	public function Report_Manager_Primary_DYNDASHCOMPOSITE($Dataset, $Title, $DataType = 'HTML', $Range = null, $TargetReport = null){


		$_return									= false;
		$num_rows									= false;




		// catch NO DATA -------------------
		if($Dataset == 'no data'){
			echo '<center><font color="red" size=3><b>NO DATA AND/OR INVALID RANGE</b></font><br><br><font color="#00ff00" size=3><b>CHANGE RANGE TO REQUERY DATASOURCE</b></font></center>';
			die();
		}
		// ---------------------------------


		// populate fields of dataset ------
		foreach($Dataset as $_Array){
			foreach($_Array as $_field_2 => $_value_2){
				$_Array_FIELDS[] = $_field_2;
			}
		}
		// ---------------------------------


		// get only unique fields ----------
		$_Array_FIELDS 	= array_unique($_Array_FIELDS);

//print_r($_Array_FIELDS);
//die();


		// field count ---------------------
   	$_FieldCount 			= count($_Array_FIELDS);


		// record count --------------------
   	$_RecordCount			= count($Dataset);
		





		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start 						= $_exploded_range_start[0];
    $_day_Start 							= $_exploded_range_start[1];
    $_year_Start 							= $_exploded_range_start[2];
    $_TS_RANGE_START					= @mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
    $_TS_RANGE_START_DAY_END	=	@mktime(23, 59, 59, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------


  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End 							= $_exploded_range_end[0];
    $_day_End 								= $_exploded_range_end[1];
    $_year_End 								= $_exploded_range_end[2];
    //$_TS_RANGE_END						= mktime(0, 0, 0, $_month_End, $_day_End, $_year_End);
    $_TS_RANGE_END						= @mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
    //$_TS_RANGE_DAY_END				= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------
		
		// number of days within range -----
		$_NumDays									=	round((($_TS_RANGE_END - $_TS_RANGE_START) / 86400));


		$_30DaysAgo								= time() - (86400 * 30);
		$_1DayAgo									= time() - 86400;







		switch($DataType){








			case 'HTML':
				// HTML DATATYPE -----------------------------------------------------------------

          	?>
          <!-- SM JS lib -->
          	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.REPORTS.uncompressed.js"></script>'; ?>
          <!-- END SM JS lib -->


          
          	<!-- spreadsheet -->
            <div id="spreadsheet_container" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; height: auto; width: 938px; padding-bottom: 5px;">
          
          		<!-- Promolist -->
          		<div id="pBuilder_editTools" style="position: relative; top: 0px; right: 0px; border: 0px solid #ff0; width: 100%; height: auto;">
          
          			<div id="spreadsheet_title" style="position: relative; z-index: 5; top: 2px; left: 2px; border: solid 0px #ffffff; width: 100%; height: 20px; font-size: 18px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
          				<? 
          					// report title --------------
          					echo $Title;
          					
          					// record total --------------
          					//echo '&nbsp;&nbsp;&nbsp; <font color="#dc8c57">Total Records: '.$_RecordCount.'</font>';
          				?>
          			</div>
          
          			<!-- list holder -->
          			<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 0px; left: 0px; border: solid 0px #ffffff; width: 100%; height: auto;">


          				<!-- spreadsheet data -->
          				<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 5px; left: 0px; border: dashed 1px #767676; width: 100%; height: auto; overflow: auto;">
          
           					<table cellpadding="2" cellspacing="2" border="0" width="100%" style="background-color: #000;">
                     	<!-- data set -->
          
           						<tr>
                     	<!-- fields -->
                     	<?
                     		foreach($_Array_FIELDS as $_FieldName){
                     			?> 
                     			<td style="color: #fff;">
                     				<label style="color: #fff; cursor: pointer;">
                     					<a <? echo 'onclick="SM_Report_Update(\'form_sales_currentmonth\', \''.$TargetReport.'\', \''.$_FieldName.':asc\');"'; ?>>&uarr;</a>
                     					<a <? echo 'onclick="SM_Report_Update(\'form_sales_currentmonth\', \''.$TargetReport.'\', \''.$_FieldName.':desc\');"'; ?>>&darr;</a>
                     				</label>
														<? echo ucwords($this->FieldName_to_HumanReadable($_FieldName)); ?>
                     			</td>
                     			<?
                     		}
          						?>
          						<!-- END fields -->
          					 </tr>
          
          						<?						
                     		if(count($Dataset) > 0){
                     	?>
          							<tr>
                     				<?
                             	$i=0;
                               foreach($Dataset as $key){
          
                               	if($_Level == 'extended'){
                               			$_Level = '<font color="#faac05">'.$_PromoName.'</font>';
                             		}else{
                             			$_Level 	= '<i>Default</i>';
                             		}
          
                     						if($i%2==0){
                     							$fgbg = '#1e4972';
                     						}else{
                     							$fgbg = '#14304b';
                     						}
          
          											// check for anonymous user ----------
                     						if($key['userid'] == 999999999){
                     							$_UserName = 'Anonymous';
                     						}else{
                     							$_UserDetails = $this->GetMemberProfile($key['userid']);
                     							$_UserName		=	$_UserDetails->first_name.' '.$_UserDetails->last_name;           							
                     						}
                     						// -----------------------------------

																$_CommissionRate_Details	=	$this->GetCommission_to_CommissionRate($key['direct_commission_id']);



																// compute totals ------------------------------
																$__GRANDTOTAL_total_client_net	+=	$key['client_net_total'];
																$__GRANDTOTAL_po_cost						+=	$key['po_cost'];
																$__GRANDTOTAL_gross_profit			+=	$key['gross_profit'];
																$__GRANDTOTAL_direct_commission	+=	$key['direct_commission'];


                           			?>
                    							<td bgcolor="<? echo $fgbg; ?>"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $this->UserID_to_UserInitials($key['sales_person_id']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $this->AdvertiserID_to_AdvertiserName($key['advertiser_id']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['client_net_total']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['po_cost']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['gross_profit']); ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo $key['profit_percentage'].'%'; ?></font></td>
                    							<td bgcolor="<? echo $fgbg; ?>" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo number_format($key['direct_commission']); ?></font></td>
                    						</tr>
                        				<?
                            		$i++;
                     					}
                 				}
                     	?>

																<tr>
                    							<td bgcolor="#830805" align="center" colspan="2"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;">Grand Total</font></td>
                    							<td bgcolor="#830805" align="center"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo number_format($__GRANDTOTAL_total_client_net); ?></font></td>
                    							<td bgcolor="#830805" align="center"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo number_format($__GRANDTOTAL_po_cost); ?></font></td>
                    							<td bgcolor="#830805" align="center"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo number_format($__GRANDTOTAL_gross_profit); ?></font></td>
                    							<td bgcolor="#830805" align="center"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo round(100*($__GRANDTOTAL_gross_profit / $__GRANDTOTAL_total_client_net)).'%'; ?></font></td>
                    							<td bgcolor="#830805" align="center"><font style="color: #ffffff; font-size: 12px; font-weight: bold;  text-decoration: none;"><? echo number_format($__GRANDTOTAL_direct_commission); ?></font></td>
                    						</tr>


                     	<!-- END dataset -->
          				</table>
           				</div>
           				<!-- END spreadsheet data -->




          
          
          			</div>
          			<!-- END list holder -->
          
          
          		</div>
          		<!-- END Promolist -->
            	
            </div>
          	<!-- END spreadsheet -->
          	<?


				// END HTML DATATYPE -------------------------------------------------------------
			break;








			case 'PDF':
				// PDF DATATYPE ------------------------------------------------------------------





$_HTML = '<table cellpadding="2" cellspacing="2" border="0" style="background-color: #000; width: 100%; height: 25px;">';
$_HTML .= '<tr>';
$_HTML .= '<td valign="middle" style="color: #a3f59b; font-size: 30px; font-weight: bold; text-decoration: none; font-family: helvetica; background-color: #333333;">&nbsp;'.$Title.'</td>';
$_HTML .= '<td align="right" style="color: #000000; font-size: 30px; text-decoration: none; font-family: helvetica; background-color: #333333;"><img src="common/img/logo/unlimicore-logo-pdf-corner.jpg"/></td>';
$_HTML .= '</tr>';
$_HTML .= '</table>';



$_HTML .= '<table cellpadding="2" cellspacing="2" border="0" width="100%" style="background-color: #000000;">';
$_HTML .= '<tr>';
                     		foreach($_Array_FIELDS as $_FieldName){
$_HTML .= '        			<td style="color: #ffffff; font-size: 14px; text-decoration: none; font-family: helvetica;">
                     					'.ucwords($this->FieldName_to_HumanReadable($_FieldName)).'
                     		</td>';
                     		}
$_HTML .= '</tr>';




                     		if(count($Dataset) > 0){



                             	$i=0;
                               foreach($Dataset as $key){

                     						if($i%2==0){
                     							$fgbg = '#dddddd';
                     						}else{
                     							$fgbg = '#ffffff';
                     						}
          
          											// check for anonymous user ----------
                     						if($key['userid'] == 999999999){
                     							$_UserName = 'Anonymous';
                     						}else{
                     							$_UserDetails = $this->GetMemberProfile($key['userid']);
                     							$_UserName		=	$_UserDetails->first_name.' '.$_UserDetails->last_name;           							
                     						}

																// compute totals ------------------------------
																$__GRANDTOTAL_total_client_net	+=	$key['client_net_total'];
																$__GRANDTOTAL_po_cost						+=	$key['po_cost'];
																$__GRANDTOTAL_gross_profit			+=	$key['gross_profit'];
																$__GRANDTOTAL_direct_commission	+=	$key['direct_commission'];

                     						// -----------------------------------
                    						

$_HTML .= '<tr>';
$_HTML .= '<td width="120" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.$this->AdvertiserID_to_AdvertiserName($key['advertiser_id']).'</font></td>';
$_HTML .= '<td width="60" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.number_format($key['client_net_total']).'</font></td>';
$_HTML .= '<td width="60" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.number_format($key['po_cost']).'</font></td>';
$_HTML .= '<td width="60" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.number_format($key['gross_profit']).'</font></td>';
$_HTML .= '<td width="60" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.$key['profit_percentage'].'%'.'</font></td>';
$_HTML .= '<td width="60" bgcolor="'.$fgbg.'"><font style="color: #000000; font-size: 12px; text-decoration: none; font-family: helvetica;">'.number_format($key['direct_commission']).'</font></td>';
$_HTML .= '</tr>';


                            		$i++;
                     					}


$_HTML .= '<tr>';
$_HTML .= '<td width="120" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">Grand Total</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.number_format($__GRANDTOTAL_total_client_net).'</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.number_format($__GRANDTOTAL_po_cost).'</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.number_format($__GRANDTOTAL_gross_profit).'</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.round(100*($__GRANDTOTAL_gross_profit / $__GRANDTOTAL_total_client_net)).'%'.'</font></td>';
$_HTML .= '<td width="60" bgcolor="#ff9595"><font style="color: #000000; font-size: 14px; font-weight: bold; text-decoration: none; font-family: helvetica;">'.number_format($__GRANDTOTAL_direct_commission).'</font></td>';
$_HTML .= '</tr>';



                 				}







$_HTML .= 	'</table>';




return $_HTML;


				// END PDF DATATYPE -------------------------------------------------------------
			break;

		}








	 return $_return;	
	}
	// =================================================================











  // METHOD :: matrix creator ========================================
  //public function MatrixPromo($NumColumns, $NumRows){
  public function MatrixPromo($Dataset){

		$NumColumns = 5;
		$numrows		= 10;


    ?>
    
    
    
    <style>
    #link_container {
      position: 				relative;
      margin:						0;
      padding:					0;
      width:						300px;
      height: 					auto;
      border: 					1px solid #fff;
      top:							-10px;
    	left:							0px;
    	z-index:					1;
    	/* background:				#4b8de3; */
    }
    
    #link_link {
      position: 				absolute;
      margin:						0;
      padding:					0;
      width:						278px;
      height: 					20px;
      border: 					0px solid #fff;
      top:							0px;
    	left:							15px;
    	font-color:				white;
    	z-index:					100;
    	text-decoration:	none;
    }
    
    #link_rating {
      position: 				absolute;
      margin:						0;
      padding:					0;
      width:						50px;
      height: 					20px;
      border: 					0px solid #fff;
      top:							1px;
      z-index:					1;
    	/*right:						14px;*/
    }
    
    #link_ball {
      position: 				absolute;
      margin:						0;
      padding:					0;
      width:						22px;
      height: 					20px;
      border: 					0px solid #fff;
      top:							1px;
    	left:						  0px;
    	text-align:				left;
    	z-index:					1;
    }

    #link_thumb {
      position: 				relative;
      margin:						0;
      padding:					0;
      width:						100px;
      height: 					60px;
      border: 					1px solid #fff;
      top:							1px;
    	left:						  0px;
    	text-align:				left;
    	z-index:					1;
    }    
    
    
    #link_level1 {
      position: 				relative;
      margin:						9px 0 0 0;
      padding:					0;
      width:						300px;
      height: 					21px;
      border: 					0px solid #fff;
      top:							0px;
    	left:							0px;
    	text-align:				left;
    	background-image:	url(http://egenerations.com/common/img/widgetparts/rating_bar/bg_rating_level1.png);
    	background-repeat:no-repeat;
    	z-index:					1;

    }
    
    #link_level2 {
      position: 				relative;
      margin:						9px 0 0 0;
      padding:					0;
      width:						300px;
      height: 					21px;
      border: 					0px solid #fff;
      top:							0px;
    	left:							0px;
    	text-align:				left;
    	background-image:	url(http://egenerations.com/common/img/widgetparts/rating_bar/bg_rating_level2.png);
    	background-repeat:no-repeat;
    	z-index:					1;
    }
    
    #link_level3 {
      position: 				relative;
      margin:						9px 0 0 0;
      padding:					0;
      width:						300px;
      height: 					21px;
      border: 					0px solid #fff;
      top:							0px;
    	left:							0px;
    	text-align:				left;
    	background-image:	url(http://egenerations.com/common/img/widgetparts/rating_bar/bg_rating_level3.png);
    	background-repeat:no-repeat;
    	z-index:					1;
    }
    </style>




    <div id="link_container">
    	<table border=1 cellspacing=1 cellpadding=1>
    		<tr>
    	<?
    		
    		if($numrows){

     			$_counter	=	1;
     			foreach($Dataset as $key){
  
  
      			//$URL			=	mysql_result($sql2,$i,"url");
      			//$title		=	mysql_result($sql2,$i,"title");
      			//$snippet	=	mysql_result($sql2,$i,"description");
      			//$story		=	mysql_result($sql2,$i,"story");
      			//$featureid=	mysql_result($sql2,$i,"id");
      			//$date			=	mysql_result($sql2,$i,"tscreated");
      			//$level		=	mysql_result($sql2,$i,"classid");
      			//$views		=	mysql_result($sql2,$i,"visits");
  
      			//$title_num_char		= strlen($title);
      			//$title_num_words 	= count(explode(" ", $title));
  
  
      	?>
      		<td width=100 height=70>
      			<?
      				//$this->ThumbnailGenerator(1, $key);
      				echo '<font color=white>'.print_r($key).'</font>';
      			?>
      		</td>
      		<?
      		if($_counter % $NumColumns == 0){
      			?> </tr><tr><?
      		}
      		?>
  
      	<?
      		$_counter++;
      	}
      	?>
      </table>
      
      </div>
     <?

    		}else{

	      	?>
  	    		<td width=50 height=25>
							<font style="font-size: 15px; color: #ffc000">None Found!</font>
      			</td>

      </table>

      </div>
      <?
    		}




  }
	// =================================================================














	// =================================================================
	public function Timestamp_Start_Today(){

		$_return					= mktime(0, 0, 0, date('m',time()), date('d',time()), date('Y',time()));

	 return $_return;	
	}
	// =================================================================







	// =================================================================
	public function Timestamp_End_Today(){

		$_return					= mktime(23, 59, 59, date('m',time()), date('d',time()), date('Y',time()));

	 return $_return;	
	}
	// =================================================================







	// =================================================================
	public function Month_to_MonthFirstTS($Month, $Year){

		$_return					= strtotime($Year . "-" . $Month . "-01");

	 return $_return;	
	}
	// =================================================================










	// =================================================================
	public function Filter_Non_Numeric($Data){

		$_return		=	false;
		$Data				=	trim($Data);
		$Data 			= preg_replace ('/[^\d\s]/', '', $Data);
		//$DataClean	=	str_replace(' ','',$Data);
		$_return		=	$Data;
  	

	 return $_return;	
	}
	// =================================================================








	// =================================================================
	public function Month_to_MonthLastTS($Month, $Year){

		$_return		=	false;
		$_NumDaysInMonth	=	$this->NumDaysInMonth($Month, $Year);
		$_return					= mktime(23, 59, 59, date('m',strtotime($Year . "-" . $Month . "-01")), $_NumDaysInMonth, $Year);;

	 return $_return;	
	}
	// =================================================================
	






	// =================================================================
	public function NumDaysInMonth($Month, $Year){

		$_return					= date("t", strtotime($Year . "-" . $Month . "-01"));

	 return $_return;	
	}
	// =================================================================










	// =================================================================
	public function GetRangeLimit($ReportType){

		$_return					= false;

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //read operation
		// -------------------------------------------


		// get data ----------------------------------
		switch($ReportType){
			
			// report.activity.start ---------
			case 'report.activity.start':
   			$sql_query			= mysql_query("SELECT user_session_actions.ts FROM user_session_actions ORDER BY user_session_actions.ts ASC LIMIT 1");
			break;


			// report.activity.end -----------
			case 'report.activity.end':
   			$sql_query			= mysql_query("SELECT user_session_actions.ts FROM user_session_actions ORDER BY user_session_actions.ts DESC LIMIT 1");
			break;

			// default -----------------------
			default:

			break;
			
		}
		


  	$sql_numrows		=	mysql_num_rows($sql_query);



 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray = $sql_array_result;
 			$counter++;
 		}
 		// -------------------------------------------


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$_return = 'no data';
		}

	 return $_return;	
	}
	// =================================================================











	// METHOD :: get member session actions ============================
	public function GetMemberSessionActions($UserID, $Filter = null, $Range = null, $Limit = null){

		$_return					= false;

		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start = $_exploded_range_start[0];
    $_day_Start 	= $_exploded_range_start[1];
    $_year_Start 	= $_exploded_range_start[2];
    $_TS_START 		= @mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------
  
  
  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End = $_exploded_range_end[0];
    $_day_End 	= $_exploded_range_end[1];
    $_year_End 	= $_exploded_range_end[2];
    $_TS_END 		= @mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //read operation
		// -------------------------------------------

		// get data ----------------------------------
		switch($UserID){

			// organization ------------------
			case 'organization':

     		if($Limit){
     			$sql_query			= mysql_query("SELECT id, userid, action, subaction, ts FROM user_session_actions WHERE user_session_actions.organization_id = ".$ORG_Owner_ID." ORDER BY user_session_actions.ts DESC LIMIT $Limit");
     		}else{
     			if($Filter){
     				
     				$_Exploded_FILTER = explode(':', $Filter);
     				$_column					= $_Exploded_FILTER[0];
     				$_sortMethod			= $_Exploded_FILTER[1];
     				
     				$ORG_Owner_ID			=	$_SESSION['ActiveUser']['organization_id'];

     				$sql_query			= mysql_query("SELECT id, userid, action, subaction, ts FROM user_session_actions WHERE user_session_actions.organization_id = ".$ORG_Owner_ID." AND user_session_actions.ts > ".$_TS_START." AND user_session_actions.ts < ".$_TS_END." ORDER BY user_session_actions.".$_column." ".$_sortMethod."");
     			}else{
     				$sql_query			= mysql_query("SELECT id, userid, action, subaction, ts FROM user_session_actions WHERE user_session_actions.organization_id = ".$ORG_Owner_ID." ORDER BY user_session_actions.ts ASC");
     			}
     		}
			break;


			// all users ---------------------
			case 'all':

     		if($Limit){
     			$sql_query			= mysql_query("SELECT id, userid, action, subaction, ts FROM user_session_actions ORDER BY user_session_actions.ts DESC LIMIT $Limit");
     		}else{
     			if($Filter){
     				
     				$_Exploded_FILTER = explode(':', $Filter);
     				$_column					= $_Exploded_FILTER[0];
     				$_sortMethod			= $_Exploded_FILTER[1];

     				$sql_query			= mysql_query("SELECT id, userid, action, subaction, ts FROM user_session_actions WHERE user_session_actions.ts > ".$_TS_START." AND user_session_actions.ts < ".$_TS_END." ORDER BY user_session_actions.".$_column." ".$_sortMethod."");
     			}else{
     				$sql_query			= mysql_query("SELECT id, userid, action, subaction, ts FROM user_session_actions ORDER BY user_session_actions.ts ASC");
     			}
     		}
			break;

			// selective user ----------------			
			default:
     		if($Limit){
     			$sql_query			= mysql_query("SELECT id, userid, action, subaction, ts FROM user_session_actions WHERE user_session_actions.userid = '$UserID' ORDER BY user_session_actions.ts DESC LIMIT $Limit");
     		}else{
     			$sql_query			= mysql_query("SELECT id, userid, action, subaction, ts FROM user_session_actions WHERE user_session_actions.userid = '$UserID' ORDER BY user_session_actions.ts DESC");	
     		}
			break;
			
		}
		


  	$sql_numrows		=	mysql_num_rows($sql_query);


 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}
 		// -------------------------------------------


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$_return = 'no data';
		}



	 return $_return;	
	}
	// =================================================================













// =======================================================================================
	public function GetClientBookings($ClientID, $Filter = null, $Range = null, $Limit = null){





		$_return					= false;

		// range ---------------------------
  	$_exploded_RANGE 	= explode(':',$Range);

  	$_range_start			= $_exploded_RANGE[0];
  	$_range_end				= $_exploded_RANGE[1];
  
  
  	// RANGE start -----------------------
  	$_exploded_range_start = explode('.',$_range_start);
  	$_month_Start = $_exploded_range_start[0];
    $_day_Start 	= $_exploded_range_start[1];
    $_year_Start 	= $_exploded_range_start[2];
    $_TS_START 		= mktime(0, 0, 0, $_month_Start, $_day_Start, $_year_Start);
  	// -----------------------------------
  
  
  	// RANGE end -------------------------
  	$_exploded_range_end = explode('.',$_range_end);
  	$_month_End = $_exploded_range_end[0];
    $_day_End 	= $_exploded_range_end[1];
    $_year_End 	= $_exploded_range_end[2];
    $_TS_END 		= mktime(23, 59, 59, $_month_End, $_day_End, $_year_End);
  	// -----------------------------------


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //read operation
		// -------------------------------------------



		// get data ----------------------------------
		switch($ClientID){
			
			// all ---------------------------
			case 'all':

     		if($Limit){
     			$sql_query			= mysql_query("SELECT * FROM booking ORDER BY ts_on_sale DESC LIMIT $Limit");
     		}else{
     			if($Filter){
     				
     				$_Exploded_FILTER = explode(':', $Filter);
     				$_column					= $_Exploded_FILTER[0];
     				$_sortMethod			= $_Exploded_FILTER[1];

     				$sql_query			= mysql_query("SELECT * FROM booking WHERE ts_on_sale > ".$_TS_START." AND ts_on_sale < ".$_TS_END." ORDER BY booking.".$_column." ".$_sortMethod."");
     			}else{
     				$sql_query			= mysql_query("SELECT * FROM booking ORDER BY ts_on_sale ASC");
     			}
     		}
			break;

			// selective user ----------------			
			default:
     		if($Limit){
     			$sql_query			= mysql_query("SELECT * FROM booking WHERE client_id = '$ClientID' ORDER BY ts_on_sale DESC LIMIT $Limit");
     		}else{
     			$sql_query			= mysql_query("SELECT * FROM booking WHERE client_id = '$ClientID' ORDER BY ts_on_sale DESC");	
     		}
			break;
			
		}
		


  	$sql_numrows		=	mysql_num_rows($sql_query);


 		// populate result array --------------------
 		$counter = 0;
 		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
 			$ResultArray[$counter] = $sql_array_result;
 			$counter++;
 		}
 		// -------------------------------------------


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_numrows){
			$_return = $ResultArray;
		}else{
			$_return = 'no data';
		}



	 return $_return;	
	}
// =======================================================================================













	// METHOD :: validate US Phone =====================================
	public function Validate_USPhone($PhoneNumber){

		$_return	= false;

		$_formats = array('###-###-####', '####-###-###', '(###) ###-###', '####-####-####', '##-###-####-####', '####-####', '###-###-###', '#####-###-###', '##########');
		$_format 	= trim(ereg_replace("[0-9]", "#", $PhoneNumber));

	return (in_array($_format, $_formats)) ? true : false;

	}
	// =================================================================







	// METHOD :: validate ZIPCode ======================================
	public function Validate_ZIPCode($ZIPCode){

		$_return	= false;

  	if( preg_match("/^([0-9]{5})(-[0-9]{4})?$/i",$ZIPCode) ){
  		$_return	= true;
  	}

	return $_return;

	}
	// =================================================================











	// =================================================================
	public function VerifyUnique_eMail($eMail_Addr){


		$_return									= true;


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  		// Retrieve Data -----------------------------
			$sql_query	= mysql_query("SELECT user.email_addr FROM user WHERE user.email_addr = '$eMail_Addr'");
			$num_rows		=	mysql_num_rows($sql_query);
			// -------------------------------------------


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------

		if($num_rows){
			$_return	=	false;
		}


	return $_return;

	}
	// =================================================================













	// METHOD :: get form validation rules =============================
	public function GetFormValidationRules($Field = null){


		$_return									= false;


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

		// explicit rule set ---------------
		if($Field != null){
  		// Retrieve Data -----------------------------
			$sql_query	= mysql_query("SELECT * FROM form_validation WHERE form_validation.field = '$Field'");
			$num_rows		=	mysql_num_rows($sql_query);
			// -------------------------------------------
		
		// all rules -----------------------
		}else{
  		// Retrieve Data -----------------------------
			$sql_query	= mysql_query("SELECT * FROM form_validation");
			$num_rows		=	mysql_num_rows($sql_query);
			// -------------------------------------------
		}


		// populate result array --------------------
		$counter = 0;
		while($sql_array_result	=	mysql_fetch_assoc($sql_query) ){
			$ResultArray[$counter] = $sql_array_result;
			$counter++;
		}
		// -------------------------------------------

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------

		if($num_rows){
			$_return	=	$ResultArray;
		}


	return $_return;

	}
	// =================================================================












	// METHOD :: track action ==========================================
	public function TrackAction($UserID, $Action, $SubAction = 'n/a', $RelativeData = 'n/a', $Token = 'n/a', $AgentSignature = 'n/a'){

		$_return									= false;
		$_timestamp								= time();

		$_ORG_OWNER_ID						=	$_SESSION['ActiveUser']['organization_id'];


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

		
		// record user session action --------------
    mysql_query("INSERT INTO user_session_actions (organization_id, userid, relativedata, action, subaction, token, agent_signature, ts) VALUES('$_ORG_OWNER_ID', '$UserID', '$RelativeData', '$Action', '$SubAction', '$Token', '$AgentSignature', '$_timestamp') ");


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	return $_return;

	}
	// =================================================================


	








	// METHOD :: Get All Landers =======================================
	public function GetAllLanders($Property, $Type = null){

		$_return									= false;
		$_timestamp								= time();
		$ResultArray							= null;
		

		

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

		if($Type == null){

  		// Retrieve Data -----------------------------
			$sql_query	= mysql_query("SELECT DISTINCT * FROM promo_landers WHERE promo_landers.property = '$Property' AND promo_landers.type != 'subdomain' AND promo_landers.class = 'lander'");
			$num_rows		=	mysql_num_rows($sql_query);
			// -------------------------------------------
			
		}elseif($Type == 'subdomain'){

  		// Retrieve Data -----------------------------
			$sql_query	= mysql_query("SELECT DISTINCT * FROM promo_landers WHERE promo_landers.property = '$Property' AND promo_landers.class = 'lander'");
			$num_rows		=	mysql_num_rows($sql_query);
			// -------------------------------------------
		}



		// populate result array --------------------
		$counter = 0;
		while($sql_array_result	=	mysql_fetch_assoc($sql_query) ){
			$ResultArray[$counter] = $sql_array_result;
			$counter++;
		}
		// -------------------------------------------

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------

		if($num_rows){
			$_return	=	$ResultArray;
		}


	return $_return;
	}
	// =================================================================
	
	
	
	
	
	
	
	
	
	
	
	
	

	// METHOD :: Get Lander Data =======================================
	public function GetLanderData($LanderID){


		$_return									= false;
		$_timestamp								= time();
		$ResultArray							= null;

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  	// Retrieve Data -----------------------------
		$sql_query	= mysql_query("SELECT * FROM promo_landers WHERE promo_landers.id = '$LanderID'");
		$num_rows		=	mysql_num_rows($sql_query);
		// -------------------------------------------

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($num_rows){
			$_return	=	mysql_fetch_assoc($sql_query);
		}


	return $_return;
	}
	// =================================================================



























	// METHOD :: Create ================================================
	public function Create($NewUserArray){

		// record action -----------------------------
		$this->TrackAction('999999999', 'new user', 'start', $_SERVER);





		//$this->NewMember_username 		= $NewUserArray['username'];
		
		$this->NewMember_firstname 		= $NewUserArray['first_name'];
		$this->NewMember_lastname 		= $NewUserArray['last_name'];
		
		$this->NewMember_address1 		= $NewUserArray['address1'];
		$this->NewMember_taxpayee 		= $NewUserArray['company_name'];
		$this->NewMember_taxbizname		= $NewUserArray['company_name'];
		$this->NewMember_taxid				= $NewUserArray['taxid'];
		$this->NewMember_sitename			= $NewUserArray['domain'];


		$this->NewMember_phone				= $NewUserArray['phone_number'];
		$this->NewMember_agreement1		= $NewUserArray['agreement1'];
		$this->NewMember_agreement2		= $NewUserArray['agreement2'];


		
		//$encryptObj->plainText				=	$NewUserArray['password'];
		//$this->NewMember_password 		= $encryptObj->ReturnHexCipherText();
		$this->NewMember_password 		= $this->Encrypt($NewUserArray['password'], 'private');


		if($NewUserArray['email_addr'] == $NewUserArray['email_addr2']){
			$this->NewMember_email_addr = $NewUserArray['email_addr'];	
		}

		$this->NewMember_validator		= $NewUserArray['validator'];

		$this->NewMember_dob					= $NewUserArray['dob'];
		$this->NewMember_ip 					= $NewUserArray['ip'];
		$this->NewMember_country			= $NewUserArray['country'];
		//$this->NewMember_gender				= $NewUserArray['gender'];
		$this->NewMember_zipcode			= $NewUserArray['zipcode'];

		$this->NewMember_activated		= 0;
		$this->NewMember_disabled			= 0;
		$this->NewMember_ts_lastlogin	= 0;

		$this->NewMember_ts_created		= time();
		$this->NewMember_ts_signup		= time();
		$this->NewMember_ts_lastlogin	= null;



		$this->NewMember_referrer 		= ($NewUserArray['referrer_profile'] ? $this->Decrypt($NewUserArray['referrer_profile']):null);




		// IF Promocode has been provided ------------------------------------------
		if($NewUserArray['promocode']){

			$UpgradeExpedite = true;
			
			$this->NewMember_promocode			= $this->Decrypt($NewUserArray['promocode']);
			$this->NewMember_promodiscount	= $NewUserArray['promocodediscount'];

			// Create Promocode Expiration from SignUp TS + Promocode Lifespan -------
			if($NewUserArray['promocodelifespan'] != 0){
				$this->NewMember_promoexpire	= $this->NewMember_ts_signup + $NewUserArray['promocodelifespan'];
			}else{
				$this->NewMember_promoexpire	= $NewUserArray['promocodelifespan'];
			}

			// detect upgrade expedite -----------------------------------------------
			if($this->NewMember_promodiscount == 100 && $this->NewMember_promoexpire == 0){
				$UpgradeExpedite = true;
				$this->PromocodeLookup($this->NewMember_promocode);
			}

		}
		// -------------------------------------------





		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
		// -------------------------------------------


  	// Check for Pre-Existing Member ---------------------------------
  	$sql_NewMember			= mysql_query("SELECT user.userid FROM user WHERE user.email_addr = '$this->NewMember_email_addr'");
		$sql_obj_result			=	mysql_fetch_object($sql_NewMember);



		if(!$sql_obj_result->userid){


		

    	// Create/Insert New Member --------------------------------------

    		//$sql_NewMember		= mysql_query("INSERT INTO user (first_name, last_name, address_1, tax_payee, tax_business_name, tax_id_ssn, site_name, password, email_addr, dob, country, zipcode, ts_signup, ts_created, ts_lastlogin, ip, activated, level, disabled, referrer) VALUES('$this->NewMember_firstname', '$this->NewMember_lastname', '$this->NewMember_address1', '$this->NewMember_taxpayee', '$this->NewMember_taxbizname', '$this->NewMember_sitename', '$this->NewMember_password', '$this->NewMember_email_addr', '$this->NewMember_dob', '$this->NewMember_country', '$this->NewMember_zipcode', '$this->NewMember_ts_signup', '$this->NewMember_ts_created', '$this->NewMember_ts_lastlogin', '$this->NewMember_ip', '$this->NewMember_activated', '1', '$this->NewMember_disabled', '$this->NewMember_referrer') ");
    		$sql_NewMember		= mysql_query("INSERT INTO user (first_name, last_name, address_1, tax_payee, tax_business_name, tax_id_ssn, site_name, phone, password, email_addr, dob, country, zipcode, ts_signup, ts_created, ts_lastlogin, ip, activated, level, disabled, referrer) VALUES('$this->NewMember_firstname', '$this->NewMember_lastname', '$this->NewMember_address1', '$this->NewMember_taxpayee', '$this->NewMember_taxpayee', '$this->NewMember_taxid', '$this->NewMember_sitename', '$this->NewMember_phone', '$this->NewMember_password', '$this->NewMember_email_addr', '$this->NewMember_dob', '$this->NewMember_country', '$this->NewMember_zipcode', '$this->NewMember_ts_signup', '$this->NewMember_ts_created', '$this->NewMember_ts_lastlogin', '$this->NewMember_ip', '$this->NewMember_activated', '1', '$this->NewMember_disabled', '$this->NewMember_referrer') ");
    		//$sql_NewMember		= mysql_query("INSERT INTO user (first_name, last_name, address_1, tax_payee, tax_business_name, tax_id_ssn, site_name, password, email_addr, dob, country, zipcode, ts_signup, ts_created, ts_lastlogin, ip, activated, level, disabled) VALUES('$this->NewMember_firstname', '$this->NewMember_lastname', '$this->NewMember_address1', '$this->NewMember_taxpayee', '$this->NewMember_taxbizname', '$this->NewMember_sitename', '$this->NewMember_password', '$this->NewMember_email_addr', '$this->NewMember_dob', '$this->NewMember_country', '$this->NewMember_zipcode', '$this->NewMember_ts_signup', '$this->NewMember_ts_created', '$this->NewMember_ts_lastlogin', '$this->NewMember_ip', '$this->NewMember_activated', '1', '$this->NewMember_disabled') ");
    	

			// get last inserted userID
  	  $userID						= mysql_insert_id();




		
		// Promocode =====================================================
		if($this->NewMember_promocode){
    	// Create/Insert New Member Specifications ---------------------
    	$sql_NewMbrSpecs	= mysql_query("INSERT INTO user_promocode (userid, promocode, discount, tsexpiration) VALUES('$userID', '$this->NewMember_promocode', '$this->NewMember_promodiscount', '$this->NewMember_promoexpire') ") or die (mysql_error());
    }
		// ===============================================================



    // Profile =======================================================
    	// Create/Insert New Member Specifications ---------------------
    	$sql_NewMbrSpecs	= mysql_query("INSERT INTO user_profile_specs (userid, tsdob, tsjoinedon, zipcode, seek_m, seek_w, seek_c, seek_t) VALUES('$userID', '$this->NewMember_dob', '$this->NewMember_ts_created', '$this->NewMember_zipcode', '$this->NewMember_seek_m', '$this->NewMember_seek_f', '$this->NewMember_seek_c', '$this->NewMember_seek_t') ") or die (mysql_error());

    	// Insert Affiliate Host Site ----------------------------------
    	$sql_HostSite			= mysql_query("INSERT INTO user_hostsites (userid, name, domain, ts) VALUES('$userID', '$this->NewMember_sitename', '$this->NewMember_sitename', '$this->NewMember_ts_created') ") or die (mysql_error());


    	// Create/Insert New Member Essay Record -----------------------
    	//$sql_NewMbrSpecs	= mysql_query("INSERT INTO user_profile_essay (userid, tscreated) VALUES('$userID', '$this->NewMember_ts_created') ") or die (mysql_error());
		// ===============================================================


/*
** DISABLED **
    	// Search PrePopulate per User Desires ===========================
    	$RelativeData			=	$this->NewMember_gender.'-'.$this->NewMember_zipcode.'-'.$this->NewMember_seek_m.$this->NewMember_seek_f.$this->NewMember_seek_t.$this->NewMember_seek_c.'-'.'11111'.'-'.'1899'.'-'.'000'.'-'.'000';

    	// Create/Insert New Member Specifications ---------------------
    	$sql_NewMbrSpecs	= mysql_query("INSERT INTO user_session_actions (userid, relativedata, action, ts) VALUES('$userID', '$RelativeData', 'search', '$this->NewMember_ts_created') ") or die (mysql_error());
			// ===============================================================
*/



			// Process Expedited Upgrade =====================================
			if($UpgradeExpedite == true){

      	// Upgrade Data ----------------------------------------------
				$ExpeditedPromoProductArray = array(
													'upgrade_product' 					=>	$_SESSION['NewUser']['upgrade_product']							= $this->PromocodeProductID,
													'upgrade_term' 							=>	$_SESSION['NewUser']['upgrade_term']								= 1,
													'upgrade_referrer' 					=>	$_SESSION['NewUser']['upgrade_referrer']						= $this->NewMember_referrer
												);

				// process upgrade -----------------------
				$TransactionID	= null;
				$_SESSION['NewUser']['userid'] = $userID;
				$TransactionID	=	$this->ProcessUpgrade($_SESSION['NewUser'], $ExpeditedPromoProductArray, 'expedited_upgrade');
			}
			// ===============================================================





    	// Create/Insert New Member Preferences-------------------------
    	//$sql_NewMemberP	= mysql_query("INSERT INTO user_pref (userid, seek_f, seek_m, seek_c, seek_t) VALUES('$userID', '$this->NewMember_seek_f', '$this->NewMember_seek_m', '$this->NewMember_seek_c', '$this->NewMember_seek_t') ") or die (mysql_error());

    	// Create/Insert New Member Payment Record ---------------------
    	//$sql_NewMbrPay	= mysql_query("INSERT INTO user_payment (userid, level) VALUES('$userID', '1') ") or die (mysql_error());


			$this->SendActivationEmail($userID, $this->NewMember_email_addr, $this->NewMember_password);



  		// destroy database connection object --------
  		@$obj_db->Close();
  		unset($obj_db);
  		@unlink('temp/'.$this->NewMember_validator.'.png');
			// -------------------------------------------


    	if($sql_NewMember == true){
    		$_return = true;
    	}
			
		}else{
			
    	$_return = false;
			
		}



	 return $_return;  	
	}
	// =================================================================
	
	
	
	































	// METHOD :: Send Activation Email =================================
	public function SendActivationEmail($UserID, $EmailAddress = 0, $UserPassword = 0){


		if($EmailAddress == 0 || $UserPassword == 0){

			// database connection -----------------------
			$obj_db					= new db;
			$obj_db->Connect(0); //write operation
			// -------------------------------------------


  		// Get Member Email Address ------------------
  		$sql_query					= mysql_query("SELECT user.email_addr, user.password FROM user WHERE user.userid = '$UserID'") or die(mysql_error());
			$sql_obj_result			=	mysql_fetch_object($sql_query);
			$EmailAddress				=	$sql_obj_result->email_addr;
			$EncryptedPassword	=	$sql_obj_result->password;
			// -------------------------------------------


			// destroy database connection object --------
			$obj_db->Close();
			unset($obj_db);
			// -------------------------------------------

		}


		// Activation Letter to New Member -----------------------------
		$_Cipher_userID		= $this->Encrypt($UserID);


		$__msg	=	'This is your Activation Letter 

			
Click This Link to Activate Your Account:
			
http://'.$_SERVER['SERVER_NAME'].'/activate-'.$_Cipher_userID.'-'.$EncryptedPassword.'

============================
unlimiCore ACCOUNT CREDENTIALS
============================

Login: '.$EmailAddress.'

Pass:  '.$this->Decrypt($EncryptedPassword,'private').'


==========================
unlimiCore|Business Intelligence System
'.$_SERVER['SERVER_NAME'].'




';

		// Send Activation Email ---------------------------------------
		$this->SendeMail($EmailAddress, 'postman@', 'Activation - unlimiCore Business Intelligence System', $__msg);





	 return $_return;  	
	}
	// =================================================================	
	
	







	// METHOD :: Activate ==============================================
	public function SendeMail($eMailAddr, $FromUser, $Subject, $Message){
		
		// class.phpmailer	class ----------------------------------------
		//require("class.phpmailer.php");

		// Activation Letter to New Member
		$mail 					= new PHPMailer();
		$mail->Sender   = 'bounce@'.$_SERVER['SERVER_NAME'];
		$mail->From     = $FromUser.$_SERVER['SERVER_NAME'];
		$mail->FromName = 'unlimiCore|Business Intelligence System';
		$mail->Subject  = $Subject;
		$mail->Body    	= $Message;
		$mail->AddAddress($eMailAddr, 'unlimiCore User');
		$mail->Send();
		
	}
	// =================================================================












	// METHOD :: GetMemberProfile_Defined ==============================
	public function GetMemberProfile_Defined($MemberID){

		$_return									= false;
		$CurrentTime							= time();


		// check for encrypted promocode -------------
		if(strlen($MemberID) > 20){
			$MemberID =	$this->Decrypt($MemberID);
		}
		// -------------------------------------------


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  	// Retrieve Profile ----------------------------------------------
		//$sql_MbrSpec		= mysql_query("SELECT * FROM user_profile_specs, user_profile_essay, user WHERE user_profile_specs.userid = '$MemberID' AND user.userid = '$MemberID' AND user_profile_essay.userid = '$MemberID'"); 
		$sql_MbrSpec		= mysql_query("SELECT * FROM user_profile_specs, user WHERE user_profile_specs.userid = '$MemberID' AND user.userid = '$MemberID'"); 
  	$sql_obj_result	=	mysql_fetch_object($sql_MbrSpec);



		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);


  	if( $sql_obj_result == true ){
  		
  			$_tempSeeking		=		($sql_obj_result->seek_w == 1 ? ' Women ' : '' );
  			$_tempSeeking		.=	($sql_obj_result->seek_m == 1 ? ' Men ' : '' );
  			$_tempSeeking		.=	($sql_obj_result->seek_t == 1 ? ' Transexuals ' : '' );
				$_tempSeeking		.=	($sql_obj_result->seek_c == 1 ? ' Couples ' : '' );
				$_tempSeeking		.=	($sql_obj_result->seek_g == 1 ? ' Groups ' : '' );

  			$_tempInto			=		($sql_obj_result->into_friends == 1 ? ' Friendship ' : '' );
  			$_tempInto			.=	($sql_obj_result->into_flirting == 1 ? ' Flirting ' : '' );
				$_tempInto			.=	($sql_obj_result->into_relationship == 1 ? ' Relationship ' : '' );
				$_tempInto			.=	($sql_obj_result->into_sex == 1 ? ' Intimacy ' : '' );
				$_tempInto			.=	($sql_obj_result->into_fetish == 1 ? ' Fetish ' : '' );
				
				$_tempFavFlavs	=		($sql_obj_result->fav_asian == 1 ? ' Asian ' : '' );
				$_tempFavFlavs	.=	($sql_obj_result->fav_white == 1 ? ' White ' : '' );
				$_tempFavFlavs	.=	($sql_obj_result->fav_black == 1 ? ' Black ' : '' );
				$_tempFavFlavs	.=	($sql_obj_result->fav_eindian == 1 ? ' East Indian ' : '' );
				$_tempFavFlavs	.=	($sql_obj_result->fav_islander == 1 ? ' Islander ' : '' );
				$_tempFavFlavs	.=	($sql_obj_result->fav_hispanic == 1 ? ' Hispanic ' : '' );
				$_tempFavFlavs	.=	($sql_obj_result->fav_meastern == 1 ? ' Middle Eastern ' : '' );
				$_tempFavFlavs	.=	($sql_obj_result->fav_namericanindian == 1 ? ' American Indian ' : '' );
				$_tempFavFlavs	.=	($sql_obj_result->fav_latino == 1 ? ' Latino ' : '' );
				$_tempFavFlavs	.=	($sql_obj_result->fav_animals == 1 ? ' Animals ' : '' );

				$_tempFantasy		=		($sql_obj_result->fantasy_twogirls == 1 ? ' 2 Girls ' : '' );
				$_tempFantasy		.=	($sql_obj_result->fantasy_twoguys == 1 ? ' 2 Guys ' : '' );
				$_tempFantasy		.=	($sql_obj_result->fantasy_public == 1 ? ' Public ' : '' );
				$_tempFantasy		.=	($sql_obj_result->fantasy_boat == 1 ? ' Boat ' : '' );
				$_tempFantasy		.=	($sql_obj_result->fantasy_dominatrix == 1 ? ' Dominatrix ' : '' );
				$_tempFantasy		.=	($sql_obj_result->fantasy_beach == 1 ? ' Beach ' : '' );
				$_tempFantasy		.=	($sql_obj_result->fantasy_outdoors == 1 ? ' Outdoors ' : '' );
				$_tempFantasy		.=	($sql_obj_result->fantasy_askme == 1 ? ' Ask Me ' : '' );
				$_tempFantasy		.=	($sql_obj_result->fantasy_toys == 1 ? ' Toys ' : '' );
				$_tempFantasy		.=	($sql_obj_result->fantasy_illegal == 1 ? ' It\'s ILLEGAL! ' : '' );
				
				$_tempTurnon		=		($sql_obj_result->turnon_tan == 1 ? ' Tan ' : '' );
				$_tempTurnon		.=	($sql_obj_result->turnon_butt == 1 ? ' Butt ' : '' );
				$_tempTurnon		.=	($sql_obj_result->turnon_legs == 1 ? ' Legs ' : '' );
				$_tempTurnon		.=	($sql_obj_result->turnon_hands == 1 ? ' Hands ' : '' );
				$_tempTurnon		.=	($sql_obj_result->turnon_mind == 1 ? ' Mind ' : '' );
				$_tempTurnon		.=	($sql_obj_result->turnon_chest == 1 ? ' Chest ' : '' );
				$_tempTurnon		.=	($sql_obj_result->turnon_feet == 1 ? ' Feet ' : '' );
				$_tempTurnon		.=	($sql_obj_result->turnon_askme == 1 ? ' Ask Me ' : '' );
				$_tempTurnon		.=	($sql_obj_result->turnon_hair == 1 ? ' Hair ' : '' );
				$_tempTurnon		.=	($sql_obj_result->turnon_piercings == 1 ? ' Piercings ' : '' );
				$_tempTurnon		.=	($sql_obj_result->turnon_money == 1 ? ' Money ' : '' );
				$_tempTurnon		.=	($sql_obj_result->turnon_power == 1 ? ' Power ' : '' );
				$_tempTurnon		.=	($sql_obj_result->turnon_size == 1 ? ' "Size" ' : '' );
				$_tempTurnon		.=	($sql_obj_result->turnon_hardbody == 1 ? ' Hardbody ' : '' );
				$_tempTurnon		.=	($sql_obj_result->turnon_mysecret == 1 ? ' My Secret ' : '' );

				$_tempSmoking		=		($sql_obj_result->smoke_do == 1 ? 'I Smoke' : 'I Do Not Smoke' );
				$_tempSmokeDis	=		($sql_obj_result->smoke_dislike == 1 ? ' ( <font color="red">I Don\'t Like It</font> )' : '' );

				$_tempDrinking	=		($sql_obj_result->drink_do == 1 ? 'I Drink' : 'I Do Not Drink' );
				$_tempDrinkDis	=		($sql_obj_result->drink_dislike == 1 ? ' ( <font color="red">I Don\'t Dig It</font> )' : '' );

				$_tempTattoos		=		($sql_obj_result->tattoo_have == 1 ? 'I Have Tattoos' : 'No Tattoos' );
				$_tempTattoosDis=		($sql_obj_result->tattoo_dislike == 1 ? ' ( <font color="red">I\'m Not Into \'em</font> )' : '' );

				$_tempPiercings	=		($sql_obj_result->piercings_have == 1 ? 'I Have Piercings' : 'No Piercings' );
				$_tempPierceDis	=		($sql_obj_result->piercings_dislike == 1 ? ' ( <font color="red">I\'m Not a Fan</font> )' : '' );
				$_tempPetPeeves	=		false;
				
				if($sql_obj_result->smoke_dislike == 1 || $sql_obj_result->drink_dislike == 1 || $sql_obj_result->tattoo_dislike || $sql_obj_result->piercings_dislike == 1){
					$_tempPetPeeves	=	true;	
				}
				
				$_tempNSkillMouth	=		($sql_obj_result->naughty_m1 == 1 ? ' Kissing ' : '' );
				$_tempNSkillMouth	.=	($sql_obj_result->naughty_m2 == 1 ? ' Biting ' : '' );
				$_tempNSkillMouth	.=	($sql_obj_result->naughty_m3 == 1 ? ' Sucking ' : '' );
				$_tempNSkillMouth	.=	($sql_obj_result->naughty_m4 == 1 ? ' Anything ' : '' );
				$_tempNSkillMouth	.=	($sql_obj_result->naughty_m5 == 1 ? ' OH MY! ' : '' );

				$_tempNSkillTongue	=		($sql_obj_result->naughty_t1 == 1 ? ' Kissing ' : '' );
				$_tempNSkillTongue	.=	($sql_obj_result->naughty_t2 == 1 ? ' Adventurous ' : '' );
				$_tempNSkillTongue	.=	($sql_obj_result->naughty_t3 == 1 ? ' Knot Tieing ' : '' );
				$_tempNSkillTongue	.=	($sql_obj_result->naughty_t4 == 1 ? ' DANGER ZONE! ' : '' );

				$_tempNSkillHands	=		($sql_obj_result->naughty_h1 == 1 ? ' Pockets ' : '' );
				$_tempNSkillHands	.=	($sql_obj_result->naughty_h2 == 1 ? ' Caressing ' : '' );
				$_tempNSkillHands	.=	($sql_obj_result->naughty_h3 == 1 ? ' Massaging ' : '' );
				$_tempNSkillHands	.=	($sql_obj_result->naughty_h4 == 1 ? ' Exploring ' : '' );
				$_tempNSkillHands	.=	($sql_obj_result->naughty_h5 == 1 ? ' OMFG! ' : '' );

				$_tempNSkillButt	=		($sql_obj_result->naughty_b1 == 1 ? ' Watch It ' : '' );
				$_tempNSkillButt	.=	($sql_obj_result->naughty_b2 == 1 ? ' Touch It ' : '' );
				$_tempNSkillButt	.=	($sql_obj_result->naughty_b3 == 1 ? ' Kiss It ' : '' );
				$_tempNSkillButt	.=	($sql_obj_result->naughty_b4 == 1 ? ' Spank It ' : '' );
				$_tempNSkillButt	.=	($sql_obj_result->naughty_b5 == 1 ? ' DIRTY! ' : '' );

				$_tempNSkillBad		=		($sql_obj_result->naughty_n1 == 1 ? ' Nympho ' : '' );
				$_tempNSkillBad		.=	($sql_obj_result->naughty_n2 == 1 ? ' Fibber ' : '' );
				$_tempNSkillBad		.=	($sql_obj_result->naughty_n3 == 1 ? ' Cheater ' : '' );
				$_tempNSkillBad		.=	($sql_obj_result->naughty_n4 == 1 ? ' Partier ' : '' );
				$_tempNSkillBad		.=	($sql_obj_result->naughty_n5 == 1 ? ' Lush ' : '' );
				$_tempNSkillBad		.=	($sql_obj_result->naughty_n6 == 1 ? ' Toker ' : '' );
				$_tempNSkillBad		.=	($sql_obj_result->naughty_n7 == 1 ? ' Nudist ' : '' );
				$_tempNSkillBad		.=	($sql_obj_result->naughty_n8 == 1 ? ' Player ' : '' );
				$_tempNSkillBad		.=	($sql_obj_result->naughty_n9 == 1 ? ' Secret ' : '' );
				$_tempNSkillBad		.=	($sql_obj_result->naughty_n10 == 1 ? ' I\'m Perfect ' : '' );

				$_tempNiceSkillLang		=		($sql_obj_result->nice_lang1 == 1 ? ' English ' : '' );
				$_tempNiceSkillLang		.=	($sql_obj_result->nice_lang2 == 1 ? ' Spanish ' : '' );
				$_tempNiceSkillLang		.=	($sql_obj_result->nice_lang3 == 1 ? ' French ' : '' );
				$_tempNiceSkillLang		.=	($sql_obj_result->nice_lang4 == 1 ? ' Chinese ' : '' );
				$_tempNiceSkillLang		.=	($sql_obj_result->nice_lang5 == 1 ? ' Hebrew ' : '' );
				$_tempNiceSkillLang		.=	($sql_obj_result->nice_lang6 == 1 ? ' German ' : '' );
				$_tempNiceSkillLang		.=	($sql_obj_result->nice_lang7 == 1 ? ' Greek ' : '' );
				$_tempNiceSkillLang		.=	($sql_obj_result->nice_lang8 == 1 ? ' Other ' : '' );

				$_tempNiceSkillActivity		=		($sql_obj_result->nice_act1 == 1 ? ' Sports ' : '' );
				$_tempNiceSkillActivity		.=	($sql_obj_result->nice_act2 == 1 ? ' Gym ' : '' );
				$_tempNiceSkillActivity		.=	($sql_obj_result->nice_act3 == 1 ? ' Couch ' : '' );
				$_tempNiceSkillActivity		.=	($sql_obj_result->nice_act4 == 1 ? ' Sleep ' : '' );
				$_tempNiceSkillActivity		.=	($sql_obj_result->nice_act5 == 1 ? ' Movies ' : '' );
				$_tempNiceSkillActivity		.=	($sql_obj_result->nice_act6 == 1 ? ' Trips ' : '' );
				$_tempNiceSkillActivity		.=	($sql_obj_result->nice_act7 == 1 ? ' Outdoors ' : '' );
				$_tempNiceSkillActivity		.=	($sql_obj_result->nice_act8 == 1 ? ' Other ' : '' );

				$_tempNiceSkillDomestic		=		($sql_obj_result->nice_dom1 == 1 ? ' Cleaning ' : '' );
				$_tempNiceSkillDomestic		.=	($sql_obj_result->nice_dom2 == 1 ? ' Ironing ' : '' );
				$_tempNiceSkillDomestic		.=	($sql_obj_result->nice_dom3 == 1 ? ' Dishes ' : '' );
				$_tempNiceSkillDomestic		.=	($sql_obj_result->nice_dom4 == 1 ? ' Laundry ' : '' );
				$_tempNiceSkillDomestic		.=	($sql_obj_result->nice_dom5 == 1 ? ' Cooking ' : '' );
				$_tempNiceSkillDomestic		.=	($sql_obj_result->nice_dom6 == 1 ? ' Lawn ' : '' );
				$_tempNiceSkillDomestic		.=	($sql_obj_result->nice_dom7 == 1 ? ' Trash ' : '' );
				$_tempNiceSkillDomestic		.=	($sql_obj_result->nice_dom8 == 1 ? ' Misc. ' : '' );

				$_tempNiceSkillGoodness		=		($sql_obj_result->nice_good1 == 1 ? ' Honest ' : '' );
				$_tempNiceSkillGoodness		.=	($sql_obj_result->nice_good2 == 1 ? ' Caring ' : '' );
				$_tempNiceSkillGoodness		.=	($sql_obj_result->nice_good3 == 1 ? ' Patient ' : '' );
				$_tempNiceSkillGoodness		.=	($sql_obj_result->nice_good4 == 1 ? ' Noble ' : '' );
				$_tempNiceSkillGoodness		.=	($sql_obj_result->nice_good5 == 1 ? ' Smart ' : '' );
				$_tempNiceSkillGoodness		.=	($sql_obj_result->nice_good6 == 1 ? ' Fair ' : '' );
				$_tempNiceSkillGoodness		.=	($sql_obj_result->nice_good7 == 1 ? ' Loyal ' : '' );
				$_tempNiceSkillGoodness		.=	($sql_obj_result->nice_good8 == 1 ? ' Chivalrous ' : '' );


				





			// gender conversion -----------------------
			if($sql_obj_result->gender == 1){
				$_gender	= 'Guy';
			}elseif($sql_obj_result->gender == 2){
				$_gender	= 'Girl';
			}elseif($sql_obj_result->gender == 3){
				$_gender	= 'Couple';
			}elseif($sql_obj_result->gender == 2){
				$_gender	= 'Transexual';
			}
			// -----------------------------------------


			// best trait conversion  ------------------
			if($sql_obj_result->besttrait == 1){
				$_bestTrait	= 'Body';
			}elseif($sql_obj_result->besttrait == 2){
				$_bestTrait	= 'Brain';
			}elseif($sql_obj_result->besttrait == 3){
				$_bestTrait	= 'Money';
			}elseif($sql_obj_result->besttrait == 4){
				$_bestTrait	= 'Sensuality';
			}elseif($sql_obj_result->besttrait == 5){
				$_bestTrait	= 'Butt';
			}elseif($sql_obj_result->besttrait == 6){
				$_bestTrait	= 'Chest';
			}elseif($sql_obj_result->besttrait == 7){
				$_bestTrait	= 'Legs';
			}elseif($sql_obj_result->besttrait == 8){
				$_bestTrait	= 'Personality';
			}
			// -----------------------------------------






			$MemberProfileSpecArray	= array(
				'userid'				=>	$sql_obj_result->userid,
				'username'			=>	ucwords($sql_obj_result->username),
				'ts_lastlogin'	=>	$sql_obj_result->ts_lastlogin,
				'gender'				=>	$_gender,
				'dob'						=>	( date(Y, time()) ) - ( date(Y, $sql_obj_result->tsdob) ),
				'dobday'				=>	date('j', $sql_obj_result->tsdob),
				'dobmonth'			=>	date('n', $sql_obj_result->tsdob),
				'dobyear'				=>	date('Y', $sql_obj_result->tsdob),
				'title'					=>	$sql_obj_result->title,
				'aboutme'				=>	$sql_obj_result->aboutme,
				'aboutmeappvd'	=>	$sql_obj_result->approved1,
				'aboutyou'			=>	$sql_obj_result->aboutyou,
				'aboutyouappvd'	=>	$sql_obj_result->approved2,
				'status'				=>	$this->__profileSpec('status', $sql_obj_result->status),
				'hotness'				=>	$this->__profileSpec('hotness', $sql_obj_result->hotness),
				'personality'		=>	$this->__profileSpec('personality', $sql_obj_result->personality),
				'height'				=>	$sql_obj_result->height_feet.'\' '.$sql_obj_result->height_inches.'"',
				'bodytype'			=>	$this->__profileSpec('bodytype', $sql_obj_result->bodytype),
				'haircolor'			=>	$this->__profileSpec('haircolor', $sql_obj_result->haircolor),
				'eyecolor'			=>	$this->__profileSpec('eyecolor', $sql_obj_result->eyecolor),
				'income'				=>	$this->__profileSpec('income', $sql_obj_result->income),
				'profession'		=>	$this->__profileSpec('profession', $sql_obj_result->profession),
				'religion'			=>	$this->__profileSpec('religion', $sql_obj_result->religion),
				'seeking'				=>	$_tempSeeking,
				'into'					=>	$_tempInto,
				'favflavors'		=>	$_tempFavFlavs,
				'fantasy'				=>	$_tempFantasy,
				'turnon'				=>	$_tempTurnon,
				'smoking'				=>	$_tempSmoking,
				'smokingdislike'=>	$_tempSmokeDis,
				'drinking'			=>	$_tempDrinking,
				'drinkdislike'	=>	$_tempDrinkDis,
				'tattoos'				=>	$_tempTattoos,
				'tattoosdislike'=>	$_tempTattoosDis,
				'piercings'			=>	$_tempPiercings,
				'piercedislike'	=>	$_tempPierceDis,
				'petpeeves'			=>	$_tempPetPeeves,
				'mouth'					=>	$_tempNSkillMouth,
				'tongue'				=>	$_tempNSkillTongue,
				'hands'					=>	$_tempNSkillHands,
				'butt'					=>	$_tempNSkillButt,
				'badness'				=>	$_tempNSkillBad,
				'language'			=>	$_tempNiceSkillLang,
				'activities'		=>	$_tempNiceSkillActivity,
				'domestic'			=>	$_tempNiceSkillDomestic,
				'goodness'			=>	$_tempNiceSkillGoodness,
				
				
				
				'worsttrait'		=>	$sql_obj_result->worsttrait,
				'besttrait'			=>	$_bestTrait,
				'seek_m'				=>	$sql_obj_result->seek_m,
				'seek_w'				=>	$sql_obj_result->seek_w,
				'seek_t'				=>	$sql_obj_result->seek_t,
				'seek_c'				=>	$sql_obj_result->seek_c,
				'seek_g'				=>	$sql_obj_result->seek_g,
				'into_friends'	=>	$sql_obj_result->into_friends,
				'into_relationship'	=>	$sql_obj_result->into_relationship,
				'into_flirting'	=>	$sql_obj_result->into_flirting,
				'into_sex'			=>	$sql_obj_result->into_sex,
				'into_fetish'		=>	$sql_obj_result->into_fetish,
				'fav_asian'			=>	$sql_obj_result->fav_asian,
				'fav_white'			=>	$sql_obj_result->fav_white,
				'fav_black'			=>	$sql_obj_result->fav_black,
				'fav_eindian'		=>	$sql_obj_result->fav_eindian,
				'fav_islander'	=>	$sql_obj_result->fav_islander,
				'fav_hispanic'	=>	$sql_obj_result->fav_hispanic,
				'fav_meastern'	=>	$sql_obj_result->fav_meastern,
				'fav_namericanindian'			=>	$sql_obj_result->fav_namericanindian,
				'fav_latino'		=>	$sql_obj_result->fav_latino,
				'fav_animals'		=>	$sql_obj_result->fav_animals,
				'fantasy_twogirls'	=>	$sql_obj_result->fantasy_twogirls,
				'fantasy_twoguys'		=>	$sql_obj_result->fantasy_twoguys,
				'fantasy_public'		=>	$sql_obj_result->fantasy_public,
				'fantasy_boat'			=>	$sql_obj_result->fantasy_boat,
				'fantasy_dominatrix'=>	$sql_obj_result->fantasy_dominatrix,
				'fantasy_beach'			=>	$sql_obj_result->fantasy_beach,
				'fantasy_outdoors'	=>	$sql_obj_result->fantasy_outdoors,
				'fantasy_askme'			=>	$sql_obj_result->fantasy_askme,
				'fantasy_toys'			=>	$sql_obj_result->fantasy_toys,
				'fantasy_illegal'		=>	$sql_obj_result->fantasy_illegal,
				'turnon_butt'				=>	$sql_obj_result->turnon_butt,
				'turnon_legs'				=>	$sql_obj_result->turnon_legs,
				'turnon_chest'			=>	$sql_obj_result->turnon_chest,
				'turnon_hands'			=>	$sql_obj_result->turnon_hands,
				'turnon_tan'				=>	$sql_obj_result->turnon_tan,
				'turnon_mind'				=>	$sql_obj_result->turnon_mind,
				'turnon_feet'				=>	$sql_obj_result->turnon_feet,
				'turnon_askme'			=>	$sql_obj_result->turnon_askme,
				'turnon_hair'				=>	$sql_obj_result->turnon_hair,
				'turnon_piercings'	=>	$sql_obj_result->turnon_piercings,
				'turnon_money'			=>	$sql_obj_result->turnon_money,
				'turnon_power'			=>	$sql_obj_result->turnon_power,
				'turnon_size'				=>	$sql_obj_result->turnon_size,
				'turnon_hardbody'		=>	$sql_obj_result->turnon_hardbody,
				'turnon_mysecret'		=>	$sql_obj_result->turnon_mysecret,
				
				'naughty_m1'				=>	$sql_obj_result->naughty_m1,
				'naughty_m2'				=>	$sql_obj_result->naughty_m2,
				'naughty_m3'				=>	$sql_obj_result->naughty_m3,
				'naughty_m4'				=>	$sql_obj_result->naughty_m4,
				'naughty_m5'				=>	$sql_obj_result->naughty_m5,

				'naughty_t1'				=>	$sql_obj_result->naughty_t1,
				'naughty_t2'				=>	$sql_obj_result->naughty_t2,
				'naughty_t3'				=>	$sql_obj_result->naughty_t3,
				'naughty_t4'				=>	$sql_obj_result->naughty_t4,

				'naughty_h1'				=>	$sql_obj_result->naughty_h1,
				'naughty_h2'				=>	$sql_obj_result->naughty_h2,
				'naughty_h3'				=>	$sql_obj_result->naughty_h3,
				'naughty_h4'				=>	$sql_obj_result->naughty_h4,
				'naughty_h5'				=>	$sql_obj_result->naughty_h5,

				'naughty_b1'				=>	$sql_obj_result->naughty_b1,
				'naughty_b2'				=>	$sql_obj_result->naughty_b2,
				'naughty_b3'				=>	$sql_obj_result->naughty_b3,
				'naughty_b4'				=>	$sql_obj_result->naughty_b4,
				'naughty_b5'				=>	$sql_obj_result->naughty_b5,

				'naughty_n1'				=>	$sql_obj_result->naughty_n1,
				'naughty_n2'				=>	$sql_obj_result->naughty_n2,
				'naughty_n3'				=>	$sql_obj_result->naughty_n3,
				'naughty_n4'				=>	$sql_obj_result->naughty_n4,
				'naughty_n5'				=>	$sql_obj_result->naughty_n5,
				'naughty_n6'				=>	$sql_obj_result->naughty_n6,
				'naughty_n7'				=>	$sql_obj_result->naughty_n7,
				'naughty_n8'				=>	$sql_obj_result->naughty_n8,
				'naughty_n9'				=>	$sql_obj_result->naughty_n9,
				'naughty_n10'				=>	$sql_obj_result->naughty_n10,

				'nice_lang1'				=>	$sql_obj_result->nice_lang1,
				'nice_lang2'				=>	$sql_obj_result->nice_lang2,
				'nice_lang3'				=>	$sql_obj_result->nice_lang3,
				'nice_lang4'				=>	$sql_obj_result->nice_lang4,
				'nice_lang5'				=>	$sql_obj_result->nice_lang5,
				'nice_lang6'				=>	$sql_obj_result->nice_lang6,
				'nice_lang7'				=>	$sql_obj_result->nice_lang7,
				'nice_lang8'				=>	$sql_obj_result->nice_lang8,

				'nice_act1'				=>	$sql_obj_result->nice_act1,
				'nice_act2'				=>	$sql_obj_result->nice_act2,
				'nice_act3'				=>	$sql_obj_result->nice_act3,
				'nice_act4'				=>	$sql_obj_result->nice_act4,
				'nice_act5'				=>	$sql_obj_result->nice_act5,
				'nice_act6'				=>	$sql_obj_result->nice_act6,
				'nice_act7'				=>	$sql_obj_result->nice_act7,
				'nice_act8'				=>	$sql_obj_result->nice_act8,

				'nice_dom1'				=>	$sql_obj_result->nice_dom1,
				'nice_dom2'				=>	$sql_obj_result->nice_dom2,
				'nice_dom3'				=>	$sql_obj_result->nice_dom3,
				'nice_dom4'				=>	$sql_obj_result->nice_dom4,
				'nice_dom5'				=>	$sql_obj_result->nice_dom5,
				'nice_dom6'				=>	$sql_obj_result->nice_dom6,
				'nice_dom7'				=>	$sql_obj_result->nice_dom7,
				'nice_dom8'				=>	$sql_obj_result->nice_dom8,

				'nice_good1'				=>	$sql_obj_result->nice_good1,
				'nice_good2'				=>	$sql_obj_result->nice_good2,
				'nice_good3'				=>	$sql_obj_result->nice_good3,
				'nice_good4'				=>	$sql_obj_result->nice_good4,
				'nice_good5'				=>	$sql_obj_result->nice_good5,
				'nice_good6'				=>	$sql_obj_result->nice_good6,
				'nice_good7'				=>	$sql_obj_result->nice_good7,
				'nice_good8'				=>	$sql_obj_result->nice_good8,


				'zipcode'				=>	$sql_obj_result->zipcode,
				'joinedon'			=>	$this->__profileSpec('joinedon', $sql_obj_result->tsjoinedon),
				'tsmodified'		=>	( date(D, time()) ) - ( date(D, $sql_obj_result->tsmodified) ),
				'membertype'		=>	$sql_obj_result->membertype,
				'verified'			=>	$sql_obj_result->verified,
				'level'					=>	$sql_obj_result->level,
				'numimages'			=>	$sql_obj_result->numimages
			);

  		$_return			=	$MemberProfileSpecArray;

		}else{
			$_return			= false;
		}


	 return $_return;  	
	}
	// =================================================================













	// METHOD :: GetMemberProfile =======================================
	public function GetMemberProfile($MemberID){

		$_return									= false;
		$CurrentTime							= time();

		// check for encrypted promocode -------------
		if(strlen($MemberID) > 20){
			$MemberID =	$this->Decrypt($MemberID);
		}
		// -------------------------------------------



		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  	// Retrieve Profile ----------------------------------------------
		$sql_MbrSpec		= mysql_query("SELECT * FROM user WHERE user.userid = '$MemberID'");
  	$sql_obj_result	=	mysql_fetch_object($sql_MbrSpec);



		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


  	if( $sql_obj_result == true ){
  		$_return			=	$sql_obj_result;
		}else{
			$_return			= false;
		}


	 return $_return;  	
	}
	// =================================================================








































	// METHOD :: Encrypt ===============================================
	public function Encrypt($PlainText, $Cipher = 'public', $Property = null){

		// set per-property encryption -----------------------------------
		if($Property != null){

  		$confXML				= '/var/www/vhosts/dbconf/keys.'.$Property;
  		$_baseXMLConn		= simplexml_load_file($confXML) or die ("ERROR: ** KEYS Not Loaded  **");

  		// encryption PUBLIC ---------------------------------
  		$this->__passPhrase_PUBLIC	= $_baseXMLConn->public->passPhrase;
  		$this->__key_PUBLIC					= $_baseXMLConn->public->key;
  		$this->__cipherType_PUBLIC	= $_baseXMLConn->public->cipherType;
  		$this->__cipherMode_PUBLIC	= $_baseXMLConn->public->cipherMode;
  
  		// encryption PRIVATE --------------------------------
  		$this->__passPhrase_PRIVATE	= $_baseXMLConn->private->passPhrase;
  		$this->__key_PRIVATE				= $_baseXMLConn->private->key;
  		$this->__cipherType_PRIVATE	= $_baseXMLConn->private->cipherType;
  		$this->__cipherMode_PRIVATE	= $_baseXMLConn->private->cipherMode;

		}else{
			// use constructor values ----------------------------
		}
		// ---------------------------------------------------------------




		// define crypto object per scope --------------------------------
		if($Cipher == 'public'){
      // Encryption ----------------------------------------
      $encryptObj							=	new baseCrypto;
      $encryptObj->cipherType = $this->__cipherType_PUBLIC;
      $encryptObj->cipherMode = $this->__cipherMode_PUBLIC;
      $encryptObj->passPhrase = $this->__passphrase_PUBLIC;
      $encryptObj->key 				= $this->__key_PUBLIC;
      // ---------------------------------------------------
  	}elseif($Cipher == 'private'){
      // Encryption ----------------------------------------
      $encryptObj							=	new baseCrypto;
      $encryptObj->cipherType = $this->__cipherType_PRIVATE;
      $encryptObj->cipherMode = $this->__cipherMode_PRIVATE;
    	$encryptObj->passPhrase = $this->__passphrase_PRIVATE;
    	$encryptObj->key 				= $this->__key_PRIVATE;      
      // ---------------------------------------------------
  	}
  	// ---------------------------------------------------------------




		// Encrypt Plain Text --------------------------------------------
		$encryptObj->plainText			=	$PlainText;
		$CipherText 								=	$encryptObj->ReturnHexCipherText();
  	// ---------------------------------------------------------------



		// Destroy Encryption Object -------------------------------------
		$encryptObj->__destruct();
  	// ---------------------------------------------------------------


		return $CipherText;		
	}
	// =================================================================
















	// METHOD :: Decrypt ===============================================
	public function Decrypt($CipherText, $Cipher = 'public', $Property = null){



		// set per-property encryption -----------------------------------
		if($Property != null){

  		$confXML				= '/var/www/vhosts/dbconf/keys.'.$Property;
  		$_baseXMLConn		= simplexml_load_file($confXML) or die ("ERROR: ** KEYS Not Loaded  **");

  		// encryption PUBLIC ---------------------------------
  		$this->__passPhrase_PUBLIC	= $_baseXMLConn->public->passPhrase;
  		$this->__key_PUBLIC					= $_baseXMLConn->public->key;
  		$this->__cipherType_PUBLIC	= $_baseXMLConn->public->cipherType;
  		$this->__cipherMode_PUBLIC	= $_baseXMLConn->public->cipherMode;
  
  		// encryption PRIVATE --------------------------------
  		$this->__passPhrase_PRIVATE	= $_baseXMLConn->private->passPhrase;
  		$this->__key_PRIVATE				= $_baseXMLConn->private->key;
  		$this->__cipherType_PRIVATE	= $_baseXMLConn->private->cipherType;
  		$this->__cipherMode_PRIVATE	= $_baseXMLConn->private->cipherMode;

		}else{
			// use constructor values ----------------------------
		}
		// ---------------------------------------------------------------




		// define crypto object per scope --------------------------------
		if($Cipher == 'public'){
      // Encryption ----------------------------------------
      $encryptObj							=	new baseCrypto;
      $encryptObj->cipherType = $this->__cipherType_PUBLIC;
      $encryptObj->cipherMode = $this->__cipherMode_PUBLIC;
      $encryptObj->passPhrase = $this->__passphrase_PUBLIC;
      $encryptObj->key 				= $this->__key_PUBLIC;
      // ---------------------------------------------------
  	}elseif($Cipher == 'private'){
      // Encryption ----------------------------------------
      $encryptObj							=	new baseCrypto;
      $encryptObj->cipherType = $this->__cipherType_PRIVATE;
      $encryptObj->cipherMode = $this->__cipherMode_PRIVATE;
    	$encryptObj->passPhrase = $this->__passphrase_PRIVATE;
    	$encryptObj->key 				= $this->__key_PRIVATE;      
      // ---------------------------------------------------
  	}
  	// ---------------------------------------------------------------



		// Decrypt Cipher Text -------------------------------------------
		$encryptObj->DecryptIt	=	$CipherText;
		$_return								=	$encryptObj->ReturnDecryptedText();
  	// ---------------------------------------------------------------


		// Destroy Encryption Object -------------------------------------
		$encryptObj->__destruct();
  	// ---------------------------------------------------------------


		return $_return;
	}
	// =================================================================



	
	
	
	
	
	
	
	
	

	// METHOD :: FilterRawInput ========================================
	public function FilterRawInput($RawInput){

		
		$_tempResult = filter_var($RawInput, FILTER_SANITIZE_STRING);
		$_tempResult = filter_var($_tempResult, FILTER_SANITIZE_MAGIC_QUOTES);


	 return $_tempResult;
	}
	// =================================================================		























// END OF METHODS ------------------------------------------------------------------------


}
// END OF CLASS ========================================================================================================






















// Example Arrays for Testing Usage ====================================================================================


/*
DEPRECIATED COPY


	// =================================================================
	public function ValidateForm($FormData, $Mode = 1){




				// form communication dataset ----------------------
				//$Array_Post_EXPLODED = explode(':',$_POST['_Parameter']);
				$Array_Post_EXPLODED = explode(':',$FormData);

				$Array_Post = array(
					'table' 			=> $Array_Post_EXPLODED[0],
					'field' 			=> $Array_Post_EXPLODED[1],
					'value' 			=> $Array_Post_EXPLODED[2]
				);
				// -------------------------------------------------




				// get Validation rules from DB ----------
				$_validation_DB						=	$this->GetFormValidationRules();


				// populate array from DB dataset --------
				foreach($_validation_DB as $_Array){
					foreach($_Array as $_field_2 => $_value_2){

						if($_value_2 == $Array_Post['field']){
      				$Array_Validation_Response = array(
      					'response_invalid' 					=> $_Array['response_invalid'],
      					'response_incomplete'				=> $_Array['response_incomplete'],
      					'response_unavailable'			=> $_Array['response_unavailable'],
      					'response_valid' 						=> $_Array['response_valid'],
      					'icon_invalid_url_small'		=> $_Array['icon_invalid_url'],
      					'icon_valid_url_small'			=> $_Array['icon_valid_url'],
      					'response_div_id' 					=> $_Array['response_div_id'],
      					'rule' 											=> $_Array['rule'],
      					'check_func'								=> $_Array['check_func'],
      					'default'										=> $_Array['default'],
      					'field'											=> $_Array['field']
      				);
						}
					}
				}
				// ---------------------------------------






// check database for existing ===========================================================

						// validation rule from DB ---------------------
						eval('$evalResult=('.$Array_Validation_Response['rule'].')?true:false;');

			
						if($Array_Validation_Response['check_func']){


      				// exists --------
      				if($this->$Array_Validation_Response['check_func']($Array_Post['value']) == false){
  
      					switch($Mode){
      						case 1:
      							echo $Array_Validation_Response['response_unavailable'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
      						break;
  
      						case 2:
      							echo $Array_Validation_Response['default'].' '.$Array_Validation_Response['response_unavailable'];
      						break;
      					}
  						}
						}
// =======================================================================================





// validate field ========================================================================
						// incomplete ----
    				if(!$Array_Post['value']){
    					
    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';	
    						break;

    						case 2:
    							// plan B response from Hard Validation ------------
    							//echo $Array_Validation_Response['default'].' '.$Array_Validation_Response['response_incomplete'].'+';
    							echo $Array_Validation_Response['field'].'+';
    						break;
    					}

    				// invalid -------
    				//}elseif(filter_var($Array_Post['value'], FILTER_VALIDATE_EMAIL) == false){
    				}elseif($evalResult){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							//echo $Array_Validation_Response['default'].' '.$Array_Validation_Response['response_invalid'].'+';
    							echo $Array_Validation_Response['field'].'+';
    						break;
    					}


    				// valid ---------
    				}else{

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    						break;

    						case 2:
    							//echo 'Email Field Valid';
    						break;
    					}
    				}
// =======================================================================================






/*



die();



				// validation tests ----------------------
				switch($Array_Post['field']){



					// validate first name ------------------
					case('first_name'):
						//$__regex = '/^[a-z\d_]{2,20}$/i';
						// incomplete ----
    				if(!$Array_Post['value']){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *First Name '.$Array_Validation_Response['response_incomplete'].'* ';
    						break;
    					}
    					
    				// invalid -------
    				}elseif(preg_match('/^[a-z\d_]{2,20}$/i', $Array_Post['value']) == false){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *First Name '.$Array_Validation_Response['response_invalid'].'* ';
    						break;
    					}

    				// valid ---------
    				}else{

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    						break;

    						case 2:
    							//echo 'Username '.$Array_Validation_Response['response_valid'];
    						break;
    					}
    				}						
					break;
					// -------------------------------------


					// validate email address --------------
					case('email_addr'):

						// rule from DB ----------------------
						eval('$evalResult=('.$Array_Validation_Response['rule'].')?true:false;');

						// incomplete ----
    				if(!$Array_Post['value']){
    					
    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';	
    						break;

    						case 2:
    							echo 'Email '.$Array_Validation_Response['response_incomplete'];
    						break;
    					}

    				// invalid -------
    				//}elseif(filter_var($Array_Post['value'], FILTER_VALIDATE_EMAIL) == false){
    				}elseif($evalResult){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *Email '.$Array_Validation_Response['response_invalid'].'* ';
    						break;
    					}

    				// exists --------
    				}elseif($this->VerifyUnique_eMail($Array_Post['value']) == false){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_unavailable'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *Email '.$Array_Validation_Response['response_unavailable'].'* ';
    						break;
    					}


    				// valid ---------
    				}else{

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    						break;

    						case 2:
    							//echo 'Email Field Valid';
    						break;
    					}
    				}
					break;
					// -------------------------------------


					// validate password -------------------
					case('password'):
						// incomplete ----
    				if(!$Array_Post['value']){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *Password '.$Array_Validation_Response['response_incomplete'].'* ';
    						break;
    					}
    					
    				// invalid -------
    				}elseif(strlen($Array_Post['value']) < 5 || $Array_Post['value'] == 'Password'){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *Password '.$Array_Validation_Response['response_invalid'].'* ';
    						break;
    					}
    					
    				// valid ---------
    				}else{

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    						break;

    						case 2:
    							//echo $Array_Validation_Response['response_valid'];
    						break;
    					}
    					
    				}						
					break;
					// -------------------------------------


					// validate phone ----------------------
					case('phone'):
						// incomplete ----
    				if(!$Array_Post['value']){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *Phone '.$Array_Validation_Response['response_incomplete'].'* ';
    						break;
    					}

    				// invalid -------
    				//}elseif($obj_Member->Validate_USPhone($Array_Post['value'],$useareacode=true) == false){
    				}elseif($this->Validate_USPhone($Array_Post['value']) == false){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *Phone '.$Array_Validation_Response['response_invalid'].'* ';
    						break;
    					}
    					
    				// valid ---------
    				}else{

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    						break;

    						case 2:
    							//echo 'Phone '.$Array_Validation_Response['response_valid'];
    						break;
    					}
    					
    				}						
					break;
					// -------------------------------------


					// validate user name ------------------
					case('username'):
						$__regex = '/^[a-z\d_]{5,20}$/i';
						// incomplete ----
    				if(!$Array_Post['value']){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *Username '.$Array_Validation_Response['response_incomplete'].'* ';
    						break;
    					}
    					
    				// invalid -------
    				}elseif(preg_match($__regex, $Array_Post['value']) == false){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *Username '.$Array_Validation_Response['response_invalid'].'* ';
    						break;
    					}

    				// valid ---------
    				}else{

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    						break;

    						case 2:
    							//echo 'Username '.$Array_Validation_Response['response_valid'];
    						break;
    					}
    					
    					
    				}						
					break;
					// -------------------------------------


					// validate credit card ----------------
					case('cc_number'):
						$__regex = '^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})$^';
						// incomplete ----
    				if(!$Array_Post['value']){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *Credit Card '.$Array_Validation_Response['response_incomplete'].'* ';
    						break;
    					}
    					
    				// invalid -------
    				}elseif(preg_match('^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})$^', $Array_Post['value']) == false){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *Credit Card '.$Array_Validation_Response['response_incomplete'].'* ';
    						break;
    					}
    					
    				// valid ---------
    				}else{

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    						break;

    						case 2:
    							//echo 'Credit Card '.$Array_Validation_Response['response_valid'];
    						break;
    					}
    					
    				}						
					break;
					// -------------------------------------

					// validate zipcode --------------------
					case('zipcode'):
						// incomplete ----
    				if(!$Array_Post['value']){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *ZIP Code '.$Array_Validation_Response['response_incomplete'].'* ';
    						break;
    					}
    					
    				// invalid -------
    				//}elseif(filter_var($Array_Post['value'], FILTER_VALIDATE_INT) == false || strlen($Array_Post['value']) < 5){
    				}elseif($this->Validate_ZIPCode($Array_Post['value']) == false){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *ZIP Code '.$Array_Validation_Response['response_invalid'].'* ';
    						break;
    					}

    				// valid ---------
    				}else{

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    						break;

    						case 2:
    							//echo 'ZIP Code '.$Array_Validation_Response['response_valid'];
    						break;
    					}
    					
    				}						
					break;
					// -------------------------------------

					// validate SSN ------------------------
					case('ssn'):
						$__regex = '^[0-9]{3}[ ]*[)]{0,1}[-.]{0,1}[ ]*[0-9]{2}[ ]*[)]{0,1}[-.]{0,1}[ ]*[0-9]{4}$^';
						// incomplete ----
    				if(!$Array_Post['value']){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *SSN '.$Array_Validation_Response['response_incomplete'].'* ';
    						break;
    					}
    					
    				// invalid -------
    				}elseif(preg_match('^[0-9]{3}[ ]*[)]{0,1}[-.]{0,1}[ ]*[0-9]{2}[ ]*[)]{0,1}[-.]{0,1}[ ]*[0-9]{4}$^', $Array_Post['value']) == false){

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    						break;

    						case 2:
    							echo ' *SSN '.$Array_Validation_Response['response_invalid'].'* ';
    						break;
    					}
    					
    				// valid ---------
    				}else{

    					switch($Mode){
    						case 1:
    							echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    						break;

    						case 2:
    							//echo 'SSN '.$Array_Validation_Response['response_valid'];
    						break;
    					}
    					
    				}						
					break;
					// -------------------------------------



				}




	 return $_return;	
	}
	// =================================================================



















*/

?>