<?php
// --------------------------------------------------------------------------------------------------------------------------------
// Author: 	Nathaniel Adam Briggs @ Q1 - Q4 2008  nathaniel.briggs@gmail.com - REVISED 2011
// Owner:		eGenerations Network, Inc. | syntheticMagic Advanced Business Services
// Client:	SM
// Class:		session
// Version:	Release 2.1
// Method:	example()
// Purpose:	Create Session for Users
// Usage:		

//					Instantiate ----------------------------------------------------------------------
//         	

//					Execute example() Method with $x (array) parameter (Examples @ base of file)
//					
//					
//					
//					
// --------------------------------------------------------------------------------------------------------------------------------




// START OF CLASS ======================================================================================================

class session {


// PROPERTIES ----------------------------------------------------------------------------


	// external communication ==========================================

	//public	$db_conn;
	public	$session_Authenticated;
	public 	$session_life_time;


	// internal operations =============================================
	private $_session_CookieDomain;
	private $_session_Credentials;
	
	private	$_response;
	
	private	$_logout;










// METHODS -------------------------------------------------------------------------------





	// CONSTRUCTOR =====================================================
	public function __construct(){

		//ini_set('session.cookie_domain', $this->_session_CookieDomain);

		$this->_session_CookieDomain	=	null;
		$this->_session_Credentials		= null;
		$this->session_Authenticated	= false;

		//
		$this->_response							= null;
		
		$this->session_life_time			= 1200;
		//$this->session_life_time			= 1;
		$this->session_token					= null;

		$this->session_name						= $_SERVER['SERVER_NAME'];



		// configuration mode --------------
		$this->config_modes						=	$this->AppMode();



    // database connection -----------------------
    $this->db_Read								= new db;
    $this->db_Write								= new db;
		$this->db_Read->Connect(1);
		$this->db_Write->Connect(0);
    // -------------------------------------------




// db based session data ---------------------------------------------
    // Read the maxlifetime setting from PHP -------------
    //$this->session_life_time = get_cfg_var("session.gc_maxlifetime");

      // Register this object as the session handler -------
      session_set_save_handler( 
        array( &$this, "open" ), 
        array( &$this, "close" ),
        array( &$this, "read" ),
        array( &$this, "write"),
        array( &$this, "destroy"),
        array( &$this, "clean" )
      );
// -------------------------------------------------------------------


	}
	// =================================================================





	// DESTRUCTOR ======================================================
	public function __destruct(){

		unset($this->_session_CookieDomain);
		unset($this->_session_Credentials);
		unset($this->session_Authenticated);
		unset($this->_response);

	}
	// =================================================================





	// pMETHOD :: _fSession_Create ===================================
  private function _fSession_Create(){

		//ini_set('session.cookie_domain', $this->_session_CookieDomain);
		//ini_set("session.cookie_httponly", true);
		//ini_set("session.cookie_domain",".DOMAINNAME.com");
		//ini_set("session.cookie_lifetime","1");
		//print_r(session_get_cookie_params());


		// per property --------------------------------
		switch($_SERVER['HTTP_HOST']){

			case $_SERVER['SERVER_NAME']:
				session_name($this->config_modes['app_name']);	
			break;

		}
		// -------------------------------------------


		session_cache_expire(2);
		session_cache_limiter('private');
		session_start();
		//session_set_cookie_params(0, '/home', '.DOMAINNAME.com', false, true);
		//setcookie ("DOMAINNAMEcookie", "", time() + 120);
		//session_cache_expire(1);
		//ini_set("session.gc_maxlifetime","1"); 
		session_regenerate_id(false);



  }
	// ===============================================================





	// pMETHOD :: _fSession_Destroy ====================================
  private function _fSession_Destroy($__sessionCredentials){

  	setcookie('login', $__sessionCredentials['ActiveUser']['email_addr'], time()-3600, '/', '.'.$_SERVER['HTTP_HOST'].'');
  	setcookie('pass', $__sessionCredentials['ActiveUser']['password'], time()-3600, '/', '.'.$_SERVER['HTTP_HOST'].'');
  
  	unset($_COOKIE[session_name()]);
  	unset($_COOKIE['login']);
  	unset($_COOKIE['pass']);
  
  	setcookie(session_name(), '', time()-42000, '/');

		unset($__sessionCredentials);
		session_unset();
		session_destroy();
		$this->__destruct();
		//$_SESSION['ActiveUser']['token']			= md5(uniqid(rand(), true));

  }
	// ===============================================================







	// pMETHOD :: _fSession_Logout ===================================
  private function _fSession_Logout($__sessionCredentials){


		$this->_fSession_Commander('Destroy', $__sessionCredentials);

  }
	// ===============================================================











	// =================================================================================================
	private function _Authenticate($Credentials){




						$_EmailAddr				=	$Credentials['email_addr'];
						$_Password				=	$Credentials['password'];
						$_CreateCookie		=	$Credentials['remember_me'];
						
						

						// per property --------------------------------
						switch($_SERVER['HTTP_HOST']){

							case $_SERVER['SERVER_NAME']:

		        		// database connection ---------------------
		        		$this->db_Read->Connect(1);
		        		// -----------------------------------------

								// lookup user per given credentials -------
								switch($this->config_modes['activation_mode']){
									case 'required':
										$sql_query_USER						= mysql_query("SELECT * FROM user WHERE user.email_addr = '$_EmailAddr' AND user.password = '$_Password' AND user.disabled = '0' AND user.activated = '1'");
									break;

									case 'not_required':
										$sql_query_USER						= mysql_query("SELECT * FROM user WHERE user.email_addr = '$_EmailAddr' AND user.password = '$_Password' AND user.disabled = '0'");
									break;
								}

								$sql_obj_result_USER			=	mysql_fetch_object($sql_query_USER);
								
								if($sql_obj_result_USER){

		        		// database connection ---------------------
		        		$this->db_Read->Connect(1);
		        		// -----------------------------------------

									$sql_query_USER_TYPE						= mysql_query("SELECT * FROM user_type WHERE user_type.user_type_id = $sql_obj_result_USER->user_type");
									$sql_obj_result_USER_TYPE				=	mysql_fetch_object($sql_query_USER_TYPE);
								
									$sql_query_ORGANIZATION					= mysql_query("SELECT * FROM organization WHERE organization.id = $sql_obj_result_USER->organization_id");
									$sql_obj_result_ORGANIZATION		=	mysql_fetch_object($sql_query_ORGANIZATION);
								}
							break;
							
						}
						// ---------------------------------------------



        		



      			// access granted --------------------------
        		if($sql_obj_result_USER){


						// per property --------------------------------
						switch($_SERVER['HTTP_HOST']){
							
							case $_SERVER['SERVER_NAME']:
            		//populate session variables per Active User Session --------------
            		//$_SESSION['ActiveUser']['username'] 		= $sql_obj_result->tax_business_name;
            		$_SESSION['ActiveUser']['username'] 					= $sql_obj_result_USER->first_name.'.'.$sql_obj_result_USER->last_name;
            		$_SESSION['ActiveUser']['organization_name'] 	= $sql_obj_result_ORGANIZATION->name;
            		$_SESSION['ActiveUser']['organization_id'] 		= $sql_obj_result_ORGANIZATION->id;
            		$_SESSION['ActiveUser']['manager_id'] 				= $sql_obj_result_USER->manager_id;
            		$_SESSION['ActiveUser']['userid'] 						= $sql_obj_result_USER->userid;
            		$_SESSION['ActiveUser']['user_type_id']				= $sql_obj_result_USER->user_type;
            		$_SESSION['ActiveUser']['user_type']					= $sql_obj_result_USER_TYPE->user_type;
            		$_SESSION['ActiveUser']['activated']					= $sql_obj_result_USER->activated;
							break;

						}
						// ---------------------------------------------



          		
          		// IP Address of Client ------------------------------------------
          		if(!$_SERVER['REMOTE_ADDR']){
      					$_SESSION['ActiveUser']['ip_address']		= md5(uniqid(rand(), true));    			
          		}else{
          			$_SESSION['ActiveUser']['ip_address']		= $_SERVER['REMOTE_ADDR'];
          		}

							// SessionID of Client -------------------------------------------
          		$_SESSION['ActiveUser']['sessionid']		= session_id();

      				// Create Token --------------------------------------------------
        			if(!$_SESSION['ActiveUser']['token']){
        				$this->session_token									= md5(uniqid(rand(), true));
        				$_SESSION['ActiveUser']['token']			= $this->session_token;
      				}

      				// Create Expiration TimeStamp -----------------------------------
        			if(!$_SESSION['ActiveUser']['session_expiration']){
        				$_SESSION['ActiveUser']['session_expiration']	= time() + 300;
      				}

          
          		$ts_now																	= time();

	        		// database connection ---------------------
	        		$this->db_Read->Connect(1);
	        		// -----------------------------------------

          		// update lastlogin & lastaction ---------------------------------
          		mysql_query("UPDATE user SET user.ts_lastlogin = '$ts_now', user.ts_lastaction = '$ts_now' WHERE user.userid = '$sql_obj_result_USER->userid' AND user.password = '$_Password'");


          		// destroy database connection object --------
          		$this->db_Read->Close();
          		// -------------------------------------------


							
							
							// Set Authentication Flag as TRUE -------------------------------
        			$this->session_Authenticated 	= true;

							if($_CreateCookie == 'true'){

								$this->_CookieHandler('destroy');
								$this->_CookieHandler('create', $Credentials, 31556926);
								
							}else{
								$this->_CookieHandler('destroy');
							}


						}else{
							//$this->_fSession_Commander('Destroy', $Credentials);
							$_SESSION['ActiveUser']['token']			= md5(uniqid(rand(), true));
							$this->session_Authenticated 	= false;
						}

			// application configuration -----------------
			$_SESSION['ActiveUser']['config_modes']				= $this->config_modes;


		return $this->session_Authenticated;
	}
	// =================================================================================================











	// =================================================================================================
  private function _Cipher($EncryptionType, $Action, $Subject){

    // Encryption ----------------------------------------------------
    $encryptObj							=	new baseCrypto;


		$confXML				= '/var/www/vhosts/dbconf/keys.'.$_SERVER['HTTP_HOST'];
		$_baseXMLConn		= simplexml_load_file($confXML) or die ("ERROR: ** KEYS Not Loaded  **");

		// encryption PUBLIC -------------------------
		$this->__passPhrase_PUBLIC	= $_baseXMLConn->public->passPhrase;
		$this->__key_PUBLIC					= $_baseXMLConn->public->key;
		$this->__cipherType_PUBLIC	= $_baseXMLConn->public->cipherType;
		$this->__cipherMode_PUBLIC	= $_baseXMLConn->public->cipherMode;

		// encryption PRIVATE ------------------------
		$this->__cipherType_PRIVATE	= $_baseXMLConn->private->cipherType;
		$this->__cipherMode_PRIVATE	= $_baseXMLConn->private->cipherMode;
		$this->__passPhrase_PRIVATE	= $_baseXMLConn->private->passPhrase;
		$this->__key_PRIVATE				= $_baseXMLConn->private->key;


		switch($EncryptionType){
			
			case 'private':
        $encryptObj->cipherType = $this->__cipherType_PRIVATE;
        $encryptObj->cipherMode = $this->__cipherMode_PRIVATE;
        $encryptObj->passPhrase = $this->__passPhrase_PRIVATE;
        $encryptObj->key 				= $this->__key_PRIVATE;
			break;

			case 'public':
        $encryptObj->cipherType = $this->__cipherType_PUBLIC;
        $encryptObj->cipherMode = $this->__cipherMode_PUBLIC;
        $encryptObj->passPhrase = $this->__passPhrase_PUBLIC;
        $encryptObj->key 				= $this->__key_PUBLIC;
			break;
		}


		switch($Action){
			
			case 'encrypt':
				$encryptObj->plainText 	= $Subject;
 				$CipherText							=	$encryptObj->ReturnHexCipherText();
 				$_return								= $CipherText;
			break;

			case 'decrypt':
				$encryptObj->plainText 	= $Subject;
 				$PlainText							=	$encryptObj->ReturnDecryptedText();
 				$_return								= $PlainText;
			break;
		}


		return $_return;
  }
	// =================================================================================================











	// =================================================================================================
  private function _CookieHandler($Action, $Credentials = 0, $Expiration = 300){


		switch($Action){
			
			case 'create':
      	//ini_set("session.cookie_lifetime","50");
      	setcookie('login', $Credentials['email_addr'], time() + $Expiration, '/', '.'.$_SERVER['HTTP_HOST'].'');
      	setcookie('pass', $Credentials['password'], time() + $Expiration, '/', '.'.$_SERVER['HTTP_HOST'].'');
      	setcookie('time', date('h i s A', time()), time() + $Expiration, '/', '.'.$_SERVER['HTTP_HOST'].'');
      	setcookie('expires', time() + $Expiration, time() + $Expiration, '/', '.'.$_SERVER['HTTP_HOST'].'');
      	setcookie('token', $this->session_token, time() + $Expiration, '/', '.'.$_SERVER['HTTP_HOST'].'');
      	setcookie('ip', $this->_Cipher('public', 'encrypt', $_SERVER['REMOTE_ADDR']), time() + $Expiration, '/', '.'.$_SERVER['HTTP_HOST'].'');
			break;

			case 'destroy':
				unset($_COOKIE['login']);
				unset($_COOKIE['pass']);
				unset($_COOKIE['time']);
				unset($_COOKIE['expires']);
				unset($_COOKIE['token']);
				unset($_COOKIE['ip']);				
			break;
		}


		return $_return;
  }
	// =================================================================================================


















	// pMETHOD :: _fSession_Authenticate =============================
  private function _fSession_Authenticate($__sessionCredentials){


		$__CREDENTIALS_CLEAN['email_addr']		=	filter_var($__sessionCredentials['email_addr'], FILTER_SANITIZE_EMAIL);
		$__CREDENTIALS_CLEAN['password']			=	filter_var($__sessionCredentials['password'], FILTER_SANITIZE_STRING);
		$__CREDENTIALS_CLEAN['remember_me']		=	filter_var($__sessionCredentials['remember_me'], FILTER_SANITIZE_STRING);


		$this->_Authenticate($__CREDENTIALS_CLEAN);

  }
	// ===============================================================



















	// pMETHOD :: _fSession_Commander ================================
  private function _fSession_Commander($__sessionCommand, $__sessionParameter){


		switch($__sessionCommand){
			
			case 'Create':
				$this->_session_CookieDomain = $__sessionParameter;
				$this->_fSession_Create($this->_session_CookieDomain);
			break;

			case 'Authenticate':
				$this->_session_Credentials = $__sessionParameter;
				$this->_fSession_Authenticate($this->_session_Credentials);
			break;

			case 'Destroy':
				$this->_session_Credentials = $__sessionParameter;
				$this->_fSession_Destroy($this->_session_Credentials);
			break;

			case 'Logout':
				$this->_session_Credentials = $__sessionParameter;
				$this->_fSession_Logout($this->_session_Credentials);
			break;

		}
		


	 // ** RETURN **
	 return $this->_response;
  }
	// ===============================================================





	// METHOD :: fSession_Interface ==================================
	public function fSession_Interface($__sessionCommand = '', $__sessionParameter = ''){


		if( ($__sessionCommand != '') && ($__sessionParameter != '')){
			$this->_response = $this->_fSession_Commander($__sessionCommand, $__sessionParameter);
		}


	 // ** RETURN **
	 return $this->_response;
	}
	// ===============================================================













// ---------------------------------------------------------------------------------------













/*
	// METHOD :: fSession_Interface ==================================
	public function SessionManager(){

      // Read the maxlifetime setting from PHP -------------
      $this->life_time = get_cfg_var("session.gc_maxlifetime");

      // Register this object as the session handler -------
      session_set_save_handler( 
        array( &$this, "open" ), 
        array( &$this, "close" ),
        array( &$this, "read" ),
        array( &$this, "write"),
        array( &$this, "destroy"),
        array( &$this, "gc" )
      );

   }
	// ===============================================================
*/



	// pMETHOD :: _fSession_Create ===================================
  public function open(){

    return true;
  }
	// ===============================================================



	// pMETHOD :: _fSession_Create ===================================
  public function close(){

    return true;
  }
	// ===============================================================


	// pMETHOD :: _fSession_Read ===================================
  public function read($id){

		// database connection -----------------------
		$this->db_Read->Connect(1);


   	$time 					= time();
   	$newid 					= mysql_real_escape_string($id);

		// Perform Database Action -------------------
		$sql_query			= mysql_query("SELECT user_sessions.data, user_sessions.sessionid FROM user_sessions WHERE user_sessions.sessionid = '$newid'");
		$sql_obj_result	=	mysql_fetch_object($sql_query);

   	if($sql_obj_result->data){
			$data 																= $sql_obj_result->data;
   	}

		// destroy database connection object --------
		$this->db_Read->Close();


   return $data;
  }
	// ===============================================================




	// pMETHOD :: _fSession_Write ===================================
  public function write($id, $data){

		// database connection -----------------------
		$this->db_Write->Connect(0);


   	$expires				= time() + $this->session_life_time;
   	$time						= time();
   	$newid 					= mysql_real_escape_string($id);
   	$newdata 				= mysql_real_escape_string($data);



		// Perform Database Action -------------------
		$sql_query			= mysql_query("REPLACE INTO user_sessions (user_sessions.sessionid, user_sessions.data, user_sessions.expires, user_sessions.ts_session) VALUES('$newid', '$newdata', '$expires', '$time') ");


		// destroy database connection object --------
		$this->db_Write->Close();


   return true;
  }
	// ===============================================================




	// pMETHOD :: _fSession_Destroy ===================================
  public function destroy($id){

		// database connection -----------------------
		$this->db_Write->Connect(0);

   	$id 					= mysql_real_escape_string($id);
		unset($_SESSION['ActiveUser']);
		mysql_query("DELETE FROM user_sessions WHERE user_sessions.sessionid = '$id' ");


		// destroy database connection object --------
		$this->db_Write->Close();
		
		
   return true;
  }
	// ===============================================================



	// pMETHOD :: _fSession_Garbage Cleanup ============================
  public function clean($MAXLife){

		// database connection -----------------------
		$this->db_Write->Connect(0);
		

   	$newid 					= mysql_real_escape_string($id);
   	$expired				=	time() - $MAXLife;
   	//$expired				=	time() - 1; 

		// Perform Database Action -------------------
		//$sql_query			= mysql_query("DELETE FROM user_sessions WHERE user_sessions.expires < '$expired' ");
		$sql_query			= mysql_query("DELETE FROM user_sessions WHERE user_sessions.ts_session < '$expired' ");
		@$sql_obj_result	=	mysql_fetch_object($sql_query);

		// destroy database connection object --------
		$this->db_Write->Close();


   return true;
  }
	// =================================================================



	// =================================================================
	public function AppMode(){

		$_return									= false;

		// database connection -----------------------
		$obj_db					= new db;
		$obj_db->Connect(0); //read operation
		// -------------------------------------------


  	$sql_NewMember			= mysql_query("SELECT * FROM config");
		$sql_array_result		=	mysql_fetch_array($sql_NewMember);
		$_return						= $sql_array_result;
		


		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


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