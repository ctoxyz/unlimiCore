
<!-- SM JS lib -->
	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.FORMS.uncompressed.js"></script>'; ?>
<!-- END SM JS lib -->

<!-- SM JS lib -->
	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.REPORTS.uncompressed.js"></script>'; ?>
<!-- END SM JS lib -->

<!-- SM CSS lib -->
	<? echo '<link rel="stylesheet" type="text/css" href="http://'.$_SERVER['SERVER_NAME'].'/common/css/SM.forms/SM.css.FORMS.css" />'; ?>
<!-- END SM CSS lib -->

<!-- FC JS lib -->
	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/chart/FusionCharts.js"></script>'; ?>
<!-- END FC JS lib -->

<?






?>

									<!-- controls -->
									<div id="control_window" name="control_window" style="z-index: 2; position: relative; top: 20px; left: 0px; width: 960px; height: 100px; border: 0px solid #fff; margin-bottom: 5px;">
										<?
                 			// controls ----------------------------------------
	                 		require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/html/control/inc.CONTROL.users_session_actions.php');
										?>
									</div>
									<!-- END controls -->





									<!-- chart window -->
									<div id="graph_window" name="graph_window" style="z-index: 2; position: relative; top: 0px; left: 0px; width: 960px; height: 400px; min-height: 200px; border: 0px solid #f00; margin-bottom: 20px;">
	               		<?
                 			// chart -----------------------------------------
	                 		require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/html/chart/inc.CHART.users_session_actions.php');
  	               	?>
									</div>
									<!-- END chart window -->





									<!-- report/spreadsheet HTML window -->
									<div id="user_session_activity.report" style="z-index: 2; position: relative; top: 20px; left: 0px; width: 960px; height: auto; min-height: 200px; border: 0px solid #f00; margin-bottom: 20px;">
									</div>

									<script type="text/javascript">
									<? 
										// generate spreadsheet report -------------------
										//											  form id						target exe												filter
										echo 'SM_Report_Update(\'form_activity\', \'user_session_activity.report\', \'ts:desc\');';
									?>
									</script>
									<!-- END report/spreadsheet HTML window -->

<?




