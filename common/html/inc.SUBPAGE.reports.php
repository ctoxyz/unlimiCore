
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
        					<link rel="stylesheet" href="common/css/reports/reports-core.css" type="text/css" media="all"/>


<?

								// dashboard selection ---------------------------------
								switch($_SESSION['ActiveUser']['user_type']){
									
									case 'sales':
										echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Sales Reports</div>';
										require('common/html/inc.SUBPAGE.REPORT.SALESPEOPLE.php');
									break;





	
									case 'management':
										echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Management Reports</div>';
										require('common/html/inc.SUBPAGE.REPORT.MANAGEMENT.php');
									break;



									case 'executive':
										echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Organization Reports</div>';
										require('common/html/inc.SUBPAGE.REPORT.EXECUTIVE.php');
									break;




									case 'finance':
										echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Finance Reports</div>';
										require('common/html/inc.SUBPAGE.REPORT.FINANCE.php');
									break;



	
									case 'admins':
										echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">Admin Reports</div>';

									break;




	
									case 'god':
										echo '<div style="position: relative; left: 10px; top: 10px; margin-bottom: 10px; color: #ffffff; font-size: 25px; font-weight: bold;">God Reports</div>';
?>


<!-- top reports L -->
                		<div id="reports_level_1L" style="background-color: #000; text-align: center;">
                			<!-- <div id="panel_title"><table cellpadding="0"><tr><td><font color="white">Performance</font></td></tr></table></div> -->

												<img src="/common/img/reports/mgr.gm_month.jpg" onclick="window.location.href='reports.grossprofit';" style="cursor: pointer;" />

												<!-- live data -->
												<div style="position: absolute; top: 55px; left: 130px; z-index: 1; border: 0px solid #f00; width: 200px; height: 70px; font-size: 50px; font-weight: bold; font-family: helvetica; color: #00d2ff;"><? echo ($Performance_Today_ARRAY['gross_profit_total'] > 0 ? '$'.number_format($Performance_Today_ARRAY['gross_profit_total']):'0'); ?></div>
												<!-- END live data -->

                		</div>
<!-- END top reports L -->



<!-- top reports R -->
                		<div id="reports_level_1R" style="background-color: #000; text-align: center;">
                			<!-- <div id="panel_title"><table cellpadding="0"><tr><td><font color="white">Performance</font></td></tr></table></div> -->

											<img src="/common/img/reports/mgr.gm_origin.jpg" onclick="window.location.href='reports.transaction';" style="cursor: pointer;" />

												<!-- live data -->
												<div style="position: absolute; top: 65px; left: 0px; z-index: 1; border: 0px solid #f00; width: 465px; height: 70px; font-size: 40px; font-weight: bold; font-family: helvetica; color: #00d2ff;">$5,065 / Transaction</div>
												<!-- END live data -->

                		</div>
<!-- END top reports R -->






<!-- top reports L -->
                		<div id="reports_level_2L" style="background-color: #000; text-align: center;">
                			<!-- <div id="panel_title"><table cellpadding="0"><tr><td><font color="white">Performance</font></td></tr></table></div> -->

												<img src="/common/img/reports/mgr.gm_transaction.jpg" onclick="window.location.href='reports.transaction';" style="cursor: pointer;" />

												<!-- live data -->
												<div style="position: absolute; top: 55px; left: 130px; z-index: 1; border: 0px solid #f00; width: 200px; height: 70px; font-size: 50px; font-weight: bold; font-family: helvetica; color: #00d2ff;">$3,182</div>
												<!-- END live data -->

                		</div>
<!-- END top reports L -->



<!-- top reports R -->
                		<div id="reports_level_2R" style="background-color: #000; text-align: center;">
                			<!-- <div id="panel_title"><table cellpadding="0"><tr><td><font color="white">Performance</font></td></tr></table></div> -->


												<img src="/common/img/reports/mgr.quarterly_revenue.jpg" onclick="alert('reports.grossprofit');" style="cursor: pointer;" />

												<!-- live data -->
												<div style="position: absolute; top: 55px; left: 130px; z-index: 1; border: 0px solid #f00; width: 200px; height: 70px; font-size: 50px; font-weight: bold; font-family: helvetica; color: #00d2ff;">19,122</div>
												<!-- END live data -->

                		</div>
<!-- END top reports R -->




<!-- top reports L -->
                		<div id="reports_level_3L" style="background-color: #000; text-align: center;">
                			<!-- <div id="panel_title"><table cellpadding="0"><tr><td><font color="white">Performance</font></td></tr></table></div> -->


												<img src="/common/img/reports/mgr.top_10.jpg" onclick="alert('reports.grossprofit');" style="cursor: pointer;" />

												<!-- live data -->
												<div style="position: absolute; top: 55px; left: 130px; z-index: 1; border: 0px solid #f00; width: 200px; height: 70px; font-size: 50px; font-weight: bold; font-family: helvetica; color: #00d2ff;">19,122</div>
												<!-- END live data -->

                		</div>
<!-- END top reports L -->


<!-- top reports R -->
                		<div id="reports_level_3R" style="background-color: #000; text-align: center;">
                			<!-- <div id="panel_title"><table cellpadding="0"><tr><td><font color="white">Performance</font></td></tr></table></div> -->


												<img src="/common/img/reports/mgr.gm_by_salesperson.jpg" onclick="alert('reports.grossprofit');" style="cursor: pointer;" />

												<!-- live data -->
												<div style="position: absolute; top: 55px; left: 130px; z-index: 1; border: 0px solid #f00; width: 200px; height: 70px; font-size: 50px; font-weight: bold; font-family: helvetica; color: #00d2ff;">19,122</div>
												<!-- END live data -->

                		</div>
<!-- END top reports R -->


<?
									break;







									default:
									?>
										<script type="text/javascript">location="Assistance";</script>
									<?
									break;
									
								}











?>













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