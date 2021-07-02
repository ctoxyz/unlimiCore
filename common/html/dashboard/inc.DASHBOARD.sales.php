
<!-- SM JS lib -->
	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.REPORTS.uncompressed.js"></script>'; ?>
<!-- END SM JS lib -->

<!-- SM CSS lib -->
	<? echo '<link rel="stylesheet" type="text/css" href="http://'.$_SERVER['SERVER_NAME'].'/common/css/SM.forms/SM.css.FORMS.css" />'; ?>
<!-- END SM CSS lib -->


<!-- FC JS lib -->
	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/chart/FusionCharts.js"></script>'; ?>
<!-- END FC JS lib -->







        					<!-- html  -->

         					<!-- core css -->
        					<link rel="stylesheet" href="common/css/dashboard/dashboard-core.css" type="text/css" media="all"/>



<!-- DASHBOARD -->
                		<div id="dashboard_level_1" style="background-color: #000; text-align: center;">
                			<!-- <div id="panel_title"><table cellpadding="0"><tr><td><font color="white">Performance</font></td></tr></table></div> -->


												<input type="hidden" value="<? echo date('m',time()); ?>" name="form_sales_currentmonth.salesman_quota_dashboard.date_start_month" id="form_sales_currentmonth.salesman_quota_dashboard.date_start_month" />
												<input type="hidden" value="01" name="form_sales_currentmonth.salesman_quota_dashboard.date_start_day" id="form_sales_currentmonth.salesman_quota_dashboard.date_start_day" />
												<input type="hidden" value="<? echo date('Y',time()); ?>" name="form_sales_currentmonth.salesman_quota_dashboard.date_start_year" id="form_sales_currentmonth.salesman_quota_dashboard.date_start_year" />

												<input type="hidden" value="<? echo date('m',time()); ?>" name="form_sales_currentmonth.salesman_quota_dashboard.date_end_month" id="form_sales_currentmonth.salesman_quota_dashboard.date_end_month" />
												<input type="hidden" value="<? echo $obj_Member->NumDaysInMonth(date('m',time()), date('Y',time())); ?>" name="form_sales_currentmonth.salesman_quota_dashboard.date_end_day" id="form_sales_currentmonth.salesman_quota_dashboard.date_end_day" />
												<input type="hidden" value="<? echo date('Y',time()); ?>" name="form_sales_currentmonth.salesman_quota_dashboard.date_end_year" id="form_sales_currentmonth.salesman_quota_dashboard.date_end_year" />


<!--
												<div id="salesman_overunder.report1" style="z-index: 2; position: relative; top: 0px; left: 0px; width: 960px; height: auto; min-height: 200px; border: 0px solid #f00; margin-bottom: 20px;">
												</div>

												<script type="text/javascript">

												<? 
													// generate spreadsheet report -------------------
													//											 form id										target exe									filter
													//echo 'SM_Report_Update(\'form_sales_currentmonth\', \'salesman_overunder.report\', \'ts_sold:asc\');';
												?>
												</script>
-->

<!-- chart 1 -->
												<div style="position: absolute; top: 0px; z-index: 1; border: 0px solid #f00; width: 400px; height: 220px;">

													<div id="chart1div" style="position: absolute; top: 0px; z-index: 1;"></div>



													<script language="JavaScript">
														//var chartData	=	"<chart showTaskNames='1' dateFormat='dd/mm/yyyy' hoverCapBgColor='FFFFFF' hoverCapBorderColor='333333' ganttLineColor='99CC00' ganttLineAlpha='20' baseFontColor='333333' gridBorderColor='99CC00' taskBarRoundRadius='4' showShadow='0'></chart>";
														var chart1 = new FusionCharts("common/chart/AngularGauge.swf", "salesman_quota_dashboard.chart", "350", "200", "0", "1");
													  //chart1.setDataXML(chartData);
													  //chart1.setDataURL("common/chart/Data.xml");
													  chart1.setDataXML("<chart><set label='A' value='10' /><set label='B' value='11' /></chart>");
													  //chart1.setDataURL("core.exe.php?_function=client_campaign.chart");
													  chart1.setTransparent(true);
													  chart1.render("chart1div");
													  //							 form ID										target exe							 					filter						chart id
													  SM_Chart_Update('form_sales_currentmonth', 'salesman_quota_dashboard.chart', 'ts_entered:desc', 'salesman_quota_dashboard.chart');
													</script>

													<div style="position: absolute; bottom: 8px; left: 74px; z-index: 1; border: 0px solid #f00; width: 200px; height: 20px; font-size: 15px; color: #fff;">$<? echo number_format($obj_Member->GetUserQuota($_SESSION['ActiveUser']['userid'], date('M',time()), date('Y',time()))); ?> Quota Fulfillment</div>


												</div>
<!-- END chart 1 -->


<!-- chart 2 -->
												<div style="position: absolute; left: 400px; top: 0px; z-index: 1; border: 0px solid #f00; width: 540px; height: 220px;">


												<input type="hidden" value="<? echo date('m',time()); ?>" name="form_sales_currentmonth.salesman_medium_dashboard.date_start_month" id="form_sales_currentmonth.salesman_medium_dashboard.date_start_month" />
												<input type="hidden" value="01" name="form_sales_currentmonth.salesman_medium_dashboard.date_start_day" id="form_sales_currentmonth.salesman_medium_dashboard.date_start_day" />
												<input type="hidden" value="<? echo date('Y',time()); ?>" name="form_sales_currentmonth.salesman_medium_dashboard.date_start_year" id="form_sales_currentmonth.salesman_medium_dashboard.date_start_year" />

												<input type="hidden" value="<? echo date('m',time()); ?>" name="form_sales_currentmonth.salesman_medium_dashboard.date_end_month" id="form_sales_currentmonth.salesman_medium_dashboard.date_end_month" />
												<input type="hidden" value="<? echo $obj_Member->NumDaysInMonth(date('m',time()), date('Y',time())); ?>" name="form_sales_currentmonth.salesman_medium_dashboard.date_end_day" id="form_sales_currentmonth.salesman_medium_dashboard.date_end_day" />
												<input type="hidden" value="<? echo date('Y',time()); ?>" name="form_sales_currentmonth.salesman_medium_dashboard.date_end_year" id="form_sales_currentmonth.salesman_medium_dashboard.date_end_year" />


													<div id="chart1div2" style="position: absolute; top: -10px; z-index: 1;"></div>


													<script language="JavaScript">
														//var chartData	=	"<chart showTaskNames='1' dateFormat='dd/mm/yyyy' hoverCapBgColor='FFFFFF' hoverCapBorderColor='333333' ganttLineColor='99CC00' ganttLineAlpha='20' baseFontColor='333333' gridBorderColor='99CC00' taskBarRoundRadius='4' showShadow='0'></chart>";
														var chart2 = new FusionCharts("common/chart/Column3D.swf", "salesman_medium_dashboard.chart", "540", "220", "0", "1");
													  //chart1.setDataXML(chartData);
													  //chart2.setDataURL("common/xml/sample_pyramid.xml");
													  chart2.setDataXML("<chart><set label='A' value='10' /><set label='B' value='11' /></chart>");
													  //chart1.setDataURL("core.exe.php?_function=client_campaign.chart");
													  chart2.setTransparent(true);
													  chart2.render("chart1div2");
													  //							 form ID					target exe							 filter			chart id
													  SM_Chart_Update('form_sales_currentmonth', 'salesman_medium_dashboard.chart', 'ts_entered:desc', 'salesman_medium_dashboard.chart');
													</script>
												</div>
<!-- END chart 2 -->





                		</div>
<!-- END DASHBOARD -->


<!-- DASHBOARD -->
                		<div id="dashboard_level_2" style="background-color: #000; text-align: center;">
                			<div id="panel_title" style="position: relative; top: 4px; left: 5px;"><table cellpadding="0"><tr><td><font color="white"><font size="5" color="#a3f59b">dyna</font><font size="5" color="#00d2ff">Dash</font>&trade; <a href="javascript:SM_DynaDash_Erase('salesman_current_month.dynadash');">close</a></font></td></tr></table></div>

												<div id="salesman_current_month.dynadash" style="z-index: 2; position: relative; top: 10px; left: 0px; width: 950px; height: auto; min-height: 1px; border: 0px solid #f00; margin-bottom: 20px; overflow: auto;"></div>

<!--
												<input type="hidden" value="<? echo date('m',time()); ?>" name="form_sales_currentmonth.salesman_overunder.date_start_month" id="form_sales_currentmonth.salesman_overunder.date_start_month" />
												<input type="hidden" value="01" name="form_sales_currentmonth.salesman_overunder.date_start_day" id="form_sales_currentmonth.salesman_overunder.date_start_day" />
												<input type="hidden" value="<? echo date('Y',time()); ?>" name="form_sales_currentmonth.salesman_overunder.date_start_year" id="form_sales_currentmonth.salesman_overunder.date_start_year" />

												<input type="hidden" value="<? echo date('m',time()); ?>" name="form_sales_currentmonth.salesman_overunder.date_end_month" id="form_sales_currentmonth.salesman_overunder.date_end_month" />
												<input type="hidden" value="<? echo $obj_Member->NumDaysInMonth(date('m',time()), date('Y',time())); ?>" name="form_sales_currentmonth.salesman_overunder.date_end_day" id="form_sales_currentmonth.salesman_overunder.date_end_day" />
												<input type="hidden" value="<? echo date('Y',time()); ?>" name="form_sales_currentmonth.salesman_overunder.date_end_year" id="form_sales_currentmonth.salesman_overunder.date_end_year" />
-->

<!--
												<div id="salesman_overunder.report1" style="z-index: 2; position: relative; top: 0px; left: 0px; width: 960px; height: auto; min-height: 200px; border: 0px solid #f00; margin-bottom: 20px;">
												</div>

												<script type="text/javascript">

												<? 
													// generate spreadsheet report -------------------
													//											 form id										target exe									filter
													//echo 'SM_Report_Update(\'form_sales_currentmonth\', \'salesman_overunder.report\', \'ts_sold:asc\');';
												?>
												</script>
-->


                		</div>
<!-- END DASHBOARD -->





<!-- DASHBOARD -->
                		<div id="dashboard_level_3" style="background-color: #000; text-align: center;">

												<input type="hidden" value="<? echo date('m',time()); ?>" name="form_sales_currentmonth.salesman_current_month.date_start_month" id="form_sales_currentmonth.salesman_current_month.date_start_month" />
												<input type="hidden" value="01" name="form_sales_currentmonth.salesman_current_month.date_start_day" id="form_sales_currentmonth.salesman_current_month.date_start_day" />
												<input type="hidden" value="<? echo date('Y',time()); ?>" name="form_sales_currentmonth.salesman_current_month.date_start_year" id="form_sales_currentmonth.salesman_current_month.date_start_year" />

												<input type="hidden" value="<? echo date('m',time()); ?>" name="form_sales_currentmonth.salesman_current_month.date_end_month" id="form_sales_currentmonth.salesman_current_month.date_end_month" />
												<input type="hidden" value="<? echo $obj_Member->NumDaysInMonth(date('m',time()), date('Y',time())); ?>" name="form_sales_currentmonth.salesman_current_month.date_end_day" id="form_sales_currentmonth.salesman_current_month.date_end_day" />
												<input type="hidden" value="<? echo date('Y',time()); ?>" name="form_sales_currentmonth.salesman_current_month.date_end_year" id="form_sales_currentmonth.salesman_current_month.date_end_year" />


												<div id="salesman_totals.report" style="z-index: 2; position: relative; top: 0px; left: 0px; width: 960px; height: auto; min-height: 200px; border: 0px solid #f00; margin-bottom: 20px;">
												</div>

                				
												<script type="text/javascript">
													<? 
														// generate spreadsheet report -------------------
														//											 form id										target exe									filter
														echo 'SM_Report_Update(\'form_sales_currentmonth\', \'salesman_totals.report\', \'ts_sold:asc\');';
													?>
												</script>

                		</div>
<!-- END DASHBOARD -->













<!-- DASHBOARD -->
                		<div id="dashboard_level_4" style="background-color: #000; text-align: center;">
                			<!-- <div id="panel_title"><table cellpadding="0"><tr><td><font color="white">Secondary Dashboard</font></td></tr></table></div> -->


												<div id="salesman_current_month.report" style="z-index: 2; position: relative; top: 0px; left: 0px; width: 960px; height: auto; min-height: 200px; border: 0px solid #f00; margin-bottom: 20px; overflow: auto;">
												</div>
                				
												<script type="text/javascript">
													<? 
														// generate spreadsheet report -------------------
														//											 form id										target exe												 filter
														echo 'SM_Report_Update(\'form_sales_currentmonth\', \'salesman_current_month.report\', \'ts_sold:asc\');';
													?>
												</script>

                		</div>
<!-- END DASHBOARD -->

























<!-- PANEL -->
<!--
										<div id="myhome_panel-title_lft_3">

											<div style="position: absolute; left: 0px; top: 0px; width: 250px; border: 0px solid #000000;">
												&nbsp;<font class="font_panelTitle">Latest Ad Promos</font>
											</div>
											
											<div style="position: absolute; right: 0px; top: -2px; width: 80px; border: 0px solid #ffffff; text-align: right; padding-right: 10px;">
												<font class="font_panelTitle"><a href="MyPromos"><font color="#ffd265">more</font></a></font>
											</div>
										</div>

                		
                		<div id="myhome_panel_lft_3" style="background-color: #000000;" onmouseover="this.style.overflowY = 'auto';" onmouseout="this.style.overflowY = 'hidden';">

                		</div>

-->
<!-- END PANEL -->


<!-- PANEL -->
<!--
                		<div id="panel_rht_3" style="background-color: black;">

                			<div id="panel_title"><table cellpadding="0"><tr><td><font color="white">News</font></td></tr></table></div>
                		</div>
-->
<!-- END PANEL -->


        					<!-- END html  -->