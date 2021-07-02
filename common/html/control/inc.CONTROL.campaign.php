<!-- CAMPAIGN.CONTROL -->






					<form name='form_campaign'>

					<table>
     		    <!-- date range element -->
           	<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;Date Start
    					</td>

           		<td height="25">
							<table>
								<tr>
									<td>
               			<select name="form_campaign.client_campaign.date_start_month" id="form_campaign.client_campaign.date_start_month" onchange="SM_Report_Update('form_activity', 'user_session_activity.report', 'ts:desc'); SM_Chart_Update('form_activity', 'user_session_activity.chart', 'ts:desc', 'user_session_activity.chart');" class="formControl_inputSelect" tabindex="1">
               				<option id="form_campaign.client_campaign.date_start_month-jan" value="01" <? echo (date('m',time()-8035200) == '01'?'selected':''); ?>>Jan</option> 
               				<option id="form_campaign.client_campaign.date_start_month-feb" value="02" <? echo (date('m',time()-8035200) == '02'?'selected':''); ?>>Feb</option> 
               				<option id="form_campaign.client_campaign.date_start_month-march" value="03" <? echo (date('m',time()-8035200) == '03'?'selected':''); ?>>Mar</option> 
               				<option id="form_campaign.client_campaign.date_start_month-april" value="04" <? echo (date('m',time()-8035200) == '04'?'selected':''); ?>>Apr</option> 
               				<option id="form_campaign.client_campaign.date_start_month-may" value="05" <? echo (date('m',time()-8035200) == '05'?'selected':''); ?>>May</option> 
               				<option id="form_campaign.client_campaign.date_start_month-june" value="06" <? echo (date('m',time()-8035200) == '06'?'selected':''); ?>>Jun</option> 
               				<option id="form_campaign.client_campaign.date_start_month-july" value="07" <? echo (date('m',time()-8035200) == '07'?'selected':''); ?>>Jul</option> 
               				<option id="form_campaign.client_campaign.date_start_month-august" value="08" <? echo (date('m',time()-8035200) == '08'?'selected':''); ?>>Aug</option> 
               				<option id="form_campaign.client_campaign.date_start_month-sep" value="09" <? echo (date('m',time()-8035200) == '09'?'selected':''); ?>>Sep</option> 
               				<option id="form_campaign.client_campaign.date_start_month-oct" value="10" <? echo (date('m',time()-8035200) == '10'?'selected':''); ?>>Oct</option> 
               				<option id="form_campaign.client_campaign.date_start_month-nov" value="11" <? echo (date('m',time()-8035200) == '11'?'selected':''); ?>>Nov</option> 
               				<option id="form_campaign.client_campaign.date_start_month-dec" value="12" <? echo (date('m',time()-8035200) == '12'?'selected':''); ?>>Dec</option> 
               			</select>
               		</td>
									<td>
               			<select name="form_campaign.client_campaign.date_start_day" id="form_campaign.client_campaign.date_start_day" disabled onchange="SM_Report_Update('form_activity', 'user_session_activity.report', 'ts:desc'); SM_Chart_Update('form_activity', 'user_session_activity.chart', 'ts:desc', 'user_session_activity.chart');" class="formControl_inputSelect" tabindex="2">
               				<option id="form_campaign.client_campaign.date_start_day-1" value="01" selected>1</option>
               			</select>
               		</td>
									<td>
          			   		<select name="form_campaign.client_campaign.date_start_year" id="form_campaign.client_campaign.date_start_year" onchange="SM_Report_Update('form_activity', 'user_session_activity.report', 'ts:desc'); SM_Chart_Update('form_activity', 'user_session_activity.chart', 'ts:desc', 'user_session_activity.chart');" class="formControl_inputSelect" tabindex="3">
											 <option value="2014" id="form_campaign.client_campaign.date_start_year-2014" <? echo (date('Y',time()) == '2014'?'selected':''); ?>>2014</option>
											 <option value="2013" id="form_campaign.client_campaign.date_start_year-2013" <? echo (date('Y',time()) == '2013'?'selected':''); ?>>2013</option>
											 <option value="2012" id="form_campaign.client_campaign.date_start_year-2012" <? echo (date('Y',time()) == '2012'?'selected':''); ?>>2012</option>
											 <option value="2011" id="form_campaign.client_campaign.date_start_year-2011" <? echo (date('Y',time()) == '2011'?'selected':''); ?>>2011</option>
              				 <option value="2010" id="form_campaign.client_campaign.date_start_year-2010" <? echo (date('Y',time()) == '2010'?'selected':''); ?>>2010</option>
              				 <option value="2009" id="form_campaign.client_campaign.date_start_year-2009" <? echo (date('Y',time()) == '2009'?'selected':''); ?>>2009</option>
              				 <option value="2008" id="form_campaign.client_campaign.date_start_year-2008" <? echo (date('Y',time()) == '2008'?'selected':''); ?>>2008</option>
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
           	<!-- date range element -->


     		    <!-- date range element -->
           	<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;Date End
    					</td>



           		<td height="25">
							<table>
								<tr>
									<td>
               			<select name="form_campaign.client_campaign.date_end_month" id="form_campaign.client_campaign.date_end_month" onchange="SM_Report_Update('form_activity', 'user_session_activity.report', 'ts:desc'); SM_Chart_Update('form_activity', 'user_session_activity.chart', 'ts:desc', 'user_session_activity.chart');" class="formControl_inputSelect" tabindex="1">
               				<option id="form_campaign.client_campaign.date_end_month-jan" value="01" <? echo (date('m',time()+8035200) == '01'?'selected':''); ?>>Jan</option> 
               				<option id="form_campaign.client_campaign.date_end_month-feb" value="02" <? echo (date('m',time()+8035200) == '02'?'selected':''); ?>>Feb</option> 
               				<option id="form_campaign.client_campaign.date_end_month-march" value="03" <? echo (date('m',time()+8035200) == '03'?'selected':''); ?>>Mar</option> 
               				<option id="form_campaign.client_campaign.date_end_month-april" value="04" <? echo (date('m',time()+8035200) == '04'?'selected':''); ?>>Apr</option> 
               				<option id="form_campaign.client_campaign.date_end_month-may" value="05" <? echo (date('m',time()+8035200) == '05'?'selected':''); ?>>May</option> 
               				<option id="form_campaign.client_campaign.date_end_month-june" value="06" <? echo (date('m',time()+8035200) == '06'?'selected':''); ?>>Jun</option> 
               				<option id="form_campaign.client_campaign.date_end_month-july" value="07" <? echo (date('m',time()+8035200) == '07'?'selected':''); ?>>Jul</option> 
               				<option id="form_campaign.client_campaign.date_end_month-august" value="08" <? echo (date('m',time()+8035200) == '08'?'selected':''); ?>>Aug</option> 
               				<option id="form_campaign.client_campaign.date_end_month-sep" value="09" <? echo (date('m',time()+8035200) == '09'?'selected':''); ?>>Sep</option> 
               				<option id="form_campaign.client_campaign.date_end_month-oct" value="10" <? echo (date('m',time()+8035200) == '10'?'selected':''); ?>>Oct</option> 
               				<option id="form_campaign.client_campaign.date_end_month-nov" value="11" <? echo (date('m',time()+8035200) == '11'?'selected':''); ?>>Nov</option> 
               				<option id="form_campaign.client_campaign.date_end_month-dec" value="12" <? echo (date('m',time()+8035200) == '12'?'selected':''); ?>>Dec</option> 
               			</select>
               		</td>
									<td>
               			<select name="form_campaign.client_campaign.date_end_day" id="form_campaign.client_campaign.date_end_day" disabled onchange="SM_Report_Update('form_activity', 'user_session_activity.report', 'ts:desc'); SM_Chart_Update('form_activity', 'user_session_activity.chart', 'ts:desc', 'user_session_activity.chart');" class="formControl_inputSelect" tabindex="2">
               				<option id="form_campaign.client_campaign.date_end_day-1" value="01" selected>1</option>
               			</select>
               		</td>
									<td>
          			   		<select name="form_campaign.client_campaign.date_end_year" id="form_campaign.client_campaign.date_end_year" onchange="SM_Report_Update('form_activity', 'user_session_activity.report', 'ts:desc'); SM_Chart_Update('form_activity', 'user_session_activity.chart', 'ts:desc', 'user_session_activity.chart');" class="formControl_inputSelect" tabindex="3">
											 <option value="2014" id="form_campaign.client_campaign.date_end_year-2014" <? echo (date('Y',time()) == '2014'?'selected':''); ?>>2014</option>
											 <option value="2013" id="form_campaign.client_campaign.date_end_year-2013" <? echo (date('Y',time()) == '2013'?'selected':''); ?>>2013</option>
											 <option value="2012" id="form_campaign.client_campaign.date_end_year-2012" <? echo (date('Y',time()) == '2012'?'selected':''); ?>>2012</option>
											 <option value="2011" id="form_campaign.client_campaign.date_end_year-2011" <? echo (date('Y',time()) == '2011'?'selected':''); ?>>2011</option>
              				 <option value="2010" id="form_campaign.client_campaign.date_end_year-2010" <? echo (date('Y',time()) == '2010'?'selected':''); ?>>2010</option>
              				 <option value="2009" id="form_campaign.client_campaign.date_end_year-2009" <? echo (date('Y',time()) == '2009'?'selected':''); ?>>2009</option>
              				 <option value="2008" id="form_campaign.client_campaign.date_end_year-2008" <? echo (date('Y',time()) == '2008'?'selected':''); ?>>2008</option>
               			</select>
            				</td>
            			</tr>
           		</table>
           		</td>


           		<td width="5">
           		</td>
 
     					<td>
               	<font color="#BC0101"><b><div id="VALIDATIONRESPONSE.date_end"></div></b>
               </td>
           	</tr>
           	<!-- date range element -->




</table>

</form>