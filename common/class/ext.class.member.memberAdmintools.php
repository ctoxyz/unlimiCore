<?php

// --------------------------------------------------------------------------------------------------------------------------------
// Author: 	Nathaniel Adam Briggs
// Client:	BrainFiz.com
// Class:		dbconn
// Version:	Release 1.0
// Method:	example()
// Purpose:	Create mySQL Database Connection
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

interface memberAdmintoolsInterface {

	// Core Commands ---------------------------------------------------
	public function ImageDisplayAdmintools($UserID, $Type, $Avatar = 0, $Property, $Mode = false, $ViewerNudityMode = 0);
	public function SearchVerify($SearchString, $Property);
	
	
	// Affiliate & Promocode -------------------------------------------
	public function GetAffiliateUser($Mode, $UserID = null);


	// Generic Commands ------------------------------------------------
	//public function GetDataRecords($Property, $Mode, $Limit = null);
	public function GetDataRecords($Property, $ContentType, $Mode = 'multi', $RecordID = null, $Limit = null);
	public function UpdateDataRecord($Property, $DataArray);
	

	// Extended Commands -----------------------------------------------
	

}





// START OF CLASS ======================================================================================================

class memberAdmintools extends member implements memberInterface, memberAdmintoolsInterface{

// PROPERTIES ----------------------------------------------------------------------------

	// external communication ==========================================

	public	$MemberID						= null;
	public	$MemberUsername			= null;
	public	$MemberPassword			= null;
	public	$MembereMail				= null;
	public	$MemberIP						= null;
	public	$MemberAuthorized		= null;



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
		parent::__construct();
	}
	// =================================================================






	// DESTRUCTOR ======================================================
	public function __destruct(){
		parent::__destruct();
	}
	// =================================================================




















	// METHOD :: ImageDisplay ===========================================
	public function ImageDisplayAdmintools($UserID, $Type, $Avatar = 0, $Property, $Mode = false, $ViewerNudityMode = 0){

		$_return					= false;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1, $Property);  //read operation
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
  				echo '<img src="http://'.$Property.'/media/img_microthumb/'.$sql_obj_result->imageid.'-'.$UserID.'.jpg" border="0">';
  			}else{
  				echo '<img src="http://'.$Property.'/common/img/default/50x50-no-added-photo-yet.gif" border="0">';
  			}


  		}elseif($Type == 3){

				if($ViewerNudityMode == 0 && $sql_obj_result->rating == 1){

					// restricted image --------------------
					switch($sql_obj_result->gender){
						case 1:
							echo '<a href="MyStuff"><img src="http://'.$Property.'common/img/default/restricted_300x300_m.jpg" border="0"></a>';
						break;
						case 2:
							echo '<a href="MyStuff"><img src="http://'.$Property.'/common/img/default/restricted_300x300_f.jpg" border="0"></a>';
						break;
					}
					// -------------------------------------
					
				}else{

					if($sql_obj_result){
						echo '<img src="http://'.$Property.'/media/img_profile/'.$sql_obj_result->imageid.'-'.$UserID.'.jpg" border="0">';
					}else{
						echo '<img src="http://'.$Property.'/common/img/default/no-added-photo-yet.jpg" border="0">';	
					}
				}
  			
  		}elseif($Type == 4){
  			echo '<img src="http://'.$Property.'/media/img_gallery/'.$sql_obj_result->imageid.'-'.$UserID.'.jpg">';
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












	// METHOD :: update data records ===================================
	public function UpdateDataRecord($Property, $DataArray){

		$_return					= 666;

		//convert array ------------------------------
		$_contentID			=	$DataArray['contentid'];
		$_contentName		=	$DataArray['parametername'];
		$_contentValue	=	$DataArray['parametervalue'];


		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1, $Property);  //read operation
		// -------------------------------------------

		switch($Property){
			
			case 'freefig.com':
				if($DataArray['command'] == 'update.live'){
					$TableName	=	'content_live';



    			// SEO URL EDIT --------------------------------
    			if($_contentName == 'url' && $_contentValue){

      			// check for existing URL ----------
      			$sql_result			=	mysql_query("SELECT * FROM $TableName WHERE $TableName.$_contentName = '$_contentValue' AND $TableName.id != $_contentID");
      			
      			// if new - insert -----------------
      			if(!mysql_numrows($sql_result) && $_contentValue){
      				if(mysql_query("UPDATE $TableName SET $TableName.$_contentName = '$_contentValue' WHERE $TableName.id = $_contentID")){
      					// report success ----------
      					$_return			= 111;
      					return $_return;
      				}
      			}else{
  						// report duplicate ----------
  						$_return			= 555;
  						return $_return;
  						die();
      			}
      			die();
        	}
       		// -----------------------------------



      		if(mysql_query("UPDATE $TableName SET $TableName.$_contentName = '$_contentValue' WHERE $TableName.id = $_contentID")){
      			

      			// TAG EDIT ------------------------------------
      			if($_contentName == 'tags'){
  
      				$TagsExploded			=	explode(',', $_contentValue);
  
  						// iterate through tags --------------
          		foreach($TagsExploded as $key){
  
          			$_TagToInsert 	= trim($key);
          			$_SlugToInsert 	= trim(str_replace(' ','-',$_TagToInsert));        			
          			
          			// check for existing tag ----------
          			$sql_result			=	mysql_query("SELECT * FROM content_tags WHERE content_tags.contentid = '$_contentID' AND content_tags.tag = '$_TagToInsert'");
          			
          			// if new - insert -----------------
          			if(!mysql_numrows($sql_result) && $_TagToInsert){
          				mysql_query("INSERT INTO content_tags (contentid, tag, tag_slug) VALUES('$_contentID', '$_TagToInsert', '$_SlugToInsert') ");
          			}
          		}
          		// -----------------------------------
      			}
      			// ---------------------------------------------


      			// report success ----------
      			$_return			= 111;
      		}



				// RAW update --------------------------------------
				}elseif($DataArray['command'] == 'update.raw'){
					$TableName	=	'content_raw';

    		if(mysql_query("UPDATE $TableName SET $TableName.$_contentName = '$_contentValue' WHERE $TableName.id = $_contentID")){
    			$_return			= 111;
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













	// METHOD :: get base data records =================================
	public function GetDataRecords($Property, $ContentType, $Mode = 'multi', $RecordID = null, $Limit = null){


		$_return					= false;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1, $Property);  //read operation
		// -------------------------------------------

		switch($Property){
			
			case 'freefig.com':
				
				switch($ContentType){
					case 'live':
						$TableName	=	'content_live';
						$sql_query	= mysql_query("SELECT * FROM $TableName WHERE $TableName.disabled = '0' ORDER BY ts DESC LIMIT $Limit") or die(mysql_error());
					break;

					case 'raw':
						$TableName	=	'content_raw';
						$sql_query	= mysql_query("SELECT * FROM $TableName WHERE $TableName.disapprove = '0' ORDER BY $TableName.title ASC LIMIT $Limit") or die(mysql_error());
					break;					

					case 'clicks':
						$TableName	=	'clicks';
						$sql_query	= mysql_query("SELECT * FROM $TableName WHERE $TableName.itemid = $RecordID ORDER BY tscreated DESC LIMIT $Limit") or die(mysql_error());
					break;
				}

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
		}


	 return $_return;
	}
	// =================================================================
	
	
	
	
	






	// METHOD :: get affiliate user record =============================
	public function GetAffiliateUser($Mode, $UserID = null){

		$_return					= false;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1, 'egenhq.com');  //read operation
		// -------------------------------------------


		// get type ----------------------------------
		switch($Mode){
			
			case 'single':
				$sql_query			= mysql_query("SELECT * FROM user WHERE user.userid = '$UserID' ORDER BY ts_signup DESC") or die(mysql_error());
    		$sql_numrows		=	mysql_num_rows($sql_query);
    
     		// populate result array --------------------
     		while($sql_array_result	=	mysql_fetch_assoc($sql_query)){
     			$ResultArray= $sql_array_result;
     		}
     		// -------------------------------------------
			break;

			case 'all':
				$sql_query			= mysql_query("SELECT * FROM user ORDER BY ts_signup DESC") or die(mysql_error());
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
		}


	 return $_return;
	}
	// =================================================================











	// METHOD :: check searches for results ============================
	public function SearchVerify($SearchString, $Property){

		$_return					= false;

		// database connection -----------------------
		$obj_db						= new db;
		$obj_db->Connect(1, $Property);  //read operation
		// -------------------------------------------


$ResultExploded_SearchString = explode('-',$SearchString);
//print_r($ResultExploded_SearchString);





	$_POST['_gender'] 		= $ResultExploded_SearchString[0];
	$_POST['_zipcode'] 		= $ResultExploded_SearchString[1];
	$_POST['_seeking'] 		= $ResultExploded_SearchString[2];
	$_POST['_interest'] 	= $ResultExploded_SearchString[3];
	$_POST['_agerange'] 	= $ResultExploded_SearchString[4];
	$_POST['_options'];

	if($_POST['_gender'] == 0){
		$_POST['_gender'] = '1';
	}

	if($_POST['_zipcode'] == 0){
		//$_POST['_zipcode'] = '85254';
	}

	if($_POST['_seeking'] == 0000){
		$_POST['_seeking'] = '1111';
	}

	if($_POST['_interest'] == 00000){
		$_POST['_interest'] = '11111';
	}

	if($_POST['_agerange'] == 0000){
		$_POST['_agerange'] = '1899';
	}

	if($_POST['_options'] == 000){
		$_POST['_options'] = '000';
	}





	// capture Browse Region -------------
	$_browseRegion	=	$_POST['_browse'];






/*
!! SELECT CREATOR !!

for($count = 18; $count < 101; $count++){
	echo 'option name="search-agemin" id="search-agemin-'.$count.'" value="'.$count.'">'.$count.'/option <br>';
}
*/

    	#Search-2-85254-1101-110011-1830-110
    	#gender
    	#zip
    	#seeking
    	#interest
    	#age range (from to)
    	#options
			#?_function=member-Search&_gender=$1&_zipcode=$2&_seeking=$3&_interest=$4&_agerange=$5&_options=$6



		
		$__SELECT	=	 null;



		// gender definition -------------------------
		if( $_POST['_gender'] == 1 ){
			//echo 'Male';
			$__SELECT_g1	= "UPS.seek_m = '1' AND ";
		
		}elseif( $_POST['_gender'] == 2 ){
			//echo 'Female';
			$__SELECT_g1	= "UPS.seek_w = '1' AND ";
		
		}elseif( $_POST['_gender'] == 3 ){
			//echo 'Transexual';
			$__SELECT_g1	= "UPS.seek_t = '1' AND ";
		
		}elseif( $_POST['_gender'] == 4 ){
			//echo 'Couples';
			$__SELECT_g1	= "UPS.seek_c = '1' AND ";

		}elseif( $_POST['_gender'] == 5 ){
			//echo 'Groups';
			$__SELECT_g1	= "UPS.seek_g = '1' AND ";
		}
		// -------------------------------------------
		
		$_SELECT_gMASTER	= $__SELECT_g1;
		
		



		// zipcode/geocode definition ----------------
		//$this->GeoCodeLookup($_POST['_zipcode']);
		
		if($_browseRegion){
			$ziparray	=	StateLookup($_browseRegion);
		}else{
			$ziparray = $this->ZIPCodeLookup($_POST['_zipcode'], '1000');
		}
		
		
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

		$_seekingArray	=	str_split($_POST['_seeking']);

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
		$_SELECT_sMASTER	= preg_replace('/[\s]?,[\s]?$/i','',$_SELECT_sMASTER);




		// interested in definition ------------------
		$_interestArray	=	str_split($_POST['_interest']);

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
		if($_POST['_agerange']){

			$_agerangeArray	=	str_split($_POST['_agerange']);

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
		}elseif(!$_POST['_agerange']){
  		$__SELECT_a1	=	628387200;
  		$__SELECT_a2	=	-1927756800;
		}
		// -------------------------------------------




		// options -----------------------------------
		$_optionsArray			=	str_split($_POST['_options']);
		$__SELECT_onlineNow	=	null;

		foreach($_optionsArray as $key => $value){
			//if($key == 0 && $value == 1){ echo 'Online Now';}
			if($key == 0 && $value == 1){
				$online_now							= time() - 240;  // 240 seconds = 4 minutes
				$__SELECT_onlineNow 		= "AND U.ts_lastaction >= '".$online_now."'";
			}
			
			// with images only --------------
			if($key == 1 && $value == 1){
				//echo 'With Photos Only';
				$__SELECT_ProfileWPics 	= "INNER JOIN user_images UI ON UI.userid = U.userid AND UI.avatar = '1'";
			
			// without & with images ---------
			}elseif($key == 1 && $value == 0){
				//echo 'With & Without';
				$__SELECT_ProfileWPics 	= "LEFT JOIN user_images UI ON UI.userid = U.userid AND UI.avatar = '1'";
			}
			
			if($key == 2 && $value == 1){
				//echo 'Verified Photos';
				$__SELECT_ProfileWPics 	= "INNER JOIN user_images UI ON UI.userid = U.userid AND UI.avatar = '1'";
				$__SELECT_VerifiedPics 	= "AND UPS.verified = '1'";
			}
			//if($key == 2){ $verified_photos 	= $value; }
		}
		
		// SELECT TO BE PLACED HERE
		
		// -------------------------------------------









		// Get Record Total --------------------------------------------------------
    $_SELECT_MASTER		=	"
    SELECT count(*)
    FROM user U
    ".$__SELECT_ProfileWPics."
    INNER JOIN user_profile_specs UPS ON ".$_SELECT_gMASTER." UPS.tsdob <= ".$__SELECT_a1." AND UPS.tsdob >= ".$__SELECT_a2." AND
    	(".$_SELECT_iMASTER.")
    	AND UPS.userid = U.userid
    WHERE U.disabled != '1' AND UPS.setting_disable != '1' ".$__SELECT_VerifiedPics." AND U.gender IN (".$_SELECT_sMASTER.") AND U.zipcode IN (".$__SELECT_zMASTER.") ".$__SELECT_onlineNow."
    GROUP BY U.userid ORDER BY U.ts_lastaction DESC
    ";

		$sql_result					= mysql_query($_SELECT_MASTER);
		$sql_num_rows_total	=	@mysql_num_rows($sql_result);
		// -------------------------------------------------------------------------









		// destroy database connection object --------
		$obj_db->Close();
		unset($obj_db);
		// -------------------------------------------


		if($sql_num_rows_total){
			$_return = $sql_num_rows_total;
		}


	 return $_return;
	}
	// =================================================================





// END OF METHODS ------------------------------------------------------------------------


}
// END OF CLASS ========================================================================================================






















?>