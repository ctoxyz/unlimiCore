<?php

// --------------------------------------------------------------------------------------------------------------------------------
// Author: 	Nathaniel Adam Briggs
// Client:	FriendsNFlings.com
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

interface utilsinterface {

	public function Sanitize($RawData);
	public function ContentRender_SWF($ContentID, $Width, $Height);
	public function ContentPromo($level_input);
	public function MiniPromo($level_input);
	public function FILTER_RemoveXSS($val);
}






// START OF CLASS ======================================================================================================

class utils implements utilsinterface{


// PROPERTIES ----------------------------------------------------------------------------


	// external communication ==========================================

	public	$db_host				= null;

	// internal operations =============================================
	private	$db_connection	= null;











// METHODS -------------------------------------------------------------------------------


	// CONSTRUCTOR =====================================================
	public function __construct(){

		$this->db_host				= null;

	}
	// =================================================================


	// DESTRUCTOR ======================================================
	public function __destruct(){

		unset($this->db_host);

	}
	// =================================================================




  // METHOD :: filter xss attacks ------------------------------------
  public function FILTER_RemoveXSS($val){

   // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed 
   // this prevents some character re-spacing such as <java\0script> 
   // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs 
   $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val); 
    
   // straight replacements, the user should never need these since they're normal characters 
   // this prevents like <IMG SRC=&#X40&#X61&#X76&#X61&#X73&#X63&#X72&#X69&#X70&#X74&#X3A&#X61&#X6C&#X65&#X72&#X74&#X28&#X27&#X58&#X53&#X53&#X27&#X29> 
   $search = 'abcdefghijklmnopqrstuvwxyz'; 
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
   $search .= '1234567890!@#$%^&*()'; 
   $search .= '~`";:?+/={}[]-_|\'\\'; 
   for ($i = 0; $i < strlen($search); $i++) { 
      // ;? matches the ;, which is optional 
      // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars 
    
      // &#x0040 @ search for the hex values 
      $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ; 
      // &#00064 @ 0{0,7} matches '0' zero to seven times 
      $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ; 
   } 
    
   // now the only remaining whitespace attacks are \t, \n, and \r 
   $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base'); 
   $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload'); 
   $ra = array_merge($ra1, $ra2); 
    
   $found = true; // keep replacing as long as the previous round replaced something 
   while ($found == true) { 
      $val_before = $val; 
      for ($i = 0; $i < sizeof($ra); $i++) { 
         $pattern = '/'; 
         for ($j = 0; $j < strlen($ra[$i]); $j++) { 
            if ($j > 0) { 
               $pattern .= '('; 
               $pattern .= '(&#[xX]0{0,8}([9ab]);)'; 
               $pattern .= '|'; 
               $pattern .= '|(&#0{0,8}([9|10|13]);)'; 
               $pattern .= ')*'; 
            } 
            $pattern .= $ra[$i][$j]; 
         } 
         $pattern .= '/i'; 
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag 
         $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags 
         if ($val_before == $val) { 
            // no replacements were made, so exit the loop 
            $found = false; 
         } 
      } 
   } 

   return $val; 
	} 
  // -----------------------------------------------------------------









  // METHOD :: SWF JS ------------------------------------------------
  public function ContentRender_SWF($ContentID, $Width, $Height){

    $__width 	= $Width;
    $__height = $Height;
    $_cid			= $ContentID;

    $__jsFunction	 = "AC_FL_RunContent(
    			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
    			'width', '".$__width."',
    			'height', '".$__height."',
    			'src', 'http://brainfiz.com/media/content/public/".$_cid."',
    			'quality', 'high',
    			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
    			'align', 'middle',
    			'play', 'true',
    			'loop', 'true',
    			'scale', 'showall',
    			'wmode', 'window',
    			'devicefont', 'false',
    			'id', '".$__cid."',
    			'bgcolor', '#000000',
    			'name', '".$__cid."',
    			'menu', 'true',
    			'allowFullScreen', 'true',
    			'allowScriptAccess','sameDomain',
    			'movie', 'http://brainfiz.com/media/content/public/".$_cid."',
    			'salign', ''
    			);";


    $_content = "<script language=\"javascript\">AC_FL_RunContent = 0;</script>";
    $_content	.= "<script src=\"http://egenerations.com/common/js/AC_RunActiveContent.js\" language=\"javascript\"></script>";

    $_content	.= "<script language=\"javascript\">
    	if(AC_FL_RunContent == 0) {
    		alert(\"This page requires AC_RunActiveContent.js.\");
    	}else{
    		".$__jsFunction."
    	};";

    $_content	.= "</script>";

    $_content	.= "
    <noscript>
    	<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0\" width=".$__width." height=".$__height." id=\"game\" align=\"middle\">
    	<param name=\"allowScriptAccess\" value=\"sameDomain\" />
    	<param name=\"allowFullScreen\" value=\"true\" />
    	<param name=\"movie\" value=\"http://brainfiz.com/media/content/public/".$__cid."\" />
    	<param name=\"quality\" value=\"high\" />
    	<param name=\"bgcolor\" value=\"#000000\" />
    		<embed src=\"http://brainfiz.com/media/content/public/".$__cid."\" quality=\"high\" bgcolor=\"#000000\" width=\"".$__width."\" height=\"".$__height."\" name=\"game\" align=\"middle\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />
    	</object>
    </noscript>
    ";


	return $_content;
  }
  // -----------------------------------------------------------------





  // METHOD :: Sanitize Input ----------------------------------------
  public function Sanitize($RawData){

    $unclean 	= strtolower($RawData);
    //$clean 		= mysql_real_escape_string(strip_tags($unclean));
    $clean 		= strip_tags($unclean);
  	$blklist	= array('%','!','#','$','^','*','(',')','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','.','/','~','`','=');
  	$clean 		= str_replace($blklist, '', $clean);



//		return $clean; 		


  	// report ----------------------------
    if($clean == $unclean){
      return $RawData;
    }else{
      return false;
    }
  	// end report ------------------------



  }
  // -----------------------------------------------------------------








  // METHOD :: Mini Link Promo ---------------------------------------
  public function MiniPromo($level_input){


    
    // Random Archive Featurette Lister
    
    //	get feature data
    //$sql2 			= mysql_query("SELECT * FROM content WHERE tscreated < (SELECT MAX(tscreated) FROM content) AND classid = '$level_input' AND enabled = '1' ORDER BY RAND() LIMIT 3") or die (mysql_error());
    $sql2 			= mysql_query("SELECT * FROM content WHERE enabled = '1' LIMIT 3") or die (mysql_error());
    $numstories	=	mysql_numrows($sql2);
    
    ?>
    
    
    
    <style>
    #link_container {
      position: 				relative;
      margin:						0;
      padding:					0;
      width:						300px;
      height: 					110px;
      border: 					0px solid #fff;
      top:							-10px;
    	left:							0px;
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
    }
    
    #link_rating {
      position: 				absolute;
      margin:						0;
      padding:					0;
      width:						50px;
      height: 					20px;
      border: 					0px solid #fff;
      top:							1px;
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
    	<? if(($_SESSION['browsermsieversion'] == 0) && ($_SESSION['browsermsie'] == 1)){ ?>	behavior: 					url(iepngfix.htc); <? } ?>
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
    	<? if(($_SESSION['browsermsieversion'] == 0) && ($_SESSION['browsermsie'] == 1)){ ?>	behavior: 					url(iepngfix.htc); <? } ?>
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
    	<? if(($_SESSION['browsermsieversion'] == 0) && ($_SESSION['browsermsie'] == 1)){ ?>	behavior: 					url(iepngfix.htc); <? } ?>
    }
    </style>
    
    <div id="link_container">
    	<?
    			//$divtag='link_level3';
    			//$right='-26px';
    			
    			$i=0;
    			while ($i < $numstories) {
    
    			$title		=	mysql_result($sql2,$i,"title");
    			$snippet	=	mysql_result($sql2,$i,"description");
    			//$story		=	mysql_result($sql2,$i,"story");
    			$featureid=	mysql_result($sql2,$i,"id");
    			$date			=	mysql_result($sql2,$i,"tscreated");
    			$level		=	mysql_result($sql2,$i,"classid");
    			$views		=	mysql_result($sql2,$i,"visits");
    			
    			$title_num_char		= strlen($title);
    			$title_num_words 	= count(explode(" ", $title));
    
    			if( ($title_num_char > 25) && ($title_num_words > 4) ){
    				$wordcountlimit = 5;
    			}elseif( ($title_num_char < 20) && ($title_num_words > 4) ){
    				$wordcountlimit = 6;
    			}else{
    				$wordcountlimit = 7;
    			}
    
    
    
    	// rating DIV alignment -----------------------------------------------------------
    	
    	// 0 - 99 ----------------------------------------
    	if($views < 100 ){
    
    		$divtag='link_level1';
    
    			// single char
    			if($views < 10 ){
    				$numchars = 1;
    				$right		='6px';
    
    			// double char
    			}elseif($views > 9 && $views < 100){
    				$numchars = 2;
    				$right		='8px';
    			}
    	
    	// 100 - 199 ----------------------------------------
    	}elseif($views > 99 && $views < 250){
    		
    		$divtag='link_level2';
    
    			// double char
    			if($views > 9 && $views < 100){
    				$numchars = 2;
    				$right		='12px';
    
    			// triple char
    			}elseif($views > 100){
    				$numchars = 3;
    				$right		='-9px';
    			}
    
    	// 200+ ----------------------------------------
    	}elseif($views > 250){
    		
    		$divtag='link_level3';
    
    		$numchars = 3;
    		$right		='-5px';		
    	}
    
    
    
    	?>
    		<div id="<? echo $divtag; ?>">
    			<div id="link_ball"><img src="http://egenerations.com/common/img/icons/icon_orange_ball_small.png" style="behavior: url(iepngfix.htc)"></div>
    			<div id="link_link"><a href="content-game-<? echo $featureid;?>-<? echo clean_url($title); ?>" title="<? echo $title.' '.$snippet; ?>" id="learnRandomContentLinks<? echo $i; ?>"><font style="font-size: 14px; text-decoration: none; color: white; font-family: arial;"> &nbsp; <? echo ucfirst(word_limiter($title, $wordcountlimit)); ?></font></a></font></div>
    			<div id="link_rating" style="right: <? echo $right; ?>;"><font size="3" color="#ffa200" face="arial"><b><? echo $views; ?></b></font></div>
    		</div>
    	<?
    
    			$i++;
    			}
    	?>
    
    </div>
    
    
    <?





  }











  // METHOD :: Content Promo -----------------------------------------
  public function ContentPromo($level_input){

    //	SET FEATURE DIV TYPE =========================================================================================

    // explore -------------------------------------
    if($level_input == 1){
    	$div_type='learn';
    
    // learn ---------------------------------------
    }elseif($level_input == 4 || $level_input == 2){
    	$div_type='explore';
    
    // play ----------------------------------------
    }elseif($level_input == 3 || $level_input == 5 || $level_input == 7){
    	$div_type='play';
    
    // member write --------------------------------
    }elseif($level_input == 10){
    	$div_type='member-write-1';
    
    // interactive ---------------------------------
    }elseif($level_input == 20){
    	$div_type='learn';
    }
    
    

    
    
    // Set Exclusive Content Flag
    $exclusive_content = 0;
    if($level_input == 3 || $level_input == 5 || $level_input == 2 || $level_input == 6) {
    	$exclusive_content = 1;
    }else{
    	$exclusive_content = 0;
    }
    
    
    // **************** CODE EXPLANATION *************************************************
    // finds featurestories NOT already viewed by the member
    // if everything has been read, then it requeries and just chooses random selections
    // Order of Selection: LATEST IF NOT READ *not added >> NOT READ >> RANDOM
    
    
    
    //	GET FEATURE DATA
    
    //current reader
    $userid_reader 	= $_SESSION['ActiveUser']['userid'];
    $ts_now					= time();
    $ts_2days				= $ts_now - (60*60*24);
    
    // All Except GAME & INTERACTIVE CONTENT ====================================================================
    if( $level_input != 7 && $level_input != 20 ){
    
    		$view_or_play = 'Play Now!';
    
         // get latest if NOT viewed and less than 2 days old
         //$sql_getcontent 	= mysql_query("SELECT * FROM content WHERE classid = '$level_input' AND enabled = '1' AND tscreated > '$ts_2days' AND imgsize > 0 AND id NOT IN (SELECT contentid from points_ext WHERE userid='$userid_reader') ORDER BY tscreated DESC LIMIT 1") or die (mysql_error());
         $sql_getcontent 	= mysql_query("SELECT * FROM content WHERE classid = '$level_input' AND enabled = '1' AND tscreated > '$ts_2days' AND id NOT IN (SELECT contentid from points_ext WHERE userid='$userid_reader') ORDER BY tscreated DESC LIMIT 1") or die (mysql_error());
         $chk_latest_viewed 		= mysql_num_rows($sql_getcontent);
         
         	// get random per NOT ALREADY VIEWED
         	if($chk_latest_viewed == 0){
         		//$sql_getcontent 	= mysql_query("SELECT * FROM content WHERE classid = '$level_input' AND enabled ='1' AND imgsize > 0 AND id NOT IN (SELECT contentid from points_ext WHERE userid='$userid_reader') ORDER BY RAND() LIMIT 1") or die (mysql_error());
         		$sql_getcontent 	= mysql_query("SELECT * FROM content WHERE classid = '$level_input' AND enabled ='1' AND id NOT IN (SELECT contentid from points_ext WHERE userid='$userid_reader') ORDER BY RAND() LIMIT 1") or die (mysql_error());
         		$chk_random_notviewed = mysql_num_rows($sql_getcontent);
         
         			// get random per all if less than 5 choices remain
              	if($chk_random_notviewed < 5){
              		//$sql_getcontent = mysql_query("SELECT * FROM content WHERE imgsize > 0 AND classid = '$level_input' AND enabled !='1' ORDER BY RAND() LIMIT 1") or die (mysql_error());
              		$sql_getcontent = mysql_query("SELECT * FROM content WHERE classid = '$level_input' AND enabled !='1' ORDER BY RAND() LIMIT 1") or die (mysql_error());
         			}
         	}
    
    // Interactive CONTENT ======================================================================================
    }elseif( $level_input == 20 ){
    	$view_or_play = 'Begin';
    	$sql_getcontent = mysql_query("SELECT * FROM ques_tests WHERE enabled !='0' ORDER BY RAND() LIMIT 1") or die (mysql_error());

    // All GAME CONTENT =========================================================================================
    }else{
    	$view_or_play = 'Play';
    	$sql_getcontent = mysql_query("SELECT * FROM content WHERE classid = '$level_input' AND enabled !='1' ORDER BY RAND() LIMIT 1") or die (mysql_error());
    }
    
    
    /*
    if(mysql_num_rows($sql_getcontent) < 1){ 
    
    }else if(mysql_num_rows($sql_getcontent) < 5){
    }
    */
    
    
    
    if($level_input != 20){
    	$title		=	mysql_result($sql_getcontent,0,"title");
    	$snippet	=	mysql_result($sql_getcontent,0,"description");
    	$story		=	mysql_result($sql_getcontent,0,"content");
    	$featureid=	mysql_result($sql_getcontent,0,"id");
    	$tscreated=	mysql_result($sql_getcontent,0,"tscreated");
    }elseif( $level_input == 20 ){
    	$title		=	mysql_result($sql_getcontent,0,"title");
    	$snippet	=	mysql_result($sql_getcontent,0,"description");
    	//$story		=	mysql_result($sql_getcontent,0,"story");
    	$featureid=	mysql_result($sql_getcontent,0,"testid");
    	$tscreated=	mysql_result($sql_getcontent,0,"tscreated");
    }


    //	GET RATING =========================================================================================
    $sql3 		= mysql_query("SELECT * FROM rating WHERE ratingid='$featureid' AND type!='v'") or die (mysql_error());
    
    $r1				=	mysql_result($sql3,0,"rate1");
    $r2				=	mysql_result($sql3,0,"rate2");
    $r3				=	mysql_result($sql3,0,"rate3");
    
    if(!$r3 && !$r2 && !$r1){
    	$rating=0;
    }elseif(($r2>$r1) && ($r2>$r3) || ($r2==$r3)  && (!$r3==0) || ($r2==$r1) && (!$r1==0)){
    	$rating=2;
    }elseif(($r3>$r1) && ($r3>$r2) || ($r3==$r2) && ($r3>0)){
    	$rating=3;
    }elseif(($r1>$r2) && ($r1>$r3)){
    	$rating=1;
    }
    
    
    
    
    // Link Per Content Type ====================================================
    if( 1 == 1 ){
    	?>
      	<div id="column_<? echo $div_type; ?>_fspromo_viewlink" ><a href="content-game-<? echo $featureid;?>-<? echo clean_url($title); ?>"><font style="text-decoration: none; color: #feae2f;"><? echo $view_or_play; ?></font></a></div>
      	<div id="column_<? echo $div_type; ?>_fspromo_title" ><a href="content-game-<? echo $featureid;?>-<? echo clean_url($title); ?>"><font style="text-decoration: none; color: white;"><? echo $title; ?></font></a></div>
      	<div id="column_<? echo $div_type; ?>_fspromo_black" ></div>
      	<div id="column_<? echo $div_type; ?>_fspromo_border" ></div>
    	<?
    }
    // ==========================================================================




/*    
    	// If Columist Feature >> Show Headshot -------------------------------------------------------------------
    	if($exclusive_content == 1){
    		?> <div id="column_<? echo $div_type; ?>_fspromo_authorheadshot" ><img src="/common/img/columns/level-<? echo $level_input; ?>.gif"></div> <?
    	}
*/  


    
    
    
    // get content teaser image ====================================================================
    if( 1 == 1 ){

 			?>
 				<a href="content-game-<? echo $featureid; ?>-<? echo clean_url($title); ?>"> <img src="media/img_teaser/<? echo $featureid; ?>.jpg" border="0" alt="<? echo $description; ?>"> </a>
 			<?

		}
    // =============================================================================================
    
    
    
    
/*    
    //	GET READERSHIP LIST of MEMBER CONTENT =========================================================================================
    if($level_input == 10){
    	
    	if($pageid == 2){$font_color='#1469db';}else{$font_color='#FFF';}
    	?> <div id="column_<? echo $div_type; ?>_fsreaders" > <b><font color="<? echo $font_color; ?>">Latest Readers</font></b><br><?
    	
    	$sql_readers 		= mysql_query("SELECT points_ext.userid, points_ext.timestamp FROM points_ext WHERE points_ext.featureid='$featureid' GROUP BY points_ext.userid ORDER BY points_ext.timestamp DESC LIMIT 10 ") or die (mysql_error());
    	$num_readers 		= mysql_num_rows($sql_readers);
    
    	if($num_readers > 0){
    
    	$x	=	0;
    	while ($x < $num_readers){
    
    	$fs_reader_id		=	mysql_result($sql_readers,$x,"points_ext.userid");
    	
    	echo '<a href="http://egenerations.com/'.id2sn($fs_reader_id).'"><font color="#feae2f">'.ucwords(id2sn($fs_reader_id)).'</font></a><br>';
      $x++;
      }
    	
    	}else{
    		echo '<font color="white">None Yet</font>';
    	}
    
    
    	?> </div> <?
    }
*/



    // end global/master function
    }
// -------------------------------------------------------------------












// END OF METHODS ------------------------------------------------------------------------


}
// END OF CLASS ========================================================================================================






















// Example Arrays for Testing Usage ====================================================================================


/*



*/

?>