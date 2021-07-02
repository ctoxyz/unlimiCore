

					<form name='form_team_currentmonth'>
<center>
					<table border=0>
     		    <!-- date range element -->
           	<tr>
    					<td class="formControl_label">
    						&nbsp;&nbsp;Date Start
    					</td>

           		<td height="25">
							<table>
								<tr>
									<td>
               			<select name="form_team_currentmonth.manager_current_month_all_records.date_start_month" id="form_team_currentmonth.manager_current_month_all_records.date_start_month" onchange="SM_Report_Update('form_team_currentmonth', 'manager_current_month_all_records.report', 'ts_sold:desc'); SM_Chart_Update('form_team_currentmonth', 'manager_current_month_all_records.chart', 'ts_sold:desc', 'manager_current_month_all_records.chart');" class="formControl_inputSelect" tabindex="1">
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_month-jan" value="01" <? echo (date('m',time()) == '01'?'selected':''); ?>>Jan</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_month-feb" value="02" <? echo (date('m',time()) == '02'?'selected':''); ?>>Feb</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_month-march" value="03" <? echo (date('m',time()) == '03'?'selected':''); ?>>Mar</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_month-april" value="04" <? echo (date('m',time()) == '04'?'selected':''); ?>>Apr</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_month-may" value="05" <? echo (date('m',time()) == '05'?'selected':''); ?>>May</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_month-june" value="06" <? echo (date('m',time()) == '06'?'selected':''); ?>>Jun</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_month-july" value="07" <? echo (date('m',time()) == '07'?'selected':''); ?>>Jul</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_month-august" value="08" <? echo (date('m',time()) == '08'?'selected':''); ?>>Aug</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_month-sep" value="09" <? echo (date('m',time()) == '09'?'selected':''); ?>>Sep</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_month-oct" value="10" <? echo (date('m',time()) == '10'?'selected':''); ?>>Oct</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_month-nov" value="11" <? echo (date('m',time()) == '11'?'selected':''); ?>>Nov</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_month-dec" value="12" <? echo (date('m',time()) == '12'?'selected':''); ?>>Dec</option> 
               			</select>
               		</td>
									<td>
               			<select name="form_team_currentmonth.manager_current_month_all_records.date_start_day" id="form_team_currentmonth.manager_current_month_all_records.date_start_day" onchange="SM_Report_Update('form_team_currentmonth', 'manager_current_month_all_records.report', 'ts_sold:desc'); SM_Chart_Update('form_team_currentmonth', 'manager_current_month_all_records.chart', 'ts_sold:desc', 'manager_current_month_all_records.chart');" class="formControl_inputSelect" tabindex="2">
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-1" value="01" selected >1</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-2" value="02" <? echo (date('d',time()) == '02'?'selected':''); ?>>2</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-3" value="03" <? echo (date('d',time()) == '03'?'selected':''); ?>>3</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-4" value="04" <? echo (date('d',time()) == '04'?'selected':''); ?>>4</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-5" value="05" <? echo (date('d',time()) == '05'?'selected':''); ?>>5</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-6" value="06" <? echo (date('d',time()) == '06'?'selected':''); ?>>6</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-7" value="07" <? echo (date('d',time()) == '07'?'selected':''); ?>>7</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-8" value="08" <? echo (date('d',time()) == '08'?'selected':''); ?>>8</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-9" value="09" <? echo (date('d',time()) == '09'?'selected':''); ?>>9</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-10" value="10" <? echo (date('d',time()) == '10'?'selected':''); ?>>10</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-11" value="11" <? echo (date('d',time()) == '11'?'selected':''); ?>>11</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-12" value="12" <? echo (date('d',time()) == '12'?'selected':''); ?>>12</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-13" value="13" <? echo (date('d',time()) == '13'?'selected':''); ?>>13</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-14" value="14" <? echo (date('d',time()) == '14'?'selected':''); ?>>14</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-15" value="15" <? echo (date('d',time()) == '15'?'selected':''); ?>>15</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-16" value="16" <? echo (date('d',time()) == '16'?'selected':''); ?>>16</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-17" value="17" <? echo (date('d',time()) == '17'?'selected':''); ?>>17</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-18" value="18" <? echo (date('d',time()) == '18'?'selected':''); ?>>18</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-19" value="19" <? echo (date('d',time()) == '19'?'selected':''); ?>>19</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-20" value="20" <? echo (date('d',time()) == '20'?'selected':''); ?>>20</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-21" value="21" <? echo (date('d',time()) == '21'?'selected':''); ?>>21</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-22" value="22" <? echo (date('d',time()) == '22'?'selected':''); ?>>22</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-23" value="23" <? echo (date('d',time()) == '23'?'selected':''); ?>>23</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-24" value="24" <? echo (date('d',time()) == '24'?'selected':''); ?>>24</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-25" value="25" <? echo (date('d',time()) == '25'?'selected':''); ?>>25</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-26" value="26" <? echo (date('d',time()) == '26'?'selected':''); ?>>26</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-27" value="27" <? echo (date('d',time()) == '27'?'selected':''); ?>>27</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-28" value="28" <? echo (date('d',time()) == '28'?'selected':''); ?>>28</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-29" value="29">29</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-30" value="30">30</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_start_day-31" value="31">31</option>
               			</select>
               		</td>
									<td>
          			   		<select name="form_team_currentmonth.manager_current_month_all_records.date_start_year" id="form_team_currentmonth.manager_current_month_all_records.date_start_year" onchange="SM_Report_Update('form_team_currentmonth', 'manager_current_month_all_records.report', 'ts_sold:desc'); SM_Chart_Update('form_team_currentmonth', 'manager_current_month_all_records.chart', 'ts_sold:desc', 'manager_current_month_all_records.chart');" class="formControl_inputSelect" tabindex="3">
											 <option value="2014" id="form_team_currentmonth.manager_current_month_all_records.date_start_year-2014" >2014</option>
											 <option value="2013" id="form_team_currentmonth.manager_current_month_all_records.date_start_year-2013" >2013</option>
											 <option value="2012" id="form_team_currentmonth.manager_current_month_all_records.date_start_year-2012" >2012</option>
											 <option value="2011" id="form_team_currentmonth.manager_current_month_all_records.date_start_year-2011" >2011</option>
              				 <option value="2010" id="form_team_currentmonth.manager_current_month_all_records.date_start_year-2010" selected>2010</option>
              				 <option value="2009" id="form_team_currentmonth.manager_current_month_all_records.date_start_year-2009" >2009</option>
              				 <option value="2008" id="form_team_currentmonth.manager_current_month_all_records.date_start_year-2008" >2008</option>
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
               			<select name="form_team_currentmonth.manager_current_month_all_records.date_end_month" id="form_team_currentmonth.manager_current_month_all_records.date_end_month" onchange="SM_Report_Update('form_team_currentmonth', 'manager_current_month_all_records.report', 'ts_sold:desc'); SM_Chart_Update('form_team_currentmonth', 'manager_current_month_all_records.chart', 'ts_sold:desc', 'manager_current_month_all_records.chart');" class="formControl_inputSelect" tabindex="1">
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_month-jan" value="01" <? echo (date('m',time()) == '01'?'selected':''); ?>>Jan</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_month-feb" value="02" <? echo (date('m',time()) == '02'?'selected':''); ?>>Feb</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_month-march" value="03" <? echo (date('m',time()) == '03'?'selected':''); ?>>Mar</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_month-april" value="04" <? echo (date('m',time()) == '04'?'selected':''); ?>>Apr</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_month-may" value="05" <? echo (date('m',time()) == '05'?'selected':''); ?>>May</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_month-june" value="06" <? echo (date('m',time()) == '06'?'selected':''); ?>>Jun</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_month-july" value="07" <? echo (date('m',time()) == '07'?'selected':''); ?>>Jul</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_month-august" value="08" <? echo (date('m',time()) == '08'?'selected':''); ?>>Aug</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_month-sep" value="09" <? echo (date('m',time()) == '09'?'selected':''); ?>>Sep</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_month-oct" value="10" <? echo (date('m',time()) == '10'?'selected':''); ?>>Oct</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_month-nov" value="11" <? echo (date('m',time()) == '11'?'selected':''); ?>>Nov</option> 
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_month-dec" value="12" <? echo (date('m',time()) == '12'?'selected':''); ?>>Dec</option> 
               			</select>
               		</td>
									<td>
               			<select name="form_team_currentmonth.manager_current_month_all_records.date_end_day" id="form_team_currentmonth.manager_current_month_all_records.date_end_day" onchange="SM_Report_Update('form_team_currentmonth', 'manager_current_month_all_records.report', 'ts_sold:desc'); SM_Chart_Update('form_team_currentmonth', 'manager_current_month_all_records.chart', 'ts_sold:desc', 'manager_current_month_all_records.chart');" class="formControl_inputSelect" tabindex="2">
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-1" value="01" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 1 ? 'selected':''); ?>>1</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-2" value="02" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 2 ? 'selected':''); ?>>2</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-3" value="03" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 3 ? 'selected':''); ?>>3</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-4" value="04" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 4 ? 'selected':''); ?>>4</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-5" value="05" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 5 ? 'selected':''); ?>>5</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-6" value="06" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 6 ? 'selected':''); ?>>6</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-7" value="07" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 7 ? 'selected':''); ?>>7</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-8" value="08" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 8 ? 'selected':''); ?>>8</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-9" value="09" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 9 ? 'selected':''); ?>>9</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-10" value="10" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 10 ? 'selected':''); ?>>10</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-11" value="11" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 11 ? 'selected':''); ?>>11</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-12" value="12" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 12 ? 'selected':''); ?>>12</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-13" value="13" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 13 ? 'selected':''); ?>>13</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-14" value="14" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 14 ? 'selected':''); ?>>14</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-15" value="15" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 15 ? 'selected':''); ?>>15</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-16" value="16" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 16 ? 'selected':''); ?>>16</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-17" value="17" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 17 ? 'selected':''); ?>>17</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-18" value="18" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 18 ? 'selected':''); ?>>18</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-19" value="19" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 19 ? 'selected':''); ?>>19</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-20" value="20" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 20 ? 'selected':''); ?>>20</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-21" value="21" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 21 ? 'selected':''); ?>>21</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-22" value="22" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 22 ? 'selected':''); ?>>22</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-23" value="23" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 23 ? 'selected':''); ?>>23</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-24" value="24" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 24 ? 'selected':''); ?>>24</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-25" value="25" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 25 ? 'selected':''); ?>>25</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-26" value="26" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 26 ? 'selected':''); ?>>26</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-27" value="27" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 27 ? 'selected':''); ?>>27</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-28" value="28" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 28 ? 'selected':''); ?>>28</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-29" value="29" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 29 ? 'selected':''); ?>>29</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-30" value="30" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 30 ? 'selected':''); ?>>30</option>
               				<option id="form_team_currentmonth.manager_current_month_all_records.date_end_day-31" value="31" <? echo (date('d',$obj_Member->Month_to_MonthLastTS(date('m',time()), date('Y',time()))) == 31 ? 'selected':''); ?>>31</option>
               			</select>
               		</td>
									<td>
          			   		<select name="form_team_currentmonth.manager_current_month_all_records.date_end_year" id="form_team_currentmonth.manager_current_month_all_records.date_end_year" onchange="SM_Report_Update('form_team_currentmonth', 'manager_current_month_all_records.report', 'ts_sold:desc'); SM_Chart_Update('form_team_currentmonth', 'manager_current_month_all_records.chart', 'ts_sold:desc', 'manager_current_month_all_records.chart');" class="formControl_inputSelect" tabindex="3">
											 <option value="2014" id="form_team_currentmonth.manager_current_month_all_records.date_end_year-2014" <? echo (date('Y',time()) == '2014'?'selected':''); ?>>2014</option>
											 <option value="2013" id="form_team_currentmonth.manager_current_month_all_records.date_end_year-2013" <? echo (date('Y',time()) == '2013'?'selected':''); ?>>2013</option>
											 <option value="2012" id="form_team_currentmonth.manager_current_month_all_records.date_end_year-2012" <? echo (date('Y',time()) == '2012'?'selected':''); ?>>2012</option>
											 <option value="2011" id="form_team_currentmonth.manager_current_month_all_records.date_end_year-2011" <? echo (date('Y',time()) == '2011'?'selected':''); ?>>2011</option>
              				 <option value="2010" id="form_team_currentmonth.manager_current_month_all_records.date_end_year-2010" <? echo (date('Y',time()) == '2010'?'selected':''); ?>>2010</option>
              				 <option value="2009" id="form_team_currentmonth.manager_current_month_all_records.date_end_year-2009" <? echo (date('Y',time()) == '2009'?'selected':''); ?>>2009</option>
              				 <option value="2008" id="form_team_currentmonth.manager_current_month_all_records.date_end_year-2008" <? echo (date('Y',time()) == '2008'?'selected':''); ?>>2008</option>
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

					<!-- series -->
					<table border=0 style="margin-top: 10px;">
           	<tr>
    					<td class=""><font color=white>Client Net</font></td>
    					<td class=""><input type="checkbox" value="1" checked id="form_team_currentmonth.manager_current_month_all_records.series_client_net" onclick="SM_Report_Update('form_team_currentmonth', 'manager_current_month_all_records.report', 'ts_sold:desc'); SM_Chart_Update('form_team_currentmonth', 'manager_current_month_all_records.chart', 'ts_sold:desc', 'manager_current_month_all_records.chart');" class="" tabindex="3"></td>

							<td width="20"></td>
    					<td class=""><font color=white>Gross Profit</font></td>
    					<td class=""><input type="checkbox" value="1" checked id="form_team_currentmonth.manager_current_month_all_records.series_gross_profit" onclick="SM_Report_Update('form_team_currentmonth', 'manager_current_month_all_records.report', 'ts_sold:desc'); SM_Chart_Update('form_team_currentmonth', 'manager_current_month_all_records.chart', 'ts_sold:desc', 'manager_current_month_all_records.chart');" class="" tabindex="3"></td>

							<td width="20"></td>
    					<td class=""><font color=white>PO Cost</font></td>
    					<td class=""><input type="checkbox" value="1" checked id="form_team_currentmonth.manager_current_month_all_records.series_po_cost" onclick="SM_Report_Update('form_team_currentmonth', 'manager_current_month_all_records.report', 'ts_sold:desc'); SM_Chart_Update('form_team_currentmonth', 'manager_current_month_all_records.chart', 'ts_sold:desc', 'manager_current_month_all_records.chart');" class="" tabindex="3"></td>

							<td width="20"></td>
    					<td class=""><font color=white>Direct Commission</font></td>
    					<td class=""><input type="checkbox" value="1" id="form_team_currentmonth.manager_current_month_all_records.series_direct_commission" onclick="SM_Report_Update('form_team_currentmonth', 'manager_current_month_all_records.report', 'ts_sold:desc'); SM_Chart_Update('form_team_currentmonth', 'manager_current_month_all_records.chart', 'ts_sold:desc', 'manager_current_month_all_records.chart');" class="" tabindex="3"></td>

							<td width="20"></td>
    					<td class=""><font color=white>Profit Percentage</font></td>
    					<td class=""><input type="checkbox" value="1" id="form_team_currentmonth.manager_current_month_all_records.series_profit_percentage" onclick="SM_Report_Update('form_team_currentmonth', 'manager_current_month_all_records.report', 'ts_sold:desc'); SM_Chart_Update('form_team_currentmonth', 'manager_current_month_all_records.chart', 'ts_sold:desc', 'manager_current_month_all_records.chart');" class="" tabindex="3"></td>

							<td width="20"></td>
    					<td class=""><font color=white>GM/Transaction</font></td>
    					<td class=""><input type="checkbox" value="1" id="form_team_currentmonth.manager_current_month_all_records.series_gm_per_transaction" onclick="SM_Report_Update('form_team_currentmonth', 'manager_current_month_all_records.report', 'ts_sold:desc'); SM_Chart_Update('form_team_currentmonth', 'manager_current_month_all_records.chart', 'ts_sold:desc', 'manager_current_month_all_records.chart');" class="" tabindex="3"></td>
   					</tr>
					</table>
					<!-- END series -->

					<!-- series -->
					<table border=0 style="margin-top: 10px;">
					<?
						$_ManagerTEAM	=	$obj_Member->GetManagerTeam($_SESSION['ActiveUser']['userid']);

						echo '<tr>';
						$__counter = 1;
						foreach($_ManagerTEAM as $key){
							echo '<td class=""><font color=white>'.ucwords($key['first_name']).' '.ucwords($key['last_name']).'</font></td>';
							echo '<td class=""><input type="checkbox" value="'.$key['userid'].'" checked id="form_team_currentmonth.manager_current_month_all_records.series_team_member_'.$__counter.'" onclick="SM_Report_Update(\'form_team_currentmonth\', \'manager_current_month_all_records.report\', \'ts_sold:desc\'); SM_Chart_Update(\'form_team_currentmonth\', \'manager_current_month_all_records.chart\', \'ts_sold:desc\', \'manager_current_month_all_records.chart\');" class="" tabindex="3"></td>';
							echo '<td class="" width="10"></td>';
							if($__counter % 4 == 0){
								echo '</tr>';	
							}
							$__counter++;
						}
					?>
          </table>
          <!-- END series -->




</center>

</form>