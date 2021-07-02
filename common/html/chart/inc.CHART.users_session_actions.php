<?
// chart - user session activity ===============================================


?>

<div id="chart1div" style="position: relative; top: 0px; z-index: 1;"></div>

<script language="JavaScript">
   //var chartData	=	"<chart caption='User Action Report' xAxisName='Month' yAxisName='Revenue' animation='0' showValues='0' numberPrefix='' decimalPrecision='0' bgcolor='000000' bgAlpha='100' showColumnShadow='1' divlinecolor='ffffff' divLineAlpha='100' showAlternateHGridColor='1' alternateHGridColor='000000' alternateHGridAlpha='60' ><set name='A' value='10' color='D64646' /><set name='B' value='11' color='AFD8F8' /></chart>";
   //var chart1 		= new FusionCharts("common/chart/MSArea.swf", "user_session_activity.chart", "960", "400", "1", "0");

   var chart1 = new FusionCharts("common/chart/MSArea.swf", "user_session_activity.chart", "960", "400", "0", "1");
   chart1.setDataXML("<chart><set label='A' value='10' /><set label='B' value='11' /></chart>");
   chart1.setTransparent(true);
   chart1.render("chart1div");

   //								form ID						target exe										filter			chart id
   SM_Chart_Update('form_activity', 'user_session_activity.chart', 'ts:desc', 'user_session_activity.chart');
</script>


