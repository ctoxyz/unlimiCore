
<!-- SM JS lib -->
	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.FORMS.uncompressed.js"></script>'; ?>
<!-- END SM JS lib -->

<!-- SM JS lib -->
	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.REPORTS.uncompressed.js"></script>'; ?>
<!-- END SM JS lib -->

<!-- SM CSS lib -->
	<? echo '<link rel="stylesheet" type="text/css" href="http://'.$_SERVER['SERVER_NAME'].'/common/css/SM.forms/SM.css.FORMS.css" />'; ?>
<!-- END SM CSS lib -->
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


									<!-- form window -->
									<div id="form_window" name="form_window" style="z-index: 2; position: relative; top: 20px; left: 0px; width: 960px; height: auto; min-height: 200px; border: 0px solid #f00; margin-bottom: 20px;">
										<?
	                 		require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/html/form/inc.FORM.transaction.php');
										?>
									</div>
									<!-- END form window -->


									<!-- controls -->
									<!--
									<div id="control_window" name="control_window" style="z-index: 2; position: relative; top: 20px; left: 0px; width: 960px; height: 100px; border: 0px solid #fff; margin-bottom: 5px;">
										<?
                 			// controls ----------------------------------------
	                 		//require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/html/control/inc.CONTROL.resources.php');
										?>
									</div>
									-->
									<!-- END controls -->



									<input type="hidden" value="<? echo date('m',time()); ?>" name="form_transaction_new.booking.date_start_month" id="form_transaction_new.booking.date_start_month" />
									<input type="hidden" value="<? echo date('d',time()); ?>" name="form_transaction_new.booking.date_start_day" id="form_transaction_new.booking.date_start_day" />
									<input type="hidden" value="<? echo date('Y',time()); ?>" name="form_transaction_new.booking.date_start_year" id="form_transaction_new.booking.date_start_year" />

									<input type="hidden" value="<? echo date('m',$obj_Member->Timestamp_End_Today()); ?>" name="form_transaction_new.booking.date_end_month" id="form_transaction_new.booking.date_end_month" />
									<input type="hidden" value="<? echo date('d',$obj_Member->Timestamp_End_Today()); ?>" name="form_transaction_new.booking.date_end_day" id="form_transaction_new.booking.date_end_day" />
									<input type="hidden" value="<? echo date('Y',$obj_Member->Timestamp_End_Today()); ?>" name="form_transaction_new.booking.date_end_year" id="form_transaction_new.booking.date_end_year" />



									<!-- results window -->
									<div id="transaction_today.report" name="results_window" style="z-index: 2; position: relative; top: 20px; left: 0px; width: 960px; height: auto; min-height: 200px; border: 0px solid #f00; margin-bottom: 20px;">
									</div>

									
									<script type="text/javascript">
									<? 
										// generate spreadsheet report -------------------
										echo 'SM_Report_Update(\'form_transaction_new\', \'transaction_today.report\', \'ts_entered:asc\');';
									?>
									</script>

<?




