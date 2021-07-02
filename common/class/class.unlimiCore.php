<?php

// --------------------------------------------------------------------------------------------------------------------------------
// Author: 	Nathaniel Adam Briggs @ Q1 - Q4 2008  - Current
// Contact:	accounts@syntheticmagic.com
// Owner:		eGenerations Network, Inc. | syntheticMagic Advanced Business Services
// Client:	SM Clients
// Class:		unlimiCore
// Version:	Release 2.1
// Method:	example()
// Purpose:	Handle all Member/Core Operations
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

interface unlimiCoreInterface {

	// Core Commands ---------------------------------------------------
	public function Initiate($Command, $Domain);
	public function Authenticate($UserArray);
	public function Logout($UserArray);
	public function Create($NewUserArray);
	public function Activate($UserIDEncrypted, $PasswordEncrypted);	
	public function SendActivationEmail($UserID, $EmailAddress = 0, $UserPassword = 0);

	// TopNav Header Operations ----------------------------------------
	public function TopNavConfiguration($PromoLanderIdent, $Property, $SearchType = 'id', $Gender = '1');

	// Member Utilities ------------------------------------------------
	public function GetPassword($MemberEmailAddress);
	public function GeteMailAddr($UserID);
	public function GetStatus($UserID, $State);
	public function GetStatus_R2($UserID);
	public function GetMemberZIPCode($UserID);
	public function GetIMStatus($UserID);
	public function GetGiftBoxData($UserID);
	public function GetMemberPromocode($UserID);
	public function GetMemberAffPromoID($UserID);
	
	// Profile Operations ----------------------------------------------
	public function GetMemberProfile($MemberID);
	public function GetMemberProfile_Defined($MemberID);
	public function GetMemberProfile_Settings($MemberID);
	public function GetMemberLastSearch($MemberID, $Gender);
	public function MemberProfileAction($MemberID, $ProfileMemberID, $Action = 'default');
	public function RandomAnswersForEmpties($BaseEntry, $Type = 'profile_feature');
	public function BasicProfileReminder($MemberID);


	// Reports ---------------------------------------------------------
	public function Report($UserID, $Type, $Parameters = 0, $Option = 0, $Color = null);
	public function PromoReport($Type, $Zipcode, $Gender = 1, $Parameters = 0);
	public function Browse($Type, $Zipcode = 0, $Parameters = 0);

	// Mail Operations -------------------------------------------------
	public function CheckMemberMail($UserID, $Mode, $Status, $ConversationID = 0);
	public function CheckForUnreadMail($MailOwner_UserID, $ConversationID, $Mode);
	public function SendeMail($eMailAddr, $FromUser, $Subject, $Message);
	public function CheckNotificationStatus($UserID);
	public function GetUserReadRate($UserID);
	public function GetUserReplyRate($UserID);

	// IM Operations ---------------------------------------------------
	public function IMRequest($SenderID, $RecipientID, $SessionID);
	public function IMRequest_R2($RecipientUserID_ENCRYPTED_PUBLIC, $RequesterUserID_ENCRYPTED_PRIVATE);

	public function IMAccept($RecipientID, $SessionID);
	public function GetIMSession($SessionID);

	
	

	// Friend Operations -----------------------------------------------
	public function AddRemoveBlockFriend($OwnerID, $FriendID, $Command);
	public function GetFriendStatus($FriendUserID, $OwnerID);
	public function CheckPendingFriendRequests($UserID, $RequestingUserID);

	// Utilities -------------------------------------------------------
	//public function Encrypt($PlainText, $Cipher = 'public');
	public function Encrypt($PlainText, $Cipher = 'public', $Property = null);
	//public function Decrypt($CipherText, $Cipher = 'public');
	public function Decrypt($CipherText, $Cipher = 'public', $Property = null);
	public function ZIPCodeLookup($ZIPCode, $Distance);
	public function GeoCodeLookup($ZIPCode, $Mode = 'Preset');
	public function FilterRawInput($RawInput);
	public function _stringShorten($Input, $NumCharacters, $EndString = '...');
	public function GenerateRandomString($Length = 5);



	// Payment & Product -----------------------------------------------
	public function VerifyMemberPaid($UserID);
	public function ProcessUpgrade($UserArray, $PaymentArray, $Bypass = 'no');
	public function ActiveMemberPromocode($UserID);
	public function GetProducts($Type, $Property);
	public function GetProductByID($ProductID);
	public function GetTransaction($TransactionID, $UserID);
	public function PaymentGateway($PaymentArray);
	public function PaymentGateway_r2($PaymentArray);
	public function GetUpgradeReferrer($TransactionID, $UserID);


	// Affiliate & Promocode -------------------------------------------
	public function PromocodeLookup($Promocode, $Referrer = 'none');
	public function VerifyAffiliateID($AdID);
	public function GetDefaultPromoID($PropertyID);
	public function RecordAdClick($AdID_Decrypted, $AdSessionID = null);
	public function RecordAdImpression($AdID_Decrypted, $AssetID = null);
	public function AffAdPromocodeLookup($PromocodeID);
	public function PromoEditor($PromoID, $Command, $Parameter);
	public function GetAffiliatePromos($UserID);
	public function GetAffiliatePromoSpecifics($PromoID);
	public function VerifyAffiliatePromoOwnership($UserID, $PromoID);
	public function CreateAffiliatePromo($UserID_DECRYPTED, $Type = 'geo', $Property = 'friendsnflings.com', $Level = 'default', $PromoImgID = 'na');
	public function CreateAffiliatePromoPerformance($PromoID_DECRYPTED, $Type, $Range = false, $Option = false);
	public function GetAffiliateBlockedIPs($UserID_DECRYPTED);
	public function GetPromoPayoutRate($PromoID_DECRYPTED, $Type);
	public function	ComputePromoPayout($PayoutArray, $Amount);
	public function VerifyAffiliatePromoExists($UserID);
	public function GetPromoImgFilename($ID);
	public function GetAdSessionID($PromoID, $Mode = null);
	public function GetAdSessionData($AdSessionID);
	public function smartPromo($PromoID, $AssetID);


	// Imagery ---------------------------------------------------------
	public function ImageUpload($File, $ParentID, $Auto = 0);
	public function ImageResize($Image, $Type, $UserID);
	public function ImageDisplay($UserID, $Type, $Avatar = 0, $Mode = false, $ViewerNudityMode = 0);
	public function ImageDisplaySpecific($UserID, $ImageID, $Type, $Avatar = 0, $Mode = false, $ViewerNudityMode = 0);
	public function ImageGallery($Viewers_UserID, $ImageOwner_UserID, $Type, $Application, $ViewerNudityMode = 0);
	public function ImageDelete($ImageID, $UserID);
	public function ImagePrimary($ImageID, $UserID);
	public function ImageDisplay_2($Viewers_UserID, $ImageOwner_UserID, $Type, $Avatar = 0, $Mode = false, $GraphicsModeOverride = false, $BorderExplicit = false);
	public function VerificationImageUpload($File, $ParentID, $Auto = 0);
	public function GetNumImages($OwnerID);
	public function GetNumImages_r2($UserID);

	// ADMINSTRATIVE ***************************************************
	public function MassCreate($NumberAccounts);
	public function MassCreateSmart($NumberAccounts);
	public function MassDecreate();
	public function VerifyAdmin($UserArray);
	public function ApprovePhoto($ImageID, $Rating);
	public function GetUnapprovedPhotos();


	// Advertising -----------------------------------------------------
	public function PromotionalAdvertisingReport($Type, $Zipcode, $Parameters = false);


	// Extended Commands -----------------------------------------------
	
	
	

	// Incomplete Commands ---------------------------------------------
	//public function ImageUpload();
	//public function ImageResize($Image, $Width = 200, $Height = 200);
	//public function ImageDisplay($ImageID);
	public function IPLookup_OLD($IP);
	public function IPLookup_OLDr2($IP);																												// converged model DB on eGenHQ
	public function IPLookup($IP);
	public function SearchGallery();
	

	

}





// START OF CLASS ======================================================================================================

class unlimiCore implements unlimiCoreInterface {


// PROPERTIES ----------------------------------------------------------------------------


	// external communication ==========================================

	public	$MemberID						= null;
	public	$MemberUsername			= null;
	public	$MemberPassword			= null;
	public	$MembereMail				= null;
	public	$MemberIP						= null;
	public	$MemberAuthorized		= null;
	public	$MemberPaid					= null;
	public	$MemberPaidPrior		= null;
	public	$MemberPaidPriorProduct		= null;
	
	public	$PromocodeMessage		= null;
	public	$PromocodeDiscount	= null;
	public	$Promocode					= null;
	public	$PromocodeCTAPitch	= null;



	// internal operations =============================================
	private	$db_connection			= null;
	private	$_OBJ_Session				= null;
	private	$_OBJ_DB						= null;

	private	$NewMemberArray			= null;
	
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


/*
		$this->MemberID						= null;
		$this->MemberUsername			= null;
		$this->MemberPassword			= null;
		$this->MembereMail				= null;
		$this->MemberIP						= null;
		$this->MemberAuthorized		= false;
		$this->MemberPaid					= false;
		$this->MemberPaidPrior		= false;
		$this->MemberPaidPriorProduct		= false;

		$this->PromocodeMessage		= false;
		$this->PromocodeDiscount	= false;
		$this->Promocode					= false;
		$this->PromocodeCTAPitch	= false;
		$this->PromocodeLifespan	=	null;
		$this->PromocodeType			=	null;
		$this->PromocodeProductID	=	null;
		


		$this->_OBJ_Session 			= null;
		$this->_OBJ_DB 						= null;
*/		
		$this->SiteDomain					= $_SERVER['HTTP_HOST'];

		

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
		require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/class.db.php');

		// class.session - -----------------------------------------
		require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/class.session.php');

		// class.encrypt - -----------------------------------------
		require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/class.encrypt.php');

		// class.gallery - -----------------------------------------
		require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/class.gallery.php');

		// class.zipcode - -----------------------------------------
		require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/class.zipcode.php');

		// class.phpmailer - ---------------------------------------
		require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/class.phpmailer.php');

	}
	// =================================================================






	// DESTRUCTOR ======================================================
	public function __destruct(){

		unset($this->MemberID);
		unset($this->MemberUsername);
		unset($this->MemberPassword);
		unset($this->MembereMail);
		unset($this->MemberIP);
		unset($this->MemberAuthorized);
		unset($this->MemberPaid);
		unset($this->MemberPaidPrior);
		unset($this->MemberPaidPriorProduct);

		unset($this->PromocodeMessage);
		unset($this->PromocodeDiscount);
		unset($this->Promocode);
		unset($this->PromocodeCTAPitch);
		unset($this->PromocodeLifespan);
		unset($this->PromocodeType);
		unset($this->PromocodeProductID);


		unset($this->_OBJ_Session);
		
		unset($this->SiteDomain);
		

	}
	// =================================================================










	// METHOD :: NameHere =============================================
	public function Initiate($Command, $Domain){

  // Create Session ------------------------------------------
  $this->_OBJ_Session						=	new session;
  $this->_OBJ_Session->fSession_Interface($Command, $Domain);
  // ---------------------------------------------------------
  
  // Set Site Domain Name ------------------------------------
  $this->SiteDomain				= $Domain;

	}
	// =================================================================














	// METHOD :: Filter ================================================
	public function Filter($NewUserArray){

		foreach($NewUserArray as $key => $value){
			
			// All Numbers -------------------------------------------------
			if( ctype_alnum($value) ){
				
			}else{
				
			}

		}

	 return $_return;  	
	}
	// =================================================================







	// METHOD :: Create ================================================
	public function Create($NewUserArray){


		$this->NewMember_username 		= $NewUserArray['username'];
		$this->NewMember_password 		= $this->Encrypt($NewUserArray['password'], 'private');

		if($NewUserArray['email_addr'] == $NewUserArray['email_addr2']){
			$this->NewMember_email_addr = $NewUserArray['email_addr'];	
		}

		$this->NewMember_validator		= $NewUserArray['validator'];

		$this->NewMember_dob					= $NewUserArray['dob'];
		$this->NewMember_ip 					= $NewUserArray['ip'];
		$this->NewMember_country			= $NewUserArray['country'];
		$this->NewMember_gender				= $NewUserArray['gender'];
		$this->NewMember_zipcode			= $NewUserArray['zipcode'];

		$this->NewMember_activated		= 0;
		$this->NewMember_disabled			= 0;
		$this->NewMember_ts_lastlogin	= 0;

		$this->NewMember_ts_created		= time();
		$this->NewMember_ts_signup		= time();
		$this->NewMember_ts_lastlogin	= null;

		//$this->NewMember_seek_m				= ($NewUserArray['seek_m'] == 1 ? 1:0);
		//$this->NewMember_seek_f				= ($NewUserArray['seek_f'] == 1 ? 1:0);
		//$this->NewMember_seek_c				= ($NewUserArray['seek_c'] == 1 ? 1:0);
		//$this->NewMember_seek_t				= ($NewUserArray['seek_t'] == 1 ? 1:0);




		







		// referrer tracking -----------------------------------
		$this->NewMember_referrer 		= ($NewUserArray['referrer_profile'] ? $this->Decrypt($NewUserArray['referrer_profile']):null);


		// affiliate promo tracking ----------------------------
		if($NewUserArray['affpromotionid']){
			$this->NewMember_promoid			=	$this->Decrypt($NewUserArray['affpromotionid'], 'private', $_SERVER['SERVER_NAME']);	
		}else{
			$this->NewMember_promoid			=	'0';	
		}
		// -----------------------------------------------------



		// affiliate promo distinct session tracking -----------
		$this->NewMember_promoSessionID		=	$NewUserArray['affiliate_ad_sessionID'];
		// -----------------------------------------------------




		// IF Promocode has been provided ------------------------------------------
		if($NewUserArray['promocode']){

			if($NewUserArray['promocode'] == '30aac3dacf93b184b0cfc7cd766af479'){
				// newgirl / diva premium account --------

				$UpgradeExpedite = true;

				$this->NewMember_promocode						= $this->Decrypt($NewUserArray['promocode'], 'public', $_SERVER['SERVER_NAME']);
				$this->PromocodeLookup($this->NewMember_promocode);


			}else{
				// standard processing -------------------

  			$UpgradeExpedite = true;
  
  			$this->NewMember_promocode						= $this->Decrypt($NewUserArray['promocode'], 'public', $_SERVER['SERVER_NAME']);
  			$this->NewMember_promodiscount				= $NewUserArray['promocodediscount'];
  			$this->NewMember_promoupgradediscount	= $NewUserArray['promocodeupgradediscount'];
  			
  
  
  			// Create Promocode Expiration from SignUp TS + Promocode Lifespan -----
  			if($NewUserArray['promocodelifespan'] != 0){
  				$this->NewMember_promoexpire	= $this->NewMember_ts_signup + $NewUserArray['promocodelifespan'];
  			}else{
  				$this->NewMember_promoexpire	= $NewUserArray['promocodelifespan'];
  			}
  			// ---------------------------------------------------------------------
  
  
  			// detect upgrade expedite ---------------------------------------------
  			// notes: 30 day trial ultra premium (DB.promocode ID=2
  			if($this->NewMember_promodiscount == 100 && $this->NewMember_promoexpire == 0){
  				$UpgradeExpedite = true;
  				$this->PromocodeLookup($this->NewMember_promocode);
  			}
  			// ---------------------------------------------------------------------

				
			}




		}
		// -------------------------------------------------------------------------









		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
		// -------------------------------------------


  	// Check for Pre-Existing Member ---------------------------------
  	$sql_NewMember			= mysql_query("SELECT user.userid FROM user WHERE user.username = '$this->NewMember_username' OR user.email_addr = '$this->NewMember_email_addr'");
		$sql_obj_result			=	mysql_fetch_object($sql_NewMember);



		if(!$sql_obj_result->userid){

    	// Create/Insert New Member --------------------------------------
			if($this->NewMember_promoSessionID){
      	if($this->NewMember_referrer){
      		$sql_NewMember		= mysql_query("INSERT INTO user (username, password, email_addr, dob, gender, country, zipcode, ts_signup, ts_created, ts_lastlogin, ip, activated, user_type, disabled, referrer, promoid, promo_sessionid) VALUES('$this->NewMember_username', '$this->NewMember_password', '$this->NewMember_email_addr', '$this->NewMember_dob', '$this->NewMember_gender', '$this->NewMember_country', '$this->NewMember_zipcode', '$this->NewMember_ts_signup', '$this->NewMember_ts_created', '$this->NewMember_ts_lastlogin', '$this->NewMember_ip', '$this->NewMember_activated', '1', '$this->NewMember_disabled', '$this->NewMember_referrer', '$this->NewMember_promoid', '$this->NewMember_promoSessionID') ");
      	}else{
      		$sql_NewMember		= mysql_query("INSERT INTO user (username, password, email_addr, dob, gender, country, zipcode, ts_signup, ts_created, ts_lastlogin, ip, activated, user_type, disabled, promoid, promo_sessionid) VALUES('$this->NewMember_username', '$this->NewMember_password', '$this->NewMember_email_addr', '$this->NewMember_dob', '$this->NewMember_gender', '$this->NewMember_country', '$this->NewMember_zipcode', '$this->NewMember_ts_signup', '$this->NewMember_ts_created', '$this->NewMember_ts_lastlogin', '$this->NewMember_ip', '$this->NewMember_activated', '1', '$this->NewMember_disabled', '$this->NewMember_promoid', '$this->NewMember_promoSessionID') ");
      	}
			}else{
      	if($this->NewMember_referrer){
      		$sql_NewMember		= mysql_query("INSERT INTO user (username, password, email_addr, dob, gender, country, zipcode, ts_signup, ts_created, ts_lastlogin, ip, activated, user_type, disabled, referrer, promoid) VALUES('$this->NewMember_username', '$this->NewMember_password', '$this->NewMember_email_addr', '$this->NewMember_dob', '$this->NewMember_gender', '$this->NewMember_country', '$this->NewMember_zipcode', '$this->NewMember_ts_signup', '$this->NewMember_ts_created', '$this->NewMember_ts_lastlogin', '$this->NewMember_ip', '$this->NewMember_activated', '1', '$this->NewMember_disabled', '$this->NewMember_referrer', '$this->NewMember_promoid') ");
      	}else{
      		$sql_NewMember		= mysql_query("INSERT INTO user (username, password, email_addr, dob, gender, country, zipcode, ts_signup, ts_created, ts_lastlogin, ip, activated, user_type, disabled, promoid) VALUES('$this->NewMember_username', '$this->NewMember_password', '$this->NewMember_email_addr', '$this->NewMember_dob', '$this->NewMember_gender', '$this->NewMember_country', '$this->NewMember_zipcode', '$this->NewMember_ts_signup', '$this->NewMember_ts_created', '$this->NewMember_ts_lastlogin', '$this->NewMember_ip', '$this->NewMember_activated', '1', '$this->NewMember_disabled', '$this->NewMember_promoid') ");
      	}
			}
			

    	
    	

			// get last inserted userID
  	  $userID						= mysql_insert_id();

		
		// Promocode =====================================================
		if($this->NewMember_promocode){
    	// Create/Insert New Member Specifications ---------------------
    	$sql_NewMbrSpecs	= mysql_query("INSERT INTO user_promocode (userid, promocode, discount, tsexpiration) VALUES('$userID', '$this->NewMember_promocode', '$this->NewMember_promoupgradediscount', '$this->NewMember_promoexpire') ") or die (mysql_error());
    }
		// ===============================================================
    
    
    // Profile =======================================================
    	// Create/Insert New Member Specifications ---------------------
    	$sql_NewMbrSpecs	= mysql_query("INSERT INTO user_profile_specs (userid, tsdob, height_inches, height_feet, tsjoinedon, zipcode, seek_m, seek_w, seek_c, seek_t) VALUES('$userID', '$this->NewMember_dob', '$this->NewMember_height_inches', '$this->NewMember_height_feet', '$this->NewMember_ts_created', '$this->NewMember_zipcode', '$this->NewMember_seek_m', '$this->NewMember_seek_f', '$this->NewMember_seek_c', '$this->NewMember_seek_t') ") or die (mysql_error());
    	
    	// Create/Insert New Member Essay Record -----------------------
    	$sql_NewMbrSpecs	= @mysql_query("INSERT INTO user_profile_essay (userid, tscreated) VALUES('$userID', '$this->NewMember_ts_created') ") or die (mysql_error());
		// ===============================================================



    	// Search PrePopulate per User Desires ===========================
    	$RelativeData			=	$this->NewMember_gender.'-'.$this->NewMember_zipcode.'-'.$this->NewMember_seek_m.$this->NewMember_seek_f.$this->NewMember_seek_t.$this->NewMember_seek_c.'-'.'11111'.'-'.'1899'.'-'.'000'.'-'.'000';

    	// Create/Insert New Member Specifications ---------------------
    	$sql_NewMbrSpecs	= mysql_query("INSERT INTO user_session_actions (userid, relativedata, action, ts) VALUES('$userID', '$RelativeData', 'search', '$this->NewMember_ts_created') ") or die (mysql_error());
			// ===============================================================




			// Process Expedited Upgrade =====================================
			if($UpgradeExpedite == true){

      	// Upgrade Data ----------------------------------------------
				$ExpeditedPromoProductArray = array(
													'upgrade_product' 					=>	$_SESSION['NewUser']['upgrade_product']							= $this->PromocodeProductID,
													'upgrade_term' 							=>	$_SESSION['NewUser']['upgrade_term']								= 1,
													'upgrade_referrer' 					=>	$_SESSION['NewUser']['upgrade_referrer']						= $this->NewMember_referrer,
													'upgrade_affpromoid'				=>	$_SESSION['NewUser']['affpromotionid']							= $this->NewMember_promoid
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
/*
			// Activation Letter to New Member -----------------------------
			$encryptObj->plainText				=	$userID;
			$_Cipher_userID 							= $encryptObj->ReturnHexCipherText();


			$__msg	=	'This is your Activation Letter
			
Click This Link to Activate Your Account:
			
http://FriendsNFlings.com/activate-'.$_Cipher_userID.'-'.$this->NewMember_password.'


-------------------------
http://FriendsNFlings.com
';

//http://FriendsNFlings.com/SM.core.exe.php?_function=member-Activate&_898a8as='.$_Cipher_userID.'&_fdf7687='.$this->NewMember_password.'

			// Send Activation Email ---------------------------------------
			$this->SendeMail($this->NewMember_email_addr, 'Do-Not-Reply@', 'Activation - FriendsNFlings', $__msg);
*/



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
		$_Cipher_userID						= $this->Encrypt($UserID, 'public', $this->SiteDomain);
		$_Cipher_userID_PRIVATE		= $this->Encrypt($UserID, 'private', $this->SiteDomain);




		switch($this->SiteDomain){

	
			// JMCRM.com ---------------------
			case 'jmcrm.com':

		$__msg	=	'This is your Activation Letter 
			
Click This Link to Activate Your Account:
			
https://sm0002.com/activate-'.$_Cipher_userID.'-'.$EncryptedPassword.'


==========================
jmCRM smartAgent
sm0002.com
';

		// Send Activation Email ---------------------------------------
		$this->SendeMail($EmailAddress, 'postman@', 'Activation - jmCRM Business Intelligence System', $__msg);

			break;
			// ------------------------------------------

		}



	 return $_return;  	
	}
	// =================================================================

















	// METHOD :: IMRequest =============================================
	public function IMRequest_R2($RecipientUserID_ENCRYPTED_PUBLIC, $RequesterUserID_ENCRYPTED_PRIVATE){


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
		// -------------------------------------------


		$RecipientID		=	$this->Decrypt($RecipientUserID_ENCRYPTED_PUBLIC, 'public');
		$RequesterID		=	$RequesterUserID_ENCRYPTED_PRIVATE;
		
		$timestamp			=	time();

		// check for pre-existing - if exists, deny --
		
		$sql_query	= mysql_query("SELECT user_im_sessions.id FROM user_im_sessions WHERE user_im_sessions.closed = '0' AND user_im_sessions.init_userid = '$RecipientID' AND user_im_sessions.rec_userid = '$RequesterID' OR user_im_sessions.closed = '0' AND user_im_sessions.init_userid = '$RequesterID' AND user_im_sessions.rec_userid = '$RecipientID'");
		$num_rows		=	mysql_num_rows($sql_query);

		if($num_rows > 0){
			$_return = 666;
		}else{
			$_return = 111;
		}

    // destroy database connection object ------
    $obj_db->Close();
  	// -----------------------------------------    



	 return $_return;  	
	}
	// =================================================================






	// METHOD :: IMRequest =============================================
	public function IMRequest($SenderID, $RecipientID, $SessionID){


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
		// -------------------------------------------


		$RecipientID		=	$this->Decrypt($RecipientID);
		$timestamp			=	time();

		// check for pre-existing - if exists, set to closed 
		if( $sql_query = mysql_query("SELECT user_im_sessions.id FROM user_im_sessions WHERE user_im_sessions.init_userid = '$SenderID' AND user_im_sessions.rec_userid = '$RecipientID'") ){
			$sql_obj_result			=	mysql_fetch_object($sql_query);
			mysql_query("UPDATE user_im_sessions SET user_im_sessions.closed = '1' WHERE user_im_sessions.id = '$sql_obj_result->id'");
			
			// create new session
			mysql_query("INSERT INTO user_im_sessions (id, init_userid, rec_userid, ts_created) VALUES('$SessionID', '$SenderID', '$RecipientID', '$timestamp') ");
			
			// insert msg per joining member
			mysql_query("INSERT INTO user_im_messages (sessionid, ownername, msg, ts) VALUES('$SessionID', 'system', 'Inviting Member to IM Session...', '$timestamp') ");

		}else{
			mysql_query("INSERT INTO user_im_sessions (id, init_userid, rec_userid, ts_created) VALUES('$SessionID', '$SenderID', '$RecipientID', '$timestamp') ");
			mysql_query("INSERT INTO user_im_messages (sessionid, ownername, msg, ts) VALUES('$SessionID', 'system', 'Inviting Member to IM Session...', '$timestamp') ");
		}


    // destroy database connection object ------
    $obj_db->Close();
    unset($obj_db);
  	// -----------------------------------------    



	 return $_return;  	
	}
	// =================================================================






	// METHOD :: IMAccept ==============================================
	public function IMAccept($RecipientID, $SessionID){


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
		// -------------------------------------------


		//$RecipientID		=	$this->Decrypt($RecipientID);
		$timestamp			=	time();

		//$sql_query			=	mysql_query("INSERT INTO user_im_sessions (id, init_userid, rec_userid, ts_created) VALUES('$SessionID', '$SenderID', '$RecipientID', '$timestamp') ") or die (mysql_error());

		mysql_query("UPDATE user_im_sessions SET user_im_sessions.accepted = '1' WHERE user_im_sessions.id = '$SessionID' AND user_im_sessions.rec_userid = '$RecipientID'");
		
		mysql_query("INSERT INTO user_im_messages (sessionid, ownername, msg, ts) VALUES('$SessionID', 'system', 'Member Accepted IM Session!', '$timestamp') ");
		mysql_query("INSERT INTO user_im_messages (sessionid, ownername, msg, ts) VALUES('$SessionID', 'system', 'Member Now Entering IM Session...', '$timestamp') ");		


    // destroy database connection object ------
    $obj_db->Close();
    unset($obj_db);
  	// -----------------------------------------



	 return $_return;
	}
	// =================================================================







	// METHOD :: GetUnapprovedPhotos ===================================
	public function GetUnapprovedPhotos(){


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
		// -------------------------------------------



		$sql_query					= mysql_query("SELECT * FROM user_images WHERE user_images.approved = '0' LIMIT 25");

		$counter	=	0;
		while( $sql_array_result	=	mysql_fetch_assoc($sql_query) ){
			$UnapprovedPhotosArray[$sql_array_result['imageid']] = $sql_array_result;
			$counter++;
		}

		$_return					= $UnapprovedPhotosArray;

    // destroy database connection object ------
    $obj_db->Close();
    unset($obj_db);
  	// -----------------------------------------

	 return $_return;

	}
	// =================================================================








	// METHOD :: ApprovePhoto ==========================================
	public function ApprovePhoto($ImageID, $Rating){

		$_return = false;


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
		// -------------------------------------------

		if($Rating == 2){
			if( mysql_query("UPDATE user_images SET user_images.approved = '2' WHERE user_images.imageid = '$ImageID'") ){
				$_return = true;
			}
		}elseif($Rating == 0 || $Rating == 1){
			if( mysql_query("UPDATE user_images SET user_images.approved = '1', user_images.rating = '$Rating' WHERE user_images.imageid = '$ImageID'") ){
				$_return = true;
			}
		}

    // destroy database connection object ------
    $obj_db->Close();
    unset($obj_db);
  	// -----------------------------------------

	 return $_return;

	}
	// =================================================================









	// METHOD :: MassDecreate ================================================
	public function MassDecreate(){



		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
		// -------------------------------------------

/*
		mysql_query("TRUNCATE TABLE user");
		
		mysql_query("TRUNCATE TABLE user_conversations");
		
		mysql_query("TRUNCATE TABLE user_conversation_msgs");

		mysql_query("TRUNCATE TABLE user_images");

		mysql_query("TRUNCATE TABLE user_im_messages");
		
		mysql_query("TRUNCATE TABLE user_im_sessions");
		
		mysql_query("TRUNCATE TABLE user_network");
		
		mysql_query("TRUNCATE TABLE user_notifications");
		
		mysql_query("TRUNCATE TABLE user_profile_essay");
		
		mysql_query("TRUNCATE TABLE user_profile_specs");
		
		mysql_query("TRUNCATE TABLE user_promocode");
		
		mysql_query("TRUNCATE TABLE user_sessions");
		
		mysql_query("TRUNCATE TABLE user_session_actions");
		
		mysql_query("TRUNCATE TABLE user_upgrade");

		echo 'Completed Mass Decreate!';
*/


    // destroy database connection object ------
    $obj_db->Close();
    unset($obj_db);
  	// -----------------------------------------    

	}
	// =================================================================








	// METHOD :: MassCreate ================================================
	public function MassCreate($NumberAccounts){






    
/*    
    //
    // A list of sentences:
    // 
    // %something ==> is a variable 
    //
    $r_sentences = '
    This is a %adjective %noun %sentence_ending
    This is another %noun %noun %sentence_ending
    I %love_or_hate %nouns , because it is %adjective %sentence_ending
    My %family says you are not %adjective %sentence_ending
    These %nouns are %adjective %sentence_ending
    ';
     
    //
    // This is another list of variables:
    // (This list can also contain variables (like %something))
    //
    // Formatting:
    // (first-line) = Variablename
    // (second-line) = Variables (seperated by semicolon)
    //
     
    $r_variables = '
    adjective
    %adjective_list;very %adjective_list;deadly %adjective_list
     
    adjective_list
    big;huge;small;red;blue;cool;yellow;pink;fluffy;stupid;clever;fat;lazy;boring
     
    noun
    %noun_list;%adjective %noun_list
     
    noun_list
    sentence;beer;cow;monkey;donkey;example;ice cream;dog
     
    nouns
    beers;monkeys;donkeys;examples;cars;trees;birds;dogs
     
    love_or_hate
    love;hate;like
     
    family
    %adjective %family_members;%family_members
     
    family_members
    grandpa;brother;sister;mom;dad;grandma
     
    sentence_ending
    .;!;!!;!?;*lol*
    ';
     
    // strip spaces:
    $r_sentences = trim($r_sentences);
    $r_variables = trim($r_variables);
     
    // fix new lines and split sentences up:
    $r_sentences = str_replace("\r\n", "\n", $r_sentences);
    $r_sentences = str_replace("\r", "\n", $r_sentences);
    $r_sentences = explode("\n", $r_sentences);
     
    $r_variables = str_replace("\r\n", "\n", $r_variables);
    $r_variables = str_replace("\r", "\n", $r_variables);
    $r_variables = explode("\n\n", $r_variables);
     
    // this array contains all variables:
    $r_vars = array();
     
    // go trough all variables:
    for($x=0; $x < count($r_variables); $x++){
     
        $var = explode("\n", trim($r_variables[$x]));
     
        // lowecase all:
        $key = strtolower(trim($var[0]));
     
        // split words:
        $words = explode(";", trim($var[1]));
     
        // add variables to the $r_vars Array
        $r_vars[$key] = $words;
     
    }
     
    // returns a word from the variables array:
    function get_word($key){
        global $r_vars;
     
        if (isset($r_vars[$key])){
     
            $words = $r_vars[$key];
     
            // calc max.
            $w_max = count($words)-1;
            $w_rand = rand(0, $w_max);
     
            // return the word, and check if the word contains
            // another variable:
            return replace_words(trim($words[$w_rand]));
     
        }
        else {
            // the word was not found :-(
            return "(Error: Word '$key' was not found!)";
        }
     
    }
     
    // this function replaces a variable like %something with
    // the 	proper variable-value:
     
    function replace_words($sentence){
     
        // if there are no variables in the sentence,
        // return it without doing anything
        if (str_replace('%', '', $sentence) == $sentence)
            return $sentence;
     
        // split the words up:
        $words = explode(" ", $sentence);
     
        $new_sentence = array();
     
        // go trough all words:
        for($w=0; $w < count($words); $w++){
     
            $word = trim($words[$w]);
     
            if ($word != ''){
     
                // is this word a variable?
                if (preg_match('/^%(.*)$/', $word, $m)){
     
                    // --> yes
                    $varkey = trim($m[1]);
     
                    // get the proper word from the variable list:
                    $new_sentence[] = get_word($varkey);
                }
                else {
                    // --> no it is a default word
                    $new_sentence[] = $word;
                }
     
            }
     
        }
     
        // join the array to a new sentence:
        return implode(" ", $new_sentence);    
    }
     
    // calc. max.
    $max_s = count($r_sentences)-1;
    $rand_s = rand(0, $max_s);
     
    // get a random sentence:
    $sentence = $r_sentences[$rand_s];
     
    // format the resulting sentence, so that I looks nice:
    // (delete whitespace infront of punctuation marks)
    $sentence = str_replace(' ,', ',', ucfirst(replace_words($sentence)));
    $sentence = str_replace(' .', '.', $sentence);
    $sentence = str_replace(' !', '!', $sentence);
    $sentence = str_replace(' ?', '?', $sentence);
    $sentence = trim($sentence);
     
    // finally print the new sentence! :-D
    print $sentence;




    function random_array_element(&$a){
     
        mt_srand((double)microtime()*1000000);  
     
        // get all array keys:
        $k = array_keys($a);
     
        // find a random array key:
        $r = mt_rand(0, count($k)-1);
        $rk = $k[$r];
     
        // return the random key (if exists):
        return isset($a[$rk]) ? $a[$rk] : '';
    }


*/




		set_time_limit(0);




    // Encryption ----------------------------------------------------
    $encryptObj							=	new baseCrypto;
    //$encryptObj->cipherType = 2;			//	1 = TwoFish	2 = Rijndael	3 = DES
    //$encryptObj->cipherMode = 1;			//	1 = ECB	    2 = CBC				3 = CFB
    //$encryptObj->passPhrase = $this->__passphrase;
    //$encryptObj->key 				= $this->__key;

    $encryptObj->cipherType = $this->__cipherType_PRIVATE;
    $encryptObj->cipherMode = $this->__cipherMode_PRIVATE;
    $encryptObj->passPhrase = $this->__passphrase_PRIVATE;
    $encryptObj->key 				= $this->__key_PRIVATE;
    // ---------------------------------------------------------------



		$FemaleImageArray	=	array(
			1			=>		'pop/2/1.jpg',
			2			=>		'pop/2/2.jpg',
			3			=>		'pop/2/3.jpg',
			4			=>		'pop/2/4.jpg',
			5			=>		'pop/2/5.jpg',
			6			=>		'pop/2/6.jpg',
			7			=>		'pop/2/7.jpg',
			8			=>		'pop/2/8.jpg',
			9			=>		'pop/2/9.jpg',
			10		=>		'pop/2/10.jpg',
			11		=>		'pop/2/11.jpg',
			12		=>		'pop/2/12.jpg',
			13		=>		'pop/2/13.jpg',
			14		=>		'pop/2/14.jpg',
			15		=>		'pop/2/15.jpg',
			16		=>		'pop/2/16.jpg',
			17		=>		'pop/2/17.jpg',
			18		=>		'pop/2/18.jpg',
		);


		$MaleImageArray	=	array(
			1			=>		'pop/1/1.jpg',
		);



		$FemaleNameArray	=	array(
			1			=>		'abigail',
			2			=>		'abs',
			3			=>		'abby',
			4			=>		'aba',
			5			=>		'abina',
			6			=>		'acacia',
			7			=>		'adine',
			8			=>		'kristie',
			9			=>		'adrienne',
			10		=>		'addy',
			11		=>		'alice',
			12		=>		'alicia',
			13		=>		'alva',			
			14		=>		'athena',			
			15		=>		'amara',			
			16		=>		'amity',			
			17		=>		'andrea',			
			18		=>		'amber',			
			19		=>		'aretina'			
		);




		$MaleNameArray		=	array(
			1			=>		'joe',
			2			=>		'john',
			3			=>		'jack',
			4			=>		'james',
			5			=>		'jim',
			6			=>		'mark',
			7			=>		'hank',
			8			=>		'kris',
			9			=>		'kyle',
			10		=>		'sam',
			11		=>		'chris',
			12		=>		'joey'
		);

 		$MaleEssayArray_aboutme	=	array(
			1		=>	'so whats up? im just here checking this place out.. and you?',
			2		=>	'just signed up to see what the fuss is all about',
			3		=>	'hit me up sometime if you wanna hookup'
  	);

 		$FemaleEssayArray_aboutme	=	array(
			1		=>	'i just popped my picture on here to say hi to all my peeps',
			2		=>	'..are you devil?  id like to be',
			3		=>	'so..talk to me!'
  	);


		$NameAddOnArray		=	array(
			1			=>		'PARTY',
			2			=>		'69',
			3			=>		'BadaBing',
			4			=>		'SpankMe',
			5			=>		'Dog',
			6			=>		'Smirky',
			7			=>		'Shag',
			8			=>		'Funk',
			9			=>		'Zoey',
			10		=>		'Beer',
			11		=>		'Tink',
			12		=>		'and',
			13		=>		'dub',
			14		=>		'rub',
			15		=>		'foot',
			16		=>		'suck',
			17		=>		'Me',
			18		=>		'BBabe',
			19		=>		'stickle',
			20		=>		'funkme'
		);


 		$_RandomImageChoice	=	array(
			0		=>	'pop/1.jpg',
			1		=>	'pop/2.jpg',
			2		=>	'none'
  	);


	// -------------------------------------------------------













		ob_start();

		for($Counter = $NumberAccounts; $Counter > 0; $Counter--){
			
			

  		// database connection -----------------------
  		$obj_db					= new db;
  		$obj_db->Connect(0); //write operation
  		// -------------------------------------------

    	// get ZIPCODE -----------------------------
    	$sql_query						= mysql_query("SELECT zip_code.zip_code FROM zip_code ORDER BY RAND()");
    	
    	
  		while($sql_obj_resultZIP	=	mysql_fetch_object($sql_query)){






			
			ob_flush();
			$NewMember_Gender	=	rand(1,2);
			




			$encryptObj->plainText				=	'abc123';
			$this->NewMember_password 		= $encryptObj->ReturnHexCipherText();

			$this->NewMember_email_addr		= rand(1,5000).$NameAddOnArray[rand(1,20)].rand(1,12).$Counter.'user@domain.com';

  		$this->NewMember_dob					= rand(5,1200).'458000';
  		$this->NewMember_ip 					= '1.1.1.1';
  		$this->NewMember_country			= 'US';
  		$this->NewMember_gender				= $NewMember_Gender;
  		$this->NewMember_zipcode			= $sql_obj_resultZIP->zip_code;



			switch($NewMember_Gender){
				
				// MALE ----------------------------------
				case 1:
					$this->NewMember_username		=	$MaleNameArray[rand(1,12)].rand(1,5000).$NameAddOnArray[rand(1,20)].rand(1,12);

					$image_or_noimage						=	rand(0,1);
					if($image_or_noimage == 1){
						$__image	=	$MaleImageArray[rand(1,1)];
					}else{
						$__image	=	false;
					}
					$__image	=	$MaleImageArray[rand(1,1)];
					$__Essay_aboutMe				=	$MaleEssayArray_aboutme[rand(1,3)];

				break;
				// ---------------------------------------



				// FEMALE ----------------------------------
				case 2:
					$this->NewMember_username		=	$FemaleNameArray[rand(1,19)].rand(1,5000).$NameAddOnArray[rand(1,20)].rand(1,12);

					$image_or_noimage						=	rand(0,1);
					if($image_or_noimage == 1){
						$__image	=	$FemaleImageArray[rand(1,18)];
					}else{
						$__image	=	false;
					}
					$__image	=	$FemaleImageArray[rand(1,18)];
					
					$__Essay_aboutMe				=	$FemaleEssayArray_aboutme[rand(1,3)];
					
				break;
				// ---------------------------------------
				
			}


  		$this->NewMember_activated		= 1;
  		$this->NewMember_disabled			= 0;


  		$this->NewMember_ts_created		= time();
  		$this->NewMember_ts_signup		= time();
  		$this->NewMember_ts_lastlogin	= (time() - 1200) + (rand(1,600));

  		$this->NewMember_seek_m				= rand(0,1);
  		$this->NewMember_seek_w				= rand(0,1);
  		$this->NewMember_seek_t				= rand(0,1);
  		$this->NewMember_seek_c				= rand(0,1);
  		//$this->NewMember_seek_g				= rand(0,1);
  		
  		$this->NewMember_into_friends	= rand(0,1);
  		$this->NewMember_into_relatio	= rand(0,1);
  		$this->NewMember_into_sex			= rand(0,1);
  		$this->NewMember_into_fetish	= rand(0,1);
  		
  		$this->NewMember_besttrait		= rand(1,8);
  		
  		$this->NewMember_visits				= rand(5,80);
  		
  		

			
			
			
			$Good_n_Bad	=	rand(0,1);

			if($Good_n_Bad == 1){
	   		$this->NewMember_fant_2girls	= 0; 
    		$this->NewMember_fant_2guys		= 0;
    		$this->NewMember_fant_public	= 0;
    		$this->NewMember_fant_boat		= 1;
  			$this->NewMember_fant_domin		= 0;
  			$this->NewMember_fant_beach		= 1;
  			$this->NewMember_fant_outdoor	= 0;
  			$this->NewMember_fant_askme		= 0;
  			$this->NewMember_fant_toys		= 0;
  			$this->NewMember_fant_illegal	= 0;
			}else{
    		$this->NewMember_fant_2girls	= 1; 
    		$this->NewMember_fant_2guys		= 0;
    		$this->NewMember_fant_public	= 0;
    		$this->NewMember_fant_boat		= rand(0,1);
  			$this->NewMember_fant_domin		= 0;
  			$this->NewMember_fant_beach		= 0;
  			$this->NewMember_fant_outdoor	= 0;
  			$this->NewMember_fant_askme		= 0;
  			$this->NewMember_fant_toys		= 0;
  			$this->NewMember_fant_illegal	= 1;
			}


			

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
		// -------------------------------------------


    	// Check for Pre-Existing Member ---------------------------------
    	$sql_NewMember	= mysql_query("SELECT user.userid FROM user WHERE user.username = '$this->NewMember_username' OR user.email_addr = '$this->NewMember_email_addr'") or die (mysql_error());
  		$sql_obj_result	=	mysql_fetch_object($sql_NewMember);
  		
  		if(!$sql_obj_result->userid){
  
      	// Create/Insert New Member --------------------------------------
      	$sql_NewMember	= mysql_query("INSERT INTO user (username, password, email_addr, dob, gender, country, zipcode, ts_signup, ts_created, ts_lastlogin, ip, activated, level, disabled) VALUES('$this->NewMember_username', '$this->NewMember_password', '$this->NewMember_email_addr', '$this->NewMember_dob', '$this->NewMember_gender', '$this->NewMember_country', '$this->NewMember_zipcode', '$this->NewMember_ts_signup', '$this->NewMember_ts_created', '$this->NewMember_ts_lastlogin', '$this->NewMember_ip', '$this->NewMember_activated', '3', '$this->NewMember_disabled') ");
  			
  			// get last inserted userID
    	  $userID					= mysql_insert_id();




				// upload image per Profile ------------------------
				//$_FilePath	=	$_RandomImageChoice[rand(0,2)];
				
				$_FilePath		=	$__image;
				
				

				if($__image == false){
					//echo '<font color="red">IMAGE</font> >> ';
					// do nothing -----
				}else{
					echo '<font color="red">IMAGE</font> >> ';
					$_ImageFile		= fopen($_FilePath, 'r');
					$_ImageFileD	= fread($_ImageFile, filesize($_FilePath));
					$this->ImageUpload($_FilePath, $userID, 1);
				}
				// -------------------------------------------------




				// database connection -----------------------
				$obj_db					= new db;
				$obj_db->Connect(0); //write operation
				// -------------------------------------------


      // Profile =======================================================
      	// Create/Insert New Member Specifications ---------------------
      	$sql_NewMbrSpecs= mysql_query("INSERT INTO `user_profile_specs` (`userid`, `tsdob`, `title`, `status`, `hotness`, `personality`, `height_inches`, `height_feet`, `bodytype`, `haircolor`, `eyecolor`, `income`, `profession`, `religion`, `into_friends`, `into_flirting`, `into_relationship`, `into_sex`, `into_fetish`, `seek_m`, `seek_w`, `seek_t`, `seek_c`, `fav_asian`, `fav_white`, `fav_black`, `fav_eindian`, `fav_islander`, `fav_hispanic`, `fav_meastern`, `fav_namericanindian`, `fav_latino`, `fav_animals`, `fantasy_twogirls`, `fantasy_twoguys`, `fantasy_public`, `fantasy_boat`, `fantasy_dominatrix`, `fantasy_beach`, `fantasy_outdoors`, `fantasy_askme`, `fantasy_toys`, `fantasy_illegal`, `turnon_butt`, `turnon_legs`, `turnon_chest`, `turnon_hands`, `turnon_tan`, `turnon_mind`, `turnon_feet`, `turnon_askme`, `turnon_hair`, `turnon_piercings`, `turnon_money`, `turnon_power`, `turnon_size`, `turnon_hardbody`, `turnon_mysecret`, `smoke_do`, `smoke_dislike`, `drink_do`, `drink_dislike`, `tattoo_have`, `tattoo_dislike`, `piercings_have`, `piercings_dislike`, `worsttrait`, `besttrait`, `zipcode`, `tsjoinedon`, `tsmodified`, `visits`, `numimages`, `membertype`) VALUES ('$userID', '$this->NewMember_dob', '', 2, 8, 11, 11, 4, 11, 2, 9, 15, 6, 4, '$this->NewMember_into_friends', '$this->NewMember_into_flirting', '$this->NewMember_into_relatio', '$this->NewMember_into_sex', '$this->NewMember_into_fetish', '$this->NewMember_seek_m', '$this->NewMember_seek_w', '$this->NewMember_seek_t', '$this->NewMember_seek_c', '0', '1', '0', '0', '0', '0', '0', '0', '0', '$this->NewMember_fant_2girls', '$this->NewMember_fant_2guys', '$this->NewMember_fant_public', '$this->NewMember_fant_boat', '$this->NewMember_fant_domin', '$this->NewMember_fant_beach', '$this->NewMember_fant_outdoor', '$this->NewMember_fant_askme', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', 1, '$this->NewMember_besttrait', '$this->NewMember_zipcode', 1219298984, 1220604485, '$this->NewMember_visits', 8, 'Silver')") or die (mysql_error());


      	// Create/Insert New Member Essay Record -----------------------
      	$sql_NewMbrSpecs= mysql_query("INSERT INTO user_profile_essay (userid, aboutme, approved1, aboutyou, approved2, tscreated) VALUES('$userID', '$__Essay_aboutMe', '1', 'SAMPLE YOU', '1', '$this->NewMember_ts_created') ") or die (mysql_error());
  		// ===============================================================
  		


				echo $Counter.'&nbsp;<font color=green><b>GOOD:</b></font> '.$this->NewMember_email_addr.'<br>';
  		}else{
  			echo $Counter.'&nbsp;<font color=red><b>FAIL:</b></font> '.$this->NewMember_email_addr.'<br>';
  		}
			
			
			
			}





    		// destroy database connection object ------
    		$obj_db->Close();
    		unset($obj_db);
  			// -----------------------------------------

		}



	 return $_return;

	 set_time_limit(30);

	}
	// =================================================================












	// METHOD :: MassCreateSmart =======================================
	public function MassCreateSmart($NumberAccounts){




		set_time_limit(0);




		$FemaleImageArray	=	array(
			1			=>		'pop/2/1.jpg',
			2			=>		'pop/2/2.jpg',
			3			=>		'pop/2/3.jpg',
			4			=>		'pop/2/4.jpg',
			5			=>		'pop/2/5.jpg',
			6			=>		'pop/2/6.jpg',
			7			=>		'pop/2/7.jpg',
			8			=>		'pop/2/8.jpg',
			9			=>		'pop/2/9.jpg',
			10		=>		'pop/2/10.jpg',
			11		=>		'pop/2/11.jpg',
			12		=>		'pop/2/12.jpg',
			13		=>		'pop/2/13.jpg',
			14		=>		'pop/2/14.jpg',
			15		=>		'pop/2/15.jpg',
			16		=>		'pop/2/16.jpg',
			17		=>		'pop/2/17.jpg',
			18		=>		'pop/2/18.jpg',
		);


		$MaleImageArray	=	array(
			1			=>		'pop/1/1.jpg',
		);



		$FemaleNameArray	=	array(
			1			=>		'abigail',
			2			=>		'abs',
			3			=>		'abby',
			4			=>		'aba',
			5			=>		'abina',
			6			=>		'acacia',
			7			=>		'adine',
			8			=>		'kristie',
			9			=>		'adrienne',
			10		=>		'addy',
			11		=>		'alice',
			12		=>		'alicia',
			13		=>		'alva',			
			14		=>		'athena',			
			15		=>		'amara',			
			16		=>		'amity',			
			17		=>		'andrea',			
			18		=>		'amber',			
			19		=>		'aretina'			
		);




		$MaleNameArray		=	array(
			1			=>		'joe',
			2			=>		'john',
			3			=>		'jack',
			4			=>		'james',
			5			=>		'jim',
			6			=>		'mark',
			7			=>		'hank',
			8			=>		'kris',
			9			=>		'kyle',
			10		=>		'sam',
			11		=>		'chris',
			12		=>		'joey'
		);

 		$MaleEssayArray_aboutme	=	array(
			1		=>	'so whats up? im just here checking this place out.. and you?',
			2		=>	'just signed up to see what the fuss is all about',
			3		=>	'hit me up sometime if you wanna hookup'
  	);

 		$FemaleEssayArray_aboutme	=	array(
			1		=>	'i just popped my picture on here to say hi to all my peeps',
			2		=>	'..are you devil?  id like to be',
			3		=>	'so..talk to me!'
  	);


		$NameAddOnArray		=	array(
			1			=>		'PARTY',
			2			=>		'69',
			3			=>		'BadaBing',
			4			=>		'SpankMe',
			5			=>		'Dog',
			6			=>		'Smirky',
			7			=>		'Shag',
			8			=>		'Funk',
			9			=>		'Zoey',
			10		=>		'Beer',
			11		=>		'Tink',
			12		=>		'and',
			13		=>		'dub',
			14		=>		'rub',
			15		=>		'foot',
			16		=>		'suck',
			17		=>		'Me',
			18		=>		'BBabe',
			19		=>		'stickle',
			20		=>		'funkme'
		);


 		$_RandomImageChoice	=	array(
			0		=>	'pop/1.jpg',
			1		=>	'pop/2.jpg',
			2		=>	'none'
  	);


	// -------------------------------------------------------





		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
		// -------------------------------------------



    // Encryption ----------------------------------------------------
    $encryptObj							=	new baseCrypto;
    //$encryptObj->cipherType = 2;			//	1 = TwoFish	2 = Rijndael	3 = DES
    //$encryptObj->cipherMode = 1;			//	1 = ECB	    2 = CBC				3 = CFB
    //$encryptObj->passPhrase = $this->__passphrase;
    //$encryptObj->key 				= $this->__key;

    $encryptObj->cipherType = $this->__cipherType_PRIVATE;
    $encryptObj->cipherMode = $this->__cipherMode_PRIVATE;
    $encryptObj->passPhrase = $this->__passphrase_PRIVATE;
    $encryptObj->key 				= $this->__key_PRIVATE;
    // ---------------------------------------------------------------



// MARKETS =================================================


		// get markets ---------------------
			$qry_MKTMarket				= mysql_query("SELECT MKT.market, MKT.central_zipcode FROM ai_markets MKT");
			$MKTMarket_num_rows		=	mysql_num_rows($qry_MKTMarket);

			if($MKTMarket_num_rows){

  			$counter	=	1;
  			while($sql_array_result	=	mysql_fetch_assoc($qry_MKTMarket)){
  				$Markets_Array[$counter] = $sql_array_result;
  				$counter++;
  			}
  		}
  	// ---------------------------------

/*
		// define gender -------------------
		$NewMember_Gender				=	rand(1,2);
		if($NewMember_Gender == 1){
			//echo 'Male<br>';
		}else{
			//echo 'Female<br>';
		}
		// ---------------------------------
*/

		// get names -----------------------
			$qry_AIName						= mysql_query("SELECT AIN.name, AIN.id FROM ai_names AIN WHERE AIN.gender = '2'");
			$AIName_num_rows			=	mysql_num_rows($qry_AIName);

			if($AIName_num_rows){

  			$counter	=	1;
  			while($sql_array_result	=	mysql_fetch_assoc($qry_AIName)){
  				$Names_Array[$counter] = $sql_array_result;
  				$counter++;
  			}
  		}
  	// ---------------------------------




		// read out ------------------------
		$master_counter	=	1;
		$total_counter	=	1;
		
		foreach($Markets_Array as $key => $value){
			echo '<br>';
			echo '<font face="arial" size="6"><b>Market: <font color="green">'.ucwords($value['market']).'</font></font></b><br>';
			echo '============================================';
			echo '<br><font face="arial" size="2">';



				// zipcode list --------------------------
				$ZIPCode_Array	=	$this->ZIPCodeLookup($value['central_zipcode'], '10');
    		// ---------------------------------------


    		// read out ------------------------------
    		$counter				=	1;
    		foreach($ZIPCode_Array as $key => $zipcode){

    				if($counter < 11){
							
    					$_DOB_Y			=	rand(1990,1982);
    					$_DOB_M			=	rand(1,12);
    					$_DOB_D			=	rand(1,28);
    					$_DOB				= mktime(0,0,0,$_DOB_M,$_DOB_D,$_DOB_Y);
    					
    					echo 'USER #: '.$total_counter.'<br> USERID : '.$Names_Array[$total_counter]['id'].
    					'<br> ZIPCODE: '.$zipcode.
    					'<br> NAME: '.ucwords($Names_Array[$total_counter]['name']).
    					'<br> AGE: '.(2008 - date(Y, $_DOB)).
    					'<br> GENDER: '.($NewMember_Gender == 1 ? 'Male':'Female');

							
							
							// database actions ----------------

        			//$NewMember_Gender	=	rand(1,2);
        			$NewMember_Gender	=	2;
        
        
        
        
        			$encryptObj->plainText				=	'abc123';
        			$this->NewMember_password 		= $encryptObj->ReturnHexCipherText();
        			$this->NewMember_email_addr		= $total_counter.'_'.$Names_Array[$total_counter]['id'].'_ai@friendsnflings.com';
        
          		$this->NewMember_dob					= $_DOB;
          		$this->NewMember_ip 					= '1.1.1.1';
          		$this->NewMember_country			= 'US';
          		$this->NewMember_gender				= $NewMember_Gender;
          		$this->NewMember_zipcode			= $zipcode;



							// -------------------------------------------
							switch(strlen($Names_Array[$total_counter]['id'])){
								
								case 1:
								$_imageFileName_Prefix	=	'00'.$Names_Array[$total_counter]['id'];
								break;

								case 2:
								$_imageFileName_Prefix	=	'0'.$Names_Array[$total_counter]['id'];
								break;

								case 3:
								$_imageFileName_Prefix	=	$Names_Array[$total_counter]['id'];
								break;
							}
							// -------------------------------------------



        			switch($NewMember_Gender){
        				
        				// MALE ----------------------------------
        				case 1:
        					$this->NewMember_username		=	$MaleNameArray[rand(1,12)].rand(1,5000).$NameAddOnArray[rand(1,20)].rand(1,12);
        
        					$image_or_noimage						=	rand(0,1);
        					if($image_or_noimage == 1){
        						$__image	=	$MaleImageArray[rand(1,1)];
        					}else{
        						$__image	=	false;
        					}

        					$__image	=	'pop/1/'.$_imageFileName_Prefix.'.jpg';
        					$__Essay_aboutMe				=	$MaleEssayArray_aboutme[rand(1,3)];
        
        				break;
        				// ---------------------------------------
        
        
        
        				// FEMALE ----------------------------------
        				case 2:
        					$_hyphen	=	rand(0,2);
        					if($_hyphen == 0){
        						$_hyphen = '-';
        					}elseif($_hyphen == 1){
        						$_hyphen = '_';
        					}else{
        						$_hyphen = '';
        					}
        				
        					$this->NewMember_username		=	$Names_Array[$total_counter]['name'].$_hyphen.$NameAddOnArray[rand(1,20)];
        					echo '<br>USERNAME: '.$this->NewMember_username;
        
        					$image_or_noimage						=	rand(0,1);
        					if($image_or_noimage == 1){
        						$__image	=	$FemaleImageArray[rand(1,18)];
        					}else{
        						$__image	=	false;
        					}
        					$__image	=	'pop/2/'.$_imageFileName_Prefix.'.jpg';

        					$__Essay_aboutMe				=	$FemaleEssayArray_aboutme[rand(1,3)];
        					
        				break;
        				// ---------------------------------------
        				
        			}
        
        
          		$this->NewMember_activated		= 1;
          		$this->NewMember_disabled			= 0;

          		$this->NewMember_ts_created		= time();
          		$this->NewMember_ts_signup		= time();
          		$this->NewMember_ts_lastlogin	= (time() - rand(1,600));

          		$this->NewMember_seek_m				= 1;
          		$this->NewMember_seek_w				= rand(0,1);
          		$this->NewMember_seek_t				= rand(0,1);
          		$this->NewMember_seek_c				= rand(0,1);
          		//$this->NewMember_seek_g				= rand(0,1);
          		
          		$this->NewMember_into_friends	= rand(0,1);
          		$this->NewMember_into_relatio	= rand(0,1);
          		$this->NewMember_into_sex			= rand(0,1);
          		$this->NewMember_into_fetish	= rand(0,1);

          		$this->NewMember_besttrait		= rand(1,8);

          		$this->NewMember_visits				= 0;
          		
          		
        
        			
        			
        			
        			$Good_n_Bad	=	rand(0,1);
        
        			if($Good_n_Bad == 1){
        				// GOOD
        	   		$this->NewMember_fant_2girls	= 0; 
            		$this->NewMember_fant_2guys		= 0;
            		$this->NewMember_fant_public	= 0;
            		$this->NewMember_fant_boat		= rand(0,1);
          			$this->NewMember_fant_domin		= 0;
          			$this->NewMember_fant_beach		= rand(0,1);
          			$this->NewMember_fant_outdoor	= 0;
          			$this->NewMember_fant_askme		= rand(0,1);
          			$this->NewMember_fant_toys		= 0;
          			$this->NewMember_fant_illegal	= 0;
        			}else{
        				// BAD
            		$this->NewMember_fant_2girls	= rand(0,1); 
            		$this->NewMember_fant_2guys		= rand(0,1);
            		$this->NewMember_fant_public	= 0;
            		$this->NewMember_fant_boat		= 0;
          			$this->NewMember_fant_domin		= 0;
          			$this->NewMember_fant_beach		= 0;
          			$this->NewMember_fant_outdoor	= 0;
          			$this->NewMember_fant_askme		= 0;
          			$this->NewMember_fant_toys		= rand(0,1);
          			$this->NewMember_fant_illegal	= rand(0,1);
        			}
        
        
        			
        
        		// database connection -----------------------
        		$obj_db					= new db;
        		$obj_db->Connect(0); //write operation
        		// -------------------------------------------
        
        
            	// Check for Pre-Existing Member ---------------------------------
            	$sql_NewMember	= mysql_query("SELECT user.userid FROM user WHERE user.username = '$this->NewMember_username' OR user.email_addr = '$this->NewMember_email_addr'") or die (mysql_error());
          		$sql_obj_result	=	mysql_fetch_object($sql_NewMember);
          		
          		if(!$sql_obj_result->userid){
          
              	// Create/Insert New Member --------------------------------------
              	$sql_NewMember	= mysql_query("INSERT INTO user (username, password, email_addr, dob, gender, country, zipcode, ts_signup, ts_created, ts_lastlogin, ts_lastaction, ip, activated, level, disabled) VALUES('$this->NewMember_username', '$this->NewMember_password', '$this->NewMember_email_addr', '$this->NewMember_dob', '$this->NewMember_gender', '$this->NewMember_country', '$this->NewMember_zipcode', '$this->NewMember_ts_signup', '$this->NewMember_ts_created', '$this->NewMember_ts_lastlogin', '$this->NewMember_ts_lastlogin', '$this->NewMember_ip', '$this->NewMember_activated', '3', '$this->NewMember_disabled') ");
          			echo '<br><font color="red">INSERT USER</font> >> USER TABLE';
          			
          			// get last inserted userID
            	  $userID					= mysql_insert_id();
        
        
        
        
        				// upload image per Profile ------------------------
        				//$_FilePath	=	$_RandomImageChoice[rand(0,2)];
        				
        				$_FilePath		=	$__image;
        				
        				
        
        				if($__image == false){
        					//echo '<font color="red">IMAGE</font> >> ';
        					// do nothing -----
        				}else{
        					echo '<font color="red">';
        					$_ImageFile		= fopen($_FilePath, 'r');
        					$_ImageFileD	= fread($_ImageFile, filesize($_FilePath));
        					$this->ImageUpload($_FilePath, $userID, 1);
        					echo '<br>UPLOAD IMAGE</font> >> '.$__image.'<br>';
        				}
        				// -------------------------------------------------
        
        
        
        
        				// database connection -----------------------
        				$obj_db					= new db;
        				$obj_db->Connect(0); //write operation
        				// -------------------------------------------
        
        
              // Profile =======================================================
              	// Create/Insert New Member Specifications ---------------------
              	//$sql_NewMbrSpecs= mysql_query("INSERT INTO `user_profile_specs` (`userid`, `tsdob`, `title`, `status`, `hotness`, `personality`, `height_inches`, `height_feet`, `bodytype`, `haircolor`, `eyecolor`, `income`, `profession`, `religion`, `into_friends`, `into_flirting`, `into_relationship`, `into_sex`, `into_fetish`, `seek_m`, `seek_w`, `seek_t`, `seek_c`, `fav_asian`, `fav_white`, `fav_black`, `fav_eindian`, `fav_islander`, `fav_hispanic`, `fav_meastern`, `fav_namericanindian`, `fav_latino`, `fav_animals`, `fantasy_twogirls`, `fantasy_twoguys`, `fantasy_public`, `fantasy_boat`, `fantasy_dominatrix`, `fantasy_beach`, `fantasy_outdoors`, `fantasy_askme`, `fantasy_toys`, `fantasy_illegal`, `turnon_butt`, `turnon_legs`, `turnon_chest`, `turnon_hands`, `turnon_tan`, `turnon_mind`, `turnon_feet`, `turnon_askme`, `turnon_hair`, `turnon_piercings`, `turnon_money`, `turnon_power`, `turnon_size`, `turnon_hardbody`, `turnon_mysecret`, `smoke_do`, `smoke_dislike`, `drink_do`, `drink_dislike`, `tattoo_have`, `tattoo_dislike`, `piercings_have`, `piercings_dislike`, `worsttrait`, `besttrait`, `zipcode`, `tsjoinedon`, `tsmodified`, `visits`, `numimages`, `membertype`) VALUES ('$userID', '$this->NewMember_dob', 'no title yet', 2, 8, 11, 11, 4, 11, 2, 9, 15, 6, 4, '$this->NewMember_into_friends', '$this->NewMember_into_flirting', '$this->NewMember_into_relatio', '$this->NewMember_into_sex', '$this->NewMember_into_fetish', '$this->NewMember_seek_m', '$this->NewMember_seek_w', '$this->NewMember_seek_t', '$this->NewMember_seek_c', '0', '1', '0', '0', '0', '0', '0', '0', '0', '$this->NewMember_fant_2girls', '$this->NewMember_fant_2guys', '$this->NewMember_fant_public', '$this->NewMember_fant_boat', '$this->NewMember_fant_domin', '$this->NewMember_fant_beach', '$this->NewMember_fant_outdoor', '$this->NewMember_fant_askme', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', 1, '$this->NewMember_besttrait', '$this->NewMember_zipcode', 1219298984, 1220604485, '$this->NewMember_visits', 8, 'Silver')") or die (mysql_error());
              	
              	$sql_NewMbrSpecs= mysql_query("INSERT INTO `user_profile_specs` (`userid`, `tsdob`, `title`, `into_friends`, `into_flirting`, `into_relationship`, `into_sex`, `into_fetish`, `seek_m`, `seek_w`, `seek_t`, `seek_c`, `fav_asian`, `fav_white`, `fav_black`, `fav_eindian`, `fav_islander`, `fav_hispanic`, `fav_meastern`, `fav_namericanindian`, `fav_latino`, `fav_animals`, `fantasy_twogirls`, `fantasy_twoguys`, `fantasy_public`, `fantasy_boat`, `fantasy_dominatrix`, `fantasy_beach`, `fantasy_outdoors`, `fantasy_askme`, `fantasy_toys`, `fantasy_illegal`, `turnon_butt`, `turnon_legs`, `turnon_chest`, `turnon_hands`, `turnon_tan`, `turnon_mind`, `turnon_feet`, `turnon_askme`, `turnon_hair`, `turnon_piercings`, `turnon_money`, `turnon_power`, `turnon_size`, `turnon_hardbody`, `turnon_mysecret`, `smoke_do`, `smoke_dislike`, `drink_do`, `drink_dislike`, `tattoo_have`, `tattoo_dislike`, `piercings_have`, `piercings_dislike`, `worsttrait`, `besttrait`, `zipcode`, `tsjoinedon`, `tsmodified`, `visits`, `numimages`, `membertype`) VALUES ('$userID', '$this->NewMember_dob', 'no title yet', '$this->NewMember_into_friends', '$this->NewMember_into_flirting', '$this->NewMember_into_relatio', '$this->NewMember_into_sex', '$this->NewMember_into_fetish', '$this->NewMember_seek_m', '$this->NewMember_seek_w', '$this->NewMember_seek_t', '$this->NewMember_seek_c', '0', '1', '0', '0', '0', '0', '0', '0', '0', '$this->NewMember_fant_2girls', '$this->NewMember_fant_2guys', '$this->NewMember_fant_public', '$this->NewMember_fant_boat', '$this->NewMember_fant_domin', '$this->NewMember_fant_beach', '$this->NewMember_fant_outdoor', '$this->NewMember_fant_askme', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', 1, '$this->NewMember_besttrait', '$this->NewMember_zipcode', 1219298984, 1220604485, '$this->NewMember_visits', 1, 'Silver')") or die (mysql_error());
        				echo '<font color="red">INSERT</font> >> USER_PROFILE_SPECS<br>';
        
              	// Create/Insert New Member Essay Record -----------------------
              	$sql_NewMbrSpecs= mysql_query("INSERT INTO user_profile_essay (userid, aboutme, approved1, aboutyou, approved2, tscreated) VALUES('$userID', '$__Essay_aboutMe', '1', 'SAMPLE YOU', '1', '$this->NewMember_ts_created') ") or die (mysql_error());
          			echo '<font color="red">INSERT</font> >> USER_PROFILE_ESSAY<br>';
          		// ===============================================================
          		
        
        
        				echo $Counter.'&nbsp;<font color=green><b>GOOD:</b></font> '.$this->NewMember_email_addr.'<br>';
          		}else{
          			echo $Counter.'&nbsp;<font color=red><b>FAIL:</b></font> '.$this->NewMember_email_addr.'<br>';
          		}
          		
          		echo '<br><br>';



							// ---------------------------------

    					$counter++;
    					$total_counter++;
    				}
    				

    		}
    		// ---------------------------------------

    
    


		$master_counter++;
		} // END FOREACH
		// ---------------------------------


// =========================================================

	 return $_return;

	}
	// =================================================================












	// METHOD :: get user mail read rate ===============================
	public function GetUserReadRate($UserID){

		$_return				= false;
		$sql_num_rows		=	false;

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------


		$sql_queryA			= mysql_query("SELECT DISTINCT * FROM user_conversations WHERE user_conversations.rec_userid = '$UserID' AND user_conversations.readlatest = '1'");
		$sql_num_rowsA	=	mysql_num_rows($sql_queryA);

		$sql_queryB			= mysql_query("SELECT * FROM user_conversations WHERE user_conversations.rec_userid = '$UserID'");
		$sql_num_rowsB	=	mysql_num_rows($sql_queryB);

		$_totalMsgs			= $sql_num_rowsB;
		$_totalReadMsgs	= $sql_num_rowsA;
		
		if($_totalMsgs){
			$_ReadRate			=	round($_totalReadMsgs / $_totalMsgs * 100);
		}else{
			$_ReadRate			=	0;
		}


		if($_ReadRate){
			$_return				= $_ReadRate;
		}else{
			$_return				= 0;
		}


		// destroy database connection object --------
		$obj_db->Close();
		// -------------------------------------------


	 return $_return;
	}
	// =================================================================







	// METHOD :: get user mail reply rate ==============================
	public function GetUserReplyRate($UserID){

		$_return				= false;
		$sql_num_rows		=	false;

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------


		$sql_queryA						= @mysql_query("SELECT DISTINCT * FROM user_conversation_msgs WHERE user_conversation_msgs.toid = '$UserID' AND user_conversation_msgs.read = '1'");
		$sql_num_rowsA				=	@mysql_num_rows($sql_queryA);
		$__TotalMsgs					=	$sql_num_rowsA;

		// populate result array --------------------
		$counter = 0;
		while($sql_array_result	=	@mysql_fetch_assoc($sql_queryA)){
			$ResultArray[$counter] = $sql_array_result;
			$counter++;
		}
		// -------------------------------------------

		if($sql_num_rowsA){

  		foreach($ResultArray as $key){
  
  			$_ConversationID		=	$key['conversationid'];
  
  			$sql_queryB					= @mysql_query("SELECT * FROM user_conversation_msgs WHERE user_conversation_msgs.conversationid = '$_ConversationID' AND user_conversation_msgs.fromid = '$UserID'");
  			$sql_num_rowsB			=	@mysql_num_rows($sql_queryB);
  			
  			if($sql_num_rowsB){
  				$__TotalReplyCount++;
  			}
  		}

  		if($__TotalMsgs){
  			$_return							=	round($__TotalReplyCount / $__TotalMsgs * 100);
  		}else{
  			$_return							=	0;
  		}

		}else{
			$_return							=	0;
		}




		// destroy database connection object --------
		$obj_db->Close();
		// -------------------------------------------


	 return $_return;
	}
	// =================================================================







	// METHOD :: Activate ==============================================
	public function CheckNotificationStatus($UserID){

		$_return				= false;
		$sql_num_rows		=	false;

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------


		$sql_query			= mysql_query("SELECT user_profile_specs.setting_mailnotifier FROM user_profile_specs WHERE user_profile_specs.userid = '$UserID' AND user_profile_specs.setting_mailnotifier = '1'");
		$sql_num_rows		=	mysql_num_rows($sql_query);

		if($sql_num_rows != false){
			$_return			= true;
		}

		// destroy database connection object --------
		$obj_db->Close();
		// -------------------------------------------


	 return $_return;
	}
	// =================================================================










	// METHOD :: Activate ==============================================
	public function SendeMail($eMailAddr, $FromUser, $Subject, $Message){


		// class.phpmailer	class ----------------------------------------
		//require("class.phpmailer.php");
		
		// Activation Letter to New Member
		$mail 					= new PHPMailer();
		$mail->Sender   = "bounce@".$this->SiteDomain;
		$mail->From     = $FromUser.$this->SiteDomain;
		$mail->FromName = 'jmCRM|Business Intelligence System';
		$mail->Subject  = $Subject;
		$mail->Body    	= $Message;
		$mail->AddAddress($eMailAddr, 'jmCRM Authorized User');
		$mail->Send();
		
	}
	// =================================================================










	// METHOD :: Get Defined Status ====================================
	public function GetStatus($UserID, $State){

		$_return				= false;

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

		switch($State){

			// verified photos -----------------------------------
			case 'verified photos':
				$sql_query			= mysql_query("SELECT user_profile_specs.verified FROM user_profile_specs WHERE user_profile_specs.userid = '$UserID' AND user_profile_specs.verified = '1'");	
				$sql_obj_result	=	mysql_fetch_object($sql_query);
  			
  			if($sql_obj_result->verified == 1){
  				$_return			=	true;
  			}
			break;
			// ---------------------------------------------------

			// special member ------------------------------------
			case 'special mail':
			$sql_query				= mysql_query("SELECT user_upgrade.productid FROM user_upgrade WHERE user_upgrade.userid = '$UserID' AND user_upgrade.tsexpiration > '$CurrentTS'");
			$sql_obj_result		=	mysql_fetch_object($sql_query);

			if($sql_obj_result->productid > 2){
				$_return				= true;
			}
			break;
			// ---------------------------------------------------

			// special member ------------------------------------
			case 'special':
			$sql_query				= mysql_query("SELECT user_upgrade.productid FROM user_upgrade WHERE user_upgrade.userid = '$UserID' AND user_upgrade.tsexpiration > '$CurrentTS'");
			$sql_obj_result		=	mysql_fetch_object($sql_query);

			if($sql_obj_result->productid > 2){
				$_return				= true;
			}
			break;
			// ---------------------------------------------------

			// free member ------------------------------------
			case 'member.free':
			$sql_query				= mysql_query("SELECT user_upgrade.productid FROM user_upgrade WHERE user_upgrade.userid = '$UserID' AND user_upgrade.tsexpiration > '$CurrentTS'");
			$sql_obj_result		=	mysql_fetch_object($sql_query);

			if(!$sql_obj_result->productid){
				$_return				= true;
			}
			break;
			// ---------------------------------------------------


		}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;  	
	}
	// =================================================================







	// METHOD :: Get Defined Status (better version) ===================
	public function GetStatus_R2($UserID){

		$_return				= false;
		$CurrentTS			= time();

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

		$ArrayStatus[]	= null;


			// verified photos -----------------------------------
				$sql_query			= mysql_query("SELECT user_profile_specs.verified FROM user_profile_specs WHERE user_profile_specs.userid = '$UserID' AND user_profile_specs.verified = '1'");	
				$sql_obj_result	=	mysql_fetch_object($sql_query);
  			
  			if($sql_obj_result->verified == 1){
  				$ArrayStatus['member_verified']				= true;
  			}

			$sql_query				= mysql_query("SELECT user_upgrade.productid, user_upgrade.productname FROM user_upgrade WHERE user_upgrade.userid = '$UserID' AND user_upgrade.tsexpiration > '$CurrentTS'");
			$sql_obj_result		=	mysql_fetch_object($sql_query);

			if(!$sql_obj_result){
				$ArrayStatus['product_name'] = 'Free Member [UPGRADE]';
			}else{
				$ArrayStatus['product_name'] = $sql_obj_result->productname;
			}

			
			

/*
			if($sql_obj_result->productid == 3){
				$ArrayStatus['member_account_high']			= true;
			}elseif($sql_obj_result->productid == 2){
				$ArrayStatus['member_account_middle']		= true;
			}elseif($sql_obj_result->productid == 1){
				$ArrayStatus['member_account_low']			= true;
			}elseif($sql_obj_result->productid == 4){
				$ArrayStatus['member_account_trial']		= true;
			}elseif($sql_obj_result->productid == 5){
				$ArrayStatus['member_account_female']		= true;


			}elseif(!$sql_obj_result->productid){
				$ArrayStatus['member_account_free']			= true;
			}
*/

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $ArrayStatus;  	
	}
	// =================================================================









	// METHOD :: Get Friend Status =====================================
	public function GetFriendStatus($FriendUserID, $OwnerID){

		$_return				= false;


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------


		//$sql_query			= mysql_query("SELECT user_network.id, user_network.type, user_network.status FROM user_network WHERE user_network.owner_userid = '$OwnerID' AND user_network.friend_userid = '$FriendUserID' OR user_network.owner_userid = '$FriendUserID' AND user_network.friend_userid = '$OwnerID'");
		$sql_query			= mysql_query("SELECT user_network.id, user_network.type, user_network.status FROM user_network WHERE user_network.owner_userid = '$OwnerID' AND user_network.friend_userid = '$FriendUserID'");
  	$sql_obj_result	=	mysql_fetch_object($sql_query);


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		switch($sql_obj_result->type){
			
			// friend ------------------------
			case(2):
				
				if($sql_obj_result->status == 0){
					$_return			=	'friend.pending';
				}elseif($sql_obj_result->status == 1){
					$_return			=	'friend.accepted';
				}elseif($sql_obj_result->status == 2){
					$_return			=	'friend.denied';
				}
			break;
			// -------------------------------

			// block -------------------------
			case(3):

				//$sql_query			= mysql_query("SELECT * FROM user_network WHERE user_network.owner_userid = '$OwnerID' AND user_network.friend_userid = '$FriendUserID' ");
  			//$sql_obj_result	=	mysql_fetch_object($sql_query);

					$_return			=	'friend.block';
			break;
			// -------------------------------

			// default -----------------------
			default:
					$_return			=	'friend.none';
			break;
			// -------------------------------			
		}

/*
  	if( $sql_obj_result->type == 1 ){
  		$_return			=	'fav';
  	}elseif( $sql_obj_result->type == 2 && ){
  		$_return			=	'friend';
  	}elseif( $sql_obj_result->type == 3 ){
  		$_return			=	'block';
		}else{
			$_return			= 'none';
		}
*/

	 return $_return;  	
	}
	// =================================================================









	// METHOD :: Check for Pending Friend Request ======================
	public function CheckPendingFriendRequests($UserID, $RequestingUserID){

		$_return				= false;


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------


		$sql_query			= mysql_query("SELECT * FROM user_network WHERE user_network.owner_userid = '$RequestingUserID' AND user_network.friend_userid = '$UserID'");
  	$sql_obj_result	=	mysql_fetch_object($sql_query);


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------

		if($sql_obj_result->id){
			return true;
		}else{
			return false;
		}

	}
	// =================================================================












	// METHOD :: GetZIPCode ============================================
	public function GetMemberZIPCode($MemberID){

		$_return									= false;

  	// Retrieve Password ---------------------------------------------
		$sql_ZIPCode	= mysql_query("SELECT UPS.zipcode FROM user_profile_specs UPS WHERE UPS.userid = '$MemberID'"); 
  	$sql_obj_result	=	mysql_fetch_object($sql_ZIPCode);

  	if( $sql_obj_result == true ){
  		$_return			=	$sql_obj_result->zipcode;
		}else{
			$_return			= false;
		}


	 return $_return;  	
	}
	// =================================================================










	// METHOD :: Get IM Status =========================================
	public function GetIMStatus($UserID){

		$_return									= false;

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

		$sql_query			= mysql_query("SELECT user_profile_specs.setting_im FROM user_profile_specs WHERE user_profile_specs.userid = '$UserID'");
  	$sql_obj_result	=	mysql_fetch_object($sql_query);

  	if($sql_obj_result){
  		$_return			=	$sql_obj_result->setting_im;
		}else{
			$_return			= false;
		}

		// destroy database connection object --------
		$obj_db->Close();
		// -------------------------------------------

	 return $_return;  	
	}
	// =================================================================










	// METHOD :: Get Mailing Address ===================================
	public function GetGiftBoxData($UserID){

		$_return									= false;
		$sql_num_rows							= null;
		$sql_obj_result						= false;

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  	// get email via USERID ----------------------
		$sql_query		= mysql_query("SELECT user_profile_specs.giftbox_name, user_profile_specs.giftbox_addr1, user_profile_specs.giftbox_addr2, user_profile_specs.giftbox_city, user_profile_specs.giftbox_state, user_profile_specs.giftbox_zipcode, user_profile_specs.giftbox_activated FROM user_profile_specs WHERE user_profile_specs.userid = '$UserID'");
		$sql_num_rows	=	mysql_num_rows($sql_query);


		if($sql_num_rows){
			$sql_obj_result	=	mysql_fetch_object($sql_query);
			$_return			= $sql_obj_result;
		}else{
			$_return			= false;
		}

		// destroy database connection object --------
		$obj_db->Close();
		// -------------------------------------------


	 return $_return;  	
	}
	// =================================================================












	// METHOD :: GeteMailAddress =======================================
	public function GeteMailAddr($MemberID){

		$_return									= false;
		$sql_num_rows							= null;
		$sql_obj_result						= false;

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  	// get email via USERID ----------------------
		$sql_queryA		= mysql_query("SELECT user.email_addr FROM user WHERE user.userid = '$MemberID'");
		$sql_num_rows	=	mysql_num_rows($sql_queryA);


		if($sql_num_rows){
			$sql_obj_result	=	mysql_fetch_object($sql_queryA);

		}else{
			// get email via UserName ------------------
			$sql_queryB			= mysql_query("SELECT user.email_addr FROM user WHERE user.username = '$MemberID'");
			$sql_obj_result	=	mysql_fetch_object($sql_queryB);
		}


  	if($sql_obj_result == true){
			$_return			=	$sql_obj_result->email_addr;	
		}else{
			$_return			= false;
		}

		// destroy database connection object --------
		$obj_db->Close();
		// -------------------------------------------


	 return $_return;  	
	}
	// =================================================================









	// METHOD :: Get Member PromoID ==================================
	public function GetMemberAffPromoID($UserID){

		$_return									= false;
		$sql_num_rows							= null;
		$sql_obj_result						= false;

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  	// get email via USERID ----------------------
		$sql_queryA			= mysql_query("SELECT user.promoid FROM user WHERE user.userid = '$UserID'");
		$sql_obj_result	=	mysql_fetch_object($sql_queryA);


  	if($sql_obj_result){
			$_return			=	$sql_obj_result->promoid;
		}


		// destroy database connection object --------
		$obj_db->Close();
		// -------------------------------------------


	 return $_return;  	
	}
	// =================================================================









	// METHOD :: Get Member Promocode ==================================
	public function GetMemberPromocode($UserID){

		$_return									= false;
		$sql_num_rows							= null;
		$sql_obj_result						= false;

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  	// get email via USERID ----------------------
		$sql_queryA			= mysql_query("SELECT user_promocode.promocode FROM user_promocode WHERE user_promocode.userid = '$UserID'");
		$sql_obj_result	=	mysql_fetch_object($sql_queryA);


  	if($sql_obj_result){
			$_return			=	$sql_obj_result->promocode;
		}


		// destroy database connection object --------
		$obj_db->Close();
		// -------------------------------------------


	 return $_return;  	
	}
	// =================================================================













	// METHOD :: BasicProfileReminder ==================================
	public function BasicProfileReminder($MemberID){

		$__BasicProfileScore							= array();
		$__BasicProfileScore['status']		=	'pass';
		$_return													= false;

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1, 'friendsnflings.com'); //read operation
		// -------------------------------------------

  	// check for 1 image -------------------------
		$sql_queryA			= mysql_query("SELECT * FROM user_images WHERE user_images.userid = '$MemberID' AND user_images.filename > 0 AND user_images.approved != '2'");
		$sql_num_rowsA	=	mysql_num_rows($sql_queryA);
		
		if($sql_num_rowsA){
			$__BasicProfileScore['photo']		=	1;
		}else{
			$__BasicProfileScore['photo']		=	0;
			$__BasicProfileScore['status']	=	'fail';
		}
		// -------------------------------------------


  	// check for write-up about me ---------------
		$sql_queryB			= mysql_query("SELECT * FROM user_profile_essay WHERE user_profile_essay.userid = '$MemberID' AND user_profile_essay.aboutme > '' AND user_profile_essay.approved1 != '2'");
		$sql_num_rowsB	=	mysql_num_rows($sql_queryB);

		if($sql_num_rowsB){
			$__BasicProfileScore['aboutme']		=	1;
		}else{
			$__BasicProfileScore['aboutme']		=	0;
			$__BasicProfileScore['status']		=	'fail';
		}
		// -------------------------------------------


  	// check for write-up about me ---------------
		$sql_queryC			= mysql_query("SELECT * FROM user_profile_essay WHERE user_profile_essay.userid = '$MemberID' AND user_profile_essay.aboutyou > '' AND user_profile_essay.approved2 != '2'");
		$sql_num_rowsC	=	mysql_num_rows($sql_queryC);

		if($sql_num_rowsC){
			$__BasicProfileScore['aboutyou']		=	1;
		}else{
			$__BasicProfileScore['aboutyou']		=	0;
			$__BasicProfileScore['status']			=	'fail';
		}
		// -------------------------------------------		


		// destroy database connection object --------
		$obj_db->Close();
		// -------------------------------------------


		$_return	=	$__BasicProfileScore;


	 return $_return;
	}
	// =================================================================













	// METHOD :: GetMemberProfile =======================================
	public function GetMemberProfile($MemberID){

		$_return									= false;
		$CurrentTime							= time();


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  	// Retrieve Profile ----------------------------------------------
		$sql_MbrSpec		= mysql_query("SELECT * FROM user_profile_specs, user WHERE user_profile_specs.userid = '$MemberID' AND user.userid = '$MemberID'"); 
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















	// =================================================================
		protected function __profileSpec($Type, $Value){
			
			$_return = false;
			
			switch($Type){


				// status ----------------------
				case('status'):
					switch($Value){
						case(1):
							$_return = 'Well I\'m here!';
						break;

						case(2):
							$_return = 'Cohabitating';
						break;

						case(3):
							$_return = 'Divorced';
						break;

						case(4):
							$_return = 'Married';
						break;

						case(5):
							$_return = 'Married Happily';
						break;

						case(6):
							$_return = 'Married Unhappily';
						break;

						case(7):
							$_return = 'Separated';
						break;

						case(8):
							$_return = 'Dating';
						break;

						case(9):
							$_return = 'Dating & Looking';
						break;

						case(10):
							$_return = 'Involved';
						break;

						case(11):
							$_return = 'Involved But Looking';
						break;

						case(12):
							$_return = 'Single';
						break;

						case(13):
							$_return = 'Widowed';
						break;

						case(14):
							$_return = 'Other';
						break;

						case(15):
							$_return = 'Just Browsing';
						break;

					}
				break;
				// -----------------------------


				// hotness ---------------------
				case('hotness'):
					switch($Value){
						case(1):
							$_return = 'Maybe You\'ll Find Out';	
						break;

						case(2):
							$_return = 'Maybe I\'ll Show You';	
						break;

						case(3):
							$_return = 'Beaten with Ugly Stick';
						break;

						case(4):
							$_return = 'Cool';
						break;

						case(5):
							$_return = 'Luke Warm';
						break;

						case(6):
							$_return = 'Warm';
						break;

						case(7):
							$_return = 'Hot';
						break;

						case(8):
							$_return = 'Smokin\'';
						break;

						case(9):
							$_return = 'Fugly';
						break;

						case(10):
							$_return = 'Supa\' Fine';
						break;

						case(11):
							$_return = 'On Fire!';
						break;

						case(12):
							$_return = 'Average';
						break;

						case(13):
							$_return = 'You Tell Me!';
						break;

						case(14):
							$_return = 'I Turn Heads';
						break;

						case(15):
							$_return = 'I Scare Children';
						break;

					}
				break;
				// -----------------------------


				
				// haircolor -------------------
				case('haircolor'):
					switch($Value){

						case(0):
							$_return = 'Use Your Imagination';
						break;
						
						case(1):
							$_return = 'Black';
						break;

						case(2):
							$_return = 'Blonde';
						break;

						case(3):
							$_return = 'Brown';
						break;

						case(4):
							$_return = 'Light-Brown';
						break;

						case(5):
							$_return = 'Red';
						break;

						case(6):
							$_return = 'Sale & Pepper';
						break;

						case(7):
							$_return = 'Gray';
						break;

						case(8):
							$_return = 'Kaleidoscope';
						break;

						case(9):
							$_return = 'Klingon';
						break;

						case(10):
							$_return = 'Bald';
						break;

						case(11):
							$_return = 'Homer Simpson';
						break;

					}
				break;
				// -----------------------------


				// eyecolor --------------------
				case('eyecolor'):
					switch($Value){

						case(1):
							$_return = 'Maybe You\'ll See';
						break;
						
						case(2):
							$_return = 'Blue';
						break;

						case(3):
							$_return = 'Brown';
						break;

						case(4):
							$_return = 'Gray';
						break;

						case(5):
							$_return = 'Green';
						break;

						case(6):
							$_return = 'Hazel';
						break;

						case(7):
							$_return = 'Black';
						break;

						case(8):
							$_return = 'Eye Patch';
						break;

						case(9):
							$_return = 'Empty Sockets';
						break;

					}
				break;
				// -----------------------------


				// personality -----------------
				case('personality'):
					switch($Value){

						case(1):
							$_return = 'Normal';
						break;
						
						case(2):
							$_return = 'Even Steven';
						break;

						case(3):
							$_return = 'Bubbly';
						break;

						case(4):
							$_return = 'Manic';
						break;

						case(5):
							$_return = 'Psycho';
						break;

						case(6):
							$_return = 'Type A';
						break;

						case(7):
							$_return = 'Type B';
						break;

						case(8):
							$_return = 'Type Unknown';
						break;

						case(9):
							$_return = 'Social';
						break;

						case(10):
							$_return = 'Passive';
						break;

						case(11):
							$_return = 'Aggressive';
						break;

					}
				break;
				// -----------------------------


				// bodytype --------------------
				case('bodytype'):
					switch($Value){

						case(1):
							$_return = 'Wanna\' Find Out?';
						break;
						
						case(2):
							$_return = 'Athletic';
						break;

						case(3):
							$_return = 'A Few Extra Pounds';
						break;

						case(4):
							$_return = 'Average';
						break;

						case(5):
							$_return = 'Disabled';
						break;

						case(6):
							$_return = 'Full';
						break;

						case(7):
							$_return = 'Large';
						break;

						case(8):
							$_return = 'Muscular';
						break;

						case(9):
							$_return = 'Petite';
						break;

						case(10):
							$_return = 'Slim';
						break;

						case(11):
							$_return = 'Other';
						break;

					}
				break;
				// -----------------------------


				// income ----------------------
				case('income'):
					switch($Value){

						case(1):
							$_return = 'I Do OK';
						break;
						
						case(2):
							$_return = 'I Do Well';
						break;

						case(3):
							$_return = 'I\'m Poor';
						break;

						case(4):
							$_return = 'Less Than $25K';
						break;

						case(5):
							$_return = '$25K - $35K';
						break;

						case(6):
							$_return = '$35K - $50K';
						break;

						case(7):
							$_return = '$50K - $75K';
						break;

						case(8):
							$_return = '$75K - $100K';
						break;

						case(9):
							$_return = '$100K - $150K';
						break;

						case(10):
							$_return = '$150K+';
						break;

						case(11):
							$_return = 'I\'m Rich Biatch!';
						break;

						case(12):
							$_return = 'I Live Off the Government!';
						break;

						case(13):
							$_return = 'I Live Off My Parents';
						break;

						case(14):
							$_return = 'I\'m Hoping You\'ll Share!';
						break;

						case(15):
							$_return = 'I\'ve Seen Money Before';
						break;


					}
				break;
				// -----------------------------



				// profession ------------------
				case('profession'):
					switch($Value){

						case(1):
							$_return = 'This and That';
						break;
						
						case(2):
							$_return = 'Artist';
						break;

						case(3):
							$_return = 'Administrative';
						break;

						case(4):
							$_return = 'Computer';
						break;

						case(5):
							$_return = 'Computer Scientist';
						break;

						case(6):
							$_return = 'Construction';
						break;

						case(7):
							$_return = 'Criminal';
						break;

						case(8):
							$_return = 'Dancer';
						break;

						case(9):
							$_return = 'Drug Smuggler';
						break;

						case(10):
							$_return = 'Entertainer';
						break;

						case(11):
							$_return = 'Executive / Manager';
						break;

						case(12):
							$_return = 'Finance';
						break;

						case(13):
							$_return = 'Food Services';
						break;

						case(14):
							$_return = 'Hustler';
						break;

						case(15):
							$_return = 'Legal';
						break;

						case(16):
							$_return = 'Medical/Dental';
						break;

						case(17):
							$_return = 'Pimp';
						break;

						case(18):
							$_return = 'Politics';
						break;

						case(19):
							$_return = 'Real Estate';
						break;

						case(20):
							$_return = 'Retired';
						break;

						case(21):
							$_return = 'Sales & Marketing';
						break;

						case(22):
							$_return = 'Self Employed';
						break;

						case(23):
							$_return = 'Software Engineer';
						break;

						case(24):
							$_return = 'Student';
						break;

						case(25):
							$_return = 'Stripper';
						break;

						case(26):
							$_return = 'Teacher / Professor';
						break;

						case(27):
							$_return = 'It\'s Technical';
						break;

						case(28):
							$_return = 'Tycoon';
						break;

						case(29):
							$_return = 'Transportation';
						break;

						case(30):
							$_return = 'Water Boy';
						break;

						case(31):
							$_return = 'Other';
						break;

						case(32):
							$_return = 'Unemployed';
						break;

					}
				break;
				// -----------------------------



				// religion --------------------
				case('religion'):
					switch($Value){

						case(1):
							$_return = 'Tell You Later';
						break;
						
						case(2):
							$_return = 'Atheist';
						break;

						case(3):
							$_return = 'Agnostic';
						break;

						case(4):
							$_return = 'Buddhist';
						break;

						case(5):
							$_return = 'Christian';
						break;

						case(6):
							$_return = 'Catholic';
						break;

						case(7):
							$_return = 'Hindu';
						break;

						case(8):
							$_return = 'Jewish';
						break;

						case(9):
							$_return = 'Mormon';
						break;

						case(10):
							$_return = 'Muslim';
						break;

						case(11):
							$_return = 'Other';
						break;

						case(12):
							$_return = 'Spiritual';
						break;

						case(13):
							$_return = 'No Opinion';
						break;

					}
				break;
				// -----------------------------



				// joinedon --------------------
				case('joinedon'):
					$_return = date("F Y", $Value);
				break;
				// -----------------------------


				// seeking ---------------------
				case('seeking'):
				
				
				
					$_return = date("F Y", $Value);
				break;
				// -----------------------------



				


			}
		
		return $_return;	
		}
	// =================================================================








	// __METHOD :: Generate Random Strings per Length ==================
	public function GenerateRandomString($Length = 5){

    $code 		= md5(uniqid(rand(), true));
    $_return 	= substr($code, 0, $Length);

 	return $_return;
	}
	// =================================================================







	// __METHOD :: Shorten =============================================
	public function _stringShorten($Input, $NumCharacters, $EndString = '...'){

		$_return		= false;
		
    if(strlen($Input) < $NumCharacters){
  		$_return	=	$Input;
  	
  	}elseif(strlen($Input) >= $NumCharacters){
  		$Input		=	substr($Input, 0, $NumCharacters);
  		$_return	=	$Input.$EndString;
  	}

 	return $_return;
	}
	// =================================================================











	// METHOD :: Report ================================================
	public function Report($UserID, $Type, $Parameters = 0, $Option = 0, $Color = null){

		$_return					= false;




    //report type --------------------------------
    switch($Type){
    	
    	// -------------------------------------------------------------
    	case 'profile_visitors':

				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------
    		
    		$sql_result		= mysql_query("SELECT DISTINCT user_session_actions.userid, user.username FROM user_session_actions, user WHERE user_session_actions.relativedata = '$UserID' AND user.userid = user_session_actions.userid ORDER BY user_session_actions.ts DESC LIMIT 14");
				$sql_num_rows	=	mysql_num_rows($sql_result);
				
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
    			
    			$counter	=	0;
    			echo '<table border=0 cellpadding="0" cellspacing="0" width="100%" style="height: 155px;"><tr>';
      		foreach($ResultArray as $key => $value){
      			echo '<td align="center" valign="center">';
      				echo '<table cellpadding="0" cellspacing="0"><tr><td>';
      			
        			if($sql_num_rows < 5){
        				//$this->ImageDisplay($value['userid'], 1, 1, false, 0);
        				$this->ImageDisplay_2($UserID, $value['userid'], 2, 1, false, true);
        			}else{
        				//$this->ImageDisplay($value['userid'], 2, 1, false, 0);
        				$this->ImageDisplay_2($UserID, $value['userid'], 1, 1, false, true);
        			}
      			
      				echo '</td></tr><tr><td align="center">';
      				echo ($sql_num_rows < 5 ? '<font size="2">':'<font size="1">').$this->_stringShorten(ucwords($value['username']),8).'</font>';
      				echo '</td></tr></table>';
      			echo '</td>';
      			echo ($counter == 6 ? '</tr><tr>':'');
      			$counter++;
      		}
      		echo '</table>';
    		}else{
    			echo '<a href="Search"><img src="common/img/promotional/no-one-peeped-you.jpg" border="0"></a>';
    		}

    	break;
    	// -------------------------------------------------------------





    	// -------------------------------------------------------------
    	case 'online_now':


    		if($Option === 'fullpage'){
    			$_sql_record_limit	=	'49';
    			$_thumbnailSize			=	'large';
    			$_table_Setup				= '<table style="width: 100%; height: 230px; border: 0px solid #ff0000; margin: 0; padding: 0; padding-top: 5px;" cellpadding="0" cellspacing="0"><tr>';

    		}else{
    			$_sql_record_limit	=	'21';
    			$_table_Setup				= '<table style="width: 456px; height: 230px; border: 0px solid #ff0000; margin: 0; padding: 0; padding-top: 5px;" cellpadding="0" cellspacing="0"><tr>';
    		}


				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------
    		$_expiration	=	time() - 120;	//120 seconds = 2 minutes

    		// gender seeking definition -----------------
    		$__SELECT_s1	=	null;
    		$__SELECT_s2	=	null;
    		$__SELECT_s3	=	null;
    		$__SELECT_s4	=	null;
    
    		$_seekingArray	=	str_split($Parameters);

    
    		foreach($_seekingArray as $key => $value){
    			//if($key == 0 & $value == 1){ echo 'Seeking Men';}
    			if($key == 0 & $value == 1){ $__SELECT_s1	= "'1', "; }
    			
    			//if($key == 1 & $value == 1){ echo 'Seeking Women';}
    			if($key == 1 & $value == 1){ $__SELECT_s2	= "'2', "; }
    			
    			//if($key == 2 & $value == 1){ echo 'Seeking Trannies';}
    			if($key == 2 & $value == 1){ $__SELECT_s3	= "'3', "; }
    			
    			//if($key == 3 & $value == 1){ echo 'Seeking Couples';}
    			if($key == 3 & $value == 1){ $__SELECT_s4	= "'4' "; }
    		}
    		// -------------------------------------------
    		
    		$_SELECT_sMASTER	=	$__SELECT_s1.$__SELECT_s2.$__SELECT_s3.$__SELECT_s4;
    		$_SELECT_sMASTER	= preg_replace('/[\s]?,[\s]?$/i','',$_SELECT_sMASTER);


    		// zipcode/geocode definition ----------------
    		$ziparray = $this->ZIPCodeLookup($this->GetMemberZIPCode($UserID), '750');

    		$__SELECT_zMASTER	= null;
    		$__ArrayCount			=	count($ziparray);
    		
    		foreach($ziparray as $key => $value){
       		$__SELECT_zMASTER	.=	'\''.$value.'\''.($__ArrayCount == $key+1 ? ' ':', ');
    		}
    		// -------------------------------------------


/*
				$_SELECT_MASTER				= "
				SELECT DISTINCT U.userid, U.username 
				FROM user U 
				WHERE U.ts_lastaction > '$_expiration' AND U.gender IN (".$_SELECT_sMASTER.") 
				ORDER BY RAND() DESC LIMIT 21
				";
*/

				$_SELECT_MASTER		=	"
				SELECT DISTINCT U.* , UI.*, UPS.* 
				FROM user U
				LEFT JOIN user_images UI ON UI.userid = U.userid
				INNER JOIN user_profile_specs UPS ON UPS.userid = U.userid 
				AND (UPS.into_friends = '1' OR UPS.into_flirting = '1' OR UPS.into_relationship = '1' OR UPS.into_sex = '1' OR UPS.into_fetish = '1')
				WHERE U.ts_lastaction > '$_expiration' AND U.disabled != '1' AND UPS.setting_disable != '1' AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.")
				GROUP BY U.userid 
				ORDER BY U.ts_lastaction LIMIT ".$_sql_record_limit."";

    		$sql_result				= mysql_query($_SELECT_MASTER);
				$sql_num_rows			=	@mysql_num_rows($sql_result);
				
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

					
					
					
					// ---------------------------------------------------------------------
    			$counter	=	1;

    			echo $_table_Setup;


      		foreach($ResultArray as $key => $value){


						// friend status conversion ----------
						switch($value['status']){
							case 0:
								$_friend_Status	=	'<font color="#f7b400" size="1"><i>Pending</i></font>';
							break;

							case 1:
								$_friend_Status	=	'<font style="color: #00ff00; font-size: 10px; z-index: 200;"><i>Accepted</i></font>';
							break;
						}
						// -----------------------------------

						// check for blocked type ------------
						if($value['type'] == 3){
							$_friend_Status	=	'<font style="color: #ff0000; font-size: 10px; z-index: 200;"><i>Blocked</i></font>';
						}
						// -----------------------------------



      			echo '<td align="center" valign="center">';
      				//echo '<table border="1" id="ThumbnailTable_'.$Parameters.$counter.' cellpadding="0" cellspacing="0" style="margin-top: 5px;"><tr><td align="center" valign="center" colspan="2">';
      				

							// thumbnail sizing --------------------------
							if($_thumbnailSize == 'large'){
								$this->ImageDisplay_2($UserID, $value['userid'], 2, 1, false, true, false);
							}else{

            			if($sql_num_rows > 8){
            				echo '<div id="ThumbnailTable_'.$Parameters.$counter.'" style="border: 0px solid #000000; width: 50px; height: 70px; padding: 0 0 0 0; margin: 0 0 0 0;">';
  									echo '<div id="Thumbnail_'.$Parameters.$counter.'" style="height: 50px; width: 50px; border: 0px solid #F00; padding: 0 0 0 0; margin: 0 0 0 0;"> <!-- <div style="position: absolute; border: 1px solid #ff0000; background: #000000; width: 50px; height: 15px; padding: 0 0 0 0; margin: 0 0 0 0; z-index: 50; filter: alpha(opacity=65); -moz-opacity: .65; opacity: .65;">'.$_friend_Status.'</div> -->';
            				$this->ImageDisplay_2($UserID, $value['userid'], 1, 1, false, true);
            			}else{
            				echo '<div id="ThumbnailTable_'.$Parameters.$counter.'" style="border: 0px solid #000000; width: 100px; height: 130px;">';
            				echo '<div id="Thumbnail_'.$Parameters.$counter.'" style="height: 100px; width: 100px; border: 0px solid #F00; padding: 0 0 0 0; margin: 0 0 0 0;"> <!-- <div style="position: absolute; background: #000000; height: 15px; width: 101px; padding: 0 0 0 0; margin: 0; margin-top: 0px; z-index: 50; filter: alpha(opacity=65); -moz-opacity: .65; opacity: .65;">'.$_friend_Status.'</div> -->';
            				$this->ImageDisplay_2($UserID, $value['userid'], 2, 1, false, true);
            			}
  							echo '</div>';
  							// END thumbnail -------------------
							}




							//echo ($sql_num_rows > 4 ? '<font style="font-size: 10px;">':'<font style="font-size: 15px;">').$this->_stringShorten(ucwords($value['username']),10,'').'</font>';

      				if($_sql_record_limit	==	'49'){
      					echo '<font style="font-size: 12px; color: #ffffff; line-height: 16px;">'.trim($this->_stringShorten(ucwords($value['username']),16)).'</font>';
      				}else{
      					echo ($sql_num_rows < 5 ? '<font style="font-size: 12px; color: #000000; line-height: 22px;">':'<font style="font-size: 10px; color: #000000; line-height: 16px;">').$this->_stringShorten(ucwords($value['username']),8,'').'</font>';	
      				}



      			echo '</td>';
      			//echo ($counter == 7 || $counter == 14 ? '</tr><tr>':'');

      			// design layout ---------------------
      			if($sql_num_rows > 8){
      				echo ($counter % 7 == 0 ? '</tr><tr>':'');
      			}else{
      				echo ($counter % 4 == 0 ? '</tr><tr>':'');
      			}
      			//echo ($counter == 7 || $counter == 14 ? '</tr><tr>':'');																				//DEP.02.23.09.NAB
      			//echo ($counter == 7 || $counter == 14 || $counter == 21 || $counter == 28 || $counter == 35 || $counter == 42 ? '</tr><tr>':'');
      			// -----------------------------------
      			
      			
      			$counter++;
      		}
      		echo '</table>';
    		// ---------------------------------------------------------------------



/*
    			$counter	=	1;
    			echo '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="height: 230px;"><tr>';
      		foreach($ResultArray as $key => $value){
      			echo '<td align="center" valign="center">';
      				echo '<table cellpadding="0" cellspacing="0" style="margin-top: 5px;"><tr><td align="center" valign="center">';
      				echo '<a href="ViewProfile-'.$this->Encrypt($value['userid']).'">';


							// thumbnail sizing --------------------------
							if($_thumbnailSize == 'large'){
								$this->ImageDisplay($value['userid'], 1, 0, false, 0);
								//$this->ImageDisplay_2($UserID, $value['userid'], 1, 1, false);
							}else{

          			if($sql_num_rows < 5){
          				//$this->ImageDisplay_2($UserID, $value['userid'], 1, 1, false);
          				$this->ImageDisplay($value['userid'], 2, 1, false, 0);
          			}else{
          				//$this->ImageDisplay_2($UserID, $value['userid'], 1, 1, false);
          				$this->ImageDisplay($value['userid'], 2, 1, false, 0);
          			}

							}
							// -------------------------------------------


      				echo '</a>';
      				echo '</td></tr><tr><td align="center">';
      				
      				if($_sql_record_limit	==	'49'){
      					echo '<font size="2" color="#000000">'.trim($this->_stringShorten(ucwords($value['username']),16)).'</font>';
      				}else{
      					echo ($sql_num_rows < 5 ? '<font size="2" color="#000000">':'<font size="1" color="#000000">').$this->_stringShorten(ucwords($value['username']),8).'</font>';	
      				}      				
      				echo '</td></tr></table>';
      			echo '</td>';
      			echo ($counter == 7 || $counter == 14 || $counter == 21 || $counter == 28 || $counter == 35 || $counter == 42 ? '</tr><tr>':'');
      			$counter++;
      		}
      		echo '</table>';
*/      		
      		
      		
    		}else{
    			echo '<a href="Search"><img src="common/img/promotional/no-online-members.jpg" border="0"></a>';
    		}

    	break;
    	// -------------------------------------------------------------





    	// -------------------------------------------------------------
    	case 'most_popular':


				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------
    		$_expiration	=	time() - 86400;


    		// gender seeking definition -----------------
    		$__SELECT_s1	=	null;
    		$__SELECT_s2	=	null;
    		$__SELECT_s3	=	null;
    		$__SELECT_s4	=	null;
    
    		$_seekingArray	=	str_split($Parameters);

    
    		foreach($_seekingArray as $key => $value){
    			//if($key == 0 & $value == 1){ echo 'Seeking Men';}
    			if($key == 0 & $value == 1){ $__SELECT_s1	= "'1', "; }
    			
    			//if($key == 1 & $value == 1){ echo 'Seeking Women';}
    			if($key == 1 & $value == 1){ $__SELECT_s2	= "'2', "; }
    			
    			//if($key == 2 & $value == 1){ echo 'Seeking Trannies';}
    			if($key == 2 & $value == 1){ $__SELECT_s3	= "'3', "; }
    			
    			//if($key == 3 & $value == 1){ echo 'Seeking Couples';}
    			if($key == 3 & $value == 1){ $__SELECT_s4	= "'4' "; }
    		}
    		// -------------------------------------------
    		
    		$_SELECT_sMASTER	=	$__SELECT_s1.$__SELECT_s2.$__SELECT_s3.$__SELECT_s4;
    		$_SELECT_sMASTER	= preg_replace('/[\s]?,[\s]?$/i','',$_SELECT_sMASTER);




    		// zipcode/geocode definition ----------------
    		$ziparray = $this->ZIPCodeLookup($this->GetMemberZIPCode($UserID), '750');

    		$__SELECT_zMASTER	= null;
    		$__ArrayCount			=	count($ziparray);
    		
    		foreach($ziparray as $key => $value){
       		$__SELECT_zMASTER	.=	'\''.$value.'\''.($__ArrayCount == $key+1 ? ' ':', ');
    		}
    		// -------------------------------------------


/*
				$sql_query		= "
				SELECT DISTINCT U.userid, U.username 
				FROM user U, user_profile_specs UPS 
				WHERE U.gender IN (".$_SELECT_sMASTER.") 
				ORDER BY RAND(), UPS.visits DESC LIMIT 21
				";


CHANGE LOG QUERY BELOW:
	10.29.08	Lastaction Expiration Removed DEP: 				WHERE U.ts_lastaction > '$_expiration' AND U.disabled != '1' AND UPS.setting_disable != '1' AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.")

*/

				$_SELECT_MASTER		=	"
				SELECT DISTINCT U.* , UI.*, UPS.* 
				FROM user U 
				INNER JOIN user_images UI ON UI.userid = U.userid AND UI.avatar = '1' 
				INNER JOIN user_profile_specs UPS ON UPS.userid = U.userid 
				AND (UPS.into_friends = '1' OR UPS.into_flirting = '1' OR UPS.into_relationship = '1' OR UPS.into_sex = '1' OR UPS.into_fetish = '1')
				WHERE U.disabled != '1' AND UPS.setting_disable != '1' AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.")
				GROUP BY U.userid 
				ORDER BY UPS.visits DESC LIMIT 21";


    		$sql_result		= mysql_query($_SELECT_MASTER);
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
    			
    			echo '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="height: 230px;"><tr>';
      		
      		foreach($ResultArray as $key => $value){
      			echo '<td align="center" valign="center">';
      				echo '<table cellpadding="0" cellspacing="0" style="margin-top: 5px;"><tr><td align="center" valign="center">';

        			if($sql_num_rows < 4){
        				//$this->ImageDisplay($value['userid'], 1, 1, false, 0);
        				$this->ImageDisplay_2($UserID, $value['userid'], 2, 1, false, true);
        				
        			}else{
        				//$this->ImageDisplay($value['userid'], 2, 1, false, 0);
        				$this->ImageDisplay_2($UserID, $value['userid'], 1, 1, false, true);
        			}

      				echo '</td></tr><tr><td align="center">';
      				echo ($sql_num_rows < 4 ? '<font size="2">':'<font size="1">').$value['visits'].' Views</font>';
      				echo '</td></tr></table>';
      			echo '</td>';
      			echo ($counter == 7 || $counter == 14 ? '</tr><tr>':'');
      			$counter++;
      		}
      		echo '</table>';
    		}else{
    			echo '<a href="Search"><img src="common/img/promotional/no-hotties-per-your-desires.jpg" border="0"></a>';
    		}

    	break;
    	// -------------------------------------------------------------






    	// -------------------------------------------------------------
    	case 'prereg_preview':


				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------
    		$_expiration	=	time() - 86400;


    		// gender seeking definition -----------------
    		$__SELECT_s1	=	null;
    		$__SELECT_s2	=	null;
    		$__SELECT_s3	=	null;
    		$__SELECT_s4	=	null;
    
    		$_seekingArray	=	str_split($Parameters);

    
    		foreach($_seekingArray as $key => $value){
    			//if($key == 0 & $value == 1){ echo 'Seeking Men';}
    			if($key == 0 & $value == 1){ $__SELECT_s1	= "'1', "; }
    			
    			//if($key == 1 & $value == 1){ echo 'Seeking Women';}
    			if($key == 1 & $value == 1){ $__SELECT_s2	= "'2', "; }
    			
    			//if($key == 2 & $value == 1){ echo 'Seeking Trannies';}
    			if($key == 2 & $value == 1){ $__SELECT_s3	= "'3', "; }
    			
    			//if($key == 3 & $value == 1){ echo 'Seeking Couples';}
    			if($key == 3 & $value == 1){ $__SELECT_s4	= "'4' "; }
    		}
    		// -------------------------------------------
    		
    		$_SELECT_sMASTER	=	$__SELECT_s1.$__SELECT_s2.$__SELECT_s3.$__SELECT_s4;
    		$_SELECT_sMASTER	= preg_replace('/[\s]?,[\s]?$/i','',$_SELECT_sMASTER);




    		// zipcode/geocode definition ----------------
    		$ziparray = $this->ZIPCodeLookup($Option, '750');


    		$__SELECT_zMASTER	= null;
    		$__ArrayCount			=	count($ziparray);
    		
    		foreach($ziparray as $key => $value){
       		$__SELECT_zMASTER	.=	'\''.$value.'\''.($__ArrayCount == $key+1 ? ' ':', ');
    		}
    		// -------------------------------------------



				$_SELECT_MASTER		=	"
				SELECT DISTINCT U.* , UI.*, UPS.* 
				FROM user U 
				INNER JOIN user_images UI ON UI.userid = U.userid AND UI.avatar = '1' 
				INNER JOIN user_profile_specs UPS ON UPS.userid = U.userid 
				AND (UPS.into_friends = '1' OR UPS.into_flirting = '1' OR UPS.into_relationship = '1' OR UPS.into_sex = '1' OR UPS.into_fetish = '1')
				WHERE U.disabled != '1' AND UPS.setting_disable != '1' AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.")
				GROUP BY U.userid 
				ORDER BY UPS.visits DESC LIMIT 28";


    		$sql_result		= mysql_query($_SELECT_MASTER);
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
    			
    			echo '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="height: 230px;"><tr>';
      		
      		foreach($ResultArray as $key => $value){
      			echo '<td align="center" valign="center">';
      				echo '<table cellpadding="0" cellspacing="0" style="margin-top: 5px;"><tr><td align="center" valign="center">';
      				//echo '<a href="https://friendsnflings.com/ViewProfile-'.$this->Encrypt($value['userid']).'">';

        			if($sql_num_rows < 4){
        				//$this->ImageDisplay($value['userid'], 1, 1, false, 0);
        				$this->ImageDisplay_2($UserID, $value['userid'], 2, 1, false, true);
        				
        			}else{
        				//$this->ImageDisplay($value['userid'], 2, 1, false, 0);
        				$this->ImageDisplay_2($UserID, $value['userid'], 1, 1, false, true);
        			}


							// -------------------------------------------
							if($value['into_sex'] == 1){

								$_SEX_Array	=	array(
									0		=>	'Sex',
									1		=>	'Booty Call'
								);

								$_desire = $_SEX_Array[rand(0,1)];

							}elseif($value['into_fetish'] == 1){

								$_FETISH_Array	=	array(
									0		=>	'Dirty Sex',
									1		=>	'Nasty Sex',
									2		=>	'Fetish',
									3		=>	'Wild Sex'
								);

								$_desire = $_FETISH_Array[rand(0,3)];

							}elseif($value['into_relationship'] == 1){
								$_desire = 'Love';

							}elseif($value['into_flirting'] == 1){
								$_desire = 'Flirt!';

							}elseif($value['into_friends'] == 1){
								$_desire = 'Friends';
							}

							// -------------------------------------------


      				//echo '</a>';
      				echo '</td></tr><tr><td align="center"><div style="position: relative; height: 15px; left: 0px; border: 1px solid #000000; top: 0px; background: #000000; width: '.($sql_num_rows < 8 ? '100px':'50px').'; padding: 0 0 0 0; margin: 0 0 0 0;  font-size: '.($sql_num_rows < 8 ? '14px':'11px').';  color: #ffffff;">';
      				echo ($sql_num_rows < 8 ? '':'').$value['username'].'</div>';
      				echo '</td></tr></table>';
      			echo '</td>';
      			echo ($counter % 7 == 0 ? '</tr><tr>':'');
      			$counter++;
      		}
      		echo '</table>';
    		}else{
    			echo '<img src="common/img/promotional/no-hotties-per-your-zipcode.jpg" border="0">';
    		}

    	break;
    	// -------------------------------------------------------------












    	// -------------------------------------------------------------
    	case 'prereg_preview_dynamic':

				// specified font color ----------------------
				if(!$Color){
					$Color = 'ffffff';
				}
				
				
				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------
    		$_expiration	=	time() - 86400;


    		// gender seeking definition -----------------
    		$__SELECT_s1	=	null;
    		$__SELECT_s2	=	null;
    		$__SELECT_s3	=	null;
    		$__SELECT_s4	=	null;
    
    		$_seekingArray	=	str_split($Parameters);

    
    		foreach($_seekingArray as $key => $value){
    			//if($key == 0 & $value == 1){ echo 'Seeking Men';}
    			if($key == 0 & $value == 1){ $__SELECT_s1	= "'1', "; }
    			
    			//if($key == 1 & $value == 1){ echo 'Seeking Women';}
    			if($key == 1 & $value == 1){ $__SELECT_s2	= "'2', "; }
    			
    			//if($key == 2 & $value == 1){ echo 'Seeking Trannies';}
    			if($key == 2 & $value == 1){ $__SELECT_s3	= "'3', "; }
    			
    			//if($key == 3 & $value == 1){ echo 'Seeking Couples';}
    			if($key == 3 & $value == 1){ $__SELECT_s4	= "'4' "; }
    		}
    		// -------------------------------------------
    		
    		$_SELECT_sMASTER	=	$__SELECT_s1.$__SELECT_s2.$__SELECT_s3.$__SELECT_s4;
    		$_SELECT_sMASTER	= preg_replace('/[\s]?,[\s]?$/i','',$_SELECT_sMASTER);




    		// zipcode/geocode definition ----------------
    		$ziparray = $this->ZIPCodeLookup($Option, '750');


    		$__SELECT_zMASTER	= null;
    		$__ArrayCount			=	count($ziparray);
    		
    		foreach($ziparray as $key => $value){
       		$__SELECT_zMASTER	.=	'\''.$value.'\''.($__ArrayCount == $key+1 ? ' ':', ');
    		}
    		// -------------------------------------------



				$_SELECT_MASTER		=	"
				SELECT DISTINCT U.* , UI.*, UPS.* 
				FROM user U 
				INNER JOIN user_images UI ON UI.userid = U.userid AND UI.avatar = '1' 
				INNER JOIN user_profile_specs UPS ON UPS.userid = U.userid 
				AND (UPS.into_friends = '1' OR UPS.into_flirting = '1' OR UPS.into_relationship = '1' OR UPS.into_sex = '1' OR UPS.into_fetish = '1')
				WHERE U.disabled != '1' AND UPS.setting_disable != '1' AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.")
				GROUP BY U.userid 
				ORDER BY RAND() LIMIT 10";


    		$sql_result		= mysql_query($_SELECT_MASTER);
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
    			
    			echo '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="height: 230px;"><tr>';
      		
      		foreach($ResultArray as $key => $value){
      			echo '<td align="center" valign="center">';
      				echo '<table cellpadding="0" cellspacing="0" style="margin-top: 5px;"><tr><td align="center" valign="center">';
      				//echo '<a href="https://friendsnflings.com/ViewProfile-'.$this->Encrypt($value['userid']).'">';

        			if($sql_num_rows < 4){
        				//$this->ImageDisplay($value['userid'], 1, 1, false, 0);
        				$this->ImageDisplay_2($UserID, $value['userid'], 1, 1, false, true);
        				
        			}else{
        				//$this->ImageDisplay($value['userid'], 2, 1, false, 0);
        				$this->ImageDisplay_2($UserID, $value['userid'], 1, 1, false, true);
        			}


							// -------------------------------------------
							if($value['into_sex'] == 1){

								$_SEX_Array	=	array(
									0		=>	'Kinky',
									1		=>	'Dangerous'
								);

								$_desire = $_SEX_Array[rand(0,1)];

							}elseif($value['into_fetish'] == 1){

								$_FETISH_Array	=	array(
									0		=>	'Fun',
									1		=>	'Wanna?',
									2		=>	'Come on!',
									3		=>	'Hey..'
								);

								$_desire = $_FETISH_Array[rand(0,3)];

							}elseif($value['into_relationship'] == 1){
								$_desire = 'Heart';

							}elseif($value['into_flirting'] == 1){
								$_desire = 'Flirt!';

							}elseif($value['into_friends'] == 1){
								$_desire = 'Friends';
							}

							// -------------------------------------------


      				//echo '</a>';
      				echo '</td></tr><tr><td align="center"><div style="position: relative; height: 15px; left: 0px; border: 0px solid #000000; top: 0px; width: '.($sql_num_rows < 8 ? '50px':'50px').'; padding: 0 0 0 0; margin: 0 0 0 0; font-size: '.($sql_num_rows < 8 ? '11px':'11px').';  color: #'.$Color.';">';
      				echo ($sql_num_rows < 3 ? '':'').$value['username'].'</div>';
      				echo '</td></tr></table>';
      			echo '</td>';
      			echo ($counter % 2 == 0 ? '</tr><tr>':'');
      			$counter++;
      		}
      		echo '</table>';
    		}else{
    			//echo '<img src="common/img/promotional/no-hotties-per-your-zipcode.jpg" border="0">';
    			echo '<br><br><center><font color="#ed9c00"><b>None Found?</b></font><br><br><font color="white"><i>Another ZIP Code?</i></font></center>';
    		}

    	break;
    	// -------------------------------------------------------------















    	// -------------------------------------------------------------
    	case 'users_with_new_pics':



				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------

    		$_expiration	=	time() - 86400;


    		// gender seeking definition -----------------
    		$__SELECT_s1	=	null;
    		$__SELECT_s2	=	null;
    		$__SELECT_s3	=	null;
    		$__SELECT_s4	=	null;

    		$_seekingArray	=	str_split($Parameters);

    
    		foreach($_seekingArray as $key => $value){
    			//if($key == 0 & $value == 1){ echo 'Seeking Men';}
    			if($key == 0 & $value == 1){ $__SELECT_s1	= "'1', "; }
    			
    			//if($key == 1 & $value == 1){ echo 'Seeking Women';}
    			if($key == 1 & $value == 1){ $__SELECT_s2	= "'2', "; }
    			
    			//if($key == 2 & $value == 1){ echo 'Seeking Trannies';}
    			if($key == 2 & $value == 1){ $__SELECT_s3	= "'3', "; }
    			
    			//if($key == 3 & $value == 1){ echo 'Seeking Couples';}
    			if($key == 3 & $value == 1){ $__SELECT_s4	= "'4' "; }
    		}
    		// -------------------------------------------
    		
    		$_SELECT_sMASTER	=	$__SELECT_s1.$__SELECT_s2.$__SELECT_s3.$__SELECT_s4;
    		$_SELECT_sMASTER	= preg_replace('/[\s]?,[\s]?$/i','',$_SELECT_sMASTER);


    		// zipcode/geocode definition ----------------
    		$ziparray = $this->ZIPCodeLookup($this->GetMemberZIPCode($UserID), '750');

    		$__SELECT_zMASTER	= null;
    		$__ArrayCount			=	count($ziparray);
    		
    		foreach($ziparray as $key => $value){
       		$__SELECT_zMASTER	.=	'\''.$value.'\''.($__ArrayCount == $key+1 ? ' ':', ');
    		}
    		// -------------------------------------------


				$_SELECT_MASTER		=	"
				SELECT U.* , UI.*, UPS.* 
				FROM user U 
				INNER JOIN user_images UI ON UI.userid = U.userid AND UI.avatar = '1' 
				INNER JOIN user_profile_specs UPS ON UPS.userid = U.userid 
				AND (UPS.into_friends = '1' OR UPS.into_flirting = '1' OR UPS.into_relationship = '1' OR UPS.into_sex = '1' OR UPS.into_fetish = '1')
				WHERE U.disabled != '1' AND UPS.setting_disable != '1' AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.") 
				GROUP BY U.userid 
				ORDER BY UI.ts_created DESC LIMIT 21";
				
    
    		$sql_result					= mysql_query($_SELECT_MASTER);
   			$sql_num_rows				=	mysql_num_rows($sql_result);
    		// -------------------------------------------------------------------------

			
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
    			echo '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="height: 230px;"><tr>';
      		foreach($ResultArray as $key => $value){
      			echo '<td align="center" valign="center">';
      				echo '<table cellpadding="0" cellspacing="0" style="margin-top: 5px;"><tr><td align="center" valign="center">';
      				//echo '<a href="ViewProfile-'.$this->Encrypt($value['userid']).'">';

        			if($sql_num_rows < 4){
        				$this->ImageDisplay($value['userid'], 1, 1, false, 0);
        			}else{
        				$this->ImageDisplay($value['userid'], 2, 1, false, 0);
        			}

      				//echo '</a>';
      				echo '</td></tr><tr><td align="center">';
      				echo ($sql_num_rows < 4 ? '<font size="2">':'<font size="1">').$this->_stringShorten(ucwords($value['username']),8).'</font>';
      				echo '</td></tr></table>';
      			echo '</td>';
      			echo ($counter == 7 || $counter == 14 ? '</tr><tr>':'');
      			$counter++;
      		}
      		echo '</table>';
    		}else{
    			echo '<a href="MyProfile"><img src="common/img/promotional/no-new-pictures.jpg" border="0"></a>';
    		}

    	break;
    	// -------------------------------------------------------------






    	// -------------------------------------------------------------
    	case 'new_pics':



				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------

    		$_expiration				=	time() - 86400;
				$_Viewer_NudityMode = $_SESSION['ActiveUser']['nudity'];


    		// gender seeking definition -----------------
    		$__SELECT_s1	=	null;
    		$__SELECT_s2	=	null;
    		$__SELECT_s3	=	null;
    		$__SELECT_s4	=	null;

    		$_seekingArray	=	str_split($Parameters);

    
    		foreach($_seekingArray as $key => $value){
    			//if($key == 0 & $value == 1){ echo 'Seeking Men';}
    			if($key == 0 & $value == 1){ $__SELECT_s1	= "'1', "; }
    			
    			//if($key == 1 & $value == 1){ echo 'Seeking Women';}
    			if($key == 1 & $value == 1){ $__SELECT_s2	= "'2', "; }
    			
    			//if($key == 2 & $value == 1){ echo 'Seeking Trannies';}
    			if($key == 2 & $value == 1){ $__SELECT_s3	= "'3', "; }
    			
    			//if($key == 3 & $value == 1){ echo 'Seeking Couples';}
    			if($key == 3 & $value == 1){ $__SELECT_s4	= "'4' "; }
    		}
    		// -------------------------------------------
    		
    		$_SELECT_sMASTER	=	$__SELECT_s1.$__SELECT_s2.$__SELECT_s3.$__SELECT_s4;
    		$_SELECT_sMASTER	= preg_replace('/[\s]?,[\s]?$/i','',$_SELECT_sMASTER);


    		// zipcode/geocode definition ----------------
    		$ziparray = $this->ZIPCodeLookup($this->GetMemberZIPCode($UserID), '750');

    		$__SELECT_zMASTER	= null;
    		$__ArrayCount			=	count($ziparray);
    		
    		foreach($ziparray as $key => $value){
       		$__SELECT_zMASTER	.=	'\''.$value.'\''.($__ArrayCount == $key+1 ? ' ':', ');
    		}
    		// -------------------------------------------


				$_SELECT_MASTER		=	"
				SELECT U.* , UI.*, UPS.* 
				FROM user U 
				INNER JOIN user_images UI ON UI.userid = U.userid AND UI.approved = '1'
				INNER JOIN user_profile_specs UPS ON UPS.userid = U.userid 
				AND (UPS.into_friends = '1' OR UPS.into_flirting = '1' OR UPS.into_relationship = '1' OR UPS.into_sex = '1' OR UPS.into_fetish = '1')
				WHERE U.disabled != '1' AND U.setting_discreet != '1' AND UPS.setting_disable != '1' AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.") 
				ORDER BY UI.ts_reviewed DESC LIMIT 21";
				
    
    		$sql_result					= mysql_query($_SELECT_MASTER);
   			$sql_num_rows				=	@mysql_num_rows($sql_result);
    		// -------------------------------------------------------------------------

			
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
    			echo '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="height: 230px;"><tr>';
      		foreach($ResultArray as $key => $value){
      			echo '<td align="center" valign="center">';
      				echo '<table cellpadding="0" cellspacing="0" style="margin-top: 5px;"><tr><td align="center" valign="center">';
      				echo '<a href="ViewProfile-'.$this->Encrypt($value['userid']).'">';

        			if($sql_num_rows > 8){
        				$this->ImageDisplaySpecific($value['userid'], $value['imageid'], 2, 0, false, $_Viewer_NudityMode);
        			}else{
        				$this->ImageDisplaySpecific($value['userid'], $value['imageid'], 1, 0, false, $_Viewer_NudityMode);
	       			}

      				echo '</a>';
      				echo '</td></tr><tr><td align="center">';
      				echo ($sql_num_rows > 8 ? '<font size="1">':'<font size="2">').$this->_stringShorten(ucwords($value['username']),8).'</font>';
      				echo '</td></tr></table>';
      			echo '</td>';

      			// design layout ---------------------
      			if($sql_num_rows > 8){
      				echo ($counter % 7 == 0 ? '</tr><tr>':'');
      			}else{
      				echo ($counter % 4 == 0 ? '</tr><tr>':'');
      			}
      			//echo ($counter == 7 || $counter == 14 ? '</tr><tr>':'');																				//DEP.02.23.09.NAB
      			// -----------------------------------
      			
      			$counter++;
      		}
      		echo '</table>';
    		}else{
    			echo '<a href="MyProfile"><img src="common/img/promotional/no-new-pictures.jpg" border="0"></a>';
    		}

    	break;
    	// -------------------------------------------------------------





    	// -------------------------------------------------------------
    	case 'featured':



				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------

    		$_expiration	=	time() - 86400;


    		// gender seeking definition -----------------
    		$__SELECT_s1	=	null;
    		$__SELECT_s2	=	null;
    		$__SELECT_s3	=	null;
    		$__SELECT_s4	=	null;

    		$_seekingArray	=	str_split($Parameters);

    
    		foreach($_seekingArray as $key => $value){
    			//if($key == 0 & $value == 1){ echo 'Seeking Men';}
    			if($key == 0 & $value == 1){ $__SELECT_s1	= "'1', "; }
    			
    			//if($key == 1 & $value == 1){ echo 'Seeking Women';}
    			if($key == 1 & $value == 1){ $__SELECT_s2	= "'2', "; }
    			
    			//if($key == 2 & $value == 1){ echo 'Seeking Trannies';}
    			if($key == 2 & $value == 1){ $__SELECT_s3	= "'3', "; }
    			
    			//if($key == 3 & $value == 1){ echo 'Seeking Couples';}
    			if($key == 3 & $value == 1){ $__SELECT_s4	= "'4' "; }
    		}
    		// -------------------------------------------
    		
    		$_SELECT_sMASTER	=	$__SELECT_s1.$__SELECT_s2.$__SELECT_s3.$__SELECT_s4;
    		$_SELECT_sMASTER	= preg_replace('/[\s]?,[\s]?$/i','',$_SELECT_sMASTER);


    		// zipcode/geocode definition ----------------
    		$ziparray = $this->ZIPCodeLookup($this->GetMemberZIPCode($UserID), '750');

    		$__SELECT_zMASTER	= null;
    		$__ArrayCount			=	count($ziparray);
    		
    		foreach($ziparray as $key => $value){
       		$__SELECT_zMASTER	.=	'\''.$value.'\''.($__ArrayCount == $key+1 ? ' ':', ');
    		}
    		// -------------------------------------------



    		// VIP get Specific Records --------------------------------------------
    		$CurrentTS	=	time();

/*
    $_SELECT_MASTER_VIP		=	"
    SELECT U.* , UI.*, UPS.*, UPG.*
    FROM user U 
    LEFT JOIN user_upgrade UPG ON UPG.tsexpiration > '1233860718' AND UPG.productid > 2
    ".$__SELECT_ProfileWPics."
    INNER JOIN user_profile_specs UPS ON ".$_SELECT_gMASTER." UPS.tsdob <= ".$__SELECT_a1." AND UPS.tsdob >= ".$__SELECT_a2." AND
    	(".$_SELECT_iMASTER.")
    	AND UPS.userid = U.userid AND UPS.userid = UPG.userid
    WHERE U.disabled != '1' AND UPS.setting_disable != '1' ".$__SELECT_VerifiedPics." AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.") ".$__SELECT_onlineNow."
    GROUP BY U.userid ORDER BY RAND(), U.ts_lastlogin DESC LIMIT 4
    ";


    		// With & Without Pictures -------------------
    		$__SELECT_ProfileWPics 	= "LEFT JOIN user_images UI ON UI.userid = U.userid AND UI.avatar = '1'";

        $_SELECT_MASTER_VIP		=	"
        SELECT U.* , UI.*, UPS.*, UPG.*
        FROM user U, user_upgrade UPG
        ".$__SELECT_ProfileWPics."
        INNER JOIN user_profile_specs UPS ON UPG.tsexpiration > '$CurrentTS' AND UPG.productid > 2 AND
        	(UPS.into_friends = '1' OR UPS.into_flirting = '1' OR UPS.into_relationship = '1' OR UPS.into_sex = '1' OR UPS.into_fetish = '1')
        	AND UPS.userid = U.userid AND UPG.userid = U.userid
        WHERE U.disabled != '1' AND UPS.setting_disable != '1' AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.")
        GROUP BY U.userid ORDER BY RAND(), U.ts_lastlogin DESC LIMIT 4
        ";
*/        

        $_SELECT_MASTER_VIP		=	"
        SELECT U.* , UI.*, UPS.*, UPG.*
        FROM user U 
        LEFT JOIN user_upgrade UPG ON UPG.productid > 2
        LEFT JOIN user_images UI ON UI.userid = U.userid AND UI.avatar = '1'
       	INNER JOIN user_profile_specs UPS ON UPG.tsexpiration > '$CurrentTS' AND UPG.productid > 2 AND UPG.productid != 4 AND
        (UPS.into_friends = '1' OR UPS.into_flirting = '1' OR UPS.into_relationship = '1' OR UPS.into_sex = '1' OR UPS.into_fetish = '1')
        AND UPS.userid = U.userid AND UPS.userid = UPG.userid
        WHERE U.disabled != '1' AND UPS.setting_disable != '1' ".$__SELECT_VerifiedPics." AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.") ".$__SELECT_onlineNow."
        GROUP BY U.userid ORDER BY RAND(), U.ts_lastlogin DESC LIMIT 21
        ";

    		$VIP_sql_result			= mysql_query($_SELECT_MASTER_VIP);
    		$VIP_sql_num_rows		=	@mysql_num_rows($VIP_sql_result);
    		// ---------------------------------------------------------------------





				// destroy database connection object --------
				$obj_db->Close();
				unset($obj_db);
				// -------------------------------------------
  			
  			if($VIP_sql_num_rows > 0){

    			$counter	=	0;
    			while( $sql_array_result	=	mysql_fetch_assoc($VIP_sql_result) ){
    				$ResultArray[$counter] = $sql_array_result;
    				$counter++;
    			}
    			
    			$counter	=	1;
    			echo '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="height: 230px;"><tr>';
      		foreach($ResultArray as $key => $value){
      			echo '<td align="center" valign="center">';
      				echo '<table cellpadding="0" cellspacing="0" style="margin-top: 5px;"><tr><td align="center" valign="center">';

        			if($VIP_sql_num_rows > 4){
        				$this->ImageDisplay_2($UserID, $value['userid'], 1, 1, false, true);
        			}else{
        				$this->ImageDisplay_2($UserID, $value['userid'], 2, 1, false, true);
        			}

      				echo '</td></tr><tr><td align="center">';
      				echo ($VIP_sql_num_rows > 4 ? '<font size="1">':'<font size="2">').$this->_stringShorten(ucwords($value['username']),8).'</font>';
      				echo '</td></tr></table>';
      			echo '</td>';


      			// design layout ---------------------
      			if($VIP_sql_num_rows > 4){
      				echo ($counter % 7 == 0 ? '</tr><tr>':'');
      			}else{
      				echo ($counter % 4 == 0 ? '</tr><tr>':'');
      			}
      			$counter++;
      		}
      		echo '</table>';
    		}else{
    			echo '<a href="Search"><img src="common/img/promotional/no-featured-members.jpg" border="0"></a>';
    		}



    	break;
    	// -------------------------------------------------------------






    	// -------------------------------------------------------------
    	case 'myfriends':


    		if($Option === 'fullpage'){

    		}else{

    		}


				switch($Parameters){
					case 'report.myfriends.current':
						$_owner		=	"UN.friend_userid ";
						$_status	=	"AND UN.owner_userid = ".$UserID." AND UN.status = '1' AND UN.type = '2'";
					break;

					// people who want you -----------------
					case 'report.myfriends.requests':
						$_owner		=	"UN.owner_userid ";
						$_status	=	"AND UN.friend_userid = ".$UserID." AND UN.status = '0' AND UN.type = '2' AND UN.status != '2' AND UN.requester = '1'";
					break;

					// people you want ---------------------
					case 'report.myfriends.pending':
						$_owner		=	"UN.friend_userid ";
						$_status	=	"AND UN.owner_userid = ".$UserID." AND UN.status = '0' AND UN.type = '2' AND UN.status != '2' AND UN.requester = '1'";
					break;

					case 'report.myfriends.block':
						$_owner		=	"UN.friend_userid ";
						$_status	=	"AND UN.blockuid = ".$UserID." AND UN.type = '3' AND UN.requester = '1'";
					break;

					case 'favorites':
						$_owner		=	"UN.friend_userid ";
						$_status	=	"AND UN.owner_userid = ".$UserID." AND UN.type = '1'";
					break;

				}


				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------

    		$_expiration	=	time() - 86400;


    		// gender seeking definition -----------------
    		$__SELECT_s1	=	null;
    		$__SELECT_s2	=	null;
    		$__SELECT_s3	=	null;
    		$__SELECT_s4	=	null;

    		$_seekingArray	=	str_split($Parameters);

    
    		foreach($_seekingArray as $key => $value){
    			//if($key == 0 & $value == 1){ echo 'Seeking Men';}
    			if($key == 0 & $value == 1){ $__SELECT_s1	= "'1', "; }
    			
    			//if($key == 1 & $value == 1){ echo 'Seeking Women';}
    			if($key == 1 & $value == 1){ $__SELECT_s2	= "'2', "; }
    			
    			//if($key == 2 & $value == 1){ echo 'Seeking Trannies';}
    			if($key == 2 & $value == 1){ $__SELECT_s3	= "'3', "; }
    			
    			//if($key == 3 & $value == 1){ echo 'Seeking Couples';}
    			if($key == 3 & $value == 1){ $__SELECT_s4	= "'4' "; }
    		}
    		// -------------------------------------------
    		
    		$_SELECT_sMASTER	=	$__SELECT_s1.$__SELECT_s2.$__SELECT_s3.$__SELECT_s4;
    		$_SELECT_sMASTER	= preg_replace('/[\s]?,[\s]?$/i','',$_SELECT_sMASTER);

/*
    		// zipcode/geocode definition ----------------
    		$ziparray = $this->ZIPCodeLookup($this->GetMemberZIPCode($UserID), '1');

    		$__SELECT_zMASTER	= null;
    		$__ArrayCount			=	count($ziparray);
    		
    		foreach($ziparray as $key => $value){
       		$__SELECT_zMASTER	.=	'\''.$value.'\''.($__ArrayCount == $key+1 ? ' ':', ');
    		}
    		// -------------------------------------------
*/


    		// get Specific Records ------------------------------------------------
    		$CurrentTS	=	time();


/*
DEP.11.13.2009 - User Image portion of query was NOT allowing Friends/Pending to show up unless an Avatar was set

        $_SELECT_MASTER		=	"
				SELECT DISTINCT U.userid, U.username, UI.*, UPS.*, UN.*
				FROM user U
        INNER JOIN user_images UI ON UI.userid = U.userid AND UI.avatar = '1'
        INNER JOIN user_profile_specs UPS ON UPS.userid = U.userid
        INNER JOIN user_network UN ON ".$_owner." = U.userid
        WHERE U.disabled != '1' AND UPS.setting_disable != '1'
        ".$_status."
        GROUP BY U.userid
        ORDER BY UN.tscreated ASC
        ";
*/


        $_SELECT_MASTER		=	"
				SELECT DISTINCT U.userid, U.username, UPS.*, UN.*
				FROM user U
        INNER JOIN user_profile_specs UPS ON UPS.userid = U.userid
        INNER JOIN user_network UN ON ".$_owner." = U.userid
        WHERE U.disabled != '1' AND UPS.setting_disable != '1'
        ".$_status."
        GROUP BY U.userid
        ORDER BY UN.tscreated ASC
        ";


    		$sql_result			= mysql_query($_SELECT_MASTER);
    		$sql_num_rows		=	@mysql_num_rows($sql_result);
    		// ---------------------------------------------------------------------


				// destroy database connection object --------
				$obj_db->Close();
				unset($obj_db);
				// -------------------------------------------


				// read out results ----------------------------------------------------
  			if($sql_num_rows > 0){

    			$counter	=	0;
    			while( $sql_array_result	=	mysql_fetch_assoc($sql_result) ){
    				$ResultArray[$counter] = $sql_array_result;
    				$counter++;
    			}

    			$counter	=	1;
    			//echo '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="height: 230px;"><tr>';
    			echo $_table_Setup				= '<table style="width: 438px; height: auto; border: 0px solid #ff0000; margin: 0; padding: 0; padding-top: 5px; padding-bottom: 5px;" cellpadding="0" cellspacing="0"><tr>';
      		foreach($ResultArray as $key => $value){


						// friend status conversion ----------
						switch($value['status']){
							case 0:
								// DISABLED - COULDNT GET IE TO FUCKING WORK WITH THE Z-INDEX SO THIS IS DISABLED !!!!!!!!!!!!
								//$_friend_Status	=	'<font color="#f7b400" size="1"><i>Pending</i></font>';
								//$_TopMiniBar 		= '<div style="position: absolute; background: #000000; height: 15px; width: 101px; padding: 0 0 0 0; margin: 0; margin-top: 0px; z-index: 10; filter: alpha(opacity=65); -moz-opacity: .65; opacity: .65;">'.$_friend_Status.'</div>';
								
								$_TopMiniBar 			=	null;
							break;

							case 1:
								// DISABLED -------------
								//$_friend_Status	=	'<font style="color: #00ff00; font-size: 10px; z-index: 100;"><i>Accepted</i></font>';
								//$_TopMiniBar 		= '<div style="position: absolute; background: #000000; height: 15px; width: 101px; padding: 0 0 0 0; margin: 0; margin-top: 0px; z-index: 1; filter: alpha(opacity=65); -moz-opacity: .65; opacity: .65;">'.$_friend_Status.'</div>';

								$_TopMiniBar 			=	null;
							break;
						}
						// -----------------------------------

						// check for blocked type ------------
						if($value['type'] == 3){
							$_friend_Status	=	'<font style="color: #ff0000; font-size: 10px; z-index: 200;"><i>Blocked</i></font>';
						}
						// -----------------------------------




      			echo '<td align="center" valign="center">';

            			if($sql_num_rows > 8){
            				echo '<div id="ThumbnailTable_'.$Parameters.$counter.'" style="border: 0px solid #000000; width: 50px; height: 75px; padding: 0 0 0 0; margin: 0 0 0 0;">';
  									echo '<div id="Thumbnail_'.$Parameters.$counter.'" style="height: 50px; width: 50px; border: 0px solid #F00; padding: 0 0 0 0; margin: 0 0 0 0;"><div style="position: absolute; border: 1px solid #ff0000; background: #000000; width: 50px; height: 15px; padding: 0 0 0 0; margin: 0 0 0 0; z-index: 1; filter: alpha(opacity=65); -moz-opacity: .65; opacity: .65;">'.$_friend_Status.'</div>';
            				$this->ImageDisplay_2($UserID, $value['userid'], 1, 1, false, true);

            			
            			}else{
            				echo '<div id="ThumbnailTable_'.$Parameters.$counter.'" style="border: 0px solid #000000; width: 100px; height: 130px;">';
            				echo '<div id="Thumbnail_'.$Parameters.$counter.'" style="height: 100px; width: 100px; border: 0px solid #F00; padding: 0 0 0 0; margin: 0 0 0 0;">'.$_TopMiniBar;
            				$this->ImageDisplay_2($UserID, $value['userid'], 2, 1, false, true);

            			}
  							echo '</div>';
  							// END thumbnail -------------------

							// Name of Member ------------------
							echo ($sql_num_rows > 4 ? '<font style="font-size: 10px; color: #000000; line-height: 16px;">':'<font style="font-size: 12px; color: #000000; line-height: 20px;">').$this->_stringShorten(ucwords($value['username']),10,'').'</font>';


							// UnBlock Options ---------------------------
      				if($value['type'] == 3){
      					echo '<div style="position: relative; top: -6px; height: 15px; margin: 0px; padding: 0px; border: 0px solid #ff0000;"> <a style="cursor: pointer; font-size: 10px; color: #ff0000;" onclick="MyNetwork(\''.$this->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$this->Encrypt($value['userid']).'\', \'execute.myfriends.unblock\', \'ThumbnailTable_'.$Parameters.$counter.'\', \'report.myfriends.block\');">Unblock</a></div> </div>';
      				}


      				
 	    				// Pending Friend (NOT in BLOCKED STATUS) ----
     					if($Parameters == 'report.myfriends.pending'){
     						echo '<div style="position: relative; top: -6px; height: 15px; margin: 0px; padding: 0px; border: 0px solid #ff0000;"> <a style="cursor: pointer; font-size: 10px; color: #ff0000;" onclick="MyNetwork(\''.$this->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$this->Encrypt($value['userid']).'\', \'execute.myfriends.remove\', \'ThumbnailTable_'.$Parameters.$counter.'\', \'report.myfriends.pending\');">Remove</a></div> </div>';
     					}


							if($Parameters == 'report.myfriends.requests'){
								echo '<div style="position: relative; top: -6px; height: 15px; margin: 0px; padding: 0px; border: 0px solid #ff0000;"> <a style="cursor: pointer; font-size: 10px; color: #55b92e;" onclick="MyNetwork(\''.$this->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$this->Encrypt($value['userid']).'\', \'execute.myfriends.accept\', \'ThumbnailTable_'.$Parameters.$counter.'\', \'report.myfriends.requests\');">Accept</a> <a style="cursor: pointer; font-size: 10px; color: #ff0000;" onclick="MyNetwork(\''.$this->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$this->Encrypt($value['userid']).'\', \'execute.myfriends.remove\', \'ThumbnailTable_'.$Parameters.$counter.'\', \'report.myfriends.requests\');">Remove</a></div> </div>';	
							}



      				// Current Friend ----------------------------
      				if($value['type'] == 2 && $value['status'] == 1){
      					
      					if($_SESSION['browsermsie'] == 6){
      						$__bottomPX = '8px';
      					}else{
      						$__bottomPX = '4px';
      					}
								echo '<div style="position: relative; left: 0px; bottom: '.$__bottomPX.'; border: 0px solid #ff0000; width: 100%; z-index: 10;"> <a style="cursor: pointer; font-size: 10px; color: #ff0000;" onclick="MyNetwork(\''.$this->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$this->Encrypt($value['userid']).'\', \'execute.myfriends.remove\', \'ThumbnailTable_'.$Parameters.$counter.'\', \'report.myfriends.current\');">Remove</a></div> </div>';
      				}


      			echo '</td>';
      			//echo ($counter == 6 || $counter == 12 ? '</tr><tr>':'');
      			
      			// design layout ---------------------
      			if($sql_num_rows > 8){
      				echo ($counter % 7 == 0 ? '</tr><tr>':'');
      			}else{
      				echo ($counter % 4 == 0 ? '</tr><tr>':'');
      			}
      			// -----------------------------------
      			
      			
      			
      			$counter++;
      		}
      		echo '</table>';
    		// ---------------------------------------------------------------------


				// no results ----------------------------------------------------------
    		}else{
					
					// get member details ----------------------------
					//$_memberProfile	=	$this->GetMemberProfile($UserID);

					echo '<a href="Search"><img src="common/img/promotional/play_make_friends-male.jpg" border="0"></a>';
  				
  				
  				/*
  				// friend status conversion ----------
  				switch($_memberProfile->gender){
  					
  					// male ----------
  					case 1:
  						
  					break;
  
  					// female --------
  					case 2:
  						echo '';
  					break;

						default:
							echo '';
						break;
  				}
  				// -----------------------------------
  				*/

    		}
    		// ---------------------------------------------------------------------

    	break;
    	// -------------------------------------------------------------




    	// -------------------------------------------------------------
    	case 'newfaces':


    		if($Option === 'fullpage'){
    			$_sql_record_limit	=	'49';
    			$_thumbnailSize			=	'large';
    		}else{
    			$_sql_record_limit	=	'21';
    		}


				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------
    		$_expiration	=	time() - 360;	//360 seconds = 6 minutes

    		// gender seeking definition -----------------
    		$__SELECT_s1	=	null;
    		$__SELECT_s2	=	null;
    		$__SELECT_s3	=	null;
    		$__SELECT_s4	=	null;
    
    		$_seekingArray	=	str_split($Parameters);

    
    		foreach($_seekingArray as $key => $value){
    			//if($key == 0 & $value == 1){ echo 'Seeking Men';}
    			if($key == 0 & $value == 1){ $__SELECT_s1	= "'1', "; }
    			
    			//if($key == 1 & $value == 1){ echo 'Seeking Women';}
    			if($key == 1 & $value == 1){ $__SELECT_s2	= "'2', "; }
    			
    			//if($key == 2 & $value == 1){ echo 'Seeking Trannies';}
    			if($key == 2 & $value == 1){ $__SELECT_s3	= "'3', "; }
    			
    			//if($key == 3 & $value == 1){ echo 'Seeking Couples';}
    			if($key == 3 & $value == 1){ $__SELECT_s4	= "'4' "; }
    		}
    		// -------------------------------------------
    		
    		$_SELECT_sMASTER	=	$__SELECT_s1.$__SELECT_s2.$__SELECT_s3.$__SELECT_s4;
    		$_SELECT_sMASTER	= preg_replace('/[\s]?,[\s]?$/i','',$_SELECT_sMASTER);


    		// zipcode/geocode definition ----------------
    		$ziparray = $this->ZIPCodeLookup($this->GetMemberZIPCode($UserID), '750');

    		$__SELECT_zMASTER	= null;
    		$__ArrayCount			=	count($ziparray);
    		
    		foreach($ziparray as $key => $value){
       		$__SELECT_zMASTER	.=	'\''.$value.'\''.($__ArrayCount == $key+1 ? ' ':', ');
    		}
    		// -------------------------------------------


/*
				$_SELECT_MASTER				= "
				SELECT DISTINCT U.userid, U.username 
				FROM user U 
				WHERE U.ts_lastaction > '$_expiration' AND U.gender IN (".$_SELECT_sMASTER.") 
				ORDER BY RAND() DESC LIMIT 21
				";
*/

				$_SELECT_MASTER		=	"
				SELECT DISTINCT U.* , UI.*, UPS.* 
				FROM user U
				LEFT JOIN user_images UI ON UI.userid = U.userid 
				INNER JOIN user_profile_specs UPS ON UPS.userid = U.userid 
				AND (UPS.into_friends = '1' OR UPS.into_flirting = '1' OR UPS.into_relationship = '1' OR UPS.into_sex = '1' OR UPS.into_fetish = '1')
				WHERE U.disabled != '1' AND UPS.setting_disable != '1' AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.")
				GROUP BY U.userid 
				ORDER BY U.ts_created DESC LIMIT ".$_sql_record_limit."";

    		$sql_result				= mysql_query($_SELECT_MASTER);
				$sql_num_rows			=	@mysql_num_rows($sql_result);
				
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
    			echo '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="height: 230px;"><tr>';
      		foreach($ResultArray as $key => $value){
      			echo '<td align="center" valign="center">';
      				echo '<table cellpadding="0" cellspacing="0" style="margin-top: 5px;"><tr><td align="center" valign="center">';


							// thumbnail sizing --------------------------
							if($_thumbnailSize == 'large'){
								//$this->ImageDisplay($value['userid'], 1, 0, false, 0);
								$this->ImageDisplay_2($UserID, $value['userid'], 2, 1, false);

							}else{

          			if($sql_num_rows < 5){
          				$this->ImageDisplay($value['userid'], 1, 1, false, 0);
          			}else{
          				$this->ImageDisplay($value['userid'], 2, 1, false, 0);
          			}

							}
							// -------------------------------------------


      				echo '</td></tr><tr><td align="center">';
      				
      				if($_sql_record_limit	==	'49'){
      					echo '<font size="2" color="white">'.$this->_stringShorten(ucwords($value['username']),16).'</font>';
      				}else{
      					echo ($sql_num_rows < 5 ? '<font size="2">':'<font size="1">').$this->_stringShorten(ucwords($value['username']),8).'</font>';	
      				}

      				echo '</td></tr></table>';
      			echo '</td>';
      			echo ($counter == 7 || $counter == 14 || $counter == 21 || $counter == 28 || $counter == 35 || $counter == 42 ? '</tr><tr>':'');
      			$counter++;
      		}
      		echo '</table>';
    		}else{
    			echo '<a href="Search"><img src="common/img/promotional/no-online-members.jpg" border="0"></a>';
    		}

    	break;
    	// -------------------------------------------------------------




    }
    // -------------------------------------------

		




	return $_return;
	}
	// =================================================================












	// METHOD :: Browse ================================================
	public function Browse($Type, $Zipcode = 0, $Parameters = 0){

		$_return					= false;
		

    //report type --------------------------------
    switch($Type){

    	// -------------------------------------------------------------
    	case 'all':

				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------


				$sql_query	= "
				SELECT U.* , Z.*, COUNT(U.userid) AS cnt
        FROM user U
        LEFT JOIN zip_code Z ON Z.zip_code = U.zipcode
        GROUP BY Z.state_name
        ORDER BY Z.state_name ASC 
				";

    		$sql_result		= mysql_query($sql_query);
				$sql_num_rows	=	mysql_num_rows($sql_result);

				$count	=	0;
				echo '<table border=0 width="100%"><tr>';
				while($sql_obj_result	=	mysql_fetch_object($sql_result)){
					echo '<td>';
						echo '<table>';
						echo '<td width="150">';
							echo '<a href="Search-'.$sql_obj_result->state_prefix.'"><font color="white">'.$sql_obj_result->state_name.'</font></a>';
						echo '</td>';

						echo '<td>';
							echo '<a href=""><font color="white">'.$sql_obj_result->cnt;
						echo '</td>';
						echo '</table>';
					
					$count++;
					$_modulus	=	$count % 5;
					echo '</td>';
					
					if($_modulus == 0){
  					echo '</tr><tr>';
  				}
  				
				}
				echo '</table>';

				// destroy database connection object --------
				$obj_db->Close();
				unset($obj_db);
				// -------------------------------------------

    	break;
    	// -------------------------------------------------------------


    	// -------------------------------------------------------------
    	case 'allcache':

				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------


				$sql_query	= "
				SELECT CB.*
        FROM cache_browse CB
        ORDER BY CB.region ASC 
				";

    		$sql_result		= mysql_query($sql_query);
				$sql_num_rows	=	mysql_num_rows($sql_result);

				$count	=	0;

				echo '<div style="border: 0px solid #ff0000; position: relative; top: 0px; width: 200px; left: 10px;">';

				while($sql_obj_result	=	mysql_fetch_object($sql_result)){

						echo '<div style="position: relative; border: 0px solid #ff0000; width: 850px;">';
							echo '<table border=0>';
							echo '<td width="400">';
								echo '<a href="Search-'.$sql_obj_result->prefix.'" style="text-decoration: none;"><font color="white" size="5">'.$sql_obj_result->region.'</font></a>';
							echo '</td>';

							echo '<td width="180">';
								echo '<table border=0><td width="80">';
									echo '<font color="white" size="4">'.number_format($sql_obj_result->total_members);
									echo '</td><td><font color="white" size="4"> Members';
								echo '</td></table>';
							echo '</td>';

							echo '<td width="25" align="center">';
							echo '</td>';

							echo '<td width="100" align="center">';
								echo '<a href="Browse-'.$sql_obj_result->prefix.'-women" style="text-decoration: none;"><font color="white" size="4">Women</font></a>';
							echo '</td>';

							echo '<td width="70" align="center">';
								echo '<a href="Browse-'.$sql_obj_result->prefix.'-men" style="text-decoration: none;"><font color="white" size="4">Men</font></a>';
							echo '</td>';

							echo '<td width="40" align="center">';
								echo '<a href="Browse-'.$sql_obj_result->prefix.'-all" style="text-decoration: none;"><font color="white" size="4">All</font></a>';
							echo '</td>';

							echo '</table>';
						echo '</div>';

					$count++;

				}

				
				echo '</div>';

				/*
				echo '<table border=1 width="100%"><tr>';
				while($sql_obj_result	=	mysql_fetch_object($sql_result)){
					echo '<td>';
						echo '<table border=1>';
						echo '<td width="150">';
							echo '<a href="Browse-'.$sql_obj_result->prefix.'"><font color="white">'.$sql_obj_result->region.'</font></a>';
						echo '</td>';

						echo '<td>';
							echo '<a href=""><font color="white">'.$sql_obj_result->total_members;
						echo '</td>';
						echo '</table>';
					
					$count++;
					$_modulus	=	$count % 5;
					echo '</td>';
					
					if($_modulus == 0){
  					echo '</tr><tr>';
  				}
  				
				}
				echo '</table>';
				*/

				// destroy database connection object --------
				$obj_db->Close();
				unset($obj_db);
				// -------------------------------------------

    	break;
    	// -------------------------------------------------------------


    	// -------------------------------------------------------------
    	case 'region':

				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------


				$sql_query	= "
				SELECT U.* , Z.*, COUNT(U.userid) AS cnt
        FROM user U
        LEFT JOIN zip_code Z ON Z.zip_code = U.zipcode
        GROUP BY Z.state_name
        ORDER BY Z.state_name ASC 
				";

    		$sql_result		= mysql_query($sql_query);
				$sql_num_rows	=	mysql_num_rows($sql_result);

				while($sql_obj_result	=	mysql_fetch_object($sql_result)){
					echo $sql_obj_result->state_name.' - '.$sql_obj_result->cnt.'<br>';
				}


				// destroy database connection object --------
				$obj_db->Close();
				unset($obj_db);
				// -------------------------------------------

    	break;
    	// -------------------------------------------------------------
    	
    }
    	// -------------------------------------------------------------


	return $_return;
	}
	// =================================================================












	// METHOD :: PromoReport ===========================================
	public function PromoReport($Type, $Zipcode, $Gender = 2, $Parameters = 0){



		$_return					= false;


    //report type --------------------------------
    switch($Type){


    	// -------------------------------------------------------------
    	case 'prereg':


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
    		$ziparray = $this->ZIPCodeLookup($Zipcode, '750');


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
				LIMIT 9
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
    			echo '<table border="0" cellpadding="0" cellspacing="0" style="height: 230px; width: 100%;"><tr>';
      		foreach($ResultArray as $key => $value){
      			echo '<td align="center" valign="center">';
      				echo '<table border="0" cellpadding="0" cellspacing="0" style="margin-bottom: 5px; margin-top: 5px;"><tr><td align="center" valign="top">';
      				//echo '<a href="ViewProfile-'.$this->Encrypt($value['userid']).'">';

        			if($sql_num_rows < 4){
        				//$this->ImageDisplay($value['userid'], 2, 1, false, 0);
        				$this->ImageDisplay_2($this->Encrypt(999999, 'private'), $value['userid'], 1, 1, false, true);
        			}else{
        				//$this->ImageDisplay($value['userid'], 1, 1, false, 0);
        				$this->ImageDisplay_2($this->Encrypt(999999, 'private'), $value['userid'], 2, 1, false, true);
        			}

      				echo '</a>';
      				echo '</td></tr><tr><td align="center">';
      				echo ($sql_num_rows < 4 ? '<center><font size="2">':'<font size="2">').$this->_stringShorten(ucwords($value['username']),14,'').'</font></center>';
								
								// turn ons --------------------------------
								echo '<div style="position: relative; border: 0px solid #000000; height: 14px; padding: 0px; top: -2px; text-align: left; align: left; width: 130px;"><font style="font-size: 10px; color: #000000;"><b>Turn-Ons:</b> ';
									
									
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
      			echo ($counter == 3 || $counter == 6 || $counter == 9 ? '</tr><tr>':'');
      			$counter++;
      		}
      		echo '</table>';
    		}else{
    			echo '<div style="background-color: #000000; left: 10px; top: 70px; position: relative; border: 4px solid #ffffff; width: 400px; height: 50px; align: center; text-align: center;"><table height="100%" width="100%"><tr><td> <font style="font-size: 22px;" color="#ff9000"><b>No Matches Found</b></font></td></tr></table> </div>';
    		}

    	break;
    	// -------------------------------------------------------------




    	// -------------------------------------------------------------
    	case 'hookup_promo':


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
    		$ziparray = $this->ZIPCodeLookup($Zipcode, '750');


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
				LIMIT 5
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
    			echo '<table border="0" cellpadding="0" cellspacing="0" style="height: 170px; width: 100%;"><tr>';
      		foreach($ResultArray as $key => $value){
      			echo '<td align="center" valign="top">';
      				echo '<table border="0" cellpadding="0" cellspacing="0" style="margin-bottom: 5px; margin-top: 5px;"><tr><td align="center" valign="top">';
      				//echo '<a href="ViewProfile-'.$this->Encrypt($value['userid']).'">';

        			if($sql_num_rows < 4){
        				//$this->ImageDisplay($value['userid'], 2, 1, false, 0);
        				$this->ImageDisplay_2($this->Encrypt(999999, 'private'), $value['userid'], 1, 1, false, true);
        			}else{
        				//$this->ImageDisplay($value['userid'], 1, 1, false, 0);
        				$this->ImageDisplay_2($this->Encrypt(999999, 'private'), $value['userid'], 2, 1, false, true);
        			}

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










	// METHOD :: PromotionalAdvertisingReport ==========================
	public function PromotionalAdvertisingReport($Type, $Zipcode, $Parameters = false){

		$_return					= false;
		
		
		
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
    		$ziparray = $this->ZIPCodeLookup($Zipcode, '750');

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
    			echo '<table border="3" cellpadding="0" cellspacing="0" style="height: 170px;" '.$Setting_background_color.'><tr>';
      		foreach($ResultArray as $key => $value){
      			echo '<td align="center" valign="top">';
      				echo '<table border="0" cellpadding="0" cellspacing="0" style="margin-bottom: 5px; margin-top: 5px;"><tr><td align="center" valign="top">';
      				//echo '<a href="ViewProfile-'.$this->Encrypt($value['userid']).'">';

        			
        			// thumbnail sizing --------------------------
        			if($Setting_profile_thumbsize == 'small'){
        				$this->ImageDisplay_2($this->Encrypt(999999, 'private'), $value['userid'], 1, 1, false, true);
        			}elseif($Setting_profile_thumbsize == 'medium'){
        				$this->ImageDisplay_2($this->Encrypt(999999, 'private'), $value['userid'], 2, 1, false, true);
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











	// METHOD :: Random Answers for Empty Results ======================
	public function RandomAnswersForEmpties($BaseEntry, $Type = 'profile_feature'){

		$_return									= false;
		
		if(trim($BaseEntry) == ''){
			
			$Array_Answers = array();
			
			switch($Type){

				case 'profile_feature':
        	$Array_Answers[] .= 'Dunno';
        	$Array_Answers[] .= 'Something Magical';
        	$Array_Answers[] .= 'Not Telling!';
        	$Array_Answers[] .= 'Not Sure';
        	$Array_Answers[] .= 'meh..';
        	$Array_Answers[] .= 'It\'s a secret';
        	$Array_Answers[] .= 'Guess!!';
        	$Array_Answers[] .= 'Could be wet..';
        	$Array_Answers[] .= 'Could be dry..';
        	$Array_Answers[] .= 'No Idea';
        	$Array_Answers[] .= 'You Decide';
        	$Array_Answers[] .= 'You Decide';				
				break;

				case 'skills.naughty':
        	$Array_Answers[] .= 'Not Telling';
        	$Array_Answers[] .= 'What was the question?';
        	$Array_Answers[] .= 'Huh?';
        	$Array_Answers[] .= 'Uhm...';
					$Array_Answers[] .= 'I\'ll get back to you';
					$Array_Answers[] .= 'Maybe you\'ll find out';
					$Array_Answers[] .= 'It\'s a Secret';
					$Array_Answers[] .= 'Like..woahhh...';
					$Array_Answers[] .= 'A sphincter says what?';
				break;

				case 'generic':
        	$Array_Answers[] .= 'Not Telling';
					$Array_Answers[] .= 'No Answer Yet';
					$Array_Answers[] .= 'Not Sure';
				break;


			}


  		shuffle($Array_Answers);
  		shuffle($Array_Answers);
			
			$_return	= $Array_Answers[0];
		
		}else{

			$_return	= $BaseEntry;
		}

		return $_return;
		}
	// =================================================================












	// METHOD :: MemberProfileAction ===================================
	public function MemberProfileAction($MemberID, $ProfileMemberID, $Action = 'default'){

		$_return									= false;
		$CurrentTime							= time();

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
		// -------------------------------------------

		
		// disregard profile owner views -------------
		if($MemberID != $ProfileMemberID){
			
			switch($Action){
				
				// record profileview --------------------
				case 'default':

					$_Action = 'profileview';

      		// record user session action --------------
        	mysql_query("INSERT INTO user_session_actions (userid, relativedata, action, ts) VALUES('$MemberID', '$ProfileMemberID', '$_Action', '$CurrentTime') ");
    			
    			// record profile view ---------------------
    			mysql_query("UPDATE user_profile_specs SET user_profile_specs.visits = user_profile_specs.visits + 1 WHERE user_profile_specs.userid = '$ProfileMemberID'");
				break;
				// ---------------------------------------


				// record teaser presignup view ----------
				case 'presignup_teaserview':

					$_Action = 'presignup_teaserview';

      		// record user session action --------------
        	mysql_query("INSERT INTO user_session_actions (userid, relativedata, action, ts) VALUES('$MemberID', '$ProfileMemberID', '$_Action', '$CurrentTime') ");
    			
    			// record profile view ---------------------
    			mysql_query("UPDATE user_profile_specs SET user_profile_specs.visits = user_profile_specs.visits + 1 WHERE user_profile_specs.userid = '$ProfileMemberID'");
				break;
				// ---------------------------------------


				// record conversion via teaser profile --
				case 'signup1_conversion_via_teaser':

					$_Action = 'signup1_conversion_via_teaser';

      		// record user session action --------------
        	mysql_query("INSERT INTO user_session_actions (userid, relativedata, action, ts) VALUES('$MemberID', '$ProfileMemberID', '$_Action', '$CurrentTime') ");
    			
				break;
				// ---------------------------------------


				
			}

		}
		// -------------------------------------------



		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------

		//return $_return;	
		}
	// =================================================================












	









	// METHOD :: GetMemberLastSearch ===================================
	public function GetMemberLastSearch($MemberID, $Gender){

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
		// -------------------------------------------


		// Retrieve Last Search ------------------------------------------
		$sql_SearchLast	= mysql_query("SELECT user_session_actions.relativedata, user_session_actions.ts, user.zipcode FROM user_session_actions, user WHERE user_session_actions.userid = '$MemberID' AND user.userid = '$MemberID' AND user_session_actions.action = 'search' ORDER BY user_session_actions.ts DESC"); 
  	$sql_obj_result	=	mysql_fetch_object($sql_SearchLast);
  	$sql_num_rows		=	mysql_num_rows($sql_SearchLast);


		$expiration			=	 time() - 300;
		

		// create new default search based on profile definitions ----------
		if($sql_obj_result->ts < $expiration || !$sql_num_rows){
			//echo $sql_obj_result->ts;

			// Retrieve Last Search ------------------------------------------
			$sql_SearchLast	= mysql_query("SELECT user_profile_specs.zipcode, user_profile_specs.seek_m, user_profile_specs.seek_w, user_profile_specs.seek_t, user_profile_specs.seek_c, user_profile_specs.into_friends, user_profile_specs.into_flirting, user_profile_specs.into_relationship, user_profile_specs.into_sex, user_profile_specs.into_fetish FROM user_profile_specs WHERE user_profile_specs.userid = '$MemberID'"); 
  		$sql_obj_result	=	mysql_fetch_object($sql_SearchLast);

			$LastSearch			= array(
				0		=>	$Gender,
				1		=>	$sql_obj_result->zipcode,
				2		=>	$sql_obj_result->seek_m.$sql_obj_result->seek_w.$sql_obj_result->seek_t.$sql_obj_result->seek_c,
				3		=>	$sql_obj_result->into_friends.$sql_obj_result->into_flirting.$sql_obj_result->into_relationship.$sql_obj_result->into_sex.$sql_obj_result->into_fetish,
				4		=>	'1899',
				5		=>	'000'
			);
			
			$_return				=	$LastSearch;

		
		// get last search -----------------------------------------------
		}else{
			$LastSearch			=	$sql_obj_result->relativedata;
			$_return				=	explode('-',$LastSearch);
		}

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;	
	}
	// =================================================================












	// METHOD :: Check fror Unread Mail ================================
	public function CheckForUnreadMail($MailOwner_UserID, $ConversationID, $Mode){


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //read operation
		// -------------------------------------------


		if($Mode == 'sender'){
			$sql_query			= mysql_query("SELECT user_conversation_msgs.msgid FROM user_conversation_msgs WHERE user_conversation_msgs.fromid = '$MailOwner_UserID' AND user_conversation_msgs.conversationid = '$ConversationID' AND user_conversation_msgs.read = '0'");
 			$sql_num_rows		=	mysql_num_rows($sql_query);
			$_return				=	$sql_num_rows;
		}elseif($Mode == 'receiver'){
			$sql_query			= mysql_query("SELECT user_conversation_msgs.msgid FROM user_conversation_msgs WHERE user_conversation_msgs.toid = '$MailOwner_UserID' AND user_conversation_msgs.conversationid = '$ConversationID' AND user_conversation_msgs.read = '0'");
 			$sql_num_rows		=	mysql_num_rows($sql_query);
			$_return				=	$sql_num_rows;
		}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;	
	}
	// =================================================================












	// METHOD :: CheckMemberMail =======================================
	public function CheckMemberMail($UserID, $Mode, $Status, $ConversationID = 0){


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //read operation
		// -------------------------------------------


		// num new msgs only -------------------------
		if($Mode == 'checkonly' && $Status == 'unread'){
			$sql_query			= mysql_query("SELECT user_conversation_msgs.conversationid FROM user_conversation_msgs WHERE user_conversation_msgs.toid = '$UserID' AND user_conversation_msgs.read = '0'");
  		$sql_num_rows		=	mysql_num_rows($sql_query);
			$_return				=	$sql_num_rows;

		// get conversations -------------------------
		}elseif($Mode == 'getconversations' && $Status == 'all'){

			$sql_query			= mysql_query("SELECT * FROM user_conversations WHERE user_conversations.rec_userid = '$UserID' OR user_conversations.init_userid = '$UserID' ORDER BY user_conversations.special DESC, user_conversations.ts_created DESC");
  		//$sql_obj_result	=	mysql_fetch_object($sql_query);
  		//$sql_num_rows		=	mysql_num_rows($sql_query);
			$_return				=	$sql_query;

		// get msgs per conversation -----------------
		}elseif($Mode == 'getconversations'  && $Status == 'specific' && $ConversationID != 0){

			$sql_query			= mysql_query("SELECT * FROM user_conversation_msgs WHERE user_conversation_msgs.conversationid = '$ConversationID' ORDER BY user_conversation_msgs.special");
  		//$sql_obj_result	=	mysql_fetch_object($sql_query);
  		//$sql_num_rows		=	mysql_num_rows($sql_query);
			$_return				=	$sql_query;
			
		}



		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	 return $_return;	
	}
	// =================================================================









/*

	// METHOD :: CheckMemberMail_OLD =======================================
	public function CheckMemberMail_OLD($UserID, $Bin, $Mode, $Status){


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //read operation
		// -------------------------------------------


		// check for new mail only -------------------
		if($Mode == 'checkonly' && $Bin == 0 && $Status == 'unread'){
			
			$sql_query			= mysql_query("SELECT mailid FROM user_mail WHERE user_mail.toid = '$UserID' AND user_mail.r = '0' AND user_mail.bin = '$Bin'");
  		$sql_num_rows		=	mysql_num_rows($sql_query);
			$_return				=	$sql_num_rows;

		// get amount per bin ------------------------
		}elseif($Mode == 'howmany'){

			$sql_query			= mysql_query("SELECT mailid FROM user_mail WHERE user_mail.toid = '$UserID' AND user_mail.r = '$Status' AND user_mail.bin = '$Bin'");
  		//$sql_obj_result	=	mysql_fetch_object($sql_query);
  		$sql_num_rows		=	mysql_num_rows($sql_query);
			$_return				=	$sql_num_rows;

		// get amount per bin ------------------------
		}elseif($Mode == 'getmail'){

			$sql_query			= mysql_query("SELECT mailid FROM user_mail WHERE user_mail.toid = '$UserID' AND user_mail.r = '$Status' AND user_mail.bin = '$Bin'");
  		$sql_obj_result	=	mysql_fetch_object($sql_query);
  		//$sql_num_rows		=	mysql_num_rows($sql_query);
			$_return				=	$sql_obj_result;
		}




		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------

		//$_return				=	$sql_obj_result;


	 return $_return;	
	}
	// =================================================================

*/









	// METHOD :: GetIMSession ==========================================
	public function GetIMSession($SessionID){


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //read operation
		// -------------------------------------------


  	// Retrieve Profile ----------------------------------------------
		$sql_query			= mysql_query("SELECT * FROM user_im_sessions WHERE user_im_sessions.id = '$SessionID'");
  	$sql_obj_result	=	mysql_fetch_object($sql_query);

		$_return				=	$sql_obj_result;


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;	
	}
	// =================================================================











	// METHOD :: AddRemoveBlockFriend ==================================
	public function AddRemoveBlockFriend($OwnerID, $FriendID, $Command){
		
		
		$timestamp		=	time();

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //read operation
		// -------------------------------------------

  	switch($Command){
  		
  		// -------------------------------------------
  		case('execute.myfriends.add'):

    		//if( mysql_query("REPLACE user_network (owner_userid, friend_userid, tscreated, type) VALUES ('$OwnerID', '$FriendID', '$timestamp', '2')") ){
    		$sql_num_rows		= null;
    		$sql_query			= mysql_query("SELECT * FROM user_network WHERE owner_userid = '$OwnerID' AND friend_userid = '$FriendID' AND type != 3 OR owner_userid = '$FriendID' AND friend_userid = '$OwnerID' AND type != 3");
    		$sql_num_rows		=	mysql_num_rows($sql_query);

    		if($sql_num_rows == null){
    			
    			$InsertResultA	= null;
    			$InsertResultB	= null;
    			$NewLinkID			= null;
    			$NewLinkID			=	md5(uniqid(rand(20,99999), true));
    			// primary/requester ---------
    			$InsertResultA 	= mysql_query("INSERT user_network (linkid, owner_userid, friend_userid, tscreated, type, requester) VALUES ('$NewLinkID', '$OwnerID', '$FriendID', '$timestamp', '2', '1')");
    			// recipient -----------------
    			$InsertResultB 	= mysql_query("INSERT user_network (linkid, owner_userid, friend_userid, tscreated, type, requester) VALUES ('$NewLinkID', '$FriendID', '$OwnerID', '$timestamp', '2', '0')");
    			
      		if($InsertResultA && $InsertResultB){
        		$_return = 1;
        	}else{
      	    $_return = 0;
        	}
    		}else{
    			$_return = 2;
    		}
  		break;
  		// -------------------------------------------




  		// -------------------------------------------
  		case('execute.myfriends.unblock'):

  		  //echo 'DEBUG:unblock';
//echo $FriendID;
  		  $sql_num_rows		= null;
    		//$sql_query			= mysql_query("SELECT * FROM user_network WHERE owner_userid = '$OwnerID' AND friend_userid = '$FriendID' AND blockuid = '$OwnerID' OR owner_userid = '$FriendID' AND friend_userid = '$OwnerID' AND blockuid = '$OwnerID'");
    		$sql_query			= mysql_query("SELECT * FROM user_network WHERE owner_userid = '$OwnerID' AND friend_userid = '$FriendID'");
    		$sql_num_rows		=	mysql_num_rows($sql_query);
    		
    		if($sql_num_rows){
    			$LinkID			= null;
    			$LinkID			=	mysql_result($sql_query,0,"linkid");
    			
    			if(mysql_query("DELETE FROM user_network WHERE user_network.linkid = '$LinkID'")){
     				$_return = 1;
      		}else{
						$_return = 0;
      		}
    		}

  		break;
  		// -------------------------------------------		




   		// -------------------------------------------
  		case('execute.myfriends.remove'):

  		  //echo 'DEBUG:remove';

  		  $sql_num_rows		= null;
    		//$sql_query			= mysql_query("SELECT * FROM user_network WHERE owner_userid = '$OwnerID' AND friend_userid = '$FriendID' OR owner_userid = '$FriendID' AND friend_userid = '$OwnerID'");
    		$sql_query			= mysql_query("SELECT * FROM user_network WHERE owner_userid = '$OwnerID' AND friend_userid = '$FriendID'");
    		$sql_num_rows		=	mysql_num_rows($sql_query);
    		
    		if($sql_num_rows){
    			$LinkID				= null;
    			$LinkID				=	mysql_result($sql_query,0,"linkid");
    			
    			if(mysql_query("DELETE FROM user_network WHERE user_network.linkid = '$LinkID'")){
     				$_return = 1;
      		}else{
						$_return = 0;
      		}
    		}
  		break;
  		// -------------------------------------------		





  		// -------------------------------------------
  		case('execute.myfriends.accept'):
  			$sql_num_rows		= null;
    		//$sql_query			= mysql_query("SELECT * FROM user_network WHERE owner_userid = '$OwnerID' AND friend_userid = '$FriendID' OR owner_userid = '$FriendID' AND friend_userid = '$OwnerID'");
    		$sql_query			= mysql_query("SELECT * FROM user_network WHERE owner_userid = '$OwnerID' AND friend_userid = '$FriendID'");
    		$sql_num_rows		=	mysql_num_rows($sql_query);
  			if($sql_num_rows){
  				$LinkID				=	mysql_result($sql_query,0,"linkid");
  				if(mysql_query("UPDATE user_network SET status = '1' WHERE linkid = '$LinkID'")){
  					$_return = 1;
  				}else{
  					$_return = 0;
  				}
  				
	 			}
	 		break;
  		// -------------------------------------------





  		// -------------------------------------------
  		case('execute.myfriends.block'):
  			$sql_num_rows		= null;
    		//$sql_query			= mysql_query("SELECT * FROM user_network WHERE owner_userid = '$OwnerID' AND friend_userid = '$FriendID' OR owner_userid = '$FriendID' AND friend_userid = '$OwnerID'");
    		$sql_query			= mysql_query("SELECT * FROM user_network WHERE owner_userid = '$OwnerID' AND friend_userid = '$FriendID'");
    		$sql_num_rows		=	mysql_num_rows($sql_query);

  			if(!$sql_num_rows){
    			$InsertResultA	= null;
    			$InsertResultB	= null;
    			$NewLinkID			= null;
    			$NewLinkID			=	md5(uniqid(rand(20,99999), true));

    			// primary/requester ---------
    			$InsertResultA 	= mysql_query("INSERT user_network (linkid, owner_userid, friend_userid, tscreated, type, blockuid, requester) VALUES ('$NewLinkID', '$OwnerID', '$FriendID', '$timestamp', '3', '$OwnerID', '1')");

    			// recipient -----------------
    			$InsertResultB 	= mysql_query("INSERT user_network (linkid, owner_userid, friend_userid, tscreated, type, blockuid, requester) VALUES ('$NewLinkID', '$FriendID', '$OwnerID', '$timestamp', '3', '$OwnerID', '0')");
  				$_return = 1;

  			}else{
    			$LinkID				= null;
    			$LinkID				=	mysql_result($sql_query,0,"linkid");
    			if(mysql_query("DELETE FROM user_network WHERE user_network.linkid = '$LinkID'")){
      			$InsertResultA	= null;
      			$InsertResultB	= null;
      			$NewLinkID			= null;
      			$NewLinkID			=	md5(uniqid(rand(20,99999), true));

      			// primary/requester ---------
      			$InsertResultA 	= mysql_query("INSERT user_network (linkid, owner_userid, friend_userid, tscreated, type, blockuid, requester) VALUES ('$NewLinkID', '$OwnerID', '$FriendID', '$timestamp', '3', '$OwnerID', '1')");

      			// recipient -----------------
      			$InsertResultB 	= mysql_query("INSERT user_network (linkid, owner_userid, friend_userid, tscreated, type, blockuid, requester) VALUES ('$NewLinkID', '$FriendID', '$OwnerID', '$timestamp', '3', '$OwnerID', '0')");
    				$_return = 1;
      		}else{
						$_return = 0;
      		}
  			}
	 		break;
  		// -------------------------------------------

  	}



		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 echo $_return;	
	}
	// =================================================================











	// METHOD :: GetMemberProfile_Settings =============================
	public function GetMemberProfile_Settings($MemberID){

		$_return									= false;



		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------


  	// Retrieve Profile Settings------------------
		$sql_query			= mysql_query("SELECT user_profile_specs.visits, user_profile_specs.setting_nudity, user_profile_specs.setting_graphics, user_profile_specs.setting_discreet, user_profile_specs.setting_disable, user_profile_specs.setting_mailnotifier FROM user_profile_specs WHERE user_profile_specs.userid = '$MemberID'"); 
  	$sql_obj_result	=	mysql_fetch_object($sql_query);
		// -------------------------------------------

		$_return				= $sql_obj_result;

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
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
		$sql_MbrSpec		= mysql_query("SELECT * FROM user_profile_specs, user_profile_essay, user WHERE user_profile_specs.userid = '$MemberID' AND user.userid = '$MemberID' AND user_profile_essay.userid = '$MemberID'"); 
  	$sql_obj_result	=	mysql_fetch_object($sql_MbrSpec);



		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



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
				'numimages'			=>	$sql_obj_result->numimages,
				
				'readrate'			=>	$sql_obj_result->readrate,
				'replyrate'			=>	$sql_obj_result->replyrate
			);

  		$_return			=	$MemberProfileSpecArray;

		}else{
			$_return			= false;
		}


	 return $_return;  	
	}
	// =================================================================










/*
	// METHOD :: Encrypt ===============================================
	public function Encrypt($PlainText, $Cipher = 'public'){

		if($Cipher == 'public'){
      // Encryption ----------------------------------------------------
      $encryptObj							=	new baseCrypto;
      $encryptObj->cipherType = $this->__cipherType_PUBLIC;
      $encryptObj->cipherMode = $this->__cipherMode_PUBLIC;
      $encryptObj->passPhrase = $this->__passphrase_PUBLIC;
      $encryptObj->key 				= $this->__key_PUBLIC;
      // ---------------------------------------------------------------
  	}elseif($Cipher == 'private'){
      // Encryption ----------------------------------------------------
      $encryptObj							=	new baseCrypto;
      $encryptObj->cipherType = $this->__cipherType_PRIVATE;
      $encryptObj->cipherMode = $this->__cipherMode_PRIVATE;
    	$encryptObj->passPhrase = $this->__passphrase_PRIVATE;
    	$encryptObj->key 				= $this->__key_PRIVATE;      
      // ---------------------------------------------------------------
  	}


		// Encrypt Plain Text --------------------------------------------
		$encryptObj->plainText			=	$PlainText;
		$CipherText 								=	$encryptObj->ReturnHexCipherText();



		// Destroy Encryption Object -------------------------------------
		$encryptObj->__destruct();

		return $CipherText;		
	}
	// =================================================================
*/







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

  		$confXML				= '/var/www/vhosts/dbconf/keys.'.$this->SiteDomain;
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









/*
	// METHOD :: Decrypt ===============================================
	public function Decrypt($CipherText, $Cipher = 'public'){

		if($Cipher == 'public'){
      // Encryption ----------------------------------------------------
      $encryptObj							=	new baseCrypto;
      $encryptObj->cipherType = $this->__cipherType_PUBLIC;
      $encryptObj->cipherMode = $this->__cipherMode_PUBLIC;
      $encryptObj->passPhrase = $this->__passphrase_PUBLIC;
      $encryptObj->key 				= $this->__key_PUBLIC;
      // ---------------------------------------------------------------
  	}elseif($Cipher == 'private'){
      // Encryption ----------------------------------------------------
      $encryptObj							=	new baseCrypto;
      $encryptObj->cipherType = $this->__cipherType_PRIVATE;
      $encryptObj->cipherMode = $this->__cipherMode_PRIVATE;
    	$encryptObj->passPhrase = $this->__passphrase_PRIVATE;
    	$encryptObj->key 				= $this->__key_PRIVATE;      
      // ---------------------------------------------------------------
  	}

		// Decrypt Cipher Text -------------------------------------------
		$encryptObj->DecryptIt	=	$CipherText;
		$_return								=	$encryptObj->ReturnDecryptedText();

		// Destroy Encryption Object -------------------------------------
		$encryptObj->__destruct();

		return $_return;
	}
	// =================================================================
*/







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

  		$confXML				= '/var/www/vhosts/dbconf/keys.'.$this->SiteDomain;
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







	// METHOD :: Activate ==============================================
	public function Activate($UserIDEncrypted, $PasswordEncrypted){

		$_return								= false;

		$UserIDDecrypted				=	$this->Decrypt($UserIDEncrypted);



		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
		// -------------------------------------------

		// Activate User via DB ----------------------
		if( mysql_query("UPDATE user SET user.activated = '1' WHERE user.userid = '$UserIDDecrypted' AND user.password = '$PasswordEncrypted'") ){
			$_return	= true; 	
		}
		// -------------------------------------------

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------

		
		return $_return;
		
	}
	// =================================================================






	// METHOD :: GetPassword ===========================================
	public function GetPassword($MemberEmailAddress){

		$_return								= false;


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

  	// Retrieve Password --------------------------------------------
		$sql_Password		= mysql_query("SELECT user.password FROM user WHERE user.email_addr = '$MemberEmailAddress'"); 
  	$sql_obj_result	=	mysql_fetch_object($sql_Password);
  	// --------------------------------------------------------------

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);


  	if( $sql_obj_result == true ){
  		//$encryptObj->DecryptIt	=	$sql_obj_result->password;
			$_return 								= $this->Decrypt($sql_obj_result->password, 'private');
		}else{
			$_return								= 666;
		}


	 return $_return;  	
	}
	// =================================================================





	// METHOD :: Authenticate ==========================================
	public function Authenticate($UserArray){

			$this->_OBJ_Session->fSession_Interface('Authenticate', $UserArray);

			if( $this->_OBJ_Session->session_Authenticated == true ){
				$this->MemberAuthorized = true;
				
				// check for Paid Member -----------------
				if( ($this->MemberAuthorized == true) && ($this->VerifyMemberPaid($UserArray['userid']) == 'paid') ){
					$this->MemberPaid = true;
				}
				// ---------------------------------------
			}
	}
	// =================================================================





	// METHOD :: Logout ================================================
	public function Logout($UserArray){
		
		if(!$this->_OBJ_Session){
			$this->_OBJ_Session						=	new session;
		}
		
		$this->_OBJ_Session->fSession_Interface('Logout', $UserArray);
	}
	// =================================================================





/*


// METHOD :: ImageUpload ===========================================
	public function ImageUpload($File, $ParentID){

		// load XML ----------------------------------
  	$confXML				= 'config/img_conf';
 		$_baseXMLConn		= simplexml_load_file($confXML) or die ("ERROR: ** XML img_conf File Not Loaded  **");

		
		$image_tmp_name			= $_FILES['image']['tmp_name'];
		

  	// parse XML ---------------------------------
  	foreach($_baseXMLConn->imagesize as $imageType){

  
	     	$imgpath		= $imageType->target_dir;
	     	$height 		= $imageType->height;
  	   	$width			= $imageType->width;

  			$_filename	= $imgpath.$ParentID.'.jpg';		
  			$this->_ThumbImage($image_tmp_name, $width, $_filename);

  	}


/*
		$path_microthumb 		= "media/img_thumb100/";

		$_tmp_target_pathA 	= "media/img_thumb100/";
		$_tmp_target_pathB 	= $_tmp_target_pathA.basename($ParentID.'.jpg');

		$target_path 				= "media/img_teaser400/";
		$target_path 				= $target_path.basename($ParentID.'.jpg');
*/

/*
		$_return						= false;

		//$file_prefix			= $this->MemberID;
		$file_name 					= $_FILES['image']['name'];

		//$image_name 			= $_FILES['image']['name'];
		//$image_tmp_name		= $_FILES['image']['tmp_name'];
		//$image_size 			= $_FILES['image']['size'];
		//$image_type 			= $_FILES['image']['type'];
		$image_type 				= 1;

		$image_avatar				=	$_POST['img_avatar'];  if($image_avatar){$image_avatar = 1;}else{$image_avatar = 0;};
		$image_desc					=	$_POST['img_desc'];
		$image_ts						=	time();

		$target_path 				= "media/img_teaser400/";
		//$target_path 			= $target_path.basename($ParentID.'_'.$file_name);
		//CONVERT IMAGE HERE =============================================
		$target_path 				= $target_path.basename($ParentID.'.jpg');


		// upload image to DIR & data to DB ------------------------------
		//if( (copy($image_tmp_name, $target_path)) && (move_uploaded_file($this->ImageResize($image_tmp_name, 'thumb', $ParentID), $_tmp_target_pathB)) ){
		//if( (copy($image_tmp_name, $target_path)) && $this->ImageResize($image_tmp_name, 'thumb', $ParentID) ){
		//if( move_uploaded_file($this->ImageResize($image_tmp_name, 'gallery', $ParentID), $imgpath_gallery) ){
		if(1==1){

  		// database connection ---------------------
  		$obj_db					= new db;
  		$obj_db->Connect(0); //write operation

    	// Create/Insert New Member ----------------
    	if( mysql_query("INSERT INTO user_images (userid, type, ts_created) VALUES('$ParentID', '$image_type', '$image_ts') ") or die (mysql_error()) ){
    		$_return = mysql_insert_id();
    	}else{
    		$_return = false;
    	}


  		// destroy database connection object --------
  		$obj_db->Close();
  		unset($obj_db);	

		}else{
 			$_return = false;
		}
		// ---------------------------------------------------------------

	 return $_return;  	
	}
	// =================================================================

*/



// METHOD :: VerificationImageUpload =================================
	public function VerificationImageUpload($File, $ParentID, $Auto = 0){



		// manual upload by member -------------------
		if($Auto == 0){

  		$image_tmp_name	= $_FILES['image']['tmp_name'];
  		$image_type 		= $_FILES['image']['type'];
  		
  		// IE7 assigns all JPEG Uploads to PJPEG -----
  		if($image_type == 'image/pjpeg'){
  			$image_type = 'image/jpeg';
  		}
  		// -------------------------------------------
  
  
  		$image_size 		= $_FILES['image']['size'];
  		$file_name 			= $_FILES['image']['name'];
  		
  		$_return				= false;
  
  		$image_ts				=	time();

		// auto-populate -----------------------------
		}else{
			$image_tmp_name	= $File;
			$image_type 		= 'image/jpeg';
			$image_ts				=	time();
		}
		// -------------------------------------------


//echo $image_type;

		// verify valid image file and size limitation ---------
		if( ($image_type == 'image/jpg') || ($image_type == 'image/jpeg') || ($image_type == 'image/gif') || ($image_type == 'image/png') && ($image_size < 6000000) ){


  		// database connection ---------------------
  		$obj_db					= new db;
  		$obj_db->Connect(0); //write operation
	  	// -----------------------------------------



    	// Create image record ---------------------
    	if( mysql_query("INSERT INTO verification (userid, ts) VALUES('$ParentID', '$image_ts') ") ){
    	//if( ($Auto == 0 ? mysql_query("INSERT INTO user_images (userid, ts_created) VALUES('$ParentID', '$image_ts') ") : mysql_query("INSERT INTO user_images (userid, ts_created, rating, avatar, approved) VALUES('$ParentID', '$image_ts', '0', '1', '1') ") ) ){


    		$RecordID_IMG = mysql_insert_id();
				$_return 			=	$RecordID_IMG;
				

  	  		// crop & upload image ---------------------
  	     	$imgpath								= 'media/img_verification/';
  	     	$height 								= '1000';
    	   	$width									= '1000';
    	   	$_FileID_UNIQUE					=	uniqid('fnf-verify-',true);
    	   	$_OwnerUserID_ENCRYPTED	= $this->Encrypt($ParentID, 'private');
					$_FileName_FINAL				= $_OwnerUserID_ENCRYPTED.'-'.$_FileID_UNIQUE.'.jpg';

    			mysql_query("UPDATE verification SET verification.filename = '$_FileName_FINAL' WHERE verification.id = '$RecordID_IMG'");


    			// crop image - remove DB record if crop fails ---
    			if(!$this->_CropImage($image_tmp_name, $width, $imgpath.$_FileName_FINAL, $image_type)){
    				mysql_query("DELETE FROM verification WHERE id = '$RecordID_IMG' ") or die (mysql_error());
    			}
  	  	// -----------------------------------------
  
  
    		// destroy database connection object --------
    		$obj_db->Close();
    		unset($obj_db);	
  	  	// -----------------------------------------


    	}else{
    		$_return = false;
    	}
	  	// -----------------------------------------


		}else{
			$_return = false;
		}


	 return $_return;  	
	}
	// =================================================================








// METHOD :: Get Number Images for Member ============================
	public function GetNumImages($OwnerID){

			$_return = null;

  		// database connection ---------------------
  		$obj_db					= new db;
  		$obj_db->Connect(0); //write operation
	  	// -----------------------------------------


			$sql_result					=	mysql_query("SELECT user_profile_specs.numimages FROM user_profile_specs WHERE user_profile_specs.userid = '$OwnerID'");
			$sql_obj_result			=	mysql_fetch_object($sql_result);
			$_return 						= $sql_obj_result->numimages;


  		// destroy database connection object ------
	   		$obj_db->Close();
 	  	// -----------------------------------------

	 return $_return;  	
	}
// =================================================================












// METHOD :: Get Number Images for Member ============================
	public function GetNumImages_r2($UserID){

			$_return = null;

  		// database connection ---------------------
  		$obj_db					= new db;
  		$obj_db->Connect(0); //read operation
	  	// -----------------------------------------

			$sql_result					=	mysql_query("SELECT * FROM user_images WHERE user_images.userid = '$UserID'");
			$sql_num_rows				=	mysql_num_rows($sql_result);

  		// destroy database connection object ------
	   	$obj_db->Close();
	   	unset($obj_db);
 	  	// -----------------------------------------

			$_return 						=	$sql_num_rows;

	 return $_return;  	
	}
// =================================================================












// METHOD :: ImageUpload ===========================================
	public function ImageUpload($File, $ParentID, $Auto = 0){


		// load XML ----------------------------------
  	//$confXML				= 'config/img_conf';
  	$confXML				= '/var/www/vhosts/dbconf/img.conf';
 		$_baseXMLConn		= simplexml_load_file($confXML) or die ("ERROR: ** XML img.conf File Not Loaded  **");


		// manual upload by member -------------------
		if($Auto == 0){

  		$image_tmp_name	= $_FILES['image']['tmp_name'];
  		$image_type 		= $_FILES['image']['type'];
  		
  		// IE7 assigns all JPEG Uploads to PJPEG -----
  		if($image_type == 'image/pjpeg'){
  			$image_type = 'image/jpeg';
  		}
  		// -------------------------------------------
  
  
  		$image_size 		= $_FILES['image']['size'];
  		$file_name 			= $_FILES['image']['name'];
  		
  		$_return				= false;
  
  		$image_avatar		=	$_POST['img_avatar'];  if($image_avatar){$image_avatar = 1;}else{$image_avatar = 0;};
  		$image_desc			=	$_POST['img_desc'];
  		$image_ts				=	time();

		// auto-populate -----------------------------
		}else{
			$image_tmp_name	= $File;
			$image_type 		= 'image/jpeg';
			$image_ts				=	time();
		}
		// -------------------------------------------



		// verify valid image file and size limitation ---------
		if( ($image_type == 'image/jpg') || ($image_type == 'image/jpeg') || ($image_type == 'image/gif') || ($image_type == 'image/png') && ($image_size < 3000000) ){


			if($this->GetNumImages_r2($ParentID)){
				$__AvatarSetting = 0;
			}else{
				$__AvatarSetting = 1;
			}


  		// database connection ---------------------
  		$obj_db					= new db;
  		$obj_db->Connect(0); //write operation
	  	// -----------------------------------------


    	// Create image record ---------------------
    	if( ($Auto == 0 ? mysql_query("INSERT INTO user_images (userid, ts_created, avatar) VALUES('$ParentID', '$image_ts', '$__AvatarSetting') ") : mysql_query("INSERT INTO user_images (userid, ts_created, rating, avatar, approved) VALUES('$ParentID', '$image_ts', '0', '1', '1') ") ) ){
				
				// image IDs -----------------------------
    		$imgID 		= mysql_insert_id();
				$_return 	=	$imgID;
				
				// uniqieImageID -------------------------
				$uniqueID	= md5(uniqid());
				
				
				// update number of images ---------------
				mysql_query("UPDATE user_profile_specs SET user_profile_specs.numimages = user_profile_specs.numimages + 1 WHERE user_profile_specs.userid = '$ParentID'") or die (mysql_error());


  	  	// crop & upload image ---------------------
    		foreach($_baseXMLConn->imagesize as $imageType){
  
  	     	$imgpath		= $imageType->target_dir;
  	     	$height 		= $imageType->height;
    	   	$width			= $imageType->width;


    			//$_filename_INSECURE		= $imgpath.$imgID.'-'.$ParentID.'-'.$uniqueID.'.jpg';										// to be depreciated  
					//$_FILENAME_ONLY				= $imgID.'-'.$ParentID.'-'.$uniqueID.'.jpg';														// to be depreciated

    			$_filename_INSECURE		= $imgpath.$imgID.'-'.$ParentID.'.jpg';										// to be depreciated  
					$_FILENAME_ONLY				= $imgID.'-'.$ParentID.'.jpg';														// to be depreciated


/*
ADDME / ADD ME >> TO REPLACE CURRENT SYSTEM - SYNC ALL VIEWING SYSTEMS ONCE ADDED

    	   	$_FileID_UNIQUE					=	uniqid('fnf-',false);
    	   	$_OwnerUserID_ENCRYPTED	= $this->Encrypt($ParentID, 'public');
					$_FileName_FINAL				= $_OwnerUserID_ENCRYPTED.'-'.$_FileID_UNIQUE.'.jpg';
    			mysql_query("UPDATE user_images SET user_images.filename = '$_FileName_FINAL' WHERE user_images.imageid = '$imgID'");
*/
					// TO BE DEPRECIATED ONCE ABOVE IS IMPLEMENTED !!
    			mysql_query("UPDATE user_images SET user_images.filename = '$_FILENAME_ONLY' WHERE user_images.imageid = '$imgID'");
    			
    			// crop image - remove DB record if crop fails ---
    			if(!$this->_CropImage($image_tmp_name, $width, $_filename_INSECURE, $image_type)){
    				mysql_query("DELETE FROM user_images WHERE imageid = '$imgID' ") or die (mysql_error());
    			}
  	  	}
  	  	// -----------------------------------------
  
  
    		// destroy database connection object ------
    		$obj_db->Close();
    		unset($obj_db);	
  	  	// -----------------------------------------


    	}else{
    		$_return = false;
    	}
	  	// -----------------------------------------


		}else{
			$_return = false;
		}


	 return $_return;  	
	}
	// =================================================================











	// METHOD :: ImageDelete ===========================================
	public function ImageDelete($ImageID, $UserID){

		// load XML ----------------------------------
  	//$confXML				= '/var/www/vhosts/'.$this->SiteDomain.'/httpdocs/config/img_conf';
  	$confXML				= '/var/www/vhosts/dbconf/img.conf';
 		$_baseXMLConn		= simplexml_load_file($confXML) or die ("ERROR: ** XML img_conf File Not Loaded  **");



		// database connection ---------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
  	// -----------------------------------------




		// remove from database --------------------
		$sql_result = mysql_query("DELETE FROM user_images WHERE imageid = '$ImageID' AND userid = '$UserID' ");

		// update number of images -----------------
		mysql_query("UPDATE user_profile_specs SET user_profile_specs.numimages = user_profile_specs.numimages - 1 WHERE user_profile_specs.userid = '$UserID'");

  	// remove image ------------------------------
		foreach($_baseXMLConn->imagesize as $imageType){
     	$imgpath		= $imageType->target_dir;
			$_filename	= $imgpath.$ImageID.'-'.$UserID.'.jpg';		
			@unlink($_filename);
  	}
  	// -----------------------------------------


 		// destroy database connection object --------
		$obj_db->Close();
 		unset($obj_db);	
  	// -----------------------------------------

		//$_return 		= $sql_result;

	 return 1;
	}
	// =================================================================









	// METHOD :: ImagePrimary ==========================================
	public function ImagePrimary($ImageID, $UserID){

		// database connection ---------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //write operation
  	// -----------------------------------------


		// check for existing primary image ----------
		$sql_result			= mysql_query("SELECT user_images.imageid FROM user_images WHERE user_images.userid = '$UserID' AND user_images.avatar = '1' ");
  	$sql_obj_result	=	mysql_fetch_object($sql_result);

		//if primary exists > unset ------------------
		if($sql_obj_result->imageid){
			$sql_result 		= mysql_query("UPDATE user_images SET user_images.avatar = '0' WHERE user_images.userid = '$UserID' AND user_images.imageid = '$sql_obj_result->imageid'") or die (mysql_error());
		}


		// set image primary -----------------------
		$sql_result 		= mysql_query("UPDATE user_images SET user_images.avatar = '1' WHERE user_images.userid = '$UserID' AND user_images.imageid = '$ImageID'") or die (mysql_error());


 		// destroy database connection object --------
		$obj_db->Close();
 		unset($obj_db);	
  	// -----------------------------------------

		$_return 		= $sql_result;

	 return $_return;  	
	}
	// =================================================================









	// METHOD :: _CropImage ============================================
	private function _CropImage($source, $size, $dest, $filetype){

    $thumb_size = $size;
    
    $size 			= getimagesize($source);
    $width 			= $size[0];
    $height 		= $size[1];

    if($width > $height){
    	$x 			= ceil(($width - $height) / 2 );
    	$width 	= $height;
    }elseif($height > $width){
    	$y 			= ceil(($height - $width) / 2);
    	$height = $width;
    }

    $new_im = ImageCreatetruecolor($thumb_size, $thumb_size);
    
    //image conversion ---------------------------
    switch($filetype){
    	
    	case 'image/jpg':
    	$im 		= imagecreatefromjpeg($source);
    	break;

    	case 'image/jpeg':
    	$im 		= imagecreatefromjpeg($source);
    	break;

    	case 'image/png':
    	$im 		= imageCreateFromPNG($source);
    	break;

    	case 'image/gif':
    	$im 		= imageCreateFromGIF($source);
    	break;

    }


    //imagecopyresampled($new_im, $im, 0, 0, $x, $y, $thumb_size, $thumb_size, $width, $height);												// DEP.02.17.09.NAB - OLD crop >> cropped from center
    imagecopyresampled($new_im, $im, 0, 0, $x, 0, $thumb_size, $thumb_size, $width, $height);														// MOD.02.17.09.NAB - crop from image top down >> theory most photos of people have heads @ top portion
    if( imagejpeg($new_im, $dest, 100) ){
    	$_return = true;
    }

  return $_return;
  }
	// =================================================================









// METHOD :: ImageResize ===========================================
	public function ImageResize($Image, $Type, $UserID){

		// class.dbconn - database connection ----------------------
		//require("common/class/class.imageconverter.php");
		//new ImageConverter($_FILES['image'],'jpg');


		// load XML ----------------------------------
  	//$confXML				= 'config/img_conf';
  	$confXML				= '/var/www/vhosts/dbconf/img.conf';
 		$_baseXMLConn		= simplexml_load_file($confXML) or die ("ERROR: ** XML img_conf File Not Loaded  **");

  	// parse XML ---------------------------------
  	foreach($_baseXMLConn->imagesize as $operation_Config){
  		if($operation_Config->type == $Type){
	     	$_height 		= $operation_Config->height;
  	   	$_width			= $operation_Config->width;
  		}
  	}

		//$source									= $_FILES['image'];
		//$image_name 						= $_FILES['image']['name'];
		//$image_tmp_name					= $_FILES['image']['tmp_name'];
		//$image_size 						= $_FILES['image']['size'];
		//$image_type 						= $_FILES['image']['type'];		

		$_return								= false;
		$image_tmp_name					= $Image;


		// get image width & hieght --------------------------------------
		list($image_width, $image_height) = getimagesize($image_tmp_name);
    $new_width	= $_width;
		$new_height	= $_height;
		//----------------------------------------------------------------
		
		// Teaser image -----------------------------------------------
    $this->_ResizeImage($image_tmp_name, $image_tmp_name, $new_width, $new_height, 80);
		
		// Thumbnail image -----------------------------------------------
    $__destination = 'media/img_thumb/'.$UserID.'.jpg';
    $this->_ThumbImage($image_tmp_name, 100, $__destination);

		// MicroThumbnail image ------------------------------------------
    $__destination = 'media/img_microthumb/'.$UserID.'.jpg';
    $this->_ThumbImage($image_tmp_name, 50, $__destination);





		$image_handle 	= fopen($image_tmp_name, 'r');
		$image_output		= fread($image_handle, filesize($image_tmp_name));
		fclose($image_handle);


		//$_return = $image_output;		// binary data
		$_return = $image_tmp_name;		// image tmp name
		//----------------------------------------------------------------


	 return $_return;
	}
	// =================================================================









	// METHOD :: ImageResize ===========================================
	private function _ResizeImage($Image, $NewImage, $MaxWidth, $MaxHeight, $Quality){
    	
    	list($ImageWidth, $ImageHeight, $TypeCode) = getimagesize($Image);
      
      $ImageType			= ($TypeCode==1?"gif":($TypeCode==2?"jpeg":($TypeCode==3?"png":FALSE)));
      $CreateFunction	=	"imagecreatefrom".$ImageType;
      $OutputFunction	=	"image".$ImageType;
      
      if($ImageType){
      	$Ratio				=	( $ImageHeight / $ImageWidth );
        $ImageSource	=	$CreateFunction($Dir.$Image);
        
        if($ImageWidth > $MaxWidth || $ImageHeight > $MaxHeight){
        	if($ImageWidth > $MaxWidth){
          	$ResizedWidth		=	$MaxWidth;
            $ResizedHeight	=	$ResizedWidth*$Ratio;
          }else{
           	$ResizedWidth		=	$ImageWidth;
            $ResizedHeight	=	$ImageHeight;
          }       
          
          if($ResizedHeight > $MaxHeight){
          	$ResizedHeight	=	$MaxHeight;
            $ResizedWidth		=	$ResizedHeight / $Ratio;
          }
          
          $ResizedImage	=	imagecreatetruecolor($ResizedWidth, $ResizedHeight);
          imagecopyresampled($ResizedImage, $ImageSource, 0, 0, 0, 0, $ResizedWidth, $ResizedHeight, $ImageWidth, $ImageHeight);

        }else{
        	$ResizedWidth		=	$ImageWidth;
          $ResizedHeight	=	$ImageHeight;     
          $ResizedImage		=	$ImageSource;
        }
        
        $OutputFunction($ResizedImage,$NewImage,$Quality);
        return true;
      }else{
        return false;
      }

	}
	// =================================================================








	// METHOD :: ImageDisplaySpecific ==================================
	public function ImageDisplaySpecific($UserID, $ImageID, $Type, $Avatar = 0, $Mode = false, $ViewerNudityMode = 0){
		$_return					= false;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		// query -------------------------------------
		if($Avatar == 1){
			//$sql_img					= mysql_query("SELECT user_images.rating, user.gender FROM user_images, user WHERE user.userid = '$UserID' AND user_images.imageid = '$ImageID' AND user_images.avatar = '1'");
  		$_SELECT = "
  		SELECT user_images.rating, user.gender 
  		FROM user_images, user 
  		WHERE user.userid = '$UserID' AND user_images.imageid = '$ImageID' AND user_images.avatar = '1' AND user_images.approved = '1'
  		";
			$sql_img					= mysql_query($_SELECT);
		}else{
			//$sql_img					= mysql_query("SELECT user_images.rating, user.gender FROM user_images, user WHERE user.userid = '$UserID' AND user_images.imageid = '$ImageID'");
  		$_SELECT = "
  		SELECT user_images.rating, user.gender 
  		FROM user_images, user 
  		WHERE user.userid = '$UserID' AND user_images.imageid = '$ImageID' AND user_images.approved = '1'
  		";
			$sql_img					= mysql_query($_SELECT);			
		}
			$sql_obj_result		=	mysql_fetch_object($sql_img);
		// -------------------------------------------




		if($Mode == false){

  		// 100px image size ------------------------
  		if($Type == 1){


				if($ViewerNudityMode == 0 && $sql_obj_result->rating == 1){

					// restricted image --------------------
					switch($sql_obj_result->gender){
						case 1:
							//echo '<a href="MyStuff"><img src="http://friendsnflings.com/common/img/default/restricted_50x50_m.jpg" border="0"></a>';
							echo '<a href="ViewProfile-'.$this->Encrypt($UserID).'"><img src="/common/img/default/restricted_100x100_m.jpg" border="0"></a>';
							
						break;
						case 2:
							//echo '<a href="MyStuff"><img src="http://friendsnflings.com/common/img/default/restricted_50x50_f.jpg" border="0"></a>';
							echo '<a href="ViewProfile-'.$this->Encrypt($UserID).'"><img src="/common/img/default/restricted_100x100_f.jpg" border="0"></a>';
						break;
					}
					// -------------------------------------
					
				}else{

					if($sql_obj_result){
						echo '<a href="ViewProfile-'.$this->Encrypt($UserID).'"><img src="/media/img_thumb/'.$ImageID.'-'.$UserID.'.jpg" border="0"></a>';
					}else{
						echo '<a href="ViewProfile-'.$this->Encrypt($UserID).'"><img src="/common/img/default/100x100-no-added-photo-yet.gif" border="0"></a>';
					}
				}

			
			// 50px image size -------------------------
  		}elseif($Type == 2){


				if($ViewerNudityMode == 0 && $sql_obj_result->rating == 1){

					// restricted image --------------------
					switch($sql_obj_result->gender){
						case 1:
							//echo '<a href="MyStuff"><img src="http://friendsnflings.com/common/img/default/restricted_50x50_m.jpg" border="0"></a>';
							echo '<a href="ViewProfile-'.$this->Encrypt($UserID).'"><img src="/common/img/default/restricted_50x50_m.jpg" border="0"></a>';
							
						break;
						case 2:
							//echo '<a href="MyStuff"><img src="http://friendsnflings.com/common/img/default/restricted_50x50_f.jpg" border="0"></a>';
							echo '<a href="ViewProfile-'.$this->Encrypt($UserID).'"><img src="/common/img/default/restricted_50x50_f.jpg" border="0"></a>';
						break;
					}
					// -------------------------------------
					
				}else{

					if($sql_obj_result){
						echo '<img src="/media/img_microthumb/'.$ImageID.'-'.$UserID.'.jpg" border="0">';
					}else{
						echo '<img src="/common/img/default/50x50-no-added-photo-yet.gif" border="0">';
					}
				}


			// 300px image size ------------------------
  		}elseif($Type == 3){

				if($ViewerNudityMode == 0 && $sql_obj_result->rating == 1){

					// restricted image --------------------
					switch($sql_obj_result->gender){
						case 1:
							echo '<a href="MyStuff"><img src="/common/img/default/restricted_300x300_m.jpg" border="0"></a>';
						break;
						case 2:
							echo '<a href="MyStuff"><img src="/common/img/default/restricted_300x300_f.jpg" border="0"></a>';
						break;
					}
					// -------------------------------------
					
				}else{

					if($sql_obj_result){
						echo '<img src="/media/img_profile/'.$ImageID.'-'.$UserID.'.jpg" border="0">';
					}else{
						echo '<img src="common/img/default/no-added-photo-yet.jpg" border="0">';	
					}
				}
  		
  		// 600px image size ------------------------
  		}elseif($Type == 4){
  			echo '<img src="/media/img_gallery/'.$ImageID.'-'.$UserID.'.jpg">';
  		}


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










	// METHOD :: ImageDisplay ===========================================
	public function ImageDisplay($UserID, $Type, $Avatar = 0, $Mode = false, $ViewerNudityMode = 0){

		$_return					= false;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1, 'friendsnflings.com');  //read operation
		// -------------------------------------------


		// query -------------------------------------
		if($Avatar == 1){
			$sql_img					= mysql_query("SELECT user_images.rating, user_images.imageid, user.gender FROM user_images, user WHERE user_images.userid = '$UserID' AND user.userid = '$UserID' AND avatar = '1'") or die('ERROR :: Query >> Image >> Contact Administrator');
		}else{
			$sql_img					= mysql_query("SELECT user_images.rating, user_images.imageid, user.gender FROM user_images, user WHERE user_images.userid = '$UserID' AND user.userid = '$UserID'") or die('ERROR :: Query >> Image >> Contact Administrator');
		}
			$sql_obj_result		=	mysql_fetch_object($sql_img);
		// -------------------------------------------




		if($Mode == false){

  		// image size type ---------------------------
  		if($Type == 1){
  			if($sql_obj_result){
  				echo '<a href="ViewProfile-'.$this->Encrypt($UserID).'"><img src="/media/img_thumb/'.$sql_obj_result->imageid.'-'.$UserID.'.jpg" border="0"></a>';
  			}else{
  				echo '<a href="ViewProfile-'.$this->Encrypt($UserID).'"><img src="/common/img/default/100x100-no-added-photo-yet.gif" border="0"></a>';
  			}
				
  		}elseif($Type == 2){

  			if($sql_obj_result){
  				echo '<img src="/media/img_microthumb/'.$sql_obj_result->imageid.'-'.$UserID.'.jpg" border="0">';
  			}else{
  				echo '<img src="/common/img/default/50x50-no-added-photo-yet.gif" border="0">';
  			}


  		}elseif($Type == 3){

				if($ViewerNudityMode == 0 && $sql_obj_result->rating == 1){

					// restricted image --------------------
					switch($sql_obj_result->gender){
						case 1:
							echo '<a href="MyStuff"><img src="/common/img/default/restricted_300x300_m.jpg" border="0"></a>';
						break;
						case 2:
							echo '<a href="MyStuff"><img src="/common/img/default/restricted_300x300_f.jpg" border="0"></a>';
						break;
					}
					// -------------------------------------
					
				}else{

					if($sql_obj_result){
						echo '<img src="/media/img_profile/'.$sql_obj_result->imageid.'-'.$UserID.'.jpg" border="0">';
					}else{
						echo '<img src="/common/img/default/no-added-photo-yet.jpg" border="0">';	
					}
				}
  			
  		}elseif($Type == 4){
  			echo '<img src="/media/img_gallery/'.$sql_obj_result->imageid.'-'.$UserID.'.jpg">';
  		}


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










	// METHOD :: ImageDisplay_2 ===========================================
	
	/*
	NOTES:  Looks Up image, with Viewer and Owners settings in mind
		e.g. If Discreet, and doesn't show unless on Friend List.
	
	
	*/
	
	public function ImageDisplay_2($Viewers_UserID, $ImageOwner_UserID, $Type, $Avatar = 0, $Mode = false, $GraphicsModeOverride = false, $BorderExplicit = false){



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
          	<div name="thumbnail-container" style="z-index: 1; <? echo ($GraphicsMode == 1 ? 'margin-top: 60px;':'margin-top: 0px;'); ?> border: <? echo $BorderSize_FINAL; ?> <? echo $BorderStyle_FINAL; ?> <? echo $BorderColor_FINAL; ?> width: 50px; height: 50px; position: relative; background-color: <? echo ($VIPMember == true ? $VIP_Background_Color : ($Horns == true ? $Horns_Background_Color:$Halo_Background_Color)); ?>">
          <?
          // -------------------------------------


					// anchor tag --------------------------
						echo '<a href="'.$_HTTP.'/ViewProfile-'.$this->Encrypt($ImageOwner_UserID).'" onclick="window.parent.location.href=\''.$_HTTP.'/ViewProfile-'.$this->Encrypt($ImageOwner_UserID).'\'; return false;" >';
						//echo '<a onclick="alert(\'1\');"">';
					// -------------------------------------




					// determine image to display ==========================================================
					if($sql_obj_result->setting_discreet == 1 && $FriendStatus != 'friend.accepted'){
						
						// discreet image ----------------------------
						switch($sql_obj_result->gender){
							case 1:
								echo '<img src="/common/img/default/discreet_50x50_m.jpg" border="0"></a>';
							break;
							case 2:
								echo '<img src="/common/img/default/discreet_50x50_f.jpg" border="0"></a>';
							break;
						}
						// -------------------------------------------

					}else{

						// if no image set to avatar >> show default -
						if(!$sql_obj_result->imageid){
							echo '<img src="/common/img/default/50x50-no-added-photo-yet.gif" border="0"></a>';
						}else{

  						// ensure avatar image is approved ---------
  						if($sql_obj_result->approved != 1){
								
								// pending image -----------------------
								switch($sql_obj_result->gender){
									case 1:
										echo '<img src="/common/img/default/pending_50x50_m.jpg" border="0"></a>';
									break;
									case 2:
										echo '<img src="/common/img/default/pending_50x50_f.jpg" border="0"></a>';
									break;
								}
								// -------------------------------------

							}else{

  							// check Image against current Nudity Mode
  							if($NudityMode == 0 && $sql_obj_result->rating == 1){
  
  								// restricted image --------------------
  								switch($sql_obj_result->gender){
  									case 1:
  										echo '<img src="/common/img/default/restricted_50x50_m.jpg" border="0"></a>';
  									break;
  									case 2:
  										echo '<img src="/common/img/default/restricted_50x50_f.jpg" border="0"></a>';
  									break;
  								}
  								// -------------------------------------
  
  							}else{
  								echo '<img src="/media/img_microthumb/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" border="0">';
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
          	<div name="thumbnail-container" style="position: relative; width: 100px; height: 100px;  <? echo ($GraphicsMode == 1 ? 'margin-top: 60px;':'margin-top: 0px;'); ?> border: <? echo $BorderSize_FINAL; ?> <? echo $BorderStyle_FINAL; ?> <? echo $BorderColor_FINAL; ?> background-color: <? echo ($VIPMember == true ? $VIP_Background_Color : ($Horns == true ? $Horns_Background_Color:$Halo_Background_Color)); ?>">

						<!-- verified photo icon -->
						<div name="profile-special-badge" style="position: absolute; left: -15px; top: -15px; border: 0px solid #fff; width: 55px; height: 54px; z-index: 900;">
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
								echo '<img src="/common/img/default/discreet_100x100_m.jpg" width="100" height="100" border="0" alt="Discreet Profile Image" title="Discreet Profile Image" /></a>';
							break;
							case 2:
								echo '<img src="/common/img/default/discreet_100x100_f.jpg" width="100" height="100" border="0" alt="Discreet Profile Image" title="Discreet Profile Image" /></a>';
							break;
						}
						// -------------------------------------------

					}else{

						// if no image set to avatar >> show default -
						if(!$sql_obj_result->imageid){
							echo '<img src="/common/img/default/100x100-no-added-photo-yet.gif" width="100" height="100" border="0" alt="No Profile Image Yet" title="No Profile Image Yet" /></a>';
						}else{

  						// ensure avatar image is approved ---------
  						if($sql_obj_result->approved != 1){
								
								// pending image -----------------------
								switch($sql_obj_result->gender){
									case 1:
										echo '<img src="/common/img/default/pending_100x100_m.jpg" width="100" height="100" border="0"></a>';
									break;
									case 2:
										echo '<img src="/common/img/default/pending_100x100_f.jpg" width="100" height="100" border="0"></a>';
									break;
								}
								// -------------------------------------

							}else{

  							// check Image against current Nudity Mode
  							if($NudityMode == 0 && $sql_obj_result->rating == 1){
  
  								// restricted image --------------------
  								switch($sql_obj_result->gender){
  									case 1:
  										echo '<img src="/common/img/default/restricted_100x100_m.jpg" width="100" height="100" border="0" alt="R Rated Profile Image" title="R Rated Profile Image" /></a>';
  									break;
  									case 2:
  										echo '<img src="/common/img/default/restricted_100x100_f.jpg" width="100" height="100" border="0" alt="R Rated Profile Image" title="R Rated Profile Image" /></a>';
  									break;
  								}
  								// -------------------------------------
  
  							}else{
  								echo '<img src="/media/img_thumb/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" width="100" height="100" border="0" alt="Profile Image" title="Profile Image" />';
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
          	<div name="thumbnail-container" style="position: relative; width: 300px; height: 300px;  <? echo ($GraphicsMode == 1 ? 'margin-top: 60px;':'margin-top: 0px;'); ?> border: <? echo $BorderSize_FINAL; ?> <? echo $BorderStyle_FINAL; ?> <? echo $BorderColor_FINAL; ?> background-color: <? echo ($VIPMember == true ? $VIP_Background_Color : ($Horns == true ? $Horns_Background_Color:$Halo_Background_Color)); ?>">

						<!-- verified photo icon -->
						<div name="profile-special-badge" style="position: absolute; left: -15px; top: -15px; border: 0px solid #fff; width: 100px; height: 100px; z-index: 900;">
							<? echo ($VerifiedMember == true ? '<img src="/common/img/icons/icon_verified_photos_93x97.png" border="0" />':''); ?>
						</div>
						<!-- END verified photo icon -->

								<!-- HALO OR HORNS -->
								<?
									// halo ----------------------------------
									if($Halo == true){
  									?>
  									<!-- halo -->
  									<div name="profile-container_halohorns" style="border: 0px solid #ffffff; width: 127px; height: 64px; position: absolute; left: -40px; top: -55px; z-index: 6;">
  										<img src="/common/img/bling/halo/halo3.png">
  									</div>
  									<?
									// horns ---------------------------------
									}elseif($Horns	== true){
  									?>
  									<!-- horns -->
  									<div name="profile-container_halohorns" style="border: 0px solid #ffffff; width: 127px; height: 64px; position: absolute; left: -17px; top: -66px; z-index: 5;">
  										<img src="/common/img/bling/horns/horns1.png">
  									</div>
  									<?
									}
								?>
								<!-- END HALO OR HORNS -->


          <?
          // -------------------------------------



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

				echo '</div>';
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













	// METHOD :: SearchGallery =========================================
	public function SearchGallery(){

/*
!! SELECT CREATOR !!

for($count = 18; $count < 101; $count++){
	echo 'option name="search-agemin" id="search-agemin-'.$count.'" value="'.$count.'">'.$count.'/option <br>';
}
*/

    	#http://friendsnflings.com/Search-2-85254-1101-110011-1830-110
    	#gender
    	#zip
    	#seeking
    	#interest
    	#age range (from to)
    	#options
			#?_function=member-Search&_gender=$1&_zipcode=$2&_seeking=$3&_interest=$4&_agerange=$5&_options=$6



		
		$__SELECT	=	 null;
?> <font color=white> <?


		// gender definition -------------------------
		if( $_GET['_gender'] == 1 ){
			//echo 'Male';
			$__SELECT_g1	= "UPS.seek_m = '1' AND ";
		
		}elseif( $_GET['_gender'] == 2 ){
			//echo 'Female';
			$__SELECT_g1	= "UPS.seek_w = '1' AND ";
		
		}elseif( $_GET['_gender'] == 3 ){
			//echo 'Transexual';
			$__SELECT_g1	= "UPS.seek_t = '1' AND ";
		
		}elseif( $_GET['_gender'] == 4 ){
			//echo 'Couples';
			$__SELECT_g1	= "UPS.seek_c = '1' AND ";

		}elseif( $_GET['_gender'] == 5 ){
			//echo 'Groups';
			$__SELECT_g1	= "UPS.seek_g = '1' AND ";
		}
		// -------------------------------------------
		
		$_SELECT_gMASTER	= $__SELECT_g1;
		
		



		// zipcode/geocode definition ----------------
		//$this->GeoCodeLookup($_GET['_zipcode']);
		$ziparray = $this->ZIPCodeLookup($_GET['_zipcode'], '10');
		
		$__SELECT_zMASTER	= null;
		$__ArrayCount			=	count($ziparray);
		
		foreach($ziparray as $key => $value){
   		$__SELECT_zMASTER	.=	'\''.$value.'\''.($__ArrayCount == $key+1 ? ' ':', ');
		}
		// -------------------------------------------




		// gender seeking definition -----------------
		$__SELECT_s1	=	null;
		$__SELECT_s2	=	null;
		$__SELECT_s3	=	null;
		$__SELECT_s4	=	null;

		$_seekingArray	=	str_split($_GET['_seeking']);

		foreach($_seekingArray as $key => $value){
			//if($key == 0 & $value == 1){ echo 'Seeking Men';}
			if($key == 0 & $value == 1){ $__SELECT_s1	= "'1', "; }
			
			//if($key == 1 & $value == 1){ echo 'Seeking Women';}
			if($key == 1 & $value == 1){ $__SELECT_s2	= "'2', "; }
			
			//if($key == 2 & $value == 1){ echo 'Seeking Trannies';}
			if($key == 2 & $value == 1){ $__SELECT_s3	= "'3', "; }
			
			//if($key == 3 & $value == 1){ echo 'Seeking Couples';}
			if($key == 3 & $value == 1){ $__SELECT_s4	= "'4' "; }
		}
		//echo $__SELECT = $__SELECT_s1.($__SELECT_s1 && $__SELECT_s2 != null ? ' AND ':'').$__SELECT_s2.($__SELECT_s2 || $__SELECT_s3 != null ? ' AND ':'').$__SELECT_s3.(($__SELECT_s1 && $__SELECT_s4 != null) || ($__SELECT_s3 && $__SELECT_s4 != null) || ($__SELECT_s2 && $__SELECT_s4 != null) ? ' AND ':'').$__SELECT_s4;
		// -------------------------------------------
		
		$_SELECT_sMASTER	=	$__SELECT_s1.$__SELECT_s2.$__SELECT_s3.$__SELECT_s4;
		$_SELECT_sMASTER	= preg_replace('/\s+,\s*$/i','',$_SELECT_sMASTER);




		// interested in definition ------------------
		$_interestArray	=	str_split($_GET['_interest']);

		foreach($_interestArray as $key => $value){
			//if($key == 0 & $value == 1){ echo 'Friends';}
			if($key == 0 & $value == 1){ $__SELECT_i1	= "UPS.into_friends = '1' OR "; }

			//if($key == 1 & $value == 1){ echo 'Flirting';}
			if($key == 1 & $value == 1){ $__SELECT_i2	= "UPS.into_flirting = '1' OR "; }

			//if($key == 2 & $value == 1){ echo 'Relationship';}
			if($key == 2 & $value == 1){ $__SELECT_i3	= "UPS.into_relationship = '1' OR "; }

			//if($key == 3 & $value == 1){ echo 'Sex';}
			if($key == 3 & $value == 1){ $__SELECT_i4	= "UPS.into_sex = '1' OR "; }

			//if($key == 5 & $value == 1){ echo 'Fetish';}
			if($key == 4 & $value == 1){ $__SELECT_i5	= "UPS.into_fetish = '1' "; }
		}
		//echo $__SELECT_i1.$__SELECT_i2.$__SELECT_i3.$__SELECT_i4.$__SELECT_i5;
		
		$_SELECT_iMASTER	= null;
		$_SELECT_iMASTER	= $__SELECT_i1.$__SELECT_i2.$__SELECT_i3.$__SELECT_i4.$__SELECT_i5;
		$_SELECT_iMASTER	= preg_replace('/\s+OR\s*$/i','',$_SELECT_iMASTER);
		
		// default setting if Nothing Chosen ---------
		if($_SELECT_iMASTER == null){
			$_SELECT_iMASTER	=	"UPS.into_friends = '1' OR UPS.into_sex = '1'";
		}
		// -------------------------------------------
		



		



		// age range definition ----------------------
		
		
		if($_GET['_agerange']){

			$_agerangeArray	=	str_split($_GET['_agerange']);

  		$age_start 					= null;
  		$age_end 						=	null;
  
  
  		foreach($_agerangeArray as $key => $value){
  			if($key == 0){ $age_start1 	= $value; }
  			if($key == 1){ $age_start2 	= $value; }
  			if($key == 2){ $age_end1 		= $value; }
  			if($key == 3){ $age_end2 		= $value; }
  		}
  
  		$age_start 		= $age_start1.$age_start2;
  		$__year_nowA	=	date('Y', time());
  		$__year_ageA	= $__year_nowA - $age_start;
  		$ts_age_start	=	mktime(1,1,1,1,1,$__year_ageA);
  
  		$age_end 			= $age_end1.$age_end2;
  		$__year_nowB	=	date('Y', time());
  		$__year_ageB	= $__year_nowB - $age_end;
  		$ts_age_end		=	mktime(1,1,1,1,1,$__year_ageB);
  
  
  		$__SELECT_a1	=	$ts_age_start;
  		$__SELECT_a2	=	$ts_age_end;

		// default setting of Ages 18 to 99 ----------
		}elseif(!$_GET['_agerange']){
			
  		$__SELECT_a1	=	628387200;
  		$__SELECT_a2	=	-1927756800;

		}
		// -------------------------------------------



		// options -----------------------------------
		$_optionsArray	=	str_split($_GET['_options']);

		
		$__SELECT_onlineNow	=	null;

		foreach($_optionsArray as $key => $value){
			//if($key == 0 && $value == 1){ echo 'Online Now';}
			if($key == 0 && $value == 1){ 
				$online_now							= time() - 600;
				$__SELECT_onlineNow 		= "AND U.ts_lastlogin >= '".$online_now."'";
			}
			
			// with images only --------------
			if($key == 1 && $value == 1){
				$__SELECT_ProfileWPics 	= "INNER JOIN user_images UI ON UI.userid = U.userid";
			
			// without & with images ---------
			}elseif($key == 1 && $value == 0){
				$__SELECT_ProfileWPics 	= "LEFT JOIN user_images UI ON UI.userid = U.userid";
			}
			
			//if($key == 2 && $value == 1){ echo 'Verified Photos';}
			if($key == 2){ $verified_photos 	= $value; }
		}
		
		// SELECT TO BE PLACED HERE
		
		// -------------------------------------------




		

		$_return					= false;
		$imgpath					=	'/media/img_thumb/';

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


echo $_SELECT_MASTER		=	"
SELECT U.* , UI.*, UPS.*
FROM user U
".$__SELECT_ProfileWPics."
INNER JOIN user_profile_specs UPS ON ".$_SELECT_gMASTER." UPS.tsdob <= ".$__SELECT_a1." AND UPS.tsdob >= ".$__SELECT_a2." AND
	(".$_SELECT_iMASTER.")
	AND UPS.userid = U.userid
WHERE U.disabled != '1' AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.") ".$__SELECT_onlineNow."
GROUP BY U.userid ORDER BY U.ts_lastlogin DESC LIMIT 10
";



/*
SQL notes
========================================

	Profiles With & Without IMAGES 	= LEFT JOIN user_images UI ON UI.userid = U.userid
	profiles With IMAGES Only 			= INNER JOIN user_images UI ON UI.userid = U.userid



AND U.ts_lastlogin >= '$online_now'

Sample working script
----------------------------------------

SELECT U.* , UI.*, UPS.*
FROM user U
LEFT JOIN user_images UI ON UI.userid = U.userid
INNER JOIN user_profile_specs UPS ON UPS.seek_t = '1' AND
	(UPS.into_fetish = '1' OR UPS.into_sex = '1' OR UPS.into_flirting = '1' OR UPS.into_friends = '1')
	AND UPS.userid = U.userid
WHERE U.disabled != '1' AND U.gender IN ('1', '2', '4') AND U.zipcode IN ('85254')
GROUP BY U.userid


Sample URL
----------------------------------------
http://friendsnflings.com/Search-1-85254-1111-11111-1885-000
    														 #gender
    															 #zip
    																     #seek
    																				  #into
    																					      #agerange
    																								     #options


Past Query Work
----------------------------------------
		//echo $_SELECT_MASTER		=	"SELECT user.userid, user.username, user.zipcode, user_images.imageid, user_profile_specs.tsdob, user_profile_specs.numimages, user_profile_specs.into_friends, user_profile_specs.into_flirting, user_profile_specs.into_fetish, user_profile_specs.into_sex, user_profile_specs.into_relationship, user_profile_specs.seek_m,  user_profile_specs.seek_w, user_profile_specs.seek_t, user_profile_specs.seek_c, user_profile_specs.seek_g, user.gender, user.ts_lastaction FROM user, user_images, user_profile_specs WHERE user.disabled != '1' AND user_profile_specs.userid = user.userid AND user.userid = user_images.userid AND ".$_SELECT_gMASTER.$_SELECT_sMASTER.$_SELECT_iMASTER;
		//echo $_SELECT_MASTER		=	"SELECT * FROM user, user_images, user_profile_specs WHERE user_images.avatar = '1' AND user.disabled != '1' AND user_profile_specs.userid = user.userid AND ".$_SELECT_gMASTER.$_SELECT_sMASTER.$_SELECT_iMASTER." GROUP BY user.userid";
		
//echo $_SELECT_MASTER		=	"SELECT user.userid, user.username, user.zipcode, user_images.imageid, user_profile_specs.tsdob, user_profile_specs.numimages, user_profile_specs.into_friends, user_profile_specs.into_flirting, user_profile_specs.into_fetish, user_profile_specs.into_sex, user_profile_specs.into_relationship, user_profile_specs.seek_m,  user_profile_specs.seek_w, user_profile_specs.seek_t, user_profile_specs.seek_c, user_profile_specs.seek_g, user.gender, user.ts_lastaction FROM user, user_images, user_profile_specs WHERE user_images.avatar = '1' AND user.disabled != '1' AND user_profile_specs.userid = user.userid AND user.userid = user_images.userid AND ".$_SELECT_gMASTER.$_SELECT_sMASTER.$_SELECT_iMASTER." GROUP BY user.userid";
//echo $_SELECT_MASTER		=	"SELECT * FROM user, user_images, user_profile_specs WHERE user_profile_specs.userid = user.userid AND user_images.userid = user.userid AND user_images.avatar = '1' AND user_profile_specs.into_flirting = '1'";
		
//echo $_SELECT_MASTER		=	"SELECT U.*, UPS.* FROM user U INNER JOIN user_profile_specs UPS ON UPS.userid = U.userid AND U.gender = '1' AND GROUP BY UPS.userid";

*/


		//$sql_result					= mysql_query("SELECT user.userid, user.username, user.zipcode, user_images.imageid, user_profile_specs.tsdob, user_profile_specs.numimages, user_profile_specs.into_friends, user_profile_specs.into_flirting, user_profile_specs.into_fetish, user_profile_specs.into_sex, user_profile_specs.into_relationship, user_profile_specs.seek_m,  user_profile_specs.seek_w, user_profile_specs.seek_t, user_profile_specs.seek_c, user_profile_specs.seek_g, user.gender, user.ts_lastaction FROM user, user_images, user_profile_specs  WHERE user_images.avatar = '1' AND user.disabled != '1' AND user_profile_specs.userid = user.userid AND user.userid = user_images.userid") or die('ERROR :: Query >> Image >> Contact Administrator');
		$sql_result					= mysql_query($_SELECT_MASTER) or die('ERROR :: Query >> Search Gallery >> Contact Administrator');
		
		
		//$sql_result					= mysql_query("SELECT user_images.imageid, user_images.userid FROM user_images") or die('ERROR :: Query >> Image >> Contact Administrator');
		//$sql_obj_result		=	mysql_fetch_object($sql_result);
		echo $sql_num_rows				=	mysql_num_rows($sql_result);


  		// read out images ---------------------------
  		$print_count = 1;
  		?> <table cellpadding="5" width="100%" border=0> <tr><?
  		while($sql_obj_result		=	mysql_fetch_object($sql_result)){
  			
  			
  			
  			// image query ---------------------------
  			//$sql_result_img			= mysql_query("SELECT * FROM user_images WHERE user_images.userid = '$sql_obj_result->userid' AND user_images.avatar = '1' ") or die('ERROR :: Query >> Avatar >> Search Gallery >> Contact Administrator');
				//$sql_obj_img_result	=	mysql_fetch_object($sql_result_img);

  					?>
  					
  						<td align="center" width="50%">
  						<br><br>
  							<div name="profile-container" style="border: 2px solid #fff; width: 450px; height: 150px; position: relative;">
  								
  								<!--
  								<div name="profile-frame" style="border: 0px solid #fff; width: 613px; height: 314px; position: relative; z-index: 5; top: -58px; left: -90px; ">
  									<img src="common/img/bling/frame/frame-complex.png">
  								</div>
  								-->
  								
  								
  								<div name="profile-avatar" style="border: 1px solid #fff; width: 100px; height: 100px; position: absolute; left: 10px; top: 10px; ">
  									<? 
  										//echo '<a href="http://'.$this->SiteDomain.'/media/img_profile/'.$sql_obj_result->imageid.'-'.$sql_obj_result->userid.'.jpg" rel="gb_page_center[440, 440]">	<img src="http://'.$this->SiteDomain.$imgpath.$sql_obj_result->imageid.'-'.$sql_obj_result->userid.'.jpg" border="0">	</a>';
  										echo '<a href="ViewProfile-'.$this->encrypt($sql_obj_result->userid).'"> <img src="http://'.$this->SiteDomain.$imgpath.$sql_obj_result->imageid.'-'.$sql_obj_result->userid.'.jpg" border="0"> </a>';
  									?>  								
  								</div>

  								<div name="profile-morepictures" style="border: 1px solid #fff; width: 100px; height: 22px; position: absolute; left: 10px; top: 119px; text-align: center; align: center;">
  									<? 
  										echo '<a href="ViewProfile-'.$this->encrypt($sql_obj_result->userid).'"><font size=4 color=white>'.$sql_obj_result->numimages.' Pictures</font></a>';
  									?>  								
  								</div>


  								<div name="profile-activity" style="border: 0px solid #fff; width: 150px; height: 15px; position: absolute; right: 8px; top: 12px; text-align: right; align: right;">
  									<? 
  										echo '<font size=2 color=white>Was Here:</font> <font color="red"><b>'.three_way_reduced($sql_obj_result->ts_lastaction).'</b></font>';
  									?>  								
  								</div>


  								<div name="profile-titlebar" style="border: 0px solid #fff; width: 300px; height: 20px; position: absolute; left: 120px; top: 10px; text-align: left; align: left;">
  									<? 
  										echo '<a href="ViewProfile-'.$this->encrypt($sql_obj_result->userid).'"> <font size=4 color=white>'.$sql_obj_result->username.'</font></a>';
  									?>  								
  								</div>


  								<div name="profile-agegender" style="border: 0px solid #393939; width: 300px; height: 20px; position: absolute; left: 120px; top: 40px; text-align: left; align: left;">
  									<?
  										$__age	= ( date(Y, time()) ) - ( date(Y, $sql_obj_result->tsdob) );
  										echo '<font size="3" color="white">'.$__age.' Year Old '.($sql_obj_result->gender == 1 ? 'Guy' : 'Girl').'</font>';
  									?>  								
  								</div>

  								<div name="profile-location" style="border: 0px solid #393939; width: 300px; height: 15px; position: absolute; left: 120px; top: 64px; text-align: left; align: left;">
  									<? 
  										echo '<font size=2 color=white><b>From</b> '.$this->GeoCodeLookup($sql_obj_result->zipcode).'</font>';
  									?>  								
  								</div>

  								<div name="profile-seeking" style="border: 0px solid #393939; width: 300px; height: 32px; position: absolute; left: 120px; top: 83px; text-align: left; align: left;">
  									<? 
  										echo '<font size=2 color=white><b>Seeking</b> </font> '.($sql_obj_result->seek_m == 1 ? '<a href="Search-Men"><font size=2 color="#fff2d0">Men</font></a>':'').' '.($sql_obj_result->seek_f == 1 ? '<a href="Search-Women"><font size=2 color="#fff2d0">Women</font></a>':'').' '.($sql_obj_result->seek_t == 1 ? '<a href="Search-Transexuals"><font size=2 color="#fff2d0">Transexuals</font></a>':'').' '.($sql_obj_result->seek_c == 1 ? '<a href="Search-Couples"><font size=2 color="#fff2d0">Couples</font></a>':'').' '.($sql_obj_result->seek_g == 1 ? '<a href="Search-Groups"><font size=2 color="#fff2d0">Groups</font></a>':'').'</font>';
  									?>  								
  								</div>

  								<div name="profile-into" style="border: 0px solid #393939; width: 300px; height: 15px; position: absolute; left: 120px; top: 103px; text-align: left; align: left;">
  									<? 
  										echo '<font size=2 color=white><b>For</b> </font> <font size=2 color="#fff2d0">'.($sql_obj_result->into_friends == 1 ? '<a href="Search-Friends"><font size=2 color="#fff2d0">Friends</font></a>':'').' '.($sql_obj_result->into_flirting == 1 ? '<a href="Search-Flirting"><font size=2 color="#fff2d0">Flirting</font></a>':'').' '.($sql_obj_result->into_relationship == 1 ? '<a href="Search-Relationship"><font size=2 color="#fff2d0">Relationship</font></a>':'').' '.($sql_obj_result->into_sex == 1 ? '<a href="Search-Intimacy"><font size=2 color="#fff2d0">Intimacy</font></a>':'').' '.($sql_obj_result->into_fetish == 1 ? '<a href="Search-Fetish"><font size=2 color="#fff2d0">Fetish</font></a>':'').'</font>';
  									?>  								
  								</div>


  								<div name="profile-bling-upper-lft-corner" style="border: 0px solid #fff; width: 35px; height: 35px; position: absolute; left: -10px; top: -24px; ">
  									<img src="common/img/bling/diamond-white/35-35.png">
  								</div>

    							<? if($print_count == 2){ ?>
  									<div name="profile-bling-upper-lft-corner" style="border: 0px solid #fff; width: 35px; height: 35px; position: absolute; left: 20px; top: -24px; ">
  										<img src="common/img/bling/diamond-white/35-35.png">
  									</div>
  								<? } ?>



								<!-- BLING -->
								<!--
  								<div name="profile-bling-upper-lft-corner" style="border: 1px solid #fff; width: 20px; height: 160px; position: absolute; left: -16px; top: -5px; ">
  								</div>


  								<div name="profile-bling-lft" style="border: 1px solid #fff; width: 20px; height: 160px; position: absolute; left: -16px; top: -5px; ">
  								</div>

  								<div name="profile-bling-rht" style="border: 1px solid #fff; width: 20px; height: 160px; position: absolute; right: -16px; top: -5px; ">
  								</div>

  								<div name="profile-bling-top" style="border: 1px solid #fff; width: 480px; height: 20px; position: absolute; left: -16px; top: -16px; ">
  									top
  								</div>

  								<div name="profile-bling-bot" style="border: 1px solid #fff; width: 480px; height: 20px; position: absolute; left: -16px; bottom: -16px; ">
  									bottom
  								</div>
  								-->
							<!-- END BLING -->
							
							
  							</div>
  						</td> <?		

  
    			if(!$print_count %= 2){
  				?> </tr><tr> <?
  			}
  
  			$print_count++;
  		}

  		
  		?> </table> <?
  		// -------------------------------------------


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	 //return $_return;
	}
	// =================================================================









	// METHOD :: ImageGallery ===========================================
	public function ImageGallery($Viewers_UserID, $ImageOwner_UserID, $Type, $Application, $ViewerNudityMode = 0){

		$_return					= false;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$sql_img					= mysql_query("SELECT user.gender, user.setting_discreet, user.gender, user_images.rating, user_images.imageid, user_images.avatar, user_images.approved FROM user_images, user WHERE user_images.userid = '$ImageOwner_UserID' AND user.userid = '$ImageOwner_UserID'") or die('ERROR :: Query >> Image >> Contact Administrator');
		//$sql_obj_result		=	mysql_fetch_object($sql_img);
		$sql_num_rows			=	mysql_num_rows($sql_img);


		// image size type ---------------------------
		if($Type == 1){
			$imgpath	=	'/media/img_thumb/';
		}elseif($Type == 2){
			$imgpath	=	'/media/img_microthumb/';
		}elseif($Type == 3){
			$imgpath	=	'/media/img_profile/';
		}elseif($Type == 4){
			$imgpath	=	'/media/img_gallery/';
		}
		// -------------------------------------------


		// Editor Gallery Photo View ===============================================
		if($Application == 'ProfileEditor'){

  		// read out images ---------------------------
  		$print_count = 0;
  		?> <table cellpadding="5" width="100%"> <?
  		while($sql_obj_result		=	mysql_fetch_object($sql_img)){
  
  
				// set image rating ----------------------
				switch($sql_obj_result->rating){
					case 0:
						$_imageRating	=	'PG';
					break;
				
					case 1:
						$_imageRating	=	'R';
					break;  					
				}
				// ---------------------------------------


  			if($print_count == 6 || $print_count == 0){
  				?> <tr> <?
  			}
	 				// approved images ---------------------
  				if($sql_obj_result->imageid && $sql_obj_result->approved == 1){

  					/* ?> <td align="center"> <table><tr><td align="center"> <? echo '<a href="http://'.$this->SiteDomain.'/media/img_profile/'.$sql_obj_result->imageid.'-'.$UserID.'.jpg" rel="gb_page_center[440, 440]" style="cursor: hand;"> <div id="image_pending_approval" style="height: 100px; width: 100px; border: 1px solid #0F0; padding: 0 0 0 0; margin: 0 0 0 0;"><img src="http://'.$this->SiteDomain.$imgpath.$sql_obj_result->imageid.'-'.$UserID.'.jpg" border="0" alt="Approved"></div> </a>'; ?> <? if($sql_obj_result->avatar == 1){ echo '<font class="typered18pt">Primary</font>';} ?></td></tr><tr><td align="center"><a href="DeletePicture-<? echo $this->Encrypt($sql_obj_result->imageid); ?>">delete</a> | <a href="MakePrimaryPicture-<? echo $this->Encrypt($sql_obj_result->imageid); ?>">primary</a></td></tr></table> </td> <? */
  					/* LKG 02.21.2009 >>   ?> <td align="center"> <table><tr><td align="center"> <? echo '<a href="http://'.$this->SiteDomain.'/media/img_gallery/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" rel="gb_page_center[630, 630]" style="text-decoration: none; cursor: hand; padding: 0 0 0 0; margin: 0 0 0 0;"><div id="image_approved" style="height: 100px; width: 100px; border: 1px solid #F00; padding: 0 0 0 0; margin: 0 0 0 0;"> <div style="position: absolute; background: #000000; border: 0px solid #ff0000; width: 100px; padding: 0 0 0 0; margin: 0 0 0 0; filter: alpha(opacity=80); -moz-opacity: 0.8; opacity: 0.80;"><font style="color: #00ff00; font-size: 10px;"><i>Approved Rated '.$_imageRating.'</i></font></div> <img src="http://'.$this->SiteDomain.$imgpath.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" border="0" alt="Approved Rated '.$_imageRating.'" /></div> </a>'; ?> <? if($sql_obj_result->avatar == 1){ echo '<font class="typered18pt">Primary</font>';} ?></td></tr><tr><td align="center"><a href="DeletePicture-<? echo $this->Encrypt($sql_obj_result->imageid); ?>">delete</a> | <a href="MakePrimaryPicture-<? echo $this->Encrypt($sql_obj_result->imageid); ?>">primary</a></td></tr></table> </td> <?  */
						?> <td align="center"> <table><tr><td align="center"> <? echo '<a href="http://'.$this->SiteDomain.'/media/img_gallery/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" target="_new"> <div id="myprofile_photo_image'.$sql_obj_result->imageid.'" style="height: 100px; width: 100px; border: 1px solid #ff0000; padding: 0 0 0 0; margin: 0 0 0 0;"> <div style="position: absolute; background: #000000; border: 0px solid #ff0000; width: 100px; padding: 0 0 0 0; margin: 0 0 0 0; filter: alpha(opacity=80); -moz-opacity: 0.8; opacity: 0.80;"><font style="color: #00ff00; font-size: 10px;"><i>Approved Rated '.$_imageRating.'</i></font></div> <img src="http://'.$this->SiteDomain.$imgpath.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" border="0" alt="Approved Rated '.$_imageRating.'" /></div> </a>'; ?> <? if($sql_obj_result->avatar == 1){ echo '<font class="typered18pt">Primary</font>';} ?></td></tr><tr><td align="center"> <? echo '<a style="cursor: pointer;" onclick="MyNetwork(\''.$this->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$this->Encrypt($sql_obj_result->imageid, 'private').'\', \'execute.myprofile.photo.remove\', \'myprofile_photo_image'.$this->Encrypt($sql_obj_result->imageid, 'private').'\', \'subcontainer_level1_data\');">delete</a>'; ?> | <? echo '<a style="cursor: pointer;" onclick="MyNetwork(\''.$this->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$this->Encrypt($sql_obj_result->imageid, 'private').'\', \'execute.myprofile.photo.primary\', \'myprofile_photo_image'.$this->Encrypt($sql_obj_result->imageid, 'private').'\', \'subcontainer_level1_data\');">primary</a>'; ?></td></tr></table> </td> <?
  				
  				// pending approval images -------------
  				}elseif($sql_obj_result->imageid && $sql_obj_result->approved == 0){
  					?> <td align="center"> <table><tr><td align="center"> <? echo '<a href="http://'.$this->SiteDomain.'/media/img_gallery/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" target="_new"><div id="image_pending_approval" style="height: 100px; width: 100px; border: 1px solid #F00; padding: 0 0 0 0; margin: 0 0 0 0;"> <div style="position: absolute; background: #000; width: 100px; padding: 0 0 0 0; margin: 0 0 0 0; filter: alpha(opacity=80); -moz-opacity: 0.8; opacity: 0.80;"><font color="#f7b400" size="1"><i>Pending Approval</i></font></div><img src="http://'.$this->SiteDomain.$imgpath.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" border="0" alt="Pending Approval"></div> </a>'; ?> <? if($sql_obj_result->avatar == 1){ echo '<font class="typered18pt">Primary</font>';} ?></td></tr><tr><td align="center"><? echo '<a style="cursor: pointer;" onclick="MyNetwork(\''.$this->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$this->Encrypt($sql_obj_result->imageid, 'private').'\', \'execute.myprofile.photo.remove\', \'myprofile_photo_image'.$this->Encrypt($sql_obj_result->imageid, 'private').'\', \'subcontainer_level1_data\');">delete</a>'; ?></td></tr></table> </td> <?
  				
  				// denied approval images --------------
  				}elseif($sql_obj_result->imageid && $sql_obj_result->approved == 2){
  					?> <td align="center"> <table><tr><td align="center"> <? echo '<a href="http://'.$this->SiteDomain.'/media/img_gallery/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" target="_new"><div id="image_pending_approval" style="height: 100px; width: 100px; border: 1px solid #F00; padding: 0 0 0 0; margin: 0 0 0 0;"><div style="position: absolute; background: #ff0000; width: 100px; padding: 0 0 0 0; margin: 0 0 0 0; filter: alpha(opacity=80); -moz-opacity: 0.8; opacity: 0.80;"><font color="#000000" size="1"><i>Approval Denied</i></font></div><img src="http://'.$this->SiteDomain.$imgpath.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" border="0" alt="Approval Denied"></div> </a>'; ?> <? if($sql_obj_result->avatar == 1){ echo '<font class="typered18pt">Primary</font>';} ?></td></tr><tr><td align="center"><? echo '<a style="cursor: pointer;" onclick="MyNetwork(\''.$this->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$this->Encrypt($sql_obj_result->imageid, 'private').'\', \'execute.myprofile.photo.remove\', \'myprofile_photo_image'.$this->Encrypt($sql_obj_result->imageid, 'private').'\', \'subcontainer_level1_data\');">delete</a>'; ?></td></tr></table> </td> <?
  				}
  
  			$print_count++;		
  		}
  		
  		if(!$sql_num_rows){
  			?> <td align="middle" height="300" valign="center"> <font class="typered21pt">Add Photos! It Attracts People!</font> </td> <?
  		}
  		
  		?> </tr></table> <?
  		// -------------------------------------------
		
		
		// Gallery Photo View ======================================================
		}elseif($Application == 'ProfileViewer'){


			$FriendStatus			= $this->GetFriendStatus($ImageOwner_UserID, $Viewers_UserID);

  		// read out images ---------------------------
  		$print_count = 1;
  		?> <table cellpadding="5" width="100%"> <?
  		while($sql_obj_result		=	mysql_fetch_object($sql_img)){
  
  			if($print_count %= 2){
  				?> <tr> <?
  			}
  
  				if($sql_obj_result->imageid){
  					?> 
  						<td align="middle"> 
  							<table width="100%">
  								<tr>
  									<td align="middle"> 
  										<?
  											if($ViewerNudityMode == 0 && $sql_obj_result->rating == 1){

													// restricted image --------------------
    											switch($sql_obj_result->gender){
    												case 1:
    													echo '<img src="http://friendsnflings.com/common/img/default/restricted_100x100_m.jpg" border="0" />';
    												break;
    												case 2:
    													echo '<img src="http://friendsnflings.com/common/img/default/restricted_100x100_f.jpg" border="0" />';
    												break;
    											}
    											// -------------------------------------
  											
  											// show all approved images --------------
  											}elseif($sql_obj_result->approved != 2 && $sql_obj_result->approved != 0){

													// check for Discreet Option Set ON & Friend Status = Accepted/Current ---
  												if($sql_obj_result->setting_discreet == '1' && $FriendStatus != 'friend.accepted'){

  													// restricted image --------------------
      											switch($sql_obj_result->gender){
      												case 1:
      													echo '<img src="http://friendsnflings.com/common/img/default/discreet_100x100_m.jpg" border="0" />';
      												break;
      												case 2:
      													echo '<img src="http://friendsnflings.com/common/img/default/discreet_100x100_f.jpg" border="0" />';
      												break;
      											}
      											// -------------------------------------
													
													// display gallery images ----------------
  												}else{
  													echo '<div style="border: 1px solid #000000; width: 100px; height: 100px; margin-left: 14px;"> <a href="http://'.$this->SiteDomain.'/media/img_gallery/'.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" rel="gb_page_center[650, 650]"> <img src="http://'.$this->SiteDomain.$imgpath.$sql_obj_result->imageid.'-'.$ImageOwner_UserID.'.jpg" border="0" alt="Click to View" /> </a> </div>';	
  												}


  											}elseif($sql_obj_result->approved == 0){
													// pending approval image --------------
    											switch($sql_obj_result->gender){
    												case 1:
    													echo '<img src="http://friendsnflings.com/common/img/default/pending_100x100_m.jpg" border="0"></a>';
    												break;
    												case 2:
    													echo '<img src="http://friendsnflings.com/common/img/default/pending_100x100_f.jpg" border="0"></a>';
    												break;
    											}
    											// -------------------------------------

  											}
  										?>
  									</td>
  								</tr>
  								
  								<tr>
  									<td align="middle">
  										<!-- <a href="Wow-<? echo $this->Encrypt($MemberProfile->imageid); ?>">Wow!</a> | <a href="Eww-<? echo $this->Encrypt($MemberProfile->imageid); ?>">Eww!</a> -->
  									</td>
  								</tr>
  							</table> 
  						</td> 
  					<?
  				}

  			$print_count++;		
  		}
  		
  		if(!$sql_num_rows){
  			?> <td align="middle" height="300" valign="center"> <font class="typered21pt">Adding Images Attracts Friends 'n Flings!</font> </td> <?
  		}
  		
  		?> </tr></table> <?
  		// -------------------------------------------
		}
		// =========================================================================



		// destroy database connection object --------
		@$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	 return $_return;
	}
	// =================================================================






	// METHOD :: VerifyAdmin ===========================================
	public function VerifyAdmin($UserArray){

		if($this->GeteMailAddr($UserArray['userid']) == 'nathaniel.briggs@gmail.com'){
			return true;
		}else{
			return false;
		}

	}
	// =================================================================






	// METHOD :: VerifyMemberPaid ======================================
	public function VerifyMemberPaid($UserID){


		$_return					= false;
		

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$sql_result				= mysql_query("SELECT user_upgrade.tsexpiration, user_upgrade.tsdateofpurchase, user_upgrade.productname FROM user_upgrade WHERE user_upgrade.userid = '$UserID' ORDER BY user_upgrade.tsexpiration DESC LIMIT 1") or die('ERROR :: Query >> Member Upgrade Status >> Contact Administrator');
		$sql_obj_result		=	mysql_fetch_object($sql_result);



		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		$tsnow	=	time();

		if($sql_obj_result->tsexpiration != 0 && $sql_obj_result->tsdateofpurchase != 0 && $tsnow < $sql_obj_result->tsexpiration){
			$_return								= 'paid';

		}elseif($sql_obj_result->tsexpiration != 0 && $sql_obj_result->tsdateofpurchase != 0 && $tsnow > $sql_obj_result->tsexpiration && $tsnow > $sql_obj_result->tsdateofpurchase){
			$this->MemberPaidPrior 					= true;
			$this->MemberPaidPriorProduct 	= $sql_obj_result->product;
			$_return												= false;

		}else{
			$this->MemberPaidPrior 	= false;
			$_return								= false;
		}

	
	return $_return;
	}
	// =================================================================









	// METHOD :: Get Transaction =======================================
	public function GetTransaction($TransactionID, $UserID){


		$_return					= false;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_result				= mysql_query("SELECT * FROM user_upgrade WHERE user_upgrade.transactionid = '$TransactionID' AND user_upgrade.userid = '$UserID'");
		
		$counter	=	0;
		while( $sql_array_result	=	mysql_fetch_assoc($sql_result) ){
			$ResultArray = $sql_array_result;
			$counter++;
		}

		$_return					= $ResultArray;

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	return $_return;
	}
	// =================================================================









	// METHOD :: Get ProductByID =======================================
	public function GetProductByID($ProductID){

		$_return					= false;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_result				= mysql_query("SELECT * FROM product WHERE product.id = '$ProductID' AND product.enabled = '1'");
		
		$counter	=	0;
		while( $sql_array_result	=	mysql_fetch_assoc($sql_result) ){
			$ProductArray = $sql_array_result;
			$counter++;
		}
		
		//$sql_num_rows			=	mysql_num_rows($sql_result);
		
		$_return					= $ProductArray;

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	return $_return;
	}
	// =================================================================









	// METHOD :: Get Products ==========================================
	public function GetProducts($Type, $Property){


		$_return					= false;
		

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_result				= mysql_query("SELECT * FROM product WHERE product.type = '$Type' AND product.property = '$Property' AND product.enabled = '1'");
		
		$counter	=	0;
		while( $sql_array_result	=	mysql_fetch_assoc($sql_result) ){
			$ProductArray[$sql_array_result['id']] = $sql_array_result;
			$counter++;
		}
		
		//$sql_num_rows			=	mysql_num_rows($sql_result);
		
		$_return					= $ProductArray;

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


	return $_return;
	}
	// =================================================================









	// METHOD :: Get Upgrade Referrer ==================================
	function GetUpgradeReferrer($TransactionID, $UserID){


		$_return					= false;
		

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_result				= mysql_query("SELECT * FROM user_upgrade WHERE user_upgrade.transactionid = '$TransactionID' AND user_upgrade.userid = '$UserID'");

		if($sql_array_result	=	mysql_fetch_assoc($sql_result)){
			$_return				= 	$sql_array_result['referrer'];
		}

		// destroy database connection object --------
		$obj_db->Close();
		// -------------------------------------------


	return $_return;
	}
	// =================================================================









	// METHOD :: Payment Gateway =======================================
	public function PaymentGateway($PaymentArray){

		$_return						= false;
		$_testMode					=	false;
		$auth_net_login_id	=	'2zDvY48FJsu';
		$auth_net_tran_key	=	'2sZDtn3S49u8H8Jz';
		
		

		
		//print_r($PaymentArray);
		//die();
		

    $PG_PaymentArray	= array(
        "x_login"               => $auth_net_login_id,
        "x_version"             => '3.1',
        "x_delim_char"          => '|',
        "x_delim_data"          => 'TRUE',
        "x_url"                 => 'FALSE',
        "x_type"                => 'AUTH_CAPTURE',
        "x_method"              => 'CC',
        "x_tran_key"            => $auth_net_tran_key,
        "x_relay_response"      => 'FALSE',
        "x_card_num"          	=> $PaymentArray['upgrade_ccnumber'],
        "x_exp_date"            => $PaymentArray['upgrade_ccexpmonth'].$PaymentArray['upgrade_ccexpyear'],
        "x_description"         => 'FNF Subscription',
        "x_amount"              => $PaymentArray['upgrade_price'],
        "x_first_name"          => $PaymentArray['upgrade_ccfirstnameoncard'],
        "x_last_name"           => $PaymentArray['upgrade_cclastnameoncard'],
        "x_address"             => $PaymentArray['upgrade_ccaddress'],
        "x_card_code"           => $PaymentArray['upgrade_ccvnumber'],
        "x_city"                => $PaymentArray['upgrade_cccity'],
        "x_state"               => $PaymentArray['upgrade_ccstate'],
        "x_zip"                 => $PaymentArray['upgrade_cczipcode'],
        "x_phone"               => $PaymentArray['upgrade_ccphonenumber'],
        "x_email"               => $PaymentArray['upgrade_xemail']
    );

//print_r($PG_PaymentArray);
//die();

    if($_testMode == true){
        //$auth_net_url									= "https://certification.authorize.net/gateway/transact.dll";
       	//$_POST["x_card_num"]					= '4007 0000 0002 7';
				$auth_net_url										= "https://secure.authorize.net/gateway/transact.dll";
				$PG_PaymentArray['x_card_num']	= '4242424242424242';
				$PG_PaymentArray['x_email']			= 'nathaniel.briggs@gmail.com';
    }else{
        $auth_net_url										= "https://secure.authorize.net/gateway/transact.dll";
    }



    $fields = "";
    foreach($PG_PaymentArray as $key => $value){
    	$fields .= "$key=".urlencode($value)."&";
    }

    $ch 	= curl_init("$auth_net_url"); 																// URL of gateway for cURL to post to
    curl_setopt($ch, CURLOPT_HEADER, 0); 																// set to 0 to eliminate header info from response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 												// Returns response data instead of TRUE(1)
    curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim( $fields, "& " )); 			// use HTTP POST to send form data
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 										// uncomment this line if you get no gateway response. ###
    $resp = curl_exec($ch); 																						//execute post and get results
    curl_close ($ch);

		$PGResponse	=	explode('|',$resp);

		
		// PG Response segmentation ------------------
		$PS_responseCode						=	$PGResponse['0'];
		$PS_responseReasonCode			=	$PGResponse['2'];
		$PS_responseReasonVerbose		=	$PGResponse['3'];


		// PG Response Display -----------------------
		switch($PS_responseCode){
			
			case 1:
				if($_testMode == true){
					//echo 'Success: '.$PS_responseReasonVerbose;
				}
				$_return	= 'Accepted';
			break;

			case 2:
				if($_testMode == true){
					//echo 'ERROR: '.$PS_responseReasonVerbose;
				}
				$_return	= 'ERROR';
			break;

			default:
				if($_testMode == true){
					//echo 'ERROR: '.$PS_responseReasonVerbose;
				}
				$_return	= 'ERROR';
			break;
		}



	return $_return;
	}
	// =================================================================








	// METHOD :: Payment Gateway =======================================
	public function PaymentGateway_r2($PaymentArray){

		$_return						= false;
		$_testMode					=	false;
		$auth_net_login_id	=	'2zDvY48FJsu';
		$auth_net_tran_key	=	'2sZDtn3S49u8H8Jz';


    $PG_PaymentArray	= array(
        "x_login"               => $auth_net_login_id,
        "x_version"             => '3.1',
        "x_delim_char"          => '|',
        "x_delim_data"          => 'TRUE',
        "x_url"                 => 'FALSE',
        "x_type"                => 'AUTH_CAPTURE',
        "x_method"              => 'CC',
        "x_tran_key"            => $auth_net_tran_key,
        "x_relay_response"      => 'FALSE',
        "x_card_num"          	=> $PaymentArray['PG_ccnumber'],
        "x_exp_date"            => $PaymentArray['PG_ccexpmonth'].$PaymentArray['PG_ccexpyear'],
        "x_description"         => $PaymentArray['PG_productname'],
        "x_amount"              => $PaymentArray['PG_productprice'],
        "x_first_name"          => $PaymentArray['PG_ccfirstnameoncard'],
        "x_last_name"           => $PaymentArray['PG_cclastnameoncard'],
        "x_address"             => $PaymentArray['PG_ccaddress'],
        "x_card_code"           => $PaymentArray['PG_ccvnumber'],
        "x_city"                => $PaymentArray['PG_cccity'],
        "x_state"               => $PaymentArray['PG_ccstate'],
        "x_zip"                 => $PaymentArray['PG_cczipcode'],
        "x_phone"               => $PaymentArray['PG_ccphonenumber'],
        "x_email"               => $PaymentArray['PG_email_addr']
    );



    if($_testMode == true){
        //$auth_net_url									= "https://certification.authorize.net/gateway/transact.dll";
       	//$_POST["x_card_num"]					= '4007 0000 0002 7';
				$auth_net_url										= "https://secure.authorize.net/gateway/transact.dll";
				$PG_PaymentArray['x_card_num']	= '4242424242424242';
				$PG_PaymentArray['x_email']			= 'nathaniel.briggs@gmail.com';
    }else{
        $auth_net_url										= "https://secure.authorize.net/gateway/transact.dll";
    }



    $fields = "";
    foreach($PG_PaymentArray as $key => $value){
    	$fields .= "$key=".urlencode($value)."&";
    }

    $ch 	= curl_init("$auth_net_url"); 																// URL of gateway for cURL to post to
    curl_setopt($ch, CURLOPT_HEADER, 0); 																// set to 0 to eliminate header info from response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 												// Returns response data instead of TRUE(1)
    curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim( $fields, "& " )); 			// use HTTP POST to send form data
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 										// uncomment this line if you get no gateway response. ###
    $resp = curl_exec($ch); 																						//execute post and get results
    curl_close ($ch);

		$PGResponse	=	explode('|',$resp);

		
		// PG Response segmentation ------------------
		$PS_responseCode						=	$PGResponse['0'];
		$PS_responseReasonCode			=	$PGResponse['2'];
		$PS_responseReasonVerbose		=	$PGResponse['3'];



		// PG Response Display -----------------------
		switch($PS_responseCode){
			
			case 1:
				if($_testMode == true){
					echo 'Success: '.$PS_responseReasonVerbose;
				}
				$_return	= 111;
			break;

			case 2:
				if($_testMode == true){
					echo 'ERROR: '.$PS_responseReasonVerbose;
				}
				$_return	= $PS_responseReasonVerbose;
			break;

			default:
				if($_testMode == true){
					echo 'ERROR: '.$PS_responseReasonVerbose;
				}
				$_return	= $PS_responseReasonVerbose;
			break;
		}



	return $_return;
	}
	// =================================================================





















	// METHOD :: ProcessUpgrade ========================================
	public function ProcessUpgrade($UserArray, $PaymentArray, $Bypass = 'no'){



/*
    // Encryption ----------------------------------------------------
    $encryptObj							=	new baseCrypto;
    $encryptObj->cipherType = 2;			//	1 = TwoFish	2 = Rijndael	3 = DES
    $encryptObj->cipherMode = 1;			//	1 = ECB	    2 = CBC				3 = CFB
    $encryptObj->passPhrase = $this->__passphrase;
    $encryptObj->key 				= $this->__key;
    // ---------------------------------------------------------------

		$this->NewMember_username 		= $UserArray['username'];
		
		$encryptObj->plainText				=	$UserArray['password'];
		$this->NewMember_password 		= $encryptObj->ReturnHexCipherText();
		
		
		$this->NewMember_promocode		= $this->Decrypt($UserArray['promocode']);
		$this->NewMember_promodiscount= $UserArray['promocodediscount'];
		$this->NewMember_promoexpire	= $this->NewMember_ts_signup + 1200;
*/


  	$_return	= false;
  	
  	
  	

		// Expedited Upgrade =============================================================================================================================
		if($Bypass === 'expedited_upgrade'){

  		$UpgradeMemberID				=	$UserArray['userid'];
  		$UpgradeProductID				=	$PaymentArray['upgrade_product'];

  		$UpgradeProductTerm			=	$PaymentArray['upgrade_term'];
			$UpgradePromocode 			= $this->Decrypt($UserArray['promocode'], 'public', $_SERVER['SERVER_NAME']);
  		$UpgradeReferrer 				= $PaymentArray['upgrade_referrer'];
  		$UpgradeEmailAddr 			= $PaymentArray['email_addr'];
  		$UpgradeAffPromoID			= $PaymentArray['upgrade_affpromoid'];
  		
			

  		
  		// database connection -----------------------
  		$obj_db						= new db;
  		$obj_db->Connect(0);  //write operation
  		// -------------------------------------------
  
  		// check for existence of product ------------
  		$sql_result							= mysql_query("SELECT * FROM product WHERE product.id = '$UpgradeProductID'");
  		$sql_obj_result					=	mysql_fetch_object($sql_result);
  
  		// destroy database connection object --------
  		$obj_db->Close();
  		unset($obj_db);
  		// -------------------------------------------


  		// product definition ------------------------
  		switch($sql_obj_result->type){
  
  			case(1):
  				$UpgradeProductType			=	'membership';
  			break;
  
  			case(2):
  				$UpgradeProductType			=	'profile upgrade';	
  			break;
  
  			case(3):
  				$UpgradeProductType			=	'mail upgrade';	
  			break;
  		}
  		// -------------------------------------------

			$UpgradeProductName = $sql_obj_result->name;

  
  		// product purchase date ---------------------
  		$UpgradeDateOfPurchase	=	time();
  		
  		// product expiration date -------------------
  		//1 month
  		if($UpgradeProductTerm == 1){
  			$UpgradeExpiration			=	time() + $sql_obj_result->lifespan;	
  		//3 month
  		}elseif($UpgradeProductTerm == 3){
  			$UpgradeExpiration			=	time() + ($sql_obj_result->lifespan * 3);
  		}
  		// -------------------------------------------





  		// process through payment gateway & verify userarray & payment array exist 
  		if( $UpgradeExpiration > time() ){
  
  
  			// database connection -----------------------
  			$obj_db						= new db;
  			$obj_db->Connect(0);  //write operation
  			// -------------------------------------------
  
  			// generate transaction ID -------------------
  			$_txID						= null;
  			$TransactionID 		= null;
  			$_txID						= md5(uniqid());
  			$_txID						= substr($_txID, 0, 6);
  			$_txID						= substr($UpgradeProductType, 0, 3).$_txID;
  			$TransactionID 		= $_txID;
 
      	// Create Product Record for Member ----------
      	if( mysql_query("INSERT INTO user_upgrade (transactionid, userid, productid, product_type, productname, tsdateofpurchase, tsexpiration, price, referrer, promocode, promoid) VALUES('$TransactionID', '$UpgradeMemberID', '$UpgradeProductID', '$UpgradeProductType', '$UpgradeProductName', '$UpgradeDateOfPurchase', '$UpgradeExpiration', '0', '$UpgradeReferrer', '$UpgradePromocode', '$UpgradeAffPromoID') ") ){

						// update member record with new product type ------------
						mysql_query("UPDATE user_profile_specs SET user_profile_specs.membertype = '$UpgradeProductName' WHERE user_profile_specs.userid = '$UpgradeMemberID'");

  				// destroy database connection object --------
  				$obj_db->Close();
	  			// -------------------------------------------
  
  				unset($_SESSION['NewUser']['upgrade_product']);
  				
  				$_return	= $TransactionID;
  
      	}else{
      		$_return	= false;
      	}
  
  		}else{
  			$_return	= false;
  		}






		// NORMAL Credit Card Based Upgrade ==============================================================================================================
		}elseif($Bypass === 'no'){
			
			// member data -----------------------------
  		$UpgradeMemberID				=	$UserArray['userid'];
  		$UpgradeProductID				=	$PaymentArray['upgrade_product'];
  		$UpgradeProductTerm			=	$PaymentArray['upgrade_term'];
  		$UpgradeAffPromoID			= $this->GetMemberAffPromoID($UserArray['userid']);

			// credit card data ------------------------
  		$UpgradeCC_NameOnCard		=	$PaymentArray['upgrade_ccfirstnameoncard'].' '.$PaymentArray['upgrade_cclastnameoncard'];
  		$UpgradeCC_Number				=	$PaymentArray['upgrade_ccnumber'];
  		$UpgradeCC_Expiration		=	$PaymentArray['upgrade_ccexpmonth'].$PaymentArray['upgrade_ccexpyear'];
  		$UpgradeCC_CCVNumber		=	$PaymentArray['upgrade_ccvnumber'];
  		$UpgradeCC_State				=	$PaymentArray['upgrade_ccstate'];
  		$UpgradeCC_Zipcode			=	$PaymentArray['upgrade_cczipcode'];

			


  		
  		if($PaymentArray['upgrade_referrer']){
  			$UpgradeCC_Referrer			=	$this->Decrypt($PaymentArray['upgrade_referrer'], 'public');
  		}

  		$PaymentArray['upgrade_xemail'] = $_SESSION['ActiveUser']['email_addr'];

			$UpgradePromocode 			= $this->GetMemberPromocode($UpgradeMemberID);



  		// database connection -----------------------
  		$obj_db						= new db;
  		$obj_db->Connect(1);  //read operation
  		// -------------------------------------------
  
  		// check for existence of product ------------
  		$sql_result							= mysql_query("SELECT * FROM product WHERE product.id = '$UpgradeProductID'");
  		$sql_obj_result					=	mysql_fetch_object($sql_result);
  
  		// destroy database connection object --------
  		$obj_db->Close();
  		unset($obj_db);
  		// -------------------------------------------

  		// product definition ------------------------
  		switch($sql_obj_result->type){
  
  			case(1):
  				$UpgradeProductType			=	'membership';
  			break;
  
  			case(2):
  				$UpgradeProductType			=	'profile upgrade';	
  			break;
  
  			case(3):
  				$UpgradeProductType			=	'mail upgrade';	
  			break;
  		}
  		// -------------------------------------------

			$UpgradeProductName = $sql_obj_result->name;
  

  
  		// product purchase date ---------------------
  		$UpgradeDateOfPurchase	=	time();
  		
  		// product expiration date -------------------
  		//1 month
  		if($UpgradeProductTerm == 1){
  			$UpgradeExpiration			=	time() + $sql_obj_result->lifespan;	
  		//3 month
  		}elseif($UpgradeProductTerm == 3){
  			$UpgradeExpiration			=	time() + ($sql_obj_result->lifespan * 3);
  		}
  		// -------------------------------------------
  
  
  		// check for promocode and get discount to create price --------------------
  		if($ActiveMemberPromocodeArray = $this->ActiveMemberPromocode($UpgradeMemberID) && $ActiveMemberPromocodeArray['discount'] > 0){
 				$Upgrade_Price					=	ceil( ($sql_obj_result->price) * ($ActiveMemberPromocodeArray['discount'] * .01) );	
  		}else{
  			$Upgrade_Price					=	$sql_obj_result->price;
  		}
  		// -----------------------------------------			


  		// compute product cost --------------------			
  		if($UpgradeProductTerm == 3){
  			$Upgrade_Price					= ($Upgrade_Price * 3) - ( ($Upgrade_Price * 3) * $sql_obj_result->bulkdiscount);
  		}elseif($UpgradeProductTerm == 1){
  			$Upgrade_Price					= ($Upgrade_Price * 1);
  		}
  		// -----------------------------------------
  
  
  		// price of produce ------------------------
  		$PaymentArray['upgrade_price']	=	number_format($Upgrade_Price, 2, '.', '');
  		// -----------------------------------------


  
  		// process through payment gateway & verify userarray & payment array exist 
  		if( ($this->PaymentGateway($PaymentArray) === 'Accepted')  && ($UserArray) && ($PaymentArray) ){

  
  			// database connection -----------------------
  			$obj_db						= new db;
  			$obj_db->Connect(0);  //write operation
  			// -------------------------------------------
  
  			// generate transaction ID -------------------
  			$_txID						= null;
  			$TransactionID 		= null;
  			$_txID						= md5(uniqid());
  			$_txID						= substr($_txID, 0, 6);
  			$_txID						= substr($UpgradeProductName, 0, 3).$_txID;
  			$TransactionID 		= $_txID;
  			
  			$UpgradeCC_NameOnCard_ENCRYPTED		=	$this->Encrypt($UpgradeCC_NameOnCard, 'private');
  			$UpgradeCC_Number_ENCRYPTED				=	$this->Encrypt($PaymentArray['upgrade_ccnumber'], 'private');
  			$UpgradeCC_Expiration_ENCRYPTED		=	$this->Encrypt($PaymentArray['upgrade_ccexpmonth'].$PaymentArray['upgrade_ccexpyear'], 'private');
  			$UpgradeCC_CCVNumber_ENCRYPTED		=	$this->Encrypt($PaymentArray['upgrade_ccvnumber'], 'private');


  
      	// Create Product Record for Member ----------
      	// DISABLED per PCI COMPLIANCE - if( mysql_query("INSERT INTO user_upgrade (transactionid, userid, productid, product_type, productname, tsdateofpurchase, tsexpiration, cc_name, cc_number, cc_expiration, cc_ccv, cc_state, cc_zipcode, price, referrer) VALUES('$TransactionID', '$UpgradeMemberID', '$UpgradeProductID', '$UpgradeProductType', '$UpgradeProductName', '$UpgradeDateOfPurchase', '$UpgradeExpiration', '$UpgradeCC_NameOnCard_ENCRYPTED', '$UpgradeCC_Number_ENCRYPTED', '$UpgradeCC_Expiration_ENCRYPTED', '$UpgradeCC_CCVNumber_ENCRYPTED', '$UpgradeCC_State', '$UpgradeCC_Zipcode', '$Upgrade_Price', '$UpgradeCC_Referrer') ") ){
      	if( mysql_query("INSERT INTO user_upgrade (transactionid, userid, productid, product_type, productname, tsdateofpurchase, tsexpiration, cc_name, cc_state, cc_zipcode, price, referrer, promocode, promoid) VALUES('$TransactionID', '$UpgradeMemberID', '$UpgradeProductID', '$UpgradeProductType', '$UpgradeProductName', '$UpgradeDateOfPurchase', '$UpgradeExpiration', '$UpgradeCC_NameOnCard_ENCRYPTED', '$UpgradeCC_State', '$UpgradeCC_Zipcode', '$Upgrade_Price', '$UpgradeCC_Referrer', '$UpgradePromocode', '$UpgradeAffPromoID') ") ){
  
  					// update member record with new product type ------------
						mysql_query("UPDATE user_profile_specs SET user_profile_specs.membertype = '$UpgradeProductName' WHERE user_profile_specs.userid = '$UpgradeMemberID'");

  			// destroy database connection object --------
  			$obj_db->Close();
  			// -------------------------------------------
  
  				unset($_SESSION['ActiveUser']['upgrade_product']);
  				unset($_SESSION['ActiveUser']['upgrade_cctype']);
  				unset($_SESSION['ActiveUser']['upgrade_ccnameoncard']);

					unset($_SESSION['ActiveUser']['upgrade_ccfirstnameoncard']);
					unset($_SESSION['ActiveUser']['upgrade_cclastnameoncard']);
  				
  				unset($_SESSION['ActiveUser']['upgrade_ccnumber']);
  				unset($_SESSION['ActiveUser']['upgrade_ccexpmonth']);
  				unset($_SESSION['ActiveUser']['upgrade_ccexpyear']);
  				unset($_SESSION['ActiveUser']['upgrade_ccvnumber']);
  				unset($_SESSION['ActiveUser']['upgrade_ccstate']);
  				unset($_SESSION['ActiveUser']['upgrade_cczipcode']);
  				unset($_SESSION['Activeuser']['cc_process_failure']);
  				$_return	= $TransactionID;

      	}else{
      		$_return	= false;
      	}
  
  
  
  		}else{
  			$_SESSION['Activeuser']['cc_process_failure'] = true;
  			$_return	= false;
  		}
		
		}
		// ===============================================================================================================================================



	return $_return;
	}
	// =================================================================













	// METHOD :: Get Default Promo =====================================
	public function GetDefaultPromoID($PropertyID){


		$_return					= false;
		


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

			//$sql_result				= mysql_query("SELECT * FROM user_promos WHERE user_promos.propertyid = '$PropertyID' AND user_promos.level = 'default'");
			$sql_result				= mysql_query("SELECT * FROM user_promos WHERE user_promos.userid = '$PropertyID' AND user_promos.level = 'default' AND user_promos.promo_class = 'banner'");
			$sql_obj_result		=	mysql_fetch_object($sql_result);
			

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_obj_result){
			$_return					= $sql_obj_result;	
		}


	return $_return;
	}
	// =================================================================













	// METHOD :: Verify Affiliate ID ===================================
	public function VerifyAffiliateID($AdID){


		$_return					= false;
		

		// 12345    fefe894954607846999902b486e73652f2174b6dfbe92506765cf1d7ef7e75e4 (egenhq.com encryption Keys)


		// check for encrypted promocode -------------
		if(strlen($AdID) > 50){
			$AdID_Decrypted =	$this->Decrypt($AdID, 'private');
		}
		// -------------------------------------------


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

			$sql_result				= mysql_query("SELECT * FROM user_promos WHERE promoid = '$AdID_Decrypted'");
			$sql_obj_result		=	mysql_fetch_object($sql_result);
			

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_obj_result){
			$_return					= $sql_obj_result;	
		}


	return $_return;
	}
	// =================================================================












	// METHOD :: Record Ad Click per AdID ==============================
	public function RecordAdClick($AdID_Decrypted, $AdSessionID = null){

		$_return									= false;
		$_timestamp								= time();
		$_remoteIPAddress					= $_SERVER['REMOTE_ADDR'];
		$_remoteReferer						= $_SERVER['HTTP_REFERER'];
		$_ServerName							= $_SERVER['SERVER_NAME'];
		
		
		
		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------
		
		//check for filtered IP ----------------------
		$sql_result				= mysql_query("SELECT * FROM user_ignore, user_promos WHERE user_promos.promoid = '$AdID_Decrypted' AND user_ignore.userid = user_promos.userid AND user_ignore.ip_address = '$_remoteIPAddress'");
		$num_rows					=	mysql_num_rows($sql_result);

		if(!$num_rows){

			if($AdSessionID){
				
				$_AdSessionData = $this->GetAdSessionData($AdSessionID);
				$_AssetID				=	$_AdSessionData->assetid;

				// database connection -----------------------
				$obj_db						= new db;
				$obj_db->Connect(1);  //read operation
				// -------------------------------------------

				if($_AssetID){
	 				if(mysql_query("INSERT INTO user_promos_actions (promoid, sessionid, assetid, relativedata, action, ts, referrer, server_name) VALUES('$AdID_Decrypted', '$AdSessionID', '$_AssetID', '$_remoteIPAddress', 'click', '$_timestamp', '$_remoteReferer', '$_ServerName') ")){
  					$_return = true;
  				}
				}else{
	 				if(mysql_query("INSERT INTO user_promos_actions (promoid, sessionid, relativedata, action, ts, referrer, server_name) VALUES('$AdID_Decrypted', '$AdSessionID', '$_remoteIPAddress', 'click', '$_timestamp', '$_remoteReferer', '$_ServerName') ")){
  					$_return = true;
  				}					
				}

			}else{
	 			if(mysql_query("INSERT INTO user_promos_actions (promoid, relativedata, action, ts, referrer, server_name) VALUES('$AdID_Decrypted', '$_remoteIPAddress', 'click', '$_timestamp', '$_remoteReferer', '$_ServerName') ")){
  				$_return = true;
  			}
			}
		}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	return $_return;
	}
	// =================================================================













	// METHOD :: Record Ad Impression per AdID ==============================
	public function RecordAdImpression($AdID_Decrypted, $AssetID = null){

		$_return									= false;
		$_timestamp								= time();
		$_remoteIPAddress					= $_SERVER['REMOTE_ADDR'];
		$_remoteReferer						= $_SERVER['HTTP_REFERER'];
		$_eGenHQ_site_URL					= 'http://egenhq.com/mypromos';


		if(strtolower($_SERVER['HTTP_REFERER']) != $_eGenHQ_site_URL){

  		// database connection -----------------------
  		$obj_db						= new db;
  		$obj_db->Connect(1);  //read operation
  		// -------------------------------------------


  		$sql_result				= mysql_query("SELECT * FROM user_ignore, user_promos WHERE user_promos.promoid = '$AdID_Decrypted' AND user_ignore.userid = user_promos.userid AND user_ignore.ip_address = '$_remoteIPAddress'");
  		$num_rows					=	mysql_num_rows($sql_result);
  
  		if(!$num_rows){

    		// generate Unique SessionID -----------------
      	$_AdSessionID			= md5(uniqid(rand(), true));
      	$_AdSessionID			= substr($_AdSessionID, 0, 20);
      	// -------------------------------------------
				
				if($AssetID){
  	 			if(mysql_query("INSERT INTO user_promos_actions (promoid, sessionid, assetid, relativedata, action, ts, referrer) VALUES('$AdID_Decrypted', '$_AdSessionID', '$AssetID', '$_remoteIPAddress', 'impression', '$_timestamp', '$_remoteReferer') ")){
    				$_return = true;
    			}
				}else{
  	 			if(mysql_query("INSERT INTO user_promos_actions (promoid, sessionid, relativedata, action, ts, referrer) VALUES('$AdID_Decrypted', '$_AdSessionID', '$_remoteIPAddress', 'impression', '$_timestamp', '$_remoteReferer') ")){
    				$_return = true;
    			}					
				}
  		}
  
  		// destroy database connection object --------
  		$obj_db->Close();
  		unset($obj_db);
  		// -------------------------------------------
		
		}

	return $_return;
	}
	// =================================================================







	// METHOD :: topnav configuration - dynamic lander =================
	public function TopNavConfiguration($PromoLanderIdent, $Property, $SearchType = 'id', $Gender = '1'){

		// gender = 1 = male
		// gender = 2 = female

		$_return									= false;




		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------



		switch($SearchType){
			
			// seek on ID --------------------------------------------------
			case 'id';
     		if($PromoLanderIdent){
     			$sql_result				= mysql_query("SELECT * FROM promo_landers WHERE promo_landers.id = '$PromoLanderIdent' AND promo_landers.property = '$Property'");	
     			$num_rows					=	mysql_num_rows($sql_result);
     			if($num_rows < 1){
     				$sql_result				= mysql_query("SELECT * FROM promo_landers WHERE promo_landers.id = '1' AND promo_landers.property = '$Property'");	
     			}
     		}else{
     			$sql_result				= mysql_query("SELECT * FROM promo_landers WHERE promo_landers.id = '1' AND promo_landers.property = '$Property'");	
     		}
			break;
			// -------------------------------------------------------------


			// seek on subdomain -------------------------------------------
			case 'subdomain';
     		if($PromoLanderIdent){
     			
     			if($Gender){
     				$sql_result				= mysql_query("SELECT * FROM promo_landers WHERE promo_landers.subdomain = '$PromoLanderIdent' AND promo_landers.property = '$Property' AND promo_landers.gender = '$Gender'");	
     			}else{
     				$sql_result				= mysql_query("SELECT * FROM promo_landers WHERE promo_landers.subdomain = '$PromoLanderIdent' AND promo_landers.property = '$Property'");		
     			}

     			$num_rows					=	mysql_num_rows($sql_result);

     			if($num_rows < 1){
     				$sql_result				= mysql_query("SELECT * FROM promo_landers WHERE promo_landers.id = '3' AND promo_landers.property = '$Property'");	
     			}
     		}else{
     			$sql_result					= mysql_query("SELECT * FROM promo_landers WHERE promo_landers.id = '3' AND promo_landers.property = '$Property'");	
     		}
			break;
			// -------------------------------------------------------------
		}

		$sql_array_result	=	mysql_fetch_assoc($sql_result);


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------

		$_return	=	$sql_array_result;


	return $_return;
	}
	// =================================================================












	// METHOD :: check for ad session for other content ================
	public function smartPromo($PromoID, $AssetID){

		$_return									= false;
		$_Time_Current						= time();
		$_Time_5MinutesAgo				= time() - 300;
		$_Time_5MinutesFromNow		= time() + 300;
		
		$_remoteIPAddress					= $_SERVER['REMOTE_ADDR'];
		$_remoteReferer						= $_SERVER['HTTP_REFERER'];
		$_eGenHQ_site_URL					= 'http://egenhq.com/mypromos';


		if(strtolower($_SERVER['HTTP_REFERER']) != $_eGenHQ_site_URL){

  		// database connection -----------------------
  		$obj_db						= new db;
  		$obj_db->Connect(1);  //read operation
  		// -------------------------------------------


  		$sql_result				= mysql_query("SELECT * FROM user_promos_actions WHERE user_promos_actions.promoid = '$PromoID' AND user_promos_actions.assetid = '$AssetID' AND user_promos_actions.relativedata = '$_remoteIPAddress' AND user_promos_actions.action = 'impression' AND user_promos_actions.ts > '$_Time_5MinutesAgo' ORDER BY user_promos_actions.ts DESC");
  		$sql_array_result	=	mysql_fetch_assoc($sql_result);
  		$num_rows					=	mysql_num_rows($sql_result);

  		// ad was previously shown -----------------
  		if($num_rows){
				
				// check for click - if yes, show same ad-
				foreach($sql_array_result as $key){
					if($key['action'] == 'click'){
						$_return = $AssetID;
					// if not shown, show alternate --------
					}else{

						$_return = 2;
					}
				}

  			//AND user_promos_actions.action = 'click'
  			//locate asset not previously shown within rating & size class of promo
  			//if not exist - choose from most clicked asset per datamine of all promo_actions

				//$_return = $AssetID;
  		}else{
  			$_return = $AssetID;
  		}
  
  		// destroy database connection object --------
  		$obj_db->Close();
  		unset($obj_db);
  		// -------------------------------------------
		
		}

	return $_return;
	}
	// =================================================================















	// METHOD :: Get Ad SessionID ======================================
	public function GetAdSessionID($PromoID, $Mode = null){

		$_return							= false;
		$_remoteIPAddress			= $_SERVER['REMOTE_ADDR'];
		

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$sql_result				= mysql_query("SELECT * FROM user_promos_actions WHERE user_promos_actions.relativedata = '$_remoteIPAddress' AND user_promos_actions.promoid = '$PromoID' ORDER BY user_promos_actions.ts DESC LIMIT 1");			
		$sql_obj_result		=	mysql_fetch_object($sql_result);
		$num_rows					=	mysql_num_rows($sql_result);


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($num_rows){
/*
			$PromocodeArray						= array(
																	'Promocode' 	=> $Promocode,
																	'Vendor' 			=> $sql_obj_result->vendor,
																	'Referer' 		=> $sql_obj_result->referer,
																	'Discount' 		=> $sql_obj_result->discount,
																	'Lifespan' 		=> $sql_obj_result->tslifespan,
																	'Message' 		=> $sql_obj_result->message,
																	'CTAPitch' 		=> $sql_obj_result->ctapitch,
																	'Enabled' 		=> $sql_obj_result->enabled
																	);
			$_return 									= $PromocodeArray;

			$this->PromocodeMessage 	= $sql_obj_result->message;
			$this->PromocodeDiscount 	=	$sql_obj_result->discount;
			$this->Promocode 					=	$Promocode;
			$this->PromocodeCTAPitch	=	$sql_obj_result->ctapitch;
			$this->PromocodeLifespan	=	$sql_obj_result->tslifespan;
			$this->PromocodeType			=	$sql_obj_result->promo_type;
*/
			//$this->PromoSessionID	=	$sql_obj_result->sessionid;
			
			switch($Mode){
				case 'all':
					$_return	= $sql_obj_result;
				break;
				
				default:
					$_return	= $sql_obj_result->sessionid;	
				break;
			}

		}

	return $_return;
	}
	// =================================================================













	// METHOD :: Get Ad Session Data per Session ID ====================
	public function GetAdSessionData($AdSessionID){

		$_return							= false;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$sql_result				= mysql_query("SELECT * FROM user_promos_actions WHERE user_promos_actions.sessionid = '$AdSessionID'");
		$sql_obj_result		=	mysql_fetch_object($sql_result);
		$num_rows					=	mysql_num_rows($sql_result);

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------

		if($num_rows > 1){
			$_return	= false;
		}else{
			$_return	= $sql_obj_result;
		}

	return $_return;
	}
	// =================================================================

















	// METHOD :: PromocodeLookup =======================================
	public function PromocodeLookup($Promocode, $Referrer = 'none'){


		$_return					= false;
		
		// check for encrypted promocode -------------
		if(strlen($Promocode) > 20){
			$Promocode =	$this->Decrypt($Promocode, 'public', 'egenhq.com');
		}
		// -------------------------------------------


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		if($Referrer == 'none'){

			//$sql_result				= mysql_query("SELECT promocode.message FROM promocode WHERE promocode.promocode = '$Promocode' AND promocode.enabled = '1' AND promocode.referer = '$Referrer'") or die('ERROR :: Query >> Promocode Query Error >> Contact Administrator');			
			$sql_result				= mysql_query("SELECT * FROM promocode WHERE promocode.promocode = '$Promocode' AND promocode.enabled = '1'");			
			$sql_obj_result		=	mysql_fetch_object($sql_result);
		}elseif($Referrer){
			//$sql_result				= mysql_query("SELECT promocode.message FROM promocode WHERE promocode.promocode = '$Promocode' AND promocode.enabled = '1'") or die('ERROR :: Query >> Promocode Query Error >> Contact Administrator');
			$sql_result				= mysql_query("SELECT * FROM promocode WHERE promocode.promocode = '$Promocode' AND promocode.enabled = '1' AND promocode.referer = '$Referrer'");
			$sql_obj_result		=	mysql_fetch_object($sql_result);
		}
		//$sql_result				= mysql_query("SELECT promocode.message, promocode.discount, promocode.ctapitch FROM promocode WHERE promocode.promocode = '$Promocode' AND promocode.enabled = '1' AND promocode.referer = '$Referrer'") or die('ERROR :: Query >> Promocode Query Error >> Contact Administrator');			


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_obj_result->message){
/*
			$PromocodeArray						= array(
																	'Promocode' 	=> $Promocode,
																	'Vendor' 			=> $sql_obj_result->vendor,
																	'Referer' 		=> $sql_obj_result->referer,
																	'Discount' 		=> $sql_obj_result->discount,
																	'Lifespan' 		=> $sql_obj_result->tslifespan,
																	'Message' 		=> $sql_obj_result->message,
																	'CTAPitch' 		=> $sql_obj_result->ctapitch,
																	'Enabled' 		=> $sql_obj_result->enabled
																	);
			$_return 									= $PromocodeArray;
*/
			$this->PromocodeMessage 	= $sql_obj_result->message;
			$this->PromocodeDiscount 	=	$sql_obj_result->discount;
			$this->Promocode 					=	$Promocode;
			$this->PromocodeCTAPitch	=	$sql_obj_result->ctapitch;
			$this->PromocodeLifespan	=	$sql_obj_result->tslifespan;
			$this->PromocodeType			=	$sql_obj_result->promo_type;
			$this->PromocodeProductID	=	$sql_obj_result->product_id;
			
			$_return 									= true;
		}





	return $_return;
	}
	// =================================================================













	// METHOD :: Get Affiliate Promo Specifics =========================
	public function GetAffiliatePromoSpecifics($PromoID){

		$_return									= false;
		$_timestamp								= time();
		$_remoteIPAddress					= $_SERVER['REMOTE_ADDR'];
		$_remoteReferer						= $_SERVER['HTTP_REFERER'];
		$ResultArray							= null;
		
		

		// check for encrypted promocode -------------
		if(strlen($PromoID) > 20){
			$PromoID =	$this->Decrypt($PromoID, 'private', 'egenhq.com');
		}
		// -------------------------------------------



		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  	// Retrieve Data -----------------------------
		$sql_query				= mysql_query("SELECT * FROM user_promos WHERE user_promos.promoid = '$PromoID'");
		$sql_array_result	=	mysql_fetch_assoc($sql_query);
		// -------------------------------------------


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


  	if($sql_array_result){
  		$_return			=	$sql_array_result;
		}


	return $_return;
	}
	// =================================================================












	// METHOD :: Check Promo Ownership =================================
	public function VerifyAffiliatePromoOwnership($UserID_DECRYPTED, $PromoID_DECRYPTED){


		$_return									= false;
		$num_rows									= false;


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  	// Retrieve Data -----------------------------
		$sql_query	= mysql_query("SELECT * FROM user_promos WHERE user_promos.userid = '$UserID_DECRYPTED' AND user_promos.promoid = '$PromoID_DECRYPTED'");
		$num_rows		=	mysql_num_rows($sql_query);
		// -------------------------------------------


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


  	if($num_rows){
  		$_return			=	true;
		}


	return $_return;
	}
	// =================================================================














	// METHOD :: Get Prmoo Payout Rate =================================
	public function GetPromoPayoutRate($PromoID_DECRYPTED, $Type){


		$_return									= false;
		$num_rows									= false;


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  	// Retrieve Data -----------------------------
  	switch($Type){
  		
  		case 'upgrade':
  			$sql_query	= mysql_query("SELECT payout.type, payout.rate, payout.enabled FROM user_promos, payout WHERE user_promos.promoid = '$PromoID_DECRYPTED' AND payout.id = user_promos.upgrade_payoutid");	
  		break;

  		case 'signup':
  			$sql_query	= mysql_query("SELECT payout.type, payout.rate, payout.enabled FROM user_promos, payout WHERE user_promos.promoid = '$PromoID_DECRYPTED' AND payout.id = user_promos.signup_payoutid");	
  		break;  		
  	}
		$num_rows		=	mysql_num_rows($sql_query);
		// -------------------------------------------

		if($num_rows){
			$sql_array_result	=	mysql_fetch_assoc($sql_query);
  	}


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


  	if($num_rows){
  		$_return			=	$sql_array_result;
		}


	return $_return;
	}
	// =================================================================













	// METHOD :: Compute Promo Payout ==================================
	public function ComputePromoPayout($PayoutArray, $Amount){

		$_return									= false;


		if($PayoutArray['type'] == 'percentage'){
			$_return = ($PayoutArray['rate'] * .01) * $Amount;

		}elseif($PayoutArray['type'] == 'flatrate'){
			$_return = $PayoutArray['rate'] * $Amount;
		}

	return $_return;
	}
	// =================================================================















	// METHOD :: Get Impressions, Clicks, etc - Performance ============
	public function CreateAffiliatePromoPerformance($PromoID_DECRYPTED, $Type, $Range = false, $Option = false){


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














	// METHOD :: Create Affiliate Promo ============================
	public function CreateAffiliatePromo($UserID_DECRYPTED, $Type = 'geo', $Property = 'friendsnflings.com', $Level = 'default', $PromoImgID = 'na'){

		// HARD CODED SOLUTION - PromocodeID - Default (free account)
		$_PromocodeID = 4;


		$_return									= false;
		$num_rows									= false;
		$TimeStamp								= time();
		
		switch($Type){
			case 'geo':
				$_DefaultPromoName				= date('m/d/y', time());	
			break;

			case 'banner':
				$_DefaultPromoName				= $PromoImgID.'-'.date('m/d/y', time());
			break;			
		}



		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------



		// generate Unique promoID -------------------
    $code 		= md5(uniqid(rand(), true));
    $_promoID = substr($code, 0, 6);


		// Check for Duplicate -----------------------
		$sql_query	= mysql_query("SELECT * FROM user_promos WHERE user_promos.promoid = '$_promoID'");
		$num_rows		=	mysql_num_rows($sql_query);
		// -------------------------------------------    	

  	if($num_rows == 0){



  		// if image promo - get image file ---------
  		if($PromoImgID != 'na'){
  			$__PromoAssetID = $PromoImgID;
  			/*
  			$sql_query	= mysql_query("SELECT * FROM promo_assets WHERE promo_assets.id = '$PromoImgID'");
  			if(mysql_num_rows($sql_query)){
  				$__PromoImageFileName = mysql_result($sql_query,0,"file");	
  			}else{
  			$__PromoImageFileName = 'na';
  			}
  			*/
  		}else{
  			$__PromoAssetID = 'na';
  		}
  		// -----------------------------------------
  
  
    	// Retrieve Data -----------------------------
  		mysql_query("INSERT INTO user_promos (userid, promoid, promo_name, promo_class, promo_assetid, promocodeid, propertyid, level, tscreated) VALUES('$UserID_DECRYPTED', '$_promoID', '$_DefaultPromoName', '$Type', '$__PromoAssetID', '$_PromocodeID', '$Property', '$Level', '$TimeStamp')");



  	}else{

			// re-generate Unique promoID --------------
    	$code 		= md5(uniqid(rand(), true));
    	$_promoID = substr($code, 0, 6);


  		// if image promo - get image file ---------
  		if($PromoImgID != 'na'){
  			$__PromoAssetID = $PromoImgID;
  			/*
  			$sql_query	= mysql_query("SELECT * FROM promo_assets WHERE promo_assets.id = '$PromoImgID'");
  			if(mysql_num_rows($sql_query)){
  				$__PromoImageFileName = mysql_result($sql_query,0,"file");	
  			}else{
  			$__PromoImageFileName = 'na';
  			}
  			*/
  		}else{
  			$__PromoAssetID = 'na';
  		}
  		// -----------------------------------------
  
  
    	// Retrieve Data -----------------------------
  		mysql_query("INSERT INTO user_promos (userid, promoid, promo_name, promo_class, promo_assetid, promocodeid, propertyid, level, tscreated) VALUES('$UserID_DECRYPTED', '$_promoID', '$_DefaultPromoName', '$Type', '$__PromoAssetID', '$_PromocodeID', '$Property', '$Level', '$TimeStamp')");

  	}






		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


  	if($_promoID){
  		$_return			=	$_promoID;
		}


	return $_return;
	}
	// =================================================================










	// METHOD :: Get Affiliate Promos ==================================
	public function GetAffiliatePromos($UserID){

		$_return									= false;
		$_timestamp								= time();
		$ResultArray							= null;
		
		

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
		$sql_query	= mysql_query("SELECT * FROM user_promos WHERE user_promos.userid = '$UserID' AND user_promos.promo_type = 'external'");
		// -------------------------------------------

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


  	if($ResultArray){
  		$_return			=	$ResultArray;
		}


	return $_return;
	}
	// =================================================================











	// METHOD :: Get Promo Image Data ==================================
	public function GetPromoImgFilename($ID){


		$_return									= false;
		$_timestamp								= time();
		$ResultArray							= null;

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  	// Retrieve Data -----------------------------
		$sql_query	= mysql_query("SELECT * FROM promo_assets WHERE promo_assets.id = '$ID'");
		$num_rows		=	mysql_num_rows($sql_query);
		// -------------------------------------------

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($num_rows){
			
			//$_return['type']		=	mysql_result($sql_query,0,"type");
			//$_return['file']		=	mysql_result($sql_query,0,"file");
			//$_return['width']		=	mysql_result($sql_query,0,"height");
			//$_return['height']	=	mysql_result($sql_query,0,"width");
			//$_return	=	mysql_result($sql_query,0,"type").':'.mysql_result($sql_query,0,"file");
			
			$_return	=	mysql_fetch_assoc($sql_query);
			
		}


	return $_return;
	}
	// =================================================================











	// METHOD :: Verify Affiliate Promo Exists =========================
	public function VerifyAffiliatePromoExists($UserID){

		$_return									= false;
		$_timestamp								= time();
		$ResultArray							= null;
		
		

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
		$sql_query	= mysql_query("SELECT * FROM user_promos WHERE user_promos.userid = '$UserID' AND user_promos.promo_type = 'external'");
		$num_rows		=	mysql_num_rows($sql_query);
		// -------------------------------------------

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------

		if($num_rows){
			$_return	=	mysql_result($sql_query,0,"promoid");
		}

	return $_return;
	}
	// =================================================================












	// METHOD :: Get Affiliate Blocked IPs =============================
	public function GetAffiliateBlockedIPs($UserID_DECRYPTED){

		$_return									= false;
		$_timestamp								= time();
		$ResultArray							= null;


		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(1); //read operation
		// -------------------------------------------

  	// Retrieve Data -----------------------------
		$sql_query	= mysql_query("SELECT * FROM user_ignore WHERE user_ignore.userid = '$UserID_DECRYPTED'");
		// -------------------------------------------

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


  	if($ResultArray){
  		$_return			=	$ResultArray;
		}


	return $_return;
	}
	// =================================================================














	// METHOD :: Promo Editor Method ===================================
	public function PromoEditor($PromoID, $Command, $Parameter){


		$_return							= false;

 		$_AffiliateSpecifics 	= $this->GetAffiliatePromoSpecifics($PromoID);
		$_UserID 							= $_AffiliateSpecifics['userid'];

		$_timestamp 					= time();


		// check for encrypted promocode -------------
		if(strlen($PromoID) > 20){
			$PromoID =	$this->Decrypt($PromoID, 'private', 'egenhq.com');
		}
		// -------------------------------------------





		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(0);  //write operation
		// -------------------------------------------


		switch($Command){
			
			case 'edit.promo.thumbs':

    		if(strpos($Parameter, ":")){
    			// 1st = num_thumb,  2nd = width, 3rd = height
    			$_Parameter_Exploded = explode(':',$Parameter);
    			$_numThumbs = str_replace(" Profiles", "", $_Parameter_Exploded[0]);
    			$_width 		= str_replace("px", "", $_Parameter_Exploded[1]);
    			$_height 		= str_replace("px", "", $_Parameter_Exploded[2]);
    		}

				mysql_query("UPDATE user_promos SET user_promos.thumbs_num = '$_numThumbs', user_promos.iframe_width = '$_width', user_promos.iframe_height = '$_height' WHERE user_promos.promoid = '$PromoID'");
			break;

			case 'edit.promo.addrow':

    		if(strpos($Parameter, ":")){
    			// 1st = num_thumb,  2nd = width, 3rd = height
    			$_Parameter_Exploded = explode(':',$Parameter);
    			$_numThumbs = str_replace(" Profiles", "", $_Parameter_Exploded[0]);
    			$_width 		= str_replace("px", "", $_Parameter_Exploded[1]);
    			$_height 		= str_replace("px", "", $_Parameter_Exploded[2]);
    		}

				mysql_query("UPDATE user_promos SET user_promos.thumbs_rows = user_promos.thumbs_rows + 1, user_promos.iframe_height = user_promos.iframe_height + 160 WHERE user_promos.promoid = '$PromoID'");
			break;

			case 'edit.promo.subtractrow':

    		if(strpos($Parameter, ":")){
    			// 1st = num_thumb,  2nd = width, 3rd = height
    			$_Parameter_Exploded = explode(':',$Parameter);
    			$_numThumbs = str_replace(" Profiles", "", $_Parameter_Exploded[0]);
    			$_width 		= str_replace("px", "", $_Parameter_Exploded[1]);
    			$_height 		= str_replace("px", "", $_Parameter_Exploded[2]);
    		}

				mysql_query("UPDATE user_promos SET user_promos.thumbs_rows = user_promos.thumbs_rows - 1, user_promos.iframe_height = user_promos.iframe_height - 160 WHERE user_promos.promoid = '$PromoID'");
			break;

			case 'edit.promo.color':
			
				$_Parameter_Exploded = explode(':',$Parameter);
				
    		$_colorCode = $_Parameter_Exploded[0];
    		$_element		= $_Parameter_Exploded[1];
    		
    		switch($_element){
    			case 'promo_color_bg':
    				mysql_query("UPDATE user_promos SET user_promos.bg_color = '$_colorCode' WHERE user_promos.promoid = '$PromoID'");
    			break;

    			case 'promo_color_photoborder':
    				mysql_query("UPDATE user_promos SET user_promos.thumbs_border_color = '$_colorCode' WHERE user_promos.promoid = '$PromoID'");
    			break;

    			case 'promo_color_info':
    				mysql_query("UPDATE user_promos SET user_promos.text_color = '$_colorCode' WHERE user_promos.promoid = '$PromoID'");
    			break;

    			case 'promo_color_name':
    				mysql_query("UPDATE user_promos SET user_promos.link_color = '$_colorCode' WHERE user_promos.promoid = '$PromoID'");
    			break;
    		}
			break;


 			case 'edit.promo.status':
 				switch($Parameter){
 					case 'disable':
 						mysql_query("UPDATE user_promos SET user_promos.active = '0' WHERE user_promos.promoid = '$PromoID'");	
 					break;

 					case 'enable':
 						mysql_query("UPDATE user_promos SET user_promos.active = '1' WHERE user_promos.promoid = '$PromoID'");	
 					break;

 					case 'delete':
 					if(mysql_query("UPDATE user_promos SET user_promos.deleted = '1' WHERE user_promos.promoid = '$PromoID'")){
 						echo 5;
 					}
 					break;
 				}
 			break;


 			case 'edit.promo.filter':

				$_Parameter_Exploded = explode(':',$Parameter);
				
    		$_Command		= $_Parameter_Exploded[0];
    		$_IP 				= $_Parameter_Exploded[1];
    		

 				switch($_Command){
 					case 'remove':
 						mysql_query("DELETE FROM user_ignore WHERE user_ignore.ip_address = '$_IP' AND user_ignore.userid = '$_UserID'");
 					break;

 					case 'filter':
						mysql_query("INSERT INTO user_ignore (userid, ip_address, ts) VALUES('$_UserID', '$_IP', '$_timestamp')");
 					break;
 				}
 			break;



 			case 'edit.promo.name':
 						mysql_query("UPDATE user_promos SET user_promos.promo_name = '$Parameter' WHERE user_promos.promoid = '$PromoID'");	
 			break;


 			case 'edit.promo.titleimage':
 				switch($Parameter){
 					case '319':
 						$Parameter	=	319;
 						mysql_query("UPDATE user_promos SET user_promos.property_logo = '$Parameter' WHERE user_promos.promoid = '$PromoID'");
 					break;

 					case '225':
 						$Parameter	=	225;
 						mysql_query("UPDATE user_promos SET user_promos.property_logo = '$Parameter' WHERE user_promos.promoid = '$PromoID'");
 					break;

 					case '125':
 						$Parameter	=	125;
 						mysql_query("UPDATE user_promos SET user_promos.property_logo = '$Parameter' WHERE user_promos.promoid = '$PromoID'");
 					break;
 				}
 			break;

 			case 'edit.promo.updateLander':
 						if(mysql_query("UPDATE user_promos SET user_promos.landerid = '$Parameter' WHERE user_promos.promoid = '$PromoID'")){
 							echo 6;
 						}
 			break;


 			case 'edit.promo.updatesmartPromo':

						if($Parameter == 'on'){
							$Parameter = '1';
						}else{
							$Parameter = '0';
						}

 						if(mysql_query("UPDATE user_promos SET user_promos.smart_promo = '$Parameter' WHERE user_promos.promoid = '$PromoID'")){
 							
 							if($Parameter == '1'){
 								echo 71;	
 							}else{
 								echo 70;
 							}
 							
 						}
 			break;





		}

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	return $_return;
	}
	// =================================================================













	// METHOD :: Affiliate Ad Promocode Lookup =========================
	public function AffAdPromocodeLookup($PromocodeID){

		$_return					= false;


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

			$sql_result				= mysql_query("SELECT * FROM promocode WHERE promocode.id = '$PromocodeID' AND promocode.enabled = '1'");			
			$sql_obj_result		=	mysql_fetch_object($sql_result);

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_obj_result->message){
/*
			$PromocodeArray						= array(
																	'Promocode' 	=> $Promocode,
																	'Vendor' 			=> $sql_obj_result->vendor,
																	'Referer' 		=> $sql_obj_result->referer,
																	'Discount' 		=> $sql_obj_result->discount,
																	'Lifespan' 		=> $sql_obj_result->tslifespan,
																	'Message' 		=> $sql_obj_result->message,
																	'CTAPitch' 		=> $sql_obj_result->ctapitch,
																	'Enabled' 		=> $sql_obj_result->enabled
																	);
			$_return 									= $PromocodeArray;
*/
			$this->PromocodeMessage 	= $sql_obj_result->message;
			$this->PromocodeDiscount 	=	$sql_obj_result->discount;
			$this->PromocodeUpgradeDiscount 	=	$sql_obj_result->upgrade_discount;
			//$this->Promocode					=	$Promocode;
			$this->Promocode					=	$sql_obj_result->promocode;
			$this->PromocodeCTAPitch	=	$sql_obj_result->ctapitch;
			$this->PromocodeLifespan	=	$sql_obj_result->tslifespan;
			$this->PromocodeType			=	$sql_obj_result->promo_type;
			$this->PromocodeProductID	=	$sql_obj_result->product_id;
			
			
			$_return 									= true;
		}


	return $_return;
	}
	// =================================================================









	// METHOD :: Active Member Promocode Lookup ========================
	public function ActiveMemberPromocode($UserID){

		$_return					= false;
		$Expired					=	null;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

			//$Today						= time();
			//$sql_result				= mysql_query("SELECT user_promocode.discount, user_promocode.promocode, user_promocode.tsexpiration FROM user_promocode WHERE user_promocode.userid = '$UserID' AND user_promocode.tsexpiration > '$Today'") or die('ERROR :: Query >> Active Promocode Per Member Query Error >> Contact Administrator');			
			$sql_result				= mysql_query("SELECT * FROM user_promocode WHERE user_promocode.userid = '$UserID'");
			$sql_obj_result		=	mysql_fetch_object($sql_result);


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------

 	


		if($sql_obj_result->promocode){
			
			if($sql_obj_result->tsexpiration > time()){
				$Expired	=	false;
			}elseif($sql_obj_result->tsexpiration == 0){
				$Expired	=	false;
			}else{
				$Expired	=	true;
			}
			
			$ReturnArray				= array(
														'promocode'			=>	$sql_obj_result->promocode,
														'discount'			=>	$sql_obj_result->discount,
														'tsexpiration'	=>	$sql_obj_result->tsexpiration,
														'expired'				=>	$Expired
													);
			$_return					= $ReturnArray;
		}


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











	// METHOD :: FilterRawInput ========================================
	public function FilterRawInput($RawInput){

		
		$_tempResult = filter_var($RawInput, FILTER_SANITIZE_STRING);
		$_tempResult = filter_var($_tempResult, FILTER_SANITIZE_MAGIC_QUOTES);


	 return $_tempResult;
	}
	// =================================================================		
		










	// METHOD :: GeoCodeLookup =========================================
	public function GeoCodeLookup($ZIPCode, $Mode = 'Preset'){
		
		$_return					= false;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------


		$sql_result				= mysql_query("SELECT zip_code.city, zip_code.state_name, zip_code.state_prefix FROM zip_code WHERE zip_code.zip_code = '$ZIPCode'") or die('ERROR :: Query >> ZIP Code Query Error >> GeoCodeLookup >> Contact Administrator');			
		$sql_obj_result		=	mysql_fetch_object($sql_result);


		if($sql_obj_result->city){

			if($Mode == 'Preset'){
				$_return					= $sql_obj_result->city.', '.$sql_obj_result->state_name;
			}elseif($Mode == 'Array'){
  			$ReturnArray				= array(
  														'city'					=>	$sql_obj_result->city,
  														'state'					=>	$sql_obj_result->state_name,
  														'prefix'				=>	$sql_obj_result->state_prefix
  													);
  
  			$_return					= $ReturnArray;
			}

		}

		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------



	 return $_return;
	}
	// =================================================================











	// METHOD :: IPLookup ==============================================
	public function IPLookup_OLD($IP){

		$_return					= false;
		$_expiration			=	time() - (2629743 * 3);	// 3 month expiration

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1);  //read operation
		// -------------------------------------------

		$sql_result				= mysql_query("SELECT IP2L.* FROM ip2location IP2L WHERE IP2L.ip = '$IP' AND IP2L.ts > '$_expiration'");
		$sql_obj_result		=	mysql_fetch_object($sql_result);
		
		if($sql_obj_result->city){

  		$resultArray 	= array(
  								'zipcode'		=>	$sql_obj_result->zipcode,
  								'city' 			=>	$sql_obj_result->city,
  								'state' 		=>	$sql_obj_result->state
  		);

			$_return 	= $resultArray;


		}else{
			
			$client 		= new SoapClient("http://ws.fraudlabs.com/ip2locationwebservice.asmx?wsdl");
			$LicenseKey = '02-S56A-X78C';

			$params 	= array(
								'IP' 					=>	$IP,
								'LICENSE' 		=>	$LicenseKey,
			);

  		//Consume the service and pull the result --------------
  		$result 	= $client->IP2Location($params);
  		$result 	= $result->IP2LocationResult;
  
  		$resultArray 	= array(
  								'zipcode'		=>	strtolower($result->ZIPCODE),
  								'city' 			=>	strtolower($result->CITY),
  								'state' 		=>	strtolower($result->REGION),
  								'credits'		=>	strtolower($result->CREDITSAVAILABLE),
  		);

			// notify if web server credits fall below 20 --------
			if($result->CREDITSAVAILABLE < 20){
				$this->SendeMail('nathaniel.briggs@gmail.com', 'FNF AUTOSYS', 'IP2LOCATION CREDITS LOW', 'IP2Location Credits for WSDL are below 20');	
			}

  		$__city			=	$resultArray['city'];
			$__state		=	$resultArray['state'];
  		$__zipcode	=	$resultArray['zipcode'];
  		$__creditsa	=	$resultArray['credits'];
  		$__ts				=	time();

    	// insert IP2Location lookup -------------------------
    	mysql_query("INSERT INTO ip2location (ip, city, state, zipcode, ts, creditsavailable) VALUES('$IP', '$__city', '$__state', '$__zipcode', '$__ts', '$__creditsa')");

			$_return 	= $resultArray;

		}






		//$request_url		=	'http://local.yahooapis.com/MapsService/V1/geocode?appid=YD-9G7bey8_JXxQP6rxl.fBFGgCdNjoDMACQA--&street=701+First+Ave&city=Sunnyvale&state=CA';
		//$xmlResponse		= simplexml_load_file($request_url) or die("url not loading");
		//$response = file_get_contents($request_url);
		
		//echo $xmlResponse;


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------




/*
		$client 		= new SoapClient("http://trial.serviceobjects.com/gpp/GeoPinPoint.asmx?WSDL");
		$LicenseKey = 'WS1-UHK4-PDQ1';

		$params 	= array(
								'IPAddress' 	=>	$IP,
								'License' 		=>	$LicenseKey,
		);
		//Consume the service and pull the result --------------
		$result 	= $client->GetLocationByIP_V2($params);
		$result 	= $result->GetLocationByIP_V2Result;
		$_return 	= $result->CountryISO2;


*/


	 return $_return;
	}
	// =================================================================













	// METHOD :: IPLookup ==============================================
	public function IPLookup_OLDr2($IP){

		



  	$confXML				= '/var/www/vhosts/dbconf/db.conf';
 		$_baseXMLConn		= simplexml_load_file($confXML) or die ("ERROR: ** BASE XML File Not Loaded  **");



  	//Parse XML --------------------------------
  	foreach($_baseXMLConn as $resource){

  		if($resource->Name == 'ip2location'){
	   		$R_name 					= $resource->Name;
  	 		$R_location 			= $resource->Location;
     		$R_type 					= $resource->Type;
     		$R_specificName 	= $resource->SpecificName;
     		$R_login 					= $resource->Login;
     		$R_pass 					= $resource->Pass;  			
  		}

  	}



		$DBConn = mysql_connect($R_location, $R_login, $R_pass) or die ('Error: DB CONNECTION');
		$DB			= mysql_select_db($R_specificName, $DBConn) or die ('Error: DB NOT SELECTED');




		$_return					= false;
		$_expiration			=	time() - (2629743 * 9);	// 3 month expiration



		$sql_result				= mysql_query("SELECT IP2L.* FROM ip2location IP2L WHERE IP2L.ip = '$IP' AND IP2L.ts > '$_expiration'");
		$sql_obj_result		=	mysql_fetch_object($sql_result);

		
		// check Database for GEOIP Record ---------------------
		if($sql_obj_result->city){

  		$resultArray 	= array(
  								'zipcode'		=>	$sql_obj_result->zipcode,
  								'city' 			=>	$sql_obj_result->city,
  								'state' 		=>	$sql_obj_result->state
  		);

			$_return 	= $resultArray;












		// check WSDL for GEOIP Lookup -------------------------
		}else{


			
			// -----------------------------------------
			function CheckAvailableCredits(){

				$client 		= new SoapClient("http://ws.fraudlabs.com/ip2locationwebservice.asmx?wsdl");
				
   			$AvailableLicenseKeys = array(
    				1	=>	'02-E89H-J42X',
    				2	=>	'02-F37N-T48Z',
   			);

				$NumLicenseKeys = count($AvailableLicenseKeys);
				

				while($NumLicenseKeys > 0){

	  			$params 	= array(
  							'IP' 					=>	'test',
  							'LICENSE' 		=>	$AvailableLicenseKeys[$NumLicenseKeys]
  				);


       		//Consume the service and pull the result --------------
       		$result 	= $client->IP2Location($params);
       		$result 	= $result->IP2LocationResult;



					if($result->CREDITSAVAILABLE > 0){

         		$resultArray 	= array(
         								'LICENSE'		=>	$params['LICENSE'],
         								'CREDITS'		=>	$result->CREDITSAVAILABLE
         		);

						return $resultArray;
					}
					$NumLicenseKeys--;
				}
			}
			// -----------------------------------------





/*
  		switch($_SERVER[SERVER_NAME]){
  			case 'freefig.com':
  				$LicenseKey	= '02-E89H-J42X';					// FreeFig.com @ Login: contact@freefig.com Pass: #2TOqwer2freeFig@!
  			break;
  
  			case 'friendsnflings.com':
  				$LicenseKey	= '02-F37N-T48Z';					// Friends 'n Flings as login: management@friendsnflings.com pass: Ip2Lo8@9abc12fnf!#
  			break;
  			
  			default:
  				$LicenseKey	= '02-S56A-X78C';					// eGenerations Network, Inc. as nathaniel.briggs@gmail.com
  			break;
  		}
*/




			


			$client 			= new SoapClient("http://ws.fraudlabs.com/ip2locationwebservice.asmx?wsdl");

			$_tempLicKey 	= CheckAvailableCredits();
			
			$LicenseKey		= $_tempLicKey['LICENSE'];


			$params 	= array(
								'IP' 					=>	$IP,
								'LICENSE' 		=>	$LicenseKey,
			);

  		//Consume the service and pull the result --------------
  		$result 	= $client->IP2Location($params);
  		$result 	= $result->IP2LocationResult;
  
  		$resultArray 	= array(
  								'countrycode'	=>	strtolower($result->COUNTRYCODE),
  								'zipcode'			=>	strtolower($result->ZIPCODE),
  								'city' 				=>	strtolower($result->CITY),
  								'state' 			=>	strtolower($result->REGION),
  								'credits'			=>	strtolower($result->CREDITSAVAILABLE)
  		);



  		$__city			=	$resultArray['city'];
			$__state		=	$resultArray['state'];
  		$__zipcode	=	$resultArray['zipcode'];
  		$__creditsa	=	$resultArray['credits'];
  		$__ts				=	time();

    	// insert IP2Location lookup -------------------------
    	mysql_query("INSERT INTO ip2location (ip, city, state, zipcode, ts, creditsavailable, source) VALUES('$IP', '$__city', '$__state', '$__zipcode', '$__ts', '$__creditsa', '$LicenseKey')");


			// notify if web server credits fall below 20 --------
			if($result->CREDITSAVAILABLE < 20){
				$this->SendeMail('management@friendsnflings.com', 'IP2GEO AUTOSYS', 'IP2LOCATION CREDITS LOW', 'IP2Location Credits: '.$result->CREDITSAVAILABLE);	
			}


			$_return 	= $resultArray;

		}



	 return $_return;
	}
	// =================================================================
	
	
	
	
	
	
	
	
	
	
	



	// METHOD :: IPLookup ==============================================
	public function IPLookup($IP){

		



  	$confXML				= '/var/www/vhosts/dbconf/db.conf';
 		$_baseXMLConn		= simplexml_load_file($confXML) or die ("ERROR: ** BASE XML File Not Loaded  **");



  	//Parse XML --------------------------------
  	foreach($_baseXMLConn as $resource){

  		if($resource->Name == 'ip2location'){
	   		$R_name 					= $resource->Name;
  	 		$R_location 			= $resource->Location;
     		$R_type 					= $resource->Type;
     		$R_specificName 	= $resource->SpecificName;
     		$R_login 					= $resource->Login;
     		$R_pass 					= $resource->Pass;  			
  		}

  	}



		$DBConn = mysql_connect($R_location, $R_login, $R_pass) or die ('Error: DB CONNECTION');
		$DB			= mysql_select_db($R_specificName, $DBConn) or die ('Error: DB NOT SELECTED');




		$_return					= false;
		$_expiration			=	time() - (2629743 * 9);	// 3 month expiration



		$sql_result				= mysql_query("SELECT IP2L.* FROM ip2location IP2L WHERE IP2L.ip = '$IP' AND IP2L.ts > '$_expiration'");
		$sql_obj_result		=	mysql_fetch_object($sql_result);

		
		// check Database for GEOIP Record ---------------------
		if($sql_obj_result->city){

  		$resultArray 	= array(
  								'zipcode'		=>	$sql_obj_result->zipcode,
  								'city' 			=>	$sql_obj_result->city,
  								'state' 		=>	$sql_obj_result->state
  		);

			$_return 	= $resultArray;




		// check WSDL for GEOIP Lookup -------------------------
		}else{


			require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/class.GeoCityLocateIspOrg.php');

			$geoloc = GeoCityLocateIspOrg::getInstance();
			$geoloc->setLicenceKey("QnWEYkWjE9Pf");
			
			//Consume the service and pull the result --------------
			$geoloc->setIP($IP);

			if(!$geoloc->isError()){

    		$resultArray 	= array(
    								'countrycode'	=>	strtolower($geoloc->getCountryCode()),
    								'zipcode'			=>	strtolower($geoloc->getZip()),
    								'city' 				=>	strtolower($geoloc->getCity()),
    								'state' 			=>	strtolower($geoloc->getState())
    		);
			}else{

    		$resultArray 	= array(
    								'countrycode'	=>	'us',
    								'zipcode'			=>	'85254',
    								'city' 				=>	'phoenix',
    								'state' 			=>	'az'
    		);
				
			}


if(!$geoloc->getZip()){

    		$resultArray 	= array(
    								'countrycode'	=>	'us',
    								'zipcode'			=>	'85254',
    								'city' 				=>	'phoenix',
    								'state' 			=>	'az'
    		);	
	
	
}



  		$__city			=	$resultArray['city'];
			$__state		=	$resultArray['state'];
  		$__zipcode	=	$resultArray['zipcode'];
  		$__creditsa	=	$resultArray['credits'];
  		$__ts				=	time();

    	// insert IP2Location lookup -------------------------
    	mysql_query("INSERT INTO ip2location (ip, city, state, zipcode, ts, creditsavailable, source) VALUES('$IP', '$__city', '$__state', '$__zipcode', '$__ts', '$__creditsa', '$LicenseKey')");


			// notify if web server credits fall below 20 --------
			/*
			if($result->CREDITSAVAILABLE < 20){
				//$this->SendeMail('management@friendsnflings.com', 'IP2GEO AUTOSYS', 'IP2LOCATION CREDITS LOW', 'IP2Location Credits: '.$result->CREDITSAVAILABLE);	
			}
			*/


			$_return 	= $resultArray;

		}



	 return $_return;
	}
	// =================================================================
	
	
	
	
	




// END OF METHODS ------------------------------------------------------------------------


}
// END OF CLASS ========================================================================================================






















// Example Arrays for Testing Usage ====================================================================================


/*



*/

?>