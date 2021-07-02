<?php
// syntheticMagic ABS - NAV BAR : TOPNAV =========================================================================================


// --------------------------------------------------------------------------------------------------------------------------------
// Author: 	Nathaniel Adam Briggs @ 2008
// Contact:	accounts@syntheticmagic.com
// Owner:		eGenerations Network, Inc. | syntheticMagic Advanced Business Services
// Client:	SM Clients
// Class:		N/A
// Version:	Release 4.x
// Method:	example()
// Purpose:	Handle all Core Navigation Operations
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








//$mtime = mktime(0-$tz,0,0,$t['mon'],$t['mday'],$t['year']);
//header('Last-Modified: '.date('D, d M Y H:i:s', $mtime).' GMT');
# Expires time is 1s to next midnight (local time)
//$etime = mktime(23-$tz,59,59,$t['mon'],$t['mday'],$t['year']);
//header('Expires: '.date('D, d M Y H:i:s', $etime).' GMT');
//header('Expires: Thu, 15 Apr 2011 20:00:00 GMT');
//header('Last-Modified: Sat, 3 Jan 2010 00:00:00 GMT');			// IE6 ERR
//header('Expires: Thu, 15 Apr 2010 20:00:00 GMT');						// IE6 ERR
//ob_start('ob_gzhandler');







// get URI base component ----------------------------------
$URI_exploded = explode('-',$_SERVER['REQUEST_URI']);






// error header ------------------------
require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/inc/inc.error_header.php');


// class.member - member class -----------------------------
require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/class.unlimiCore.php');

// extended functions per property class -------------------
require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/ext.class.unlimiCore.'.$_SERVER['SERVER_NAME'].'.php');


// class.utils - utilities class ---------------------------
require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/class.utils.php');


// session & cookie checker ================================
//include 'common/inc/inc_mbr.php';

// db conn
//include 'common/inc/db.php';

//phpMailer
//require('common/class/class.phpmailer.php');

// country converter
include '/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/func/countryconv.php';

// id2sn
include '/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/func/id2sn.php';

// addPoints_PointSystem
//include 'common/func/addPoints_PointSystem.php';

// time_passed
include '/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/func/time_passed.php';

// word_limited
include '/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/func/word_limiter.php';





  // -------------------------------------------------------
  $obj_Member						=	new EXT_unlimiCore;
  $obj_Member->Initiate('Create', $_SERVER['SERVER_NAME']);
	// -------------------------------------------------------







	// COOKIE = TRUE -------------------------------
  if( ($_COOKIE['login'] && $_COOKIE['pass']) && ($obj_Member->Decrypt($_COOKIE['ip'], 'public') == $_SERVER['REMOTE_ADDR']) && ($_COOKIE['expires'] > time()) ){


  	$_SESSION['ActiveUser']['email_addr'] 	= $_COOKIE['login'];
  	$_SESSION['ActiveUser']['password'] 		= $_COOKIE['pass'];
  	//$_SESSION['ActiveUser']['remember_me'] 	= $_GET['remember_me'];
  	$_SESSION['ActiveUser']['remember_me'] 	= true;
  	

  	$obj_Member->Authenticate($_SESSION['ActiveUser']);

  // COOKIE = FALSE ------------------------------
  }else{
  	
  	$_SESSION['ActiveUser']['remember_me'] 	= false;
  	
  	$obj_Member->Authenticate($_SESSION['ActiveUser']);	


  }
  // -------------------------------------------------------













  // -------------------------------------------------------
	$obj_db					= new db;
	$obj_db->Connect(0); //write operation
  // -------------------------------------------------------


  // -------------------------------------------------------
	$obj_Utils			= new Utils;
  // -------------------------------------------------------


















  // browser detection II ====================================
  	
  $usragent = $_SERVER['HTTP_USER_AGENT'];

 	
  	
  	// safari --------------------------
  	if( eregi("safari", $usragent) ){
  		$_SESSION['browsermsie']= 4;
			header('Last-Modified: Sat, 3 Jan 2010 00:00:00 GMT');			// IE6 ERR
			header('Expires: Thu, 15 Apr 2010 20:00:00 GMT');						// IE6 ERR
  	
  	
  	// webtv ---------------------------
  	}elseif( eregi("webtv", $usragent) ){
  		$_SESSION['browsermsie']= 3;
			header('Last-Modified: Sat, 3 Jan 2010 00:00:00 GMT');			// IE6 ERR
			header('Expires: Thu, 15 Apr 2010 20:00:00 GMT');						// IE6 ERR

  		
  	// firefox -------------------------
  	}elseif( eregi("Firefox", $usragent) ){
 			$_SESSION['browsermsie']= 6;

/*
  		//FF3 ----------------------------
  		if(eregi("3.0", $usragent)){
  			$_SESSION['browsermsie']	= 6;
  			header('Last-Modified: Sat, 3 Jan 2010 00:00:00 GMT');			// IE6 ERR
				header('Expires: Thu, 15 Apr 2010 20:00:00 GMT');						// IE6 ERR
  		}else{
	 			$_SESSION['browsermsie']	= 2;
  			?> 
  				<script>
  					//alert('Upgrade Your Browser to Version 3.0 or Later'); 
  					window.location="UpgradeBrowser"; 
  				</script>
  			<?
    	}

*/

  	// msie ----------------------------
  	}elseif( eregi("msie", $usragent) ){
  		//echo 'MSIE<br>';
  		//echo $_SERVER['HTTP_USER_AGENT'];
  		//die();
  		$_SESSION['browsermsie']= 1;
  		
			//msie 9.0 or else
			if(eregi("msie 9", $usragent)){
				$_SESSION['browsermsieversion']	= 1;
			header('Last-Modified: Sat, 3 Jan 2010 00:00:00 GMT');			// IE6 ERR
			header('Expires: Thu, 15 Apr 2010 20:00:00 GMT');						// IE6 ERR
			}else{
				$_SESSION['browsermsieversion']	= 1;
				?>
					<script>
						alert('Upgrade Your Browser to Version 9.0 or Later');
						window.location="UpgradeBrowser";
					</script>
				<?

  /*
  			//ALERT SYSTEM ===============================================
  			$_SESSION['browsermsieversion']= 0;
  			
  			$alert_userid	= $_SESSION['userid'];
  			$alert_type		=	'IEUPGRADE';
  			$alert_msg		=	'Upgrade to Internet Explorer 7.0 To View Properly <br> <a href="http://www.microsoft.com/windows/downloads/ie/getitnow.mspx">Click Here to Upgrade FREE</a>';
  
  			// check for previous alert
  			$sql_chkalert = mysql_query("SELECT alerts.alert FROM alerts WHERE alerts.userid = '$alert_userid' AND alerts.type = '$alert_type'") or die (mysql_error());
  			$num_chkalert	=	mysql_numrows($sql_chkalert);
  			
  				// alert if doesnt exist
  				if($num_chkalert == 0){
  					mysql_query("INSERT INTO alerts (userid, type, alert) VALUES('$alert_userid', '$alert_type', '$alert_msg') ") or die (mysql_error());		
  				}
  */
  
  		}
  
  	// google adsense crawler ----------
  	}elseif( eregi("Google", $usragent) ){
  		$_SESSION['browsermsie']= 5;
  	}
  // =========================================================
  
  
  
  
  
   
  // Settings ================================================
  $navpresent	=	true;
  
  
  
  //MENU SETTING =============================================
  if($_GET['menutype']==1){
  	$_SESSION['menutype']=1;
  }elseif($_GET['menutype']==2){
  	$_SESSION['menutype']=2;
  }
  
  //MAGNIFIER SETTING
  if($_GET['mag']==1){
  	$_SESSION['mag']=1;
  }elseif($_GET['mag']==2){
  	$_SESSION['mag']=2;
  }
  // =========================================================




  /*
  // Exit Chat ===============================================
  	if($_GET['ec'] == 1){
  		$chatuserid	= $_SESSION['userid'];
  		mysql_query("UPDATE online SET online.chatactive = 0 WHERE online.userid = '$chatuserid'");
  	}
  // =========================================================	
  */
  
  
  
  
  
  
  // general function - !! insert into a general include later
  function clean_url($text){ 
  	$text	=	strtolower($text);
  	$code_entities_match = array(' ','-','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','.','/','*','+','~','`','='); 
  	$code_entities_replace = array('-','-','','','','','','','','','','','','','','','','','','','','','','','',''); 
  	$text = str_replace($code_entities_match, $code_entities_replace, $text); 
  	return $text; 
  }
  // =========================================================




	// Set Online Activity =====================================

			//$ipaddress 			= $_SERVER['REMOTE_ADDR'];
			//$_SESSION['lastactive'] = time();																																													DEP.n8.FNF
			//$ipaddress	 		= $_SESSION['ip'];																																												DEP.n8.FNF
			//$lastactive 		= $_SESSION['lastactive'];																																								DEP.n8.FNF
		
			//$auserid				= $_SESSION['userid'];																																										DEP.n8.FNF
			//mysql_query("UPDATE online SET ip='$ipaddress', lastactive='$lastactive' WHERE userid='$auserid'");												DEP.n8.FNF


			// site active
			//define ('TIMEOUT', 15);																																																		DEP.n8.FNF
			//$inactive = time()-(60*TIMEOUT);																																													DEP.n8.FNF
			//mysql_query("UPDATE online SET lastactive=0 WHERE lastactive < '$inactive'");																							DEP.n8.FNF


			// chat active
			//define ('TIMEOUTC', 2);																																																		DEP.n8.FNF
			//$inactive2 = time()-(60*TIMEOUTC);																																												DEP.n8.FNF


			
			// ! Whats this crap?
			
			// "Leaves Room" entry into Chat Room
			//$sql_chatinactive = mysql_query("SELECT users.userid, users.username FROM users, online WHERE users.userid=online.userid AND online.chatactive < '$inactive2' AND online.chatactive != 0 ",$connection);
			//$numinactive			=	mysql_numrows($sql_chatinactive);


/*
			if(!$sql_chatinactive){
				//do nothing
			}else{

				$count=0;
				while($count < $numinactive){

					$posttime = time();
					$topicid 	= $_SESSION['topicid'];
					//$chatinac_username=	mysql_result($sql_profiledata,$count,"users.username");
					//$chatinac_userid	=	mysql_result($sql_profiledata,$count,"users.userid");
					//$speak		=	'<b>'.$chatinac_username.' Leaves the Room</b>';
			
					//mysql_query("INSERT INTO chat (user, userid, msg, time, topicid) VALUES('$chatinac_username', '$chatinac_userid', '$speak', '$posttime','$topicid' ) ") or die (mysql_error());
					//mysql_query("UPDATE online SET chatactive=0 WHERE online.chatactive < '$inactive2' AND online.userid='$chatinac_userid'");
					mysql_query("UPDATE online SET chatactive=0 WHERE online.chatactive < '$inactive2'");
				$count++;		
					
				}
			}
*/
// =========================================================





/*
  // Check for New / Unread Mail -----------------------------------------------------------------------------------------------
  $MailOwnerID 	= $_SESSION['ActiveUser']['userid'];
  $sql_query 		= mysql_query("SELECT user_mail.r FROM user_mail WHERE user_mail.ownerid = '$MailOwnerID' AND user_mail.r = '0' AND bin = '0'") or die (mysql_error());
  $newmailcount	= mysql_numrows($sql_query);
*/











// get members per group ===================================
  //$sql_grpbelong 	= mysql_query("SELECT groupmember.groupid, groupmember.mbrid, groups.title FROM groupmember, groups WHERE groupmember.mbrid='$mailownerid' AND groups.groupid=groupmember.groupid") or die (mysql_error());
  //$numgrpbelong		=	mysql_numrows($sql_grpbelong);
// =========================================================










		
// end top code block -------------------------------------------------------------------------------------








switch($_GET['_function']){
	
	// myhome ------------------
	case 'member-Home';
		$pageid			= 1;
	break;
	// -------------------------

	// search ------------------
	case 'member-Search';
		$pageid			= 2;
	break;
	// -------------------------	

	// online now --------------
	case 'member-OnlineNow';
		$pageid			= 3;
	break;
	// -------------------------

	// new faces ---------------
	case 'member-NewFaces';
		$pageid			= 4;
	break;
	// -------------------------

	// my friends --------------
	case 'member-MyFriends';
		$pageid			= 5;
	break;
	// -------------------------

	// help --------------------
	case 'member-Help';
		$pageid			= 6;
	break;
	// -------------------------
}





// titletag checker / set ======================================================
if( isset($title_tag_set) == 0 ){
	$title_tag_master = 'unlimiCore &trade; | Business Intelligence System';
}else{

	// Drug Information SEO Strategy ---------------------------	
	if( $pageid == 5 ){
		$title_tag_master = $title_tag_set;	
	// All Other Pages Prefixed with "eGenerations" ------------
	}else{
		$title_tag_master = 'unlimiCore &trade; | Business Intelligence System - '.$title_tag_set;
	}
}
// =============================================================================




// description checker / set ===================================================
if( isset($desc_tag_set) == 0 ){
	$desc_tag_master = 'unlimiCore &trade; | Business Intelligence System';
}else{
	$desc_tag_master = $desc_tag_set;
}
// =============================================================================








	header("Expires: 0");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("cache-control: no-store, no-cache, must-revalidate");
	header("Pragma: no-cache");
?>


<!DOCTYPE HTML>


  <title><? echo $title_tag_master; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta HTTP-EQUIV="Pragma" CONTENT="no-cache" />
	<META HTTP-EQUIV="Expires" CONTENT="-1" />
  <meta name="description" content="<? echo $desc_tag_master; ?>" />
  <meta name="KEYWORDS"	content="<? echo $keyw_tag_set; ?>" />
  <meta name="copyright" content="Copyright &copy; by unlimiCore - All rights reserved" />
  <meta http-equiv="Author" name="syntheticMagic | Advanced Business Services" content="<? echo $_SERVER['SERVER_NAME']; ?>" />
  <meta http-equiv="Reply-to" content="management@<? echo $_SERVER['SERVER_NAME']; ?>" />
  <!-- <meta name="verify-v1" content="k1yS/o7qZEAYdj2ro61GlVbb06a0f/rCX5XECUnJf9g=" /> -->
  <meta name="ROBOTS" content="ALL" /> 
  <meta name="Rating" content="General" /> 
  <meta name="doc-class" content="Living Document" />
  <meta name="MSSmartTagsPreventParsing" content="true" />
  <link rel="SHORTCUT ICON" HREF="favicon.ico" />



  
  <!-- submitButtons css -->
  <!-- APPENDED >> submitButtons.css -->
  
  <link rel="stylesheet" type="text/css" href="/common/css/base.css" />

  <!-- navbar css -->
  <?
/*
      // IE8.0, FF3 Supportive CSS ====================================
      if($_SESSION['browsermsie'] == 6){
      	?>
      		<!-- SPECIAL FF3 & IE8 navbar css -->
      		<link rel="stylesheet" href="/common/css/navbar/ie8_ff3_core.css?rev=1.1" type="text/css" media="all" />
      	<?
      // IE6.0, 7.0, FF2 Supportive CSS ====================================
      }else{
      	?>
      		<!-- Standard navbar css -->
      		<link rel="stylesheet" href="/common/css/navbar/core.css?rev=1.1" type="text/css" media="all" />
      	<?
      }
*/
  ?>


<link rel="stylesheet" href="/common/css/navbar/core.css" type="text/css" media="all" />



<!-- SM CSS lib -->
	<? echo '<link rel="stylesheet" type="text/css" href="http://'.$_SERVER['SERVER_NAME'].'/common/css/SM.forms/SM.css.FORMS.css" />'; ?>
<!-- END SM CSS lib -->



  <!-- submit buttons css -->
  <!-- <link rel="stylesheet" href="/common/css/submitButtons.css" type="text/css" media="all" /> -->

  <!-- subpage core css -->
  <!-- <link rel="stylesheet" href="/common/css/subpage/core.css?rev=1.1" type="text/css" media="all"/> -->
<?
/*
 																																																																											//DEP01.02.08.NAB
  <!-- core text css -->
  <link rel="stylesheet" href="http://egenerations.com/common/css/connect/fonts.css?rev=1.1" type="text/css" media="all">
  
  <!-- standard buttons -->
  <link rel="stylesheet" href="http://egenerations.com/common/css/submitButtons.css?rev=1.1" type="text/css" media="all"/>
  
	<!-- advertising css -->
	<link rel="stylesheet" href="http://egenerations.com/common/css/ads/advertising.v2.css?rev=1.1" type="text/css" media="all">  
*/
?>

  <!-- SM.js.lib -->
  <script type="text/javascript" src="/common/js/compile/final.uncompressed.js"></script>




  <!-- Font Size Changer -->
  <!-- <script type="text/javascript" src="common/js/textsizer.js"></script> -->
  
  <!-- AutoTab Util -->
  <!-- <script type="text/javascript" language="JavaScript" src="http://egenerations.com/common/js/autotab.js"></script> -->

  	
	<!--
		<script src="/common/js/scriptaculous/prototype.js" type="text/javascript"></script>
 		<script src="/common/js/scriptaculous/scriptaculous.js" type="text/javascript"></script>
		<script src="/common/js/scriptaculous/modalbox.js" type="text/javascript"></script>
		<link rel="stylesheet" href="/common/js/scriptaculous/modalbox.css" type="text/css" media="screen" />	
	-->


  	<?
  		// GreyBox ===========================================================================================================================
  		// DONT LOAD IF @ SignUp Page OR on HOME Page and NOT LOGGED IN

  		//if( (strtolower($_SERVER['REQUEST_URI']) != '/signup') || (strtolower($_SERVER['REQUEST_URI']) != '/home' || $obj_Member->MemberAuthorized == false) ){
  		//if( (strtolower($URI_exploded[0]) != '/signup') || (strtolower($URI_exploded[0]) != '/home' || $obj_Member->MemberAuthorized == false) ){
  	?>
	     	<!-- Greybox Code-->
      	<link rel="stylesheet" href="/common/js/greybox/gb_styles.css" type="text/css" media="all"/>
      	
      	<script type="text/javascript">
      		var GB_ROOT_DIR = "/common/js/greybox/";
      	</script>
        <script type="text/javascript" src="/common/js/greybox/AJS.js"></script>
        <script type="text/javascript" src="/common/js/greybox/AJS_fx.js"></script>				
      	<script type="text/javascript" src="/common/js/greybox/gb_scripts.js"></script>
        <!-- <script type="text/javascript" src="/common/js/greybox/window.js"></script> -->
    <?
   		//}
   		// END yahooUI =====================================================================================================================
   	?>



		<?
  		if($obj_Member->MemberAuthorized == true){
		?>

			<!-- kampyle code was here -->

    <?
    	}
    ?>












<body style="marginheight: 0; marginwidth: 0; leftmargin: 0; rightmargin: 0; topmargin: 0;" >








<?
/*
  // get promocode from inbound visitor ====================================================
  if( $obj_Member->FilterRawInput($_GET['promocode']) && ($obj_Member->PromocodeLookup($obj_Member->FilterRawInput($_GET['promocode']))) ){
  	$_SESSION['NewUser']['promocode'] = $obj_Member->FilterRawInput($_GET['promocode']);
  
  }else{
  	// non-referred new affiliate ========================================================
  	$_SESSION['NewUser']['promocode'] = '0fac083331d240004c16f4521145064b';
  }
*/
?>








<header>
<head>

<div id="nav_navbarcontainer">

	<?
		// Header Mode - Centered ------------------------------
		if($_SESSION['ActiveUser']['config_modes']['header_mode'] == 'centered'){
			?> <div id="nav_centerBarPanel" style="position: relative; z-index: 200; width: 960px; height: 61px; top: 0px; border-left: 0px solid #fff; margin: 0 auto;"> <?
		}
	?>






  <?
  	// if NOT logged in, use 61PX Nav Header ---------------
  	if($obj_Member->MemberAuthorized == false){
  ?>
  
  <style>
  #nav_navbarcontainer {
    position:					fixed;
    top:							0;
    left:							0;
    margin:						0;
    padding:					0;
    z-index:					10;
    width: 						100%;
    height: 					61px;
    border: 					0px solid #ffffff;
    border-bottom:		0px solid;
    /* background:				url(/common/img/tb/tb-r4-orange.jpg); */
    background-repeat:no-repeat;
    background-color: #333333;
   }	
  	</style>
  <?
  	// if LOGGED in, use 91PX Nav Header -------------------
  	}else{
  ?>
  
  <style>
  #nav_navbarcontainer {
    position:					fixed;
    top:							0;
    left:							0;
    margin:						0;
    padding:					0;
    z-index:					10;
    width: 						100%;
    height: 					91px;
    border: 					0px solid #ffffff;
    border-bottom:		0px solid;
    /* background:				url(/common/img/tb/tb-r4-orange.jpg); */
    background-repeat:no-repeat;
    background-color: #333333;
   }	
  	</style>
  <?
  	}
  ?>

	<div id="nav_controlcontainer" >
					
					<!-- globally available hidden input with private userid -->
					<input type="hidden" id="_userid_private" value="<? echo ($_SESSION['ActiveUser']['userid'] ? $obj_Member->Encrypt($_SESSION['ActiveUser']['userid'], 'private'):'no_value'); ?>" />


        	<?
        		// Landing page ====================================================================================================================================
        		if($obj_Member->MemberAuthorized == false && (strtolower($URI_exploded[0]) == '/myhome' || strtolower($URI_exploded[0]) == '/affiliates' || strtolower($URI_exploded[0]) == '/home' || strtolower($URI_exploded[0]) === '/' || strtolower($URI_exploded[0]) === '/promocode')){
        	?>

						<div id="buttoncontainer" style="position: absolute; top: 12px; left: 10px; border: 0px solid #ffffff; width: 165px; height: 40px; cursor: pointer; z-index: 800;" onclick="Goto_Page('Signup')"></div>

<!--
						<div style="cursor: pointer; position: absolute; width: 60px; height: 32px; border: 0px solid #ffffff; top: 25px; left: 158px; z-index: 900;" onclick="SignUp_Goto()">
								<img src="common/img/icons/text.itsfree.png" border="0" />
						</div>
-->



					<?
						// New Member SignUp Form ==========================================================================================================================
						}elseif($obj_Member->MemberAuthorized == false && strtolower($URI_exploded[0]) == '/signup'){
					?>
<!--
						<div style="position: absolute; top: 14px; left: 12px; border: 0px solid #ffffff; cursor: pointer;" onclick="SignUp_Goto()">
							<font class="typewhite22" style="color: #ffffff;" onclick="SignUp_Goto()">New?</font>
						</div>

						<div id="buttoncontainer" style="position: absolute; top: 10px; left: 80px; border: 0px solid #ffffff; width: 120px; height: 38px; cursor: pointer; z-index: 800;" onclick="SignUp_Goto()"></div>

						<div style="cursor: pointer; position: absolute; width: 60px; height: 32px; border: 0px solid #ffffff; top: 25px; left: 158px; z-index: 900;">
							<img src="common/img/icons/text.itsfree.png" border="0" />
						</div>
-->
					<?
						// Existing Member =================================================================================================================================
						}elseif($obj_Member->MemberAuthorized == true){
					?>
							<!-- <div id="nav_mbricon"></div> -->
					<?
						}
					?>








<?
  // authenticated user ============================================================================
  if( $obj_Member->MemberAuthorized == true ){
		$_AUTHENT_UserName		=	'<font style="font-size: 12px;" color="#53ddff">'.$_SESSION['ActiveUser']['username'].'</font>';
		$_AUTHENT_UsereAddr		=	'<font style="font-size: 12px;" color="#53ddff">'.$_SESSION['ActiveUser']['email_addr'].'</font>';
		$_AUTHENT_CompanyName	=	'<font style="font-size: 12px;" color="#53ddff">'.$_SESSION['ActiveUser']['organization_name'].'</font>';
		$_AUTHENT_ManagerName	=	$obj_Member->GetUsersManager($_SESSION['ActiveUser']);
		$_AUTHENT_ManagerName	=	'<font style="font-size: 12px;" color="#53ddff">'.$_AUTHENT_ManagerName['first_name'].' '.$_AUTHENT_ManagerName['last_name'].'</font>';
		$_AUTHENT_UserType		=	'<font style="font-size: 12px;" color="#53ddff">'.ucwords($_SESSION['ActiveUser']['user_type']).'</font>';
		
		
		
?>
			<div id="account" style="position: absolute; top: -3px; left: 5px; width: 400px; height: 60px; border: 0px solid #f00; text-align: left; align: center; z-index: 10; color: #fff; font-size: 10px;">
				<table border=0 cellpadding=0 cellspacing=0>
					<tr>
						<td><font color="#ffffff" size="1">Authentication:</font></td>
						<td width="20"></td>
						<td><font color="#b3ff75"><? echo $_AUTHENT_UserName; ?></font></td>
					</tr>
					<tr>
						<td><font color="#ffffff" size="1">Organization:</font></td>
						<td width="20"></td>
						<td><font color="#b3ff75"><? echo $_AUTHENT_CompanyName; ?></font></td>
					</tr>
					<tr>
						<td><font color="#ffffff" size="1">
							<? 
								// determine "manager" moniker -------------
								switch($_SESSION['ActiveUser']['user_type']){
									
									case 'sales':
										$__ManagerMoniker	=	'Team Leader:';
									break;

									case 'client':
										$__ManagerMoniker	=	'Agent:';
									break;

									case 'finance':
										$__ManagerMoniker	=	'Manager:';
									break;

									case 'admin':
										$__ManagerMoniker	=	'Manager:';
									break;

									case 'management':
										$__ManagerMoniker	=	'Manager:';
									break;

									default:
										$__ManagerMoniker	=	'==========';
									break;
								}
							
								echo $__ManagerMoniker;
							?></font></td>
						<td width="20"></td>
						<td><font color="#b3ff75"><? echo $_AUTHENT_ManagerName; ?></font></td>
					</tr>
					<tr>
						<td><font color="#ffffff" size="1">Access Level:</font></td>
						<td width="20"></td>
						<td><font color="#b3ff75"><? echo $_AUTHENT_UserType; ?></font></td>
					</tr>
				</table>
			</div>
<?


	// non-authenticated user ========================================================================
	}else{
		//$greeting	=	'<br><a href="https://'.$baseurl.'/signup"><font class="typewhite22">Sign-Up</font></a>&nbsp;<font class="typewhite22"><b>|</b></font>&nbsp;<a href="http://'.$baseurl.'/login_form.php"><font class="typewhite22">Login</font></a>';
		//$greeting	=	'<br/><a href="signup" rel="gb_page_center[750, 500]"><font class="typewhite22">Sign-Up</font></a>&nbsp;<font class="typewhite22"><b>|</b></font>&nbsp;<a href="login" rel="gb_page_center[550, 300]"><font class="typewhite22">Login</font></a>';

		// Scriptaculous Middle Window ---------------
		//$greeting	=	'<br/><a href="Signup"><font class="typewhite22">Sign-Up</font></a>&nbsp;<font class="typewhite22"><b>|</b></font>&nbsp;<a href="Login" rel="gb_page_center[600, 180]"><font class="typewhite22">Login</font></a>';

		// JQuery ------------------------------------
		//$greeting	=	'<br/><a href="Signup"><font class="typewhite22">Sign-Up</font></a>&nbsp;<font class="typewhite22"><b>|</b></font>&nbsp;<a href="javascript:login();"><font class="typewhite22">Login</font></a>';

		// Sign-up|Login -----------------------------
		//$greeting	=	'<br/><a href="Signup"><font class="typewhite22" style="color: #ffe0a4;">Get Started!</font></a>';							// dep.02.28.09.NAB
		//$greeting	=	'<div style="position: absolute; top: 16px; left: -20px; border: 1px solid #ffffff; cursor: pointer;" onclick="SignUp_Goto()"><font class="typewhite22" style="color: #ffffff;" onclick="SignUp_Goto()">New?</font></div> <div style="cursor: pointer; position: absolute; width: 60px; height: 32px; border: 1px solid #ffffff; top: 22px; left: 108px; z-index: 900; z-index: 999;"><a href="Signup"><img src="common/img/icons/text.itsfree.png" border="0" /></a></div><div id="buttoncontainer" style="position: absolute; top: 6px; left: 40px; width: 160px; height: 100px; cursor: pointer; z-index: 800;" onclick="SignUp_Goto()"></div>';
	}
?>





<!--
     		<div id="nav_mbrgreeting">
					<? 
						//echo $greeting; 
					?>
					<? /*
          <script>
            function login(){
		          Modalbox.show('<div id=\'login_panel\' style=border: 1px solid #ffffff; width: 100px; height: 100px;></div>',
            {	
            	title: 	"",
            	width: 	500,
            	height: 400
            	});
            }
          </script>
					*/ ?>
     		</div>
-->



<!--
     		<div id="nav_mbrstatus_VIP">
         <? 
         	if($obj_Member->MemberAuthorized == true){
	         	$_MemberStatus = $obj_Member->GetStatus_R2($_SESSION['ActiveUser']['userid']);

          	// Free Subscription/Member (NON-PAYING) -------
          	if($_MemberStatus['product_name'] == 'Free Member [UPGRADE]'){
          		echo '<font style="font-size: 10px; color: #000; position: absolute; top: 0px; padding: 0 0 0 0; margin: 0 0 0 0; text-decoration: none;">Affiliate</font>';
          	
          	// Normal Paid Subscription --------------------
          	}else{
          		echo '<font style="font-size: 10px; color: #000; position: absolute; top: 0px; padding: 0 0 0 0; margin: 0 0 0 0;">'.ucwords($_MemberStatus['product_name']).'</font>';
          	}
        	}
         ?>
     		</div>


     		<div id="nav_mbrstatus_VERIFIED_PHOTOS" >
         <? 
          //echo ($obj_Member->GetStatus($_SESSION['ActiveUser']['userid'], 'special') == true ? 'VIP':'');
          echo ($_SESSION['ActiveUser']['verified'] == true ? '<img src="common/img/icons/icon_verified_photos.png">':'');
         ?>
     		</div>

-->



     

	</div>





     				<?

     					//if($obj_Member->MemberAuthorized == false && (strtolower($URI_exploded[0]) == '/myhome' || strtolower($URI_exploded[0]) == '/affiliates' || strtolower($URI_exploded[0]) == '/home' || strtolower($URI_exploded[0]) == '/' || strtolower($URI_exploded[0]) === '/promocode')){
     					if($obj_Member->MemberAuthorized == false){
    						$_SESSION['ActiveUser']['loginToken'] = md5(uniqid(rand(), true));
     				?>

							<!-- login  -->
     						<div id="nav_mbrlogin" style="position: absolute; border: 0px solid #ffffff; width: 450px; height: 45px; left: 0px; top: 12px; z-index: 999; text-align: right;">
                 <form action="execute" method="post" enctype="multipart/form-data" name="member-Authenticate" id="member-Authenticate">

									<div id="nav_mbrlogin_emailaddr" style="position: absolute; border: 0px solid #ffffff; width: 150px; height: 22px; left: 65px; top: 0px; z-index: 999; text-align: left; margin: 0; padding: 0;">
										<input type="text" size="20" maxlength="35" style="border: 1px solid #781351;" id="signin_emailaddress" autocomplete="off" tabindex="1" value="Email" onclick="clickclear(this, 'Email')" onfocus="clickclear(this, 'Email')" onblur="clickrecall(this,'Email')" />
									</div>

									<div id="nav_mbrlogin_emailaddr" style="position: absolute; border: 0px solid #ffffff; width: 150px; height: 22px; left: 220px; top: 0px; z-index: 999; text-align: left; margin: 0; padding: 0;">
										<input type="text" size="20" maxlength="15" style="border: 1px solid #781351; display: inline;" id="signin_passwordF" autocomplete="off" tabindex="2" value="Password" onclick="clickclear(this, 'Password')" onfocus="clickclear(this, 'Password'); hideThis('signin_passwordF');" onblur="clickrecall(this,'Password')" />
										<input type="password" size="20" maxlength="15" style="border: 1px solid #781351; display: none;" id="signin_password" autocomplete="off" tabindex="2" value="" onkeypress="return onEnter(event,this.form);" />
									</div>

                 	<input type="hidden" value='member-Authenticate' name="_function" id="_function" />
                 	<input type="hidden" value="<? echo $_SESSION['ActiveUser']['loginToken']; ?>" id="signin_authenticationToken" />
                 	<input type="button" id="login" tabindex="4" value="Sign-In" onclick="AuthenticateUser()" style="position: absolute; left: 370px; top: 0px; height: 20px; font-size: 9pt; color: #000; border: 1px solid #781351; background: #ffc000;" />

									<div id="nav_mbrlogin_recall" style="position: absolute; border: 0px solid #ffffff; width: 15px; height: 14px; left: 218px; top: 22px; z-index: 999; text-align: left; margin: 0; padding: 0;">
										<input type="checkbox" size="20" maxlength="15" id="signin_remember_me" autocomplete="off" />
									</div>

									<div id="nav_mbrlogin_recall" style="position: absolute; border: 0px solid #ffffff; width: 155px; height: 14px; left: 240Px; top: 24px; z-index: 999; text-align: left; margin: 0 0 0 0; padding: 0 0 0 0; color: #ffb400; font-size: 8pt;">
									auto login &nbsp;<font color="white">(<i>skips this page</i>)</font>
									</div>

									</form>
     						</div>

							<!-- END login  -->
     				<?
     					}elseif($obj_Member->MemberAuthorized == false && (strtolower($URI_exploded[0]) == '/signup')){

     						?>
									<!-- login  -->
     								<div id="nav_ev_ssl_statement" style="position: absolute; border: 0px solid #ffffff; width: 376px; height: 48px; left: 290px; top: 0px; z-index: 999; text-align: left;">
											<!-- <img src="common/img/special/ev-ssl-green-bar.jpg" /> -->
     								</div>
     						
     						<?
     					}
     				?>



<?
/*
CODE NOT NEEDED FOR EGENHQ AFFILIATES
		<!-- mail status icon  -->
     		<div id="nav_mbrmymail">
     
     				<?
     					if($obj_Member->MemberAuthorized == true){ 
     				?>
     					<a href="http://<? echo $_SERVER[HTTP_HOST]; ?>/MyMail"><? if($obj_Member->CheckMemberMail($_SESSION['ActiveUser']['userid'], 'checkonly', 'unread') > 0){ ?> <img src="/common/img/tb/tb-2ANI.gif" title="Check Your Mail Here" width="62" height="58" border="0" /></a> <? }else{ ?> <img src="/common/img/tb/tb-r4.mymail-icon.jpg" title="Check Your Mail Here" width="62" height="58" border="0" /></a> <?}?>
     				<?
     					}
     				?>
     		</div>
		<!-- END mail status icon  -->
*/
?>




		<!-- add picture  -->
 				<?
     			if($obj_Member->MemberAuthorized == true){
     				echo '<div id="nav_mbraddcontent">';
 						//<!-- <a href="addpicture"><img src="http://egenerations.com/common/img/tb/tb-r4.mymail-icon.jpg" alt="Add A Picture" width="62" height="58" border="0" /></a> -->
     				echo '</div>';
     			}
     		?>
		<!-- END add picture  -->





		<!-- upgrade badge -->
 				<?
/*
     			if( ($obj_Member->MemberAuthorized == true && $obj_Member->MemberPaid == false) ){
     				echo '<div id="nav_mbrupgrade">';
 						echo '<a href="https://'.$_SERVER[HTTP_HOST].'/Upgrade"><img src="/common/img/upgrade/badge-nav-bar-upgrade.png" border="0"> <!-- <img src="http://egenerations.com/common/img/tb/tb-r4.mymail-icon.jpg" alt="Upgrade Account" width="62" height="58" border="0" /> --></a>';
						echo '</div>';
 					}
*/
 				?>
		<!-- upgrade badge -->





<?
/*
CODE NOT NEEDED FOR EGENHQ AFFILIATES
		<!-- avatar image -->
 				<?
 					if($obj_Member->MemberAuthorized == true){
						echo '<div id="nav_avatar_img" style="position: absolute; z-index: 300; border: 1px solid #ffffff; height: 50px; width: 50px;  left: 350px; top: 5px; cursor: pointer;" title="Add Photos & Edit Profile" onclick="location.href=\'http://'.$_SERVER[HTTP_HOST].'/MyProfile\'">';
							//$obj_Member->ImageDisplay($_SESSION['ActiveUser']['userid'], 2, 1);
						echo '</div>';
 					}
 				?>
		<!-- END avatar image -->
*/
?>






		<!-- day performance -->
				<?
					if($obj_Member->MemberAuthorized == true && $_SESSION['ActiveUser']['user_type'] == 'sales'){

				?>
					<div id="nav_current_setting_instantmessenger" style="position: absolute; border: 0px solid #ffffff; width: 260px; height: 55px; top: 0px; left: 425px;">


            <?
	           	// get performance data ------------------------------------------
            	$Performance_Today_ARRAY	=	$obj_Member->Get_SalesPerson_NavBoard_Today($_SESSION['ActiveUser']['userid']);
            ?>


						<div id="nav_current_performance_label" style="position: absolute; z-index: 100; border-left: 1px solid #ffffff; border-right: 1px solid #ffffff; width: 14px; height: 60px; top: -1px; left: -20px;">
							<img src="/common/img/navbar/label.today.png" />
						</div>

						<div id="nav_current_performance_impressions" style="position: absolute; border: 0px solid #ffffff; width: 160px; height: 15px; top: 0px; left: 0px;">
							<table cellpadding="0" cellspacing="0" border=0>
								<td width="90"><font style="font-size: 12px; color: #ffffff; font-style: bold;">Client Net</font></td> <td width="5"></td> <td><font style="font-size: 12px; color: #24ff00;"><? echo ($Performance_Today_ARRAY['client_net_total'] > 0 ? number_format($Performance_Today_ARRAY['client_net_total']):'0'); ?></font></td>
							</table>
						</div>

						<div id="nav_current_performance_clicks" style="position: absolute; border: 0px solid #ffffff; width: 160px; height: 15px; top: 15px; left: 0px;">
							<table cellpadding="0" cellspacing="0" border=0>
								<td width="90"><font style="font-size: 12px; color: #ffffff; font-style: bold;">PO Cost</font></td> <td width="5"></td> <td><font style="font-size: 12px; color: #24ff00;"><? echo ($Performance_Today_ARRAY['po_cost_total'] > 0 ? number_format($Performance_Today_ARRAY['po_cost_total']):'0'); ?></font></td>
							</table>
						</div>

						<div id="nav_current_performance_signups" style="position: absolute; border: 0px solid #ffffff; width: 160px; height: 15px; top: 30px; left: 0px;">
							<table cellpadding="0" cellspacing="0" border=0>
								<td width="90"><font style="font-size: 12px; color: #ffffff; font-style: bold;">Gross Profit</font></td> <td width="5"></td> <td><font style="font-size: 12px; color: #24ff00;"><? echo ($Performance_Today_ARRAY['gross_profit_total'] > 0 ? number_format($Performance_Today_ARRAY['gross_profit_total']):'0'); ?></font></td>
							</table>
						</div>

						<div id="nav_current_performance_upgrades" style="position: absolute; border: 0px solid #ffffff; width: 160px; height: 15px; top: 45px; left: 0px;">
							<table cellpadding="0" cellspacing="0" border=0>
								<td width="90"><font style="font-size: 12px; color: #ffffff; font-style: bold;">Commission</font></td> <td width="5"></td> <td><font style="font-size: 12px; color: #24ff00;"><? echo ($Performance_Today_ARRAY['direct_commission_total'] > 0 ? number_format($Performance_Today_ARRAY['direct_commission_total']):'0'); ?></font></td>
							</table>
						</div>

					</div>
				<?

					}
				?>
		<!-- END day performance -->









		<!-- month performance -->
				<?
					if($obj_Member->MemberAuthorized == true && $_SESSION['ActiveUser']['user_type'] == 'sales'){

          	// get performance data ------------------------------------------
						$Performance_CurrentMonth_ARRAY	=	$obj_Member->Get_SalesPerson_NavBoard_CurrentMonth($_SESSION['ActiveUser']['userid']);


				?>
					<div id="nav_current_setting_instantmessenger" style="position: absolute; border: 0px solid #ffffff; width: 260px; height: 55px; top: 0px; left: 610px;">
						
						<div id="nav_current_performance_label" style="position: absolute; z-index: 100; border-left: 1px solid #ffffff; border-right: 1px solid #ffffff; width: 14px; height: 60px; top: 0px; left: -20px;">
							<img src="/common/img/navbar/label.month.png" />
						</div>

						<div id="nav_current_performance_impressions" style="position: absolute; border: 0px solid #ffffff; width: 160px; height: 15px; top: 0px; left: 0px;">
							<table cellpadding="0" cellspacing="0" border=0>
								<td width="90"><font style="font-size: 12px; color: #ffffff; font-style: bold;">Client Net</font></td> <td width="5"></td> <td><font style="font-size: 12px; color: #24ff00;"><? echo ($Performance_CurrentMonth_ARRAY['client_net_total'] > 0 ? number_format($Performance_CurrentMonth_ARRAY['client_net_total']):'0'); ?></font></td>
							</table>
						</div>

						<div id="nav_current_performance_clicks" style="position: absolute; border: 0px solid #ffffff; width: 160px; height: 15px; top: 15px; left: 0px;">
							<table cellpadding="0" cellspacing="0" border=0>
								<td width="90"><font style="font-size: 12px; color: #ffffff; font-style: bold;">PO Cost</font></td> <td width="5"></td> <td><font style="font-size: 12px; color: #24ff00;"><? echo ($Performance_CurrentMonth_ARRAY['po_cost_total'] > 0 ? number_format($Performance_CurrentMonth_ARRAY['po_cost_total']):'0'); ?></font></td>
							</table>
						</div>

						<div id="nav_current_performance_signups" style="position: absolute; border: 0px solid #ffffff; width: 160px; height: 15px; top: 30px; left: 0px;">
							<table cellpadding="0" cellspacing="0" border=0>
								<td width="90"><font style="font-size: 12px; color: #ffffff; font-style: bold;">Gross Profit</font></td> <td width="5"></td> <td><font style="font-size: 12px; color: #24ff00;"><? echo ($Performance_CurrentMonth_ARRAY['gross_profit_total'] > 0 ? number_format($Performance_CurrentMonth_ARRAY['gross_profit_total']):'0'); ?></font></td>
							</table>
						</div>

						<div id="nav_current_performance_upgrades" style="position: absolute; border: 0px solid #ffffff; width: 160px; height: 15px; top: 45px; left: 0px;">
							<table cellpadding="0" cellspacing="0" border=0>
								<td width="90"><font style="font-size: 12px; color: #ffffff; font-style: bold;">Commission</font></td> <td width="5"></td> <td><font style="font-size: 12px; color: #24ff00;"><? echo ($Performance_CurrentMonth_ARRAY['direct_commission_total'] > 0 ? number_format($Performance_CurrentMonth_ARRAY['direct_commission_total']):'0'); ?></font></td>
							</table>
						</div>

					</div>
				<?

					}
				?>
		<!-- END month performance -->






		<!-- month commissions-->
				<?
					if($obj_Member->MemberAuthorized == true && $_SESSION['ActiveUser']['user_type'] == 'sales'){

				?>
      		<!-- earnings -->
      			<div id="nav_avatar_img" style="position: absolute; z-index: 300; border: 0px solid #ffffff; height: 58px; width: 135px; left: 250px; top: 6px; cursor: pointer;" title="Add Photos & Edit Profile">
      
      				<div id="nav_current_performance_earnings" style="position: absolute; border: 0px solid #ffffff; width: 135px; height: 15px; top: 0px; left: 0px;">
      					<table cellpadding="0" cellspacing="0" border="0" width="100%">
      						<tr>
      							<td align="center"><font style="font-size: 10px; color: #ffffff;"><b><? echo date('F',time()); ?> Commissions</b></font></td>
      						</tr>
      						<tr>
      							<td align="center"><font style="font-size: 28px; color: #fff000;"><b><? echo '$'.number_format($obj_Member->GetUserDirectCommissionTotal($_SESSION['ActiveUser']['userid'], date('m',time()), date('y',time()))); ?></b></font></td>
      						</tr>
      					</table>
      				</div>
      			</div>
      		<!-- END earnings -->
				<?

					}
				?>
		<!-- END month commissions -->





<?
/*
CODE NOT NEEDED FOR EGENHQ AFFILIATES
		<!-- safe mode setting status -->
				<?
					if($obj_Member->MemberAuthorized == true){
						echo '<div id="nav_current_setting_safemode" style="border: 0px solid #ffffff; width: 110px; height: 20px; top: 5px; left: 405px; position: absolute; padding: 0px; padding-left: 5px;">';

   					if( $_SESSION['ActiveUser']['nudity'] == 1 ){
   						echo '<table cellpadding="0" cellspacing="0"><tr><td align="left" width="70"><a href="http://'.$_SERVER[HTTP_HOST].'/MyStuff"><font style="font-size: 11px; color: #ffffff; font-style: bold;">View Nudity</td> <td width="5"></td> <td><font style="font-size: 11px; color: #24ff00;">YES</font></td></tr></table>';
   					}else{
   						echo '<table cellpadding="0" cellspacing="0"><tr><td align="left" width="70"><a href="http://'.$_SERVER[HTTP_HOST].'/MyStuff"><font style="font-size: 11px; color: #ffffff; font-style: bold;">View Nudity</td> <td width="5"></td> <td><font style="font-size: 11px; color: #ff6c00;">NO</font></td></tr></table>';
   					}
						echo '</div>';
					}
				?>
		<!-- END safe mode setting status -->






		<!-- discreet mode setting status -->
				<?
					if($obj_Member->MemberAuthorized == true){
						echo '<div id="nav_current_setting_discreetmode" style="border: 0px solid #ffffff; width: 110px; height: 20px; top: 20px; left: 405px; position: absolute; padding: 0px; padding-left: 5px;">';

  					if( $_SESSION['ActiveUser']['discreet'] == 1 ){
  						echo '<table cellpadding="0" cellspacing="0"><tr><td align="left" width="70"><a href="http://'.$_SERVER[HTTP_HOST].'/MyStuff"><font style="font-size: 11px; color: #ffffff; font-style: bold;">Discreet Mode</td> <td width="5"></td> <td><font style="font-size: 11px; color: #24ff00;">ON</font></font></a></td></tr></table>';
  					}else{
  						echo '<table cellpadding="0" cellspacing="0"><tr><td align="left" width="70"><a href="http://'.$_SERVER[HTTP_HOST].'/MyStuff"><font style="font-size: 11px; color: #ffffff; font-style: bold;">Discreet Mode</td> <td width="5"></td> <td><font style="font-size: 11px; color: #ff6c00;">OFF</font></font></a></td></tr></table>';
  					}
						echo '</div>';
					}
				?>
		<!-- END safe mode setting status -->

*/
?>








		<!-- data save status -->
				<div id="datasave-profile" style="border: 0px solid #ffffff; width: 250px; height: 30px; top: 15px; right: 300px; position: absolute; font-size: 22px; letter-spacing: -0.04em; font-weight: bold;	color: #ffd973; align: right; text-align: right;">
				</div>
		<!-- END data save status -->


<?
/*
CODE NOT NEEDED FOR EGENHQ AFFILIATES

			  <div id="nav_chatroomindicator" style="border: 0px solid #ffffff;">
				</div>
				<input type="hidden" id="active_session_userid" value="<? echo ($_SESSION['ActiveUser']['userid'] ? $obj_Member->Encrypt($_SESSION['ActiveUser']['userid'], 'private'):'no_value'); ?>" />

       	<!-- IM debug window -->
         	<?
          		if($obj_Member->MemberAuthorized == true && $obj_Member->GetIMStatus($_SESSION['ActiveUser']['userid']) == '1'){
          		//if($obj_Member->MemberAuthorized == true){
			       		$__tmp_uid	=	$_SESSION['ActiveUser']['userid'];
			       		
			       		//IM POLLER DISABLED FOR AFFILIATE SITE ------------------------
			       		//echo '<script type="text/javascript">';
		       			//echo 'IMRequestCheckPoller();';
			       		//echo '</script>';
			       		// -------------------------------------------------------------
     					}
     			?>
       	<!-- END IM -->



       	<!-- my forum group list -->
       	<?
       		if($numgrpbelong > 0){
       	?>
       		<div id="nav_fgselector" >
       				<select name="fgselect" id="fgselect" onchange="window.location='http://hardbodysingles.com/grp_home.php?groupid=' + this.value;">
       					<option id="fgoption" style="background: #3381ed;" value="">My Forum Groups</option>
       				<?
               	$i=0;
                 while ($i < $numgrpbelong) {
                 	$grptitle	=	mysql_result($sql_grpbelong,$i,"groups.title");
                   $grpid		=	mysql_result($sql_grpbelong,$i,"groupmember.groupid");
       				
       						if($i%2==0){
       							$fgbg = '#3381ed';
       						}else{
       							$fgbg = '#4f90eb';
       						}
       
         			?> 
       					<option id="fgoption" style="background: <? echo $fgbg; ?>;" value="<? echo $grpid; ?>"><? echo $grptitle; ?></option>
       					
       					
       				<?
            		$i++;
       				}
       				?>
       				</select>
       		</div>
       	<?
       		}
       	?>
       	<!-- end -->


<!-- magnifier -->
	<div id="icon_mag" >
  	<?
  		 //if($_SESSION['mag']==1 || !$_SESSION['mag']){ echo '<a href="begin.php?mag=2"><img src="common/img/tb/tb-r4.magnifier.png" border="0" width="85" height="68" alt="Turn ON Screen Magnifier"></a>';}elseif($_SESSION['mag']==2){ echo '<a href="begin.php?mag=1"><img src="common/img/tb/tb-r4.magnifier.png" border="0" width="85" height="68" alt="Turn ON Screen Magnifier"></a>';}
  	?>
	</div>
<!-- end magnifier -->



*/
?>



	
<div id="nav_logocontainer" ><a href="http://<? echo $_SERVER[HTTP_HOST]; ?>/Home"><img src="/common/img/logo/small_upper_corner.png" border="0" alt="<? echo $_SERVER[HTTP_HOST]; ?>" /></a></div>


<div id="nav_mbrmystuff" >
  	<?
  		if($obj_Member->MemberAuthorized == true){
			?>

				<table border=0 cellpadding=0 cellspacing=2>
<!--
					<tr>
						<td><font color="#ffffff" size="1">Settings:</font></td>
						<td width="20"></td>
						<td><font color="#b3ff75"><a href="http://<? echo $_SERVER['SERVER_NAME']; ?>/Account">Account</a></font></td>
					</tr>

					<tr>
						<td><font color="#ffffff" size="1">Session:</font></td>
						<td width="20"></td>
						<td><font color="#b3ff75" onclick="LogoutUser()" style="cursor: pointer;">Logout</font></td>
					</tr>
-->

					<tr>
<!--
						<td><font color="#b3ff75" size="1"><a href="http://<? echo $_SERVER['SERVER_NAME']; ?>/Account">Account</a></font></td>
						<td width="10"></td>
-->
						<td><font color="#b3ff75" size="1" onclick="LogoutUser()" style="cursor: pointer;">Logout</font></td>
					</tr>

				</table>

				<!-- <a href="http://<? echo $_SERVER['SERVER_NAME']; ?>/MyStuff"><img src="/common/img/tb/tb-r4.mystuff-icon-orange.jpg" border="0" title="Account Settings" /></a> -->
				
			<?
		}
	?>
</div>



<!-- menu buttons -->
	<div id="nav_buttonscontainer" >
		<?
			if($_SESSION['menutype']==2){
		 		// dynamic menu (UNUSED) -------
		 		include 'common/nav/nav-simg.php'; 
			}else{
				// standard menu ---------------
				include 'common/nav/nav.3.php';
			}
		?>
	</div>
<!-- end menu buttons -->


<?
/*
	<!-- tags -->
	<div id="nav_tag_bar" style="position: absolute; z-index: 200; bottom: -23px; width: 100%; height: 23px; background-color: #333333; border-bottom: 1px solid #fff; color: #fff; font-size: 12px; margin: 0 auto;">
	 	<div id="nav_options_title" style="position: absolute; bottom: 0px; left: 0px; width: 90px; height: 20px; color: #fff; font-size: 12px; border: 0px solid #fff;">
  		&nbsp;&nbsp;<b><font color="#ffa800">most popular</font></b>&nbsp;
  	</div>
  	
  	<div id="nav_options_readout" style="position: absolute; bottom: 0px; left: 95px; width: 100%; height: 20px; color: #fff; font-size: 12px; border: 0px solid #fff; text-align: left;">
  	<?
  		$_temp = $obj_Member->GetPopularTags(12);
  		foreach($_temp as $key => $value){
  			
  			// specific content ------------
  			if($obj_Member->DetectPrimaryTag(trim($value['tag']))){

  				$_PrimaryContentRecord = $obj_Member->GetContentURLViaPrimaryTag($value['tag']);

  				//GetContentRecord($ContentURL)

  				echo '<i><a href="http://'.$_SERVER['SERVER_NAME'].'/free-samples-stuff-'.$_PrimaryContentRecord->url.'" style="text-decoration: none; color: #b0ffce;">'.trim($value['tag']).'</a></i>&nbsp;&nbsp;&nbsp;';	
  			// tag -------------------------
  			}else{
  				echo '<i><a href="http://'.$_SERVER['SERVER_NAME'].'/free-samples-stuff/'.trim(str_replace(" ", "-", $value['tag'])).'" style="text-decoration: none; color: #fff;">'.trim($value['tag']).'</a></i>&nbsp;&nbsp;&nbsp;';	
  			}
  		}	
  	?>
  	</div>
  </div>
	<!-- END tags -->
*/
?>

	<?
		// Header Mode - Centered ------------------------------
		if($_SESSION['ActiveUser']['config_modes']['header_mode'] == 'centered'){
			?> </div> <!-- END nav_centerBarPanel --> <?
		}
	?>

	
</div> <!-- END nav_navbarcontainer -->


</head>
</header>