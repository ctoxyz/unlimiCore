<?
// chart - user session activity ===============================================


?>




<div id="chart1div" style="position: relative; top: 0px; z-index: 1;"></div>


<script language="JavaScript">
	//var chartData	=	"<chart showTaskNames='1' dateFormat='dd/mm/yyyy' hoverCapBgColor='FFFFFF' hoverCapBorderColor='333333' ganttLineColor='99CC00' ganttLineAlpha='20' baseFontColor='333333' gridBorderColor='99CC00' taskBarRoundRadius='4' showShadow='0'></chart>";
	var chart1 = new FusionCharts("common/chart/Gantt.swf", "client_campaign.chart", "960", "400", "0", "1");
  //chart1.setDataXML(chartData);
  //chart1.setDataURL("common/chart/Data.xml");
  chart1.setDataXML("<chart><set label='A' value='10' /><set label='B' value='11' /></chart>");
  //chart1.setDataURL("core.exe.php?_function=client_campaign.chart");
  chart1.setTransparent(true);
  chart1.render("chart1div");
  //							 form ID					target exe							 filter			chart id
  SM_Chart_Update('form_campaign', 'client_campaign.chart', 'ts_entered:desc', 'client_campaign.chart');
</script>


