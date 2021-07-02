<?php

// syntheticMagic ABS - EXE =========================================


// --------------------------------------------------------------------------------------------------------------------------------
// Author: 	Nathaniel Adam Briggs @ 2008
// Contact:	accounts@syntheticmagic.com
// Owner:		eGenerations Network, Inc. | syntheticMagic Advanced Business Services
// Client:	SM Clients
// Class:		N/A
// Version:	Release 2.1
// Method:	example()
// Purpose:	Handle all Core EXE Operations
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





// error header ------------------------
require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/inc/inc.error_header.php');

// class.member - member class -----------------------------
require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/class.unlimiCore.php');

// extended functions per property class -------------------
require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/ext.class.unlimiCore.'.$_SERVER['SERVER_NAME'].'.php');

// class.utils - utilities class ---------------------------
require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/class.utils.php');

// class.dompdf - utilities class --------------------------
require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/pdf/dompdf_config.inc.php');







  // ---------------------------------------------------------
  $obj_Member						=	new EXT_unlimiCore;
  $obj_Utils						=	new utils;

  $obj_Member->Initiate('Create', $_SERVER['SERVER_NAME']);
  $obj_Member->Authenticate($_SESSION['ActiveUser']);
  // ---------------------------------------------------------





  // ---------------------------------------------------------
	if($_POST['_function']){
		$_function = $_POST['_function'];

	}elseif($_GET['_function']){
		$_function = $_GET['_function'];
	}
  // ---------------------------------------------------------












  // CORE ==========================================================================
  
  
  

  
  
  
  
  
  // Unauthenticated Member Actions ============================================
  if( $obj_Member->MemberAuthorized == false ){






		// executable list -----------------------------------------------
    switch ($_function){




















			// ajax utility lookup =========================================
    	case "ajax.lookup.utility":


      	if( !$_POST['_Command'] || !$_POST['_Parameter'] || ($_SESSION['ActiveUser']['loginToken'] != $_POST['_UserToken']) ){
      		echo 'Communication Failure';
      	}else{
      		//$_SERVER['SERVER_NAME'];



      		// -------------------------------------------------------
      		$Command		= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_Command']));
      		$Parameter	= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_Parameter']));
      		// -------------------------------------------------------


      		if($_POST['_OptionalParameter']){
      			$OptionalParameter							= $obj_Member->FilterRawInput($_POST['_OptionalParameter']);
      		}

        		switch($Command){

      				// lookup city per searched ZIP Code ---------
        			case 'lookup.zipcode.prereg':
        				$CityLookupViaZIPCode = $obj_Member->GeoCodeLookup($Parameter, $Mode = 'Array');
        				echo $CityLookupViaZIPCode['city'];
	       			break;

      				default:
      				break;
        		}

      	}


   		break;
			// =============================================================









			// ajax - window refresh =======================================
    	case "ajax-WindowRefreshOS":


      	if( (!$_POST['_UserSession'] || !$_POST['_Command']) && (!$_POST['_UserSession'] || !$_POST['_Command']) ){
      		echo 'Communication Failure >> Try Refreshing Screen Please';
      	}else{
      		//echo $_SERVER['HTTP_REFERER'];																												//debug


      		// -------------------------------------------------------
      		$UserSession_ENCRYPTED_PRIVATE	= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_UserSession']));
      		$Command												= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_Command']));
      		// -------------------------------------------------------


      		if($_POST['_OptionalParameter']){
      			$OptionalParameter							= $obj_Member->FilterRawInput($_POST['_OptionalParameter']);
      		}

        		switch($Command){

      				// Pre-Registration Member Preview Section ===
        			case 'report.prereg_preview.current.home':
        				
        				$Option = explode(":",$OptionalParameter);
        			
        				$obj_Member->Report($UserSession_ENCRYPTED_PRIVATE, 'prereg_preview', $Option[0], $Option[1]);
        			//$obj_Member->Report(999999, 'prereg_preview', 1111, $IP2Location_ResultArray['zipcode']);
        			break;


      				default:
      				break;
        		}

      	}


   		break;
			// =============================================================








			// Create New Member ===========================================
    	case "member-Create":



        // Encryption ----------------------------------------------------
        $encryptObjVerifyHuman							=	new baseCrypto;
        $encryptObjVerifyHuman->cipherType 	= 1;			//	1 = TwoFish	2 = Rijndael	3 = DES
        $encryptObjVerifyHuman->cipherMode 	= 1;			//	1 = ECB	    2 = CBC				3 = CFB
        $encryptObjVerifyHuman->passPhrase 	= 'verifyHum@n';
        $encryptObjVerifyHuman->key 				= 'abc123K@y';
      	// ---------------------------------------------------------------

      	$encryptObjVerifyHuman->DecryptIt		= $obj_Member->FilterRawInput($_POST['signup_validator']);
      	$decrypted													=	ereg_replace("[^A-Za-z0-9]","",$encryptObjVerifyHuman->DisplayDecryptedText());
      	$humanValidator											= strtolower($obj_Member->FilterRawInput($_POST['signup_verify']));



        // -----------------------------------------------------------
      	unset($encryptObjVerifyHuman);
        // -----------------------------------------------------------


        // New User Sessioned IF Mistake is Made ---------------------
        $_SESSION['NewUser']['username'] 		= $obj_Member->FilterRawInput(strtolower($_POST['signup_username']));
        $_SESSION['NewUser']['password'] 		= $obj_Member->FilterRawInput($_POST['signup_pwd']);
      	$_SESSION['NewUser']['email_addr'] 	= $obj_Member->FilterRawInput(strtolower($_POST['signup_emailaddress']));
      	$_SESSION['NewUser']['email_addr2']	= $obj_Member->FilterRawInput(strtolower($_POST['signup_confirmemailaddress']));
      	$_SESSION['NewUser']['zipcode']			= $obj_Member->FilterRawInput($_POST['signup_zipcode']);
        


				// age verification ------------------------------------------
        $AgeCheck_FINAL = 'fail';
        $___ageTime 		= mktime(0,0,0,$obj_Member->FilterRawInput($_POST['signup-birthmonth']),$obj_Member->FilterRawInput($_POST['signup-birthday']),$obj_Member->FilterRawInput($_POST['signup-birthyear']));
        $___t 					= time(); // Store current time for consistency
        $___age 				=($___ageTime < 0) ? ( $___t + ($___ageTime * -1) ) : $___t - $___ageTime;
        $___year 				= 60 * 60 * 24 * 365;
        $___ageYears 		= $___age / $___year;

        if($___ageYears < 18){
        	$AgeCheck_FINAL = 'fail';
        }else{
        	$AgeCheck_FINAL = 'pass';
        }
        // -----------------------------------------------------------



  			if(($_POST['signup_emailaddress'] != $_POST['signup_confirmemailaddress']) ){
  				$_SESSION['NewUser']['signup_error'] = 'FailEMC';
  				echo '<script type="text/javascript">location="'.$_SESSION['NewUser']['signup_url'].'";</script>';

  			}elseif( ($humanValidator != $decrypted) ){
  				$_SESSION['NewUser']['signup_error'] = 'FailHV';
					echo '<script type="text/javascript">location="'.$_SESSION['NewUser']['signup_url'].'";</script>';

  			}elseif( ($_POST['signup_Token'] != $_SESSION['NewUser']['SignUpToken']) ){
  				$_SESSION['NewUser']['signup_error'] = 'FailT';
					echo '<script type="text/javascript">location="'.$_SESSION['NewUser']['signup_url'].'";</script>';

  			}elseif( (time() > $obj_Member->Decrypt($_SESSION['NewUser']['SignUpTokenExpiration'], 'private')) ){
  				$_SESSION['NewUser']['signup_error'] = 'ExpiredT';
  				echo '<script type="text/javascript">location="'.$_SESSION['NewUser']['signup_url'].'";</script>';	

  			}elseif( filter_var($_POST['signup_emailaddress'], FILTER_VALIDATE_EMAIL) == false || filter_var($_POST['signup_confirmemailaddress'], FILTER_VALIDATE_EMAIL) == false ){
  				$_SESSION['NewUser']['signup_error'] = 'FailEM';
					echo '<script type="text/javascript">location="'.$_SESSION['NewUser']['signup_url'].'";</script>';

  			}elseif($AgeCheck_FINAL == 'fail'){
  				$_SESSION['NewUser']['signup_error'] = 'FailA';
					echo '<script type="text/javascript">location="'.$_SESSION['NewUser']['signup_url'].'";</script>';

				}else{





          // New User ----------------------------------------------
          //$_SESSION['NewUser']['username'] 		= trim($obj_Member->FilterRawInput($_POST['signup_username']));
        	$_SESSION['NewUser']['email_addr'] 	= trim(strtolower($obj_Member->FilterRawInput($_POST['signup_emailaddress'])));
        	$_SESSION['NewUser']['email_addr2']	= trim(strtolower($obj_Member->FilterRawInput($_POST['signup_confirmemailaddress'])));
          $_SESSION['NewUser']['password'] 		= $obj_Member->FilterRawInput($_POST['signup_pwd']);
        	$_SESSION['NewUser']['dob']					=	mktime(0,0,0,$obj_Member->FilterRawInput($_POST['signup-birthmonth']),$obj_Member->FilterRawInput($_POST['signup-birthday']),$obj_Member->FilterRawInput($_POST['signup-birthyear']));          

          $_SESSION['NewUser']['first_name'] 		= $obj_Member->FilterRawInput(strtolower($_POST['signup_first_name']));
          $_SESSION['NewUser']['last_name'] 		= $obj_Member->FilterRawInput(strtolower($_POST['signup_last_name']));
        	$_SESSION['NewUser']['company_name']	= $obj_Member->FilterRawInput(strtolower($_POST['signup_company_name']));
        	$_SESSION['NewUser']['taxid']					= $obj_Member->Encrypt($obj_Member->FilterRawInput($_POST['signup_taxid']), 'private');;
					$_SESSION['NewUser']['domain']				= $obj_Member->FilterRawInput(strtolower($_POST['signup_domain']));
					$_SESSION['NewUser']['address1']			= $obj_Member->FilterRawInput(strtolower($_POST['signup_address1']));
        	$_SESSION['NewUser']['zipcode']				= $obj_Member->FilterRawInput($_POST['signup_zipcode']);
        	$_SESSION['NewUser']['phone_number']	= $obj_Member->FilterRawInput($_POST['signup_phone_number']);
        	$_SESSION['NewUser']['agreement1']		= $obj_Member->FilterRawInput($_POST['signup_agreement1']);
        	$_SESSION['NewUser']['agreement1']		= $obj_Member->FilterRawInput($_POST['signup_agreement1']);


        	$_SESSION['NewUser']['country']			= $obj_Member->FilterRawInput($_POST['signup_country']);
        	$_SESSION['NewUser']['ip'] 					= $obj_Member->FilterRawInput($_SERVER['REMOTE_ADDR']);

        	$_SESSION['NewUser']['verify']			= $obj_Member->FilterRawInput($_POST['signup_verify']);
        	$_SESSION['NewUser']['validator']		= $obj_Member->FilterRawInput($_POST['signup_validator']);



/*
*** DISABLED 06.30.2009 ***

					// Free Account for Women via PROMOCODE = newgirl = 1 year Ultra Premium Account
					if($_SESSION['NewUser']['gender'] == 2){
						$_SESSION['NewUser']['promocode'] = '3153384fbef12c86dffc3d0aa8a05d3c';
					}
*/


        	// Create New Member -------------------------------------
         	if( $obj_Member->Create($_SESSION['NewUser']) == true ){


		  			$_SESSION['ActiveUser']['email_addr'] 				= $_SESSION['NewUser']['email_addr'];
  					$_SESSION['ActiveUser']['password'] 					= $obj_Member->Encrypt($_SESSION['NewUser']['password'], 'private');


      			// Authenticae Member ------------------------------------
        		$obj_Member->Authenticate($_SESSION['ActiveUser']);
      			// -------------------------------------------------------


						// create default banner & geo promo ---------------------
						$obj_Member->CreateAffiliatePromo($_SESSION['ActiveUser']['userid'], 'banner', 'DOMAIN_HERE.com', 'default');
						$obj_Member->CreateAffiliatePromo($_SESSION['ActiveUser']['userid'], 'geo', 'DOMAIN_HERE.com', 'default');
						
						//$__DefaultPromoID = $obj_Member->VerifyAffiliatePromoExists($_SESSION['ActiveUser']['userid']);


/*
						// PROMOCODE REFERRED SIGNUP -----------------------------
						if($_SESSION['NewUser']['promocode']){
							$_SESSION['ActiveUser']['promocode'] 					= $_SESSION['NewUser']['promocode'];
						}

						
						// PROFILE REFERRED SIGNUP -------------------------------
						if($_SESSION['NewUser']['referrer_profile']){
							$_SESSION['ActiveUser']['referrer_profile'] 	= $_SESSION['NewUser']['referrer_profile'];
						}
*/


						// goto SignupComplete Page ------------------------------
						?> <script type="text/javascript">location="http://sm0005.com/SignupComplete";</script> <?          	
          	
          	
          	unset($_SESSION['NewUser']);
          	
          
          
          }else{
          	echo '<script type="text/javascript">location="'.$_SESSION['NewUser']['signup_url'].'";</script>';
          }

				}
      	// -------------------------------------------------------

    	break;
			// =============================================================



































			// Logout ======================================================
    	case "member-Logout":

      	// Logout Member -----------------------------------------
        $obj_Member->Logout($_SESSION['ActiveUser']);
      	// -------------------------------------------------------

				echo 'Logged Out';

   		break;
			// =============================================================


















/*
			// Logout ======================================================
    	case "member-Activate":


				$_userid_encrypted 	= $_GET['_898a8as'];
				$_userid_password 	= $_GET['_fdf7687'];


      	// Activate Member ---------------------------------------
      	if($obj_Member->Activate($_userid_encrypted, $_userid_password)){
      		?> <script type="text/javascript">location="http://sm0005.com/activated";</script> <?	
      	}else{
      		?> <script type="text/javascript">location="http://sm0005.com/notactivated";</script> <?
      	}
      	// -------------------------------------------------------

      	// Logout Member -----------------------------------------
        $obj_Member->Activate($_SESSION['ActiveUser']);
        $obj_Member->Activate($obj_Member->Encrypt('40'), 'df7e94623a451fecebe9f29adf0ed7e5fac9c8679eb9d5e0bc445a5300d5317c');
      	// -------------------------------------------------------

				echo 'Logged Out';

   		break;
			// =============================================================
*/



			// Default =====================================================
			default:
				//echo 'No Function Found - UnAuthed';
			// =============================================================


    }
    // end executable list -------------------------------------------



























// *****************************************************************************************************************************************
// *****************************************************************************************************************************************
// *****************************************************************************************************************************************
//												 * AUTHORIZED ACTIONS ONLY *
//												 * AUTHORIZED ACTIONS ONLY *
//												 * AUTHORIZED ACTIONS ONLY *
//												 * AUTHORIZED ACTIONS ONLY *
//												 * AUTHORIZED ACTIONS ONLY *
// *****************************************************************************************************************************************
// *****************************************************************************************************************************************
// *****************************************************************************************************************************************










	// Authenticated Member Actions ==============================================
  //}else{
	}elseif($obj_Member->MemberAuthorized == true){

		// executable list -----------------------------------------------
    switch ($_function){










			// transaction edit utility ====================================
    	case "transaction.edit":



      	if( !$_POST['_Command'] || !$_POST['_Parameter'] || !$_POST['_ContentID'] && $_SESSION['ActiveUser']['user_type_id'] >= 5){
      		echo 'Communication Failure';
      	}else{


      		// -------------------------------------------------------
      		$DataArray['command']					= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_Command']));
      		$DataArray['parameter']				= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_Parameter']));
      		$DataArray['contentid']				= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_ContentID']));
	   			//$DataArray['parametervalue']	= $obj_Member->FilterRawInput($_POST['_ParameterValue']);

	     		// -------------------------------------------------------




        		switch($DataArray['command']){



					// USER ==========================================
      				// delete --------------------------
        			case 'transaction.delete':
	        			$DataArray['contentid']			=		$obj_Member->Decrypt($DataArray['contentid'], 'private');
	        			$__exploded_COMMAND					=	explode('.',$DataArray['command']);
        				echo $UpdateResult 					= $obj_Member->KillTransaction($DataArray);
	       			break;

      				// disable -------------------------
        			case 'user.disable':
	        			//$DataArray['contentid']			=		$obj_Member->Decrypt($DataArray['contentid'], 'private');
        				//echo $UpdateResult 					= $obj_Member->EditResource($DataArray);
	       			break;

      				// enable --------------------------
        			case 'user.enable':
	        			//$DataArray['contentid']			=		$obj_Member->Decrypt($DataArray['contentid'], 'private');
        				//echo $UpdateResult 					= $obj_Member->EditResource($DataArray);
	       			break;

      				// type change ---------------------
        			case 'user.type':
	        			//$DataArray['contentid']			=		$obj_Member->Decrypt($DataArray['contentid'], 'private');
        				//echo $UpdateResult 					= $obj_Member->EditResource($DataArray);
	       			break;

					// ===============================================




      				default:
      					echo 'default.exe';
      				break;
        		}

      	}

   		break;
			// =============================================================














			// resources edit utility ======================================
    	case "resources.edit":



      	if( !$_POST['_Command'] || !$_POST['_Parameter'] || !$_POST['_ContentID'] && $_SESSION['ActiveUser']['user_type_id'] >= 5){
      		echo 'Communication Failure';
      	}else{


      		// -------------------------------------------------------
      		$DataArray['command']					= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_Command']));
      		$DataArray['parameter']				= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_Parameter']));
      		$DataArray['contentid']				= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_ContentID']));
	   			//$DataArray['parametervalue']	= $obj_Member->FilterRawInput($_POST['_ParameterValue']);

	     		// -------------------------------------------------------


        		switch($DataArray['command']){



					// USER ==========================================
      				// delete --------------------------
        			case 'user.delete':
	        			$DataArray['contentid']			=		$obj_Member->Decrypt($DataArray['contentid'], 'private');
	        			$__exploded_COMMAND					=		explode('.',$DataArray['command']);
        				echo $UpdateResult 					= 	$obj_Member->EditResource($DataArray);
	       			break;

      				// disable -------------------------
        			case 'user.disable':
	        			$DataArray['contentid']			=		$obj_Member->Decrypt($DataArray['contentid'], 'private');
        				echo $UpdateResult 					= 	$obj_Member->EditResource($DataArray);
	       			break;

      				// enable --------------------------
        			case 'user.enable':
	        			$DataArray['contentid']			=		$obj_Member->Decrypt($DataArray['contentid'], 'private');
        				echo $UpdateResult 					= 	$obj_Member->EditResource($DataArray);
	       			break;

      				// type change ---------------------
        			case 'user.type':
	        			$DataArray['contentid']			=		$obj_Member->Decrypt($DataArray['contentid'], 'private');
        				echo $UpdateResult 					=	 	$obj_Member->EditResource($DataArray);
	       			break;

      				// manager change ------------------
        			case 'user.manager':
	        			$DataArray['contentid']			=		$obj_Member->Decrypt($DataArray['contentid'], 'private');
        				echo $UpdateResult 					= 	$obj_Member->EditResource($DataArray);
	       			break;

      				// send login ----------------------
        			case 'user.login':
	        			$DataArray['contentid']			=		$obj_Member->Decrypt($DataArray['contentid'], 'private');
        				echo $UpdateResult 					= 	$obj_Member->EditResource($DataArray);
	       			break;

      				// quota ---------------------------
        			case 'user.quota':
	        			$DataArray['contentid']			=		$obj_Member->Decrypt($DataArray['contentid'], 'private');
        				echo $UpdateResult 					= 	$obj_Member->EditResource($DataArray);
	       			break;

					// ===============================================




      				default:
      					echo 'default.exe';
      				break;
        		}

      	}

   		break;
			// =============================================================




























// =================================================================================================
    	case "chart.crm":
        

				//echo "<graph><set name='cats' value='32' /><set name='goats' value='100' /><set name='sticks' value='4587' /></graph>";

				//$___ageTime 		= mktime(0,0,0,$obj_Member->FilterRawInput($_POST['signup-birthmonth']),$obj_Member->FilterRawInput($_POST['signup-birthday']),$obj_Member->FilterRawInput($_POST['signup-birthyear']));

				$_Dataset_MemberSessionActions = $obj_Member->GetMemberSessionActions('all',$_POST['_filter'],$_POST['_range']);
				echo $obj_Member->Report_UserSessionActions($_Dataset_MemberSessionActions, 'User Action Report', 'XML');
				
				die();

				$key = "<graph caption='User Action Report Trend' subcaption='For the month of Aug 2004' divlinecolor='F47E00' numdivlines='4' showAreaBorder='1' areaBorderColor='000000' numberPrefix='' showNames='1' numVDivLines='29' vDivLineAlpha='30' formatNumberScale='1' rotateNames='1'  decimalPrecision='0'>
   <categories>
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
   </dataset>
</graph>";

				echo $key;



   		break;
// =================================================================================================


























// secure form processor ===========================================================================
    	case "ajax.secureform.preprocess":




//DEBUG ======================
//print_r($_POST);
//die();

				$_Allow_Form_Submission				= false;

				// get target table --------------------------------
				$_TABLE_TARGET								= $_POST['_table'];

				// get validation rules ----------------------------
				$_Result_FormValidationRules 	= $obj_Member->GetFormValidationRules();

				
				// cycle through POST ------------------------------
				$__AllowFormSubmissionARRAYCOUNTER = 0;
				foreach($_POST as $_field_1 => $_value_1){
					if($_field_1 != '_function' && $_field_1 != '_token' && $_field_1 != '_token_expiration' && $_field_1 != '_agent_signature' && $_field_1 != '_table' && $_field_1 != '_revision_parent_id' && $_field_1 != '_revision'){
						
						// execute validation per FIELD & VALUE --------
						//$obj_Member->ValidateForm($_TABLE_TARGET.':'.$_field_1.':'.$_value_1, 2);
						if(($obj_Member->ValidateForm($_TABLE_TARGET.':'.$_field_1.':'.$_value_1, 2)) == 111){
							$_Allow_Form_Submission[$__AllowFormSubmissionARRAYCOUNTER] = true;
						}else{
							$_Allow_Form_Submission[$__AllowFormSubmissionARRAYCOUNTER] = false;
						}
							
						
						foreach($_Result_FormValidationRules as $_field_2 => $_value_2){
							if($_field_2 == 'field' && $_value_2['field'] == $_field_1 && $_value_2['default'] == $_value_1){
								//echo $_value_2['field'].'  '.$_value_2['default'];
								//echo  $_value_1;
								//echo 'default value used';
								//$_Allow_Form_Submission = false;

							}
						}
						
						//echo 'user.'.$_field_1.' = "'.$_value_1.'", ';
						// build query -----------------------
						$_Query_BASE	.=	$_TABLE_TARGET.'.'.$_field_1.' = "'.$_value_1.'", ';				//unused concept - query builder - echo for reminder...
					}
					
					$__AllowFormSubmissionARRAYCOUNTER++;
					
				}
				// -------------------------------------------------







				// cycle through submission check ------------------
				
				$_Allow_Form_Submission_FINAL	=	 true;
				
				foreach($_Allow_Form_Submission as $__AFS_Key => $__AFS_VALUE){
					if($__AFS_VALUE == false){
						$_Allow_Form_Submission_FINAL	=	 false;
					}
				}
				// -------------------------------------------------





				// check form submission status ----------------------------------------
				if($_Allow_Form_Submission_FINAL == true){

					
					// route form to processor -------------
					switch($_TABLE_TARGET){

						// NEW TRANSACTION -------------------
						case 'booking':
							// record action -------------------------
							$obj_Member->TrackAction($_SESSION['ActiveUser']['userid'], 'booking trans', 'validated', $_SERVER['HTTP_REFERER']);

							// process transaction -------------------
							$_return =	$obj_Member->CreateTransaction($_POST);
							//echo 'process New Trans Creation...';

						break;
						// -----------------------------------


						// NEW USER/RESOURCE -----------------
						case 'user':
							// record action -------------------------
							$obj_Member->TrackAction($_SESSION['ActiveUser']['userid'], 'new user', 'validated', $_SERVER['HTTP_REFERER']);

							// process transaction -------------------
							$_return =	$obj_Member->CreateResource($_POST);
						break;
						// -----------------------------------


						// NEW CLIENT  -----------------------
						case 'client':
							// record action -------------------------
							$obj_Member->TrackAction($_SESSION['ActiveUser']['userid'], 'new client', 'validated', $_SERVER['HTTP_REFERER']);

							// process transaction -------------------
							$_return =	$obj_Member->CreateResource($_POST);
						break;
						// -----------------------------------


						// NEW ADVERTISER  -------------------
						case 'advertiser':
							// record action -------------------------
							$obj_Member->TrackAction($_SESSION['ActiveUser']['userid'], 'new advertiser', 'validated', $_SERVER['HTTP_REFERER']);

							// process transaction -------------------
							$_return =	$obj_Member->CreateResource($_POST);
						break;
						// -----------------------------------


						// NEW VENDOR  -----------------------
						case 'vendor':
							// record action -------------------------
							$obj_Member->TrackAction($_SESSION['ActiveUser']['userid'], 'new vendor', 'validated', $_SERVER['HTTP_REFERER']);

							// process transaction -------------------
							$_return =	$obj_Member->CreateResource($_POST);
						break;
						// -----------------------------------

					}



				// form submission fail ------------------------------------------------
				}else{

					// route form to processor -------------
					switch($_TABLE_TARGET){


						// NEW TRANSACTION -------------------
						case 'booking':
							// record action -------------------------
							$obj_Member->TrackAction($_SESSION['ActiveUser']['userid'], 'booking trans', 'invalidate', $_SERVER['HTTP_REFERER']);
						break;
						// -----------------------------------


						// NEW USER/RESOURCE -----------------
						case 'user':
							// record action -------------------------
							$obj_Member->TrackAction($_SESSION['ActiveUser']['userid'], 'new user', 'invalidated', $_SERVER['HTTP_REFERER']);
						break;
						// -----------------------------------


						// NEW CLIENT ------------------------
						case 'client':
							// record action -------------------------
							$obj_Member->TrackAction($_SESSION['ActiveUser']['userid'], 'new client', 'invalidated', $_SERVER['HTTP_REFERER']);
						break;
						// -----------------------------------

						// NEW ADVERTISER --------------------
						case 'advertiser':
							// record action -------------------------
							$obj_Member->TrackAction($_SESSION['ActiveUser']['userid'], 'new advertiser', 'invalidated', $_SERVER['HTTP_REFERER']);
						break;
						// -----------------------------------

						case 'vendor':
							// record action -------------------------
							$obj_Member->TrackAction($_SESSION['ActiveUser']['userid'], 'new vendor', 'invalidated', $_SERVER['HTTP_REFERER']);
						break;
						// -----------------------------------

					}

					// fail --
					$_return = 666;
				}



				return $_return;

/*
				// form communication dataset ----------------------
				$Array_Post_EXPLODED = explode(':',$_POST['_Parameter']);

				$Array_Post = array(
					'table' 			=> $Array_Post_EXPLODED[0],
					'field' 			=> $Array_Post_EXPLODED[1],
					'value' 			=> $Array_Post_EXPLODED[2]
				);
				// -------------------------------------------------
*/

   		break;
			// =============================================================












// SALES REPORTS START =======================================================================================



// SALESMAN USER -----------------------

			// =============================================================
    	case "salesman_current_month_all_records.report":
				$_Dataset_Transactions = $obj_Member->Get_SalesPerson_Transactions_Month_FULLDETAIL($_SESSION['ActiveUser']['userid'], $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_SalesPerson_Primary($_Dataset_Transactions, date('F Y',time()).' Booking Report (Full)', 'HTML', null, 'salesman_current_month_all_records.report');
   		break;
			// =============================================================

			// =============================================================
    	case "salesman_current_month_all_records.chart":
				$obj_Member->CHART_REPORTS_Transactions($_SESSION['ActiveUser']['userid'], 'Sales Charts', $_POST['_range'], $_POST['_series']);
   		break;
			// =============================================================

			// =============================================================
    	case "salesman_current_month_all_records.pdf":
				$_Dataset_Transactions = $obj_Member->Get_SalesPerson_Transactions_Month_FULLDETAIL($_SESSION['ActiveUser']['userid'], $_GET['_filter'], $_GET['_range']);
				$_HTML	= $obj_Member->Report_SalesPerson_Primary($_Dataset_Transactions, 'Transaction Report', 'PDF');

			  $dompdf = new DOMPDF();
			  $dompdf->load_html($_HTML);
			  $dompdf->render();
				header("Content-type:application/pdf");
			  $dompdf->stream(date('m-d-Y',time())."-report-crm.pdf");
   		break;
			// =============================================================










			// =============================================================
    	case "salesman_current_month.report":
				$_Dataset_Transactions = $obj_Member->Get_SalesPerson_Dashboard_Month_COMPOSITE($_SESSION['ActiveUser']['userid'], $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_SalesPerson_Primary($_Dataset_Transactions, date('F Y',time()).' Booking Report (Aggregate)', 'HTML', null, 'salesman_current_month.report');
   		break;
			// =============================================================



			// =============================================================
    	case "salesman_current_month.dynadash.print":
				$_Dataset_Transactions = $obj_Member->Get_SalesPerson_Dashboard_Month_MEDIUM($_SESSION['ActiveUser']['userid'], 1, $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_SalesPerson_Primary($_Dataset_Transactions, date('F Y',time()).' Booking Report (PRINT)', 'HTML', null, 'salesman_current_month.dynadash.print');
   		break;
			// =============================================================


			// =============================================================
    	case "salesman_current_month.dynadash.outdoor":
				$_Dataset_Transactions = $obj_Member->Get_SalesPerson_Dashboard_Month_MEDIUM($_SESSION['ActiveUser']['userid'], 2, $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_SalesPerson_Primary($_Dataset_Transactions, date('F Y',time()).' Booking Report (OUTDOOR)', 'HTML', null, 'salesman_current_month.dynadash.outdoor');
   		break;
			// =============================================================

			// =============================================================
    	case "salesman_current_month.dynadash.tv":
				$_Dataset_Transactions = $obj_Member->Get_SalesPerson_Dashboard_Month_MEDIUM($_SESSION['ActiveUser']['userid'], 3, $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_SalesPerson_Primary($_Dataset_Transactions, date('F Y',time()).' Booking Report (TV)', 'HTML', null, 'salesman_current_month.dynadash.tv');
   		break;
			// =============================================================

			// =============================================================
    	case "salesman_current_month.dynadash.radio":
				$_Dataset_Transactions = $obj_Member->Get_SalesPerson_Dashboard_Month_MEDIUM($_SESSION['ActiveUser']['userid'], 4, $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_SalesPerson_Primary($_Dataset_Transactions, date('F Y',time()).' Booking Report (RADIO)', 'HTML', null, 'salesman_current_month.dynadash.radio');
   		break;
			// =============================================================

			// =============================================================
    	case "salesman_current_month.dynadash.internet":
				$_Dataset_Transactions = $obj_Member->Get_SalesPerson_Dashboard_Month_MEDIUM($_SESSION['ActiveUser']['userid'], 5, $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_SalesPerson_Primary($_Dataset_Transactions, date('F Y',time()).' Booking Report (INTERNET)', 'HTML', null, 'salesman_current_month.dynadash.internet');
   		break;
			// =============================================================

			// =============================================================
    	case "salesman_current_month.dynadash.mobile":
				$_Dataset_Transactions = $obj_Member->Get_SalesPerson_Dashboard_Month_MEDIUM($_SESSION['ActiveUser']['userid'], 6, $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_SalesPerson_Primary($_Dataset_Transactions, date('F Y',time()).' Booking Report (MOBILE)', 'HTML', null, 'salesman_current_month.dynadash.mobile');
   		break;
			// =============================================================


			// =============================================================
    	case "salesman_totals.report":
				$_Dataset_Transactions = $obj_Member->GetTransactions('salesperson', $_SESSION['ActiveUser']['userid'], $_POST['_filter'], $_POST['_range'], 'salesman_totals.report');
				$obj_Member->Report_SalesPerson_Secondary($_Dataset_Transactions, date('F Y',time()).' Summary Report', 'HTML');
   		break;
			// =============================================================




			// =============================================================
    	case "salesman_quota_dashboard.chart":

				//echo $obj_Member->Report_SalesPerson_OverUnder($_Dataset_Transactions, date('F Y',time()).' Over/Under Report', 'XML2');
				
				echo $obj_Member->CHART_DASHBOARD_SalesPerson_QUOTA($_SESSION['ActiveUser']['userid']);
   		break;
			// =============================================================


			// =============================================================
    	case "salesman_medium_dashboard.chart":
				echo $obj_Member->CHART_DASHBOARD_SalesPerson_MEDIUM($_SESSION['ActiveUser']['userid']);
   		break;
			// =============================================================






			// =============================================================
    	case "pdf.report":

				require_once("/var/www/vhosts/sm0005.com/httpdocs/dompdf/dompdf_config.inc.php");
						

				$_Dataset_MemberSessionActions = $obj_Member->GetMemberSessionActions('all', $_GET['_filter'], $_GET['_range']);

				$_HTML	= $obj_Member->Report_UserSessionActions($_Dataset_MemberSessionActions, 'User Action Report', 'PDF');

	
			
			  $dompdf = new DOMPDF();
			  $dompdf->load_html($_HTML);
			  //$dompdf->set_paper($_POST["paper"], $_POST["orientation"]);
			  //$dompdf->image('var/www/vhosts/egenhq.com/httpdocs/common/img/logo/freefig-com.jpg', 'jpg', 10, 20, 200, 300);
			  $dompdf->render();
				header("Content-type:application/pdf");
			  $dompdf->stream(date('m-d-Y',time())."-report-crm.pdf");

   		break;
			// =============================================================




// END SALES REPORTS =========================================================================================












// MANAGER REPORTS =========================================================================================





// MANAGER USER -----------------------

			// =============================================================
    	case "manager_current_month_all_records.report":
				$_Dataset_Transactions = $obj_Member->Get_MANAGER_Transactions_Month_FULLDETAIL($_SESSION['ActiveUser']['userid'], $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_MANAGER_Primary($_Dataset_Transactions, date('F Y',time()).' Booking Report (Team)', 'HTML', null, 'manager_current_month_all_records.report');
   		break;
			// =============================================================

			// =============================================================
    	case "manager_current_month_all_records.chart":
				$obj_Member->CHART_REPORTS_Transactions($_SESSION['ActiveUser']['userid'], 'Team Sales Charts', $_POST['_range'], $_POST['_series'], $_POST['_filter']);
   		break;
			// =============================================================

			// =============================================================
    	case "manager_current_month_all_records.pdf":

				$_Dataset_Transactions = $obj_Member->Get_MANAGER_Transactions_Month_FULLDETAIL($_SESSION['ActiveUser']['userid'], $_GET['_filter'], $_GET['_range']);

				$_HTML	= $obj_Member->Report_MANAGER_Primary($_Dataset_Transactions, 'Transaction Report', 'PDF');

			  $dompdf = new DOMPDF();
			  $dompdf->load_html($_HTML);
			  $dompdf->render();
				header("Content-type:application/pdf");
			  $dompdf->stream(date('m-d-Y',time())."-report-crm.pdf");
   		break;
			// =============================================================



			// =============================================================
    	case "manager_quota_dashboard.chart":
				echo $obj_Member->CHART_DASHBOARD_Manager_QUOTA($_SESSION['ActiveUser']['userid']);
   		break;
			// =============================================================


			// =============================================================
    	case "manager_medium_dashboard.chart":
				echo $obj_Member->CHART_DASHBOARD_Manager_MEDIUM($_SESSION['ActiveUser']['userid']);
   		break;
			// =============================================================



			// =============================================================
    	case "manager_current_month.dynadash.print":
				$_Dataset_Transactions = $obj_Member->Get_MANAGER_Dashboard_Month_MEDIUM($_SESSION['ActiveUser']['userid'], 1, $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_Manager_Primary_DYNDASHCOMPOSITE($_Dataset_Transactions, date('F Y',time()).' Booking Report (PRINT)', 'HTML', null, 'manager_current_month.dynadash.print');
   		break;
			// =============================================================


			// =============================================================
    	case "manager_current_month.dynadash.outdoor":
				$_Dataset_Transactions = $obj_Member->Get_MANAGER_Dashboard_Month_MEDIUM($_SESSION['ActiveUser']['userid'], 2, $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_Manager_Primary_DYNDASHCOMPOSITE($_Dataset_Transactions, date('F Y',time()).' Booking Report (OUTDOOR)', 'HTML', null, 'manager_current_month.dynadash.outdoor');
   		break;
			// =============================================================

			// =============================================================
    	case "manager_current_month.dynadash.tv":
				$_Dataset_Transactions = $obj_Member->Get_MANAGER_Dashboard_Month_MEDIUM($_SESSION['ActiveUser']['userid'], 3, $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_Manager_Primary_DYNDASHCOMPOSITE($_Dataset_Transactions, date('F Y',time()).' Booking Report (TV)', 'HTML', null, 'manager_current_month.dynadash.tv');
   		break;
			// =============================================================

			// =============================================================
    	case "manager_current_month.dynadash.radio":
				$_Dataset_Transactions = $obj_Member->Get_MANAGER_Dashboard_Month_MEDIUM($_SESSION['ActiveUser']['userid'], 4, $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_Manager_Primary_DYNDASHCOMPOSITE($_Dataset_Transactions, date('F Y',time()).' Booking Report (RADIO)', 'HTML', null, 'manager_current_month.dynadash.radio');
   		break;
			// =============================================================

			// =============================================================
    	case "manager_current_month.dynadash.internet":
				$_Dataset_Transactions = $obj_Member->Get_MANAGER_Dashboard_Month_MEDIUM($_SESSION['ActiveUser']['userid'], 5, $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_Manager_Primary_DYNDASHCOMPOSITE($_Dataset_Transactions, date('F Y',time()).' Booking Report (INTERNET)', 'HTML', null, 'manager_current_month.dynadash.internet');
   		break;
			// =============================================================

			// =============================================================
    	case "manager_current_month.dynadash.mobile":
				$_Dataset_Transactions = $obj_Member->Get_MANAGER_Dashboard_Month_MEDIUM($_SESSION['ActiveUser']['userid'], 6, $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_Manager_Primary_DYNDASHCOMPOSITE($_Dataset_Transactions, date('F Y',time()).' Booking Report (MOBILE)', 'HTML', null, 'manager_current_month.dynadash.mobile');
   		break;
			// =============================================================



			// DASHBOARD AGGREGATE =========================================
    	case "manager_current_month.report":
				$_Dataset_Transactions = $obj_Member->Get_MANAGER_Dashboard_Month_COMPOSITE($_SESSION['ActiveUser']['userid'], $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_SalesPerson_Primary($_Dataset_Transactions, date('F Y',time()).' Booking Report (Aggregate)', 'HTML', null, 'manager_current_month.report');
   		break;
			// =============================================================

			// SUMMARY REPORT ==============================================
    	case "manager_totals.report":
				$_Dataset_Transactions = $obj_Member->GetTransactions('manager', $_SESSION['ActiveUser']['userid'], $_POST['_filter'], $_POST['_range'], 'manager_totals.report');
				//print_r($_POST['_filter']);
				
				$obj_Member->Report_SalesPerson_Secondary($_Dataset_Transactions, date('F Y',time()).' Summary Report', 'HTML');
   		break;
			// =============================================================







// END MANAGER REPORTS =========================================================================================











// FINANCE REPORTS ===========================================================================================





// FINANCE USER -----------------------

			// =============================================================
    	case "organization_current_month_all_records.report":
				$_Dataset_Transactions = $obj_Member->Get_MANAGER_Transactions_Month_FULLDETAIL($_SESSION['ActiveUser']['userid'], $_POST['_filter'], $_POST['_range']);
				$obj_Member->Report_MANAGER_Primary($_Dataset_Transactions, date('F Y',time()).' Booking Report (Team)', 'HTML', null, 'organization_current_month_all_records.report');
   		break;
			// =============================================================

			// =============================================================
    	case "organization_current_month_all_records.chart":
				$obj_Member->CHART_REPORTS_Transactions($_SESSION['ActiveUser']['userid'], 'Team Sales Charts', $_POST['_range'], $_POST['_series'], $_POST['_filter']);
   		break;
			// =============================================================

			// =============================================================
    	case "organization_current_month_all_records.pdf":

				$_Dataset_Transactions = $obj_Member->Get_MANAGER_Transactions_Month_FULLDETAIL($_SESSION['ActiveUser']['userid'], $_GET['_filter'], $_GET['_range']);

				$_HTML	= $obj_Member->Report_MANAGER_Primary($_Dataset_Transactions, 'Transaction Report', 'PDF');

			  $dompdf = new DOMPDF();
			  $dompdf->load_html($_HTML);
			  $dompdf->render();
				header("Content-type:application/pdf");
			  $dompdf->stream(date('m-d-Y',time())."-report-crm.pdf");
   		break;
			// =============================================================



// END MANAGER REPORTS =========================================================================================
























			// =============================================================
    	case "transaction_today.report":
				$_Dataset_Transactions = $obj_Member->GetTransactions('organization', null, $_POST['_filter'], $_POST['_range'], 'transaction_today.report');
				$obj_Member->Report_Transactions($_Dataset_Transactions, 'Transactions Today Report', 'HTML');
   		break;
			// =============================================================






			// =============================================================
    	case "human_resource.report":


				// get data ------------------------------
				//$_Dataset_MemberSessionActions = $obj_Member->GetMemberSessionActions('all', $_POST['_filter'], $_POST['_range']);
				
				// dashboard selection ---------------------------------
				switch($_SESSION['ActiveUser']['user_type']){

					case 'admin':
						$_Dataset_HumanCapital = $obj_Member->GetHumanCapital('organization', $_POST['_filter']);
					break;

					case 'god':
						$_Dataset_HumanCapital = $obj_Member->GetHumanCapital('system_all', $_POST['_filter']);
					break;

					default:
						//$_Dataset_HumanCapital = $obj_Member->GetHumanCapital('organization', $_POST['_filter']);
						$_Dataset_HumanCapital = 0;
					break;
				}


				// present data --------------------------
				//$obj_Member->Report_UserSessionActions($_Dataset_HumanCapital, 'Human Capital Report', 'HTML');
				$obj_Member->Report_HumanCapital($_Dataset_HumanCapital, 'Human Capital Report', 'HTML');


   		break;
			// =============================================================













			// =============================================================
    	case "user_session_activity.report":

				// user type selection -----------------------------
				switch($_SESSION['ActiveUser']['user_type']){

					case 'admin':
						$_Dataset_MemberSessionActions = $obj_Member->GetMemberSessionActions('organization', $_POST['_filter'], $_POST['_range']);
					break;

					case 'god':
						$_Dataset_MemberSessionActions = $obj_Member->GetMemberSessionActions('all', $_POST['_filter'], $_POST['_range']);
					break;

					default:
						//$_Dataset_HumanCapital = $obj_Member->GetHumanCapital('organization', $_POST['_filter']);
						$_Dataset_MemberSessionActions = 0;
					break;
				}

				
				// present data --------------------------
				$obj_Member->Report_UserSessionActions($_Dataset_MemberSessionActions, 'User Action Report', 'HTML');		


   		break;
			// =============================================================


			// =============================================================
    	case "user_session_activity.chart":

				// user type selection -----------------------------
				switch($_SESSION['ActiveUser']['user_type']){

					case 'admin':
						$_Dataset_MemberSessionActions = $obj_Member->GetMemberSessionActions('organization', $_POST['_filter'], $_POST['_range']);
					break;

					case 'god':
						$_Dataset_MemberSessionActions = $obj_Member->GetMemberSessionActions('all', $_POST['_filter'], $_POST['_range']);
					break;

					default:
						//$_Dataset_HumanCapital = $obj_Member->GetHumanCapital('organization', $_POST['_filter']);
						$_Dataset_MemberSessionActions = 0;
					break;
				}
				
				// present data --------------------------
				echo $obj_Member->Report_UserSessionActions($_Dataset_MemberSessionActions, 'User Action Report', 'XML', $_POST['_range']);


   		break;
			// =============================================================













			// =============================================================
    	case "client_campaign.chart":


				// get data ------------------------------
				$_Dataset_ClientBookings = $obj_Member->GetClientBookings('all',$_POST['_filter'],$_POST['_range']);
				
				// present data --------------------------
				echo $obj_Member->Report_ClientCampaigns($_Dataset_ClientBookings, 'Client Campaign', 'XML', $_POST['_range']);


   		break;
			// =============================================================













			// chart test ================================
    	case "chart.test":





				// version 1 ---------------------
				//require_once('/var/www/vhosts/sm0005.com/httpdocs/common/class/openflashchart/open-flash-chart.php');

        // version 2 ---------------------
        ini_set("include_path", "/var/www/vhosts/sm0005.com/httpdocs/common/class/");
        require_once('/var/www/vhosts/sm0005.com/httpdocs/common/class/OFC/OFC_Chart.php');
        

      	// get performance data ------------------------------------------
      	$PerformanceArray	=	$obj_Member->CreateAffiliatePromoPerformance($obj_Member->GetAffiliatePromos($_SESSION['ActiveUser']['userid']), 'chart_A');

 				$totalRecords = 31;
 				for($CurrentRecord = 1; $CurrentRecord <= $totalRecords; $CurrentRecord++){
 						
					$_Day = $CurrentRecord;

					// impressions ------------------------------- 							
					if(!$PerformanceArray[$CurrentRecord]['impressions']){
						$_Impressions = 0;
					}else{
						$_Impressions = $PerformanceArray[$CurrentRecord]['impressions'];
					}
					// -------------------------------------------

					// clicks ------------------------------------
					if(!$PerformanceArray[$CurrentRecord]['clicks']){
						$_Clicks = 0;
					}else{
						$_Clicks = $PerformanceArray[$CurrentRecord]['clicks'];
					}
					// -------------------------------------------

					// signups -----------------------------------
					if(!$PerformanceArray[$CurrentRecord]['signups']){
						$_Signups = 0;
					}else{
						$_Signups = $PerformanceArray[$CurrentRecord]['signups'];
					}
					// -------------------------------------------

					// upgrades ----------------------------------
					if(!$PerformanceArray[$CurrentRecord]['upgrades']){
						$_Upgrades = 0;
					}else{
						$_Upgrades = $PerformanceArray[$CurrentRecord]['upgrades'];
					}
					// -------------------------------------------

			
					$ChartArray_Clicks[] 				= $_Clicks;
					$ChartArray_Impressions[] 	= $_Impressions;
					$ChartArray_Signups[] 			= $_Signups;
					$ChartArray_Upgrades[] 			= $_Upgrades;
					$ChartArray_Day[] 					= $_Day;

					$ChartArray[$_Day] = array(
						'clicks' 				=> $_Clicks,
						'impressions' 	=> $_Impressions,
						'signups' 			=> $_Signups,
						'upgrades' 			=> $_Upgrades
					);
 				}

      
       // convert to string -------------------
       $counter = 1;
       foreach($ChartArray_Day as $key){
       	$ChartArray_DayLabel[] = (string)$counter;
       	$counter++;
       }
       // -------------------------------------



        //simple example
        $ResultArray=array(
        	$PerformanceArray['impressions_24hours'],
        	$PerformanceArray['clicks_24hours'],
        	$PerformanceArray['signups_24hours'],
        	$PerformanceArray['impressions_30days'],
        	$PerformanceArray['clicks_30days']
        );




        /*
        $title = new OFC_Elements_Title('Impression Performance');
        $bar = new OFC_Charts_Bar();
        $bar->set_values($ResultArray);				// input array
        $chart = new OFC_Chart();
        $chart->set_title($title);
        $chart->add_element($bar);
        echo $chart->toPrettyString();
        */

				/*
					3D Bar Chart
        srand((double)microtime()*1000000);
        $data = array();
        
        // add random height bars:
        for( $i=0; $i<5; $i++ ){
          $data[] = rand(2,9);
        }
        
        
        
        $title = new OFC_Elements_Title('Impression Performance');
        
        
        
        $bar = new OFC_Charts_Bar_3d();
        $bar->set_values($data);
        $bar->colour = '#900000';
        
        
        $x_axis = new OFC_Elements_Axis_X();
        $x_axis->set_3d(1);
        $x_axis->set_stroke(1);
        $x_axis->colour = '#909090';
        //$x_axis->set_labels( array(44,2,3,4,5,6,7,8,9,10) );
        $x_axis->set_grid_colour = '#ffffff';
        
        
        $chart = new OFC_Chart();
        $chart->set_title($title);
        $chart->add_element($bar);
        $chart->set_x_axis($x_axis);
        $chart->set_bg_colour('#6d6d6d');
        $chart->set_grid_colour = '#000000';
        $chart->add_y_axis( new OFC_Elements_Axis_Y() );
        
        $x = new OFC_Elements_Axis_X();
        $x->set_offset(false);
        $x->set_labels_from_array( $LabelsArray );
        $chart->set_x_axis($x);
        
        $y = new OFC_Elements_Axis_Y();
        $y->set_offset(false);
        $y->set_labels($data);
        $chart->add_y_axis( $y );
        
        
        echo $chart->toPrettyString();
        */






// EXAMPLE ---------------------------------------
/*
$title = new title( date("D M d Y") );

$bar = new bar_filled( '#E2D66A', '#577261' );
$bar->set_values( array(9,8,7,6,5,4,3,2,1) );

$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $bar );
$chart->set_bg_colour( '#FFFFFF' );

echo $chart->toPrettyString();
*/

// end EXAMPLE -----------------------------------
 
 
 
 
         

//CURRENT FUNCTIONAL GRAPH        
        $title = new OFC_Elements_Title(date('F',time()).' Performance Report');
        $title->set_style( "{font-size: 30px; font-family: arial; font-weight: bold; color: #ffbb50; text-align: center;}" );
        
        $line_1 = new OFC_Charts_Line_Dot();
        $line_1->set_values($ChartArray_Impressions);
        $line_1->set_halo_size(1);
        $line_1->set_width(1);
        $line_1->set_dot_size(2);
        $line_1->colour = '#f0f0f0';
        $line_1->set_key('Impressions', 14);

        
        
        $line_2 = new OFC_Charts_Line_Dot();
        $line_2->set_values($ChartArray_Clicks);
        $line_2->set_halo_size(1);
        $line_2->set_width(2);
        $line_2->set_dot_size(3);
        $line_2->colour = '#ffbb50';
        $line_2->set_key('Clicks', 14);

        $line_3 = new OFC_Charts_Line_Dot();
        $line_3->set_values($ChartArray_Signups);
        $line_3->set_halo_size( 1 );
        $line_3->set_width(3);
        $line_3->set_dot_size(4);
        $line_3->colour = '#ff0000';
        $line_3->set_key('Signups', 14);

        $line_4 = new OFC_Charts_Line_Dot();
        $line_4->set_values($ChartArray_Upgrades);
        $line_4->set_halo_size( 1 );
        $line_4->set_width(4);
        $line_4->set_dot_size(5);
        $line_4->colour = '#00ff00';
        $line_4->set_key('Upgrades', 14);

        
        $y = new OFC_Elements_Axis_Y();
        $y->colour = '#ff0000';																		//Y Axis Line
        $y->set_range(0, max($ChartArray_Impressions), 50);				//Y Axis Range

        
        $chart = new OFC_Chart();
        $chart->set_grid_colour = '#000000';
        $chart->set_bg_colour('#111111');
        //$chart->set_colour = '#000000';
        
        
        $chart->set_bg_colour('#6d6d6d');
        $chart->set_grid_colour = '#000000';
        
        
        $chart->set_title($title);
        $chart->add_element($line_1);
        $chart->add_element($line_2);
        $chart->add_element($line_3);
        $chart->add_element($line_4);
        $chart->set_y_axis($y);


        $chart->add_y_axis($y);
        
        $x = new OFC_Elements_Axis_X();
        $x->colour = '#b3b3b3';
        $x->set_grid_colour = '#000000';
        $x->set_line_colour = '#000000';
        $x->set_offset(false);
        $x->set_labels_from_array($ChartArray_DayLabel);
        $chart->set_x_axis($x);

        echo $chart->toPrettyString();





        /*
        $data = array();
        
        for( $i=0; $i<6.2; $i+=0.2 )
        {
          $tmp = sin($i) * 1.9;
          $data[] = $tmp;
        }
        
        
        $chart = new OFC_Chart();
        $chart->set_title( new OFC_Elements_Title( 'exe' ) );
        
        //
        // Make our area chart:
        //
        $area = new OFC_Charts_Area_Hollow();
        // set the circle line width:
        $area->set_width( 1 );
        $area->set_values( $data );
        // add the area object to the chart:
        $chart->add_element( $area );
        
        $y_axis = new OFC_Elements_Axis_Y();
        $y_axis->set_range( -2, 2, 2 );
        $y_axis->labels = null;
        $y_axis->set_offset( false );
        
        $x_axis = new OFC_Elements_Axis_X();
        $x_axis->labels = $data;
        $x_axis->set_steps( 2 );
        
        $x_labels = new OFC_Elements_Axis_X_Label_Set();
        $x_labels->set_steps( 4 );
        $x_labels->set_vertical();
        // Add the X Axis Labels to the X Axis
        $x_axis->set_labels( $x_labels );
        
        
        
        $chart->add_y_axis( $y_axis );
        $chart->x_axis = $x_axis;
        
        echo $chart->toPrettyString();
        */


   		break;
			// =============================================================












			// chart preview Yesterday =====================================
    	case "chart.previewYesterday":



        // version 2 ---------------------
        ini_set("include_path", "/var/www/vhosts/sm0005.com/httpdocs/common/class/");
        require_once('/var/www/vhosts/sm0005.com/httpdocs/common/class/OFC/OFC_Chart.php');
        

      	// get performance data ------------------------------------------
      	$PerformanceArray	=	$obj_Member->CreateAffiliatePromoPerformance($obj_Member->GetAffiliatePromos($_SESSION['ActiveUser']['userid']), 'chart_A');

 				$totalRecords = 31;
 				for($CurrentRecord = 1; $CurrentRecord <= $totalRecords; $CurrentRecord++){
 						
					$_Day = $CurrentRecord;

					// impressions ------------------------------- 							
					if(!$PerformanceArray[$CurrentRecord]['impressions_y']){
						$_Impressions = 0;
					}else{
						$_Impressions = $PerformanceArray[$CurrentRecord]['impressions_y'];
					}
					// -------------------------------------------

					// clicks ------------------------------------
					if(!$PerformanceArray[$CurrentRecord]['clicks_y']){
						$_Clicks = 0;
					}else{
						$_Clicks = $PerformanceArray[$CurrentRecord]['clicks_y'];
					}
					// -------------------------------------------

					// signups -----------------------------------
					if(!$PerformanceArray[$CurrentRecord]['signups_y']){
						$_Signups = 0;
					}else{
						$_Signups = $PerformanceArray[$CurrentRecord]['signups_y'];
					}
					// -------------------------------------------

					// upgrades ----------------------------------
					if(!$PerformanceArray[$CurrentRecord]['upgrades_y']){
						$_Upgrades = 0;
					}else{
						$_Upgrades = $PerformanceArray[$CurrentRecord]['upgrades_y'];
					}
					// -------------------------------------------

			
					$ChartArray_Clicks[] 				= $_Clicks;
					$ChartArray_Impressions[] 	= $_Impressions;
					$ChartArray_Signups[] 			= $_Signups;
					$ChartArray_Upgrades[] 			= $_Upgrades;
					$ChartArray_Day[] 					= $_Day;

					$ChartArray[$_Day] = array(
						'clicks' 				=> $_Clicks,
						'impressions' 	=> $_Impressions,
						'signups' 			=> $_Signups,
						'upgrades' 			=> $_Upgrades
					);
 				}


		$_compile[0]  = $ChartArray_Impressions[date('d',time()) - 1];
		$_compile[1]  = $ChartArray_Clicks[date('d',time()) - 1];
		$_compile[2]  = $ChartArray_Signups[date('d',time()) - 1];
		$_compile[3]  = $ChartArray_Upgrades[date('d',time()) - 1];
		


      
       // convert to string -------------------
       $counter = 1;
       foreach($ChartArray_Day as $key){
       	$ChartArray_DayLabel[] = (string)$counter;
       	$counter++;
       }
       // -------------------------------------



        //simple example
        $ResultArray=array(
        	$PerformanceArray['impressions_24hours'],
        	$PerformanceArray['clicks_24hours'],
        	$PerformanceArray['signups_24hours'],
        	$PerformanceArray['impressions_30days'],
        	$PerformanceArray['clicks_30days']
        );

    
        
        $title = new OFC_Elements_Title('Yesterday\'s Performance');
        $title->set_style( "{font-size: 20px; font-family: arial; font-weight: bold; color: #ffbb50; text-align: center;}" );        
        
        
        $bar = new OFC_Charts_Bar_3d();
        $bar->set_values($_compile);
        $bar->colour = '#900000';
        
        
        $x_axis = new OFC_Elements_Axis_X();
        $x_axis->set_3d(1);
        $x_axis->set_stroke(1);
        $x_axis->colour = '#909090';
        //$x_axis->set_labels( array(29,23,24,25) );
        $x_axis->set_grid_colour = '#ffffff';
        
        
        $chart = new OFC_Chart();
        $chart->set_title($title);
        $chart->add_element($bar);
        $chart->set_x_axis($x_axis);
        $chart->set_bg_colour('#6d6d6d');
        $chart->set_grid_colour = '#000000';
        $chart->add_y_axis( new OFC_Elements_Axis_Y() );
        
        $x = new OFC_Elements_Axis_X();
        $x->set_offset(true);
        $x->set_labels_from_array(array('Impressions','Clicks','Sign-Ups','Upgrades'));
        $chart->set_x_axis($x);
        
        $y = new OFC_Elements_Axis_Y();
        $y->set_range(0, max($_compile), 20);
        $y->set_offset(true);
        //$y->set_labels(0);
        $chart->add_y_axis( $y );
        
        
        echo $chart->toPrettyString();




   		break;
			// =============================================================
























			// chart test ================================
    	case "chart.test2":





				// version 1 ---------------------
				//require_once('/var/www/vhosts/sm0005.com/httpdocs/common/class/openflashchart/open-flash-chart.php');

        // version 2 ---------------------
        ini_set("include_path", "/var/www/vhosts/sm0005.com/httpdocs/common/class/");
        require_once('/var/www/vhosts/sm0005.com/httpdocs/common/class/OFC/OFC_Chart.php');
        
/*
      	// get performance data ------------------------------------------
      	$PerformanceArray	=	$obj_Member->CreateAffiliatePromoPerformance($obj_Member->GetAffiliatePromos($_SESSION['ActiveUser']['userid']), 'chart_A');

 				$totalRecords = 31;
 				for($CurrentRecord = 1; $CurrentRecord <= $totalRecords; $CurrentRecord++){
 						
					$_Day = $CurrentRecord;

					// impressions ------------------------------- 							
					if(!$PerformanceArray[$CurrentRecord]['impressions']){
						$_Impressions = 0;
					}else{
						$_Impressions = $PerformanceArray[$CurrentRecord]['impressions'];
					}
					// -------------------------------------------

					// clicks ------------------------------------
					if(!$PerformanceArray[$CurrentRecord]['clicks']){
						$_Clicks = 0;
					}else{
						$_Clicks = $PerformanceArray[$CurrentRecord]['clicks'];
					}
					// -------------------------------------------

					// signups -----------------------------------
					if(!$PerformanceArray[$CurrentRecord]['signups']){
						$_Signups = 0;
					}else{
						$_Signups = $PerformanceArray[$CurrentRecord]['signups'];
					}
					// -------------------------------------------

					// upgrades ----------------------------------
					if(!$PerformanceArray[$CurrentRecord]['upgrades']){
						$_Upgrades = 0;
					}else{
						$_Upgrades = $PerformanceArray[$CurrentRecord]['upgrades'];
					}
					// -------------------------------------------

			
					$ChartArray_Clicks[] 				= $_Clicks;
					$ChartArray_Impressions[] 	= $_Impressions;
					$ChartArray_Signups[] 			= $_Signups;
					$ChartArray_Upgrades[] 			= $_Upgrades;
					$ChartArray_Day[] 					= $_Day;

					$ChartArray[$_Day] = array(
						'clicks' 				=> $_Clicks,
						'impressions' 	=> $_Impressions,
						'signups' 			=> $_Signups,
						'upgrades' 			=> $_Upgrades
					);
 				}


*/


		//$_compile[0]  = $ChartArray_Impressions[date('d',time()) - 1];
		$_compile[0]  = 10;
		$_compile[1]  = 23;
		$_compile[2]  = 343;
		$_compile[3]  = 323;
		


  /*    
       // convert to string -------------------
       $counter = 1;
       foreach($ChartArray_Day as $key){
       	$ChartArray_DayLabel[] = (string)$counter;
       	$counter++;
       }
       // -------------------------------------
*/


        //simple example
        $ResultArray=array(
        	$PerformanceArray['impressions_24hours'],
        	$PerformanceArray['clicks_24hours'],
        	$PerformanceArray['signups_24hours'],
        	$PerformanceArray['impressions_30days'],
        	$PerformanceArray['clicks_30days']
        );




        
        $title = new OFC_Elements_Title('sdfs');
        $bar = new OFC_Charts_Bar();
        $bar->set_values($ResultArray);				// input array
        $chart = new OFC_Chart();
        $chart->set_title($title);
        $chart->add_element($bar);
        echo $chart->toPrettyString();
        

				/*        */
					//3D Bar Chart
        die();
        
        
        $title = new OFC_Elements_Title('test chart');
        $title->set_style( "{font-size: 20px; font-family: arial; font-weight: bold; color: #ffbb50; text-align: center;}" );        
        
        
        $bar = new OFC_Charts_Bar_3d();
        $bar->set_values('12,34,564,343,34');
        $bar->colour = '#900000';
        
        
        $x_axis = new OFC_Elements_Axis_X();
        $x_axis->set_3d(1);
        $x_axis->set_stroke(1);
        $x_axis->colour = '#909090';
        //$x_axis->set_labels( array(29,23,24,25) );
        $x_axis->set_grid_colour = '#ffffff';
        
        
        $chart = new OFC_Chart();
        $chart->set_title('test');
        $chart->add_element('testeee');
        $chart->set_x_axis('100');
        $chart->set_bg_colour('#6d6d6d');
        $chart->set_grid_colour = '#000000';
        $chart->add_y_axis( new OFC_Elements_Axis_Y() );
        
        $x = new OFC_Elements_Axis_X();
        $x->set_offset(true);
        $x->set_labels_from_array(array('Impressions','Clicks','Sign-Ups','Upgrades'));
        $chart->set_x_axis($x);
        
        $y = new OFC_Elements_Axis_Y();
        $y->set_range(0, max('12'), 20);
        $y->set_offset(true);
        //$y->set_labels(0);
        $chart->add_y_axis( $y );
        
        
        echo $chart->toPrettyString();







// EXAMPLE ---------------------------------------
/*
$title = new title( date("D M d Y") );

$bar = new bar_filled( '#E2D66A', '#577261' );
$bar->set_values( array(9,8,7,6,5,4,3,2,1) );

$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $bar );
$chart->set_bg_colour( '#FFFFFF' );

echo $chart->toPrettyString();
*/

// end EXAMPLE -----------------------------------
 
 
 
 
         
/*
//CURRENT FUNCTIONAL GRAPH        
        $title = new OFC_Elements_Title(date('F',time()).' Performance Report');
        $title->set_style( "{font-size: 30px; font-family: arial; font-weight: bold; color: #ffbb50; text-align: center;}" );
        
        $line_1 = new OFC_Charts_Line_Dot();
        $line_1->set_values($ChartArray_Impressions);
        $line_1->set_halo_size(1);
        $line_1->set_width(1);
        $line_1->set_dot_size(2);
        $line_1->colour = '#f0f0f0';
        $line_1->set_key('Impressions', 14);

        
        
        $line_2 = new OFC_Charts_Line_Dot();
        $line_2->set_values($ChartArray_Clicks);
        $line_2->set_halo_size(1);
        $line_2->set_width(2);
        $line_2->set_dot_size(3);
        $line_2->colour = '#ffbb50';
        $line_2->set_key('Clicks', 14);

        $line_3 = new OFC_Charts_Line_Dot();
        $line_3->set_values($ChartArray_Signups);
        $line_3->set_halo_size( 1 );
        $line_3->set_width(3);
        $line_3->set_dot_size(4);
        $line_3->colour = '#ff0000';
        $line_3->set_key('Signups', 14);

        $line_4 = new OFC_Charts_Line_Dot();
        $line_4->set_values($ChartArray_Upgrades);
        $line_4->set_halo_size( 1 );
        $line_4->set_width(4);
        $line_4->set_dot_size(5);
        $line_4->colour = '#00ff00';
        $line_4->set_key('Upgrades', 14);

        
        $y = new OFC_Elements_Axis_Y();
        $y->colour = '#ff0000';																		//Y Axis Line
        $y->set_range(0, max($ChartArray_Impressions), 50);				//Y Axis Range

        
        $chart = new OFC_Chart();
        $chart->set_grid_colour = '#000000';
        $chart->set_bg_colour('#111111');
        //$chart->set_colour = '#000000';
        
        
        $chart->set_bg_colour('#6d6d6d');
        $chart->set_grid_colour = '#000000';
        
        
        $chart->set_title($title);
        $chart->add_element($line_1);
        $chart->add_element($line_2);
        $chart->add_element($line_3);
        $chart->add_element($line_4);
        $chart->set_y_axis($y);


        $chart->add_y_axis($y);
        
        $x = new OFC_Elements_Axis_X();
        $x->colour = '#b3b3b3';
        $x->set_grid_colour = '#000000';
        $x->set_line_colour = '#000000';
        $x->set_offset(false);
        $x->set_labels_from_array($ChartArray_DayLabel);
        $chart->set_x_axis($x);

        echo $chart->toPrettyString();

*/



        /*
        $data = array();
        
        for( $i=0; $i<6.2; $i+=0.2 )
        {
          $tmp = sin($i) * 1.9;
          $data[] = $tmp;
        }
        
        
        $chart = new OFC_Chart();
        $chart->set_title( new OFC_Elements_Title( 'exe' ) );
        
        //
        // Make our area chart:
        //
        $area = new OFC_Charts_Area_Hollow();
        // set the circle line width:
        $area->set_width( 1 );
        $area->set_values( $data );
        // add the area object to the chart:
        $chart->add_element( $area );
        
        $y_axis = new OFC_Elements_Axis_Y();
        $y_axis->set_range( -2, 2, 2 );
        $y_axis->labels = null;
        $y_axis->set_offset( false );
        
        $x_axis = new OFC_Elements_Axis_X();
        $x_axis->labels = $data;
        $x_axis->set_steps( 2 );
        
        $x_labels = new OFC_Elements_Axis_X_Label_Set();
        $x_labels->set_steps( 4 );
        $x_labels->set_vertical();
        // Add the X Axis Labels to the X Axis
        $x_axis->set_labels( $x_labels );
        
        
        
        $chart->add_y_axis( $y_axis );
        $chart->x_axis = $x_axis;
        
        echo $chart->toPrettyString();
        */


   		break;
			// =============================================================


















			// ajax - promoCreator ================================
    	case "ajax.promo.edit":


      	if(!$_POST['_PromoID'] || !$_POST['_Command'] || !$_POST['_Parameter'] || $obj_Member->VerifyAffiliatePromoOwnership($_SESSION['ActiveUser']['userid'], $obj_Member->Decrypt($_POST['_PromoID'], 'private', 'sm0005.com')) != true){
      		echo 'Communication Failure >> Try Refreshing Screen Please';
      	}else{

      		//echo $_SERVER['HTTP_REFERER'];																												//debug
      		//echo unserialize($obj_Member->Decrypt($_POST['_UserSession'], 'private', 'sm0005.com'));
      

      		// -------------------------------------------------------
      		$UserSession_ENCRYPTED_PRIVATE	= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_UserSession']));
      		$Command												= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_Command']));
      		$PromoID												= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_PromoID']));
      		$Parameter											= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_Parameter']));
      		// -------------------------------------------------------


					

       		switch($Command){

    				// edit promo thumbs
      			case 'edit.promo.thumbs':
							$obj_Member->PromoEditor($PromoID, $Command, $Parameter);
      			//$obj_Member->Report($UserSession_ENCRYPTED_PRIVATE, 'prereg_preview', $Option[0], $Option[1]);
      			//$obj_Member->Report(999999, 'prereg_preview', 1111, $IP2Location_ResultArray['zipcode']);
      			break;

    				// add row to promo
      			case 'edit.promo.addrow':
							$obj_Member->PromoEditor($PromoID, $Command, null);
      			break;

    				// subtract row to promo
      			case 'edit.promo.subtractrow':
							$obj_Member->PromoEditor($PromoID, $Command, null);
      			break;

    				// edit color promo
      			case 'edit.promo.color':
							$obj_Member->PromoEditor($PromoID, $Command, $Parameter);
      			break;

    				// edit promo status (disable / enable / delete)
      			case 'edit.promo.status':
							$obj_Member->PromoEditor($PromoID, $Command, $Parameter);
      			break;


    				// edit promo filter
      			case 'edit.promo.filter':
							$obj_Member->PromoEditor($PromoID, $Command, $Parameter);
      			break;

    				// edit promo name
      			case 'edit.promo.name':
							$obj_Member->PromoEditor($PromoID, $Command, $Parameter);
      			break;

    				// set promo title image
      			case 'edit.promo.titleimage':
							$obj_Member->PromoEditor($PromoID, $Command, $Parameter);
      			break;

    				// set promo lander
      			case 'edit.promo.updateLander':
							$obj_Member->PromoEditor($PromoID, $Command, $Parameter);
      			break;

    				// set promo smartPromo
      			case 'edit.promo.updatesmartPromo':
							$obj_Member->PromoEditor($PromoID, $Command, $Parameter);
      			break;

    				default:
    				break;
        	}

      	}


   		break;
			// =============================================================












			// ajax email update ===========================================
    	case "ajax.email.update":


        $__EAddr	=	$obj_Member->FilterRawInput($_POST['UpdateEM_eaddr']);
	      $__Token	=	$obj_Member->FilterRawInput($_POST['UpdateEM_Token']);
				$__UserID	=	$obj_Member->Decrypt($obj_Member->FilterRawInput($_POST['UpdateEM_UIDP']), 'private');

	
				if( ($_POST['UpdateEM_Token'] == $_SESSION['ActiveUser']['emailUpdateToken']) && ($__UserID == $_SESSION['ActiveUser']['userid']) ){

        	// create database connection ------------------
       		$obj_db					= new db;
       		$obj_db->Connect(0); //write operation
        	// ---------------------------------------------

					$sql_num_rows		= null;
				  $sql_select 		= mysql_query("SELECT userid FROM user WHERE email_addr = '$__EAddr'");
        	$sql_num_rows		=	mysql_num_rows($sql_select);
        	
        	if($sql_num_rows == null){
        		
  					if( mysql_query("UPDATE user SET email_addr = '$__EAddr', activated = '0'  WHERE userid = '$__UserID'") ){
  						$_SESSION['ActiveUser']['email_addr'] = $__EAddr;
  						$obj_Member->SendActivationEmail($__UserID, $__EAddr, $_SESSION['ActiveUser']['password']);
  						
  						echo 111;  //success
  					}else{
  						echo 666;  //error
  					}

        	}else{
        		echo 664;	// dupe
        	}

					
					

        	// destroy database connection object ----------
	       	$obj_db->Close();
        	// ---------------------------------------------
				}else{
					echo 665;   //spoof/hack attempt
				}
   		break;
			// =============================================================







			// ajax profile basics update ==================================
    	case "ajax.ProfileBasics.Update":


        //$__TAXID	=	$obj_Member->Encrypt($obj_Member->FilterRawInput($_POST['ProfileBasics_tax_id_ssn']), 'private');
        $__TAXID	=	$obj_Member->Encrypt($obj_Member->FilterRawInput($_POST['ProfileBasics_tax_id_ssn']), 'private');
        $__Payee	=	$obj_Member->FilterRawInput(strtolower($_POST['ProfileBasics_tax_payee']));
        $__FName	=	$obj_Member->FilterRawInput(strtolower($_POST['ProfileBasics_firstname']));
        $__LName	=	$obj_Member->FilterRawInput(strtolower($_POST['ProfileBasics_lastname']));
        $__Addr1	=	$obj_Member->FilterRawInput(strtolower($_POST['ProfileBasics_address1']));
        $__Addr2	=	$obj_Member->FilterRawInput(strtolower($_POST['ProfileBasics_address2']));
        $__City		=	$obj_Member->FilterRawInput(strtolower($_POST['ProfileBasics_city']));
        $__State	=	$obj_Member->FilterRawInput(strtolower($_POST['ProfileBasics_state']));
        $__Phone	=	$obj_Member->FilterRawInput(strtolower($_POST['ProfileBasics_phone']));
        $__ZIPC		=	$obj_Member->FilterRawInput($_POST['ProfileBasics_zipcode']);
        $__Token	=	$obj_Member->FilterRawInput($_POST['ProfileBasics_Token']);
				$__UserID	=	$obj_Member->Decrypt($obj_Member->FilterRawInput($_POST['ProfileBasics_UIDP']), 'private');

				$VerificationStatus = $obj_Member->GetStatus_R2($__UserID);

				if( ($_POST['ProfileBasics_Token'] == $_SESSION['ActiveUser']['ProfileBasicsUpdateSaveToken']) && ($__UserID == $_SESSION['ActiveUser']['userid']) ){

        	// create database connection ------------------
       		$obj_db					= new db;
       		$obj_db->Connect(0); //write operation
        	// ---------------------------------------------

					if( mysql_query("UPDATE user SET phone = '$__Phone', tax_id_ssn = '$__TAXID', tax_payee = '$__Payee', first_name = '$__FName', last_name = '$__LName', address_1 = '$__Addr1', address_2 = '$__Addr2', city = '$__City', state = '$__State', zipcode = '$__ZIPC' WHERE userid = '$__UserID'") ){
						echo 111;
					}else{
						echo 666;
					}

        	// destroy database connection object ----------
	       	$obj_db->Close();
        	// ---------------------------------------------
				}else{
					echo 665;
				}
   		break;
			// =============================================================













			// ajax profile editor =========================================
    	case "ajax.profile.editor":



         // create database connection ------------------
       	$obj_db					= new db;
       	$obj_db->Connect(0); //write operation
        // ---------------------------------------------




        $__userid	=	$obj_Member->FilterRawInput($_POST['userID']);
        $__key		=	$obj_Member->FilterRawInput($_POST['key']);
        $__value	=	$obj_Member->FilterRawInput($_POST['value']);


				if($_POST['ProfileEditToken'] == $_SESSION['ActiveUser']['ProfileEditToken']){


        	// PRIVATE ENCRYPTION ================================================================================================
        		$UserIDDecrypted														=	$obj_Member->Decrypt($__userid, 'private');
        	// END PRIVATE ENCRYPTION ============================================================================================
  
  
        	$timestamp	=	time();
        	$sql_update = null;
  
  
        	if($__key == 'birthmonth' || $__key == 'birthyear' || $__key == 'birthday'){
        		//mktime(0,0,0,12,36,2001);
        		$__key = 'tsdob';
        	}
  
  
        	// essay ---------------------------------------
        	if($__key == 'aboutyou' || $__key == 'aboutme'){
        		
        		$__value				=	$obj_Member->FilterRawInput($__value);
        
        		if($__key == 'aboutme'){
        			$__approved = 'approved1';	
        		}elseif($__key == 'aboutyou'){
        			$__approved = 'approved2';	
        		}
        		
        		$sql_update 		= mysql_query("UPDATE user_profile_essay SET $__key = '$__value', $__approved = '0' ,tscreated = '$timestamp' WHERE userid = '$UserIDDecrypted'");
        
        
        	// checkbox bit flip ---------------------------
        	}elseif($__key == 'nice_good8' || $__key == 'nice_good7' || $__key == 'nice_good6' || $__key == 'nice_good5' || $__key == 'nice_good4' || $__key == 'nice_good3' || $__key == 'nice_good2' || $__key == 'nice_good1' || $__key == 'nice_dom8' || $__key == 'nice_dom7' || $__key == 'nice_dom6' || $__key == 'nice_dom5' || $__key == 'nice_dom4' || $__key == 'nice_dom3' || $__key == 'nice_dom2' || $__key == 'nice_dom1' || $__key == 'nice_act8' || $__key == 'nice_act7' || $__key == 'nice_act6' || $__key == 'nice_act5' || $__key == 'nice_act4' || $__key == 'nice_act3' || $__key == 'nice_act2' || $__key == 'nice_act1' || $__key == 'nice_lang8' || $__key == 'nice_lang7' || $__key == 'nice_lang6' || $__key == 'nice_lang5' || $__key == 'nice_lang4' || $__key == 'nice_lang3' || $__key == 'nice_lang2' || $__key == 'nice_lang1' || $__key == 'naughty_n10' || $__key == 'naughty_n9' || $__key == 'naughty_n8' || $__key == 'naughty_n7' || $__key == 'naughty_n6' || $__key == 'naughty_n5' || $__key == 'naughty_n4' || $__key == 'naughty_n3' || $__key == 'naughty_n2' || $__key == 'naughty_n1' || $__key == 'naughty_b5' || $__key == 'naughty_b4' || $__key == 'naughty_b3' || $__key == 'naughty_b2' || $__key == 'naughty_b1' || $__key == 'naughty_h5' || $__key == 'naughty_h4' || $__key == 'naughty_h3' || $__key == 'naughty_h2' || $__key == 'naughty_h1' || $__key == 'naughty_t4' || $__key == 'naughty_t3' || $__key == 'naughty_t2' || $__key == 'naughty_t1' || $__key == 'naughty_m5' || $__key == 'naughty_m4' || $__key == 'naughty_m3' || $__key == 'naughty_m2' || $__key == 'naughty_m1' || $__key == 'smoke_dislike' || $__key == 'drink_dislike' || $__key == 'tattoo_dislike' || $__key == 'piercings_dislike' || $__key == 'seek_m' || $__key == 'seek_w' || $__key == 'seek_t' || $__key == 'seek_c' || $__key == 'seek_g' || $__key == 'into_friends' || $__key == 'into_relationship' || $__key == 'into_networking' || $__key == 'into_flirting' || $__key == 'fav_asian' || $__key == 'fav_white' || $__key == 'fav_black' || $__key == 'fav_eindian' || $__key == 'fav_islander' || $__key == 'fav_hispanic' || $__key == 'fav_meastern' || $__key == 'fav_namericanindian' || $__key == 'fav_latino' || $__key == 'fav_animals' || $__key == 'fantasy_twogirls' || $__key == 'fantasy_twoguys' || $__key == 'fantasy_public' || $__key == 'fantasy_boat' || $__key == 'fantasy_dominatrix' || $__key == 'fantasy_beach' || $__key == 'fantasy_outdoors' || $__key == 'fantasy_askme' || $__key == 'fantasy_toys' || $__key == 'fantasy_illegal' || $__key == 'turnon_butt' || $__key == 'turnon_legs' || $__key == 'turnon_chest' || $__key == 'turnon_hands' || $__key == 'turnon_tan' || $__key == 'turnon_mind' || $__key == 'turnon_feet' || $__key == 'turnon_askme' || $__key == 'turnon_hair' || $__key == 'turnon_piercings' || $__key == 'turnon_money' || $__key == 'turnon_power' || $__key == 'turnon_size' || $__key == 'turnon_hardbody' || $__key == 'turnon_mysecret'){
        		$sql_select 		= mysql_query("SELECT $__key FROM user_profile_specs WHERE $__key = '1' AND userid = '$UserIDDecrypted'");
        		$sql_num_rows		=	mysql_num_rows($sql_select);
        		
        		if($sql_num_rows){
        			$sql_update 		= mysql_query("UPDATE user_profile_specs SET $__key = '0', tsmodified = '$timestamp' WHERE userid = '$UserIDDecrypted'");	
        		}else{
        			$sql_update 		= mysql_query("UPDATE user_profile_specs SET $__key = '1', tsmodified = '$timestamp' WHERE userid = '$UserIDDecrypted'");
        		}
        
        	// standard ------------------------------------
        	}else{
        		$sql_update 		= mysql_query("UPDATE user_profile_specs SET $__key = '$__value', tsmodified = '$timestamp' WHERE userid = '$UserIDDecrypted'");
        		
        		// sync ZIPCODE user & user_profile_specs --------------
        		if($__key == 'zipcode'){
        			mysql_query("UPDATE user SET zipcode = '$__value' WHERE userid = '$UserIDDecrypted'");
        		}
        
        		// sync DOB user & user_profile_specs ------------------
        		if($__key == 'tsdob'){
        			mysql_query("UPDATE user SET dob = '$__value' WHERE userid = '$UserIDDecrypted'");
        		}
        	}
  
  
        	if($sql_update){
        		
        		if($__key == 'eyecolor'){$__key = 'Eye Color';}
        		if($__key == 'bodytype'){$__key = 'Body Type';}
        		if($__key == 'haircolor'){$__key = 'Hair Color';}
        		if($__key == 'height_feet'){$__key = 'Height';}
        		if($__key == 'height_inches'){$__key = 'Height';}
        		if($__key == 'dob'){$__key = 'Date of Birth';}
        		if($__key == 'tsdob'){$__key = 'Date of Birth';}
        		if($__key == 'zipcode'){$__key = 'ZIP Code';}
        		if($__key == 'aboutme'){$__key = 'About Me';}
        		if($__key == 'aboutyou'){$__key = 'About You';}
        		if($__key == 'smoke_do'){$__key = 'Smoking';}
        		if($__key == 'drink_do'){$__key = 'Drinking';}
        		if($__key == 'tattoo_have'){$__key = 'Tattoo';}
        		if($__key == 'piercings_have'){$__key = 'Piercing';}
        		if($__key == 'smoke_dislike'){$__key = 'Smoking Dislike';}
        		if($__key == 'drink_dislike'){$__key = 'Drinking Dislike';}
        		if($__key == 'tattoo_dislike'){$__key = 'Tattoos Dislike';}
        		if($__key == 'piercings_dislike'){$__key = 'Piercings Dislike';}
        		if($__key == 'worsttrait'){$__key = 'Worst Trait';}
        		if($__key == 'besttrait'){$__key = 'Best Trait';}
        		if($__key == 'seek_m' || $__key == 'seek_w' || $__key == 'seek_t' || $__key == 'seek_c' || $__key == 'seek_g'){$__key = 'Seeking';}
        		if($__key == 'into_friends' || $__key == 'into_flirting' || $__key == 'into_relationship' || $__key == 'into_networking'){$__key = 'Interests';}
        		if($__key == 'fav_asian' || $__key == 'fav_white' || $__key == 'fav_black' || $__key == 'fav_eindian' || $__key == 'fav_islander' || $__key == 'fav_hispanic' || $__key == 'fav_meastern' || $__key == 'fav_namericanindian' || $__key == 'fav_latino' || $__key == 'fav_animals'){$__key = 'Favorite Flavs';}
        		if($__key == 'fantasy_twogirls' || $__key == 'fantasy_twoguys' || $__key == 'fantasy_public' || $__key == 'fantasy_boat' || $__key == 'fantasy_dominatrix' || $__key == 'fantasy_beach' || $__key == 'fantasy_outdoors' || $__key == 'fantasy_askme' || $__key == 'fantasy_toys' || $__key == 'fantasy_illegal'){$__key = 'Fantasy';}
        		if($__key == 'turnon_butt' || $__key == 'turnon_legs' || $__key == 'turnon_chest' || $__key == 'turnon_hands' || $__key == 'turnon_tan' || $__key == 'turnon_mind' || $__key == 'turnon_feet' || $__key == 'turnon_askme' || $__key == 'turnon_hair' || $__key == 'turnon_piercings' || $__key == 'turnon_money' || $__key == 'turnon_power' || $__key == 'turnon_size' || $__key == 'turnon_hardbody' || $__key == 'turnon_mysecret'){$__key = 'Turn-Ons';}
        		if($__key == 'naughty_n10' || $__key == 'naughty_n9' || $__key == 'naughty_n8' || $__key == 'naughty_n7' || $__key == 'naughty_n6' || $__key == 'naughty_n5' || $__key == 'naughty_n4' || $__key == 'naughty_n3' || $__key == 'naughty_n2' || $__key == 'naughty_n1' || $__key == 'naughty_b5' || $__key == 'naughty_b4' || $__key == 'naughty_b3' || $__key == 'naughty_b2' || $__key == 'naughty_b1' || $__key == 'naughty_h5' || $__key == 'naughty_h4' || $__key == 'naughty_h3' || $__key == 'naughty_h2' || $__key == 'naughty_h1' || $__key == 'naughty_t4' || $__key == 'naughty_t3' || $__key == 'naughty_t2' || $__key == 'naughty_t1' || $__key == 'naughty_m1' || $__key == 'naughty_m2' || $__key == 'naughty_m3' || $__key == 'naughty_m4' || $__key == 'naughty_m5'){$__key = 'Naughty Skill';}
        		if($__key == 'nice_good8' || $__key == 'nice_good7' || $__key == 'nice_good6' || $__key == 'nice_good5' || $__key == 'nice_good4' || $__key == 'nice_good3' || $__key == 'nice_good2' || $__key == 'nice_good1' || $__key == 'nice_dom8' || $__key == 'nice_dom7' || $__key == 'nice_dom6' || $__key == 'nice_dom5' || $__key == 'nice_dom4' || $__key == 'nice_dom3' || $__key == 'nice_dom2' || $__key == 'nice_dom1' || $__key == 'nice_act8' || $__key == 'nice_act7' || $__key == 'nice_act6' || $__key == 'nice_act5' || $__key == 'nice_act4' || $__key == 'nice_act3' || $__key == 'nice_act2' || $__key == 'nice_act1' || $__key == 'nice_lang8' || $__key == 'nice_lang7' || $__key == 'nice_lang6' || $__key == 'nice_lang5' || $__key == 'nice_lang4' || $__key == 'nice_lang3' || $__key == 'nice_lang2' || $__key == 'nice_lang1'){$__key = 'Nice Skill';}
        
        
        		echo '<font color="white" size="2">'.ucwords($__key).' Updated</font>';
        	}else{
        		echo ucwords($__key).' NOT Updated';
        	}
  
  
          // destroy database connection object ----------
          $obj_db->Close();
          // ---------------------------------------------      

				}





   		break;
			// =============================================================











			// ajax IM Session Open? =======================================
    	case "ajax.member.IM.request":
				$obj_Member->IMRequest_R2($obj_Member->FilterRawInput($_POST['RecipientUserID_ENCRYPTED_PUBLIC']), $_SESSION['ActiveUser']['userid']);
   		break;
			// =============================================================







			// ajax logout =================================================
    	case "ajax.member.logout":

        $obj_Member->Logout($_SESSION['ActiveUser']);
        $obj_Member->MemberAuthorized = false;
				echo 222;

   		break;
			// =============================================================











			// ajax search =================================================
    	case "ajax.search":

				require("/var/www/vhosts/sm0005.com/httpdocs/common/inc/inc.search.php");

   		break;
			// =============================================================











			// ajax account settings  ======================================
    	case "ajax.account.settings":


      	$_userID	=	filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_userID']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      
      	$_key			=	filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_key']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      
      	$_value		=	filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_value']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      	
      
      
      	// PRIVATE ENCRYPTION ================================================================================================
      		$_userID														=	$obj_Member->Decrypt($_userID, 'private');
      	// END PRIVATE ENCRYPTION ============================================================================================


      	switch($_key){
      
      		case('profile_setting_nudity'):
      			$_key	=	'setting_nudity';
      		break;
      
      		case('profile_setting_graphics'):
      			$_key	=	'setting_graphics';
      		break;
      
      		case('profile_setting_discreet'):
      			$_key	=	'setting_discreet';
      		break;
      
      		case('profile_setting_disable'):
      			$_key	=	'setting_disable';
      		break;
      
      		case('profile_setting_mailnotifier'):
      			$_key	=	'setting_mailnotifier';
      		break;
      
      		case('profile_setting_im_availability'):
      			$_key	=	'setting_im';
      		break;
      
      	}


      	if($_value == 0 || $_value == 1){


            // create database connection ------------------
          	$obj_db					= new db;
          	$obj_db->Connect(0); //write operation
            // ---------------------------------------------
      
          	// update user_profile_specs -------------------
          	if( mysql_query("UPDATE user_profile_specs SET $_key = '$_value', tsmodified = '$timestamp' WHERE userid = '$_userID'") ){
          		
          		// update user table ---------------------
          		if($_key	==	'setting_nudity'){
          			mysql_query("UPDATE user SET $_key = '$_value' WHERE userid = '$_userID'");
          		}
      
          		// update user table ---------------------
          		if($_key	==	'setting_discreet'){
          			mysql_query("UPDATE user SET $_key = '$_value' WHERE userid = '$_userID'");
          		}
      
      
          		echo $_value;
          	}else{
          		echo 'fail';
          	}
          	// ---------------------------------------------
      
      
        
        	// destroy database connection object ----------
        	$obj_db->Close();
        	// ---------------------------------------------
      
      	}
				

   		break;
			// =============================================================



















			// ajax send email from profile ================================
    	case "ajax.mail.sendemail":


        if(!$_POST['_sender'] || !$_POST['_recipient'] || !$_POST['_body'] || !$_POST['_msgToken'] || ($_POST['_msgToken'] != $_SESSION['ActiveUser']['msgToken']) ){
        	echo 'Send Failed >> Try Again Please';
        }else{
        	
        	if(!$_SESSION['ActiveUser']['NextMessageTimeMin'] || $_SESSION['ActiveUser']['NextMessageTimeMin'] < time()){
        		

          	$_SESSION['ActiveUser']['NextMessageTimeMin'] = time() + 60;														// 1 minute between emails
  
          	$_NewMsgNotification	= false;
          	
          	//echo $_SERVER['HTTP_REFERER'];																												//debug
            $sender								=	$obj_Member->FilterRawInput($_POST['_sender']);
  	        $senderUN							=	$obj_Member->FilterRawInput($_POST['_senderUN']);
            $recipient						=	$obj_Member->FilterRawInput($_POST['_recipient']);
  	        $body									=	filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_body']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $msg 									= $body;
            $timestamp						=	time();
  	        // PRIVATE USERID ================================================================================================================
          	$init_userid 					= $obj_Member->Decrypt($sender, 'private');
  
      	    // PUBLIC USERID =================================================================================================================
          	$rec_userid 					= $obj_Member->Decrypt($recipient, 'public');
  
            $_TargetEmailAddr	 		= $obj_Member->GeteMailAddr($rec_userid);
            $_NewMsgNotification	= $obj_Member->CheckNotificationStatus($rec_userid);
            
  
  
  
  
         		//$ConversationID		=	md5(uniqid(rand(),true));
  
            // database connection -----------------------
            $obj_db								= new db;
            $obj_db->Connect(1);  //read operation
            // -------------------------------------------
  
  
          	// check for special mail --------------------------------
          	$sql_query				= mysql_query("SELECT user_upgrade.productid FROM user_upgrade WHERE user_upgrade.userid = '$init_userid' AND user_upgrade.tsexpiration > '$timestamp'");
          	$sql_obj_result		=	mysql_fetch_object($sql_query);
          
          	if($sql_obj_result->productid > 2){
          		$_specialMail		= 1;
          	}else{
          		$_specialMail		= 0;
          	}
          	// -------------------------------------------------------------------
          
          
  					// Create Conversation -----------------------------------------------
           	if( mysql_query("INSERT INTO user_conversations (id, init_userid, rec_userid, ts_created, ts_latestmsg, special) VALUES ('$ConversationID', '$init_userid', '$rec_userid', '$timestamp' , '$timestamp' ,'$_specialMail') ") ){
           		$__converstation_insert			=	 true;
           	}else{
           		$__converstation_insert			=	 false;
           	}
           	// -------------------------------------------------------------------
  
  
          	$ConversationID	=	mysql_insert_id();
          	
          	// Create Conversation -----------------------------------------------
          	if(	mysql_query("INSERT INTO user_conversation_msgs (conversationid, toid, fromid, fromusername, msg, ts_created, special) VALUES ('$ConversationID', '$rec_userid', '$init_userid', '$senderUN', '$msg', '$timestamp', '$_specialMail') ") ){
          		$__converstation_msg_insert	=	 true;
          	}else{
          		$__converstation_msg_insert	=	 false;
          	}
  					// -------------------------------------------------------------------
  
  					if($__converstation_msg_insert	== true && $__converstation_insert == true){
  
  
  						
  					// check Nofitication Status & Log Notification is TRUE --------------
  					if($_NewMsgNotification == true){
  
  					$Random		=	rand(0,2);
  					if($Random == 0){
  						$_postman = 'FNF PostAngel';
  					}elseif($Random == 1){
  						$_postman = 'FNF PostDevil';
  					}elseif($Random == 2){
  						$_postman = 'FNF PostGirl';
  					}
  
  
  $_subject	= ucwords($senderUN)." eMailed You";
  
  $_RecipientMemberID_ENCRYPTED_PRIVATE = $obj_Member->Encrypt($rec_userid, 'private');



$_msg 		= "
".ucwords($senderUN)." eMailed You

Login & Click on MyMail to Read it ( http://sm0005.com/ )

==========================
".$_postman."
sm0005.com


Turn Off These Notifications (click below)
http://sm0005.com/M0-".$_RecipientMemberID_ENCRYPTED_PRIVATE."

Discontinue Account (click below)
http://sm0005.com/P0-".$_RecipientMemberID_ENCRYPTED_PRIVATE."
";
						
  							mysql_query("INSERT INTO user_notifications (addr, msg, type, subject) VALUES ('$_TargetEmailAddr', '$_msg', '1', '$_subject') ");
  						}
  					}
  					// -------------------------------------------------------------------
  
  
  
          	if( $__converstation_msg_insert	== true || $__converstation_insert ==	true ){
          		echo '<table height="100%" width="100%"><tr><td height="100%" width="100%" align="center" valign="middle"><font color="red" size="6"><b>EMail Sent!</b></font></td></tr></table>';
          	}else{
          		echo 'Email Failed!';
          	}
          
          
            // destroy database connection object --------
            $obj_db->Close();
            unset($obj_db);
          	// -------------------------------------------  

        	}else{
        		echo '<center><i>60 Seconds Between Messages Required</i></center>';
        	}

        } //end of if ---

   		break;
			// =============================================================










			// ajax send reply mail ========================================
    	case "ajax.mail.sendreply":


        if(!$_POST['_senderID'] || !$_POST['_replyBody'] || !$_POST['_cID']){
        	echo 'Send Failed >> Try Again Please';
        }else{

          $cID					=	filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_cID']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
          $SenderID			=	filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_senderID']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
          $replyBody		=	filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_replyBody']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
          $timestamp		=	time();

	        // PRIVATE USERID ================================================================================================================
        	$SenderID		 												= $obj_Member->Decrypt($SenderID, 'private');
        
        	// NOTES: --------------------------------------
        	// not encrypted
        	// Actual CID used for JS DIV Ident
        	// conversation checked to ensure the senderID (encrypted) is part of the conversation
        	// ---------------------------------------------
        	$cID					=	$_POST['_cID'];

          // database connection -----------------------
          $obj_db								= new db;
          $obj_db->Connect(1);  //read operation
          // -------------------------------------------

        	// lookup username of sender/replier ---------------------
        	$query_result					=	mysql_query("SELECT user.username FROM user WHERE user.userid = '$SenderID'");
        	$sql_obj_result				=	mysql_fetch_object($query_result);
        	$SenderUserName				=	$sql_obj_result->username;
        	// -------------------------------------------------------

        	// verify sender part of conversation --------------------
        	$query_result					=	mysql_query("SELECT * FROM user_conversations WHERE user_conversations.id = '$cID' AND user_conversations.init_userid = '$SenderID' OR user_conversations.rec_userid = '$SenderID'");
        	$sql_obj_result				=	mysql_fetch_object($query_result);
        	$sql_num_rows_verify	=	mysql_num_rows($query_result);
        	
        	if($sql_num_rows_verify){
        
          	if($sql_obj_result->init_userid == $SenderID){
          		$ToID	=	$sql_obj_result->rec_userid;
          			
          			if($sql_obj_result->rec_delete == $ToID){
          				// rebirth original conversation to hold new message
          				mysql_query("UPDATE user_conversations SET user_conversations.rec_delete = '0', user_conversations.init_delete = '0' WHERE user_conversations.id = '$cID' ");
          			}else{
          				
          			}
          		
          	}else{
          		$ToID	=	$sql_obj_result->init_userid;
        
          			if($sql_obj_result->init_delete == $ToID){
          				// rebirth original conversation to hold new message
          				mysql_query("UPDATE user_conversations SET user_conversations.init_delete = '0', user_conversations.rec_delete = '0' WHERE user_conversations.id = '$cID' ");
          			}
          	}

          	$__OriginalMsgOwnerID	=	$sql_obj_result->fromid;
          	// -------------------------------------------------------
        
             	if( (mysql_query("INSERT INTO user_conversation_msgs (conversationid, toid, fromid, fromusername, msg, ts_created) VALUES ('$cID', '$ToID', '$SenderID', '$SenderUserName', '$replyBody', '$timestamp') ")) && (mysql_query("UPDATE user_conversations SET user_conversations.readlatest = '0', user_conversations.ts_latestmsg = '$timestamp' WHERE user_conversations.id = '$cID' ")) ){
             		$__converstation_insert			=	 true;
             		echo '<div style="border: 1px solid #dadada; width: 300px; height: 50px; padding: 10px; background-color: #000000;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="middle"><i><h2 style="color: #59d050;">Message Sent!</h2></i></td> <td width="20"></td> <td align="center" valign="middle"><img src="/common/img/icons/icon_50x50_greencheck.png"></td></table> </div>';
             	}else{
             		$__converstation_insert			=	 false;
             		echo '<div style="border: 1px solid #dadada; width: 300px; height: 50px; padding: 10px; background-color: #000000;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="middle"><i><h2 style="color: #f83b09;">ERROR: <font color="#ffffff">Please Retry</a></h2></i></td> <td width="20"></td> <td align="center" valign="middle"><img src="/common/img/icons/icon_50x50_redcheck.png"></td></table> </div>';
             	}
          	// -------------------------------------------------------

          	// destroy database connection object --------
          	$obj_db->Close();
          	unset($obj_db);
        		// -------------------------------------------  

        	}else{
        		echo 'Spoof Attempt! Action Logged.';
        		mysql_query("INSERT INTO user_conversation_msgs_spoof (conversationid, toid, fromid, fromusername, msg, ts_created) VALUES ('$cID', '$ToID', '$SenderID', '$SenderUserName', '$replyBody', '$timestamp') ");
        	}

        } //end of if ---

   		break;
			// =============================================================











			// ajax set mail read ==========================================
    	case "ajax.mail.setread":


        if(!$_POST['_senderID'] || !$_POST['_cID']){
        	echo 'Send Failed >> Try Again Please';
        }else{

          $cID					=	filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_cID']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
          $SenderID			=	filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_senderID']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
          $timestamp		=	time();

	        // PRIVATE USERID ================================================================================================================
        	$SenderID		 												= $obj_Member->Decrypt($SenderID, 'private');
  	      // END PRIVATE USERID ============================================================================================================

          // database connection ---------------------------
          $obj_db								= new db;
          $obj_db->Connect(1);  //read operation
          // -----------------------------------------------

        	// verify sender part of conversation --------
        	$query_result					=	mysql_query("SELECT * FROM user_conversations WHERE user_conversations.id = '$cID' AND user_conversations.init_userid = '$SenderID' OR user_conversations.rec_userid = '$SenderID'");
        	$sql_obj_result				=	mysql_fetch_object($query_result);
        	$sql_num_rows_verify	=	mysql_num_rows($query_result);

        	if($sql_num_rows_verify){
        
             	if( mysql_query("UPDATE user_conversations SET user_conversations.readlatest = '1' WHERE user_conversations.id = '$cID' ") && mysql_query("UPDATE user_conversation_msgs SET user_conversation_msgs.read = '1' WHERE user_conversation_msgs.conversationid = '$cID' AND user_conversation_msgs.toid = '$SenderID' ")){
             		$__converstation_insert			=	 true;
             		echo 'Messages Set to Read';
             	}else{
             		$__converstation_insert			=	 false;
             		echo 'Message NOT set to Read';
             	}
        
        
          	// destroy database connection object ------
          	$obj_db->Close();
          	unset($obj_db);
        		// -------------------------------------------  
        
        
        	}else{
        		echo 'Spoof Attempt! Action Logged.';
        		mysql_query("INSERT INTO user_conversation_msgs_spoof (conversationid, toid, ts_created) VALUES ('$cID', '$SenderID', '$timestamp') ");
        	}

        } //end of if ---

   		break;
			// =============================================================











			// ajax delete mail ============================================
    	case "ajax.mail.setdeleted":



        if(!$_POST['_senderID'] || !$_POST['_cID']){
        	echo 'Send Failed >> Try Again Please';
        }else{

          $cID					=	filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_cID']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
          $SenderID			=	filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_senderID']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
          $who					=	filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_who']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
          $timestamp		=	time();

	        // PRIVATE USERID ================================================================================================================
        	$SenderID		 												= $obj_Member->Decrypt($SenderID, 'private');
  	      // END PRIVATE USERID ============================================================================================================

          // database connection -----------------------
          $obj_db								= new db;
          $obj_db->Connect(1);  //read operation
          // -------------------------------------------


    	   	// verify sender part of conversation --------------------
       		$query_result					=	mysql_query("SELECT * FROM user_conversations WHERE user_conversations.id = '$cID' AND user_conversations.init_userid = '$SenderID' OR user_conversations.rec_userid = '$SenderID'");
      	 	$sql_obj_result				=	mysql_fetch_object($query_result);
       		$sql_num_rows_verify	=	mysql_num_rows($query_result);

        	if($sql_num_rows_verify){
        		
        		
        			if($who == 'init'){

               	if( mysql_query("UPDATE user_conversations SET user_conversations.init_delete = '$SenderID', user_conversations.readlatest = '1' WHERE user_conversations.id = '$cID' ") && mysql_query("UPDATE user_conversation_msgs SET user_conversation_msgs.read = '1' WHERE user_conversation_msgs.conversationid = '$cID'")){
               		$__converstation_insert			=	 true;
               		echo 'Conversation Deleted';
               	}else{
               		$__converstation_insert			=	 false;
               		echo 'Conversation NOT Deleted';
               	}
        
        			}elseif($who == 'rec'){

               	if( mysql_query("UPDATE user_conversations SET user_conversations.rec_delete = '$SenderID', user_conversations.readlatest = '1' WHERE user_conversations.id = '$cID' ") && mysql_query("UPDATE user_conversation_msgs SET user_conversation_msgs.read = '1' WHERE user_conversation_msgs.conversationid = '$cID'")){
               		$__converstation_insert			=	 true;
               		echo 'Conversation Deleted';
               	}else{
               		$__converstation_insert			=	 false;
               		echo 'Conversation NOT Deleted';
               	}
        
        			}

          	// destroy database connection object --------
          	$obj_db->Close();
          	unset($obj_db);
        		// -------------------------------------------  

        	}else{
        		echo 'Spoof Attempt! Action Logged.';
        		mysql_query("INSERT INTO user_conversation_msgs_spoof (conversationid, toid, ts_created) VALUES ('$cID', '$SenderID', '$timestamp') ");
        	}

        } //end of if ---

   		break;
			// =============================================================











			// ajax - network / add friends ================================
    	case "ajax.network":


      	if(!$_POST['_FriendID'] || !$_POST['_Command']){
      		echo 'Communication Failure >> Try Refreshing Screen Please';
      	}else{
      
      		// -------------------------------------------------------
      		//$UserSession_ENCRYPTED_PRIVATE	= filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_UserSession']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      		$Command												= filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_Command']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      		$FriendID												= filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_FriendID']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      		// -------------------------------------------------------


          // Check IP against IP in Session && Ensure Freshness of Session via Session Expiration (5 minutes old MAX) against current time
          if( ($_SERVER['REMOTE_ADDR'] == $_SESSION['ActiveUser']['ip_address']) && ($_SESSION['ActiveUser']['session_expiration']	<=  time() + 300) ){

      			$OwnerID			=	$_SESSION['ActiveUser']['userid'];

      			switch($Command){

							// remove image from gallery -----------------
      				case'execute.myprofile.photo.remove':
      					$ImageID	=	$obj_Member->Decrypt($FriendID, 'private');
      					echo $obj_Member->ImageDelete($ImageID, $OwnerID);
      				break;

							// make image Primary in gallery -------------
      				case'execute.myprofile.photo.primary':
      					$ImageID	=	$obj_Member->Decrypt($FriendID, 'private');
								echo $obj_Member->ImagePrimary($ImageID, $OwnerID);
      				break;

							// Friend add/block/delete operation ---------
      				default:
      					$FriendID			= $obj_Member->Decrypt($FriendID);
      					$timestamp		=	time();
      					$obj_Member->AddRemoveBlockFriend($OwnerID, $FriendID, $Command);				
      				break;

      			}
          }
      	}

   		break;
			// =============================================================











			// ajax - window refresh =======================================
    	case "ajax-WindowRefresh":

      	if( (!$_POST['_UserSession'] || !$_POST['_Command']) && (!$_POST['_UserSession'] || !$_POST['_Command']) ){
      		//echo 'Communication Failure >> Try Refreshing Screen Please';
      	}else{
      		//echo $_SERVER['HTTP_REFERER'];																												//debug


      		// -------------------------------------------------------
      		$UserSession_ENCRYPTED_PRIVATE	= filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_UserSession']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      		$Command												= filter_var($obj_Utils->FILTER_RemoveXSS($_POST['_Command']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      		// -------------------------------------------------------


      		if($_POST['_OptionalParameter']){
      			$OptionalParameter							= $obj_Member->Decrypt($_POST['_OptionalParameter'], 'public');
      		}


        		switch($Command){
        			

        			// MyPromos Section ================================
        			case 'report.mypromos.create':
        				$obj_Member->Report($_SESSION['ActiveUser']['userid'], 'mypromos', 'report.mypromos.create', 'fullpage');
        			break;

        			
        			// MyFriends Section ===============================
        			case 'report.myfriends.requests':
        				$obj_Member->Report($_SESSION['ActiveUser']['userid'], 'myfriends', 'report.myfriends.requests', 'fullpage');
        			break;
      
        			case 'report.myfriends.pending':
        				$obj_Member->Report($_SESSION['ActiveUser']['userid'], 'myfriends', 'report.myfriends.pending', 'fullpage');
        			break;
      
        			case 'report.myfriends.current':
        				$obj_Member->Report($_SESSION['ActiveUser']['userid'], 'myfriends', 'report.myfriends.current', 'fullpage');
        			break;
      
        			case 'report.myfriends.block':
        				$obj_Member->Report($_SESSION['ActiveUser']['userid'], 'myfriends', 'report.myfriends.block', 'fullpage');
        			break;


      				// MyHome Section ==================================
        			case 'report.onlinenow.myhome':
        				$obj_Member->Report($_SESSION['ActiveUser']['userid'], 'online_now', $OptionalParameter, 0);
        			break;
      
      
      				// MyProfile Editor ================================
        			case 'report.myphotos.myprofileeditor':
        				$obj_Member->ImageGallery($_SESSION['ActiveUser']['userid'], $_SESSION['ActiveUser']['userid'], 1, 'ProfileEditor');
        			break;


      				default:
      				break;
        		}

      	}


   		break;
			// =============================================================





















			// Upgrade Memeber ===========================================================================================================================================================
    	case "member-Upgrade":



      	// Upgrade Data ----------------------------------------------
				$PaymentArray = array(
													'upgrade_product' 					=>	$_SESSION['ActiveUser']['upgrade_product']						= $obj_Member->FilterRawInput($_POST['upgrade_product']),
													'upgrade_term' 							=>	$_SESSION['ActiveUser']['upgrade_term']								= $obj_Member->FilterRawInput($_POST['upgrade_term']),
													'upgrade_cctype'						=>	$_SESSION['ActiveUser']['upgrade_cctype']							= $obj_Member->FilterRawInput($_POST['upgrade_cctype']),
													'upgrade_ccfirstnameoncard' =>	$_SESSION['ActiveUser']['upgrade_ccfirstnameoncard']	= $obj_Member->FilterRawInput($_POST['upgrade_ccfirstnameoncard']),
													'upgrade_cclastnameoncard' 	=>	$_SESSION['ActiveUser']['upgrade_cclastnameoncard']		= $obj_Member->FilterRawInput($_POST['upgrade_cclastnameoncard']),
													'upgrade_ccnumber' 					=>	$_SESSION['ActiveUser']['upgrade_ccnumber']						= $obj_Member->FilterRawInput($_POST['upgrade_ccnumber']),
													'upgrade_ccexpmonth' 				=>	$_SESSION['ActiveUser']['upgrade_ccexpmonth']					= $obj_Member->FilterRawInput($_POST['upgrade_ccexpmonth']),
													'upgrade_ccexpyear' 				=>	$_SESSION['ActiveUser']['upgrade_ccexpyear']					= $obj_Member->FilterRawInput($_POST['upgrade_ccexpyear']),
													'upgrade_ccvnumber' 				=>	$_SESSION['ActiveUser']['upgrade_ccvnumber']					= $obj_Member->FilterRawInput($_POST['upgrade_ccvnumber']),
													'upgrade_ccstate' 					=>	$_SESSION['ActiveUser']['upgrade_ccstate']						= $obj_Member->FilterRawInput($_POST['upgrade_ccstate']),
													'upgrade_cczipcode' 				=>	$_SESSION['ActiveUser']['upgrade_cczipcode']					= $obj_Member->FilterRawInput($_POST['upgrade_cczipcode']),
													'upgrade_referrer' 					=>	$_SESSION['ActiveUser']['upgrade_referrer']						= $obj_Member->FilterRawInput($_POST['upgrade_referrer'])
												);
				

				$__UpgradeError = false;

  			if(!$_SESSION['ActiveUser']['upgrade_product']){
  				$_SESSION['ActiveUser']['upgrade_product'] = 'error';
  				$__UpgradeError = true;
  				//echo '<script type="text/javascript">window.location="Upgrade-'.$_SESSION['ActiveUser']['upgrade_referrer'].'";</script>';
  			}
  			
  			if(!$_SESSION['ActiveUser']['upgrade_term']){
  				$_SESSION['ActiveUser']['upgrade_term'] = 'error';
  				$__UpgradeError = true;
  				//echo '<script type="text/javascript">window.location="Upgrade-'.$_SESSION['ActiveUser']['upgrade_referrer'].'";</script>';
  			}


  			if(!$_SESSION['ActiveUser']['upgrade_ccfirstnameoncard']){
  				$_SESSION['ActiveUser']['upgrade_ccfirstnameoncard'] = 'error';
  				$__UpgradeError = true;
  				//echo '<script type="text/javascript">window.location="Upgrade-'.$_SESSION['ActiveUser']['upgrade_referrer'].'";</script>';
  			}

  			if(!$_SESSION['ActiveUser']['upgrade_cclastnameoncard']){
  				$_SESSION['ActiveUser']['upgrade_cclastnameoncard'] = 'error';
  				$__UpgradeError = true;
  				//echo '<script type="text/javascript">window.location="Upgrade-'.$_SESSION['ActiveUser']['upgrade_referrer'].'";</script>';
  			}

  			if(!$_SESSION['ActiveUser']['upgrade_ccnumber']){
  				$_SESSION['ActiveUser']['upgrade_ccnumber'] = 'error';
  				$__UpgradeError = true;
  				//echo '<script type="text/javascript">window.location="Upgrade-'.$_SESSION['ActiveUser']['upgrade_referrer'].'";</script>';
  			}


  			if(!$_SESSION['ActiveUser']['upgrade_ccvnumber']){
  				$_SESSION['ActiveUser']['upgrade_ccvnumber'] = 'error';
  				$__UpgradeError = true;
  				//echo '<script type="text/javascript">window.location="Upgrade-'.$_SESSION['ActiveUser']['upgrade_referrer'].'";</script>';
  			}

  			if(!$_SESSION['ActiveUser']['upgrade_ccstate']){
  				$_SESSION['ActiveUser']['upgrade_ccstate'] = 'error';
  				$__UpgradeError = true;
  				//echo '<script type="text/javascript">window.location="Upgrade-'.$_SESSION['ActiveUser']['upgrade_referrer'].'";</script>';
  			}

  			if(!$_SESSION['ActiveUser']['upgrade_cczipcode']){
  				$_SESSION['ActiveUser']['upgrade_cczipcode'] = 'error';
  				$__UpgradeError = true;
  				//echo '<script type="text/javascript">window.location="Upgrade-'.$_SESSION['ActiveUser']['upgrade_referrer'].'";</script>';
  			}


				if($__UpgradeError == true && $_SESSION['ActiveUser']['upgrade_referrer']){
					echo '<script type="text/javascript">window.location="Upgrade-'.$_SESSION['ActiveUser']['upgrade_referrer'].'";</script>';	
				}elseif($__UpgradeError == true && !$_SESSION['ActiveUser']['upgrade_referrer']){
					echo '<script type="text/javascript">window.location="Upgrade";</script>';	
				}


				// process upgrade -----------------------
				$TransactionID	= null;


		
				$TransactionID	=	$obj_Member->ProcessUpgrade($_SESSION['ActiveUser'], $PaymentArray);


				//if($obj_Member->ProcessUpgrade($_SESSION['ActiveUser'], $PaymentArray) == true){																				// DEP.12.31.08.NAB
				if($TransactionID != null){																																																// ADD.12.31.08.NAB
					$EncryptedTransactionID	=	$obj_Member->Encrypt($TransactionID, 'private');
					echo '<script type="text/javascript">';
					echo 'window.location="Upgraded-'.$EncryptedTransactionID.'";';
					echo '</script>';
					//echo 'Upgrade Successful';
				
				// fail - return to upgrade page ---------------------------------------
				}else{
					?> 
						<script type="text/javascript">
							window.location="Upgrade";
						</script>
					<?
				}



    	break;
			// ===========================================================================================================================================================================








			// Verification Image Upload  ==================================
    	case "member-Verification-ImageUpload":

        	if( $obj_Member->VerificationImageUpload($_FILES['image'], $_SESSION['ActiveUser']['userid']) == true ){

        		?> 
        			<script type="text/javascript">
        				location="http://sm0005.com/Verify";
        				alert('DEBUG: success');
        			</script> 
        		<?
        	}else{
        		?> 
        			<script type="text/javascript">
        				location="http://sm0005.com/Verify";
        				alert('Error: Image Too Large / Upload Failed - Please Try Again');
        			</script> 
        		<?        		
        	}
      		// ---------------------------------------------------------


    	break;
			// =============================================================










			// Add Picture =================================================
    	case "member-Add-Picture":

					
				if($obj_Member->GetNumImages($_SESSION['ActiveUser']['userid']) < 12){
					
        	if( $obj_Member->ImageUpload($_FILES['image'], $_SESSION['ActiveUser']['userid']) == true ){
        		?> 
        			<script type="text/javascript">
        				//location="http://sm0005.com/MyProfile";
        				//window.top.window.getElementById('upload_target').innerHTML = 'upload_success';
        				window.top.window.IMG_Uploader_Response('upload_success');
        			</script> 
        		<?
        	}else{
        		?>
        			<script type="text/javascript">
        				//location="http://sm0005.com/MyProfile";
        				//alert('Error: Image Too Large / Upload Failed - Please Try Again');
        				window.top.window.IMG_Uploader_Response('upload_fail');
        			</script> 
        		<?
        	}
      		// ---------------------------------------------------------

				}else{

      		?>
      			<script type="text/javascript">
      				//location="http://sm0005.com/MyProfile";
      				alert('Reached Maximum Images - 12 Images');
      			</script> 
      		<?

				}

    	break;
			// =============================================================










/*
			// Delete Picture =================================================
    	case "member-Delete-Picture":

					$ImageID	=	$_GET['_898a8as'];

        	if( $obj_Member->ImageDelete($obj_Member->Decrypt($ImageID), $_SESSION['ActiveUser']['userid']) == true ){
        		// ?> <script type="text/javascript">location="http://sm0005.com/MyProfile";</script> <?
        	}else{
        		echo '"ERROR: Image Delete Failure >> Contact Administrator"';
        	}
      		// ---------------------------------------------------------

    	break;
			// =============================================================
*/









/*
			// Primary Picture =================================================
    	case "member-Primary-Picture":

					$ImageID	=	$_GET['_898a8as'];

        	if( $obj_Member->ImagePrimary($obj_Member->Decrypt($ImageID), $_SESSION['ActiveUser']['userid']) == true ){
        		// ?> <script type="text/javascript">location="http://sm0005.com/MyProfile";</script> <?
        	}else{
        		echo '"ERROR: Image Primary Failure >> Contact Administrator"';
        	}
      		// ---------------------------------------------------------

    	break;
			// =============================================================
*/










			// ADMINTTOLS - POPULATE  ======================================
    	case "ADMIN-populate":
				//$obj_Member->MassCreate(10);
    	break;
			// =============================================================


			// ADMINTTOLS - Smart POPULATE  ================================
    	case "ADMIN-populateSmart":
				//$obj_Member->MassCreateSmart(10);
    	break;
			// =============================================================


			// ADMINTTOLS - DEPOPULATE  ====================================
    	case "ADMIN-depopulate":
				//$obj_Member->MassDecreate();
    	break;
			// =============================================================





			// ADMINTTOLS - Approve Images  ================================
    	case "ADMIN-approvephoto":

					$ImageID	=	$_GET['_i'];
					$Rating		=	$_GET['_r'];

        	if( $obj_Member->ApprovePhoto($ImageID, $Rating) ){
        		?> <script type="text/javascript">location="http://sm0005.com/admintools";</script> <?
        	}else{
        		echo '"ERROR: Image Rating Failure >> Contact Administrator"';
        	}
      		// ---------------------------------------------------------

    	break;
			// =============================================================





			// Logout ======================================================
    	case "member-Logout":

      	// Logout Member -----------------------------------------
        $obj_Member->Logout($_SESSION['ActiveUser']);
      	// -------------------------------------------------------

				echo 'Logged Out';

   		break;
			// =============================================================




			// Activate ====================================================
    	case "member-Activate":

				$_userid_encrypted 	= $_GET['_898a8as'];
				$_userid_password 	= $_GET['_fdf7687'];




      	// Activate Member ---------------------------------------
      	if($obj_Member->Activate($_userid_encrypted, $_userid_password)){
      		?> <script type="text/javascript">location="http://sm0005.com/activated";</script> <?	
      	}else{
      		?> <script type="text/javascript">location="http://sm0005.com/notactivated";</script> <?
      	}
      	// -------------------------------------------------------

				

   		break;
			// =============================================================







			// Default =====================================================
			default:
				//echo 'No Function Found';
			// =============================================================



    }
    // end executable list -------------------------------------------




  
  }
  // ---------------------------------------------------------
























// open functionality ==============================================================================










		// executable list -----------------------------------------------
    switch ($_function){





			// Add Picture =================================================
    	case "member-Add-Picture":

					
				//if($obj_Member->GetNumImages(1) < 12){
					
        	//if( $obj_Member->ImageUpload($_FILES['image'], $_SESSION['ActiveUser']['userid']) == true ){
        	//print_r($_FILES['image']);
        	//die();
        	
        	
        	if( $obj_Member->ImageUpload($_FILES['image'], 1) == true ){
        		?> 
        			<script type="text/javascript">
        				//location="http://sm0005.com/MyProfile";
        				window.top.window.getElementById('upload_target').innerHTML = 'upload_success';
        				//window.top.window.IMG_Uploader_Response('upload_success');
        				//alert('hit');
        			</script> 
        		<?
        	}else{
        		?>
        			<script type="text/javascript">
        				//location="http://sm0005.com/MyProfile";
        				//alert('Error: Image Too Large / Upload Failed - Please Try Again');
        				window.top.window.IMG_Uploader_Response('upload_fail');
        			</script> 
        		<?
        	}
      		// ---------------------------------------------------------

/*
				}else{

      		?>
      			<script type="text/javascript">
      				//location="http://sm0005.com/MyProfile";
      				alert('Reached Maximum Images - 12 Images');
      			</script> 
      		<?

				}
*/


    	break;
			// =============================================================



			// ajax image upload image progress ============================
    	case "ajax.image.uploadprogess":
	 			//upload APC progress ---------------
  			$status = apc_fetch('upload_'.$_POST['APC_UPLOAD_PROGRESS']);
  			echo $status['current']/$status['total']*100;
   		break;
			// =============================================================





			// Login =======================================================
    	case "member-Authenticate2":



        // Check for Authenticated User --------------------------
        if( $obj_Member->MemberAuthorized == false ){
        	echo 'Access Denied / Logged Out';
        }else{
        	//echo 'Already Logged In';
        	?> <script type="text/javascript">parent.parent.location="http://sm0005.com/MyHome";</script> <?
        }
      	// -------------------------------------------------------


   		break;
			// =============================================================





			// Login =======================================================
    	case "member-Authenticate":


				//unset($_SESSION['ActiveUser']['email_addr']);
				//unset($_SESSION['ActiveUser']['password']);
  			
  			//$_SESSION['ActiveUser']['email_addr'] = $_POST['signin_emailaddress'];
  			//$_SESSION['ActiveUser']['password'] 	= $obj_Member->Encrypt($_POST['signin_password'], 'private');

        // database connection -----------------------
        $obj_db								= new db;
        $obj_db->Connect(1);  //read operation
        // -------------------------------------------


  			$_SESSION['ActiveUser']['email_addr'] 	= $_POST['_LoginCredentialA'];
  			if($_POST['_LoginCredentialA'] == 'email'){
  				$_SESSION['ActiveUser']['email_addr'] = null;
  			}

  			$_SESSION['ActiveUser']['password'] 		= $obj_Member->Encrypt($_POST['_LoginCredentialB'], 'private');
	 			if($_POST['_LoginCredentialB'] == 'password'){
  				$_SESSION['ActiveUser']['password'] = null;
  			}

  			$_SESSION['ActiveUser']['remember_me']	= $_POST['_LoginCredentialD'];
	
	
				
				// verify login token ------------------------------
				//if($_SESSION['ActiveUser']['loginToken'] == $_POST['_LoginCredentialC']){
					//$obj_Member->Authenticate($_SESSION['ActiveUser']);	
				//}


				// authenticate user -----------
				$obj_Member->Authenticate($_SESSION['ActiveUser']);	


				switch($obj_Member->MemberAuthorized){
					
					case '1';
					  // access granted ----------
          	echo 222;
					break;
					
					default:
          	// access denied -----------
          	echo 111;					

/*
	      		if($obj_Member->AppMode() != 2){
	      			echo '<script type="text/javascript">';
	      			echo 'location="http://'.$_SERVER['SERVER_NAME'].'/home";';
	      			echo '</script>';      			
	      		}
	      		*/
					break;
					
				}




/*

				// verify login token ------------------------------
				if($_SESSION['ActiveUser']['loginToken'] == $_POST['_LoginCredentialC']){

      		// Authenticate Member ---------------------------
					$obj_Member->Authenticate($_SESSION['ActiveUser']);        


          // Check for Authenticated User --------------------------
          if( $obj_Member->MemberAuthorized == false ){
          	// access denied -------------
          	echo 111;
          	// ?> <script type="text/javascript">location="http://sm0005.com/LoginFail";</script> <?
          }else{
          	// access granted ------------
          	echo 222;

  					 // ?> <script type="text/javascript">window.location = "http://brainfiz.com/begin";</script> <? 
  					 // ?> <script type="text/javascript">parent.parent.location="http://sm0005.com/MyHome";</script> <? 
          }
        	// -------------------------------------------------------

      	}else{
      		$obj_Member->MemberAuthorized = false;
      		echo 666;
      		if($obj_Member->AppMode() != 2){
      			echo '<script type="text/javascript">';
      			echo 'location="http://'.$_SERVER['SERVER_NAME'].'/home";';
      			echo '</script>';      			
      		}
      		?>
      			
      				
      			
      		
      		<?
      	}

*/



   		break;
			// =============================================================












			// Activate ====================================================
    	case "subpage.activate":



				$_userid_encrypted 	= $_GET['_898a8as'];
				$_userid_password 	= $_GET['_fdf7687'];

      	// Activate Member ---------------------------------------
      	if($obj_Member->Activate($_userid_encrypted, $_userid_password)){
      		?> <script type="text/javascript">location="http://sm0005.com/activated";</script> <?	
      	}else{
      		?> <script type="text/javascript">location="http://sm0005.com/notactivated";</script> <?
      	}
      	// -------------------------------------------------------

				

   		break;
			// =============================================================










			// form processor ==============================================
    	case "ajax.form.process__DEP":


				//print_r($_POST);



				//$obj_Member->ValidateForm($_POST['_Parameter']);

				$_Result_FormValidationRules = $obj_Member->GetFormValidationRules();
//print_r($_Result_FormValidationRules);

//die();
/*
				
						foreach($_Result_FormValidationRules as $_Array){
							foreach($_Array as $_field_2 => $_value_2){
							
								if($_field_2 == 'field'){
									echo $_value_2;
								}
							}
						}


				//print_r($_Result);
*/




				foreach($_POST as $_field_1 => $_value_1){
					if($_field_1 != '_function'){
						
						//echo $_field_1;
						$obj_Member->ValidateForm('user:'.$_field_1.':'.$_value_1, 2);
						
						foreach($_Result_FormValidationRules as $_field_2 => $_value_2){
							if($_field_2 == 'field' && $_value_2['field'] == $_field_1 && $_value_2['default'] == $_value_1){
								//echo $_value_2['field'].'  '.$_value_2['default'];
								//echo  $_value_1;
								//echo 'default value used';

							}
						}
						
						//echo 'user.'.$_field_1.' = "'.$_value_1.'", ';
						$_Query_BASE	.=	'user.'.$_field_1.' = "'.$_value_1.'", ';
					}
				}

				//echo 'INSERT INTO user (username, password, email_addr, dob, first_name, last_name) VALUES ('.$_Query_BASE.')';

				//$_Query_BASE	=	'INSERT INTO user (username, password, email_addr, dob, first_name, last_name) VALUES ()';
				
				//mysql_query("INSERT INTO booking (email_addr, message, issue_type, userid, platform, ts) VALUES ('$_emailAddr', ' $_additionalData', ' $_issueType', '$_userID' , ' $_platform' ,'$_timestamp') ");
				
				die();

				// form communication dataset ----------------------
				$Array_Post_EXPLODED = explode(':',$_POST['_Parameter']);

				$Array_Post = array(
					'table' 			=> $Array_Post_EXPLODED[0],
					'field' 			=> $Array_Post_EXPLODED[1],
					'value' 			=> $Array_Post_EXPLODED[2]
				);
				// -------------------------------------------------

				

				// record action -------------------------
				$obj_Member->TrackAction($_SESSION['ActiveUser']['userid'], 'processing form', 'start', $_SERVER['HTTP_REFERER']);

   		break;
			// =============================================================














			// ajax form validator =========================================
    	case "ajax.form.validator":

				$obj_Member->ValidateForm($_POST['_Parameter']);

   		break;
			// =============================================================
















			// Help Desk ===========================================
    	case "ajax.service.helpdesk":


        $_issueType				=	filter_var($_POST['_issueType'], FILTER_SANITIZE_MAGIC_QUOTES);
        $_emailAddr				=	filter_var($_POST['_emailAddr'], FILTER_SANITIZE_MAGIC_QUOTES);
        $_additionalData	=	filter_var($_POST['_additionalData'], FILTER_SANITIZE_MAGIC_QUOTES);
        $_platform				=	$obj_Member->Decrypt($_POST['_platform']);
        $_userID					=	$obj_Member->Decrypt($_POST['_userID'], 'private');
        $_timestamp				=	time();


        // -------------------------------------------------------
      	$obj_db					= new db;
      	$obj_db->Connect(1); //read operation
        // -------------------------------------------------------


      	if( mysql_query("INSERT INTO helpdesk (email_addr, message, issue_type, userid, platform, ts) VALUES ('$_emailAddr', ' $_additionalData', ' $_issueType', '$_userID' , ' $_platform' ,'$_timestamp') ") ){
      		echo 99;
      	}else{
      		echo 33;
      	}


       	// destroy database connection object --------
       	$obj_db->Close();
     		// -------------------------------------------  

    	break;
			// =============================================================














			// Create New Member ===========================================
    	case "member-Content_Comment_Read":


        $contentid			=	$_GET['contentid'];



        // -------------------------------------------------------
      	$obj_db					= new db;
      	$obj_db->Connect(1); //read operation
        // -------------------------------------------------------


        
        // Comment System ------------------------------------------------------------------
        	$sql_fscomment	= mysql_query("SELECT content_comment.ownerid, content_comment.comment, content_comment.tscreated FROM content_comment WHERE content_comment.contentid='$contentid' ORDER BY content_comment.tscreated DESC") or die (mysql_error());
        	$numcomments		=	mysql_numrows($sql_fscomment);
        ?>

        <table id="comment_table" style="width: 675px; height: 100%;">
        
        <?
        	$fscounter	=	0;
        	while ($fscounter < $numcomments) {
        
        		$fstscreated=	mysql_result($sql_fscomment,$fscounter,"content_comment.tscreated");
        		$fscomment	=	mysql_result($sql_fscomment,$fscounter,"content_comment.comment");
        		$fsownerid	=	mysql_result($sql_fscomment,$fscounter,"content_comment.ownerid");
        
        	$sql_fscommentmbr	= mysql_query("SELECT user.username FROM user WHERE user.userid='$fsownerid'") or die (mysql_error());
        	//$numcommentmbr		=	mysql_numrows($sql_fscommentmbr);

        	$fscommentscreenname	=	mysql_result($sql_fscommentmbr,0,"user.username");
        		
        ?>
        	<tr>
        		<td align="left" height="100">
        			<!-- <div id="fscommentcontainer"><div id="fscommentdate"></div> -->
        			<div class="comment-box">
        				<p class="comment-author"><span><a href="<? echo $baseurl.$fscommentscreenname; ?>"><? echo ucwords($fscommentscreenname); ?></a></span> Added on <? echo date('F jS, Y', $fstscreated); ?></p>
        				<p class="comment-body"><? echo $fscomment; ?></p>
        			</div>
        		</td>
        	</tr>
        <?
        		$fscounter++;
        	}
        ?>
        </table>
			<?

       	// destroy database connection object --------
       	$obj_db->Close();
     		// -------------------------------------------  

    	break;
			// =============================================================










			// Discontinue Notifications ===================================
    	case "external.member.notification.off":

  			$_PrivateEncryptedMemberID	=	$_GET['_898a8as'];
				$_DecryptedMemberID					=	$obj_Member->Decrypt($_PrivateEncryptedMemberID, 'private');

        // -------------------------------------------------------
      	$obj_db					= new db;
      	$obj_db->Connect(1); //read operation
        // -------------------------------------------------------

        // update setting ----------------------------------------
        if(mysql_query("UPDATE user_profile_specs SET user_profile_specs.setting_mailnotifier = '0' WHERE user_profile_specs.userid = '$_DecryptedMemberID'")){
        	echo 'Notifications Turned Off';
        }

       	// destroy database connection object --------
       	$obj_db->Close();
     		// -------------------------------------------  

    	break;
			// =============================================================









			// Discontinue Notifications ===================================
    	case "external.member.profile.off":

  			$_PrivateEncryptedMemberID	=	$_GET['_898a8as'];
				$_DecryptedMemberID					=	$obj_Member->Decrypt($_PrivateEncryptedMemberID, 'private');

        // -------------------------------------------------------
      	$obj_db					= new db;
      	$obj_db->Connect(1); //read operation
        // -------------------------------------------------------

        // update setting ----------------------------------------
        if(mysql_query("UPDATE user_profile_specs SET user_profile_specs.setting_disable = '1' WHERE user_profile_specs.userid = '$_DecryptedMemberID'")){
        	echo 'Profile Turned Off';
        }

       	// destroy database connection object --------
       	$obj_db->Close();
     		// -------------------------------------------  

    	break;
			// =============================================================










}








































// DEPRECIATED CODE --------------------------------------------------------

/*





			// ajax form validator =========================================
    	case "ajax.form.validator":


				$obj_Member->ValidateForm($_POST['_Parameter']);


// ***********************************
// the above method replaces all the code below 08-18-2010
// ***********************************
die();


				// form communication dataset ----------------------
				$Array_Post_EXPLODED = explode(':',$_POST['_Parameter']);

				$Array_Post = array(
					'table' 			=> $Array_Post_EXPLODED[0],
					'field' 			=> $Array_Post_EXPLODED[1],
					'value' 			=> $Array_Post_EXPLODED[2]
				);
				// -------------------------------------------------



/*
	XML VERSION ----------------

				// XML rule set ------------------------------------
  			//$validation_confXML				= '/var/www/vhosts/dbconf/validation.'.$obj_Member->SiteDomainPUB;
  			$validation_confXML				= '/var/www/vhosts/dbconf/validation.sm0005.com';
  			$_validation_baseXMLConn	= simplexml_load_file($validation_confXML) or die ("ERROR: ** VALIDATION Not Loaded  **");				


      	//Parse XML ----------------------------------
      	foreach($_validation_baseXMLConn as $validation){

       		if($validation->field == $Array_Post['field']){

    				$Array_Validation_Response = array(
    					'response_invalid' 					=> $validation->response_invalid,
    					'response_incomplete'				=> $validation->response_incomplete,
    					'response_unavailable'			=> $validation->response_unavailable,
    					'response_valid' 						=> $validation->response_valid,
    					'icon_invalid_url_small'		=> $validation->icon_invalid_url_small,
    					'icon_valid_url_small'			=> $validation->icon_valid_url_small,
    					'response_div_id' 					=> $validation->response_div_id
    				);
         	}
      	}
    		// -------------------------------------------

				// debug code ----------------------------
				//echo $Array_Validation_Response['response_invalid_short'].':'.$Array_Validation_Response['response_valid_short'].':'.$Array_Validation_Response['response_invalid_long'].':'.$Array_Validation_Response['response_valid_long'].':'.$Array_Validation_Response['icon_invalid_url_small'].':'.$Array_Validation_Response['icon_valid_url_small'].':'.$Array_Validation_Response['response_div_id'];





				// get Validation rules from DB ----------
				$_validation_DB						=	$obj_Member->GetFormValidationRules();

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
      					'response_div_id' 					=> $_Array['response_div_id']
      				);
						}
					}
				}
				// ---------------------------------------



 

				// validation tests ----------------------
				switch($Array_Post['field']){
					
					// validate email address --------------
					case('email_addr'):
						// incomplete ----
    				if(!$Array_Post['value']){
    					echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    				// invalid -------
    				}elseif(filter_var($Array_Post['value'], FILTER_VALIDATE_EMAIL) == false){
    					echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    				// valid ---------
    				}else{
    					echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    				}
					break;
					// -------------------------------------


					// validate password -------------------
					case('password'):
						// incomplete ----
    				if(!$Array_Post['value']){
    					echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    				// invalid -------
    				}elseif(strlen($Array_Post['value']) < 5){
    					echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    				// valid ---------
    				}else{
    					echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    				}						
					break;
					// -------------------------------------


					// validate phone ----------------------
					case('phone'):
						// incomplete ----
    				if(!$Array_Post['value']){
    					echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    				// invalid -------
    				//}elseif($obj_Member->Validate_USPhone($Array_Post['value'],$useareacode=true) == false){
    				}elseif($obj_Member->Validate_USPhone($Array_Post['value']) == false){
    					echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    				// valid ---------
    				}else{
    					echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    				}						
					break;
					// -------------------------------------


					// validate user name ------------------
					case('username'):
						$__regex = '/^[a-z\d_]{5,20}$/i';
						// incomplete ----
    				if(!$Array_Post['value']){
    					echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    				// invalid -------
    				}elseif(preg_match($__regex, $Array_Post['value']) == false){
    					echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    				// valid ---------
    				}else{
    					echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    				}						
					break;
					// -------------------------------------


					// validate credit card ----------------
					case('cc_number'):
						$__regex = '^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})$^';
						// incomplete ----
    				if(!$Array_Post['value']){
    					echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    				// invalid -------
    				}elseif(preg_match($__regex, $Array_Post['value']) == false){
    					echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    				// valid ---------
    				}else{
    					echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    				}						
					break;
					// -------------------------------------

					// validate zipcode --------------------
					case('zipcode'):
						// incomplete ----
    				if(!$Array_Post['value']){
    					echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    				// invalid -------
    				//}elseif(filter_var($Array_Post['value'], FILTER_VALIDATE_INT) == false || strlen($Array_Post['value']) < 5){
    				}elseif($obj_Member->Validate_ZIPCode($Array_Post['value']) == false){
    					echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    				// valid ---------
    				}else{
    					echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    				}						
					break;
					// -------------------------------------

					// validate SSN ------------------------
					case('ssn'):
						$__regex = '^[0-9]{3}[ ]*[)]{0,1}[-.]{0,1}[ ]*[0-9]{2}[ ]*[)]{0,1}[-.]{0,1}[ ]*[0-9]{4}$^';
						// incomplete ----
    				if(!$Array_Post['value']){
    					echo $Array_Validation_Response['response_incomplete'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    				// invalid -------
    				}elseif(preg_match($__regex, $Array_Post['value']) == false){
    					echo $Array_Validation_Response['response_invalid'].'+'.$Array_Validation_Response['icon_invalid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+invalid';
    				// valid ---------
    				}else{
    					echo $Array_Validation_Response['response_valid'].'+'.$Array_Validation_Response['icon_valid_url_small'].'+'.$Array_Validation_Response['response_div_id'].'+valid';
    				}						
					break;
					// -------------------------------------



				}



				//BETA ?!
				die();




      	if( !$_POST['_Command'] || !$_POST['_Parameter'] || ($_SESSION['ActiveUser']['loginToken'] != $_POST['_UserToken']) ){
      		echo 'Communication Failure';
      	}else{
      		//$_SERVER['SERVER_NAME'];



      		// -------------------------------------------------------
      		$Command		= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_Command']));
      		$Parameter	= $obj_Member->FilterRawInput($obj_Utils->FILTER_RemoveXSS($_POST['_Parameter']));
      		// -------------------------------------------------------


      		if($_POST['_OptionalParameter']){
      			$OptionalParameter							= $obj_Member->FilterRawInput($_POST['_OptionalParameter']);
      		}

        		switch($Command){

      				// lookup city per searched ZIP Code ---------
        			case 'lookup.zipcode.prereg':
        				$CityLookupViaZIPCode = $obj_Member->GeoCodeLookup($Parameter, $Mode = 'Array');
        				echo $CityLookupViaZIPCode['city'];
	       			break;

      				default:
      				break;
        		}

      	}


   		break;
			// =============================================================













*/




?>      