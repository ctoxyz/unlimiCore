








<!-- MAIN RESOURCES PANEL -->
	<div style="position: relative; top: 10px; height: 635px; width: 938px; left: 10px; border: 1px solid #760000; " >







		<!-- title -->
		<div id="panel_title" style="height: 30px; background-color: #414141; color: #ffffff; font-size: 20px; font-weight: bold; border-bottom: 1px solid #656565;">
			<div style="position: absolute; top: 4px; left: 4px;">RESOURCES</div>
			<div style="position: absolute; top: 4px; right: 4px;"><? echo '&nbsp;'.date('F d Y',time()); ?></div>
		</div>
		<!-- END title -->




<?

if($_SESSION['ActiveUser']['user_type'] == 'admin'){
	?>




		<!-- HUMAN RESOURCE -->
		<div id="panel_control_1" style="position: absolute; left: 10px; top: 45px; width: 450px; height: 280px; background-color: #414141; color: #ffffff; font-size: 15px; font-weight: normal; border: 1px solid #760000;">

			<!-- title -->
			<div id="panel_title" style="height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: bold; border-bottom: 1px solid #656565;">
				<div style="position: absolute; top: 4px; left: 6px;"><h2 style="color: #ffffff;">Human Resource</h2></div>
			</div>
			<!-- END title -->


<!-- form_resources -->
			<form action="#" method="post" enctype="multipart/form-data" name="form_resources_human_new" id="form_resources_human_new">



			<table class="form_resource_new" cellpadding="1" cellspacing="0" border="0" width="100%" style="position: absolute; top: 50px; left: 10px;">
	




    				<!-- form element -->
    				<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;First Name
    					</td>

          		<td>
          			<input id="form_resources_human_new.user.first_name" tabindex="1" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'First Name');" onclick="clickclear(this, 'First Name')" onfocus="clickclear(this, 'First Name')" onKeyUp="" value="First Name" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.first_name"></div>
              </td>
    				</tr>
    				<!-- END form element -->


    				<!-- form element -->
    				<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;Last Name
    					</td>

          		<td>
          			<input id="form_resources_human_new.user.last_name" tabindex="2" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Last Name');" onclick="clickclear(this, 'Last Name')" onfocus="clickclear(this, 'Last Name')" onKeyUp="" value="Last Name" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.last_name"></div>
              </td>
    				</tr>
    				<!-- END form element -->

    				<!-- form element -->
    				<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;eMail Address
    					</td>

          		<td class="formControl_input_td">
          			<input id="form_resources_human_new.user.email_addr" tabindex="3" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'eMail Address');" onclick="clickclear(this, 'eMail Address')" onfocus="clickclear(this, 'eMail Address')" onKeyUp="" value="eMail Address" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.email_addr"></div>
              </td>
    				</tr>
    				<!-- END form element -->



    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;User Type
    					</td>

							<td align="left">
          			<select name="form_resources_human_new.user.user_type_id" id="form_resource_new.user.user_type_id" tabindex="4" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a User Type</option>
                 <?

  								// get data --------------------------
									$ResultArray_USRTYPES			= $obj_Member->GetUserTypes($_SESSION['ActiveUser']['user_type_id']);

									foreach($ResultArray_USRTYPES as $_USRTYPES_KEY){
                 		$_USRTYPES_NAME		= ucwords($_USRTYPES_KEY['user_type']);
                 		$_USRTYPES_ID			= $_USRTYPES_KEY['user_type_id'];

										if($_USRTYPES_ID != 1){
											echo '<option value="'.$_USRTYPES_ID.'">'.$_USRTYPES_NAME.'</option>';	
										}
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.user_type_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->
	
	
	
	
    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;Organization
    					</td>

							<td align="left">
          			<select name="form_resources_human_new.user.organization_id" id="form_resource_new.user.organization_id" tabindex="5" <? echo ($_SESSION['ActiveUser']['user_type_id'] != 999 ? 'disabled':''); ?> onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Organization</option>
                 <?

  								// get data --------------------------

									// ADMIN || GOD ACCOUNT = ALL ORG SELECTION --------
									if($_SESSION['ActiveUser']['user_type_id'] == 5 || $_SESSION['ActiveUser']['user_type_id'] == 999){
										$ResultArray_ORGS			= $obj_Member->GetOrganizations('system_all');
									
									// ALL OTHERS --------------------------------------
									}else{
										$ResultArray_ORGS			= $obj_Member->GetOrganizations('organization');
									}

									foreach($ResultArray_ORGS as $_ORGS_KEY){
                 		$_ORGS_NAME		= ucwords($_ORGS_KEY['name']);
                 		$_ORGS_ID			= $_ORGS_KEY['id'];
                 		echo '<option value="'.$_ORGS_ID.'" '.($_SESSION['ActiveUser']['organization_id'] == $_ORGS_ID ? 'selected':'').' >'.$_ORGS_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.organization_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->



    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;Team Leader
    					</td>

							<td align="left">
          			<select name="form_resources_human_new.user.manager_id" id="form_resources_human_new.user.manager_id" tabindex="6" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Team Leader</option>
          				<option value="99999999">No Team Leader / Self</option>
                 <?
	 								// get data --------------------------
									$ResultArray_MANAGERS		= $obj_Member->GetManagers('organization');

									if(count($ResultArray_MANAGERS) > 0){

										foreach($ResultArray_MANAGERS as $_MANAGERS_KEY){
	
	                 		$_MANAGERS_NAME				= '(MGR) '.ucwords($_MANAGERS_KEY['first_name'].' '.$_MANAGERS_KEY['last_name']);
	                 		$_MANAGERS_ID					= $_MANAGERS_KEY['userid'];
	                 		echo '<option value="'.$_MANAGERS_ID.'">'.$_MANAGERS_NAME.'</option>';
										}
										
									}


                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.manager_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->

		
	    </table>


                <?
                	// security token ----------------------------------
                	$_SESSION['ActiveUser']['TransactionToken'] 						= $obj_Member->Encrypt(md5(uniqid(rand(), true)), 'private');
                	$_SESSION['ActiveUser']['TransactionTokenExpiration'] 	= $obj_Member->Encrypt((time() + 240), 'private');                             //Expiration = 4 minutes (240 seconds)
                	$_SESSION['ActiveUser']['TransactionAgentSignature']		= $obj_Member->Encrypt($_SESSION['ActiveUser']['userid'], 'private');
                	// -------------------------------------------------
                ?>
								<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionToken']; ?>" name="form_resources_human_new.user._token" id="form_resource_new.user._token" />
    						<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionTokenExpiration']; ?>" name="form_resources_human_new.user._token_expiration" id="form_resources_human_new.user._token_expiration" />
    						<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionAgentSignature']; ?>" name="form_resources_human_new.user._agent_signature" id="form_resources_human_new.user._agent_signature" />
								
								<input type="hidden" value="user" name="form_resources_human_new.user._table" id="form_resources_human_new.user._table" />









		<!-- PROCESS -->
		<div id="panel_control_process" style="position: absolute; left: 0px; bottom: 0px; width: 450px; height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: normal; border: 0px solid #760000;">

			<!-- title -->
			<div id="panel_title" style="height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: bold;">

			<div style="position: absolute; top: 4px; left: 6px;"><h2 style="color: #ffffff;">Process</h2></div>

				<div style="position: absolute; top: 7px; right: 6px;">
    			<input type="button" id="form_resources_human_new.user.submit" tabindex="7" value="Add Human Resource" class="formControl_button_submit" style="width: 200px;" onclick="SM_Form_Submit('form_resources_human_new');" /><br>
				</div>

			</div>
			<!-- END title -->
		</div>
		<!-- END PROCESS -->

		</form> <!-- ADD HUMAN RESOURCE -->


		</div>
		<!-- END HUMAN RESOURCE PANEL -->






	<?
}

?>





















		<!-- CLIENT RESOURCE -->
		<div id="panel_control_1" style="position: absolute; right: 10px; top: 45px; width: 450px; height: 280px; background-color: #414141; color: #ffffff; font-size: 15px; font-weight: normal; border: 1px solid #760000;">

			<!-- title -->
			<div id="panel_title" style="height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: bold; border-bottom: 1px solid #656565;">
				<div style="position: absolute; top: 4px; left: 6px;"><h2 style="color: #ffffff;">Client Resource</h2></div>
			</div>
			<!-- END title -->



			<form action="#" method="post" enctype="multipart/form-data" name="form_resources_client_new" id="form_resources_client_new">



			<table class="form_resource_new" cellpadding="1" cellspacing="0" border="0" width="100%" style="position: absolute; top: 50px; left: 10px;">


    				<!-- form element -->
    				<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;Client / Org Name
    					</td>

          		<td>
          			<input id="form_resources_client_new.client.client_name" tabindex="11" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Name');" onclick="clickclear(this, 'Name')" onfocus="clickclear(this, 'Name')" onKeyUp="" value="Name" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.client_name"></div>
              </td>
    				</tr>
    				<!-- END form element -->



    				<!-- form element -->
<!--
    				<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;eMail Address
    					</td>

          		<td class="formControl_input_td">
          			<input id="form_resource_new.user.email_addr" tabindex="3" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'eMail Address');" onclick="clickclear(this, 'eMail Address')" onfocus="clickclear(this, 'eMail Address')" onKeyUp="" value="eMail Address" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.email_addr"></div>
              </td>
    				</tr>
-->
    				<!-- END form element -->



	
	
	
    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;Organization
    					</td>

							<td align="left">
          			<select name="form_resources_client_new.client.organization_id" id="form_resources_client_new.client.organization_id" <? echo ($_SESSION['ActiveUser']['user_type_id'] != 999 ? 'disabled':''); ?> tabindex="12" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Organization</option>
                 <?

  								// get data --------------------------

									// ADMIN || GOD ACCOUNT = ALL ORG SELECTION --------
									if($_SESSION['ActiveUser']['user_type_id'] == 999){
										$ResultArray_ORGS			= $obj_Member->GetOrganizations('system_all');
									
									// ALL OTHERS --------------------------------------
									}else{
										$ResultArray_ORGS			= $obj_Member->GetOrganizations('organization');
									}

									foreach($ResultArray_ORGS as $_ORGS_KEY){
                 		$_ORGS_NAME		= ucwords($_ORGS_KEY['name']);
                 		$_ORGS_ID			= $_ORGS_KEY['id'];
                 		echo '<option value="'.$_ORGS_ID.'" '.($_SESSION['ActiveUser']['organization_id'] == $_ORGS_ID ? 'selected':'').' >'.$_ORGS_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.organization_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->





    				<!-- form element -->
    				<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;First Name
    					</td>

          		<td>
          			<input id="form_resources_client_new.client.client_first_name" tabindex="13" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'First Name');" onclick="clickclear(this, 'First Name')" onfocus="clickclear(this, 'First Name')" onKeyUp="" value="First Name" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.client_first_name"></div>
              </td>
    				</tr>
    				<!-- END form element -->


    				<!-- form element -->
    				<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;Last Name
    					</td>

          		<td>
          			<input id="form_resources_client_new.client.client_last_name" tabindex="14" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Last Name');" onclick="clickclear(this, 'Last Name')" onfocus="clickclear(this, 'Last Name')" onKeyUp="" value="Last Name" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.client_last_name"></div>
              </td>
    				</tr>
    				<!-- END form element -->

    				<!-- form element -->
    				<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;eMail Address
    					</td>

          		<td class="formControl_input_td">
          			<input id="form_resources_client_new.client.client_email_addr" tabindex="15" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'eMail Address');" onclick="clickclear(this, 'eMail Address')" onfocus="clickclear(this, 'eMail Address')" onKeyUp="" value="eMail Address" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.client_email_addr"></div>
              </td>
    				</tr>
    				<!-- END form element -->



		
	    </table>


                <?
                	// security token ----------------------------------
                	$_SESSION['ActiveUser']['TransactionToken'] 						= $obj_Member->Encrypt(md5(uniqid(rand(), true)), 'private');
                	$_SESSION['ActiveUser']['TransactionTokenExpiration'] 	= $obj_Member->Encrypt((time() + 240), 'private');                             //Expiration = 4 minutes (240 seconds)
                	$_SESSION['ActiveUser']['TransactionAgentSignature']		= $obj_Member->Encrypt($_SESSION['ActiveUser']['userid'], 'private');
                	// -------------------------------------------------
                ?>
								<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionToken']; ?>" name="form_resources_client_new.client._token" id="form_resources_client_new.client._token" />
    						<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionTokenExpiration']; ?>" name="form_resources_client_new.client._token_expiration" id="form_resources_client_new.client._token_expiration" />
    						<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionAgentSignature']; ?>" name="form_resources_client_new.client._agent_signature" id="form_resources_client_new.client._agent_signature" />
								
								<input type="hidden" value="client" name="form_resources_client_new.client._table" id="form_resources_client_new.client._table" />









		<!-- PROCESS -->
		<div id="panel_control_process" style="position: absolute; left: 0px; bottom: 0px; width: 450px; height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: normal; border: 0px solid #760000;">

			<!-- title -->
			<div id="panel_title" style="height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: bold;">

			<div style="position: absolute; top: 4px; left: 6px;"><h2 style="color: #ffffff;">Process</h2></div>

				<div style="position: absolute; top: 7px; right: 6px;">
    			<input type="button" id="form_resources_client_new.client.submit" tabindex="16" value="Add Client" class="formControl_button_submit" onclick="SM_Form_Submit('form_resources_client_new');" /><br>
				</div>

			</div>
			<!-- END title -->
		</div>
		<!-- END PROCESS -->

		</form> <!-- ADD HUMAN RESOURCE -->


		</div>
		<!-- END CLIENT RESOURCE PANEL -->
















		<!-- ADVERTISER RESOURCE -->
		<div id="panel_control_1" style="position: absolute; right: 10px; top: 340px; width: 450px; height: 280px; background-color: #414141; color: #ffffff; font-size: 15px; font-weight: normal; border: 1px solid #760000;">

			<!-- title -->
			<div id="panel_title" style="height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: bold; border-bottom: 1px solid #656565;">
				<div style="position: absolute; top: 4px; left: 6px;"><h2 style="color: #ffffff;">Advertiser Resource</h2></div>
			</div>
			<!-- END title -->



			<form action="#" method="post" enctype="multipart/form-data" name="form_resources_advertiser_new" id="form_resources_advertiser_new">



			<table class="form_resource_new" cellpadding="1" cellspacing="0" border="0" width="100%" style="position: absolute; top: 50px; left: 10px;">


    				<!-- form element -->
    				<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;Advertiser Name
    					</td>

          		<td>
          			<input id="form_resources_advertiser_new.advertiser.advertiser_name" tabindex="17" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Name');" onclick="clickclear(this, 'Name')" onfocus="clickclear(this, 'Name')" onKeyUp="" value="Name" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.advertiser_name"></div>
              </td>
    				</tr>
    				<!-- END form element -->



    				<!-- form element -->
<!--
    				<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;eMail Address
    					</td>

          		<td class="formControl_input_td">
          			<input id="form_resource_new.user.email_addr" tabindex="3" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'eMail Address');" onclick="clickclear(this, 'eMail Address')" onfocus="clickclear(this, 'eMail Address')" onKeyUp="" value="eMail Address" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.email_addr"></div>
              </td>
    				</tr>
-->
    				<!-- END form element -->



	
	
	
    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;Organization
    					</td>

							<td align="left">
          			<select name="form_resources_advertiser_new.advertiser.organization_id" id="form_resources_advertiser_new.advertiser.organization_id" <? echo ($_SESSION['ActiveUser']['user_type_id'] != 999 ? 'disabled':''); ?> tabindex="18" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Organization</option>
                 <?

  								// get data --------------------------

									// ADMIN || GOD ACCOUNT = ALL ORG SELECTION --------
									if($_SESSION['ActiveUser']['user_type_id'] == 999){
										$ResultArray_ORGS			= $obj_Member->GetOrganizations('system_all');
									
									// ALL OTHERS --------------------------------------
									}else{
										$ResultArray_ORGS			= $obj_Member->GetOrganizations('organization');
									}

									foreach($ResultArray_ORGS as $_ORGS_KEY){
                 		$_ORGS_NAME		= ucwords($_ORGS_KEY['name']);
                 		$_ORGS_ID			= $_ORGS_KEY['id'];
                 		echo '<option value="'.$_ORGS_ID.'" '.($_SESSION['ActiveUser']['organization_id'] == $_ORGS_ID ? 'selected':'').' >'.$_ORGS_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.organization_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->




		
	    </table>


                <?
                	// security token ----------------------------------
                	$_SESSION['ActiveUser']['TransactionToken'] 						= $obj_Member->Encrypt(md5(uniqid(rand(), true)), 'private');
                	$_SESSION['ActiveUser']['TransactionTokenExpiration'] 	= $obj_Member->Encrypt((time() + 240), 'private');                             //Expiration = 4 minutes (240 seconds)
                	$_SESSION['ActiveUser']['TransactionAgentSignature']		= $obj_Member->Encrypt($_SESSION['ActiveUser']['userid'], 'private');
                	// -------------------------------------------------
                ?>
								<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionToken']; ?>" name="form_resources_advertiser_new.advertiser._token" id="form_resources_advertiser_new.advertiser._token" />
    						<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionTokenExpiration']; ?>" name="form_resources_advertiser_new.advertiser._token_expiration" id="form_resources_advertiser_new.advertiser._token_expiration" />
    						<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionAgentSignature']; ?>" name="form_resources_advertiser_new.advertiser._agent_signature" id="form_resources_advertiser_new.advertiser._agent_signature" />
								
								<input type="hidden" value="advertiser" name="form_resources_advertiser_new.advertiser._table" id="form_resources_advertiser_new.advertiser._table" />









		<!-- PROCESS -->
		<div id="panel_control_process" style="position: absolute; left: 0px; bottom: 0px; width: 450px; height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: normal; border: 0px solid #760000;">

			<!-- title -->
			<div id="panel_title" style="height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: bold;">

			<div style="position: absolute; top: 4px; left: 6px;"><h2 style="color: #ffffff;">Process</h2></div>

				<div style="position: absolute; top: 7px; right: 6px;">
    			<input type="button" id="form_resources_advertiser_new.advertiser.submit" tabindex="19" value="Add Advertiser" class="formControl_button_submit" onclick="SM_Form_Submit('form_resources_advertiser_new');" /><br>
				</div>

			</div>
			<!-- END title -->
		</div>
		<!-- END PROCESS -->

		</form> <!-- ADD HUMAN RESOURCE -->


		</div>
		<!-- END HUMAN RESOURCE PANEL -->


















		<!-- ADVERTISER RESOURCE -->
		<div id="panel_control_1" style="position: absolute; left: 10px; top: 340px; width: 450px; height: 280px; background-color: #414141; color: #ffffff; font-size: 15px; font-weight: normal; border: 1px solid #760000;">

			<!-- title -->
			<div id="panel_title" style="height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: bold; border-bottom: 1px solid #656565;">
				<div style="position: absolute; top: 4px; left: 6px;"><h2 style="color: #ffffff;">Vendor Resource</h2></div>
			</div>
			<!-- END title -->




			<form action="#" method="post" enctype="multipart/form-data" name="form_resources_vendor_new" id="form_resources_vendor_new">



			<table class="form_resource_new" cellpadding="1" cellspacing="0" border="0" width="100%" style="position: absolute; top: 50px; left: 10px;">


    				<!-- form element -->
    				<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;Vendor Name
    					</td>

          		<td>
          			<input id="form_resources_vendor_new.vendor.vendor_name" tabindex="8" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Name');" onclick="clickclear(this, 'Name')" onfocus="clickclear(this, 'Name')" onKeyUp="" value="Name" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.vendor_name"></div>
              </td>
    				</tr>
    				<!-- END form element -->



    				<!-- form element -->
<!--
    				<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;eMail Address
    					</td>

          		<td class="formControl_input_td">
          			<input id="form_resource_new.user.email_addr" tabindex="3" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'eMail Address');" onclick="clickclear(this, 'eMail Address')" onfocus="clickclear(this, 'eMail Address')" onKeyUp="" value="eMail Address" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.email_addr"></div>
              </td>
    				</tr>
-->
    				<!-- END form element -->



	
	
	
    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;Organization
    					</td>

							<td align="left">
          			<select name="form_resources_vendor_new.vendor.organization_id" id="form_resources_vendor_new.vendor.organization_id" <? echo ($_SESSION['ActiveUser']['user_type_id'] != 999 ? 'disabled':''); ?> tabindex="9" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Organization</option>
                 <?

  								// get data --------------------------

									// ADMIN || GOD ACCOUNT = ALL ORG SELECTION --------
									if($_SESSION['ActiveUser']['user_type_id'] == 999){
										$ResultArray_ORGS			= $obj_Member->GetOrganizations('system_all');
									
									// ALL OTHERS --------------------------------------
									}else{
										$ResultArray_ORGS			= $obj_Member->GetOrganizations('organization');
									}

									foreach($ResultArray_ORGS as $_ORGS_KEY){
                 		$_ORGS_NAME		= ucwords($_ORGS_KEY['name']);
                 		$_ORGS_ID			= $_ORGS_KEY['id'];
                 		echo '<option value="'.$_ORGS_ID.'" '.($_SESSION['ActiveUser']['organization_id'] == $_ORGS_ID ? 'selected':'').' >'.$_ORGS_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.organization_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->




		
	    </table>


                <?
                	// security token ----------------------------------
                	$_SESSION['ActiveUser']['TransactionToken'] 						= $obj_Member->Encrypt(md5(uniqid(rand(), true)), 'private');
                	$_SESSION['ActiveUser']['TransactionTokenExpiration'] 	= $obj_Member->Encrypt((time() + 240), 'private');                             //Expiration = 4 minutes (240 seconds)
                	$_SESSION['ActiveUser']['TransactionAgentSignature']		= $obj_Member->Encrypt($_SESSION['ActiveUser']['userid'], 'private');
                	// -------------------------------------------------
                ?>
								<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionToken']; ?>" name="form_resources_vendor_new.vendor._token" id="form_resources_vendor_new.vendor._token" />
    						<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionTokenExpiration']; ?>" name="form_resources_vendor_new.vendor._token_expiration" id="form_resources_vendor_new.vendor._token_expiration" />
    						<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionAgentSignature']; ?>" name="form_resources_vendor_new.vendor._agent_signature" id="form_resources_vendor_new.vendor._agent_signature" />
								
								<input type="hidden" value="vendor" name="form_resources_vendor_new.vendor._table" id="form_resources_vendor_new.vendor._table" />









		<!-- PROCESS -->
		<div id="panel_control_process" style="position: absolute; left: 0px; bottom: 0px; width: 450px; height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: normal; border: 0px solid #760000;">

			<!-- title -->
			<div id="panel_title" style="height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: bold;">

			<div style="position: absolute; top: 4px; left: 6px;"><h2 style="color: #ffffff;">Process</h2></div>

				<div style="position: absolute; top: 7px; right: 6px;">
    			<input type="button" id="form_resources_vendor_new.vendor.submit" tabindex="10" value="Add Vendor" class="formControl_button_submit" onclick="SM_Form_Submit('form_resources_vendor_new');" /><br>
				</div>

			</div>
			<!-- END title -->
		</div>
		<!-- END PROCESS -->

		</form> <!-- ADD HUMAN RESOURCE -->




		</div>
		<!-- END HUMAN RESOURCE PANEL -->




























	</div>
<!-- END TRANSACTION PANEL -->

