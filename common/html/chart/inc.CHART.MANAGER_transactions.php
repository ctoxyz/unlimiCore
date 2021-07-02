<?
// chart - =====================================================================
?>




<div id="chart1div" style="position: relative; top: 0px; z-index: 1;"></div>

<script language="JavaScript">
   var chart1 = new FusionCharts("common/chart/MSColumn3D.swf", "manager_current_month_all_records.chart", "960", "400", "0", "1");
   chart1.setDataXML("<chart><set label='A' value='10' /><set label='B' value='11' /></chart>");
   chart1.setTransparent(true);
   chart1.render("chart1div");

   //								form ID										target exe																	filter					chart id
   SM_Chart_Update('form_team_currentmonth', 'manager_current_month_all_records.chart', 'ts_sold:desc', 'manager_current_month_all_records.chart');
</script>

