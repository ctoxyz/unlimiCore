
<!-- SM JS lib -->
	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.FORMS.uncompressed.js"></script>'; ?>
<!-- END SM JS lib -->

<!-- SM CSS lib -->
	<? echo '<link rel="stylesheet" type="text/css" href="http://'.$_SERVER['SERVER_NAME'].'/common/css/SM.forms/SM.css.FORMS.css" />'; ?>
<!-- END SM CSS lib -->


inc.form.signup


	<!-- container.start -->
	<div id="cont-maincontent" style="padding: 10px; text-align: left; height: auto; z-index: 10; border: 1px solid #00d2ff;">

     			<form action="#" method="post" enctype="multipart/form-data" name="form_signup" id="form_signup">

     			<table class="form_signup" cellpadding="0" cellspacing="0" border="0" width="100%">

    				<!-- email address form element -->
    				<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;eMail Address
    					</td>

          		<td class="form_input_td">
          			<input id="lead.user.email_addr" tabindex="1" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'eMail Address');" onclick="clickclear(this, 'eMail Address')" onfocus="clickclear(this, 'eMail Address')" onKeyUp="" value="eMail Address" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.email_addr"></div></b>
              </td>
    				</tr>
    				<!-- END email address form element -->

    				<!-- password form element -->
						<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;Password
    					</td>

          		<td>
          			<input id="lead.user.password" tabindex="2" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Password');" onclick="clickclear(this, 'Password')" onfocus="clickclear(this, 'Password')" onKeyUp="" value="Password" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.password"></div></b>
              </td>
            </tr>
    				<!-- END password form element -->

    				<!-- phone form element -->
    				<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;Phone
    					</td>

          		<td>
          			<input id="lead.user.phone" tabindex="2" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Phone');" onclick="clickclear(this, 'Phone')" onfocus="clickclear(this, 'Phone')" onKeyUp="" value="Phone" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.phone"></div></b>
              </td>
    				</tr>
    				<!-- END phone form element -->

    				<!-- username form element -->
    				<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;User Name
    					</td>

          		<td>
          			<input id="lead.user.username" tabindex="2" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'User Name');" onclick="clickclear(this, 'User Name')" onfocus="clickclear(this, 'User Name')" onKeyUp="" value="User Name" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.username"></div></b>
              </td>
    				</tr>
    				<!-- END username form element -->

    				<!-- credit card form element -->
    				<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;Credit Card
    					</td>

          		<td>
          			<input id="lead.user.cc_number" tabindex="2" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Credit Card');" onclick="clickclear(this, 'Credit Card')" onfocus="clickclear(this, 'Credit Card')" onKeyUp="" value="Credit Card" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.cc_number"></div></b>
              </td>
    				</tr>
    				<!-- END credit card form element -->

    				<!-- zipcode form element -->
    				<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;ZIP Code
    					</td>

          		<td>
          			<input id="lead.user.zipcode" tabindex="2" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'ZIP Code');" onclick="clickclear(this, 'ZIP Code')" onfocus="clickclear(this, 'ZIP Code')" onKeyUp="" value="ZIP Code" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.zipcode"></div></b>
              </td>
    				</tr>
    				<!-- END zipcode form element -->

    				<!-- ssn form element -->
    				<tr>
    					<td class="form_label">
    						&nbsp;&nbsp;SSN
    					</td>

          		<td>
          			<input id="lead.user.ssn" tabindex="2" size="25" maxlength="50" type="text" class="form_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'SSN');" onclick="clickclear(this, 'ZSSN')" onfocus="clickclear(this, 'SSN')" onKeyUp="" value="SSN" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.ssn"></div></b>
              </td>
    				</tr>
    				<!-- END ssn form element -->

    				<!-- submit form element -->
    				<tr>
    					<td width="100" height="30" colspan="3" align="left">
    						<font size="1" face="arial" color="white">
    							<b>By clicking 'Register' you agree to the <br><a href="terms-of-service" target="_new">Terms of Service</a> and the <a href="our-privacy-policy" target="_new">Privacy Policy</a></b>
    						</font>
    					</td>

    					<td>
    						<!-- <input type="hidden" value='member-Create' name="_function" id="_function"/> -->
								<input type="hidden" value="<? echo $_SESSION['NewUser']['SignUpToken']; ?>" name="signup_Token" />
    						<input type="hidden" value="<? echo $_SESSION['NewUser']['SignUpTokenExpiration']; ?>" name="signup_TokenExpiration" />

    						<input type="button" id="lead.user.submit" tabindex="11" value="Submit" class="form_button_submit" onclick="SM_Form_Submit('form_signup');" /><br>
								
								</form>
             		<script type="text/javascript">
             			//document.getElementById('lead.user.submit').disabled 	= true;
									//SM_Form_VerifyComplete();
             		</script>

              </td>
    				</tr>
    				<!-- END submit form element -->



     		</table>


	</div>
	<!-- container.start -->
