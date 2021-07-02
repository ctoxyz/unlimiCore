
<!-- SM JS lib -->
	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.FORMS.uncompressed.js"></script>'; ?>
<!-- END SM JS lib -->

<!-- SM JS lib -->
	<? echo '<script language="JavaScript" type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/common/js/smlib/SM.lib.REPORTS.uncompressed.js"></script>'; ?>
<!-- END SM JS lib -->

<!-- SM CSS lib -->
	<? echo '<link rel="stylesheet" type="text/css" href="http://'.$_SERVER['SERVER_NAME'].'/common/css/SM.forms/SM.css.FORMS.css" />'; ?>
<!-- END SM CSS lib -->








									<!-- form window -->
									<div id="form_window" name="form_window" style="z-index: 2; position: relative; top: 20px; left: 0px; width: 960px; height: auto; min-height: 200px; border: 0px solid #f00; margin-bottom: 20px;">
                 	<?
	                 	require('/var/www/vhosts/'.$_SERVER['SERVER_NAME'].'/httpdocs/common/html/form/inc.FORM.resource_human.php');
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


									<!-- results window -->
									<div id="human_resource.report" style="z-index: 2; position: relative; top: 20px; left: 0px; width: 960px; height: auto; min-height: 200px; border: 0px solid #f00; margin-bottom: 20px;">
									</div>

									
									<script type="text/javascript">
									<? 
										// generate spreadsheet report -------------------
										echo 'SM_Report_Update(\'form_resource_new\', \'human_resource.report\', \'userid:asc\');';
									?>
									</script>

<?




