
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

/*
	$_GET['scope'] = 'all';

	switch($_GET['scope']){
		case 'all':
			// user session action report ------------------	
			$_Dataset_MemberSessionActions = $obj_Member->GetMemberSessionActions('all');
			$obj_Member->Report_UserSessionActions($_Dataset_MemberSessionActions, 'User Action Report');		
		break;

		default:
			// user session action report ------------------	
			$_Dataset_MemberSessionActions = $obj_Member->GetMemberSessionActions($_GET['scope']);
			$obj_Member->Report_UserSessionActions($_Dataset_MemberSessionActions, 'User Action Report');		
		break;
	}

*/






?>

									<!-- controls -->
									<div id="control_window" name="control_window" style="z-index: 2; position: relative; top: 20px; left: 0px; width: 960px; height: 100px; border: 0px solid #fff; margin-bottom: 5px;">
										<?
                 			// controls ----------------------------------------
	                 		require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/html/control/inc.CONTROL.campaign.php');
										?>
									</div>
									<!-- END controls -->





									<!-- chart window -->
									<div id="graph_window" name="graph_window" style="z-index: 2; position: relative; top: 0px; left: 0px; width: 960px; height: 400px; min-height: 200px; border: 0px solid #f00; margin-bottom: 20px;">
                	<?
                 		// chart -----------------------------------------
	                 	require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/html/chart/inc.CHART.campaign.php');
  	               ?>
									</div>
									<!-- END chart window -->





									<!-- report/spreadsheet HTML window -->
									<div id="results_window" name="results_window" style="z-index: 2; position: relative; top: 20px; left: 0px; width: 960px; height: auto; min-height: 200px; border: 0px solid #f00; margin-bottom: 20px;">
									</div>

									<script type="text/javascript">
									<? 
										// generate spreadsheet report -------------------
										echo 'SM_Report_Update(\'form_campaign\', \'client_campaign.report\', \'ts_entered:desc\');';
									?>
									</script>
									<!-- END report/spreadsheet HTML window -->

<?




