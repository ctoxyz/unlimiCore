
<!-- SM JS lib -->
	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.FORMS.uncompressed.js"></script>'; ?>
<!-- END SM JS lib -->

<!-- SM CSS lib -->
	<? echo '<link rel="stylesheet" type="text/css" href="http://'.$_SERVER['SERVER_NAME'].'/common/css/SM.forms/SM.css.FORMS.css" />'; ?>
<!-- END SM CSS lib -->






     			<form action="#" method="post" enctype="multipart/form-data" name="form_transaction_new" id="form_transaction_new">

     			<table class="form_transaction_new" cellpadding="0" cellspacing="0" border="0" width="100%">


     		    <!-- date range element -->
<!--
           	<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;Date Start
    					</td>

           		<td height="25">
							<table>
								<tr>
									<td>
               			<select name="form_transaction_new.booking.date_start_month" id="form_transaction_new.booking.date_start_month" class="form_input" tabindex="1">
               				<option id="form_transaction_new.booking.date_start_month-jan" value="1" selected>Jan</option> 
               				<option id="form_transaction_new.booking.date_start_month-feb" value="2">Feb</option> 
               				<option id="form_transaction_new.booking.date_start_month-march" value="3">Mar</option> 
               				<option id="form_transaction_new.booking.date_start_month-april" value="4">Apr</option> 
               				<option id="form_transaction_new.booking.date_start_month-may" value="5">May</option> 
               				<option id="form_transaction_new.booking.date_start_month-june" value="6">Jun</option> 
               				<option id="form_transaction_new.booking.date_start_month-july" value="7">Jul</option> 
               				<option id="form_transaction_new.booking.date_start_month-august" value="8">Aug</option> 
               				<option id="form_transaction_new.booking.date_start_month-sep" value="9">Sep</option> 
               				<option id="form_transaction_new.booking.date_start_month-oct" value="10">Oct</option> 
               				<option id="form_transaction_new.booking.date_start_month-nov" value="11">Nov</option> 
               				<option id="form_transaction_new.booking.date_start_month-dec" value="12">Dec</option> 
               			</select>
               		</td>
									<td>
               			<select name="form_transaction_new.booking.date_start_day" id="form_transaction_new.booking.date_start_day" class="form_input" tabindex="2">
               				<option id="form_transaction_new.booking.date_start_day-1" value="1" selected>1</option>
               				<option id="form_transaction_new.booking.date_start_day-2" value="2">2</option>
               				<option id="form_transaction_new.booking.date_start_day-3" value="3">3</option>
               				<option id="form_transaction_new.booking.date_start_day-4" value="4">4</option>
               				<option id="form_transaction_new.booking.date_start_day-5" value="5">5</option>
               				<option id="form_transaction_new.booking.date_start_day-6" value="6">6</option>
               				<option id="form_transaction_new.booking.date_start_day-7" value="7">7</option>
               				<option id="form_transaction_new.booking.date_start_day-8" value="8">8</option>
               				<option id="form_transaction_new.booking.date_start_day-9" value="9">9</option>
               				<option id="form_transaction_new.booking.date_start_day-10" value="10">10</option>
               				<option id="form_transaction_new.booking.date_start_day-11" value="11">11</option>
               				<option id="form_transaction_new.booking.date_start_day-12" value="12">12</option>
               				<option id="form_transaction_new.booking.date_start_day-13" value="13">13</option>
               				<option id="form_transaction_new.booking.date_start_day-14" value="14">14</option>
               				<option id="form_transaction_new.booking.date_start_day-15" value="15">15</option>
               				<option id="form_transaction_new.booking.date_start_day-16" value="16">16</option>
               				<option id="form_transaction_new.booking.date_start_day-17" value="17">17</option>
               				<option id="form_transaction_new.booking.date_start_day-18" value="18">18</option>
               				<option id="form_transaction_new.booking.date_start_day-19" value="19">19</option>
               				<option id="form_transaction_new.booking.date_start_day-20" value="20">20</option>
               				<option id="form_transaction_new.booking.date_start_day-21" value="21">21</option>
               				<option id="form_transaction_new.booking.date_start_day-22" value="22">22</option>
               				<option id="form_transaction_new.booking.date_start_day-23" value="23">23</option>
               				<option id="form_transaction_new.booking.date_start_day-24" value="24">24</option>
               				<option id="form_transaction_new.booking.date_start_day-25" value="25">25</option>
               				<option id="form_transaction_new.booking.date_start_day-26" value="26">26</option>
               				<option id="form_transaction_new.booking.date_start_day-27" value="27">27</option>
               				<option id="form_transaction_new.booking.date_start_day-28" value="27">28</option>
               				<option id="form_transaction_new.booking.date_start_day-29" value="29">29</option>
               				<option id="form_transaction_new.booking.date_start_day-30" value="30">30</option>
               				<option id="form_transaction_new.booking.date_start_day-31" value="31">31</option>
               			</select>
               		</td>
									<td>
          			   		<select name="form_transaction_new.booking.date_start_year" id="form_transaction_new.booking.date_start_year" class="form_input" tabindex="3">
              				 <option value="2006" id="form_transaction_new.booking.date_start_year-2006" selected>2006</option>
              				 <option value="2005" id="form_transaction_new.booking.date_start_year-2005">2005</option>
              				 <option value="2004" id="form_transaction_new.booking.date_start_year-2004">2004</option>
              				 <option value="2003" id="form_transaction_new.booking.date_start_year-2003">2003</option>
              				 <option value="2002" id="form_transaction_new.booking.date_start_year-2002">2002</option>
              				 <option value="2001" id="form_transaction_new.booking.date_start_year-2001">2001</option>
              				 <option value="2000" id="form_transaction_new.booking.date_start_year-2000">2000</option>
               			</select>
            				</td>
            			</tr>
           		</table>
           		</td>

           		<td width="5">
           		</td>
 
     					<td>
               	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.date_start"></div></b>
               </td>
           	</tr>
           	-->
           	<!-- date range element -->










    				<!-- form element -->
<!--
						<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;Password
    					</td>

          		<td>
          			<input id="form_transaction_new.booking.password" tabindex="2" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Password');" onclick="clickclear(this, 'Password')" onfocus="clickclear(this, 'Password')" onKeyUp="" value="Password" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.password"></div></b>
              </td>
            </tr>
-->
    				<!-- END form element -->

    				<!-- form element -->
<!--
    				<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;Phone
    					</td>

          		<td>
          			<input id="form_transaction_new.booking.phone" tabindex="2" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Phone');" onclick="clickclear(this, 'Phone')" onfocus="clickclear(this, 'Phone')" onKeyUp="" value="Phone" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.phone"></div></b>
              </td>
    				</tr>
-->
    				<!-- END form element -->

    				<!-- form element -->
<!--
    				<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;Username
    					</td>

          		<td>
          			<input id="form_transaction_new.booking.username" tabindex="2" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Display Name');" onclick="clickclear(this, 'Display Name')" onfocus="clickclear(this, 'Display Name')" onKeyUp="" value="Display Name" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.username"></div></b>
              </td>
    				</tr>
-->
    				<!-- END form element -->

    				<!-- form element -->
<!--
    				<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;Credit Card
    					</td>

          		<td>
          			<input id="form_transaction_new.booking.cc_number" tabindex="2" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Credit Card');" onclick="clickclear(this, 'Credit Card')" onfocus="clickclear(this, 'Credit Card')" onKeyUp="" value="Credit Card" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.cc_number"></div></b>
              </td>
    				</tr>
-->
    				<!-- END form element -->



    				<!-- form element -->
    				<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;First Name
    					</td>

          		<td>
          			<input id="form_transaction_new.booking.first_name" tabindex="1" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'First Name');" onclick="clickclear(this, 'First Name')" onfocus="clickclear(this, 'First Name')" onKeyUp="" value="First Name" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.first_name"></div></b>
              </td>
    				</tr>
    				<!-- END form element -->


    				<!-- form element -->
    				<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;Last Name
    					</td>

          		<td>
          			<input id="form_transaction_new.booking.last_name" tabindex="2" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Last Name');" onclick="clickclear(this, 'Last Name')" onfocus="clickclear(this, 'Last Name')" onKeyUp="" value="Last Name" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.last_name"></div></b>
              </td>
    				</tr>
    				<!-- END form element -->

    				<!-- form element -->
    				<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;eMail Address
    					</td>

          		<td class="form_input_td">
          			<input id="form_transaction_new.booking.email_addr" tabindex="3" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'eMail Address');" onclick="clickclear(this, 'eMail Address')" onfocus="clickclear(this, 'eMail Address')" onKeyUp="" value="eMail Address" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.email_addr"></div></b>
              </td>
    				</tr>
    				<!-- END form element -->

    				<!-- form element -->
<!--
    				<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;ZIP Code
    					</td>

          		<td>
          			<input id="form_transaction_new.booking.zipcode" tabindex="2" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'ZIP Code');" onclick="clickclear(this, 'ZIP Code')" onfocus="clickclear(this, 'ZIP Code')" onKeyUp="" value="ZIP Code" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.zipcode"></div></b>
              </td>
    				</tr>
-->
    				<!-- END form element -->

    				<!-- form element -->
<!--
    				<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;SSN
    					</td>

          		<td>
          			<input id="form_transaction_new.booking.ssn" tabindex="2" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'SSN');" onclick="clickclear(this, 'ZSSN')" onfocus="clickclear(this, 'SSN')" onKeyUp="" value="SSN" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.ssn"></div></b>
              </td>
    				</tr>
-->
    				<!-- END form element -->



    				<!-- select/dropdown form element -->
						<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;Client
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.client_id" id="form_transaction_new.booking.client_id" tabindex="4" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="form_input">
          				<option value="nan">Select a Client</option>
                 <?

  								// get data --------------------------
									//$ResultArray_Clients			= $obj_Member->GetDataRecords('client', 'multi', null, 0);
									$ResultArray_Clients			= $obj_Member->GetClients('organization');


									foreach($ResultArray_Clients as $_Clients_KEY){
                 		$_Clients_NAME		= ucwords($_Clients_KEY['name']);
                 		$_Clients_ID			= $_Clients_KEY['id'];
                 		echo '<option value="'.$_Clients_ID.'">'.$_Clients_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.client_id"></div></b>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->



    				<!-- select/dropdown form element -->
						<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;Sales Person
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.sales_person_id" id="form_transaction_new.booking.sales_person_id" tabindex="5" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="form_input">
          				<option value="nan">Select a Sales Person</option>
                 <?
	 								// get data --------------------------

									$ResultArray_SalesPeople			= $obj_Member->GetHumanCapital('organization');
									
									foreach($ResultArray_SalesPeople as $_SalesPeople_KEY){
										
										$_UserType						=	$obj_Member->UserID_to_UserType($_SalesPeople_KEY['userid']);
										
                 		$_SalesPeople_NAME		= '('.strtoupper($_UserType->user_type_abbreviation).') '.ucwords($_SalesPeople_KEY['first_name'].' '.$_SalesPeople_KEY['last_name']);
                 		$_SalesPeople_ID			= $_SalesPeople_KEY['userid'];
                 		echo '<option value="'.$_SalesPeople_ID.'">'.$_SalesPeople_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.sales_person_id" style="font-color: #BC0101; font-weight: bold;"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->







    				<!-- submit form element -->
    				<tr>

    					<td width="100" height="30" colspan="3" align="left">
    				<!--
    						<font size="1" face="arial" color="white">
    							<b>By clicking 'Register' you agree to the <br><a href="terms-of-service" target="_new">Terms of Service</a> and the <a href="our-privacy-policy" target="_new">Privacy Policy</a></b>
    						</font>
						-->
    					</td>

    					<td>
    						<!-- <input type="hidden" value='member-Create' name="_function" id="_function"/> -->
                <?
                	// security token ----------------------------------
                	$_SESSION['ActiveUser']['TransactionToken'] 						= $obj_Member->Encrypt(md5(uniqid(rand(), true)), 'private');
                	$_SESSION['ActiveUser']['TransactionTokenExpiration'] 	= $obj_Member->Encrypt((time() + 240), 'private');                             //Expiration = 4 minutes (240 seconds)
                	$_SESSION['ActiveUser']['TransactionAgentSignature']		= $obj_Member->Encrypt($_SESSION['ActiveUser']['userid'], 'private');
                	// -------------------------------------------------
                ?>
								<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionToken']; ?>" name="form_transaction_new.booking._token" id="form_transaction_new.booking._token" />
    						<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionTokenExpiration']; ?>" name="form_transaction_new.booking._token_expiration" id="form_transaction_new.booking._token_expiration" />
    						<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionAgentSignature']; ?>" name="form_transaction_new.booking._agent_signature" id="form_transaction_new.booking._agent_signature" />
								
								<input type="hidden" value="booking" name="form_transaction_new.booking._table" id="form_transaction_new.booking._table" />

    						<input type="button" id="lead.booking.submit" tabindex="11" value="Submit" class="form_button_submit" onclick="SM_Form_Submit('form_transaction_new');" /><br>
								
								</form>
             		<script type="text/javascript">
             			//document.getElementById('lead.booking.submit').disabled 	= true;
									//SM_Form_VerifyComplete();
             		</script>

              </td>
    				</tr>
    				<!-- END submit form element -->



     		</table>

