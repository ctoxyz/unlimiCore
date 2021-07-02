<?php
// syntheticMagic ABS - VIEW =========================================


// --------------------------------------------------------------------------------------------------------------------------------
// Author: 	Nathaniel Adam Briggs @ 2008
// Contact:	accounts@syntheticmagic.com
// Owner:		eGenerations Network, Inc. | syntheticMagic Advanced Business Services
// Client:	SM Clients
// Class:		N/A
// Version:	Release 2.1
// Method:	example()
// Purpose:	Handle all Core View Operations
// Usage:		

//					Instantiate ----------------------------------------------------------------------
//         	

//					Execute example() Method with $x (array) parameter (Examples @ base of file)
//					
//					
//					
//					
// --------------------------------------------------------------------------------------------------------------------------------



// INSTALLATION - REPLACE "sm0005" with the TARGET INSTALL DOMAIN

// =============================================================================










// error header ------------------------
require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/inc/inc.error_header.php');







// check for "no include" flag -----------------------------
if($_GET['_req'] == 666){
	// no include
	header("Expires: 0");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("cache-control: no-store, no-cache, must-revalidate");
	header("Pragma: no-cache");
}else{
	// top nav bar -------------------------------------------
	require('common/header/SM.topnav.php');
}
// -----------------------------------------------------------------------------








	// capture current page ----------------------------------
	$_SESSION['ActiveUser']['CurrentPage'] = $_GET['_function'];
	// -------------------------------------------------------



	// executable list ***************************************************************************************************
  switch ($_GET['_function']){









					// UNIT TEST ============================================================================
					case "subpage.unit_test":
        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


							//echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
							//echo $obj_Member->Encrypt('abc123', 'private'); 
							//die();

			        ?>
								<!-- html  -->




<h1>unit test</h1>

 								<!-- SM JS lib -->
	<?  echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.FORMS.uncompressed.js"></script>'; ?>
<!-- END SM JS lib -->

<!-- SM JS lib -->
	<? //echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.REPORTS.uncompressed.js"></script>'; ?>
<!-- END SM JS lib -->

 

<!-- SM CSS lib -->
	<? echo '<link rel="stylesheet" type="text/css" href="http://'.$_SERVER['SERVER_NAME'].'/common/css/SM.forms/SM.css.FORMS.css" />'; ?>
<!-- END SM CSS lib -->


              <!-- imagery_container -->
              	 <!--	<div id="imagery_container">-->

 											<!-- image upload progress meter -->
              		<!--		<div id="upload_progress" style="position: absolute; left: 50px; top: 100px; width: 0px; height: 20px; border: 0px solid #ffffff; background-color: #00ff00;"></div>	
											--><!-- END image upload progress meter -->

              		<!--	<div id="profilepic_container">
	           						<div id="picture"><table width="200" height="300" cellpadding="0" cellspacing="0"><tr><td align="center" valign="center"><? $obj_Member->ImageDisplay($_SESSION['ActiveUser']['userid'], 1, 1); ?></td></tr></table></div>
													<div id="profilepic_label_yourprimaryphoto"><b><center>Your Primary Photo</center></b></div>
    	             				  <tr><td align="middle"><a href="AddPicture" title="Change Photo" rel="gb_page_center[450, 228]"><font size="4"><b>[ Change Photo ]</b></font></a></td></tr>  
												
												<div id="profilepic_label_addphototool"><b><center>Add Photo Tool</center></b></div>
												<div id="picture_options">
													<div id="picture_options_overlay" style="z-index: 900;"></div>-->
  	                   		<!-- upload picture -->
                      		<!--	<form action="execute" method="post" enctype="multipart/form-data" name="member-Add-Picture" id="member-Add-Picture">
	                      			<input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" value="<? echo md5(uniqid()); ?>" />
	                      			<input type="file" name="image"  length="3" size="3" id="image" onclick="document.getElementById('upload').disabled = false;">
  	                    		-->	<!-- <input type="submit" id="upload" name="Submit" value="Send File"> -->
  	                    			<!--<input type="submit" id="upload" name="Submit" value="Upload Photo" onclick="UploadImageFile();">
    	                  			<input type="hidden" value='member-Add-Picture' name="_function" id="_function" />
    	                  			--><!-- <input type="hidden" id="numberCurrentImages" value="<? echo $MemberProfile['numimages']; ?>" /> -->
    	                  <!--			<input type="hidden" id="numberCurrentImages" value="0" />
    	                  			<input type="hidden" id="numberCurrentImagesCurrent" value="" />
      	                			<iframe id="upload_target" name="upload_target" src="" style="position: absolute; top: 200px; left: 500px; width: 200px; height: 200px; border: 2px solid #ff0000; background-color: #ffffff; color: #000000; display: none;"></iframe>
      	                		</form>-->
        	              	<!-- end upload picture -->

  	                   		<!--<script type="text/javascript">
  	                   			document.getElementById('upload').disabled = true;
  	                   		</script>-->

													<?
														if($MemberProfile['numimages'] == 12 || $MemberProfile['numimages'] > 11){
													?>
														<!--	<script type="text/javascript">
																document.getElementById('image').disabled		= true;
																document.getElementById('upload').disabled	= true;
																document.getElementById('upload').value			= 'Max Images';
															</script>-->
													<?
														}
													?>
        	           <!--   </div>

                     	
                  	<div id="profilepic_rules">
                  		<table height="100%" width="100%" cellpadding="0" cellspacing="0">
                  			<tr>
                  				<td width="10"></td><td align="left" width="20"><img src="common/img/icons/icon_20x20_greencheck.png" /></td><td align="left"><font size="2" color="#48c707">&nbsp;&nbsp;Only Photos of <b>YOU!</b> </font></td><td><a href="Upload-Terms" alt="More Information"><font color="white" style="text-decoration: none;"><b>?</b></font></a></font></td>
                  			</tr>
                  			<tr>
                  				<td width="10"></td><td align="left" width="20"><img src="common/img/icons/icon_20x20_redx.png" /></td><td align="left"><font size="2" color="red">&nbsp;&nbsp;No Photos of Minors </font></td><td><a href="Upload-Terms"><font color="white" style="text-decoration: none;"><b>?</b></font></a></font></td>
                  			</tr>
                  			<tr>
                  				<td width="10"></td><td align="left" width="20"><img src="common/img/icons/icon_20x20_redx.png" /></td><td align="left"><font size="2" color="red">&nbsp;&nbsp;No Advertisements </font></td><td><a href="Upload-Terms"><font color="white" style="text-decoration: none;"><b>?</b></font></a></font></td>
                  			</tr>
                  			<tr>
                  				<td width="10"></td><td align="left" width="20"><img src="common/img/icons/icon_20x20_greencheck.png" /></td><td align="left"><font size="2" color="#48c707"><b>&nbsp;&nbsp;Tasteful</b> Photography ONLY</font></td><td><a href="Upload-Terms"><font color="white" style="text-decoration: none;"><b>?</b></font></a></font></td>
                  			</tr>
											</table>
                  	</div>

            		  </div>-->
            		  
    
							<!-- END imagery_container -->




									<? 
										//require('common/html/inc.SUBPAGE.UNIT_TEST.php');
									?>
								<!-- END html  -->
			        <?



						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/standard_nav.php');
					break;
					//=====================================================================================						
			












    			// user login - modal ==========================================================
        	case "modal.user.login":


						// error header ------------------------
						require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/inc/inc.error_header.php');

						// class CORE - member class -----------------------------
						require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/class.unlimiCore.php');
								
						// extended functions per property class -------------------
						require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/class/ext.class.unlimiCore.'.$_SERVER['SERVER_NAME'].'.php');

    				

					  // -------------------------------------------------------
					  $obj_Member						=	new EXT_unlimiCore;
					  $obj_Member->Initiate('Create', $_SERVER['SERVER_NAME']);
						// -------------------------------------------------------


  							$BrowserAgent	= $_SERVER['HTTP_USER_AGENT'];
  							
								
								
								// ---------------------------------------------------
              	// firefox -------------------------
              	if( eregi("Firefox", $BrowserAgent) ){
            
              		//FF3 ----------------------------
              		if(eregi("3.0", $BrowserAgent)){
              			//echo 'FF 3';
              			$Style	=	'width: 590px; height: 160px;';
              		}else{
              			//echo 'FF ?';
              			$Style	=	'width: 590px; height: 160px;';
              		}
            
              	// msie ----------------------------
              	}elseif( eregi("msie", $BrowserAgent) ){
              		
            			//msie 7.0 or else --------------
            			if(eregi("msie 7", $BrowserAgent)){
            				//echo 'IE 7';
            				$Style	=	'width: 600px; height: 141px;';
            			}elseif(eregi("msie 6", $BrowserAgent)){
            				//echo 'IE 6';
            				$Style	=	'width: 600px; height: 141px;';
            				?> 
            					<script> 
            						alert('Upgrade Your Browser to Version 7.0 or Later'); 
            					</script> 
            				<?
            			}else{
            				//echo 'IE ?';
            				$Style	=	'width: 590px; height: 160px;';
            			}

								// unknown browser agent ---------
            		}else{
            			$Style	=	'width: 590px; height: 160px;';
            		}
            		// ---------------------------------------------------
                ?>



          			<!-- core css -->
          			<link rel="stylesheet" type="text/css" href="http://<? echo $_SERVER['SERVER_NAME']; ?>/common/css/base.css" />

							  <!-- SM.js.lib -->
  							<script type="text/javascript" src="http://<? echo $_SERVER['SERVER_NAME']; ?>/common/js/compile/final.uncompressed.js"></script>



	               <script type="text/javascript">
                
                  function helpdesk(){
                  	parent.parent.location="http://sm0005.com/helpdesk";
                  }
        
                </script>
        				
        				<style>
        					.generic {
        						font-family: 		Myriad, "Myriad Web", Helvetica, Arial, sans-serif;
        						font-size: 			21px;
        						font-weight: 		bold;
        						letter-spacing: -1px;
        					}
        				</style>


                <!-- login -->
                	<div id="login_panel" style="border: 5px solid #d6011f; <? echo $Style; ?> padding-top: 10px; background-color: #ffffff;">
                		<form action="execute" method="post" enctype="multipart/form-data" name="member-Authenticate" id="member-Authenticate">
                			<table style="width: 570px; height: 141px;" cellpadding="2" cellspacing="2" border="0" align="middle" >
                				<!-- icon -->
                				<tr>
                					<td rowspan="4" width="130">
        										<img src="common/img/icons/icon_keys.png">
                					</td>
                				</tr>
                				<!-- END icon -->
        
        
                				<!-- email address element -->
                				<tr>
                					<td width="140">
                						<label for="email" class="blue"><font class="greeting">EMail Address</font></label>
                					</td>
                					<td>
                						<!-- <input name="signin_emailaddress" size="20" maxlength="35" type="text" id="signin_emailaddress" class="generic" autocomplete="off" tabindex="1"> -->
                						<input type="text" size="20" maxlength="45" style="border: 1px solid #781351;" id="signin_emailaddress" class="generic" autocomplete="off" tabindex="1" value="Email" onclick="clickclear(this, 'Email')" onfocus="clickclear(this, 'Email')" onblur="clickrecall(this,'Email')" />
                					</td>
                				</tr>
                				<!-- END email address form element -->
        
                				<!-- email address form element -->
                				<tr>
                					<td>
                						<label for="email" class="blue"><font class="greeting">Password</font></label>
                					</td>
                					<td>
                						<!-- <input name="signin_password" size="20" maxlength="15" type="password" id="signin_password" class="generic" autocomplete="off" tabindex="1"> -->
														<input type="text" size="20" maxlength="25" style="border: 1px solid #781351; display: inline;" id="signin_passwordF" class="generic" autocomplete="off" tabindex="2" value="Password" onclick="clickclear(this, 'Password')" onfocus="clickclear(this, 'Password'); hideThis('signin_passwordF');" onblur="clickrecall(this,'Password')" />
														<input type="password" size="20" maxlength="20" style="border: 1px solid #781351; display: none;" id="signin_password" class="generic" autocomplete="off" tabindex="2" value="" onkeypress="return onEnter(event,this.form, 'modal');" />
                					</td>
                				</tr>
                				<!-- END email address form element -->
        
                				<!-- submission form element -->
                      	<tr>
                      		<td colspan="3">
                
                      			<table cellpadding="0" cellspacing="0" border=0>
                      				<tr><td height="10"></td></tr>
                      				<tr>
                      					<td width="10"></td>
                      					<td><!-- <font size="2" face="arial"><b>I am 18 Years of Age or Older</b></font> --> <input type="button" name="help" value="Need Help?" class="generic" onclick="helpdesk();"> </td>
                								<td width="120"></td>
                      					<td>

								                 	<input type="hidden" value='member-Authenticate' name="_function" id="_function" />
								                 	<?
									                 	$_SESSION['ActiveUser']['loginToken'] = md5(uniqid(rand(), true));
									                 	$_SESSION['ActiveUser']['loginMode'] = 'modal';
								                 	?>
								                 	<input type="hidden" value="<? echo $_SESSION['ActiveUser']['loginToken']; ?>" id="signin_authenticationToken" />



<!--
DISABLED AUTO-LOGIN

																	<div id="nav_mbrlogin_recall" style="position: absolute; border: 0px solid #ffffff; width: 15px; height: 14px; left: 218px; top: 22px; z-index: 999; text-align: left; margin: 0; padding: 0;">
																		<input type="checkbox" size="20" maxlength="15" id="signin_remember_me" autocomplete="off" />
																	</div>
								
																	<div id="nav_mbrlogin_recall" style="position: absolute; border: 0px solid #ffffff; width: 155px; height: 14px; left: 240Px; top: 24px; z-index: 999; text-align: left; margin: 0 0 0 0; padding: 0 0 0 0; color: #ffb400; font-size: 8pt;">
																	auto login &nbsp;<font color="white">(<i>skips this page</i>)</font>
																	</div>
-->




																	<input type="button" id="login" tabindex="4" value="Sign-In" onclick="AuthenticateUser('modal')" style="letter-spacing: -1px; font-weight: bold; font-size: 21px;" />

<!--
                      						<input type="hidden" value='member-Authenticate' name="_function" id="_function">
	                     						<input id="finalstep" type="submit" name="finalstep" tabindex="9" value="Sign me In!" style="letter-spacing: -1px; font-weight: bold; font-size: 21px;"><br>
-->

                      					</td>
                      				</tr>
                      			</table>
                      				
                      		</td>
                      	</tr>
                				<!-- END submission form element -->
        
               
                
                			</table>
                			
                		</form>
                	</div>
                <!-- END login -->
        			<?




						// -----------------------------------------------------------------

        	break;
        	// =======================================================================================	


















    			// =======================================================================================
        	case "subpage.config":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true && $obj_Member->ModuleAuthentication($_SESSION['ActiveUser']['userid'], $_SERVER['REQUEST_URI']) == true){

								//require('common/html/inc.report.users_session_actions.php');
								echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;"><font color="#a3f59b">unlimi</font><font color="#00d2ff">CORE</font>&trade; System Configuration</div>';


								$importXML			= '/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'.com/httpdocs/common/xml/SampleDataSet_R2.xml';
								$_XML_Import		= simplexml_load_file($importXML) or die ("ERROR: ** Import Not Loaded  **");
								
								
								//print_r($_XML_Import);

?> <font color=white> <?


							// import transactions ---------------------------------
							//$obj_Member->IMPORT_CreateTransaction($_XML_Import);

							// generate transactions -------------------------------
							$obj_Member->GENERATE_CreateTransaction(20);



?> </font> <?

  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}else{
  
  							//redirect to MyHome section -------------------------
								?>
									<script type="text/javascript">location="Dashboard";</script>
								<?
  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================











    			// =======================================================================================
        	case "chart.test":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------
				?>
					<!-- html  -->


    			<script language="JavaScript" src="common/js/chart/FusionCharts.js"></script>
    
    
          <SCRIPT LANGUAGE="JavaScript">
             /*
              * updateChart method is called, when user clicks the button
              * Here, we generate the XML data again and build the chart.
              * @param domId domId of the Chart
             */
             function updateChart(DOMId){
                //using updateChartXML method defined in FusionCharts JavaScript class
                updateChartXML(DOMId,"<graph><set name='cats' value='32' /><set name='goats' value='100' /><set name='sticks' value='4587' /></graph>");
                //Disable the button
                this.document.frmUpdate.btnUpdate.disabled = true;
             }
          </SCRIPT>
    
    
    
          <div id="chart1div">
             FusionCharts
          </div>
          <script language="JavaScript">
             
             var chartData	=	"<graph caption='Business Results 2006' xAxisName='Month' yAxisName='Revenue' showValues='0' numberPrefix='$' decimalPrecision='0' bgcolor='000000' bgAlpha='10' showColumnShadow='1' divlinecolor='ffffff' divLineAlpha='60' showAlternateHGridColor='1' alternateHGridColor='ffffff' alternateHGridAlpha='60' ><set name='A' value='10' color='D64646' /><set name='B' value='11' color='AFD8F8' /></graph>";
             
             var chart1 = new FusionCharts("common/chart/FCF_Column3D.swf", "chart1Id", "960", "400");
             chart1.setDataXML(chartData);
             chart1.render("chart1div");
          </script>
          <form name='frmUpdate'>
             <input type='button' value='Change Data' onClick="updateChart('chart1Id');" name='btnUpdate'>
          </form> 



					<!-- END html  -->
        <?

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================










	
  	
      		// Profile Viewer ========================================================================
        	case "paid-member-ProfileViewer":
        	
        	
        		//require('common/html/html-subpage-base-header.php');																	//relocated below for customization system 
						// -----------------------------------------------------------------



  						// Registered & Paid OR Members Own Profile OR Woman -----------------------
  						if( ($obj_Member->MemberAuthorized == true && $obj_Member->MemberPaid == true) || ($obj_Member->Decrypt($_GET['_898a8as']) == $_SESSION['ActiveUser']['userid']) ){


								// get member profile specific data ------------------------------
       					$MemberProfile	=	$obj_Member->GetMemberProfile_Defined($_GET['_898a8as']);

								// record profile view -------------------------------------------
								$obj_Member->MemberProfileAction($_SESSION['ActiveUser']['userid'], $obj_Member->Decrypt($_GET['_898a8as']));

								
								// online now --------------------------------------------------
								function _onlineNowCheck($timestamp){
									
									$_online_now	= time() - 600;
									$_return			=	false;
									
									if($timestamp >= $_online_now){
										$_return = true;
									}else{
										$_return = false;
									}

									return $_return;
								}
								// -------------------------------------------------------------



								require('common/html/html-subpage-base-header.php');

/*								// start of a customization system
								if(preg_match('/ViewProfile/', $_SERVER['REQUEST_URI']) == 1){
	
								}else{
									
								}
*/


                  ?>
          					<!-- html  -->
      <!--
          						<center>
          							<br><br><br><br>
          							<font class="greetinglarge">Profile Viewer</font>
          							<br><br><br>
          							<? 
          								echo '<font color="white">';
          								echo 'MemberID >> '.$obj_Member->Decrypt($_GET['_898a8as']);
          								echo '<br>';
          								echo 'MemberID >> '.$_GET['_898a8as'];
          								echo '</font>';
          							?>
          						</center>
      -->




                    <!-- style sheet -->
                    <link rel="stylesheet" href="common/css/profileviewer/profileviewer-core.css" type="text/css" media="all"/>
      							

                    <!--[if lt IE 7.]>
                    <script defer type="text/javascript" src="common/js/ie6pngfix/pngfix.js"></script>
                    <![endif]-->


      
                    <style>
                    	#globalcontainer {
                      	position:					relative;
                        left:							0px;
                        top:							91px;
                        margin:						0 auto;
                        padding:					0 0 0 0;
                        width: 						100%;
                        height: 					1800px;
                        border: 					0px solid #565643;
                        z-index:					1;
                        /* background: 			url(http:/egenerations.com/common/img/backgrounds/background_gradient_blu-drk.gif) #146ADB repeat-x fixed top center; */
                        /* background: 			url(http://egenerations.com/common/img/backgrounds/page/artist.jpg) #1469db repeat-x fixed top center; */
                        /* background: 			url(http://sm0005.com/common/img/backgrounds/bg_gradient_red2blk.gif) #b11100 repeat-x fixed top center; */
                        /* background: 				url(http://sm0005.com/common/img/backgrounds/profile/female-1.jpg) #fffff no-repeat fixed top center; */

                        /*
                        background-color:				#ffffff;
                        background-image: 			url('http://sm0005.com/common/img/backgrounds/profile/female-4.jpg');
												background-repeat: 			no-repeat;
												background-position: 		0px 0px;
                        background-attachment: 	fixed;
                        */
                        

                        align:						center;
                        text-align:				center;
                    	}





                    </style>
      
      
      
      
      
                    <!-- <div id="globalcontainer" style="background: url(/common/img/backgrounds/page/<? echo $webpagebgimage; ?>) #1469db repeat-x fixed top center"> -->


<?
/*
                    <!-- primary picture -->
                    <div id="addon_image" style="border: 0px solid #ff0000; width: 275px; height: 707px; position: fixed; right: 0px; top: 0px; z-index: 1;">
											<img src="/common/img/bling/profile/upper-right-female-leg.png">
                    </div>
      							<!-- END photo panel -->
*/
?>



                    <!-- top bar COMPLETE -->
                    	<div id="topcontainer" style="background: url(/common/img/backgrounds/bg_gradient_lightblue2blk-mystuff.gif);">
														
														<?
															// check for Profile Owner - If YES, show notices regarding their profile ------------------------------------
															if($_SESSION['ActiveUser']['userid'] == $MemberProfile['userid']){
																?>
                              		<div id="ProfileOwnerNotice" style="border: 0px solid; width: 380px; height: 20px; position: absolute; top: 40px; left: 300px;">
                              			<font color="white" size="2"><font color="red"><B>NOTICE:</b></font>&nbsp;&nbsp;<i><b>This is how your Profile will look to other people</b></i></font>
                              		</div>

                              		<div id="ProfileOwnerNotice_IM" style="border: 0px solid; width: 320px; height: 20px; position: absolute; top: -6px; left: 620px; padding: 0 0 0 0; margin: 0 0 0 0;">
                              			<font style="font-size: 10px; color: #5d5d5d; line-height: 0px;"><i><b>Says "Instant Message Me" to Others (When IM = "Available")</b></i></font>
                              		</div>
																<?
															}
														?>

                    		<!-- <div id="icon"><img src="http://www.egenerations.com/common/img/icons/icon_webpage.png" width="96" height="82" alt="<? echo $MemberProfile['username']; ?>'s Profile"></div> -->
                    		<div id="paneltitle">
                    			<h2 style="color: #ffffff;">
                    				<?
                    					echo $MemberProfile['username'];
															echo (_onlineNowCheck($MemberProfile['ts_lastlogin']) == true ? '&nbsp;&nbsp;<font color="#ffcc00">Online Now!</font>':'');
                    				?>
                    			</h2>
                    		</div>
                    		
                    		

                    		

                    		<!--
                    		<div id="panel_overview_seeking">&nbsp;&nbsp;&nbsp;<font color="#ffffff"><b>I'm Seeking</b> <? echo $MemberProfile['seeking']; ?></font></div>
                    		<div id="panel_overview_interested">&nbsp;&nbsp;&nbsp;<font color="#ffffff"><b>Interested in</b> <? echo $MemberProfile['into']; ?></font></div>
                    		-->

                    			<?
                    				// MemberID of Profile Owner ---
                    				$MemberID	=	$_GET['_898a8as'];
                    				
                    				// cant IM Self && IM Recipient Must Have IM Available = true && Requester Cannot be on Recipient BLOCK list ---
                    				if( (_onlineNowCheck($MemberProfile['ts_lastlogin']) == true) && ($obj_Member->GetFriendStatus($MemberProfile['userid'], $_SESSION['ActiveUser']['userid']) != 'friend.block' && $MemberProfile['level'] != '3')  && ($MemberProfile['userid'] != $_SESSION['ActiveUser']['userid'])){

                    					if($obj_Member->GetIMStatus($MemberProfile['userid']) == '1'){

                      					// online now - offer instant message --
                      					echo '<div id="button" style="right: 30px;">';
                       					//echo '<input class="genericsubmit" type="submit" name="save" value="Instant Message Me" style="color: #ff0000; width: 200px;"  onclick="window.open(\'IM-'.$MemberID.'\',\'mywindow\',\'width=400,height=400\')">';

																	// check for existing IM Session between requester & Recipient ---
                         					if($obj_Member->IMRequest_R2($MemberID, $_SESSION['ActiveUser']['userid']) == 666){
                         						echo '<input class="genericsubmit" type="submit" name="IM_Session_Request'.$MemberID.'" id="IM_Session_Request'.$MemberID.'" value="IM in Progress" style="color: #ff0000; width: 200px;" disabled />';
                         					}else{
                         						echo '<input class="genericsubmit" type="submit" name="IM_Session_Request'.$MemberID.'" id="IM_Session_Request'.$MemberID.'" value="Instant Message Me" style="color: #ff0000; width: 200px;" onclick="InitiateIMRequest(\''.$MemberID.'\')" />';
                         					}
                       					
                      					echo '</div>';

                    					}else{

                      					// online now - offer instant message --
                      					echo '<div id="button" style="right: 30px;">';
                       					echo '<input class="genericsubmit" type="submit" name="save" value="Send Me Mail" onclick="location.href=\'#email\'">';
                      					echo '</div>';
                    					}

                    				}else{
                    					// offer send message ------------------
                    					echo '<div id="button" style="right: 30px;">';
                           			if($obj_Member->GetFriendStatus($MemberProfile['userid'], $_SESSION['ActiveUser']['userid']) == 'friend.block'){
                          				echo '<input class="genericsubmit" id="submit_emailme" type="submit" disabled="true" value="IM Not Available" />';
                          			}else{
                          				echo '<input class="genericsubmit" type="submit" name="save" value="Send Me Mail" onclick="location.href=\'#email\'">';
                          			}
                    					echo '</div>';
                    				}
                    			?>
                    	</div>
                    <!-- END top bar COMPLETE -->





                    <!-- primary picture -->
                    <div id="profilepic_panel">
      	         			<?
                      	$obj_Member->ImageDisplay_2($_SESSION['ActiveUser']['userid'], $MemberProfile['userid'], 3, 1, false);
                      
												if($MemberProfile['verified'] == true){
													echo '<div id="" style="position: absolute; top: -20px; left: -30px; height: 97px; width: 93px; border: 0px solid #ffffff;"><img src="common/img/icons/icon_verified_photos_93x97.png"></div>';
												}
											?>
                    </div>
      							<!-- END photo panel -->





                    <!-- contactme_panel -->
                    <div id="contactme_panel">

                    	<!-- <script type="text/javascript" src="common/js/sendmsg/profile-sendmsg.js"></script> -->

                    	<!-- <div id="contactme_panel_emailme">EMail Me</div> -->
                    	<div id="contactme_panel_emailme">
                    		<?
                    			//echo '<input class="genericsubmit" type="submit" name="save" value="EMail Me!" onclick="location.href=\'SendMsg-'.$MemberID.'\'">'; 
                    			//echo '<input class="genericsubmit" type="submit" name="save" value="EMail Me!" onclick="location.href=\'#label\'">'; 
                    			if($obj_Member->GetFriendStatus($MemberProfile['userid'], $_SESSION['ActiveUser']['userid']) == 'friend.block'){
                    				echo '<input class="genericsubmit" id="submit_emailme_locked" type="submit" disabled="true" value="Send a Gift!" />';
                    			}else{
                    				echo '<input class="genericsubmit" id="submit_emailme" type="submit" name="save" value="EMail Me!" onclick="window.location=\'#email\'">';	
                    			}
                    		?>
                    	</div>

                    </div>
      							<!-- END contactme_panel -->





                    <!-- my spec sheet  -->
                    			<div id="myspecsheet_panel">
                    				<div id="subcontainer_titlebar" style="background-color: #4c9feb;"><h2 style="color: #ffffff;">&nbsp;My Spec Sheet</h2></div>
                         		<table border="0">
                    					<tr>
                    						<td valign="top">
                               		<table border="0">

                                 		<tr>
                                   		<td width="110"><font class="typeblack16pt">Membership</font></td>
                                   		<td width="5"></td>
                                   		<td width="185">
                                   			<font class="typeblue13px">
                                   			<?
                                   				if($MemberProfile['membertype'] == 'Silver'){
                                   					echo 'Princess Premium';
                                   				}else{
                                   					echo ucwords($MemberProfile['membertype']);
                                   				}
                                   			?>
                                   			</font>
                                   		</td>
                               			</tr>

                                 		<tr>
                                   		<td><font class="typeblack16pt">Member Since</font></td>
                                   		<td width="5"></td>
                                   		<td> 
                                   			<font class="typeblue13px"><? echo $MemberProfile['joinedon']; ?></font>
                                   		</td>
                               			</tr>

                                 		<tr>
                                   		<td><font class="typeblack16pt">Age & Gender</font></td>
                                   		<td width="5"></td>
                                   		<td>
																				<font class="typeblue13px"><? echo $MemberProfile['dob'].' year old '.$MemberProfile['gender']; ?></font>
                                   		</td>
                               			</tr>

                                 		<tr>
                                   		<td><font class="typeblack16pt">Location</font></td>
                                   		<td width="5"></td>
                                   		<td>
                                   			<font class="typeblue13px"><? echo $obj_Member->GeoCodeLookup($MemberProfile['zipcode']); ?></font>
                                   		</td>
                               			</tr>

                                 		<tr>
                                   		<td><font class="typeblack16pt">Status</font></td>
                                   		<td width="5"></td>
                                   		<td>
      																	<font class="typeblue13px"><? echo $MemberProfile['status']; ?></font>
                                   		</td>
                               			</tr>
      
                                 		<tr>
                                   		<td><font class="typeblack16pt">Hotness</font></td>
                                   		<td width="5"></td>
                                   		<td>
      																	<font class="typeblue13px"><? echo $MemberProfile['hotness']; ?></font>
                                   		</td>
                               			</tr>
      
                                 		<tr>
                                   		<td><font class="typeblack16pt">Personality</font></td>
                                   		<td width="5"></td>
                                   		<td>
      																	<font class="typeblue13px"><? echo $MemberProfile['personality']; ?></font>
                                   		</td>
                               			</tr>
      
                               		</table>
                    						</td>
      
                    						<td width="8"></td>
      
                    						<td valign="top">
                               		<table border="0">
                                 		<tr>
                                   		<td width="85"><font class="typeblack16pt">Height</font></td>
                                   		<td width="5"></td>
                                   		<td width="185">
																				<font class="typeblue13px"><? echo $MemberProfile['height']; ?> </font>
                                   		</td>
                               			</tr>

                                 		<tr>
                                   		<td><font class="typeblack16pt">Body Type</font></td>
                                   		<td width="5"></td>
                                   		<td>
      																	<font class="typeblue13px"><? echo $MemberProfile['bodytype']; ?> </font>
                                   		</td>
                               			</tr>

                                 		<tr>
                                   		<td><font class="typeblack16pt">Hair Color</font></td>
                                   		<td width="5"></td>
                                   		<td>
      																	<font class="typeblue13px"><? echo $MemberProfile['haircolor']; ?> </font>
                                   		</td>
                               			</tr>

                                 		<tr>
                                   		<td><font class="typeblack16pt">Eye Color</font></td>
                                   		<td width="5"></td>
                                   		<td>
      																	<font class="typeblue13px"><? echo $MemberProfile['eyecolor']; ?> </font>
                                   		</td>
                               			</tr>

                                 		<tr>
                                   		<td><font class="typeblack16pt">Income</font></td>
                                   		<td width="5"></td>
                                   		<td>
      																	<font class="typeblue13px"><? echo $MemberProfile['income']; ?> </font>
                                   		</td>
                               			</tr>

                                 		<tr>
                                   		<td><font class="typeblack16pt">Profession</font></td>
                                   		<td width="5"></td>
                                   		<td>
      																	<font class="typeblue13px"><? echo $MemberProfile['profession']; ?> </font>
                                   		</td>
                               			</tr>

                                 		<tr>
                                   		<td><font class="typeblack16pt">Religion</font></td>
                                   		<td width="5"></td>
                                   		<td>
      																	<font class="typeblue13px"><? echo $MemberProfile['religion']; ?> </font>
                                   		</td>
                               			</tr>

                               		</table>
                    						</td>
                    				</table>
                    			</div>
                    <!-- END my spec sheet -->





      							<!-- sendmestuff_panel -->
<!--
            		  	<div id="sendmestuff_panel">
            		  		<div id="subcontainer_titlebar" style="background-color: #000000;"><h2 style="color: #ffffff;">&nbsp;Send a Gift&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(good conversation starter)</h2></div>
            		  		
            		  		<div id="sendmestuff_panel_optionA">
            		  			
            		  			<table border=0 cellspacing="0" cellpadding="1">

            		  				<tr>
            		  					<td colspan="2" align="left">&nbsp;&nbsp;<font style="font-size: 13px; font-color: #000000; font-style: bold;"><b>Cheap Date</b></font></td>
            		  				</tr>

            		  				<tr>
            		  					<td width="15"></td>
            		  					<td align="left">&nbsp;<font style="font-size: 12px; font-color: #000000;"><a href="">Wink</a> </font></td>
            		  				</tr>

            		  				<tr>
            		  					<td width="15"></td>
            		  					<td align="left">&nbsp;<font style="font-size: 12px; font-color: #000000;"><a href="">Smile</a> </font></td>
            		  				</tr>

            		  				<tr>
            		  					<td width="15"></td>
            		  					<td align="left">&nbsp;<font style="font-size: 12px; font-color: #000000;"><a href="">Stick of Gum</a> </font></td>
            		  				</tr>

            		  			</table>

            		  		</div>

            		  		<div id="sendmestuff_panel_optionB">
            		  			<table border=0 cellspacing="0" cellpadding="1">

            		  				<tr>
            		  					<td colspan="2" align="left">&nbsp;&nbsp;<font style="font-size: 13px; font-color: #000000; font-style: bold;"><b>Classy</b></font></td>
            		  				</tr>

            		  				<tr>
            		  					<td width="15"></td>
            		  					<td align="left">&nbsp;<font style="font-size: 12px; font-color: #000000;"><a href="">Martini</a> </font></td>
            		  				</tr>

            		  				<tr>
            		  					<td width="15"></td>
            		  					<td align="left">&nbsp;<font style="font-size: 12px; font-color: #000000;"><a href="">Lingerie</a> </font></td>
            		  				</tr>

            		  				<tr>
            		  					<td width="15"></td>
            		  					<td align="left">&nbsp;<font style="font-size: 12px; font-color: #000000;"><a href="">Diamond</a> </font></td>
            		  				</tr>

            		  			</table>
            		  		</div>

            		  		<div id="sendmestuff_panel_optionC">
            		  			<table border=0 cellspacing="0" cellpadding="1">

            		  				<tr>
            		  					<td colspan="2" align="left">&nbsp;&nbsp;<font style="font-size: 13px; font-color: #000000; font-style: bold;"><b>Naughty</b></font></td>
            		  				</tr>

            		  				<tr>
            		  					<td width="15"></td>
            		  					<td align="left">&nbsp;<font style="font-size: 12px; font-color: #000000;"><a href="">Handcuffs</a> </font></td>
            		  				</tr>

            		  				<tr>
            		  					<td width="15"></td>
            		  					<td align="left">&nbsp;<font style="font-size: 12px; font-color: #000000;"><a href="">Blindfold</a> </font></td>
            		  				</tr>

            		  				<tr>
            		  					<td width="15"></td>
            		  					<td align="left">&nbsp;<font style="font-size: 12px; font-color: #000000;"><a href="">Whip</a> </font></td>
            		  				</tr>

            		  			</table>
            		  		</div>


            		  		<div id="sendmestuff_panel_optionD">
            		  			<table border=0 cellspacing="0" cellpadding="1">

            		  				<tr>
            		  					<td colspan="2" align="left">&nbsp;&nbsp;<font style="font-size: 13px; font-color: #000000; font-style: bold;"><b>Nice</b></font></td>
            		  				</tr>

            		  				<tr>
            		  					<td width="15"></td>
            		  					<td align="left">&nbsp;<font style="font-size: 12px; font-color: #000000;"><a href="">Perfume</a> </font></td>
            		  				</tr>

            		  				<tr>
            		  					<td width="15"></td>
            		  					<td align="left">&nbsp;<font style="font-size: 12px; font-color: #000000;"><a href="">Flowers</a> </font></td>
            		  				</tr>

            		  				<tr>
            		  					<td width="15"></td>
            		  					<td align="left">&nbsp;<font style="font-size: 12px; font-color: #000000;"><a href="">Teddy Bear</a> </font></td>
            		  				</tr>

            		  			</table>
            		  		</div>


<?
/*
            		  		<table width="100%" height="100%">
            		  			<tr>
            		  				<td width="200"><a href="SendMsg-<? echo $obj_Member->Encrypt($MemberProfile['userid']); ?>">eMail Me</a></td>
            		  				<td width="200"><a href="Add2Friends-<? echo $obj_Member->Encrypt($MemberProfile['userid']); ?>">Add to Friends</a></td>
            		  			</tr>
            		  			<tr>
            		  				<td width="200"><!-- <a href="IM-<? echo $obj_Member->Encrypt($MemberProfile['userid']); ?>">IM Me</a> -->  <a href="" onClick="javascript: launchIM( '111', '222' ); return false;">IM Me</a></td>
            		  				<td width="200"><a href="Add2Fav-<? echo $obj_Member->Encrypt($MemberProfile['userid']); ?>">Add to Favorites</a></td>
            		  			</tr>
            		  		</table>
*/
?>

            		  	</div>
-->
            		  	<!-- END sendmestuff_panel -->




      							<!-- pictures -->
                    		<div id="photos_panel">
                    			<div id="subcontainer_level1_title" style="background-color: #4c9feb;"><h2 style="color: #ffffff;">&nbsp;Photos</h2></div>
      
                    			<div id="subcontainer_level1_data">
      	       							<!-- <input type="hidden" name="userid" id="userid" value=<? echo $uid; ?>> -->
               							<?
               								$obj_Member->ImageGallery($_SESSION['ActiveUser']['userid'], $MemberProfile['userid'], 1, 'ProfileViewer', $_SESSION['ActiveUser']['nudity']);
               							?>
                    			</div>
      
                    			<div id="subcontainer_level1_data_options">
      											<font class="typered18pt">Is <? echo ($MemberProfile['gender'] == 'Girl' ? 'She' : 'He') ?> Hot?</font>
      											<br>
      											Send a Message & Let <? echo ($MemberProfile['gender'] == 'Girl' ? 'Her' : 'Him') ?> Know
                    			</div>
      
                    		</div>
                    <!-- pictures COMPLETE -->
      
      
      
      

      
      
                    <!-- desires panel -->
                    			<div id="desires_panel">
                    				<div id="subcontainer_titlebar_shortA2" style="background-color: #4c9feb;"><h2 style="color: #ffffff;">&nbsp;Desires</h2></div><div id="subcontainer_titlebar_shortB2" style="background-color: #4c9feb;"><h2 style="color: #ffffff;">&nbsp;Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo ($MemberProfile['petpeeves'] == true ? 'Pet Peeves' : '') ?></h2></div>
                         		<table border="0">
                    					<tr>
                    						<td valign="top">
      
      														<!-- smoking -->
                               		<table border="0" width="340">
                                 		<tr>
                                   		<td width="100" valign="top">
                                   			<font class="typeblack16pt">Seeking</font>
                                   		</td>
                                   		<td>
																				<font class="typeblue13px"><? echo $obj_Member->RandomAnswersForEmpties($MemberProfile['seeking'], 'generic'); ?></font>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END smoking -->
      
      														<hr width="200">
      
      														<!-- smoking -->
                               		<table border="0" width="340">
                                 		<tr>
                                   		<td width="100" valign="top">
                                   			<font class="typeblack16pt">Interested In</font>
                                   		</td>
                                   		<td>
                                      	<font class="typeblue13px"><? echo $obj_Member->RandomAnswersForEmpties($MemberProfile['into'], 'generic'); ?></font>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END smoking -->
      
      														<hr width="200">
      
      														<!-- domestic skills -->
                               		<table border="0" width="340">
                                 		<tr>
                                   		<td width="100" valign="top">
                                   			<font class="typeblack16pt">Fav Flavor(s)</font>
                                   		</td>
                                   		<td>
																				<font class="typeblue13px"><? echo $obj_Member->RandomAnswersForEmpties($MemberProfile['favflavors'], 'generic'); ?></font>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END domestic skills -->
      
      
      														<hr width="240">
      
                    						</td>
                    						<td width="8"></td>
                    						<td valign="top" width="240">
      
      														<!-- smoking -->
                               		<table border="0" width="240">
                                 		<tr>
                                   		<td width="100%" valign="top">
                                   			<font class="typeblack16pt"><? echo $MemberProfile['smoking'].$MemberProfile['smokingdislike']; ?></font>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END smoking -->
      
      														<hr width="240">
      
      														<!-- smoking -->
                               		<table border="0" width="240">
                                 		<tr>
                                   		<td width="100%" valign="top">
                                   			<font class="typeblack16pt"><font class="typeblack16pt"><? echo $MemberProfile['drinking'].$MemberProfile['drinkdislike']; ?></font></font>
                                   		</td>
                              			</tr>
                               		</table>
      														<!-- END smoking -->
      
      														<hr width="240">
      
      														<!-- smoking -->
                               		<table border="0" width="240">
                                 		<tr>
                                   		<td width="100%" valign="top">
                                   			<font class="typeblack16pt"><font class="typeblack16pt"><? echo $MemberProfile['tattoos'].$MemberProfile['tattoosdislike']; ?></font></font>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END smoking -->
      
      														<hr width="240">
      
      														<!-- smoking -->
                               		<table border="0" width="240">
                                 		<tr>
                                   		<td width="100%" valign="top">
                                   			<font class="typeblack16pt"><font class="typeblack16pt"><? echo $MemberProfile['piercings'].$MemberProfile['piercedislike']; ?></font></font>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END smoking -->
      
                    						</td>
                    				</table>
                    			</div>
                    <!-- END desires panel-->







                    <!-- naughtyniceskill_panel -->
                    			<div id="naughtyniceskill_panel">
                    				<div id="subcontainer_titlebar_shortA"><h2 style="color: #ffc000;">&nbsp;Naughty Skills</h2></div><div id="subcontainer_titlebar_shortB"><h2 style="color: #ffc000;">&nbsp;Nice Skills</h2></div>
      
      											<table border="0">
                    					<tr>
                    						<td valign="top">
      
      
      														<!-- mouth skills -->
                               		<table border="0" width="300">
                                 		<tr>
                                   		<td width="90" valign="top">
                                   			<font class="typeblack16pt">Mouth</font></td>
                                   		<td>
                                   			<table border="0" cellpadding="0" cellspacing="0">
                                   				<tr>
                                   					<td width="200" valign="top" height="20">
                                         			<font class="typeblue13px"><? echo $obj_Member->RandomAnswersForEmpties($MemberProfile['mouth'], $Type = 'skills.naughty'); ?></font>
                                         		</td>
                                         	</tr>
                                        </table>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END mouth skills -->
      														
      														<hr width="280">
      														
      														<!-- tongue skills -->
                               		<table border="0" width="300">
                                 		<tr>
                                   		<td width="90" valign="top">
                                   			<font class="typeblack16pt">Tongue</font></td>
                                   		<td>
                                   			<table border="0" cellpadding="0" cellspacing="0">
                                   				<tr>
                                   					<td width="200" valign="top" height="20">
                                         			<font class="typeblue13px"><? echo $obj_Member->RandomAnswersForEmpties($MemberProfile['tongue'], $Type = 'skills.naughty'); ?></font>
                                         		</td>
                                         	</tr>
                                        </table>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END tongue skills -->

																	<hr width="280">

      														<!-- hands skills -->
                               		<table border="0" width="300">
                                 		<tr>
                                   		<td width="90" valign="top">
                                   			<font class="typeblack16pt">Hands</font></td>
                                   		<td>
                                   			<table border="0" cellpadding="0" cellspacing="0">
                                   				<tr>
                                   					<td width="200" valign="top" height="20">
                                         			<font class="typeblue13px"><? echo $obj_Member->RandomAnswersForEmpties($MemberProfile['hands'], $Type = 'skills.naughty'); ?></font>
                                         		</td>
                                         	</tr>
                                        </table>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END hands skills -->

																	<hr width="280">

      														<!-- butt skills -->
                               		<table border="0" width="300">
                                 		<tr>
                                   		<td width="90" valign="top">
                                   			<font class="typeblack16pt">Butt</font></td>
                                   		<td>
                                   			<table border="0" cellpadding="0" cellspacing="0">
                                   				<tr>
                                   					<td width="200" valign="top" height="20">
                                         			<font class="typeblue13px"><? echo $obj_Member->RandomAnswersForEmpties($MemberProfile['butt'], $Type = 'skills.naughty'); ?></font>
                                         		</td>
                                         	</tr>
                                        </table>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END butt skills -->

																	<hr width="280">

      														<!-- badness skills -->
                               		<table border="0" width="300">
                                 		<tr>
                                   		<td width="90" valign="top">
                                   			<font class="typeblack16pt">Badness</font></td>
                                   		<td>
                                   			<table border="0" cellpadding="0" cellspacing="0">
                                   				<tr>
                                   					<td width="200" valign="top" height="20">
                                         			<font class="typeblue13px"><? echo $obj_Member->RandomAnswersForEmpties($MemberProfile['badness'], $Type = 'skills.naughty'); ?></font>
                                         		</td>
                                         	</tr>
                                        </table>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END badness skills -->




                    						</td>
                    						<td width="3"></td>
                    						<td valign="top">
      
      														<!-- language skills -->
                               		<table border="0">
                                 		<tr>
                                   		<td width="100" valign="top">
                                   			<font class="typeblack16pt">Language(s)</font></td>
                                   		<td>
                                   			<table border="0" cellpadding="0" cellspacing="0">
                                   				<tr>
                                   					<td width="200" valign="top" height="20">
                                         			<font class="typeblue13px"><? echo $obj_Member->RandomAnswersForEmpties($MemberProfile['language'], $Type = 'skills.naughty'); ?></font>
                                         		</td>
                                         	</tr>
                                        </table>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END language skills -->
      
      														<hr width="280">
      
      														<!-- domestic skills -->
                               		<table border="0">
                                 		<tr>
                                   		<td width="100" valign="top">
                                   			<font class="typeblack16pt">Activities</font></td>
                                   		<td>
                                   			<table border="0" cellpadding="0" cellspacing="0">
                                   				<tr>
                                   					<td width="200" valign="top" height="20">
                                         			<font class="typeblue13px"><? echo $obj_Member->RandomAnswersForEmpties($MemberProfile['activities'], $Type = 'skills.naughty'); ?></font>
                                         		</td>
                                         	</tr>
                                        </table>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END domestic skills -->
      
      														<hr width="280">
      
      														<!-- domestic skills -->
                               		<table border="0">
                                 		<tr>
                                   		<td width="100" valign="top">
                                   			<font class="typeblack16pt">Domestic</font></td>
                                   		<td>
                                   			<table border="0" cellpadding="0" cellspacing="0">
                                   				<tr>
                                   					<td width="200" valign="top" height="20">
                                         			<font class="typeblue13px"><? echo $obj_Member->RandomAnswersForEmpties($MemberProfile['domestic'], $Type = 'skills.naughty'); ?></font>
                                         		</td>
                                         	</tr>
                                        </table>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END domestic skills -->

																	<hr width="280">

      														<!-- goodness skills -->
                               		<table border="0" width="300">
                                 		<tr>
                                   		<td width="100" valign="top">
                                   			<font class="typeblack16pt">Goodness</font></td>
                                   		<td>
                                   			<table border="0" cellpadding="0" cellspacing="0">
                                   				<tr>
                                   					<td width="200" valign="top" height="20">
                                         			<font class="typeblue13px"><? echo $obj_Member->RandomAnswersForEmpties($MemberProfile['goodness'], $Type = 'skills.naughty'); ?></font>
                                         		</td>
                                         	</tr>
                                        </table>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END goodness skills -->

                    						</td>
                    				</table>
      
      
                    			</div>
                    <!-- END naughtyniceskill_panel -->






                    <!-- aboutyouandme_panel -->
                    			<div id="aboutyouandme_panel">
                    				<div id="subcontainer_titlebar"><h2 style="color: #ffc000;">&nbsp;About Me & You</h2></div>
                         		<table border="0">
                           		<tr>
                           			<td width="80" valign="top"><font class="typeblack16pt">About Me</font></td>
                           			<td width="5"></td>
                           			<td><font class="typeblue13px"><? echo ($MemberProfile['aboutmeappvd'] == 1 ? $MemberProfile['aboutme']:'<font size="1" color="red"><i>Pending Review</i></font>'); ?></font></td>
                         			</tr>
                           		<tr>
                           			<td height="10" colspan="3"></td>
                        			</tr>                         			
                           		<tr>
                             		<td width="80" valign="top"><font class="typeblack16pt">About You</font></td>
                             		<td width="5"></td>
                             		<td><font class="typeblue13px"><? echo ($MemberProfile['aboutyouappvd'] == 1 ? $MemberProfile['aboutyou']:'<font size="1" color="red"><i>Pending Review</i></font>'); ?></font></td>
                         			</tr>
                         			<td><div id="datasave-profile-essay" style="top: 0px; right: 20px; position: absolute; border: 0px solid #000000; font-size: 22px; letter-spacing: -0.04em; font-weight: bold;	color: #ffd973;"></div></td>
                         		</table>
                    			</div>
                    <!-- END aboutyouandme_panel -->





                    <!-- fullgift_panel -->
                    			<!--
                    			<div id="fullgift_panel">
                    				<div id="subcontainer_titlebar"><h2 style="color: #ffc000;">&nbsp;Gifts</h2></div>
															<br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;<i>we're working on this right now</i>
                    			</div>
                    			-->
                    <!-- END fullgift_panel -->




                    <!-- emailme_panel -->
                    			
                    			<div id="emailme_panel">
                    				<div id="subcontainer_level1_title"><h2 style="color: #ffc000;">&nbsp;Message Me!</h2></div>
                         		<a name="email"></a>
                         		
                         			<div id="emailme_panel_dataset">
                            		<table border="0" height="275">
    
                               		<tr>
                               			<td valign="top"><font class="typeblack16pt">
                                 			<?
                                  			if($obj_Member->GetFriendStatus($MemberProfile['userid'], $_SESSION['ActiveUser']['userid']) == 'friend.block'){
                                  				echo '&nbsp;&nbsp;Mail <font color=red>Not Available</font> for this Member';
                                  			}else{
                                  				echo '&nbsp;&nbsp;Type Your Message Below';
                                  			}
                                 			?>                               				
                               				</font></td>
                            			</tr>
    
                               		<tr>
                                 		<td>
                                 			<?
                                  			if($obj_Member->GetFriendStatus($MemberProfile['userid'], $_SESSION['ActiveUser']['userid']) == 'friend.block'){
                                  				?> <textarea style="width: 290px;" class="generic" style="" disabled="true" name="email_body_via_profile_locked" id="email_body_via_profile_locked" cols="45" rows="7"></textarea> <?
                                  			}else{
                                  				?> <textarea style="width: 290px;" class="generic" style="" name="email_body_via_profile" id="email_body_via_profile" cols="45" rows="7"></textarea> <?
                                  			}
                                 			?>
                               			</td>
                             			</tr>
    
                               		<tr>
                                 		<td align="right">
                                 			<?
                                  			if($obj_Member->GetFriendStatus($MemberProfile['userid'], $_SESSION['ActiveUser']['userid']) == 'friend.block'){
                                  				?> <input type="submit" class="generic" value="Mail Not Available" disabled="true" /> <?
                                  			}else{
                                  				?> <input type="submit" class="generic" value="Send Message" onclick="SendEmail();" /> <?
                                  			}
                                 			?>
                                 		</td>
                             			</tr>
                             			
                             			<td><div id="datasave-profile-essay" style="top: 0px; right: 20px; position: absolute; border: 0px solid #000000; font-size: 22px; letter-spacing: -0.04em; font-weight: bold;	color: #ffd973;"></div></td>
                             		</table>
                         				
                         				<input type="hidden" id="profileviewer" value="<? echo $obj_Member->Encrypt($_SESSION['ActiveUser']['userid'], 'private'); ?>" />
                         				<input type="hidden" id="profileviewerusername" value="<? echo $_SESSION['ActiveUser']['username']; ?>" />
                         				<input type="hidden" id="profileowner" value="<? echo $_GET['_898a8as']; ?>" />
                         				<? $_SESSION['ActiveUser']['msgToken'] = md5(uniqid(rand(), true)); ?>
                         				<input type="hidden" id="profilemsgToken" value="<? echo $_SESSION['ActiveUser']['msgToken']; ?>" />
                         			</div>

                    			</div>
                    <!-- END emailme_panel -->


      
          					<!-- END html  -->
                  <?








  						
  						// Registered & NOT Paid -------------------------------------------
  						}elseif($obj_Member->MemberAuthorized == true && $obj_Member->MemberPaid == false){
  
  							require('common/html/html-subpage-base-header.php');

								$ProfileOwner_MemberID	=	$_GET['_898a8as'];

									echo '<script>';
									echo 'window.location="https://'.$_SERVER['SERVER_NAME'].'.com/Upgrade-'.$ProfileOwner_MemberID.'";';
									echo '</script>';

								// get member profile specific data ------------------------------
       					$MemberProfile					=	$obj_Member->GetMemberProfile_Defined($ProfileOwner_MemberID);



								// record profile view -------------------------------------------
								$obj_Member->MemberProfileAction($_SESSION['ActiveUser']['userid'], $obj_Member->Decrypt($ProfileOwner_MemberID));





                ?>

        					<!-- html  -->


        						<center>
        							<br><br><br><br>
        							<? 


												// PRIOR SUBSCRIBER - PROMPTED TO RE-UPGRADE ===================================================        
        								if($obj_Member->MemberPaidPrior == true){
        									?> 
        										<font class="greetinglarge">Membership Expired <br> <? echo 'Previous Product: '.$obj_Member->MemberPaidPriorProduct; ?></font>
        										<br><br>
        										<a href="Upgrade"><font class="greetinglarge">Click to Renew Your Subscription!</font></a>
        									<?




												// TO BE DEPRECIATED ===========================================================================
         								}else{
         									?>
         										<font class="greetinglarge"><? echo $MemberProfile['username']; ?> might wanna' Hook-Up with YOU!</font>
         										<br><br><br>
         										
         										<table style="background-color: #ffffff;">
															<tr>
																<td>
      	         									<?
																		//$obj_Member->ImageDisplay($MemberProfile['userid'], 1, 1);
																		$obj_Member->ImageDisplay_2($_SESSION['ActiveUser']['userid'], $MemberProfile['userid'], 2, 1, false);
                      						?>
																</td>
																
																<td valign="top">

      														<!-- age -->
                               		<table border="0" width="340">
                                 		<tr>
                                   		<td width="100" valign="top">
                                   			<font class="typeblack16pt"><? echo $MemberProfile['username']; ?></font>
                                   		</td>
                                   		<td>
																				<font class="typeblue13px"><? echo $MemberProfile['dob'].' year old '.$MemberProfile['gender']; ?></font>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END age -->

																</td>
															</tr>
														</table>



                    <!-- primary picture -->
                    <div id="profilepic_panel">

                    </div>
      							<!-- END photo panel -->


         										<br><br>
         										<a href="Upgrade-<? echo $ProfileOwner_MemberID; ?>"><font class="greetinglarge">Become a Subscriber & Connect with <? echo $MemberProfile['username']; ?>!</font></a>
         										<br><br>
														<a href="Upgrade-<? echo $ProfileOwner_MemberID; ?>"><font class="greetinglarge"><font size="4">EMail Her - Chat w/ Her - View her Pictures!</font></font></a>


         									<?
         								}

        							?>
        						</center>
        					<!-- END html  -->
                <?




  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false && $obj_Member->MemberPaid == false){
  
  							require('common/html/html-subpage-base-header.php');

  							// redirect to MyHome/SignUp Promo ---------
  							?>
									<!-- <script type="text/javascript">location="MyHome";</script> -->
								<?

								//signup form ------------------------------
								require('common/html/html-signup-form.php');
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	











    			// Search ================================================================================
        	case "member-Search":



        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						
  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true){
  							
  							
  							//$searchString	=	$_GET['_898a8as'];																																		// DEP.09.06.08.N8.used AJAX search in place of HREF
  							$_Browse	=	$_GET['_898a8as'];

  							// get last search - if not exist - set to default per seeking -
								$__LastSearch		=	$obj_Member->GetMemberLastSearch($_SESSION['ActiveUser']['userid'], $_SESSION['ActiveUser']['gender']);


								//$__URI_exploded	=	explode('-', $_SERVER['REQUEST_URI']);																							// DEP.09.06.08.N8.used AJAX search in place of HREF


                ?>
        					<!-- html  -->
        					
        					  <!-- style sheet -->
                    <link rel="stylesheet" href="common/css/search/search-core.css" type="text/css" media="all"/>

              			<!-- ajax profile editor -->
              			<!-- <script type="text/javascript" src="common/js/search/ajax-search.js"></script> -->

										<!-- gradient -->
										<!-- <script type="text/javascript" src="common/js/gradient/gradient.js"></script> -->

                    <style>
                    	#globalcontainer {
                      	position:					relative;
                        left:							0px;
                        top:							91px;
                        margin:						0 auto;
                        padding:					0 0 0 0;
                        width: 						100%;
                        height: 					2600px;
                        border: 					0px solid #565643;
                        z-index:					1;
                        /* background: 			url(http:/egenerations.com/common/img/backgrounds/background_gradient_blu-drk.gif) #146ADB repeat-x fixed top center; */
                        /* background: 			url(http://egenerations.com/common/img/index/background_gradient2.jpg) #1469db repeat-x fixed top center; */
                        background: 			url(/common/img/backgrounds/bg_gradient_red2blk.gif) #b11100 repeat-x fixed top center;
                        background-attachment: fixed;
                        align:						center;
                        text-align:				center;
                    	}
                    </style>
										



                    <!-- top bar COMPLETE -->
                    	<div id="topcontainer">
                    		<!-- <div id="icon"><img src="http://www.egenerations.com/common/img/icons/icon_webpage.png" width="96" height="82" alt="<? echo $MemberProfile['username']; ?>'s Profile"></div>
                    		<div id="paneltitle"><h2 style="color: black;">Search Utility</h2> </div>
                    		-->
                    		<!-- <div id="search-title"><font color="white"><b>Search Results for:</b> <i><font color="red"><? echo ucwords($searchString); ?></font></i></div> -->
                    		
                    		<!-- encrypted userid for secure Ajax -->
												<input type="hidden" id="search_current_userid" value="<? echo $obj_Member->Encrypt($_SESSION['ActiveUser']['userid'], 'private'); ?>">

                    		<!-- page -->
												<input type="hidden" id="search_current_page" value="<? echo $__LastSearch[6]; ?>">

                    		<!-- nudity mode -->
												<input type="hidden" id="search_nuditymode" value="<? echo $_SESSION['ActiveUser']['nudity']; ?>">

                    		<!-- browse referrer -->
												<input type="hidden" id="search_browse" value="<? echo $_Browse; ?>">												
												


                    		<!-- panel -->
                    		<div id="search_panel_1">

                    			<table width="100%" height="100%" border=0>
                    				<tr>
                    					<td height="15"><font size="3" color="#000000"><b>I'm a...</b></font></td>
                    				</tr>
                    				
                    				<tr>

                    					<td valign="top">

                    						<table>
                    							<tr>
                    								<td><font color="white">Gender</font></td>
                    								<td width="20"></td>
                    								<td>
                                    	<select name="search_gender" id="search_gender" class="genericsubmit16px" onchange="search_UTILITY();">
                                      	<option id="search_gender" value="1" <? echo ($__LastSearch[0] == 1 ? 'selected':''); ?> >Man</option>
                                      	<option id="search_gender" value="2" <? echo ($__LastSearch[0] == 2 ? 'selected':''); ?> >Woman</option>
                                      	<option id="search_gender" value="3" <? echo ($__LastSearch[0] == 3 ? 'selected':''); ?> >Couple</option>
                                      	<option id="search_gender" value="4" <? echo ($__LastSearch[0] == 4 ? 'selected':''); ?> >Transexual</option>
                                      	<!-- <option id="search_gender" value="5" <? echo ($__LastSearch[0] == 5 ? 'selected':''); ?>>Group</option> -->
                                      </select>
                                    </td>
                                  </tr>

                    							<tr>
                    								<td>
                    									<!-- spacer junk -->
                    									<table height="100%" cellpadding="0" cellspacing="0">
                    										<tr>
                    											<td height="100%">
																						<font color="#ffffff">Near</font>
																					</td>
																				</tr>
																				<tr>
																					<td height="15"></td>
																				</tr>
																			</table>
																			<!-- spacer junk -->

                    								</td>
                    								<td width="20"></td>
                    								<td>
                    									<!-- spacer junk -->
                    									<table cellpadding="0" cellspacing="0">
                    										<tr>
                    											<td>
																						<input type="text" size="5" id="search_zipcode" class="genericsubmit16px" maxlength="5" value="<? echo $__LastSearch[1]; ?>"/>
																					</td>
																				</tr>
																				<tr>
																					<td align="center"><font size="1" color="#f7ba00"><i>Enter ZIP CODE Above</i></font></td>
																				</tr>
																			</table>
																			<!-- spacer junk -->
                                    </td>
                                  </tr>
                                </table>
                    					</td>
                    				</tr>
                    			</table>

                    		</div>
                    		<!-- panel -->
                    		
                    		<!-- panel -->
                    		<div id="search_panel_2">

                    			<table border=0 width="100%" height="100%">
                    				<tr>
                    					<td height="15"><font size="3" color="#000000"><b>I'm Seeking...</b></font></td>
                    				</tr>
                    				
                    				<tr>
                    					<td valign="top" height="80">
																
																<!-- options -->
                          			<table border=0 height="100%">
                          				<tr>
                          					<td> <input type="checkbox" class="genericsubmit18px" id="search_seek_m" name="" value="1" <? echo (strpos($__LastSearch[2],'1',0) == '0' ? 'checked':''); ?> onclick="search_UTILITY();" /></td> <td><font color="white">Men</font></td>
                          					<td> <input type="checkbox" class="genericsubmit18px" id="search_seek_w" name="" value="1" <? echo (strpos($__LastSearch[2],'1',1) == '1' ? 'checked':''); ?> onclick="search_UTILITY();" /></td> <td><font color="white">Women</font></td>
                          				</tr>
                          				
                          				<tr>
                          					<td> <input type="checkbox" class="genericsubmit18px" id="search_seek_t" name="" value="1" <? echo (strpos($__LastSearch[2],'1',2) == '2' ? 'checked':''); ?> onclick="search_UTILITY();" /></td> <td><font color="white">Transexuals</font></td>
                          					<td> <input type="checkbox" class="genericsubmit18px" id="search_seek_c" name="" value="1" <? echo (strpos($__LastSearch[2],'1',3) == '3' ? 'checked':''); ?> onclick="search_UTILITY();" /></td> <td><font color="white">Couples</font></td>
                          				</tr>
                          			</table>
                          			<!-- options -->

                    					</td>
                    				</tr>
                    			</table>

                    		</div>
                    		<!-- panel -->
                    		
                    		
                    		<!-- panel -->
                    		<div id="search_panel_3">

                    			<table border=0 width="100%" height="100%">
                    				<tr>
                    					<td height="15"><font size="3" color="#000000"><b>Interested in...</b></font></td>
                    				</tr>
                    				
                    				<tr>
                    					<td valign="top">
																
																<!-- options -->
                          			<table border=0 width="100%" height="100%">
                          				<tr>
                          					<td> <input type="checkbox" class="genericsubmit18px" id="search_into_friends" name="" value="1" <? echo (strpos($__LastSearch[3],'1',0) == '0' ? 'checked':''); ?> onclick="search_UTILITY();" /></td> <td><font color="white">Friends</font></td>
                          					<td> <input type="checkbox" class="genericsubmit18px" id="search_into_flirting" name="" value="1" <? echo (strpos($__LastSearch[3],'1',1) == '1' ? 'checked':''); ?> onclick="search_UTILITY();" /></td> <td><font color="white">Flirting</font></td>
                          				</tr>
                          				
                          				<tr>
                          					<!-- <td> <input type="checkbox" class="genericsubmit18px" id="search_into_REMOVED" name="" value="1" <? echo (strpos($__LastSearch[3],'1',2) == '2' ? 'checked':''); ?> onclick="search_UTILITY();" /></td> <td><font color="white">REMOVED</font></td> -->
                          					<td> <input type="checkbox" class="genericsubmit18px" id="search_into_networking" name="" value="1" <? echo (strpos($__LastSearch[3],'1',4) == '4' ? 'checked':''); ?> onclick="search_UTILITY();" /></td> <td><font color="white">Networking</font></td>
                          					<td> <input type="checkbox" class="genericsubmit18px" id="search_into_relationship" name="" value="1" <? echo (strpos($__LastSearch[3],'1',3) == '3' ? 'checked':''); ?> onclick="search_UTILITY();" /></td> <td><font color="white">Relationship</font></td>
                          				</tr>
      
                          				<tr>
                          					
                          				</tr>
                          			</table>
                          			<!-- options -->

                    					</td>
                    				</tr>
                    			</table>

                    		</div>
												<!-- panel -->

												<!-- panel -->
                    		<div id="search_panel_4">

                    			<table border=0 width="100%" height="100%">
                    				<tr>
                    					<td height="15"><font size="3" color="#000000"><b>Who Are...</b></font></td>
                    				</tr>
                    				
                    				<tr>
                    					<td valign="top">
																
																<!-- options -->
                          			<table width="100%" height="100%">
                          				<tr>
                          					<td><font size="2" color="#000000"><b>Age <? /*echo strpos($__LastSearch[4],'18',0); */ ?></b></font></td>
                          					<td>
                                    	<select name="search-agemin" id="search-agemin" class="genericsubmit16px">
                                        <option name="search-agemin" id="search-agemin-18" value="18" <? echo (strpos($__LastSearch[4],'18',0) === 0 ? 'selected':''); ?>>18</option>
                                        <option name="search-agemin" id="search-agemin-19" value="19" <? echo (strpos($__LastSearch[4],'19',0) === 0 ? 'selected':''); ?>>19</option>
                                        <option name="search-agemin" id="search-agemin-20" value="20" <? echo (strpos($__LastSearch[4],'20',0) === 0 ? 'selected':''); ?>>20</option>
                                        <option name="search-agemin" id="search-agemin-21" value="21" <? echo (strpos($__LastSearch[4],'21',0) === 0 ? 'selected':''); ?>>21</option>
                                        <option name="search-agemin" id="search-agemin-22" value="22" <? echo (strpos($__LastSearch[4],'22',0) === 0 ? 'selected':''); ?>>22</option>
                                        <option name="search-agemin" id="search-agemin-23" value="23" <? echo (strpos($__LastSearch[4],'23',0) === 0 ? 'selected':''); ?>>23</option>
                                        <option name="search-agemin" id="search-agemin-24" value="24" <? echo (strpos($__LastSearch[4],'24',0) === 0 ? 'selected':''); ?>>24</option>
                                        <option name="search-agemin" id="search-agemin-25" value="25" <? echo (strpos($__LastSearch[4],'25',0) === 0 ? 'selected':''); ?>>25</option>
                                        <option name="search-agemin" id="search-agemin-26" value="26" <? echo (strpos($__LastSearch[4],'26',0) === 0 ? 'selected':''); ?>>26</option>
                                        <option name="search-agemin" id="search-agemin-27" value="27" <? echo (strpos($__LastSearch[4],'27',0) === 0 ? 'selected':''); ?>>27</option>
                                        <option name="search-agemin" id="search-agemin-28" value="28" <? echo (strpos($__LastSearch[4],'28',0) === 0 ? 'selected':''); ?>>28</option>
                                        <option name="search-agemin" id="search-agemin-29" value="29" <? echo (strpos($__LastSearch[4],'29',0) === 0 ? 'selected':''); ?>>29</option>
                                        <option name="search-agemin" id="search-agemin-30" value="30" <? echo (strpos($__LastSearch[4],'30',0) === 0 ? 'selected':''); ?>>30</option>
                                        <option name="search-agemin" id="search-agemin-31" value="31" <? echo (strpos($__LastSearch[4],'31',0) === 0 ? 'selected':''); ?>>31</option>
                                        <option name="search-agemin" id="search-agemin-32" value="32" <? echo (strpos($__LastSearch[4],'32',0) === 0 ? 'selected':''); ?>>32</option>
                                        <option name="search-agemin" id="search-agemin-33" value="33" <? echo (strpos($__LastSearch[4],'33',0) === 0 ? 'selected':''); ?>>33</option>
                                        <option name="search-agemin" id="search-agemin-34" value="34" <? echo (strpos($__LastSearch[4],'34',0) === 0 ? 'selected':''); ?>>34</option>
                                        <option name="search-agemin" id="search-agemin-35" value="35" <? echo (strpos($__LastSearch[4],'35',0) === 0 ? 'selected':''); ?>>35</option>
                                        <option name="search-agemin" id="search-agemin-36" value="36" <? echo (strpos($__LastSearch[4],'36',0) === 0 ? 'selected':''); ?>>36</option>
                                        <option name="search-agemin" id="search-agemin-37" value="37" <? echo (strpos($__LastSearch[4],'37',0) === 0 ? 'selected':''); ?>>37</option>
                                        <option name="search-agemin" id="search-agemin-38" value="38" <? echo (strpos($__LastSearch[4],'38',0) === 0 ? 'selected':''); ?>>38</option>
                                        <option name="search-agemin" id="search-agemin-39" value="39" <? echo (strpos($__LastSearch[4],'39',0) === 0 ? 'selected':''); ?>>39</option>
                                        <option name="search-agemin" id="search-agemin-40" value="40" <? echo (strpos($__LastSearch[4],'40',0) === 0 ? 'selected':''); ?>>40</option>
                                        <option name="search-agemin" id="search-agemin-41" value="41" <? echo (strpos($__LastSearch[4],'41',0) === 0 ? 'selected':''); ?>>41</option>
                                        <option name="search-agemin" id="search-agemin-42" value="42" <? echo (strpos($__LastSearch[4],'42',0) === 0 ? 'selected':''); ?>>42</option>
                                        <option name="search-agemin" id="search-agemin-43" value="43" <? echo (strpos($__LastSearch[4],'43',0) === 0 ? 'selected':''); ?>>43</option>
                                        <option name="search-agemin" id="search-agemin-44" value="44" <? echo (strpos($__LastSearch[4],'44',0) === 0 ? 'selected':''); ?>>44</option>
                                        <option name="search-agemin" id="search-agemin-45" value="45" <? echo (strpos($__LastSearch[4],'45',0) === 0 ? 'selected':''); ?>>45</option>
                                        <option name="search-agemin" id="search-agemin-46" value="46" <? echo (strpos($__LastSearch[4],'46',0) === 0 ? 'selected':''); ?>>46</option>
                                        <option name="search-agemin" id="search-agemin-47" value="47" <? echo (strpos($__LastSearch[4],'47',0) === 0 ? 'selected':''); ?>>47</option>
                                        <option name="search-agemin" id="search-agemin-48" value="48" <? echo (strpos($__LastSearch[4],'48',0) === 0 ? 'selected':''); ?>>48</option>
                                        <option name="search-agemin" id="search-agemin-49" value="49" <? echo (strpos($__LastSearch[4],'49',0) === 0 ? 'selected':''); ?>>49</option>
                                        <option name="search-agemin" id="search-agemin-50" value="50" <? echo (strpos($__LastSearch[4],'50',0) === 0 ? 'selected':''); ?>>50</option>
                                        <option name="search-agemin" id="search-agemin-51" value="51" <? echo (strpos($__LastSearch[4],'51',0) === 0 ? 'selected':''); ?>>51</option>
                                        <option name="search-agemin" id="search-agemin-52" value="52" <? echo (strpos($__LastSearch[4],'52',0) === 0 ? 'selected':''); ?>>52</option>
                                        <option name="search-agemin" id="search-agemin-53" value="53" <? echo (strpos($__LastSearch[4],'53',0) === 0 ? 'selected':''); ?>>53</option>
                                        <option name="search-agemin" id="search-agemin-54" value="54" <? echo (strpos($__LastSearch[4],'54',0) === 0 ? 'selected':''); ?>>54</option>
                                        <option name="search-agemin" id="search-agemin-55" value="55" <? echo (strpos($__LastSearch[4],'55',0) === 0 ? 'selected':''); ?>>55</option>
                                        <option name="search-agemin" id="search-agemin-56" value="56" <? echo (strpos($__LastSearch[4],'56',0) === 0 ? 'selected':''); ?>>56</option>
                                        <option name="search-agemin" id="search-agemin-57" value="57" <? echo (strpos($__LastSearch[4],'57',0) === 0 ? 'selected':''); ?>>57</option>
                                        <option name="search-agemin" id="search-agemin-58" value="58" <? echo (strpos($__LastSearch[4],'58',0) === 0 ? 'selected':''); ?>>58</option>
                                        <option name="search-agemin" id="search-agemin-59" value="59" <? echo (strpos($__LastSearch[4],'59',0) === 0 ? 'selected':''); ?>>59</option>
                                        <option name="search-agemin" id="search-agemin-60" value="60" <? echo (strpos($__LastSearch[4],'60',0) === 0 ? 'selected':''); ?>>60</option>
                                        <option name="search-agemin" id="search-agemin-61" value="61" <? echo (strpos($__LastSearch[4],'61',0) === 0 ? 'selected':''); ?>>61</option>
                                        <option name="search-agemin" id="search-agemin-62" value="62" <? echo (strpos($__LastSearch[4],'62',0) === 0 ? 'selected':''); ?>>62</option>
                                        <option name="search-agemin" id="search-agemin-63" value="63" <? echo (strpos($__LastSearch[4],'63',0) === 0 ? 'selected':''); ?>>63</option>
                                        <option name="search-agemin" id="search-agemin-64" value="64" <? echo (strpos($__LastSearch[4],'64',0) === 0 ? 'selected':''); ?>>64</option>
                                        <option name="search-agemin" id="search-agemin-65" value="65" <? echo (strpos($__LastSearch[4],'65',0) === 0 ? 'selected':''); ?>>65</option>
                                        <option name="search-agemin" id="search-agemin-66" value="66" <? echo (strpos($__LastSearch[4],'66',0) === 0 ? 'selected':''); ?>>66</option>
                                        <option name="search-agemin" id="search-agemin-67" value="67" <? echo (strpos($__LastSearch[4],'67',0) === 0 ? 'selected':''); ?>>67</option>
                                        <option name="search-agemin" id="search-agemin-68" value="68" <? echo (strpos($__LastSearch[4],'68',0) === 0 ? 'selected':''); ?>>68</option>
                                        <option name="search-agemin" id="search-agemin-69" value="69" <? echo (strpos($__LastSearch[4],'69',0) === 0 ? 'selected':''); ?>>69</option>
                                        <option name="search-agemin" id="search-agemin-70" value="70" <? echo (strpos($__LastSearch[4],'70',0) === 0 ? 'selected':''); ?>>70</option>
                                        <option name="search-agemin" id="search-agemin-71" value="71" <? echo (strpos($__LastSearch[4],'71',0) === 0 ? 'selected':''); ?>>71</option>
                                        <option name="search-agemin" id="search-agemin-72" value="72" <? echo (strpos($__LastSearch[4],'72',0) === 0 ? 'selected':''); ?>>72</option>
                                        <option name="search-agemin" id="search-agemin-73" value="73" <? echo (strpos($__LastSearch[4],'73',0) === 0 ? 'selected':''); ?>>73</option>
                                        <option name="search-agemin" id="search-agemin-74" value="74" <? echo (strpos($__LastSearch[4],'74',0) === 0 ? 'selected':''); ?>>74</option>
                                        <option name="search-agemin" id="search-agemin-75" value="75" <? echo (strpos($__LastSearch[4],'75',0) === 0 ? 'selected':''); ?>>75</option>
                                        <option name="search-agemin" id="search-agemin-76" value="76" <? echo (strpos($__LastSearch[4],'76',0) === 0 ? 'selected':''); ?>>76</option>
                                        <option name="search-agemin" id="search-agemin-77" value="77" <? echo (strpos($__LastSearch[4],'77',0) === 0 ? 'selected':''); ?>>77</option>
                                        <option name="search-agemin" id="search-agemin-78" value="78" <? echo (strpos($__LastSearch[4],'78',0) === 0 ? 'selected':''); ?>>78</option>
                                        <option name="search-agemin" id="search-agemin-79" value="79" <? echo (strpos($__LastSearch[4],'79',0) === 0 ? 'selected':''); ?>>79</option>
                                        <option name="search-agemin" id="search-agemin-80" value="80" <? echo (strpos($__LastSearch[4],'80',0) === 0 ? 'selected':''); ?>>80</option>
                                        <option name="search-agemin" id="search-agemin-81" value="81" <? echo (strpos($__LastSearch[4],'81',0) === 0 ? 'selected':''); ?>>81</option>
                                        <option name="search-agemin" id="search-agemin-82" value="82" <? echo (strpos($__LastSearch[4],'82',0) === 0 ? 'selected':''); ?>>82</option>
                                        <option name="search-agemin" id="search-agemin-83" value="83" <? echo (strpos($__LastSearch[4],'83',0) === 0 ? 'selected':''); ?>>83</option>
                                        <option name="search-agemin" id="search-agemin-84" value="84" <? echo (strpos($__LastSearch[4],'84',0) === 0 ? 'selected':''); ?>>84</option>
                                        <option name="search-agemin" id="search-agemin-85" value="85" <? echo (strpos($__LastSearch[4],'85',0) === 0 ? 'selected':''); ?>>85</option>
                                        <option name="search-agemin" id="search-agemin-86" value="86" <? echo (strpos($__LastSearch[4],'86',0) === 0 ? 'selected':''); ?>>86</option>
                                        <option name="search-agemin" id="search-agemin-87" value="87" <? echo (strpos($__LastSearch[4],'87',0) === 0 ? 'selected':''); ?>>87</option>
                                        <option name="search-agemin" id="search-agemin-88" value="88" <? echo (strpos($__LastSearch[4],'88',0) === 0 ? 'selected':''); ?>>88</option>
                                        <option name="search-agemin" id="search-agemin-89" value="89" <? echo (strpos($__LastSearch[4],'89',0) === 0 ? 'selected':''); ?>>89</option>
                                        <option name="search-agemin" id="search-agemin-90" value="90" <? echo (strpos($__LastSearch[4],'90',0) === 0 ? 'selected':''); ?>>90</option>
                                        <option name="search-agemin" id="search-agemin-91" value="91" <? echo (strpos($__LastSearch[4],'91',0) === 0 ? 'selected':''); ?>>91</option>
                                        <option name="search-agemin" id="search-agemin-92" value="92" <? echo (strpos($__LastSearch[4],'92',0) === 0 ? 'selected':''); ?>>92</option>
                                        <option name="search-agemin" id="search-agemin-93" value="93" <? echo (strpos($__LastSearch[4],'93',0) === 0 ? 'selected':''); ?>>93</option>
                                        <option name="search-agemin" id="search-agemin-94" value="94" <? echo (strpos($__LastSearch[4],'94',0) === 0 ? 'selected':''); ?>>94</option>
                                        <option name="search-agemin" id="search-agemin-95" value="95" <? echo (strpos($__LastSearch[4],'95',0) === 0 ? 'selected':''); ?>>95</option>
                                        <option name="search-agemin" id="search-agemin-96" value="96" <? echo (strpos($__LastSearch[4],'96',0) === 0 ? 'selected':''); ?>>96</option>
                                        <option name="search-agemin" id="search-agemin-97" value="97" <? echo (strpos($__LastSearch[4],'97',0) === 0 ? 'selected':''); ?>>97</option>
                                        <option name="search-agemin" id="search-agemin-98" value="98" <? echo (strpos($__LastSearch[4],'98',0) === 0 ? 'selected':''); ?>>98</option>
                                        <option name="search-agemin" id="search-agemin-99" value="99" <? echo (strpos($__LastSearch[4],'99',0) === 0 ? 'selected':''); ?>>99</option>
                                      	
                                      </select>
                          					</td>
                          					<td><font color="#000000"><b>to</b></font></td>
                          					<td>
                                    	<select name="search-agemax" id="search-agemax" class="genericsubmit16px">
                                        <option name="search-agemax" id="search-agemax-18" value="18" <? echo (strpos($__LastSearch[4],'18',2) === 2 ? 'selected':''); ?>>18</option>
                                        <option name="search-agemax" id="search-agemax-19" value="19" <? echo (strpos($__LastSearch[4],'19',2) === 2 ? 'selected':''); ?>>19</option>
                                        <option name="search-agemax" id="search-agemax-20" value="20" <? echo (strpos($__LastSearch[4],'20',2) === 2 ? 'selected':''); ?>>20</option>
                                        <option name="search-agemax" id="search-agemax-21" value="21" <? echo (strpos($__LastSearch[4],'21',2) === 2 ? 'selected':''); ?>>21</option>
                                        <option name="search-agemax" id="search-agemax-22" value="22" <? echo (strpos($__LastSearch[4],'22',2) === 2 ? 'selected':''); ?>>22</option>
                                        <option name="search-agemax" id="search-agemax-23" value="23" <? echo (strpos($__LastSearch[4],'23',2) === 2 ? 'selected':''); ?>>23</option>
                                        <option name="search-agemax" id="search-agemax-24" value="24" <? echo (strpos($__LastSearch[4],'24',2) === 2 ? 'selected':''); ?>>24</option>
                                        <option name="search-agemax" id="search-agemax-25" value="25" <? echo (strpos($__LastSearch[4],'25',2) === 2 ? 'selected':''); ?>>25</option>
                                        <option name="search-agemax" id="search-agemax-26" value="26" <? echo (strpos($__LastSearch[4],'26',2) === 2 ? 'selected':''); ?>>26</option>
                                        <option name="search-agemax" id="search-agemax-27" value="27" <? echo (strpos($__LastSearch[4],'27',2) === 2 ? 'selected':''); ?>>27</option>
                                        <option name="search-agemax" id="search-agemax-28" value="28" <? echo (strpos($__LastSearch[4],'28',2) === 2 ? 'selected':''); ?>>28</option>
                                        <option name="search-agemax" id="search-agemax-29" value="29" <? echo (strpos($__LastSearch[4],'29',2) === 2 ? 'selected':''); ?>>29</option>
                                        <option name="search-agemax" id="search-agemax-30" value="30" <? echo (strpos($__LastSearch[4],'30',2) === 2 ? 'selected':''); ?>>30</option>
                                        <option name="search-agemax" id="search-agemax-31" value="31" <? echo (strpos($__LastSearch[4],'31',2) === 2 ? 'selected':''); ?>>31</option>
                                        <option name="search-agemax" id="search-agemax-32" value="32" <? echo (strpos($__LastSearch[4],'32',2) === 2 ? 'selected':''); ?>>32</option>
                                        <option name="search-agemax" id="search-agemax-33" value="33" <? echo (strpos($__LastSearch[4],'33',2) === 2 ? 'selected':''); ?>>33</option>
                                        <option name="search-agemax" id="search-agemax-34" value="34" <? echo (strpos($__LastSearch[4],'34',2) === 2 ? 'selected':''); ?>>34</option>
                                        <option name="search-agemax" id="search-agemax-35" value="35" <? echo (strpos($__LastSearch[4],'35',2) === 2 ? 'selected':''); ?>>35</option>
                                        <option name="search-agemax" id="search-agemax-36" value="36" <? echo (strpos($__LastSearch[4],'36',2) === 2 ? 'selected':''); ?>>36</option>
                                        <option name="search-agemax" id="search-agemax-37" value="37" <? echo (strpos($__LastSearch[4],'37',2) === 2 ? 'selected':''); ?>>37</option>
                                        <option name="search-agemax" id="search-agemax-38" value="38" <? echo (strpos($__LastSearch[4],'38',2) === 2 ? 'selected':''); ?>>38</option>
                                        <option name="search-agemax" id="search-agemax-39" value="39" <? echo (strpos($__LastSearch[4],'39',2) === 2 ? 'selected':''); ?>>39</option>
                                        <option name="search-agemax" id="search-agemax-40" value="40" <? echo (strpos($__LastSearch[4],'40',2) === 2 ? 'selected':''); ?>>40</option>
                                        <option name="search-agemax" id="search-agemax-41" value="41" <? echo (strpos($__LastSearch[4],'41',2) === 2 ? 'selected':''); ?>>41</option>
                                        <option name="search-agemax" id="search-agemax-42" value="42" <? echo (strpos($__LastSearch[4],'42',2) === 2 ? 'selected':''); ?>>42</option>
                                        <option name="search-agemax" id="search-agemax-43" value="43" <? echo (strpos($__LastSearch[4],'43',2) === 2 ? 'selected':''); ?>>43</option>
                                        <option name="search-agemax" id="search-agemax-44" value="44" <? echo (strpos($__LastSearch[4],'44',2) === 2 ? 'selected':''); ?>>44</option>
                                        <option name="search-agemax" id="search-agemax-45" value="45" <? echo (strpos($__LastSearch[4],'45',2) === 2 ? 'selected':''); ?>>45</option>
                                        <option name="search-agemax" id="search-agemax-46" value="46" <? echo (strpos($__LastSearch[4],'46',2) === 2 ? 'selected':''); ?>>46</option>
                                        <option name="search-agemax" id="search-agemax-47" value="47" <? echo (strpos($__LastSearch[4],'47',2) === 2 ? 'selected':''); ?>>47</option>
                                        <option name="search-agemax" id="search-agemax-48" value="48" <? echo (strpos($__LastSearch[4],'48',2) === 2 ? 'selected':''); ?>>48</option>
                                        <option name="search-agemax" id="search-agemax-49" value="49" <? echo (strpos($__LastSearch[4],'49',2) === 2 ? 'selected':''); ?>>49</option>
                                        <option name="search-agemax" id="search-agemax-50" value="50" <? echo (strpos($__LastSearch[4],'50',2) === 2 ? 'selected':''); ?>>50</option>
                                        <option name="search-agemax" id="search-agemax-51" value="51" <? echo (strpos($__LastSearch[4],'51',2) === 2 ? 'selected':''); ?>>51</option>
                                        <option name="search-agemax" id="search-agemax-52" value="52" <? echo (strpos($__LastSearch[4],'52',2) === 2 ? 'selected':''); ?>>52</option>
                                        <option name="search-agemax" id="search-agemax-53" value="53" <? echo (strpos($__LastSearch[4],'53',2) === 2 ? 'selected':''); ?>>53</option>
                                        <option name="search-agemax" id="search-agemax-54" value="54" <? echo (strpos($__LastSearch[4],'54',2) === 2 ? 'selected':''); ?>>54</option>
                                        <option name="search-agemax" id="search-agemax-55" value="55" <? echo (strpos($__LastSearch[4],'55',2) === 2 ? 'selected':''); ?>>55</option>
                                        <option name="search-agemax" id="search-agemax-56" value="56" <? echo (strpos($__LastSearch[4],'56',2) === 2 ? 'selected':''); ?>>56</option>
                                        <option name="search-agemax" id="search-agemax-57" value="57" <? echo (strpos($__LastSearch[4],'57',2) === 2 ? 'selected':''); ?>>57</option>
                                        <option name="search-agemax" id="search-agemax-58" value="58" <? echo (strpos($__LastSearch[4],'58',2) === 2 ? 'selected':''); ?>>58</option>
                                        <option name="search-agemax" id="search-agemax-59" value="59" <? echo (strpos($__LastSearch[4],'59',2) === 2 ? 'selected':''); ?>>59</option>
                                        <option name="search-agemax" id="search-agemax-60" value="60" <? echo (strpos($__LastSearch[4],'60',2) === 2 ? 'selected':''); ?>>60</option>
                                        <option name="search-agemax" id="search-agemax-61" value="61" <? echo (strpos($__LastSearch[4],'61',2) === 2 ? 'selected':''); ?>>61</option>
                                        <option name="search-agemax" id="search-agemax-62" value="62" <? echo (strpos($__LastSearch[4],'62',2) === 2 ? 'selected':''); ?>>62</option>
                                        <option name="search-agemax" id="search-agemax-63" value="63" <? echo (strpos($__LastSearch[4],'63',2) === 2 ? 'selected':''); ?>>63</option>
                                        <option name="search-agemax" id="search-agemax-64" value="64" <? echo (strpos($__LastSearch[4],'64',2) === 2 ? 'selected':''); ?>>64</option>
                                        <option name="search-agemax" id="search-agemax-65" value="65" <? echo (strpos($__LastSearch[4],'65',2) === 2 ? 'selected':''); ?>>65</option>
                                        <option name="search-agemax" id="search-agemax-66" value="66" <? echo (strpos($__LastSearch[4],'66',2) === 2 ? 'selected':''); ?>>66</option>
                                        <option name="search-agemax" id="search-agemax-67" value="67" <? echo (strpos($__LastSearch[4],'67',2) === 2 ? 'selected':''); ?>>67</option>
                                        <option name="search-agemax" id="search-agemax-68" value="68" <? echo (strpos($__LastSearch[4],'68',2) === 2 ? 'selected':''); ?>>68</option>
                                        <option name="search-agemax" id="search-agemax-69" value="69" <? echo (strpos($__LastSearch[4],'69',2) === 2 ? 'selected':''); ?>>69</option>
                                        <option name="search-agemax" id="search-agemax-70" value="70" <? echo (strpos($__LastSearch[4],'70',2) === 2 ? 'selected':''); ?>>70</option>
                                        <option name="search-agemax" id="search-agemax-71" value="71" <? echo (strpos($__LastSearch[4],'71',2) === 2 ? 'selected':''); ?>>71</option>
                                        <option name="search-agemax" id="search-agemax-72" value="72" <? echo (strpos($__LastSearch[4],'72',2) === 2 ? 'selected':''); ?>>72</option>
                                        <option name="search-agemax" id="search-agemax-73" value="73" <? echo (strpos($__LastSearch[4],'73',2) === 2 ? 'selected':''); ?>>73</option>
                                        <option name="search-agemax" id="search-agemax-74" value="74" <? echo (strpos($__LastSearch[4],'74',2) === 2 ? 'selected':''); ?>>74</option>
                                        <option name="search-agemax" id="search-agemax-75" value="75" <? echo (strpos($__LastSearch[4],'75',2) === 2 ? 'selected':''); ?>>75</option>
                                        <option name="search-agemax" id="search-agemax-76" value="76" <? echo (strpos($__LastSearch[4],'76',2) === 2 ? 'selected':''); ?>>76</option>
                                        <option name="search-agemax" id="search-agemax-77" value="77" <? echo (strpos($__LastSearch[4],'77',2) === 2 ? 'selected':''); ?>>77</option>
                                        <option name="search-agemax" id="search-agemax-78" value="78" <? echo (strpos($__LastSearch[4],'78',2) === 2 ? 'selected':''); ?>>78</option>
                                        <option name="search-agemax" id="search-agemax-79" value="79" <? echo (strpos($__LastSearch[4],'79',2) === 2 ? 'selected':''); ?>>79</option>
                                        <option name="search-agemax" id="search-agemax-80" value="80" <? echo (strpos($__LastSearch[4],'80',2) === 2 ? 'selected':''); ?>>80</option>
                                        <option name="search-agemax" id="search-agemax-81" value="81" <? echo (strpos($__LastSearch[4],'81',2) === 2 ? 'selected':''); ?>>81</option>
                                        <option name="search-agemax" id="search-agemax-82" value="82" <? echo (strpos($__LastSearch[4],'82',2) === 2 ? 'selected':''); ?>>82</option>
                                        <option name="search-agemax" id="search-agemax-83" value="83" <? echo (strpos($__LastSearch[4],'83',2) === 2 ? 'selected':''); ?>>83</option>
                                        <option name="search-agemax" id="search-agemax-84" value="84" <? echo (strpos($__LastSearch[4],'84',2) === 2 ? 'selected':''); ?>>84</option>
                                        <option name="search-agemax" id="search-agemax-85" value="85" <? echo (strpos($__LastSearch[4],'85',2) === 2 ? 'selected':''); ?>>85</option>
                                        <option name="search-agemax" id="search-agemax-86" value="86" <? echo (strpos($__LastSearch[4],'86',2) === 2 ? 'selected':''); ?>>86</option>
                                        <option name="search-agemax" id="search-agemax-87" value="87" <? echo (strpos($__LastSearch[4],'87',2) === 2 ? 'selected':''); ?>>87</option>
                                        <option name="search-agemax" id="search-agemax-88" value="88" <? echo (strpos($__LastSearch[4],'88',2) === 2 ? 'selected':''); ?>>88</option>
                                        <option name="search-agemax" id="search-agemax-89" value="89" <? echo (strpos($__LastSearch[4],'89',2) === 2 ? 'selected':''); ?>>89</option>
                                        <option name="search-agemax" id="search-agemax-90" value="90" <? echo (strpos($__LastSearch[4],'90',2) === 2 ? 'selected':''); ?>>90</option>
                                        <option name="search-agemax" id="search-agemax-91" value="91" <? echo (strpos($__LastSearch[4],'91',2) === 2 ? 'selected':''); ?>>91</option>
                                        <option name="search-agemax" id="search-agemax-92" value="92" <? echo (strpos($__LastSearch[4],'92',2) === 2 ? 'selected':''); ?>>92</option>
                                        <option name="search-agemax" id="search-agemax-93" value="93" <? echo (strpos($__LastSearch[4],'93',2) === 2 ? 'selected':''); ?>>93</option>
                                        <option name="search-agemax" id="search-agemax-94" value="94" <? echo (strpos($__LastSearch[4],'94',2) === 2 ? 'selected':''); ?>>94</option>
                                        <option name="search-agemax" id="search-agemax-95" value="95" <? echo (strpos($__LastSearch[4],'95',2) === 2 ? 'selected':''); ?>>95</option>
                                        <option name="search-agemax" id="search-agemax-96" value="96" <? echo (strpos($__LastSearch[4],'96',2) === 2 ? 'selected':''); ?>>96</option>
                                        <option name="search-agemax" id="search-agemax-97" value="97" <? echo (strpos($__LastSearch[4],'97',2) === 2 ? 'selected':''); ?>>97</option>
                                        <option name="search-agemax" id="search-agemax-98" value="98" <? echo (strpos($__LastSearch[4],'98',2) === 2 ? 'selected':''); ?>>98</option>
                                        <option name="search-agemax" id="search-agemax-99" value="99" <? echo (strpos($__LastSearch[4],'99',2) === 2 ? 'selected':''); ?>>99</option>
                                      </select>
                          					</td>
                          				</tr>
                          				
                          				<tr>
                          					<td colspan="4">
                                			<table>
                                				<tr>
                                					<td> <input type="checkbox" class="generic" id="search_option_onlinenow" name="" value="1" <? echo (strpos($__LastSearch[5],'1',0) === 0 ? 'checked':''); ?> onclick="search_UTILITY();" /></td> <td><font color="white">Online Now</font></td>
                                				</tr>
                                				<tr>
                                					<td> <input type="checkbox" class="generic" id="search_option_memberwpics" name="" value="1" <? echo (strpos($__LastSearch[5],'1',1) === 1 ? 'checked':''); ?> onclick="search_UTILITY();" /></td> <td><font color="white">Users with Photos</font></td>
                                				</tr>
                                				<tr>
                                					<td> <input type="checkbox" class="generic" id="search_option_verifiedpics" name="" value="1" <? echo (strpos($__LastSearch[5],'1',2) === 2 ? 'checked':''); ?> onclick="search_UTILITY();" /></td> <td><font color="white">Verified Photos</font></td>
                                				</tr>
                                			</table>
                          					</td>
                          				</tr>
                          			</table>
                          			<!-- options -->

                    					</td>
                    				</tr>
                    			</table>

                    		</div>
												<!-- panel -->
												
                    		<div id="search-popular_searches">

												<!--
													<div id="search-shownum">Show Me 
                          	<select name="search-numperpage" id="search-numperpage" class="generic">
                            	<option value="20" >20</option>
                            </select>
                            Per page
                    			</div>
                    		-->


													<div id="search-button">
      	               			<!-- <input class="genericsubmit" type="submit" name="search" value="Search" onclick="location.href='Search-3-85254-1111-11111-3049-000'"> -->
      	               			<input class="genericsubmit" type="submit" name="search" value="Search" onclick="search_UTILITY();">
                    			</div>
                    		</div>
                    		
                    		

                    	</div>
                    <!-- END top bar COMPLETE -->

									<? /* $obj_Member->SearchGallery(); */ ?>
									
									<!-- results window -->
									<div id="search_results_window" name="search_results_window" style="z-index: 2; position: absolute; left: 0px; width: 958px; height: 650px; border: 0px solid #ffffff;"></div>

									
								<?
										// issue IE or FF compliant JS function calls ----
										if($_SESSION['browsermsie'] == 1){
											echo '<script type="text/javascript">';
											echo 'window.onload = search_UTILITY;';
											echo '</script>';
										}else{
											echo '<script type="text/javascript">';
											echo 'window.onload = search_UTILITY();';
											echo '</script>';
										}
										// -----------------------------------------------
								?>
									
									
										
									


        					<!-- END html  -->
                <?


  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false && $obj_Member->MemberPaid == false){
  
  							// redirect to MyHome/SignUp Promo ---------
  							?>
									<script type="text/javascript">location="MyHome";</script>
								<?

  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	

















    			// Upgrade Account =======================================================================
        	case "member-Upgrade":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered & Paid -----------------------------------------------
  						if($obj_Member->MemberAuthorized == true && $obj_Member->MemberPaid == true){
  
								?>
									<!-- <script type="text/javascript">location="MyHome";</script> -->
									<br><br><br>
									<center>
										<font size=6 color=white>Membership/Subscription Already Upgraded!</font>
									</center>
								<?

  						
  						// Registered & NOT Paid -------------------------------------------
  						}elseif($obj_Member->MemberAuthorized == true && $obj_Member->MemberPaid == false){
  

        				// IP Lookup Web Service -------------------------------
        				//$obj_Member->IPLookup($_SERVER['REMOTE_ADDR']).'11';

								// get product array from DB - Type Membership -------
								$ProductArray	=	$obj_Member->GetProducts(1);

								
								// get promotion code to apply to upgrade ------------
								if($_GET['_898a8as']){
									$Referrer_Promocode	=	$_GET['_898a8as'];
								}


								// purchasing form -----------------------------------
								require('common/html/inc.upgrade-membership-form.php');

                ?>

								
									<!-- START html -->
									
									
									
          			<!-- core css -->
          			<!-- <link rel="stylesheet" type="text/css" href="http://<? echo $_SERVER['SERVER_NAME']; ?>/common/css/base.css" /> -->

                <!-- ajax signup code -->
                <!-- <script type="text/javascript" src="common/js/upgrade/upgrade.js"></script> -->
								
								
								
									<!-- END html -->
								<?

  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false && $obj_Member->MemberPaid == false){
  

  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	









    			// New Upgrade landing Page ==============================================================
        	case "member-NewUpgrade":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------



						//echo $_POST['upgrade_product'];
						//die();











  						
  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true && $obj_Member->MemberPaid == true){

							// get Encrypted transaction ID ----  						
  						$NewUpgrade_TransactionID_Encrypted	=	$_GET['_898a8as'];
  						
  						// decrypt transaction ID ----------
  						$DecryptedTransactionID							=	$obj_Member->Decrypt($NewUpgrade_TransactionID_Encrypted, 'private');
  						
  						// get transaction record ----------
  						$TransactionRecord									=	$obj_Member->GetTransaction($DecryptedTransactionID, $_SESSION['ActiveUser']['userid']);

  						// get details of product purchased-
  						$NewUpgrade_Product									= $obj_Member->GetProductByID($TransactionRecord['productid']);
  						
  						// get upgrade referrer ------------
  						$NewUpgrade_Referrer								= null;
  						$NewUpgrade_Referrer								= $obj_Member->GetUpgradeReferrer($DecryptedTransactionID, $_SESSION['ActiveUser']['userid']);



							switch($NewUpgrade_Product['type']){
								
								case 1:
									$ProductTrackID		=	strtoupper($TransactionRecord['transactionid']);
									$ProductType			=	'Subscription';
									$ProductName			=	ucwords($NewUpgrade_Product['name']);
									$ProductLifeSpan	=	ProductExpiration($TransactionRecord['tsexpiration']);
									$ProductPrice			=	$TransactionRecord['price'];
								break;

							}


                ?>
        					<!-- html  -->
        						<center>
        							<br><br>
        							<font class="greetinglarge">
        								You've Been Upgraded!
        								
        								<br><br>
        								
        								<table>
        									<tr>
        										<td><font class="greetinglarge">Your Receipt Code:</font></td> <td width="10"></td> <td><font class="greetinglarge"><? echo $ProductTrackID; ?></font></td>
        									</tr>

        									<tr>
        										<td><font class="greetinglarge">Product Type:</font></td> <td width="10"></td> <td><font class="greetinglarge"><? echo $ProductType; ?></font></td>
        									</tr>

        									<tr>
        										<td><font class="greetinglarge">Product Name:</font></td> <td width="10"></td> <td><font class="greetinglarge"><? echo $ProductName; ?></font></td>
        									</tr>

        									<tr>
        										<td><font class="greetinglarge"><? echo $ProductType; ?> Expires in:</font></td> <td width="10"></td> <td><font class="greetinglarge"><? echo $ProductLifeSpan; ?></font></td>
        									</tr>

        								</table>
        								
        								<br>
												
												<?
													if($NewUpgrade_Referrer){
														?>
															<div style="position: absolute; top: 300px; left: 250px; border: 1px solid #828282; width: 200px; height: 180px; background-color: #000000;">
																<?
																	echo "<input id=\"continue\" class=\"generic\" type=\"submit\" value=\"View Profile\" onclick=\"location='http://".$_SERVER['SERVER_NAME'].".com/ViewProfile-".$NewUpgrade_Referrer."'\">";
																	?>
																		<div style="position: absolute; top: 45px; left: 45px; border: 5px solid #ffc028; border-style: dashed; width: 101px; height: 101px;">
																	<?
																	$obj_Member->ImageDisplay_2($_SESSION['ActiveUser']['userid'], $obj_Member->Decrypt($NewUpgrade_Referrer, 'public'), 2, 1, false, true);																
																	?>
																		</div>
																	<?
																?>
															</div>
														<?

													}else{
														?>
															<div style="position: absolute; top: 300px; left: 250px; border: 1px solid #828282; width: 200px; height: 180px; background-color: #000000;">
																<?
																	echo "<input id=\"continue\" class=\"generic\" type=\"submit\" value=\"Continue\" onclick=\"location='http://".$_SERVER['SERVER_NAME'].".com/MyHome'\">";
																?>																
															</div>
														<?
													}
												?>
													<div style="position: absolute; top: 300px; right: 250px; border: 1px solid #828282; width: 200px; height: 180px; background-color: #000000;">
														<input id="print" class="generic" type="submit" value="Print Receipt" onclick="window.print()">
													</div>
        							</font>
        							<br><br><br>
        						</center>
        					<!-- END html  -->
                <?


  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false && $obj_Member->MemberPaid == false){
  
                ?>
        					<!-- html  -->
        						<center>
        							<br><br><br><br>
        							<font class="greetinglarge">Upgrade Not Processed! Product: <? echo $NewUpgrade; ?></font>
        							<br><br><br>
        						</center>
        					<!-- END html  -->
                <?

							
							
							// Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == true && $obj_Member->MemberPaid == false){
  							
  							
  							
  							echo '<font color=white>Processing...</font><br>';
  							ob_flush();
  							flush();
								?>
								<script type="text/javascript">
									//setTimeout(alert('ba'),100000);
									GB_showCenter('', 'http://sm0005.com/ResendActivationRequest', 180, 600);
								</script>
								<?
  							//sleep(2);
  							echo '<font color=white>Done</font><br>';
  							
  							
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	












    			// Photo Verify Option ===================================================================
        	case "member-Verify":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true){
  							
  							//properties ---------------------
  							$obj_Profile_Settings					=	$obj_Member->GetMemberProfile_Settings($_SESSION['ActiveUser']['userid']);

								$Profile_Setting_Nudity				=	$obj_Profile_Settings->setting_nudity;
  							$Profile_Setting_Graphics			=	$obj_Profile_Settings->setting_graphics;
	 							$Profile_Setting_Discreet			=	$obj_Profile_Settings->setting_discreet;
	 							$Profile_Setting_Disable			=	$obj_Profile_Settings->setting_disable;
	 							$Profile_Setting_MailNotifier	=	$obj_Profile_Settings->setting_mailnotifier;
	 							$Profile_Setting_Visits				=	$obj_Profile_Settings->visits;



								require('common/html/inc.photo-verification.php');

  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false && $obj_Member->MemberPaid == false){
  

  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');


        	break;
        	// =======================================================================================	










    			// Profile Editor ========================================================================
        	case "Account-Profile":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered ----------------------------------------------------
  						if($obj_Member->MemberAuthorized == true){
  

								//core form ------------------------------------------------
								require('common/html/inc.profile-editor.php');


  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false && $obj_Member->MemberPaid == false){
  

  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	







    			// Bling Editor ==========================================================================
        	case "member-Account-Bling":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered ----------------------------------------------------
  						if($obj_Member->MemberAuthorized == true){
  

								//core form ------------------------------------------------
								require('common/html/inc.bling-editor.php');


  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false && $obj_Member->MemberPaid == false){
  

  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	










    			// Account Main ==========================================================================
        	case "subpage.account":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true){
  							
  							//properties ---------------------
  							$obj_Profile_Settings					=	$obj_Member->GetMemberProfile_Settings($_SESSION['ActiveUser']['userid']);

								$Profile_Setting_Nudity				=	$obj_Profile_Settings->setting_nudity;
  							$Profile_Setting_Graphics			=	$obj_Profile_Settings->setting_graphics;
	 							$Profile_Setting_Discreet			=	$obj_Profile_Settings->setting_discreet;
	 							$Profile_Setting_Disable			=	$obj_Profile_Settings->setting_disable;
	 							$Profile_Setting_MailNotifier	=	$obj_Profile_Settings->setting_mailnotifier;
	 							$Profile_Setting_Visits				=	$obj_Profile_Settings->visits;
								
								
								// user profile data -------------
								$MemberProfile								=	$obj_Member->GetMemberProfile_Defined($_SESSION['ActiveUser']['userid']);

                ?>
        					<!-- html  -->
        
         						<!-- core css -->
        						<link rel="stylesheet" href="common/css/mystuff/account-myprofile-core.css" type="text/css" media="all"/>


                    <style>
                    	#globalcontainer {
                      	position:					relative;
                        left:							0px;
                        top:							91px;
                        margin:						0 auto;
                        padding:					0 0 0 0;
                        width: 						100%;
                        height: 					1500px;
                        border: 					0px solid #565643;
                        z-index:					1;
                        /* background: 			url(http:/egenerations.com/common/img/backgrounds/background_gradient_blu-drk.gif) #146ADB repeat-x fixed top center; */
                        /* background: 			url(http://egenerations.com/common/img/index/background_gradient2.jpg) #1469db repeat-x fixed top center; */
                        /* background: 			url(/common/img/backgrounds/bg_gradient_red2blk.gif) #b11100 repeat-x fixed top center; */
                        background-attachment: fixed;
                        align:						center;
                        text-align:				center;
                    	}
                    </style>

        						
        
        
        				<!-- <div id="master_panel" style="border: 3px solid #ff0000; width: auto; height: 1100px; position: relative; top: 10px;"> -->



											<!-- topcontainer -->
                    	<div id="topcontainer" style="background: url(/common/img/backgrounds/bg_gradient_lightblue2blk-mystuff.gif);">
                    		<!-- <div id="icon"><img src="http://www.egenerations.com/common/img/icons/icon_controlpanel.png" width="82" height="82" alt="<? echo ucfirst($_SESSION['ActiveUser']['username']); ?>'s Stuff"></div> -->

                    		<div id="paneltitle">
                    			<h2 style="color: #ffffff;">Account / Profile</h2>
                    		</div>
                    		
                    		<!-- <div id="webpageaddress" ><h3 style="color: black;">Your Web Page Address: <a href="http://sm0005.com/<? echo $_SESSION['ActiveUser']['username']; ?>">sm0005.com/<? echo $_SESSION['ActiveUser']['username']; ?></a></h3></div> -->

                    		<div id="logout">
                        		<input class="genericsubmit" type="submit" name="signout" value="Sign Out" onclick="LogoutUser()">
                    		</div>
                    	</div>
                    	<!-- END topcontainer -->





<?
/*
	disabled due to redundancy to Profile Editor - n8 - 03.09.2008
	
	

												<!-- upload profile pic -->
                    		<div id="profilepic">
                    						<?
                                   	if($obj_Member->ImageDisplay($_SESSION['ActiveUser']['userid'], 1, 1, true)){
                                   		?> 
                                   			<b><center>Your Primary Photo</center></b>
                    	       						<div id="picture">
                    	       							<? $obj_Member->ImageDisplay($_SESSION['ActiveUser']['userid'], 1, 1); ?>
                    	       						</div>
                    	       						
                    	       						<div id="picture_options">
                                          	<!-- upload picture -->
                                          		<form action="exe-core.php" method="post" enctype="multipart/form-data" name="member-Add-Picture" id="member-Add-Picture">
                                          			<input name="image" type="file" length="3" size="3" id="image">
                                          			<input type="submit" id="upload" name="Submit" value="Add Photo Now">
                                          			<input type="hidden" value='member-Add-Picture' name="_function" id="_function" />
                                          		</form>
                                          	<!-- end upload picture -->
                                   			</div>
        
                                   		<?
                                   	}else{
                                   		?>
                                   			<b><center><font color="red">Photos Attract Girls!</font></center></b>
                    	       						<div id="picture">
                    	       							<img src="http://egenerations.com/common/img/profiles/no-image.gif">
                    	       						</div>
        
                    	       						<div id="picture_options">
                                 					
                                          	<!-- upload picture -->
                                          		<form action="exe-core.php" method="post" enctype="multipart/form-data" name="member-Add-Picture" id="member-Add-Picture">
                                          			<input name="image" type="file" length="3" size="3" id="image">
                                          			<input type="submit" id="upload" name="Submit" value="Add Photo Now">
                                          			<input type="hidden" value='member-Add-Picture' name="_function" id="_function" />
                                          		</form>
                                          	<!-- end upload picture -->
                                   			</div>
        
                                   		<?
                                   	}
                              	?>
                    		</div>
        							 <!-- END upload profile pic -->
*/


											$_SESSION['ActiveUser']['emailUpdateToken'] = md5(uniqid(rand(), true));
?>


											<!-- profile_panel -->
                  		<div id="profile_panel">

											<div id="profile_panel_titlebar" style="top: 0px;" ><h2 style="color: #ffffff;">&nbsp;E-Mail Address</h2></div>

                    		<!-- myprofile -->
                    		<div id="myprofile" style="height: 110px; top: 40px; padding-top: 20px;">

  												<!-- details -->
  												<table border="0">
  													<tr>
  														<td width="10"></td>
  														<td>
  															<font size="3"><b>E-Mail Address</b></font>
  														</td>
  														<td width="5"></td>
  														<td>
  															<input type="input" style="border: 1px solid #000000;" id="member.email.update.address" value="<? echo $_SESSION['ActiveUser']['email_addr']; ?>" size="35">
  														</td>
  													</tr>
  												</table>
  												<!-- details -->

  												<!-- details -->
  												<table border="0" width="90%">
  													<tr>
  														<td colspan="4">
																<table cellpadding="0" cellspacing="0" width="100%">
																	<tr>
																		<td><input type="hidden" id="member.email.update.token" value="<? echo $_SESSION['ActiveUser']['emailUpdateToken']; ?>" /></td>
																		<td align="right"><input type="button" id="eMail.update.saveButton" value="Save/Update" onclick="UpdateEmailAddress();" size="5" /></td>
																	</tr>
																</table>
  														</td>
  													</tr>
  												</table>
  												<!-- details -->

  												<!-- details -->
  												<table border="0" cellpadding="0" cellspacing="0" width="100%">
  													<tr>
  														<td colspan="4" height="10">
																
  														</td>
  													</tr>
  													<tr>
  														<td colspan="4">
																<center><font class="typered18pt">EMAIL CHANGES <font color="black">REQUIRE</font> RE-ACTIVATION</font><br><font size="1">( An Activation E-Mail will be Sent to the NEW Address )</font></center>
  														</td>
  													</tr>
  												</table>
  												<!-- details -->

												</div>

                    	</div>
                    	<!-- END profile_panel -->









											<?
												$_SESSION['ActiveUser']['ProfileBasicsUpdateSaveToken'] = md5(uniqid(rand(), true));
												
												if($_SESSION['ActiveUser']['verified'] == true){
													$GiftBoxData = $obj_Member->GetGiftBoxData($_SESSION['ActiveUser']['userid']);

  												switch($GiftBoxData->giftbox_activated){
  													case 0:
  														$GiftBoxMessage = '<div style="position: relative; left: 47px; text-align: center; padding: 5px; background-color: #000000; width: 175px;"><font size="3" color="#fca308"><i><b>Pending Approval</i></b></font></div>';
  													break;
  
  													case 1:
  														$GiftBoxMessage = '<div style="position: relative; left: 47px; text-align: center; padding: 5px; background-color: #000000; width: 175px;"><font size="3" color="#3dff46"><i><b>Approved & Active</i></b></font></div>';
  													break;
  
  													case 2:
  														$GiftBoxMessage = '<div style="position: relative; left: 47px; text-align: center; padding: 5px; background-color: #000000; width: 175px;"><font size="3" color="#c11919"><i><b>Denied / Re-Update</i></b></font></div>';
  													break;
  												}
												}else{
													$GiftBoxMessage = '<div style="position: relative; left: 40px; text-align: center; padding: 5px; background-color: #ffffff; width: 220px;"><a href="Verify"><font size="4" color="#ec6908"><i><b>Get Verified & Get Gifts!</i></b></font></a></div>';
												}
												

												
												
												
											?>



											<!-- subprofile_panel -->
                  		<div id="subprofile_panel">
                  			
                  			<div id="profile_panel_titlebar" ><h2 style="color: #ffffff;">&nbsp;Account Details</h2></div>

													<!-- myoptions -->
                    			<div id="myoptions">
															
															<table border=0 width=100%>

                    						<tr>
                    							<td>
                    								<h2 style="color: #000000;">My<font color="#1469DB">Account</h2>
                    							</td>
                    							<td>
                    								<font class="legend">
                    									&nbsp;&nbsp;&nbsp;Is your Account Accurate?
                    								</font>
                    							</td>
                    						</tr>
        
        												<tr>
        													<td colspan="3">

																		<!-- details -->
        														<table border="0">

        															<tr>
        																<td width="10"></td>
        																<td>
        																	<font size="3"><b>Payee</b></font>
        																</td>
        																<td width="5"></td>
        																<td>
        																	<input type="input" style="border: 1px solid #000000;" maxlength="35" id="ProfileBasics.tax_payee" value="<? echo $obj_Member->GetMemberProfile($_SESSION['ActiveUser']['userid'])->tax_payee; ?>" size="35">
        																</td>
        															</tr>

        															<tr>
        																<td width="10"></td>
        																<td>
        																	<font size="3"><b>SSN / EIN</b></font>
        																</td>
        																<td width="5"></td>
        																<td>
        																	<input type="input" style="border: 1px solid #000000;" maxlength="9" id="ProfileBasics.tax_id_ssn" value="<? echo $obj_Member->Decrypt($obj_Member->GetMemberProfile($_SESSION['ActiveUser']['userid'])->tax_id_ssn, 'private'); ?>" size="35">
        																</td>
        															</tr>


        															<tr>
        																<td width="10"></td>
        																<td>
        																	<font size="3"><b>First Name:</b></font>
        																</td>
        																<td width="5"></td>
        																<td>
        																	<input type="input" style="border: 1px solid #000000;" maxlength="35" id="ProfileBasics.first_name" value="<? echo $obj_Member->GetMemberProfile($_SESSION['ActiveUser']['userid'])->first_name; ?>" size="35">
        																</td>
        															</tr>

        															<tr>
        																<td width="10"></td>
        																<td>
        																	<font size="3"><b>Last Name:</b></font>
        																</td>
        																<td width="5"></td>
        																<td>
        																	<input type="input" style="border: 1px solid #000000;" maxlength="35" id="ProfileBasics.last_name" value="<? echo $obj_Member->GetMemberProfile($_SESSION['ActiveUser']['userid'])->last_name; ?>" size="35">
        																</td>
        															</tr>

        															<tr>
        																<td width="10"></td>
        																<td>
        																	<font size="3"><b>Street/P.O. BOX:</b></font>
        																</td>
        																<td width="5"></td>
        																<td>
        																	<input type="input" style="border: 1px solid #000000;" maxlength="35" value="<? echo $obj_Member->GetMemberProfile($_SESSION['ActiveUser']['userid'])->address_1; ?>" id="ProfileBasics.address_1" size="35">
        																</td>
	       															</tr>

        															<tr>
        																<td width="10"></td>
        																<td>
        																	<font size="3"><b>Apt/Suite #:</b></font>
        																</td>
        																<td width="5"></td>
        																<td>
        																	<input type="input" style="border: 1px solid #000000;" maxlength="35" value="<? echo $obj_Member->GetMemberProfile($_SESSION['ActiveUser']['userid'])->address_2; ?>" id="ProfileBasics.address_2" size="35">
        																</td>
	       															</tr>

        															<tr>
        																<td width="10"></td>
        																<td>
        																	<font size="3"><b>City</b></font>
        																</td>
        																<td width="5"></td>
        																<td>
        																	<input type="input" style="border: 1px solid #000000;" maxlength="20" value="<? echo $obj_Member->GetMemberProfile($_SESSION['ActiveUser']['userid'])->city; ?>" id="ProfileBasics.city" size="15">
        																</td>
	       															</tr>

        															<tr>
        																<td width="10"></td>
        																<td>
        																	<font size="3"><b>State</b></font>
        																</td>
        																<td width="5"></td>
        																<td>
        																	<input type="input" style="border: 1px solid #000000;" maxlength="20" value="<? echo $obj_Member->GetMemberProfile($_SESSION['ActiveUser']['userid'])->state; ?>" id="ProfileBasics.state" size="15">
        																</td>
	       															</tr>

        															<tr>
        																<td width="10"></td>
        																<td>
        																	<font size="3"><b>Phone</b></font>
        																</td>
        																<td width="5"></td>
        																<td>
        																	<input type="input" style="border: 1px solid #000000;" maxlength="20" value="<? echo $obj_Member->GetMemberProfile($_SESSION['ActiveUser']['userid'])->phone; ?>" id="ProfileBasics.phone" size="15">
        																</td>
	       															</tr>


        															<tr>
        																<td width="10"></td>
        																<td>
        																	<font size="3"><b>ZIP Code</b></font>
        																</td>
        																<td width="5"></td>
        																<td>
        																	<table cellpadding="0" cellspacing="0" width="100%">
        																		<tr>
        																			<td><input type="input" style="border: 1px solid #000000;" maxlength="5" value="<? echo $obj_Member->GetMemberProfile($_SESSION['ActiveUser']['userid'])->zipcode; ?>" id="ProfileBasics.zipcode" size="5"></td>
        																			<td width="50"><input type="hidden" id="ProfileBasics.saveToken" value="<? echo $_SESSION['ActiveUser']['ProfileBasicsUpdateSaveToken']; ?>" /></td>
        																			<td align="right"><input type="button" id="ProfileBasics.saveButton" value="Save/Update" onclick="SaveMyProfileBasicsAddress();" size="5" /></td>
        																		</tr>
        																	</table>
        																</td>
	       															</tr>



        														</table>

        														
        													</td>
        												</tr>
        											</table>
                    			</div>
                    			<!-- myoptions -->


                    	</div>
                    	<!-- END subprofile_panel -->








<?
/*

        
        						<input type="hidden" id="profile_setting_nudity_activesetting_hfield" value="<? echo $Profile_Setting_Nudity; ?>" />
        						<input type="hidden" id="profile_setting_graphics_activesetting_hfield" value="<? echo $Profile_Setting_Graphics; ?>" />

										<input type="hidden" id="profile_setting_discreet_activesetting_hfield" value="<? echo $Profile_Setting_Discreet; ?>" />
										<input type="hidden" id="profile_setting_disable_activesetting_hfield" value="<? echo $Profile_Setting_Disable; ?>" />
										
										<input type="hidden" id="profile_setting_mailnotifier_activesetting_hfield" value="<? echo $Profile_Setting_MailNotifier; ?>" />



											<!-- content_settings_panel -->
                    	<div id="content_settings_panel">

                    		<div id="subcontainer_titlebar_standard"><h2 style="color: #ffffff;">&nbsp;Content Settings</h2></div>

														<div id="mysettings_option-nuditymode">
															<div id="mysettings_option_label"><table height="100%"><tr><td valign="center"> <font size="4"><b><font color="red">View</font> Nudity:</b></font> </td></tr></table></div>
															<div id="mysettings_option_currentSetting"> <div id="profile_setting_nudity_activesetting" style="font-size: 17px; font-style: italic; font-weight: bold;"><? echo ($Profile_Setting_Nudity == 0 ? '<img src="/common/img/icons/icon_20x20_redx.png"> Nudity <font color="red">Disabled</font>' : '<img src="/common/img/icons/icon_20x20_greencheck.png"> Nudity <font color="red">Enabled</font>'); ?></div> </div>
															<div id="mysettings_option_button"><input class="genericsubmit" type="button" value="<? if($Profile_Setting_Nudity == 1){ echo 'No';}elseif($Profile_Setting_Nudity == 0){ echo 'Yes';} ?>" onclick="<? echo 'profile_SETTINGS(\'profile_setting_nudity\');'; ?>" id="profile_setting_nudity_button" /></div>
															<div id="mysettings_option_help"><table height="100%"><tr><td valign="center"> Safe Mode Shows or Hides Photos with Nudity</td></tr></table></div>
														</div>

														

														<div id="mysettings_option-graphicsmode">
															<div id="mysettings_option_label"><table height="100%"><tr><td valign="center"> <font size="4"><b><font color="red">Graphics</font> Mode:</b></font> </td></tr></table></div>
															<div id="mysettings_option_currentSetting"><div id="profile_setting_graphics_activesetting" style="font-size: 16px; font-style: italic; font-weight: bold;"><? echo ($Profile_Setting_Graphics == 0 ? '<img src="/common/img/icons/icon_20x20_redx.png"> Maximum <font color="red">Disabled</font>' : '<img src="/common/img/icons/icon_20x20_greencheck.png"> Maximum <font color="red">Enabled</font>'); ?></div> </div>
															<div id="mysettings_option_button"><input class="genericsubmit" type="button" value="<? if($Profile_Setting_Graphics == 1){ echo 'Minimum';}elseif($Profile_Setting_Graphics == 0){ echo 'Maximum';} ?>" onclick="<? echo 'profile_SETTINGS(\'profile_setting_graphics\');'; ?>" id="profile_setting_graphics_button" /></div>
															<div id="mysettings_option_help"><table height="100%"><tr><td valign="center"> Shows or Hides Horns & Halos on Member Listings </td></tr></table></div>
														</div>

                    	</div>
                    	<!-- END content_settings_panel -->



											<!-- profile_settings_panel -->
                    	<div id="profile_settings_panel">

                    		<div id="subcontainer_titlebar_standard"><h2 style="color: #ffffff;">&nbsp;Profile Settings</h2></div>

														<div id="mysettings_option-discreetmode">
															<div id="mysettings_option_label"><table height="100%"><tr><td valign="center"> <font size="4"><b><font color="red">Discreet</font> Option:</b></font> </td></tr></table></div>
															<div id="mysettings_option_currentSetting"> <div id="profile_setting_discreet_activesetting" style="font-size: 16px; font-style: italic; font-weight: bold;"><? echo ($Profile_Setting_Discreet == 0 ? '<img src="/common/img/icons/icon_20x20_redx.png"> Discreet <font color="red">Disabled</font>' : '<img src="/common/img/icons/icon_20x20_greencheck.png"> Discreet <font color="red">Enabled</font>'); ?></div> </div>
															<div id="mysettings_option_button"><input class="genericsubmit" type="button" value="<? if($Profile_Setting_Discreet == 1){ echo 'Turn Off';}elseif($Profile_Setting_Discreet == 0){ echo 'Turn On';} ?>" onclick="<? echo 'profile_SETTINGS(\'profile_setting_discreet\');'; ?>" id="profile_setting_discreet_button" /></div>
															<div id="mysettings_option_help"><table height="100%"><tr><td valign="center"> Makes Your Photographs Only Viewable to Friends </td></tr></table></div>
														</div>



														<div id="mysettings_option-disableprofilemode">
															<div id="mysettings_option_label"><table height="100%"><tr><td valign="center"> <font size="4"><b><font color="red">Hide</font> Profile:</b></font> </td></tr></table></div>
															<div id="mysettings_option_currentSetting"> <div id="profile_setting_disable_activesetting" style="font-size: 16px; font-style: italic; font-weight: bold;"><? echo ($Profile_Setting_Disable == 0 ? '<img src="/common/img/icons/icon_20x20_greencheck.png"> Profile <font color="red">Displayed</font>' : '<img src="/common/img/icons/icon_20x20_redx.png"> Profile <font color="red">Hidden</font>'); ?></div> </div>
															<div id="mysettings_option_button"><input class="genericsubmit" type="button" value="<? if($Profile_Setting_Disable == 1){ echo 'Show';}elseif($Profile_Setting_Disable == 0){ echo 'Hide';} ?>" onclick="<? echo 'profile_SETTINGS(\'profile_setting_disable\');'; ?>" id="profile_setting_disable_button" /></div>
															<div id="mysettings_option_help"><table height="100%"><tr><td valign="center"> This Hides Your Profile from All Members </td></tr></table></div>
														</div>

                    	</div>
                    	<!-- END profile_settings_panel -->




											<!-- mail_settings_panel -->
                    	<div id="mail_settings_panel">

                    		<div id="subcontainer_titlebar_standard"><h2 style="color: #ffffff;">&nbsp;Mail Settings</h2></div>

														<div id="mysettings_option-newmailnotifiermode">
															<div id="mysettings_option_label"><table height="100%"><tr><td valign="center"> <font size="4"><b><font color="red">New Mail</font> Notifiers:</b></font> </td></tr></table></div>
															<div id="mysettings_option_currentSetting"> <div id="profile_setting_mailnotifier_activesetting" style="font-size: 16px; font-style: italic; font-weight: bold;"><? echo ($Profile_Setting_MailNotifier == 0 ? '<img src="/common/img/icons/icon_20x20_redx.png"> Notify <font color="red">Disabled</font>' : '<img src="/common/img/icons/icon_20x20_greencheck.png"> Notify <font color="red">Enabled</font>'); ?></div> </div>
															<div id="mysettings_option_button"><input class="genericsubmit" type="button" value="<? if($Profile_Setting_MailNotifier == 1){ echo 'Don\'t Send';}elseif($Profile_Setting_MailNotifier == 0){ echo 'Send';} ?>" onclick="<? echo 'profile_SETTINGS(\'profile_setting_mailnotifier\');'; ?>" id="profile_setting_mailnotifier_button" /></div>
															<div id="mysettings_option_help"><table height="100%"><tr><td valign="center"> eMails You When You Get New Mail or Not </td></tr></table></div>
														</div>

                    	</div>
                    	<!-- END mail_settings_panel -->







        <!--            
                    		<div id="myalertscontainer" >
                    
                    			<div id="myalertstitle" ><h2 style="color: #000000;">&nbsp;MyAlerts</h2></div>
                    			<div id="myalerts" >
                    				<?
                    					if($num_alerts > 0){
                    						
                    						$i=0;
                    						while ($i < $num_alerts) {
                    							echo '<b><font color="red" size="3">'.$alertmsg		=	mysql_result($sql_alerts,$i,"alerts.alert").'</font>';
                    						
                    						$i++;
                    					}
                    						
                    					}
                    				
                    				?>
                    			</div>
                    		</div>
        -->            

                    	<!-- END mystuff_top_container -->



                    
                    







        <!--            
                    	<div id="pointscontainer" >
                    		<div id="mypointspaneltitle" ><table cellpadding="0" cellspacing="0"><td><h2 style="color: #000000;">&nbsp;Profile Stats</h2></td> <td width="110"></td> <td><h2 style="color: #000000;">&nbsp;Point Redemption Center</h2></td></table></div>
                    
                    			<div id="mypoints" >	
                    
                           	<table height="150" width="100%"><td>
                         			<table><tr><td width="135"><font size="3"><b>Profile Views:</b></font></td>  <td><font class="typestdred"><? if($connectpoints < 1 ){ echo '0'; }else{ echo $connectpoints; }?></font> </td></tr></table>
                         			<table><tr><td width="135"><font size="3"><b>Connect Points:</b></font></td>  <td><font class="typestdred"><? if($connectpoints < 1 ){ echo '0'; }else{ echo $connectpoints; }?> </font></td></tr></table>
                         			<table><tr><td width="135"><font size="3"><b>Connect Rating:</b></font></td>  <td><? echo $cprating; ?></td></tr></table>
                         			<table><tr><td width="135"><font size="3"><b>Learn Points:</b></font></td>    <td><font class="typestdred"><? if($learnpoints < 1){ echo '0'; }else{ echo $learnpoints; }     ?> </font> </td></tr></table>
                         			<table><tr><td width="135"><font size="3"><b>Explore Points:</b></font></td>  <td><font class="typestdred"><? if($explorepoints < 1){ echo '0'; }else{ echo $explorepoints; } ?> </font> </td></tr></table>
                         			<table><tr><td width="135"><font size="3"><b>Play Points:</b></font></td>  <td><font class="typestdred"><? if($playpoints < 1){ echo '0'; }else{ echo $playpoints; } ?> </font> </td></tr></table>
                         		</td></table>
                    
                    			</div>
                    
                    			<div id="point_redemption" >	
                    
                    			</div>
                    
                    	</div>
        -->            
                    
                    

                    
                    
                    
                    <!-- MyStuff Account HTML -->


*/
?>


        						<input type="hidden" id="profile_settings_userid" value="<? echo $obj_Member->Encrypt($_SESSION['ActiveUser']['userid'], 'private'); ?>" />
        
        					<!-- END html  -->
                <?


  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false && $obj_Member->MemberPaid == false){
  
  							//redirect to MyHome section -------------------------
								?>
									<script type="text/javascript">location="Dashboard";</script>
								<?

  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	











    			// Account >> Profile Editor =============================================================
        	case "member-Account-Profile":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true && $obj_Member->ModuleAuthentication($_SESSION['ActiveUser']['userid'], $_SERVER['REQUEST_URI']) == true){
  

								require('common/html/inc.profile-editor.php');


  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}else{
  
  							//redirect to MyHome section -------------------------
								?>
									<script type="text/javascript">location="Dashboard";</script>
								<?
  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	











    			// =======================================================================================
        	case "subpage.bigboard":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true && $obj_Member->ModuleAuthentication($_SESSION['ActiveUser']['userid'], $_SERVER['REQUEST_URI']) == true){


								echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Bigboard</div>';

  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}else{
  
  							//redirect to MyHome section -------------------------
								?>
									<script type="text/javascript">location="Dashboard";</script>
								<?
  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================











    			// =======================================================================================
        	case "subpage.activity":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true && $obj_Member->ModuleAuthentication($_SESSION['ActiveUser']['userid'], $_SERVER['REQUEST_URI']) == true){

								// record action -------------------------
								$obj_Member->TrackAction($_SESSION['ActiveUser']['userid'], 'activity report', 'view', $_SERVER['HTTP_REFERER']);
								
								require('common/html/inc.SUBPAGE.users_session_actions.php');

  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}else{
  
  							//redirect to MyHome section -------------------------
								?>
									<script type="text/javascript">location="Dashboard";</script>
								<?
  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================











    			// reports ===============================================================================
        	case "subpage.reports":


        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


							// if edit mode - get core URI ------------------------
							$__Exploded_URI	=	explode('.',$_SERVER['REQUEST_URI']);

  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true && $obj_Member->ModuleAuthentication($_SESSION['ActiveUser']['userid'], $__Exploded_URI[0]) == true){


								// dashboard selection ---------------------------------
								switch($_SESSION['ActiveUser']['user_type']){
									
									case 'sales':
										echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Sales Reports</div>';
										require('common/html/inc.SUBPAGE.REPORT.SALESPEOPLE.php'); 
									break;								
	
									case 'management':
										//echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Management Reports</div>';

										// sub-report ----------------------------
										if($_GET['_r']){
	
											// specific reports ------------------
											switch($_GET['_r']){
	
												case 'grossprofit':
													require('common/html/inc.SUBPAGE.REPORT.MANAGEMENT.php');
												break;
	
												default:
														?>
															<script type="text/javascript">location="reports";</script>
														<?
												break;
											}
											// -----------------------------------

										// reports - main menu -------------------
										}else{
											require('common/html/inc.SUBPAGE.reports.php');
										}
										// ---------------------------------------
									break;
	
									case 'executive':
										require('common/html/inc.SUBPAGE.reports.php');
									break;
	
									case 'finance':
										//echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Finance Reports</div>';
										require('common/html/inc.SUBPAGE.reports.php');
									break;
	
									case 'admin':
										echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Admin Reports</div>';
									break;
	
									case 'god':
										echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">God Reports</div>';

										// sub-report ----------------------------
										if($_GET['_r']){
	
											// specific reports ------------------
											switch($_GET['_r']){
	
												case 'grossprofit':
													require('common/html/inc.SUBPAGE.REPORT.MANAGEMENT.php');
												break;
	
												default:
														?>
															<script type="text/javascript">location="reports";</script>
														<?
												break;
											}
											// -----------------------------------

										// reports - main menu -------------------
										}else{
												echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Reports</div>';
											require('common/html/inc.SUBPAGE.reports.php');
										}
										// ---------------------------------------


									break;

									default:
									?>
										<script type="text/javascript">location="Assistance";</script>
									<?
									break;
									
								}







									//require('common/html/inc.SUBPAGE.users_session_actions.php'); //use as report template



  						// NOT Registered & NOT Paid ---------------------------------------
  						}else{
  
  							//redirect to default section ------------------------
								?>
									<script type="text/javascript">location="Dashboard";</script>
								<?
  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================











    			// =======================================================================================
        	case "subpage.campaigns":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true && $obj_Member->ModuleAuthentication($_SESSION['ActiveUser']['userid'], $_SERVER['REQUEST_URI']) == true){

								// record action -----------------------------
								$obj_Member->TrackAction($_SESSION['ActiveUser']['userid'], 'campaign', 'viewed');

								require('common/html/inc.SUBPAGE.campaign.php');

								

  						// NOT Registered & NOT Paid ---------------------------------------
  						}else{
  
  							//redirect to MyHome section -------------------------
								?>
									<script type="text/javascript">location="Dashboard";</script>
								<?
  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =F======================================================================================











    			// =======================================================================================
        	case "subpage.transaction":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

							// if edit mode - get core URI ------------------------
							$__Exploded_URI	=	explode('.',$_SERVER['REQUEST_URI']);

  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true && $obj_Member->ModuleAuthentication($_SESSION['ActiveUser']['userid'], $__Exploded_URI[0]) == true){


								require('common/html/inc.SUBPAGE.transaction.php');
								

  						// NOT Registered & NOT Paid ---------------------------------------
  						}else{
  
  							//redirect to MyHome section -------------------------
								?>
									<script type="text/javascript">location="Dashboard";</script>
								<?
  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================











    			// =======================================================================================
        	case "subpage.resources":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true && $obj_Member->ModuleAuthentication($_SESSION['ActiveUser']['userid'], $_SERVER['REQUEST_URI']) == true){

								require('common/html/inc.SUBPAGE.resources.php');
								//require('common/html/inc.form.resource_human.php');
								

  						// NOT Registered & NOT Paid ---------------------------------------
  						}else{
  
  							//redirect to MyHome section -------------------------
								?>
									<script type="text/javascript">location="Dashboard";</script>
								<?
  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================











    			// Create Member Phase I =================================================================
        	case "CreateMember-Phase1":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true){
  							
  							//redirect to MyHome section -------------------------
								?>
									<script type="text/javascript">location="Dashboard";</script>
								<?


  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){
  
        				// IP Lookup Web Service -------------------------------
        				//echo $obj_Member->IPLookup($_SERVER['REMOTE_ADDR']);
        

								switch($_SESSION['ActiveUser']['config_modes']['app_mode']){
									
									// SAAS MODE ---------
									case 1:
										//signup form ------------------------------
										require('common/html/html-signup-form.php');
									break;


									// explicit mode -----
									case 2:
										?>
											<script type="text/javascript">location="Dashboard";</script>
										<?
									break;
								}

  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	










    			// Create Member Phase II ================================================================
        	case "CreateMember-Phase2":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

  						// Registered & NOT Paid -------------------------------------------
  						//if($obj_Member->MemberAuthorized == true && $obj_Member->MemberPaid == true){																			//dep.03.01.09.nab




  						// Registered & NOT Paid -------------------------------------------
  						//}elseif($obj_Member->MemberAuthorized == true){																																		//dep.03.01.09.nab

  						if($obj_Member->MemberAuthorized == true){
                ?>
        
          			<!-- core css -->
          			<link rel="stylesheet" type="text/css" href="common/css/base.css" />
        
        					<!-- html  -->
        
                    <!-- sign up section -->
                     		
                    <div id="signup2_container" style="text-align: middle; align: middle; width: 100%; height: 450px; border: 0px solid #ffffff;">
                    
                    	
                    	<table width="100%" height="100%" cellpadding=="0" cellspacing="0" border=0>
                    		<td width="100%" align="middle">
                    			<!-- Content Window -->


        					<?


                    
                    // lookup promocode details & decrypt ------------------------------
        						//$obj_Member->PromocodeLookup($obj_Member->Decrypt($_GET['_898a8as']), '@InternalLookupOnly');
        						

        						//echo '<font color="#229F17" size="5">'.date(i, ($ActiveUserPromocodeArray['tsexpiration'] - time() ) ).' Minutes Left Till Expires!</font>';
/*
        						echo 'now '.time();
        						echo '<br>';
        						echo 'expir '.$ActiveUserPromocodeArray['tsexpiration'];
        						echo '<br>';
        						echo $ActiveUserPromocodeArray['tsexpiration'] - time();
        						        						echo '<br>';
        						echo date(i, $ActiveUserPromocodeArray['tsexpiration'] - time()).' Minutes Remaining';
*/                    




                  if( ($_SESSION['ActiveUser']['promocode']) && ($ActiveUserPromocodeArray	=	$obj_Member->ActiveMemberPromocode($_SESSION['ActiveUser']['userid'])) ){
        
/*        						
        						// expired promocode -----------------------------
        						if($ActiveUserPromocodeArray['expired'] == true){
        							$message 			= 'd.innerHTML = "<center><h2><table border=1><td><img src=\"common/img/icons/icon_success_small.png\"></td> <td width=\"7\"></td> <td><font color=\"#229F17\" size=\"5\"><br><br>  Special Offer Expired <br> But We Will Still Discount You @ 20% Off<br>But You Must Sign Up Now! <br> Account Created!</font></td></table></h2></center>";';
        						
        						// never expiring promocode ----------------------
        						}elseif($ActiveUserPromocodeArray['expired'] == false && $ActiveUserPromocodeArray['tsexpiration'] == 0){
        							$__Discount		= $ActiveUserPromocodeArray['discount'];
        							$__Promocode	= $_GET['_898a8as'];
        							$message1			= '<br><br><center><h2><table><td><img src=\"common/img/icons/icon_success_small.png\"></td> <td width=\"7\"></td> <td><font color=\"#229F17\" size=\"6\">Account Created!</font></td></table></h2></center>';
        							$message2			= $message1.'<br><center><h2><table width=500><td align=center><font color=yellow size=\"5\">Your Special '.$__Discount.'% Discount <font color=white>Never Expires</font><br><br> <a href=\"Upgrade-'.$__Promocode.'\"><font color=white>Complete the Upgrade of your Account Now!</font></a> </font></td></table></h2></center>';

										// no promocode ----------------------------------        						
        						}else{
        							$__Expiration	=	date(i, $ActiveUserPromocodeArray['tsexpiration'] - time());
        							$__Discount		= $ActiveUserPromocodeArray['discount'];
        							$__Promocode	= $_GET['_898a8as'];
        							$message1			= '<br><br><center><h2><table><td><img src=\"common/img/icons/icon_success_small.png\"></td> <td width=\"7\"></td> <td><font color=\"#229F17\" size=\"6\">Account Created!</font></td></table></h2></center>';
        							$message2			= $message1.'<br><center><h2><table width=500><td align=center><font color=yellow size=\"5\">Special '.$__Discount.'% Discount Expires in <font color=white>'.trim($__Expiration, '0').' Minutes!</font><br><br> <a href=\"Upgrade-'.$__Promocode.'\"><font color=white>Act Now & Save Money!</font></a> </font></td></table></h2></center>';
        						}

        						echo $message2;
                   	echo 'd.innerHTML = "<center><table border=0 width=\"100%\"  align=\"middle\"><tr><td align=middle><center><h2><font color=\"#ffffff\">Check Your E-Mail to Complete Your Registration</font></h2><br><br><table><td align=\"middle\"><center><font size=\"4\" face=\"arial\" color=\"#ffffff\"><b>Your Account Activation Letter was sent to: <font color=\"#BC0101\">'.$_SESSION['ActiveUser']['email_addr'].'</font> <br> Your Password is (Please Write it Down): <font color=\"#BC0101\">'.$_SESSION['ActiveUser']['password'].'</font></b></td></table><br><br><font size=\"4\" face=\"arial\" color=\"#ffffff\"><b>When it arrives, Click on the Activation Link</b></font></font><br><br><br><br><table><tr><td align=\"middle\"><center><fieldset style=\"padding: 14px 14px 14px 14px;\"><legend><font style=\" font-size: 26px; letter-spacing: -2px; font-family: arial; color: #ffffff; \"><b>Cant Find The Activation Letter ?</b></font></legend><table><tr><td align=\"left\"><br><font face=\"arial\" color=\"#ffffff\"><li><b>Ensure you entered your E-Mail address correctly. <font color=\"#ffffff\">If its wrong, register again</font>.</b></li><br><li><b><font face=\"arial\" color=\"#ffffff\">Check your Bulk / Junk Bin</font>, the message might have been filtered out.</font></b></li><br><font face=\"arial\" color=\"#ffffff\"><li></font><a href=\"helpdesk\"><b><u><font face=\"arial\" color=\"#3a76e3\">Contact the Help Desk</font></u></b></a><font face=\"arial\" color=\"#ffffff\"><b> if you dont receive the Activation Letter.</font></b></li></font></td></tr></table></fieldset></td></tr></table></td></tr></table></center>";';
*/        





										// new female member -----------------------------
        						if($_SESSION['ActiveUser']['gender'] == 2){

											// content -------------------------------------
											?>


											<div style="position: relative; margin: 0 auto; border: 0px solid #ffffff; width: 350px; height: 50px; text-align: center; top: 0px;">
	                 			<table align="center">
                  				<tr>
                  					<td><img src="common/img/icons/icon_50x50_greencheck.png"></td>
                  					<td width="7"></td>
                  					<td><h2><font color="#229F17" size="6">Account Created!</font></h2></td>
                  				</tr>
                  			</table>
											</div>

											<div style="position: relative; margin: 0 auto; border: 0px solid #ffffff; width: 350px; height: 30px; text-align: center; top: 30px;">
												<h2><font color=yellow size="5">You Got a Special <? echo $ActiveUserPromocodeArray['discount']; ?>% Discount</h2>
											</div>



											<div style="position: relative; margin: 0 auto; border: 0px solid #ffffff; width: 900px; height: 70px; text-align: center; top: 95px;">
												<div style="position: absolute; top: 0px; left: 0px; border: 0px solid #ffffff; width: 380px; height: 30px; text-align: right;">
												<h2>
													<font color="white" size="5">Your <font color="#ff9000">Activation Letter</font> has been Sent to
												</h2>
												</div>

												<div style="position: absolute; top: 0px; left: 400px; border: 0px solid #ffffff; width: 495px; height: 30px; padding-left: 0px; text-align: left;">
													<font color="#ffffff"><b><? echo $_SESSION['ActiveUser']['email_addr']; ?></b></font>
												</div>

												<div style="position: absolute; top: 35px; left: 400px; border: 0px solid #ffffff; width: 495px; height: 30px; padding-left: 0px; text-align: left;">
													<font color="#fd7e5c">Is this incorrect? (<a href="MyStuff"><font color="#ffffff">Change It Here</font></a>)</font>
												</div>
											</div>
	

											<div style="position: relative; margin: 0 auto; border: 0px solid #ffffff; width: 450px; height: 30px; text-align: center; top: 115px;">
												<hr width="450">
											</div>
											
											



											<div style="position: relative; margin: 0 auto; border: 0px solid #ffffff; width: 900px; height: 150px; text-align: center; top: 125px;">
												<div style="position: absolute; top: 10px; left: 0px; border: 0px solid #ffffff; width: 500px; height: 130px; text-align: center;">
													<table border=0>
														<tr>
															<td colspan="3"><font color="#ffffff" size="5"><b><i>Now What?</i></b></font></td>
														</tr>
														<tr>
															<td><font color="#ffffff" size="4">Step #1</font></td>
															<td width="20"></td>
															<td align="left"><font color="#fdc753" size="4">Check Your eMail Inbox & SPAM Box</font></td>
														</tr>
														<tr>
															<td><font color="#ffffff" size="4">Step #2</font></td>
															<td width="20"></td>
															<td align="left"><font color="#fdc753" size="4">Find the eMail titled "Activation - eGenerations Network Affiliate Center"</font></td>
															</tr>
														<tr>
															<td><font color="#ffffff" size="4">Step #3</font></td>
															<td width="20"></td>
															<td align="left"><font color="#fdc753" size="4">Click the "Activation Link"</font></td>
														</tr>
													</table>
												</div>


												<div style="position: absolute; top: 0px; right: 0px; border: 0px solid #ffffff; width: 375px; height: 108px; padding-left: 0px; text-align: left; margin-top: 10px; margin-right: 10px; padding-top: 5px; padding-left: 5px;">
													<table>
														<tr>
															<td>
      													<?
      														if($_SESSION['ActiveUser']['referrer_profile']){
      															$obj_Member->ImageDisplay_2($_SESSION['ActiveUser']['userid'], $obj_Member->Decrypt($_SESSION['ActiveUser']['referrer_profile']), 2, 1, false, true);
      															$MemberProfile =	$obj_Member->GetMemberProfile_Defined($_SESSION['ActiveUser']['referrer_profile']);
      														}
      													?>
															</td>
															<td width="220" align="center">
      													<?
      														if($_SESSION['ActiveUser']['referrer_profile']){
      													?>																
																<font color="#ffeba5" size="5">
																Now go check out
																<br>
																<? echo $MemberProfile['username']; ?>
																</font>
																<?
																	}else{
																		?> <input style="font-size: 20px;" type="button" onclick="window.location='Home'" value="I Got It Let's Go!" />  <?
																	}
																?>
															</td>
														</tr>
													</table>
												</div>
											</div>


											<?
											// END content ---------------------------------


/*        					 		
        					 		$__WomenOnly	=	'6969femfetal';
        					    $message1			= '<br><br><center><h2><table><td><img src=\"common/img/icons/icon_success_small.png\"></td> <td width=\"7\"></td> <td><font color=\"#229F17\" size=\"6\">Account Created!</font></td></table></h2></center>';
        							echo $message2;
                   		echo '<center><table border=0 width=\"100%\"  align=\"middle\"><tr><td align=middle><center><h2><font color=\"#ffffff\">Check Your E-Mail to Complete Your Registration</font></h2><br><br><table><td align=\"middle\"><center><font size=\"4\" face=\"arial\" color=\"#ffffff\"><b>Your Account Activation Letter was sent to: <font color=\"yellow\">'.$_SESSION['ActiveUser']['email_addr'].'</font> <br> Your Password is (Please Write it Down): <font color=\"yellow\">'.$_SESSION['ActiveUser']['password'].'</font></b></td></table><br><br><font size=\"4\" face=\"arial\" color=\"#ffffff\"><b>When it arrives, Click on the Activation Link</b></font></font><br><br><br><br><table><tr><td align=\"middle\"><center><fieldset style=\"padding: 14px 14px 14px 14px;\"><legend><font style=\" font-size: 26px; letter-spacing: -2px; font-family: arial; color: #ffffff; \"><b>Cant Find The Activation Letter ?</b></font></legend><table><tr><td align=\"left\"><br><font face=\"arial\" color=\"#ffffff\"><li><b>Ensure you entered your E-Mail address correctly. <font color=\"#ffffff\">If its wrong, register again</font>.</b></li><br><li><b><font face=\"arial\" color=\"#ffffff\">Check your Bulk / Junk Bin</font>, the message might have been filtered out.</font></b></li><br><font face=\"arial\" color=\"#ffffff\"><li></font><a href=\"helpdesk\"><b><u><font face=\"arial\" color=\"#3a76e3\">Contact the Help Desk</font></u></b></a><font face=\"arial\" color=\"#ffffff\"><b> if you dont receive the Activation Letter.</font></b></li></font></td></tr></table></fieldset></td></tr></table></td></tr></table></center>";';
*/			

										// standard member no promocode ------------------
                  	}else{
											// content -------------------------------------
											?>
											

											<div style="position: relative; margin: 0 auto; border: 0px solid #ffffff; width: 350px; height: 50px; text-align: center; top: 0px;">
	                 			<table align="center">
                  				<tr>
                  					<td><img src="common/img/icons/icon_50x50_greencheck.png"></td>
                  					<td width="7"></td>
                  					<td><h2><font color="#229F17" size="6">Account Created!</font></h2></td>
                  				</tr>
                  			</table>
											</div>

											<div style="position: relative; margin: 0 auto; border: 0px solid #ffffff; width: 350px; height: 30px; text-align: center; top: 30px;">
												<h2><font color=yellow size="5">You Got a Special <? echo $ActiveUserPromocodeArray['discount']; ?>% Discount</h2>
											</div>



											<div style="position: relative; margin: 0 auto; border: 0px solid #ffffff; width: 900px; height: 70px; text-align: center; top: 95px;">
												<div style="position: absolute; top: 0px; left: 0px; border: 0px solid #ffffff; width: 380px; height: 30px; text-align: right;">
												<h2>
													<font color="white" size="5">Your <font color="#ff9000">Activation Letter</font> has been Sent to
												</h2>
												</div>

												<div style="position: absolute; top: 0px; left: 400px; border: 0px solid #ffffff; width: 495px; height: 30px; padding-left: 0px; text-align: left;">
													<font color="#ffffff"><b><? echo $_SESSION['ActiveUser']['email_addr']; ?></b></font>
												</div>

												<div style="position: absolute; top: 35px; left: 400px; border: 0px solid #ffffff; width: 495px; height: 30px; padding-left: 0px; text-align: left;">
													<font color="#fd7e5c">Is this incorrect? (<a href="MyStuff"><font color="#ffffff">Change It Here</font></a>)</font>
												</div>
											</div>
	

											<div style="position: relative; margin: 0 auto; border: 0px solid #ffffff; width: 450px; height: 30px; text-align: center; top: 115px;">
												<hr width="450">
											</div>
											
											



											<div style="position: relative; margin: 0 auto; border: 0px solid #ffffff; width: 900px; height: 150px; text-align: center; top: 125px;">
												<div style="position: absolute; top: 10px; left: 0px; border: 0px solid #ffffff; width: 500px; height: 130px; text-align: center;">
													<table border=0>
														<tr>
															<td colspan="3"><font color="#ffffff" size="5"><b><i>Now What?</i></b></font></td>
														</tr>
														<tr>
															<td><font color="#ffffff" size="4">Step #1</font></td>
															<td width="20"></td>
															<td align="left"><font color="#fdc753" size="4">Check Your eMail Inbox & SPAM Box</font></td>
														</tr>
														<tr>
															<td><font color="#ffffff" size="4">Step #2</font></td>
															<td width="20"></td>
															<td align="left"><font color="#fdc753" size="4">Find the eMail titled "Activation - eGenerations Network Affiliate Center"</font></td>
															</tr>
														<tr>
															<td><font color="#ffffff" size="4">Step #3</font></td>
															<td width="20"></td>
															<td align="left"><font color="#fdc753" size="4">Click the "Activation Link"</font></td>
														</tr>
													</table>
												</div>



												<div style="position: absolute; top: 0px; right: 0px; border: 0px solid #ffffff; width: 375px; height: 108px; padding-left: 0px; text-align: left; margin-top: 10px; margin-right: 10px; padding-top: 5px; padding-left: 5px;">
													<table>
														<tr>
															<td>
      													<?
      														if($_SESSION['ActiveUser']['referrer_profile']){
      															$obj_Member->ImageDisplay_2($_SESSION['ActiveUser']['userid'], $obj_Member->Decrypt($_SESSION['ActiveUser']['referrer_profile']), 2, 1, false, true);
      															$MemberProfile =	$obj_Member->GetMemberProfile_Defined($_SESSION['ActiveUser']['referrer_profile']);
      														}
      													?>
															</td>
															<td width="220" align="center">
      													<?
      														if($_SESSION['ActiveUser']['referrer_profile']){
      													?>																
																<font color="#ffeba5" size="5">
																Now go check out
																<br>
																<? echo $MemberProfile['username']; ?>
																</font>
																<?
																	}else{
																		?> <input style="font-size: 20px;" type="button" onclick="window.location='Home'" value="I Got It Let's Go!" />  <?
																	}
																?>
															</td>
														</tr>
													</table>
												</div>
											</div>

											<?
											// END content ---------------------------------

                  	}








									// NO PROMOCODE ==========================================================================================================
                  }else{
                  	
										// new female member -----------------------------
        						if($_SESSION['ActiveUser']['gender'] == 2){

											// content -------------------------------------
											?>
                  		<br><br>
                  		<center>
                  		<h2>
                  			<table>
                  				<td><img src="common/img/icons/icon_50x50_greencheck.png"></td>
                  				<td width="7"></td> <td><font color="#229F17" size="6">Account Created!</font></td>
                  			</table>
                  		</h2>
                  		</center>
                  		
                  		<br>
                  		<center>
                  			<font color="white" size="5">Your <font color="#ff9000">Activation Letter</font> has been Sent!
                  				<br><br>
                  				The eMail was sent to: <font color="#0f9afc"><? echo $obj_Member->GeteMailAddr($_SESSION['ActiveUser']['userid']); ?></font>
                  				<br><br>
                  				<table><tr><td colspan="3"><font color="#ffffff" size="5"><b><i>Now What?</i></b></font></td></tr><tr><td><font color="#ffffff" size="4">Step #1</font></td><td width="20"></td><td align="left"><font color="#fdc753" size="4">Check Your eMail</font></td></tr><tr><td><font color="#ffffff" size="4">Step #2</font></td><td width="20"></td><td align="left"><font color="#fdc753" size="4">Find the eMail titled "Activation - eGenerations Network Affiliate Center"</font></td></tr><tr><td><font color="#ffffff" size="4">Step #3</font></td><td width="20"></td><td align="left"><font color="#fdc753" size="4">Click the "Activation Link"</font></td></tr></table><br><table style="width: 400px; height: 140px; border: 4px solid #f10000; margin-top: 20px;"><tr><td align="center"><table><tr><td align="center"><font color="white" size="5"><b>Cant Find It?</b></font><br><br><font color="white" size="3">Check Your Bulk / Junk Mail Bin<br><br>Is the eMail Address Correct? (<a href="MyStuff"><font color="#ff9000">change it</font></a>)</font></td></tr></table></td></tr></table>
											<?
											// END content ---------------------------------


/*        					 		
        					 		$__WomenOnly	=	'6969femfetal';
        					    $message1			= '<br><br><center><h2><table><td><img src=\"common/img/icons/icon_success_small.png\"></td> <td width=\"7\"></td> <td><font color=\"#229F17\" size=\"6\">Account Created!</font></td></table></h2></center>';
        							echo $message2;
                   		echo '<center><table border=0 width=\"100%\"  align=\"middle\"><tr><td align=middle><center><h2><font color=\"#ffffff\">Check Your E-Mail to Complete Your Registration</font></h2><br><br><table><td align=\"middle\"><center><font size=\"4\" face=\"arial\" color=\"#ffffff\"><b>Your Account Activation Letter was sent to: <font color=\"yellow\">'.$_SESSION['ActiveUser']['email_addr'].'</font> <br> Your Password is (Please Write it Down): <font color=\"yellow\">'.$_SESSION['ActiveUser']['password'].'</font></b></td></table><br><br><font size=\"4\" face=\"arial\" color=\"#ffffff\"><b>When it arrives, Click on the Activation Link</b></font></font><br><br><br><br><table><tr><td align=\"middle\"><center><fieldset style=\"padding: 14px 14px 14px 14px;\"><legend><font style=\" font-size: 26px; letter-spacing: -2px; font-family: arial; color: #ffffff; \"><b>Cant Find The Activation Letter ?</b></font></legend><table><tr><td align=\"left\"><br><font face=\"arial\" color=\"#ffffff\"><li><b>Ensure you entered your E-Mail address correctly. <font color=\"#ffffff\">If its wrong, register again</font>.</b></li><br><li><b><font face=\"arial\" color=\"#ffffff\">Check your Bulk / Junk Bin</font>, the message might have been filtered out.</font></b></li><br><font face=\"arial\" color=\"#ffffff\"><li></font><a href=\"helpdesk\"><b><u><font face=\"arial\" color=\"#3a76e3\">Contact the Help Desk</font></u></b></a><font face=\"arial\" color=\"#ffffff\"><b> if you dont receive the Activation Letter.</font></b></li></font></td></tr></table></fieldset></td></tr></table></td></tr></table></center>";';
*/			

										// standard member no promocode ------------------
                  	}else{
											
											// content -------------------------------------
											?>
                  		<br><br>
                  		<center>
                  		<h2>
                  			<table>
                  				<td><img src="common/img/icons/icon_50x50_greencheck.png"></td>
                  				<td width="7"></td> <td><font color="#229F17" size="6">Account Created!</font></td>
                  			</table>
                  		</h2>
                  		</center>
                  		
                  		<br>
                  		<center>
                  			<font color="white" size="5">Your <font color="#ff9000">Activation Letter</font> has been Sent!
                  				<br><br>
                  				The eMail was sent to: <font color="#0f9afc"><? echo $obj_Member->GeteMailAddr($_SESSION['ActiveUser']['userid']); ?></font>
                  				<br><br>
                  				<table><tr><td colspan="3"><font color="#ffffff" size="5"><b><i>Now What?</i></b></font></td></tr><tr><td><font color="#ffffff" size="4">Step #1</font></td><td width="20"></td><td align="left"><font color="#fdc753" size="4">Check Your eMail</font></td></tr><tr><td><font color="#ffffff" size="4">Step #2</font></td><td width="20"></td><td align="left"><font color="#fdc753" size="4">Find the eMail titled "Activation - eGenerations Network Affiliate Center"</font></td></tr><tr><td><font color="#ffffff" size="4">Step #3</font></td><td width="20"></td><td align="left"><font color="#fdc753" size="4">Click the "Activation Link"</font></td></tr></table><br><table style="width: 400px; height: 140px; border: 4px solid #f10000; margin-top: 20px;"><tr><td align="center"><table><tr><td align="center"><font color="white" size="5"><b>Cant Find It?</b></font><br><br><font color="white" size="3">Check Your Bulk / Junk Mail Bin<br><br>Is the eMail Address Correct? (<a href="MyStuff"><font color="#ff9000">change it</font></a>)</font></td></tr></table></td></tr></table>
											<?
											// END content ---------------------------------

                  	}
                   
                  }
                  

                  ?>

												<!-- END Content Window -->
                    		</td>
                    	</table>
                    		
                    </div>

        					<!-- END html  -->
               <?  



  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){



  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	













    			// Mail  =================================================================================
        	case "member-Mail":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

  						// Registered & NOT Paid -------------------------------------------
  						//if($obj_Member->MemberAuthorized == true && $obj_Member->MemberPaid == true){
  						if($obj_Member->MemberAuthorized == true){
								
								$MsgSenderID									=	$_SESSION['ActiveUser']['userid'];
								$MailBoxOwner_UserID					=	$_SESSION['ActiveUser']['userid'];
								$PrivateEncrypted_MsgSenderID	=	$obj_Member->Encrypt($MsgSenderID, 'private');
								
								$MemberConversations					=	$obj_Member->CheckMemberMail($_SESSION['ActiveUser']['userid'], 'getconversations', 'all');
								$TotalMemberConversations 		= mysql_num_rows($MemberConversations);
								
								$TotalNewMessages							=	$obj_Member->CheckMemberMail($_SESSION['ActiveUser']['userid'], 'checkonly', 'unread');

  							function compare_TS($a, $b){
  								return strnatcmp($a['ts_created'], $b['ts_created']);
  							}

                ?>
        					<!-- html  -->



      <!--
          						<center>
          							<br><br><br><br>
          							<font class="greetinglarge">Profile Viewer</font>
          							<br><br><br>
          							<? 
          								echo '<font color="white">';
          								echo 'MemberID >> '.$obj_Member->Decrypt($_GET['_898a8as']);
          								echo '<br>';
          								echo 'MemberID >> '.$_GET['_898a8as'];
          								echo '</font>';
          							?>
          						</center>
      -->




                    <!-- style sheet -->
                    <link rel="stylesheet" href="common/css/mymail/mail-core.css" type="text/css" media="all"/>
      							

                    <style>
                    	#globalcontainer {
                      	position:					relative;
                        left:							0px;
                        top:							91px;
                        margin:						0 auto;
                        padding:					0 0 0 0;
                        padding-bottom:		40px;
                        width: 						100%;
                        height: 					auto;
                        
                        border: 					0px solid #565643;
                        z-index:					1;
                        /* background: 			url(http:/egenerations.com/common/img/backgrounds/background_gradient_blu-drk.gif) #146ADB repeat-x fixed top center; */
                        /* background: 			url(http://egenerations.com/common/img/index/background_gradient2.jpg) #1469db repeat-x fixed top center; */
                        background: 			url(/common/img/backgrounds/bg_gradient_red2blk.gif) #b11100 repeat-x fixed top center;
                        background-attachment: fixed;
                        align:						center;
                        text-align:				center;
                    	}
                    </style>
                    
                    <script type="text/javascript">
                    	
                    	var CurrentHeight;
                    	
                    	
                    	function openMail(conversationID, recipientID){


/*
												if(document.getElementById(conversationid).style.display = 'none'){
													document.getElementById(conversationid).style.display = 'inline';
												}else{
													document.getElementById(conversationid).style.display = 'none';
												}
*/
                      	//document.getElementById(conversationid).style.height 		= "350px";

												var CurrentHeight	=	document.getElementById('msgs' + conversationID).style.height;
												//alert(CurrentHeight);
                      	
                      	// open ----------------------------
                      	if(CurrentHeight == '20px'){
                      		document.getElementById('msgs' + conversationID).style.height 					= "auto";
                      		document.getElementById('thread' + conversationID).style.display 				= '';


                      		
                      		// Remove New Mail notification --
                      		var NEW_MSG_FLAG = document.getElementById('new_message_flag' + conversationID).value;

                      		if(NEW_MSG_FLAG == 'true'){
                      			//fade('new_message_notification' + conversationID, 'out');
                      			document.getElementById('new_message_notification' + conversationID).style.display 	= 'none';
                      		}
													// -------------------------------



                      		CurrentHeight = '350px';
                      		//document.getElementById('msgs_toggle' + conversationID).innerHTML 	= '<font style="color: #f83b09; font-size: 14px; text-decoration: underline; cursor: pointer;"><b>Close Conversation</b></font>';
                      		document.getElementById('msgs_toggle' + conversationID).innerHTML 			= '<font style="color: #cd0723; font-size: 18px; text-decoration: underline; cursor: pointer;">Close Conversation</font>';
                      		document.getElementById('msgs_toggle_icon' + conversationID).innerHTML 	= '<img src="/common/img/icons/icon_20x20_redminus.png">';
														                      		
                      		if(recipientID != 0){
                      			SetMailRead(conversationID, recipientID);
                      		}

                      	// close ---------------------------
                      	}else if(CurrentHeight != '20px'){
                      		document.getElementById('msgs' + conversationID).style.height 					= "20px";
                      		document.getElementById('thread' + conversationID).style.display 				= 'none';
                      		CurrentHeight = '20px';
                      		//document.getElementById('msgs_toggle' + conversationID).innerHTML 	= '<font style="color: #2bd403; font-size: 14px; text-decoration: underline; cursor: pointer;"><b>Open Conversation</b></font>';
                      		document.getElementById('msgs_toggle' + conversationID).innerHTML 			= '<font style="color: #2bd403; font-size: 18px; text-decoration: underline; cursor: pointer;">Open Conversation</font>';
                      		document.getElementById('msgs_toggle_icon' + conversationID).innerHTML 	= '<img src="/common/img/icons/icon_20x20_greenplus.png">';
                      		
                      		//alert(CurrentHeight);
                      	}


                    		//conversationid.style.height = '200';
                    		//document.getElementById(conversationid).style.height =	200;

                    		
                    		//document.getElementById(conversationid).style.overflow 	= "visible";
                    		//document.getElementById(conversationid).style.height 		= "auto";
												//expanded	= true;
                    		//alert(document.getElementById('expanded_status').value);

                    	}

											
											function testRemove(conversationID){
												document.getElementById('conversation' + conversationID).style.display 	= 'none';
											}


                    </script>

                    <style>

                      .comment-box {
                      	font-size:				16px;
                      	background:				url(/common/img/mail/msg-top-bg.png) 0px 18px no-repeat;
                      	margin-bottom:		20px;
                      }

                      .comment-author {
                      		padding:				3px 10px;
                      		margin-bottom:	10px;
                      		color:					#A5A5A5;
                      }

                      .comment-author span {
                      		color:					#006284;
                      		font-weight:		bold;
                      }

                      .comment-body {
                      
                      		padding-top:		-10px;
                      		padding-bottom:	20px;
                      		padding-left:		20px;
                      		padding-right:	65px;
                      		
                      		background:			url(/common/img/mail/msg-body-bg.png) 0% 100% no-repeat;
                      		line-height:		1.6;
                      }	
                    </style>



                    <!-- <div id="globalcontainer" style="background: url(/common/img/backgrounds/page/<? echo $webpagebgimage; ?>) #1469db repeat-x fixed top center"> -->
      
<?
/*      
                    <!-- top bar COMPLETE -->
                    	<div id="topcontainer">
                    		<div id="icon"><img src="http://www.egenerations.com/common/img/icons/icon_webpage.png" width="96" height="82" alt="<? echo $MemberProfile['username']; ?>'s Profile"></div>
                    		<div id="paneltitle"><h2 style="color: black;"><? echo $MemberProfile['username']; ?></h2> </div>
                    		<div id="panel_overview_seeking">&nbsp;&nbsp;&nbsp;<b><? echo 'I\'m Seeking'; ?></b> <? echo $MemberProfile['seeking']; ?></div>
                    		<div id="panel_overview_interested">&nbsp;&nbsp;&nbsp;<b>Interested in</b> <? echo $MemberProfile['into']; ?> </div>
                    		<div id="button">
      	               		<input class="genericsubmit" type="submit" name="save" value="Next Member" onclick="location.href='MyStuff'">
                    		</div>
                    	</div>
                    <!-- END top bar COMPLETE -->
*/
?>

      
      
      
      							<!-- mail bins -->
												<div id="subcontainer_level1" style="position: fixed; width: 960px; height: 100px; z-index: 100;">
                    			<div id="subcontainer_level1_title" style="background-color: #1f1f1f;"><h2 style="color: #ffc000;">&nbsp;Conversations</h2></div>

													<div id="subcontainer_level1_data">
														<table border=0 cellpadding="0" cellspacing="0" width="100%">

                    					<tr>
                    						<td colspan="3" height="8"></td>
                    					</tr>

                    					<tr>
                    						<td width="120">&nbsp;&nbsp;&nbsp;<a href=""><font class="typewhite18px">New Msgs</font></a></td> <td width="5"></td> <td> <font class="typeyellow14pxb"><? echo ($TotalNewMessages > 0 ? ''.$TotalNewMessages.' New!':'None'); ?></font></td>
                    					</tr>

                    					<tr>
                    						<td colspan="3" height="8"></td>
                    					</tr>

                    					<tr>
                    						<td width="120">&nbsp;&nbsp;&nbsp;<a href=""><font class="typewhite18px">Conversations</font></a></td> <td width="5"></td> <td><font class="typewhite14pxb">(<? echo $TotalMemberConversations; ?>)</font></td>
                    					</tr>
                    				</table>
													</div> <!-- END subcontainer_level1_data -->

                    		</div> <!-- END subcontainer_level1 -->
                    <!-- mail bins COMPLETE -->



      							<!-- promotion -->
												<div id="mail_promotion" style="position: fixed; width: 200px; height: 100px; top: 205px; z-index: 10; margin-left: 10px;">
                    			

													<div id="subcontainer_level1_data">
														<table border=0 cellpadding="0" cellspacing="0" width="100%">

                    					<tr>
                    						<td colspan="3" height="8"></td>
                    					</tr>

                    					<tr>
                    						<td colspan="3" height="500" valign="top">
                    						<a href="http://<? echo $_SERVER['SERVER_NAME']; ?>/mystuff"><img src="/common/img/promotional/conversation-it-starts-everything.jpg" border="0"></a>
                    							<!--
                    							<font color=white>
                    								-- promotional banner ad --
                    								<br><br><br><br>
                    								"TITLE HERE"<br> - Mail AddOns Here<br>
                    							</font>
                    							-->
                    						</td>
                    					</tr>

                    					<tr>
                    						<td colspan="3" height="8"></td>
                    					</tr>


                    				</table>
													</div> <!-- END subcontainer_level1_data -->

                    		</div> <!-- END subcontainer_level1 -->
                    <!-- END promotion -->








                    <!-- mail_container -->
                    			<!-- <div id="mail_container"> -->
                    				<!-- <div id="subcontainer_titlebar" class="gradient 9b0200 000000 vertical bar"><h2 style="color: #ffc000;">&nbsp;Mail</h2></div> -->
                         		
                         		<!--
                         		<table border="1">
                    					<tr>
                    						<td valign="top">
                    							<font color="white">
                    				-->
      														<?

																		// UnActivated Account spawns Modal Window Reminder ------------
      															if($_SESSION['ActiveUser']['activated'] != 1){
      																?> 
      																	<script type="text/javascript">
      																		GB_showCenter('', 'http://sm0005.com/ResendActivationRequest', 180, 600);
      																	</script>
      																<?
      															}
      															// -------------------------------------------------------------

																		// read out conversations --------------------------------------
      															while( $conversation = mysql_fetch_object($MemberConversations) ){
      																
      																// dont display conversations set as deleted -----------------
      																if( $conversation->init_delete != $_SESSION['ActiveUser']['userid'] && $conversation->rec_delete != $_SESSION['ActiveUser']['userid']){



																					// conversations I started ---------------------
      																		if($conversation->init_userid == $_SESSION['ActiveUser']['userid']){
      																		

      																		
      																		?> <div id="conversation<? echo $conversation->id; ?>" style="border: 1px solid #ffffff; width: 660px; height: 102px; position: relative; margin-bottom: 5px; padding: 5px; left: 240px; top: 50px; background-color:<? echo ($obj_Member->GetStatus($conversation->rec_userid, 'special') == true ? '#ff723b;':'#4a4a4a;;'); ?>"> <?
      																				
      																			$Delete									=	'init';
      																			$Num_Sent_MsgsUnread		=	$obj_Member->CheckForUnreadMail($MailBoxOwner_UserID, $conversation->id, 'sender');
      																			$Num_Got_MsgsUnread			=	$obj_Member->CheckForUnreadMail($MailBoxOwner_UserID, $conversation->id, 'receiver');



																						// AVATAR DIV ----------------------------------------------------
      																			/* ?> <div style="border: 0px solid #ffffff; width: 100px; height: 100px; position: absolute; left: 5px; top: 5px;"> <? */
      																			?> <div style="border: solid <? echo ($obj_Member->GetStatus($conversation->rec_userid, 'special') == true ? '0px #000000;':'0px #ffffff;'); ?> width: 100px; height: 100px; position: absolute; left: 5px; top: 5px;"> <?
      																				$obj_Member->ImageDisplay_2($_SESSION['ActiveUser']['userid'], $conversation->rec_userid, 2, 1, false, true, ($obj_Member->GetStatus($conversation->rec_userid, 'special') == true ? '#000000':'#ffffff'));
      																				//$obj_Member->ImageDisplay($conversation->rec_userid, 1, 1);
      																				



      																			?> </div> <?
																						// END AVATAR DIV ------------------------------------------------



      																			?> 
      																				<div id="msg_meta_data_<? echo $conversation->id; ?>'" style="border: 0px solid #ffffff; width: 565px; height: 100px; position: relative; left: 110px; top: 0px; z-index: 10;"> 
      																			<?

																								// I started with ...
																								echo '<div id="labelBox_mail_'.$conversation->id.'" style="border: 1px solid #4f4f4f; width: 500px; height: 13px; padding: 5px; padding-bottom: 7px; background-color: #000000;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="middle"> <font color="#ffffff">I Started w/ '.ucwords($obj_Member->GetMemberProfile($conversation->rec_userid)->username).' '.three_way_reduced($conversation->ts_created).' -- '.($conversation->readlatest == 0 ? ' Latest Msg Sent '.three_way_reduced($conversation->ts_latestmsg) : '').'</font></td> <td width="20"></td> <td align="center" valign="middle"><!-- <img src="/common/img/icons/icon_20x20_redcheck.png"> --></td></table> </div>';

																								// Delete Conversation X icon --
																								echo '<div style="border: 0px solid #4f4f4f; width: 25px; height: 20px; padding: 0px; position: absolute; top: 35px; right: -25px;"> <a onclick="SetMailDeleted(\''.$conversation->id.'\', \''.$PrivateEncrypted_MsgSenderID.'\', \''.$Delete.'\');"><span id="msgs_toggle_delete'.$conversation->id.'"><img src="common/img/icons/icon_20x20_redx.png" style="cursor: pointer; width: 30px; height: 30px;" alt="Delete Conversation" /></span></a> </div>';

																								// NEW Messages ...
																								echo ( $Num_Got_MsgsUnread > 0 ? '<div id="new_message_notification'.$conversation->id.'" style="position: absolute; border: 1px solid #808080; width: 300px; height: 13px; top: 25px; padding: 8px; margin-top: 5px; background-color: #000000;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="middle"> <font color="#02c731">'.$Num_Got_MsgsUnread.' NEW '.($Num_Got_MsgsUnread > 1 ? 'Messages':'Message').'!</font></td> <td width="20"></td> <td align="center" valign="middle"><!-- <img src="/common/img/icons/icon_20x20_redcheck.png"> --></td></table> <input type="hidden" id="new_message_flag'.$conversation->id.'" value="true" /></div>' : '<input type="hidden" id="new_message_flag'.$conversation->id.'" value="false" />');
																							
																								// Unread Messages ...
																								echo ( $Num_Sent_MsgsUnread > 0 ? '<div style="position: absolute; top: 25px; border: 1px solid #808080; width: 300px; height: 13px; padding: 8px; margin-top: 5px; background-color: #000000;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="middle"> <font color="#ffba00">'.$Num_Sent_MsgsUnread.' Unread '.($Num_Got_MsgsUnread > 1 ? 'Messages':'Message').' by Recipient</font></td> <td width="20"></td> <td align="center" valign="middle"><!-- <img src="/common/img/icons/icon_20x20_redcheck.png"> --></td></table> </div>' : '');


// DEBUG // echo $obj_Member->GetFriendStatus($conversation->rec_userid, $_SESSION['ActiveUser']['userid']);

																							// add / remove / block --------------------------------------------------
      																				switch( ($conversation->rec_userid != $_SESSION['ActiveUser']['userid'] ? $obj_Member->GetFriendStatus($conversation->rec_userid, $_SESSION['ActiveUser']['userid']):'self') ){


      																						case('friend.none'):
      																							// add friend --------------
      																							echo '<div id="option_add2Friends'.$conversation->id.'" name="optionGroup_add2Friends_'.$obj_Member->Encrypt($conversation->rec_userid).'" style="position: absolute; top: 30px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><img src="/common/img/icons/icon_30x30_greenplus.png" border="0"></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$obj_Member->Encrypt($conversation->rec_userid, 'public').'\', \'execute.myfriends.add\', \''.$conversation->id.'\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Add to Friends</font></a></td></tr></table> </div>';
      																							// block -------------------
      																							echo '<div id="option_blockFriend'.$conversation->id.'" name="optionGroup_blockFriend_'.$obj_Member->Encrypt($conversation->rec_userid).'" style="position: absolute; top: 70px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><img src="/common/img/icons/icon_30x30_redblock.png" border="0"></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$obj_Member->Encrypt($conversation->rec_userid, 'public').'\', \'execute.myfriends.block\', \''.$conversation->id.'\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Block</font></a></td></tr></table> </div>';
      																						break;

      																						case('friend.accepted'):
      																							// unfriend ----------------
      																							//echo '<div style="position: absolute; top: 30px; right: 20px; border: 0px solid #ffffff; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><a onclick="MyNetwork(\''.$PrivateEncrypted_MsgSenderID.'\', \''.$obj_Member->Encrypt($conversation->init_userid).'\', \'remove\');"><img src="/common/img/icons/icon_30x30_redminus.png" border="0"></a></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$PrivateEncrypted_MsgSenderID.'\', \''.$obj_Member->Encrypt($conversation->rec_userid).'\', \'remove\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Remove from Friends</font></a></td></tr></table> </div>';
      																							echo '<div style="position: absolute; top: 40px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"></td> <td width="10"></td> <td valign="middle" align="center"><font style="color: yellow; font-size: 17px;"><b><i>Friend</i></b></font> &nbsp;&nbsp; <a href="MyFriends"><font style="color: #ffffff; font-size: 17px; text-decoration: none;">(<font style="color: '.($obj_Member->GetStatus($conversation->rec_userid, 'special') == true ? '#000000;':'#ffa940;').' font-size: 17px; text-decoration: none;">Change</font><font style="color: #ffffff; font-size: 17px; text-decoration: none;">)</font></a></td></tr></table> </div>';

      																							// block -------------------
																										echo '<div id="option_blockFriend'.$conversation->id.'" name="optionGroup_blockFriend_'.$obj_Member->Encrypt($conversation->rec_userid).'" style="position: absolute; top: 70px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><img src="/common/img/icons/icon_30x30_redblock.png" border="0"></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$obj_Member->Encrypt($conversation->rec_userid, 'public').'\', \'execute.myfriends.block\', \''.$conversation->id.'\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Block</font></a></td></tr></table> </div>';
      																						break;

      																						case('friend.denied'):
      																							// add friend --------------
      																							echo '<div id="option_add2Friends'.$conversation->id.'" name="optionGroup_add2Friends_'.$obj_Member->Encrypt($conversation->rec_userid).'" style="position: absolute; top: 30px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><img src="/common/img/icons/icon_30x30_greenplus.png" border="0"></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$obj_Member->Encrypt($conversation->rec_userid, 'public').'\', \'execute.myfriends.add\', \''.$conversation->id.'\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Add to Friends</font></a></td></tr></table> </div>';
      																							// block -------------------
      																							echo '<div id="option_blockFriend'.$conversation->id.'" name="optionGroup_blockFriend_'.$obj_Member->Encrypt($conversation->rec_userid).'" style="position: absolute; top: 70px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><a onclick="MyNetwork(\''.$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$obj_Member->Encrypt($conversation->rec_userid, 'public').'\', \'execute.myfriends.block\', \''.$conversation->id.'\');"><img src="/common/img/icons/icon_30x30_redblock.png" border="0"></a></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$PrivateEncrypted_MsgSenderID.'\', \''.$obj_Member->Encrypt($conversation->rec_userid).'\', \'block\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Block</font></a></td></tr></table> </div>';
      																						break;

      																						case('friend.pending'):
        																						if($obj_Member->CheckPendingFriendRequests($_SESSION['ActiveUser']['userid'], $conversation->rec_userid) == true){
        																							// friend request ----------
        																							echo '<div id="option_pendingFriends'.$conversation->id.'" name="optionGroup_add2Friends_'.$obj_Member->Encrypt($conversation->rec_userid).'" style="position: absolute; top: 30px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td height="30" valign="bottom" align="center"><font color=yellow size=3><b><i>Pending...</i></b></font></font></td></tr></table> </div>';
        																						}else{
        																							// pending -----------------
        																							echo '<div id="option_pendingFriends'.$conversation->id.'" name="optionGroup_add2Friends_'.$obj_Member->Encrypt($conversation->rec_userid).'" style="position: absolute; top: 30px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><font color=yellow size=3><b><i>Pending...</i></b></font></font></td></tr></table> </div>';
        																						}
      																							// block -------------------
      																							//echo '<div style="position: absolute; top: 70px; right: -10px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><a onclick="MyNetwork(\''.$PrivateEncrypted_MsgSenderID.'\', \''.$obj_Member->Encrypt($conversation->init_userid).'\', \'block\');"><img src="/common/img/icons/icon_30x30_redblock.png" border="0"></a></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$PrivateEncrypted_MsgSenderID.'\', \''.$obj_Member->Encrypt($conversation->init_userid).'\', \'block\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Block</font></a></td></tr></table> </div>';
      																							echo '<div id="option_blockFriend'.$conversation->id.'" name="optionGroup_blockFriend_'.$obj_Member->Encrypt($conversation->rec_userid).'" style="position: absolute; top: 70px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><img src="/common/img/icons/icon_30x30_redblock.png" border="0"></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$obj_Member->Encrypt($conversation->rec_userid, 'public').'\', \'execute.myfriends.block\', \''.$conversation->id.'\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Block</font></a></td></tr></table> </div>';
      																						break;

      																				}
      																				// -----------------------------------------------------------------------
      																				
      																			?> </div> <?



																					// conversations They started ------------------
      																		//}else{
      																		}elseif($conversation->rec_userid == $_SESSION['ActiveUser']['userid']){


      																			?> <div id="conversation<? echo $conversation->id; ?>" style="border: 1px solid #ffffff; width: 660px; height: 102px; position: relative; margin-bottom: 5px; padding: 5px; left: 240px; top: 50px; background-color:<? echo ($obj_Member->GetStatus($conversation->init_userid, 'special') == true ? '#ff723b;':'#4a4a4a;;'); ?>"> <?
      																			
      																			$Delete									=	'rec';
      																			$Num_Sent_MsgsUnread		=	$obj_Member->CheckForUnreadMail($MailBoxOwner_UserID, $conversation->id, 'sender');
      																			$Num_Got_MsgsUnread			=	$obj_Member->CheckForUnreadMail($MailBoxOwner_UserID, $conversation->id, 'receiver');
      																			$NumMsgsUnread					=	$obj_Member->CheckForUnreadMail($MailBoxOwner_UserID, $conversation->id, 'receiver');



      																			// AVATAR DIV ----------------------------------------------------
      																			?> <div style="border: solid <? echo ($obj_Member->GetStatus($conversation->init_userid, 'special') == true ? '0px #000000;':'0px #ffffff;'); ?> width: 100px; height: 100px; position: absolute; left: 5px; top: 5px;"> <?
      																				$obj_Member->ImageDisplay_2($_SESSION['ActiveUser']['userid'], $conversation->init_userid, 2, 1, false, true, ($obj_Member->GetStatus($conversation->rec_userid, 'special') == true ? '#000000':'#ffffff'));
      																				//$obj_Member->ImageDisplay($conversation->init_userid, 1, 1);
      																				


      																			?> </div> <?
      																			// END AVATAR DIV ------------------------------------------------




      																			?>
      																				<div style="border: 0px solid #ffffff; width: 565px; height: 100px; position: relative; left: 110px; top: 0px; z-index: 10;">
      																			<?
																								
																								// I got from ... 
																								echo '<div id="labelBox_mail_'.$conversation->id.'" style="border: 1px solid #4f4f4f; width: 500px; height: 13px; padding: 5px; padding-bottom: 7px; background-color: #000000;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="middle"> <font color="#ffffff">I Got from '.ucwords($obj_Member->GetMemberProfile($conversation->init_userid)->username).' '.three_way_reduced($conversation->ts_created).' -- '.($conversation->readlatest == 0 ? ' Latest Msg Sent '.three_way_reduced($conversation->ts_latestmsg) : '').'</font></td> <td width="20"></td> <td align="center" valign="middle"><!-- <img src="/common/img/icons/icon_20x20_redcheck.png"> --></td></table> </div>';
																								
																								// Delete Conversation X icon --
																								echo '<div style="border: 0px solid #4f4f4f; width: 25px; height: 20px; padding: 0px; position: absolute; top: 35px; right: -25px;"> <a onclick="SetMailDeleted(\''.$conversation->id.'\', \''.$PrivateEncrypted_MsgSenderID.'\', \''.$Delete.'\');"><span id="msgs_toggle_delete'.$conversation->id.'"><img src="common/img/icons/icon_20x20_redx.png" style="cursor: pointer; width: 30px; height: 30px;" alt="Delete Conversation" /></span></a> </div>';
																								
																								// NEW Messages ...
																								echo ( $Num_Got_MsgsUnread > 0 ? '<div id="new_message_notification'.$conversation->id.'" style="position: absolute; border: 1px solid #808080; width: 300px; height: 13px; top: 25px; padding: 8px; margin-top: 5px; background-color: #000000;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="middle"> <font color="#02c731">'.$Num_Got_MsgsUnread.' NEW '.($Num_Got_MsgsUnread > 1 ? 'Messages':'Message').'!</font></td> <td width="20"></td> <td align="center" valign="middle"><!-- <img src="/common/img/icons/icon_20x20_redcheck.png"> --></td></table> <input type="hidden" id="new_message_flag'.$conversation->id.'" value="true" /></div>' : '<input type="hidden" id="new_message_flag'.$conversation->id.'" value="false" />');
																								
																								// Unread Messages by Recipient ...
																								echo ( $Num_Sent_MsgsUnread > 0 ? '<div style="position: absolute; top: 25px; border: 1px solid #808080; width: 300px; height: 13px; padding: 8px; margin-top: 5px; background-color: #000000;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="middle"> <font color="#ffba00">'.$Num_Sent_MsgsUnread.' Unread '.($Num_Got_MsgsUnread > 1 ? 'Messages':'Message').' by Recipient</font></td> <td width="20"></td> <td align="center" valign="middle"><!-- <img src="/common/img/icons/icon_20x20_redcheck.png"> --></td></table> </div>' : '');


// DEBUG // echo $obj_Member->GetFriendStatus($conversation->init_userid, $_SESSION['ActiveUser']['userid']);
																							// add / remove / block --------------------------------------------------
      																				switch( ($conversation->init_userid != $_SESSION['ActiveUser']['userid'] ? $obj_Member->GetFriendStatus($conversation->init_userid, $_SESSION['ActiveUser']['userid']):'self') ){

      																						case('friend.none'):
      																							// add friend --------------
      																							echo '<div id="option_add2Friends'.$conversation->id.'" name="optionGroup_add2Friends_'.$obj_Member->Encrypt($conversation->init_userid).'" style="position: absolute; top: 30px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><img src="/common/img/icons/icon_30x30_greenplus.png" border="0"></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$obj_Member->Encrypt($conversation->init_userid, 'public').'\', \'execute.myfriends.add\', \''.$conversation->id.'\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Add to Friends</font></a></td></tr></table> </div>';
      																							// block -------------------
      																							echo '<div id="option_blockFriend'.$conversation->id.'" name="optionGroup_blockFriend_'.$obj_Member->Encrypt($conversation->init_userid).'" style="position: absolute; top: 70px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><img src="/common/img/icons/icon_30x30_redblock.png" border="0"></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$obj_Member->Encrypt($conversation->init_userid, 'public').'\', \'execute.myfriends.block\', \''.$conversation->id.'\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Block</font></a></td></tr></table> </div>';
      																						break;

      																						case('friend.accepted'):
      																							// unfriend ----------------
      																							//echo '<div style="position: absolute; top: 30px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><a onclick="MyNetwork(\''.$PrivateEncrypted_MsgSenderID.'\', \''.$obj_Member->Encrypt($conversation->init_userid).'\', \'remove\');"><img src="/common/img/icons/icon_30x30_redminus.png" border="0"></a></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$PrivateEncrypted_MsgSenderID.'\', \''.$obj_Member->Encrypt($conversation->init_userid).'\', \'remove\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Remove from Friends</font></a></td></tr></table> </div>';
      																							echo '<div style="position: absolute; top: 40px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"></td> <td width="10"></td> <td valign="middle" align="center"><font style="color: yellow; font-size: 17px;"><b><i>Friend</i></b></font> &nbsp;&nbsp; <a href="MyFriends"><font style="color: #ffffff; font-size: 17px;">(<font style="color: '.($obj_Member->GetStatus($conversation->init_userid, 'special') == true ? '#000000;':'#ffa940;').' font-size: 17px;">Change</font><font style="color: #ffffff; font-size: 17px;">)</font></a></td></tr></table> </div>';

      																							// block -------------------
      																							//echo '<div style="position: absolute; top: 70px; right: -10px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><a onclick="MyNetwork(\''.$PrivateEncrypted_MsgSenderID.'\', \''.$obj_Member->Encrypt($conversation->init_userid).'\', \'block\');"><img src="/common/img/icons/icon_30x30_redblock.png" border="0"></a></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$PrivateEncrypted_MsgSenderID.'\', \''.$obj_Member->Encrypt($conversation->init_userid).'\', \'block\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Block</font></a></td></tr></table> </div>';
      																							echo '<div id="option_blockFriend'.$conversation->id.'" name="optionGroup_blockFriend_'.$obj_Member->Encrypt($conversation->init_userid).'" style="position: absolute; top: 70px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><img src="/common/img/icons/icon_30x30_redblock.png" border="0"></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$obj_Member->Encrypt($conversation->init_userid, 'public').'\', \'execute.myfriends.block\', \''.$conversation->id.'\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Block</font></a></td></tr></table> </div>';
      																						break;

      																						case('friend.denied'):
      																							// add friend --------------
      																							echo '<div id="option_add2Friends'.$conversation->id.'" name="optionGroup_add2Friends_'.$obj_Member->Encrypt($conversation->init_userid).'" style="position: absolute; top: 30px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><img src="/common/img/icons/icon_30x30_greenplus.png" border="0"></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$obj_Member->Encrypt($conversation->init_userid, 'public').'\', \'execute.myfriends.add\', \''.$conversation->id.'\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Add to Friends</font></a></td></tr></table> </div>';
      																							// block -------------------
      																							echo '<div id="option_blockFriend'.$conversation->id.'" name="optionGroup_blockFriend_'.$obj_Member->Encrypt($conversation->init_userid).'" style="position: absolute; top: 70px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><img src="/common/img/icons/icon_30x30_redblock.png" border="0"></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$obj_Member->Encrypt($conversation->init_userid, 'public').'\', \'execute.myfriends.block\', \''.$conversation->id.'\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Block</font></a></td></tr></table> </div>';
      																						break;

      																						case('friend.pending'):
        																						if($obj_Member->CheckPendingFriendRequests($_SESSION['ActiveUser']['userid'], $conversation->init_userid) == true){
        																							// friend request ----------
        																							echo '<div id="option_pendingFriends'.$conversation->id.'" name="optionGroup_blockFriend_'.$obj_Member->Encrypt($conversation->init_userid).'" style="position: absolute; top: 30px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td height="30" valign="bottom" align="center"><font color=yellow size=3><b><i>Pending...</i></b></font></td></tr></table> </div>';
        																						}else{
        																							// pending -----------------
        																							echo '<div id="option_pendingFriends'.$conversation->id.'" name="optionGroup_blockFriend_'.$obj_Member->Encrypt($conversation->init_userid).'" style="position: absolute; top: 30px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><font color=yellow size=3><b><i>Pending...</i></b></font></td></tr></table> </div>';
        																						}
      																							// block -------------------
      																							//echo '<div style="position: absolute; top: 70px; right: -10px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><a onclick="MyNetwork(\''.$PrivateEncrypted_MsgSenderID.'\', \''.$obj_Member->Encrypt($conversation->init_userid).'\', \'block\');"><img src="/common/img/icons/icon_30x30_redblock.png" border="0"></a></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$PrivateEncrypted_MsgSenderID.'\', \''.$obj_Member->Encrypt($conversation->init_userid).'\', \'block\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Block</font></a></td></tr></table> </div>';
      																							echo '<div id="option_blockFriend'.$conversation->id.'" name="optionGroup_blockFriend_'.$obj_Member->Encrypt($conversation->init_userid).'" style="position: absolute; top: 70px; right: 20px; border: 0px solid #4f4f4f; width: 180px; height: 30px;"> <table cellpadding="0" cellspacing="0"><tr><td valign="middle" align="center"><img src="/common/img/icons/icon_30x30_redblock.png" border="0"></td> <td width="10"></td> <td valign="middle" align="center"><a onclick="MyNetwork(\''.$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private').'\', \''.$obj_Member->Encrypt($conversation->init_userid, 'public').'\', \'execute.myfriends.block\', \''.$conversation->id.'\');"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;">Block</font></a></td></tr></table> </div>';
      																						break;

      																						case('self'):
      																						break;

      																				}
      																				// -----------------------------------------------------------------------

      																			?>
      																				</div>
      																			<?

      																		}

																				?>
      																	</div> <!-- END conversation DIV -->




      																<!-- read out threads -->
      																	<div id="msgs<? echo $conversation->id; ?>" style="border: 0px solid #ffffff; width: 700px; height: 20px; position: relative; margin-bottom: 20px; padding: 5px; top: 50px; left: 240px; align: right;">

      																		<? 
																						
																						// PAID && Activated -----------------------------------
    																				if($obj_Member->MemberPaid == true && $_SESSION['ActiveUser']['activated'] == 1){

	      																			
  	    																				// open conversation -----------
 	    																					echo '<div style="border: 0px solid #4f4f4f; width: 250px; height: 25px; padding: 10px; position: absolute; top: 0px; left: 0px;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="center"> <span id="msgs_toggle_icon'.$conversation->id.'"><img src="/common/img/icons/icon_20x20_greenplus.png"></span> </td> <td width="5"></td> <td align="center" valign="center"><a onclick="openMail(\''.$conversation->id.'\', \''.$PrivateEncrypted_MsgSenderID.'\');"><span id="msgs_toggle'.$conversation->id.'"><font style="color: #2bd403; font-size: 18px; text-decoration: underline; cursor: pointer;">Open Conversation</font></a></td></table> </div>';

																								// delete conversation ---------
  	    																				//echo '<div style="border: 0px solid #4f4f4f; width: 200px; height: 25px; padding: 10px; position: absolute; top: 0px; left: 250px;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="center"> <span id="msgs_toggle_icon'.$conversation->id.'"><img src="/common/img/icons/icon_20x20_redminus.png"></span> </td> <td width="5"></td> <td align="center" valign="center"><a onclick="SetMailDeleted(\''.$conversation->id.'\', \''.$PrivateEncrypted_MsgSenderID.'\', \''.$Delete.'\');"><span id="msgs_toggle_delete'.$conversation->id.'"><font style="color: #2bd403; font-size: 18px; text-decoration: underline; cursor: pointer;">Delete Conversation</font></a></td></table> </div>';
	      																			
	      																			/*
	      																			if($Num_Got_MsgsUnread > 0){
  	    																				
  	    																				// open conversation -----------
 	    																					echo '<div style="border: 0px solid #4f4f4f; width: 250px; height: 25px; padding: 10px; position: absolute; top: 0px; left: 0px;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="center"> <span id="msgs_toggle_icon'.$conversation->id.'"><img src="/common/img/icons/icon_20x20_greenplus.png"></span> </td> <td width="5"></td> <td align="center" valign="center"><a onclick="openMail(\''.$conversation->id.'\', \''.$PrivateEncrypted_MsgSenderID.'\');"><span id="msgs_toggle'.$conversation->id.'"><font style="color: #2bd403; font-size: 18px; text-decoration: underline; cursor: pointer;">Open Conversation</font></a></td></table> </div>';

																								// delete conversation ---------
  	    																				echo '<div style="border: 0px solid #4f4f4f; width: 200px; height: 25px; padding: 10px; position: absolute; top: 0px; left: 250px;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="center"> <span id="msgs_toggle_icon'.$conversation->id.'"><img src="/common/img/icons/icon_20x20_redminus.png"></span> </td> <td width="5"></td> <td align="center" valign="center"><a onclick="SetMailDeleted(\''.$conversation->id.'\', \''.$PrivateEncrypted_MsgSenderID.'\', \''.$Delete.'\');"><span id="msgs_toggle_delete'.$conversation->id.'"><font style="color: #2bd403; font-size: 18px; text-decoration: underline; cursor: pointer;">Delete Conversation</font></a></td></table> </div>';

    	  																			}else{
      																					
      																					// open conversation -----------
      																					//echo '<div style="border: 0px solid #4f4f4f; width: 200px; height: 25px; padding: 10px; position: absolute; top: 0px; left: 0px;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="center"> <span id="msgs_toggle_icon'.$conversation->id.'"><img src="/common/img/icons/icon_20x20_greenplus.png"></span> </td> <td width="5"></td> <td align="center" valign="center"><a onclick="openMail(\''.$conversation->id.'\', \''.$PrivateEncrypted_MsgSenderID.'\');"><span id="msgs_toggle'.$conversation->id.'"><font style="color: #2bd403; font-size: 18px; text-decoration: underline; cursor: pointer;">Open Conversation</font></a></td></table> </div>';

  	    																				// delete conversation ---------
  	    																				//echo '<div style="border: 0px solid #4f4f4f; width: 200px; height: 25px; padding: 10px; position: absolute; top: 0px; left: 250px;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="center"> <span id="msgs_toggle_icon'.$conversation->id.'"><img src="/common/img/icons/icon_20x20_redminus.png"></span> </td> <td width="5"></td> <td align="center" valign="center"><a onclick="SetMailDeleted(\''.$conversation->id.'\', \''.$PrivateEncrypted_MsgSenderID.'\', \''.$Delete.'\');"><span id="msgs_toggle_delete'.$conversation->id.'"><font style="color: #2bd403; font-size: 18px; text-decoration: underline; cursor: pointer;">Delete Conversation</font></a></td></table> </div>';

      																				}
      																				*/
      																				
      																			// PAID & NOT Activated --------------------------------
      																			}elseif($obj_Member->MemberPaid == true && $_SESSION['ActiveUser']['activated'] == 0){
      																				echo '<div style="border: 1px solid #dadada; width: 600px; height: 15px; padding: 10px; background-color: #000000;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="middle"><font style="color: #2bd403; font-size: 12px;"><b>New Message!</b> &nbsp;&nbsp;&nbsp;&nbsp;<font color="#ffffff"><a href="ResendActivation"><font color="white"><a onclick="window.location=\'ResendActivation\'"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;"><span id="msgs_toggle'.$conversation->id.'">Activate your Account To Read This EMail</span></font></a></font></a></a></h2></i></td> <td width="20"></td> <td align="center" valign="middle"><!-- <img src="/common/img/icons/icon_20x20_redcheck.png"> --></td></table> </div>';


      																			// NOT PAID & Activated --------------------------------
      																			}elseif($obj_Member->MemberPaid != true && $_SESSION['ActiveUser']['activated'] == 1){
      																				echo '<div style="border: 1px solid #dadada; width: 600px; height: 15px; padding: 10px; background-color: #000000;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="middle"><font style="color: #2bd403; font-size: 12px;"><b>New Message!</b> &nbsp;&nbsp;&nbsp;&nbsp;<font color="#ffffff"><a href="ResendActivation"><font color="white"><a onclick="window.location=\'Upgrade\'"><font style="color: #ffffff; text-decoration: underline; cursor: pointer;"><span id="msgs_toggle'.$conversation->id.'">Subscribe To Read This EMail</span></font></a></font></a></a></h2></i></td> <td width="20"></td> <td align="center" valign="middle"><!-- <img src="/common/img/icons/icon_20x20_redcheck.png"> --></td></table> </div>';
																						
																						// NOT PAID & NOT Activated ----------------------------
      																			}elseif($obj_Member->MemberPaid != true && $_SESSION['ActiveUser']['activated'] == 0){
      																				echo '<div style="border: 1px solid #dadada; width: 600px; height: 15px; padding: 10px; background-color: #000000;"> <table cellpadding="0" cellspacing="0"> <tr><td align="center" valign="middle"><font style="color: #2bd403; font-size: 12px;"><b>New Message!</b> &nbsp;&nbsp;&nbsp;&nbsp;<font color="#ffffff"><a href="ResendActivation"><font color="white">Activate your Account so you can Read This!</font></a></a></h2></i></td> <td width="20"></td> <td align="center" valign="middle"><!-- <img src="/common/img/icons/icon_20x20_redcheck.png"> --></td></table> </div>';
      																			}

      																			$PerConversation	=	$obj_Member->CheckMemberMail($_SESSION['ActiveUser']['userid'], 'getconversations', 'specific', $conversation->id);

																					?>
																							<div id="thread<? echo $conversation->id; ?>" style="display: none; color: #ffffff;">
																						<?
																						
																						
																						$MailRecordFeederCounter	=	0;
																						while($ConversationThreads = mysql_fetch_object($PerConversation)){
																							$ResultMailArray[$MailRecordFeederCounter] = (array)$ConversationThreads;
																							$MailRecordFeederCounter++;
																						}

																						# sort alphabetically by name
																						usort($ResultMailArray, 'compare_TS');
																						
																						
																						foreach($ResultMailArray as $MessageRecord){

																							if($MessageRecord['conversationid'] == $conversation->id){

  																							?>
  																							<div id="specificMessage<? echo $MessageRecord['id']; ?>" style="<? echo ($MessageRecord['toid'] != $_SESSION['ActiveUser']['userid'] ? 'width: 650px; color: #000000;':'width: 600px; margin-left: 50px;'); ?> min-height: 129px; max-height: auto; margin-top: 35px; margin-bottom: 5px; background-image: url(/common/img/mail/panel2_bg.png); background-repeat:	no-repeat; padding-left: 5px; padding-right: 5px;"> 
  																									<!-- <div class="comment-box"> -->
  																										<p class="comment-author"><? echo ($_SESSION['ActiveUser']['username'] == $MessageRecord['fromusername'] ? '<b><font color="#000000"><font color="#ffff00">You</font> '.three_way($MessageRecord['ts_created']).' said... </font></b>' : '<b><font color="#000000"><font color="#ffff00">'.ucwords($MessageRecord['fromusername']).'</font> '.three_way($MessageRecord['ts_created']).' said...</font></b>').'<font color="#000000"></font>'; ?></p>
  																										<!-- <p class="comment-body"> -->
  																											<?
  																												// display message -----------------------
  																														echo '<font color="#ffffff">'.$MessageRecord['msg'].'</font>';	
  																												// ---------------------------------------
  																											?>
  																										<!-- </p> --> <!-- END comment-body -->
  																									<!-- </div> --> <!-- END comment-box -->
  																							</div> <!-- END specificMessage -->
  																							<?
																							}
																						}

																						// display all msgs per conversation -------------------
																						//while($ConversationThreads = mysql_fetch_object($PerConversation)){
																						
																						/*
DEPRECIATED >>
																						$MailReadOutCounter = 0;
																						while($ResultMailArray){
																							
																							// get UserID of recipient -------------------------------------
																							if($ConversationThreads->toid != $_SESSION['ActiveUser']['userid'] && !$ConversationRecipientUserID){
																								$ConversationRecipientUserID = $ConversationThreads->toid;
																							}
																							
																						?> 
																							<div id="specificMessage<? echo $ConversationThreads->id; ?>" style="<? echo ($ConversationThreads->toid != $_SESSION['ActiveUser']['userid'] ? 'width: 685px; margin-left: 5px;':'width: 700px; color: #000000;'); ?> min-height: 129px; max-height: auto; margin-top: 35px; margin-bottom: 5px; background-image: url(/common/img/mail/panel2_bg.png); background-repeat:	no-repeat; padding-left: 5px; padding-right: 5px;"> 
																									<!-- <div class="comment-box"> -->
																										<p class="comment-author"><? echo ($_SESSION['ActiveUser']['username'] == $ResultMailArray['fromusername'] ? '<b><font color="#000000">You '.three_way($ConversationThreads->ts_created).' said: </font></b>' : '<b><font color="#000000">'.ucwords($ConversationThreads->fromusername).' '.three_way($ConversationThreads->ts_created).' said:</font></b>').'<font color="#000000"></font>'; ?></p>
																										<!-- <p class="comment-body"> -->
																											<?
																												// display message -----------------------
																													echo '<font color="#ffffff">'.$ConversationThreads->msg.'</font>';
																												// ---------------------------------------
																											?>
																										<!-- </p> --> <!-- END comment-body -->
																									<!-- </div> --> <!-- END comment-box -->
																							</div> <!-- END specificMessage -->

																							<?
																							$MailReadOutCounter++;
																						} //end while
<< DEPRECIATED
																						*/
																						// END display of all msgs per conversation ------------

																								?>
																									<!-- reply to message -->
																									<div id="specificMessage_reply<? echo $conversation->id; ?>" style="position: relative; bottom: 0px; right: 0px; width: 680px; height: auto; border: 0px solid #ffffff;">
																										<!-- <textarea rows="2" cols="60" id="specificMessage_reply_response<? echo $conversation->id; ?>"></textarea> -->
																										<? 
																											// depreciated -------------------------------
																											//echo '<input type="submit" onclick="SendReply(\''.$obj_Member->Encrypt($ConversationThreads->msgid).'\', \''.$obj_Member->Encrypt($MailOwnerID, 'private').'\', \''.$conversation->id.'\');" value="Send Reply"/>'; 
																											//echo '<input type="submit" onclick="SendReply(\''.$conversation->id.'\', \''.$PrivateEncrypted_MsgSenderID.'\');" value="Send Reply"/>';
																											// END depreciated ---------------------------
																										?>



                                                       <div id="fscommentadd">
                                                       	<table width="675">
                                                       		<tr>
                                                       			<td>
                                                       				<fieldset><legend><font class="fg_createtopic" style="color: #ffffff;">Reply</font> <font class="fg_topictitle"></font></legend>

                                                         				<table width="450" align="center" border=0>
                                                           				<tr>
                                                           					<td>

																																			<? 
																																				
																																				if($conversation->rec_userid != $_SESSION['ActiveUser']['userid']){
																																					$ConversationRecipientUserID = $conversation->rec_userid;
																																				}else{
																																					$ConversationRecipientUserID = $conversation->init_userid;
																																				}

																																				// If friend.block >> Do NOT show Reply Window -------------------
																																				if($obj_Member->GetFriendStatus($ConversationRecipientUserID, $_SESSION['ActiveUser']['userid']) != 'friend.block'){

																																			?>

                                                               					<textarea id="specificMessage_reply_response<? echo $conversation->id; ?>" name="textarea_reply<? echo $conversation->id; ?>" class="generic" rows="5" cols="60" onKeyDown="<? echo 'textCounter(this,\'progressbar'.$conversation->id.'\',500)' ?>" onKeyUp="<? echo 'textCounter(this,\'progressbar'.$conversation->id.'\',500)' ?>" onFocus="<? echo 'textCounter(this,\'progressbar'.$conversation->id.'\',500)' ?>" onclick="clickclear(this, 'Type your Reply Here')" onblur="clickrecall(this,'Type your Reply Here')">Type your Reply Here</textarea>
                                                               					<div id="progressbar<? echo $conversation->id; ?>" class="progress"></div>
                                                         								<?
                                                         									echo '<script type="text/javascript">';
                                                         									echo 'textCounter(textarea_reply'.$conversation->id.',"progressbar'.$conversation->id.'",500)';
                                                         									echo '</script>';
  																																			?>

																																			<? }else{ ?>
																																				<table cellpadding="0" cellspacing="0" width="500" border=0>
																																					<tr>
																																						<td width="31" valign="middle" align="center">
																																							<img src="/common/img/icons/icon_30x30_redblock.png" border="0">
																																						</td>
																																						
																																						<td width="5"></td>
																																						
																																						<td valign="middle" align="center">
																																							<font size="5" color="#ffffff"><b>Member Blocked - Cannot Correspond</b></font>
																																						</td>
																																					</tr>
																																				</table>
																																				
																																			<? } ?>
                                                             				</td>
                                                           				</tr>
                                                            	
                                                            			<tr>
                                                             				<td align="right">
                                                           						<?
                                                           							if($obj_Member->GetFriendStatus($ConversationRecipientUserID, $_SESSION['ActiveUser']['userid']) != 'friend.block'){
                                                           								echo '<input type="button" class="generic" onclick="SendReply(\''.$conversation->id.'\', \''.$PrivateEncrypted_MsgSenderID.'\');" value="Send Reply"/>'; 		
                                                           							}
                                                           						?>
                                                           					</td>
                                                           				</tr>
                                                           			</table>

                                                         			</fieldset>
                                                       			</td>
                                                       		</tr>
                                                       	</table>
                                                       </div> <!-- END fscommentadd -->
																										
																									</div> <!-- END specificMessage_reply -->

																								<!-- END reply to message -->
																								<?

      																			?>
      																				</div>  <!-- id showmsg -->
			      																				
      																	</div> <!-- id msgs -->

      																<!-- END read out threads -->
      																
      																<?
      																} // END delete if
      															} // END while (master)

      														?>
      														</font>
      													
      													
      														<!-- smoking -->
                               		<table border="0" width="340">
                                 		<tr>
                                   		<td width="100" valign="top">
                                   			<font class="typeblack16pt"> </font>
                                   		</td>
                                   		<td>
																				<font class="typeblue13px"> </font>
                                   		</td>
                               			</tr>
                               		</table>
      														<!-- END smoking -->

      <!--
                    						</td>
                    				</table>
                 -->
                    			<!-- </div> -->
                    <!-- END mail_container -->



        					<!-- END html  -->
                <?
								

  						// Registered & NOT Paid -------------------------------------------
  						}elseif($obj_Member->MemberAuthorized == true){
  							
  							?> <font color="white" size="5">Partial Mail View - Upgrade to View & Respond</font> <?

  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){
								
								?>
								<script type="text/javascript">
									window.location = 'Home';
								</script>
								<?
  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	












    			// Send Message  =========================================================================
        	case "member-SendMsg":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true && $obj_Member->MemberPaid == true){

								// get member profile specific data ------------------------------
       					$MailRecipient_Profile	=	$obj_Member->GetMemberProfile_Defined($_GET['_898a8as']);
			
								$Mail_From							=	$obj_Member->Encrypt($_SESSION['ActiveUser']['userid'], 'private');
								$Mail_To								=	$_GET['_898a8as'];

								?> 
									<!-- html  -->

								 		<br>


                    <!-- primary picture -->
                    <div id="profilepic_panel">
      	         			<?
                      	if($obj_Member->ImageDisplay($MailRecipient_Profile['userid'], 1, 1, true)){
													$obj_Member->ImageDisplay($MailRecipient_Profile['userid'], 1, 1);
                        }else{
                         	echo '<img src="common/img/default/no-added-photo-yet.jpg">';
                        }
                      ?>
                    </div>
      							<!-- END photo panel -->





										<div name="email_panel" style="border: 1px solid #FF0000; width: 510px; height: 200px; position: absolute; left: 20px; top: 400px; margin: 0; padding: 0;">

											<textarea style="width: 500px;" class="generic" name="body" cols="45" rows="7"></textarea>
											
											<input type="submit" class="generic" value="Send Message" onclick="alert('send msg');">
											
										</div>

									<!-- END html  -->
								<?

  						// Registered & NOT Paid -------------------------------------------
  						}elseif($obj_Member->MemberAuthorized == true){
  							
  							?> <font color="white" size="5">Partial Send Message - Upgrade to Send</font> <?

  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){
								
								?>
								<script type="text/javascript">
									window.location = 'Home';
								</script>
								<?
  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	













    			// Logout Member =========================================================================
        	case "member-Logout":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true){
  
        				$obj_Member->Logout($_SESSION['ActiveUser']);
        				$obj_Member->MemberAuthorized = false;

                ?>
        					<!-- html  -->
        						<center>
        							<br><br><br><br>
        							<font class="greetinglarge">You're Now Logged Out! - Come Back Soon!</font>
        							<br><br><br>
        							<input id="continue" class="generic" type="submit" name="continue" value="Continue" onclick="location='/Home'">
        						</center>
        					<!-- END html  -->
                <?
  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){
  
                  ?>
        					<!-- html  -->
        						<center>
        							<br><br><br><br>
        							<font class="greetinglarge">You're Now Logged Out! - Come Back Soon!</font>
        							<br><br><br>
        							<input id="continue" class="generic" type="submit" name="continue" value="Continue" onclick="location='/Home'">
        						</center>
        					<!-- END html  -->
                <?

  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	










    			// Browse Member Listings ================================================================
        	case "member-Browse":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true){
  
								//require('common/html/inc.browse.php');

								echo $_GET['_898a8as'];

                ?>
        					<!-- html  -->
        						<center>
        							<br><br>
        							<font class="greetinglarge">Browse</font>
        							<br><br><br>
        						</center>
        
        						<font color=white>
        							<?
        								$obj_Member->Browse('allcache', $Zipcode = 0, $Parameters = 0);
        							?>
        						</font>
        				<?


  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){
  

  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	







    			// Online Now Members ====================================================================
        	case "member-OnlineNow":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered ----------------------------------------------------
  						if($obj_Member->MemberAuthorized == true){

  							// Active User Seeking ---------------------
  							$__seeking	=	$_SESSION['ActiveUser']['seek_m'].$_SESSION['ActiveUser']['seek_w'].$_SESSION['ActiveUser']['seek_t'].$_SESSION['ActiveUser']['seek_c'];
                
                ?>
        					<!-- html  -->
               		<div id="panel_lft_1" style="width: 960px; height: 900px; top: 20px; left: 10px; padding-top: 15px;">
               			<?
               				$obj_Member->Report($_SESSION['ActiveUser']['userid'], 'online_now', $__seeking, 'fullpage');
               			?>
               		</div>
        				<?


  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){
  

  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	




















    			// Promo Banner Ads ============================================================
        	case "member-PromoBannerAds":

        		//require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered ----------------------------------------------------
  						if($obj_Member->MemberAuthorized == true){

									require('common/html/inc.promo-editor.BANNERADPROMOS.php');

  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){
  
									require('common/html/inc.promo-editor.BANNERADPROMOS.php');
  
  						}

						// -----------------------------------------------------------------
						//require('common/html/html-subpage-base-footer.php');
						//require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	





















    			// Reporting ==============================================================================
        	case "member-Reports":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered ----------------------------------------------------
  						if($obj_Member->MemberAuthorized == true){
  
                
                ?>
        					<!-- html  -->
               		<div id="panel_lft_1" style="width: 960px; height: 1200px; top: 20px; left: 10px; padding-top: 15px; border: 0px solid #ff0000; color: #ffffff;">
               			<?
               				//$obj_Member->Report($_SESSION['ActiveUser']['userid'], 'newfaces', $__seeking, 'fullpage');
               				
              				
              				// get range if given ----------------
              				if($_GET['_range']){
               					$_SESSION['ActiveUser']['_PromoPerformance_Range'] = $obj_Member->FilterRawInput($_GET['_range']);
               				}               				
               				// -----------------------------------
               				
               				
               				$PerformanceArray	=	$obj_Member->CreateAffiliatePromoPerformance($obj_Member->GetAffiliatePromos($_SESSION['ActiveUser']['userid']), 'chart_A');
											$MemberUserID			=	$_SESSION['ActiveUser']['userid'];
               				
               				//echo date('m');
               				//echo cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));


                      //$_day 	= date('d',time());
                      //$_month = date('m',time());
                      //$_year 	= date('Y',time());
                      

/*                  
                  		$_30DaysAgo								= time() - (86400 * 30);
                  		$_1DayAgo									= time() - 86400;


               				
               				$_month = 9;
               				$_year	= 2009;
               				
               				$TotalDays_in_Month = cal_days_in_month(CAL_GREGORIAN, $_month, $_year);
               				for($_day = 1; $_day <= $TotalDays_in_Month; $_day++){
               					
                      	$_startDayTS 	= mktime(0, 0, 0, $_month, $_day, $_year);
                      	$_endDayTS 		= mktime(23, 59, 59, $_month, $_day, $_year);
                      	echo $_day.'-'.$_startDayTS.' to '.$_endDayTS;
               					echo '<br>';
               				}
*/               				
               				//print_r($PerformanceArray);


/*
               				$totalRecords = 31;
               				for($CurrentRecord = 1; $CurrentRecord <= $totalRecords; $CurrentRecord++){
               						
               							$_Day = $CurrentRecord;
               							
               							if(!$PerformanceArray[$CurrentRecord]['impressions']){
               								$_Impressions = 0;
               							}else{
               								$_Impressions = $PerformanceArray[$CurrentRecord]['impressions'];
               							}
               							//echo ' ';

               							if(!$PerformanceArray[$CurrentRecord]['clicks']){
               								$_Clicks = 0;
               							}else{
               								$_Clicks = $PerformanceArray[$CurrentRecord]['clicks'];
               							}


												
												$ChartArray_Clicks[$_Day] 			= $_Clicks;
												$ChartArray_Impressions[$_Day] 	= $_Impressions;
												$ChartArray_Impressions[$_Day] 	= $_Day;
												
												$ChartArray[$_Day] = array(
													'clicks' 				=> $_Clicks,
													'impressions' 	=> $_Impressions
												);
               				}





$counter = 1;
foreach($ChartArray as $key){
	echo 'Day:'.$counter.' impressions: '.$key['impressions'].' clicks: '.$key['clicks'];
	//print_r($key);
	echo '<br>';
	$counter++;

}

*/


                    ?>
                      <script type="text/javascript" src="common/js/openFlashChart/swfobject.js"></script>
                      <script type="text/javascript">

	                     swfobject.embedSWF(
                        "open-flash-chart.swf", "my_chart", "956", "300",
                        "9.0.0", "expressInstall.swf",
                        {"data-file":"Chart"}
                        );

	                     swfobject.embedSWF(
                        "open-flash-chart.swf", "my_chart2", "450", "350",
                        "9.0.0", "expressInstall.swf",
                        {"data-file":"Chart2"}
                        );

                      </script>
                        
                      <!-- month performance chart -->
                      <div id="chart_container" style="position: absolute; top: 360px; left: 1px; border: solid 1px #ffffff; height: 300px; padding-bottom: -1px;">
                      	<!-- chart render target -->
                      	<div id="my_chart"></div>
                      </div>
                      <!-- END month performance chart -->


											<!-- day performance chart -->
                      <div id="chart_container" style="position: absolute; top: 1px; left: 1px; border: solid 1px #ffffff; height: 350px; padding-bottom: -1px;">
                      	<!-- chart render target -->
                      	<div id="my_chart2"></div>
                      </div>
                      <!-- END day performance chart -->


											<!-- day performance spreadsheet -->
                      <div id="chart_container" style="position: absolute; top: 1px; right: 1px; border: solid 1px #ffffff; height: 350px; width: 500px; padding-bottom: -1px;">


                				<!-- Promolist -->
                				<div id="pBuilder_editTools" style="position: absolute; top: 0px; right: 0px; border: solid 1px #434343; width: 500px; height: 350px;">
    
    
                  				<div id="pBuilder_editTools_title" style="position: absolute; z-index: 5; top: 2px; left: 2px; border: solid 0px #ffffff; width: 350px; height: 20px; font-size: 18px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  					Today's Ad Promotion Performance
                  				</div>
    
    											<!-- list holder -->
                  				<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 50px; left: 12px; border: solid 0px #ffffff; width: 470px; height: auto;">
    
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

    												<!-- actual Promolist -->
    												<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 20px; left: 0px; border: dashed 1px #767676; width: 475px; height: auto; max-height: 265px; overflow: auto;">
    
                     					<table cellpadding="0" cellspacing="0" border="0">
                               	<!-- my promos list -->
                               	<?
      														// get affiliate promos ----------------------------------
                               		//$__AffiliatesPromos = $obj_Member->GetAffiliatePromos($MemberUserID);  MOVED TO >> LINE 934 OF SM.topnav.php

      
                               		if(count($__AffiliatesPromos) > 0){
                               	?>
                									<tr>
                										<td>
                               				<?
                                       	$i=0;
                                         foreach($__AffiliatesPromos as $key){
                                         	
                                         	$_PromoName		=	$key['promo_name'];
                                         	$_Level				=	$key['level'];
                                         	if($_Level == 'extended'){
                                         			$_Level = '<font color="#faac05">'.$_PromoName.'</font>';
                                       		}else{
                                       			$_Level 	= '<i>Default</i>';
                                       		}
                                         	
                                         	
                                         	$_PromoClass	=	$key['promo_class'];
                                         	if($_PromoClass == 'banner'){
                                         			$_PromoClass = 'ban';
                                       		}                                         	
                                         	
                                         	$_NicheID			=	$key['nicheid'];

                                         	
                                         	
                                         	$_Property		=	$key['propertyid'];
                                         	$_TSCreated		=	$key['tscreated'];
                                         	$_ThumbsNum		=	$key['thumbs_num'];
                                         	$_PromoID			=	$obj_Member->Encrypt($key['promoid'], 'private');


      																		$_PromoIDArray[] = array(
      																					'promoid' 		=> $key['promoid'],
      																					'propertyid' 	=> $key['propertyid']
      																				);
      																		
      																		$PerformanceArray			=	$obj_Member->CreateAffiliatePromoPerformance($_PromoIDArray, 'top_navbar');

      																		unset($_PromoIDArray);

                                         	
                                         	switch($_Property){
                                         		case 'friendsnflings.com':
                                         			$_Property = 'FNF';
                                         			//$_Property		=	'&nbsp;<b>F<font color="#6f6f6f">N</font><font color="#ff0000">F</font></b>';
                                         		break;

                                         		case 'hardbodysingles.com':
                                         			$_Property = 'HBS';
                                         		break;

                                         		case '100kdate.com':
                                         			$_Property = '1KD';
                                         		break;

                                         		case 'qualitymen.com':
                                         			$_Property = 'QM';
                                         		break;
                                         	}
      
                               						if($i%2==0){
                               							$fgbg = '#1e4972';
                               						}else{
                               							$fgbg = '#14304b';
                               						}


      
                                     			?>
                                   					<table border="1" cellpadding="2" cellspacing="0" bgcolor="<? echo $fgbg; ?>">
                                   						<tr>
                                   							<td width="135" align="left"><a href="http://sm0005.com/MyPromos-EDIT-<? echo $_PromoID; ?>" style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ucwords($_Property).'-'.ucwords($_PromoClass).'-'.ucwords($_Level); ?></a></td>
                                   							<td width="70" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray['impressions_24hours'] > 0 ? '<font color="yellow">'.$PerformanceArray['impressions_24hours'].'</font>':'0'); ?></td>
																								<td width="55" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray['clicks_24hours'] > 0 ? '<font color="yellow">'.$PerformanceArray['clicks_24hours'].'</font>':'0'); ?></td>
																								<td width="50" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray['signups_24hours'] > 0 ? '<font color="yellow">'.$PerformanceArray['signups_24hours'].'</font>':'0'); ?></td>
																									
																																																																									
																								<td width="50" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray['upgrades_24hours'] > 0 ? '<font color="yellow">'.$PerformanceArray['upgrades_24hours'].'</font>':'0'); ?></td>
																								<td width="75" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray['upgrades_earnings_24hours'] > 0 ? '<font color="yellow">'.'$'.number_format($PerformanceArray['upgrades_earnings_24hours'], 2, '.', ',').'</font>':'$'.number_format($PerformanceArray['upgrades_earnings_24hours'], 2, '.', ',')); ?></td>
                                   						</tr>
                                   					</table>
                                   				<?
                                      		$i++;
                               					}
                                 			?>
                									</td>
                								</tr>                            		
                               	<?
                               		}
                               	?>
                               	<!-- END my promos list -->
                   					</table>
     	              				</div>
     	              				<!-- END actual Promolist -->
    
    
    											</div>
    											<!-- END list holder -->
    
    
                				</div>
                				<!-- END Promolist -->
                      	
                      </div>
											<!-- END day performance spreadsheet -->






											<!-- overall performance spreadsheet -->
                      <div id="chart_container" style="position: absolute; top: 670px; left: 1px; border: solid 0px #ffffff; height: 450px; width: 956px; padding-bottom: -1px;">


                				<!-- Promolist -->
                				<div id="pBuilder_editTools" style="position: absolute; top: 0px; left: 0px; border: solid 0px #434343; width: 956px; height: 350px;">
    
    
                  				<div id="pBuilder_editTools_title" style="position: absolute; z-index: 5; top: 2px; left: 4px; border: solid 0px #ffffff; width: 400px; height: 20px; font-size: 18px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  					<font color="#efff97"><? echo date('F',time()); ?></font> Ad Promotion Performance
                  				</div>
    
    											<!-- list holder -->
                  				<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 45px; left: 12px; border: solid 0px #ffffff; width: 470px; height: auto;">
    
                  					<div id="pBuilder_editTools_titles1" style="position: absolute; z-index: 5; top: 0px; left: 0px; border: solid 0px #ffffff; width: 100px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Property Name
                  					</div>
    
                  					<div id="pBuilder_editTools_titles2" style="position: absolute; z-index: 5; top: 0px; left: 140px; border: solid 0px #ffffff; width: 120px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Type
                  					</div>

                  					<div id="pBuilder_editTools_titles2" style="position: absolute; z-index: 5; top: 0px; left: 290px; border: solid 0px #ffffff; width: 120px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Niche
                  					</div>

                  					<div id="pBuilder_editTools_titles3" style="position: absolute; z-index: 5; top: 0px; left: 395px; border: solid 0px #ffffff; width: 130px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Location / Name
                  					</div>
    
                  					<div id="pBuilder_editTools_titles4" style="position: absolute; z-index: 5; top: 0px; left: 580px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Impressions
                  					</div>
    
                      			<div id="pBuilder_editTools_titles5" style="position: absolute; z-index: 5; top: 0px; left: 665px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Clicks
                  					</div>

                      			<div id="pBuilder_editTools_titles6" style="position: absolute; z-index: 5; top: 0px; left: 730px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						SignUps
                  					</div>

                      			<div id="pBuilder_editTools_titles11" style="position: absolute; z-index: 5; top: 0px; left: 795px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Upgrades
                  					</div>

                      			<div id="pBuilder_editTools_titles11" style="position: absolute; z-index: 5; top: 0px; left: 860px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Earnings
                  					</div>

    												<!-- actual Promolist -->
    												<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 20px; left: 0px; border: dashed 1px #767676; width: 930px; height: auto; max-height: 408px; overflow: auto;">
    
                     					<table cellpadding="0" cellspacing="0" border="0">
                               	<!-- my promos list -->
                               	<?


                               		if(count($__AffiliatesPromos) > 0){
                               	?>
                									<tr>
                										<td>
                               				<?
                                       	$i=0;
                                         foreach($__AffiliatesPromos as $key){

																					$_PromoID							=	$key['promoid'];
																					$_PromoClass					=	$key['promo_class'];
                                     			$_TSCreated						=	$key['tscreated'];
                                     			$_NicheID							=	$key['nicheid'];
                                     			$_Level								=	$key['level'];
                                     			$_PromoName						=	$key['promo_name'];
                                     			if($_Level == 'default'){
                                     				$_PromoName					=	'<font color="white">Default Ad Group</font>';
                                     			}
                                     			
                                     			
                                         	
                                         	$_Property						=	$key['propertyid'];
                                         	$_ThumbsNum						=	$key['thumbs_num'];
                                         	$_PromoID_ENCRYPTED		=	$obj_Member->Encrypt($key['promoid'], 'private');

      																		$_PromoIDArray[] = array(
      																					'promoid' 		=> $key['promoid'],
      																					'propertyid' 	=> $key['propertyid']
      																				);
      																		
      																		$PerformanceArray			=	$obj_Member->CreateAffiliatePromoPerformance($_PromoIDArray, 'top_navbar');

      																		unset($_PromoIDArray);


                               						if($i%2==0){
                               							$fgbg = '#1e4972';
                               						}else{
                               							$fgbg = '#14304b';
                               						}
      
                                     			?>
                                   					<table border="1" cellpadding="2" cellspacing="0" bgcolor="<? echo $fgbg; ?>">                               
                                   						<tr>
                                   							<td width="140" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ucwords($_Property); ?></font></td>
                                   							<td width="140" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ucwords($_PromoClass).'-'.ucwords($_Level); ?></font></td>
                                   							<td width="100" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ucwords($_NicheID); ?></font></td>
                                   							<td width="180" align="left"><font style="color: #faac05; font-size: 12px; text-decoration: none;"><? echo ucwords($_PromoName); ?></font></td>
                                   							<td width="80" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray['impressions_ThisMonth'] > 0 ? '<font color="yellow">'.$PerformanceArray['impressions_ThisMonth'].'</font>':'0'); ?></td>
																								<td width="60" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray['clicks_ThisMonth'] > 0 ? '<font color="yellow">'.$PerformanceArray['clicks_ThisMonth'].'</font>':'0'); ?></td>
																								<td width="60" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray['signups_ThisMonth'] > 0 ? '<font color="yellow">'.$PerformanceArray['signups_ThisMonth'].'</font>':'0'); ?></td>
																								<td width="60" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray['upgrades_ThisMonth'] > 0 ? '<font color="yellow">'.$PerformanceArray['upgrades_ThisMonth'].'</font>':'0'); ?></td>
																								<td width="60" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray['upgrades_earnings_ThisMonth'] > 0 ? '<font color="yellow">'.'$'.number_format($PerformanceArray['upgrades_earnings_ThisMonth'], 2, '.', ',').'</font>':'$'.number_format($PerformanceArray['upgrades_earnings_ThisMonth'], 2, '.', ',')); ?></td>
                                   						</tr>
                                   					</table>
                                   				<?
                                      		$i++;
                               					}
                                 			?>
                									</td>
                								</tr>                            		
                               	<?
                               		}
                               	?>
                               	<!-- END my promos list -->
                   					</table>
     	              				</div>
     	              				<!-- END actual Promolist -->
    
    
    											</div>
    											<!-- END list holder -->
    
    
                				</div>
                				<!-- END Promolist -->
                      	
                      </div>
											<!-- END day performance spreadsheet -->

               		</div>
        				<?


  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){
  

  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	















    			// Payments ==============================================================================
        	case "member-Payments":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered ----------------------------------------------------
  						if($obj_Member->MemberAuthorized == true){
  
                
                ?>
        					<!-- html  -->
               		<div id="panel_lft_1" style="width: 960px; height: 1200px; top: 20px; left: 10px; padding-top: 15px; border: 0px solid #ff0000; color: #ffffff;">
               			



<!-- MAIN BLOCK -->
											<!-- overall performance spreadsheet -->
                      <div id="chart_container" style="position: absolute; top: 10px; left: 1px; border: solid 0px #ffffff; height: 450px; width: 956px; padding-bottom: -1px;">


                				<!-- Promolist -->
                				<div id="pBuilder_editTools" style="position: absolute; top: 0px; left: 0px; border: solid 0px #434343; width: 956px; height: 350px;">
    
    
                  				<div id="pBuilder_editTools_title" style="position: absolute; z-index: 5; top: 2px; left: 4px; border: solid 0px #ffffff; width: 400px; height: 20px; font-size: 18px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  					SignUps > <font color="#efff97">Unpaid</font> Earnings                  				
                  				</div>
    
    											<!-- list holder -->
                  				<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 35px; left: 12px; border: solid 0px #ffffff; width: 470px; height: auto;">
    
                  					<div id="pBuilder_editTools_titles1" style="position: absolute; z-index: 5; top: 0px; left: 0px; border: solid 0px #ffffff; width: 100px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Property Name
                  					</div>
    
                  					<div id="pBuilder_editTools_titles2" style="position: absolute; z-index: 5; top: 0px; left: 145px; border: solid 0px #ffffff; width: 120px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Type
                  					</div>

                  					<div id="pBuilder_editTools_titles2" style="position: absolute; z-index: 5; top: 0px; left: 290px; border: solid 0px #ffffff; width: 120px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Niche
                  					</div>


                  					<div id="pBuilder_editTools_titles3" style="position: absolute; z-index: 5; top: 0px; left: 395px; border: solid 0px #ffffff; width: 125px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Location / Name
                  					</div>
    
                  					<div id="pBuilder_editTools_titles4" style="position: absolute; z-index: 5; top: 0px; left: 580px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Rate
                  					</div>
    
                      			<div id="pBuilder_editTools_titles5" style="position: absolute; z-index: 5; top: -15px; left: 668px; border: solid 0px #ffffff; width: 130px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Sign-Ups<br>(<font color="#ff0000">unqualified</font>)
                  					</div>

                      			<div id="pBuilder_editTools_titles6" style="position: absolute; z-index: 5; top: -15px; left: 755px; border: solid 0px #ffffff; width: 130px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Sign-Ups<br>(<font color="#00ff00">qualified</font>)
                  					</div>

                      			<div id="pBuilder_editTools_titles11" style="position: absolute; z-index: 5; top: 0px; left: 840px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Earnings
                  					</div>


    												<!-- actual Promolist -->
    												<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 20px; left: 0px; border: dashed 1px #767676; width: 930px; height: auto; max-height: 192px; overflow: auto;">
    
                     					<table cellpadding="0" cellspacing="0" border="0">
                               	<!-- my promos list -->
                               	<?


                               		if(count($__AffiliatesPromos) > 0){
                               	?>
                									<tr>
                										<td>
                               				<?
                                       	$i=0;
                                         foreach($__AffiliatesPromos as $key){

																					$_PromoID							=	$key['promoid'];
																					$_PromoClass					=	$key['promo_class'];
                                     			$_TSCreated						=	$key['tscreated'];
                                     			$_NicheID							=	$key['nicheid'];

                                         	$_Property						=	$key['propertyid'];
                                         	$_ThumbsNum						=	$key['thumbs_num'];
                                         	$_PayoutRate					=	$obj_Member->GetPromoPayoutRate($key['promoid'], 'signup');

                                     			$_Level								=	$key['level'];
                                     			$_PromoName						=	$key['promo_name'];
                                     			if($_Level == 'default'){
                                     				$_PromoName					=	'<font color="white">Default Ad Group</font>';
                                     			}
                                         	
                                         	
                                         	$_PromoID_ENCRYPTED		=	$obj_Member->Encrypt($key['promoid'], 'private');

      																		$_PromoIDArray[] = array(
      																					'promoid' 		=> $key['promoid'],
      																					'propertyid' 	=> $key['propertyid']
      																				);
      																		
      																		//get data ---------------------------
      																		$PerformanceArray												=	$obj_Member->CreateAffiliatePromoPerformance($_PromoIDArray, 'top_navbar', null, 'unsettled');
      																		
      																		$PerformanceArray_Unqualified						=	$obj_Member->CreateAffiliatePromoPerformance($_PromoIDArray, 'top_navbar', null, 'unqualified');
      																		
      																		// computer unsettled earnings -------
      																		$_subTotal_Unsettled_Earnings_Signups 	= $_subTotal_Unsettled_Earnings_Signups + $PerformanceArray['signups_earnings_alltimetotal'];


      																		unset($_PromoIDArray);

                               						if($i%2==0){
                               							$fgbg = '#1e4972';
                               						}else{
                               							$fgbg = '#14304b';
                               						}




                                     			?>
                                   					<table border="1" cellpadding="2" cellspacing="0" bgcolor="<? echo $fgbg; ?>">
                                   						<tr>
                                   							<td width="140" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ucwords($_Property); ?></font></td>
                                   							<td width="140" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ucwords($_PromoClass).'-'.ucwords($_Level); ?></font></td>
                                   							<td width="100" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ucwords($_NicheID); ?></font></td>
                                   							<td width="180" align="left"><font style="color: #faac05; font-size: 12px; text-decoration: none;"><? echo ucwords($_PromoName); ?></font></td>
																								<td width="80" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo '$'.ucwords($_PayoutRate['rate']); ?></font></td>
																								<td width="80" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray_Unqualified['signups_alltimetotal'] > 0 ? '<font color="red">'.$PerformanceArray_Unqualified['signups_alltimetotal'].'</font>':'0'); ?></td>
																								<td width="80" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray['signups_alltimetotal'] > 0 ? '<font color="#00ff00">'.$PerformanceArray['signups_alltimetotal'].'</font>':'0'); ?></td>
																								<td width="80" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray['signups_earnings_alltimetotal'] > 0 ? '<font color="yellow">'.'$'.number_format($PerformanceArray['signups_earnings_alltimetotal'], 2, '.', ',').'</font>':'$'.number_format($PerformanceArray['signups_earnings_alltimetotal'], 2, '.', ',')); ?></td>
                                   						</tr>
                                   					</table>
                                   				<?
                                      		$i++;
                               					}
                                 			?>
                									</td>
                								</tr>                            		
                               	<?
                               		}
                               	?>
                               	<!-- END my promos list -->
                   					</table>
     	              				</div>
     	              				<!-- END actual Promolist -->
    
    
    											</div>
    											<!-- END list holder -->
    
    
                				</div>
                				<!-- END Promolist -->
                      	
                      </div>
											<!-- END day performance spreadsheet -->
<!-- END MAIN BLOCK -->




											<!-- earnings totals -->
                      <div id="chart_container" style="position: absolute; top: 270px; right: 75px; border: solid 0px #ffffff; height: 50px; width: 300px; padding-bottom: -1px;">
                				<!-- earning -->
                  				<div id="pBuilder_editTools_title" style="position: absolute; z-index: 5; top: 2px; left: 4px; border: solid 0px #ffffff; width: 370px; height: 20px;  text-align: left; padding-left: 3px;">
                  					<table>
                  						<tr>
                  							<td style="font-size: 20px; font-weight: bold; color: #ffffff;"><font color="#efff97">Sub-Total</font> Unpaid Earnings:</td>
                  							<td width="15"></td>
                  							<td align="right" style="font-size: 20px; font-weight: bold; color: #ffffff;"><? echo '$'.number_format($_subTotal_Unsettled_Earnings_Signups, 2, '.', ','); ?></td>
                  						</tr>
                  					</table>
                  					 
                  				</div>
    										<!-- END earning -->
    									</div>
    									<!-- END earnings totals -->








<!-- MAIN BLOCK -->
											<!-- overall performance spreadsheet -->
                      <div id="chart_container" style="position: absolute; top: 315px; left: 1px; border: solid 0px #ffffff; height: 450px; width: 956px; padding-bottom: -1px;">


                				<!-- Promolist -->
                				<div id="pBuilder_editTools" style="position: absolute; top: 0px; left: 0px; border: solid 0px #434343; width: 956px; height: 350px;">
    
    
                  				<div id="pBuilder_editTools_title" style="position: absolute; z-index: 5; top: 2px; left: 4px; border: solid 0px #ffffff; width: 400px; height: 20px; font-size: 18px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  					Upgrades > <font color="#efff97">Unpaid</font> Earnings                  				
                  				</div>
    
    											<!-- list holder -->
                  				<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 35px; left: 12px; border: solid 0px #ffffff; width: 470px; height: auto;">
    
                  					<div id="pBuilder_editTools_titles1" style="position: absolute; z-index: 5; top: 0px; left: 0px; border: solid 0px #ffffff; width: 100px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Property Name
                  					</div>
    
                  					<div id="pBuilder_editTools_titles2" style="position: absolute; z-index: 5; top: 0px; left: 145px; border: solid 0px #ffffff; width: 120px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Type
                  					</div>

                  					<div id="pBuilder_editTools_titles2" style="position: absolute; z-index: 5; top: 0px; left: 290px; border: solid 0px #ffffff; width: 120px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Niche
                  					</div>

                  					<div id="pBuilder_editTools_titles3" style="position: absolute; z-index: 5; top: 0px; left: 395px; border: solid 0px #ffffff; width: 125px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Location / Name
                  					</div>

    
                  					<div id="pBuilder_editTools_titles4" style="position: absolute; z-index: 5; top: 0px; left: 510px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						
                  					</div>
    
                      			<div id="pBuilder_editTools_titles5" style="position: absolute; z-index: 5; top: 0px; left: 582px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Rate
                  					</div>

                      			<div id="pBuilder_editTools_titles6" style="position: absolute; z-index: 5; top: 0px; left: 715px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Upgrades
                  					</div>

                      			<div id="pBuilder_editTools_titles11" style="position: absolute; z-index: 5; top: 0px; left: 820px; border: solid 0px #ffffff; width: 80px; height: 20px; font-size: 12px; font-weight: bold; color: #ffffff; text-align: left; padding-left: 3px;">
                  						Earnings
                  					</div>


    												<!-- actual Promolist -->
    												<div id="pBuilder_editTools_promotionsList" style="position: relative; top: 20px; left: 0px; border: dashed 1px #767676; width: 930px; height: auto; max-height: 192px; overflow: auto;">
    
                     					<table cellpadding="0" cellspacing="0" border="0">
                               	<!-- my promos list -->
                               	<?


                               		if(count($__AffiliatesPromos) > 0){
                               	?>
                									<tr>
                										<td>
                               				<?
                                       	$i=0;
                                         foreach($__AffiliatesPromos as $key){

																					$_PromoID							=	$key['promoid'];
																					$_PromoClass					=	$key['promo_class'];
                                     			$_TSCreated						=	$key['tscreated'];
                                     			$_NicheID							=	$key['nicheid'];
                                         	$_PromoName						=	$key['promo_name'];
                                         	$_Property						=	$key['propertyid'];
                                         	$_ThumbsNum						=	$key['thumbs_num'];
                                         	$_PromoID_ENCRYPTED		=	$obj_Member->Encrypt($key['promoid'], 'private');
																					
																					$_Level								=	$key['level'];
                                     			if($_Level == 'default'){
                                     				$_PromoName					=	'<font color="white">Default Ad Group</font>';
                                     			}

      																		$_PromoIDArray[] = array(
      																					'promoid' 		=> $key['promoid'],
      																					'propertyid' 	=> $key['propertyid']
      																				);
      																		
      																		//get data ---------------------------
      																		$PerformanceArray												=	$obj_Member->CreateAffiliatePromoPerformance($_PromoIDArray, 'top_navbar', null, 'unsettled');
      																		
      																		// computer unsettled earnings -------
      																		$_subTotal_Unsettled_Earnings_Upgrades 	= $_subTotal_Unsettled_Earnings_Upgrades + $PerformanceArray['upgrades_earnings_alltimetotal'];
																					
																					// get payout rate -------------------
																					$_PayoutRate					=	$obj_Member->GetPromoPayoutRate($key['promoid'], 'upgrade');


      																		unset($_PromoIDArray);

                               						if($i%2==0){
                               							$fgbg = '#1e4972';
                               						}else{
                               							$fgbg = '#14304b';
                               						}
      
                                     			?>
                                   					<table border="1" cellpadding="2" cellspacing="0" bgcolor="<? echo $fgbg; ?>">
                                   						<tr>
                                   							<td width="140" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ucwords($_Property); ?></font></td>
                                   							<td width="140" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ucwords($_PromoClass).'-'.ucwords($_Level); ?></font></td>
                                   							<td width="100" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ucwords($_NicheID); ?></font></td>
                                   							<td width="180" align="left"><font style="color: #faac05; font-size: 12px; text-decoration: none;"><? echo ucwords($_PromoName); ?></font></td>
																								<td width="125" align="center"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ucwords(number_format($_PayoutRate['rate'],0)).'% of Sale Price'; ?></font></td>
																								<td width="100" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray['upgrades_alltimetotal'] > 0 ? '<font color="yellow">'.$PerformanceArray['upgrades_alltimetotal'].'</font>':'0'); ?></td>
																								<td width="100" align="left"><font style="color: #ffffff; font-size: 12px; text-decoration: none;"><? echo ($PerformanceArray['upgrades_earnings_alltimetotal'] > 0 ? '<font color="yellow">'.'$'.number_format($PerformanceArray['upgrades_earnings_alltimetotal'], 2, '.', ',').'</font>':'$'.number_format($PerformanceArray['upgrades_earnings_alltimetotal'], 2, '.', ',')); ?></td>
                                   						</tr>
                                   					</table>
                                   				<?
                                      		$i++;
                               					}
                                 			?>
                									</td>
                								</tr>                            		
                               	<?
                               		}
                               	?>
                               	<!-- END my promos list -->
                   					</table>
     	              				</div>
     	              				<!-- END actual Promolist -->
    
    
    											</div>
    											<!-- END list holder -->
    
    
                				</div>
                				<!-- END Promolist -->
                      	
                      </div>
											<!-- END day performance spreadsheet -->
<!-- END MAIN BLOCK -->





											<!-- earnings totals -->
                      <div id="chart_container" style="position: absolute; top: 575px; right: 75px; border: solid 0px #ffffff; height: 50px; width: 300px; padding-bottom: -1px;">
                				<!-- earning -->
                  				<div id="pBuilder_editTools_title" style="position: absolute; z-index: 5; top: 2px; left: 4px; border: solid 0px #ffffff; width: 370px; height: 20px;  text-align: left; padding-left: 3px;">
                  					<table>
                  						<tr>
                  							<td style="font-size: 20px; font-weight: bold; color: #ffffff;"><font color="#efff97">Sub-Total</font> Unpaid Earnings:</td>
                  							<td width="15"></td>
                  							<td align="right" style="font-size: 20px; font-weight: bold; color: #ffffff;"><? echo '$'.number_format($_subTotal_Unsettled_Earnings_Upgrades, 2, '.', ','); ?></td>
                  						</tr>
                  					</table>
                  					 
                  				</div>
    										<!-- END earning -->
    									</div>
    									<!-- END earnings totals -->




											<!-- earnings totals -->
                      <div id="chart_container" style="position: absolute; top: 610px; right: 95px; border: solid 0px #ffffff; height: 50px; width: 300px; padding-bottom: -1px;">
                				<!-- earning -->
                  				<div id="pBuilder_editTools_title" style="position: absolute; z-index: 5; top: 2px; left: 4px; border: solid 0px #ffffff; width: 390px; height: 20px;  text-align: left; padding-left: 3px;">
                  					<table>
                  						<tr>
                  							<td style="font-size: 20px; font-weight: bold; color: #ffffff;"><font color="#efff97">Grand Total</font> Unpaid Earnings:</td>
                  							<td width="15"></td>
                  							<td align="right" style="font-size: 20px; font-weight: bold; color: #ffffff;"><? echo '$'.number_format($_subTotal_Unsettled_Earnings_Upgrades + $_subTotal_Unsettled_Earnings_Signups, 2, '.', ','); ?></td>
                  						</tr>
                  					</table>
                  					 
                  				</div>
    										<!-- END earning -->
    									</div>
    									<!-- END earnings totals -->







               		</div>
        				<?


  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){
  

  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	












    			// My Friends ============================================================================
        	case "member-MyFriends":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered ----------------------------------------------------
  						if($obj_Member->MemberAuthorized == true){
  
								//require('common/html/inc.browse.php');

                ?>
        					<!-- html  -->

         					<!-- core css -->
        					<link rel="stylesheet" href="common/css/myhome/myhome-core.css" type="text/css" media="all"/>

        						<!--
        						<center>
        							<br><br>
        							<font class="greetinglarge">My Friends</font>
        							<br><br><br>
        						</center>
        						-->
										
										<div id="panel_title-panel_lft_full_1"><table cellpadding="0"><tr><td><font color="white">People Who Want You<i></i></font></td></tr></table></div>
                		<div id="panel_lft_full_1" style="background-color: white;" onmouseover="this.style.overflowY = 'auto';" onmouseout="this.style.overflowY = 'hidden';">

      								<?
   											echo "<script type=\"text/javascript\">";
   											echo "window_REFRESH('".$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private')."', 'report.myfriends.requests');";
   											//echo "var myobject1 = new window_REFRESHa('".$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private')."', 'report.myfriends.requests');";
  											echo "</script>";
      								?>
                			
                			<?
												//$obj_Member->Report($_SESSION['ActiveUser']['userid'], 'myfriends', 'requests', 'fullpage');
                			?>
                		</div>
										
										<div id="panel_title-panel_rht_full_1a"><table cellpadding="0"><tr><td><font color="white">People You Want</font></td></tr></table></div>
                		<div id="panel_rht_full_1a" style="background-color: white;" onmouseover="this.style.overflowY = 'auto';" onmouseout="this.style.overflowY = 'hidden';">

      								<?
   											echo "<script type=\"text/javascript\">";
   											echo "window_REFRESH('".$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private')."', 'report.myfriends.pending');";
   											//echo "var myobject2 = new window_REFRESHb('".$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private')."', 'report.myfriends.pending');";
  											echo "</script>";
      								?>
                			
                			<?
												//$obj_Member->Report($_SESSION['ActiveUser']['userid'], 'myfriends', 'pending', 'fullpage');
                			?>
                		</div>


										<div id="panel_title-panel_lft_full_2"><table cellpadding="0"><tr><td><font color="white">My Friends</font></td></tr></table></div>
                		<div id="panel_lft_full_2" style="background-color: white;" onmouseover="this.style.overflowY = 'auto'; this.style.overflowX = 'hidden';" onmouseout="this.style.overflowY = 'hidden';">

      								<?
   											echo "<script type=\"text/javascript\">";
   											echo "window_REFRESH('".$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private')."', 'report.myfriends.current');";
  											echo "</script>";
      								?>
                			
                			<?
												//$obj_Member->Report($_SESSION['ActiveUser']['userid'], 'myfriends', 'current', 'fullpage');
                			?>
                		</div>

										<div id="panel_title-panel_rht_full_2a"><table cellpadding="0"><tr><td><font color="white">People I Don't Like</font></td></tr></table></div>
                		<div id="panel_rht_full_2a" style="background-color: white;" onmouseover="this.style.overflowY = 'auto';" onmouseout="this.style.overflowY = 'hidden';">

      								<?
   											echo "<script type=\"text/javascript\">";
   											echo "window_REFRESH('".$obj_Member->Encrypt(serialize($_SESSION['ActiveUser']), 'private')."', 'report.myfriends.block');";
  											echo "</script>";
      								?>

	                		<?
												//$obj_Member->Report($_SESSION['ActiveUser']['userid'], 'myfriends', 'favorites', 'fullpage');
    	            		?>
                		</div>


        				<?


  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){
  

  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	







    			// Help ==================================================================================
        	case "subpage.assistance":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered ----------------------------------------------------
  						if($obj_Member->MemberAuthorized == true){
  
  
  //debug pw decrypt
  //echo $obj_Member->Decrypt('af0019c3bde575dc11c118475d6a04ba36e7c6bcb9956a3210f26253277901a6','private');
  //die();
  


                ?>
        					<!-- html  -->

              			<!-- style sheet -->
              			<link rel="stylesheet" href="common/css/css.help.css" type="text/css" media="all"/>





              <!-- ISSUE: -->
              			<div id="helpdesk_issue_panel">
              				<div id="subcontainer_titlebar"><h2 style="color: #95c9ff;">&nbsp;Campaigns</h2></div>
                   		<table border="0">
              					<tr>
              						<td valign="top" width="10">
              						</td>
              						<td>

														<!-- issue details -->
<!--
                         		<table border="0">
                           		<tr>
                             		<td colspan="3"><font class="typeblack16pt">How to Data Goes here</font></td>
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>1.) Geo Promo Ads are likely the best performers in most situations.
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>2.) To Create a Geo Promo Ad simply go to <a href="http://sm0005.com/MyPromos">Create Ad</a> & click on the "Create New" button
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>3.) Upon clicking "Create Ad" will create a new Ad Promo so you can Customize the Color & Size
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>4.) Once completed, click the "Generate Code" button, Select the Code inside the box, and Paste into your website
                             		</td>
                         			</tr>


                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td height="10"></td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td><b>SPECIAL NOTE:</b> Future COLOR changes <font color=red><b>DO NOT</b></font> require the existing Code to be re-pasted to your website
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td><b>SPECIAL NOTE:</b> Future SIZE changes <font color=red><b>DO</b></font> require the existing Code to be re-pasted to your website
                             		</td>
                         			</tr>
                         		</table>
-->
														<!-- END issue details -->

														<br>

														<!-- issue details -->
<!--
                         		<table border="0">
                           		<tr>
                             		<td colspan="3"><font class="typeblack16pt">How to Create a Banner Promo Ad</font></td>
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>1.) Banner Promo Ads are very easy & graphically exciting, and can be used in any situation.
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>2.) To Create a Banner Promo Ad simply go to <a href="http://sm0005.com/MyPromos">Create Ad</a> & Scroll Down to Banner Promo Ads
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>3.) To select a Banner Promo Ad click inside the Code box, Copy & Paste the code into your website
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>4.) Once completed, click the "Generate Code" button, Select the Code inside the box, and Paste into your website
                             		</td>
                         			</tr>

                         		</table>
-->
														<!-- END issue details -->


              						</td>
              				</table>
              			</div>
              <!-- END ISSUE: -->






              <!-- ISSUE: -->
              			<div id="helpdesk_issue_panel">
              				<div id="subcontainer_titlebar"><h2 style="color: #95c9ff;">&nbsp;Topic</h2></div>
                   		<table border="0">
              					<tr>
              						<td valign="top" width="10">
              						</td>
              						<td>

														<!-- issue details -->
<!--
                         		<table border="0">
                           		<tr>
                             		<td colspan="3"><font class="typeblack16pt">When & How do I get Paid?</font></td>
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>1.) Minimum Payment is $100.00 - This means that once you reach or exceed $100.00 in Unpaid Earnings, YOU GET PAID! (YAY!)
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>2.) Payment will be Mailed to the Physical Mailing Address we have on file for your account (<i><font color="#ee6907">Ensure it's accurate!</font></i>)
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>3.) Direct Deposit / Bank Wire will also be available shortly (details as added to system)
                             		</td>
                         			</tr>

                         		</table>
-->
														<!-- END issue details -->

              						</td>
              				</table>
              			</div>
              <!-- END ISSUE: -->







              <!-- ISSUE: -->
              			<div id="helpdesk_issue_panel">
              				<div id="subcontainer_titlebar"><h2 style="color: #95c9ff;">&nbsp;Topic</h2></div>
                   		<table border="0">
              					<tr>
              						<td valign="top" width="10">
              						</td>
              						<td>

														<!-- issue details -->
<!--
                         		<table border="0">
                           		<tr>
                             		<td colspan="3"><font class="typeblack16pt">How are Earnings Calculated</font></td>
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>1.) The <a href="http://sm0005.com/Payments">Earnings</a> page is a shows all UNPAID Earnings per Ad Promo
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>2.) Payment will be Mailed to the Physical Mailing Address we have on file for your account (<i><font color="#ee6907">Ensure it's accurate!</font></i>)
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>3.) Direct Deposit / Bank Wire will also be available shortly (details as added to system)
                             		</td>
                         			</tr>

                         		</table>
-->
														<!-- END issue details -->

              						</td>
              				</table>
              			</div>
              <!-- END ISSUE: -->





              <!-- ISSUE: -->
              			<div id="helpdesk_issue_panel">
              				<div id="subcontainer_titlebar"><h2 style="color: #95c9ff;">&nbsp;Topic</h2></div>
                   		<table border="0">
              					<tr>
              						<td valign="top" width="10">
              						</td>
              						<td>

														<!-- issue details -->
<!--
                         		<table border="0">
                           		<tr>
                             		<td colspan="3"><font class="typeblack16pt">What's the difference?</font></td>
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>1.) <font color="#08a822"><b>Qualified</b></font> Sign-Ups have completed profiles to a basic level of quality.  Blank profiles are <font color="red"><b>Unqualified</b></font>.
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>2.) The experience of our properties depends upon quality, thus we do all we can to get users to complete their profiles. <b><font color="red">AND WE WANT TO PAY YOU!</font></b>
                             		</td>
                         			</tr>

                           		<tr>
                             		<td></td>
                             		<td width="5"></td>
                             		<td>3.) <b>Multiple Sign-Up paths exist</b>, so we'll ensure you are using the best Earning Path while producing Quality for the property.
                             		</td>
                         			</tr>

                         		</table>
-->
														<!-- END issue details -->

              						</td>
              				</table>
              			</div>
              <!-- END ISSUE: -->





              <!-- ISSUE: IM -->
              			<div id="helpdesk_issue_panel">
              				<div id="subcontainer_titlebar"><h2 style="color: #95c9ff;">&nbsp;Need More Help?</h2></div>
                   		<table border="0">
              					<tr>
              						<td valign="top">
                         		<table border="0">

                           		<tr>
                             		<td><font class="typeblack16pt">Help Desk Contact</font></td>
                             		<td width="5"></td>
                             		<td>If you cannot find assistance here, please Contact our Help Desk via the following link: <a href="HelpDesk">Help Desk</a>
                             		</td>
                         			</tr>

                           		<tr>
                             		<td colspan="3" height="10"></td>
                         			</tr>


                         		</table>
              						</td>
              				</table>
              			</div>
              <!-- END ISSUE: IM -->






        				<?


  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){
  

  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	









    			// Login Member ==========================================================================
        	case "member-Authenticate":

        		//require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true){
  




  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){

  							$BrowserAgent	= $_SERVER['HTTP_USER_AGENT'];
  							
								
								
								// ---------------------------------------------------
              	// firefox -------------------------
              	if( eregi("Firefox", $BrowserAgent) ){
            
              		//FF3 ----------------------------
              		if(eregi("3.0", $BrowserAgent)){
              			//echo 'FF 3';
              			$Style	=	'width: 590px; height: 160px;';
              		}else{
              			//echo 'FF ?';
              			$Style	=	'width: 590px; height: 160px;';
              		}
            
              	// msie ----------------------------
              	}elseif( eregi("msie", $BrowserAgent) ){
              		
            			//msie 7.0 or else --------------
            			if(eregi("msie 7", $BrowserAgent)){
            				//echo 'IE 7';
            				$Style	=	'width: 600px; height: 141px;';
            			}elseif(eregi("msie 6", $BrowserAgent)){
            				//echo 'IE 6';
            				$Style	=	'width: 600px; height: 141px;';
            				?> 
            					<script> 
            						alert('Upgrade Your Browser to Version 7.0 or Later'); 
            					</script> 
            				<?
            			}else{
            				//echo 'IE ?';
            				$Style	=	'width: 600px; height: 141px;';
            			}
            		}
            		// ---------------------------------------------------
                ?>



          			<!-- core css -->
          			<link rel="stylesheet" type="text/css" href="http://sm0005.com/common/css/base.css" />
        
                <script type="text/javascript">
                
                  function helpdesk(){
                  	parent.parent.location="http://sm0005.com/helpdesk";
                  }
        
                </script>
        				
        				<style>
        					.generic {
        						font-family: 		Myriad, "Myriad Web", Helvetica, Arial, sans-serif;
        						font-size: 			21px;
        						font-weight: 		bold;
        						letter-spacing: -1px;
        					}
        				</style>


                <!-- login -->
                	<div id="login_panel" style="border: 5px solid #d6011f; <? echo $Style; ?> padding-top: 10px;">
                		<form action="execute" method="post" enctype="multipart/form-data" name="member-Authenticate" id="member-Authenticate">
                			<table style="width: 570px; height: 141px;" cellpadding="2" cellspacing="2" border="0" align="middle" >
                				<!-- icon -->
                				<tr>
                					<td rowspan="4" width="130">
        										<img src="common/img/icons/icon_keys.png">
                					</td>
                				</tr>
                				<!-- END icon -->
        
        
                				<!-- email address element -->
                				<tr>
                					<td width="130">
                						<label for="email" class="blue"><font class="greeting">EMail Address</font></label>
                					</td>
                					<td>
                						<input name="signin_emailaddress" size="20" maxlength="35" type="text" id="signin_emailaddress" class="generic" autocomplete="off" tabindex="1">
                					</td>
                				</tr>
                				<!-- END email address form element -->
        
                				<!-- email address form element -->
                				<tr>
                					<td>
                						<label for="email" class="blue"><font class="greeting">Password</font></label>
                					</td>
                					<td>
                						<input name="signin_password" size="20" maxlength="15" type="password" id="signin_password" class="generic" autocomplete="off" tabindex="1">
                					</td>
                				</tr>
                				<!-- END email address form element -->
        
                				<!-- submission form element -->
                      	<tr>
                      		<td colspan="3">
                
                      			<table cellpadding="0" cellspacing="0" border=0>
                      				<tr><td height="10"></td></tr>
                      				<tr>
                      					<td width="10"></td>
                      					<td><!-- <font size="2" face="arial"><b>I am 18 Years of Age or Older</b></font> --> <input type="button" name="help" value="Need Help?" class="generic" onclick="helpdesk();"> </td>
                								<td width="120"></td>
                      					<td>
        
                      						<input type="hidden" value='member-Authenticate' name="_function" id="_function">
        
                      						<input id="finalstep" type="submit" name="finalstep" tabindex="9" value="Sign me In!" style="letter-spacing: -1px; font-weight: bold; font-size: 21px;"><br>
                      					</td>
                      				</tr>
                      			</table>
                      				
                      		</td>
                      	</tr>
                				<!-- END submission form element -->
        
               
                
                			</table>
                			
                		</form>
                	</div>
                <!-- END login -->
        			<?

  
  						}

						// -----------------------------------------------------------------
						//require('common/html/html-subpage-base-footer.php');
						//require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================










    			// Failed Login Member ==========================================================================
        	case "member-AuthenticateFail":

        		//require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered & NOT Paid -------------------------------------------
  						if($obj_Member->MemberAuthorized == true){
  




  
  						// NOT Registered & NOT Paid ---------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){

  							$BrowserAgent	= $_SERVER['HTTP_USER_AGENT'];
  							
								
								
								// ---------------------------------------------------
              	// firefox -------------------------
              	if( eregi("Firefox", $BrowserAgent) ){
            
              		//FF3 ----------------------------
              		if(eregi("3.0", $BrowserAgent)){
              			//echo 'FF 3';
              			$Style	=	'width: 590px; height: 160px;';
              		}else{
              			//echo 'FF ?';
              			$Style	=	'width: 590px; height: 160px;';
              		}
            
              	// msie ----------------------------
              	}elseif( eregi("msie", $BrowserAgent) ){
              		
            			//msie 7.0 or else --------------
            			if(eregi("msie 7", $BrowserAgent)){
            				//echo 'IE 7';
            				$Style	=	'width: 600px; height: 141px;';
            			}elseif(eregi("msie 6", $BrowserAgent)){
            				//echo 'IE 6';
            				$Style	=	'width: 600px; height: 141px;';
            				?> 
            					<script> 
            						alert('Upgrade Your Browser to Version 7.0 or Later'); 
            					</script> 
            				<?
            			}else{
            				//echo 'IE ?';
            				$Style	=	'width: 600px; height: 141px;';
            			}
            		}
            		// ---------------------------------------------------
                ?>



          			<!-- core css -->
          			<link rel="stylesheet" type="text/css" href="http://<? echo $_SERVER['SERVER_NAME']; ?>/common/css/base.css" />
        
                <script type="text/javascript">
                
                  function helpdesk(){
                  	parent.parent.location="http://sm0005.com/helpdesk";
                  }
        
                </script>
        				
        				<style>
        					.generic {
        						font-family: 		Myriad, "Myriad Web", Helvetica, Arial, sans-serif;
        						font-size: 			21px;
        						font-weight: 		bold;
        						letter-spacing: -1px;
        					}
        				</style>


                <!-- login -->
                	<div id="login_panel" style="border: 5px solid #d6011f; <? echo $Style; ?> padding-top: 10px;">

                			<table style="width: 570px; height: 141px;" cellpadding="2" cellspacing="2" border="0" align="middle" >
                				<!-- icon -->
                				<tr>
                					<td rowspan="4" width="130" height="153">
        										<img src="common/img/icons/icon_stop.png">
                					</td>
                				</tr>
                				<!-- END icon -->
        
        
                				<!-- email address element -->
                				<tr>
                					<td width="330">
                						<label for="email" class="blue"><font class="greeting">Access Denied / Logged Out</font></label>
                					</td>
                				</tr>
                				<!-- END email address form element -->
        
                				<!-- email address form element -->
                				<tr>
                					<td>
                						<label for="email" class="blue"><font class="greeting">Did You Activate Your Account? <br><font size=2>(Check Your Email)</font></font></label>
                					</td>
                				</tr>
                				<!-- END email address form element -->
        
                				<!-- submission form element -->
                      	<tr>
                      		<td colspan="3">
                
                      			<table cellpadding="0" cellspacing="0">
                      				<tr><td height="10"></td></tr>
                      				<tr>
                      					<td width="10"></td>
                      					<td><!-- <font size="2" face="arial"><b>I am 18 Years of Age or Older</b></font> --> <input type="button" name="help" value="Try Again" class="generic" onclick="location='Login'"> </td>
                								<td width="120"></td>

                      				</tr>
                      			</table>
                      				
                      		</td>
                      	</tr>
                				<!-- END submission form element -->
                
                			</table>
                	</div>
                <!-- END login -->
        			<?

  
  						}

						// -----------------------------------------------------------------
						//require('common/html/html-subpage-base-footer.php');
						//require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	










    			// Helpdesk ==============================================================================
        	case "subpage.helpdesk":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------



            ?>
    					<!-- html  -->
    
    						<!-- progress bar -->
    						<script type="text/javascript" src="/common/js/progressbar.js"></script>

                <!-- SM JS HELPDESK lib -->
                	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.HELPDESK.uncompressed.js"></script>'; ?>
                <!-- END SM JS lib -->

								<!-- SM JS lib -->
									<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.FORMS.uncompressed.js"></script>'; ?>
								<!-- END SM JS lib -->


    						<div id="generic_block" style="text-align: left; padding: 10px; height: auto;">
									<form id="form_helpdesk">
                 	<input type="hidden" id="_platform" value="<? echo $obj_Member->Encrypt($_SERVER['HTTP_USER_AGENT'], 'public'); ?>" />
                 	
                 	

              
              
              
              	<div id="mycontainer">
              		<div id="mystuffcontainer">
              			
			              <!-- myspecsheet_panel -->
              			<div id="level_1_panel" style="height: 550px;">
              				<div id="subcontainer_titlebar"><h2 style="color: #95c9ff;">&nbsp;Help Desk</h2></div>


<!-- user NOT signed-in / authorized -->
                          <? if($obj_Member->MemberAuthorized != true){ ?>

                      			<div id="helpdesk_email" style="position: absolute; border: 1px solid #e4e4e4; top: 50px; left: 20px; width: 550px;">
                      				<table>
                      					<tr>
                      						<td colspan="3"><b><font color=red size=4>Your eMail address</font> </b>&nbsp;&nbsp;<font color=white size=3>(<b>Required</b> So We Can Lookup Your Account)</td>
                      					</tr>
                      					<tr>
                      						<td>
                      							<!-- <input id="_emailAddr" type="text" size="30" class="generic"> -->
                      							<input id="form_helpdesk.helpdesk.email_addr_nocheck" tabindex="1" size="50" maxlength="50" type="text" class="form_input" style="width: 300px;" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'eMail Address');" onclick="clickclear(this, 'eMail Address')" onfocus="clickclear(this, 'eMail Address')" onKeyUp="" value="eMail Address" />
                      						</td>

                          				<td width="5">
                          				</td>
                
                    							<td>
                              			<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.email_addr_nocheck"></div></b>
                              		</td>
                      					</tr>
                      				</table>
                      			</div>

                      			<input type="hidden" id="_userID" value="<? echo $obj_Member->Encrypt(0, 'private'); ?>" />
<!-- END user NOT signed-in / authorized -->




<!-- user signed-in / authorized -->
                       		<? 
                       			}else{
	                     				?> 
	                     					<input type="hidden" id="form_helpdesk.helpdesk.email_addr_nocheck" value="<? echo $obj_Member->GeteMailAddr($_SESSION['ActiveUser']['userid']); ?>" /> 
	                     					<input type="hidden" id="_userID" value="<? echo $obj_Member->Encrypt($_SESSION['ActiveUser']['userid'], 'private'); ?>" />
	                     				<?
                       			}
                       		?>
<!-- END user signed-in / authorized -->


                      			<div id="helpdesk_issuetype" style="position: absolute; border: 1px solid #e4e4e4; top: 125px; left: 20px; width: 550px;">
                      				<table>
                      					<tr>
                      						<td><b><font color=red size=4>Issue Type</font> </b></td>
                      					</tr>
                      					<tr>
                      						<td>
                      							
                      							 <select id="_issueType" size="1" width="20" class="generic">
                              				<optgroup label="Login">
																				<option id="_issueType" value="technical-cannotlogin">Cannot Login</option>
                              				</optgroup>

                              				<optgroup label="Technical">
																				<option id="_issueType" value="technical-error">Site Error</option>
																				<option id="_issueType" value="technical-pageissue">Page Wont Load</option>
																				<option id="_issueType" value="technical-account">Account Issue</option>
																				<option id="_issueType" value="technical-tracking">Tracking Issue</option>
																				<option id="_issueType" value="technical-general">General (Describe Issue Below)</option>
                              				</optgroup>

                              				<optgroup label="Earnings">
																				<option id="_issueType" value="billing-wrong">Wrong Amount</option>
																				<option id="_issueType" value="billing-general">General (Describe Issue Below)</option>
                              				</optgroup>

                              				<optgroup label="General">
																				<option id="_issueType" value="general-notlisted" selected="selected">Not Listed (Describe Issue Below)</option>
                              				</optgroup>
                              			</select>
                      							
                      						</td>
                      					</tr>
                      				</table>
                      			</div>


                      			<div id="helpdesk_data" style="position: absolute; border: 0px solid #000000; top: 200px; left: 20px;">
															
															<textarea style="width: 710px;" id="_additionalData" cols="100" rows="7" class="generic" onKeyDown="textCounter(this,'progressbar1',250)" onKeyUp="textCounter(this,'progressbar1',250)" onFocus="textCounter(this,'progressbar1',250)" ></textarea>
															<div id="progressbar1" class="progress"></div>
															<script type="text/javascript">
																textCounter(document.getElementById("_additionalData"),"progressbar1",250);
															</script>
															<input type="button" onclick="HelpDesk();" value="Submit Now!" class="generic">
															
                      			</div>



              				
              				</div>
              			</div>
              			


										<!-- quick help -->                    
<!--
                    <table>
                    	<tr><td><font size=4 color=white>Quick Help:</font></td><td width="20"></td><td><a href="#"><font color="red" size="3"><b>Change My Password</b></font></a></td></tr>
                    	<tr><td colspan="2" height="3"></td></tr>
                    	<tr><td></td><td width="20"></td><td><a href="#"><font color="red" size="3"><b>Change My Password</b></font></a></td></tr>
                    </table>
-->
                    <!-- END quick help -->

              			
              			
              		</div>
              
              	</div>
              	</form>
              	</div> <!-- END GENERIC BLOCK -->
    
    
    					<!-- END html  -->
            <?


						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	














    			// Feedback ==============================================================================
        	case "Feedback":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------



        ?>
					<!-- html  -->

						<!-- progress bar -->
						<script type="text/javascript" src="http://egenerations.com/common/js/progressbar.js"></script>
						
						<div id="generic_block" style="text-align: left; padding: 10px; height: auto;">

          	<div id="topcontainer">
          		<div id="paneltitle"> <font class="greetinglarge">Feedback</font> </div>
          	</div>
          
          
          
          	<div id="mycontainer">
          		<div id="mystuffcontainer">



          <table width="100%">
          	<tr>
          		<td>
          		<h3><? if($_GET['sent']==1){echo 'Message Sent!';}else{ if($_GET['formtype']==1){echo 'Need Help? &nbsp;&nbsp;Problem with the Site?';}elseif($_GET['formtype']==2){echo 'Give Us Feedback!';}} ?></h3>


          <form action="#supportsend.php" method="post">
          
          	<input type="hidden" name="supportx" id="supportx" value="<? echo $usragent; ?>">
          	<input type="hidden" id="flashornot" name="flashornot" value="">
          	<input type="hidden" id="userid" name="userid" value="<? echo $_SESSION['userid']; ?>">

          	<!-- flash detector -->
          	<script type="text/javascript" src="/common/js/flashdetect2/flashdetect.js"></script>


          <table width="100%">
          	<tr>
          
          <?
          if($_GET['sent']==1){
          									
          	if($_GET['formtype']==1){
          		echo "<td align=middle><h2>We'll Get Right on the Problem!</h2></td></tr></table>";
          	}elseif(
          		$_GET['formtype']==2){
          		echo "<td align=middle><h2>Thank You for Contacting Us!</h2></td></tr></table>";
          	}
          
          }else{			
          ?>
          												
          <td align="left">
          
          
          		<br><br><br>
          
          <?
          	if( $_SERVER['REQUEST_URI'] === '/helpdesk' ){
          		echo '<table width=100%><tr><td align="left"><font color=white size=4><b>Include the Following:</font></td></tr><tr><td><li><b><font color=red size=4>Your eMail address</font> </b><font color=white size=3>so we can contact you back</li></td></tr><tr><td>&nbsp;&nbsp;&nbsp;<input name="emailaddr" id="emailaddr" type="text" size="20" class="generic"></td></tr><tr><td height="20"></td></tr><tr><td><li><b><font color=red size=4>The Problem</font></b><font color=white size=3> you are experiencing</font></li></td></tr></table>';
          	}else{
          		echo '<table width=100%><tr><td align="left"><font color=red size=4><b>Include the Following:</font></td></tr><tr><td><li><b><font color=red size=4>Your eMail address</font> </b><font color=white size=3>so we can contact you back</li></td></tr><tr><td>&nbsp;&nbsp;&nbsp;<input name="emailaddr" id="emailaddr" type="text" size="20" class="generic"></td></tr><tr><td height="20"></td></tr><tr><td><li><b><font color=red size=4>The Feedback</font></b><font color=white size=3> you wish to express to us</font></li></td></tr></table>';
          	} 
          ?>
          		&nbsp;&nbsp;&nbsp;
          		<textarea style="width: 710px;" name="msg" id="msg" cols="100" rows="7" class="generic" onKeyDown="textCounter(this,'progressbar1',1000)" onKeyUp="textCounter(this,'progressbar1',1000)" onFocus="textCounter(this,'progressbar1',1000)" ></textarea>
          		<div id="progressbar1" class="progress"></div>
          		<script>textCounter(document.getElementById("msg"),"progressbar1",1000)</script>
      	    </td>
      	   </tr>
          
 	         <tr>
  	        	<td align="right"><input name="type" type="hidden" value="1"><input type="submit" value="Submit Now!" class="generic"></td>
    	      </tr>
          </table>
          
          <? } ?>
          
          	
          		</td></tr>
          	</table>
          
          			
          			
          		</div>
          
          	</div>
          	
          </div> <!-- END GENERIC BLOCK -->


					<!-- END html  -->
        <?


						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	












    			// About =================================================================================
        	case 'subpage.about':

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

        ?>
					<!-- html  -->
						<? require('common/html/inc.aboutus.php'); ?>
					<!-- END html  -->
        <?

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	












    			// Advertise =============================================================================
        	case "subpage.advertise":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

        ?>
					<!-- html  -->
						<font class="greetinglarge">&nbsp;&nbsp;&nbsp;Advertise</font>
					<!-- END html  -->
        <?

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	











    			// Privacy Policy ========================================================================
        	case "subpage.privacy_policy":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

        ?>
					<!-- html  -->
						<? require('common/html/inc.privacy-policy.php'); ?>
					<!-- END html  -->
        <?

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	












    			// Terms of Service ======================================================================
        	case "subpage.terms_of_service":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

        ?>
					<!-- html  -->

						<? require('common/html/inc.terms-of-service.php'); ?>

					<!-- END html  -->
        <?

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	












    			// SpecialNeeds ==========================================================================
        	case "subpage.special_needs":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

        ?>
					<!-- html  -->
						<font class="greetinglarge">&nbsp;&nbsp;&nbsp;Special Access Needs</font>
					<!-- END html  -->
        <?

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	












    			// Promote ===============================================================================
        	case "subpage.promote":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

        ?>
					<!-- html  -->
						<font class="greetinglarge">&nbsp;&nbsp;&nbsp;Promote</font>
					<!-- END html  -->
        <?

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	












    			// Activated =============================================================================
        	case "Activated":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

        ?>
					<!-- html  -->
						<center>
							<br><br>
							<font class="greetinglarge">Account Now Activated<br>Please Login</font>
						</center>
					<!-- END html  -->
        <?

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	












    			// NotActivated =============================================================================
        	case "NotActivated":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

        ?>
					<!-- html  -->
						<font class="greetinglarge">Account NOT Activated<br>Contact Help Desk Below</font>
					<!-- END html  -->
        <?

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	












    			// Upload Terms ==========================================================================
        	case "upload-terms":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

        ?>
					<!-- html  -->
						<center>
							<br><br><br><br>
							<font class="greetinglarge">Photograph / Imagery Upload Policy</font>
							<br><br><br>
							<font color="white">
								
							<p align="left">
                <b>THIS STATEMENT WAS LAST UPDATED ON August 21, 2008</b>
                <br><br>
                <b>Member’s Obligation To Comply With 18 U.S.C. 2257 With Respect to Certain Content</b>
                <br><br>
                You should be aware that, pursuant to federal law, any visual depictions that you post on the Site which portray actual sexually explicit conduct, depictions of the genitals or pubic area, or simulated sexually explicit activity, as such terms are defined in 18 U.S.C. §2256 (2) (A)(i)-(iv) and 18 U.S.C. §2257A, require that you maintain the records required by 18 U.S.C. 2257 and must contain an "18 U.S.C. 2257 Record-Keeping Requirements Compliance Statement". Your failure to comply with the provisions of 18 U.S.C. 2257 may make you subject to criminal and civil prosecution for the violation of 18 U.S.C. 2257.
                <br><br>
                
                <b>Content Posted By Members:</b>
                <br><br>
                By agreeing to the Terms and Conditions of this Agreement, you represent and warrant that all images you upload to the Site do not in any way infringe on anyone’s intellectual property rights. sm0005.com hereby asserts immunity with respect to all content provided by members or other third parties, as provided by law, including, but not limited to, under the Communications Decency Act. We will remove any content that you may post on the Site upon being notified, as provided in these Terms and Conditions, that the content you post on the Site violates the intellectual property rights of another. We may remove any content that you post on this Site that we believe, in our sole discretion, violates this Agreement without any obligation to provide you prior notice of such removal. Members and others are prohibited from uploading any images to the Site which, in our sole opinion, might be illegal or offensive, including, but not limited to, any content involving bestiality, urination, other bodily excretions, defamatory material or otherwise obscene material or any conduct that violates the prohibitions set forth under “Code of Conduct”, above, or any other provision of this Agreement. You may not post any content that solicits any information or response from anyone under 18 years of age, mischaracterizes your identity, solicits any information that might be used for unlawful purposes or encourages unlawful activities. You may not post any content for commercial purposes, including, but not limited to, email marketing, advertising of goods or services, any investment opportunities, contests, or similar activities. Additionally, sm0005.com reserves the right, in sm0005.com’s sole discretion, to immediately suspend your account, file for injunctive relief, file for civil redress and/or report any conduct that violates these terms and conditions to any and all authorities that may have jurisdiction over the matter. In the event any actions or proceedings are brought against sm0005.com as a result of content you have posted on the Site, or your engaging in any prohibited activities, as set forth in this section or in this Agreement, you agree to indemnify and hold sm0005.com harmless with respect to all costs and expenses, including, but not limited to, attorneys’ fees that sm0005.com may incur as a consequence of your posting of such content or engaging in such prohibited activities.
                <br><br>
                Questions or comments regarding these statements should be addressed to: webmaster at FriendsNFlings dot com
							</p>
						</font>

							
							<input id="continue" class="generic" type="submit" name="continue" value="Continue" onclick="location='Home'">
						</center>
					<!-- END html  -->
        <?


						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	


    			// Record Keeping Requirements Compliance ================================================
        	case "records":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

        ?>
					<!-- html  -->
						<center>
							<br><br><br><br>
							<font class="greetinglarge">§2257 Exemption Statement sm0005.com</font>
							<br><br><br>
							<font color="white">
								
							<p align="left">
                <b>THIS STATEMENT WAS LAST UPDATED ON August 21, 2008</b>
                <br><br>
                <b>All models appearing on this Website were 18 or older when the images were created.</b>
                <br><br>
                Exemption Statement - Content Produced by Operators: With regard to all visual depictions appearing on this website, for which the operators of this website are “producers” (within the meaning of 18 U.S.C. §2256), such depictions are either:
                <br><br>
                
                1) exempt from the provision of 18 U.S.C. §2257 and 28 C.F.R. 75 because:
                <br><br>
                a) they do not portray actual sexually explicit conduct as specifically defined in 18 U.S.C §2256 (2) (A)(i)-(iv);
                <br><br>
                b) they do not portray depictions of the genitals or pubic area created after July 27, 2006;
                <br><br>
                c) they do not portray simulated sexually explicit activity created after the effective date of Title 18 U.S.C. §2257A;
                <br><br>
                d) they were created prior to July 3, 1995; or,
                <br><br>
                2) with respect to visual depictions that are not exempt from the provisions of 18 U.S.C. §2257, individuals in such depictions were over the age of 18 at the time such depictions were created. Records required to be maintained by 18 USC §2257 with respect to such depictions are located at:
                <br><br>

                Custodian of Records
                <br>
                eGenerations Network, Inc.
                <br>
                PO Box 0000 (to
                <br>
                Scottsdale, Arizona 85254
                <br><br>
                Exemption Statement – Content Produced by Third Parties:The operators of this website are not, pursuant to Title 18 U.S.C. §2257(h)(2)(B)(v) and 47 U.S.C. §230(c), the “producers” of any depictions of actual or simulated sexually explicit conduct appearing thereon that is posted by third parties, because the activities of the operators of this website, with respect to such content, are limited to the distribution, transmission, storage, retrieval, hosting and/or formatting of depictions posted by third party users, on areas of the website under the users’ control. Pursuant to such statutes, the operators of this website reserve the right to delete content posted by users which operators deem to be indecent, obscene, defamatory or inconsistent with their policies and terms of service.
                <br><br>

                <br><br>
                Questions or comments regarding these statements should be addressed to: webmaster at FriendsNFlings dot com
							</p>
						</font>

							
							<input id="continue" class="generic" type="submit" name="continue" value="Continue" onclick="location='Home'">
						</center>
					<!-- END html  -->
        <?


						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	






















    			// Home / Dashboard ======================================================================
        	case "subpage.dashboard":


        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------


  						// Registered ----------------------------------------------------
  						if($obj_Member->MemberAuthorized == true && $obj_Member->ModuleAuthentication($_SESSION['ActiveUser']['userid'], $_SERVER['REQUEST_URI']) == true){


							// dashboard selection ---------------------------------
							switch($_SESSION['ActiveUser']['user_type']){
								
								case 'client':
									//echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Client Dashboard</div>';
									//require('common/html/dashboard/inc.DASHBOARD.clients.php');
								break;

								case 'sales':
									echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Sales Dashboard</div>';
									require('common/html/dashboard/inc.DASHBOARD.sales.php');
								break;

								case 'management':
									echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Management Dashboard</div>';
									require('common/html/dashboard/inc.DASHBOARD.management.php');
								break;

								case 'executive':
									//echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Management Dashboard</div>';
								break;

								case 'finance':
									//echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Finance Dashboard</div>';
								break;

								case 'admin':
									//echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Admin Dashboard</div>';
								break;

								case 'god':
									echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">God Dashboard</div>';
									//require('common/html/dashboard/inc.DASHBOARD.sales.php');
								break;

								default:
								?>
									<script type="text/javascript">location="Assistance";</script>
								<?
								break;
								
							}




  						// Registered w/o Dashboard ------------------------------------------------
  						}elseif($obj_Member->MemberAuthorized == true && $obj_Member->ModuleAuthentication($_SESSION['ActiveUser']['userid'], $_SERVER['REQUEST_URI']) == false){


							// dashboard selection ---------------------------------
							switch($_SESSION['ActiveUser']['user_type']){
								
								case 'client':
									//echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Client Dashboard</div>';
									//require('common/html/dashboard/inc.DASHBOARD.clients.php');
									?>
										<script type="text/javascript">location="Campaigns";</script>
									<?
								break;

								case 'finance':
									//echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Finance Dashboard</div>';
									?>
										<script type="text/javascript">location="Reports";</script>
									<?
								break;

								case 'executive':
									//echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Finance Dashboard</div>';
									?>
										<script type="text/javascript">location="Reports";</script>
									<?
								break;

								case 'admin':
									//echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Admin Dashboard</div>';
									?>
										<script type="text/javascript">location="Resources";</script>
									<?
								break;

								default:
									?>
										<script type="text/javascript">location="Assistance";</script>
									<?
								break;
								
							}




  
  						// NOT Registered ------------------------------------------------
  						}elseif($obj_Member->MemberAuthorized == false){



  							// IP2Location lookup --------------------------------
  							$IP2Location_ResultArray	=	$obj_Member->IPLookup($_SERVER['REMOTE_ADDR']);


?>
        					<!-- html  -->
        
        
        			<style type="text/css">
        			/* left sectional ----------------------------------------------------------------------- */
                 #sectional_left {
                  position: 					absolute;
                  border: 						1px solid #000000;
                  left:								0px;
                  top:								0px;
                  width:							467px;
                  height:							212px;
        			 		background-image:		url(/common/img/widgetparts/panel_bg.png);
        	     		background-repeat:	no-repeat;
                  }
        
                      #sectional_left_title {
                       position: 					absolute;
                       border: 						1px solid #000000;
                       left:							12px;
                       top:								8px;
                       width:							212px;
                       height:						33px;
             			 		 /* background-image:	url(http://egenerations.com/common/img/play.channel/funfactory_title.png); */
             	     		 background-repeat:	no-repeat;
                       }
									
									
        			</style>
        
        
        
        <!--
        		<div id="container_level1_titlebar">
        			<div id="column_title_1"><a href="connect"><img src="common/img/begin.channel/connect_title.gif" border="0" alt="column 1"></a></div>
        			<div id="column_title_2"><a href="learn"><img src="common/img/begin.channel/learn_title.gif" border="0" alt="column 2"></a></div>
        			<div id="column_title_3"><a href="explore"><img src="common/img/begin.channel/explore_title.gif" border="0" alt="column 3"></a></div>
        		</div>
        -->
        
        <!-- subcontainer level 1 -->
        
        		<div id="subcontainer1_level1">
<?




								switch($_SESSION['ActiveUser']['config_modes']['app_mode']){
									
									// SAAS MODE -------------------
									case 1:

?>


          		<!-- LEFT column -->
          			<div id="column_1b">
          				<!-- <div id="column_connect_fspromo_titleb"> -->

          				<div id="column_connect_latestloginlist_3" style="height: 150px; top: 5px; border: 1px solid #ffffff;">
          					<!-- <img src="common/img/affiliate_frontpage/making.money.101.jpg" /> -->

<!--										
										<div id="prereg_search_women" style="color: #BC0101; font-size: 20px; letter-spacing: -0.04em; font-weight: bold; border: 1px solid #b02517; background: #ffffff; position: absolute; top: 15px; width: 150px; left: 15px; text-align: center;" onmouseover="DivRollOver(this.id,'#000000','#ffffff');" onmouseout="DivRollOver(this.id, '#ffffff', '#000000');" >
											<font style="cursor: pointer;" onclick="PreRegQuickSearch('women');">Search Women</font>
										</div>

										<div id="prereg_search_men" style="color: #BC0101; font-size: 20px; letter-spacing: -0.04em; font-weight: bold; border: 1px solid #b02517; background: #ffffff; position: absolute; top: 15px; width: 120px; left: 200px; text-align: center;" onmouseover="DivRollOver(this.id,'#000000','#ffffff');" onmouseout="DivRollOver(this.id, '#ffffff', '#000000');" >
											<font style="cursor: pointer;" onclick="PreRegQuickSearch('men');">Search Men</font>
										</div>

										<div id="prereg_search_all" style="color: #BC0101; font-size: 20px; letter-spacing: -0.04em; font-weight: bold; border: 1px solid #b02517; background: #ffffff; position: absolute; top: 15px; width: 120px; right: 15px; text-align: center;" onmouseover="DivRollOver(this.id,'#000000','#ffffff');" onmouseout="DivRollOver(this.id, '#ffffff', '#000000');" >
											<font style="cursor: pointer;" onclick="PreRegQuickSearch('all');">Search Both</font>
										</div>

                  <table width="100%" height="100%">
                  	<tr>
                  		<td align=middle>><img src="http://sm0005.com/common/img/logo/pub.logo.friendsnflings-com.jpg" alt="FriendsNFlings.com" border="0" style="cursor: pointer;" onclick="PreRegQuickSearch('women');" /></td>
                  		<td width="50"></td>
                  		<td align=middle><a href="http://qualitymen.com" target="_new"><img src="http://sm0005.com/common/img/logo/pub.logo.qualitymen-com.jpg" alt="QualityMen.com" border=0 /></a></td>
                  	</tr>
              
                  	<tr>
                  		<td align=middle><a href="http://hardbodysingles.com" target="_new"><img src="http://sm0005.com/common/img/logo/pub.logo.hardbodysingles-com.gif" alt="HardBodySingles.com" border=0 /></a></td>
                  		<td width="50"></td>
                  		<td align=middle><img src="http://sm0005.com/common/img/logo/pub.logo.in-development.gif" alt="In Development" border=0 /></td>
                  	</tr>
                  </table>
-->

          				</div>

          				<!-- </div> --> <!-- END column_connect_fspromo_titleb -->


									<!-- main left panel -->
          				<div id="column_connect_latestloginlistb" style="height: 300px; top: 160px;">
          					<!-- <img src="common/img/affiliate_frontpage/better_tools_better_performance.jpg" /> -->
		           			<?
		           				/*
		           				AJAX SEARCH TOOL - Used on FNF 
		           				$__SeekingAllGenders_Per_GeoCode = '1111:'.$IP2Location_ResultArray['zipcode'];
   										echo "<script type=\"text/javascript\">";
   										//echo "window_REFRESH('".$obj_Member->Encrypt(999999, 'private')."', 'report.prereg_preview.current.home', '".$__SeekingAllGenders_Per_GeoCode."');";
  										echo "</script>";
    	        				//$obj_Member->Report(999999, 'prereg_preview', 1111, $IP2Location_ResultArray['zipcode']);																								//DEP.02.28.09.NAB - Hard-Refresh Based Report
    	        				*/
      	      			?>
          				</div>
									<!-- END main left panel -->



          				<!-- <div id="column_connect_latestloginlist_2"> </div> -->
<!--
#label_actual_profiles_statement {
  position: 				absolute;
  left:							5px;
  top:							522px;
  width:						482px;
  height: 					15px;
  z-index:					2;
  border:						1px solid #000000;
  background-color: #000000;
  text-align:				left;
  padding:					0 0 0 0;
}
-->
<!--
           				<div id="label_actual_profiles_statement" style="position: absolute; height: 15px; bottom: 186px; border: 0px solid #00ff00; left: 7px; z-index: 200;">
          					<img src="common/img/text/actual-profiles.lower.small.png" />
          				</div>
-->



          			</div>
          		<!-- END LEFT column -->
          
          
          
          
          		<!-- RIGHT column -->
          			<div id="column_3b">
          				<div id="column_explore_fspromo">
          					
          					<div id="shield_container" style="position: absolute; width: 186px; height: 232px; top: -27px; left: -28px; z-index: 100;">
          						<img src="common/img/affiliate_frontpage/badge_orange_w186_h232.png" />
          						
          						<div id="shield_container_text" style="position: absolute; width: 145px; height: 120px; top: 35px; left: 20px; z-index: 100; border: 0px solid #ffffff;">


<!--
            						<table cellspacing="0" cellpadding="0" border="0" width="100%">
            							<tbody>
            								<tr>
            									<td colspan="3" align="center"><font color="#000000" size="5"><b>Make Money</b></font></td>
            								</tr>

            								<tr>
            									<td colspan="3" align="center"><font color="#000000" size="5"><b>Have Fun</b></font></td>
            								</tr>

            								<tr>
            									<td colspan="3" align="center"><font color="#000000" size="4"><b>Grow with Us</b></font></td>
            								</tr>  
             							</tbody>
            						</table>
-->
          						</div>
          						
          					</div>

          					<div id="text_container_G" style="position: absolute; width: 230px; height: 210px; top: 20px; right: 20px; z-index: 100; border: 0px solid #ffffff; color: #ffffff;">
          						<table cellspacing="0" cellpadding="0" border="0" width="100%">
          							<tbody>

          								<tr>
          									<td colspan="3" align="center"><font color="#ffffff" size="4"><b>Modular BI/CRM System</b></font></td>
          								</tr>

          								<tr>
          									<td colspan="3" align="center" height="10"><hr style="border-bottom: 1px dashed #ff0000;"/></td>
          								</tr>

          								<tr>
          									<td><font color="#ffffff" size="3"><b>Dashboards</b></font></td>
          									<td width="15"></td>
          									<td><font color="#fffeb9">Dynamic Real-Time</td>
          								</tr>

          								<tr>
          									<td height="20"><font color="#ffffff" size="3"><b>Reporting</b></font></td>
          									<td width="15"></td>
          									<td><font color="#fffeb9">Dynamic & PDF</td>
          								</tr>

          								<tr>
          									<td height="20"><font color="#ffffff" size="3"><b>Forms</b></font></td>
          									<td width="15"></td>
          									<td><font color="#fffeb9">Sales+</td>
          								</tr>
          								<tr>
          									<td height="20"><font color="#ffffff" size="3"><b>Client</b></font></td>
          									<td width="15"></td>
          									<td><font color="#fffeb9">CRM & Projection</td>
          								</tr>
          								<tr>
          									<td height="20"><font color="#ffffff" size="3"><b>Management</b></font></td>
          									<td width="15"></td>
          									<td><font color="#fffeb9">User Administration</td>
          								</tr>
          								<tr>
          									<td colspan="3" align="center" height="5"></td>
          								</tr>

          								<tr>
          									<td colspan="3" align="center"><font color="#ff0000" size="1">* <i>additional modules in development</i></td>
          								</tr>



          							</tbody>
          						</table>
          					</div>

          					
          					<!-- <img src="common/img/promotional/reg-verified-people.gif" border="0"> -->
          					
<!-- red dotted block -->
<!--
          						<div id="_promo_title" style="position: absolute; top: 250px; right: 19px; width: 385px; height: 375px; border: 1px solid #ff0000; border-style: dashed; text-align: center; background-color: #000000;">
												<br>
												<h2>Feature Property</h2>
												<br>
												<img src="http://sm0005.com/common/img/logo/pub.logo.friendsnflings-com.jpg" alt="FriendsNFlings.com" border="0" style="cursor: pointer;" onclick="alert('signup_FNF_Affiliate');" />
												<br>
												<table border="0" width="100%">
													<tbody>

														<tr>
															<td align="right" valign="top"><h5>Concept:</h5></td>
															<td width="5"></td>
															<td align="center"><font color="#fffeb9">Mainstream Dating with a Kick<br>Conservative meets Dangerous<br><font size=1 color=white>(edgy Match / less-edgy Fling)</font></td>
														</tr>

														<tr>
															<td align="right"><h5>Target Demographic:</h5></td>
															<td width="5"></td>
															<td align="center"><font color="#fffeb9">18 to 55 Age Group<br><font size=1 color=white>(United States only at this time)</font></td>
														</tr>

														<tr>
															<td align="right"><h5>Promo Ad Venues:</h5></td>
															<td width="5"></td>
															<td align="center"><font color="#fffeb9">All Accepted</td>
														</tr>
													</tbody>
												</table>
											</div>
-->
<!-- END red dotted block -->


											<div id="_local_members" style="position: absolute; top: 175px; left: 0px; width: 424px; border: 0px solid #000000; color: #ffffff;">
          							<?
          								//echo $obj_Member->PromoReport('prereg', $IP2Location_ResultArray['zipcode'], 1, 0);
          							?>
          						</div>

          				</div>

          				<div id="column_explore_archivelist">
          					

          					<!-- RANDOM ARCHIVES -->
          					<? 
          						//include 'common/features/explore/inc_xrandomarchivefeatures.r3.php'; 
          					?>
          				</div>


          
          			</div>
          		<!-- END RIGHT column -->
        
        

<?
									break;
									
									case 2:
										?>
											<div style="border: 0px solid #f00; margin: 0 auto; text-align: center;">
												<img src="/common/img/logo/ucore-explicit-mode.png" title="unlimiCore|Business Intelligence System - EXPLICIT MODE" alt="unlimiCore|Business Intelligence System - EXPLICIT MODE" />
											</div>
										<?


										// modal window --------------------------------------------
										//if($_SESSION['ActiveUser']['activated'] != 1){
											?> 
												<script type="text/javascript">
													GB_showCenter('', 'http://sm0005.com/loginm', 180, 600);
												</script>
											<?
										//}
										// ---------------------------------------------------------
									
									break;
									
								}





                ?>



        		</div> <!-- END subcontainer1_level1 -->















        <?
        /*
        <div id="subcontainer2_level1">
        
        		<!-- left sectional -->
        			<div id="sectional_left">
        				<div id="sectional_left_title"></div>
        				<div id="section_pollshare_title_icon"></div>
        				<br><br><br><br><br>left
        					<? 
        						//include 'common/inc/play/funfactory.php';
        					?>
        			</div>
        		<!-- END left sectional -->
        </div>
        
        
        
        <div id="subcontainer2_level1">
        
        		<!-- left sectional -->
        			<div id="sectional_left">
        				<div id="sectional_left_title"></div>
        				<div id="section_pollshare_title_icon"></div>
        				<br><br><br><br><br>left
        					<? 
        						//include 'common/inc/play/funfactory.php';
        					?>
        			</div>
        		<!-- END left sectional -->
        </div>
        */
        ?>






        					<!-- END html  -->
                <?
  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	











    			// ADMIN TOOLS  =========================================================================
        	case "AdminTools":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

  						// Registered & NOT Paid -------------------------------------------
  						//if($obj_Member->MemberAuthorized == true && $obj_Member->MemberPaid == true){
  						if($obj_Member->MemberAuthorized == true && $_SESSION['ActiveUser']['user_type_id'] == 999){
								
								?>
									<!-- html -->
										<div style="width: 700px; position: absolute; height: auto; padding-left: 20px; padding-top: 15px;">

										<font class="typewhite22">Administrator Tools</font>
										
										<form action="exe-core.php" method="post" enctype="multipart/form-data" name="ADMIN-populate" id="ADMIN-populate">
											<input type="hidden" value='ADMIN-populate' name="_function" id="_function" />
											<input class="genericsubmit" type="submit" name="save" value="Populate" />
										</form>

										<form action="exe-core.php" method="post" enctype="multipart/form-data" name="ADMIN-populateSmart" id="ADMIN-populateSmart">
											<input type="hidden" value='ADMIN-populateSmart' name="_function" id="_function" />
											<input class="genericsubmit" type="submit" value="Smart Populate" />
										</form>


										<form action="exe-core.php" method="post" enctype="multipart/form-data" name="ADMIN-depopulate" id="ADMIN-depopulate">
											<input type="hidden" value='ADMIN-depopulate' name="_function" id="_function" />
											<input class="genericsubmit" type="submit" name="save" value="Depopulate" />
										</form>

										
										<table border=1 width="100%" cellpadding="0" cellspacing="0">
											<tr>
												
												<?
												
													$UnapprovedResult 	= $obj_Member->GetUnapprovedPhotos();
													
													if($UnapprovedResult){

  													$img_counter				=	1;
  													foreach($UnapprovedResult as $key => $value){
  														echo '<td align="center">';
  														echo '<table><tr><td align="center">';
  															echo '<img src="http://sm0005.com/media/img_thumb/'.$key.'-'.$value['userid'].'.jpg" border="0">';
  															echo '</td></tr>';
  															echo '<tr><td align="center">';
  																echo '<a href="ADMINphotoReview-'.$value['imageid'].'-0"><font color="white" size="3"><b>PG</b></font></a> &nbsp; <a href="ADMINphotoReview-'.$value['imageid'].'-1"><font color="white" size="3"><b>R</b></font></a> &nbsp; <a href="ADMINphotoReview-'.$value['imageid'].'-2"><img src="/common/img/icons/icon_20x20_redx.png" border="0"></a>';
  															echo '</tr></td></table>';
  														echo '</td>';

  														if(!$img_counter %= 7){
  															echo '</tr><tr>';
  														}
  														$img_counter++;
  													}
													}else{
														echo '<font class="typewhite22">No Pending Images</font>';
													}
													
												?>
										</table>
											
									</div>
									<!-- html -->
								<?
										



  						// NOT Admin -----------------------------------------------------
  						}else{
								
								?>
								
      						<center>
      							<br><br><br><br>
      							<table>
      								<tr>
      									<td><img src="/common/img/icons/icon_stop.png"></td>
      									<td>
      									
      										<table>
      											<tr>
      												<td><font class="greetinglarge">Access Denied</font></td>
      											</tr>
      											<tr>
      												<td align="center"><font class="typewhite22">Acceso Negó | L'accès A Nié | Greifen Sie auf Hat Verweigert zu | L'accesso Ha Negato</font></td>
      											</tr>
      										</td>
      									</table>
      
      								</td>
      							</tr>
      						</table>
      							
      							<br><br><br>
      							
      						</center>
								
								<?
  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	









    			// Resend Activation  ====================================================================
        	case "member-ResendActivation":

        		require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

  						// Registered & NOT Paid & NOT Activated -------------------------
  						if($obj_Member->MemberAuthorized == true && $_SESSION['ActiveUser']['activated'] == 0){
								
								$obj_Member->SendActivationEmail($_SESSION['ActiveUser']['userid']);
								
								
								
								?>
									<!-- html -->
									
										<br><br>
										<center>
											<font color="white" size="5">Your <font color="#ff9000">Activation Letter</font> has been Resent!

											<br><br>
											
											The eMail was sent to: <font color="#0f9afc"><? echo $obj_Member->GeteMailAddr($_SESSION['ActiveUser']['userid']); ?></font>
											
											<br><br>
											
											
											<table>
												<tr>
													<td colspan="3"><font color="#ffffff" size="5"><b><i>Now What?</i></b></font></td>
												</tr>


												<tr>
													<td><font color="#ffffff" size="4">Step #1</font></td>
													<td width="20"></td>
													<td><font color="#fdc753" size="4">Check Your eMail</font></td>
												</tr>

												<tr>
													<td><font color="#ffffff" size="4">Step #2</font></td>
													<td width="20"></td>
													<td><font color="#fdc753" size="4">Find the eMail titled "Activation - eGenerations Network Affiliate Center"</font></td>
												</tr>

												<tr>
													<td><font color="#ffffff" size="4">Step #3</font></td>
													<td width="20"></td>
													<td><font color="#fdc753" size="4">Click the "Activation Link"</font></td>
												</tr>
											</table>
											
											<br>

											<table style="width: 400px; height: 140px; border: 4px solid #f10000; margin-top: 20px;">
												<tr>
													<td align="center">

														<table>
															<tr>
																<td align="center">
																	<font color="white" size="5"><b>Cant Find It?</b></font>
																	<br><br>
																	<font color="white" size="3">
																		Check Your Bulk / Junk Mail Bin
																		<br><br>
																		Is the eMail Address Correct? (<a href="MyStuff"><font color="#ff9000">change it</font></a>)
																	</font>
																</td>
															</tr>
														</table>
														
													</td>
												</tr>
											</table>
											
											
											</font>
										
										<!-- <input type="button" onclick="alert('send activation');" value="Resend Activation to my EMail Address"> -->
										
																		
									<!-- html -->
								<?
										



  						// NOT Admin -----------------------------------------------------
  						}else{
								
								?>
								<script type="text/javascript">
									window.location = 'Home';
								</script>
								<?
  
  						}

						// -----------------------------------------------------------------
						require('common/html/html-subpage-base-footer.php');
						require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	








    			// Resend Activation Email Request Page ==================================================
        	case "member-ResendActivation-request":

        		//require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

  							$BrowserAgent	= $_SERVER['HTTP_USER_AGENT'];
  							
								
								
								// ---------------------------------------------------
              	// firefox -------------------------
              	if( eregi("Firefox", $BrowserAgent) ){
            
              		//FF3 ----------------------------
              		if(eregi("3.0", $BrowserAgent)){
              			//echo 'FF 3';
              			$Style	=	'width: 590px; height: 160px;';
              		}else{
              			//echo 'FF ?';
              			$Style	=	'width: 590px; height: 160px;';
              		}
            
              	// msie ----------------------------
              	}elseif( eregi("msie", $BrowserAgent) ){
              		
            			//msie 7.0 or else --------------
            			if(eregi("msie 7", $BrowserAgent)){
            				//echo 'IE 7';
            				$Style	=	'width: 600px; height: 161px;';
            			}elseif(eregi("msie 6", $BrowserAgent)){
            				//echo 'IE 6';
            				$Style	=	'width: 600px; height: 141px;';
            				?> 
            					<script> 
            						alert('Upgrade Your Browser to Version 7.0 or Later'); 
            					</script> 
            				<?
            			}else{
            				//echo 'IE ?';
            				$Style	=	'width: 600px; height: 141px;';
            			}
            		}
            		// ---------------------------------------------------

  						?>
  							<!-- html -->


         			<!-- core css -->
          			<link rel="stylesheet" type="text/css" href="http://<? echo $_SERVER['SERVER_NAME']; ?>/common/css/base.css" />
        
                <script type="text/javascript">
                  function resendActivationEmail(){
                  	parent.parent.location="http://sm0005.com/ResendActivation";
                  }
                </script>
        				
        				<style>
        					.generic {
        						font-family: 		Myriad, "Myriad Web", Helvetica, Arial, sans-serif;
        						font-size: 			21px;
        						font-weight: 		bold;
        						letter-spacing: -1px;
        					}
        				</style>


                <!-- resend activation email request -->
                	<div id="login_panel" style="border: 5px solid #d6011f; <? echo $Style; ?> padding-top: 10px; background-color: #000000;">

                			<table style="width: 570px; height: 160px;" cellpadding="2" cellspacing="2" border="0" align="middle">

                				<tr>
                					<td align="center">
                						<label for="email" class="blue"><font class="greeting"><font color="white">
                						Let's Activate Your Account!
                						<br><br>
                						<font size="2"><i>Once Completed You Can Read Your Mail!</i></font>
                						
                						</font></font></label>
                					</td>
                				</tr>

                				<tr>
                					<td align="center">
                						<input id="send_activation_email" type="button" value="Send Activation EMail to Me!" style="letter-spacing: -1px; font-weight: bold; font-size: 21px;" onclick="resendActivationEmail();">
                					</td>
                				</tr>

                			</table>
                			
                		</form>
                	</div>
                <!-- END html -->
        			<?



						// -----------------------------------------------------------------
						//require('common/html/html-subpage-base-footer.php');
						//require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	












    			// Get Banner HTML Code ==============================================
        	case "member-GetBannerPromo_HTMLCode":

        		//require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

            
            // class CORE - member class -----------------------------
            require("common/class/class.unlimiCore.php");

            // -------------------------------------------------------
            $obj_Member						=	new member;
            $obj_Member->Initiate('Create', 'friendsnflings.com');
            $obj_Member->Authenticate($_SESSION['ActiveUser']);
            // -------------------------------------------------------


  							$BrowserAgent	= $_SERVER['HTTP_USER_AGENT'];
  							

								
								// ---------------------------------------------------
              	// firefox -------------------------
              	if( eregi("Firefox", $BrowserAgent) ){
            
              		//FF3 ----------------------------
              		if(eregi("3.0", $BrowserAgent)){
              			//echo 'FF 3';
              			$Style	=	'width: 590px; height: 160px;';
              		}else{
              			//echo 'FF ?';
              			$Style	=	'width: 590px; height: 160px;';
              		}
            
              	// msie ----------------------------
              	}elseif( eregi("msie", $BrowserAgent) ){
              		
            			//msie 7.0 or else --------------
            			if(eregi("msie 7", $BrowserAgent)){
            				//echo 'IE 7';
            				$Style	=	'width: 600px; height: 161px;';
            			}elseif(eregi("msie 6", $BrowserAgent)){
            				//echo 'IE 6';
            				$Style	=	'width: 600px; height: 141px;';
            				?> 
            					<script> 
            						alert('Upgrade Your Browser to Version 7.0 or Later'); 
            					</script> 
            				<?
            			}else{
            				//echo 'IE ?';
            				$Style	=	'width: 600px; height: 141px;';
            			}
            		}
            		// ---------------------------------------------------

  						?>
  							<!-- html -->


         			<!-- core css -->
          			<link rel="stylesheet" type="text/css" href="http://<? echo $_SERVER['SERVER_NAME']; ?>/common/css/base.css" />
        
                <script type="text/javascript">
                  function SelectAll(id){
                  	document.getElementById(id).focus();
                  	document.getElementById(id).select();
                  }
                </script>
        				
        				<style>
        					.generic {
        						font-family: 		Myriad, "Myriad Web", Helvetica, Arial, sans-serif;
        						font-size: 			21px;
        						font-weight: 		bold;
        						letter-spacing: -1px;
        					}
        				</style>


                <!-- resend activation email request -->
                	<div id="login_panel" style="border: 5px solid #d6011f; <? echo $Style; ?> padding-top: 10px; background-color: #000000; text-align: center;">

                			<table style="width: 570px; height: 160px;" cellpadding="2" cellspacing="2" border="0" align="middle">

                				<tr>
                					<td align="center">
                						<label for="email" class="blue"><font class="greeting"><font color="white">
                						Here's the Code!
                						<br>
                						<font size="2"><i>Click to Select - Copy - Then Paste into your Website!</i></font>
                						
                						</font></font></label>
                					</td>
                				</tr>

                				<tr>
                					<td align="center">
														<textarea id="ban1" onClick="SelectAll('ban1');" style="width: 545px; height: 85px; border: solid 1px #ffffff; border-style: dotted; background-color: #252525; color: #ff0000; overflow: hidden;"><? echo $_SESSION['ActiveUser'][$_GET['_codestring']]; ?></textarea>
                					</td>
                				</tr>

                			</table>
                			
                		</form>
                	</div>
                <!-- END html -->
        			<?



						// -----------------------------------------------------------------
						//require('common/html/html-subpage-base-footer.php');
						//require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	













    			// create a new promotion ad =============================================================
        	case "member.create.newPromoAd":

        		//require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

  							$BrowserAgent	= $_SERVER['HTTP_USER_AGENT'];
  							
								
								
								// ---------------------------------------------------
              	// firefox -------------------------
              	if( eregi("Firefox", $BrowserAgent) ){
            
              		//FF3 ----------------------------
              		if(eregi("3.0", $BrowserAgent)){
              			//echo 'FF 3';
              			$Style	=	'width: 590px; height: 160px;';
              		}else{
              			//echo 'FF ?';
              			$Style	=	'width: 590px; height: 160px;';
              		}
            
              	// msie ----------------------------
              	}elseif( eregi("msie", $BrowserAgent) ){
              		
            			//msie 7.0 or else --------------
            			if(eregi("msie 7", $BrowserAgent)){
            				//echo 'IE 7';
            				$Style	=	'width: 600px; height: 161px;';
            			}elseif(eregi("msie 6", $BrowserAgent)){
            				//echo 'IE 6';
            				$Style	=	'width: 600px; height: 141px;';
            				?> 
            					<script> 
            						alert('Upgrade Your Browser to Version 7.0 or Later'); 
            					</script> 
            				<?
            			}else{
            				//echo 'IE ?';
            				$Style	=	'width: 600px; height: 141px;';
            			}
            		}
            		// ---------------------------------------------------

  						?>
  							<!-- html -->


         			<!-- core css -->
          			<link rel="stylesheet" type="text/css" href="http://<? echo $_SERVER['SERVER_NAME']; ?>/common/css/base.css" />
        
                <script type="text/javascript">
                  function resendActivationEmail(){
                  	parent.parent.location="http://sm0005.com/ResendActivation";
                  }
                </script>
        				
        				<style>
        					.generic {
        						font-family: 		Myriad, "Myriad Web", Helvetica, Arial, sans-serif;
        						font-size: 			21px;
        						font-weight: 		bold;
        						letter-spacing: -1px;
        					}
        				</style>


                <!-- resend activation email request -->
                	<div id="login_panel" style="border: 5px solid #d6011f; <? echo $Style; ?> padding-top: 10px; background-color: #000000;">

                			<table style="width: 570px; height: 160px;" cellpadding="2" cellspacing="2" border="0" align="middle">

                				<tr>
                					<td align="center">
                						<label for="email" class="blue"><font class="greeting"><font color="white">
                						Let's Create a New Promotion & Make some MONEY!
                						<br><br>
                						<font size="2"><i>Once Completed You Can Read Your Mail!</i></font>
                						
                						</font></font></label>
                					</td>
                				</tr>

                				<tr>
                					<td align="center">
                						<input id="send_activation_email" type="button" value="Send Activation EMail to Me!" style="letter-spacing: -1px; font-weight: bold; font-size: 21px;" onclick="resendActivationEmail();">
                					</td>
                				</tr>

                			</table>
                			
                		</form>
                	</div>
                <!-- END html -->
        			<?



						// -----------------------------------------------------------------
						//require('common/html/html-subpage-base-footer.php');
						//require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	












    			// Process Payment Feedback Window =======================================================
        	case "member-ProcessPaymentFeedback":

        		//require('common/html/html-subpage-base-header.php');
						// -----------------------------------------------------------------

  							$BrowserAgent	= $_SERVER['HTTP_USER_AGENT'];
  							
								
								
								// ---------------------------------------------------
              	// firefox -------------------------
              	if( eregi("Firefox", $BrowserAgent) ){
            
              		//FF3 ----------------------------
              		if(eregi("3.0", $BrowserAgent)){
              			//echo 'FF 3';
              			$Style	=	'width: 590px; height: 160px;';
              		}else{
              			//echo 'FF ?';
              			$Style	=	'width: 590px; height: 160px;';
              		}
            
              	// msie ----------------------------
              	}elseif( eregi("msie", $BrowserAgent) ){
              		
            			//msie 7.0 or else --------------
            			if(eregi("msie 7", $BrowserAgent)){
            				//echo 'IE 7';
            				$Style	=	'width: 600px; height: 161px;';
            			}elseif(eregi("msie 6", $BrowserAgent)){
            				//echo 'IE 6';
            				$Style	=	'width: 600px; height: 141px;';
            				?> 
            					<script> 
            						alert('Upgrade Your Browser to Version 7.0 or Later'); 
            					</script> 
            				<?
            			}else{
            				//echo 'IE ?';
            				$Style	=	'width: 600px; height: 141px;';
            			}
            		}
            		// ---------------------------------------------------

  						?>
  							<!-- html -->


         			<!-- core css -->
          			<link rel="stylesheet" type="text/css" href="/common/css/base.css" />
        
                <script type="text/javascript">

                  // IM poller -------------------------------------
                  function process(){
                  	var x_count		= 1;
                  	var y_count		= 1;
                  	x_count 			= x_count - y_count;
                  	setTimeout("processPaymentSSL()", 2000);
                  }
                  // -----------------------------------------------

                  function processPaymentSSL(){
                  	//parent.parent.location="https://sm0005.com/ProcessSubscriptionPayment";
                  	//var form_creditCard = parent.document.getElementById('upgrade_cctype').value;
                  	alert(form_creditCard);
                  }
                </script>
        				
        				<style>
        					.generic {
        						font-family: 		Myriad, "Myriad Web", Helvetica, Arial, sans-serif;
        						font-size: 			21px;
        						font-weight: 		bold;
        						letter-spacing: -1px;
        					}
        				</style>


                <!-- resend activation email request -->
                	<div id="processPayment_panel" style="border: 5px solid #d6011f; <? echo $Style; ?> padding-top: 10px; background-color: #000000;">

                			<table style="width: 570px; height: 160px;" cellpadding="2" cellspacing="2" border="0" align="middle">

                				<tr>
                					<td align="center">
                						<label for="email" class="blue"><font class="greeting"><font color="white">
                						Processing Payment...
                						<br><br>
                						<img src="https://sm0005.com/common/img/progress_bar.gif" />
                						
                						</font></font></label>
                					</td>
                				</tr>

                				<tr>
                					<td align="center">
                						<!-- <input id="send_activation_email" type="button" value="Send Activation EMail to Me!" style="letter-spacing: -1px; font-weight: bold; font-size: 21px;" onclick="resendActivationEmail()"> -->
                					</td>
                				</tr>

                			</table>
                			
                		</form>
                		<script type="text/javascript">
                			//processPaymentSSL();
                		</script>
                			
                	</div>
                <!-- END html -->
        			<?



						// -----------------------------------------------------------------
						//require('common/html/html-subpage-base-footer.php');
						//require('common/footer/SM.standard_nav.php');

        	break;
        	// =======================================================================================	











	} // END executable list *********************************************************************************************













/*

                ?>
        					<!-- html  -->
        						<center>
        							<br><br><br><br>
        							<? 
        
        								if($obj_Member->MemberPaidPrior == true){
        									?> 
        										<font class="greetinglarge">Membership Expired <br> <? echo 'Previous Product: '.$obj_Member->MemberPaidPriorProduct; ?></font>
        									<?
         								}else{
         									?> <font class="greetinglarge">Upgrade Your Membership To View This!</font> <?
         								}
        								
        							?>
        						</center>
        					<!-- END html  -->
                <?





        ?>
					<!-- html  -->
						<font class="greetinglarge">&nbsp;Not Authorized</font>

						<center>
							<br><br><br><br>
							<table>
								<tr>
									<td><img src="/common/img/icons/icon_stop.png"></td>
									<td>
									
										<table>
											<tr>
												<td><font class="greetinglarge">Are You a Member?</font></td>
											</tr>
											<tr>
												<td align="center"><a href="signup"><font class="typewhite22">Sign-Up</font></a>&nbsp;<font class="typewhite22"><b>|</b></font>&nbsp;<a href="login" rel="gb_page_center[550, 300]"><font class="typewhite22">Login</font></a></td>
											</tr>
										</td>
									</table>

								</td>
							</tr>
						</table>
							
							<br><br><br>
							
						</center>
						
					<!-- END html  -->
        <?



*/
?>