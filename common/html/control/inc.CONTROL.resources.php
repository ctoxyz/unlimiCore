
<!--
                    <form name='frmUpdate'>
                       <input type='button' value='Change Data' onClick="SM_Chart_Update('chart.jmcrm', 'userid:asc', 'chart1Id');" name='btnUpdate'>

                       <input type='button' value='JS TEST' onClick="SM_Report_Update_TEST();" name='btnUpdate'>
                    </form>
-->										
										
										


					<form name='form_resources'>

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
               			<select name="form_resources.user_session_activity.date_start_month" id="form_resources.user_session_activity.date_start_month" onchange="SM_Report_Update('form_resources', 'human_resource.report', 'userid:asc'); SM_Chart_Update('form_resources', 'user_session_activity.chart', 'userid:asc', 'user_session_activity.chart');" class="formControl_inputSelect" tabindex="1">
               				<option id="form_resources.user_session_activity.date_start_month-jan" value="01">Jan</option> 
               				<option id="form_resources.user_session_activity.date_start_month-feb" value="02">Feb</option> 
               				<option id="form_resources.user_session_activity.date_start_month-march" value="03">Mar</option> 
               				<option id="form_resources.user_session_activity.date_start_month-april" value="04">Apr</option> 
               				<option id="form_resources.user_session_activity.date_start_month-may" value="05">May</option> 
               				<option id="form_resources.user_session_activity.date_start_month-june" value="06">Jun</option> 
               				<option id="form_resources.user_session_activity.date_start_month-july" value="07">Jul</option> 
               				<option id="form_resources.user_session_activity.date_start_month-august" value="08" selected>Aug</option> 
               				<option id="form_resources.user_session_activity.date_start_month-sep" value="09">Sep</option> 
               				<option id="form_resources.user_session_activity.date_start_month-oct" value="10">Oct</option> 
               				<option id="form_resources.user_session_activity.date_start_month-nov" value="11">Nov</option> 
               				<option id="form_resources.user_session_activity.date_start_month-dec" value="12">Dec</option> 
               			</select>
               		</td>
									<td>
               			<select name="form_resources.user_session_activity.date_start_day" id="form_resources.user_session_activity.date_start_day" onchange="SM_Report_Update('form_resources', 'human_resource.report', 'userid:asc'); SM_Chart_Update('form_resources', 'user_session_activity.chart', 'userid:asc', 'user_session_activity.chart');" class="formControl_inputSelect" tabindex="2">
               				<option id="form_resources.user_session_activity.date_start_day-1" value="01" selected>1</option>
               				<option id="form_resources.user_session_activity.date_start_day-2" value="02">2</option>
               				<option id="form_resources.user_session_activity.date_start_day-3" value="03">3</option>
               				<option id="form_resources.user_session_activity.date_start_day-4" value="04">4</option>
               				<option id="form_resources.user_session_activity.date_start_day-5" value="05">5</option>
               				<option id="form_resources.user_session_activity.date_start_day-6" value="06">6</option>
               				<option id="form_resources.user_session_activity.date_start_day-7" value="07">7</option>
               				<option id="form_resources.user_session_activity.date_start_day-8" value="08">8</option>
               				<option id="form_resources.user_session_activity.date_start_day-9" value="09">9</option>
               				<option id="form_resources.user_session_activity.date_start_day-10" value="10">10</option>
               				<option id="form_resources.user_session_activity.date_start_day-11" value="11">11</option>
               				<option id="form_resources.user_session_activity.date_start_day-12" value="12">12</option>
               				<option id="form_resources.user_session_activity.date_start_day-13" value="13">13</option>
               				<option id="form_resources.user_session_activity.date_start_day-14" value="14" selected>14</option>
               				<option id="form_resources.user_session_activity.date_start_day-15" value="15">15</option>
               				<option id="form_resources.user_session_activity.date_start_day-16" value="16">16</option>
               				<option id="form_resources.user_session_activity.date_start_day-17" value="17">17</option>
               				<option id="form_resources.user_session_activity.date_start_day-18" value="18">18</option>
               				<option id="form_resources.user_session_activity.date_start_day-19" value="19">19</option>
               				<option id="form_resources.user_session_activity.date_start_day-20" value="20">20</option>
               				<option id="form_resources.user_session_activity.date_start_day-21" value="21">21</option>
               				<option id="form_resources.user_session_activity.date_start_day-22" value="22">22</option>
               				<option id="form_resources.user_session_activity.date_start_day-23" value="23">23</option>
               				<option id="form_resources.user_session_activity.date_start_day-24" value="24">24</option>
               				<option id="form_resources.user_session_activity.date_start_day-25" value="25">25</option>
               				<option id="form_resources.user_session_activity.date_start_day-26" value="26">26</option>
               				<option id="form_resources.user_session_activity.date_start_day-27" value="27">27</option>
               				<option id="form_resources.user_session_activity.date_start_day-28" value="27">28</option>
               				<option id="form_resources.user_session_activity.date_start_day-29" value="29">29</option>
               				<option id="form_resources.user_session_activity.date_start_day-30" value="30">30</option>
               				<option id="form_resources.user_session_activity.date_start_day-31" value="31">31</option>
               			</select>
               		</td>
									<td>
          			   		<select name="form_resources.user_session_activity.date_start_year" id="form_resources.user_session_activity.date_start_year" onchange="SM_Report_Update('form_resources', 'human_resource.report', 'userid:asc'); SM_Chart_Update('form_resources', 'user_session_activity.chart', 'userid:asc', 'user_session_activity.chart');" class="formControl_inputSelect" tabindex="3">
											 <option value="2014" id="form_resources.user_session_activity.date_start_year-2014">2014</option>
											 <option value="2013" id="form_resources.user_session_activity.date_start_year-2013">2013</option>
											 <option value="2012" id="form_resources.user_session_activity.date_start_year-2012">2012</option>
											 <option value="2011" id="form_resources.user_session_activity.date_start_year-2011">2011</option>
              				 <option value="2010" id="form_resources.user_session_activity.date_start_year-2010"selected>2010</option>
              				 <option value="2009" id="form_resources.user_session_activity.date_start_year-2009">2009</option>
              				 <option value="2008" id="form_resources.user_session_activity.date_start_year-2008">2008</option>
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
               			<select name="form_resources.user_session_activity.date_end_month" id="form_resources.user_session_activity.date_end_month" onchange="SM_Report_Update('form_resources', 'human_resource.report', 'userid:asc'); SM_Chart_Update('form_resources', 'user_session_activity.chart', 'userid:asc', 'user_session_activity.chart');" class="formControl_inputSelect" tabindex="1">
               				<option id="form_resources.user_session_activity.date_end_month-jan" value="01">Jan</option> 
               				<option id="form_resources.user_session_activity.date_end_month-feb" value="02">Feb</option> 
               				<option id="form_resources.user_session_activity.date_end_month-march" value="03">Mar</option> 
               				<option id="form_resources.user_session_activity.date_end_month-april" value="04">Apr</option> 
               				<option id="form_resources.user_session_activity.date_end_month-may" value="05">May</option> 
               				<option id="form_resources.user_session_activity.date_end_month-june" value="06">Jun</option> 
               				<option id="form_resources.user_session_activity.date_end_month-july" value="07">Jul</option> 
               				<option id="form_resources.user_session_activity.date_end_month-august" value="08" selected>Aug</option> 
               				<option id="form_resources.user_session_activity.date_end_month-sep" value="09">Sep</option> 
               				<option id="form_resources.user_session_activity.date_end_month-oct" value="10">Oct</option> 
               				<option id="form_resources.user_session_activity.date_end_month-nov" value="11">Nov</option> 
               				<option id="form_resources.user_session_activity.date_end_month-dec" value="12">Dec</option> 
               			</select>
               		</td>
									<td>
               			<select name="form_resources.user_session_activity.date_end_day" id="form_resources.user_session_activity.date_end_day" onchange="SM_Report_Update('form_resources', 'human_resource.report', 'userid:asc'); SM_Chart_Update('form_resources', 'user_session_activity.chart', 'userid:asc', 'user_session_activity.chart');" class="formControl_inputSelect" tabindex="2">
               				<option id="form_resources.user_session_activity.date_end_day-1" value="01" selected>1</option>
               				<option id="form_resources.user_session_activity.date_end_day-2" value="02">2</option>
               				<option id="form_resources.user_session_activity.date_end_day-3" value="03">3</option>
               				<option id="form_resources.user_session_activity.date_end_day-4" value="04">4</option>
               				<option id="form_resources.user_session_activity.date_end_day-5" value="05">5</option>
               				<option id="form_resources.user_session_activity.date_end_day-6" value="06">6</option>
               				<option id="form_resources.user_session_activity.date_end_day-7" value="07">7</option>
               				<option id="form_resources.user_session_activity.date_end_day-8" value="08">8</option>
               				<option id="form_resources.user_session_activity.date_end_day-9" value="09">9</option>
               				<option id="form_resources.user_session_activity.date_end_day-10" value="10">10</option>
               				<option id="form_resources.user_session_activity.date_end_day-11" value="11">11</option>
               				<option id="form_resources.user_session_activity.date_end_day-12" value="12">12</option>
               				<option id="form_resources.user_session_activity.date_end_day-13" value="13">13</option>
               				<option id="form_resources.user_session_activity.date_end_day-14" value="14">14</option>
               				<option id="form_resources.user_session_activity.date_end_day-15" value="15">15</option>
               				<option id="form_resources.user_session_activity.date_end_day-16" value="16">16</option>
               				<option id="form_resources.user_session_activity.date_end_day-17" value="17">17</option>
               				<option id="form_resources.user_session_activity.date_end_day-18" value="18">18</option>
               				<option id="form_resources.user_session_activity.date_end_day-19" value="19">19</option>
               				<option id="form_resources.user_session_activity.date_end_day-20" value="20">20</option>
               				<option id="form_resources.user_session_activity.date_end_day-21" value="21">21</option>
               				<option id="form_resources.user_session_activity.date_end_day-22" value="22">22</option>
               				<option id="form_resources.user_session_activity.date_end_day-23" value="23">23</option>
               				<option id="form_resources.user_session_activity.date_end_day-24" value="24">24</option>
               				<option id="form_resources.user_session_activity.date_end_day-25" value="25" selected>25</option>
               				<option id="form_resources.user_session_activity.date_end_day-26" value="26">26</option>
               				<option id="form_resources.user_session_activity.date_end_day-27" value="27">27</option>
               				<option id="form_resources.user_session_activity.date_end_day-28" value="27">28</option>
               				<option id="form_resources.user_session_activity.date_end_day-29" value="29">29</option>
               				<option id="form_resources.user_session_activity.date_end_day-30" value="30">30</option>
               				<option id="form_resources.user_session_activity.date_end_day-31" value="31">31</option>
               			</select>
               		</td>
									<td>
          			   		<select name="form_resources.user_session_activity.date_end_year" id="form_resources.user_session_activity.date_end_year" onchange="SM_Report_Update('form_resources', 'human_resource.report', 'userid:asc'); SM_Chart_Update('form_resources', 'user_session_activity.chart', 'userid:asc', 'user_session_activity.chart');" class="formControl_inputSelect" tabindex="3">
											 <option value="2014" id="form_resources.user_session_activity.date_end_year-2014">2014</option>
											 <option value="2013" id="form_resources.user_session_activity.date_end_year-2013">2013</option>
											 <option value="2012" id="form_resources.user_session_activity.date_end_year-2012">2012</option>
              				 <option value="2011" id="form_resources.user_session_activity.date_end_year-2011">2011</option>
              				 <option value="2010" id="form_resources.user_session_activity.date_end_year-2010" selected>2010</option>
              				 <option value="2009" id="form_resources.user_session_activity.date_end_year-2009">2009</option>
              				 <option value="2008" id="form_resources.user_session_activity.date_end_year-2008">2008</option>
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