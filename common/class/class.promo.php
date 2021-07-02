<?php

// --------------------------------------------------------------------------------------------------------------------------------
// Author: 	Nathaniel Adam Briggs @ Q2 2009  nathaniel.briggs@gmail.com
// Owner:		eGenerations Network, Inc.
// Client:	FriendsNFlings.com
// Class:		promo
// Version:	Release 1.0
// Method:	example()
// Purpose:	Handle all Promtional / Advertising Operations
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

interface promoInterface {

	// Core Commands ---------------------------------------------------
	public function PromotionalAdvertisingReport($Type, $Zipcode, $Parameters = false);
	
	
	// Imagery Commands ------------------------------------------------
	public function ImageDisplay_3($Viewers_UserID, $ImageOwner_UserID, $Type, $Avatar = 0, $Mode = false, $GraphicsModeOverride = false, $BorderExplicit = false);


	// Commands --------------------------------------------------------
	public function PromoRenderer($PromoID);

}











// START OF CLASS ======================================================================================================

class promo extends memberAffiliate implements promoInterface {


// PROPERTIES ----------------------------------------------------------------------------


	// external communication ==========================================

	public	$MemberID						= null;
	//public	$MemberUsername			= null;
	//public	$MemberPassword			= null;
	//public	$MembereMail				= null;
	//public	$MemberIP						= null;
	//public	$MemberAuthorized		= null;
	//public	$MemberPaid					= null;
	//public	$MemberPaidPrior		= null;
	//public	$MemberPaidPriorProduct		= null;
	
	//public	$PromocodeMessage		= null;
	//public	$PromocodeDiscount	= null;
	//public	$Promocode					= null;
	//public	$PromocodeCTAPitch	= null;



	// internal operations =============================================
	protected	$db_connection			= null;
	protected	$_OBJ_Session				= null;
	protected	$_OBJ_DB						= null;

	//private	$NewMemberArray			= null;
	
	protected	$SiteDomain					= null;
	
	
	
	
	
	// encryption object -------------------------------------
	protected $__passPhrase				= null;
	protected $__key							= null;
	

	// encryption PUBLIC  ------------------------------------
	protected $__passPhrase_PUBLIC	= null;
	protected $__key_PUBLIC					= null;
	protected $__cipherType_PUBLIC	= null;
	protected $__cipherMode_PUBLIC	= null;
	
	// encryption PRIVATE  -----------------------------------
	protected $__passPhrase_PRIVATE	= null;
	protected $__key_PRIVATE				= null;
	protected $__cipherType_PRIVATE	= null;
	protected $__cipherMode_PRIVATE	= null;	


	





// METHODS -------------------------------------------------------------------------------


	// CONSTRUCTOR =====================================================
	public function __construct(){

		//$this->MemberID						= null;
		//$this->MemberUsername			= null;
		//$this->MemberPassword			= null;
		//$this->MembereMail				= null;
		//$this->MemberIP						= null;
		//$this->MemberAuthorized		= false;
		//$this->MemberPaid					= false;
		//$this->MemberPaidPrior		= false;
		//$this->MemberPaidPriorProduct		= false;

		//$this->PromocodeMessage		= false;
		//$this->PromocodeDiscount	= false;
		//$this->Promocode					= false;
		//$this->PromocodeCTAPitch	= false;
		//$this->PromocodeLifespan	=	null;
		//$this->PromocodeType			=	null;
		//$this->PromocodeProductID	=	null;
		


		$this->_OBJ_Session 			= null;
		$this->_OBJ_DB 						= null;
		
		$this->SiteDomain					= $_SERVER[HTTP_HOST];

		//$this->__passPhrase				= 'newUserPassword_lateniGh@&^!$$)';
		//$this->__key							= 'friendsnflings.com!(*!sd$$';
		
		//$_baseXMLConn->public->cipherType;
		//$_baseXMLConn->private->passPhrase;

		

		$confXML				= '/var/www/vhosts/dbconf/keys.'.$this->SiteDomain;
		$_baseXMLConn		= simplexml_load_file($confXML) or die ("ERROR: ** KEYS Not Loaded  **");


		// encryption PUBLIC -------------------------
		$this->__passPhrase_PUBLIC	= $_baseXMLConn->public->passPhrase;
		$this->__key_PUBLIC					= $_baseXMLConn->public->key;
		$this->__cipherType_PUBLIC	= $_baseXMLConn->public->cipherType;
		$this->__cipherMode_PUBLIC	= $_baseXMLConn->public->cipherMode;

		// encryption PRIVATE ------------------------
		$this->__passPhrase_PRIVATE	= $_baseXMLConn->private->passPhrase;
		$this->__key_PRIVATE				= $_baseXMLConn->private->key;
		$this->__cipherType_PRIVATE	= $_baseXMLConn->private->cipherType;
		$this->__cipherMode_PRIVATE	= $_baseXMLConn->private->cipherMode;



		// class.dbconn - database connection ----------------------
		require("/var/www/vhosts/egenhq.com/httpdocs/common/class/class.db.php");

		// class.session - -----------------------------------------
		//require("/var/www/vhosts/egenhq.com/httpdocs/common/class/class.session.php");

		// class.encrypt - -----------------------------------------
		require("/var/www/vhosts/egenhq.com/httpdocs/common/class/class.encrypt.php");

		// class.gallery - -----------------------------------------
		require("/var/www/vhosts/egenhq.com/httpdocs/common/class/class.gallery.php");

		// class.zipcode - -----------------------------------------
		require("/var/www/vhosts/egenhq.com/httpdocs/common/class/class.zipcode.php");

		// class.phpmailer - ---------------------------------------
		require("/var/www/vhosts/egenhq.com/httpdocs/common/class/class.phpmailer.php");





	}
	// =================================================================






	// DESTRUCTOR ======================================================
	public function __destruct(){

		//unset($this->MemberID);
		//unset($this->MemberUsername);
		//unset($this->MemberPassword);
		//unset($this->MembereMail);
		//unset($this->MemberIP);
		//unset($this->MemberAuthorized);
		//unset($this->MemberPaid);
		//unset($this->MemberPaidPrior);
		//unset($this->MemberPaidPriorProduct);

		//unset($this->PromocodeMessage);
		//unset($this->PromocodeDiscount);
		//unset($this->Promocode);
		//unset($this->PromocodeCTAPitch);
		//unset($this->PromocodeLifespan);
		//unset($this->PromocodeType);
		//unset($this->PromocodeProductID);


		unset($this->_OBJ_Session);
		
		unset($this->SiteDomain);
		

	}
	// =================================================================







/*


	// METHOD :: PromoRenderer =========================================
	public function PromoRenderer($PromoID){

		$_return									= false;
		$CurrentTime							= time();

		// check for encrypted promocode -------------
		if(strlen($PromoID) > 20){
			//$PromoID =	$this->Decrypt($PromoID);
		}
		// -------------------------------------------



		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  	// Retrieve Data -----------------------------
		$sql_PromoSpec		= mysql_query("SELECT * FROM user_promos WHERE user_promos.promoid = '$PromoID'");
  	$sql_obj_result		=	mysql_fetch_object($sql_PromoSpec);

		// record impression -------------------------
		mysql_query("UPDATE user_promos SET user_promos.impressions = user_promos.impressions + 1 WHERE user_promos.promoid = '$PromoID'");
		// -------------------------------------------

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


*/












	// METHOD :: PromotionalAdvertisingReport ==========================
	public function PromotionalAdvertisingReport($Type, $Zipcode, $Parameters = false){

		$_return					= false;
		
	
	
	$Setting_header_enabled			=	$Parameters['header_enabled'];
	$Setting_header_text				=	$Parameters['header_text'];


	$Setting_profile_totalnum		=	$Parameters['profile_totalnum'];
	$Setting_profile_thumbsize	=	$Parameters['profile_thumbsize'];


	$Setting_background_color		=	$Parameters['bg_color'];
	if($Setting_background_color == 'none'){
		$Setting_background_color = ' ';
	}else{
		$Setting_background_color = ' bgcolor="#'.$Setting_background_color.'" ';
	}




//print_r($Parameters);
//die();

    //report type --------------------------------
    switch($Type){



    	// -------------------------------------------------------------
    	case 'geo.horizontal':


				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------
    		$_expiration	=	time() - 2400;


    		// gender seeking definition -----------------
    		$__SELECT_s1	=	null;
    		$__SELECT_s2	=	null;
    		$__SELECT_s3	=	null;
    		$__SELECT_s4	=	null;


    			//if($key == 0 & $value == 1){ echo 'Seeking Men';}
    			if($Gender == 1){ $__SELECT_s1	= "'1', "; }
    			
    			//if($key == 1 & $value == 1){ echo 'Seeking Women';}
    			if($Gender == 2){ $__SELECT_s2	= "'2', "; }
    			
    			//if($key == 2 & $value == 1){ echo 'Seeking Trannies';}
    			if($Gender == 3){ $__SELECT_s3	= "'3', "; }
    			
    			//if($key == 3 & $value == 1){ echo 'Seeking Couples';}
    			if($Gender == 4){ $__SELECT_s4	= "'4' "; }

    		
    		$_SELECT_sMASTER	=	$__SELECT_s1.$__SELECT_s2.$__SELECT_s3.$__SELECT_s4;
    		$_SELECT_sMASTER	= preg_replace('/[\s]?,[\s]?$/i','',$_SELECT_sMASTER);



    		// zipcode/geocode definition ======================================
    		$ziparray = $this->ZIPCodeLookup($Zipcode['zipcode'], '750');

    		$__SELECT_zMASTER	= null;
    		$__ArrayCount			=	count($ziparray);

    		foreach($ziparray as $key => $value){
       		$__SELECT_zMASTER	.=	'\''.$value.'\''.($__ArrayCount == $key+1 ? ' ':', ');
    		}
    		// =================================================================


/*

working dynamic query - pasted from search page

		// Get Record Total --------------------------------------------------------
    $_SELECT_MASTER		=	"
    SELECT count(*)
    FROM user U
    ".$__SELECT_ProfileWPics."
    INNER JOIN user_profile_specs UPS ON ".$_SELECT_gMASTER." UPS.tsdob <= ".$__SELECT_a1." AND UPS.tsdob >= ".$__SELECT_a2." AND
    	(".$_SELECT_iMASTER.")
    	AND UPS.userid = U.userid
    WHERE U.disabled != '1' AND UPS.setting_disable != '1' ".$__SELECT_VerifiedPics." AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.") ".$__SELECT_onlineNow."
    GROUP BY U.userid ORDER BY U.ts_lastlogin DESC
    ";
*/

				$sql_query	= "
				SELECT U.* , UI.*, UPS.* 
				FROM user U 
				LEFT JOIN user_images UI ON UI.userid = U.userid AND UI.avatar = '1' 
				INNER JOIN user_profile_specs UPS ON UPS.seek_w = '1' AND UPS.seek_m = '1' AND (UPS.into_friends = '1' OR UPS.into_flirting = '1' OR UPS.into_relationship = '1' OR UPS.into_sex = '1' OR UPS.into_fetish = '1') 
				AND UPS.userid = U.userid 
				WHERE U.disabled != '1' AND UPS.setting_disable != '1' AND U.gender IN ('1','2') AND U.zipcode IN (".$__SELECT_zMASTER.") 
				GROUP BY U.userid 
				ORDER BY RAND(), U.ts_lastlogin DESC 
				LIMIT ".$Setting_profile_totalnum."
				";

    		$sql_result		= mysql_query($sql_query);
				$sql_num_rows	=	@mysql_num_rows($sql_result);


				// destroy database connection object --------
				$obj_db->Close();
				unset($obj_db);
				// -------------------------------------------

  			if($sql_num_rows){

    			$counter	=	0;
    			while( $sql_array_result	=	mysql_fetch_assoc($sql_result) ){
    				$ResultArray[$counter] = $sql_array_result;
    				$counter++;
    			}
    			
    			$counter	=	1;
    			
    			
    			if($Setting_header_enabled){
    				echo '<table border="0" cellpadding="0" cellspacing="0" style="height: 170px;" '.$Setting_background_color.'><tr><td colspan="20" align="middle"><font size="4" color="white">Girls looking for Friends & Flings in '.(ucwords($Zipcode['city'])).', '.strtoupper($Zipcode['state']).'</font></td></tr><tr>';
    			}else{
    				echo '<table border="0" cellpadding="0" cellspacing="0" style="height: 170px;" '.$Setting_background_color.'><tr>';
    			}
    			
      		foreach($ResultArray as $key => $value){
      			echo '<td align="center" valign="top">';
      				echo '<table border="0" cellpadding="0" cellspacing="0" style="margin-bottom: 5px; margin-top: 5px;"><tr><td align="center" valign="top">';
      				//echo '<a href="ViewProfile-'.$this->Encrypt($value['userid']).'">';



        			// thumbnail sizing --------------------------
        			if($Setting_profile_thumbsize == 'small'){
        				$this->ImageDisplay_3($this->Encrypt(999999, 'private'), $value['userid'], 1, 1, false, true);
        			}elseif($Setting_profile_thumbsize == 'medium'){
        				$this->ImageDisplay_3($this->Encrypt(999999, 'private'), $value['userid'], 2, 1, false, true);
        			}
        			// -------------------------------------------



      				echo '</a>';
      				echo '</td></tr><tr><td align="center">';
      				echo ($sql_num_rows < 4 ? '<center><font face="arial" size="2">':'<font face="arial" size="2">').$this->_stringShorten(ucwords($value['username']),14,'').'</font></center>';
								
								// turn ons --------------------------------
								echo '<div style="position: relative; border: 0px solid #000000; height: 14px; padding: 0px; top: -2px; text-align: left; align: left; width: 130px;"><font style="font-family: arial; font-size: 10px; color: #000000;"><b>Turn-Ons:</b> ';
									
									
									$TurnonArray	=	array();
									
									switch($value['turnon_butt']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Butt </font>';
											array_push($TurnonArray, 'butt');
										break;
									}

									switch($value['turnon_legs']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Legs</font>';
											array_push($TurnonArray, 'legs');
										break;
									}

									switch($value['turnon_chest']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Chest </font>';
											array_push($TurnonArray, 'chest');
										break;
									}

									switch($value['turnon_hands']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Hands </font>';
											array_push($TurnonArray, 'hands');
										break;
									}

									switch($value['turnon_tan']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff">Tan</font>';
											array_push($TurnonArray, 'tan');
										break;
									}

									switch($value['turnon_mind']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff">Mind</font>';
											array_push($TurnonArray, 'mind');
										break;
									}

									switch($value['turnon_feet']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff">Feet</font>';
											array_push($TurnonArray, 'feet');
										break;
									}

									switch($value['turnon_askme']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff">Ask Me</font>';
											array_push($TurnonArray, 'ask me');
										break;
									}

									switch($value['turnon_hair']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff">Hair</font>';
											array_push($TurnonArray, 'hair');
										break;
									}

									switch($value['turnon_piercings']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff">Piercings</font>';
											array_push($TurnonArray, 'piercings');
										break;
									}

									switch($value['turnon_money']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Money </font>';
											array_push($TurnonArray, 'money');
										break;
									}

									switch($value['turnon_power']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Power </font>';
											array_push($TurnonArray, 'power');
										break;
									}

									switch($value['turnon_size']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Size </font>';
											array_push($TurnonArray, 'size');
										break;
									}

									switch($value['turnon_hardbody']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Hardbody </font>';
											array_push($TurnonArray, 'hardbody');
										break;
									}

									switch($value['turnon_mysecret']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Secret </font>';
											array_push($TurnonArray, 'secret');
										break;
									}
								
								//print_r($TurnonArray);
								
								echo '<font style="font-size: 10px;" color="#4f68ff">';
									shuffle($TurnonArray);
									$turnon1	=	$TurnonArray[0];
									echo ucwords($turnon1);
									shuffle($TurnonArray);
									$turnon2	=	$TurnonArray[0];
									echo ($turnon2 && $turnon2 != $turnon1 ? ', '.ucwords($turnon2):'');
								echo '</font>';
								echo '</div>';
								// END turn ons ----------------------------




								// fantasies -------------------------------
								echo '<div style="position: relative; border: 0px solid #000000; height: 14px; padding: 0px; top: -3px; text-align: left; align: left; width: 130px;"><font style="font-size: 10px; color: #000000; line-height: -5px;"><b>Fantasy:</b> ';

									
									$FantasyArray	=	array();

									switch($value['fantasy_twogirls']){
										case 1:
											array_push($FantasyArray, '2 girls');
										break;
									}

									switch($value['fantasy_twoguys']){
										case 1:
											array_push($FantasyArray, '2 guys');
										break;
									}

									switch($value['fantasy_public']){
										case 1:
											array_push($FantasyArray, 'public');
										break;
									}

									switch($value['fantasy_boat']){
										case 1:
											array_push($FantasyArray, 'boat');
										break;
									}

									switch($value['fantasy_dominatrix']){
										case 1:
											array_push($FantasyArray, 'dom');
										break;
									}

									switch($value['fantasy_beach']){
										case 1:
											array_push($FantasyArray, 'beach');
										break;
									}

									switch($value['fantasy_outdoors']){
										case 1:
											array_push($FantasyArray, 'outdoors');
										break;
									}

									switch($value['fantasy_askme']){
										case 1:
											array_push($FantasyArray, 'ask me');
										break;
									}

									switch($value['fantasy_toys']){
										case 1:
											array_push($FantasyArray, 'toys');
										break;
									}

									switch($value['fantasy_illegal']){
										case 1:
											array_push($FantasyArray, 'illegal');
										break;
									}

								echo '<font style="font-size: 10px;" color="#4f68ff">';
									shuffle($FantasyArray);
									$fantasy1	=	$FantasyArray[0];
									echo (!$fantasy1 ? 'Not Telling':ucwords($fantasy1));
									shuffle($FantasyArray);
									$fantasy2	=	$FantasyArray[0];
									echo ($fantasy2 && $fantasy2 != $fantasy1 ? ', '.ucwords($fantasy2):'');
								echo '</font>';
								echo '</div>';
								// END turn ons ----------------------------


      				
      				echo '</td></tr></table>';
      			echo '</td>';
      			echo ($counter == 7 ? '</tr><tr>':'');
      			$counter++;
      		}
      		echo '</table>';
    		}else{
    			echo '<div style="background-color: #000000; left: 10px; top: 70px; position: relative; border: 4px solid #ffffff; width: 400px; height: 50px; align: center; text-align: center;"><table height="100%" width="100%"><tr><td> <font style="font-size: 22px;" color="#ff9000"><b>No Matches Found</b></font></td></tr></table> </div>';
    		}

    	break;
    	// -------------------------------------------------------------


    }
    // -------------------------------------------




		//$sql_num_rows			=	mysql_num_rows($sql_result);

		




	return $_return;
	}
	// =================================================================









	

	// METHOD :: ImageDisplay_3 ===========================================
	
	/*
	NOTES:  Looks Up image, with Viewer and Owners settings in mind
		e.g. If Discreet, and doesn't show unless on Friend List.
	
	
	*/
	
	public function ImageDisplay_3($Viewers_UserID, $ImageOwner_UserID, $Type, $Avatar = 0, $Mode = false, $GraphicsModeOverride = false, $BorderExplicit = false){



		$_return								= false;

		$Explicit_Border_Color	= $BorderExplicit;

		$Halo_Background_Color	=	'#ffffff;';
		$Halo_Border_Color			=	'#ffffff;';
		$Halo_Font_Color				=	'#000000;';
		
		$Horns_Background_Color	=	'#000000;';
		$Horns_Border_Color			=	'#000000;';
		$Horns_Font_Color				=	'#ffffff;';
		
		$Discreet_Border_Color	=	'#000000;';

		
		// check for VIP/Special Member Status -----------------		
		if($this->GetStatus($ImageOwner_UserID, 'special') == true){
			$VIPMember = true;
		}
		$Special_Border_Color		=	'#ffa500;';
		// -----------------------------------------------------


		// check for Verified Member Status --------------------
		if($this->GetStatus($ImageOwner_UserID, 'verified photos') == true){
			$VerifiedMember = true;
		}
		$Verified_Border_Color	=	'#2dd017;';
		// -----------------------------------------------------



		$FriendStatus						= $this->GetFriendStatus($ImageOwner_UserID, $Viewers_UserID);


		// get mode & friend list of viewer query ----
		//$this->GetMemberProfile_Settings($Viewers_UserID);
		// -------------------------------------------


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		// viewer graphics settings ------------------
		$sql_settings							= mysql_query("SELECT UPS.setting_nudity, UPS.setting_graphics FROM user_profile_specs UPS WHERE userid = '$Viewers_UserID'");
		$sql_settings_obj_result	=	mysql_fetch_object($sql_settings);
		
		
		if($sql_settings_obj_result->setting_nudity){
			$NudityMode	=	true;
		}else{
			$NudityMode	=	false;	
		}

		if($sql_settings_obj_result->setting_graphics){
			$GraphicsMode	=	true;
		}else{
			$GraphicsMode	=	false;	
		}
		// -------------------------------------------

		// graphics mode override --------------------
		if($GraphicsModeOverride == true && $GraphicsMode	==	true){
			$GraphicsMode	= false;
		}
		// -------------------------------------------



		// image query -------------------------------
		$_select_avatar	= "
		SELECT UI.*, U.*, UPS.*
		FROM user_images UI, user U
		INNER JOIN user_profile_specs UPS ON UPS.userid = '$ImageOwner_UserID'
		WHERE UI.userid = '$ImageOwner_UserID' AND U.userid = '$ImageOwner_UserID' AND UI.avatar = '1'
		";

		$_select_noavatar	= "
		SELECT UI.*, U.*, UPS.*
		FROM user_images UI, user U
		INNER JOIN user_profile_specs UPS ON UPS.userid = '$ImageOwner_UserID'
		WHERE UI.userid = '$ImageOwner_UserID' AND U.userid = '$ImageOwner_UserID'
		";

		if($Avatar == 1){
			$sql_img					= mysql_query($_select_avatar);
		}else{
			$sql_img					= mysql_query($_select_noavatar);
		}
			$sql_obj_result		=	mysql_fetch_object($sql_img);
		// -------------------------------------------



  	// halo or horns ===========================
  		// properties ----------------------------
  		$Halo		= null;
  		$Horns	= null;
  
  		if($sql_obj_result->fantasy_illegal == 1 || $sql_obj_result->fantasy_dominatrix == 1 || $sql_obj_result->fantasy_twogirls == 1 || $sql_obj_result->fantasy_twoguys == 1 || $sql_obj_result->besttrait == 4){
  			$Halo		= false;
  			$Horns	= true;
  		}else{
  			$Halo		= true;
  			$Horns	= false;				
  		}
  	// -----------------------------------------



		// determine HTTP --------------------------
		$_httpHost	= explode('.',$_SERVER['HTTP_HOST']);
		
		$_HTTP_ABS 	= false;
		
		if($_httpHost[0] == 'hookup'){

			$_HTTP_ABS =  'http://'.$_httpHost[1].'.'.$_httpHost[2];

		}else{
  		if($_SERVER['HTTPS'] == 'on'){
  			$_HTTP =  'https://'.$this->SiteDomain;
  		}else{
  			if($this->Decrypt($Viewers_UserID, 'private') == 999999){
  				$_HTTP =  'https://'.$this->SiteDomain;
  			}else{
  				$_HTTP =  'http://'.$this->SiteDomain;
  			}
  		}
		}
		// -------------------------------------



		if($Mode == false){


  		// 50x50 thumbnail =========================================================================================================
  		if($Type == 1){


    		// Final Border Color Assignment -------------
    		if($Explicit_Border_Color != false){
    			$BorderColor_FINAL 	= $Explicit_Border_Color;
    			$BorderSize_FINAL		=	'1px';
    			$BorderStyle_FINAL	=	'solid';
    		
    		}elseif($VIPMember == true){
    			$BorderColor_FINAL 	= $Special_Border_Color;
    			$BorderSize_FINAL		=	'2px';
    			$BorderStyle_FINAL	=	'dashed';
    
    
    		}elseif($VerifiedMember == true){
    			$BorderColor_FINAL 	= $Verified_Border_Color;
    			$BorderSize_FINAL		=	'2px';
    			$BorderStyle_FINAL	=	'solid';
    			
    		}elseif($Horns == true){
    			$BorderColor_FINAL 	= '#ff0000;';
    			$BorderSize_FINAL		=	'1px';
    			$BorderStyle_FINAL	=	'solid';
    
    		}else{
    			$BorderColor_FINAL 	= $Halo_Border_Color;
    			$BorderSize_FINAL		=	'1px';
    			$BorderStyle_FINAL	=	'solid';
    		}
    		// -------------------------------------------






					// thumbnail containter ----------------
          ?>
          	<div name="thumbnail-container" style="z-index: 1; <? echo ($GraphicsMode == 1 ? 'margin-top: 60px;':'margin-top: 0px;'); ?> border: <? echo $BorderSize_FINAL; ?> <? echo $BorderStyle_FINAL; ?> #<? echo $BorderColor_FINAL; ?> width: 50px; height: 50px; position: relative; background-color: <? echo ($VIPMember == true ? $VIP_Background_Color : ($Horns == true ? $Horns_Background_Color:$Halo_Background_Color)); ?>">
          <?
          // -------------------------------------


					// anchor tag --------------------------
						echo '<a href="'.$_HTTP.'/ViewProfile-'.$this->Encrypt($ImageOwner_UserID).'">';
					// -------------------------------------




					// determine image to display ==========================================================
					if($sql_obj_result->setting_discreet == 1 && $FriendStatus != 'friend.accepted'){
						
						// discreet image ----------------------------
						switch($sql_obj_result->gender){
							case 1:
								echo '<img src="'.$_HTTP_ABS.'/common/img/default/discreet_50x50_m.jpg" border="0"></a>';
							break;
							case 2:
								echo '<img src="'.$_HTTP_ABS.'/common/img/default/discreet_50x50_f.jpg" border="0"></a>';
							break;
						}
						// -------------------------------------------

					}else{

						// if no image set to avatar >> show default -
						if(!$sql_obj_result->imageid){
							echo '<img src="'.$_HTTP_ABS.'/common/img/default/50x50-no-added-photo-yet.gif" border="0"></a>';
						}else{

  						// ensure avatar image is approved ---------
  						if($sql_obj_result->approved != 1){
								
								// pending image -----------------------
								switch($sql_obj_result->gender){
									case 1:
										echo '<img src="'.$_HTTP_ABS.'/common/img/default/pending_50x50_m.jpg" border="0"></a>';
									break;
									case 2:
										echo '<img src="'.$_HTTP_ABS.'/common/img/default/pending_50x50_f.jpg" border="0"></a>';
									break;
								}
								// -------------------------------------

							}else{

  							// check Image against current Nudity Mode
  							if($NudityMode == 0 && $sql_obj_result->rating == 1){
  
  								// restricted image --------------------
  								switch($sql_obj_result->gender){
  									case 1:
  										echo '<img src="'.$_HTTP_ABS.'/common/img/default/restricted_50x50_m.jpg" border="0"></a>';
  									break;
  									case 2:
  										echo '<img src="'.$_HTTP_ABS.'/common/img/default/restricted_50x50_f.jpg" border="0"></a>';
  									break;
  								}
  								// -------------------------------------
  
  							}else{
  								echo '<img src="'.$_HTTP_ABS.'/media/img_microthumb/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" border="0">';
  							}
							}
						}
					}
					// =========================================================

					echo '</a>';
					echo '</div>';
					// =====================================================================================================================


/*
  			if($sql_obj_result){
  				echo '<a href="ViewProfile-'.$this->Encrypt($UserID).'"><img src="http://'.$this->SiteDomain.'/media/img_microthumb/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" border="0"></a>';
  			}else{
  				echo '<a href="ViewProfile-'.$this->Encrypt($UserID).'"><img src="http://friendsnflings.com/common/img/default/50x50-no-added-photo-yet.gif" border="0"></a>';
  			}

*/





			// 100x100 thumbnail =======================================================================================================
  		}elseif($Type == 2){


    		// Final Border Color Assignment -------------
    		if($Explicit_Border_Color != false){
    			$BorderColor_FINAL 	= $Explicit_Border_Color;
    			$BorderSize_FINAL		=	'1px';
    			$BorderStyle_FINAL	=	'solid';
    		
    		}elseif($VIPMember == true){
    			$BorderColor_FINAL 	= $Special_Border_Color;
    			$BorderSize_FINAL		=	'2px';
    			$BorderStyle_FINAL	=	'dashed';
    
    
    		}elseif($VerifiedMember == true){
    			$BorderColor_FINAL 	= $Verified_Border_Color;
    			$BorderSize_FINAL		=	'2px';
    			$BorderStyle_FINAL	=	'solid';
    			
    		}elseif($Horns == true){
    			$BorderColor_FINAL 	= $Horns_Border_Color;
    			$BorderSize_FINAL		=	'1px';
    			$BorderStyle_FINAL	=	'solid';
    
    		}else{
    			$BorderColor_FINAL 	= $Halo_Border_Color;
    			$BorderSize_FINAL		=	'1px';
    			$BorderStyle_FINAL	=	'solid';
    		}
    		// -------------------------------------------




					// thumbnail containter ----------------
          ?>
          	<div name="thumbnail-container" style="z-index: 1; <? echo ($GraphicsMode == 1 ? 'margin-top: 60px;':'margin-top: 0px;'); ?> border: <? echo $BorderSize_FINAL; ?> <? echo $BorderStyle_FINAL; ?> <? echo $BorderColor_FINAL; ?> width: 100px; height: 100px; position: relative; background-color: <? echo ($VIPMember == true ? $VIP_Background_Color : ($Horns == true ? $Horns_Background_Color:$Halo_Background_Color)); ?>">

						<!-- verified photo icon -->
						<div name="profile-bling-lower-lft-corner" style="position: absolute; left: -15px; top: -15px; border: 0px solid #fff; width: 55px; height: 54px; z-index: 900;">
							<? echo ($VerifiedMember == true ? '<img src="/common/img/icons/icon_verified_photos.png" border="0" />':''); ?>
						</div>
						<!-- END verified photo icon -->



          <?
          // -------------------------------------




					// anchor tag --------------------------
					echo '<a href="'.$_HTTP.'/ViewProfile-'.$this->Encrypt($ImageOwner_UserID).'">';


					// graphics mode -----------------------
					if($GraphicsMode == 1){
  				
  					// halo ----------------------------------
  					if($Halo == true){
  						?>
  						<!-- halo -->
  						<div name="profile-container_halohorns" style="border: 0px solid #ffffff; width: 127px; height: 64px; position: absolute; left: -10px; top: -54px; z-index: 6;">
  							
  								<img src="/common/img/bling/halo/halo3.png" border="0" alt="Horns" title="Horns" />

  						</div>
  						<?
  					// horns ---------------------------------
  					}elseif($Horns	== true){
  						?>
  						<!-- horns -->
  						<div name="profile-container_halohorns" style="border: 0px solid #ffffff; width: 127px; height: 64px; position: absolute; left: -19px; top: -66px; z-index: 5;">

  								<img src="/common/img/bling/horns/horns1.png" border="0" alt="Horns" title="Horns" />

  						</div>
  						<?
  					}
  					// -------------------------------------

					}
					// =====================================================================================================================



					// determine image to display ==========================================================
					if($sql_obj_result->setting_discreet == 1 && $FriendStatus != 'friend.accepted'){
						
						// discreet image ----------------------------
						switch($sql_obj_result->gender){
							case 1:
								echo '<img src="'.$_HTTP_ABS.'/common/img/default/discreet_100x100_m.jpg" width="100" height="100" border="0" alt="Discreet Profile Image" title="Discreet Profile Image" /></a>';
							break;
							case 2:
								echo '<img src="'.$_HTTP_ABS.'/common/img/default/discreet_100x100_f.jpg" width="100" height="100" border="0" alt="Discreet Profile Image" title="Discreet Profile Image" /></a>';
							break;
						}
						// -------------------------------------------

					}else{

						// if no image set to avatar >> show default -
						if(!$sql_obj_result->imageid){
							echo '<img src="'.$_HTTP_ABS.'/common/img/default/100x100-no-added-photo-yet.gif" width="100" height="100" border="0" alt="No Profile Image Yet" title="No Profile Image Yet" /></a>';
						}else{

  						// ensure avatar image is approved ---------
  						if($sql_obj_result->approved != 1){
								
								// pending image -----------------------
								switch($sql_obj_result->gender){
									case 1:
										echo '<img src="'.$_HTTP_ABS.'/common/img/default/pending_100x100_m.jpg" width="100" height="100" border="0"></a>';
									break;
									case 2:
										echo '<img src="'.$_HTTP_ABS.'/common/img/default/pending_100x100_f.jpg" width="100" height="100" border="0"></a>';
									break;
								}
								// -------------------------------------

							}else{

  							// check Image against current Nudity Mode
  							if($NudityMode == 0 && $sql_obj_result->rating == 1){
  
  								// restricted image --------------------
  								switch($sql_obj_result->gender){
  									case 1:
  										echo '<img src="'.$_HTTP_ABS.'/common/img/default/restricted_100x100_m.jpg" width="100" height="100" border="0" alt="R Rated Profile Image" title="R Rated Profile Image" /></a>';
  									break;
  									case 2:
  										echo '<img src="'.$_HTTP_ABS.'/common/img/default/restricted_100x100_f.jpg" width="100" height="100" border="0" alt="R Rated Profile Image" title="R Rated Profile Image" /></a>';
  									break;
  								}
  								// -------------------------------------
  
  							}else{
  								echo '<img src="'.$_HTTP_ABS.'/media/img_thumb/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" width="100" height="100" border="0" alt="Profile Image" title="Profile Image" />';
  							}
							}
						}
					}
					// =========================================================

					echo '</a>';
					echo '</div>';
			// =========================================================================================================================







			// LARGE thumbnail =========================================================================================================
  		}elseif($Type == 3){

					// determine image to display ==========================================================
					if($sql_obj_result->setting_discreet == 1 && $FriendStatus != 'friend.accepted'){
						
						// discreet image ----------------------------
						switch($sql_obj_result->gender){
							case 1:
								echo '<img src="/common/img/default/discreet_300x300_m.jpg" border="0" alt="Discreet Profile Image" title="Discreet Profile Image" /></a>';
							break;
							case 2:
								echo '<img src="/common/img/default/discreet_300x300_f.jpg" border="0" alt="Discreet Profile Image" title="Discreet Profile Image" /></a>';
							break;
						}
						// -------------------------------------------

					}else{

						// if no image set to avatar >> show default -
						if(!$sql_obj_result->imageid){
							echo '<img src="/common/img/default/no-added-photo-yet.jpg" border="0" alt="No Profile Image Yet" title="No Profile Image Yet" /></a>';
						}else{

  						// ensure avatar image is approved ---------
  						if($sql_obj_result->approved != 1){
								
								// pending image -----------------------
								switch($sql_obj_result->gender){
									case 1:
										echo '<img src="/common/img/default/pending_300x300_m.jpg" border="0" alt="Pending Profile Image" title="Pending Profile Image" /></a>';
									break;
									case 2:
										echo '<img src="/common/img/default/pending_300x300_f.jpg" border="0" alt="Pending Profile Image" title="Pending Profile Image" /></a>';
									break;
								}
								// -------------------------------------

							}else{

  							// check Image against current Nudity Mode
  							if($NudityMode == 0 && $sql_obj_result->rating == 1){
  
  								// restricted image --------------------
  								switch($sql_obj_result->gender){
  									case 1:
  										echo '<img src="/common/img/default/restricted_300x300_m.jpg" border="0" alt="R Rated Profile Image" title="R Rated Profile Image" /></a>';
  									break;
  									case 2:
  										echo '<img src="/common/img/default/restricted_300x300_f.jpg" border="0" alt="R Rated Profile Image" title="R Rated Profile Image" /></a>';
  									break;
  								}
  								// -------------------------------------
  
  							}else{
  								echo '<img src="/media/img_profile/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" border="0" alt="Profile Image" title="Profile Image" />';
  							}
							}
						}
					}

			// =========================================================================================================================





			// Full Size Image =========================================================================================================
  		}elseif($Type == 4){
  			echo '<img src="/media/img_gallery/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" border="0" alt="Profile Image" title="Profile Image" />';
  		}
			// =========================================================================================================================

		}elseif($Mode == true || $sql_obj_result == true){
			$_return = true;
		}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);



	 return $_return;
	}
	// =================================================================












	// METHOD :: ZIPCodeLookup =========================================
	public function ZIPCodeLookup($ZIPCode, $Distance){

		//require("/var/www/vhosts/egenhq.com/httpdocs/common/class/class.zipcode.php");

		$ZipCodeArray	= array();

		if(!$obj_ZIPCode){
			$obj_ZIPCode 	= new zipcode_class;
		}


    $result				= $obj_ZIPCode->get_zips_in_range($ZIPCode, $Distance, _ZIPS_SORT_BY_DISTANCE_ASC, true); 


    //if($zips === false){																						// Code left not cleaned out? NAB.02.28.09
    if($result === false){																						// MOD.02.28.09.NAB
    	//echo 'Error: '.$obj_ZIPCode->last_error;											// MOD.02.28.09.NAB
    }else{
    	 $__counter = 0;
       foreach($result as $key => $value){
       		
       		$ZipCodeArray[$__counter] = $key;
       		$__counter++;
          //echo "Zip code <b>$key</b> is <b>$value</b> miles away from <b>$ZIPCode</b>.<br />";
          //echo $key.'<br>';
       }
    } 



	 return $ZipCodeArray;
	}
	// =================================================================









/*



	// METHOD :: PromoReport ===========================================
	public function PromoReport($Property, $Zipcode, $Gender = 2, $Parameters = 0){



//print_r($Parameters);


		// set minimum number of thumbnails ----------
		if($Parameters->thumbs_num < 4){
			$Parameters->thumbs_num = 4;
		}
		// -------------------------------------------

		$_return					= false;






    //report type --------------------------------
    switch($Property){



    	// -------------------------------------------------------------
    	case 'friendsnflings.com':

				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1, $Property);  //read operation
				// -------------------------------------------

    		$_expiration	=	time() - 2400;


    		// gender seeking definition -----------------
    		$__SELECT_s1	=	null;
    		$__SELECT_s2	=	null;
    		$__SELECT_s3	=	null;
    		$__SELECT_s4	=	null;


    			//if($key == 0 & $value == 1){ echo 'Seeking Men';}
    			if($Gender == 1){ $__SELECT_s1	= "'1', "; }
    			
    			//if($key == 1 & $value == 1){ echo 'Seeking Women';}
    			if($Gender == 2){ $__SELECT_s2	= "'2', "; }
    			
    			//if($key == 2 & $value == 1){ echo 'Seeking Trannies';}
    			if($Gender == 3){ $__SELECT_s3	= "'3', "; }
    			
    			//if($key == 3 & $value == 1){ echo 'Seeking Couples';}
    			if($Gender == 4){ $__SELECT_s4	= "'4' "; }

    		
    		$_SELECT_sMASTER	=	$__SELECT_s1.$__SELECT_s2.$__SELECT_s3.$__SELECT_s4;
    		$_SELECT_sMASTER	= preg_replace('/[\s]?,[\s]?$/i','',$_SELECT_sMASTER);




    		// zipcode/geocode definition ======================================
    		$ziparray = $this->ZIPCodeLookup($Zipcode, '250');


    		if(!$ziparray){
    			$ziparray = $this->ZIPCodeLookup($Zipcode, '450');
    		}

    		if(!$ziparray){
    			$ziparray = $this->ZIPCodeLookup($Zipcode, '1500');
    		}

    		if(!$ziparray){
    			$ziparray = $this->ZIPCodeLookup(85254, '250');
    		}



    		$__SELECT_zMASTER	= null;
    		$__ArrayCount			=	count($ziparray);

    		foreach($ziparray as $key => $value){
       		$__SELECT_zMASTER	.=	'\''.$value.'\''.($__ArrayCount == $key+1 ? ' ':', ');
    		}
    		// =================================================================

/*

working dynamic query - pasted from search page

		// Get Record Total --------------------------------------------------------
    $_SELECT_MASTER		=	"
    SELECT count(*)
    FROM user U
    ".$__SELECT_ProfileWPics."
    INNER JOIN user_profile_specs UPS ON ".$_SELECT_gMASTER." UPS.tsdob <= ".$__SELECT_a1." AND UPS.tsdob >= ".$__SELECT_a2." AND
    	(".$_SELECT_iMASTER.")
    	AND UPS.userid = U.userid
    WHERE U.disabled != '1' AND UPS.setting_disable != '1' ".$__SELECT_VerifiedPics." AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.") ".$__SELECT_onlineNow."
    GROUP BY U.userid ORDER BY U.ts_lastlogin DESC
    ";
*/

				$sql_query	= "
				SELECT U.* , UI.*, UPS.* 
				FROM user U 
				LEFT JOIN user_images UI ON UI.userid = U.userid AND UI.avatar = '1' 
				INNER JOIN user_profile_specs UPS ON UPS.seek_w = '1' AND UPS.seek_m = '1' AND (UPS.into_friends = '1' OR UPS.into_flirting = '1' OR UPS.into_relationship = '1' OR UPS.into_sex = '1' OR UPS.into_fetish = '1') 
				AND UPS.userid = U.userid 
				WHERE U.disabled != '1' AND UPS.setting_disable != '1' AND U.gender IN ('1','2') AND U.zipcode IN (".$__SELECT_zMASTER.") 
				GROUP BY U.userid 
				ORDER BY RAND(), U.ts_lastlogin DESC 
				LIMIT ".$Parameters->thumbs_num."
				";

    		$sql_result		= mysql_query($sql_query);
				$sql_num_rows	=	@mysql_num_rows($sql_result);



				//$_EnoughRoom	=	$Parameters->iframe_width / $Parameters->thumbs_num;



				// destroy database connection object --------
				$obj_db->Close();
				unset($obj_db);
				// -------------------------------------------

  			if($sql_num_rows){

    			$counter	=	0;
    			while( $sql_array_result	=	mysql_fetch_assoc($sql_result) ){
    				$ResultArray[$counter] = $sql_array_result;
    				$counter++;
    			}
    			
    			$counter	=	1;
    			echo '<table border="0" cellpadding="0" cellspacing="0" style="height: 170px; width: '.$Parameters->iframe_width.'; background-color:#'.$Parameters->bg_color.'; "><tr>';


      		foreach($ResultArray as $key => $value){
      			echo '<td align="center" valign="top">';
      				echo '<table border="0" cellpadding="0" cellspacing="0" style="margin-bottom: 5px; margin-top: 5px;"><tr><td align="center" valign="top">';

        			if($sql_num_rows < 4){
        				//$this->ImageDisplay($value['userid'], 2, 1, false, 0);
        				$this->ImageDisplayPromo($value['userid'], 1, 1, false, true, false, $Property, false);
        			}else{
        				//$this->ImageDisplay($value['userid'], 1, 1, false, 0);
        				$this->ImageDisplayPromo($value['userid'], 2, 1, false, true, (!$Parameters->thumbs_border_color ? false:$Parameters->thumbs_border_color), $Property, false);
        			}

      				echo '</a>';
      				echo '</td></tr><tr><td align="center">';
      				echo ($sql_num_rows < 4 ? '<center><font face="arial" size="4" color="'.$Parameters->link_color.'">':'<font face="arial" size="4" color="'.$Parameters->link_color.'">').$this->_stringShorten(ucwords($value['username']),14,'').'</font></center>';







								// age --------------------------------
								echo '<div style="position: relative; border: 0px solid #ffffff; height: 14px; padding: 0px; top: 1px; text-align: middle; align: middle; width: 100px;"><font style="font-family: arial; font-size: 12px; color: #'.$Parameters->text_color.';"><b>Age:</b>&nbsp;&nbsp;';
									//dob zipcode ts_lastaction
									echo (date(Y,time()) - date(Y, $value['dob']));
									echo '</font>';
								echo '</div>';
								// END age ----------------------------


								// location ---------------------------
								echo '<div style="position: relative; border: 0px solid #ffffff; height: 14px; padding: 0px; top: 1px; text-align: middle; align: middle; width: 120px;"><font style="font-family: arial; font-size: 10px; color: #'.$Parameters->text_color.';">';
									//dob zipcode ts_lastaction
									//echo (date(Y,time()) - date(Y, $value['dob']));
									echo $this->GeoCodeLookup($value['zipcode'], $Mode = 'Preset');
									echo '</font>';
								echo '</b></div>';
								// END location -----------------------






/*								
								// turn ons --------------------------------
								echo '<div style="position: relative; border: 0px solid #000000; height: 14px; padding: 0px; top: -2px; text-align: left; align: left; width: 130px;"><font style="font-family: arial; font-size: 10px; color: #'.$Parameters->text_color.';"><b>Turn-Ons:</b> ';

								

									
									$TurnonArray	=	array();
									
									switch($value['turnon_butt']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Butt </font>';
											array_push($TurnonArray, 'butt');
										break;
									}

									switch($value['turnon_legs']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Legs</font>';
											array_push($TurnonArray, 'legs');
										break;
									}

									switch($value['turnon_chest']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Chest </font>';
											array_push($TurnonArray, 'chest');
										break;
									}

									switch($value['turnon_hands']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Hands </font>';
											array_push($TurnonArray, 'hands');
										break;
									}

									switch($value['turnon_tan']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff">Tan</font>';
											array_push($TurnonArray, 'tan');
										break;
									}

									switch($value['turnon_mind']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff">Mind</font>';
											array_push($TurnonArray, 'mind');
										break;
									}

									switch($value['turnon_feet']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff">Feet</font>';
											array_push($TurnonArray, 'feet');
										break;
									}

									switch($value['turnon_askme']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff">Ask Me</font>';
											array_push($TurnonArray, 'ask me');
										break;
									}

									switch($value['turnon_hair']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff">Hair</font>';
											array_push($TurnonArray, 'hair');
										break;
									}

									switch($value['turnon_piercings']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff">Piercings</font>';
											array_push($TurnonArray, 'piercings');
										break;
									}

									switch($value['turnon_money']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Money </font>';
											array_push($TurnonArray, 'money');
										break;
									}

									switch($value['turnon_power']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Power </font>';
											array_push($TurnonArray, 'power');
										break;
									}

									switch($value['turnon_size']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Size </font>';
											array_push($TurnonArray, 'size');
										break;
									}

									switch($value['turnon_hardbody']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Hardbody </font>';
											array_push($TurnonArray, 'hardbody');
										break;
									}

									switch($value['turnon_mysecret']){
										case 1:
											//echo '<font style="font-size: 10px;" color="#4f68ff"> Secret </font>';
											array_push($TurnonArray, 'secret');
										break;
									}
								
								//print_r($TurnonArray);
								
								echo '<font style="font-size: 10px;" color="#4f68ff">';
									shuffle($TurnonArray);
									$turnon1	=	$TurnonArray[0];
									echo ucwords($turnon1);
									shuffle($TurnonArray);
									$turnon2	=	$TurnonArray[0];
									echo ($turnon2 && $turnon2 != $turnon1 ? ', '.ucwords($turnon2):'');
								echo '</font>';
								echo '</div>';
								// END turn ons ----------------------------




								// fantasies -------------------------------
								echo '<div style="position: relative; border: 1px solid #000000; height: 14px; padding: 0px; top: -3px; text-align: left; align: left; width: 130px;"><font style="font-size: 10px; color: #'.$Parameters->text_color.'; line-height: -5px;"><b>Fantasy:</b> ';

									
									$FantasyArray	=	array();

									switch($value['fantasy_twogirls']){
										case 1:
											array_push($FantasyArray, '2 girls');
										break;
									}

									switch($value['fantasy_twoguys']){
										case 1:
											array_push($FantasyArray, '2 guys');
										break;
									}

									switch($value['fantasy_public']){
										case 1:
											array_push($FantasyArray, 'public');
										break;
									}

									switch($value['fantasy_boat']){
										case 1:
											array_push($FantasyArray, 'boat');
										break;
									}

									switch($value['fantasy_dominatrix']){
										case 1:
											array_push($FantasyArray, 'dom');
										break;
									}

									switch($value['fantasy_beach']){
										case 1:
											array_push($FantasyArray, 'beach');
										break;
									}

									switch($value['fantasy_outdoors']){
										case 1:
											array_push($FantasyArray, 'outdoors');
										break;
									}

									switch($value['fantasy_askme']){
										case 1:
											array_push($FantasyArray, 'ask me');
										break;
									}

									switch($value['fantasy_toys']){
										case 1:
											array_push($FantasyArray, 'toys');
										break;
									}

									switch($value['fantasy_illegal']){
										case 1:
											array_push($FantasyArray, 'illegal');
										break;
									}

								echo '<font style="font-size: 10px;" color="#4f68ff">';
									shuffle($FantasyArray);
									$fantasy1	=	$FantasyArray[0];
									echo (!$fantasy1 ? 'Not Telling':ucwords($fantasy1));
									shuffle($FantasyArray);
									$fantasy2	=	$FantasyArray[0];
									echo ($fantasy2 && $fantasy2 != $fantasy1 ? ', '.ucwords($fantasy2):'');
								echo '</font>';
								echo '</div>';
								// END turn ons ----------------------------
*/

      				
      				echo '</td></tr></table>';
      			echo '</td>';
      			echo ($counter == 7 ? '</tr><tr>':'');
      			$counter++;
      		}
      		echo '</table>';
    		}else{
    			echo '<div style="background-color: #000000; left: 10px; top: 70px; position: relative; border: 4px solid #ffffff; width: 400px; height: 50px; align: center; text-align: center;"><table height="100%" width="100%"><tr><td> <font style="font-size: 22px;" color="#ff9000"><b>No Matches Found</b></font></td></tr></table> </div>';
    		}

    	break;
    	// -------------------------------------------------------------


    }
    // -------------------------------------------




		//$sql_num_rows			=	mysql_num_rows($sql_result);

		




	return $_return;
	}
	// =================================================================







	// METHOD :: ImageDisplay_2 ===========================================
	
	/*
	NOTES:  Looks Up image, with Viewer and Owners settings in mind
		e.g. If Discreet, and doesn't show unless on Friend List.
	*/
	
	public function ImageDisplayPromo($ImageOwner_UserID, $Type, $Avatar = 0, $Mode = false, $GraphicsModeOverride = false, $BorderExplicit = false, $Property = null, $NudityMode = false){


		$_return								= false;

		$Explicit_Border_Color	= $BorderExplicit;

		$Halo_Background_Color	=	'#ffffff;';
		$Halo_Border_Color			=	'#ffffff;';
		$Halo_Font_Color				=	'#000000;';
		
		$Horns_Background_Color	=	'#000000;';
		$Horns_Border_Color			=	'#000000;';
		$Horns_Font_Color				=	'#ffffff;';
		
		$Discreet_Border_Color	=	'#000000;';

		
		// check for VIP/Special Member Status -----------------		
		if($this->GetStatus($ImageOwner_UserID, 'special') == true){
			$VIPMember = true;
		}
		$Special_Border_Color		=	'#ffa500;';
		// -----------------------------------------------------


		// check for Verified Member Status --------------------
		if($this->GetStatus($ImageOwner_UserID, 'verified photos') == true){
			$VerifiedMember = true;
		}
		$Verified_Border_Color	=	'#2dd017;';
		// -----------------------------------------------------



		//$FriendStatus						= $this->GetFriendStatus($ImageOwner_UserID, $Viewers_UserID);


		// get mode & friend list of viewer query ----
		//$this->GetMemberProfile_Settings($Viewers_UserID);
		// -------------------------------------------


		// database connection -----------------------
		$obj_db						= new db;
		
		if($Property != null){
			$obj_db->Connect(1, $Property);  //read operation	
		}else{
			$obj_db->Connect(1);  //read operation	
		}
		// -------------------------------------------

/*
		// viewer graphics settings ------------------
		$sql_settings							= mysql_query("SELECT UPS.setting_nudity, UPS.setting_graphics FROM user_profile_specs UPS WHERE userid = '$Viewers_UserID'");
		$sql_settings_obj_result	=	mysql_fetch_object($sql_settings);
		
		
		if($sql_settings_obj_result->setting_nudity){
			$NudityMode	=	true;
		}else{
			$NudityMode	=	false;	
		}

		if($sql_settings_obj_result->setting_graphics){
			$GraphicsMode	=	true;
		}else{
			$GraphicsMode	=	false;	
		}
		// -------------------------------------------

		// graphics mode override --------------------
		if($GraphicsModeOverride == true && $GraphicsMode	==	true){
			$GraphicsMode	= false;
		}
		// -------------------------------------------
*/


		// image query -------------------------------
		$_select_avatar	= "
		SELECT UI.*, U.*, UPS.*
		FROM user_images UI, user U
		INNER JOIN user_profile_specs UPS ON UPS.userid = '$ImageOwner_UserID'
		WHERE UI.userid = '$ImageOwner_UserID' AND U.userid = '$ImageOwner_UserID' AND UI.avatar = '1'
		";

		$_select_noavatar	= "
		SELECT UI.*, U.*, UPS.*
		FROM user_images UI, user U
		INNER JOIN user_profile_specs UPS ON UPS.userid = '$ImageOwner_UserID'
		WHERE UI.userid = '$ImageOwner_UserID' AND U.userid = '$ImageOwner_UserID'
		";

		if($Avatar == 1){
			$sql_img					= mysql_query($_select_avatar);
		}else{
			$sql_img					= mysql_query($_select_noavatar);
		}
			$sql_obj_result		=	mysql_fetch_object($sql_img);
		// -------------------------------------------




//print_r($sql_obj_result);
//die();

  	// halo or horns ===========================
  		// properties ----------------------------
  		$Halo		= null;
  		$Horns	= null;
  
  		if($sql_obj_result->fantasy_illegal == 1 || $sql_obj_result->fantasy_dominatrix == 1 || $sql_obj_result->fantasy_twogirls == 1 || $sql_obj_result->fantasy_twoguys == 1 || $sql_obj_result->besttrait == 4){
  			$Halo		= false;
  			$Horns	= true;
  		}else{
  			$Halo		= true;
  			$Horns	= false;				
  		}
  	// -----------------------------------------



		// determine HTTP --------------------------
/*
		$_httpHost	= explode('.',$_SERVER['HTTP_HOST']);
		
		$_HTTP_ABS 	= false;
		
		if($_httpHost[0] == 'hookup'){

			$_HTTP_ABS =  'http://'.$_httpHost[1].'.'.$_httpHost[2];

		}else{
  		if($_SERVER['HTTPS'] == 'on'){
  			$_HTTP =  'https://'.$this->SiteDomain;
  		}else{
  			if($this->Decrypt($Viewers_UserID, 'private') == 999999){
  				$_HTTP =  'https://'.$this->SiteDomain;
  			}else{
  				$_HTTP =  'http://'.$this->SiteDomain;
  			}
  		}
		}
*/
		
		$_HTTP =  'https://'.$Property;
		
		// -------------------------------------





		if($Mode == false){


  		// 50x50 thumbnail =========================================================================================================
  		if($Type == 1){


    		// Final Border Color Assignment -------------
    		if($Explicit_Border_Color != false){
    			$BorderColor_FINAL 	= $Explicit_Border_Color;
    			$BorderSize_FINAL		=	'1px';
    			$BorderStyle_FINAL	=	'solid';
    		
    		}elseif($VIPMember == true){
    			$BorderColor_FINAL 	= $Special_Border_Color;
    			$BorderSize_FINAL		=	'2px';
    			$BorderStyle_FINAL	=	'dashed';
    
    
    		}elseif($VerifiedMember == true){
    			$BorderColor_FINAL 	= $Verified_Border_Color;
    			$BorderSize_FINAL		=	'2px';
    			$BorderStyle_FINAL	=	'solid';
    			
    		}elseif($Horns == true){
    			$BorderColor_FINAL 	= '#ff0000;';
    			$BorderSize_FINAL		=	'1px';
    			$BorderStyle_FINAL	=	'solid';
    
    		}else{
    			$BorderColor_FINAL 	= $Halo_Border_Color;
    			$BorderSize_FINAL		=	'1px';
    			$BorderStyle_FINAL	=	'solid';
    		}
    		// -------------------------------------------






					// thumbnail containter ----------------
          ?>
          	<div name="thumbnail-container" style="z-index: 1; <? echo ($GraphicsMode == 1 ? 'margin-top: 60px;':'margin-top: 0px;'); ?> border: <? echo $BorderSize_FINAL; ?> <? echo $BorderStyle_FINAL; ?> #<? echo $BorderColor_FINAL; ?>; width: 50px; height: 50px; position: relative; background-color: <? echo ($VIPMember == true ? $VIP_Background_Color : ($Horns == true ? $Horns_Background_Color:$Halo_Background_Color)); ?>">
          <?
          // -------------------------------------


					// anchor tag --------------------------
						echo '<a href="'.$_HTTP.'/ViewProfile-'.$this->Encrypt($ImageOwner_UserID, $Property).'">';
					// -------------------------------------




					// determine image to display ==========================================================
					if($sql_obj_result->setting_discreet == 1){
						
						// discreet image ----------------------------
						switch($sql_obj_result->gender){
							case 1:
								echo '<img src="'.$_HTTP.'/common/img/default/discreet_50x50_m.jpg" border="0"></a>';
							break;
							case 2:
								echo '<img src="'.$_HTTP.'/common/img/default/discreet_50x50_f.jpg" border="0"></a>';
							break;
						}
						// -------------------------------------------

					}else{

						// if no image set to avatar >> show default -
						if(!$sql_obj_result->imageid){
							echo '<img src="'.$_HTTP.'/common/img/default/50x50-no-added-photo-yet.gif" border="0"></a>';
						}else{

  						// ensure avatar image is approved ---------
  						if($sql_obj_result->approved != 1){
								
								// pending image -----------------------
								switch($sql_obj_result->gender){
									case 1:
										echo '<img src="'.$_HTTP.'/common/img/default/pending_50x50_m.jpg" border="0"></a>';
									break;
									case 2:
										echo '<img src="'.$_HTTP.'/common/img/default/pending_50x50_f.jpg" border="0"></a>';
									break;
								}
								// -------------------------------------

							}else{

  							// check Image against current Nudity Mode
  							if($NudityMode == false && $sql_obj_result->rating == 1){
  
  								// restricted image --------------------
  								switch($sql_obj_result->gender){
  									case 1:
  										echo '<img src="'.$_HTTP.'/common/img/default/restricted_50x50_m.jpg" border="0"></a>';
  									break;
  									case 2:
  										echo '<img src="'.$_HTTP.'/common/img/default/restricted_50x50_f.jpg" border="0"></a>';
  									break;
  								}
  								// -------------------------------------
  
  							}else{
  								echo '<img src="'.$_HTTP.'/media/img_microthumb/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" border="0">';
  							}
							}
						}
					}
					// =========================================================

					echo '</a>';
					echo '</div>';
					// =====================================================================================================================


/*
  			if($sql_obj_result){
  				echo '<a href="ViewProfile-'.$this->Encrypt($UserID).'"><img src="http://'.$this->SiteDomain.'/media/img_microthumb/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" border="0"></a>';
  			}else{
  				echo '<a href="ViewProfile-'.$this->Encrypt($UserID).'"><img src="http://friendsnflings.com/common/img/default/50x50-no-added-photo-yet.gif" border="0"></a>';
  			}
*/





			// 100x100 thumbnail =======================================================================================================
  		}elseif($Type == 2){


    		// Final Border Color Assignment -------------
    		if($Explicit_Border_Color != false){
    			$BorderColor_FINAL 	= $Explicit_Border_Color;
    			$BorderSize_FINAL		=	'1px';
    			$BorderStyle_FINAL	=	'solid';
    		
    		}elseif($VIPMember == true){
    			$BorderColor_FINAL 	= $Special_Border_Color;
    			$BorderSize_FINAL		=	'2px';
    			$BorderStyle_FINAL	=	'dashed';
    
    
    		}elseif($VerifiedMember == true){
    			$BorderColor_FINAL 	= $Verified_Border_Color;
    			$BorderSize_FINAL		=	'2px';
    			$BorderStyle_FINAL	=	'solid';
    			
    		}elseif($Horns == true){
    			$BorderColor_FINAL 	= $Horns_Border_Color;
    			$BorderSize_FINAL		=	'1px';
    			$BorderStyle_FINAL	=	'solid';
    
    		}else{
    			$BorderColor_FINAL 	= $Halo_Border_Color;
    			$BorderSize_FINAL		=	'1px';
    			$BorderStyle_FINAL	=	'solid';
    		}
    		// -------------------------------------------




					// thumbnail containter ----------------
          ?>
          	<div name="thumbnail-container" style="z-index: 1; <? echo ($GraphicsMode == 1 ? 'margin-top: 60px;':'margin-top: 0px;'); ?> border: <? echo $BorderSize_FINAL; ?> <? echo $BorderStyle_FINAL; ?> #<? echo $BorderColor_FINAL; ?>; width: 100px; height: 100px; position: relative; background-color: <? echo ($VIPMember == true ? $VIP_Background_Color : ($Horns == true ? $Horns_Background_Color:$Halo_Background_Color)); ?>">

						<!-- verified photo icon -->
						<div name="profile-bling-lower-lft-corner" style="position: absolute; left: -15px; top: -15px; border: 0px solid #fff; width: 55px; height: 54px; z-index: 900;">
							<? echo ($VerifiedMember == true ? '<img src="/common/img/icons/icon_verified_photos.png" border="0" />':''); ?>
						</div>
						<!-- END verified photo icon -->



          <?
          // -------------------------------------




					// anchor tag --------------------------
					echo '<a href="'.$_HTTP.'/ViewProfile-'.$this->Encrypt($ImageOwner_UserID, 'public', $Property).'" target="_parent">';



					// graphics mode -----------------------
					if($GraphicsMode == 1){
  				
  					// halo ----------------------------------
  					if($Halo == true){
  						?>
  						<!-- halo -->
  						<div name="profile-container_halohorns" style="border: 0px solid #ffffff; width: 127px; height: 64px; position: absolute; left: -10px; top: -54px; z-index: 6;">
  							
  								<img src="/common/img/bling/halo/halo3.png" border="0" alt="Horns" title="Horns" />

  						</div>
  						<?
  					// horns ---------------------------------
  					}elseif($Horns	== true){
  						?>
  						<!-- horns -->
  						<div name="profile-container_halohorns" style="border: 0px solid #ffffff; width: 127px; height: 64px; position: absolute; left: -19px; top: -66px; z-index: 5;">

  								<img src="/common/img/bling/horns/horns1.png" border="0" alt="Horns" title="Horns" />

  						</div>
  						<?
  					}
  					// -------------------------------------

					}
					// =====================================================================================================================



					// determine image to display ==========================================================
					if($sql_obj_result->setting_discreet == 1){
						
						// discreet image ----------------------------
						switch($sql_obj_result->gender){
							case 1:
								echo '<img src="'.$_HTTP.'/common/img/default/discreet_100x100_m.jpg" width="100" height="100" border="0" alt="Discreet Profile Image" title="Discreet Profile Image" /></a>';
							break;
							case 2:
								echo '<img src="'.$_HTTP.'/common/img/default/discreet_100x100_f.jpg" width="100" height="100" border="0" alt="Discreet Profile Image" title="Discreet Profile Image" /></a>';
							break;
						}
						// -------------------------------------------

					}else{

						// if no image set to avatar >> show default -
						if(!$sql_obj_result->imageid){
							echo '<img src="'.$_HTTP.'/common/img/default/100x100-no-added-photo-yet.gif" width="100" height="100" border="0" alt="No Profile Image Yet" title="No Profile Image Yet" /></a>';
						}else{

  						// ensure avatar image is approved ---------
  						if($sql_obj_result->approved != 1){
								
								// pending image -----------------------
								switch($sql_obj_result->gender){
									case 1:
										echo '<img src="'.$_HTTP.'/common/img/default/pending_100x100_m.jpg" width="100" height="100" border="0"></a>';
									break;
									case 2:
										echo '<img src="'.$_HTTP.'/common/img/default/pending_100x100_f.jpg" width="100" height="100" border="0"></a>';
									break;
								}
								// -------------------------------------

							}else{

  							// check Image against current Nudity Mode
  							if($NudityMode == 0 && $sql_obj_result->rating == 1){
  
  								// restricted image --------------------
  								switch($sql_obj_result->gender){
  									case 1:
  										echo '<img src="'.$_HTTP.'/common/img/default/restricted_100x100_m.jpg" width="100" height="100" border="0" alt="R Rated Profile Image" title="R Rated Profile Image" /></a>';
  									break;
  									case 2:
  										echo '<img src="'.$_HTTP.'/common/img/default/restricted_100x100_f.jpg" width="100" height="100" border="0" alt="R Rated Profile Image" title="R Rated Profile Image" /></a>';
  									break;
  								}
  								// -------------------------------------
  
  							}else{
  								echo '<img src="'.$_HTTP.'/media/img_thumb/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" width="100" height="100" border="0" alt="See More of '.ucwords($sql_obj_result->username).'\'s Photos" title="See More of '.ucwords($sql_obj_result->username).'\'s Photos" />';
  							}
							}
						}
					}
					// =========================================================

					echo '</a>';
					echo '</div>';
			// =========================================================================================================================







			// LARGE thumbnail =========================================================================================================
  		}elseif($Type == 3){

					// determine image to display ==========================================================
					if($sql_obj_result->setting_discreet == 1){
						
						// discreet image ----------------------------
						switch($sql_obj_result->gender){
							case 1:
								echo '<img src="/common/img/default/discreet_300x300_m.jpg" border="0" alt="Discreet Profile Image" title="Discreet Profile Image" /></a>';
							break;
							case 2:
								echo '<img src="/common/img/default/discreet_300x300_f.jpg" border="0" alt="Discreet Profile Image" title="Discreet Profile Image" /></a>';
							break;
						}
						// -------------------------------------------

					}else{

						// if no image set to avatar >> show default -
						if(!$sql_obj_result->imageid){
							echo '<img src="/common/img/default/no-added-photo-yet.jpg" border="0" alt="No Profile Image Yet" title="No Profile Image Yet" /></a>';
						}else{

  						// ensure avatar image is approved ---------
  						if($sql_obj_result->approved != 1){
								
								// pending image -----------------------
								switch($sql_obj_result->gender){
									case 1:
										echo '<img src="/common/img/default/pending_300x300_m.jpg" border="0" alt="Pending Profile Image" title="Pending Profile Image" /></a>';
									break;
									case 2:
										echo '<img src="/common/img/default/pending_300x300_f.jpg" border="0" alt="Pending Profile Image" title="Pending Profile Image" /></a>';
									break;
								}
								// -------------------------------------

							}else{

  							// check Image against current Nudity Mode
  							if($NudityMode == 0 && $sql_obj_result->rating == 1){
  
  								// restricted image --------------------
  								switch($sql_obj_result->gender){
  									case 1:
  										echo '<img src="/common/img/default/restricted_300x300_m.jpg" border="0" alt="R Rated Profile Image" title="R Rated Profile Image" /></a>';
  									break;
  									case 2:
  										echo '<img src="/common/img/default/restricted_300x300_f.jpg" border="0" alt="R Rated Profile Image" title="R Rated Profile Image" /></a>';
  									break;
  								}
  								// -------------------------------------
  
  							}else{
  								echo '<img src="/media/img_profile/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" border="0" alt="Profile Image" title="Profile Image" />';
  							}
							}
						}
					}

			// =========================================================================================================================





			// Full Size Image =========================================================================================================
  		}elseif($Type == 4){
  			echo '<img src="/media/img_gallery/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" border="0" alt="Profile Image" title="Profile Image" />';
  		}
			// =========================================================================================================================

		}elseif($Mode == true || $sql_obj_result == true){
			$_return = true;
		}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	 return $_return;
	}
	// =================================================================


*/





// END OF METHODS ------------------------------------------------------------------------


}
// END OF CLASS ========================================================================================================






















// Example Arrays for Testing Usage ====================================================================================


/*



*/

?>