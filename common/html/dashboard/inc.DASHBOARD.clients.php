
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

												<input type="hidden" value="<? echo date('m',time()); ?>" name="form_sales_currentmonth.salesman_current_month.date_start_month" id="form_sales_currentmonth.salesman_current_month.date_start_month" />
												<input type="hidden" value="01" name="form_sales_currentmonth.salesman_current_month.date_start_day" id="form_sales_currentmonth.salesman_current_month.date_start_day" />
												<input type="hidden" value="<? echo date('Y',time()); ?>" name="form_sales_currentmonth.salesman_current_month.date_start_year" id="form_sales_currentmonth.salesman_current_month.date_start_year" />

												<input type="hidden" value="<? echo date('m',time()); ?>" name="form_sales_currentmonth.salesman_current_month.date_end_month" id="form_sales_currentmonth.salesman_current_month.date_end_month" />
												<input type="hidden" value="<? echo $obj_Member->NumDaysInMonth(date('m',time()), date('Y',time())); ?>" name="form_sales_currentmonth.salesman_current_month.date_end_day" id="form_sales_currentmonth.salesman_current_month.date_end_day" />
												<input type="hidden" value="<? echo date('Y',time()); ?>" name="form_sales_currentmonth.salesman_current_month.date_end_year" id="form_sales_currentmonth.salesman_current_month.date_end_year" />

												<div id="results_window" name="results_window" style="z-index: 2; position: relative; top: 0px; left: 0px; width: 960px; height: auto; min-height: 200px; border: 0px solid #f00; margin-bottom: 20px;">
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







<!-- DASHBOARD -->
                		<div id="dashboard_level_2" style="background-color: #000; text-align: center;">
                			<div id="panel_title"><table cellpadding="0"><tr><td><font color="white">Secondary Dashboard Sales Person</font></td></tr></table></div>
                				

                				
                				
                		</div>
<!-- END DASHBOARD -->

















<!-- PANEL -->
										<div id="myhome_panel-title_lft_3">

											<div style="position: absolute; left: 0px; top: 0px; width: 250px; border: 0px solid #000000;">
												&nbsp;<font class="font_panelTitle">Latest Ad Promos</font>
											</div>
											
											<div style="position: absolute; right: 0px; top: -2px; width: 80px; border: 0px solid #ffffff; text-align: right; padding-right: 10px;">
												<font class="font_panelTitle"><a href="MyPromos"><font color="#ffd265">more</font></a></font>
											</div>
										</div>

                		
                		<div id="myhome_panel_lft_3" style="background-color: #000000;" onmouseover="this.style.overflowY = 'auto';" onmouseout="this.style.overflowY = 'hidden';">
											<!-- <img src="/common/img/news/latest-promo-ads.gif" /> -->
                		</div>
<!-- END PANEL -->


<!-- PANEL -->
                		<div id="panel_rht_3" style="background-color: black;">
                			<div id="panel_title"><table cellpadding="0"><tr><td><font color="white">News</font></td></tr></table></div>
											<!-- <img src="/common/img/news/news-smart-systems.gif" /> -->
                		</div>
<!-- END PANEL -->


        					<!-- END html  -->